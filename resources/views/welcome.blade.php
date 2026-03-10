<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Ensures proper rendering in IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Basic SEO -->
    @include('components.seo')

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seo->{'title_' . app()->getLocale()} ?? 'Bee & Honey - Natural Honey Products' }}">
    <meta name="twitter:description"
        content="{{ $seo->{'description_' . app()->getLocale()} ?? 'Explore the finest natural honey from Bee & Honey. Shop honey products and learn more about our farm.' }}">
    <meta name="twitter:image" content="{{ isset($seo->image) && $seo->image ? asset('storage/' . $seo->image) : asset('assets/logo.png') }}">
    <meta name="twitter:site" content="@BeeAndHoney">
    <meta name="twitter:creator" content="@BeeAndHoney">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/logo.png">
    <link rel="mask-icon" href="assets/logo.png" color="#ffc107">
    <meta name="msapplication-TileColor" content="#ffc107">
    <meta name="theme-color" content="#ffffff">


    <!-- Google Fonts (non-render-blocking) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&family=Montserrat:wght@400;600;700;800&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&family=Montserrat:wght@400;600;700;800&display=swap"
        rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet"></noscript>

    <!-- Critical CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- Non-critical CSS (deferred) -->
    <link href="css/all.min.css" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="css/all.min.css"></noscript>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet" media="print" onload="this.media='all'">
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet" media="print" onload="this.media='all'">
    <link href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" rel="stylesheet" media="print" onload="this.media='all'">
    <script>
        const savedLang = localStorage.getItem("lang") || (navigator.language.slice(0, 2) === 'ar' ? 'ar' : 'en');
        document.documentElement.dir = savedLang === 'ar' ? 'rtl' : 'ltr';
        document.documentElement.style.opacity = '0';
    </script>
</head>


<body class="home-body">
<main>

    <section class="hero">
        <div class="hero-video-wrapper">
            <video autoplay muted loop playsinline preload="auto" poster="{{ asset('assets/logo.png') }}" class="hero-video" id="heroVideo">
                <source src="{{ !empty($settings["hero_video"]) ? asset("storage/" . $settings["hero_video"]) : asset("assets/website-video.mp4") }}" type="video/mp4">
            </video>
        </div>
        @include('layouts.header')

        <div class="hero-inner py-5">
            <h1 class="visually-hidden" style="position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border: 0;">
                {{ isset($seo) && $seo ? ($seo->{'title_' . app()->getLocale()} ?? $seo->title_en) : 'Bee & Honey - Natural Honey Products' }}
            </h1>
            {{-- <div class="rotating-text-wrapper mb-4">
                <h2 class="t1" data-en="The best quality Honey from our farm"
                    data-ar="أفضل عسل بجودة عالية من مزارعنا" data-es="La mejor miel de calidad de nuestra granja"
                    data-fr="Le meilleur miel de qualité de notre ferme">
                    The best quality Honey from our farm
                </h2>

                <h2 class="t2" data-en="Pure natural honey straight to your table"
                    data-ar="عسل طبيعي نقي مباشرة إلى مائدتك" data-es="Miel natural puro directo a tu mesa"
                    data-fr="Miel naturel pur directement sur votre table">Pure natural honey straight to your table
                </h2>

                <h2 class="t3" data-en="Taste the sweetness of nature" data-ar="تذوق حلاوة الطبيعة"
                    data-es="Prueba la dulzura de la naturaleza" data-fr="Goûtez la douceur de la nature">
                    Taste the sweetness of nature
                </h2>
            </div>
            <div class="hero-btns">
                <a href="#brief" class="btn btn-warning">
                    <span data-en="Explore More" data-ar="اكتشف المزيد" data-es="Explorar más"
                        data-fr="Explorer plus">
                        Explore More
                    </span>
                    <span class="arrow-circle"><i class="fas fa-arrow-down"></i></span>
                </a>
            </div> --}}

        </div>
    </section>
    <section class="about-brief" id="brief">
        <div class="container pt-5 py-5">
            <div class="row g-4 justify-content-center align-items-center">
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="text p-3">
                        <h2 data-en="{{ $aboutBrief->title_en ?? '' }}" data-ar="{{ $aboutBrief->title_ar ?? '' }}" data-es="{{ $aboutBrief->title_es ?? '' }}"
                            data-fr="{{ $aboutBrief->title_fr ?? '' }}">
                            {{ $aboutBrief->{'title_' . app()->getLocale()} ?? '' }}
                        </h2>
                        
                        <div class="text-muted dynamic-content" 
                            data-ar="{{ strip_tags($aboutBrief->content_ar ?? '') }}" 
                            data-en="{{ strip_tags($aboutBrief->content_en ?? '') }}"
                            data-fr="{{ strip_tags($aboutBrief->content_fr ?? '') }}" 
                            data-es="{{ strip_tags($aboutBrief->content_es ?? '') }}">
                            {!! nl2br(e($aboutBrief->{'content_' . app()->getLocale()} ?? '')) !!}
                        </div>

                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="image">
                        <img src="{{ !empty($aboutBrief->image) ? asset('storage/' . $aboutBrief->image) : asset('assets/freepik__ultra-realistic-studio-product-photography-of-natu__55394.png') }}" width="600" height="400" loading="lazy" decoding="async" class="w-100" alt="{{ $aboutBrief->title_en ?? 'About Bee & Honey' }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section-divider"></div>

    <section class="swiper-section">
        <div class="swiper products-swiper">
            <div class="swiper-wrapper">
                @foreach($sliders as $slider)
                <div class="swiper-slide">
                    <img src="{{ asset('storage/' . $slider->image) }}" loading="lazy" decoding="async" alt="Honey Product Banner">
                </div>
                @endforeach
            </div>

        </div>
    </section>
    {{-- <section class="py-5 swiper-section">
        <div class="swiper products-swiper">
            <div class="swiper-wrapper">
                @foreach ($allImages as $product)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/' . $product) }}" alt="{{ $product }}" class="img-fluid">
                    </div>
                @endforeach
            </div>

        </div>
    </section> --}}
    <section class="map-section" data-aos="zoom-in">
        <div class="container-fluid px-0">
            <div class="heading">
                <div class="container pb-4">
                    <h2 class="text-center mb-2" data-en="Our Agent Locations" data-ar="مواقع وكلائنا"
                        data-es="Ubicaciones de nuestros agentes" data-fr="Emplacements de nos agents">
                        Our Agent Locations
                    </h2>

                </div>
            </div>
            <div class="row g-4 align-items-center mt-4">
                <div class="col-lg-6">
                    <div class="map-container">
                        <div id="chartdiv"></div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="branches px-2">
                        <div class="row g-4">
                            @foreach($branches as $branch)
                            <div class="col-sm-6 col-md-4 col-lg-6">
                                <div class="branch-box shadow-sm">
                                    <div class="title">
                                        <h3 data-ar="{{ $branch->country_ar }}" data-en="{{ $branch->country_en }}" data-fr="{{ $branch->country_fr }}" data-es="{{ $branch->country_es }}">
                                            {{ $branch->{'country_' . app()->getLocale()} }}
                                        </h3>
                                    </div>
                                    <div class="desc">
                                        <p class="text-muted"
                                            data-ar="{{ $branch->description_ar }}"
                                            data-en="{{ $branch->description_en }}"
                                            data-fr="{{ $branch->description_fr }}"
                                            data-es="{{ $branch->description_es }}">
                                            {{ $branch->{'description_' . app()->getLocale()} }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>

                </div>
            </div>
        </div>
        </div>
        </div>

    </section>


    <section class="certificates-section">
        <div class="container pb-5">
            <h2 class="text-center mt-2" data-aos="zoom-in" data-en="Our Certificates" data-ar="شهاداتنا"
                data-es="Nuestros certificados" data-fr="Nos certificats">
                Our Certificates
            </h2>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-4 mt-5">
                @foreach($certificates as $certificate)
                <div class="col">
                    <div class="certificate-item" data-aos="zoom-in">
                        <div class="image mx-auto">
                            <img src="{{ asset('storage/' . $certificate->icon_image) }}" width="180" height="250" loading="lazy" decoding="async" class="img-fluid certificate-img"
                                alt="Bee and Honey Certificate" data-bs-toggle="modal" data-bs-target="#certificateModal"
                                data-bs-imgs="{{ implode(',', array_map(function($img) { return asset('storage/' . $img); }, $certificate->full_images ?? [])) }}">
                            <div class="view-icon" data-bs-toggle="modal" data-bs-target="#certificateModal"
                                data-bs-imgs="{{ implode(',', array_map(function($img) { return asset('storage/' . $img); }, $certificate->full_images ?? [])) }}">
                                <i class="fa-regular fa-hand-pointer"></i>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>

    <section class="catalog-section py-5"
        @if(!empty($settings['catalog_image'] ?? ''))
            style="background: url('{{ asset('storage/' . $settings['catalog_image']) }}') no-repeat center center; background-size: cover;"
        @endif
    >
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6 text-center">
                    <div class="catalog-content">
                        <p class="catalog-text" data-en="To view the e-catalog" data-ar="لعرض الكتالوج الإلكتروني"
                            data-fr="Voir le catalogue électronique" data-es="Ver el catálogo electrónico">
                            To view the e-catalog
                        </p>

                        <a href="{{ isset($settings['catalog_link']) && (str_starts_with($settings['catalog_link'], 'http') || str_starts_with($settings['catalog_link'], '#')) ? $settings['catalog_link'] : (isset($settings['catalog_link']) ? asset('storage/' . $settings['catalog_link']) : '#') }}"
                            target="_blank" download class="catalog-btn">
                            <span class="visually-hidden">Download Catalog</span>
                            <i class="fa-solid fa-file-arrow-down fa-bounce"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="pb-5 counters" id="honeyCounters">
        <div class="container">
            <div class="row g-4 pt-3 mt-3 justify-content-center">
                @foreach($counters as $counter)
                <div class="col-md-6 col-lg-3" data-aos="zoom-in">
                    <div class="counter-box text-center">
                        <div class="bg"></div>
                        <div class="icon"><i class="{{ $counter->icon }}"></i></div>
                        <div class="number" data-target="{{ $counter->number }}" data-display="{{ $counter->display_text }}">0</div>
                        <div class="title" data-en="{{ $counter->title_en }}" data-ar="{{ $counter->title_ar }}"
                            data-fr="{{ $counter->title_fr }}" data-es="{{ $counter->title_es }}">
                            {{ $counter->{'title_' . app()->getLocale()} }}
                        </div>
                        <div class="bg-2"></div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>

    </main>

    @include('layouts.footer')

    <div class="modal fade" id="certificateModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" data-en="Certificate" data-ar="شهادة" data-es="Certificado"
                        data-fr="Certificat">
                        Certificate
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="cert-viewer">
                        <div class="cert-controls mb-2">
                            <button class="btn btn-sm btn-outline-primary" id="zoom-in" aria-label="Zoom in">
                                <i class="fas fa-search-plus"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-primary" id="zoom-out" aria-label="Zoom out">
                                <i class="fas fa-search-minus"></i>
                            </button>
                        </div>
                        <div class="cert-image-container d-flex flex-column align-items-center gap-2">
                        </div>
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
            <span class="visually-hidden">Chat on WhatsApp</span>
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>
    <script>
        window.mapLocationsData = @json($mapLocations);
    </script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>

    <script src="js/main.js" defer></script>
    <script src="js/certificate.js" defer></script>


    <!-- Map Scripts (deferred) -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" defer></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js" defer></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js" defer></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js" defer></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js" defer></script>
    <script src="js/map.js" defer></script>
</body>

</html>
