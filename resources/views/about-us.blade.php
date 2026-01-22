<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Basic SEO -->
    <title>About Us | Bee & Honey - Pure Natural Honey</title>
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


<body class="about-body">
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
     <section class="about-honey py-5" id="about">
        <div class="container py-5">
            <div class="pt-5">
                <div class="row align-items-center g-4 justify-content-center pt-5">
                    <div class="col-lg-6 position-relative" data-aos="fade-up">
                        <div class="about-img-wrapper">
                            <img src="assets/about-1.jpg" class="img-fluid main-img" alt="Beekeeper">

                            <div class="video-box">
                                <img src="assets/about-2.jpg" alt="Honey Bee">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up">
                        <div class="about-content">
                            <span class="about-subtitle" data-en="About Us" data-ar="من نحن" data-es="Sobre Nosotros"
                                data-fr="À propos de nous">
                                About Us
                            </span>

                            <h2 class="about-title"
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
                                                <img src="assets/pure.png" alt="pure">
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
                                                <img src="assets/award-1.png" alt="award">
                                            </div>
                                            <div>
                                                <h3 data-en="100% Natural" data-ar="100٪ طبيعي" data-es="100% Natural"
                                                    data-fr="100 % Naturel">
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
                                <h3 data-ar="رؤيتنا" data-en="Our Vision" data-fr="Notre Vision"
                                    data-es="Nuestra Visión">Our Vision</h3>
                                <p data-ar="أن نكون العلامة التجارية الرائدة إقليميًا وعالميًا في تصنيع منتجات من العسل والمشروبات الطبيعية المُحلّاة بالعسل الطبيعي والمكملات الغذائية، وأن نُسهم في تعزيز نمط حياة صحي ومستدام."
                                    data-en="To be the leading regional and global brand in manufacturing honey-based products, honey-sweetened natural beverages, and dietary supplements, while contributing to promoting a healthy and sustainable lifestyle."
                                    data-fr="Être la marque leader régionale et mondiale dans la fabrication de produits à base de miel, de boissons naturelles sucrées au miel et de compléments alimentaires, tout en contribuant à promouvoir un mode de vie sain et durable."
                                    data-es="Ser la marca líder regional y global en la fabricación de productos a base de miel, bebidas naturales endulzadas con miel y suplementos alimenticios, contribuyendo al mismo tiempo a promover un estilo de vida saludable y sostenible.">
                                    To be the leading regional and global brand in manufacturing honey-based products,
                                    honey-sweetened natural beverages, and dietary supplements, while contributing to
                                    promoting a healthy and sustainable lifestyle.
                                </p>
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
                                <h3 data-ar="رسالتنا" data-en="Our Mission" data-fr="Notre Mission"
                                    data-es="Nuestra Misión">Our Mission</h3>
                                <p data-ar="تقديم منتجات طبيعية عالية الجودة، مُصنّعة وفق أعلى المعايير العالمية، تجمع بين الفائدة الغذائية والطعم المتوازن، وتبني ثقة المستهلكين والشركاء على المدى الطويل."
                                    data-en="Providing high-quality natural products, manufactured according to the highest global standards, combining nutritional benefits and balanced taste, and building long-term trust with consumers and partners."
                                    data-fr="Fournir des produits naturels de haute qualité, fabriqués selon les normes mondiales les plus strictes, alliant bénéfices nutritionnels et goût équilibré, tout en bâtissant la confiance à long terme des consommateurs et des partenaires."
                                    data-es="Ofrecer productos naturales de alta calidad, elaborados según los más altos estándares mundiales, que combinan beneficios nutricionales y sabor equilibrado, y construyen la confianza a largo plazo con los consumidores y socios.">
                                    Providing high-quality natural products, manufactured according to the highest
                                    global standards, combining nutritional benefits and balanced taste, and building
                                    long-term trust with consumers and partners.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="values">
                    <h2 class="text-center mt-5" data-ar="قيمنا" data-en="Our Values" data-fr="Nos Valeurs"
                        data-es="Nuestros Valores">Our Values
                    </h2>
                    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 gy-5 gx-4 mt-3">
                        <div class="col">
                            <div class="value-card h-100">
                                <div class="hexagon">
                                    <i class="fa-solid fa-award"></i>
                                    <div class="hex-1"></div>
                                    <div class="hex-2"></div>
                                </div>
                                <div class="content">
                                    <h3 data-ar="الجودة والالتزام" data-en="Quality & Commitment"
                                        data-fr="Qualité et Engagement" data-es="Calidad y Compromiso">Quality &
                                        Commitment</h3>
                                    <p data-ar="نلتزم بتقديم منتجات عالية الجودة وفق أعلى المعايير العالمية في جميع مراحل التصنيع."
                                        data-en="We are committed to providing high-quality products according to the highest global standards at all stages of manufacturing."
                                        data-fr="Nous nous engageons à fournir des produits de haute qualité conformément aux normes mondiales les plus strictes à toutes les étapes de la fabrication."
                                        data-es="Estamos comprometidos a ofrecer productos de alta calidad según los más altos estándares mundiales en todas las etapas de fabricación.">
                                        We are committed to providing high-quality products according to the highest
                                        global standards at all stages of manufacturing.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="value-card h-100">
                                <div class="hexagon">
                                    <i class="fa-solid fa-handshake"></i>
                                    <div class="hex-1"></div>
                                    <div class="hex-2"></div>
                                </div>
                                <div class="content">
                                    <h3 data-ar="الشفافية والمصداقية" data-en="Transparency & Credibility"
                                        data-fr="Transparence et Crédibilité" data-es="Transparencia y Credibilidad">
                                        Transparency & Credibility</h3>
                                    <p data-ar="نؤمن بالوضوح والصدق في ممارساتنا، من اختيار المكونات وحتى وصول المنتج إلى المستهلك."
                                        data-en="We believe in clarity and honesty in our practices, from selecting ingredients to delivering the product to the consumer."
                                        data-fr="Nous croyons en la clarté et l’honnêteté dans nos pratiques, de la sélection des ingrédients à la livraison du produit au consommateur."
                                        data-es="Creemos en la claridad y la honestidad en nuestras prácticas, desde la selección de ingredientes hasta la entrega del producto al consumidor.">
                                        We believe in clarity and honesty in our practices, from selecting ingredients
                                        to delivering the product to the consumer.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="value-card h-100">
                                <div class="hexagon">
                                    <i class="fa-solid fa-lightbulb"></i>
                                    <div class="hex-1"></div>
                                    <div class="hex-2"></div>
                                </div>
                                <div class="content">
                                    <h3 data-ar="الابتكار المستمر" data-en="Continuous Innovation"
                                        data-fr="Innovation Continue" data-es="Innovación Continua">
                                        Continuous Innovation</h3>
                                    <p data-ar="نحرص على تطوير منتجاتنا وتحسين تركيباتنا باستمرار لمواكبة تطورات السوق واحتياجات المستهلكين."
                                        data-en="We are committed to continuously developing our products and improving our formulations to keep up with market trends and consumer needs."
                                        data-fr="Nous nous engageons à développer constamment nos produits et à améliorer nos formulations pour suivre les évolutions du marché et les besoins des consommateurs."
                                        data-es="Nos comprometemos a desarrollar continuamente nuestros productos y mejorar nuestras formulaciones para mantenernos al día con las tendencias del mercado y las necesidades de los consumidores.">
                                        We are committed to continuously developing our products and improving our
                                        formulations to keep up with market trends and consumer needs.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="value-card h-100">
                                <div class="hexagon">
                                    <i class="fa-solid fa-leaf"></i>
                                    <div class="hex-1"></div>
                                    <div class="hex-2"></div>
                                </div>
                                <div class="content">
                                    <h3 data-ar="المسؤولية تجاه المستهلك والبيئة"
                                        data-en="Responsibility Towards Consumers and the Environment"
                                        data-fr="Responsabilité envers les consommateurs et l’environnement"
                                        data-es="Responsabilidad hacia los consumidores y el medio ambiente">
                                        Responsibility Towards Consumers and the Environment</h3>
                                    <p data-ar="نلتزم بتقديم منتجات آمنة وصحية، مع مراعاة الاستدامة والحفاظ على البيئة."
                                        data-en="We are committed to providing safe and healthy products while ensuring sustainability and environmental preservation."
                                        data-fr="Nous nous engageons à fournir des produits sûrs et sains, tout en veillant à la durabilité et à la protection de l’environnement."
                                        data-es="Nos comprometemos a ofrecer productos seguros y saludables, respetando la sostenibilidad y la preservación del medio ambiente.">
                                        We are committed to providing safe and healthy products while ensuring
                                        sustainability and environmental preservation.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="value-card h-100">
                                <div class="hexagon">
                                    <i class="fa-solid fa-users"></i>
                                    <div class="hex-1"></div>
                                    <div class="hex-2"></div>
                                </div>
                                <div class="content">
                                    <h3 data-ar="بناء شراكات طويلة الأمد" data-en="Building Long-Term Partnerships"
                                        data-fr="Établir des partenariats à long terme"
                                        data-es="Construcción de alianzas a largo plazo">
                                        Building Long-Term Partnerships</h3>
                                    <p data-ar="نعمل على بناء علاقات قائمة على الثقة والتعاون مع شركائنا وموزعينا لتحقيق نجاح مشترك ومستدام."
                                        data-en="We work on building relationships based on trust and collaboration with our partners and distributors to achieve shared and sustainable success."
                                        data-fr="Nous travaillons à établir des relations fondées sur la confiance et la coopération avec nos partenaires et distributeurs afin de parvenir à un succès commun et durable."
                                        data-es="Trabajamos para construir relaciones basadas en la confianza y la colaboración con nuestros socios y distribuidores para lograr un éxito compartido y sostenible.">
                                        We work on building relationships based on trust and collaboration with our
                                        partners and distributors to achieve shared and sustainable success.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="quote mt-5" data-aos="fade-up">
                    <div class="quote-box">
                        <h3 data-ar="فلسفتنا في التصنيع" data-en="Our Manufacturing Philosophy"
                            data-fr="Notre philosophie de fabrication" data-es="Nuestra filosofía de fabricación">Our
                            Manufacturing Philosophy</h3>
                        <p data-ar="نعتمد فلسفة تصنيع قائمة على البساطة والشفافية، ترتكز على مكونات واضحة، وتحلية طبيعية بالعسل، واتباع عمليات إنتاج مسؤولة، لضمان جودة مستدامة تلبي تطلعات المستهلك وتعكس التزامنا بالصحة والموثوقية."
                            data-en="We follow a manufacturing philosophy based on simplicity and transparency, focusing on clear ingredients, natural honey sweetening, and responsible production processes to ensure sustainable quality that meets consumer expectations and reflects our commitment to health and reliability."
                            data-fr="Nous suivons une philosophie de fabrication basée sur la simplicité et la transparence, en mettant l’accent sur des ingrédients clairs, un édulcorage naturel au miel et des processus de production responsables afin de garantir une qualité durable répondant aux attentes des consommateurs et reflétant notre engagement envers la santé et la fiabilité."
                            data-es="Seguimos una filosofía de fabricación basada en la simplicidad y la transparencia, centrada en ingredientes claros, endulzado natural con miel y procesos de producción responsables, para garantizar una calidad sostenible que cumpla con las expectativas de los consumidores y refleje nuestro compromiso con la salud y la fiabilidad.">
                            We follow a manufacturing philosophy based on simplicity and transparency, focusing on clear
                            ingredients, natural honey sweetening, and responsible production processes to ensure
                            sustainable quality that meets consumer expectations and reflects our commitment to health
                            and reliability.
                        </p>
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
                    <div class="col-md-6 col-lg-4">
                        <div class="why-us-card">
                            <h3 class="mb-3" data-ar="خبرة تمتد لأكثر من 19 عامًا" data-en="Over 19 years of experience"
                                data-fr="Plus de 19 ans d’expérience" data-es="Más de 19 años de experiencia">Over 19
                                years
                                of experience</h3>
                            <p data-ar="نمتلك خبرة عريقة تمتد لأكثر من 19 عامًا في مجال تصنيع المنتجات والمشروبات الطبيعية بالعسل والمكملات الغذائية. نعمل وفق شهادات معتمدة محليًا ودوليًا، ونعتمد على أحدث المعدات والتقنيات في عمليات التصنيع، مع الالتزام بأعلى معايير الكفاءة والجودة."
                                data-en="We have extensive experience spanning over 19 years in manufacturing natural honey-based products, beverages, and dietary supplements. We operate according to locally and internationally certified standards, utilizing the latest equipment and technologies in production while adhering to the highest standards of efficiency and quality."
                                data-fr="Nous possédons une vaste expérience de plus de 19 ans dans la fabrication de produits naturels à base de miel, de boissons et de compléments alimentaires. Nous opérons selon des normes certifiées localement et internationalement, en utilisant les équipements et technologies les plus récents dans la production, tout en respectant les normes les plus élevées d’efficacité et de qualité."
                                data-es="Contamos con una amplia experiencia de más de 19 años en la fabricación de productos naturales a base de miel, bebidas y suplementos alimenticios. Operamos conforme a normas certificadas a nivel local e internacional, utilizando el equipo y las tecnologías más recientes en la producción, cumpliendo con los más altos estándares de eficiencia y calidad.">
                                We have extensive experience spanning over 19 years in manufacturing natural honey-based
                                products, beverages, and dietary supplements. We operate according to locally and
                                internationally certified standards, utilizing the latest equipment and technologies in
                                production while adhering to the highest standards of efficiency and quality.
                            </p>
                            <p data-ar="وبفضل ذلك، نجحنا في كسب ثقة الأسواق المحلية والدولية وبناء شراكات استراتيجية طويلة الأمد."
                                data-en="As a result, we have successfully earned the trust of local and international markets and built long-term strategic partnerships."
                                data-fr="Grâce à cela, nous avons réussi à gagner la confiance des marchés locaux et internationaux et à établir des partenariats stratégiques à long terme."
                                data-es="Como resultado, hemos logrado ganarnos la confianza de los mercados locales e internacionales y construir asociaciones estratégicas a largo plazo.">
                                As a result, we have successfully earned the trust of local and international markets
                                and
                                built long-term strategic partnerships.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="why-us-card second-card">
                            <h3 class="mb-3" data-ar="منتجات طبيعية مُحلّاة بالعسل الطبيعي"
                                data-en="Natural products sweetened with natural honey"
                                data-fr="Produits naturels sucrés au miel naturel"
                                data-es="Productos naturales endulzados con miel natural">Natural products sweetened
                                with
                                natural honey</h3>
                            <p data-ar="نقدّم منتجات طبيعية خالية من السكر والمكونات الصناعية، تعتمد على العسل الطبيعي ومكونات مختارة بعناية لتحقيق أفضل قيمة غذائية."
                                data-en="We offer natural products free from sugar and artificial ingredients, relying on natural honey and carefully selected ingredients to achieve the best nutritional value."
                                data-fr="Nous proposons des produits naturels sans sucre ni ingrédients artificiels, utilisant du miel naturel et des ingrédients soigneusement sélectionnés pour offrir la meilleure valeur nutritionnelle."
                                data-es="Ofrecemos productos naturales libres de azúcar e ingredientes artificiales, basados en miel natural e ingredientes cuidadosamente seleccionados para lograr el mejor valor nutricional.">
                                We offer natural products free from sugar and artificial ingredients, relying on natural
                                honey and carefully selected ingredients to achieve the best nutritional value.
                            </p>
                            <p class="pb-3"
                                data-ar="كما نمتلك خبرة متخصصة في تصنيع المنتجات الغذائية والمشروبات والمكملات الغذائية، لنقدّم حلولًا صحية تجمع بين الطعم المتوازن والفائدة الغذائية العالية."
                                data-en="We also have specialized expertise in manufacturing food products, beverages, and dietary supplements, providing healthy solutions that combine balanced taste with high nutritional benefits."
                                data-fr="Nous possédons également une expertise spécialisée dans la fabrication de produits alimentaires, de boissons et de compléments alimentaires, afin de proposer des solutions saines alliant goût équilibré et haute valeur nutritionnelle."
                                data-es="También contamos con experiencia especializada en la fabricación de productos alimenticios, bebidas y suplementos dietéticos, ofreciendo soluciones saludables que combinan sabor equilibrado con altos beneficios nutricionales.">
                                We also have specialized expertise in manufacturing food products, beverages, and
                                dietary
                                supplements, providing healthy solutions that combine balanced taste with high
                                nutritional
                                benefits.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="why-us-card third-card">
                            <h3 class="mb-3" data-ar="الابتكار وتطوير المنتجات" data-en="Innovation and Product Development"
                                data-fr="Innovation et Développement de Produits"
                                data-es="Innovación y Desarrollo de Productos">Innovation and Product Development</h3>
                            <p data-ar="نؤمن بأن الابتكار هو أساس الاستدامة والتميز، لذلك نستثمر باستمرار في تطوير التركيبات وتحسين المنتجات لمواكبة تطورات السوق واحتياجات المستهلكين المتغيرة."
                                data-en="We believe that innovation is the foundation of sustainability and excellence, which is why we continuously invest in developing formulations and improving products to keep up with market trends and changing consumer needs."
                                data-fr="Nous croyons que l’innovation est le fondement de la durabilité et de l’excellence, c’est pourquoi nous investissons continuellement dans le développement de formulations et l’amélioration des produits pour suivre les évolutions du marché et les besoins changeants des consommateurs."
                                data-es="Creemos que la innovación es la base de la sostenibilidad y la excelencia, por lo que invertimos continuamente en el desarrollo de formulaciones y la mejora de productos para mantenernos al día con las tendencias del mercado y las necesidades cambiantes de los consumidores.">
                                We believe that innovation is the foundation of sustainability and excellence, which is
                                why
                                we continuously invest in developing formulations and improving products to keep up with
                                market trends and changing consumer needs.
                            </p>
                            <p data-ar="نعمل على ابتكار مشروبات ومنتجات تعتمد على العسل الطبيعي، تجمع بين العلم الغذائي والخبرة العملية في التصنيع، لتقديم منتجات عصرية تلبي تطلعات المستهلك الحديث."
                                data-en="We work on creating beverages and products based on natural honey, combining nutritional science with practical manufacturing expertise to deliver modern products that meet the expectations of today’s consumers."
                                data-fr="Nous travaillons à créer des boissons et des produits à base de miel naturel, combinant la science nutritionnelle et l’expertise pratique en fabrication, afin de proposer des produits modernes répondant aux attentes des consommateurs d’aujourd’hui."
                                data-es="Trabajamos en la creación de bebidas y productos a base de miel natural, combinando la ciencia nutricional con la experiencia práctica en fabricación, para ofrecer productos modernos que cumplan con las expectativas del consumidor actual.">
                                We work on creating beverages and products based on natural honey, combining nutritional
                                science with practical manufacturing expertise to deliver modern products that meet the
                                expectations of today’s consumers.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="section-divider"></div>

    <section class="fqs py-5">
        <div class="container">
            <div class="header">
                <div class="text">
                    <h2>Questions & Answers</h2>
                    <p class="text-muted">There are many variations of passages of lorem Ipsum available but the
                        majority have suffered alteration in some form by injected humour.</p>
                </div>
            </div>
            <div class="py-5">
                <div class="faq-item active">
                    <button class="faq-question">
                        <span data-ar="من أين يتم الحصول على العسل المستخدم في منتجات بي آند هني؟"
                            data-en="Where is the honey used in Bee & Honey products sourced from?"
                            data-fr="D’où provient le miel utilisé dans les produits Bee & Honey ?"
                            data-es="¿De dónde se obtiene la miel utilizada en los productos de Bee & Honey?">Where is
                            the honey used in Bee & Honey products sourced from?</span>
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p data-ar="نحرص على اختيار عسل طبيعي عالي الجودة من مصادر موثوقة ومعتمدة، ويخضع لفحوصات واختبارات دقيقة قبل استخدامه في عمليات التصنيع، لضمان نقائه وجودته."
                            data-en="We ensure the selection of high-quality natural honey from trusted and certified sources, which undergoes precise testing and inspection before being used in production processes to guarantee its purity and quality."
                            data-fr="Nous veillons à choisir du miel naturel de haute qualité provenant de sources fiables et certifiées, soumis à des tests et inspections rigoureux avant son utilisation dans les processus de fabrication afin de garantir sa pureté et sa qualité."
                            data-es="Nos aseguramos de seleccionar miel natural de alta calidad proveniente de fuentes confiables y certificadas, que se somete a pruebas e inspecciones precisas antes de ser utilizada en los procesos de producción para garantizar su pureza y calidad.">
                            We ensure the selection of high-quality natural honey from trusted and certified sources,
                            which undergoes precise testing and inspection before being used in production processes to
                            guarantee its purity and quality.
                        </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span data-ar="هل منتجات بي آند هني معتمدة وتحمل شهادات جودة؟"
                            data-en="Are Bee & Honey products certified and do they carry quality certificates?"
                            data-fr="Les produits Bee & Honey sont‑ils certifiés et disposent‑ils de certificats de qualité ?"
                            data-es="¿Los productos de Bee & Honey están certificados y cuentan con certificados de calidad?">Are
                            Bee & Honey products certified and do they carry quality certificates?</span>
                        <span class="faq-icon">−</span>
                    </button>
                    <div class="faq-answer">
                        <p data-ar="نعم، نعمل وفق شهادات جودة معتمدة محليًا ودوليًا، ونلتزم بأنظمة التصنيع الغذائي ومعايير سلامة الغذاء المعتمدة."
                            data-en="Yes, we operate in accordance with locally and internationally certified quality standards, adhering to food manufacturing systems and approved food safety regulations."
                            data-fr="Oui, nous opérons conformément à des normes de qualité certifiées localement et internationalement, en respectant les systèmes de fabrication alimentaire et les réglementations de sécurité alimentaire approuvées."
                            data-es="Sí, operamos de acuerdo con normas de calidad certificadas a nivel local e internacional, cumpliendo con los sistemas de fabricación alimentaria y las regulaciones de seguridad alimentaria aprobadas.">
                            Yes, we operate in accordance with locally and internationally certified quality standards,
                            adhering to food manufacturing systems and approved food safety regulations.

                        </p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span data-ar="هل يمكن استبدال السكر في الروتين اليومي بمنتجات بي آند هني؟"
                            data-en="Can sugar be replaced in the daily routine with Bee & Honey products?"
                            data-fr="Peut-on remplacer le sucre dans la routine quotidienne par les produits Bee & Honey ?"
                            data-es="¿Se puede sustituir el azúcar en la rutina diaria por los productos de Bee & Honey?">Can
                            sugar be replaced in the daily routine with Bee & Honey products?</span>
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p data-ar="نعم، تم تطوير منتجاتنا لتكون بديلاً طبيعيًا للسكر، حيث يُستخدم العسل الطبيعي كمُحلٍ أساسي دون إضافة سكر مكرر."
                            data-en="Yes, our products are developed to serve as a natural alternative to sugar, using natural honey as the primary sweetener without adding refined sugar."
                            data-fr="Oui, nos produits ont été développés pour constituer une alternative naturelle au sucre, en utilisant le miel naturel comme édulcorant principal sans ajout de sucre raffiné."
                            data-es="Sí, nuestros productos han sido desarrollados como una alternativa natural al azúcar, utilizando miel natural como edulcorante principal sin añadir azúcar refinado.">
                            Yes, our products are developed to serve as a natural alternative to sugar, using natural
                            honey as the primary sweetener without adding refined sugar.
                        </p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        <span data-ar="كيف تضمن بي آند هني ثبات الجودة والطعم؟"
                            data-en="How does Bee & Honey ensure consistent quality and taste?"
                            data-fr="Comment Bee & Honey garantit-elle la constance de la qualité et du goût ?"
                            data-es="¿Cómo garantiza Bee & Honey la consistencia de la calidad y el sabor?">How does Bee
                            & Honey ensure consistent quality and taste?</span>
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p data-ar="نُطبق أنظمة رقابة صارمة في جميع مراحل التصنيع، بدءًا من اختيار المواد الخام وحتى المنتج النهائي، لضمان ثبات الجودة والطعم في كل دفعة إنتاج."
                            data-en="We apply strict quality control systems across all stages of manufacturing, from the selection of raw materials to the final product, to ensure consistent quality and taste in every production batch."
                            data-fr="Nous appliquons des systèmes de contrôle rigoureux à toutes les étapes de la fabrication, depuis la sélection des matières premières jusqu’au produit final, afin de garantir une qualité et un goût constants pour chaque lot de production."
                            data-es="Aplicamos estrictos sistemas de control de calidad en todas las etapas de fabricación, desde la selección de las materias primas hasta el producto final, para garantizar la consistencia de la calidad y el sabor en cada lote de producción.">
                            We apply strict quality control systems across all stages of manufacturing, from the
                            selection of raw materials to the final product, to ensure consistent quality and taste in
                            every production batch.
                        </p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        <span data-ar="ما الذي يميز منتجات بي آند هني عن المشروبات الطبيعية الأخرى؟"
                            data-en="What distinguishes Bee & Honey products from other natural beverages?"
                            data-fr="Qu’est-ce qui distingue les produits Bee & Honey des autres boissons naturelles ?"
                            data-es="¿Qué distingue a los productos de Bee & Honey de otras bebidas naturales?">What
                            distinguishes Bee & Honey products from other natural beverages?</span>
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p data-ar="نتميز بالجمع بين الخبرة الطويلة، والتحلية بالعسل الطبيعي، والابتكار المستمر في تطوير التركيبات، بما يلبي احتياجات المستهلك العصري."
                            data-en="We stand out by combining long-standing expertise, sweetening with natural honey, and continuous innovation in developing formulations that meet the needs of the modern consumer."
                            data-fr="Nous nous distinguons par la combinaison d’une longue expertise, de l’utilisation du miel naturel comme édulcorant et d’une innovation continue dans le développement de formulations répondant aux besoins du consommateur moderne."
                            data-es="Nos distinguimos por combinar una amplia experiencia, la utilización de miel natural como endulzante y la innovación continua en el desarrollo de formulaciones que satisfacen las necesidades del consumidor moderno.">
                            We stand out by combining long-standing expertise, sweetening with natural honey, and
                            continuous innovation in developing formulations that meet the needs of the modern consumer.
                        </p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        <span data-ar="هل منتجات بي آند هني مناسبة للتوزيع والتصدير؟"
                            data-en="Are Bee & Honey products suitable for distribution and export?"
                            data-fr="Les produits Bee & Honey sont-ils adaptés à la distribution et à l’exportation ?"
                            data-es="¿Son los productos de Bee & Honey adecuados para la distribución y exportación?">Are
                            Bee & Honey products suitable for distribution and export?</span>
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p data-ar="نعم، منتجاتنا مطابقة لمتطلبات ومعايير الأسواق المحلية والدولية، وهي جاهزة للتوزيع والتصدير."
                            data-en="Yes, our products comply with the requirements and standards of local and international markets and are ready for distribution and export."
                            data-fr="Oui, nos produits sont conformes aux exigences et aux normes des marchés locaux et internationaux et sont prêts pour la distribution et l’exportation."
                            data-es="Sí, nuestros productos cumplen con los requisitos y estándares de los mercados locales e internacionales y están listos para su distribución y exportación.">
                            Yes, our products comply with the requirements and standards of local and international
                            markets and are ready for distribution and export.
                        </p>
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/main.js"></script>
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
