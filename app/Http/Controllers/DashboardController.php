<?php

namespace App\Http\Controllers;

use App\NoticeBoard;
use App\User;
use App\AdvertPayment;
use App\Promotion;
use App\DailyTask;
use App\SubmitTask;
use App\UploadPOP;
use App\TransferTransaction;
use App\UserTask;
use Carbon\Carbon;
use App\WalletTransaction;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Mockery\Matcher\Not;
use PHPUnit\Framework\Error\Notice;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }







    /**
     * Show the user dashboard index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


         $presentpromotion = Promotion::where('status', 0)->orderBy('id', 'desc')->take(10)->get();
         $pastpromotions = Promotion::where('status', 1)->orderBy('id', 'desc')->take(10)->get();
         $orderNumber = count(Auth::user()->user_tasks()->get());

        //  $user_withdrawers = Auth::user()->wallet_transactions()->where('type', 'Request Money')->orderBy('id', 'desc')->get();


         $wallet = Auth::user()->wallet()->first();
         $user_withdrawers = $wallet->walletTransaction()->where('type', 'Request Money')->orderBy('id', 'desc')->paginate(10);
        return view('dashboard.index', compact('presentpromotion', 'user_withdrawers','pastpromotions', 'orderNumber'));



}




public function fetch_customer($id) {
    return User::where('id',$id)->with(['wallet'])->first();
}

    public function wallet()
    {
        $user = Auth::User();

        $wallet = Auth::user()->wallet()->first();

        $debit_wallet_transactions = $wallet->walletTransaction()->where('type', 'Request Money')->orderBy('id', 'desc')->paginate(10);


        $gifts_sent = TransferTransaction::where('sender_id', auth()->user()->id)
        ->with(['receiver'])
        ->orderBy('id', 'DESC')
        ->get();

$gifts_received = TransferTransaction::where('receiver_id', auth()->user()->id)
            ->with(['initiator'])
            ->orderBy('id', 'DESC')
            ->get();


        return view('dashboard.wallet')->with([
            'debit_wallet_transactions' => $debit_wallet_transactions,
            'gifts_received' => $gifts_received,
            'gifts_sent' => $gifts_sent,
            'wallet' => $wallet,

        ]);
    }


            public function AllTask()
    {

        $contacts = NoticeBoard::orderBy('id', 'desc')->get();
         $messages    = NoticeBoard::count();
        $orders = Auth::user()->user_tasks()->orderBy('id', 'desc')->get();
        $orderNumber = count(Auth::user()->user_tasks()->get());

        return view('dashboard.mytask', compact(['contacts', 'messages', 'orders', 'orderNumber']));
    }



        public function DailyTask()
    {


        $dailytasks = Auth::user()->submit_tasks()->latest()->take(10)->paginate(10);
        $pendingtasks = Auth::user()->submit_tasks()->where('status',0)->count();
        $completetasks = Auth::user()->submit_tasks()->where('status',1)->count();
        $rejectedtask = Auth::user()->submit_tasks()->where('status',2)->count();
        $mytasks = Auth::user()->submit_tasks()->count();


        return view('dashboard.dailytask', compact('dailytasks', 'pendingtasks', 'mytasks','completetasks', 'rejectedtask'));
    }

    public function PendingTask()
    {


        $pendingttaskall = Auth::user()->submit_tasks()->where('status',0)->orderBy('id', 'desc')->paginate(10);
        $pendingtasks = Auth::user()->submit_tasks()->where('status',0)->count();
        $completetasks = Auth::user()->submit_tasks()->where('status',1)->count();
        $rejectedtask = Auth::user()->submit_tasks()->where('status',2)->count();
        $mytasks = Auth::user()->submit_tasks()->count();


        return view('dashboard.pendingtask', compact('pendingttaskall', 'pendingtasks', 'mytasks','completetasks', 'rejectedtask'));
    }

    public function CompleteTask()
    {


        $completetaskall = Auth::user()->submit_tasks()->where('status',1)->orderBy('id', 'desc')->paginate(10);
        $pendingtasks = Auth::user()->submit_tasks()->where('status',0)->count();
        $completetasks = Auth::user()->submit_tasks()->where('status',1)->count();
        $rejectedtask = Auth::user()->submit_tasks()->where('status',2)->count();
        $mytasks = Auth::user()->submit_tasks()->count();


        return view('dashboard.completetask', compact('completetaskall', 'pendingtasks', 'mytasks','completetasks', 'rejectedtask'));
    }


    public function RejectedTask()
    {


        $rejectedtaskall = Auth::user()->submit_tasks()->where('status',2)->orderBy('id', 'desc')->paginate(10);
        $pendingtasks = Auth::user()->submit_tasks()->where('status',0)->count();
        $completetasks = Auth::user()->submit_tasks()->where('status',1)->count();
        $rejectedtask = Auth::user()->submit_tasks()->where('status',2)->count();
        $mytasks = Auth::user()->submit_tasks()->count();


        return view('dashboard.rejectedtask', compact('rejectedtaskall', 'pendingtasks', 'mytasks','completetasks', 'rejectedtask'));
    }

        public function DailyTaskDetails($slug)
    {
        $property = Promotion::where('slug', $slug)->first();
        $contacts = NoticeBoard::orderBy('id', 'desc')->get();
         $messages    = NoticeBoard::count();

        return view('dashboard.taskdetails' , compact('property', 'contacts', 'messages'));
    }

            public function MyTaskDetails($slug)
    {
        $property = DailyTask::where('slug', $slug)->first();
        $contacts = NoticeBoard::orderBy('id', 'desc')->get();
         $messages    = NoticeBoard::count();

        return view('dashboard.mytaskdetails' , compact('property', 'contacts', 'messages'));
    }

    /**
     * Show the user dashboard wallet.
     *
     * @return \Illuminate\Http\Response
     */



    // Displays a single order detail to a user.

    /*
     * Displays a single order detail to a user.
     * The order must belong to that user before it can be viewed.
     * */



    // Shows the view to edit profile.

    public function showProfile()
    {
         $notice = NoticeBoard::orderBy('id', 'desc')->where('status', 0)->get();
         $messages    = NoticeBoard::count();
         $contacts = NoticeBoard::orderBy('id', 'desc')->get();

        return view('dashboard.profile', compact(['contacts', 'messages', 'notice']));

    }

    public function updateBank(Request $request)
    {
        $this->validate($request, [

            'account_bank' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',

        ]);

        $user = User::where('id', Auth::user()->id)->first();

        $user->account_bank = $request->account_bank;
        $user->account_name = $request->account_name;
        $user->account_number = $request->account_number;


        $user->save();

        Session::flash('successbank', 'Bank Details Updated Successfully');
        return redirect()->back();
    }


    public function updateProfile(Request $request)
    {
        $this->validate($request, [

            'age' => 'max:191',

        ]);

        $user = User::where('id', Auth::user()->id)->first();

        $user->location = $request->location;
        $user->age = $request->age;
        $user->gender = $request->gender;


        $user->save();

        Session::flash('successprofile', 'profile Details Updated Successfully');
        return redirect()->back();
    }


    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'password_old' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',

        ]);

        $user = Auth::User();

        if (Hash::check(Input::get('password_old'), $user['password']) && Input::get('password') == Input::get('password_confirmation')){

            $user->password = bcrypt(Input::get('password'));
            $user->save();

            Session::flash('success', 'Password Changed Successfully');

        }
        else{

            Session::flash('fail', 'Password Change Failure');

        }

        return redirect()->back();
    }

        public function SubmitTask5(Request $request)
    {
        $request->validate([
            'image' =>'required',
            'image.*' => 'mimes:jpeg,png,jpg,gif,svg|max:5000'
        ]);

        // $user = auth()->user();
        $user = Auth::User();

        $image = $request->file('image');
        $slug  = str_slug($request->title);

        $total_files = count($request->file('image'));

        foreach ($request->file('image') as $file) {
            // rename & upload files to uploads folder
            $name = uniqid() . '_' . time(). '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/tasks';
            $file->move($path, $name);

            // store in db
            $ref = str_random(10);

            $fileUpload = new SubmitTask();
            $fileUpload->image = $name;
            $fileUpload->reference = $ref;
            $fileUpload->note = $request->note;
            $fileUpload->payment     = $request->payment;
            $fileUpload->buttontype     = $request->buttontype;
            $fileUpload->task_slug     = $request->task_slug;
            $fileUpload->promotion_id     = $request->promotion_id;
            $fileUpload->user_id     = Auth::id();
            $fileUpload->save();
        }

        // Mail::to($user)->send(new \App\Mail\SubmitTask($fileUpload, $user));

        Session::flash('success', 'Task Submitted Successfully');
        return redirect()->back();
    }

    public function SubmitTask(Request $request){

        $request->validate([ 'image' => ['required', 'mimes:jpg,bmp,png,jpeg,svg,gif|max:5000'], ]);

        $user = Auth::User();

        $ref = str_random(10);

        $image = $this->upload_image($request->image);

        $ref = str_random(10);
        $slug  = str_slug($request->title);

        $new_complain = SubmitTask::create([
            'promotion_id' => $request->promotion_id,
            'note' => $request->note,
            'buttontype' => $request->buttontype,
            'user_id' => Auth::id(),
            'image' => $image,
            'slug' => $slug,
            'task_slug' => $request->task_slug,
            'payment' => $request->payment,
            'payment' => $request->payment,
            'reference' => $ref,
            'status' => 0,
        ]);

        if ($new_complain) {
            Mail::to($user)->send(new \App\Mail\SubmitTask($new_complain, $user));
            Session::flash('success', 'Task Submitted Successfully');
            return redirect()->back();
        }
    }
    
    public function UploadPOPPage(){
        return view('dashboard.uploadproofofpayment');
    }
    
    public function UploadPOP(Request $request){

        $request->validate([ 'image' => ['required', 'mimes:jpg,bmp,png,jpeg,svg,gif|max:5000'], ]);

        $ref = str_random(10);
        $image = $this->upload_pop($request->image);

        //`id`, `reference`, `user_id`, `image`, `status`, `note`, `created_at`, `updated_at`
        $new_complain = UploadPOP::create([
            'note' => $request->note,
            'user_id' => Auth::id(),
            'image' => $image,
            'reference' => $ref,
            'status' => 0,
        ]);

        if ($new_complain) {
            //Mail::to($user)->send(new \App\Mail\SubmitTask($new_complain, $user));
            Session::flash('success', 'Proof of Payment submitted Successfully, Kindly wait for approval.');
            return redirect()->back();//return view('dashboard');//
        }
    }

    public function upload_image($image)
    {
        if ($image != '') {
            $original_name = $image->getClientOriginalName(); //get image original name
            $new_name      = md5(microtime() . $original_name) . '.' . 'png';  //generate new name for the image
            $make_image    = Image::make($image->getRealPath()); // read image from temporary file
            try {
                $make_image->save('storage/usertask_photo/' . $new_name, 60); //upload the image to server
                return $new_name;
            } catch (\Exception $e) {
                // throw $e;
            }
        }

        return null;
    }
    
    public function upload_pop($image)
    {
        if ($image != '') {
            $original_name = $image->getClientOriginalName(); //get image original name
            $new_name      = md5(microtime() . $original_name) . '.' . 'png';  //generate new name for the image
            $make_image    = Image::make($image->getRealPath()); // read image from temporary file
            try {
                $make_image->save('storage/user_proofofpayments/' . $new_name, 60); //upload the image to server
                return $new_name;
            } catch (\Exception $e) {
                // throw $e;
            }
        }

        return null;
    }

}
