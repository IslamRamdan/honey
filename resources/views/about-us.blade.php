<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Basic SEO -->
    @include('components.seo')

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/logo.png">

    <!-- Fonts (non-render-blocking) -->
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
    <script>
        const savedLang = localStorage.getItem("lang") || (navigator.language.slice(0, 2) === 'ar' ? 'ar' : 'en');
        document.documentElement.dir = savedLang === 'ar' ? 'rtl' : 'ltr';
        document.documentElement.style.opacity = '0';
    </script>
</head>


<body class="about-body">
<main>
    <nav class="navbar navbar-expand-lg shadow-sm" id="mainNavbar">
        <div class="container-lg ">
            <a class="navbar-brand" href="/">
                <div class="logo-icon">
                    <img src="assets/logo.png" height="70" class="w-100 dark-logo">
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
    <section class="about-honey py-5" id="about">
        <div class="container py-5">
            <div class="pt-5">
                <div class="row align-items-center g-4 justify-content-center pt-5">
                    <div class="col-lg-6 position-relative" data-aos="fade-up">
                        <div class="about-img-wrapper">
                            @php
                                $mainImg = ($aboutPage->image ?? null) ? asset('storage/' . $aboutPage->image) : asset('assets/about-4.jpg');
                                $secondImg = (!empty($aboutPage->images) && isset($aboutPage->images[0])) ? asset('storage/' . $aboutPage->images[0]) : asset('assets/about-3.jpg');
                            @endphp
                            <img src="{{ $mainImg }}" class="img-fluid main-img" loading="lazy" decoding="async" alt="Beekeeper">

                            <div class="video-box">
                                <img src="{{ $secondImg }}" loading="lazy" decoding="async" alt="Honey Bee">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up">
                        <div class="about-content">
                            <span class="about-subtitle" data-en="About Us" data-ar="من نحن"
                                data-es="Sobre Nosotros" data-fr="À propos de nous">
                                About Us
                            </span>

                            <h2 class="about-title" data-allow-html="true"
                                data-en="Certified <span>Manufacturing Facility</span> with Export Capabilities"
                                data-ar="مصنع مُعتمد وقدرات تصديرية"
                                data-fr="Usine certifiée avec capacités d’exportation"
                                data-es="Planta certificada con capacidades de exportación">
                                Certified <span>Manufacturing Facility</span> with Export Capabilities
                            </h2>


                            <p class="about-desc text-muted"
                                data-ar="نمتلك مصنعًا مُعتمدًا ومجهزًا بأحدث خطوط الإنتاج وبطاقة تصنيعية عالية، ونتمتع بقدرات تصديرية تتيح لنا الوصول إلى أسواق إقليمية ودولية متعددة."
                                data-en="We own a certified facility equipped with the latest production lines and high manufacturing capacity, with export capabilities that allow us to reach multiple regional and international markets."
                                data-fr="Nous possédons une usine certifiée équipée des dernières lignes de production et d’une capacité de fabrication élevée, avec des capacités d’exportation nous permettant d’accéder à plusieurs marchés régionaux et internationaux."
                                data-es="Contamos con una planta certificada equipada con las últimas líneas de producción y alta capacidad de fabricación, con capacidades de exportación que nos permiten llegar a múltiples mercados regionales e internacionales.">
                                We own a certified facility equipped with the latest production lines and high
                                manufacturing capacity, with export capabilities that allow us to reach multiple
                                regional and international markets.
                            </p>
                            <p class="about-desc text-muted"
                                data-ar="نقوم بتصدير منتجاتنا إلى عدد كبير من الدول، مع الالتزام الكامل بالمعايير والأنظمة الخاصة بكل سوق."
                                data-en="We export our products to a large number of countries, fully complying with the standards and regulations of each market."
                                data-fr="Nous exportons nos produits vers de nombreux pays, en respectant pleinement les normes et réglementations propres à chaque marché."
                                data-es="Exportamos nuestros productos a un gran número de países, cumpliendo plenamente con los estándares y regulaciones de cada mercado.">
                                We export our products to a large number of countries, fully complying with the
                                standards and regulations of each market.
                            </p>

                            <p class="about-desc text-muted" data-ar="نوفر حلول تصدير متكاملة تشمل:"
                                data-en="We provide comprehensive export solutions including:"
                                data-fr="Nous proposons des solutions d’exportation complètes comprenant :"
                                data-es="Ofrecemos soluciones de exportación integrales que incluyen:">
                                We provide comprehensive export solutions including:
                            </p>
                            <ul class="list-unstyled d-flex flex-wrap gap-4 justify-content-center align-items-center">
                                <li class="hive">
                                    <div class="icon">
                                        <i class="fa-solid fa-ship"></i>
                                    </div>
                                    <span data-ar="الشحن البحري" data-en="Sea freight" data-fr="Fret maritime"
                                        data-es="Transporte marítimo">

                                        Sea freight
                                    </span>
                                </li>
                                <li class="hive">
                                    <div class="icon">
                                        <i class="fa-solid fa-truck"></i>
                                    </div>
                                    <span data-ar="الشحن البري" data-en="Land freight" data-fr="Fret terrestre"
                                        data-es="Transporte terrestre">
                                        Land freight
                                    </span>
                                </li>
                                <li class="hive">
                                    <div class="icon">
                                        <i class="fa-solid fa-plane"></i>
                                    </div>
                                    <span data-ar="الشحن الجوي" data-en="Air freight" data-fr="Fret aérien"
                                        data-es="Transporte aéreo">
                                        Air freight
                                    </span>
                                </li>
                            </ul>
                            <p class="about-desc text-muted"
                                data-ar="مما يُمكننا من تلبية متطلبات شركائنا وموزعينا بكفاءة ومرونة عالية، وضمان وصول منتجاتنا بأفضل جودة وفي الوقت المناسب."
                                data-en="This enables us to meet the requirements of our partners and distributors efficiently and flexibly, ensuring our products reach their destination with the best quality and on time."
                                data-fr="Cela nous permet de répondre aux exigences de nos partenaires et distributeurs avec efficacité et flexibilité, en garantissant que nos produits arrivent avec la meilleure qualité et dans les délais."
                                data-es="Esto nos permite cumplir con los requisitos de nuestros socios y distribuidores de manera eficiente y flexible, garantizando que nuestros productos lleguen con la mejor calidad y a tiempo.">
                                This enables us to meet the requirements of our partners and distributors efficiently
                                and flexibly, ensuring our products reach their destination with the best quality and on
                                time.
                            </p>
                            <div class="row mt-4 align-items-center">
                                <div class="col-md-4">
                                    <div class="experience-box">
                                        <h3>19+</h3>
                                        <p class="text-muted" data-en="Years of Experience" data-ar="سنوات من الخبرة"
                                            data-es="Años de experiencia" data-fr="Années d'expérience">
                                            Years of Experience
                                        </p>

                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <ul class="about-features d-flex flex-column gap-3 mt-4 mt-lg-0">
                                        <li class="pure">
                                            <div class="img">
                                                <img src="assets/pure.png" loading="lazy" decoding="async" alt="pure">
                                            </div>
                                            <div>
                                                <h3 data-en="Pure Honey" data-ar="عسل نقي" data-es="Miel Puro"
                                                    data-fr="Miel Pur">
                                                    Pure Honey
                                                </h3>

                                                <span class="text-muted" data-en="Collected naturally by honey bees."
                                                    data-ar="مجمع طبيعيًا بواسطة نحل العسل."
                                                    data-es="Recolectado naturalmente por abejas."
                                                    data-fr="Récolté naturellement par les abeilles.">
                                                    Collected naturally by honey bees.
                                                </span>

                                            </div>
                                        </li>
                                        <li class="award">
                                            <div class="img">
                                                <img src="assets/award-1.png" loading="lazy" decoding="async" alt="award">
                                            </div>
                                            <div>
                                                <h3 data-en="100% Natural" data-ar="100٪ طبيعي"
                                                    data-es="100% Natural" data-fr="100 % Naturel">
                                                    100% Natural
                                                </h3>

                                                <span class="text-muted" data-en="No additives, no preservatives."
                                                    data-ar="بدون إضافات، بدون مواد حافظة."
                                                    data-es="Sin aditivos, sin conservantes."
                                                    data-fr="Sans additifs, sans conservateurs.">
                                                    No additives, no preservatives.
                                                </span>

                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row gx-4 gy-5 align-items-center justify-content-center my-5">
                    <div class="col-md-5">
                        <div class="goal-card h-100">
                            <div class="hexagon">
                                <i class="fa-solid fa-eye"></i>
                                <div class="hex-1"></div>
                                <div class="hex-2"></div>
                            </div>
                            <div class="content">
                                <h3 data-ar="{{ $vision->title_ar ?? 'رؤيتنا' }}" data-en="{{ $vision->title_en ?? 'Our Vision' }}" data-fr="{{ $vision->title_fr ?? 'Notre Vision' }}"
                                    data-es="{{ $vision->title_es ?? 'Nuestra Visión' }}">{{ $vision->{'title_' . app()->getLocale()} ?? 'Our Vision' }}</h3>
                                <div class="dynamic-content text-muted" data-ar="{{ strip_tags($vision->content_ar ?? '') }}"
                                    data-en="{{ strip_tags($vision->content_en ?? '') }}"
                                    data-fr="{{ strip_tags($vision->content_fr ?? '') }}"
                                    data-es="{{ strip_tags($vision->content_es ?? '') }}">
                                    {!! nl2br(e($vision->{'content_' . app()->getLocale()} ?? 'To be the leading regional and global brand...')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="goal-card h-100">
                            <div class="hexagon">
                                <i class="fa-solid fa-bullseye"></i>
                                <div class="hex-1"></div>
                                <div class="hex-2"></div>
                            </div>
                            <div class="content">
                                <h3 data-ar="{{ $mission->title_ar ?? 'رسالتنا' }}" data-en="{{ $mission->title_en ?? 'Our Mission' }}" data-fr="{{ $mission->title_fr ?? 'Notre Mission' }}"
                                    data-es="{{ $mission->title_es ?? 'Nuestra Misión' }}">{{ $mission->{'title_' . app()->getLocale()} ?? 'Our Mission' }}</h3>
                                <div class="dynamic-content text-muted" data-ar="{{ strip_tags($mission->content_ar ?? '') }}"
                                    data-en="{{ strip_tags($mission->content_en ?? '') }}"
                                    data-fr="{{ strip_tags($mission->content_fr ?? '') }}"
                                    data-es="{{ strip_tags($mission->content_es ?? '') }}">
                                    {!! nl2br(e($mission->{'content_' . app()->getLocale()} ?? 'Providing high-quality natural products...')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="values">
                    <h2 class="text-center mt-5" data-ar="قيمنا" data-en="Our Values" data-fr="Nos Valeurs"
                        data-es="Nuestros Valores">Our Values
                    </h2>
                    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 gy-5 gx-4 mt-3">
                        @foreach($values as $value)
                        <div class="col">
                            <div class="value-card h-100">
                                <div class="hexagon">
                                    <i class="{{ $value->icon ?? 'fa-solid fa-award' }}"></i>
                                    <div class="hex-1"></div>
                                    <div class="hex-2"></div>
                                </div>
                                <div class="content">
                                    <h3 data-ar="{{ $value->title_ar }}" data-en="{{ $value->title_en }}"
                                        data-fr="{{ $value->title_fr }}" data-es="{{ $value->title_es }}">{{ $value->{'title_' . app()->getLocale()} }}</h3>
                                    <p data-ar="{{ strip_tags($value->content_ar) }}"
                                        data-en="{{ strip_tags($value->content_en) }}"
                                        data-fr="{{ strip_tags($value->content_fr) }}"
                                        data-es="{{ strip_tags($value->content_es) }}">
                                        {!! nl2br(e($value->{'content_' . app()->getLocale()})) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="quote mt-5" data-aos="fade-up">
                    <div class="quote-box">
                        <h3 data-ar="{{ $manufacturingPhilosophy->title_ar ?? 'فلسفتنا في التصنيع' }}" data-en="{{ $manufacturingPhilosophy->title_en ?? 'Our Manufacturing Philosophy' }}"
                            data-fr="{{ $manufacturingPhilosophy->title_fr ?? 'Notre philosophie de fabrication' }}" data-es="{{ $manufacturingPhilosophy->title_es ?? 'Nuestra filosofía de fabricación' }}">{{ $manufacturingPhilosophy->{'title_' . app()->getLocale()} ?? 'Our Manufacturing Philosophy' }}</h3>
                        <div class="dynamic-content text-muted" data-ar="{{ strip_tags($manufacturingPhilosophy->content_ar ?? '') }}"
                            data-en="{{ strip_tags($manufacturingPhilosophy->content_en ?? '') }}"
                            data-fr="{{ strip_tags($manufacturingPhilosophy->content_fr ?? '') }}"
                            data-es="{{ strip_tags($manufacturingPhilosophy->content_es ?? '') }}">
                            {!! nl2br(e($manufacturingPhilosophy->{'content_' . app()->getLocale()} ?? 'We follow a manufacturing philosophy...')) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section-divider"></div>

    <section class="why-us">
        <div class="container">
            <div class="row g-4 align-items-center justify-content-center mb-5">

                <div class="col-lg-8">
                    <div class="content">
                        <h2 class="mb-5 text-center" data-ar="لماذا يثق بنا شركاؤنا؟"
                            data-en="Why do our partners trust us?"
                            data-fr="Pourquoi nos partenaires nous font-ils confiance ?"
                            data-es="¿Por qué confían en nosotros nuestros socios?">
                            Why do our partners trust us?
                        </h2>
                        <ul class="trust-list d-flex flex-column gap-4">
                            <li>
                                <div class="icon">
                                    <i class="fa-solid fa-clock"></i>
                                </div>
                                <span data-ar="خبرة تمتد لأكثر من 19 عامًا في تصنيع منتجات العسل والمشروبات الطبيعية"
                                    data-en="Over 19 years of experience in manufacturing honey products and natural beverages"
                                    data-fr="Plus de 19 ans d’expérience dans la fabrication de produits à base de miel et de boissons naturelles"
                                    data-es="Más de 19 años de experiencia en la fabricación de productos de miel y bebidas naturales">Over
                                    19 years of experience in manufacturing honey products and natural beverages</span>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa-solid fa-globe"></i>
                                </div>
                                <span data-ar="تصدير منتجاتنا إلى أسواق إقليمية ودولية وعالمية"
                                    data-en="Exporting our products to regional, international, and global markets"
                                    data-fr="Exporter nos produits vers des marchés régionaux, internationaux et mondiaux"
                                    data-es="Exportar nuestros productos a mercados regionales, internacionales y globales">Exporting
                                    our products to regional, international, and global markets</span>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa-solid fa-certificate"></i>
                                </div>
                                <span
                                    data-ar="الالتزام بمعايير تصنيع عالمية وشهادات جودة معتمدة: HACCP / GMP / ISO / HALAL / FDA"
                                    data-en="Commitment to global manufacturing standards and certified quality: HACCP / GMP / ISO / HALAL / FDA"
                                    data-fr="Engagement envers les normes de fabrication mondiales et certificats de qualité certifiés : HACCP / GMP / ISO / HALAL / FDA"
                                    data-es="Compromiso con estándares de fabricación globales y certificaciones de calidad: HACCP / GMP / ISO / HALAL / FDA">
                                    Commitment to global manufacturing standards and certified quality: HACCP / GMP /
                                    ISO / HALAL / FDA
                                </span>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa-solid fa-cogs"></i>
                                </div>
                                <span data-ar="مرونة عالية في التوريد والتصدير لتلبية احتياجات الشركاء"
                                    data-en="High flexibility in supply and export to meet partners’ needs"
                                    data-fr="Grande flexibilité dans l’approvisionnement et l’exportation pour répondre aux besoins des partenaires"
                                    data-es="Alta flexibilidad en suministro y exportación para satisfacer las necesidades de los socios">
                                    High flexibility in supply and export to meet partners’ needs
                                </span>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa-solid fa-check-circle"></i>
                                </div>
                                <span data-ar="التزام ثابت بالجودة في جميع مراحل الإنتاج"
                                    data-en="Consistent commitment to quality at all stages of production"
                                    data-fr="Engagement constant envers la qualité à toutes les étapes de la production"
                                    data-es="Compromiso constante con la calidad en todas las etapas de producción">
                                    Consistent commitment to quality at all stages of production
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="">
                <h2 class="text-center mt-5" data-ar="لماذا نحن؟" data-en="Why Us?" data-fr="Pourquoi Nous ?"
                    data-es="¿Por qué Nosotros?">Why
                    Us?</h2>
                <div class="row g-4 justify-content-center mt-0">
                    @foreach($whyUsCards as $index => $whyUs)
                    <div class="col-md-6 col-lg-4">
                        <div class="why-us-card {{ $index == 1 ? 'second-card' : ($index == 2 ? 'third-card' : '') }}">
                            <h3 class="mb-3" data-ar="{{ $whyUs->title_ar }}"
                                data-en="{{ $whyUs->title_en }}" data-fr="{{ $whyUs->title_fr }}"
                                data-es="{{ $whyUs->title_es }}">{{ $whyUs->{'title_' . app()->getLocale()} }}</h3>
                            <div class="dynamic-content text-muted" data-ar="{{ strip_tags($whyUs->content_ar) }}"
                                data-en="{{ strip_tags($whyUs->content_en) }}"
                                data-fr="{{ strip_tags($whyUs->content_fr) }}"
                                data-es="{{ strip_tags($whyUs->content_es) }}">
                                {!! nl2br(e($whyUs->{'content_' . app()->getLocale()})) !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <div class="section-divider"></div>

    <section class="fqs py-5">
        <div class="container">
            <div class="header">
                <div class="text">
                    <h2 
    data-en="Questions & Answers"
    data-ar="الأسئلة والأجوبة"
    data-fr="Questions et Réponses"
    data-es="Preguntas y Respuestas">
    Questions & Answers
</h2>

<p class="text-muted"
    data-en="Find answers to the most common questions about our natural honey, sourcing process, quality standards, and delivery. We're here to help you choose the purest honey for you and your family."
    data-ar="اعثر على إجابات لأكثر الأسئلة شيوعًا حول عسلنا الطبيعي، وطريقة الإنتاج، ومعايير الجودة، وخدمات التوصيل. نحن هنا لمساعدتك في اختيار أنقى عسل لك ولعائلتك."
    data-fr="Trouvez les réponses aux questions les plus fréquentes concernant notre miel naturel, notre méthode de production, nos normes de qualité et la livraison. Nous sommes là pour vous aider à choisir le miel le plus pur pour vous et votre famille."
    data-es="Encuentra respuestas a las preguntas más frecuentes sobre nuestra miel natural, el proceso de producción, los estándares de calidad y la entrega. Estamos aquí para ayudarte a elegir la miel más pura para ti y tu familia.">
    Find answers to the most common questions about our natural honey, sourcing process, quality standards, and delivery. We're here to help you choose the purest honey for you and your family.
</p>

                </div>
            </div>
            <div class="py-5">
                @foreach($faqs as $index => $faq)
                <div class="faq-item {{ $index == 0 ? 'active' : '' }}">
                    <button class="faq-question">
                        <span data-ar="{{ $faq->question_ar }}"
                            data-en="{{ $faq->question_en }}"
                            data-fr="{{ $faq->question_fr }}"
                            data-es="{{ $faq->question_es }}">{{ $faq->{'question_' . app()->getLocale()} }}</span>
                        <span class="faq-icon">{{ $index == 0 ? '−' : '+' }}</span>
                    </button>
                    <div class="faq-answer">
                        <div class="dynamic-content text-muted" data-ar="{{ strip_tags($faq->answer_ar) }}"
                            data-en="{{ strip_tags($faq->answer_en) }}"
                            data-fr="{{ strip_tags($faq->answer_fr) }}"
                            data-es="{{ strip_tags($faq->answer_es) }}">
                            {!! nl2br(e($faq->{'answer_' . app()->getLocale()})) !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    </main>
    @include('layouts.footer')

    <div class="whatsapp-wrapper">
        <span class="whatsapp-message" data-en="Need help?" data-ar="هل تحتاج مساعدة؟" data-es="Necesitas ayuda?"
            data-fr="Besoin d'aide ?">
            Need help?
        </span>

        <a href="https://wa.me/962781101030" class="whatsapp-float" target="_blank" aria-label="Chat on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
    <script src="js/main.js" defer></script>
    <script>
        document.querySelectorAll(".faq-question").forEach(btn => {
            btn.addEventListener("click", () => {
                const item = btn.parentElement;
                const isOpen = item.classList.contains("active");

                document.querySelectorAll(".faq-item").forEach(el => {
                    el.classList.remove("active");
                    el.querySelector(".faq-icon").textContent = "+";
                });

                if (!isOpen) {
                    item.classList.add("active");
                    btn.querySelector(".faq-icon").textContent = "−";
                }
            });
        });
    </script>


</body>

</html>
