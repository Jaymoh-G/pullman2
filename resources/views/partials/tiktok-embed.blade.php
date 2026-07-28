@php
    $tiktokVideoUrl = $videoUrl ?? '';
    preg_match('/\/video\/(\d+)/', $tiktokVideoUrl, $tiktokMatches);
    $tiktokVideoId = $tiktokMatches[1] ?? null;
    $tiktokHandle = config('services.tiktok.handle', '@pullman.excavators');
@endphp
@if($tiktokVideoId)
@once
<style>
    .tiktok-player-wrap {
        width: 100%;
        max-width: 325px;
        margin: 0 auto;
    }
    .tiktok-player-wrap iframe,
    .pub_videos .tiktok-player-wrap iframe,
    .videos-div .tiktok-player-wrap iframe,
    .sidebar-tiktok .tiktok-player-wrap iframe {
        display: block;
        width: 100% !important;
        max-width: 325px !important;
        height: 580px !important;
        border: 0 !important;
        margin: 0 auto !important;
        padding: 0 !important;
        background: #000;
    }
</style>
@endonce
<div class="tiktok-player-wrap" wire:ignore>
    <iframe
        src="https://www.tiktok.com/player/v1/{{ $tiktokVideoId }}?controls=1&play_button=1&progress_bar=1&volume_control=1&fullscreen_button=1&description=1&music_info=1&rel=0"
        title="TikTok video by {{ $tiktokHandle }}"
        allow="fullscreen; encrypted-media; autoplay; clipboard-write"
        allowfullscreen
        loading="lazy"
        referrerpolicy="strict-origin-when-cross-origin"
    ></iframe>
</div>
@endif
