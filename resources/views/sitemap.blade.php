<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <!-- Static Pages -->
    <url>
        <loc>{{ url('/') }}</loc>
        <priority>1.0</priority>
        <changefreq>daily</changefreq>
    </url>

    <url>
        <loc>{{ url('/about-us') }}</loc>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>{{ url('/products') }}</loc>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>{{ url('/categories') }}</loc>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>{{ url('/news') }}</loc>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>{{ url('/contact-us') }}</loc>
        <priority>0.7</priority>
    </url>

    <!-- Categories -->
    @foreach ($categories as $category)
        <url>
            <loc>{{ url('/categories/' . $category->id) }}</loc>
            <lastmod>{{ $category->updated_at->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
        </url>
    @endforeach

    <!-- Products -->
    @foreach ($products as $product)
        <url>
            <loc>{{ url('/products/' . $product->id) }}</loc>
            <lastmod>{{ $product->updated_at->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
        </url>
    @endforeach

    <!-- Blogs / News -->
    @foreach ($blogs as $blog)
        <url>
            <loc>{{ url('/news/' . $blog->id) }}</loc>
            <lastmod>{{ $blog->updated_at->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
        </url>
    @endforeach

</urlset>
