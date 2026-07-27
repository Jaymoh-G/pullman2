@php
    $articleSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Article',
        'headline' => $articleTitle,
        'description' => $articleDescription ?? $articleTitle,
        'datePublished' => isset($articlePublished) ? \Illuminate\Support\Carbon::parse($articlePublished)->toIso8601String() : null,
        'dateModified' => isset($articleModified) ? \Illuminate\Support\Carbon::parse($articleModified)->toIso8601String() : null,
        'mainEntityOfPage' => $articleUrl ?? request()->url(),
        'author' => [
            '@type' => 'Organization',
            'name' => 'Pullman Excavators Kenya',
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'Pullman Excavators Kenya',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => asset('images/logo_pullman-rsz.png'),
            ],
        ],
    ];
    if (!empty($articleImage)) {
        $articleSchema['image'] = [
            \Illuminate\Support\Str::startsWith($articleImage, 'http')
                ? $articleImage
                : asset(implode('/', array_map('rawurlencode', explode('/', ltrim($articleImage, '/'))))),
        ];
    }
    $articleSchema = array_filter($articleSchema, function ($value) {
        return !is_null($value);
    });
@endphp
<script type="application/ld+json">{!! json_encode($articleSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
