<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeoMetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seoData = [
            'home' => [
                'title_en' => 'Bee & Honey - Premium Organic Natural Honey',
                'title_ar' => 'بي اند هوني - عسل طبيعي وعضوي فاخر',
                'title_es' => 'Bee & Honey - Miel natural orgánica premium',
                'title_fr' => 'Bee & Honey - Miel naturel bio de qualité supérieure',
                'description_en' => 'Bee & Honey - Premium organic honey straight from nature. Enjoy 100% pure, natural honey products from Jordan. Discover our collections today.',
                'description_ar' => 'بي اند هوني - عسل عضوي فاخر مباشرة من الطبيعة. استمتع بمنتجات عسل طبيعي ونقي 100% من الأردن. اكتشف مجموعتنا اليوم.',
                'description_es' => 'Bee & Honey - Miel orgánica premium directamente de la naturaleza. Disfrute de productos de miel 100% puros y naturales de Jordania. Descubra nuestras colecciones hoy.',
                'description_fr' => 'Bee & Honey - Miel bio de qualité supérieure tout droit venu de la nature. Profitez de produits à base de miel 100 % pur et naturel de Jordanie. Découvrez nos collections dès aujourd\'hui.',
                'keywords_en' => 'Bee & Honey, organic honey, natural honey, raw honey, Jordan honey',
                'keywords_ar' => 'بي اند هوني, عسل طبيعي, عسل عضوي, عسل أردني, منتجات النحل',
                'keywords_es' => 'Bee & Honey, miel orgánica, miel natural, miel cruda, miel de Jordania',
                'keywords_fr' => 'Bee & Honey, miel bio, miel naturel, miel brut, miel de Jordanie',
            ],
            'about-us' => [
                'title_en' => 'About Us | Bee & Honey Heritage',
                'title_ar' => 'من نحن | تاريخ بي اند هوني',
                'title_es' => 'Sobre Nosotros | El legado de Bee & Honey',
                'title_fr' => 'À propos de nous | L\'héritage de Bee & Honey',
                'description_en' => 'Discover Bee & Honey, Jordan\'s leading provider of organic, 100% natural honey products. Learn about our heritage, values, and commitment to purity.',
                'description_ar' => 'اكتشف بي اند هوني، الرائدة في الأردن لتقديم منتجات العسل العضوي والطبيعي 100%. تعرف على تاريخنا، قيمنا، والتزامنا بالنقاء.',
                'description_es' => 'Descubra Bee & Honey, el principal proveedor jordano de productos de miel orgánica 100% natural. Conozca nuestra historia, valores y compromiso con la pureza.',
                'description_fr' => 'Découvrez Bee & Honey, le principal fournisseur jordanien de produits à base de miel bio 100 % naturel. Apprenez-en plus sur notre héritage, nos valeurs et notre engagement envers la pureté.',
                'keywords_en' => 'about Bee & Honey, history of honey, organic beekeeping, our heritage',
                'keywords_ar' => 'عن بي اند هوني, تاريخ العسل, تربية النحل العضوية, تراثنا',
                'keywords_es' => 'sobre Bee & Honey, historia de la miel, apicultura orgánica, nuestra herencia',
                'keywords_fr' => 'à propos de Bee & Honey, histoire du miel, apiculture bio, notre héritage',
            ],
            'contact-us' => [
                'title_en' => 'Contact Us | Bee & Honey Support',
                'title_ar' => 'تواصل معنا | دعم بي اند هوني',
                'title_es' => 'Contáctenos | Soporte de Bee & Honey',
                'title_fr' => 'Contactez-nous | Assistance Bee & Honey',
                'description_en' => 'Get in touch with Bee & Honey. We are here to answer your inquiries regarding our natural honey products, partnerships, and support in Jordan and worldwide.',
                'description_ar' => 'تواصل مع بي اند هوني. نحن هنا للإجابة على استفساراتك حول منتجات العسل الطبيعي، الشراكات، والدعم في الأردن وجميع أنحاء العالم.',
                'description_es' => 'Póngase en contacto con Bee & Honey. Estamos aquí para responder a sus consultas sobre nuestros productos de miel natural, asociaciones y soporte técnico en Jordania y en todo el mundo.',
                'description_fr' => 'Contactez Bee & Honey. Nous sommes là pour répondre à vos demandes concernant nos produits à base de miel naturel, partenariats et assistance en Jordanie et à l\'international.',
                'keywords_en' => 'contact Bee & Honey, customer support, honey partnerships',
                'keywords_ar' => 'التواصل مع بي اند هوني, خدمة العملاء, شراكات العسل',
                'keywords_es' => 'contacto Bee & Honey, atención al cliente, asociaciones de miel',
                'keywords_fr' => 'contact Bee & Honey, support client, partenariats miel',
            ],
            'news' => [
                'title_en' => 'Latest News | Bee & Honey',
                'title_ar' => 'آخر الأخبار | بي اند هوني',
                'title_es' => 'Últimas noticias | Bee & Honey',
                'title_fr' => 'Dernières actualités | Bee & Honey',
                'description_en' => 'Stay updated with the latest news, announcements, and events from Bee & Honey regarding our achievements and natural honey products.',
                'description_ar' => 'ابق على اطلاع بآخر الأخبار، الإعلانات، والفعاليات من بي اند هوني حول إنجازاتنا ومنتجات العسل العضوي.',
                'description_es' => 'Manténgase actualizado con las últimas noticias, anuncios y eventos de Bee & Honey con respecto a nuestros logros y productos de miel natural.',
                'description_fr' => 'Restez informé des dernières actualités, annonces et événements de Bee & Honey concernant nos réalisations et nos produits à base de miel naturel.',
                'keywords_en' => 'Bee & Honey news, honey announcements, organic farming news',
                'keywords_ar' => 'أخبار بي اند هوني, إعلانات العسل, أخبار الزراعة العضوية',
                'keywords_es' => 'noticias Bee & Honey, anuncios de miel, noticias de agricultura orgánica',
                'keywords_fr' => 'actualités Bee & Honey, annonces miel, actualités de l\'agriculture bio',
            ],
            'all-news' => [
                'title_en' => 'All News | Bee & Honey',
                'title_ar' => 'كل الأخبار | بي اند هوني',
                'title_es' => 'Todas las noticias | Bee & Honey',
                'title_fr' => 'Toutes les actualités | Bee & Honey',
                'description_en' => 'Read all our news articles regarding our organic honey, expansion, and awards.',
                'description_ar' => 'اقرأ جميع مقالاتنا الإخبارية حول العسل العضوي الخاص بنا، وتوسعنا، والجوائز التي حصدناها.',
                'description_es' => 'Lea todos nuestros artículos de noticias sobre nuestra miel orgánica, expansión y premios.',
                'description_fr' => 'Lisez tous nos articles d\'actualités concernant notre miel bio, notre expansion et nos prix.',
                'keywords_en' => 'news archive, company news, Bee & Honey updates',
                'keywords_ar' => 'أرشيف الأخبار, أخبار الشركة, تحديثات بي اند هوني',
                'keywords_es' => 'archivo de noticias, noticias de la empresa, actualizaciones de Bee & Honey',
                'keywords_fr' => 'archives d\'actualités, actualités de l\'entreprise, mises à jour Bee & Honey',
            ],
            'all-blogs' => [
                'title_en' => 'Blog | Health Benefits of Honey',
                'title_ar' => 'المدونة | الفوائد الصحية للعسل',
                'title_es' => 'Blog | Beneficios de la miel para la salud',
                'title_fr' => 'Blog | Bienfaits du miel pour la santé',
                'description_en' => 'Explore the Bee & Honey blog for tips, health benefits of honey, recipes, and insights into organic beekeeping and a healthy lifestyle.',
                'description_ar' => 'اكتشف مدونة بي اند هوني للحصول على نصائح، الفوائد الصحية للعسل، وصفات، وتلميحات حول تربية النحل العضوية ونمط الحياة الصحي.',
                'description_es' => 'Explore el blog de Bee & Honey para obtener consejos, beneficios para la salud de la miel, recetas e ideas sobre apicultura orgánica y un estilo de vida saludable.',
                'description_fr' => 'Explorez le blog Bee & Honey pour des astuces, les bienfaits du miel pour la santé, des recettes et des aperçus de l\'apiculture bio et d\'un mode de vie sain.',
                'keywords_en' => 'honey benefits, organic lifestyle, honey recipes, healthy living',
                'keywords_ar' => 'فوائد العسل, نمط الحياة العضوي, وصفات العسل, الحياة الصحية',
                'keywords_es' => 'beneficios de la miel, estilo de vida orgánico, recetas con miel, vida saludable',
                'keywords_fr' => 'bienfaits du miel, mode de vie bio, recettes au miel, vie saine',
            ],
            'categories' => [
                'title_en' => 'Product Categories | Natural Honey',
                'title_ar' => 'تصنيفات المنتجات | العسل الطبيعي',
                'title_es' => 'Categorías de productos | Miel natural',
                'title_fr' => 'Catégories de produits | Miel naturel',
                'description_en' => 'Browse our premium categories of 100% natural, raw, and organic honey products. Experience the richness of authentic Jordanian honey.',
                'description_ar' => 'تصفح تشكيلتنا الفاخرة من منتجات العسل العضوي والطبيعي 100%. جرب المذاق الأصيل والفوائد الغنية للعسل الأردني.',
                'description_es' => 'Explore nuestras categorías premium de productos de miel 100% naturales, crudos y orgánicos. Experimente la riqueza de la auténtica miel jordana.',
                'description_fr' => 'Parcourez nos catégories haut de gamme de produits à base de miel 100 % naturel, brut et bio. Découvrez la richesse du miel jordanien authentique.',
                'keywords_en' => 'honey categories, natural bee products, raw honey collection',
                'keywords_ar' => 'تصنيفات العسل, منتجات النحل الطبيعية, مجموعة العسل الخام',
                'keywords_es' => 'categorías de miel, productos de abejas naturales, colección de miel cruda',
                'keywords_fr' => 'catégories de miel, produits naturels des abeilles, collection de miel brut',
            ],
            'products' => [
                'title_en' => 'Our Products | 100% Organic Honey',
                'title_ar' => 'منتجاتنا | عسل عضوي 100%',
                'title_es' => 'Nuestros productos | Miel 100% orgánica',
                'title_fr' => 'Nos produits | Miel 100 % bio',
                'description_en' => 'Discover our collection of 100% natural, raw, and organic honey products from the best farms. Taste the pure goodness of Bee & Honey.',
                'description_ar' => 'اكتشف مجموعتنا من منتجات العسل الطبيعي، الخام، والعضوي 100% من أفضل المزارع. تذوق النقاء الأصيل من بي اند هوني.',
                'description_es' => 'Descubra nuestra colección de productos de miel 100% naturales, crudos y orgánicos de las mejores granjas. Pruebe la bondad pura de Bee & Honey.',
                'description_fr' => 'Découvrez notre collection de produits à base de miel 100 % naturel, brut et bio issus des meilleures fermes. Goûtez à la pureté de Bee & Honey.',
                'keywords_en' => 'organic honey products, raw honey jars, best honey in Jordan',
                'keywords_ar' => 'منتجات العسل العضوي, عبوات العسل الخام, أفضل عسل في الأردن',
                'keywords_es' => 'productos de miel orgánica, tarros de miel cruda, mejor miel en Jordania',
                'keywords_fr' => 'produits au miel bio, pots de miel brut, meilleur miel de Jordanie',
            ]
        ];

        foreach ($seoData as $page => $data) {
            \App\Models\SeoMeta::updateOrCreate(
                ['page' => $page],
                [
                    'title_en' => $data['title_en'],
                    'title_ar' => $data['title_ar'],
                    'title_es' => $data['title_es'],
                    'title_fr' => $data['title_fr'],
                    'description_en' => $data['description_en'],
                    'description_ar' => $data['description_ar'],
                    'description_es' => $data['description_es'],
                    'description_fr' => $data['description_fr'],
                    'keywords_en' => $data['keywords_en'],
                    'keywords_ar' => $data['keywords_ar'],
                    'keywords_es' => $data['keywords_es'],
                    'keywords_fr' => $data['keywords_fr'],
                ]
            );
        }
    }
}
