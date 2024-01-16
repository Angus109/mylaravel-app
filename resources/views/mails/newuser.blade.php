<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Muli:400,300" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
</head>
<body>
    <div class="image-container set-full-height">
        <br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <address>
                                <strong>Coin Trading Source</strong>
                                <br>
                                User Name: {{$data->username}}
                                <br>
                                Full Name: {{$data->name}}
                                <br>
                                E-Mail: {{$data->email}}
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                Dear {{$data['name']}}

                        We are delighted you joined Coin Trading Source. <br>
                        You will be a great asset to our team , and we look forward to a positive investment relationship.
                        <br>There's always a lot to learn on a new investment, we want you to know that we're all anxious to see you succeed and there will be plenty of opportunity<br> for you to learn and grow your investment Good luck on your investment and please feel free to <br>contact the admin if you have any question as you get started

                        <br>
                        Your login information:
                        <br>

                        Email: {{$data['email']}}
                        <br>

                        You can login <a href="{{route('login')}}">here</a>
                        <br>
                        Contact us immediately if you did not authorize this registration.
                            </div>
                        </div>
                        <div>
                            <h4 style="text-align:left;">
                                Thank you.<br>

                                Coin Trading Source.
                                <br>
                                Tel: +(44) 7451280518
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="container text-center">
                &copy; Coin Trading Source {{date('Y')}}
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
</html>
