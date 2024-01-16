@component('mail::message')
    <h3>Hi  {{ $receiver->username}}</h3>

   Your LAT wallet has been credited with {{ number_format($receiver->amount, 2) }}.<br>


 <p>kindly <a href="https://lilyadd.com/my-wallet"> LOGIN </a> to see your LAT wallet balance </p>


@component('mail::button', ['url' => 'https://lilyadd.com'])
Go to Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
