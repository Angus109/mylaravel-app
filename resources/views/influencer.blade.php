@extends('layouts.app')
@section('title')
Influencer
@endsection
@section('content')

        <!-- Start Page Title Area -->
        <div class="page-title-area page-title-bg1">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>Earn As Influencer</h2>

                            <ul>
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li>Earn As Influencer</li>
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

        <!-- About Area Two -->
        <section class="about-area-two ptb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12">
                        <div class="about-image">
                            <img src="assets/img/lilyadd.png" alt="influencers" class="rounded-10">

                            <div class="solution-video">
                                <a href="https://drive.google.com/file/d/126qi9TCs8TkoaxRscryPvGqRjq0X5tqn/preview" class="video-btn popup-youtube">
                                    <i class="flaticon-play-button"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="about-content">
                            <div class="section-title text-left">
                                <span class="sub-title">EARN AS AN INFLUENCER</span>
                                <h2>BECOME AN INFLUENCER WITH US AND MAKE EXTRA CASH</h2>
                                <p>Do you have a sizeable audience on your contact list or belong to multiple groups and social media platforms?
                                    With our Special Influencer Program, you can make extra cash through pushing of sponsored content via your social media platforms.
                                </p>
                            </div>
                            <div class="about-text">
                                <h4>How it works</h4>
                                <p>Working as an influencer is the easiest way to earn. You are given a content to promote you earn from the engagement generated from your promotion. You help our clients get their business out and you earn a side income.
                                    It’s a win-win for us all! This is an influencer package. If you are not an influencer, just register as a normal user.
                                </p>
                            </div>
                            <div class="about-text">
                                <h4>Getting Started</h4>
                                <p>Select the social media you use for promotion. Fill in your details and wait to be contacted.</p>
                                <ul class="features-list">
                                    @foreach($influencersall as $product)
                                    <li><span><i class="fas fa-check"></i> <a target="_blank" href="{{ route('influencers.details', ['slug' => $product->slug]) }}">{{$product->name}} Influencer</a></span></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="about-text">
                                <h4>Getting Paid</h4>
                                <p>You input the amount you would like to earn per promotion. We review it and let you know if we can pay such. You should know that you get paid per promotion carried out.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Area Two -->

        <!-- Start Fun Facts Area -->
        <section class="fun-facts-two pt-100 pb-70 bg-f2f2f7">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="fun-fact-card">
                            <i class='bx bx-trophy'></i>
                            <h3>
                                <span class="odometer" data-count="443">00</span>
                                <span class="sign-icon">+</span>
                            </h3>
                            <p>Completed Projects</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="fun-fact-card">
                            <i class='bx bx-smile'></i>
                            <h3>
                                <span class="odometer" data-count="275">00</span>
                                <span class="sign-icon">+</span>
                            </h3>
                            <p>Happy Clients</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="fun-fact-card">
                            <i class='bx bx-user-plus'></i>
                            <h3>
                                <span class="odometer" data-count="23">00</span>
                                <span class="sign-icon">+</span>
                            </h3>
                            <p>Active Influencer</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="fun-fact-card">
                            <i class='bx bx-list-check'></i>
                            <h3>
                                <span class="odometer" data-count="9340">00</span>
                                <span class="sign-icon">+</span>
                            </h3>
                            <p>Active Promoters</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Fun Facts Area -->

        <!-- About Us -->
        <section class="choose-area-two ptb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="choose-content">
                            <div class="section-title text-left">
                                <span class="sub-title">Who we Are </span>
                                <h2>Engaging New Audiences Through Smart Approach</h2>

                                <p>We believe brand promotion and advertisement plays a major role in making quality sales. Real innovations like the digiadd initiative promise to put a smile on the face of every Entrepreneur out there who has been expriencing low sales due to less awareness of their product and service. Digiadd is here to provide a solution to that. The customer is king, their lives and needs are the inspiration.</p>
                            </div>

                            <div class="choose-btn">
                                <a class="default-btn" href="{{route('advertise')}}">
                                    Discover More
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="choose-image">
                            <img src="assets/img/machine-learning/about3.png" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Us -->
@endsection
