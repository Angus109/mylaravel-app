@extends('layouts.app')
@section('title')
Home
@endsection
@section('content')

<!-- Start Main Banner Area -->
        <div class="hero-banner banner-bg1">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-12">
                                <div class="hero-banner-content">
                                    <span class="sub-title">YOUR BRAND, PROMOTED</span>
                                    <h1>Creative & Strategic Digital Marketing Agency</h1>
                                    <p>
                                        We all want to get our business to the right customers and advertising can do this.
                                        LILLYADD is providing you with a flexible but affordable means of promoting your business.
                                        By working hand in hand with industry-leading brands, we help redefine the possibilities and potential of digital engagements.
                                        <br>
                                        For some of us, we want to earn a little extra income. With LILLYADD, you can even make up to 1,000 Naira daily just from doing some very simple tasks on Social Media and performing other promotions.
                                        And what’s even better is that there is no fee attached to the registration!
                                        <br>
                                        What are you waiting for?
                                    </p>

                                    <div class="btn-box">
                                        <a href="{{route('advertise')}}" class="default-btn mb-3">Advertise with us <span></span></a>
                                        <a href="{{route('influencer')}}" class="default-btn-two mb-3">Promote for us <span></span></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="hero-main-banner-image">
									<img src="assets/img/banner-image/man.png" class="wow fadeInDown" data-wow-delay="0.6s" alt="man">
									<img src="assets/img/banner-image/code.png" class="wow fadeInUp" data-wow-delay="0.6s" alt="code">
									<img src="assets/img/banner-image/carpet.png" class="wow fadeInLeft" data-wow-delay="0.6s" alt="carpet">
									<img src="assets/img/banner-image/bin.png" class="wow zoomIn" data-wow-delay="0.6s" alt="bin">
									<img src="assets/img/banner-image/book.png" class="wow bounceIn" data-wow-delay="0.6s" alt="book">
									<img src="assets/img/banner-image/desktop.png" class="wow fadeInDown" data-wow-delay="0.6s" alt="desktop">
									<img src="assets/img/banner-image/dot.png" class="wow zoomIn" data-wow-delay="0.6s" alt="dot">
									<img src="assets/img/banner-image/flower-top-big.png" class="wow fadeInUp" data-wow-delay="0.6s" alt="flower-top-big">
									<img src="assets/img/banner-image/flower-top.png" class="wow rotateIn" data-wow-delay="0.6s" alt="flower-top">
									<img src="assets/img/banner-image/keyboard.png" class="wow fadeInUp" data-wow-delay="0.6s" alt="keyboard">
									<img src="assets/img/banner-image/pen.png" class="wow zoomIn" data-wow-delay="0.6s" alt="pen">
									<img src="assets/img/banner-image/table.png" class="wow zoomIn" data-wow-delay="0.6s" alt="table">
									<img src="assets/img/banner-image/tea-cup.png" class="wow fadeInLeft" data-wow-delay="0.6s" alt="tea-cup">
									<img src="assets/img/banner-image/headphone.png" class="wow rollIn" data-wow-delay="0.6s" alt="headphone">

									<img src="assets/img/banner-image/main-pic.png" class="wow fadeInUp" data-wow-delay="0.6s" alt="main-pic">
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shape-img1"><img src="assets/img/shape/1.png" class="wow fadeInUp" data-wow-delay=".9s" alt="image"></div>
            <div class="shape-img2"><img src="assets/img/shape/2.svg" alt="image"></div>
            <div class="shape-img3"><img src="assets/img/shape/3.svg" alt="image"></div>
            <div class="shape-img4"><img src="assets/img/shape/4.png" alt="image"></div>
            <div class="shape-img5"><img src="assets/img/shape/5.png" alt="image"></div>
            <div class="shape-img6"><img src="assets/img/shape/6.png" alt="image"></div>
            <div class="shape-img7"><img src="assets/img/shape/7.png" alt="image"></div>
            <div class="shape-img8"><img src="assets/img/shape/8.png" alt="image"></div>
            <div class="shape-img9"><img src="assets/img/shape/9.png" alt="image"></div>
            <div class="shape-img10"><img src="assets/img/shape/10.png" alt="image"></div><br>
        </div>


        <!-- End Main Banner Area -->

        <!-- Start Featured Services Area -->
        <!-- <section class="featured-services-area ptb-100">
            <div class="container">
                <div class="section-title">
                    <span class="sub-title">LILLYADD</span>
                    <h2>Get to know About Us</h2>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-md-6">
                        <div class="single-featured-box">
                            <div class="icon">
                                <i class="flaticon-analytics"></i>
                            </div>

                            <h3>Our Work</h3>
                            <p>
                                LILLYADD is a platform that creates affordable means of promotion for every business or brand and a source of income for every user on the website.
                                We work hand-in-hand with industry-leading brands to help redefine the possibilities and potential of digital engagements.
                                We provide Real innovations and a positive customer experience. No fake products and services.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 col-md-6">
                        <div class="single-featured-box">
                            <div class="icon color-facd60">
                                <i class="flaticon-analysis"></i>
                            </div>
                            <h3>Our Mission</h3>
                            <p>
                                To Create a different approach to Advertisement & communications services that enable our clients build strong rapports and influence attitudes and behaviors in this dynamic society.
                                Also to create a platform where users can earn by doing simple social media Tasks.
                                This and lot more are what LILLYADD will be venturing into for the continuous growth and development of its Community.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 col-md-6 offset-lg-0 offset-md-3 offset-sm-3">
                        <div class="single-featured-box">
                            <div class="icon color-1ac0c6">
                                <i class="flaticon-research"></i>
                            </div>
                            <h3>Our Vision</h3>
                            <p>
                                To become the world’s leading tech and digital driven Public and social relations agency by relating closely with our staff, friends and partners in Media & Publics.<br>
                                Also to ensure our clients’ and consumers’ dreams come true, which also in turn builds a befitting profile for us and profits our clients in providing creative solutions to improve your business and brands!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- End Featured Services Area -->


        <!-- Start Services Area -->
        <section class="services-area ptb-100 bg-F4F7FC">
            <div class="container">
                <div class="section-title">
                    <span class="sub-title">What We Do</span>
                    <h2>We connect businesses with their customers through active and revolutionary advertising methods. </h2>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services-box">
                            <div class="icon">
                                <i class="flaticon-digital-marketing"></i>
                            </div>

                            <h3><a href="javascript:void()">Blogs, Website / Apps Engagement</a></h3>

                            <p>
                                Do you want to increase the impressions/registration on your website?
                                Do you recently launch an App and you need massive downloads, registrations and continuous usage of this App but have no idea on how to go about these?
                                LILLYADD is the solution!!!
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services-box">
                            <div class="icon bg-00aeff">
                                <i class="flaticon-analysis"></i>
                            </div>

                            <h3><a href="javascript:void()">Organizing Online classes/campaigns </a></h3>

                            <p>
                                Are you an online course trainer, do you suffer from low turn up in online classes and webinars hosted by you or you know someone that does?
                                <br>LILLYADD is here to put an end to that by projecting your campaign continuously to as many Audiences as possible.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services-box">
                            <div class="icon bg-f78acb">
                                <i class="flaticon-research"></i>
                            </div>

                            <h3><a href="javascript:void()">Competition </a></h3>

                            <p>
                                Are you in any competition/ contest and in need of users?
                                Are you on the verge of loosing or you just joined a competition and needs Real users/fans to come out massively to support you?
                                Then look no further as LILLYADD.co has thousands of users ready to work for you.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services-box">
                            <div class="icon bg-cdf1d8">
                                <i class="flaticon-analysis"></i>
                            </div>

                            <h3><a href="javascript:void()">Create Twitter trends/ Awareness </a></h3>

                            <p>
                                Do you need massive engagement on twitter on a particular Subject matter?
                                Do you need twitter followers, likes and retweet?
                                Do you need to grow your twitter page with real followers?
                                Look no further as you are the reason for the LILLYADD initiative!
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services-box">
                            <div class="icon bg-c679e3">
                                <i class="flaticon-mail"></i>
                            </div>

                            <h3><a href="javascript:void()">Youtube subscribers/ likes</a></h3>

                            <p>
                                Do you have a Youtube channel that has little or no subscribers and you want to change this?
                                Do some of your uploaded videos lack likes/views?
                                LILLYADD audience can easily change this by getting you active subscribers.
                                Waste no more time in contacting us.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-services-box">
                            <div class="icon bg-eb6b3d">
                                <i class="flaticon-seo"></i>
                            </div>

                            <h3><a href="javascript:void()">Instagram followers / likes</a></h3>

                            <p>
                                Do you have an instagram page that has little or no followers and you want to change this?
                                Do you have a post that needs likes?
                                LILLYADD audience can easily change this by getting you active subscribers.
                                Contact us now so we help grow your page.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Services Area -->

       <!-- Start Why Choose Us Area -->
        <section class="why-choose-area ptb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="why-choose-content">

                            <span class="sub-title">Why Choose Us</span>
                            <h2>Creative solutions to improve your business!</h2>
                            <p>
                                So, are you a business owner? Do you have a business brand?
                                Are you organizing a campaign or competition and in need audience?
                                To cut it short... Do you want to reach a large and unique audience?
                                LILLYADD is here for that!
                            </p>
                            <a href="{{route('projects')}}">Click here to see a showcase of some of the projects we have promoted.</a>

                            <div class="features-text">
                                <h4><i class="flaticon-tick"></i> BRAND STRATEGY</h4>
                                <p>
                                    Making you stand out by creating a bold brand identity and extending your reach through whatsapp. Let us define your business.
                                </p>
                            </div>

                            <div class="features-text">
                                <h4><i class="flaticon-tick"></i> COMMITTED USERS </h4>
                                <p>
                                    LILLYADD can help you Capture a larger audience via whatsapp. Put your business online and take advantage of a whole new market for your products & services. With our user base of 9,000+ users and 100+ influencers across all social media, we can assist you in reaching an audience of over 500k depending on what you paid for.
                                </p>
                            </div>
                            <div class="features-text">
                                <h4><i class="flaticon-tick"></i> Transparency</h4>
                                <p>
                                    We are fully transparent about our business model and practices. Our clients can be confident that we operate to the highest possible standards of integrity and are committed to serving their best interests. We give adequate and detailed documentation of any promotion in case any clients needs it.
                                </p>
                            </div>
                            <div class="features-text">
                                <h4><i class="flaticon-tick"></i> Unique Audiences </h4>
                                <p>The best way to reach out to audience faster these days are through social media. Its been said that 80% of Whatsapp users mostly view status than chat on the platform and whatsapp has over 300 million users currently. So yes, we have your audience and we can reach them directly.</p>
                            </div>
                            <div class="choose-btn mt-2">
                                <a class="default-btn" href="{{route('advertise')}}">
                                    Discover More
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="why-choose-image">
                            <img src="assets/img/why-choose-img1.png" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Why Choose Us Area -->



        <!-- Start FAQ Area -->
        <div id="promote" class="mb-2">
            <section class="faq-area ptb-100 bg-F4F7FC">
                <div class="container">
                    <div class="section-title">
                        <span class="sub-title">Promote for us</span>
                        <h2>HOW IT WORKS</h2>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="about-image">
                                <img src="assets/img/features-image/6.png" alt="image">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="faq-accordion">
                                <ul class="accordion">
                                    <li class="accordion-item">
                                        <a class="accordion-title" href="javascript:void(0)">
                                            <i class="fas fa-plus"></i>
                                            Getting Started
                                        </a>
                                        <p class="accordion-content"><a href="{{route('register')}}">Click here to signup with LILLYADD.</a> </p>
                                    </li>

                                    <li class="accordion-item">
                                        <a class="accordion-title" href="javascript:void(0)">
                                            <i class="fas fa-plus"></i>
                                            Selecting a task/advert to perform/promote
                                        </a>
                                        <p class="accordion-content">
                                            <a href="{{route('register')}}">
                                                We have list of Items to promote on the dashboard page,
                                                Choose which of the items you want to promote and perform the task.
                                                <br> <strong>Note: Tasks might not always be available to select as each task has a maximum number of users that can opt in.
                                                    So you would need to be fast in selecting a task before its filled up.</strong>
                                            </a>
                                        </p>
                                    </li>

                                    <li class="accordion-item">
                                        <a class="accordion-title" href="javascript:void(0)">
                                            <i class="fas fa-plus"></i>
                                            Performing tasks on social media
                                        </a>
                                        <p class="accordion-content">
                                            <a href="{{route('register')}}">
                                                After selecting a promotion on the dashboard,
                                                navigate to your task page,
                                                Post the material on your chosen social media timeline or status.
                                                For example, if you select a fashion brand to promote under the whatsapp category, you will have to post the downloaded material on your whatsapp status.
                                                Follow instructions attached to the specific task.
                                                <br><strong>Note: You have 24hrs to perform each task.</strong>
                                            </a>
                                        </p>
                                    </li>
                                    <li class="accordion-item">
                                        <a class="accordion-title" href="javascript:void(0)">
                                            <i class="fas fa-plus"></i>
                                            Submit Task
                                        </a>
                                        <p class="accordion-content">
                                            <a href="{{url('/')}}">
                                                It is easy, Click on the navigation menu and navigate to the task page.
                                                Upload screenshot of the task performed on the task you have selected. Repeat this process for multiple promotions.
                                                <br><strong>Note: Submitting of task should be within 24hrs of selecting the task.</strong>
                                            </a>
                                        </p>
                                    </li>
                                    <li class="accordion-item">
                                        <a class="accordion-title" href="javascript:void(0)">
                                            <i class="fas fa-plus"></i>
                                            Payment
                                        </a>
                                        <p class="accordion-content">
                                            <a href="{{route('register')}}">
                                                The minimum amount you can withdraw is 1000 and there is no maximum amount. Everything in the wallet can be withdrawn!
                                                To request a payout, Click on the navigation menu on the top left of the screen and navigate to your wallet to Request payout and your request will be processed within 48hrs.
                                                 <a href="{{route('faqs')}}">For more questions, click here refer to the FAQ page.</a>
                                            </a>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- End FAQ Area -->

        <!-- Start Solution Area -->
        <section class="solution-area ptb-100 extra-pb jarallax" data-jarallax='{"speed": 0.3}'>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="solution-content">
                               <h2>Get Better Solution For Your Business With LILLYADD</h2>
                            <p>No fake products and services. The customer is king, their lives and needs are the inspiration.</p>
                            <a href="https://wa.me/+2349046164015/?text=Good%20day.%20I%20am%20interested%20in%20promoting%20my%20business%20and%20services%20with%20lilyadd" class="default-btn" target="blank">Connect via Whatsapp <span></span></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="solution-video">
                            <a href="https://drive.google.com/file/d/136UM1xYfJm8YNdbrE6ESS1iNAeWIKck-/preview" class="video-btn popup-youtube"><i class="flaticon-play-button"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Solution Area -->
        @endsection
