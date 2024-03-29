<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\User;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class PasswordResetRequestController extends Controller {


    public function forgotPassword (Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $access_token = 0;
        for ($i = 0; $i < 3; $i++)
        {
            $access_token .= mt_rand(0,9);
        }
        $user = User::where('email', $request->email)->first();
        if (!$user) {

            Session::flash('error', 'User account does not exist');
            return redirect()->back();
        }
        $data['user'] = $user;
        $data['verified_otp'] = $access_token;
        try {
            Mail::to($user->email)->send(new \App\Mail\ForgotPassword($data));
            $user->update(['verified_otp' => $data['verified_otp']]);
            Session::flash('success', 'A reset password OTP has been sent to your email address');
            return redirect()->route('verifypasswordtoken');
            }
            catch (\Throwable $th) {
            \Log::info($th);
            return redirect()->back();
        }
    }

    public function verifyToken(Request $request){
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email',
            'otp_token' => 'required|string|min:4'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            Session::flash('error', 'User account does not exist');
            return redirect()->back();
        }
        if ($user->verified_otp == $request->otp_token) {
            return redirect()->route('resetpassword');
        }
        // access token provided does not match generated token
        Session::flash('error', 'Invalid access token');
        return redirect()->back();
    }

    public function resetPassword(Request $request){
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                "status" => false,
                "message"=> "User account does not exist"
            ]);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        // return response()->json([
        //     "status" => true,
        //     "message"=> "Successful, Pasword reset completed."
        // ]);
        Session::flash('success', 'Pasword reset completed, kindly login your account');
        return redirect()->route('login');
    }


    public function sendPasswordResetEmail(Request $request){
        // If email does not exist
        if(!$this->validEmail($request->email)) {
            return response()->json([
                'message' => 'Email does not exist.'
            ], Response::HTTP_NOT_FOUND);
        } else {
            // If email exists
            $token = $this->sendMail($request->email);
            return response()->json([
                'message' => 'Token Created successfully.',
                'token'   =>  $token
            ], Response::HTTP_OK);
        }
    }


    public function sendMail($email){
        $token = $this->generateToken($email);
        Mail::to($email)->send(new SendMail($token));
        return $token;
    }

    public function validEmail($email) {
       return !!User::where('email', $email)->first();
    }

    public function generateToken($email){
      $isOtherToken = DB::table('recover_password')->where('email', $email)->first();

      if($isOtherToken) {
        return $isOtherToken->token;
      }

      $token = Str::random(80);;
      $this->storeToken($token, $email);
      return $token;
    }

    public function storeToken($token, $email){
        DB::table('recover_password')->insert([
            'email' => $email,
            'token' => $token,
            'created' => Carbon::now()
        ]);
    }

}
