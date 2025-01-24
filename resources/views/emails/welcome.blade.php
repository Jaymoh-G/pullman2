@component('mail::message') # Welcome to {{ config("app.name") }}

Hi {{ $name }}, <br />
Thank for subscribing to our newsletter. @component('mail::button', ['url'
=>'https://pullmanexcavatorskenya.com/']) Visit our Site @endcomponent Thanks,<br />
{{ config("app.name") }}
@endcomponent
