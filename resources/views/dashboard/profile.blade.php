@extends('layouts.dashboard_main')
@section('title')
My Profile
@endsection
@section('content')

<div class="modal" id="facebook_whatsapp_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center center">
                <h4 class="modal-title" id="categoryModalLabel"><strong>Facebook-Whatsapp</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          <div class="modal-body">
            <div class="justify-content-center">
                <!-- <p> -->
                    <strong>
                        Do well to read the instructions carefully else your account would be deactivated 
                        and all earnings forfeited.
                    </strong>
                <!-- </p> -->
                <p>
                    <input type="radio" checked>
                    You must have a minimum of 500 friends on facebook and 50 whatsapp views. 
                </p>
                <p>
                    <input type="radio" checked>
                    Your profile should be easily accessible by the public. 
                </p>
                <p>
                    <input type="radio" checked>
                    Your facebook profile link is 
                    <a class="text-primary" target="_blank" href="https://facebook.com/--">https://facebook.com/--</a>. 
                    Click on the link to confirm if its your account. 
                    If this is wrong, it means you registered with the wrong facebook username, go and change it.
                </p>
                <p>
                    <input type="radio" checked>
                    Make a post about lillyadd then comment with the first and last letter of your lillyadd username. 
                </p>
                You earn ₦75 for any Facebook-whatsapp promotion performed. 
                Click on the activate button to be able to perform this kind of promotions.
                <br> Clear your cache before clicking on the activate button.
            </div>
          </div>
          <div class="modal-footer">
              <a type="button" data-dismiss="modal">Cancel</a>
              <button id="facebook_premium" type="button" class="btn btn-success activate_premium">Activate</button>
          </div>
        </div>
    </div>
</div>
<div class="modal" id="instagram_whatsapp_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center center">
                <h4 class="modal-title" id="categoryModalLabel"><strong>Instagram-Whatsapp</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          <div class="modal-body">
            <div class="justify-content-center">
                <!-- <p> -->
                    <strong>
                        Do well to read the instructions carefully else your account would be deactivated 
                        and all earnings forfeited.
                    </strong>
                <!-- </p> -->
                <p>
                    <input type="radio" checked>
                    You must have a minimum of 500 followers on instagram and 50 whatsapp views. 
                </p>
                <p>
                    <input type="radio" checked>
                    Your profile should be easily accessible by the public. 
                </p>
                <p>
                    <input type="radio" checked>
                    Your instagram profile link is 
                    <a class="text-primary" target="_blank" href="https://instagram.com/--">https://instagram.com/--</a>. 
                    Click on the link to confirm if its your account. 
                    If this is wrong, it means you registered with the wrong instagram username, go and change it.
                </p>
                <p>
                    <input type="radio" checked>
                    Make a post about lillyadd then comment with the first and last letter of your lillyadd username. 
                </p>
                You earn ₦75 for any Instagram-whatsapp promotion performed. 
                Click on the activate button to be able to perform this kind of promotions.
                <br> Clear your cache before clicking on the activate button.
            </div>
          </div>
          <div class="modal-footer">
              <a type="button" data-dismiss="modal">Cancel</a>
              <button id="instagram_premium" type="button" class="btn btn-success activate_premium">Activate</button>
          </div>
        </div>
    </div>
</div>
<!-- end::Modal -->
        <!-- Start Page Title Area -->
        <div class="page-title-area page-title-bg1">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>Profile</h2>

                            <ul>
                                <li><a href="{{route('dashboard')}}">Home</a></li>
                                <li>Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="shape-img2"><img src="/assets/img/shape/2.svg" alt="image"></div>
            <div class="shape-img3"><img src="/assets/img/shape/3.svg" alt="image"></div>
            <div class="shape-img4"><img src="/assets/img/shape/4.png" alt="image"></div>
            <div class="shape-img5"><img src="/assets/img/shape/5.png" alt="image"></div>
            <div class="shape-img7"><img src="/assets/img/shape/7.png" alt="image"></div>
            <div class="shape-img8"><img src="/assets/img/shape/8.png" alt="image"></div>
            <div class="shape-img9"><img src="/assets/img/shape/9.png" alt="image"></div>
            <div class="shape-img10"><img src="/assets/img/shape/10.png" alt="image"></div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Checkout Area -->
		<section class="checkout-area ptb-100">
            <div class="container">
                <!-- <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="user-actions">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>Returning customer? <a href="#">Click here to login</a></span>
                        </div>
                    </div>
                </div> -->

                <div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12 mb-5">
                            <div class="billing-details">
                                <h3 class="title">Profile Details</h3>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>User Name <span class="required"></span></label>
                                            <input type="text" class="form-control" value="{{Auth::user()->username}}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number <span class="required"></span></label>
                                            <input type="text" class="form-control" value="{{Auth::user()->phone}}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" value="{{Auth::user()->email}}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="billing-details mt-5">
                                <h3 class="title">Social Media Details</h3>
                                <p>
                                    Message Mr Daniel for whatsapp views Verification. For other social media verification, Follow the instructions below. Clear your cache before you activate.<br>
                                    <input type="radio" checked>
                                    Before clicking on the activate button, You must make a post about lillyadd by clicking this yellow link: 
                                    <a class="text-warning" target="_blank" href="#"> Lillyadd link.</a>
                                    Then comment with the first and last letter of your lillyadd username and the last 5 digits of your phone number.
                                    Wait for 48hrs for it to be reviewed.
                                    Note: Your social media accounts must be visible to the public for us to activate you.
                                </p>
                                <p>
                                    <input type="radio" checked>
                                    Only your username is required. Note: Your facebook username is not your name. Go to your facebook profile and get your the username or browse online on how to get your facebook username.
                                </p>
                                <strong> 
                                    For Example: I want to activate my twitter and if my twitter username is iamrasaqqqq, my lillyadd username is rasaq and my phone number is 07026318507.<br>
                                    I go to my twitter account and make the post from this yellow link(click on the link, copy the text and image to post it): <a class="text-warning" target="_blank" href="https://www.lillyadd.co/projects/5f0f06bd0b572540bf56a59f"> lillyadd link.</a><br>
                                    After that comment on the twitter post I made with the first and last letter of my lillyadd username which for me would be "rq" and the last 5 digits of my phone number which for me would be "18507".<br>
                                    Then I will come back here and input my twitter username which for me is iamRasaqqqqq and then click on the activate button.<br>
                                    You are to do that for all the other social media accounts. This is the only way you would be accepted. Still confused? Message Mr Rasaq.<br><br>
                                </strong>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Whatsapp Views <span class="required">Unverified</span></label>
                                            <div id="30">
                                            <select id="whatsapp_views" name="whatsapp_views" class="form-control selected_item">
                                                
                                                    <option value="30"> 30  - 50  views</option>
                                                
                                                    <option value="50"> 50  - 100 views</option>
                                                
                                                    <option value="100"> 100+      views</option>
                                                
                                            </select>
                                            </div>
                                        </div>
                                        <button id="update_whatsapp_views" class="default-btn order-btn pull-right mb-3 update_social">Update</button>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Twitter <span class="required">Unverified</span></label>
                                            <input id="twitter" type="text" class="form-control" value="--">
                                        </div>
                                        
                                            <button id="update_twitter" class="default-btn order-btn pull-right mb-3 update_social">Activate</button>
                                        
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Facebook <span class="required">Unverified</span></label>
                                            <input id="facebook" type="text" class="form-control" value="--">
                                        </div>
                                        
                                            <button id="update_facebook" class="default-btn order-btn pull-right mb-3 update_social">Activate</button>
                                        
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Instagram <span class="required">Unverified</span></label>
                                            <input id="instagram" type="text" class="form-control" value="--">
                                        </div>
                                        
                                            <button id="update_instagram" class="default-btn order-btn pull-right mb-3 update_social">Activate</button>
                                        
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>
                                                Facebook + Whatsapp 
                                                <span class="required">
                                                    Unverified
                                                </span>
                                            </label>
                                        </div>
                                        
                                            <small class="font-italic text-danger">Verify your facebook before you can activate this.</small>
                                        
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>
                                                Instagram + Whatsapp 
                                                <span class="required">
                                                    Unverified
                                                </span>
                                            </label>
                                        </div>
                                        
                                            <small class="font-italic text-danger">Verify your instagram before you can activate this.</small>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="billing-details">
                                <h3 class="title">Other Details</h3>
                                <div class="row">
                                @if ($errors->any())
                              <div class="alert alert-danger">
                                 <ul>
                                    @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                    @endforeach
                                 </ul>
                              </div>
                              @endif
                                <form  method="POST" action="{{route('profile.update')}}">
                                 {{csrf_field()}}
                                 @if(Session::has('successprofile'))
                                 <div class="col-md-12">
                                    <div class="alert alert-success no-b">
                                       <span class="text-semibold"></span> {{ Session::get('successprofile')}}
                                       <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                    </div>
                                 </div>
                                 @endif
                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <label>Gender <span class="required"></span></label>
                                            <select id="gender" name="gender" readonly class="form-control">
                                                <option selected value="male">Male</option>
                                                <option value="female"   >Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Location <span class="required"></span></label>
                                            <div id="">
                                            <select  name="location" readonly class="form-control selected_item">
                                                
                                                    <option value="Abia"> Abia</option>
                                                
                                                    <option value="Adamawa"> Adamawa</option>
                                                
                                                    <option value="Akwa Ibom"> Akwa Ibom</option>
                                                
                                                    <option value="Anambra"> Anambra</option>
                                                
                                                    <option value="Bauchi"> Bauchi</option>
                                                
                                                    <option value="Bayelsa"> Bayelsa</option>
                                                
                                                    <option value="Benue"> Benue</option>
                                                
                                                    <option value="Borno"> Borno</option>
                                                
                                                    <option value="Cross River"> Cross River</option>
                                                
                                                    <option value="Delta"> Delta</option>
                                                
                                                    <option value="Ebonyi"> Ebonyi</option>
                                                
                                                    <option value="Edo"> Edo</option>
                                                
                                                    <option value="Ekiti"> Ekiti</option>
                                                
                                                    <option value="Enugu"> Enugu</option>
                                                
                                                    <option value="FCT - Abuja"> FCT - Abuja</option>
                                                
                                                    <option value="Gombe"> Gombe</option>
                                                
                                                    <option value="Imo"> Imo</option>
                                                
                                                    <option value="Jigawa"> Jigawa</option>
                                                
                                                    <option value="Kaduna"> Kaduna</option>
                                                
                                                    <option value="Kano"> Kano</option>
                                                
                                                    <option value="Katsina"> Katsina</option>
                                                
                                                    <option value="Kebbi"> Kebbi</option>
                                                
                                                    <option value="Kogi"> Kogi</option>
                                                
                                                    <option value="Kwara"> Kwara</option>
                                                
                                                    <option value="Lagos"> Lagos</option>
                                                
                                                    <option value="Nasarawa"> Nasarawa</option>
                                                
                                                    <option value="Niger"> Niger</option>
                                                
                                                    <option value="Ogun"> Ogun</option>
                                                
                                                    <option value="Ondo"> Ondo</option>
                                                
                                                    <option value="Osun"> Osun</option>
                                                
                                                    <option value="Oyo"> Oyo</option>
                                                
                                                    <option value="Plateau"> Plateau</option>
                                                
                                                    <option value="Rivers"> Rivers</option>
                                                
                                                    <option value="Sokoto"> Sokoto</option>
                                                
                                                    <option value="Taraba"> Taraba</option>
                                                
                                                    <option value="Yobe"> Yobe</option>
                                                
                                                    <option value="Zamfara"> Zamfara</option>
                                                
                                            </select>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>Age <span class="required"></span></label>
                                            <input name="age" type="number" class="form-control" value="{{Auth::user()->age}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <button class="default-btn order-btn" type="submit">Update <span></span></button>
                                    </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <div class="billing-details mt-5">
                                <h3 class="title">Security Details</h3>

                                <div class="row">
                                @if ($errors->any())
                              <div class="alert alert-danger">
                                 <ul>
                                    @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                    @endforeach
                                 </ul>
                              </div>
                              @endif
                                <form  method="POST" action="{{route('change.password')}}">
                                 {{csrf_field()}}
                                 @if(Session::has('success'))
                                 <div class="col-md-12">
                                    <div class="alert alert-success no-b">
                                       <span class="text-semibold"></span> {{ Session::get('success')}}
                                       <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                    </div>
                                 </div>
                                 @endif
                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <label>Current Password <span class="required"></span></label>
                                            <code>Make sure you know your current password before changing to a new one</code>
                                            <input type="password" class="form-control" name="password_old" placeholder="********">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <label>New Password <span class="required"></span></label>
                                            <input type="password" class="form-control"  name="password">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirmation">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <button class="default-btn order-btn" type="submit">Update Password <span></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		

@endsection
