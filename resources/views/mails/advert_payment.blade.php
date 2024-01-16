@component('mail::message')
    <h3>Hi {{ $user }} </h3>

   Your LAT wallet transfer was successful.<br>


    N,{{ $amount }} has been debited from your account.
    Please find the transaction summary below.


@component('mail::button', ['url' => 'https://lilyadd.com'])
Go to Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
