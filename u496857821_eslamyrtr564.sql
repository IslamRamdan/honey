-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 28, 2026 at 10:40 PM
-- Server version: 11.8.3-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u496857821_eslamyrtr564`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  `name_es` varchar(255) NOT NULL,
  `description_ar` text NOT NULL,
  `description_en` text NOT NULL,
  `description_fr` text NOT NULL,
  `description_es` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `videos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`videos`)),
  `status` enum('new','blog') NOT NULL DEFAULT 'new',
  `seo_title_ar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seo_title_en` varchar(255) DEFAULT NULL,
  `seo_title_fr` varchar(255) DEFAULT NULL,
  `seo_title_es` varchar(255) DEFAULT NULL,
  `seo_description_ar` text DEFAULT NULL,
  `seo_description_en` text DEFAULT NULL,
  `seo_description_fr` text DEFAULT NULL,
  `seo_description_es` text DEFAULT NULL,
  `seo_keywords_ar` varchar(255) DEFAULT NULL,
  `seo_keywords_en` varchar(255) DEFAULT NULL,
  `seo_keywords_fr` varchar(255) DEFAULT NULL,
  `seo_keywords_es` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name_ar`, `name_en`, `name_fr`, `name_es`, `description_ar`, `description_en`, `description_fr`, `description_es`, `image`, `images`, `videos`, `status`, `seo_title_ar`, `created_at`, `updated_at`, `seo_title_en`, `seo_title_fr`, `seo_title_es`, `seo_description_ar`, `seo_description_en`, `seo_description_fr`, `seo_description_es`, `seo_keywords_ar`, `seo_keywords_en`, `seo_keywords_fr`, `seo_keywords_es`) VALUES
(2, 'نحو شراكات استراتيجية في معرض Saudi Food Show', 'Towards Strategic Partnerships at Saudi Food Show', 'Vers des partenariats stratégiques au Saudi Food Show', 'Hacia alianzas estratégicas en el Saudi Food Show', '<p>شاركنا في معرض Saudi Food Show 12 – 14 مايو 2025&nbsp;<br>ضمن أبرز الفعاليات المتخصصة في قطاع الأغذية والمشروبات في المملكة العربية السعودية.<br>مثّلت مشاركتنا فرصة لعرض منتجاتنا، وبناء علاقات استراتيجية، وتعزيز حضور علامتنا في السوق السعودي، وسط تفاعل إيجابي من الزوار والمهتمين بالقطاع</p>', '<p>We participated in the Saudi Food Show, held from 12–14 May 2025,<br>one of the leading specialized exhibitions in the food and beverage sector in the Kingdom of Saudi Arabia.</p><p>Our participation represented a valuable opportunity to showcase our products, build strategic partnerships, and strengthen our brand presence in the Saudi market, supported by strong positive engagement from visitors and industry professionals.</p><p>&nbsp;</p>', '<p>Nous avons participé au Saudi Food Show 2025, qui s’est tenu du 12 au 14 mai 2025,<br>l’un des événements les plus importants et spécialisés dans le secteur de l’alimentation et des boissons en Arabie saoudite.</p><p>Notre participation a représenté une opportunité précieuse pour présenter nos produits, établir des partenariats stratégiques et renforcer la présence de notre marque sur le marché saoudien, soutenue par une interaction positive remarquable de la part des visiteurs et des professionnels du secteur.</p>', '<p>Participamos en el Saudi Food Show 2025, celebrado del 12 al 14 de mayo de 2025,<br>uno de los eventos más destacados y especializados del sector de alimentos y bebidas en el Reino de Arabia Saudita.</p><p>Nuestra participación representó una valiosa oportunidad para presentar nuestros productos, establecer alianzas estratégicas y fortalecer la presencia de nuestra marca en el mercado saudí, con una notable interacción positiva por parte de los visitantes y profesionales del sector.</p>', '1769308238_main.jpg', '[\"1769308238_6975804e1654b.jpg\",\"1769308238_6975804e1aa1f.jpg\",\"1769308238_6975804e1dd25.jpg\",\"1769308238_6975804e2157e.jpg\",\"1769308238_6975804e25253.jpg\"]', '[\"1769308238_6975804e2815c.mp4\"]', 'new', NULL, '2026-01-25 02:30:38', '2026-01-25 03:37:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'حضور عالمي في معرض ANUGA – كولن، ألمانيا', 'Global Presence at ANUGA – Cologne, Germany', 'Une présence mondiale au salon ANUGA – Cologne, Allemagne', 'Presencia global en ANUGA – Colonia, Alemania', '<p>شاركنا في معرض ANUGA 2025 الذي أُقيم خلال الفترة 4–8 أكتوبر 2025 في مدينة كولن – ألمانيا.<br>جاءت مشاركتنا لتعزيز حضور علامتنا عالميًا، واستعراض منتجاتنا، وبناء شراكات استراتيجية مع شركاء من مختلف الأسواق</p>', '<p>We participated in ANUGA 2025, held from October 4–8, 2025, in Cologne, Germany.<br>Our participation aimed to strengthen our global brand presence, showcase our products, and build strategic partnerships with partners from various international markets.</p><p>&nbsp;</p>', '<p>Nous avons participé au salon ANUGA 2025, qui s’est tenu du 4 au 8 octobre 2025 à Cologne, en Allemagne.<br>Notre participation visait à renforcer la présence internationale de notre marque, à présenter nos produits et à établir des partenariats stratégiques avec des partenaires issus de différents marchés.</p>', '<p>Participamos en ANUGA 2025, celebrado del 4 al 8 de octubre de 2025 en la ciudad de Colonia, Alemania.<br>Nuestra participación tuvo como objetivo fortalecer la presencia global de nuestra marca, presentar nuestros productos y establecer alianzas estratégicas con socios de diversos mercados.</p><p>&nbsp;</p>', '1769310052_main.jpg', '[\"1769310052_69758764419a4.jpg\",\"1769310052_6975876447dcd.jpg\",\"1769310052_697587644c8d0.jpg\",\"1769310052_697587645198b.jpg\"]', '[\"1769310052_6975876456778.mp4\"]', 'new', NULL, '2026-01-25 03:00:52', '2026-01-25 03:00:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'تجربة ناجحة وشراكات واعدة في معرض InftExpo الدولي – الأردن', 'A Successful Experience and Promising Partnerships at InftExpo International – Jordan', 'Une expérience réussie et des partenariats prometteurs au salon InftExpo International – Jordanie', 'Una experiencia exitosa y alianzas prometedoras en InftExpo Internacional – Jordania', '<p>سعدنا جدًا بمشاركتنا في معرض Inftexpo International food and technology 12-14/ August 2025 في الاردن. المعرض كان فرصة مميزة نتعرف فيها على أسواق جديدة، ونبني شراكات حقيقية مع وكلاء من أكثر من بلد الخطوة هاي بتزيدنا حماس ونشاط عشان نواصل رحلتنا ونوصل منتجاتنا لعدد أكبر من الناس.</p>', '<p>We were delighted to participate in InftExpo International Food and Technology Exhibition, held from August 12–14, 2025, in Jordan.</p><p>The exhibition provided a valuable opportunity to explore new markets and build genuine partnerships with agents from multiple countries. This step has further fueled our enthusiasm and motivation to continue our journey and deliver our products to a wider audience.</p><p>&nbsp;</p>', '<p>Nous avons été ravis de participer au salon international InftExpo de l’alimentation et de la technologie, qui s’est tenu du 12 au 14 août 2025 en Jordanie.</p><p>Le salon a représenté une opportunité précieuse pour découvrir de nouveaux marchés et établir de véritables partenariats avec des agents de plusieurs pays. Cette étape renforce notre enthousiasme et notre motivation pour poursuivre notre parcours et faire parvenir nos produits à un public toujours plus large.</p><p>&nbsp;</p>', '<p>Nos complació participar en la Exposición Internacional InftExpo de Alimentos y Tecnología, celebrada del 12 al 14 de agosto de 2025 en Jordania.</p><p>La exposición representó una valiosa oportunidad para conocer nuevos mercados y establecer alianzas reales con agentes de varios países. Este paso refuerza nuestro entusiasmo y motivación para continuar nuestro camino y llevar nuestros productos a un público más amplio.</p>', '1769311015_main.jpg', '[\"1769311015_69758b27373da.jpg\",\"1769311015_69758b2737b56.jpg\",\"1769311015_69758b273820e.jpg\",\"1769311015_69758b27388f5.jpg\",\"1769311015_69758b2738e89.jpg\",\"1769311015_69758b273befb.jpg\",\"1769311015_69758b273f881.jpg\"]', '[\"1769311015_69758b2742958.mp4\"]', 'new', NULL, '2026-01-25 03:16:55', '2026-01-25 03:16:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'حضور متميز في معرض التمور والعسل – سلطنة عُمان', 'Distinguished Presence at the Dates and Honey Exhibition – Sultanate of Oman', 'Une présence distinguée au Salon des Dattes et du Miel – Sultanat d’Oman', 'Una presencia destacada en la Exposición de Dátiles y Miel – Sultanato de Omán', '<p>شاركنا في معرض التمور والعسل في سلطنة عُمان ضمن الفعاليات المتخصصة بالمنتجات الغذائية الطبيعية. أتاحت لنا المشاركة فرصة إبراز جودة منتجاتنا، والتواصل المباشر مع السوق العُماني، وتعزيز علاقاتنا التجارية مع المهتمين بالقطاع.</p>', '<p>We participated in the Dates and Honey Exhibition in the Sultanate of Oman, as part of the specialized events focused on natural food products.<br>Our participation provided a valuable opportunity to highlight the quality of our products, engage directly with the Omani market, and strengthen our business relationships with industry stakeholders.</p>', '<p>Nous avons participé au Salon des Dattes et du Miel au Sultanat d’Oman, dans le cadre des événements spécialisés dédiés aux produits alimentaires naturels.<br>Notre participation nous a permis de mettre en valeur la qualité de nos produits, d’établir un contact direct avec le marché omanais et de renforcer nos relations commerciales avec les acteurs du secteur.</p>', '<p>Participamos en la Exposición de Dátiles y Miel en el Sultanato de Omán, como parte de los eventos especializados en productos alimentarios naturales.<br>Nuestra participación nos brindó una valiosa oportunidad para destacar la calidad de nuestros productos, interactuar directamente con el mercado omaní y fortalecer nuestras relaciones comerciales con los profesionales del sector.</p>', '1769312012_main.jpg', '[\"1769312012_69758f0c4f59f.jpg\",\"1769312012_69758f0c502fb.jpg\",\"1769312012_69758f0c5124c.jpg\",\"1769312012_69758f0c52466.jpg\"]', '[\"1769312012_69758f0c528ce.mp4\"]', 'new', NULL, '2026-01-25 03:33:32', '2026-01-25 03:33:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'إقبال واسع وثقة متزايدة في معرض Food Africa – مصر', 'Strong Turnout and Growing Trust at Food Africa – Egypt', 'Une forte affluence et une confiance croissante au salon Food Africa – Égypte', 'Gran afluencia y creciente confianza en Food Africa – Egipto', '<p>نعتز ونفخر بالإقبال الكبير الذي شهدته مشاركتنا في معرض Food Africa 🇪🇬<br>وقد عكست هذه المشاركة ثقة السوق بمنتجاتنا وجودتها، وكانت خطوة ناجحة ضمن مسيرتنا التوسعية</p><p>منتجات BEE AND HONEY &nbsp;تبقى هي الخيار الأمثل والأفضل</p>', '<p>We take pride in the remarkable turnout and strong engagement witnessed during our participation in Food Africa 🇪🇬.<br>This participation reflected the market’s confidence in our products and their quality, and marked a successful step within our expansion journey.</p><p>BEE AND HONEY products remain the optimal and preferred choice.</p><h2>&nbsp;</h2>', '<p>Nous sommes fiers de l’importante affluence et de l’interaction positive observées lors de notre participation au salon Food Africa 🇪🇬.<br>Cette participation a reflété la confiance du marché dans nos produits et leur qualité, et a constitué une étape réussie dans notre stratégie d’expansion.</p><p>Les produits BEE AND HONEY demeurent le choix idéal et privilégié.</p>', '<p>Nos enorgullece la gran acogida y la destacada participación que tuvimos en Food Africa 🇪🇬.<br>Esta participación reflejó la confianza del mercado en nuestros productos y su calidad, y representó un paso exitoso dentro de nuestro proceso de expansión.</p><p>Los productos BEE AND HONEY siguen siendo la opción ideal y preferida.</p>', '1771400856_main.jpg', '[\"1769332238_6975de0ece7c0.jpg\",\"1769332238_6975de0eceb79.jpg\",\"1769332238_6975de0ecee45.jpg\"]', '[\"1769332238_6975de0ecf3cc.mp4\"]', 'new', NULL, '2026-01-25 09:10:38', '2026-02-18 07:47:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'بي اند هني تشارك بمعرض جلف فود دبي 2026', 'Bee & Honey Participates in Gulfood Dubai 2026', 'Bee & Honey participe au salon Gulfood Dubai 2026', 'Bee & Honey participa en Gulfood Dubai 2026', '<p><strong>بي اند هني فعاليات معرض جلفود دبي 2026، أحد أكبر وأبرز المعارض العالمية المتخصصة في قطاع الأغذية والمشروبات، والذي أُقيم خلال الفترة من 26 إلى 30 يناير في دبي – دولة الإمارات العربية المتحدة.</strong></p><p><strong>وتأتي هذه المشاركة ضمن استراتيجيتنا الرامية إلى توسيع حضورنا في الأسواق الإقليمية والعالمية، وتعزيز شبكة علاقاتنا مع الشركاء والموزعين، إلى جانب استكشاف أحدث الابتكارات والاتجاهات في صناعة الأغذية.</strong></p><p><strong>وقد شكّل المعرض منصة متميزة لاستعراض منتجاتنا أمام نخبة من المتخصصين وصناع القرار والزوار من مختلف دول العالم، ما أتاح لنا فرصًا واعدة للتعاون وبناء شراكات جديدة تدعم مسيرتنا نحو مزيد من النمو والتوسع.</strong></p>', '<p><strong>Bee &amp; Honey took part in Gulfood Dubai 2026, one of the world’s largest and most prominent trade exhibitions specialized in the food and beverage sector, held from January 26 to 30 in Dubai, United Arab Emirates.</strong></p><p><strong>This participation aligns with our strategy to expand our presence in regional and international markets, strengthen our network of partners and distributors, and explore the latest innovations and trends in the food industry.</strong></p><p><strong>The exhibition provided an outstanding platform to showcase our products to industry professionals, decision-makers, and visitors from around the world, creating promising opportunities for collaboration and the development of new partnerships that support our continued growth and expansion.</strong></p>', '<p><strong>Bee &amp; Honey a participé au salon Gulfood Dubai 2026, l’un des plus grands et des plus prestigieux salons professionnels au monde spécialisés dans le secteur de l’alimentation et des boissons, qui s’est tenu du 26 au 30 janvier à Dubaï, aux Émirats arabes unis.</strong></p><p><strong>Cette participation s’inscrit dans le cadre de notre stratégie visant à renforcer notre présence sur les marchés régionaux et internationaux, à développer notre réseau de partenaires et de distributeurs, ainsi qu’à découvrir les dernières innovations et tendances de l’industrie agroalimentaire.</strong></p><p><strong>Le salon a constitué une plateforme exceptionnelle pour présenter nos produits à des professionnels du secteur, des décideurs et des visiteurs venus du monde entier, offrant ainsi des opportunités prometteuses de collaboration et de développement de nouveaux partenariats soutenant notre croissance et notre expansion continues.</strong></p>', '<p><strong>Bee &amp; Honey participó en Gulfood Dubai 2026, una de las ferias comerciales más grandes y destacadas del mundo especializadas en el sector de alimentos y bebidas, celebrada del 26 al 30 de enero en Dubái, Emiratos Árabes Unidos.</strong></p><p><strong>Esta participación se enmarca dentro de nuestra estrategia para ampliar nuestra presencia en los mercados regionales e internacionales, fortalecer nuestra red de socios y distribuidores, y explorar las últimas innovaciones y tendencias de la industria alimentaria.</strong></p><p><strong>La feria representó una excelente plataforma para presentar nuestros productos a profesionales del sector, responsables de la toma de decisiones y visitantes de todo el mundo, generando oportunidades prometedoras de colaboración y el desarrollo de nuevas alianzas que respaldan nuestro crecimiento y expansión continuos.</strong></p>', '1771150237_main.jpg', '[\"1771150237_69919b9dbb704.png\",\"1771150237_69919b9dbc6b6.png\"]', '[\"1771224655_6992be4f27f2f.mp4\"]', 'new', NULL, '2026-02-15 10:10:37', '2026-02-16 06:50:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'بي أند هني في لقاء مجلس الأعمال الأردني الأمريكي بحضور السفارة الأمريكية', 'Bee & Honey Participates in the Jordan–U.S. Business Council Meeting in the Presence of the U.S. Embassy', 'Bee & Honey participe à la rencontre du Conseil d’affaires jordano-américain en présence de l’Ambassade des États-Uni', 'Bee & Honey participa en el encuentro del Consejo Empresarial Jordano-Estadounidense en presencia de la Embajada de los Estados Unidos', '<p><strong>عمّان – 11 شباط 2026</strong></p><p><strong>شاركت شركة بي أند هني في اللقاء الذي نظمه مجلس الأعمال الأردني الأمريكي في فندق جراند حياة – عمّان، وذلك بحضور ممثلين عن السفارة الأمريكية في المملكة الأردنية الهاشمية ونخبة من رجال الأعمال وممثلي القطاعات الاقتصادية المختلفة.</strong></p><p><strong>وجاءت مشاركة الشركة تلبيةً للدعوة الرسمية من مجلس الأعمال الأردني الأمريكي، في إطار الجهود الرامية إلى تعزيز التعاون الاقتصادي والتجاري والتعليمي والثقافي بين المملكة الأردنية الهاشمية والولايات المتحدة الأمريكية.</strong></p><p><strong>وشكّل اللقاء منصة مهمة لبحث فرص الشراكة وتوسيع آفاق التعاون الثنائي، إضافة إلى تبادل الخبرات واستعراض سبل تطوير العلاقات بين مؤسسات القطاع الخاص في كلا البلدين، بما يسهم في دعم التنمية المستدامة وخلق فرص استثمارية واعدة.</strong></p><p><strong>ومثّل شركة بي أند هني في هذا اللقاء المدير التنفيذي السيد ماجد الهروجي، ومدير العمليات السيد أحمد بني هاني، حيث أكدا أهمية تعزيز جسور التعاون مع الشركاء في الولايات المتحدة الأمريكية، وبحث فرص التعاون المشترك بما يخدم تطلعات الشركة ويسهم في دعم العلاقات الاقتصادية الثنائية بين البلدين.</strong></p><p><strong>وتؤكد شركة بي أند هني حرصها الدائم على الانخراط في الفعاليات التي تعزز التواصل الدولي، وترسخ مكانتها كشريك فاعل في دعم العلاقات الاقتصادية والتجارية بين الأردن والولايات المتحدة الأمريكية.</strong></p><p>&nbsp;</p>', '<p><strong>Amman – February 11, 2026</strong></p><p><strong>Bee &amp; Honey participated in the meeting organized by the Jordan–U.S. Business Council at the Grand Hyatt Amman, in the presence of representatives from the United States Embassy in the Hashemite Kingdom of Jordan, along with a distinguished group of business leaders and representatives from various economic sectors.</strong></p><p><strong>The company’s participation came in response to an official invitation from the Jordan–U.S. Business Council, as part of ongoing efforts to strengthen economic, trade, educational, and cultural cooperation between the Hashemite Kingdom of Jordan and the United States of America.</strong></p><p><strong>The meeting served as an important platform to explore partnership opportunities and expand prospects for bilateral cooperation, in addition to exchanging expertise and discussing ways to further develop relations between private sector institutions in both countries. Such efforts contribute to supporting sustainable development and creating promising investment opportunities.</strong></p><p><strong>Representing B &amp; Honey at the meeting were Chief Executive Officer Mr. Majed Al-Harouji and Operations Manager Mr. Ahmad Bani Hani, who emphasized the importance of strengthening bridges of cooperation with partners in the United States and exploring joint collaboration opportunities that align with the company’s aspirations and support the advancement of bilateral economic relations between the two countries.</strong></p><p><strong>Bee &amp; Honey reaffirms its ongoing commitment to engaging in initiatives that enhance international connectivity and further solidify its position as an active partner in supporting economic and trade relations between Jordan and the United States.</strong></p>', '<p><strong>Amman – 11 février 2026</strong><br><br><strong>Bee &amp; Honey a participé à la rencontre organisée par le Conseil d’affaires jordano-américain à l’hôtel Grand Hyatt – Amman, en présence de représentants de l’Ambassade des États-Unis dans le Royaume hachémite de Jordanie, ainsi que d’un groupe distingué d’hommes d’affaires et de représentants de divers secteurs économiques.</strong></p><p><strong>La participation de l’entreprise s’est inscrite dans le cadre d’une invitation officielle du Conseil d’affaires jordano-américain, visant à renforcer la coopération économique, commerciale, éducative et culturelle entre le Royaume hachémite de Jordanie et les États-Unis d’Amérique.</strong></p><p><strong>La rencontre a constitué une plateforme importante pour examiner les opportunités de partenariat et élargir les perspectives de coopération bilatérale, ainsi que pour échanger des expertises et explorer les moyens de développer les relations entre les institutions du secteur privé dans les deux pays. Ces efforts contribuent au soutien du développement durable et à la création d’opportunités d’investissement prometteuses.</strong></p><p><strong>Bee &amp; Honey était représentée lors de cette rencontre par son Directeur Général, M. Majed Al-Harouji, et son Directeur des Opérations, M. Ahmad Bani Hani, qui ont souligné l’importance de renforcer les ponts de coopération avec les partenaires aux États-Unis et d’explorer des opportunités de collaboration conjointe conformes aux ambitions de l’entreprise, tout en soutenant le développement des relations économiques bilatérales entre les deux pays.</strong></p><p><strong>B &amp; Honey réaffirme son engagement constant à participer aux initiatives qui favorisent le dialogue international et à consolider sa position en tant que partenaire actif dans le soutien aux relations économiques et commerciales entre la Jordanie et les États-Unis.</strong></p>', '<p><strong>Amán – 11 de febrero de 2026</strong></p><p><strong>Bee &amp; Honey participó en el encuentro organizado por el Consejo Empresarial Jordano-Estadounidense en el hotel Grand Hyatt – Amán, con la presencia de representantes de la Embajada de los Estados Unidos en el Reino Hachemita de Jordania, así como de un distinguido grupo de empresarios y representantes de diversos sectores económicos.</strong></p><p><strong>La participación de la empresa se realizó en respuesta a una invitación oficial del Consejo Empresarial Jordano-Estadounidense, en el marco de los esfuerzos orientados a fortalecer la cooperación económica, comercial, educativa y cultural entre el Reino Hachemita de Jordania y los Estados Unidos de América.</strong></p><p><strong>El encuentro constituyó una plataforma importante para analizar oportunidades de asociación y ampliar las perspectivas de cooperación bilateral, además de intercambiar experiencias y explorar mecanismos para desarrollar las relaciones entre las instituciones del sector privado en ambos países, contribuyendo así al apoyo del desarrollo sostenible y a la creación de prometedoras oportunidades de inversión.</strong></p><p><strong>Bee &amp; Honey estuvo representada en este encuentro por su Director Ejecutivo, el Sr. Majed Al-Harouji, y su Director de Operaciones, el Sr. Ahmad Bani Hani, quienes destacaron la importancia de fortalecer los lazos de cooperación con socios en los Estados Unidos y de explorar oportunidades de colaboración conjunta que respalden las aspiraciones de la empresa y contribuyan al fortalecimiento de las relaciones económicas bilaterales entre ambos países.</strong></p><p><strong>Bee &amp; Honey reafirma su compromiso permanente de participar en iniciativas que fomenten la comunicación internacional y consoliden su posición como socio activo en el apoyo a las relaciones económicas y comerciales entre Jordania y los Estados Unidos.</strong></p>', '1771405455_main.jpg', '[\"1771405455_6995808f75703.png\"]', NULL, 'new', NULL, '2026-02-17 13:32:46', '2026-02-18 09:04:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  `name_es` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_ar`, `name_en`, `name_fr`, `name_es`, `image`, `created_at`, `updated_at`) VALUES
(2, 'قسم العسل', 'Honey Section', 'Section Miel', 'Sección de Miel', '1769260490.png', '2026-01-24 08:41:42', '2026-02-17 01:22:45'),
(3, 'قسم منتجات بالعسل', 'Honey Products Section', 'Section des Produits au Miel', 'Sección de Productos de Miel', '1769262843.png', '2026-01-24 08:48:18', '2026-01-24 13:54:03'),
(4, 'قسم المشروبات', 'Beverages Section', 'Section Boissons', 'Sección de Bebidas', '1769258957.png', '2026-01-24 12:49:17', '2026-01-24 12:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_26_134132_create_blogs_table', 1),
(5, '2025_12_26_135801_create_categories_table', 1),
(6, '2025_12_29_213515_create_products_table', 1),
(7, '2026_01_14_140322_create_seo_settings_table', 2),
(8, '2026_02_03_223004_create_seo_meta_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_fr` varchar(255) NOT NULL,
  `title_es` varchar(255) NOT NULL,
  `description_ar` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_fr` text DEFAULT NULL,
  `description_es` text DEFAULT NULL,
  `images` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sizes_ar` text DEFAULT NULL,
  `sizes_en` text DEFAULT NULL,
  `sizes_fr` text DEFAULT NULL,
  `sizes_es` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `title_ar`, `title_en`, `title_fr`, `title_es`, `description_ar`, `description_en`, `description_fr`, `description_es`, `images`, `created_at`, `updated_at`, `sizes_ar`, `sizes_en`, `sizes_fr`, `sizes_es`) VALUES
(4, 2, 'عسل السدر', 'Sidr Honey', 'Miel de Sidr', 'Miel de Sidr', 'عسل السدر هو عسل فاخر يتم استخراجه من رحيق شجرة السدر المشهورة بنكهتها الغنية وخصائصها العلاجية. يُقدَّر هذا العسل الذهبي منذ قرون، ويُعتبر علاجًا طبيعيًا ووجبة فاخرة تجمع بين النكهة والفائدة.\r\n\r\nالميزات\r\n	•	يعزز التئام الجروح وشفاء الحروق: يتميز بخصائصه المضادة للبكتيريا والجراثيم، مما يجعله مطهرًا طبيعيًا يساعد في تقليل خطر العدوى. يمكن تطبيقه مباشرة على الجروح والحروق الصغيرة لتسريع عملية الشفاء وتخفيف الألم.\r\n	•	يعزز الطاقة: مصدر طبيعي للطاقة المستدامة والحيوية، يدعم نشاط الجسم طوال اليوم.\r\n	•	يحسن صحة الجهاز الهضمي: يهدئ المعدة ويساهم في دعم جهاز هضمي صحي ومتوازن.', 'Sidr honey is a premium honey extracted from the nectar of the Sidr tree, renowned for its rich flavor and therapeutic properties. This golden honey has been valued for centuries and is considered a natural remedy and a luxurious delicacy that combines taste and health benefits.\r\n\r\nFeatures\r\n\r\nPromotes wound healing and burn recovery:\r\nIt possesses powerful antibacterial and antimicrobial properties, making it a natural antiseptic that helps reduce the risk of infection. It can be applied directly to wounds and minor burns to accelerate healing and relieve pain.\r\n\r\nBoosts energy:\r\nA natural source of sustained energy and vitality, supporting physical activity throughout the day.\r\n\r\nImproves digestive health:\r\nSoothes the stomach and contributes to maintaining a healthy and balanced digestive system.', 'Le miel de Sidr est un miel haut de gamme extrait du nectar de l’arbre Sidr, réputé pour sa saveur riche et ses propriétés thérapeutiques. Ce miel doré est apprécié depuis des siècles et est considéré comme un remède naturel et un produit de luxe alliant goût et bienfaits pour la santé.\r\n\r\nCaractéristiques\r\n\r\nFavorise la cicatrisation des plaies et la guérison des brûlures :\r\nIl possède de puissantes propriétés antibactériennes et antimicrobiennes, ce qui en fait un antiseptique naturel aidant à réduire le risque d’infection. Il peut être appliqué directement sur les plaies et les brûlures légères afin d’accélérer la guérison et d’atténuer la douleur.\r\n\r\nStimule l’énergie :\r\nUne source naturelle d’énergie durable et de vitalité, soutenant l’activité du corps tout au long de la journée.\r\n\r\nAméliore la santé digestive :\r\nApaise l’estomac et contribue au bon fonctionnement du système digestif.', 'La miel de Sidr es una miel premium extraída del néctar del árbol de Sidr, reconocida por su sabor intenso y sus propiedades terapéuticas. Esta miel dorada ha sido apreciada durante siglos y se considera un remedio natural y un manjar de lujo que combina sabor y beneficios para la salud.\r\n\r\nCaracterísticas\r\n\r\nFavorece la cicatrización de heridas y la recuperación de quemaduras:\r\nPosee potentes propiedades antibacterianas y antimicrobianas, lo que la convierte en un antiséptico natural que ayuda a reducir el riesgo de infecciones. Puede aplicarse directamente sobre heridas y quemaduras leves para acelerar la curación y aliviar el dolor.\r\n\r\nAumenta la energía:\r\nFuente natural de energía sostenida y vitalidad, favorece la actividad física durante todo el día.\r\n\r\nMejora la salud digestiva:\r\nCalma el estómago y contribuye a mantener un sistema digestivo sano y equilibrado.', '[\"products\\/f5mIEn5DpRYWFuwRNMuj8wTk8f87xbjPU1zKnRVV.jpg\",\"products\\/8nlYuntzpyjVLftiaK8t5y9ytefO6BOTYlifFiWV.jpg\",\"products\\/d6aLCflXU91kViGwMo2QF0PLGai2obk3pr0TkST1.jpg\"]', '2026-01-25 04:27:09', '2026-01-25 04:27:09', NULL, NULL, NULL, NULL),
(5, 2, 'عسل السَّمْرَة', 'Samra Honey', 'Miel de Samra', 'Miel de Samra', 'عسل السَّمرة يُحصد من رحيق شجرة السَّمرة المشهورة بنكهتها الغنية وفوائدها الصحية العديدة. مصدره الطبيعي من المناطق الجافة، يقدّم هذا العسل طعمًا فريدًا ووفرة من الخصائص الصحية.\r\n\r\nالميزات\r\n• يعزز المناعة: غني بمضادات الأكسدة لدعم جهاز مناعي صحي.\r\n• يخفف السعال ويهدئ التهاب الحلق: يوفر راحة طبيعية من مشاكل الجهاز التنفسي.\r\n• يحسن عملية الهضم: يساعد في الحفاظ على صحة الجهاز الهضمي بفضل الإنزيمات الطبيعية.', 'Samra honey is harvested from the nectar of the Samra tree, renowned for its rich flavor and numerous health benefits. Sourced naturally from arid regions, this honey offers a unique taste and a wealth of wellness properties.\r\n\r\nFeatures\r\n\r\nBoosts immunity:\r\nRich in antioxidants that support a healthy immune system.\r\n\r\nRelieves cough and soothes sore throat:\r\nProvides natural relief for respiratory discomfort.\r\n\r\nImproves digestion:\r\nHelps maintain digestive health thanks to its natural enzymes.', 'Le miel de Samra est récolté à partir du nectar de l’arbre Samra, réputé pour sa saveur riche et ses nombreux bienfaits pour la santé. D’origine naturelle provenant de régions arides, ce miel offre un goût unique et une grande richesse en propriétés bénéfiques.\r\n\r\nCaractéristiques\r\n\r\nRenforce l’immunité :\r\nRiche en antioxydants pour soutenir un système immunitaire sain.\r\n\r\nSoulage la toux et apaise les maux de gorge :\r\nApporte un soulagement naturel des troubles respiratoires.\r\n\r\nAméliore la digestion :\r\nAide à maintenir une bonne santé digestive grâce à ses enzymes naturelles.', 'La miel de Samra se obtiene del néctar del árbol de Samra, conocido por su sabor intenso y sus numerosos beneficios para la salud. De origen natural en regiones áridas, esta miel ofrece un sabor único y una abundancia de propiedades saludables.\r\n\r\nCaracterísticas\r\n\r\nRefuerza la inmunidad:\r\nRica en antioxidantes que apoyan un sistema inmunológico saludable.\r\n\r\nAlivia la tos y calma el dolor de garganta:\r\nProporciona un alivio natural para las molestias respiratorias.\r\n\r\nMejora la digestión:\r\nAyuda a mantener la salud digestiva gracias a sus enzimas naturales.', '[\"products\\/RCZgIrVZYHQKGT3fATUjlUCybeM1zVFT9CXG4GL0.jpg\",\"products\\/hrGmwqF46L0WQnd803eMviTAhM7rzmFrTHHRVm1P.jpg\",\"products\\/XgXeIUzTFgPNVMm97aXEjDfDEq8BHeZKL0BJUNUW.jpg\"]', '2026-01-25 04:45:25', '2026-01-25 05:19:24', '\"550 \\u063a , 300 \\u063a ,160 \\u063a\"', '\"550 g, 300 g, 160 g\"', '\"550 g, 300 g, 160 g\"', '\"550 g, 300 g, 160 g\"'),
(6, 2, 'عسل الزهور', 'Flower Honey', 'Miel de Fleurs', 'Miel de Flores', 'عسل الزهور يُصنع من رحيق الأزهار المتنوعة، مما يمنحه طعمًا غنيًا ومتعدد الأزهار. مصدره الطبيعي ومليء بالمغذيات، مما يجعله مثاليًا للاستخدام اليومي، سواء كمُحلّي أو كمقوٍ للصحة.\r\n\r\nالميزات\r\n• يعزز المناعة: غني بمضادات الأكسدة للمساعدة في تقوية جهاز المناعة.\r\n• يدعم صحة الجهاز الهضمي: يساعد في تهدئة المعدة وتعزيز توازن الأمعاء.\r\n• مصدر طبيعي للطاقة: يوفر طاقة سريعة ومستدامة مع كل ملعقة.', 'Flower honey is made from the nectar of various flowers, giving it a rich and multi-floral flavor. Naturally sourced and rich in nutrients, it is ideal for daily use, whether as a natural sweetener or a health booster.\r\n\r\nFeatures\r\n• Boosts immunity: Rich in antioxidants that help strengthen the immune system.\r\n• Supports digestive health: Helps soothe the stomach and promote intestinal balance.\r\n• Natural source of energy: Provides quick and sustained energy with every spoon.', 'Le miel de fleurs est produit à partir du nectar de diverses fleurs, ce qui lui confère une saveur riche et florale. D’origine naturelle et riche en nutriments, il est idéal pour une utilisation quotidienne, que ce soit comme édulcorant naturel ou comme tonique pour la santé.\r\n\r\nCaractéristiques\r\n• Renforce l’immunité : Riche en antioxydants pour aider à renforcer le système immunitaire.\r\n• Soutient la santé digestive : Aide à apaiser l’estomac et à favoriser l’équilibre intestinal.\r\n• Source naturelle d’énergie : Fournit une énergie rapide et durable à chaque cuillerée.', 'La miel de flores se elabora a partir del néctar de diversas flores, lo que le otorga un sabor rico y multifloral. De origen natural y rica en nutrientes, es ideal para el uso diario, ya sea como edulcorante natural o como refuerzo para la salud.\r\n\r\nCaracterísticas\r\n• Refuerza la inmunidad: Rica en antioxidantes que ayudan a fortalecer el sistema inmunológico.\r\n• Apoya la salud digestiva: Ayuda a calmar el estómago y favorece el equilibrio intestinal.\r\n• Fuente natural de energía: Proporciona energía rápida y sostenida con cada cucharada.', '[\"products\\/9oCCtJw98OJuvyokkxEGWYlA4ZCmTy5taiDld54j.jpg\",\"products\\/w96nRuDcs5uNtn3feBcxdCVX47iktaNqVkMUQ8Wm.jpg\",\"products\\/2uklffw3ORY0aTbkt5MGJxE77vBZ6cD1n6UWOesR.jpg\"]', '2026-01-25 04:51:50', '2026-01-25 05:32:07', '\"550 \\u063a , 300 \\u063a ,160 \\u063a\"', '\"550 g, 300 g, 160 g\"', '\"550 g, 300 g, 160 g\"', '\"550 g, 300 g, 160 g\"'),
(7, 2, 'العسل الجبلي', 'Mountain Honey', 'Miel de Montagne', 'Miel de Montaña', 'هو عسل طبيعي يُنتج من رحيق الأزهار البرية التي تنمو في المناطق الجبلية، حيث التنوع النباتي والبيئة النقية. يتميز بنكهته القوية وقيمته الغذائية العالية، ويُعد من أجود أنواع العسل لاختلاف مصادر رحيقه واحتوائه على عناصر طبيعية مفيدة للصحة العامة.\r\n\r\nالميزات\r\n\r\nغني بمضادات الأكسدة: يحتوي على مركبات طبيعية ناتجة عن تنوع الأزهار الجبلية، تساعد في دعم صحة الجسم العامة.\r\n\r\n• يدعم المناعة بشكل طبيعي: التنوع النباتي في المناطق الجبلية يمنح العسل\r\n\r\n• ⁠ ⁠عناصر تساعد على تعزيز مقاومة الجسم.\r\n\r\n• نقي وعالي الجودة: يُنتج من بيئات جبلية بعيدة عن التلوث، مما يمنحه نقاءً وقيمة غذائية أعلى.', 'Mountain honey is a natural honey produced from the nectar of wild flowers that grow in mountainous regions, where botanical diversity and a pure environment prevail. It is characterized by its strong flavor and high nutritional value and is considered one of the finest types of honey due to the diversity of its nectar sources and its richness in natural elements beneficial to overall health.\r\n\r\nFeatures\r\n\r\n• Rich in antioxidants: Contains natural compounds derived from the diversity of mountain flowers, helping support overall body health.\r\n\r\n• Naturally supports immunity: The botanical diversity of mountainous areas provides honey with elements that help strengthen the body\'s resistance.\r\n\r\n• Pure and high quality: Produced in mountain environments far from pollution, giving it exceptional purity and higher nutritional value.', 'Le miel de montagne est un miel naturel produit à partir du nectar des fleurs sauvages qui poussent dans les régions montagneuses, où règnent la diversité végétale et un environnement pur. Il se distingue par sa saveur intense et sa haute valeur nutritionnelle, et est considéré comme l’un des meilleurs types de miel grâce à la diversité de ses sources de nectar et à sa richesse en éléments naturels bénéfiques pour la santé globale.\r\n\r\nCaractéristiques\r\n\r\n• Riche en antioxydants : Contient des composés naturels issus de la diversité florale des montagnes, contribuant à soutenir la santé générale du corps.\r\n\r\n• Soutient naturellement l’immunité : La diversité végétale des régions montagneuses confère au miel des éléments qui aident à renforcer la résistance de l’organisme.\r\n\r\n• Pur et de haute qualité : Produit dans des environnements montagneux éloignés de la pollution, lui conférant une grande pureté et une valeur nutritionnelle supérieure.', 'La miel de montaña es una miel natural producida a partir del néctar de flores silvestres que crecen en regiones montañosas, donde prevalecen la diversidad vegetal y un entorno puro. Se caracteriza por su sabor intenso y su alto valor nutricional, y se considera uno de los mejores tipos de miel debido a la diversidad de sus fuentes de néctar y a su riqueza en elementos naturales beneficiosos para la salud general.\r\n\r\nCaracterísticas\r\n\r\n• Rica en antioxidantes: Contiene compuestos naturales derivados de la diversidad floral de las montañas, que ayudan a apoyar la salud general del cuerpo.\r\n\r\n• Apoya la inmunidad de forma natural: La diversidad vegetal de las zonas montañosas aporta a la miel elementos que ayudan a fortalecer la resistencia del organismo.\r\n\r\n• Pura y de alta calidad: Producida en entornos montañosos alejados de la contaminación, lo que le otorga una gran pureza y un mayor valor nutricional.', '[\"products\\/Ltg9NRc8tadcSCGZGvWHIa0Z5j0ESzQJVp1o5VPP.jpg\",\"products\\/wnrLjw4Y4TyzQMYAfBhN0k9k6fazlgGygLgyz062.jpg\",\"products\\/ncDkb1JC7m9ILf2o89lhuyoEHksL36HV3cGHIsnE.jpg\"]', '2026-01-25 05:28:58', '2026-01-25 05:28:58', NULL, NULL, NULL, NULL),
(8, 2, 'عسل الحمضيات', 'Citrus Honey', 'Miel d’Agrumes', 'Miel de Cítricos', 'عسل الحمضيات يُصنع من رحيق أزهار الحمضيات، مما يمنحه نكهة خفيفة وحامضية ولونًا ذهبيًا. مليء بالفوائد الطبيعية، يُعد مثاليًا لتحسين مشروباتك وحلوياتك، أو كمُحلٍّ منعش.\r\n\r\nالميزات\r\n• يعزز شفاء الجروح: عُرف بخصائصه المضادة للبكتيريا التي تساعد في شفاء الجلد والجروح.\r\n• يعزز الطاقة: مصدر طبيعي للطاقة المستدامة والحيوية.\r\n• يحسن صحة الجهاز الهضمي: يهدئ المعدة ويدعم جهازًا هضميًا صحيًا.', 'Citrus honey is produced from the nectar of citrus blossoms, giving it a light, slightly tangy flavor and a golden color. Rich in natural benefits, it is ideal for enhancing your beverages and desserts or as a refreshing natural sweetener.\r\n\r\nFeatures\r\n• Promotes wound healing: Known for its antibacterial properties that help heal the skin and wounds.\r\n• Boosts energy: A natural source of sustained energy and vitality.\r\n• Improves digestive health: Soothes the stomach and supports a healthy digestive system.', 'Le miel d’agrumes est produit à partir du nectar des fleurs d’agrumes, ce qui lui confère une saveur légère et légèrement acidulée ainsi qu’une couleur dorée. Riche en bienfaits naturels, il est idéal pour améliorer vos boissons et desserts ou comme édulcorant rafraîchissant.\r\n\r\nCaractéristiques\r\n• Favorise la cicatrisation des plaies : Connu pour ses propriétés antibactériennes qui aident à soigner la peau et les blessures.\r\n• Stimule l’énergie : Source naturelle d’énergie durable et de vitalité.\r\n• Améliore la santé digestive : Apaise l’estomac et soutient un système digestif sain.', 'La miel de cítricos se elabora a partir del néctar de las flores de cítricos, lo que le otorga un sabor ligero y ligeramente ácido, además de un color dorado. Rica en beneficios naturales, es ideal para realzar bebidas y postres, o como edulcorante refrescante.\r\n\r\nCaracterísticas\r\n• Favorece la cicatrización de heridas: Conocida por sus propiedades antibacterianas que ayudan a curar la piel y las heridas.\r\n• Aumenta la energía: Fuente natural de energía sostenida y vitalidad.\r\n• Mejora la salud digestiva: Calma el estómago y favorece un sistema digestivo saludable.', '[\"products\\/rSQ5gEnsfNXg3Fp8Df81sJcrq4BgVo5xORZ5d1Xs.jpg\",\"products\\/sZggfaHegBD8660uL4imkvDqY7MJ57FQMJHDtO8z.jpg\",\"products\\/XgDe5UcCaorSg0HqAyRsW0ljg9TklPn7oI7IEZBY.jpg\"]', '2026-01-25 05:42:42', '2026-01-25 05:44:22', '\"550 \\u063a , 300 \\u063a ,160 \\u063a\"', '\"550 g, 300 g, 160 g\"', '\"550 g, 300 g, 160 g\"', '\"550 g, 300 g, 160 g\"'),
(9, 2, 'عسل حبة البركة', 'Black Seed Honey', 'Miel à la Nigelle', 'Miel de Semilla Negra', 'عسل حبة البركة هو عسل طبيعي فاخر ممزوج بخلاصة حبة البركة المعروفة بقيمتها الغذائية العالية وخصائصها العلاجية المميزة. يجمع هذا العسل بين الطعم الغني والفوائد الصحية، وقد استُخدم منذ القدم لدعم المناعة وتعزيز صحة الجسم بشكل عام، ليكون خيارًا مثاليًا لمن يبحث عن علاج طبيعي متكامل.\r\n\r\nالمميزات\r\n• يعزز المناعة: يساعد في تقوية جهاز المناعة بفضل خصائصه المضادة للأكسدة ودوره في دعم مقاومة الجسم للأمراض.\r\n• مضاد للبكتيريا والالتهابات: يتميز بخصائص طبيعية تساعد في مكافحة البكتيريا والالتهابات ودعم صحة الجسم.\r\n• يحسّن صحة الجهاز الهضمي: يساهم في تهدئة المعدة وتحسين عملية الهضم ودعم توازن الجهاز الهضمي.\r\n• يعزز النشاط والطاقة: مصدر طبيعي للطاقة، يساعد على تقليل التعب ودعم النشاط اليومي.', 'Black seed honey is a premium natural honey blended with black seed (Nigella sativa) extract, renowned for its high nutritional value and distinctive therapeutic properties. This honey combines rich flavor with powerful health benefits and has been traditionally used to support immunity and enhance overall body health, making it an ideal choice for those seeking a comprehensive natural remedy.\r\n\r\nFeatures\r\n• Boosts immunity: Helps strengthen the immune system thanks to its antioxidant properties and its role in enhancing the body’s resistance to diseases.\r\n• Antibacterial and anti-inflammatory: Features natural properties that help combat bacteria and inflammation while supporting overall health.\r\n• Improves digestive health: Contributes to soothing the stomach, improving digestion, and supporting digestive balance.\r\n• Enhances energy and vitality: A natural source of energy that helps reduce fatigue and support daily activity.', 'Le miel à la nigelle est un miel naturel haut de gamme enrichi en extrait de nigelle, reconnue pour sa haute valeur nutritionnelle et ses remarquables propriétés thérapeutiques. Ce miel associe une saveur riche à de puissants bienfaits pour la santé. Utilisé depuis des siècles pour renforcer l’immunité et améliorer la santé globale, il constitue un choix idéal pour ceux qui recherchent un remède naturel complet.\r\n\r\nCaractéristiques\r\n• Renforce l’immunité : Aide à fortifier le système immunitaire grâce à ses propriétés antioxydantes et à son rôle dans le soutien des défenses naturelles.\r\n• Antibactérien et anti-inflammatoire : Possède des propriétés naturelles qui aident à lutter contre les bactéries et les inflammations tout en soutenant la santé générale.\r\n• Améliore la santé digestive : Contribue à apaiser l’estomac, à améliorer la digestion et à maintenir l’équilibre digestif.\r\n• Stimule l’énergie et la vitalité : Source naturelle d’énergie, aide à réduire la fatigue et à soutenir l’activité quotidienne.', 'La miel de semilla negra es una miel natural premium mezclada con extracto de semilla negra (Nigella sativa), reconocida por su alto valor nutricional y sus destacadas propiedades terapéuticas. Esta miel combina un sabor intenso con grandes beneficios para la salud y ha sido utilizada tradicionalmente para fortalecer la inmunidad y mejorar la salud general del organismo, siendo una opción ideal para quienes buscan un remedio natural integral.\r\n\r\nCaracterísticas\r\n• Refuerza la inmunidad: Ayuda a fortalecer el sistema inmunológico gracias a sus propiedades antioxidantes y su papel en el apoyo a las defensas del cuerpo.\r\n• Antibacteriana y antiinflamatoria: Posee propiedades naturales que ayudan a combatir bacterias e inflamaciones y favorecen la salud general.\r\n• Mejora la salud digestiva: Contribuye a calmar el estómago, mejorar la digestión y mantener el equilibrio del sistema digestivo.\r\n• Aumenta la energía y vitalidad: Fuente natural de energía que ayuda a reducir la fatiga y apoyar la actividad diaria.', '[\"products\\/tV2vAW3Q2YhJnbqLMbiTIjAcEWM7ncLCvttaKuRa.jpg\",\"products\\/qCJrtDBRb3QWOgjiWgQM1oZT8eXlqUpRMVU9uABv.jpg\",\"products\\/xcRoYF3o3cR7WNgdRFScXnswrPK2K8s2xgETlrws.jpg\"]', '2026-01-25 06:00:53', '2026-01-25 06:01:29', '\"550 \\u063a , 300 \\u063a ,160 \\u063a\"', '\"550 g, 300 g, 160 g\"', '\"550 g, 300 g, 160 g\"', '\"550 g, 300 g, 160 g\"'),
(10, 3, 'عسل كريمي بنكهة الفراولة', 'Creamy Honey with Strawberry Flavor', 'Miel Crémeux à la Fraise', 'Miel Cremosa con Sabor a Fresa', 'اختبر المزيج المثالي من الصحة والنكهة مع عسلنا الكريمي الطبيعي 100% بنكهات متعددة. إضافة الفواكهة المجففه لذيذة ومتعددة الاستخدامات تجعل كل إفطار مميزًا. مثالي للدهن ومناسب لكل أفراد العائلة، يُفرد بسهولة على الخبز.\r\n\r\nالمميزات\r\n• يزيد الطاقة: يمنح دفعة سريعة وطبيعية من الطاقة مع العسل النقي\r\n• يعزز المناعة: مليء بالخصائص المضادة للبكتيريا للحفاظ على صحتك\r\n• يساعد في الهضم: يحتوي على إنزيمات تعزز صحة الأمعاء', 'Experience the perfect blend of health and flavor with our 100% natural creamy honey in multiple flavors. The addition of delicious dried fruits makes it versatile and perfect for enhancing every breakfast. Ideal for spreading and suitable for all family members, it spreads smoothly on bread.\r\n\r\nFeatures\r\n• Boosts energy: Provides a quick and natural energy boost with pure honey\r\n• Enhances immunity: Rich in antibacterial properties to help maintain your health\r\n• Supports digestion: Contains enzymes that promote gut health', 'Découvrez le mélange parfait de santé et de saveur avec notre miel crémeux 100 % naturel aux saveurs variées. L’ajout de fruits secs délicieux et polyvalents rend chaque petit-déjeuner unique. Idéal à tartiner et adapté à toute la famille, il s’étale facilement sur le pain.\r\n\r\nCaractéristiques\r\n• Augmente l’énergie : Offre un regain d’énergie rapide et naturel grâce au miel pur\r\n• Renforce l’immunité : Riche en propriétés antibactériennes pour préserver votre santé\r\n• Favorise la digestion : Contient des enzymes qui soutiennent la santé intestinale', 'Experimenta la combinación perfecta de salud y sabor con nuestra miel cremosa 100 % natural en múltiples sabores. La adición de deliciosas frutas deshidratadas, versátiles y sabrosas, hace que cada desayuno sea especial. Ideal para untar y adecuada para toda la familia, se extiende fácilmente sobre el pan.\r\n\r\nCaracterísticas\r\n• Aumenta la energía: Proporciona un impulso rápido y natural de energía con miel pura\r\n• Refuerza la inmunidad: Rica en propiedades antibacterianas para mantener tu salud\r\n• Ayuda a la digestión: Contiene enzimas que favorecen la salud intestinal', '[\"products\\/JKIs3uyzke8GoJCImuvJmGAsC5j4CR85XvUCXg6H.jpg\"]', '2026-01-25 06:05:54', '2026-01-25 06:05:54', NULL, NULL, NULL, NULL),
(11, 3, 'عسل كريمي بنكهة البرتقال', 'Creamy Honey with Orange Flavor', 'Miel Crémeux à l’Orange', 'Miel Cremosa con Sabor a Naranja', 'اختبر المزيج المثالي من الصحة والنكهة مع عسلنا الكريمي الطبيعي 100% بنكهات متعددة. إضافة الفواكهة المجففه لذيذة ومتعددة الاستخدامات تجعل كل إفطار مميزًا. مثالي للدهن ومناسب لكل أفراد العائلة، يُفرد بسهولة على الخبز.\r\n\r\nالمميزات\r\n• يزيد الطاقة: يمنح دفعة سريعة وطبيعية من الطاقة مع العسل النقي\r\n• يعزز المناعة: مليء بالخصائص المضادة للبكتيريا للحفاظ على صحتك\r\n• يساعد في الهضم: يحتوي على إنزيمات تعزز صحة الأمعاء', 'Experience the perfect blend of health and flavor with our 100% natural creamy honey in multiple flavors. The addition of delicious dried fruits makes it versatile and perfect for enhancing every breakfast. Ideal for spreading and suitable for all family members, it spreads smoothly on bread.\r\n\r\nFeatures\r\n• Boosts energy: Provides a quick and natural energy boost with pure honey\r\n• Enhances immunity: Rich in antibacterial properties to help maintain your health\r\n• Supports digestion: Contains enzymes that promote gut health', 'Découvrez le mélange parfait de santé et de saveur avec notre miel crémeux 100 % naturel aux saveurs variées. L’ajout de fruits secs délicieux et polyvalents rend chaque petit-déjeuner unique. Idéal à tartiner et adapté à toute la famille, il s’étale facilement sur le pain.\r\n\r\nCaractéristiques\r\n• Augmente l’énergie : Offre un regain d’énergie rapide et naturel grâce au miel pur\r\n• Renforce l’immunité : Riche en propriétés antibactériennes pour préserver votre santé\r\n• Favorise la digestion : Contient des enzymes qui soutiennent la santé intestinale', 'Experimenta la combinación perfecta de salud y sabor con nuestra miel cremosa 100 % natural en múltiples sabores. La adición de deliciosas frutas deshidratadas, versátiles y sabrosas, hace que cada desayuno sea especial. Ideal para untar y adecuada para toda la familia, se extiende fácilmente sobre el pan.\r\n\r\nCaracterísticas\r\n• Aumenta la energía: Proporciona un impulso rápido y natural de energía con miel pura\r\n• Refuerza la inmunidad: Rica en propiedades antibacterianas para mantener tu salud\r\n• Ayuda a la digestión: Contiene enzimas que favorecen la salud intestinal', '[\"products\\/HgkEPh277nsbus0yBffVhMieuSwSP45b07dIYur6.jpg\"]', '2026-01-25 06:08:46', '2026-01-25 06:08:46', NULL, NULL, NULL, NULL),
(12, 3, 'عسل كريمي بنكهة المانجو', 'Creamy Honey with Mango Flavor', 'Miel Crémeux à la Mangue', 'Miel Cremosa con Sabor a Mango', 'اختبر المزيج المثالي من الصحة والنكهة مع عسلنا الكريمي الطبيعي 100% بنكهات متعددة. إضافة الفواكهة المجففه لذيذة ومتعددة الاستخدامات تجعل كل إفطار مميزًا. مثالي للدهن ومناسب لكل أفراد العائلة، يُفرد بسهولة على الخبز.\r\n\r\nالمميزات\r\n• يزيد الطاقة: يمنح دفعة سريعة وطبيعية من الطاقة مع العسل النقي\r\n• يعزز المناعة: مليء بالخصائص المضادة للبكتيريا للحفاظ على صحتك\r\n• يساعد في الهضم: يحتوي على إنزيمات تعزز صحة الأمعاء', 'Experience the perfect blend of health and flavor with our 100% natural creamy honey in multiple flavors. The addition of delicious dried fruits makes it versatile and perfect for enhancing every breakfast. Ideal for spreading and suitable for all family members, it spreads smoothly on bread.\r\n\r\nFeatures\r\n• Boosts energy: Provides a quick and natural energy boost with pure honey\r\n• Enhances immunity: Rich in antibacterial properties to help maintain your health\r\n• Supports digestion: Contains enzymes that promote gut health', 'Découvrez le mélange parfait de santé et de saveur avec notre miel crémeux 100 % naturel aux saveurs variées. L’ajout de fruits secs délicieux et polyvalents rend chaque petit-déjeuner unique. Idéal à tartiner et adapté à toute la famille, il s’étale facilement sur le pain.\r\n\r\nCaractéristiques\r\n• Augmente l’énergie : Offre un regain d’énergie rapide et naturel grâce au miel pur\r\n• Renforce l’immunité : Riche en propriétés antibactériennes pour préserver votre santé\r\n• Favorise la digestion : Contient des enzymes qui soutiennent la santé intestinale', 'Experimenta la combinación perfecta de salud y sabor con nuestra miel cremosa 100 % natural en múltiples sabores. La adición de deliciosas frutas deshidratadas, versátiles y sabrosas, hace que cada desayuno sea especial. Ideal para untar y adecuada para toda la familia, se extiende fácilmente sobre el pan.\r\n\r\nCaracterísticas\r\n• Aumenta la energía: Proporciona un impulso rápido y natural de energía con miel pura\r\n• Refuerza la inmunidad: Rica en propiedades antibacterianas para mantener tu salud\r\n• Ayuda a la digestión: Contiene enzimas que favorecen la salud intestinal', '[\"products\\/RaxfwkKjK3cZ7Wd0k8N2LMtCyWfmHkAgWdyMzT6q.jpg\"]', '2026-01-25 06:13:08', '2026-01-25 06:13:08', NULL, NULL, NULL, NULL),
(13, 3, 'عسل كريمي بنكهة الليمون', 'Creamy Honey with Lemon Flavor', 'Miel Crémeux au Citron', 'Miel Cremosa con Sabor a Limón', 'اختبر المزيج المثالي من الصحة والنكهة مع عسلنا الكريمي الطبيعي 100% بنكهات متعددة. إضافة الفواكهة المجففه لذيذة ومتعددة الاستخدامات تجعل كل إفطار مميزًا. مثالي للدهن ومناسب لكل أفراد العائلة، يُفرد بسهولة على الخبز.\r\n\r\nالمميزات\r\n• يزيد الطاقة: يمنح دفعة سريعة وطبيعية من الطاقة مع العسل النقي\r\n• يعزز المناعة: مليء بالخصائص المضادة للبكتيريا للحفاظ على صحتك\r\n• يساعد في الهضم: يحتوي على إنزيمات تعزز صحة الأمعاء', 'Experience the perfect blend of health and flavor with our 100% natural creamy honey in multiple flavors. The addition of delicious dried fruits makes it versatile and perfect for enhancing every breakfast. Ideal for spreading and suitable for all family members, it spreads smoothly on bread.\r\n\r\nFeatures\r\n• Boosts energy: Provides a quick and natural energy boost with pure honey\r\n• Enhances immunity: Rich in antibacterial properties to help maintain your health\r\n• Supports digestion: Contains enzymes that promote gut health', 'Découvrez le mélange parfait de santé et de saveur avec notre miel crémeux 100 % naturel aux saveurs variées. L’ajout de fruits secs délicieux et polyvalents rend chaque petit-déjeuner unique. Idéal à tartiner et adapté à toute la famille, il s’étale facilement sur le pain.\r\n\r\nCaractéristiques\r\n• Augmente l’énergie : Offre un regain d’énergie rapide et naturel grâce au miel pur\r\n• Renforce l’immunité : Riche en propriétés antibactériennes pour préserver votre santé\r\n• Favorise la digestion : Contient des enzymes qui soutiennent la santé intestinale', 'Experimenta la combinación perfecta de salud y sabor con nuestra miel cremosa 100 % natural en múltiples sabores. La adición de deliciosas frutas deshidratadas, versátiles y sabrosas, hace que cada desayuno sea especial. Ideal para untar y adecuada para toda la familia, se extiende fácilmente sobre el pan.\r\n\r\nCaracterísticas\r\n• Aumenta la energía: Proporciona un impulso rápido y natural de energía con miel pura\r\n• Refuerza la inmunidad: Rica en propiedades antibacterianas para mantener tu salud\r\n• Ayuda a la digestión: Contiene enzimas que favorecen la salud intestinal', '[\"products\\/pPTSOtWJMPmIR3ycaUJ91mTYxEbTX2jYVMSxuL6u.jpg\"]', '2026-01-25 06:16:47', '2026-01-25 06:16:47', NULL, NULL, NULL, NULL),
(14, 3, 'عكبر سائل', 'Liquid Propolis', 'Propolis Liquide', 'Propóleo Líquido', 'البروبوليس السائل هو مستخلص طبيعي يجمعه النحل من الأشجار والنباتات، وهو معروف بخصائصه الفريدة التي تدعم المناعة وتحافظ على صحة الجهاز التنفسي.\r\n\r\nالمميزات\r\n• يقوي المناعة: يعزز دفاعات الجسم الطبيعية ضد الأمراض\r\n• يدعم صحة الجهاز التنفسي: يخفف من التهاب الحلق والسعال واحتقان الصدر\r\n• مضاد للأكسدة: يحمي الخلايا من التلف والالتهابات', 'Liquid propolis is a natural extract collected by bees from trees and plants. It is well known for its unique properties that support immunity and help maintain respiratory health.\r\n\r\nFeatures\r\n• Boosts immunity: Enhances the body’s natural defenses against diseases\r\n• Supports respiratory health: Helps relieve sore throat, cough, and chest congestion\r\n• Antioxidant: Protects cells from damage and inflammation', 'La propolis liquide est un extrait naturel récolté par les abeilles à partir des arbres et des plantes. Elle est reconnue pour ses propriétés uniques qui renforcent l’immunité et soutiennent la santé du système respiratoire.\r\n\r\nCaractéristiques\r\n• Renforce l’immunité : Stimule les défenses naturelles de l’organisme contre les maladies\r\n• Soutient la santé respiratoire : Soulage les maux de gorge, la toux et la congestion thoracique\r\n• Antioxydant : Protège les cellules contre les dommages et les inflammations', 'El propóleo líquido es un extracto natural recolectado por las abejas de árboles y plantas. Es conocido por sus propiedades únicas que refuerzan la inmunidad y ayudan a mantener la salud del sistema respiratorio.\r\n\r\nCaracterísticas\r\n• Refuerza la inmunidad: Fortalece las defensas naturales del cuerpo contra las enfermedades\r\n• Apoya la salud respiratoria: Alivia el dolor de garganta, la tos y la congestión del pecho\r\n• Antioxidante: Protege las células del daño y la inflamación', '[\"products\\/Kef23qQRft0jK5rqUEnsEti45cedZauLplbbLlUG.jpg\"]', '2026-01-25 06:22:10', '2026-01-25 06:22:10', NULL, NULL, NULL, NULL),
(15, 4, 'مشروب الكولاجين', 'Collagen Drink', 'Boisson au Collagène', 'Bebida de Colágeno', 'مكمل غذائي بالعسل والكولاجين:\r\nمشروب صحي غني بالزنك، يحتوي على العسل الطبيعي، الكولاجين، والمغذيات الأساسية. يمنحك دفعة يومية من الجمال والحيوية، ويعد الخيار المثالي لمن يسعون إلى تعزيز إشراقهم من الداخل والخارج.\r\n\r\nالميزات\r\n• يعزز إنتاج الكولاجين: يساعد على تحفيز إنتاج الكولاجين الطبيعي في الجسم، بنسبة امتصاص عالية تصل إلى 95٪ بفضل الفيتامينات المساعدة مثل فيتامين C.\r\n• يقوي المفاصل والأنسجة الداخلية: يساهم في دعم صحة المفاصل وتعزيز قوة ومرونة الأنسجة الداخلية.\r\n• يحسن صحة البشرة والشعر والأظافر: تركيبة غنية بالكولاجين والزنك تساعد على تحسين مرونة البشرة وتقوية الشعر والأظافر.', 'Dietary supplement with honey and collagen:\r\nA healthy beverage rich in zinc, containing natural honey, collagen, and essential nutrients. It provides a daily boost of beauty and vitality, making it the ideal choice for those seeking to enhance their radiance from within and beyond.\r\n\r\nFeatures\r\n• Boosts collagen production: Helps stimulate the body’s natural collagen production, with a high absorption rate of up to 95%, thanks to supportive vitamins such as vitamin C.\r\n• Strengthens joints and internal tissues: Contributes to supporting joint health and enhancing the strength and flexibility of internal tissues.\r\n• Improves skin, hair, and nail health: A collagen- and zinc-rich formula that helps improve skin elasticity and strengthen hair and nails.', 'Complément alimentaire au miel et au collagène :\r\nUne boisson saine riche en zinc, contenant du miel naturel, du collagène et des nutriments essentiels. Elle vous offre un regain quotidien de beauté et de vitalité, et constitue le choix idéal pour ceux qui souhaitent renforcer leur éclat de l’intérieur comme de l’extérieur.\r\n\r\nCaractéristiques\r\n• Stimule la production de collagène : Aide à activer la production naturelle de collagène dans le corps, avec un taux d’absorption élevé pouvant atteindre 95 %, grâce aux vitamines de soutien telles que la vitamine C.\r\n• Renforce les articulations et les tissus internes : Contribue à soutenir la santé des articulations et à améliorer la force et la souplesse des tissus internes.\r\n• Améliore la santé de la peau, des cheveux et des ongles : Une formule riche en collagène et en zinc qui aide à améliorer l’élasticité de la peau et à renforcer les cheveux et les ongles.', 'Suplemento alimenticio con miel y colágeno:\r\nUna bebida saludable rica en zinc, que contiene miel natural, colágeno y nutrientes esenciales. Proporciona un impulso diario de belleza y vitalidad, siendo la opción ideal para quienes buscan potenciar su brillo desde el interior y el exterior.\r\n\r\nCaracterísticas\r\n• Estimula la producción de colágeno: Ayuda a activar la producción natural de colágeno en el cuerpo, con una alta tasa de absorción de hasta el 95 %, gracias a vitaminas de apoyo como la vitamina C.\r\n• Fortalece las articulaciones y los tejidos internos: Contribuye a apoyar la salud articular y mejorar la fuerza y flexibilidad de los tejidos internos.\r\n• Mejora la salud de la piel, el cabello y las uñas: Una fórmula rica en colágeno y zinc que ayuda a mejorar la elasticidad de la piel y fortalecer el cabello y las uñas.', '[\"products\\/o7acXbJBovzxtPQU284214grQjGu1Mcrk5GugZXG.jpg\"]', '2026-01-25 06:41:30', '2026-01-25 06:41:30', NULL, NULL, NULL, NULL),
(16, 4, 'مشروب الشعير', 'Barley Drink', 'Boisson à l’Orge', 'Bebida de Cebada', 'مكمل غذائي بالعسل ومستخلص الشعير:\r\nمشروب طبيعي غني بالزنك، يجمع بين العسل، مستخلص الشعير والفيتامينات الأساسية، ليمنحك نكهة لذيذة وانتعاشًا صحيًا. مصمم لتعزيز الصحة العامة وتوفير طاقة طبيعية مستدامة، وهو خيار مثالي للحيوية اليومية.\r\n\r\nالميزات\r\n• يعزز الطاقة: مدعوم بمستخلص الشعير للطاقة المستمرة والحيوية.\r\n• يدعم الصحة العامة: مغذّى بالفيتامينات B و C و D والزنك من أجل رفاهية شاملة.\r\n• لذيذ ومغذٍ: يجمع بين الطعم الرائع والمغذيات الأساسية ليبقيك في أفضل حال.', 'Dietary supplement with honey and barley extract:\r\nA natural beverage rich in zinc, combining honey, barley extract, and essential vitamins to provide a delicious taste and healthy refreshment. Designed to enhance overall health and deliver sustained natural energy, making it an ideal choice for daily vitality.\r\n\r\nFeatures\r\n• Boosts energy: Powered by barley extract for continuous energy and vitality.\r\n• Supports overall health: Enriched with vitamins B, C, D, and zinc for comprehensive wellness.\r\n• Delicious and nourishing: Combines great taste with essential nutrients to keep you at your best.', 'Complément alimentaire au miel et à l’extrait d’orge :\r\nUne boisson naturelle riche en zinc, associant le miel, l’extrait d’orge et des vitamines essentielles pour offrir une saveur délicieuse et une fraîcheur saine. Conçue pour améliorer la santé générale et fournir une énergie naturelle durable, elle est idéale pour la vitalité quotidienne.\r\n\r\nCaractéristiques\r\n• Stimule l’énergie : Enrichie en extrait d’orge pour une énergie continue et une vitalité accrue.\r\n• Soutient la santé globale : Enrichie en vitamines B, C, D et en zinc pour un bien-être complet.\r\n• Délicieuse et nutritive : Allie une excellente saveur à des nutriments essentiels pour vous maintenir en pleine forme.', 'Suplemento alimenticio con miel y extracto de cebada:\r\nUna bebida natural rica en zinc que combina miel, extracto de cebada y vitaminas esenciales para brindar un sabor delicioso y un refresco saludable. Diseñada para mejorar la salud general y proporcionar energía natural sostenida, es una opción ideal para la vitalidad diaria.\r\n\r\nCaracterísticas\r\n• Aumenta la energía: Enriquecida con extracto de cebada para una energía continua y vitalidad.\r\n• Apoya la salud general: Fortificada con vitaminas B, C, D y zinc para un bienestar integral.\r\n• Deliciosa y nutritiva: Combina un excelente sabor con nutrientes esenciales para mantenerte en tu mejor estado.', '[\"products\\/E5O2KhU6ZrfQkworZ5oOREj9fxpbjP6LmRsAUTSM.jpg\"]', '2026-01-25 06:44:03', '2026-01-25 06:44:54', '\"250 \\u0645\\u0644\"', '\"250 ml\"', '\"250 ml\"', '\"250 ml\"'),
(17, 4, 'مشروب الزنجبيل', 'Ginger Drink', 'Boisson au Gingembre', 'Bebida de Jengibre', 'مكمل غذائي بالعسل والزنجبيل:\r\nمشروب طبيعي غني بالزنك، يجمع بين دفء الزنجبيل، حلاوة العسل، والفيتامينات الأساسية، في تركيبة مغذية ولذيذة. مثالي لتهدئة الحلق، دعم الهضم، وتعزيز الشعور بالراحة في أي وقت من اليوم.\r\n\r\nالميزات\r\n• يهدئ الحلق: يعمل الزنجبيل والعسل معًا لتوفير راحة طبيعية من التهاب الحلق.\r\n• يساعد في الهضم: يعمل مستخلص الزنجبيل على تعزيز صحة الهضم وراحة الأمعاء.\r\n• يعزز المناعة: مغذّى بالفيتامينات B و C و D والزنك لتعزيز دفاعات جسمك ضد الأمراض.', 'Dietary supplement with honey and ginger:\r\nA natural beverage rich in zinc, combining the warmth of ginger, the sweetness of honey, and essential vitamins in a nourishing and delicious formula. Ideal for soothing the throat, supporting digestion, and enhancing comfort at any time of the day.\r\n\r\nFeatures\r\n• Soothes the throat: Ginger and honey work together to provide natural relief from sore throat.\r\n• Supports digestion: Ginger extract helps promote digestive health and intestinal comfort.\r\n• Boosts immunity: Fortified with vitamins B, C, D, and zinc to strengthen your body’s defenses against illness', 'Complément alimentaire au miel et au gingembre :\r\nUne boisson naturelle riche en zinc, associant la chaleur du gingembre, la douceur du miel et des vitamines essentielles dans une formule nutritive et savoureuse. Idéale pour apaiser la gorge, soutenir la digestion et renforcer le bien-être à tout moment de la journée.\r\n\r\nCaractéristiques\r\n• Apaise la gorge : Le gingembre et le miel agissent ensemble pour soulager naturellement les maux de gorge.\r\n• Favorise la digestion : L’extrait de gingembre aide à améliorer la digestion et le confort intestinal.\r\n• Renforce l’immunité : Enrichie en vitamines B, C, D et en zinc pour renforcer les défenses naturelles de l’organisme.', 'Suplemento alimenticio con miel y jengibre:\r\nUna bebida natural rica en zinc que combina el calor del jengibre, la dulzura de la miel y vitaminas esenciales en una fórmula nutritiva y deliciosa. Ideal para calmar la garganta, apoyar la digestión y mejorar la sensación de bienestar en cualquier momento del día.\r\n\r\nCaracterísticas\r\n• Alivia la garganta: El jengibre y la miel actúan juntos para proporcionar un alivio natural del dolor de garganta.\r\n• Favorece la digestión: El extracto de jengibre ayuda a mejorar la salud digestiva y el confort intestinal.\r\n• Refuerza la inmunidad: Enriquecida con vitaminas B, C, D y zinc para fortalecer las defensas del organismo contra las enfermedades.', '[\"products\\/tD0bw31C6NEewTc7gTNPfGh7rsHCkrE123Fq6KSG.jpg\"]', '2026-01-25 07:10:51', '2026-01-25 07:10:51', NULL, NULL, NULL, NULL),
(18, 3, 'عسل حيوي', 'Vital Honey', 'Miel Vital', 'Miel Vital', 'عسل حيوي هو معزز طبيعي للطاقة مصنوع من العسل النقي ومغذّى بالمواد المغذية للدعم الحيوي اليومي. مصمم لتعزيز القدرة على التحمل والتركيز والصحة العامة، إنه الرفيق المثالي لنمط الحياة المزدحم.\r\n\r\nالمميزات\r\n• يعزز مستويات الطاقة: يوفر طاقة طبيعية مستدامة للمهام اليومية\r\n• يعزز القدرة على التحمل: يدعم التحمل البدني والحيوية\r\n• يعزز التركيز الذهني: مليء بالمغذيات لتحسين اليقظة والتركيز', 'Vital Honey is a natural energy booster made from pure honey and enriched with essential nutrients for daily vitality support. Designed to enhance endurance, focus, and overall well-being, it is the perfect companion for a busy lifestyle.\r\n\r\nFeatures\r\n• Boosts energy levels: Provides sustained natural energy for daily tasks\r\n• Enhances endurance: Supports physical stamina and vitality\r\n• Improves mental focus: Packed with nutrients to enhance alertness and concentration', 'Le Miel Vital est un stimulant naturel de l’énergie, fabriqué à partir de miel pur et enrichi en nutriments essentiels pour un soutien quotidien de la vitalité. Conçu pour améliorer l’endurance, la concentration et la santé globale, il est le compagnon idéal d’un mode de vie actif et dynamique.\r\n\r\nCaractéristiques\r\n• Augmente les niveaux d’énergie : Fournit une énergie naturelle durable pour les activités quotidiennes\r\n• Renforce l’endurance : Soutient la résistance physique et la vitalité\r\n• Améliore la concentration mentale : Riche en nutriments pour accroître la vigilance et la concentration', 'La Miel Vital es un potenciador natural de la energía elaborado con miel pura y enriquecido con nutrientes esenciales para el apoyo diario de la vitalidad. Diseñada para mejorar la resistencia, la concentración y el bienestar general, es la compañera ideal para un estilo de vida activo y exigente.\r\n\r\nCaracterísticas\r\n• Aumenta los niveles de energía: Proporciona energía natural sostenida para las tareas diarias\r\n• Mejora la resistencia: Apoya la resistencia física y la vitalidad\r\n• Favorece la concentración mental: Rica en nutrientes para mejorar la atención y el enfoque', '[\"products\\/5Ly64XoAZtht2vbo1h1s82PeX8gV2Qtun2918Ym9.jpg\"]', '2026-01-25 11:41:16', '2026-01-25 12:03:02', '\"10 \\u00d7 24 \\u063a\"', '\"10 \\u00d7 24 g\"', '\"10 \\u00d7 24 g\"', '\"10 \\u00d7 24 g\"'),
(19, 2, 'ملعقة عسل حبة البركة', 'Black Seed Honey Spoon', 'Cuillère de Miel à la Nigelle', 'Cuchara de Miel con Semilla Negra', 'تم تعبئة العسل الطبيعي بعناية داخل ملاعق فردية، لتمنحك طريقة مريحة للاستمتاع بالعسل في أي وقت. مثالية لإضافتها إلى الشاي أو القهوة، لرشها فوق الوجبات الخفيفة، أو لتناولها أثناء التنقل. خيار ذكي يجمع بين الطعم الأصيل والفائدة وسهولة الاستخدام.\r\n\r\nالمميزات\r\n• يزيد الطاقة: يمنح دفعة سريعة وطبيعية من الطاقة مع العسل النقي\r\n• يعزز المناعة: مليء بالخصائص المضادة للبكتيريا للحفاظ على صحتك\r\n• يساعد في الهضم: يحتوي على إنزيمات تعزز صحة الأمعاء', 'Natural honey is carefully packed into individual spoons, giving you a convenient way to enjoy honey anytime. Perfect for adding to tea or coffee, drizzling over snacks, or enjoying on the go. A smart choice that combines authentic taste, health benefits, and ease of use.\r\n\r\nFeatures\r\n• Boosts energy: Provides a quick and natural energy boost with pure honey\r\n• Enhances immunity: Rich in antibacterial properties to help maintain your health\r\n• Supports digestion: Contains enzymes that promote gut health', 'Le miel naturel est soigneusement conditionné dans des cuillères individuelles pour vous offrir une manière pratique d’en profiter à tout moment. Idéal à ajouter au thé ou au café, à verser sur les collations ou à consommer en déplacement. Un choix intelligent qui allie saveur authentique, bienfaits pour la santé et facilité d’utilisation.\r\n\r\nCaractéristiques\r\n• Augmente l’énergie : Offre un regain d’énergie rapide et naturel grâce au miel pur\r\n• Renforce l’immunité : Riche en propriétés antibactériennes pour préserver votre santé\r\n• Favorise la digestion : Contient des enzymes qui soutiennent la santé intestinale', 'La miel natural se envasa cuidadosamente en cucharas individuales, brindándote una forma práctica de disfrutarla en cualquier momento. Ideal para añadir al té o café, rociar sobre aperitivos o consumir sobre la marcha. Una opción inteligente que combina sabor auténtico, beneficios para la salud y facilidad de uso.\r\n\r\nCaracterísticas\r\n• Aumenta la energía: Proporciona un impulso rápido y natural de energía con miel pura\r\n• Refuerza la inmunidad: Rica en propiedades antibacterianas para mantener tu salud\r\n• Ayuda a la digestión: Contiene enzimas que favorecen la salud intestinal', '[\"products\\/7YeOP6c5b70ir77U3s6IOLkHtCd8DZkx1Gcpt5jQ.jpg\"]', '2026-01-25 11:54:18', '2026-01-25 12:02:47', '\"12\\u00d77 \\u063a\"', '\"12\\u00d77 g\"', '\"12\\u00d77 g\"', '\"12\\u00d77 g\"'),
(20, 2, 'ملعقة عسل الزهور', 'Flower Honey Spoon', 'Cuillère de Miel de Fleurs', 'Cuchara de Miel de Flores', 'تم تعبئة العسل الطبيعي بعناية داخل ملاعق فردية، لتمنحك طريقة مريحة للاستمتاع بالعسل في أي وقت. مثالية لإضافتها إلى الشاي أو القهوة، لرشها فوق الوجبات الخفيفة، أو لتناولها أثناء التنقل. خيار ذكي يجمع بين الطعم الأصيل والفائدة وسهولة الاستخدام.\r\n\r\nالمميزات\r\n• يزيد الطاقة: يمنح دفعة سريعة وطبيعية من الطاقة مع العسل النقي\r\n• يعزز المناعة: مليء بالخصائص المضادة للبكتيريا للحفاظ على صحتك\r\n• يساعد في الهضم: يحتوي على إنزيمات تعزز صحة الأمعاء', 'Honey Spoon with Black Seed Flavor\r\n\r\nNatural honey is carefully packed into individual spoons, giving you a convenient way to enjoy honey anytime. Perfect for adding to tea or coffee, drizzling over snacks, or enjoying on the go. A smart choice that combines authentic taste, health benefits, and ease of use.\r\n\r\nFeatures\r\n• Boosts energy: Provides a quick and natural energy boost with pure honey\r\n• Enhances immunity: Rich in antibacterial properties to help maintain your health\r\n• Supports digestion: Contains enzymes that promote gut health', 'Le miel naturel est soigneusement conditionné dans des cuillères individuelles pour vous offrir une manière pratique d’en profiter à tout moment. Idéal à ajouter au thé ou au café, à verser sur les collations ou à consommer en déplacement. Un choix intelligent qui allie saveur authentique, bienfaits pour la santé et facilité d’utilisation.\r\n\r\nCaractéristiques\r\n• Augmente l’énergie : Offre un regain d’énergie rapide et naturel grâce au miel pur\r\n• Renforce l’immunité : Riche en propriétés antibactériennes pour préserver votre santé\r\n• Favorise la digestion : Contient des enzymes qui soutiennent la santé intestinale', 'La miel natural se envasa cuidadosamente en cucharas individuales, brindándote una forma práctica de disfrutarla en cualquier momento. Ideal para añadir al té o café, rociar sobre aperitivos o consumir sobre la marcha. Una opción inteligente que combina sabor auténtico, beneficios para la salud y facilidad de uso.\r\n\r\nCaracterísticas\r\n• Aumenta la energía: Proporciona un impulso rápido y natural de energía con miel pura\r\n• Refuerza la inmunidad: Rica en propiedades antibacterianas para mantener tu salud\r\n• Ayuda a la digestión: Contiene enzimas que favorecen la salud intestinal', '[\"products\\/4HSOaKKbBgg142MNdSv1NUmer4ViSBiuWcCyVOiI.jpg\"]', '2026-01-25 12:12:08', '2026-01-25 12:13:10', '\"12\\u00d77 \\u063a\"', '\"12\\u00d77 g\"', '\"12\\u00d77 g\"', '\"12\\u00d77 g\"'),
(21, 2, 'ملعقة عسل السدر', 'Sidr Honey Spoon', 'Cuillère de Miel de Sidr', 'Cuchara de Miel de Sidr', 'تم تعبئة العسل الطبيعي بعناية داخل ملاعق فردية، لتمنحك طريقة مريحة للاستمتاع بالعسل في أي وقت. مثالية لإضافتها إلى الشاي أو القهوة، لرشها فوق الوجبات الخفيفة، أو لتناولها أثناء التنقل. خيار ذكي يجمع بين الطعم الأصيل والفائدة وسهولة الاستخدام.\r\n\r\nالمميزات\r\n• يزيد الطاقة: يمنح دفعة سريعة وطبيعية من الطاقة مع العسل النقي\r\n• يعزز المناعة: مليء بالخصائص المضادة للبكتيريا للحفاظ على صحتك\r\n• يساعد في الهضم: يحتوي على إنزيمات تعزز صحة الأمعاء', 'Natural honey is carefully packed into individual spoons, giving you a convenient way to enjoy honey anytime. Perfect for adding to tea or coffee, drizzling over snacks, or enjoying on the go. A smart choice that combines authentic taste, health benefits, and ease of use.\r\n\r\nFeatures\r\n• Boosts energy: Provides a quick and natural energy boost with pure honey\r\n• Enhances immunity: Rich in antibacterial properties to help maintain your health\r\n• Supports digestion: Contains enzymes that promote gut health', 'Le miel naturel est soigneusement conditionné dans des cuillères individuelles pour vous offrir une manière pratique d’en profiter à tout moment. Idéal à ajouter au thé ou au café, à verser sur les collations ou à consommer en déplacement. Un choix intelligent qui allie saveur authentique, bienfaits pour la santé et facilité d’utilisation.\r\n\r\nCaractéristiques\r\n• Augmente l’énergie : Offre un regain d’énergie rapide et naturel grâce au miel pur\r\n• Renforce l’immunité : Riche en propriétés antibactériennes pour préserver votre santé\r\n• Favorise la digestion : Contient des enzymes qui soutiennent la santé intestinale', 'La miel natural se envasa cuidadosamente en cucharas individuales, brindándote una forma práctica de disfrutarla en cualquier momento. Ideal para añadir al té o café, rociar sobre aperitivos o consumir sobre la marcha. Una opción inteligente que combina sabor auténtico, beneficios para la salud y facilidad de uso.\r\n\r\nCaracterísticas\r\n• Aumenta la energía: Proporciona un impulso rápido y natural de energía con miel pura\r\n• Refuerza la inmunidad: Rica en propiedades antibacterianas para mantener tu salud\r\n• Ayuda a la digestión: Contiene enzimas que favorecen la salud intestinal', '[\"products\\/frdCj5GKSZf0rLkH34XIiWN3mT2qZGZvYgFY5gO3.jpg\"]', '2026-01-25 12:17:06', '2026-01-25 12:17:06', NULL, NULL, NULL, NULL);
INSERT INTO `products` (`id`, `category_id`, `title_ar`, `title_en`, `title_fr`, `title_es`, `description_ar`, `description_en`, `description_fr`, `description_es`, `images`, `created_at`, `updated_at`, `sizes_ar`, `sizes_en`, `sizes_fr`, `sizes_es`) VALUES
(22, 2, 'شمع العسل', 'Honeycomb', 'Rayon de Miel', 'Miel en Panal', 'يُعتبر عسل الشمع من أنقى وأغنى أنواع العسل، حيث يُجمع مباشرة من خلايا النحل دون أي معالجة، ليحافظ على قيمته الغذائية العالية ومذاقه الطبيعي الأصيل. المميزات • مضادات الأكسدة: يساعد في محاربة الجذور الحرة ويدعم الصحة العامة • يحسن صحة الجهاز الهضمي: مضاف إليه الفيتامينات والأعشاب ومضادات الأكسدة • يعزز المناعة: مثالي كمشروب منعش أو دفعة صحية', 'Honeycomb is considered one of the purest and richest types of honey, as it is collected directly from the beehives without any processing, preserving its high nutritional value and authentic natural taste.\r\n\r\nFeatures\r\n• Antioxidants: Helps fight free radicals and supports overall health\r\n• Improves digestive health: Enriched with vitamins, herbs, and antioxidants\r\n• Boosts immunity: Ideal as a refreshing drink or a healthy boost', 'Le rayon de miel est considéré comme l’un des types de miel les plus purs et les plus riches, car il est récolté directement des ruches sans aucun traitement, ce qui lui permet de conserver sa haute valeur nutritionnelle et son goût naturel authentique.\r\n\r\nCaractéristiques\r\n• Antioxydants : Aide à combattre les radicaux libres et soutient la santé générale\r\n• Améliore la santé digestive : Enrichi en vitamines, herbes et antioxydants\r\n• Renforce l’immunité : Idéal comme boisson rafraîchissante ou comme apport santé', 'La miel en panal se considera uno de los tipos de miel más puros y ricos, ya que se recolecta directamente de las colmenas sin ningún procesamiento, conservando su alto valor nutricional y su sabor natural auténtico.\r\n\r\nCaracterísticas\r\n• Antioxidantes: Ayuda a combatir los radicales libres y apoya la salud general\r\n• Mejora la salud digestiva: Enriquecida con vitaminas, hierbas y antioxidantes\r\n• Refuerza la inmunidad: Ideal como bebida refrescante o como un impulso saludable', '[\"products\\/tUUYrs8HpkpuBF9jwkVvZYyKms5FHSn9nhpkf29j.jpg\"]', '2026-01-25 12:26:20', '2026-01-25 12:26:20', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seo_meta`
--

CREATE TABLE `seo_meta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) NOT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title_fr` varchar(255) DEFAULT NULL,
  `title_es` varchar(255) DEFAULT NULL,
  `description_ar` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_fr` text DEFAULT NULL,
  `description_es` text DEFAULT NULL,
  `keywords_ar` varchar(255) DEFAULT NULL,
  `keywords_en` varchar(255) DEFAULT NULL,
  `keywords_fr` varchar(255) DEFAULT NULL,
  `keywords_es` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo_meta`
--

INSERT INTO `seo_meta` (`id`, `page`, `title_ar`, `title_en`, `title_fr`, `title_es`, `description_ar`, `description_en`, `description_fr`, `description_es`, `keywords_ar`, `keywords_en`, `keywords_fr`, `keywords_es`, `image`, `created_at`, `updated_at`) VALUES
(2, 'home', 'Bee & Honey | منتجات العسل الطبيعية والمشروبات الصحية المحلاة بالعسل', 'Bee & Honey | Natural Honey Products & Healthy Honey Drinks', 'Bee & Honey | Produits de miel naturels & boissons énergétiques saines', 'Bee & Honey | Productos de miel natural y bebidas energéticas saludables', 'اكتشف عالم Bee & Honey من منتجات العسل الطبيعي والمشروبات الصحية الغنية بالطاقة والمناعة. مكونات طبيعية 100% بدون سكر أو مواد حافظة، جودة عالمية وطعم متوازن لحياة صحية ونشيطة.', 'Discover Bee & Honey’s premium natural honey products and healthy energy drinks made with pure ingredients. No sugar, no preservatives – just balanced nutrition, immunity support, and a naturally active lifestyle.', 'Découvrez les produits Bee & Honey à base de miel naturel et des boissons énergétiques saines avec des ingrédients 100% naturels, sans sucre ni conservateurs, pour une vie active et équilibrée.', 'Descubre los productos Bee & Honey elaborados con miel natural y bebidas energéticas saludables con ingredientes 100% naturales, sin azúcar ni conservantes, para un estilo de vida activo y equilibrado.', 'عسل طبيعي, مشروبات بالعسل, فوائد العسل, منتجات العسل الصحية, عسل يمني, مشروبات طاقة طبيعية, بدون سكر, مكملات غذائية طبيعية, عسل عضوي, Bee and Honey', 'natural honey, honey drinks, healthy energy drink, honey products, pure honey benefits, sugar free drinks, organic honey, natural supplements, Bee and Honey, honey lifestyle', 'miel naturel, boissons au miel, bienfaits du miel, produits au miel, miel pur, boissons énergétiques saines, sans sucre, compléments naturels, miel bio, Bee and Honey', 'miel natural, bebidas con miel, beneficios de la miel, productos de miel, miel pura, bebida energética saludable, sin azúcar, suplementos naturales, miel orgánica, Bee and Honey', NULL, '2026-02-19 02:38:23', '2026-02-19 02:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `seo_settings`
--

CREATE TABLE `seo_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0H3fL6P2Y9Obiq4vVdbJn5tTE53YRgBzZPRVGgs4', NULL, '2a03:2880:21ff:a::', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWVBtSTFqMElvbHAweEwyWnFLTU96YWZHZ0l6c2gycW54cExMQkFpZiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LmJlZWFuZGhvbmV5LmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772278199),
('3XVYLGB13efMl2fLDL1VbbQ4RV6qgKRA94kPV3FG', NULL, '2a03:2880:16ff:53::', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidG9XMGFySjl0VENHNlVZZldJYlJzOTlQOHRCSTBGbUYzWkZsckQ3TSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LmJlZWFuZGhvbmV5LmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772278197),
('a7fVEZE44V0hzPDS4lBcLq4ZswmgdExFtP25euxH', NULL, '2a03:2880:3ff:51::', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiamNRR1B5dk95YTJ6a05IWXluSVEwRlg1dlptN0RXelM3dUVHYTZ0SiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LmJlZWFuZGhvbmV5LmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772278198),
('a8KSPmBBufYYMjXncMmI4AHY7kKkVXF1GD0RmVzh', NULL, '2a03:2880:13ff:3::', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNDZKb05CWHExdGNSVnhCTHlJS3lwenpndkVrcUdwTzF5VlFiRGh6RSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LmJlZWFuZGhvbmV5LmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772278197),
('cir2LWBVC8AKaCmvLBzP6fhRk7KAvDhz95QxHSMp', NULL, '52.167.144.192', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRG0wSGpmaEg3RlF4eUFIbnpzdmhzZkx2TXV6bjhMTUFQWTE4SWZoSSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vd3d3LmJlZWFuZGhvbmV5LmNvbS9jYXRlZ29yZXkvMj9wYWdlPTEiO3M6NToicm91dGUiO3M6MjQ6ImNhdGVnb3JpZXMuc2hvdy5wcm9kdWN0cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1772277731),
('CjtakMR1I3jYeVJbekdVSxx2RK0LsoskQqPowYX9', NULL, '2a03:2880:7ff:46::', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaGhMYnV1a3dQWlRiZHhPanpKU1g1NWp0ZFdpT2VkelhncUt3RUNqVCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LmJlZWFuZGhvbmV5LmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772278199),
('DgRZXZQRhwK62BDb5tJN4MAGTFjX7gU5198rtxRU', NULL, '2a09:bac2:4240:265a::3d2:57', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.1.1 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSmxnS3ZaTk5WZVhkOUpNNnp1UXRPN2c5dGt2bzFic285MG5BcUlTYiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LmJlZWFuZGhvbmV5LmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772313806),
('eWZjiSqWJq7IKeBgU2frru1dJrVStEHj0mpz3ieS', NULL, '52.167.144.156', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNUxvTGZ5N2lwcmtDd0xvYjJlOHRCdXdLdERPZjdHd0dPb2VSblZONCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vd3d3LmJlZWFuZGhvbmV5LmNvbS9ibG9nLzUiO3M6NToicm91dGUiO3M6OToibmV3cy5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772283923),
('lEv3syIF4DF0OMYwQf0yeM7xqyHU1bMT8pQtdrfK', NULL, '52.167.144.21', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWmcwMFlSUHJxd2sxelNlRU9MQUxyQjZFbmtDYTNWY0Q4VkNIMmZOaCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vd3d3LmJlZWFuZGhvbmV5LmNvbS9ibG9nLzgiO3M6NToicm91dGUiO3M6OToibmV3cy5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772297247),
('ntF9v5vOQLIEB9QryjnPVDeZyTNWx2zMuMPzLRtd', NULL, '40.77.167.4', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaVRTRm5xMnU2VUM0b3Nqd1BDN3JucFBObEZjbDhCSURDazFKNU5rMCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vYmVlYW5kaG9uZXkuY29tL2Jsb2cvMiI7czo1OiJyb3V0ZSI7czo5OiJuZXdzLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1772279500),
('OH4ejaKLmfcciI9RSQlRyUtYiWaZ9csAYCeInajt', NULL, '20.220.13.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTVBdnptOVNwbzBySEZJY3luYkNaRElua1g1MnVYeG13UHFldlBpbiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vYmVlYW5kaG9uZXkuY29tL3B1YmxpYy9pbmRleC5waHAiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1772280273),
('qHXYqaTkntyBooKcPQTbXK89GJHUDHUpwXQqEXv4', NULL, '2a03:2880:32ff:71::', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUWEwazZjV3R4YkRuRzlydEVnMzBLNmIwSkU4VjVMNDZQVnVNQWFnUCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LmJlZWFuZGhvbmV5LmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772294440),
('rSJHwvTqDYmpvT6kMdREHooAddQwk3fUETZZXkqt', NULL, '109.107.253.122', 'WhatsApp/2.23.20.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOW5OZWVNM2xwUWl5cE5jY1l0eDRkd29NWU9rOWNoVVVUWXcxbkVoTCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LmJlZWFuZGhvbmV5LmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772305068),
('uODQdkQm21IgBmINqrqpqP5LLGix77NExdCh3576', NULL, '2a02:4780:40:c0de::2a', 'Go-http-client/2.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiRmNiYWpCSmRsNzhxMUFVMHBSa1UyZkdDcE5IdGVNODYzclQ3TXdxYyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772285774),
('wjat8XiQSG7oy0T2nZLGwSHXDoizT38EJ1C5GJV6', 1, '109.107.253.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRmxXWXVtQnI2M1hLZTBXYUVGVkJrRDR6RXN2djNWR003NUlUVzN6MCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LmJlZWFuZGhvbmV5LmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772306427),
('y2nnviJMtKbaMkJkHwjJFfiS9jzpYrHDT7uIiVjz', NULL, '2a09:bac2:4239:265a::3d2:23', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.1.1 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTjVOeXFEMDhkOENXU0lhNm8wbkVJN2pyWFpKMDRtOVNuUFpmMlJScyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LmJlZWFuZGhvbmV5LmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772304866),
('y3YiKHft3mlZpE8ZEef2gB9T1Xm9OD5qIXnjUi7R', NULL, '57.129.52.83', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTndRMERkZ3NRRFVKM2NPY1dTdFNIS2h1cGxhY0k0R2lHa1FnSEJMcCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LmJlZWFuZGhvbmV5LmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772307264),
('zAnD0pIBOVLIxi7T4Sne8aBKeRgoDRfh3gxyVIjb', NULL, '2a03:2880:11ff:4b::', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieTFIN3pkNEJtcDZtUEdQTmxnOFhvNUFGOFV5TkZ3TG01UXRvYVFOUiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vd3d3LmJlZWFuZGhvbmV5LmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1772278197);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$NLkHKzoCM/dicwwHXTypqexDhUOnQHccQ7K0lIjqRrKlhqk1AAVBa', 'LRnBTwjjbxCzR3jMgvfw5eW4YiYnmmabOmEIsDtQgoMEgS0BEbuZ0jF52MDW', '2026-01-06 14:31:41', '2026-01-06 14:31:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `seo_meta`
--
ALTER TABLE `seo_meta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seo_meta_page_unique` (`page`);

--
-- Indexes for table `seo_settings`
--
ALTER TABLE `seo_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `seo_meta`
--
ALTER TABLE `seo_meta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seo_settings`
--
ALTER TABLE `seo_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
