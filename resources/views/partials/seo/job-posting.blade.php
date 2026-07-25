@php
    $jobSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'JobPosting',
        'title' => $jobTitle,
        'description' => $jobDescription ?? $jobTitle,
        'datePosted' => isset($jobPosted) ? \Illuminate\Support\Carbon::parse($jobPosted)->toIso8601String() : null,
        'validThrough' => isset($jobDeadline) ? \Illuminate\Support\Carbon::parse($jobDeadline)->toIso8601String() : null,
        'hiringOrganization' => [
            '@type' => 'Organization',
            'name' => 'Pullman Excavators Kenya',
            'sameAs' => url('/'),
            'logo' => asset('images/logo_pullman-rsz.png'),
        ],
        'jobLocation' => [
            '@type' => 'Place',
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => $jobLocation ?? 'Nairobi',
                'addressCountry' => 'KE',
            ],
        ],
        'employmentType' => $jobEmploymentType ?? 'FULL_TIME',
    ];
    $jobSchema = array_filter($jobSchema, function ($value) {
        return !is_null($value);
    });
@endphp
<script type="application/ld+json">{!! json_encode($jobSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>
