<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <title>Document</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">

</head>

<body>
    <nav class="navbar navbar-expand-lg shadow-sm mb-5" id="mainNavbar">
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
                    <li class="nav-item"><a class="nav-link" href="/" data-en="Home" data-ar="الرئيسية"
                            data-es="Inicio" data-fr="Accueil">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}" data-en="About Us"
                            data-ar="من نحن" data-es="Sobre Nosotros" data-fr="À propos">About Us</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('categories') }}" data-en="Products"
                            data-ar="المنتجات" data-es="Productos" data-fr="Produits">Products</a>
                    </li>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#" data-en="Partners" data-ar="شركاؤنا"
                            data-es="Socios" data-fr="Partenaires">Partners</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('news') }}" data-en="News" data-ar="الأخبار"
                            data-es="Noticias" data-fr="Actualités">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}" data-en="Contact Us"
                            data-ar="تواصل معنا" data-es="Contáctanos" data-fr="Contactez-nous">Contact
                            Us</a></li>
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
    <section class="news-section py-5" id="latestNews">
        <div class="container py-5">
            <div class="pt-5">
                <div class="header pt-5 text-center mb-5">
                    <h2 data-en="Explore Our Latest News" data-ar="استكشف أحدث أخبارنا"
                        data-fr="Découvrez nos dernières actualités" data-es="Explora nuestras últimas noticias">
                        Explore Our Latest News
                    </h2>

                </div>
                <div class="row g-4" data-aos="fade-up">
                    @foreach ($news as $blog)
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100">
                                <div class="img">
                                    <img src="{{ asset('images/blogs/' . $blog->image) }}" class="card-img-top"
                                        alt="{{ $blog->name_en }}">
                                </div>

                                <div class="card-body">
                                    <div class="date d-flex gap-2 align-items-center mb-3">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span
                                            data-en="{{ $blog->created_at->locale('en')->translatedFormat('d F Y') }}"
                                            data-ar="{{ $blog->created_at->locale('ar')->translatedFormat('d F Y') }}"
                                            data-fr="{{ $blog->created_at->locale('fr')->translatedFormat('d F Y') }}"
                                            data-es="{{ $blog->created_at->locale('es')->translatedFormat('d F Y') }}">
                                            {{ $blog->created_at->locale('en')->translatedFormat('d F Y') }}
                                        </span>

                                    </div>

                                    <h3 class="card-title mb-3">
                                        <a href="{{ route('news.show', $blog->id) }}" data-en="{{ $blog->name_en }}"
                                            data-ar="{{ $blog->name_ar }}" data-es="{{ $blog->name_es }}"
                                            data-fr="{{ $blog->name_fr }}">
                                            {{ $blog->name_en }}
                                        </a>
                                    </h3>

                                    <p class="card-text" data-en="{!! Str::limit($blog->description_en, 150) !!}"
                                        data-ar="{!! Str::limit($blog->description_ar, 150) !!}" data-es="{!! Str::limit($blog->description_es, 150) !!}"
                                        data-fr="{!! Str::limit($blog->description_fr, 150) !!}">
                                    </p>

                                    <div class="blog-footer">
                                        <a href="{{ route('news.show', $blog->id) }}"
                                            class="blog-link d-flex align-items-center gap-2">
                                            <span data-en="Read More" data-ar="اقرأ المزيد" data-es="Leer Más"
                                                data-fr="Lire la suite">
                                                Read More
                                            </span> <i class="fas fa-arrow-right mt-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-4">
                    @if ($news->lastPage() > 1)
                        <ul class="pagination pagination-sm justify-content-center mt-3 custom-pagination">

                            {{-- زر السابق --}}
                            <li class="page-item {{ $news->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $news->previousPageUrl() ?? '#' }}"
                                    tabindex="-1">السابق</a>
                            </li>

                            {{-- الأرقام --}}
                            @foreach (range(1, $news->lastPage()) as $i)
                                <li class="page-item {{ $news->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $news->url($i) }}">{{ $i }}</a>
                                </li>
                            @endforeach

                            {{-- زر التالي --}}
                            <li class="page-item {{ $news->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $news->nextPageUrl() ?? '#' }}">التالي</a>
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
    <footer class="footer-section">
        <div class="container py-5">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-4 col-md-6 d-flex align-items-center">
                    <div class="footer-logo d-flex align-items-center gap-0">
                        <img src="{{ asset('assets/logo.png') }}" alt="ee and honey" height="100">
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h5 class="footer-title" data-en="Links" data-ar="روابط" data-es="Enlaces" data-fr="Liens">
                        Links
                    </h5>

                    <ul class="footer-links">
                        <li>
                            <a href="/" data-en="Home" data-ar="الرئيسية" data-es="Inicio" data-fr="Accueil">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" data-en="About Us" data-ar="من نحن"
                                data-es="Sobre Nosotros" data-fr="À propos">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('categories') }}" data-en="Products" data-ar="المنتجات"
                                data-es="Productos" data-fr="Produits">
                                Products
                            </a>
                        </li>
                        <li>
                            <a href="#" data-en="Partner" data-ar="شركاؤنا" data-es="Socio"
                                data-fr="Partenaire">
                                Partner
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('news') }}" data-en="News" data-ar="الأخبار" data-es="Noticias"
                                data-fr="Actualités">
                                News
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" data-en="Contact Us" data-ar="تواصل معنا"
                                data-es="Contáctanos" data-fr="Contactez-nous">
                                Contact Us
                            </a>
                        </li>
                    </ul>

                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="footer-title" data-en="Products" data-ar="المنتجات" data-es="Productos"
                        data-fr="Produits">
                        Products
                    </h5>

                    <ul class="footer-links">
                        <li>
                            <a href="products.html" data-en="Honey Products" data-ar="منتجات العسل"
                                data-es="Productos de miel" data-fr="Produits de miel">
                                Honey Products
                            </a>
                        </li>
                        <li>
                            <a href="products.html" data-en="Creamed Honey" data-ar="العسل الكريمي"
                                data-es="Miel cremado" data-fr="Miel crémeux">
                                Creamed Honey
                            </a>
                        </li>
                        <li>
                            <a href="products.html" data-en="Drinks" data-ar="المشروبات" data-es="Bebidas"
                                data-fr="Boissons">
                                Drinks
                            </a>
                        </li>
                    </ul>

                </div>

                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-title" data-en="Newsletter" data-ar="النشرة الإخبارية" data-es="Boletín"
                        data-fr="Newsletter">
                        Newsletter
                    </h5>

                    <p class="footer-text"
                        data-en="Sign Up For Our Email List To Receive Sweet Deals, Company News And More From Bee & Honey."
                        data-ar="اشترك في قائمتنا البريدية لتصلك عروض حلوة، وأخبار الشركة والمزيد من Bee & Honey."
                        data-es="Suscríbete a nuestra lista de correo para recibir ofertas dulces, noticias de la empresa y más de Bee & Honey."
                        data-fr="Inscrivez-vous à notre liste de diffusion pour recevoir des offres spéciales, des nouvelles de l'entreprise et plus de Bee & Honey.">
                        Sign Up For Our Email List To Receive Sweet Deals, Company News And More From Bee & Honey.
                    </p>

                    <form class="newsletter-form mt-4">
                        <input type="email" placeholder="Email Address" data-placeholder-en="Email Address"
                            data-placeholder-ar="البريد الإلكتروني" data-placeholder-es="Correo electrónico"
                            data-placeholder-fr="Adresse e-mail" required>
                        <button type="submit" data-en="Submit" data-ar="إرسال" data-es="Enviar" data-fr="Envoyer">
                            Submit
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </footer>
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
