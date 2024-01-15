<?php

namespace App\Http\Controllers\admin;


use App\User;
use App\Admin;
use App\RequestAdvert;
use App\Role;
use App\Permission;
use App\GeneralDetail;
use App\ContactMessage;
use App\SiteSetting;
use App\Feedback;
use App\Client;
use App\FAQ;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Newsletter;
use App\Promotion;
use App\DailyTask;
use App\UserTask;
use App\AdvertPayment;
use App\Influencer;
use App\JoinInfluencer;
use App\Promoter;
use App\SubmitTask;
use App\UploadPOP;
use App\TransferTransaction;
use App\Wallet;
use App\WalletTransaction;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:admin');
    }


        public function adminIndex()
    {
        $messages    = ContactMessage::where('status', 0)->count();
        $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();
         $faircnt    = UserTask::count();
         $eventcnt    = Promotion::count();
         $users    = User::where('verified', 1)->count();
         $dailytaskcnt    = DailyTask::count();
         $influencercnt = JoinInfluencer::count();
        $noticecnt = DailyTask::count();
         $tasksubmitcnt = SubmitTask::count();
         $transcont = TransferTransaction::count();
         $wallcont = WalletTransaction::count();


        return view('cms.index', compact('influencercnt','contacts', 'users', 'faircnt', 'messages', 'eventcnt', 'noticecnt',
    'tasksubmitcnt', 'transcont', 'wallcont'));
    }

        public function site_configuration(Request $request)
    {
        $site = SiteSetting::first();

        $messages    = ContactMessage::where('status', 0)->count();
        $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();

        return view('cms.settings', compact('site', 'contacts', 'messages'));
    }

       public function site_configuration_update(Request $request)
    {
        $data = array(
            'hotline'   => $request->hotline,
            'hotline2'   => $request->hotline2,
            'site_name' => $request->site_name,
            'site_email'    => $request->site_email,
            'site_address'  => $request->site_address,
            'facebook'  => $request->facebook,
            'twitter'   => $request->twitter,
            'linkedin'    => $request->linkedin,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
        );

        if($request->hasFile('logo'))
        {
            $logo = $request->logo;

            $file_name  = 'Logo' . time() . '.' . $logo->getClientOriginalExtension();
            $base_dir = public_path() . '/logos';
            $db_location = 'logos/' . $file_name;
            $location   = $base_dir . '/' . $file_name;

            if(!file_exists($base_dir))
            {
                mkdir($base_dir, 666, true);
            }
            Image::make($logo)->resize(207, 57, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location);

            $data['logo']  = $db_location;
        }

        $validator = \Validator::make($data, [
            'hotline'   => 'nullable|string|max:20',
            'hotline2'   => 'nullable|string|max:20',
            'site_name' => 'nullable|string|max:100',
            'site_email'    => 'nullable|string|max:100',
            'site_address'  => 'nullable|string',
            'facebook'  => 'nullable|string|max:100',
            'twitter'   => 'nullable|string|max:100',
            'linkedin'    => 'nullable|string|max:100',
            'instagram' => 'nullable|string|max:100',
            'youtube' => 'nullable|string|max:100',

        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $site_config = \App\SiteSetting::find(1);

        if($site_config)
        {
            Session::flash('success', 'Site details successfully updated.');
            $site_config->update($data);
        }
        else
        {
            Session::flash('success', 'Site details successfully created.');
            \App\SiteSetting::create($data);
        }
        return redirect()->back();
    }


    public function InfluencerReq()
    {

         $activepromos = JoinInfluencer::orderBy('id', 'desc')->where('status', 0)->get();
         $messages    = ContactMessage::where('status', 0)->count();
         $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();

        return view('cms.influencers', compact(['activepromos', 'messages', 'contacts']));
    }

    public function WithdrawerRequests()
    {

         $activepromos = WalletTransaction::orderBy('id', 'desc')->where('status', 0)->get();
         $messages    = ContactMessage::where('status', 0)->count();
         $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();

        return view('cms.withdrawer_requests', compact(['activepromos', 'messages', 'contacts']));
    }

    public function PaidWithdrawer()
    {

        $activepromos = WalletTransaction::orderBy('id', 'desc')->where('status', 1)->get();
         $messages    = ContactMessage::where('status', 0)->count();
         $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();

        return view('cms.paid_withdrawer_requests', compact(['activepromos', 'messages', 'contacts']));
    }

    public function SentHistory()
    {

        $gifts_sent = TransferTransaction::where('sender_id', auth()->user()->id)
        ->with(['receiver'])
        ->orderBy('id', 'DESC')
        ->get();

$gifts_received = TransferTransaction::where('receiver_id', auth()->user()->id)
            ->with(['initiator'])
            ->orderBy('id', 'DESC')
            ->get();

         $messages    = ContactMessage::where('status', 0)->count();
         $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();

               return view('cms.user_to_user_transfer')->with([
            'messages' => $messages,
            'gifts_received' => $gifts_received,
            'gifts_sent' => $gifts_sent,
            'contacts' => $contacts

        ]);
    }

    public function ReceiveHistory()
    {

        $gifts_sent = TransferTransaction::where('sender_id', auth()->user()->id)
        ->with(['receiver'])
        ->orderBy('id', 'DESC')
        ->get();

$gifts_received = TransferTransaction::where('receiver_id', auth()->user()->id)
            ->with(['initiator'])
            ->orderBy('id', 'DESC')
            ->get();

         $messages    = ContactMessage::where('status', 0)->count();
         $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();

               return view('cms.user_receive_history')->with([
            'messages' => $messages,
            'gifts_received' => $gifts_received,
            'gifts_sent' => $gifts_sent,
            'contacts' => $contacts

        ]);
    }

    public function UserBalances()
    {

         $activepromos = Wallet::orderBy('id', 'desc')->get();
         $messages    = ContactMessage::where('status', 0)->count();
         $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();

        return view('cms.all_users_balances', compact(['activepromos', 'messages', 'contacts']));
    }


    public function AllUsersList()
    {

         $activepromos = User::orderBy('id', 'desc')->get();
         $messages    = ContactMessage::where('status', 0)->count();
         $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();

        return view('cms.all-users', compact(['activepromos', 'messages', 'contacts']));
    }

    public function VerifiedUsers()
    {

         $activepromos = User::orderBy('id', 'desc')->where('verified', 1)->get();
         $messages    = ContactMessage::where('status', 0)->count();
         $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();
        return view('cms.verified-users', compact(['activepromos', 'messages', 'contacts']));
    }

    public function UnverifiedUsers()
    {

        $activepromos = User::orderBy('id', 'desc')->where('verified', 0)->get();
        $messages    = ContactMessage::where('status', 0)->count();
        $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();
        return view('cms.unverified-users', compact(['activepromos', 'messages', 'contacts']));
    }


    public function ActivePromo()
    {

         $activepromos = Promotion::orderBy('id', 'desc')->where('status', 0)->get();
         $messages    = ContactMessage::where('status', 0)->count();
         $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();

        return view('cms.active-promo', compact(['activepromos', 'messages', 'contacts']));
    }

    public function AddPromo()
    {

        $messages    = ContactMessage::where('status', 0)->count();
        $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();

        return view('cms.add-promo', compact(['contacts', 'messages']));
    }



    public function ClosedPromo()
    {

        $activepromos = Promotion::orderBy('id', 'desc')->where('status', 1)->get();
        $messages    = ContactMessage::where('status', 0)->count();
        $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();

        return view('cms.closed-promo', compact(['contacts', 'messages', 'activepromos']));
    }


    public function AllPromos()
    {

        $activepromos = Promotion::orderBy('id', 'desc')->get();
          $messages    = ContactMessage::where('status', 0)->count();
         $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();

        return view('cms.all-promos', compact(['contacts', 'messages', 'activepromos']));
    }


            public function Promotion ()
    {

         $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();
         $messages    = ContactMessage::where('status', 0)->count();
         $faqs = Promotion::orderBy('id', 'desc')->get();


        return view('cms.promotions', compact(['contacts', 'messages', 'faqs']));
    }

        public function AdminDailytASK()
    {

         $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();
         $messages    = ContactMessage::where('status', 0)->count();
        $events = DailyTask::orderBy('id', 'desc')->get();

        return view('cms.dailytask', compact(['contacts', 'messages', 'events']));
    }


        public function DailyTaskDetails($slug)
    {
        $property = Promotion::where('slug', $slug)->first();
          $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();
        $messages    = ContactMessage::where('status', 0)->count();

        return view('cms.dailytaskdetails' , compact('property', 'contacts', 'messages'));
    }


    public function AdminContact()
    {

        $messages    = ContactMessage::where('status', 0)->count();
        $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();

        return view('cms.contact', compact(['contacts', 'messages']));
    }

    public function AdvertRequest ()
    {

         $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();
         $messages    = ContactMessage::where('status', 0)->count();
        $usertasks = RequestAdvert::orderBy('id', 'desc')->get();

        return view('cms.advert_request', compact(['messages', 'usertasks', 'contacts']));
    }


    public function AdminTask ()
    {

        $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();
        $messages    = ContactMessage::where('status', 0)->count();
        $usertasks = SubmitTask::orderBy('id', 'desc')->get();

        return view('cms.usertask', compact(['messages', 'usertasks', 'contacts']));
    }

    public function PendingTasks(){
         $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();
         $messages    = ContactMessage::where('status', 0)->count();
        $usertasks = SubmitTask::orderBy('id', 'desc')->where('status', 0)->get();

        return view('cms.pendingtask', compact(['messages', 'usertasks', 'contacts']));
    }
    
    public function UploadedPOP(){
        $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();
        $messages    = ContactMessage::where('status', 0)->count();
        $usertasks = SubmitTask::orderBy('id', 'desc')->get();
        $uploadedpop = UploadPOP::orderBy('id')->where('status', 0)->get();

        return view('cms.proofofpaymentusers', compact(['messages', 'usertasks', 'contacts', 'uploadedpop']));//
    }
    
    public function UploadedPOPAccepted(){
        $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();
        $messages    = ContactMessage::where('status', 0)->count();
        $usertasks = SubmitTask::orderBy('id', 'desc')->get();
        $uploadedpop = UploadPOP::orderBy('id')->where('status', 1)->get();

        return view('cms.proofofpaymentusersaccepted', compact(['messages', 'usertasks', 'contacts', 'uploadedpop']));//
    }
    
    public function UploadedPOPRejected(){
        $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();
        $messages    = ContactMessage::where('status', 0)->count();
        $usertasks = SubmitTask::orderBy('id', 'desc')->get();
        $uploadedpop = UploadPOP::orderBy('id')->where('status', 2)->get();

        return view('cms.proofofpaymentusersrejected', compact(['messages', 'usertasks', 'contacts', 'uploadedpop']));//
    }

    public function ApprovedTasks()
    {

         $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();
         $messages    = ContactMessage::where('status', 0)->count();
        $usertasks = SubmitTask::orderBy('id', 'desc')->where('status', 1)->get();

        return view('cms.approvedtask', compact(['messages', 'usertasks', 'contacts']));
    }

    public function DeclinedTasks ()
    {

         $contacts = ContactMessage::orderBy('id', 'desc')->where('status', 0)->get();
         $messages    = ContactMessage::where('status', 0)->count();
        $usertasks = SubmitTask::orderBy('id', 'desc')->where('status', 2)->get();

        return view('cms.declinedtask', compact(['messages', 'usertasks', 'contacts']));
    }

            public function AdminTaskDetails($slug)
    {
        $property = SubmitTask::where('task_slug', $slug)->first();
        $contacts = ContactMessage::orderBy('id', 'desc')->get();
        $messages    = ContactMessage::count();


        return view('cms.taskdetails' , compact('property', 'contacts', 'messages'));
    }




    public function deleteContactMessage($id)
    {
        $contacts = ContactMessage::find($id);

        if($contacts) {
            $contacts->delete();
            return response()->json("200");
        }
        return response()->json("404");
    }


    public function SavePromo4(Request $request)
    {
        $request->validate([
            'title' =>'required|string',
            'image' =>'required',
            'image.*' => 'mimes:jpeg,png,jpg,gif,svg|max:5000'
        ]);


        $image = $request->file('image');
        $slug  = str_slug($request->title);

        $total_files = count($request->file('image'));

        foreach ($request->file('image') as $file) {
            // rename & upload files to uploads folder
            $name = uniqid() . '_' . time(). '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/promotions';
            $file->move($path, $name);

            // store in db
            $ref = str_random(10);

            $fileUpload = new Promotion();
            $fileUpload->image = $name;
            $fileUpload->reference = $ref;
            $fileUpload->description = $request->description;
            $fileUpload->status = 0;
            $fileUpload->payment     = $request->payment;
            $fileUpload->buttontype     = $request->buttontype;
            $fileUpload->slug     = $slug;
            $fileUpload->type     = $request->type;
            $fileUpload->title     = $request->title;
            $fileUpload->save();
        }

        Session::flash('success', 'Promo Added Successfully');
        return redirect()->back();
    }

    public function SavePromo(Request $request)
    {

        $request->validate([
            'title'                    => ['required', 'string'],
            'image'                   => ['required', 'mimes:jpg,bmp,png,jpeg,svg,gif|max:5000'],
            'video'                    => ['nullable', 'mimes:avi,mp4'],
        ]);

        $video = null;

        $ref = str_random(10);

        $image = $this->upload_image($request->image);


        // upload video
        if ($request->video != '') {

            try {
                $video_path       = $request->video->store('public/promotion_videos');
                $video_path_parts = pathinfo($video_path);
                $video            = $video_path_parts['filename'] . '.' . $video_path_parts['extension'];
            } catch (\Exception $th) {
                //throw $th;
            }
        }

        $ref = str_random(10);
        $slug  = str_slug($request->title);

        $new_complain = Promotion::create(
            [
                'title'                    => $request->title,
                'type'                    => $request->type,
                'description'              => $request->description,
                'buttontype'                  => $request->buttontype,
                'image'                    => $image,
                'video'                    => $video,
                'slug'                    => $slug,
                'payment'                 => $request->payment,
                'reference'                => $ref,
                'status'               => 0,
            ]
        );

        if ($new_complain) {

            Session::flash('success', 'Promotion added successfully');
            return redirect()->back();
        }
    }

    public function upload_image($image)
    {
        if ($image != '') {
            $original_name = $image->getClientOriginalName(); //get image original name
            $new_name      = md5(microtime() . $original_name) . '.' . 'png';  //generate new name for the image
            $make_image    = Image::make($image->getRealPath()); // read image from temporary file
            try {
                $make_image->save('storage/promotion_photos/' . $new_name, 60); //upload the image to server
                return $new_name;
            } catch (\Exception $e) {
                // throw $e;
            }
        }

        return null;
    }




       public function destroy ($page, $id) {



        if ($page == 'roles') {

            $delete = Role::find($id);


            if(!$delete)
            {
                abort(404);
            }

            $delete->delete();
            \Session::flash('success', 'Role deleted successfully.');
            return redirect()->back();

        }



            if ($page == 'contacts') {



            $delete = ContactMessage::destroy($id);

            if ($delete == null) {

                return abort(404);

            }

            \Session::flash('success', 'ContactMessage Deleted successfully!');

            return redirect()->back();

        }


        if ($page == 'activepromo') {



            $delete = Promotion::destroy($id);

            if ($delete == null) {

                return abort(404);

            }

            Session::flash('success', 'Promo Deleted successfully!');

            return redirect()->back();

        }

    }




        public function ActivepromoterShow ($id) {
        $post = Promotion::findorfail($id);
        return $post;
    }

    public function ReopenShow ($id) {
        $post = Promotion::findorfail($id);
        return $post;
    }

        public function Usertaskshow ($id) {
        $post = UserTask::findorfail($id);
        return $post;
    }


    public function Approveusertaskshow ($id) {
        $post = SubmitTask::findorfail($id);
        return $post;
    }

    public function Rejectusertaskshow ($id) {
        $post = SubmitTask::findorfail($id);
        return $post;
    }
    
    public function ApprovePaymentShow ($id) {
        $post = UploadPOP::findorfail($id);
        return $post;//return redirect()->back();//
    }

    public function RejectPaymentShow ($id) {
        $post = UploadPOP::findorfail($id);
        return $post;//return redirect()->back();//
    }


        public function contactshow ($id) {
        $post = ContactMessage::findorfail($id);
        return $post;
    }


    public function PayUserShow ($id) {
        $post = WalletTransaction::findorfail($id);
        return $post;
    }

    public function updatewalletShow ($id) {
        $post = Wallet::findorfail($id);
        return $post;
    }







    public function allUsers() {

        $roles  = \App\Role::all();
        $admins = \App\Admin::all();
        $site = \App\SiteSetting::first();
        $contacts = ContactMessage::orderBy('id', 'desc')->get();
        $messages    = ContactMessage::count();


        return view('cms.users', [
            'roles'     =>  $roles,
            'admins'    =>  $admins,
            'site'      =>  $site,
            'messages'      =>  $messages,
            'contacts'      =>  $contacts


        ]);
    }

    public function createAccount(Request $request) {
        $data = array(
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'password'  => Hash::make($request->password),
            'role_id'   =>  $request->role_id,
        );

        $validator = \Validator::make($request->all(), [
            'name'      =>  'required|string|max:191',
            'email'     =>  'required|string|email|max:191|unique:users',
            'password'  =>  'required|string|min:6|confirmed',
            'role_id'   =>  'required|numeric'
        ], [
            'role_id.required'  =>  'You need to assign a role to this user!'
        ]);

        if($validator->fails()) {
            Session::flash('fail', 'Account could not be created!');
            return redirect()->back()->withErrors($validator);
        }

        \App\Admin::create($data);
        Session::flash('success', 'Admin account successfully created for: ' . $data['name']);

        return redirect()->back();
    }

    public function editAccount(Request $request, $id) {
        $admin = \App\Admin::find($id);
        $roles = \App\Role::all();
        $site = \App\SiteSetting::first();
        $contacts = ContactMessage::orderBy('id', 'desc')->get();
        $messages    = ContactMessage::count();

        return view('cms.users_edit', [
            'admin' =>  $admin,
            'roles' =>  $roles,
            'site'      =>  $site,
            'messages'      =>  $messages,
            'contacts'      =>  $contacts
        ]);
    }

    public function updateAccount(Request $request) {
        $data = array(
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'role_id'   =>  $request->role_id,
        );

        $validator = \Validator::make($request->all(), [
            'name'      =>  'required|string|max:191',
            'email'     =>  'required|string|email|max:191',
            'role_id'   =>  'required|numeric'
        ], [
            'role_id.required'  =>  'You need to assign a role to this user!'
        ]);

        if($validator->fails()) {
            Session::flash('fail', 'Account could not be created!');
            return redirect()->back()->withErrors($validator);
        }

        $admin = \App\Admin::find($request->id);
        $admin->update($data);
        Session::flash('success', 'Admin account successfully updated.');
        return redirect()->route('cms.users.index');
    }
    public function deleteAccount ($id) {
        \App\Admin::destroy($id);
        Session::flash('success', 'Admin Deleted successfully!');
        return redirect()->back();
    }

    public function roleDestroy ($id) {
        \App\Role::destroy($id);
        Session::flash('success', 'Role Deleted successfully!');
        return redirect()->back();
    }


    public function roles(Request $request) {


        $roles = \App\Role::all();
        $site = \App\SiteSetting::first();
        $contacts = ContactMessage::orderBy('id', 'desc')->get();
        $messages    = ContactMessage::count();
        if($request->query('role')) {
            $id = $request->query('role');
            $role = \App\Role::find($id);
            if(count($role) <= 0) {
                \Session::flash('error', 'Role not found!');
                return redirect()->back();
            }
            $permissions = \App\Permission::where('role_id', $role->id)->first();
            $site = \App\SiteSetting::first();
            $contacts = ContactMessage::orderBy('id', 'desc')->get();
            $messages    = ContactMessage::count();


            return view('cms.roles', [
                'roles'         =>  $roles,
                'permission'    =>  $permissions,
                'site'      =>  $site,
                'messages'      =>  $messages,
                'contacts'      =>  $contacts
            ]);
        }

            return view('cms.roles', [
            'roles' =>  $roles,
            'site'      =>  $site,
            'messages'      =>  $messages,
            'contacts'      =>  $contacts


        ]);
    }



    public function createRole(Request $request) {
        $data = array(
            'title'         =>  $request->title,
            'description'   =>  $request->description

        );

        $validator = \Validator::make($request->all(), [
            'title'         =>  'required|string|max:191',
            'description'   =>  'nullable|string',
        ]);

        if($validator->fails()) {
            Session::flash('fail', 'Role could not be created!');
            return redirect()->back()->withErrors($validator);
        }

        $role = \App\Role::create($data);
        $permissions = array(
            'role_id'              =>  $role->id,
            'home_component'          =>  "no",
            'demo_request'        =>  "no",
            'service'           =>  "no",
            'product'       =>  "no",
            'settings'        =>  "no",
            'pages'     =>  "no",
            'careers'           =>  "no",
            'user_module'            =>  "no",

        );
        \App\Permission::create($permissions);
        Session::flash('success', 'New role successfully created. You can now configure permission for role: ' . $data['title']);
        return redirect()->back();
    }



        public function PromoUpdate(Request $request, $id) {

            $data = array(
                'status'   => $request->status,

            );

            $update = Promotion::findorfail($request->id);

            $update->update($data);

           Session::flash('success', ' Promo successfully closed.');
            return redirect()
            ->back();

        }


        public function ReopenPromo(Request $request, $id) {

            $data = array(
                'status'   => $request->status,

            );

            $update = Promotion::findorfail($request->id);

            $update->update($data);

           Session::flash('success', 'Promo Re-Opened successfully.');
            return redirect()
            ->back();

        }

        public function ClosePromoUpdate(Request $request, $id) {

            $data = array(
                'status'   => $request->status,

            );

            $update = Promotion::findorfail($request->id);

            $update->update($data);

           Session::flash('success', 'Promo Closed successfully.');
            return redirect()
            ->back();

        }

        public function ContactUpdate(Request $request, $id) {

            $data = array(
                'status'   => $request->status,

            );

            $update = ContactMessage::findorfail($request->id);

            $update->update($data);

           Session::flash('success', 'Message read successfully.');
            return redirect()
            ->back();

        }


        public function ApproveUserTask(Request $request, $id) {

            $data = array(
                'status'   => $request->status,

            );

            $update = SubmitTask::findorfail($request->id);

            $update->update($data);

           Session::flash('success', 'User Task Approved successfully.');
            return redirect()
            ->back();

        }

        public function RejectUserTask(Request $request, $id) {

            $data = array(
                'status'   => $request->status,

            );

            $update = SubmitTask::findorfail($request->id);

            $update->update($data);

           Session::flash('success', 'User Task Rejected successfully.');
            return redirect()
            ->back();

        }
        
        public function ApprovePayment(Request $request, $id) {

            $data = array( 'status' => $request->status, );
            $update = UploadPOP::findorfail($request->id);
            $update->update($data);
            
            $data1 = array( 'paid' => 'yes', );
            $update1 = User::findorfail($request->userid);
            $update1->update($data1);
            
            Session::flash('success', 'Payment Approved successfully.');
            return redirect()->back();//return view('cms.proofofpaymentusers');//
        }

        public function RejectPayment(Request $request, $id) {

            $data = array( 'status' => $request->status, );
            $update = UploadPOP::findorfail($request->id);
            $update->update($data);
            
            $data1 = array( 'paid' => 'no', );
            $update1 = User::findorfail($request->userid);
            $update1->update($data1);
            
            Session::flash('danger', 'Payment Rejected successfully.');
            return redirect()>back();//return view('cms.proofofpaymentusers');//
        }

        public function PayUserUpdate(Request $request, $id) {

            $data = array(
                'status'   => $request->status,

            );

            $update = WalletTransaction::findorfail($request->id);

            $update->update($data);

           Session::flash('success', 'User Paid successfully.');
            return redirect()
            ->back();

        }

        public function updatewalletUpdate(Request $request, $id) {

            $data = array(
                'naira_wallet'   => $request->naira_wallet,
                'lat_wallet'   => $request->lat_wallet,


            );

            $update = Wallet::findorfail($request->id);

            $update->update($data);

           Session::flash('success', 'User Wallet Updated successfully.');
            return redirect()
            ->back();

        }

}
