       <!-- Start Footer Area -->
       <section class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h3>Contact Info</h3>

                        <ul class="footer-contact-info">
                            <li>
                                <i class="flaticon-phone-call"></i>
                                <span>Mon to Sun : 8:00AM - 8:00PM</span>
                                <a target="_blank" href="tel:{{$site->hotline}}">{{$site->hotline}}</a>
                            </li>
                            <li>
                                <i class="flaticon-email"></i>
                                <span>Do You Have a Question?</span>
                                <a target='_blank' href="mailto:{{$site->site_email}}"><span class="__cf_email__" data-cfemail="4f272a2323200f2b2628262e2b2b612c20">{{$site->site_email}}</span></a>
                            </li>
                            <li>
                                <i class="flaticon-social-media"></i>
                                <span>Socials Network</span>

                                <ul class="social">
                                    <li><a target='_blank' href="{{$site->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a target='_blank' href="{{$site->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a target='_blank' href="{{$site->instagram}}"><i class="fab fa-instagram"></i></a></li>
                                    <li><a target='_blank' href="{{$site->youtube}}"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-footer-widget pl-5">
                        <h3>Quick Links</h3>
                        <ul class="footer-quick-links">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{route('faqs')}}"><span>FAQs</span></a></li>
                            <li><a href="{{route('aboutus')}}"><span>About Us</span></a></li>
                            <li><a href="{{route('contact')}}"><span>Contact Us</span></a></li>
                            <li><a href="{{route('advertise')}}">Advertise with us</a></li>
                            <li><a href="{{route('influencer')}}">Earn as Influencer</a></li>
                            <li><a href="{{route('pricing')}}">Our Pricing</a></li>
                            {{-- <li><a href="{{route('projects')}}">Our Projects</a></li> --}}
                            @guest
                            <li><a href="{{route('login')}}"><span>Login</span></a></li>
                            <li><a href="{{route('register')}}"><span>Sign Up</span></a></li>
                            @endguest
                            @auth
                            <li><a href="{{route('dashboard')}}"><span>Dashboard</span></a></li>
                            <li><a href="{{route('logout')}}"><span>Logout</span></a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-footer-widget pl-5">
                        <h3>Whatsapp Support (8:00AM - 8:00PM)</h3>

                        <ul class="footer-contact-info">
                            <li>
                                <i class="flaticon-phone-call"></i>
                                <span>Contact For Adverts</span>
                                <a target="_blank" href="https://wa.me/+2349046164015/?text=Good%20day.%20I%20am%20interested%20in%20promoting%20my%20business%20and%20services%20with%20lilyadd" target="_blank">Mr Lanre </a><br>
                            </li>
                            <!-- <li>
                                <i class="flaticon-phone-call"></i>
                                <span>DGT Issues</span>
                                <a target="_blank" href="https://bit.ly/3c5qzNg">Mr Osas</a>
                            </li> -->
                            <li>
                                <i class="flaticon-phone-call"></i>
                                <span>Bugs/ Technical Support</span>
                                <a target="_blank" href="https://wa.me/+2348155832958/?text=Good%20day.%20I%20am%20interested%20in%20promoting%20my%20business%20and%20services%20with%20lilyadd">Bassey</a>
                            </li>
                            <li>
                                <i class="flaticon-phone-call"></i>
                                <span>Social Media Verification</span>
                                <a target="_blank" href="https://wa.me/+2349046164015/?text=Good%20day.%20I%20am%20interested%20in%20promoting%20my%20business%20and%20services%20with%20lilyadd"> Daniela</a>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
            <div class="copyright-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6 col-md-6">
                        <p>© {{date('Y')}} {{$site->site_name}}. All Rights Reserved.</p>
                    </div>

                    <div class="col-lg-6 col-sm-6 col-md-6">
                        <ul>
                            <li><a href="{{route('terms')}}">Terms & Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Footer Area -->
