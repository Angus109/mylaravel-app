@extends('layouts.app')
@section('title')
About Us
@endsection

@section('content')
<div class="page-title-area page-title-bg1">
   <div class="d-table">
      <div class="d-table-cell">
         <div class="container">
            <div class="page-title-content">
               <h2>About Us</h2>
               <ul>
                  <li><a href="{{url('/')}}">Home</a></li>
                  <li>About Us</li>
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
<!-- Start About Area -->
<section class="about-area ptb-100">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-6 col-md-12">
            <div class="about-image">
               <img src="assets/img/about-img1.png" alt="image">
            </div>
         </div>
         <div class="col-lg-6 col-md-12">
            <div class="about-content">
               <span class="sub-title">About Us</span>
               <h2>We Are Digital Advertisers</h2>
               <p>We believe brand promotion and advertisement plays a major role in making quality sales. Real innovations like the lillyadd initiative promise to put a smile on the face of every Entrepreneur out there who has been expriencing low sales due to less awareness of their product and service. lillyadd is here to provide a solution to that. The customer is king, their lives and needs are the inspiration.</p>
               <ul class="features-list">
                  <li><span><i class="fas fa-check"></i> Innovative </span></li>
                  <li><span><i class="fas fa-check"></i> Demand prediction</span></li>
                  <li><span><i class="fas fa-check"></i> Branding strategy</span></li>
                  <li><span><i class="fas fa-check"></i> Endless streams of Audience </span></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Start Fun Facts Area -->
      <div class="row">
         <div class="col-lg-7 col-md-12">
            <div class="about-content">
               <div class="about-text mt-3">
                  <h4>Who We Are</h4>
                  <p>lillyadd is a platform with core interest in providing PR/ marketing solutions through all social media platforms. Has facebook and google ads failed ? <br>what about instagram? Employ real
                     people to do this promotion for you today at the most subsidized rate.
                     lillyadd provides every Form of advertisement ranging from location based adverts to targeting a particular age bracket, Trust no other platform to deliver it for you with no stress. Are u a musical Artist and you need your music to trend on social media, lillyadd is your Goto guy!
                  </p>
               </div>
               <div class="about-text mt-3">
                  <h4>Our History</h4>
                  <p>Our history is marked with awesome moments of achieving what seems impossible. In this platform our reputation preceeds us, This is because clients who are amazed at the rate of engagements we pull and things we are able to achieve will stop at nothing to tell friends and associates about this awesome platform.</p>
               </div>
               <div class="about-text mt-3">
                  <h4>Our Mission</h4>
                  <p> Our mission is to make life better for everyone that seeks us for one service or the pther and meet them at the very point of their needs. We are the bridge that connects the promoters with the adverisers. At the end the aim is to put a smile on the faces of both parties.  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End About Area Two -->
<!-- Start Why Choose Us Area -->
<section class="why-choose-area ptb-100">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-6 col-md-12">
            <div class="why-choose-content">
               <span class="sub-title">Why Choose Us</span>
               <h2>Creative solutions to improve your business!</h2>
               <p>Our team of experts with great knowlege and experience will devote their time to advising clients on the best possible ways and approach to showcase a product or service, weigh the risks and downsides and leave it to the client to make the final descison.</p>
               <div class="features-text">
                  <h4><i class="flaticon-tick"></i> Transparency</h4>
                  <p>We are fully transparent about our business model and practices. Our clients can be confident that we operate to the highest possible standards of integrity and are committed to serving their best interests. We give adequate and detailed documentation of any promotion in case any clients needs it. .</p>
               </div>
               <div class="features-text">
                  <h4><i class="flaticon-tick"></i> Unique Audiences </h4>
                  <p>The best way to reach out to audience faster these days are through social media. Its been said that 80% of Whatsapp users mostly view status than chat on the platform and whatsapp has over 300 million users currently. So yes, we have your audience and we can reach them directly.</p>
               </div>
               <div class="features-text">
                  <h4><i class="flaticon-tick"></i> Committed users </h4>
                  <p>lillyadd has a large number of users who are committed in making sponsored posts on their whatsapp status on a daily basis. It is actually their job to post your adverts. So be rest assured that your advert will go places!!! .</p>
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
<!-- Start Solution Area -->
<section class="solution-area ptb-100 extra-pb jarallax mt-2" data-jarallax='{"speed": 0.3}'>
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-6 col-md-12">
            <div class="solution-content">
               <h2>Get Better Solution For Your Business</h2>
               <p>No fake products and services. The customer is king, their lives and needs are the inspiration.</p>
               <a href="{{route('contact')}}" class="default-btn">Contact Us <span></span></a>
            </div>
         </div>
      </div>
   </div>
</section>

{{-- <!-- Google Ads -->
<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script async src="../pagead2.googlesyndication.com/pagead/js/f.txt"></script>
<!-- header banner -->
<ins class="adsbygoogle"
   style="display:block"
   data-ad-client="ca-pub-4394332500776987"
   data-ad-slot="2418128944"
   data-ad-format="auto"
   data-full-width-responsive="true">
</ins> --}}

    @endsection
