<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Basic SEO -->
    @php
        $seo = new \stdClass();
        $seo->title_ar = $blog->seo_title_ar ?? $blog->name_ar;
        $seo->title_en = $blog->seo_title_en ?? $blog->name_en;
        $seo->title_es = $blog->seo_title_es ?? $blog->name_es;
        $seo->title_fr = $blog->seo_title_fr ?? $blog->name_fr;
        
        $seo->description_ar = $blog->seo_description_ar ?? \Illuminate\Support\Str::limit(strip_tags($blog->description_ar), 150);
        $seo->description_en = $blog->seo_description_en ?? \Illuminate\Support\Str::limit(strip_tags($blog->description_en), 150);
        $seo->description_es = $blog->seo_description_es ?? \Illuminate\Support\Str::limit(strip_tags($blog->description_es), 150);
        $seo->description_fr = $blog->seo_description_fr ?? \Illuminate\Support\Str::limit(strip_tags($blog->description_fr), 150);
        
        $seo->keywords_ar = $blog->seo_keywords_ar ?? '';
        $seo->keywords_en = $blog->seo_keywords_en ?? '';
        $seo->keywords_es = $blog->seo_keywords_es ?? '';
        $seo->keywords_fr = $blog->seo_keywords_fr ?? '';
        
        $seo->image = $blog->image;
    @endphp
    @include('components.seo')

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/logo.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/logo.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/logo.png') }}">

    <!-- Fonts (non-render-blocking) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&family=Montserrat:wght@400;600;700;800&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&family=Montserrat:wght@400;600;700;800&display=swap"
        rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet"></noscript>

    <!-- Critical CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- Non-critical CSS (deferred) -->
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="{{ asset('css/all.min.css') }}"></noscript>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet" media="print" onload="this.media='all'">
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet" media="print" onload="this.media='all'">
    <script>
        const savedLang = localStorage.getItem("lang") || (navigator.language.slice(0, 2) === 'ar' ? 'ar' : 'en');
        document.documentElement.dir = savedLang === 'ar' ? 'rtl' : 'ltr';
        document.documentElement.style.opacity = '0';
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-lg shadow-sm" id="mainNavbar">
        <div class="container-lg ">
            <a class="navbar-brand" href="/">
                <div class="logo-icon">
                    <img src="{{ asset('assets/logo.png') }}" height="70" class="w-100 dark-logo">
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto gap-3 text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/" data-en="Home" data-ar="الرئيسية" data-es="Inicio"
                            data-fr="Accueil">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}" data-en="About Us" data-ar="من نحن"
                            data-es="Sobre Nosotros" data-fr="À propos">
                            About Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories') }}" data-en="Products" data-ar="المنتجات"
                            data-es="Productos" data-fr="Produits">
                            Products
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#" data-en="Partners" data-ar="شركاؤنا" data-es="Socios"
                            data-fr="Partenaires">
                            Partners
                        </a>
                    </li> --}}
                    <li class="nav-item dropdown d-flex justify-content-center">
                        <button class="nav-link dropdown-toggle btn-dropdown" id="newsDropdown" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false" data-en="News" data-ar="الأخبار"
                            data-es="Noticias" data-fr="Actualités">
                            News
                        </button>
                        <ul class="dropdown-menu news-drop-down" aria-labelledby="newsDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('all-news') }}" data-en="Latest News"
                                    data-ar="آخر الأخبار" data-es="Últimas Noticias" data-fr="Dernières Nouvelles">
                                    Latest News
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('all-blogs') }}" data-en="Blog"
                                    data-ar="مدونة" data-es="Blog" data-fr="Blog">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}" data-en="Contact Us" data-ar="تواصل معنا"
                            data-es="Contáctanos" data-fr="Contactez-nous">
                            Contact Us
                        </a>
                    </li>
                </ul>
                <div class="dropdown p-4 p-lg-0 d-flex justify-content-center align-items-center">
                    <button class="btn btn-warning dropdown-toggle" type="button" id="languageDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false"
                        data-en="Language" data-ar="اللغة" data-es="Idioma" data-fr="Langue">
                        Language
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item" href="#" data-lang="en">English</a></li>
                        <li><a class="dropdown-item" href="#" data-lang="ar">Arabic</a></li>
                        <li><a class="dropdown-item" href="#" data-lang="es">Spanish</a></li>
                        <li><a class="dropdown-item" href="#" data-lang="fr">French</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <section class="blog-section py-5">
        <div class="container py-5">
            <div class="row g-4 pt-5">
                <div class="col-lg-8">
                    <div class="blog-detail-content p-2">
                        <div class="image-box" data-aos="fade-up">
                            @if ($blog->image)
                                <img src="{{ asset('images/blogs/' . $blog->image) }}" alt="{{ $blog->name_ar }}" loading="lazy" decoding="async"
                                    class="img-fluid rounded">
                            @endif
                        </div>
                        <div class="date d-flex gap-2 align-items-center p-4" data-aos="fade-up">
                            <i class="fas fa-calendar-alt"></i> @php
                                $date = \Carbon\Carbon::parse($blog->created_at);
                            @endphp

                            <span data-en="{{ $date->format('F d, Y') }}"
                                data-ar="{{ $date->locale('ar')->isoFormat('D MMMM YYYY') }}"
                                data-es="{{ $date->locale('es')->isoFormat('D [de] MMMM [de] YYYY') }}"
                                data-fr="{{ $date->locale('fr')->isoFormat('D MMMM YYYY') }}">
                                {{ $date->format('F d, Y') }}
                            </span>
                        </div>
                        <div class="detail-desc p-4" data-aos="fade-up">
                            <h3 style="text-align: center; color: #742e00;" data-en="{!! $blog->name_en !!}"
                                data-ar="{!! $blog->name_ar !!}" data-es="{!! $blog->name_es !!}"
                                data-fr="{!! $blog->name_fr !!}"></h3>
                            <p data-en="{!! $blog->description_en !!}" data-ar="{!! $blog->description_ar !!}"
                                data-es="{!! $blog->description_es !!}" data-fr="{!! $blog->description_fr !!}">
                            </p>

                        </div>
                        @php
                            $videos = $blog->videos ?? [];
                        @endphp

                        @foreach ($videos as $index => $video)
                            @if ($video)
                                <div class="video-wrapper mt-4 mt-lg-5 mb-0 rounded overflow-hidden shadow-sm w-100" data-aos="fade-up">
                                    <div class="ratio ratio-16x9">
                                        <video controls preload="metadata">
                                            <source src="{{ asset('videos/blogs/' . $video) }}" type="video/mp4">
                                            المتصفح لا يدعم تشغيل الفيديو
                                        </video>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        <style>
                            video {
                                margin: 0;
                                width: 100%;
                            }
                        </style>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up">
                    {{-- الصور الإضافية --}}
                    @if (!empty($blog->images))
                        <div class="latest-news-card p-4 rounded-4 mb-4">
                            <div class="d-flex flex-column gap-3">
                                @foreach (array_slice($blog->images, 0, 4) as $img)
                                    <div class="w-100" data-aos="fade-up">
                                        <img src="{{ asset('images/blogs/' . $img) }}" class="rounded border w-100"
                                            style="object-fit: cover; max-height: 400px;" alt="Additional Image">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="latest-news-card p-4 rounded-4 mb-5">
                        <h2 class="mb-3 mt-0" data-en="Latest News" data-ar="آخر الأخبار" data-es="Últimas Noticias"
                            data-fr="Dernières Nouvelles">
                            Latest News
                        </h2>

                        {{-- الأخبار السابقة --}}
                        @foreach ($latestBlogs ?? [] as $latest)
                            <a href="{{ route('news.show', $latest->id) }}" class="news-item d-flex gap-2 mb-4">
                                <img src="{{ asset('images/blogs/' . $latest->image) }}" class="news-img me-3"
                                    alt="">
                                <div>
                                    <h3 class="mb-1 h6" data-en="{!! $latest->name_en !!}"
                                        data-ar="{!! $latest->name_ar !!}" data-es="{!! $latest->name_es !!}"
                                        data-fr="{!! $latest->name_fr !!}"></h3>
                                    <p class="text-muted small mb-0"
                                        data-en="{{ $latest->created_at->locale('en')->translatedFormat('d F Y') }}"
                                        data-ar="{{ $latest->created_at->locale('ar')->translatedFormat('d F Y') }}"
                                        data-fr="{{ $latest->created_at->locale('fr')->translatedFormat('d F Y') }}"
                                        data-es="{{ $latest->created_at->locale('es')->translatedFormat('d F Y') }}">
                                    </p>
                                </div>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-3 related-posts">
        <div class="container">
            <div class="heading text-center" data-aos="fade-up">
                <h2 data-en="{{ $blog->status == 'new' ? 'Related News' : 'Related Posts' }}"
                    data-ar="{{ $blog->status == 'new' ? 'أخبار ذات صلة' : 'مقالات ذات صلة' }}"
                    data-es="{{ $blog->status == 'new' ? 'Noticias Relacionadas' : 'Publicaciones Relacionadas' }}"
                    data-fr="{{ $blog->status == 'new' ? 'Actualités Connexes' : 'Articles Connexes' }}">
                    {{ $blog->status == 'new' ? 'Related News' : 'Related Posts' }}
                </h2>

            </div>

            <div class="row g-4" data-aos="fade-up">
                @foreach ($relatedBlogs ?? [] as $related)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100">
                            <div class="img">
                                <img src="{{ asset('images/blogs/' . $related->image) }}" class="card-img-top"
                                    alt="{{ $related->name_en }}">
                            </div>
                            <div class="card-body">
                                <div class="date d-flex gap-2 align-items-center mb-3">
                                    <i class="fas fa-calendar-alt"></i>
                                    <span
                                        data-en="{{ $related->created_at->locale('en')->translatedFormat('d F Y') }}"
                                        data-ar="{{ $related->created_at->locale('ar')->translatedFormat('d F Y') }}"
                                        data-fr="{{ $related->created_at->locale('fr')->translatedFormat('d F Y') }}"
                                        data-es="{{ $related->created_at->locale('es')->translatedFormat('d F Y') }}">
                                        {{ $related->created_at->locale('en')->translatedFormat('d F Y') }}
                                    </span>
                                </div>

                                <h3 class="card-title mb-3">
                                    <a href="{{ route('news.show', $related->id) }}"
                                        data-en="{{ $related->name_en }}" data-ar="{{ $related->name_ar }}"
                                        data-es="{{ $related->name_es }}" data-fr="{{ $related->name_fr }}">
                                        {{ $related->name_en }}
                                    </a>
                                </h3>

                                <p class="card-text" data-en="{{ Str::limit(strip_tags($related->description_en), 150) }}"
                                    data-ar="{{ Str::limit(strip_tags($related->description_ar), 150) }}" data-es="{{ Str::limit(strip_tags($related->description_es), 150) }}"
                                    data-fr="{{ Str::limit(strip_tags($related->description_fr), 150) }}">
                                    {{ Str::limit(strip_tags($related->description_en), 150) }}
                                </p>

                                <div class="blog-footer">
                                    <a href="{{ route('news.show', $related->id) }}"
                                        class="blog-link d-flex align-items-center gap-2"
                                        data-en="Read More <i class='fas fa-arrow-right mt-1'></i>"
                                        data-ar="اقرأ المزيد <i class='fas fa-arrow-left mt-1'></i>"
                                        data-es="Leer Más <i class='fas fa-arrow-right mt-1'></i>"
                                        data-fr="Lire la suite <i class='fas fa-arrow-right mt-1'></i>">
                                        <span>Read More</span> <i class="fas fa-arrow-right mt-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </section>
    @include('layouts.footer')

    <div class="modal fade rounded-3" id="videoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-transparent border-0">

                <div class="modal-body p-0 position-relative">
                    <button type="button" class="btn-close custom-close" data-bs-dismiss="modal"
                        aria-label="Close"><i class="fas fa-xmark"></i></button>

                    <div class="ratio ratio-16x9">
                        <iframe id="videoFrame" src="" allow="autoplay; fullscreen" allowfullscreen>
                        </iframe>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="whatsapp-wrapper">
        <span class="whatsapp-message" data-en="Need help?" data-ar="هل تحتاج مساعدة؟" data-es="Necesitas ayuda?"
            data-fr="Besoin d'aide ?">
            Need help?
        </span>


        <a href="https://wa.me/962781101030" class="whatsapp-float" target="_blank" aria-label="Chat on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/video-modal.js') }}" defer></script>
</body>

</html>
