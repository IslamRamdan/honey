@php echo '<?xml version="1.0" encoding="UTF-8"?>'; @endphp
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach ($staticUrls as $staticUrl)
    <url>
        <loc>{{ $staticUrl['loc'] }}</loc>
@isset($staticUrl['priority'])
        <priority>{{ $staticUrl['priority'] }}</priority>
@endisset
@isset($staticUrl['changefreq'])
        <changefreq>{{ $staticUrl['changefreq'] }}</changefreq>
@endisset
    </url>
@endforeach

@foreach ($categories as $category)
    <url>
        <loc>{{ route('categories.show.products', $category) }}</loc>
@if($category->updated_at)
        <lastmod>{{ optional($category->updated_at)->toAtomString() }}</lastmod>
@endif
        <changefreq>weekly</changefreq>
    </url>
@endforeach

@foreach ($blogs as $blog)
    <url>
        <loc>{{ route('news.show', $blog->id) }}</loc>
@if($blog->updated_at)
        <lastmod>{{ optional($blog->updated_at)->toAtomString() }}</lastmod>
@endif
        <changefreq>weekly</changefreq>
    </url>
@endforeach
</urlset>
