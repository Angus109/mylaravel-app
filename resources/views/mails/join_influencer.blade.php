@component('mail::message')
Hello <b>{{ $data['name'] }}</b>! <br>

Congratulations on taking the first step towards joining our large team of online influencers!

<h5>How it works</h5>
<p>
    Working as an influencer is the easiest way to earn. You are given a content to promote you earn from the engagement generated from your promotion. You help our clients get their business out and you earn a side income. It’s a win-win for us all! This is an influencer package. If you are not an influencer, just register as a normal user.
</p>

<small>
    If you have any questions or comments, please send an email to <span style="color: #11c054">support@lilyadd.com</span> or send us a message on *Twitter*, *Instagram* or *Facebook*.

    To gain more insight about LilyAdd and to get firsthand information from us, visit our FAQ page *here*.
</small>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
