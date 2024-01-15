<?php

namespace App\Http\Controllers;


use App\ContactMessage;
use App\State;
use App\Lga;
use App\Advert;
use App\FAQ;
use App\Wallet;
use App\JoinInfluencer;
use App\Influencer;
use App\User;
use App\Service;
use App\UserTask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Validator;

class HomeController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function getCityList($state_name)
    {


        $state = State::where("name",$state_name)->first();

        $state_id = $state->id;
               // return response()->json($state_id);


        $cities = LGA::where(['state'=>$state_id])
        ->pluck("name","id");

        return response()->json($cities);
    }

    public function index()
    {


        $userscnt = User::count();
        $advertcnt = UserTask::where('status', 1)->count();
        $userscnt = User::count();
        $influencersall  = \App\Influencer::all();

        return view('welcome', compact('userscnt', 'advertcnt', 'influencersall'));
    }


    public function login()
    {
        $influencersall  = \App\Influencer::all();

        return view('auth.login', compact('influencersall'));
    }

    public function Forgotpassword()
    {
        $influencersall  = \App\Influencer::all();

        return view('auth.forgot', compact('influencersall'));
    }

    public function verifyToken()
    {
        $influencersall  = \App\Influencer::all();

        return view('auth.verify', compact('influencersall'));
    }

    public function resetPassword()
    {
        $influencersall  = \App\Influencer::all();

        return view('auth.resetpassword', compact('influencersall'));
    }


    public function LoginUser(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            Session::flash('success', 'Login sucessful');
            return redirect()->intended('dashboard');

        }
        Session::flash('error', 'Login details are not valid');
        return redirect()->back()->withInput($request->only('email', 'remember'));

    }
    public function RegisterUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
            'phone' => 'required|numeric|min:6',

        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // generate otp
        $otp = 0;
        for ($i = 0; $i < 3; $i++)
        {
            $otp .= mt_rand(0,9);
        }

        // Send the OTP to user's email
        $data = ['account_bank' => $request->account_bank, 'account_name' => $request->account_name,'account_number' => $request->account_number,
        'email' => $request->email, 'phone' => $request->phone,'username' => $request->username,
         'code' => $otp];

            Mail::to($request->email)->send(new \App\Mail\VerifyRegister($data));

            $user = User::create(array_merge(
                $validator->validated(),
                ['password' => bcrypt($request->password), 'verified_otp' => $otp]

            ));
            $wallet = $user->wallet()->save(new Wallet());

            Session::flash('success', 'An OTP has been sent to your email address');
            return redirect()->route('verifyotp');


    }

    public function VerifyOtp()
    {

        $influencersall  = \App\Influencer::all();
        return view('auth.verifyotp', compact('influencersall'));
    }

    public function AccountVerification(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:100',
            'verified_otp' => 'required|string|min:4',

        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            Session::flash('error', 'User Account does not exist');
            return redirect()->back();
        } else {
            $data = ['email' => $request->email, 'username' => $request->username, 'phone' => $request->phone];
            if ($user->verified_otp == $request->verified_otp) {

                $user->update(['verified'=>1, 'verified_otp'=>Null]);
                // $wallet = $user->wallet()->save(new Wallet());
                Mail::to($user->email)->send(new \App\Mail\OnboardingMail($data, $user));
                Session::flash('success', 'Your Account has been successfully created, kindly login');
                return redirect()->route('login');
            } else {
                // access token provided does not match generated token
                Session::flash('error', 'Invalid otp provided');
                return redirect()->back();
            }
        }
    }

    public function register()
    {
        $influencersall  = \App\Influencer::all();
        return view('auth.register', compact('influencersall'));
    }


        public function AboutUs()
    {
        $influencersall  = \App\Influencer::all();
        return view('about', compact('influencersall'));
    }



            public function Promote()
    {
        $influencersall  = \App\Influencer::all();
        return view('promote', compact('influencersall'));
    }

            public function Package()
    {
        $influencersall  = \App\Influencer::all();
        return view('packages', compact('influencersall'));
    }
            public function Contact()
    {
        $influencersall  = \App\Influencer::all();
        return view('contact', compact('influencersall'));
    }


    public function Influencer()
    {
        $influencersall  = \App\Influencer::all();

        return view('influencer', compact('influencersall'));
    }

    public function Projects()
    {

        return view('projects', compact('influencersall'));
    }
      public function FAQ ()
    {
        $faqs = FAQ::orderBy('id', 'desc')->get();
        $influencersall  = \App\Influencer::all();

        return view('faqs', compact('influencersall', 'faqs'));
    }


            public function Terms()
    {
        $influencersall  = \App\Influencer::all();
        return view('terms', compact('influencersall'));

    }
        public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
        }


    public function Privacy()
    {  $influencersall  = \App\Influencer::all();

        return view('privacy', compact('influencersall'));

    }


    public function Advert()
    {  $influencersall  = \App\Influencer::all();

        return view('advert', compact('influencersall'));

    }


    public function Pricing()
    {  $influencersall  = \App\Influencer::all();

        return view('pricing', compact('influencersall'));

    }



        public function influencerDetails(Request $request, $slug) {

        $product = \App\Influencer::where('slug', $slug)->first();
        // $billspaid = Service::take(3)->inRandomOrder()->get();
        $influencersall  = \App\Influencer::all();
         return view('influencer-show', compact('product', 'influencersall'));

    }


            public function postMessage(Request $request) {
        $data = array(
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'message'   =>  $request->message,
            'phone'     =>  $request->phone,
            'purpose'     =>  $request->purpose,
            'subject'   =>  $request->subject,
        );

        $validator = \Validator::make($data, [
            'name'      =>  'required|string|max:50',
            'email'     =>  'required|email|max:50',
            'phone'     =>  'nullable|string|max:15|min:5',
            'subject'   =>  'required|string|max:40',
            'message'   =>  'required|string',
        ], [
            'name.required'     =>  'Name field is required. Please fill in your name.',
            'email.required'    =>  'E-Mail field is required. Please enter your e-mail address.',
            'email.email'       =>  'A valid e-mail is required as this will be our primary mode of contacting you for feedback.',
            'phone.nullable'     =>  'Phone field must not exceed 15 digits.',
            'subject.required'   =>  'Subject field Cannot be empty',
            'message.required'  =>  'Your forgot to type a message. Kindly write your message to proceed'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }



        $message = ContactMessage::create($data);
        Session::flash('success', 'Your message has been received and will be duly treated. We will contact you as soon as possible if need be.');
        Mail::to('info@lilyadd.com')->send(new \App\Mail\ContactMessage($message));
        return back();
    }


    public function JoinInfluencer(Request $request) {

        $ref = str_random(10);

        $data = array(
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'description'   =>  $request->description,
            'phone'     =>  $request->phone,
            'provider'     =>  $request->provider,
            'amount'   =>  $request->amount,
            'city'   =>  $request->city,
            'handle'   =>  $request->handle,
            'referral'   =>  $request->referral,
            'followers'   =>  $request->followers,
            'niche'   =>  $request->niche,
            'state'   =>  $request->state,
            'reference'   =>  $ref,

        );

        $validator = \Validator::make($data, [
            'name'      =>  'required|string|max:50',
            'email'     =>  'required|email|max:50',
            'phone'     =>  'numeric|string|min:5',
            'provider'   =>  'required',

        ], [
            'name.required'     =>  'Name field is required. Please fill in your name.',
            'email.required'    =>  'E-Mail field is required. Please enter your e-mail address.',
            'email.email'       =>  'A valid e-mail is required as this will be our primary mode of contacting you for feedback.',
            'phone.nullable'     =>  'Phone field must not exceed 15 digits.',
            'provider.required'   =>  'Provider field Cannot be empty',
            'amount.required'  =>  'account field is required.'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }



        $message = JoinInfluencer::create($data);
        Session::flash('success', 'Your request has been sent succesfully');
        Mail::to('info@lilyadd.com')->send(new \App\Mail\JoinInfluencerUser($message));
        Mail::to($request->email)->send(new \App\Mail\JoinInfluencer($data));
        return back();
    }


    // public function RequestAdvert(Request $request) {

    //     $ref = str_random(10);

    //     $data = array(
    //         'name'      =>  $request->name,
    //         'email'     =>  $request->email,
    //         'address'   =>  $request->address,
    //         'phone'     =>  $request->phone,
    //         'service'      =>  $request->service,
    //         'amount'      =>  $request->amount,
    //         'payment_type'      =>  $request->payment_type,
    //         'reference'        =>$ref,
    //         'status'   =>  $request->status=0


    //     );

    //     $validator = \Validator::make($data, [
    //         'name'      =>  'required|string|max:191',
    //         'email'     =>  'nullable|email|max:191',
    //         'phone'     =>  'required|max:15|min:5',
    //         'service'   =>  'required',

    //     ]);

    //     if($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     $data = RequestAdvert::create($data);
    //     // Mail::to($user->email)->send(new \App\Mail\AdvertPayment($data));
    //     Session::flash('success5', 'Service Request sent successfully.');
    //     return redirect()->route('paymentslip', ['id' => $data->id]);

    // }




}
