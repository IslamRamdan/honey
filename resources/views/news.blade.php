<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link href="{{ asset('css/all.min.css') }}?v=20260317-fontswap" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="{{ asset('css/all.min.css') }}?v=20260317-fontswap"></noscript>
    <link rel="icon" type="image/png" href="{{ asset('assets/logo.png') }}">

    <!-- Basic SEO -->
    @include('components.seo')

<body>
    <nav class="navbar navbar-expand-lg shadow-sm mb-5" id="mainNavbar">
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
                    <li class="nav-item"><a class="nav-link" href="#latestNews" data-en="News" data-ar="الأخبار"
                            data-es="Noticias" data-fr="Actualités">News</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}" data-en="Contact Us"
                            data-ar="تواصل معنا" data-es="Contáctanos" data-fr="Contactez-nous">Contact
                            Us</a></li>
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
    <section class="blogs-news py-5" id="latestNews">
        <div class="container py-5">
            <div class="pt-5">
                <div class="row g-4 pt-5">
                    <div class="col-md-6">
                        <a href="{{ route('all-news') }}" class="news-box">
                            <img src="assets/test.jpg" loading="lazy" decoding="async" alt="Best Hive">
                            <div class="overlay"></div>
                            <div class="content">
                                <h3 data-en="News" data-ar="الأخبار" data-fr="Actualités" data-es="Noticias">
                                    News
                                </h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('all-blogs') }}" class="news-box">
                            <img src="assets/test.jpg" loading="lazy" decoding="async" alt="Best Hive">
                            <div class="overlay"></div>
                            <div class="content">
                                <h3 data-en="Blogs" data-ar="المدونات" data-fr="Blogs" data-es="Blogs">
                                    Blogs
                                </h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer-section">
        <div class="container py-5">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-4 col-md-6 d-flex align-items-center">
                    <div class="footer-logo d-flex align-items-center gap-0">
                        <img src="assets/logo.png" alt="ee and honey" height="100">
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
                            <a href="#latestNews" data-en="News" data-ar="الأخبار" data-es="Noticias"
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


        <a href="https://wa.me/962781101030" class="whatsapp-float" target="_blank" aria-label="Chat on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}?v=20260317-jsperf2" defer></script>

</body>

</html>
