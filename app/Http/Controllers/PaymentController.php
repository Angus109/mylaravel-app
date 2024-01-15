<?php

namespace App\Http\Controllers;

use App\User;
use App\Wallet;
use App\RequestAdvert;
use App\SpamAccount;
use App\FundRacepay;
use App\ProjectPayment;
use App\TransferTransaction;
use Illuminate\Support\Facades\Mail;
use App\WalletTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    public function __construct(){
        if (!Session::get('user')) {
            return redirect('/');
        }
    }

    public function SendUserLat(Request $request) {
        $this->validate($request, [
            'email' => ['required', 'email'],
            'amount'  => ['required', 'numeric']
        ]);

        if ($request->amount <= 500) {
            Session::flash('error', 'LAT Amount to transfer CANNOT be less than 500');
            return back();
        }

        // $id = Session::get('user');
        $id = Auth::user()->wallet()->first();
        $sender = $this->fetch_customer($id->id);
        $receiver = User::where('email',$request->email)->with(['wallet'])->first();
// dd($id, $receiver);
        if ($receiver) {
            if ($this->update_wallet($sender->wallet->id, $receiver->wallet->id, $request->amount)) {
                Session::flash('success', 'LAT Transfer sent successfully!');
                //send mails to both parties
                // Mail::to($id)->send(new \App\Mail\LatTransaction($sender, $id));
                Mail::to($request->email)->send(new \App\Mail\LatReceiverTransaction($receiver, $id));
                Mail::to($sender->email)->send(new \App\Mail\LatTransaction($sender, $id));

            } else {
                Session::flash('error', 'Insufficient LAT');
            }
        } else {
            Session::flash('error', 'User not found on this platform');
        }
        return redirect()->back();
    }


    public function update_wallet($sender_wallet_id, $receiver_wallet_id, $amount) {
        try {
            $sender_wallet = Wallet::where('id',$sender_wallet_id)->first();
            if ($sender_wallet->lat_wallet >= $amount) {
                DB::beginTransaction();

                $sender_balance = $sender_wallet->lat_wallet - $amount;
                $sender_wallet->update(['lat_wallet' => $sender_balance]);

                $receiver_wallet = Wallet::where('id', $receiver_wallet_id)->first();
                $receiver_balance = $receiver_wallet->lat_wallet + $amount;
                $receiver_wallet->update(['lat_wallet' => $receiver_balance]);

                TransferTransaction::create([
                    'sender_id' => $sender_wallet_id,
                    'receiver_id' => $receiver_wallet_id,
                    'amount' => $amount
                ]);

                DB::commit();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $exception) {
            DB::rollback();
            Log::info($exception->getMessage());
            return false;
        }
    }



    public function WithdrawMoney(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|numeric|min:500'
        ],
        [
            'amount.required'      =>  'Amount is required and cannot be empty',
            'amount.min'          =>  'Amount must be at least 600 Naira.'
        ]);

        $user = Auth::user();
        $ref = str_random(10);


        $wallet = $user->wallet()->first();

        $current_balance = $wallet->naira_wallet;

        if ($current_balance >= $request->amount)
        {

            // Debit the User the order amount
            $new_balance = bcsub($current_balance, $request->amount);
            $wallet->naira_wallet = $new_balance;

            $wallet_transaction = new WalletTransaction();
            $wallet_transaction->type = 'Request Money';
            $wallet_transaction->amount = $request->amount;
            $wallet_transaction->user_id = Auth::id();
            $wallet_transaction->reference = $ref;

            $wallet->walletTransaction()->save($wallet_transaction);
            $wallet->save();

            // $user->request_moneys()->save($order);
            Session::flash('success', 'Withdrawer Request Successful!');

            return redirect()->back();

        }else{
            // $current_balance->status =0;
            Session::flash('danger', 'Withdrawer Request Failed! Wallet Balance Low');
            return redirect()->back();
        }

    }

    public function fetch_customer($id) {
        return User::where('id',$id)->with(['wallet'])->first();
    }


    public function redirectToGateway(Request $request)
    {
        // Paystack receives the amount in Kobo, so we multiply by 100 to get the Naira equivalent
        $request->amount = $request->amount * 100;

        if ($request->type == 'card'){
            $this->payWithCard($request);
        }

        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    public function payWithCard(Request $request)
    {
        $resp = array(
            'status'    =>  0,
            'msg'       =>  'Pending'
        );
        $verified = $this->verifyPaystackPayment($request->pRef);
        if($verified == -1) {
            $resp['status'] = $verified;
            $resp['msg'] = 'We were unable to initiate the process of verifying your payment status. Please contact our customer support lines for help.';
        } else if((1 <= $verified) && ($verified <= 88)) {
            $resp['status'] = $verified;
            $resp['msg'] = 'Unfortunately, our servers encountered an error trying to validate your payment status. Please contact our customer support lines for help.';
        } else if($verified == 404) {
            $resp['status'] = $verified;
            $resp['msg'] = 'We could not find your payment transaction reference. Your payment might have been declined. Please contact your bank for clarification.';
        } else if($verified == '503') {
            $resp['status'] = $verified;
            $resp['msg'] = 'Unable to verify transaction. Please contact our customer support lines for help.';
        } else {
            $ref = str_random(6);
            if(\Auth::check()) {
                \Log::info('user is Authenticated');
                $user = Auth::user();
            } else {
                \Log::info('user is not Authenticated');
                $user = SpamAccount::create([
                    'username' => 'user',
                    'email' => $this->random_email(),
                    'password' => 'user',
                    'phone' =>  'user',
                ]);
                \Log::info('user account was successfully created.');
                \Log::info($user);
            }
            $order = new RequestAdvert();

            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->address = $request->address;
            $order->amount = $request->amount;
            $order->service = $request->service;
            $order->gh = $request->pRef;

            $order->payment_type = 'Card';
            $order->reference = $ref;
            $order->payment_status = 1;
            $order->status = 1;

            $user->request_adverts()->save($order);
            \Log::info('order saved.');
            $resp['status'] = 200;
            $resp['msg'] = "Advert Payment successful.";
            if(\Auth::check()) {
                return response()->json($resp);
            } else {
            $resp['status'] = 100;
            $resp['msg'] = "Advert Payment successful.";
            return response()->json($resp);
            }

        }
}

public function payWithCardCallback(){
    $paymentDetails = Paystack::getPaymentData();
    if ($paymentDetails['data']['status'] == 'success'){
        $order = RequestAdvert::find($paymentDetails['data']['metadata']['custom_field']);
        $order->reference = request()->trxref;
        $order->status = 'paid';
        $order->save();

        Session::flash('success', 'Transaction Successful. Your Reference ID is: ' . request()->trxref);
        return redirect()->route('paymentsummary')->with('transaction_ref', request()->trxref);
    }else{
        dd('payment failed');
    }
    return $this;
}



public function paymentCallBack(){

    $paymentDetails = Paystack::getPaymentData();


    if ($paymentDetails['status'] == true && $paymentDetails['data']['metadata']['custom_field']['type'] == 'card'){

        return $this->payWithCardCallback();
    }
    else{
        dd($paymentDetails['data']['metadata']['custom_field']['type']);
    }


}

public function verifyPaystackPayment($paystackRef) {
    $verified = 0;
    $result = array();
    $url = 'https://api.paystack.co/transaction/verify/' . $paystackRef;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt(
        $ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . env('PAYSTACK_SECRET_KEY')]
    );
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $request = curl_exec($ch);

    if(curl_errno($ch)) {
        $verified = curl_errno($ch);
    } else {
        if ($request) {
            $result = json_decode($request, true);
            \Log::info($result);
            if($result["status"] == "success") {
                $verified = 100;
            } else {
                $verified = 404;
            }
        } else {
            $verified = 503;
        }
    }
    curl_close($ch);
}

public function random_email()
{
    $alpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
    $domains = ['gmail', 'yahoo', 'outlook', 'protonmail'];
    $groups = ['com', 'net', 'ai', 'org', 'tech'];
    $suffix = rand(0, count($domains) - 1);
    $dot = rand(0, count($groups) - 1);
    $chars = '';
    for($i = 0; $i < 8; $i++)
    {
        $r = rand(0, strlen($alpha) - 1);
        $chars .= $alpha[$r];
    }
    $email = $chars . '@' . $domains[$suffix] . '.' . $groups[$dot];
    return $email;
}

public function PaymentSummary()
{


    return view('paywithcard');

}





}
