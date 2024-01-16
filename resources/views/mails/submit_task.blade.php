@component('mail::message')
Good day {{ $user->username}} <br>

<p>Congratulations your Task was  was submiited successfully!</p>
<p>Our Admin would either approve or decline your task, So we urge you to always check your <a href="https://www.lilyadd.com/dashboard">Dashboard </a> for update</p>
<br>
<p>below are your task details;</p>
<strong>Reference:</strong> {{ $fileUpload['reference'] }}<br>
<strong>Task Title:</strong> {{ $fileUpload['task_slug'] }}<br>
<strong>Payment Type: </strong> {{ $fileUpload['payment'] }}<br>

<p><em>thanks once again for participating.</em></p>
<br>
<small>
    If you have any questions or comments, please send an email to <span style="color: #39c98d">info@lilyadd.com</span> or send us a message on *Twitter*, *Instagram* or *Facebook*.

    To gain more insight about MyLoop and to get firsthand information from us, visit our FAQ page <a href="https://www.lilyadd.com/frequently-asked-questions"> *here* </a>.
</small>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
