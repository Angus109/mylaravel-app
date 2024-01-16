
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        @include('layouts.css')

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ucfirst(Auth::User()->username)}} Dashboard | {{$site->site_name}}</title>

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

    @include('layouts.dashboard_header')
    @yield('content')
    @include('layouts.footer')
    <div class="go-top"><i class="fas fa-chevron-up"></i></div>
    @include('layouts.js')


    <script>
        @if(Session::has('success'))
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: '{{Session::get('
            success ')}}'
        }).show();
        @endif

        @if(Session::has('fail'))
        new Noty({
            type: 'error',
            layout: 'topRight',
            text: '{{Session::get('
            fail ')}}'
        }).show();
        @endif

        @if(Session::has('error'))
        new Noty({
            type: 'error',
            layout: 'topRight',
            text: '{{Session::get('
            error ')}}'
        }).show();
        @endif

        @if(Session::has('warning'))
        new Noty({
            type: 'warning',
            layout: 'topRight',
            text: '{{Session::get('
            warning ')}}'
        }).show();
        @endif
    </script>
      @yield('javascripts')

</body>

</html>
