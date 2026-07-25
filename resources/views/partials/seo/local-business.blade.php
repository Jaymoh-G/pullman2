@php
    $businessSchema = [
        '@context' => 'https://schema.org',
        '@type' => ['Organization', 'LocalBusiness'],
        '@id' => url('/') . '#business',
        'name' => 'Pullman Excavators Kenya',
        'url' => url('/'),
        'logo' => asset('images/logo_pullman-rsz.png'),
        'image' => asset('images/logo_pullman-rsz.png'),
        'telephone' => '+254726634673',
        'email' => 'pullmanexcavators@gmail.com',
        'address' => [
            '@type' => 'PostalAddress',
            'addressLocality' => 'Nairobi',
            'addressCountry' => 'KE',
        ],
        'areaServed' => [
            '@type' => 'Country',
            'name' => 'Kenya',
        ],
        'description' => 'Excavation, demolition, equipment and machine hire, and building materials supply in Nairobi and across Kenya.',
        'sameAs' => [],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($businessSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
