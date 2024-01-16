<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        @include('layouts.css')

        <meta name="csrf-token" content="{{ csrf_token() }}">

       <title>Forgot Password | {{$site->site_name}}</title>

       <link rel="icon" type="image/png" href="{{URL::to($site->footer_logo)}}">
        <!-- Tags -->
        <link href="{{url('/')}}" rel="canonical">
        <meta name="description" content="Advertise your business or promote businesses with LILLYADD!">
        <meta name="keywords" content="Digital Advertising, Online Marketing, Social Media Advertising, Digital Marketing Agency, PPC & CPC, advertise, promote, social media marketing, whatsapp, whatsapp status, monetize your whatsapp, making money digital adverts, grow, business, whatsapp nigeria, promotions in nigeria, advertise nigeria">
        <meta name="robots" content="index, follow">
        <meta name="theme-color" content="#0D0D21" />
        <meta property="og:title" content="Monetize your whatsapp status by promoting businesses on LILLYADD.">
        <meta property="og:url" content="{{url('/')}}">
        <meta property="og:description" content="Earn by posting sponsored ads on your whatsapp status with LILLYADD! You can also advertise with us and reach millions of whatsapp users.">
        <meta property="og:image" content="assets/img/favicon.png">
        <meta name="twitter:title" content="Monetize your whatsapp status by promoting businesses on LILLYADD.">
        <meta name="twitter:description" content="Earn by posting sponsored ads on your whatsapp status with LILLYADD! You can also advertise with us and reach millions of whatsapp users.">
        <meta name="twitter:image" content="{{URL::to($site->logo)}}">
        <meta name="twitter:site" content="{{url('/')}}">
        <meta name="twitter:creator" content="{{url('/')}}">

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-175290586-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-175290586-1');
        </script>

        <!-- Google Ads -->
        <script data-ad-client="ca-pub-4394332500776987" async src="../pagead2.googlesyndication.com/pagead/js/f.txt"></script>
        <!-- Propeller Ads -->
        <meta name="propeller" content="796f61a906f863aee018a0784173a5e6">
    </head>

    <body>
    @include('layouts.loader')


    <!-- Signup Area -->
    <div class="container">
        <div class="form-content">
            <div class="form-header">
                <h3>Cant remember your Login details? Reset Password here</h3>
                <p>A reset password OTP will be sent to your email address.</p>
            </div>
            @if(Session::has('error'))
            <div class="col-md-12">
               <div class="alert alert-danger no-b">
                  <span class="text-semibold"></span> {{ Session::get('error')}}
                  <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
               </div>
            </div>
            @endif
            @if(Session::has('success'))
            <div class="col-md-12">
               <div class="alert alert-success no-b">
                  <span class="text-semibold"></span> {{ Session::get('success')}}
                  <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
               </div>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <form method="POST" action="{{ route('forgotpassword') }}" class="billing-details">
            @csrf
                <div class="form-group">
                    <label>Email <span style="color: red">*</span></label>
                    <input type="email" class="form-control" name="email" placeholder="Your email" required>
                </div>
                <button type="submit"  class="default-btn">Submit</button>
            </form>

        </div>
    </div>


    <div class="go-top"><i class="fas fa-chevron-up"></i></div>
    @include('layouts.js')
</body>

</html>


