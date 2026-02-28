    <footer class="footer-section px-1">
        <div class="container-fluid py-2">
            <div class="row g-2 align-items-stretch  justify-content-start">
                <div class="col-lg-4 col-md-6 d-flex align-items-center justify-content-center">
                    <div class="footer-logo d-flex align-items-center gap-0">
                        <img src="{{ asset('assets/footer-logo.png') }}" class="w-100" alt="ee and honey" height="300">
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
                            <a href="{{ route('about') }}" data-en="About Us" data-ar="من نحن" data-es="Sobre Nosotros"
                                data-fr="À propos">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('categories') }}" data-en="Products" data-ar="المنتجات"
                                data-es="Productos" data-fr="Produits">
                                Products
                            </a>
                        </li>
                        {{-- <li>
                            <a href="#" data-en="Partner" data-ar="شركاؤنا" data-es="Socio" data-fr="Partenaire">
                                Partner
                            </a>
                        </li> --}}
                        <li>
                            <a href="{{ route('all-news') }}" data-en="News" data-ar="الأخبار" data-es="Noticias"
                                data-fr="Actualités">
                                News
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('all-blogs') }}" data-en="Blogs" data-ar="مدونة" data-es="Blogs"
                                data-fr="Blogs">
                                Blogs
                            </a>
                        </li>
                        <li>
                            <a href=" {{ route('contact') }}" data-en="Contact Us" data-ar="تواصل معنا"
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
                        @foreach (\App\Models\Category::latest()->take(3)->get() as $category)
                            <li>
                                <a href="{{ route('categories.show.products', $category->id) }}"
                                    data-en="{{ $category->name_en }}" data-ar="{{ $category->name_ar }}"
                                    data-es="{{ $category->name_es }}" data-fr="{{ $category->name_fr }}">

                                    {{ $category->name_en }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                </div>

                {{-- <div class="col-lg-4 col-md-6">
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

                </div> --}}
            </div>

        </div>
    </footer>
