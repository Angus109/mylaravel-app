<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        @include('layouts.css')

        <meta name="csrf-token" content="{{ csrf_token() }}">

       <title>Register | {{$site->site_name}}</title>

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
                <h3>Create an Account</h3>
                <p>Creating multiple account is highly prohibited, it can lead to forfeiting of all Earnings.</p>
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
            <form method="POST" action="{{ route('register.user') }}" class="billing-details">
            @csrf
                <div class="form-group">
                    <label>Username <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="username" placeholder="Your Username" required>
                </div>
                <div class="form-group">
                    <label>Phone number <span style="color: red">*</span></label>
                    <input type="tel" class="form-control" name="phone" placeholder="Phone number" required>
                </div>
                <div class="form-group">
                    <label>Email <span style="color: red">*</span></label>
                    <input type="email" class="form-control" name="email" placeholder="Your email" required>
                </div>
                <div class="form-group">
                    <label>Password <span style="color: red">*</span></label>
                    <input type="password" class="form-control" name="password" placeholder="Your password" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password <span style="color: red">*</span></label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Your password" required>
                </div>
                <div class="form-group">
                    <label>Bank name</label>
                    <select  name="account_bank" class="form-control">
                        <option value="" selected>--Select Bank-- </option>

                            <option value="Access Bank"> Access Bank</option>

                            <option value="Access Bank (Diamond)"> Access Bank (Diamond)</option>

                            <option value="ALAT by WEMA"> ALAT by WEMA</option>

                            <option value="ASO Savings and Loans"> ASO Savings and Loans</option>

                            <option value="CEMCS Microfinance Bank"> CEMCS Microfinance Bank</option>

                            <option value="Citibank Nigeria"> Citibank Nigeria</option>

                            <option value="Ecobank Nigeria"> Ecobank Nigeria</option>

                            <option value="Ekondo Microfinance Bank"> Ekondo Microfinance Bank</option>

                            <option value="Fidelity Bank"> Fidelity Bank</option>

                            <option value="First Bank of Nigeria"> First Bank of Nigeria</option>

                            <option value="First City Monument Bank"> First City Monument Bank</option>

                            <option value="Globus Bank"> Globus Bank</option>

                            <option value="Guaranty Trust Bank"> Guaranty Trust Bank</option>

                            <option value="Heritage Bank"> Heritage Bank</option>

                            <option value="Jaiz Bank"> Jaiz Bank</option>

                            <option value="Keystone Bank"> Keystone Bank</option>

                            <option value="Kuda Bank"> Kuda Bank</option>

                            <option value="Parallex Bank"> Parallex Bank</option>

                            <option value="Polaris Bank"> Polaris Bank</option>

                            <option value="Providus Bank"> Providus Bank</option>

                            <option value="Rubies MFB"> Rubies MFB</option>

                            <option value="Sparkle Microfinance Bank"> Sparkle Microfinance Bank</option>

                            <option value="Stanbic IBTC Bank"> Stanbic IBTC Bank</option>

                            <option value="Standard Chartered Bank"> Standard Chartered Bank</option>

                            <option value="Sterling Bank"> Sterling Bank</option>

                            <option value="Suntrust Bank"> Suntrust Bank</option>

                            <option value="TAJ Bank"> TAJ Bank</option>

                            <option value="Titan Bank"> Titan Bank</option>

                            <option value="Union Bank of Nigeria"> Union Bank of Nigeria</option>

                            <option value="United Bank For Africa"> United Bank For Africa</option>

                            <option value="Unity Bank"> Unity Bank</option>

                            <option value="VFD"> VFD</option>

                            <option value="Wema Bank"> Wema Bank</option>

                            <option value="Zenith Bank"> Zenith Bank</option>

                    </select>
                </div>
                <div class="form-group">
                    <label>Account name</label>
                    <input type="text" class="form-control" name="account_name" placeholder="Account name">
                </div>
                <div class="form-group">
                    <label>Account number</label>
                    <input type="number" class="form-control" name="account_number" placeholder="Account number">
                </div>
                <button type="submit"  class="default-btn">Register</button>
            </form>

            <div class="form-footer">
                <p>Do you have an account? <a class="form-link" href="{{ route('login') }}">Login</a></p>
            </div>
        </div>
    </div>


    <div class="go-top"><i class="fas fa-chevron-up"></i></div>
    @include('layouts.js')
</body>

</html>


