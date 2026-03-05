<nav class="navbar navbar-expand-lg" id="mainNavbar">
    <div class="container-lg ">
        <a class="navbar-brand" href="/">
            <div class="logo-icon">
                <img src="{{ asset('assets/logo.png') }}" height="70" class="w-100 dark-logo">
                <img src="{{ asset('assets/light-logo.png') }}" height="70" class="w-100 light-logo">
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
                            <a class="dropdown-item" href="{{ route('all-blogs') }}" data-en="Blog" data-ar="مدونة"
                                data-es="Blog" data-fr="Blog">
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
