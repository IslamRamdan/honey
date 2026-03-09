@if (isset($seo) && $seo)
    <!-- Title -->
    <title data-ar="{{ $seo->title_ar }}" data-en="{{ $seo->title_en }}" data-es="{{ $seo->title_es }}"
        data-fr="{{ $seo->title_fr }}">
        {{ $seo->{'title_' . app()->getLocale()} ?? $seo->title_en }}
    </title>

    <!-- Meta Description -->
    <meta name="description" data-ar="{{ $seo->description_ar }}" data-en="{{ $seo->description_en }}"
        data-es="{{ $seo->description_es }}" data-fr="{{ $seo->description_fr }}"
        content="{{ $seo->{'description_' . app()->getLocale()} ?? '' }}">

    <!-- Meta Keywords -->
    <meta name="keywords" data-ar="{{ $seo->keywords_ar }}" data-en="{{ $seo->keywords_en }}"
        data-es="{{ $seo->keywords_es }}" data-fr="{{ $seo->keywords_fr }}"
        content="{{ $seo->{'keywords_' . app()->getLocale()} ?? '' }}">

    <!-- Open Graph Tags -->
    <meta property="og:title" content="{{ $seo->{'title_' . app()->getLocale()} ?? $seo->title_en }}">
    <meta property="og:description" content="{{ $seo->{'description_' . app()->getLocale()} ?? '' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    @if ($seo->image)
        <meta property="og:image" content="{{ Str::startsWith($seo->image, ['http', '../', 'images/']) ? asset($seo->image) : asset('storage/' . $seo->image) }}">
    @endif

    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seo->{'title_' . app()->getLocale()} ?? $seo->title_en }}">
    <meta name="twitter:description" content="{{ $seo->{'description_' . app()->getLocale()} ?? '' }}">
    @if ($seo->image)
        <meta name="twitter:image" content="{{ Str::startsWith($seo->image, ['http', '../', 'images/']) ? asset($seo->image) : asset('storage/' . $seo->image) }}">
    @endif
@else
    <title>{{ config('app.name', 'Bee and Honey') }}</title>
@endif
