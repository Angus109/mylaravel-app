<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        @include('layouts.css')

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') | {{$site->site_name}}</title>

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

        @include('layouts.google')
    </head>

    <body>
      @include('layouts.loader')

      @include('layouts.main-nav')

      @yield('content')
        @include('layouts.footer')
    <div class="go-top"><i class="fas fa-chevron-up"></i></div>

    @include('layouts.js')
    @yield('javascripts')
    {{-- <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); Tawk_API.embedded='tawk_613f370cd326717cb6812b59';
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/613f370cd326717cb6812b59/1ffffje93';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);})();
        </script> --}}


<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/613f370cd326717cb6812b59/1ffffje93';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</body>
</html>

