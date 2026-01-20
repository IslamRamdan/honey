<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Ensures proper rendering in IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tags -->
    <title>Bee & Honey - Natural Honey Products</title>
    <meta name="description"
        content="Bee & Honey offers the finest natural honey from our farm. Explore our honey products, e-catalog, and branch locations.">
    <meta name="keywords" content="Bee & Honey, honey products, natural honey, Yemeni Honey, e-catalog, honey farm">
    <meta name="author" content="Bee & Honey">
    <meta name="robots" content="index, follow">
    @php
        $seo = \App\Models\SeoSetting::first();
    @endphp

    {!! $seo->meta ?? '' !!}

    <meta property="og:type" content="website">
    <meta property="og:title" content="Bee & Honey - Natural Honey Products">
    <meta property="og:description"
        content="Explore the finest natural honey from Bee & Honey. Shop honey products and learn more about our farm.">
    <meta property="og:url" content="https://www.yourwebsite.com/">
    <meta property="og:image" content="https://www.yourwebsite.com/assets/og-image.jpg">
    <meta property="og:site_name" content="Bee & Honey">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bee & Honey - Natural Honey Products">
    <meta name="twitter:description"
        content="Explore the finest natural honey from Bee & Honey. Shop honey products and learn more about our farm.">
    <meta name="twitter:image" content="https://www.yourwebsite.com/assets/og-image.jpg">
    <meta name="twitter:site" content="@BeeAndHoney">
    <meta name="twitter:creator" content="@BeeAndHoney">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/logo.png">
    <link rel="mask-icon" href="assets/logo.png" color="#ffc107">
    <meta name="msapplication-TileColor" content="#ffc107">
    <meta name="theme-color" content="#ffffff">


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="css/main.css">
</head>


<body class="home-body">

    <section class="hero">
        <div class="hero-video-wrapper">
            <video autoplay muted loop playsinline class="hero-video">
                <source src="assets/header.mp4" type="video/mp4">
            </video>
        </div>
        @include('layouts.header')

        <div class="hero-inner py-5">
            <div class="rotating-text-wrapper mb-4">
                <h2 class="t1">the best quality Honey from our farm</h2>

                <h2 class="t2">second title is shown here</h2>

                <h2 class="t3">
                    third title is shown here
                </h2>
            </div>
            <div class="hero-btns">
                <a href="#brief" class="btn btn-warning">
                    <span data-en="Explore More" data-ar="اكتشف المزيد" data-es="Explorar más" data-fr="Explorer plus">
                        Explore More
                    </span>
                    <span class="arrow-circle"><i class="fas fa-arrow-down"></i></span>
                </a>
            </div>

        </div>
    </section>
    <section class="py-5 about-brief" id="brief">
        <div class="container py-5">
            <div class="row g-4 justify-content-center align-items-center">
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="text p-3">
                        <h2 data-en="Brief About Bee&Honey" data-ar="نبذة عن Bee&Honey"
                            data-es="Breve sobre Bee&Honey" data-fr="Bref sur Bee&Honey">
                            Brief About Bee&Honey
                        </h2>
                       <p class="text-muted"
                            data-ar="بي آند هني هي علامة تجارية رائدة تابعة لشركة بيت العسل اليمني، التي تأسست عام 2007، وتتمتع بخبرة واسعة في تصنيع وتطوير المنتجات الطبيعية والمكملات الغذائية المعتمدة على العسل الطبيعي، وفق أعلى معايير الجودة العالمية."
                            data-en="Bee & Honey is a leading brand under Yemeni Honey House, established in 2007, with extensive experience in manufacturing and developing natural products and honey-based dietary supplements, in accordance with the highest international quality standards."
                            data-fr="Bee & Honey est une marque leader appartenant à Yemeni Honey House, fondée en 2007, disposant d’une vaste expérience dans la fabrication et le développement de produits naturels et de compléments alimentaires à base de miel naturel, conformément aux normes internationales de qualité les plus élevées."
                            data-es="Bee & Honey es una marca líder perteneciente a Yemeni Honey House, fundada en 2007, con amplia experiencia en la fabricación y el desarrollo de productos naturales y suplementos alimenticios a base de miel natural, de acuerdo con los más altos estándares internacionales de calidad.">
                            Bee & Honey is a leading brand under Yemeni Honey House, established in 2007, with extensive
                            experience in manufacturing and developing natural products and honey-based dietary
                            supplements, in accordance with the highest international quality standards.
                        </p>
                        <p class="text-muted"
                            data-ar="نفخر بكوننا من أبرز المصانع المتخصصة في إنتاج منتجات العسل والمشروبات الطبيعية المُحلّاة بالعسل والمكملات الغذائية، حيث نعتمد على أنظمة تصنيع حديثة ونلتزم بالمعايير الدولية للإنتاج السليم وسلامة الغذاء، الأمر الذي مكّننا من كسب ثقة الأسواق والدول عالميًا."
                            data-en="We take pride in being one of the leading manufacturers specializing in honey products, honey-sweetened natural beverages, and dietary supplements. We rely on advanced manufacturing systems and adhere to international standards for good manufacturing practices and food safety, enabling us to earn the trust of markets and countries worldwide."
                            data-fr="Nous sommes fiers de compter parmi les principaux fabricants spécialisés dans les produits à base de miel, les boissons naturelles sucrées au miel et les compléments alimentaires. Nous nous appuyons sur des systèmes de fabrication avancés et respectons les normes internationales de bonnes pratiques de fabrication et de sécurité alimentaire, ce qui nous a permis de gagner la confiance des marchés et des pays du monde entier."
                            data-es="Nos enorgullece ser uno de los principales fabricantes especializados en productos de miel, bebidas naturales endulzadas con miel y suplementos alimenticios. Nos apoyamos en sistemas de fabricación avanzados y cumplimos con los estándares internacionales de buenas prácticas de producción y seguridad alimentaria, lo que nos ha permitido ganar la confianza de mercados y países a nivel mundial.">
                            We take pride in being one of the leading manufacturers specializing in honey products,
                            honey-sweetened natural beverages, and dietary supplements. We rely on advanced
                            manufacturing systems and adhere to international standards for good manufacturing practices
                            and food safety, enabling us to earn the trust of markets and countries worldwide.
                        </p>

                        <p class="text-muted"
                            data-ar="انطلقت بي آند هني من شغف حقيقي بتقديم منتجات ومشروبات صحية وعصرية مستخلصة من الطبيعة، لتواكب احتياجات المستهلك الحديث، وتوفر تجربة متكاملة تجمع بين القيمة الغذائية، والطعم المتوازن، والجودة العالية."
                            data-en="Bee & Honey was born from a genuine passion for offering healthy and modern products and beverages derived from nature, keeping pace with the needs of today’s consumer and delivering a complete experience that combines nutritional value, balanced taste, and high quality."
                            data-fr="Bee & Honey est née d’une véritable passion pour proposer des produits et des boissons sains et modernes issus de la nature, afin de répondre aux besoins du consommateur moderne et d’offrir une expérience complète alliant valeur nutritionnelle, goût équilibré et haute qualité."
                            data-es="Bee & Honey nació de una auténtica pasión por ofrecer productos y bebidas saludables y modernas extraídas de la naturaleza, en línea con las necesidades del consumidor actual, brindando una experiencia integral que combina valor nutricional, sabor equilibrado y alta calidad.">
                            Bee & Honey was born from a genuine passion for offering healthy and modern products and
                            beverages derived from nature, keeping pace with the needs of today’s consumer and
                            delivering a complete experience that combines nutritional value, balanced taste, and high
                            quality.
                        </p>

                        <p class="text-muted"
                            data-ar="نحرص على اختيار أجود أنواع العسل الطبيعي والمكونات الطبيعية بعناية فائقة، دون إضافة مواد حافظة أو ألوان صناعية أو سكر، لنقدّم منتجات تعكس التزامنا بالجودة والشفافية والمصداقية مع المستهلك."
                            data-en="We carefully select the finest natural honey and premium natural ingredients, without adding preservatives, artificial colors, or sugar, to deliver products that reflect our commitment to quality, transparency, and credibility with consumers."
                            data-fr="Nous veillons à sélectionner avec le plus grand soin les meilleurs miels naturels et ingrédients naturels, sans ajouter de conservateurs, de colorants artificiels ni de sucre, afin d’offrir des produits reflétant notre engagement envers la qualité, la transparence et la crédibilité auprès des consommateurs."
                            data-es="Seleccionamos cuidadosamente los mejores tipos de miel natural y los ingredientes naturales más puros, sin añadir conservantes, colorantes artificiales ni azúcar, para ofrecer productos que reflejen nuestro compromiso con la calidad, la transparencia y la credibilidad ante el consumidor.">
                            We carefully select the finest natural honey and premium natural ingredients, without adding
                            preservatives, artificial colors, or sugar, to deliver products that reflect our commitment
                            to quality, transparency, and credibility with consumers.
                        </p>
                        <p class="text-muted"
                            data-ar="في بي آند هني، نؤمن بأن منتجاتنا الصحية ليست مجرد منتجات غذائية، بل أسلوب حياة يدعم النشاط اليومي، يعزز المناعة، ويساهم في الحفاظ على توازن الجسم بشكل طبيعي."
                            data-en="At Bee & Honey, we believe that our healthy products are not just food items but a lifestyle that supports daily activity, boosts immunity, and contributes to maintaining the body’s natural balance."
                            data-fr="Chez Bee & Honey, nous croyons que nos produits sains ne sont pas de simples aliments, mais un mode de vie qui soutient l’activité quotidienne, renforce l’immunité et contribue à maintenir l’équilibre naturel du corps."
                            data-es="En Bee & Honey, creemos que nuestros productos saludables no son solo alimentos, sino un estilo de vida que apoya la actividad diaria, fortalece la inmunidad y contribuye a mantener el equilibrio natural del cuerpo.">
                            At Bee & Honey, we believe that our healthy products are not just food items but a lifestyle
                            that supports daily activity, boosts immunity, and contributes to maintaining the body’s
                            natural balance.
                        </p>

                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up">
                    <div class="image">
                        <img src="assets/brief-image.png" class="w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section-divider"></div>

    <section class="py-5 swiper-section">
        <div class="swiper products-swiper">
            <div class="swiper-wrapper">
                @foreach ($products as $product)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                            class="img-fluid">
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <section class="map-section py-5" data-aos="zoom-in">
        <div class="container-fluid px-0 pt-5">
            <div class="heading">
                <div class="container pb-4">
                    <h2 class="text-center mb-2" data-en="Our Branch Locations" data-ar="مواقع فروعنا"
                        data-es="Nuestras ubicaciones de sucursales" data-fr="Nos emplacements de succursales">
                        Our Branch Locations
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
                            <div class="col-sm-6 col-md-4 col-lg-6">
                                <div class="branch-box shadow-sm">
                                    <div class="title">
                                        <h3 data-en="Yemen" data-ar="اليمن" data-fr="Yémen" data-es="Yemen">
                                            Yemen
                                        </h3>

                                    </div>
                                    <div class="desc">
                                        <p class="text-muted"
                                            data-en="Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut sit iure. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, architecto."
                                            data-ar="هذا نص تجريبي يُستخدم لعرض شكل المحتوى داخل التصميم، ويمكن استبداله بالنص الحقيقي لاحقًا."
                                            data-fr="Ceci est un texte factice utilisé pour montrer la mise en page du contenu, pouvant être remplacé ultérieurement."
                                            data-es="Este es un texto de ejemplo utilizado para mostrar el diseño del contenido y puede ser reemplazado más adelante.">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut sit
                                            iure. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero,
                                            architecto.
                                        </p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-6">
                                <div class="branch-box shadow-sm">
                                    <div class="title">
                                        <h3 data-en="Jordan" data-ar="الأردن" data-fr="Jordanie" data-es="Jordania">
                                            Jordan
                                        </h3>

                                    </div>
                                    <div class="desc">
                                        <p class="text-muted"
                                            data-en="Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut sit iure. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, architecto."
                                            data-ar="هذا نص تجريبي يُستخدم لعرض شكل المحتوى داخل التصميم، ويمكن استبداله بالنص الحقيقي لاحقًا."
                                            data-fr="Ceci est un texte factice utilisé pour montrer la mise en page du contenu, pouvant être remplacé ultérieurement."
                                            data-es="Este es un texto de ejemplo utilizado para mostrar el diseño del contenido y puede ser reemplazado más adelante.">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut sit
                                            iure. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero,
                                            architecto.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-6">
                                <div class="branch-box shadow-sm">
                                    <div class="title">
                                        <h3 data-en="Saudi Arabia" data-ar="المملكة العربية السعودية"
                                            data-fr="Arabie saoudite" data-es="Arabia Saudita">
                                            Saudi Arabia
                                        </h3>

                                    </div>
                                    <div class="desc">
                                        <p class="text-muted"
                                            data-en="Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut sit iure. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, architecto."
                                            data-ar="هذا نص تجريبي يُستخدم لعرض شكل المحتوى داخل التصميم، ويمكن استبداله بالنص الحقيقي لاحقًا."
                                            data-fr="Ceci est un texte factice utilisé pour montrer la mise en page du contenu, pouvant être remplacé ultérieurement."
                                            data-es="Este es un texto de ejemplo utilizado para mostrar el diseño del contenido y puede ser reemplazado más adelante.">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut sit
                                            iure. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero,
                                            architecto.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-6">
                                <div class="branch-box shadow-sm">
                                    <div class="title">
                                        <h3 data-en="Qatar" data-ar="قطر" data-fr="Qatar" data-es="Catar">
                                            Qatar
                                        </h3>
                                    </div>
                                    <div class="desc">
                                        <p class="text-muted"
                                            data-en="Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut sit iure. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, architecto."
                                            data-ar="هذا نص تجريبي يُستخدم لعرض شكل المحتوى داخل التصميم، ويمكن استبداله بالنص الحقيقي لاحقًا."
                                            data-fr="Ceci est un texte factice utilisé pour montrer la mise en page du contenu, pouvant être remplacé ultérieurement."
                                            data-es="Este es un texto de ejemplo utilizado para mostrar el diseño del contenido y puede ser reemplazado más adelante.">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut sit
                                            iure. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero,
                                            architecto.
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-6">
                                <div class="branch-box shadow-sm">
                                    <div class="title">
                                        <h3 data-en="Oman" data-ar="عُمان" data-fr="Oman" data-es="Omán">
                                            Oman
                                        </h3>
                                    </div>
                                    <div class="desc">
                                        <p class="text-muted"
                                            data-en="Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut sit iure. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, architecto."
                                            data-ar="هذا نص تجريبي يُستخدم لعرض شكل المحتوى داخل التصميم، ويمكن استبداله بالنص الحقيقي لاحقًا."
                                            data-fr="Ceci est un texte factice utilisé pour montrer la mise en page du contenu, pouvant être remplacé ultérieurement."
                                            data-es="Este es un texto de ejemplo utilizado para mostrar el diseño del contenido y puede ser reemplazado más adelante.">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut sit
                                            iure. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero,
                                            architecto.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-6">
                                <div class="branch-box shadow-sm ">
                                    <div class="title">
                                        <h3 data-en="The UAE" data-ar="الإمارات العربية المتحدة"
                                            data-fr="Les Émirats arabes unis" data-es="Los Emiratos Árabes Unidos">
                                            The UAE
                                        </h3>

                                    </div>
                                    <div class="desc">
                                        <p class="text-muted"
                                            data-en="Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut sit iure. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, architecto."
                                            data-ar="هذا نص تجريبي يُستخدم لعرض شكل المحتوى داخل التصميم، ويمكن استبداله بالنص الحقيقي لاحقًا."
                                            data-fr="Ceci est un texte factice utilisé pour montrer la mise en page du contenu, pouvant être remplacé ultérieurement."
                                            data-es="Este es un texto de ejemplo utilizado para mostrar el diseño del contenido y puede ser reemplazado más adelante.">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut sit
                                            iure. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero,
                                            architecto.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-6">
                                <div class="branch-box shadow-sm">
                                    <div class="title">
                                        <h3 data-en="America" data-ar="الولايات المتحدة الأمريكية"
                                            data-fr="États-Unis d’Amérique" data-es="Estados Unidos de América">
                                            America
                                        </h3>

                                    </div>
                                    <div class="desc">
                                        <p class="text-muted"
                                            data-en="Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut sit iure. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, architecto."
                                            data-ar="هذا نص تجريبي يُستخدم لعرض شكل المحتوى داخل التصميم، ويمكن استبداله بالنص الحقيقي لاحقًا."
                                            data-fr="Ceci est un texte factice utilisé pour montrer la mise en page du contenu, pouvant être remplacé ultérieurement."
                                            data-es="Este es un texto de ejemplo utilizado para mostrar el diseño del contenido y puede ser reemplazado más adelante.">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas ut sit
                                            iure. Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero,
                                            architecto.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>


    <section class="certificates-section py-5">
        <div class="container pb-5">
            <h2 class="text-center mt-2" data-aos="zoom-in" data-en="Our Certificates" data-ar="شهاداتنا"
                data-es="Nuestros certificados" data-fr="Nos certificats">
                Our Certificates
            </h2>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-4 mt-5">
                <div class="col">
                    <div class="certificate-item" data-aos="zoom-in">
                        <div class="image mx-auto">
                            <img src="assets/certificate-icon-1.png" class="img-fluid certificate-img"
                                alt="Certificate" data-bs-toggle="modal" data-bs-target="#certificateModal"
                                data-bs-imgs="assets/certificate-1.jpg,assets/certificate-3.jpg">
                            <div class="view-icon" data-bs-toggle="modal" data-bs-target="#certificateModal"
                                data-bs-imgs="assets/certificate-1.jpg,assets/certificate-3.jpg">
                                <i class="fa-regular fa-hand-pointer"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="certificate-item" data-aos="zoom-in">
                        <div class="image mx-auto">
                            <img src="assets/certificate-icon-2.png" class="img-fluid certificate-img"
                                alt="Certificate" data-bs-toggle="modal" data-bs-target="#certificateModal"
                                data-bs-imgs="assets/certificate-2.jpg">
                            <div class="view-icon" data-bs-toggle="modal" data-bs-target="#certificateModal"
                                data-bs-img="assets/certificate-2.jpg">
                                <i class="fa-regular fa-hand-pointer"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="certificate-item" data-aos="zoom-in">
                        <div class="image mx-auto">
                            <img src="assets/certificate-icon-3.png" class="img-fluid certificate-img"
                                alt="Certificate" data-bs-toggle="modal" data-bs-target="#certificateModal"
                                data-bs-imgs="assets/certificate-4.jpg">
                            <div class="view-icon" data-bs-toggle="modal" data-bs-target="#certificateModal"
                                data-bs-img="assets/certificate-3.jpg">
                                <i class="fa-regular fa-hand-pointer"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="certificate-item" data-aos="zoom-in">
                        <div class="image mx-auto">
                            <img src="assets/certificate-icon-4.png" class="img-fluid certificate-img"
                                alt="Certificate" data-bs-toggle="modal" data-bs-target="#certificateModal"
                                data-bs-imgs="assets/certificate-5.jpg">
                            <div class="view-icon" data-bs-toggle="modal" data-bs-target="#certificateModal"
                                data-bs-img="assets/certificate-5.jpg">
                                <i class="fa-regular fa-hand-pointer"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="certificate-item" data-aos="zoom-in">
                        <div class="image mx-auto">
                            <img src="assets/certificate-icon-5.png" class="img-fluid certificate-img"
                                alt="Certificate" data-bs-toggle="modal" data-bs-target="#certificateModal"
                                data-bs-imgs="assets/certificate-5.png">
                            <div class="view-icon" data-bs-toggle="modal" data-bs-target="#certificateModal"
                                data-bs-img="assets/certificate-5.png">
                                <i class="fa-regular fa-hand-pointer"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="catalog-section py-5 mb-5">
        <div class="container">
            <div class="row g-4 align-items-center justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="catalog-content">
                        <p class="catalog-text" data-en="To view the e-catalog" data-ar="لعرض الكتالوج الإلكتروني"
                            data-fr="Voir le catalogue électronique" data-es="Ver el catálogo electrónico">
                            To view the e-catalog
                        </p>

                        <a href="https://drive.google.com/file/d/12xIn_DojVCMRybqoXVzUXuBXNC4IvR5U/view?usp=sharing"
                            target="_blank" download class="catalog-btn">
                            <i class="fa-solid fa-file-arrow-down fa-bounce"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="catalog-image">
                        <img src="assets/catalog.png" alt="E-Catalog" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 counters" id="honeyCounters">
        <div class="container">
            <div class="row g-4 pt-3 mt-3 justify-content-center">
                <div class="col-md-6 col-lg-3" data-aos="zoom-in">
                    <div class="counter-box text-center">
                        <div class="bg"></div>
                        <div class="icon"><i class="fas fa-cart-shopping"></i></div>
                        <div class="number" data-target="3000000">0</div>
                        <div class="title" data-en="Products sold " data-ar="منتجاتنا المباعة "
                            data-fr="Produits vendus" data-es="Productos vendidos ">
                            Products sold
                        </div>
                        <div class="bg-2"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="zoom-in">
                    <div class="counter-box text-center">
                        <div class="bg"></div>
                        <div class="icon"><i class="fas fa-users"></i></div>
                        <div class="number" data-target="2000000" data-display="2M+">
                            2M+
                        </div>

                        <div class="title" data-en="Consumers" data-ar="عدد المستهلكين"
                            data-fr="Nombre de consommateurs" data-es="Número de consumidores">
                            Consumers
                        </div>
                        <div class="bg-2"></div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-aos="zoom-in">
                    <div class="counter-box text-center">
                        <div class="bg"></div>
                        <div class="icon"><i class="fas fa-user-tie"></i></div>
                        <div class="number" data-target="350">0</div>
                        <div class="title" data-en="Employees" data-ar="الموظفين" data-fr="Employés"
                            data-es="Empleados">
                            Employees
                        </div>
                        <div class="bg-2"></div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="zoom-in">
                    <div class="counter-box text-center">
                        <div class="bg"></div>
                        <div class="icon"><i class="fa-solid fa-store"></i></div>
                        <div class="number" data-target="7000">0</div>
                        <div class="title" data-ar="مواقع البيع" data-en="Sales Websites" data-es="Sitios de venta"
                            data-fr="Sites de vente">
                            Sales Websites
                        </div>
                        <div class="bg-2"></div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    @include('layouts.footer')

    <div class="modal fade" id="certificateModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" data-en="Certificate" data-ar="شهادة" data-es="Certificado"
                        data-fr="Certificat">
                        Certificate
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="cert-viewer">
                        <div class="cert-controls mb-2">
                            <button class="btn btn-sm btn-outline-primary" id="zoom-in">
                                <i class="fas fa-search-plus"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-primary" id="zoom-out">
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


        <a href="#" class="whatsapp-float" target="_blank" aria-label="Chat on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="js/main.js"></script>
    <script src="js/certificate.js"></script>
    <script src="js/map.js"></script>
</body>

</html>
