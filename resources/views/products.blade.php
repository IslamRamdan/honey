<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Basic SEO -->
    <title>Products | Bee & Honey - Pure Natural Honey</title>
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
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/logo.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/logo.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/logo.png') }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&family=IBM+Plex+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg shadow-sm" id="mainNavbar">
        <div class="container-lg ">
            <a class="navbar-brand" href="/">
                <div class="logo-icon">
                    <img src="{{ asset('assets/logo.png') }}" height="70" class="w-100 dark-logo">
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
    <section class="products py-5" id="products">
        <div class="container py-5">
            <div class="pt-5">
                <div class="heading pt-5 text-center">
                    <h2 class="mb-4" data-en="Our Organic Nature’s Honey Product"
                        data-ar="منتجاتنا العضوية الطبيعية من العسل"
                        data-es="Nuestros productos de miel orgánica natural"
                        data-fr="Nos produits de miel naturel biologique">
                        Our Organic Nature’s Honey Product
                    </h2>

                </div>
                <div class="row g-4">
                    @foreach ($products as $product)
                        <div class="col-md-6 col-lg-4">
                            <div class="product-card">

                                <div class="product-img swiper myProductSwiper">
                                    <div class="swiper-wrapper" dir="ltr">
                                        @if (!empty($product->images))
                                            @foreach ($product->images as $image)
                                                <div class="swiper-slide">
                                                    <img src="{{ asset('storage/' . $image) }}"
                                                        alt="{{ $product->title_ar }}">
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="swiper-slide">
                                                <img src="{{ asset('assets/no-image.png') }}" alt="لا توجد صورة">
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="product-info">

                                    {{-- العنوان --}}
                                    <h3 data-en="{{ $product->title_en }}" data-ar="{{ $product->title_ar }}"
                                        data-es="{{ $product->title_es }}" data-fr="{{ $product->title_fr }}">
                                        {{ $product->title_en }}
                                    </h3>

                                    {{-- الوصف --}}
                                    <div class="product-description-container">
                                        <p class="product-description" data-en="{{ $product->description_en }}"
                                            data-ar="{{ $product->description_ar }}"
                                            data-es="{{ $product->description_es }}"
                                            data-fr="{{ $product->description_fr }}">
                                            {{ $product->description_en }}
                                        </p>
                                        <button class="read-more-btn" onclick="toggleReadMore(this)">
                                            <span class="read-more-text">Read More</span>
                                            <span class="read-less-text" style="display: none;">Read Less</span>
                                        </button>
                                    </div>

                                    <style>
                                        .product-description-container {
                                            position: relative;
                                        }

                                        .product-description {
                                            max-height: 100px;
                                            overflow: hidden;
                                            transition: max-height 0.3s ease;
                                            position: relative;
                                        }

                                        .product-description.expanded {
                                            max-height: none;
                                        }

                                        .read-more-btn {
                                            background: none;
                                            border: none;
                                            color: #007bff;
                                            cursor: pointer;
                                            padding: 5px 0;
                                            font-size: 14px;
                                            text-decoration: underline;
                                            margin-top: 5px;
                                            display: none;
                                            margin: 0 auto;
                                            /* مخفي افتراضياً */
                                        }
                                    </style>

<div class="size"
     data-en="{{ is_array($product->sizes_en) ? implode(' , ', $product->sizes_en) : ($product->sizes_en ?? '') }}"
     data-ar="{{ is_array($product->sizes_ar) ? implode(' , ', $product->sizes_ar) : ($product->sizes_ar ?? '') }}"
     data-es="{{ is_array($product->sizes_es) ? implode(' , ', $product->sizes_es) : ($product->sizes_es ?? '') }}"
     data-fr="{{ is_array($product->sizes_fr) ? implode(' , ', $product->sizes_fr) : ($product->sizes_fr ?? '') }}">
</div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-4">
                    @if ($products->lastPage() > 1)
                        <ul class="pagination pagination-sm justify-content-center mt-3 custom-pagination">

                            {{-- زر السابق --}}
                            <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $products->previousPageUrl() ?? '#' }}"
                                    tabindex="-1">السابق</a>
                            </li>

                            {{-- الأرقام --}}
                            @foreach (range(1, $products->lastPage()) as $i)
                                <li class="page-item {{ $products->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                </li>
                            @endforeach

                            {{-- زر التالي --}}
                            <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $products->nextPageUrl() ?? '#' }}">التالي</a>
                            </li>

                        </ul>
                    @endif
                </div>

                {{-- CSS --}}
                <style>
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
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        new Swiper(".myProductSwiper", {
            loop: true,
            slidesPerView: 1,

            autoplay: {
                delay: 2000,
                disableOnInteraction: false
            },

            speed: 800,

            allowTouchMove: true,
            grabCursor: true
        });
    </script>

    <script>
        // ترجمات الزرار
        const buttonTranslations = {
            en: {
                more: 'Read More',
                less: 'Read Less'
            },
            ar: {
                more: 'قراءة المزيد',
                less: 'قراءة أقل'
            },
            es: {
                more: 'Leer Más',
                less: 'Leer Menos'
            },
            fr: {
                more: 'Lire Plus',
                less: 'Lire Moins'
            }
        };

        function toggleReadMore(button) {
            const container = button.closest('.product-description-container');
            const description = container.querySelector('.product-description');
            const readMoreText = button.querySelector('.read-more-text');
            const readLessText = button.querySelector('.read-less-text');

            description.classList.toggle('expanded');

            if (description.classList.contains('expanded')) {
                readMoreText.style.display = 'none';
                readLessText.style.display = 'inline';
            } else {
                readMoreText.style.display = 'inline';
                readLessText.style.display = 'none';
            }
        }

        // دالة للتحقق من طول النص وإظهار/إخفاء الزرار
        function checkDescriptionLength(container) {
            const description = container.querySelector('.product-description');
            const button = container.querySelector('.read-more-btn');

            // التحقق من ارتفاع النص
            if (description.scrollHeight > 100) {
                button.style.display = 'block';
            } else {
                button.style.display = 'none';
            }
        }

        // دالة لتحديث اللغة
        function updateProductLanguage() {
            const lang = localStorage.getItem('lang') || 'en';

            const containers = document.querySelectorAll('.product-description-container');

            containers.forEach(container => {
                const description = container.querySelector('.product-description');
                const button = container.querySelector('.read-more-btn');
                const readMoreText = button.querySelector('.read-more-text');
                const readLessText = button.querySelector('.read-less-text');
                const isExpanded = description.classList.contains('expanded');

                const descText = description.getAttribute('data-' + lang);
                if (descText) {
                    description.textContent = descText;
                }

                if (buttonTranslations[lang]) {
                    readMoreText.textContent = buttonTranslations[lang].more;
                    readLessText.textContent = buttonTranslations[lang].less;
                }

                // التحقق من طول النص بعد تغيير اللغة
                setTimeout(() => checkDescriptionLength(container), 50);
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            // التحقق من طول النص عند تحميل الصفحة
            const containers = document.querySelectorAll('.product-description-container');
            containers.forEach(container => {
                checkDescriptionLength(container);
            });

            updateProductLanguage();

            const languageDropdownItems = document.querySelectorAll('[data-lang], .dropdown-item[onclick*="lang"]');

            languageDropdownItems.forEach(item => {
                item.addEventListener('click', function() {
                    setTimeout(updateProductLanguage, 100);
                });
            });
        });

        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'dir') {
                    updateProductLanguage();
                }
            });
        });

        if (document.documentElement) {
            observer.observe(document.documentElement, {
                attributes: true,
                attributeFilter: ['dir', 'lang']
            });
        }
    </script>
</body>

</html>
