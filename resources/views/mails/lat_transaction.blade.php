@component('mail::message')
    <h3>Hi {{ $id->username}} </h3>

   Your LAT transfer of {{ number_format($id->amount, 2) }} was sent successfully .<br>



@component('mail::button', ['url' => 'https://lilyadd.com/dashboard'])
Go to Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
