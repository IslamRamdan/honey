<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Basic SEO -->
    <title>contact us| Bee & Honey - Pure Natural Honey</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body data-success-title-en="Message Sent!" data-success-title-ar="تم الإرسال" data-success-title-es="Mensaje enviado"
    data-success-title-fr="Message envoyé" data-success-text-en="Your message has been sent successfully."
    data-success-text-ar="تم إرسال رسالتك بنجاح" data-success-text-es="Mensaje enviado correctamente"
    data-success-text-fr="Votre message a été envoyé avec succès">
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
    <section class="py-5 contact" id="contact">
        <div class="container py-5">
            <div class="heading mb-5 pt-5 text-center" data-aos="fade-up">
                <h2 data-en="Get in touch with us!" data-ar="تواصل معنا!" data-es="¡Ponte en contacto con nosotros!"
                    data-fr="Prenez contact avec nous !">
                    Get in touch with us!
                </h2>

            </div>
            <div class="row g-4">
                <div class="col-lg-5" data-aos="fade-up">
                    <div class="left-side p-4">
                        <div class="contact-info">
                            <div class="phone d-flex align-items-center justify-content-between">
                                <div class="info-header d-flex align-items-center gap-2">
                                    <div class="icon">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <h3 data-en="Phone" data-ar="الهاتف" data-es="Teléfono" data-fr="Téléphone">
                                        Phone
                                    </h3>

                                </div>
                                <a href="tel:+96262221118">+962 6 222 111 8</a>
                            </div>
                            <div class="email d-flex align-items-center justify-content-between">
                                <div class="info-header d-flex align-items-center gap-2">
                                    <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                                    <h3 data-en="Email" data-ar="البريد الإلكتروني" data-es="Correo electrónico"
                                        data-fr="E-mail">
                                        Email
                                    </h3>

                                </div>
                                <a href="mailto:info@bee-and-honey.com">
                                    info@beeandhoney.com
                                </a>
                            </div>
                            <div class="location d-flex align-items-center justify-content-between">
                                <div class="info-header d-flex align-items-center gap-2">
                                    <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                                    <h3 data-en="Location" data-ar="الموقع" data-es="Ubicación"
                                        data-fr="Emplacement">
                                        Location
                                    </h3>

                                </div>
                                <a href="#" data-en="Al-salt industrial city" data-ar="مدينة السلط الصناعية"
                                    data-es="Ciudad Industrial de Sal de Jordania"
                                    data-fr="Ville industrielle de sel de Jordanie">
                                    Al-salt industrial city
                                </a>

                            </div>
                            <div class="social d-flex align-items-center justify-content-between">
                                <div class="info-header d-flex align-items-center gap-2">
                                    <div class="icon"><i class="fa-solid fa-share-nodes"></i></div>
                                    <h3 data-en="Follow Us" data-ar="تابعنا" data-es="Síguenos"
                                        data-fr="Suivez-nous">
                                        Follow Us
                                    </h3>

                                </div>

                                <div class="icons d-flex flex-wrap gap-2">
                                    <a href="https://www.instagram.com/beeandhoney.official?igsh=MW9lNnBmb3ppdTZyMA=="
                                        aria-label="Instagram">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                    <a href="https://web.facebook.com/beeandhoney" aria-label="Facebook">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                    <a href="https://www.linkedin.com/company/bee-and-honey/" aria-label="Twitter">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-up">
                    <div class="form">
                        <form id="contactForm" novalidate>
                            <h3 class="text-center mb-5" data-en="Feel Free To Contact Us"
                                data-ar="لا تتردد في التواصل معنا" data-fr="N’hésitez pas à nous contacter"
                                data-es="No dudes en contactarnos">
                                Feel Free To Contact Us
                            </h3>


                            <div class="form-group">
                                <input type="text" id="name" class="form-control"
                                    data-placeholder-en="Your Name" data-placeholder-ar="اسمك"
                                    data-placeholder-es="Tu Nombre" data-placeholder-fr="Votre Nom"
                                    data-required-en="Name is required" data-required-ar="الاسم مطلوب"
                                    data-required-es="Se requiere el nombre" data-required-fr="Le nom est requis"
                                    placeholder="Your Name">
                                <small class="error-msg"></small>
                            </div>

                            <div class="form-group">
                                <input type="tel" id="phone" class="form-control tele-phone"
                                    data-placeholder-en="Your Phone" data-placeholder-ar="رقم هاتفك"
                                    data-placeholder-es="Tu Teléfono" data-placeholder-fr="Votre Téléphone"
                                    data-required-en="Phone is required" data-required-ar="رقم الهاتف مطلوب"
                                    data-required-es="Se requiere teléfono" data-required-fr="Téléphone requis"
                                    placeholder="Your Phone">
                                <small class="error-msg"></small>
                            </div>

                            <div class="form-group">
                                <input type="email" id="email" class="form-control"
                                    data-placeholder-en="Your Email" data-placeholder-ar="البريد الإلكتروني"
                                    data-required-en="Email is required" data-required-ar="البريد الإلكتروني مطلوب"
                                    data-regex="^[\w\.-]+@([\w-]+\.)+[\w-]{2,4}$" data-error-en="Invalid email format"
                                    data-error-ar="صيغة البريد الإلكتروني غير صحيحة" placeholder="Your Email">
                                <small class="error-msg"></small>

                            </div>

                            <div class="form-group">
                                <input type="text" id="subject" class="form-control"
                                    data-placeholder-en="Subject" data-placeholder-ar="الموضوع"
                                    data-placeholder-es="Asunto" data-placeholder-fr="Sujet"
                                    data-required-en="Subject is required" data-required-ar="الموضوع مطلوب"
                                    data-required-es="Se requiere asunto" data-required-fr="Sujet requis"
                                    placeholder="Subject">
                                <small class="error-msg"></small>
                            </div>

                            <div class="form-group">
                                <textarea id="message" class="form-control" rows="5" data-placeholder-en="Message"
                                    data-placeholder-ar="رسالتك" data-placeholder-es="Mensaje" data-placeholder-fr="Message"
                                    data-required-en="Message is required" data-required-ar="الرسالة مطلوبة" data-required-es="Se requiere mensaje"
                                    data-required-fr="Message requis" placeholder="Message"></textarea>
                                <small class="error-msg"></small>
                            </div>

                            <button type="submit" class="btn btn-submit" data-en="Send Message"
                                data-ar="إرسال الرسالة" data-es="Enviar Mensaje" data-fr="Envoyer le message">
                                Send Message
                            </button>

                        </form>


                    </div>
                </div>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/contact.js"></script>
</body>

</html>
