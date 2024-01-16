@extends('layouts.app')
@section('title')
{{$product->name}}
@endsection
@section('content')
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

    <div class="shape-img2"><img src="../assets/img/shape/2.svg" alt="image"></div>
    <div class="shape-img3"><img src="../assets/img/shape/3.svg" alt="image"></div>
    <div class="shape-img4"><img src="../assets/img/shape/4.png" alt="image"></div>
    <div class="shape-img5"><img src="../assets/img/shape/5.png" alt="image"></div>
    <div class="shape-img7"><img src="../assets/img/shape/7.png" alt="image"></div>
    <div class="shape-img8"><img src="../assets/img/shape/8.png" alt="image"></div>
    <div class="shape-img9"><img src="../assets/img/shape/9.png" alt="image"></div>
    <div class="shape-img10"><img src="../assets/img/shape/10.png" alt="image"></div>
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
            @if($product->slug == "facebook")
            <div class="col-lg-7 col-md-12">
                <div class="about-content">
                    <div class="section-title text-left">
                        <span class="sub-title">EARN AS A FACEBOOK INFLUENCER</span>
                        <!-- <h2>BECOME AN INFLUENCER WITH US AND MAKE EXTRA CASH</h2> -->
                        <p>Do you have a sizeable audience on your facebook? Are you big on facebook? Want to get paid for that?
                            Join Digiadd facebook Influencers by filling the form below.
                        </p>
                    </div>
                    <div class="about-text">
                        <h4>How it works</h4>
                        <p>Working as an influencer is the easiest way to earn. You are given a content to promote you earn from the engagement generated from your promotion. You help our clients get their business out and you earn a side income.
                            It’s a win-win for us all!
                        </p>
                    </div>
                    <div class="about-text">
                        <h4>Getting Started</h4>
                        <p>Fill in the form at the bottom of this page with the required details and wait for us to contact you via WhatsApp or Email. Note: Only influencers/ micro-influencers are permitted to apply.</p>
                    </div>
                    <div class="about-text">
                        <h4>Getting Paid</h4>
                        <p>You input the amount you would like to earn per promotion. We review it and let you know if we can pay such. You should know that you get paid per promotion carried out.</p>
                    </div>
                    <div class="billing-details contact-form">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                        @endif
                        @if(Session::has('success'))
                        <div class="col-md-12">
                            <div class="alert alert-success no-b">
                                <span class="text-semibold">Thank you!</span> {{ Session::get('success')}}
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                            </div>
                        </div>
                        @endif
                        <input type="hidden" name="_auth" id="_auth" value="{{csrf_token()}}">
                        <form  action="{{route('become.influencer')}}"  method="post">
                            <input type="hidden" name="provider"  value="{{$product->name}}" class="form-control">
                            {{csrf_field()}}

                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" required data-error="Please enter your name" placeholder="Name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" required data-error="Please enter your email" placeholder="Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="tel" name="phone" required data-error="Please enter your number" class="form-control" placeholder="Phone Number">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="handle" required data-error="Please enter your facebook username" class="form-control" placeholder="Facebook Username">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="number" name="amount" class="form-control" required data-error="Please enter your amount to be paid" placeholder="Amount to be paid per promotion">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <select name="followers" class="form-control selectpicker" required data-error="Please enter number of followers">
                                            <option value="" disabled selected>Number of Facebook Reach</option>
                                            <option value="1000">1k - 5k</option>
                                            <option value="5000">5k - 10k</option>
                                            <option value="10000">10k - 50k</option>
                                            <option value="50000">50k - 100k</option>
                                            <option value="100000">100k - 500k</option>
                                            <option value="500000">500k - 1m</option>
                                            <option value="1000000">1m+</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <select name="states" id="state" class="form-control selectpicker" required data-error="Please enter number of followers">
                                            <option value="" disabled selected>Select State</option>
                                            @foreach($states as $product)
                                            <option value="{{$product->name}}">{{ ucfirst($product->name) }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <select name="city" id="city" class="form-control selectpicker" required data-error="Please enter number of followers">
                                            <option value="" disabled selected>Select City</option>
                                            @foreach($lga as $product)
                                            <option value="{{$product->name}}">{{ ucfirst($product->name) }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label class="text-muted">Select niche (Max of 5 options)<span class="required"></span></label>
                                        <select class="form-control selectpicker" multiple required data-error="Please select your niche" name="niche">

                                                <option value="Food"> Food</option>

                                                <option value="Fashion"> Fashion</option>

                                                <option value="Health"> Health</option>

                                                <option value="Music"> Music</option>

                                                <option value="Movies"> Movies</option>

                                                <option value="Education"> Education</option>

                                                <option value="Finance"> Finance</option>

                                                <option value="Business"> Business</option>

                                                <option value="Beauty"> Beauty</option>

                                                <option value="Tech"> Tech</option>

                                                <option value="Gadgets"> Gadgets</option>

                                                <option value="Fitness"> Fitness</option>

                                                <option value="Causes"> Causes</option>

                                                <option value="Arts"> Arts</option>

                                                <option value="Politics"> Politics</option>

                                                <option value="Love"> Love</option>

                                                <option value="Gaming"> Gaming</option>

                                                <option value="Comedy"> Comedy</option>

                                                <option value="DIY"> DIY</option>

                                                <option value="Football"> Football</option>

                                                <option value="Sports"> Sports</option>

                                                <option value="Travel"> Travel</option>

                                                <option value="General"> General</option>

                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="referral" class="form-control" placeholder="Who referred you?">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="description" class="form-control" id="influencer_description" cols="30" rows="5" required data-error="Write a brief description of what you can offer" placeholder="Write a brief description of how and what you can offer."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit"  class="default-btn  influencer_submit">Get Started <span></span></button>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            @elseif($product->slug == "instagram")
            <div class="col-lg-7 col-md-12">
                <div class="about-content">
                    <div class="section-title text-left">
                        <span class="sub-title">EARN AS AN INSTAGRAM INFLUENCER</span>
                        <!-- <h2>BECOME AN INFLUENCER WITH US AND MAKE EXTRA CASH</h2> -->
                        <p>Do you have a sizeable audience on your instagram? Are you big on instagram? Want to get paid for that?
                            Join Digiadd Instagram Influencers by filling the form below.
                        </p>
                    </div>
                    <div class="billing-details contact-form">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                        @endif
                        @if(Session::has('success'))
                        <div class="col-md-12">
                            <div class="alert alert-success no-b">
                                <span class="text-semibold">Thank you!</span> {{ Session::get('success')}}
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                            </div>
                        </div>
                        @endif
                        <input type="hidden" name="_auth" id="_auth" value="{{csrf_token()}}">
                        <form  action="{{route('become.influencer')}}"  method="post">
                            <input type="hidden" name="provider"  value="{{$product->name}}" class="form-control">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" required data-error="Please enter your name" placeholder="Name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" required data-error="Please enter your email" placeholder="Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="tel" name="phone" required data-error="Please enter your number" class="form-control" placeholder="Phone Number">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="handle" required data-error="Please enter your instagram username" class="form-control" placeholder="Instagram username">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="number" name="amount" class="form-control" required data-error="Please enter your amount to be paid" placeholder="Amount to be paid per promotion">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <select name="followers" class="form-control selectpicker" required data-error="Please enter number of followers">
                                            <option value="" disabled selected>Number of Instagram followers</option>
                                            <option value="1000">1k - 5k</option>
                                            <option value="5000">5k - 10k</option>
                                            <option value="10000">10k - 50k</option>
                                            <option value="50000">50k - 100k</option>
                                            <option value="100000">100k - 500k</option>
                                            <option value="500000">500k - 1m</option>
                                            <option value="1000000">1m+</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <select name="states" id="state" class="form-control selectpicker" required data-error="Please enter number of followers">
                                            <option value="" disabled selected>Select State</option>
                                            @foreach($states as $product)
                                            <option value="{{$product->name}}">{{ ucfirst($product->name) }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <select name="city" id="city" class="form-control selectpicker" required data-error="Please enter number of followers">
                                            <option value="" disabled selected>Select City</option>
                                            @foreach($lga as $product)
                                            <option value="{{$product->name}}">{{ ucfirst($product->name) }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label class="text-muted">Select niche (Max of 5 options)<span class="required"></span></label>
                                        <select class="form-control selectpicker" multiple required data-error="Please select your niche" name="niche">

                                                <option value="Food"> Food</option>

                                                <option value="Fashion"> Fashion</option>

                                                <option value="Health"> Health</option>

                                                <option value="Music"> Music</option>

                                                <option value="Movies"> Movies</option>

                                                <option value="Education"> Education</option>

                                                <option value="Finance"> Finance</option>

                                                <option value="Business"> Business</option>

                                                <option value="Beauty"> Beauty</option>

                                                <option value="Tech"> Tech</option>

                                                <option value="Gadgets"> Gadgets</option>

                                                <option value="Fitness"> Fitness</option>

                                                <option value="Causes"> Causes</option>

                                                <option value="Arts"> Arts</option>

                                                <option value="Politics"> Politics</option>

                                                <option value="Love"> Love</option>

                                                <option value="Gaming"> Gaming</option>

                                                <option value="Comedy"> Comedy</option>

                                                <option value="DIY"> DIY</option>

                                                <option value="Football"> Football</option>

                                                <option value="Sports"> Sports</option>

                                                <option value="Travel"> Travel</option>

                                                <option value="General"> General</option>

                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="referral" class="form-control" placeholder="Who referred you?">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="description" class="form-control"  cols="30" rows="5" required data-error="Write a brief description of what you can offer" placeholder="Write a brief description of how and what you can offer."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit"  class="default-btn  influencer_submit">Get Started <span></span></button>
                                    {{-- <div id="msgSubmit" class="h3 text-center hidden"></div> --}}
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="about-text">
                        <h4>How it works</h4>
                        <p>Working as an influencer is the easiest way to earn. You are given a content to promote you earn from the engagement generated from your promotion. You help our clients get their business out and you earn a side income.
                            It’s a win-win for us all!
                        </p>
                    </div>
                    <div class="about-text">
                        <h4>Getting Started</h4>
                        <p>Fill in the form at the bottom of this page with the required details and wait for us to contact you via WhatsApp or Email. Note: Only influencers/ micro-influencers are permitted to apply.</p>
                    </div>
                    <div class="about-text">
                        <h4>Getting Paid</h4>
                        <p>You input the amount you would like to earn per promotion. We review it and let you know if we can pay such. You should know that you get paid per promotion carried out.</p>
                    </div> -->
                </div>
            </div>
            @elseif($product->slug == "twitter")
            <div class="col-lg-7 col-md-12">
                <div class="about-content">
                    <div class="section-title text-left">
                        <span class="sub-title">EARN AS A TWITTER INFLUENCER</span>
                        <!-- <h2>BECOME AN INFLUENCER WITH US AND MAKE EXTRA CASH</h2> -->
                        <p>Do you have a sizeable audience on your twitter? Are you big on twitter? Want to get paid for that?
                            Join Digiadd twitter Influencers by filling the form below.
                        </p>
                    </div>
                    <div class="billing-details contact-form">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                        @endif
                        @if(Session::has('success'))
                        <div class="col-md-12">
                            <div class="alert alert-success no-b">
                                <span class="text-semibold">Thank you!</span> {{ Session::get('success')}}
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                            </div>
                        </div>
                        @endif
                        <input type="hidden" name="_auth" id="_auth" value="{{csrf_token()}}">
                        <form  action="{{route('become.influencer')}}"  method="post">
                            <input type="hidden" name="provider"  value="{{$product->name}}" class="form-control">
                            {{csrf_field()}}
                            <div class="row">

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" required data-error="Please enter your name" placeholder="Name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" required data-error="Please enter your email" placeholder="Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="tel" name="phone" required data-error="Please enter your number" class="form-control" placeholder="Phone Number">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="handle" required data-error="Please enter your twitter username" class="form-control" placeholder="Twitter Username">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="number" name="amount" class="form-control" required data-error="Please enter your amount to be paid" placeholder="Amount to be paid per promotion">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <select name="followers" class="form-control selectpicker" required data-error="Please enter number of followers">
                                            <option value="" disabled selected>Number of Twitter Reach</option>
                                            <option value="1000">1k - 5k</option>
                                            <option value="5000">5k - 10k</option>
                                            <option value="10000">10k - 50k</option>
                                            <option value="50000">50k - 100k</option>
                                            <option value="100000">100k - 500k</option>
                                            <option value="500000">500k - 1m</option>
                                            <option value="1000000">1m+</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <select name="states" id="state" class="form-control selectpicker" required data-error="Please enter number of followers">
                                            <option value="" disabled selected>Select State</option>
                                            @foreach($states as $product)
                                            <option value="{{$product->name}}">{{ ucfirst($product->name) }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <select name="city" id="city" class="form-control selectpicker" required data-error="Please enter number of followers">
                                            <option value="" disabled selected>Select City</option>
                                            @foreach($lga as $product)
                                            <option value="{{$product->name}}">{{ ucfirst($product->name) }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label class="text-muted">Select niche (Max of 5 options)<span class="required"></span></label>
                                        <select class="form-control selectpicker" multiple required data-error="Please select your niche" name="niche">

                                                <option value="Food"> Food</option>

                                                <option value="Fashion"> Fashion</option>

                                                <option value="Health"> Health</option>

                                                <option value="Music"> Music</option>

                                                <option value="Movies"> Movies</option>

                                                <option value="Education"> Education</option>

                                                <option value="Finance"> Finance</option>

                                                <option value="Business"> Business</option>

                                                <option value="Beauty"> Beauty</option>

                                                <option value="Tech"> Tech</option>

                                                <option value="Gadgets"> Gadgets</option>

                                                <option value="Fitness"> Fitness</option>

                                                <option value="Causes"> Causes</option>

                                                <option value="Arts"> Arts</option>

                                                <option value="Politics"> Politics</option>

                                                <option value="Love"> Love</option>

                                                <option value="Gaming"> Gaming</option>

                                                <option value="Comedy"> Comedy</option>

                                                <option value="DIY"> DIY</option>

                                                <option value="Football"> Football</option>

                                                <option value="Sports"> Sports</option>

                                                <option value="Travel"> Travel</option>

                                                <option value="General"> General</option>

                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="referral" class="form-control" placeholder="Who referred you?">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="description" class="form-control"  cols="30" rows="5" required data-error="Write a brief description of what you can offer" placeholder="Write a brief description of how and what you can offer."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn  influencer_submit">Get Started <span></span></button>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="about-text">
                        <h4>How it works</h4>
                        <p>Working as an influencer is the easiest way to earn. You are given a content to promote you earn from the engagement generated from your promotion. You help our clients get their business out and you earn a side income.
                            It’s a win-win for us all!
                        </p>
                    </div>
                    <div class="about-text">
                        <h4>Getting Started</h4>
                        <p>Fill in the form at the bottom of this page with the required details and wait for us to contact you via WhatsApp or Email. Note: Only influencers/ micro-influencers are permitted to apply.</p>
                    </div>
                    <div class="about-text">
                        <h4>Getting Paid</h4>
                        <p>You input the amount you would like to earn per promotion. We review it and let you know if we can pay such. You should know that you get paid per promotion carried out.</p>
                    </div> -->
                </div>
            </div>
            @elseif($product->slug == "whatsapp")
            <div class="col-lg-7 col-md-12">
                <div class="about-content">
                    <div class="section-title text-left">
                        <span class="sub-title">EARN AS A WHATSAPP INFLUENCER</span>
                        <!-- <h2>BECOME AN INFLUENCER WITH US AND MAKE EXTRA CASH</h2> -->
                        <p>Do you have a sizeable audience on your whatsapp? Are you big on whatsapp? Want to get paid for that?
                            Join Digiadd whatsapp Influencers by filling the form below.
                        </p>
                    </div>
                    <div class="billing-details contact-form">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                        @endif
                        @if(Session::has('success'))
                        <div class="col-md-12">
                            <div class="alert alert-success no-b">
                                <span class="text-semibold">Thank you!</span> {{ Session::get('success')}}
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                            </div>
                        </div>
                        @endif
                        <input type="hidden" name="_auth" id="_auth" value="{{csrf_token()}}">
                        <form  action="{{route('become.influencer')}}"  method="post">
                            <input type="hidden" name="provider"  value="{{$product->name}}" class="form-control">
                            {{csrf_field()}}
                            <div class="row">

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" required data-error="Please enter your name" placeholder="Name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" required data-error="Please enter your email" placeholder="Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="tel" name="phone" required data-error="Please enter your number" class="form-control" placeholder="Phone Number">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="url" name="handle" required data-error="Please enter your whatsapp link" class="form-control" placeholder="Whatsapp Link">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="number" name="amount" class="form-control" required data-error="Please enter your amount to be paid" placeholder="Amount to be paid per promotion">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <select name="followers" class="form-control selectpicker" required data-error="Please enter number of followers">
                                            <option value="" disabled selected>Number of Whatsapp Reach</option>
                                            <option value="1000">1k - 5k</option>
                                            <option value="5000">5k - 10k</option>
                                            <option value="10000">10k - 50k</option>
                                            <option value="50000">50k - 100k</option>
                                            <option value="100000">100k - 500k</option>
                                            <option value="500000">500k - 1m</option>
                                            <option value="1000000">1m+</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <select name="states" id="state" class="form-control selectpicker" required data-error="Please enter number of followers">
                                            <option value="" disabled selected>Select State</option>
                                            @foreach($states as $product)
                                            <option value="{{$product->name}}">{{ ucfirst($product->name) }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <select name="city" id="city" class="form-control selectpicker" required data-error="Please enter number of followers">
                                            <option value="" disabled selected>Select City</option>
                                            @foreach($lga as $product)
                                            <option value="{{$product->name}}">{{ ucfirst($product->name) }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label class="text-muted">Select niche (Max of 5 options)<span class="required"></span></label>
                                        <select class="form-control selectpicker" multiple required data-error="Please select your niche" name="niche">

                                                <option value="Food"> Food</option>

                                                <option value="Fashion"> Fashion</option>

                                                <option value="Health"> Health</option>

                                                <option value="Music"> Music</option>

                                                <option value="Movies"> Movies</option>

                                                <option value="Education"> Education</option>

                                                <option value="Finance"> Finance</option>

                                                <option value="Business"> Business</option>

                                                <option value="Beauty"> Beauty</option>

                                                <option value="Tech"> Tech</option>

                                                <option value="Gadgets"> Gadgets</option>

                                                <option value="Fitness"> Fitness</option>

                                                <option value="Causes"> Causes</option>

                                                <option value="Arts"> Arts</option>

                                                <option value="Politics"> Politics</option>

                                                <option value="Love"> Love</option>

                                                <option value="Gaming"> Gaming</option>

                                                <option value="Comedy"> Comedy</option>

                                                <option value="DIY"> DIY</option>

                                                <option value="Football"> Football</option>

                                                <option value="Sports"> Sports</option>

                                                <option value="Travel"> Travel</option>

                                                <option value="General"> General</option>

                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="referral" class="form-control" placeholder="Who referred you?">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="description" class="form-control" id="influencer_description" cols="30" rows="5" required data-error="Write a brief description of what you can offer" placeholder="Write a brief description of how and what you can offer."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit"  class="default-btn  influencer_submit">Get Started <span></span></button>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="about-text">
                        <h4>How it works</h4>
                        <p>Working as an influencer is the easiest way to earn. You are given a content to promote you earn from the engagement generated from your promotion. You help our clients get their business out and you earn a side income.
                            It’s a win-win for us all!
                        </p>
                    </div>
                    <div class="about-text">
                        <h4>Getting Started</h4>
                        <p>Fill in the form at the bottom of this page with the required details and wait for us to contact you via WhatsApp or Email. Note: Only influencers/ micro-influencers are permitted to apply.</p>
                    </div>
                    <div class="about-text">
                        <h4>Getting Paid</h4>
                        <p>You input the amount you would like to earn per promotion. We review it and let you know if we can pay such. You should know that you get paid per promotion carried out.</p>
                    </div> -->
                </div>
            </div>
            @elseif($product->slug == "youtube")
            <div class="col-lg-7 col-md-12">
                <div class="about-content">
                    <div class="section-title text-left">
                        <span class="sub-title">EARN AS A YOUTUBE INFLUENCER</span>
                        <!-- <h2>BECOME AN INFLUENCER WITH US AND MAKE EXTRA CASH</h2> -->
                        <p>Do you have a sizeable audience on your youtube? Are you big on youtube? Want to get paid for that?
                            Join Digiadd youtube Influencers by filling the form below.
                        </p>
                    </div>
                    <div class="billing-details contact-form">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                        @endif
                        @if(Session::has('success'))
                        <div class="col-md-12">
                            <div class="alert alert-success no-b">
                                <span class="text-semibold">Thank you!</span> {{ Session::get('success')}}
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                            </div>
                        </div>
                        @endif
                        <input type="hidden" name="_auth" id="_auth" value="{{csrf_token()}}">
                        <form  action="{{route('become.influencer')}}"  method="post">
                            <input type="hidden" name="provider"  value="{{$product->name}}" class="form-control">
                            {{csrf_field()}}
                            <div class="row">

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" required data-error="Please enter your name" placeholder="Name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" required data-error="Please enter your email" placeholder="Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="tel" name="phone" required data-error="Please enter your number" class="form-control" placeholder="Phone Number">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="url" name="handle" required data-error="Please enter your youtube link" class="form-control" placeholder="Youtube link">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="number" name="amount" class="form-control" required data-error="Please enter your amount to be paid" placeholder="Amount to be paid per promotion">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <select id="influencer_followers" class="form-control selectpicker" required data-error="Please enter number of followers">
                                            <option value="" disabled selected>Number of Youtube Reach</option>
                                            <option value="1000">1k - 5k</option>
                                            <option value="5000">5k - 10k</option>
                                            <option value="10000">10k - 50k</option>
                                            <option value="50000">50k - 100k</option>
                                            <option value="100000">100k - 500k</option>
                                            <option value="500000">500k - 1m</option>
                                            <option value="1000000">1m+</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <select name="states" id="state" class="form-control selectpicker" required data-error="Please enter number of followers">
                                            <option value="" disabled selected>Select State</option>
                                            @foreach($states as $product)
                                            <option value="{{$product->name}}">{{ ucfirst($product->name) }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <select name="city" id="city" class="form-control selectpicker" required data-error="Please enter number of followers">
                                            <option value="" disabled selected>Select City</option>
                                            @foreach($lga as $product)
                                            <option value="{{$product->name}}">{{ ucfirst($product->name) }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label class="text-muted">Select niche (Max of 5 options)<span class="required"></span></label>
                                        <select class="form-control selectpicker" multiple required data-error="Please select your niche" name="niche">

                                                <option value="Food"> Food</option>

                                                <option value="Fashion"> Fashion</option>

                                                <option value="Health"> Health</option>

                                                <option value="Music"> Music</option>

                                                <option value="Movies"> Movies</option>

                                                <option value="Education"> Education</option>

                                                <option value="Finance"> Finance</option>

                                                <option value="Business"> Business</option>

                                                <option value="Beauty"> Beauty</option>

                                                <option value="Tech"> Tech</option>

                                                <option value="Gadgets"> Gadgets</option>

                                                <option value="Fitness"> Fitness</option>

                                                <option value="Causes"> Causes</option>

                                                <option value="Arts"> Arts</option>

                                                <option value="Politics"> Politics</option>

                                                <option value="Love"> Love</option>

                                                <option value="Gaming"> Gaming</option>

                                                <option value="Comedy"> Comedy</option>

                                                <option value="DIY"> DIY</option>

                                                <option value="Football"> Football</option>

                                                <option value="Sports"> Sports</option>

                                                <option value="Travel"> Travel</option>

                                                <option value="General"> General</option>

                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="referral" class="form-control" placeholder="Who referred you?">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="description" class="form-control" cols="30" rows="5" required data-error="Write a brief description of what you can offer" placeholder="Write a brief description of how and what you can offer."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn  influencer_submit">Get Started <span></span></button>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="about-text">
                        <h4>How it works</h4>
                        <p>Working as an influencer is the easiest way to earn. You are given a content to promote you earn from the engagement generated from your promotion. You help our clients get their business out and you earn a side income.
                            It’s a win-win for us all!
                        </p>
                    </div>
                    <div class="about-text">
                        <h4>Getting Started</h4>
                        <p>Fill in the form at the bottom of this page with the required details and wait for us to contact you via WhatsApp or Email. Note: Only influencers/ micro-influencers are permitted to apply.</p>
                    </div>
                    <div class="about-text">
                        <h4>Getting Paid</h4>
                        <p>You input the amount you would like to earn per promotion. We review it and let you know if we can pay such. You should know that you get paid per promotion carried out.</p>
                    </div> -->
                </div>
            </div>
            @endif
        </div>
    </div>
</section>


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
                    <img src="../assets/img/machine-learning/about3.png" alt="image">
                </div>
            </div>
        </div>
    </div>
</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $('#state').on('change',function(){

     var state_name = $(this).val();
     if(state_name){
         $.ajax({
          type:"GET",
            url: '../../api/get-city-list/'+state_name,
            success:function(res){
             if(res){
              console.log(res);
              console.log(state_name);
              $("#city").empty();
              $.each(res,function(key,value){
                 $("#city").append('<option value="'+value+'">'+value+'</option>');
             });

          }else{
              $("#city").empty();
          }
      }
  });
     }else{
         $("#city").empty();
     }

 });

 </script>

@endsection
