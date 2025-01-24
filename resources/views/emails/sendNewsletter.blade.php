@component('mail::message') 

# {{ config("app.name") }} newsletter

Hi {{$username}},

{!!$newsletterMessage!!}

@component('mail::button', ['url' => 'https://pullmanexcavatorskenya.com']) Visit Site @endcomponent 

Thanks,<br />
{{ config("app.name") }}
@endcomponent