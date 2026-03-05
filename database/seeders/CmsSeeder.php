<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\Slider;
use App\Models\Branch;
use App\Models\Certificate;
use App\Models\Counter;
use App\Models\Faq;
use App\Models\Page;
use Illuminate\Database\Seeder;

class CmsSeeder extends Seeder
{
    public function run(): void
    {
        // === الإعدادات العامة ===
        $settings = [
            // General
            ['key' => 'site_name_en', 'value' => 'Bee & Honey', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_name_ar', 'value' => 'بي اند هوني', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_name_fr', 'value' => 'Bee & Honey', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_name_es', 'value' => 'Bee & Honey', 'type' => 'text', 'group' => 'general'],
            ['key' => 'catalog_link', 'value' => 'catalog/Bee_HoneyCatalog.pdf', 'type' => 'file', 'group' => 'general'],
            ['key' => 'hero_video', 'value' => '', 'type' => 'video', 'group' => 'general'],
            // Contact
            ['key' => 'phone', 'value' => '+962 7 9696 2627', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'email', 'value' => 'info@beeandhoney.com', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'whatsapp', 'value' => '+962796962627', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'address_en', 'value' => 'Al Hassan Industrial Estate, Irbid, Jordan', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'address_ar', 'value' => 'مدينة الحسن الصناعية، إربد، الأردن', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'address_fr', 'value' => 'Ville industrielle d\'Al Hassan, Irbid, Jordanie', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'address_es', 'value' => 'Ciudad industrial de Al Hassan, Irbid, Jordania', 'type' => 'text', 'group' => 'contact'],
            // Social
            ['key' => 'instagram', 'value' => 'https://www.instagram.com/beeandhoneyjo', 'type' => 'url', 'group' => 'social'],
            ['key' => 'facebook', 'value' => 'https://www.facebook.com/beeandhoneyjo', 'type' => 'url', 'group' => 'social'],
            ['key' => 'linkedin', 'value' => 'https://www.linkedin.com/company/beeandhoneyjo', 'type' => 'url', 'group' => 'social'],
        ];

        foreach ($settings as $s) {
            Setting::updateOrCreate(['key' => $s['key']], $s);
        }

        // === العدادات ===
        $counters = [
            ['icon' => 'fas fa-cart-shopping', 'number' => '28000000', 'display_text' => '28M+', 'title_en' => 'Products sold', 'title_ar' => 'منتجاتنا المباعة', 'title_es' => 'Productos vendidos', 'title_fr' => 'Produits vendus', 'sort_order' => 1],
            ['icon' => 'fas fa-users', 'number' => '25000000', 'display_text' => '2M+', 'title_en' => 'Consumers', 'title_ar' => 'عدد المستهلكين', 'title_es' => 'Número de consumidores', 'title_fr' => 'Nombre de consommateurs', 'sort_order' => 2],
            ['icon' => 'fas fa-user-tie', 'number' => '450', 'display_text' => '450', 'title_en' => 'Employees', 'title_ar' => 'الموظفين', 'title_es' => 'Empleados', 'title_fr' => 'Employés', 'sort_order' => 3],
            ['icon' => 'fa-solid fa-store', 'number' => '120000', 'display_text' => '120000', 'title_ar' => 'مواقع البيع', 'title_en' => 'Sales Websites', 'title_es' => 'Sitios de venta', 'title_fr' => 'Sites de vente', 'sort_order' => 4],
        ];

        foreach ($counters as $c) {
            Counter::updateOrCreate(['title_en' => $c['title_en']], $c);
        }

        // === السلايدر ===
        $sliderImages = [
            'freepik__create-a-highend-luxury-product-photography-scene-__55386.png',
            'freepik__ultra-realistic-modern-premium-product-advertising__55390.png',
            'freepik__ultra-realistic-modern-premium-product-advertising__55391.png',
            'freepik__ultra-realistic-premium-product-advertising-photo-__55389.png',
            'freepik__ultra-realistic-premium-product-photography-of-the__55392.png',
            'freepik__ultra-realistic-premium-product-photography-of-the__55393.png',
            'freepik__ultra-realistic-product-photography-of-the-exact-b__55385.png',
            'freepik__ultraphotorealistic-premium-product-advertising-sh__55388.png',
            'Malt_story_UAE.png',
            'Creamy_poster-8.png'
        ];

        foreach ($sliderImages as $index => $imgName) {
            $i = $index + 1;
            $source = public_path("assets/{$imgName}");
            $destPath = "sliders/{$imgName}";
            
            if (file_exists($source)) {
                if (!\Illuminate\Support\Facades\Storage::disk('public')->exists($destPath)) {
                    \Illuminate\Support\Facades\Storage::disk('public')->put($destPath, file_get_contents($source));
                }
                Slider::updateOrCreate(['image' => $destPath], [
                    'alt_en' => "Product {$i}",
                    'alt_ar' => "منتج {$i}",
                    'alt_fr' => "Produit {$i}",
                    'alt_es' => "Producto {$i}",
                    'sort_order' => $i,
                    'is_active' => true,
                ]);
            }
        }

        // === الشهادات ===
        $certificates = [
            ['icon' => 'assets/certificate-icon-1.png', 'full' => ['assets/certificate-1.jpg']],
            ['icon' => 'assets/certificate-icon-2.png', 'full' => ['assets/certificate-2.jpg']],
            ['icon' => 'assets/certificate-icon-3.png', 'full' => ['assets/certificate-4.jpg', 'assets/certificate-3.jpg']],
            ['icon' => 'assets/certificate-icon-4.png', 'full' => ['assets/certificate-5.jpg']],
            ['icon' => 'assets/certificate-icon-5.png', 'full' => ['assets/certificate-5.png']],
        ];

        foreach ($certificates as $index => $cert) {
            $sourceIcon = public_path($cert['icon']);
            $destIconPath = "certificates/icon-" . ($index + 1) . ".png";
            
            if (file_exists($sourceIcon)) {
                if (!\Illuminate\Support\Facades\Storage::disk('public')->exists($destIconPath)) {
                    \Illuminate\Support\Facades\Storage::disk('public')->put($destIconPath, file_get_contents($sourceIcon));
                }
            }

            $fullImages = [];
            foreach ($cert['full'] as $j => $fullPath) {
                $sourceFull = public_path($fullPath);
                $ext = pathinfo($sourceFull, PATHINFO_EXTENSION);
                $destFullPath = "certificates/full-" . ($index + 1) . "-" . ($j + 1) . ".{$ext}";
                if (file_exists($sourceFull)) {
                    if (!\Illuminate\Support\Facades\Storage::disk('public')->exists($destFullPath)) {
                        \Illuminate\Support\Facades\Storage::disk('public')->put($destFullPath, file_get_contents($sourceFull));
                    }
                    $fullImages[] = $destFullPath;
                }
            }

            Certificate::updateOrCreate(
                ['sort_order' => $index + 1],
                [
                    'icon_image' => file_exists($sourceIcon) ? $destIconPath : null,
                    'full_images' => $fullImages,
                    'is_active' => true,
                ]
            );
        }

        // === الفروع ===
        $branches = [
            ['country_en' => 'Yemen', 'country_ar' => 'اليمن', 'country_es' => 'Yemen', 'country_fr' => 'Yémen', 'description_en' => 'Agent in Yemen for Bee & Honey products.', 'description_ar' => 'وكيل في اليمن لمنتجات بي اند هوني.', 'country_code' => 'YE', 'sort_order' => 1],
            ['country_en' => 'Saudi Arabia', 'country_ar' => 'السعودية', 'country_es' => 'Arabia Saudita', 'country_fr' => 'Arabie Saoudite', 'description_en' => 'Agent in Saudi Arabia.', 'description_ar' => 'وكيل في السعودية.', 'country_code' => 'SA', 'sort_order' => 2],
            ['country_en' => 'Egypt', 'country_ar' => 'مصر', 'country_es' => 'Egipto', 'country_fr' => 'Égypte', 'description_en' => 'Agent in Egypt.', 'description_ar' => 'وكيل في مصر.', 'country_code' => 'EG', 'sort_order' => 3],
            ['country_en' => 'Libya', 'country_ar' => 'ليبيا', 'country_es' => 'Libia', 'country_fr' => 'Libye', 'description_en' => 'Agent in Libya.', 'description_ar' => 'وكيل في ليبيا.', 'country_code' => 'LY', 'sort_order' => 4],
            ['country_en' => 'Sudan', 'country_ar' => 'السودان', 'country_es' => 'Sudán', 'country_fr' => 'Soudan', 'description_en' => 'Agent in Sudan.', 'description_ar' => 'وكيل في السودان.', 'country_code' => 'SD', 'sort_order' => 5],
            ['country_en' => 'Iraq', 'country_ar' => 'العراق', 'country_es' => 'Irak', 'country_fr' => 'Irak', 'description_en' => 'Agent in Iraq.', 'description_ar' => 'وكيل في العراق.', 'country_code' => 'IQ', 'sort_order' => 6],
            ['country_en' => 'Palestine', 'country_ar' => 'فلسطين', 'country_es' => 'Palestina', 'country_fr' => 'Palestine', 'description_en' => 'Agent in Palestine.', 'description_ar' => 'وكيل في فلسطين.', 'country_code' => 'PS', 'sort_order' => 7],
            ['country_en' => 'Jordan', 'country_ar' => 'الأردن', 'country_es' => 'Jordania', 'country_fr' => 'Jordanie', 'description_en' => 'Headquarters in Jordan.', 'description_ar' => 'المقر الرئيسي في الأردن.', 'country_code' => 'JO', 'sort_order' => 8],
        ];

        foreach ($branches as $b) {
            Branch::updateOrCreate(['country_en' => $b['country_en']], $b);
        }

        // === الأسئلة الشائعة ===
        $faqs = [
            [
                'question_en' => 'Where is the honey used in Bee & Honey products sourced from?',
                'question_ar' => 'من أين يتم الحصول على العسل المستخدم في منتجات بي آند هني؟',
                'question_es' => '¿De dónde se obtiene la miel utilizada en los productos de Bee & Honey?',
                'question_fr' => 'D’où provient le miel utilisé dans les produits Bee & Honey ?',
                'answer_en' => 'We ensure the selection of high-quality natural honey from trusted and certified sources, which undergoes precise testing and inspection before being used in production processes to guarantee its purity and quality.',
                'answer_ar' => 'نحرص على اختيار عسل طبيعي عالي الجودة من مصادر موثوقة ومعتمدة، ويخضع لفحوصات واختبارات دقيقة قبل استخدامه في عمليات التصنيع، لضمان نقائه وجودته.',
                'answer_es' => 'Nos aseguramos de seleccionar miel natural de alta calidad proveniente de fuentes confiables y certificadas, que se somete a pruebas e inspecciones precisas antes de ser utilizada en los procesos de producción para garantizar su pureza y calidad.',
                'answer_fr' => 'Nous veillons à choisir du miel naturel de haute qualité provenant de sources fiables et certifiées, soumis à des tests et inspections rigoureux avant son utilisation dans les processus de fabrication afin de garantir sa pureté et sa qualité.',
                'sort_order' => 1,
            ],
            [
                'question_en' => 'Are Bee & Honey products certified and do they carry quality certificates?',
                'question_ar' => 'هل منتجات بي آند هني معتمدة وتحمل شهادات جودة؟',
                'question_es' => '¿Los productos de Bee & Honey están certificados y cuentan con certificados de calidad?',
                'question_fr' => 'Les produits Bee & Honey sont‑ils certifiés et disposent‑ils de certificats de qualité ?',
                'answer_en' => 'Yes, we operate in accordance with locally and internationally certified quality standards, adhering to food manufacturing systems and approved food safety regulations.',
                'answer_ar' => 'نعم، نعمل وفق شهادات جودة معتمدة محليًا ودوليًا، ونلتزم بأنظمة التصنيع الغذائي ومعايير سلامة الغذاء المعتمدة.',
                'answer_es' => 'Sí, operamos de acuerdo con normas de calidad certificadas a nivel local e internacional, cumpliendo con los sistemas de fabricación alimentaria y las regulaciones de seguridad alimentaria aprobadas.',
                'answer_fr' => 'Oui, nous opérons conformément à des normes de qualité certifiées localement et internationalement, en respectant les systèmes de fabrication alimentaire et les réglementations de sécurité alimentaire approuvées.',
                'sort_order' => 2,
            ],
            [
                'question_en' => 'Can sugar be replaced in the daily routine with Bee & Honey products?',
                'question_ar' => 'هل يمكن استبدال السكر في الروتين اليومي بمنتجات بي آند هني؟',
                'question_es' => '¿Se puede sustituir el azúcar en la rutina diaria por los productos de Bee & Honey?',
                'question_fr' => 'Peut-on remplacer le sucre dans la routine quotidienne par les produits Bee & Honey ?',
                'answer_en' => 'Yes, our products are developed to serve as a natural alternative to sugar, using natural honey as the primary sweetener without adding refined sugar.',
                'answer_ar' => 'نعم، تم تطوير منتجاتنا لتكون بديلاً طبيعيًا للسكر، حيث يُستخدم العسل الطبيعي كمُحلٍ أساسي دون إضافة سكر مكرر.',
                'answer_es' => 'Sí, nuestros productos han sido desarrollados como una alternativa natural al azúcar, utilizando miel natural como edulcorante principal sin añadir azúcar refinado.',
                'answer_fr' => 'Oui, nos produits ont été développés pour constituer une alternative naturelle au sucre, en utilisant le miel naturel comme édulcorant principal sans ajout de sucre raffiné.',
                'sort_order' => 3,
            ],
            [
                'question_en' => 'How does Bee & Honey ensure consistent quality and taste?',
                'question_ar' => 'كيف تضمن بي آند هني ثبات الجودة والطعم؟',
                'question_es' => '¿Cómo garantiza Bee & Honey la consistencia de la calidad y el sabor?',
                'question_fr' => 'Comment Bee & Honey garantit-elle la constance de la qualité et du goût ?',
                'answer_en' => 'We apply strict quality control systems across all stages of manufacturing, from the selection of raw materials to the final product, to ensure consistent quality and taste in every production batch.',
                'answer_ar' => 'نُطبق أنظمة رقابة صارمة في جميع مراحل التصنيع، بدءًا من اختيار المواد الخام وحتى المنتج النهائي، لضمان ثبات الجودة والطعم في كل دفعة إنتاج.',
                'answer_es' => 'Aplicamos estrictos sistemas de control de calidad en todas las etapas de fabricación, desde la selección de las materias primas hasta el producto final, para garantizar la consistencia de la calidad y el sabor en cada lote de producción.',
                'answer_fr' => 'Nous appliquons des systèmes de contrôle rigoureux à toutes les étapes de la fabrication, depuis la sélection des matières premières jusqu’au produit final, afin de garantir une qualité et un goût constants pour chaque lot de production.',
                'sort_order' => 4,
            ],
            [
                'question_en' => 'What distinguishes Bee & Honey products from other natural beverages?',
                'question_ar' => 'ما الذي يميز منتجات بي آند هني عن المشروبات الطبيعية الأخرى؟',
                'question_es' => '¿Qué distingue a los productos de Bee & Honey de otras bebidas naturales?',
                'question_fr' => 'Qu’est-ce qui distingue les produits Bee & Honey des autres boissons naturelles ?',
                'answer_en' => 'We stand out by combining long-standing expertise, sweetening with natural honey, and continuous innovation in developing formulations that meet the needs of the modern consumer.',
                'answer_ar' => 'نتميز بالجمع بين الخبرة الطويلة، والتحلية بالعسل الطبيعي، والابتكار المستمر في تطوير التركيبات، بما يلبي احتياجات المستهلك العصري.',
                'answer_es' => 'Nos distinguimos por combinar una amplia experiencia, la utilización de miel natural como endulzante y la innovación continua en el desarrollo de formulaciones que satisfacen las necesidades del consumidor moderno.',
                'answer_fr' => 'Nous nous distinguons par la combinaison d’une longue expertise, de l’utilisation du miel naturel comme édulcorant et d’une innovation continue dans le développement de formulations répondant aux besoins du consommateur moderne.',
                'sort_order' => 5,
            ],
            [
                'question_en' => 'Are Bee & Honey products suitable for distribution and export?',
                'question_ar' => 'هل منتجات بي آند هني مناسبة للتوزيع والتصدير؟',
                'question_es' => '¿Son los productos de Bee & Honey adecuados para la distribución y exportación?',
                'question_fr' => 'Les produits Bee & Honey sont-ils adaptés à la distribution et à l’exportation ?',
                'answer_en' => 'Yes, our products comply with the requirements and standards of local and international markets and are ready for distribution and export.',
                'answer_ar' => 'نعم، منتجاتنا مطابقة لمتطلبات ومعايير الأسواق المحلية والدولية، وهي جاهزة للتوزيع والتصدير.',
                'answer_es' => 'Sí, nuestros productos cumplen con los requisitos y estándares de los mercados locales e internacionales y están listos para su distribución y exportación.',
                'answer_fr' => 'Oui, nos produits sont conformes aux exigences et aux normes des marchés locaux et internationaux et sont prêts pour la distribution et l’exportation.',
                'sort_order' => 6,
            ],
        ];

        foreach ($faqs as $f) {
            Faq::updateOrCreate(['question_en' => $f['question_en']], $f);
        }

        // === محتوى الصفحات ===
        $pages = [
            [
                'slug' => 'about-brief',
                'title_en' => 'Brief About Bee&Honey',
                'title_ar' => 'نبذة عن Bee&Honey',
                'title_fr' => 'Bref sur Bee&Honey',
                'title_es' => 'Breve sobre Bee&Honey',
                'content_en' => 'Bee & Honey is a leading brand under Yemeni Honey House, established in 2007, with extensive experience in manufacturing and developing natural products and honey-based dietary supplements, in accordance with the highest international quality standards.',
                'content_ar' => 'بي آند هني هي علامة تجارية رائدة تابعة لشركة بيت العسل اليمني، التي تأسست عام 2007، وتتمتع بخبرة واسعة في تصنيع وتطوير المنتجات الطبيعية والمكملات الغذائية المعتمدة على العسل الطبيعي، وفق أعلى معايير الجودة العالمية.',
                'content_fr' => 'Bee & Honey est une marque leader appartenant à Yemeni Honey House, fondée en 2007, disposant d\'une vaste expérience dans la fabrication et le développement de produits naturels et de compléments alimentaires à base de miel naturel, conformément aux normes internationales de qualité les plus élevées.',
                'content_es' => 'Bee & Honey es una marca líder perteneciente a Yemeni Honey House, fundada en 2007, con amplia experiencia en la fabricación y el desarrollo de productos naturales y suplementos alimenticios a base de miel natural, de acuerdo con los más altos estándares internacionales de calidad.',
                'sort_order' => 1,
            ],
            [
                'slug' => 'about',
                'title_en' => 'About Us',
                'title_ar' => 'من نحن',
                'title_fr' => 'Qui sommes-nous',
                'title_es' => 'Quiénes somos',
                'content_en' => 'Bee & Honey is a Jordanian company that has established itself as one of the leading manufacturers and exporters of natural honey and bee products in the region.',
                'content_ar' => 'بي اند هوني هي شركة أردنية رسخت نفسها كواحدة من الشركات الرائدة في تصنيع وتصدير العسل الطبيعي ومنتجات النحل في المنطقة.',
                'content_fr' => 'Bee & Honey est une entreprise jordanienne qui s\'est imposée comme l\'un des principaux fabricants et exportateurs de miel naturel et de produits apicoles dans la région.',
                'content_es' => 'Bee & Honey es una empresa jordana que se ha consolidado como uno de los principales fabricantes y exportadores de miel natural y productos apícolas en la región.',
                'sort_order' => 1,
            ],
            [
                'slug' => 'vision',
                'title_en' => 'Our Vision',
                'title_ar' => 'رؤيتنا',
                'title_fr' => 'Notre Vision',
                'title_es' => 'Nuestra Visión',
                'icon' => 'fa-solid fa-eye',
                'content_en' => 'To be the leading regional and global brand in manufacturing honey-based products, honey-sweetened natural beverages, and dietary supplements, while contributing to promoting a healthy and sustainable lifestyle.',
                'content_ar' => 'أن نكون العلامة التجارية الرائدة إقليميًا وعالميًا في تصنيع منتجات من العسل والمشروبات الطبيعية المُحلّاة بالعسل الطبيعي والمكملات الغذائية، وأن نُسهم في تعزيز نمط حياة صحي ومستدام.',
                'content_fr' => 'Être la marque leader régionale et mondiale dans la fabrication de produits à base de miel, de boissons naturelles sucrées au miel et de compléments alimentaires, tout en contribuant à promouvoir un mode de vie sain et durable.',
                'content_es' => 'Ser la marca líder regional y global en la fabricación de productos a base de miel, bebidas naturales endulzadas con miel y suplementos alimenticios, contribuyendo al mismo tiempo a promover un estilo de vida saludable y sostenible.',
                'sort_order' => 2,
            ],
            [
                'slug' => 'mission',
                'title_en' => 'Our Mission',
                'title_ar' => 'رسالتنا',
                'title_fr' => 'Notre Mission',
                'title_es' => 'Nuestra Misión',
                'icon' => 'fa-solid fa-bullseye',
                'content_en' => 'Providing high-quality natural products, manufactured according to the highest global standards, combining nutritional benefits and balanced taste, and building long-term trust with consumers and partners.',
                'content_ar' => 'تقديم منتجات طبيعية عالية الجودة، مُصنّعة وفق أعلى المعايير العالمية، تجمع بين الفائدة الغذائية والطعم المتوازن، وتبني ثقة المستهلكين والشركاء على المدى الطويل.',
                'content_fr' => 'Fournir des produits naturels de haute qualité, fabriqués selon les normes mondiales les plus strictes, alliant bénéfices nutritionnels et goût équilibré, tout en bâtissant la confiance à long terme des consommateurs et des partenaires.',
                'content_es' => 'Ofrecer productos naturales de alta calidad, elaborados según los más altos estándares mundiales, que combinan beneficios nutricionales y sabor equilibrado, y construyen la confianza a largo plazo con los consumidores y socios.',
                'sort_order' => 3,
            ],
            [
                'slug' => 'manufacturing-philosophy',
                'title_en' => 'Our Manufacturing Philosophy',
                'title_ar' => 'فلسفتنا في التصنيع',
                'title_fr' => 'Notre philosophie de fabrication',
                'title_es' => 'Nuestra filosofía de fabricación',
                'content_en' => 'We follow a manufacturing philosophy based on simplicity and transparency, focusing on clear ingredients, natural honey sweetening, and responsible production processes to ensure sustainable quality that meets consumer expectations and reflects our commitment to health and reliability.',
                'content_ar' => 'نعتمد فلسفة تصنيع قائمة على البساطة والشفافية، ترتكز على مكونات واضحة، وتحلية طبيعية بالعسل، واتباع عمليات إنتاج مسؤولة، لضمان جودة مستدامة تلبي تطلعات المستهلك وتعكس التزامنا بالصحة والموثوقية.',
                'content_fr' => 'Nous suivons une philosophie de fabrication basée sur la simplicité et la transparence, en mettant l\'accent sur des ingrédients clairs, un édulcorage naturel au miel et des processus de production responsables afin de garantir une qualité durable répondant aux attentes des consommateurs et reflétant notre engagement envers la santé et la fiabilité.',
                'content_es' => 'Seguimos una filosofía de fabricación basada en la simplicidad y la transparencia, centrada en ingredientes claros, endulzado natural con miel y procesos de producción responsables, para garantizar una calidad sostenible que cumpla con las expectativas de los consumidores y refleje nuestro compromiso con la salud y la fiabilidad.',
                'sort_order' => 4,
            ],
            [
                'slug' => 'value-quality',
                'title_en' => 'Quality & Commitment',
                'title_ar' => 'الجودة والالتزام',
                'title_fr' => 'Qualité et Engagement',
                'title_es' => 'Calidad y Compromiso',
                'icon' => 'fa-solid fa-award',
                'content_en' => 'We are committed to providing high-quality products according to the highest global standards at all stages of manufacturing.',
                'content_ar' => 'نلتزم بتقديم منتجات عالية الجودة وفق أعلى المعايير العالمية في جميع مراحل التصنيع.',
                'content_fr' => 'Nous nous engageons à fournir des produits de haute qualité conformément aux normes mondiales les plus strictes à toutes les étapes de la fabrication.',
                'content_es' => 'Estamos comprometidos a ofrecer productos de alta calidad según los más altos estándares mundiales en todas las etapas de fabricación.',
                'sort_order' => 1,
            ],
            [
                'slug' => 'value-transparency',
                'title_en' => 'Transparency & Credibility',
                'title_ar' => 'الشفافية والمصداقية',
                'title_fr' => 'Transparence et Crédibilité',
                'title_es' => 'Transparencia y Credibilidad',
                'icon' => 'fa-solid fa-handshake',
                'content_en' => 'We believe in clarity and honesty in our practices, from selecting ingredients to delivering the product to the consumer.',
                'content_ar' => 'نؤمن بالوضوح والصدق في ممارساتنا، من اختيار المكونات وحتى وصول المنتج إلى المستهلك.',
                'content_fr' => 'Nous croyons en la clarté et l’honnêteté dans nos pratiques, de la sélection des ingrédients à la livraison du produit au consommateur.',
                'content_es' => 'Creemos en la claridad y la honestidad en nuestras prácticas, desde la selección de ingredientes hasta la entrega del producto al consumidor.',
                'sort_order' => 2,
            ],
            [
                'slug' => 'value-innovation',
                'title_en' => 'Continuous Innovation',
                'title_ar' => 'الابتكار المستمر',
                'title_fr' => 'Innovation Continue',
                'title_es' => 'Innovación Continua',
                'icon' => 'fa-solid fa-lightbulb',
                'content_en' => 'We are committed to continuously developing our products and improving our formulations to keep up with market trends and consumer needs.',
                'content_ar' => 'نحرص على تطوير منتجاتنا وتحسين تركيباتنا باستمرار لمواكبة تطورات السوق واحتياجات المستهلكين.',
                'content_fr' => 'Nous nous engageons à développer constamment nos produits et à améliorer nos formulations pour suivre les évolutions du marché et les besoins des consommateurs.',
                'content_es' => 'Nos comprometemos a desarrollar continuamente nuestros productos y mejorar nuestras formulaciones para mantenernos al día con las tendencias del mercado y las necesidades de los consumidores.',
                'sort_order' => 3,
            ],
            [
                'slug' => 'value-responsibility',
                'title_en' => 'Responsibility Towards Consumers and the Environment',
                'title_ar' => 'المسؤولية تجاه المستهلك والبيئة',
                'title_fr' => 'Responsabilité envers les consommateurs et l’environnement',
                'title_es' => 'Responsabilidad hacia los consumidores y el medio ambiente',
                'icon' => 'fa-solid fa-leaf',
                'content_en' => 'We are committed to providing safe and healthy products while ensuring sustainability and environmental preservation.',
                'content_ar' => 'نلتزم بتقديم منتجات آمنة وصحية، مع مراعاة الاستدامة والحفاظ على البيئة.',
                'content_fr' => 'Nous nous engageons à fournir des produits sûrs et sains, tout en veillant à la durabilité et à la protection de l’environnement.',
                'content_es' => 'Nos comprometemos a ofrecer productos seguros y saludables, respetando la sostenibilidad y la preservación del medio ambiente.',
                'sort_order' => 4,
            ],
            [
                'slug' => 'value-collaboration',
                'title_en' => 'Building Long-Term Partnerships',
                'title_ar' => 'بناء شراكات طويلة الأمد',
                'title_fr' => 'Établir des partenariats à long terme',
                'title_es' => 'Construcción de alianzas a largo plazo',
                'icon' => 'fa-solid fa-users',
                'content_en' => 'We work on building relationships based on trust and collaboration with our partners and distributors to achieve shared and sustainable success.',
                'content_ar' => 'نعمل على بناء علاقات قائمة على الثقة والتعاون مع شركائنا وموزعينا لتحقيق نجاح مشترك ومستدام.',
                'content_fr' => 'Nous travaillons à établir des relations fondées sur la confiance et la coopération avec nos partenaires et distributeurs afin de parvenir à un succès commun et durable.',
                'content_es' => 'Trabajamos para construir relaciones basadas en la confianza y la colaboración con nuestros socios y distribuidores para lograr un éxito compartido y sostenible.',
                'sort_order' => 5,
            ],
            [
                'slug' => 'why-us-experience',
                'title_en' => 'Over 19 years of experience',
                'title_ar' => 'خبرة تمتد لأكثر من 19 عامًا',
                'title_fr' => 'Plus de 19 ans d’expérience',
                'title_es' => 'Más de 19 años de experiencia',
                'icon' => 'fas fa-award',
                'content_en' => 'We have extensive experience spanning over 19 years in manufacturing natural honey-based products, beverages, and dietary supplements. We operate according to locally and internationally certified standards, utilizing the latest equipment and technologies in production while adhering to the highest standards of efficiency and quality. As a result, we have successfully earned the trust of local and international markets and built long-term strategic partnerships.',
                'content_ar' => 'نمتلك خبرة عريقة تمتد لأكثر من 19 عامًا في مجال تصنيع المنتجات والمشروبات الطبيعية بالعسل والمكملات الغذائية. نعمل وفق شهادات معتمدة محليًا ودوليًا، ونعتمد على أحدث المعدات والتقنيات في عمليات التصنيع، مع الالتزام بأعلى معايير الكفاءة والجودة. وبفضل ذلك، نجحنا في كسب ثقة الأسواق المحلية والدولية وبناء شراكات استراتيجية طويلة الأمد.',
                'content_fr' => 'Nous possédons une vaste expérience de plus de 19 ans dans la fabrication de produits naturels à base de miel, de boissons et de compléments alimentaires. Nous opérons selon des normes certifiées localement et internationalement, en utilisant les équipements et technologies les plus récents dans la production, tout en respectant les normes les plus élevées d’efficacité et de qualité. Grâce à cela, nous avons réussi à gagner la confiance des marchés locaux et internationaux et à établir des partenariats stratégiques à long terme.',
                'content_es' => 'Contamos con una amplia experiencia de más de 19 años en la fabricación de productos naturales a base de miel, bebidas y suplementos alimenticios. Operamos conforme a normas certificadas a nivel local e internacional, utilizando el equipo y las tecnologías más recientes en la producción, cumpliendo con los más altos estándares de eficiencia y calidad. Como resultado, hemos logrado ganarnos la confianza de los mercados locales e internacionales y construir asociaciones estratégicas a largo plazo.',
                'sort_order' => 1,
            ],
            [
                'slug' => 'why-us-sweetened',
                'title_en' => 'Natural products sweetened with natural honey',
                'title_ar' => 'منتجات طبيعية مُحلّاة بالعسل الطبيعي',
                'title_fr' => 'Produits naturels sucrés au miel naturel',
                'title_es' => 'Productos naturales endulzados con miel natural',
                'icon' => 'fas fa-gem',
                'content_en' => 'We offer natural products free from sugar and artificial ingredients, relying on natural honey and carefully selected ingredients to achieve the best nutritional value. We also have specialized expertise in manufacturing food products, beverages, and dietary supplements, providing healthy solutions that combine balanced taste with high nutritional benefits.',
                'content_ar' => 'نقدّم منتجات طبيعية خالية من السكر والمكونات الصناعية، تعتمد على العسل الطبيعي ومكونات مختارة بعناية لتحقيق أفضل قيمة غذائية. كما نمتلك خبرة متخصصة في تصنيع المنتجات الغذائية والمشروبات والمكملات الغذائية، لنقدّم حلولًا صحية تجمع بين الطعم المتوازن والفائدة الغذائية العالية.',
                'content_fr' => 'Nous proposons des produits naturels sans sucre ni ingrédients artificiels, utilisant du miel naturel et des ingrédients soigneusement sélectionnés pour offrir la meilleure valeur nutritionnelle. Nous possédons également une expertise spécialisée dans la fabrication de produits alimentaires, de boissons et de compléments alimentaires, afin de proposer des solutions saines alliant goût équilibré et haute valeur nutritionnelle.',
                'content_es' => 'Ofrecemos productos naturales libres de azúcar e ingredientes artificiales, basados en miel natural e ingredientes cuidadosamente seleccionados para lograr el mejor valor nutricional. También contamos con experiencia especializada en la fabricación de productos alimenticios, bebidas y suplementos dietéticos, ofreciendo soluciones saludables que combinan sabor equilibrado con altos beneficios nutricionales.',
                'sort_order' => 2,
            ],
            [
                'slug' => 'why-us-innovation',
                'title_en' => 'Innovation and Product Development',
                'title_ar' => 'الابتكار وتطوير المنتجات',
                'title_fr' => 'Innovation et Développement de Produits',
                'title_es' => 'Innovación y Desarrollo de Productos',
                'icon' => 'fas fa-lightbulb',
                'content_en' => 'We believe that innovation is the foundation of sustainability and excellence, which is why we continuously invest in developing formulations and improving products to keep up with market trends and changing consumer needs. We work on creating beverages and products based on natural honey, combining nutritional science with practical manufacturing expertise to deliver modern products that meet the expectations of today’s consumers.',
                'content_ar' => 'نؤمن بأن الابتكار هو أساس الاستدامة والتميز، لذلك نستثمر باستمرار في تطوير التركيبات وتحسين المنتجات لمواكبة تطورات السوق واحتياجات المستهلكين المتغيرة. نعمل على ابتكار مشروبات ومنتجات تعتمد على العسل الطبيعي، تجمع بين العلم الغذائي والخبرة العملية في التصنيع، لتقديم منتجات عصرية تلبي تطلعات المستهلك الحديث.',
                'content_fr' => 'Nous croyons que l’innovation est le fondement de la durabilité et de l’excellence, c’est pourquoi nous investissons continuellement dans le développement de formulations et l’amélioration des produits pour suivre les évolutions du marché et les besoins changeants des consommateurs. Nous travaillons à créer des boissons et des produits à base de miel naturel, combinant la science nutritionnelle et l’expertise pratique en fabrication, afin de proposer des produits modernes répondant aux attentes des consommateurs d’aujourd’hui.',
                'content_es' => 'Creemos que la innovación es la base de la sostenibilidad y la excelencia, por lo que invertimos continuamente en el desarrollo de formulaciones y la mejora de productos para mantenernos al día con las tendencias del mercado y las necesidades cambiantes de los consumidores. Trabajamos en la creación de bebidas y productos a base de miel natural, combinando la ciencia nutricional con la experiencia práctica en fabricación, para ofrecer productos modernos que cumplan con las expectativas del consumidor actual.',
                'sort_order' => 3,
            ],
        ];

        foreach ($pages as $p) {
            Page::updateOrCreate(['slug' => $p['slug']], $p);
        }
        // === شركاؤنا / الفروع ===
        $branches = [
            [
                'country_en' => 'Yemen',
                'country_ar' => 'اليمن',
                'country_es' => 'Yemen',
                'country_fr' => 'Yémen',
                'description_en' => 'Hafez Allah Hassan Trading Co. Ltd. Our partnership in Yemen stems from shared roots and identity. We work together to provide high-quality beverages trusted by Yemeni consumers, achieving positive results that reflect our shared success.',
                'description_ar' => 'شركة حفظ الله حسن للتجارة المحدودة شراكتنا في اليمن تنطلق من الجذور والهوية المشتركة. نعمل معاً لتقديم مشروبات عالية الجودة تحظى بثقة المستهلك اليمني، وحققنا نتائج إيجابية تعكس نجاحنا المشترك.',
                'description_es' => 'Hafez Allah Hassan Trading Co. Ltd. Nuestra asociación en Yemen surge de raíces e identidad compartidas. Trabajamos juntos para ofrecer bebidas de alta calidad en las que confían los consumidores yemeníes, logrando resultados positivos que reflejan nuestro éxito compartido.',
                'description_fr' => 'Hafez Allah Hassan Trading Co. Ltd. Notre partenariat au Yémen découle de racines et d\'une identité partagées. Nous travaillons ensemble pour fournir des boissons de haute qualité auxquelles les consommateurs yéménites font confiance, obtenant des résultats positifs qui reflètent notre succès commun.',
                'country_code' => 'YE',
                'sort_order' => 1
            ],
            [
                'country_en' => 'Lebanon',
                'country_ar' => 'لبنان',
                'country_es' => 'Líbano',
                'country_fr' => 'Liban',
                'description_en' => 'Al Salam Cooling Company – In Lebanon, we continue to build a gradual presence based on trust and an understanding of the local market. We work to achieve positive results and sustainable growth in this promising market.',
                'description_ar' => 'شركة السلام للتبريد – نواصل في لبنان بناء حضور تدريجي قائم على الثقة وفهم السوق المحلي. نعمل لتحقيق نتائج إيجابية ونمو مستدام في هذا السوق الواعد.',
                'description_es' => 'Al Salam Cooling Company – En Líbano, continuamos construyendo una presencia gradual basada en la confianza y el conocimiento del mercado local. Trabajamos para lograr resultados positivos y un crecimiento sostenible en este mercado prometedor.',
                'description_fr' => 'Al Salam Cooling Company – Au Liban, nous continuons à construire une présence progressive basée sur la confiance et la compréhension du marché local. Nous travaillons pour obtenir des résultats positifs et une croissance durable sur ce marché prometteur.',
                'country_code' => 'LB',
                'sort_order' => 2
            ],
            [
                'country_en' => 'Egypt',
                'country_ar' => 'مصر',
                'country_es' => 'Egipto',
                'country_fr' => 'Égypte',
                'description_en' => 'Golden Hive Food Trading Co. In the Egyptian market, we have achieved a growing presence through a strong partnership. The demand for our products reflects the success of our collaboration and consumer trust.',
                'description_ar' => 'شركة جولدن هيف لتجارة المواد الغذائية في السوق المصري، حققنا حضوراً متنامياً من خلال شراكة قوية. الإقبال على منتجاتنا يعكس نجاح التعاون وثقة المستهلك.',
                'description_es' => 'Golden Hive Food Trading Co. En el mercado egipcio, hemos logrado una presencia creciente a través de una sólida asociación. La demanda de nuestros productos refleja el éxito de nuestra colaboración y la confianza del consumidor.',
                'description_fr' => 'Golden Hive Food Trading Co. Sur le marché égyptien, nous avons atteint une présence croissante grâce à un partenariat solide. La demande pour nos produits reflète le succès de notre collaboration et la confiance des consommateurs.',
                'country_code' => 'EG',
                'sort_order' => 3
            ],
            [
                'country_en' => 'Saudi Arabia',
                'country_ar' => 'المملكة العربية السعودية',
                'country_es' => 'Arabia Saudita',
                'country_fr' => 'Arabie Saoudite',
                'description_en' => 'High Moon Trading Co., Latin Company, and Two Local Agencies. The Saudi market is a strategic market for us. Through these partnerships, we have achieved comprehensive coverage of various regions in the Kingdom, with strong results and an effective spread of our products.',
                'description_ar' => 'شركة هاي مون التجارية، شركة لاتين، ووكالتان محليتان يُعد السوق السعودي سوقاً استراتيجياً لنا. ومن خلال هذه الشراكات، حققنا تغطية شاملة لمختلف مناطق المملكة، مع نتائج قوية وانتشار فعّال لمنتجاتنا.',
                'description_es' => 'High Moon Trading Co., Latin Company y Dos Agencias Locales. El mercado saudí es estratégico para nosotros. A través de estas asociaciones, hemos logrado una cobertura integral de varias regiones del Reino, con sólidos resultados y una difusión efectiva de nuestros productos.',
                'description_fr' => 'High Moon Trading Co., Latin Company et Deux Agences Locales. Le marché saoudien est un marché stratégique pour nous. Grâce à ces partenariats, nous avons obtenu une couverture complète de diverses régions du Royaume, avec de solides résultats et une diffusion efficace de nos produits.',
                'country_code' => 'SA',
                'sort_order' => 4
            ],
            [
                'country_en' => 'Qatar',
                'country_ar' => 'قطر',
                'country_es' => 'Katar',
                'country_fr' => 'Qatar',
                'description_en' => 'Qatar National Import & Export Co. Our partnership in Qatar has contributed to achieving a strong presence and tangible results. We work together to offer beverages that meet market aspirations and earn consumer satisfaction.',
                'description_ar' => 'شركة قطر الوطنية للاستيراد والتصدير شراكتنا في قطر أسهمت في تحقيق حضور قوي ونتائج ملموسة. نعمل معاً لتقديم مشروبات تلبي تطلعات السوق وتحظى برضا المستهلكين.',
                'description_es' => 'Qatar National Import & Export Co. Nuestra asociación en Qatar ha contribuido a lograr una fuerte presencia y resultados tangibles. Trabajamos juntos para ofrecer bebidas que cumplan con las aspiraciones del mercado y ganen la satisfacción del consumidor.',
                'description_fr' => 'Qatar National Import & Export Co. Notre partenariat au Qatar a contribué à obtenir une forte présence et des résultats tangibles. Nous travaillons ensemble pour proposer des boissons qui répondent aux aspirations du marché et gagnent la satisfaction des consommateurs.',
                'country_code' => 'QA',
                'sort_order' => 5
            ],
            [
                'country_en' => 'Oman',
                'country_ar' => 'عُمان',
                'country_es' => 'Omán',
                'country_fr' => 'Oman',
                'description_en' => 'High Line Projects Trading & Services Co. In the Omani market, we have built a partnership based on stability and continuous growth. The increasing demand for our products confirms consumer satisfaction and the strength of our cooperation.',
                'description_ar' => 'شركة مشاريع الخط العالي للتجارة والخدمات في السوق العُماني، بنينا شراكة قائمة على الاستقرار والنمو المستمر. الإقبال المتزايد على منتجاتنا يؤكد رضا المستهلك وقوة التعاون بيننا.',
                'description_es' => 'High Line Projects Trading & Services Co. En el mercado omaní, hemos construido una asociación basada en la estabilidad y el crecimiento continuo. La creciente demanda de nuestros productos confirma la satisfacción del consumidor y la fortaleza de nuestra cooperación.',
                'description_fr' => 'High Line Projects Trading & Services Co. Sur le marché omanais, nous avons bâti un partenariat fondé sur la stabilité et la croissance continue. La demande croissante pour nos produits confirme la satisfaction des consommateurs et la force de notre coopération.',
                'country_code' => 'OM',
                'sort_order' => 6
            ],
            [
                'country_en' => 'Palestine',
                'country_ar' => 'فلسطين',
                'country_es' => 'Palestina',
                'country_fr' => 'Palestine',
                'description_en' => 'Al Salam Cooling Co. Our partnership in Palestine focuses on continuity and providing high-quality products. Consumer satisfaction and trust are the foundation of our shared success.',
                'description_ar' => 'شركة السلام للتبريد شراكتنا في فلسطين تركز على الاستمرارية وتوفير منتجات عالية الجودة. رضا المستهلك وثقته هما أساس نجاحنا المشترك.',
                'description_es' => 'Al Salam Cooling Co. Nuestra asociación en Palestina se centra en la continuidad y en proporcionar productos de alta calidad. La satisfacción y confianza del consumidor son la base de nuestro éxito compartido.',
                'description_fr' => 'Al Salam Cooling Co. Notre partenariat en Palestine se concentre sur la continuité et la fourniture de produits de haute qualité. La satisfaction et la confiance des consommateurs sont le fondement de notre succès commun.',
                'country_code' => 'PS',
                'sort_order' => 7
            ],
            [
                'country_en' => 'United States of America',
                'country_ar' => 'الولايات المتحدة الأمريكية',
                'country_es' => 'Estados Unidos de América',
                'country_fr' => 'États-Unis d\'Amérique',
                'description_en' => 'Xpress Food Union Ave Co. In the US market, we have successfully reached diverse segments of consumers. This partnership reflects continuous growth and a thoughtful expansion of our brand.',
                'description_ar' => 'شركة Xpress Food Union Ave في السوق الأمريكي، نجحنا في الوصول إلى شرائح متنوعة من المستهلكين. هذه الشراكة تعكس نمواً مستمراً وتوسعاً مدروساً لعلامتنا.',
                'description_es' => 'Xpress Food Union Ave Co. En el mercado estadounidense, hemos llegado con éxito a diversos segmentos de consumidores. Esta asociación refleja un crecimiento continuo y una expansión planificada de nuestra marca.',
                'description_fr' => 'Xpress Food Union Ave Co. Sur le marché américain, nous avons réussi à atteindre divers segments de consommateurs. Ce partenariat reflète une croissance continue et une expansion réfléchie de notre marque.',
                'country_code' => 'US',
                'sort_order' => 8
            ],
        ];

        foreach ($branches as $branch) {
            \App\Models\Branch::updateOrCreate(
                ['country_en' => $branch['country_en']],
                $branch
            );
        }
    }
}
