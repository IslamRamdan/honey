<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Basic SEO -->
    <title>Categories| Bee & Honey - Pure Natural Honey</title>
    <meta name="description"
        content="Learn about Bee & Honey, a brand of Yemeni Honey House. We offer pure, natural honey and honey products crafted with care to support a healthy lifestyle.">
    <meta name="keywords"
        content="Bee & Honey, natural honey, honey products, Yemeni Honey, pure honey, raw honey, honey packs, honey drinks">
    <meta name="author" content="Bee & Honey">
    <meta name="robots" content="index, follow">
    @php
        $seo = \App\Models\SeoSetting::first();
    @endphp

    {!! $seo->meta ?? '' !!}

    <!-- Open Graph / Social Media -->
    <meta property="og:title" content="About Bee & Honey - Pure Natural Honey">
    <meta property="og:description"
        content="Discover Bee & Honey, a brand delivering pure and natural honey and products crafted with care.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.yourwebsite.com/about-us.html">
    <meta property="og:image" content="https://www.yourwebsite.com/assets/about-1.jpg">
    <meta property="og:site_name" content="Bee & Honey">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="About Bee & Honey - Pure Natural Honey">
    <meta name="twitter:description"
        content="Learn about Bee & Honey, offering pure, natural honey and products crafted with care.">
    <meta name="twitter:image" content="https://www.yourwebsite.com/assets/about-1.jpg">
    <meta name="twitter:site" content="@BeeAndHoney">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/logo.png">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&family=IBM+Plex+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body class="categories-body">
    <nav class="navbar navbar-expand-lg shadow-sm" id="mainNavbar">
        <div class="container-lg ">
            <a class="navbar-brand" href="/">
                <div class="logo-icon">
                    <img src="assets/logo.png" height="70" class="w-100 dark-logo">
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
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
                        data-bs-toggle="dropdown" aria-expanded="false">
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
    <section class="py-5 categories" id="categories">
        <div class="container py-5">
            <div class="pt-5">
                <div class="heading pt-5">
                    <h2 data-aos="fade-up" class="mb-3 text-center" data-en="Explore Our Categories"
                        data-ar="استكشف فئاتنا" data-es="Explora nuestras categorías"
                        data-fr="Découvrez nos catégories">
                        Explore Our Categories
                    </h2>
                </div>
                <div class="row g-4 pt-3 mt-3">
                    @foreach ($categories as $category)
                        <div class="col-md-6 col-lg-4" data-aos="fade-up">
                            <a href="{{ route('categories.show.products', $category->id) }}" class="category-box">

                                {{-- صورة التصنيف --}}
                                <img src="{{ asset('images/categories/' . $category->image) }}"
                                    alt="{{ $category->name_en }}">

                                <div class="overlay"></div>

                                <div class="content">
                                    {{-- <span data-en="{{ $category->name_en ?? '' }}"
                                        data-ar="{{ $category->name_ar ?? '' }}"
                                        data-es="{{ $category->name_es ?? '' }}"
                                        data-fr="{{ $category->name_fr ?? '' }}">
                                        {{ $category->name_en ?? '' }}
                                    </span> --}}

                                    <h3 data-en="{{ $category->name_en }}" data-ar="{{ $category->name_ar }}"
                                        data-es="{{ $category->name_es }}" data-fr="{{ $category->name_fr }}">
                                        {{ $category->name_en }}
                                    </h3>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                @if ($categories->lastPage() > 1)
                    <ul class="pagination pagination-sm justify-content-center mt-3 custom-pagination"
                        style="z-index: 9999999;">

                        {{-- زر السابق --}}
                        <li class="page-item {{ $categories->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $categories->previousPageUrl() ?? '#' }}"
                                tabindex="-1">السابق</a>
                        </li>

                        {{-- الأرقام --}}
                        @foreach (range(1, $categories->lastPage()) as $i)
                            <li class="page-item {{ $categories->currentPage() == $i ? 'active' : '' }}">
                                <a class="page-link" href="{{ $categories->url($i) }}">{{ $i }}</a>
                            </li>
                        @endforeach

                        {{-- زر التالي --}}
                        <li class="page-item {{ $categories->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $categories->nextPageUrl() ?? '#' }}">التالي</a>
                        </li>

                    </ul>
                @endif
                <style>
                    /* Pagination custom color */
                    .custom-pagination .page-item .page-link {
                        color: #a46828;
                        border-color: #a46828;
                    }

                    .custom-pagination .page-item.active .page-link {
                        background-color: #a46828;
                        border-color: #a46828;
                        color: #fff;
                    }

                    .custom-pagination .page-item:hover .page-link {
                        background-color: #a46828;
                        color: #fff;
                        border-color: #a46828;
                    }

                    .custom-pagination .page-item.disabled .page-link {
                        color: #ccc;
                        border-color: #ddd;
                        cursor: not-allowed;
                    }
                </style>
            </div>
        </div>
    </section>
    @include('layouts.footer')

    <div class="whatsapp-wrapper">
        <span class="whatsapp-message" data-en="Need help?" data-ar="هل تحتاج مساعدة؟" data-es="Necesitas ayuda?"
            data-fr="Besoin d'aide ?">
            Need help?
        </span>

        <a href="#" class="whatsapp-float" target="_blank" aria-label="Chat on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
