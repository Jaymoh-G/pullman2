@php
    $breadcrumbItems = [];
    foreach ($breadcrumbs as $index => $crumb) {
        $breadcrumbItems[] = [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $crumb['name'],
            'item' => $crumb['url'] ?? null,
        ];
    }
    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => array_map(function ($item) {
            if (empty($item['item'])) {
                unset($item['item']);
            }
            return $item;
        }, $breadcrumbItems),
    ];
@endphp
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
