@extends('layouts.app')
@section('title')
Pricing
@endsection
@section('content')

        <!-- Start Page Title Area -->
        <div class="page-title-area page-title-bg2">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>Pricing</h2>

                            <ul>
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li>Pricing</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="shape-img2"><img src="assets/img/shape/2.svg" alt="image"></div>
            <div class="shape-img3"><img src="assets/img/shape/3.svg" alt="image"></div>
            <div class="shape-img4"><img src="assets/img/shape/4.png" alt="image"></div>
            <div class="shape-img5"><img src="assets/img/shape/5.png" alt="image"></div>
            <div class="shape-img7"><img src="assets/img/shape/7.png" alt="image"></div>
            <div class="shape-img8"><img src="assets/img/shape/8.png" alt="image"></div>
            <div class="shape-img9"><img src="assets/img/shape/9.png" alt="image"></div>
            <div class="shape-img10"><img src="assets/img/shape/10.png" alt="image"></div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Pricing Area -->
        <section class="pricing-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-pricing-box">
                            <div class="pricing-header">
                                <h3>Basic</h3>
                            </div>

                            <div class="price">
                                <sub class="mr-0">₦</sub>6,000
                                <!-- <sub>/mo</sub> -->
                            </div>

                            <ul class="price-features-list">
                                <li><i class="flaticon-tick"></i> Over 10,000 views</li>
                                <li><i class="flaticon-tick"></i> 24Hrs Duration</li>
                                <li><i class="flaticon-tick"></i> Graphics Promotion</li>
                                <li><i class="flaticon-close"></i> Video Promotion</li>
                            </ul>

                            <a href="{{route('contact')}}" target="_blank" class="get-started-btn">Get Started</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-pricing-box red">
                            <div class="pricing-header">
                                <h3>Starter</h3>
                            </div>

                            <div class="price">
                                <sub class="mr-0">₦</sub>12,000
                                <!-- <sub>/mo</sub> -->
                            </div>

                            <ul class="price-features-list">
                                <li><i class="flaticon-tick"></i> Over 20,000 views</li>
                                <li><i class="flaticon-tick"></i> 24Hrs Duration</li>
                                <li><i class="flaticon-tick"></i> Graphics Promotion</li>
                                <li><i class="flaticon-tick"></i> Video Promotion</li>
                            </ul>

                            <a href="{{route('contact')}}" target="_blank" class="get-started-btn">Get Started</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3 offset-sm-3">
                        <div class="single-pricing-box orange">
                            <div class="pricing-header">
                                <h3>Extended</h3>
                            </div>

                            <div class="price">
                                <sub class="mr-0">₦</sub>18,000
                                <!-- <sub>/mo</sub> -->
                            </div>

                            <ul class="price-features-list">
                                <li><i class="flaticon-tick"></i> Over 50,000 views</li>
                                <li><i class="flaticon-tick"></i> 24Hrs Duration</li>
                                <li><i class="flaticon-tick"></i> Graphics Promotion</li>
                                <li><i class="flaticon-tick"></i> Video Promotion</li>
                            </ul>

                            <a href="{{route('contact')}}" target="_blank" class="get-started-btn">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="shape-img2"><img src="assets/img/shape/2.svg" alt="image"></div>
            <div class="shape-img3"><img src="assets/img/shape/3.svg" alt="image"></div>
            <div class="shape-img4"><img src="assets/img/shape/4.png" alt="image"></div>
            <div class="shape-img5"><img src="assets/img/shape/5.png" alt="image"></div>
            <div class="shape-img6"><img src="assets/img/shape/6.png" alt="image"></div>
            <div class="shape-img9"><img src="assets/img/shape/9.png" alt="image"></div>
            <div class="shape-img10"><img src="assets/img/shape/10.png" alt="image"></div>
        </section>
        <!-- End Pricing Area -->
            <!-- Lets work Area -->
            <section class="subscribe-area bg-F4F7FC">
                <div class="subscribe-inner-area lets-work jarallax" data-jarallax='{"speed": 0.3}'>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <span class="sub-title">More Options?</span>
                                <h2>Contact us for more Advanced Packages!!!</h2>
                            </div>

                            <div class="col-lg-6">
                                <div class="contact-btn">
                                    <a href="https://wa.me/+2349046164015/?text=Good%20day.%20I%20am%20interested%20in%20promoting%20my%20business%20and%20services%20with%20lilyadd" target="_blank" class="default-btn">
                                        Contact Us <span></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Lets work Area -->
@endsection
