@extends('layouts.app')
@section('title')
Contact Us
@endsection

@section('content')
<div class="page-title-area page-title-bg1">
   <div class="d-table">
       <div class="d-table-cell">
           <div class="container">
               <div class="page-title-content">
                   <div class="row">
                       <div class="col-lg-4 col-md-6 col-sm-6">
                           <div class="contact-info-box">
                               <div class="icon">
                                   <i class="flaticon-email"></i>
                               </div>

                               <h3>Email Here</h3>
                               <p><a href="mailto:{{$site->site_email}}"><span class="__cf_email__" data-cfemail="6e060b0202012e0a0709070f0a0a400d01">{{$site->site_email}}</span></a></p>
                           </div>
                       </div>

                       <div class="col-lg-4 col-md-6 col-sm-6">
                           <div class="contact-info-box">
                               <div class="icon">
                                   <i class="flaticon-marker"></i>
                               </div>

                               <h3>Location Here</h3>
                               <p><a href="javascript:void()">{{$site->site_address}}</a></p>
                           </div>
                       </div>

                       <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3 offset-sm-3">
                           <div class="contact-info-box">
                               <div class="icon">
                                   <i class="flaticon-phone-call"></i>
                               </div>

                               <h3>Call Here</h3>
                               <p><a target="_blank" href="tel:{{$site->hotline}}">{{$site->hotline}}</a></p>
                           </div>
                       </div>
                   </div>
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

<!-- Start Contact Area -->
<section class="contact-area ptb-100">
   <div class="container">

       <div class="section-title">
           <span class="sub-title">Contact Us</span>
           <h2>Drop us Message for any Query</h2>
           <p>Our support Team and customer care representative is always ready to help with any difficulty you might be facing while using the platform, All you have to do is contact them and you will be attended to in no time</p>
       </div>

       <div class="row align-items-center">
           <div class="col-lg-4 col-md-4">
               <div class="contact-image">
                   <img src="assets/img/contact.png" alt="image">
               </div>
           </div>

           <div class="col-lg-8 col-md-8">
               <div class="contact-form">
                  <form class="contact-form" action="{{route('site.contact.post')}}" role="form" method="post">
                     {{csrf_field()}}
                     @if(Session::has('success'))
                     <div class="col-md-12">
                         <div class="alert alert-success no-b">
                             <span class="text-semibold"></span> {{ Session::get('success')}}
                             <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                         </div>
                     </div>
                     @endif
                     @if(Session::has('error'))
                     <div class="col-md-12">
                         <div class="alert alert-danger no-b">
                             <span class="text-semibold"></span> {{ Session::get('error')}}
                             <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                         </div>
                     </div>
                     @endif
                       <div class="row">
                           <div class="col-lg-6 col-md-12">
                               <div class="form-group">
                                   <input type="text" name="name" id="contact_name" class="form-control" required data-error="Please enter your name" placeholder="Name">
                                   @if ($errors->has('name'))
                                   <span class="invalid-feedback" role="alert">
                                       <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                   </span>
                               @endif
                                   <div class="help-block with-errors"></div>
                               </div>
                           </div>

                           <div class="col-lg-6 col-md-12">
                               <div class="form-group">
                                   <input type="email" name="email" id="contact_email" class="form-control" required data-error="Please enter your email" placeholder="Email">
                                   @if ($errors->has('email'))
                                   <span class="invalid-feedback" role="alert">
                                       <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                   </span>
                               @endif
                                   <div class="help-block with-errors"></div>
                               </div>
                           </div>

                           <div class="col-lg-6 col-md-12">
                               <div class="form-group">
                                   <input type="tel" name="phone" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="Phone">
                                   @if ($errors->has('phone'))
                                   <span class="invalid-feedback" role="alert">
                                       <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                   </span>
                               @endif
                                   <div class="help-block with-errors"></div>
                               </div>
                           </div>

                           <div class="col-lg-6 col-md-12">
                               <div class="form-group">
                                   <input type="text" name="subject" id="contact_subject" class="form-control" required data-error="Please enter your subject" placeholder="Subject">
                                   @if ($errors->has('subject'))
                                   <span class="invalid-feedback" role="alert">
                                       <strong class="text-danger">{{ $errors->first('subject') }}</strong>
                                   </span>
                               @endif
                                   <div class="help-block with-errors"></div>
                               </div>
                           </div>

                           <div class="col-lg-12 col-md-12">
                               <div class="form-group">
                                   <textarea name="message" class="form-control" id="contact_message" cols="30" rows="5" required data-error="Write your message" placeholder="Your Message"></textarea>
                                   <div class="help-block with-errors"></div>
                               </div>
                           </div>

                           <div class="col-lg-12 col-md-12">
                               <button type="submit"  class="default-btn">Send Message <span></span></button>
                               <div id="msgSubmit" class="h3 text-center hidden"></div>
                               <div class="clearfix"></div>
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
</section>


@endsection
