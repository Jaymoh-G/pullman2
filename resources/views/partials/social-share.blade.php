@php
    $shareUrl = $url ?? request()->url();
    $shareTitle = $title ?? '';
    $shareLayout = $layout ?? 'post-social';
    $encodedUrl = urlencode($shareUrl);
    $encodedTitle = urlencode($shareTitle);
@endphp

@if($shareLayout === 'share-submenu')
    <li>
        <a
            href="https://api.whatsapp.com/send?text={{ $encodedTitle }}%20{{ $encodedUrl }}"
            target="_blank"
            rel="noopener noreferrer"
            class="whatsapp"
            title="Share with WhatsApp"
        >
            <i class="fab fa-whatsapp"></i>
        </a>
    </li>
    <li>
        <a
            href="https://www.facebook.com/sharer.php?u={{ $encodedUrl }}"
            target="_blank"
            rel="noopener noreferrer"
            class="facebook"
            title="Share on Facebook"
        >
            <i class="fab fa-facebook"></i>
        </a>
    </li>
    <li>
        <a
            href="https://twitter.com/share?url={{ $encodedUrl }}&text={{ $encodedTitle }}"
            target="_blank"
            rel="noopener noreferrer"
            class="twitter"
            title="Share on Twitter"
        >
            <i class="fab fa-twitter"></i>
        </a>
    </li>
    <li>
        <a
            href="#"
            class="tiktok tiktok-share"
            title="Copy link and open TikTok"
            aria-label="Copy link and open TikTok"
            data-share-url="{{ $shareUrl }}"
            data-share-title="{{ $shareTitle }}"
        >
            <i class="fab fa-tiktok"></i>
        </a>
    </li>
@else
    <a
        title="Share this"
        href="https://www.facebook.com/sharer.php?u={{ $encodedUrl }}"
        target="_blank"
        rel="noopener noreferrer"
        class="facebook-share"
    >
        <i class="fab fa-facebook-f"></i>
    </a>
    <a
        title="Tweet this"
        href="https://twitter.com/share?url={{ $encodedUrl }}&text={{ $encodedTitle }}"
        target="_blank"
        rel="noopener noreferrer"
        class="twitter-share"
    >
        <i class="fab fa-twitter"></i>
    </a>
    <a
        title="Share with WhatsApp"
        href="https://api.whatsapp.com/send?text={{ $encodedTitle }}%20{{ $encodedUrl }}"
        target="_blank"
        rel="noopener noreferrer"
        class="whatsapp-share"
    >
        <i class="fab fa-whatsapp"></i>
    </a>
    <a
        title="Copy link and open TikTok"
        aria-label="Copy link and open TikTok"
        href="#"
        class="tiktok-share"
        data-share-url="{{ $shareUrl }}"
        data-share-title="{{ $shareTitle }}"
    >
        <i class="fab fa-tiktok"></i>
    </a>
@endif
