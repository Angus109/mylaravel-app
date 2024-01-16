<h4>New Contact Us Message</h4>
<p>Sender: {{$data->name}}</p>
<p>E-Mail: {{$data->email}}</p>
<p>Subject: {{$data->subject}}</p>
<p>Phone Number: {{$data->phone}}</p>
<p>Message:</p>
{{$data->message}}
<p>
    &copy; {{ config('app.name') }} {{date('Y')}}
</p>
