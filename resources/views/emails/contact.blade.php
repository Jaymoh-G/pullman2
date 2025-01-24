@component('mail::message') # Welcome to {{ config("app.name") }}

Hello,<br>
Form fill for contact us page on pullmanexcavatorskenya.com/contact-us <br>
Name: {{$name}} <br>
Phone: {{$phone}}<br>
Subject: {{$subject}}<br>
Message: {{$message}}<br>

Thanks,<br />
{{ config("app.name") }}
@endcomponent
