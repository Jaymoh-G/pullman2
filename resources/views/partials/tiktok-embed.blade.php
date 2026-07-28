@php
    $tiktokVideoUrl = $videoUrl ?? '';
    preg_match('/\/video\/(\d+)/', $tiktokVideoUrl, $tiktokMatches);
    $tiktokVideoId = $tiktokMatches[1] ?? null;
    $tiktokHandle = config('services.tiktok.handle', '@pullman.excavators');
    $tiktokProfileUrl = config('services.tiktok.profile_url', 'https://www.tiktok.com/@pullman.excavators');
@endphp
@if($tiktokVideoId)
<blockquote
    class="tiktok-embed"
    cite="{{ $tiktokVideoUrl }}"
    data-video-id="{{ $tiktokVideoId }}"
    style="max-width: 605px; min-width: 325px;"
>
    <section>
        <a
            target="_blank"
            rel="noopener noreferrer"
            title="{{ $tiktokHandle }}"
            href="{{ $tiktokProfileUrl }}?refer=embed"
        >{{ $tiktokHandle }}</a>
    </section>
</blockquote>
@endif
