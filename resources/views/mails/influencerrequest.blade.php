<h4>New Influencer Request</h4>
<p>Sender: {{$data->name}}</p>
<p>E-Mail: {{$data->email}}</p>
<p>Phone Number: {{$data->phone}}</p>
<p>Message:</p>
{{$data->description}}

<p>Provider: {{$data->provider}}</p>
<p>City: {{$data->city}}</p>
<p>Amount: {{$data->amount}}</p>
<p>

    &copy; {{ config('app.name') }} {{date('Y')}}
</p>
