<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('api/get-city-list/{state_name}','HomeController@getCityList');

Route::get('/', 'HomeController@index');
Route::get('/logout', 'HomeController@logout')->name('logout');
Route::get('promote-for-us', 'HomeController@Promote')->name('promote');
Route::get('booster-plan', 'HomeController@Boosterplan')->name('boosterplan');
Route::get('our-packages-for-clients', 'HomeController@Package')->name('packages');
Route::get('all-services', 'HomeController@Services')->name('services');
Route::get('project/{slug}', 'HomeController@ProjectDetails')->name('project.details');
Route::get('frequently-asked-questions', 'HomeController@FAQ')->name('faqs');
Route::get('about-us', 'HomeController@AboutUs')->name('aboutus');
Route::get('contact-us', 'HomeController@Contact')->name('contact');
Route::get('privacy-policy', 'HomeController@Privacy')->name('privacy');
Route::get('terms-of-use', 'HomeController@Terms')->name('terms');

Route::get('influencer/{slug}', 'HomeController@influencerDetails')->name('influencers.details');

Route::get('advertisement', 'HomeController@Advert')->name('advertise');
Route::get('earn-as-influencer', 'HomeController@Influencer')->name('influencer');
Route::get('our-pricing', 'HomeController@Pricing')->name('pricing');
Route::get('projects', 'HomeController@Projects')->name('projects');


Route::get('login/{provider}', 'SocialController@redirect');
Route::get('login/{provider}/callback', 'SocialController@Callback');

Route::get('login/twitter', 'SocialController@twitterRedirect');
Route::get('login/twitter/callback', 'SocialController@TwitterCallback');
Route::get('login/facebook', 'SocialController@facebookRedirect');
Route::get('login/facebook/callback', 'SocialController@FacebookCallback');
Route::get('login/google', 'SocialController@googleRedirect');
Route::get('login/google/callback', 'SocialController@GoogleCallback');

Route::post('join-innfluencer', 'HomeController@JoinInfluencer')->name('become.influencer');



//error psge routes***
route::get('404', ['as'=> '404', 'uses' =>
'ErrorController@notfound']);
route::get('500', ['as'=> '505', 'uses' =>
'ErrorController@fatal']);

Route::resource('contact', 'ContactController');
Route::post('contact-us-post', [
    'uses'  =>  'HomeController@postMessage',
    'as'    =>  'site.contact.post'
]);




Route::get('/paymentsummary', 'PaymentController@PaymentSummary')->name('paymentsummary');
//card payment
Route::get('card-payment-callback', 'PaymentController@paymentCallBack')->name('payment.callback');
Route::post('wallet/card-payment', 'PaymentController@payWithCard')->name('payment.card-payment');
Route::get('paywithcard/invoice/{id}', 'PaymentController@payWithCardSlip')->name('paywithcard.invoice');
Route::post('pay', 'PaymentController@redirectToGateway')->name('pay');
Route::post('paystarter', 'PaymentController@redirectToGateway')->name('paystarter');
Route::post('payextended', 'PaymentController@redirectToGateway')->name('payextended');

// //bank transfer
// Route::get('/paymentslip/{id}', 'PaymentController@ConfirmationSlip')->name('paymentslip');




Route::get('dashboard', 'DashboardController@index')->name('dashboard');

//*** user dashboard routes */
Route::group(['middleware' => ['auth']], function () {

    Route::get('my-wallet', 'DashboardController@Wallet')->name('dashboard.wallet');
    Route::get('dashboard/profile', 'DashboardController@showProfile')->name('profile');
    Route::get('dashboard/become-promoter', 'DashboardController@BecomePromoter')->name('dashboard.promoter');
    Route::get('dashboard/all-task', 'DashboardController@AllTask')->name('dashboard.alltasks');
    Route::post('submit-task', 'DashboardController@SubmitTask')->name('submit.task');
    Route::get('dashboard/daily-task', 'DashboardController@DailyTask')->name('dashboard.dailytask');
    Route::get('daily-task-details/{slug}', 'DashboardController@DailyTaskDetails')->name('dashboard.dailytaskdetails');
    Route::get('my-task-details/{slug}', 'DashboardController@MyTaskDetails')->name('dashboard.mytaskdetails');
    
    Route::get('dashboard/proofofpayment', 'DashboardController@UploadPOPPage')->name('dashboard.proofofpayment');
    Route::post('dashboard/proofofpayment', 'DashboardController@UploadPOP')->name('submit.uploadproofofpayment');

    Route::get('completed/tasks', 'DashboardController@CompleteTask')->name('completedtasks');
    Route::get('pending/tasks', 'DashboardController@PendingTask')->name('pendingtasks');
    Route::get('rejected/tasks', 'DashboardController@RejectedTask')->name('rejectedtasks');


    Route::get('dashboard/noticeboard', 'DashboardController@NoticeBoard')->name('noticeboard');
    Route::get('noticeboard/{slug}', 'DashboardController@NoticeBoardDetails')->name('noticeboard.details');

    Route::post('complete-profile', 'DashboardController@updateProfile')->name('profile.update');
    Route::post('update-bank-details', 'DashboardController@updateBank')->name('bank.update');
    Route::post('change-password', 'DashboardController@changePassword')->name('change.password');

    Route::post('send-lat', 'PaymentController@SendUserLat')->name('send.lat');
    Route::post('withdraw-money', 'PaymentController@WithdrawMoney')->name('withdraw.money');


});


// Admin Login Routes ***
Route::prefix('admin')->group(function () {
    Route::get('/login', 'admin\AdminLoginController@login')->name('admin.login');
    Route::get('/logout', 'admin\AdminLoginController@logout')->name('admin.logout');
    Route::post('/login', 'admin\AdminLoginController@loginAdmin')->name('admin.login.submit');
    Route::get('cms', 'admin\AdminController@adminIndex')->name('cms.index');
});


Route::prefix('cms')->group(function () {
    Route::get('advert-payments', 'admin\AdminController@AdvertRequest')->name('cms.advertpayments');
    Route::get('site-settings', 'admin\AdminController@site_configuration')->name('cms.site.settings');
    Route::put('site-settings', 'admin\AdminController@InfluencersRequest')->name('cms.influencers');

    Route::get('influencers-requests', 'admin\AdminController@InfluencerReq')->name('cms.influencers');


//    ***pages routes***
    Route::get('contact', 'admin\AdminController@AdminContact')->name('cms.contact');
    Route::get('daily-task', 'admin\AdminController@AdminDailytASK')->name('cms.dailytask');
    Route::get('daily-task-details/{slug}', 'admin\AdminController@DailyTaskDetails')->name('cms.dailytaskdetails');


    Route::put('contacts/{id}', 'admin\AdminController@ContactUpdate')->name('cms.contacts.update');
    Route::get('contacts/{id}', 'admin\AdminController@ContactShow');


    Route::get('pending-task', 'admin\AdminController@PendingTasks')->name('cms.pendingtasks');
    Route::get('approved-task', 'admin\AdminController@ApprovedTasks')->name('cms.approvedtasks');
    Route::get('declined-tasks', 'admin\AdminController@DeclinedTasks')->name('cms.declinedtasks');
    Route::get('users-task', 'admin\AdminController@AdminTask')->name('cms.usertask');

    Route::get('user-task-details/{slug}', 'admin\AdminController@AdminTaskDetails')->name('cms.usertaskdetails');

    Route::put('approveusertask/{id}', 'admin\AdminController@ApproveUserTask')->name('cms.approveusertask.update');
    Route::get('approveusertask/{id}', 'admin\AdminController@Approveusertaskshow');
    Route::put('rejecttask/{id}', 'admin\AdminController@RejectUserTask')->name('cms.rejecttask.update');
    Route::get('rejecttask/{id}', 'admin\AdminController@Rejectusertaskshow');
    
    
    
    Route::put('approvepayment/{id}', 'admin\AdminController@ApprovePayment')->name('cms.approvepayment.update');
    Route::get('approvepayment/{id}', 'admin\AdminController@ApprovePaymentShow');//->name('cms.approvepayment');
    Route::put('rejectpayment/{id}', 'admin\AdminController@RejectPayment')->name('cms.rejectpayment.update');
    Route::get('rejectpayment/{id}', 'admin\AdminController@RejectPaymentShow');//->name('cms.rejectpayment');
    
    

    Route::get('activie-promo', 'admin\AdminController@ActivePromo')->name('cms.activepromo');
    Route::get('closed-promo', 'admin\AdminController@ClosedPromo')->name('cms.closedpromo');
    Route::get('all-promos', 'admin\AdminController@AllPromos')->name('cms.promos');
    Route::get('add-new-promo', 'admin\AdminController@AddPromo')->name('cms.addpromo');

    Route::get('all-users', 'admin\AdminController@AllUsersList')->name('cms.allusers');
    Route::get('verified-users', 'admin\AdminController@VerifiedUsers')->name('cms.verifiedusers');
    Route::get('unverified-users', 'admin\AdminController@UnverifiedUsers')->name('cms.unverifiedusers');
    
    Route::get('proofofpamentusers', 'admin\AdminController@UploadedPOP')->name('cms.proofofpaymentusers');
    Route::get('proof-of-payments-accepted', 'admin\AdminController@UploadedPOPAccepted')->name('cms.proofofpaymentusersaccepted');
    Route::get('proof-of-payments-rejected', 'admin\AdminController@UploadedPOPRejected')->name('cms.proofofpaymentusersrejected');

    Route::get('withdrawer-requests', 'admin\AdminController@WithdrawerRequests')->name('cms.withdrawerrequests');
    Route::get('paid-withdrawer-requests', 'admin\AdminController@PaidWithdrawer')->name('cms.paidwithdrawers');
    Route::get('user-sent-history', 'admin\AdminController@SentHistory')->name('cms.senthistory');
    Route::get('user-receive-history', 'admin\AdminController@ReceiveHistory')->name('cms.receivehistory');
    Route::get('all-user-balances', 'admin\AdminController@UserBalances')->name('cms.userbalances');
    Route::put('payuser/{id}', 'admin\AdminController@PayUserUpdate')->name('cms.payuser.update');
    Route::get('payuser/{id}', 'admin\AdminController@PayUserShow');
    Route::put('updatewallet/{id}', 'admin\AdminController@updatewalletUpdate')->name('cms.updatewallet.update');
    Route::get('updatewallet/{id}', 'admin\AdminController@updatewalletShow');

    Route::get('all-transactions', 'admin\AdminController@AllUserTransaction')->name('cms.allusertransactions');
    Route::get('users-lat-transactions', 'admin\AdminController@UserLatTransaction')->name('cms.userlattransactions');
    Route::get('users-naira-transactions', 'admin\AdminController@UserNairaTransaction')->name('cms.usernairatransactions');


    // **action routes


    Route::post('save-promo', 'admin\AdminController@SavePromo')->name('cms.savepromo');
    Route::put('activepromo/{id}', 'admin\AdminController@ClosePromoUpdate')->name('cms.activepromo.update');
    Route::put('openpromo/{id}', 'admin\AdminController@ReopenPromo')->name('cmsreopenpromo.update');
    Route::get('openpromo/{id}', 'admin\AdminController@ReopenShow');
    Route::get('activepromo/{id}', 'admin\AdminController@ActivepromoterShow');

    Route::put('usertask/{id}', 'admin\AdminController@UsertaskUpdate')->name('cms.usertask.update');
    Route::get('usertask/{id}', 'admin\AdminController@Usertaskshow');


    Route::put('closepromo/{id}', 'admin\AdminController@ClosePromoUpdate')->name('cms.closepromo.update');
    Route::get('closepromo/{id}', 'admin\AdminController@ClosePromoUpdateShow');



    Route::get('about/{page}/{id}', 'admin\AdminController@show')->name('cms.show');
    Route::post('about/{page}', 'admin\AdminController@store')->name('cms.store');
    Route::get('delete/{page}/{id}', 'admin\AdminController@destroy')->name('cms.destroy');

    Route::get('sitesettings', 'admin\AdminController@site_configuration')->name('cms.settings');
    Route::put('site-settings', 'admin\AdminController@site_configuration_update')->name('cms.site-settings.update');
    Route::put('slider/{slider}', 'admin\AdminController@sliders')->name('admin.slider.update');
    Route::get('delete/{slider}', 'admin\AdminController@deleteslider')->name('admin.slider.delete');
    Route::get('explore/{page}/{id}', 'admin\AdminController@show')->name('cms.show');

});


        //create user routes ***
        Route::redirect('users', 'users/index', 301);
        Route::get('all/roles', 'admin\AdminController@roles')->name('cms.user.roles');
        Route::post('roles', 'admin\AdminController@createRole')->name('cms.roles.store');
        Route::post('roles/roles/permissions/update', 'admin\AdminController@permissionUpdate')->name('cms.roles.permissions.update');
        Route::get('users/index', 'admin\AdminController@allUsers')->name('cms.users.index');
        Route::post('users/store', 'admin\AdminController@createAccount')->name('cms.users.store');
        Route::get('users/edit/{id}', 'admin\AdminController@editAccount')->name('cms.users.edit');
        Route::put('users/update', 'admin\AdminController@updateAccount')->name('cms.users.update');
        Route::get('users/delete/{id}', 'admin\AdminController@deleteAccount')->name('cms.users.delete');
        Route::get('roles/delete/{id}', 'admin\AdminController@roleDestroy')->name('roles.delete');





        Route::get('register', 'HomeController@register')->name('register');
        Route::get('login', 'HomeController@login')->name('login');
        Route::post('register', 'HomeController@RegisterUser')->name('register.user');
        Route::post('login', 'HomeController@LoginUser')->name('login.user');
        Route::get('verify-otp', 'HomeController@VerifyOtp')->name('verifyotp');

        Route::get('forgot-password', 'HomeController@Forgotpassword')->name('forgotpassword.password');
        Route::get('verify-password-token', 'HomeController@verifyToken')->name('verifypasswordtoken');
        Route::get('reset-password', 'HomeController@resetPassword')->name('resetpassword');



        Route::post('register/verification', 'HomeController@AccountVerification')->name('verification');
        Route::post('forgot_password', 'PasswordResetRequestController@forgotPassword')->name('forgotpassword');
        Route::post('verify_password_token', 'PasswordResetRequestController@verifyToken')->name('verifypassword.token');
        Route::post('password_reset', 'PasswordResetRequestController@resetPassword')->name('passwordreset');


