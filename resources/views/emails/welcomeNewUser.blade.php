@component('mail::message') # Welcome to {{ config("app.name") }}

Hi {{ $username }}, <br />
Your account was created successfully. Your credentials are as follows: <br />
Email: {{ $email }} Password: {{ $password }}

@component('mail::button', ['url' =>'https://pullmanexcavatorskenya.com//login']) Login
@endcomponent Thanks,<br />
{{ config("app.name") }}
@endcomponent
