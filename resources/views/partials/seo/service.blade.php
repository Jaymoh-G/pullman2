@php
    $serviceSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => $serviceName,
        'description' => $serviceDescription,
        'url' => $serviceUrl ?? request()->url(),
        'provider' => [
            '@id' => url('/') . '#business',
        ],
        'areaServed' => [
            '@type' => 'Country',
            'name' => 'Kenya',
        ],
    ];
    if (!empty($serviceImage)) {
        $serviceSchema['image'] = \Illuminate\Support\Str::startsWith($serviceImage, 'http')
            ? $serviceImage
            : asset(ltrim($serviceImage, '/'));
    }
@endphp
<script type="application/ld+json">{!! json_encode($serviceSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
