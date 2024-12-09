-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 12, 2024 at 08:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecoom5`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `isActive` tinyint(4) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `building` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `lat` double NOT NULL,
  `longg` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `isActive`, `country`, `city`, `street`, `building`, `note`, `lat`, `longg`, `created_at`, `updated_at`) VALUES
(36, 89, 0, 'اليمن', 'إب ', 'السبل ', '737', 'جوار ون مول', 18.315156991452213, 42.69270848482847, '2024-10-11 14:24:02', '2024-10-11 14:24:02');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `description_ar` mediumtext DEFAULT NULL,
  `description_en` mediumtext DEFAULT NULL,
  `logo_url` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_en`, `name_ar`, `description_ar`, `description_en`, `logo_url`, `website_url`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 'DeWalt ', 'دي والت', 'معروفة بالأدوات الكهربائية القوية والمتينة.', 'Known for its powerful and durable power tools.', 'https://upload.wikimedia.org/wikipedia/commons/8/89/DeWalt_Logo.svg', 'https://commons.wikimedia.org/wiki/File:DeWalt_Logo.svg', '2024-09-28 09:10:27', '2024-09-28 09:10:27', 1),
(2, 'Knauf ', 'كي نوف', 'معروفة بالأدوات الكهربائية القوية والمتينة.', 'Known for its powerful and durable power tools.', 'https://upload.wikimedia.org/wikipedia/commons/8/89/DeWalt_Logo.svg', 'https://commons.wikimedia.org/wiki/File:DeWalt_Logo.svg', '2024-09-28 09:10:27', '2024-09-28 12:54:54', 1),
(3, 'Cemex  ', 'سيميكس', 'معروفة بالأدوات الكهربائية القوية والمتينة.', 'Known for its powerful and durable power tools.', 'https://upload.wikimedia.org/wikipedia/commons/8/89/DeWalt_Logo.svg', 'https://commons.wikimedia.org/wiki/File:DeWalt_Logo.svg', '2024-09-28 09:10:27', '2024-09-28 09:10:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('2d0c8af807ef45ac17cafb2973d866ba8f38caa9', 'i:1;', 1728682447),
('2d0c8af807ef45ac17cafb2973d866ba8f38caa9:timer', 'i:1728682447;', 1728682447);

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
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `item_id`, `order`, `created_at`, `updated_at`) VALUES
(293, 89, 13, 0, '2024-10-11 13:58:00', '2024-10-11 13:58:00'),
(294, 89, 13, 0, '2024-10-11 13:58:00', '2024-10-11 13:58:00'),
(296, 89, 14, 0, '2024-10-11 14:03:49', '2024-10-11 14:03:49'),
(297, 89, 14, 0, '2024-10-11 14:07:41', '2024-10-11 14:07:41'),
(298, 89, 14, 0, '2024-10-11 14:07:42', '2024-10-11 14:07:42');

-- --------------------------------------------------------

--
-- Stand-in structure for view `cartview`
-- (See below for the actual view)
--
CREATE TABLE `cartview` (
`old_price` double
,`new_price` double
,`item_price_discount` double
,`count_items` bigint(21)
,`id` int(11)
,`name_en` varchar(100)
,`name_ar` varchar(100)
,`descr_en` varchar(255)
,`descr_ar` varchar(255)
,`one_img` varchar(255)
,`second_img` varchar(255)
,`three_img` varchar(255)
,`four_img` varchar(255)
,`five_img` varchar(255)
,`count` int(11)
,`active` tinyint(4)
,`price` double
,`discount` tinyint(4)
,`category_id` int(11)
,`long_descr_en` varchar(255)
,`long_descr_ar` varchar(255)
,`color_id` int(11)
,`size_id` int(11)
,`brand_id` int(11)
,`created_at` timestamp
,`updated_at` timestamp
,`itemColorEn` varchar(50)
,`itemColorAr` varchar(50)
,`itemSizeEn` varchar(50)
,`itemSizeAr` varchar(50)
,`price_discount` double
,`cat_id` int(11)
,`name_cat_en` varchar(100)
,`name_cat_ar` varchar(100)
,`discr_en` varchar(255)
,`discr_ar` varchar(255)
,`img_svg` varchar(255)
,`img` varchar(255)
,`cat_created_at` timestamp
,`brands_name_ar` varchar(255)
,`brands_name_en` varchar(255)
,`description_ar` mediumtext
,`description_en` mediumtext
,`logo_url` varchar(255)
,`is_active` tinyint(1)
,`cat_updated_at` timestamp
,`cart_id` int(11)
,`user_id` int(11)
,`cart_item_id` int(11)
,`cart_order` int(11)
,`cart_created_at` timestamp
,`cart_updated_at` timestamp
,`descr_en_coupon` varchar(50)
,`descr_ar_coupon` varchar(255)
,`code` varchar(100)
,`category_id_coupon` int(11)
,`discount_coupon` smallint(6)
,`expired_date` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `discr_en` varchar(255) NOT NULL,
  `discr_ar` varchar(255) NOT NULL,
  `img_svg` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `paret_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_en`, `name_ar`, `discr_en`, `discr_ar`, `img_svg`, `img`, `created_at`, `updated_at`, `paret_id`) VALUES
(1, 'Tools & equipment', ' المعدات', 'Accessories include a variety of products such as bags, scarves, jewelry, hats, and sunglasses.', 'تشمل الإكسسوارات مجموعة متنوعة من المنتجات مثل الحقائب، الأوشحة، الحلي، القبعات، والنظارات الشمسية', 'EQUIPMENTS.jpg', 'EQUIPMENTS.jpg', '2024-09-10 08:18:15', '2024-09-10 08:18:15', 'NULL'),
(2, 'Metals and iron', 'السباكة ', 'In the Accessories category, items are typically complementary products designed to enhance style, functionality, or convenience. This category includes:\r\n\r\nJewelry (necklaces, bracelets, earrings)\r\nBags (handbags, backpacks, clutches)\r\nHats & Scarves (ca', 'في فئة الملحقات، تكون العناصر عادةً منتجات تكميلية مصممة لتحسين الأسلوب أو الوظيفة أو الراحة. تشمل هذه الفئة:\n\nالمجوهرات (القلائد والأساور والأقراط)\nالحقائب (حقائب اليد، حقائب الظهر، حقائب اليد)\nالقبعات والأوشحة (قبعات، قبعات صغيرة، شالات)\nالأحزمة (أحزمة ', 'plumbing_16820.png', 'General-Plumbing-1024x566.jpg', '2023-10-15 16:22:54', '2024-09-23 08:48:42', 'NULL'),
(3, 'electricity', 'الكهرباء ', 'Electrical wires and cables\r\nSockets and switches\r\nLamps and bulbs\r\nDistribution and electricity panels', 'الأسلاك الكهربائية والكابلات\r\nالمقابس والمفاتيح\r\nالمصابيح واللمبات\r\nلوحات التوزيع والكهرباء', 'electricity.png', 'qualified-electrical-worker.jpg', '2024-09-23 09:43:38', '2024-09-23 09:43:38', 'NULL'),
(4, 'Insulators', 'العوازل ', 'Thermal insulators\r\nWater insulators\r\nInsulating tapes', 'العوازل الحرارية\r\nالعوازل المائية\r\nالأشرطة العازلة', '3501955.png', 'what-does-an-insulation-worker-do.jpg', '2024-09-23 09:49:04', '2024-09-23 09:49:04', 'NULL'),
(5, 'Paints and finishes\r\n', 'الدهانات', 'Interior and exterior paints\r\nVarnish and surface protection materials\r\nPainting tools (brushes, rollers)', 'الدهانات الداخلية والخارجية\r\nورنيش ومواد حماية الأسطح\r\nأدوات الدهان (فراشي، بكرات)', '1497707.png', '2021-12-defaut-de-peinture.jpg', '2024-09-23 10:01:40', '2024-09-23 10:01:40', 'NULL'),
(6, 'hguffuy', 'مفاتيح ', '0000000000', '00000000000000000', 'd7a9c08b-e4ca-41d1-8f20-0e481262f092.jpg', 'd7a9c08b-e4ca-41d1-8f20-0e481262f092.jpg', '2024-09-26 09:33:23', '2024-09-26 09:33:23', '3'),
(7, 'Tools & equipment', 'الحفريات', 'Accessories include a variety of products such as bags, scarves, jewelry, hats, and sunglasses.', 'تشمل الإكسسوارات مجموعة متنوعة من المنتجات مثل الحقائب، الأوشحة، الحلي، القبعات، والنظارات الشمسية', 'EQUIPMENTS.jpg', '43.png', '2024-09-10 08:18:15', '2024-09-10 08:18:15', '8'),
(8, 'Tools & equipment', ' مثاقب ', 'Accessories include a variety of products such as bags, scarves, jewelry, hats, and sunglasses.', 'تشمل الإكسسوارات مجموعة متنوعة من المنتجات مثل الحقائب، الأوشحة، الحلي، القبعات، والنظارات الشمسية', 'pngtree-yellow-electric-drill-image_1191600.jpg', 'pngtree-yellow-electric-drill-image_1191600.jpg', '2024-09-10 08:18:15', '2024-09-10 08:18:15', '3'),
(9, 'Metals and iron', 'مفكات', 'In the Accessories category, items are typically complementary products designed to enhance style, functionality, or convenience. This category includes:\r\n\r\nJewelry (necklaces, bracelets, earrings)\r\nBags (handbags, backpacks, clutches)\r\nHats & Scarves (ca', 'في فئة الملحقات، تكون العناصر عادةً منتجات تكميلية مصممة لتحسين الأسلوب أو الوظيفة أو الراحة. تشمل هذه الفئة:\n\nالمجوهرات (القلائد والأساور والأقراط)\nالحقائب (حقائب اليد، حقائب الظهر، حقائب اليد)\nالقبعات والأوشحة (قبعات، قبعات صغيرة، شالات)\nالأحزمة (أحزمة ', '41mHFYECg-L._SL500_._AC_SL500_.jpg', '41mHFYECg-L._SL500_._AC_SL500_.jpg', '2023-10-15 16:22:54', '2024-09-23 08:48:42', '3'),
(10, 'electricity', 'الكهرباء ', 'Electrical wires and cables\r\nSockets and switches\r\nLamps and bulbs\r\nDistribution and electricity panels', 'الأسلاك الكهربائية والكابلات\r\nالمقابس والمفاتيح\r\nالمصابيح واللمبات\r\nلوحات التوزيع والكهرباء', 'electricity.png', 'qualified-electrical-worker.jpg', '2024-09-23 09:43:38', '2024-09-23 09:43:38', 'NULL'),
(11, 'Insulators', 'العوازل ', 'Thermal insulators\r\nWater insulators\r\nInsulating tapes', 'العوازل الحرارية\r\nالعوازل المائية\r\nالأشرطة العازلة', '3501955.png', 'what-does-an-insulation-worker-do.jpg', '2024-09-23 09:49:04', '2024-09-23 09:49:04', 'NULL'),
(12, 'Paints and finishes\r\n', 'الدهانات', 'Interior and exterior paints\r\nVarnish and surface protection materials\r\nPainting tools (brushes, rollers)', 'الدهانات الداخلية والخارجية\r\nورنيش ومواد حماية الأسطح\r\nأدوات الدهان (فراشي، بكرات)', '1497707.png', '2021-12-defaut-de-peinture.jpg', '2024-09-23 10:01:40', '2024-09-23 10:01:40', 'NULL'),
(13, 'hguffuy', 'انارات', '0000000000', '00000000000000000', '51TCSjmbCNL._AC_SX522_.jpg', '51TCSjmbCNL._AC_SX522_.jpg', '2024-09-26 09:33:23', '2024-09-26 09:33:23', '3'),
(14, 'Tools & equipment', 'خرسانة', 'Accessories include a variety of products such as bags, scarves, jewelry, hats, and sunglasses.', 'تشمل الإكسسوارات مجموعة متنوعة من المنتجات مثل الحقائب، الأوشحة، الحلي، القبعات، والنظارات الشمسية', 'batch-upload_1899ed3a-936c-4673-b7e5-e8a078687f97.jpg', 'EQUIPMENTS.jpg', '2024-09-10 08:18:15', '2024-09-10 08:18:15', 'NULL'),
(15, 'Tools & equipment', 'اجهزة اللحام', 'Accessories include a variety of products such as bags, scarves, jewelry, hats, and sunglasses.', 'تشمل الإكسسوارات مجموعة متنوعة من المنتجات مثل الحقائب، الأوشحة، الحلي، القبعات، والنظارات الشمسية', 'H4ec70178a5ef48bdb3a74d77e196dcfbV.jpg_720x720q50.jpg', 'H4ec70178a5ef48bdb3a74d77e196dcfbV.jpg_720x720q50.jpg', '2024-09-10 08:18:15', '2024-09-10 08:18:15', '6'),
(16, 'Metals and iron', 'طواحين', 'In the Accessories category, items are typically complementary products designed to enhance style, functionality, or convenience.', 'في فئة الملحقات، تكون العناصر عادةً منتجات تكميلية مصممة لتحسين الأسلوب أو الوظيفة أو الراحة.', 'images.jpeg', 'images.jpeg', '2023-10-15 16:22:54', '2024-09-23 08:48:42', '6'),
(17, 'electricity', 'الكهرباء', 'Electrical wires and cables. Sockets and switches. Lamps and bulbs. Distribution and electricity panels.', 'الأسلاك الكهربائية والكابلات. المقابس والمفاتيح. المصابيح واللمبات. لوحات التوزيع والكهرباء.', 'electricity.png', 'qualified-electrical-worker.jpg', '2024-09-23 09:43:38', '2024-09-23 09:43:38', '1'),
(18, 'Insulators', 'العوازل', 'Thermal insulators. Water insulators. Insulating tapes.', 'العوازل الحرارية. العوازل المائية. الأشرطة العازلة.', '3501955.png', 'what-does-an-insulation-worker-do.jpg', '2024-09-23 09:49:04', '2024-09-23 09:49:04', '1'),
(19, 'Paints and finishes', 'الدهانات', 'Interior and exterior paints. Varnish and surface protection materials. Painting tools (brushes, rollers).', 'الدهانات الداخلية والخارجية. ورنيش ومواد حماية الأسطح. أدوات الدهان (فراشي، بكرات).', '1497707.png', '2021-12-defaut-de-peinture.jpg', '2024-09-23 10:01:40', '2024-09-23 10:01:40', '1');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `descr_en` varchar(50) NOT NULL,
  `descr_ar` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `discount` smallint(6) NOT NULL,
  `expired_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `user_id`, `descr_en`, `descr_ar`, `code`, `category_id`, `count`, `discount`, `expired_date`, `created_at`, `updated_at`) VALUES
(5, 89, ' discount on plumbing tools', 'خصم على ادوات السباكه', 'PLUMING50', 2, 20, 12, '2024-10-09 09:35:17', '2024-09-24 11:07:05', '2024-09-24 11:07:05'),
(6, 89, 'discount on electrical tools', 'خصم  على ادوات الكهرباء', 'PLUMING60', 3, 14, 34, '2024-10-09 09:35:20', '2024-09-24 11:07:05', '2024-09-24 11:07:05'),
(7, 89, 'sdfsdf', 'سيبسيب', '24334', 13, 3, 23, '2024-10-16 21:00:00', '2024-10-11 17:02:57', '2024-10-11 17:02:57');

-- --------------------------------------------------------

--
-- Stand-in structure for view `coupon_user_category_view`
-- (See below for the actual view)
--
CREATE TABLE `coupon_user_category_view` (
`coupon_id` int(11)
,`user_id` int(11)
,`discount` smallint(6)
,`id` int(11)
,`expired_date` timestamp
,`name` varchar(255)
,`email` varchar(255)
,`code` varchar(100)
,`descr_en` varchar(50)
,`descr_ar` varchar(255)
,`name_en` varchar(100)
,`name_ar` varchar(100)
,`img_svg` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `deliverytypes`
--

CREATE TABLE `deliverytypes` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliverytypes`
--

INSERT INTO `deliverytypes` (`id`, `name_en`, `name_ar`, `img`, `isActive`, `created_at`, `updated_at`) VALUES
(1, 'zagel', 'زاجل', 'zagel.jpg', 1, '2024-09-14 11:34:41', '2024-09-14 11:34:41'),
(2, 'Fedex', 'فيديكس', 'Fedex-logo.png', 1, '2024-09-22 14:12:16', '2024-09-22 14:12:16'),
(3, 'aramex', 'ارامكس', 'Aramex-logo (2).png', 1, '2024-09-22 14:16:04', '2024-09-22 14:16:04');

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
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `item_id`, `created_at`, `updated_at`) VALUES
(10, 89, 13, '2024-10-11 13:35:09', '2024-10-11 13:35:09');

-- --------------------------------------------------------

--
-- Stand-in structure for view `favoriteview`
-- (See below for the actual view)
--
CREATE TABLE `favoriteview` (
`users_id` int(11)
,`favorite_id` int(11)
,`user_id` int(11)
,`favorite_item_id` int(11)
,`favorites_created_at` timestamp
,`favorites_updated_at` timestamp
,`name_en` varchar(100)
,`name_ar` varchar(100)
,`price` double
,`discount` tinyint(4)
,`itemPriceDiscount` double
,`one_img` varchar(255)
,`sum_rating` double
,`avg_rating` double
,`active` tinyint(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `fullitemsview`
-- (See below for the actual view)
--
CREATE TABLE `fullitemsview` (
`id` int(11)
,`name_en` varchar(100)
,`name_ar` varchar(100)
,`descr_en` varchar(255)
,`descr_ar` varchar(255)
,`one_img` varchar(255)
,`second_img` varchar(255)
,`three_img` varchar(255)
,`four_img` varchar(255)
,`five_img` varchar(255)
,`count` int(11)
,`active` tinyint(4)
,`price` double
,`discount` tinyint(4)
,`category_id` int(11)
,`long_descr_en` varchar(255)
,`long_descr_ar` varchar(255)
,`color_id` int(11)
,`size_id` int(11)
,`brand_id` int(11)
,`created_at` timestamp
,`updated_at` timestamp
,`itemColorEn` varchar(50)
,`itemColorAr` varchar(50)
,`itemSizeEn` varchar(50)
,`itemSizeAr` varchar(50)
,`price_discount` double
,`cat_id` int(11)
,`name_cat_en` varchar(100)
,`name_cat_ar` varchar(100)
,`discr_en` varchar(255)
,`discr_ar` varchar(255)
,`img_svg` varchar(255)
,`img` varchar(255)
,`cat_created_at` timestamp
,`brands_name_ar` varchar(255)
,`brands_name_en` varchar(255)
,`description_ar` mediumtext
,`description_en` mediumtext
,`logo_url` varchar(255)
,`is_active` tinyint(1)
,`cat_updated_at` timestamp
,`avg_star1` double
,`avg_star2` double
,`avg_star3` double
,`avg_star4` double
,`sum_star5` double
,`sum_rating` double
,`avg_rating` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `fullorderview`
-- (See below for the actual view)
--
CREATE TABLE `fullorderview` (
`order_id` int(11)
,`coupon_discount` smallint(6)
,`order_user_id` int(11)
,`address_id` int(11)
,`deliverytype_id` int(11)
,`payement_id` int(4)
,`status` int(11)
,`price_delivery` double
,`order_price` double
,`total_price` double
,`orderprocesstype_id` int(11)
,`coupon_id` int(11)
,`tracking_number` varchar(255)
,`rating` float
,`comment` varchar(255)
,`orders_created_at` timestamp
,`orders_updated_at` timestamp
,`cart_Item_price` double
,`precentage_value_discount` double
,`item_price_discount` double
,`id` int(11)
,`name_en` varchar(100)
,`name_ar` varchar(100)
,`descr_en` varchar(255)
,`descr_ar` varchar(255)
,`one_img` varchar(255)
,`second_img` varchar(255)
,`three_img` varchar(255)
,`four_img` varchar(255)
,`five_img` varchar(255)
,`count` int(11)
,`active` tinyint(4)
,`price` double
,`discount` tinyint(4)
,`category_id` int(11)
,`long_descr_en` varchar(255)
,`long_descr_ar` varchar(255)
,`color_id` int(11)
,`size_id` int(11)
,`brand_id` int(11)
,`created_at` timestamp
,`updated_at` timestamp
,`order` int(11)
,`country` varchar(255)
,`city` varchar(255)
,`street` varchar(255)
,`building` varchar(255)
,`note` varchar(255)
,`lat` double
,`longg` double
,`expired_date` timestamp
,`orderprocesstypes_id` int(11)
,`orderprocesstypes_name_en` varchar(255)
,`orderprocesstypes_name_ar` varchar(255)
,`orderprocesstypes_created_at` timestamp
,`orderprocesstypes_updated_at` timestamp
,`deliveryTypes_name_en` varchar(255)
,`deliveryTypes_name_ar` varchar(255)
,`deliverytypes_img` varchar(255)
,`deliverytypes_created_at` timestamp
,`deliverytypes_updated_at` timestamp
,`payment_name_en` varchar(255)
,`payment_name_ar` varchar(255)
,`payments_img` varchar(255)
,`payments_created_at` timestamp
,`payments_updated_at` timestamp
,`statues_orders_name_en` varchar(255)
,`statues_orders_name_ar` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `name_ar` varchar(100) NOT NULL,
  `descr_en` varchar(255) NOT NULL,
  `descr_ar` varchar(255) NOT NULL,
  `one_img` varchar(255) NOT NULL,
  `second_img` varchar(255) NOT NULL,
  `three_img` varchar(255) NOT NULL,
  `four_img` varchar(255) NOT NULL,
  `five_img` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `price` double DEFAULT 0,
  `discount` tinyint(4) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `long_descr_en` varchar(255) NOT NULL,
  `long_descr_ar` varchar(255) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name_en`, `name_ar`, `descr_en`, `descr_ar`, `one_img`, `second_img`, `three_img`, `four_img`, `five_img`, `count`, `active`, `price`, `discount`, `category_id`, `long_descr_en`, `long_descr_ar`, `color_id`, `size_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(13, 'ESTWING Hammer ', 'مطرقة إستوينج الاصلي', 'brand addidas', 'مطرقة روك بيك من استوينج - مطرقة جيولوجية 22 اونصة مع طرف مدبب ومقبض ضد الصدمات', '718GmjiwbAL._AC_SX679_.jpg', '610YQ7ugOCL._AC_SX679_.jpg', '71MkPjCcMGL._AC_SX679_.jpg', '618EW1uzxIL._AC_SX679_.jpg', '616099ssVQL._AC_SX679_.jpg', 21, 1, 80, 10, 8, 'Turkish sports shoes characterized by elegance and simplicity with great attention to quality and durability. It uses high-quality materials such as natural fabrics or technical fabrics that provide excellent comfort and support for the foot. Durable rubb', 'حذاء رياضي تركي يتميز بالأناقة والبساطة مع الاهتمام الكبير بالجودة والمتانة. يستخدم مواد عالية الجودة مثل الأقمشة الطبيعية أو الأقمشة التقنية التي توفر راحة ودعم ممتازين للقدم. نعل مطاطي متين يوفر الثبات والقبضة القوية على مختلف المستويات', 1, 1, 3, '2024-09-28 17:19:12', '2024-09-28 17:19:12'),
(14, 'Mini Chainsaw', 'منشار كهربائي', 'Compact power tool designed for cutting wood, metal and plastic', 'أداة كهربائية مدمجة مصممة لقطع الأخشاب والمعادن والبلاستيك', '81ghlcYsQJL._AC_SX679_.jpg', '61m+fgd-slL._AC_SX679_.jpg', '61VgK6zwoKL._AC_SX679_.jpg', '81meVo8p2-L._AC_SY679_.jpg', '614mnBjw2hL._AC_SX679_.jpg', 22, 1, 90, 25, 3, 'The mini chainsaw is a compact power tool designed to cut wood, metal and plastic with ease and precision. Its small size makes it suitable for use in tight spaces or jobs that require precise control.\\r\\n\\r\\nMain Specifications:\\r\\nMotor: Powered by an e', 'المنشار الكهربائي الصغير هو أداة كهربائية مدمجة مصممة لقطع الأخشاب والمعادن والبلاستيك بسهولة ودقة. يتميز بحجمه الصغير الذي يجعله مناسبًا للاستخدام في الأماكن الضيقة أو الأعمال التي تتطلب تحكمًا دقيقًا.\\r\\n\\r\\nمواصفات رئيسية:\\r\\nالمحرك: يعمل بمحرك كهربائي', 2, 2, 1, '2024-09-28 17:24:07', '2024-09-28 17:24:07'),
(15, 'ESTWING Hammer', 'فرشة طلاء', 'It is used in painting walls, and it can be used in the process of installing wallpaper by spreading the wallpaper with glue\n', 'ستخدم في طلاء الجدران, ويمكن استخدامها في عملية تركيب ورق الجدران عن طريق دهن ورق الجدران بالغراء', '61RvRu4xAfL._AC_SX522_.jpg', '81cDGFNlOsL._AC_SX522_.jpg', '81cDGFNlOsL._AC_SX522_.jpg', '81cDGFNlOsL._AC_SX522_.jpg', '81cDGFNlOsL._AC_SX522_.jpg', 22, 1, 100, 15, 6, 'Turkish sports shoes characterized by elegance and simplicity with great attention to quality and durability. It uses high-quality materials such as natural fabrics or technical fabrics that provide excellent comfort and support for the foot. Durable rubb', 'حذاء رياضي تركي يتميز بالأناقة والبساطة مع الاهتمام الكبير بالجودة والمتانة. يستخدم مواد عالية الجودة مثل الأقمشة الطبيعية أو الأقمشة التقنية التي توفر راحة ودعم ممتازين للقدم. نعل مطاطي متين يوفر الثبات والقبضة القوية على مختلف المستويات', 3, 3, 2, '2024-09-28 17:28:17', '2024-09-28 17:28:17'),
(16, 'Mini Chainsaw', 'متر أوتوماكس', 'Compact power tool designed for cutting wood, metal and plastic', 'أداة كهربائية مدمجة مصممة لقطع الأخشاب والمعادن', '71SEo3iJVqL._AC_SX679_.jpg', '81ghlcYsQJL._AC_SX679_.jpg', '81ghlcYsQJL._AC_SX679_.jpg', '81ghlcYsQJL._AC_SX679_.jpg', '81ghlcYsQJL._AC_SX679_.jpg', 21, 1, 120, 19, 3, 'The mini chainsaw is a compact power tool designed to cut wood, metal and plastic with ease and precision. Its small size makes it suitable for use in tight spaces or jobs that require precise control.\\r\\n\\r\\nMain Specifications:\\r\\nMotor: Powered by an e', 'المنشار الكهربائي الصغير هو أداة كهربائية مدمجة مصممة لقطع الأخشاب والمعادن والبلاستيك بسهولة ودقة. يتميز بحجمه الصغير الذي يجعله مناسبًا للاستخدام في الأماكن الضيقة أو الأعمال التي تتطلب تحكمًا دقيقًا.\\r\\n\\r\\nمواصفات رئيسية:\\r\\nالمحرك: يعمل بمحرك كهربائي', 3, 3, 1, '2024-09-28 17:35:19', '2024-09-28 17:35:19'),
(22, 'dffd', 'dfd', 'df', 'dfd', '01J9YQA0SPM6FTG5Z5PC6Y68DX.png', '01J9YQA0ST0GQABRX56782MW55.png', '01J9YQA0SYBJR2MMDMVHWJ1JNE.png', '01J9YQA0SZZ39XYBEGWRNFM0SA.png', '01J9YQA0T1PY1XRMWVMGCVZ190.png', 34, 1, 34, 34, 17, '43', '4', 0, 0, 1, '2024-10-11 18:21:13', '2024-10-11 18:21:13');

-- --------------------------------------------------------

--
-- Stand-in structure for view `itemsview`
-- (See below for the actual view)
--
CREATE TABLE `itemsview` (
`id` int(11)
,`name_en` varchar(100)
,`name_ar` varchar(100)
,`descr_en` varchar(255)
,`descr_ar` varchar(255)
,`one_img` varchar(255)
,`second_img` varchar(255)
,`three_img` varchar(255)
,`four_img` varchar(255)
,`five_img` varchar(255)
,`count` int(11)
,`active` tinyint(4)
,`price` double
,`discount` tinyint(4)
,`category_id` int(11)
,`long_descr_en` varchar(255)
,`long_descr_ar` varchar(255)
,`color_id` int(11)
,`size_id` int(11)
,`brand_id` int(11)
,`created_at` timestamp
,`updated_at` timestamp
,`itemColorEn` varchar(50)
,`itemColorAr` varchar(50)
,`itemSizeEn` varchar(50)
,`itemSizeAr` varchar(50)
,`price_discount` double
,`cat_id` int(11)
,`name_cat_en` varchar(100)
,`name_cat_ar` varchar(100)
,`discr_en` varchar(255)
,`discr_ar` varchar(255)
,`img_svg` varchar(255)
,`img` varchar(255)
,`cat_created_at` timestamp
,`brands_name_ar` varchar(255)
,`brands_name_en` varchar(255)
,`description_ar` mediumtext
,`description_en` mediumtext
,`logo_url` varchar(255)
,`is_active` tinyint(1)
,`cat_updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `items_colors`
--

CREATE TABLE `items_colors` (
  `id` int(11) NOT NULL,
  `itemColorEn` varchar(50) DEFAULT NULL,
  `itemColorAr` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items_colors`
--

INSERT INTO `items_colors` (`id`, `itemColorEn`, `itemColorAr`, `created_at`, `updated_at`) VALUES
(1, 'Red', 'احمر', '2024-10-11 21:26:52', '2024-10-11 21:27:15'),
(2, 'Blue', 'ازرق', '2024-10-11 21:26:52', '2024-10-11 21:27:15'),
(3, 'Green', 'اخضر', '2024-10-11 21:26:52', '2024-10-11 21:27:15'),
(4, 'Brown', 'بني', '2024-10-11 21:26:52', '2024-10-11 21:27:15'),
(5, 'Yellow', 'اصفر', '2024-10-11 21:26:52', '2024-10-11 21:27:15'),
(6, 'black', 'اسود', '2024-10-11 21:26:52', '2024-10-11 21:27:15'),
(7, 'whait', 'ابيض', '2024-10-11 21:26:52', '2024-10-11 21:27:15'),
(8, 'pink', 'وردي', '2024-10-11 21:26:52', '2024-10-11 21:27:15'),
(9, 'silver', 'فضي', '2024-10-11 21:26:52', '2024-10-11 21:27:15'),
(10, 'hh', 'jhg', '2024-10-11 18:27:19', '2024-10-11 18:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `items_sizes`
--

CREATE TABLE `items_sizes` (
  `id` int(11) NOT NULL,
  `itemSizeAr` varchar(50) DEFAULT NULL,
  `itemSizeEn` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items_sizes`
--

INSERT INTO `items_sizes` (`id`, `itemSizeAr`, `itemSizeEn`, `created_at`, `updated_at`) VALUES
(1, '9.5', '9.5', '2024-10-11 21:29:11', '2024-10-11 21:29:11'),
(2, '8.2', '8.2', '2024-10-11 21:29:11', '2024-10-11 21:29:11'),
(3, '4.7', '4.7', '2024-10-11 21:29:11', '2024-10-11 21:29:11'),
(4, '4', '7', '2024-10-11 18:30:35', '2024-10-11 18:30:35');

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
(4, '2024_09_07_195858_create_addresses_table', 1),
(5, '2024_09_07_195944_create_categories_table', 1),
(6, '2024_09_07_195945_create_products_table', 1),
(7, '2024_09_07_200002_create_orders_table', 1),
(8, '2024_09_07_200039_create_order_items_table', 1),
(9, '2024_09_07_200103_create_payments_table', 1),
(10, '2024_09_07_200419_create_carts_table', 1),
(11, '2024_09_07_200441_create_shipments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `onlyfullorderview`
-- (See below for the actual view)
--
CREATE TABLE `onlyfullorderview` (
`order_id` int(11)
,`coupon_discount` smallint(6)
,`order_user_id` int(11)
,`address_id` int(11)
,`deliverytype_id` int(11)
,`payement_id` int(4)
,`status` int(11)
,`price_delivery` double
,`order_price` double
,`total_price` double
,`orderprocesstype_id` int(11)
,`coupon_id` int(11)
,`tracking_number` varchar(255)
,`rating` float
,`comment` varchar(255)
,`orders_created_at` timestamp
,`orders_updated_at` timestamp
,`cart_Item_price` double
,`precentage_value_discount` double
,`item_price_discount` double
,`id` int(11)
,`name_en` varchar(100)
,`name_ar` varchar(100)
,`descr_en` varchar(255)
,`descr_ar` varchar(255)
,`one_img` varchar(255)
,`second_img` varchar(255)
,`three_img` varchar(255)
,`four_img` varchar(255)
,`five_img` varchar(255)
,`count` int(11)
,`active` tinyint(4)
,`price` double
,`discount` tinyint(4)
,`category_id` int(11)
,`long_descr_en` varchar(255)
,`long_descr_ar` varchar(255)
,`color_id` int(11)
,`size_id` int(11)
,`brand_id` int(11)
,`created_at` timestamp
,`updated_at` timestamp
,`order` int(11)
,`country` varchar(255)
,`city` varchar(255)
,`street` varchar(255)
,`building` varchar(255)
,`note` varchar(255)
,`lat` double
,`longg` double
,`expired_date` timestamp
,`orderprocesstypes_id` int(11)
,`orderprocesstypes_name_en` varchar(255)
,`orderprocesstypes_name_ar` varchar(255)
,`orderprocesstypes_created_at` timestamp
,`orderprocesstypes_updated_at` timestamp
,`deliveryTypes_name_en` varchar(255)
,`deliveryTypes_name_ar` varchar(255)
,`deliverytypes_img` varchar(255)
,`deliverytypes_created_at` timestamp
,`deliverytypes_updated_at` timestamp
,`payment_name_en` varchar(255)
,`payment_name_ar` varchar(255)
,`payments_img` varchar(255)
,`payments_created_at` timestamp
,`payments_updated_at` timestamp
,`statues_orders_name_en` varchar(255)
,`statues_orders_name_ar` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `orderprocesstypes`
--

CREATE TABLE `orderprocesstypes` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `forUser` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderprocesstypes`
--

INSERT INTO `orderprocesstypes` (`id`, `name_en`, `name_ar`, `forUser`, `created_at`, `updated_at`) VALUES
(1, 'processing', 'قيد المعالجة', 0, '2024-09-14 11:35:21', '2024-09-14 11:35:21'),
(2, 'delivered\r\n', 'تم توصيلها\r\n', 0, '2024-09-15 12:01:32', '2024-09-15 12:01:32'),
(3, 'canelled', 'تم الغائها', 0, '2024-09-15 12:02:30', '2024-09-15 12:02:30'),
(9, 'Direct purchase and receipt', 'شراء واستلام مباشر', 0, '2024-09-17 12:19:04', '2024-09-17 12:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `deliverytype_id` int(11) NOT NULL,
  `payement_id` int(4) NOT NULL,
  `status` int(11) NOT NULL,
  `price_delivery` double NOT NULL,
  `price` double NOT NULL,
  `total_price` double NOT NULL,
  `orderprocesstype_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL DEFAULT 0,
  `tracking_number` varchar(255) NOT NULL DEFAULT 'Hdw4365',
  `rating` float NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `orders_with_orderprocesstypes`
-- (See below for the actual view)
--
CREATE TABLE `orders_with_orderprocesstypes` (
`id` int(11)
,`user_id` int(11)
,`address_id` int(11)
,`deliverytype_id` int(11)
,`payement_id` int(4)
,`status` int(11)
,`price_delivery` double
,`price` double
,`total_price` double
,`orderprocesstype_id` int(11)
,`coupon_id` int(11)
,`tracking_number` varchar(255)
,`rating` float
,`comment` varchar(255)
,`created_at` timestamp
,`updated_at` timestamp
,`process_type_id` int(11)
,`process_type_name_en` varchar(255)
,`process_type_name_ar` varchar(255)
,`process_type_created_at` timestamp
,`process_type_updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `orderview`
-- (See below for the actual view)
--
CREATE TABLE `orderview` (
`order_id` int(11)
,`coupon_discount` smallint(6)
,`order_user_id` int(11)
,`address_id` int(11)
,`deliverytype_id` int(11)
,`payement_id` int(4)
,`status` int(11)
,`price_delivery` double
,`order_price` double
,`total_price` double
,`orderprocesstype_id` int(11)
,`coupon_id` int(11)
,`tracking_number` varchar(255)
,`rating` float
,`comment` varchar(255)
,`orders_created_at` timestamp
,`orders_updated_at` timestamp
,`cart_Item_price` double
,`precentage_value_discount` double
,`item_price_discount` double
,`id` int(11)
,`name_en` varchar(100)
,`name_ar` varchar(100)
,`descr_en` varchar(255)
,`descr_ar` varchar(255)
,`one_img` varchar(255)
,`second_img` varchar(255)
,`three_img` varchar(255)
,`four_img` varchar(255)
,`five_img` varchar(255)
,`count` int(11)
,`active` tinyint(4)
,`price` double
,`discount` tinyint(4)
,`category_id` int(11)
,`long_descr_en` varchar(255)
,`long_descr_ar` varchar(255)
,`color_id` int(11)
,`size_id` int(11)
,`brand_id` int(11)
,`created_at` timestamp
,`updated_at` timestamp
,`order` int(11)
,`country` varchar(255)
,`city` varchar(255)
,`street` varchar(255)
,`building` varchar(255)
,`note` varchar(255)
,`lat` double
,`longg` double
,`expired_date` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `order_deliverytypes`
-- (See below for the actual view)
--
CREATE TABLE `order_deliverytypes` (
`order_id` int(11)
,`deliv_user_id` int(11)
,`deliveryTypes_id` int(11)
,`deliveryTypes_name_en` varchar(255)
,`deliveryTypes_name_ar` varchar(255)
,`deliveryTypes_image` varchar(255)
,`deliverytypes_created_at` timestamp
,`deliverytypes_updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `order_payment`
-- (See below for the actual view)
--
CREATE TABLE `order_payment` (
`order_id` int(11)
,`user_id` int(11)
,`payment_id` int(11)
,`payment_name_en` varchar(255)
,`payment_name_ar` varchar(255)
,`payment_image` varchar(255)
,`payments_created_at` timestamp
,`payments_updated_at` timestamp
);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name_en`, `name_ar`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Visa', 'مصرف مدى', 'visa.png', '2024-09-14 12:49:06', '2024-09-14 12:49:06'),
(2, 'Al-Rajhi', 'بنك الراجحي                                                                                                                                             ', 'images.png', '2024-09-22 10:25:48', '2024-09-22 10:25:48'),
(3, 'Inmaa', 'بنك البلاد', 'inmaa.png', '2024-09-22 12:31:06', '2024-09-22 12:31:06'),
(4, 'aljazira', 'بنك الجزيرة', 'al jazerah.jpg', '2024-09-22 13:14:54', '2024-09-22 13:14:54'),
(5, 'efs', 'sdf', 'images/payments/01J9YQZVWQYC25CZ7ERVW2B0E3.png', '2024-10-11 18:33:09', '2024-10-11 18:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `rating` float NOT NULL,
  `comment` varchar(255) NOT NULL,
  `star1` double NOT NULL DEFAULT 0,
  `star2` double NOT NULL DEFAULT 0,
  `star3` double NOT NULL DEFAULT 0,
  `star4` double NOT NULL DEFAULT 0,
  `star5` double NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `item_id`, `rating`, `comment`, `star1`, `star2`, `star3`, `star4`, `star5`, `created_at`, `updated_at`) VALUES
(0, 1, 1, 3, 'حلوووووووو', 0, 0, 3, 0, 0, '2024-09-14 07:04:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `ratingview`
-- (See below for the actual view)
--
CREATE TABLE `ratingview` (
`sum_rating` double
,`avg_rating` double
,`percent1` double
,`percent2` double
,`percent3` double
,`percent4` double
,`percent5` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `rating_comments_view`
-- (See below for the actual view)
--
CREATE TABLE `rating_comments_view` (
`image` varchar(255)
,`name` varchar(255)
,`img` varchar(255)
,`item_name_ar` varchar(100)
,`id` int(11)
,`user_id` int(11)
,`item_id` int(11)
,`rating` float
,`comment` varchar(255)
,`star1` double
,`star2` double
,`star3` double
,`star4` double
,`star5` double
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `rating` float NOT NULL,
  `comment` varchar(255) NOT NULL,
  `star1` double NOT NULL DEFAULT 0,
  `star2` double NOT NULL DEFAULT 0,
  `star3` double NOT NULL DEFAULT 0,
  `star4` double NOT NULL DEFAULT 0,
  `star5` double NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `item_id`, `rating`, `comment`, `star1`, `star2`, `star3`, `star4`, `star5`, `created_at`, `updated_at`) VALUES
(26, 89, 14, 3, 'هذا المنتج رائع جداً انصح الآخرين بشرائه', 0, 0, 3, 0, 0, '2024-10-11 13:08:40', '2024-10-11 13:08:40');

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
('p3p8zUugnu2qQofLuvTmWfMNIO3uPflE3SvVbS0R', 90, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoieUFKMXZXWm1aVXF2cnJXOTR5dkJheTREM296WHB0VGtFamt3RTlRcyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vc3RhdHVzLW9yZGVycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjkwO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkdUdERVZmU3dIcnlOQWRyTWc5anBidW5ZcktrQ0hzTE9zM1FKR2cxTVVDS2lXSGtBalhGVWkiO3M6ODoiZmlsYW1lbnQiO2E6MDp7fX0=', 1728682748);

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `shipment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(20) DEFAULT NULL,
  `shipping_country` varchar(100) DEFAULT NULL,
  `shipment_date` date NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `shipping_method` varchar(100) DEFAULT NULL,
  `shipping_status` varchar(50) DEFAULT 'Pending',
  `tracking_number` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statues_orders`
--

CREATE TABLE `statues_orders` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statues_orders`
--

INSERT INTO `statues_orders` (`id`, `name_en`, `name_ar`, `created_at`, `updated_at`) VALUES
(1, 'Your order is awaiting approval', 'في انتظار الموافقة', '2024-09-15 12:05:36', '2024-09-15 12:05:36'),
(2, 'Your order is being prepared now', 'يتم تحضير طلبيتك الان', '2024-09-15 12:06:53', '2024-09-15 12:06:53'),
(3, 'Your order is ready to be received by the delivery man', ' جاهز للاستلام من قبل رجل الوصيل', '2024-09-15 12:08:24', '2024-09-15 12:08:24'),
(4, 'Your order is now on the way to you', ' الان في الطريق قادم اليك', '2024-09-15 12:10:49', '2024-09-15 12:10:49'),
(5, 'Your order has been delivered', 'اصبح قريب من موقعك الحالي', '2024-09-15 12:14:06', '2024-09-15 12:14:06'),
(6, 'Your order has been paid for directly from the store', 'تم توصيل طلبيتك', '2024-09-15 12:14:06', '2024-09-15 12:14:06'),
(7, 'Your order has been cancelled', 'تم الغاء طلبيتك', '2024-09-15 12:14:06', '2024-09-15 12:14:06'),
(8, 'Your order has been paid for directly from the store', 'تم الاستلام من المتجر مباشرة', '2024-09-16 13:35:21', '2024-09-16 13:35:21'),
(9, 'Your order has been archived', 'تم ارشفة طلبيتك', '2024-09-17 10:20:40', '2024-09-17 10:20:40'),
(12, 'The customer\'s order has been prepared and ready for pickup', 'تم تحضير طلبية العميل , جاهزة للاستلام', '2024-09-19 13:11:34', '2024-09-19 13:11:34'),
(13, 'Payment has not been made', 'لم يتم الدفع', '2024-09-19 14:48:08', '2024-09-19 14:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `subcategory_name_ar` varchar(255) NOT NULL,
  `subcategory_name_en` varchar(255) NOT NULL,
  `subcategory_desc_ar` varchar(255) NOT NULL,
  `subcategory_desc_en` varchar(255) NOT NULL,
  `main_category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `token` varchar(1000) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `verifyCode` int(11) DEFAULT NULL,
  `approve` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `token`, `name`, `email`, `img`, `email_verified_at`, `password`, `phone`, `verifyCode`, `approve`, `image`, `birthdate`, `remember_token`, `created_at`, `updated_at`) VALUES
(89, 'cBveCGHeRU6HZjx6DaxVB-:APA91bGdEI__Zp8loChiGHQDcXwZhgSetyzGkbBVNlOFHRqXJGg6NSLv8uDSNUyfbHL8k4vq4fzHU3za0vJPW2y5akjLB6QqBZsT5uVd-yV_OJ9H4vYdbu8tqPECp9aSGx5TBVLd9QI5', 'سليمان عبدالرحمن عبدالله الصنعاني', 'sulaiman22@gmail.com', 'user4.jpg', '2024-10-09 07:47:31', '123456789', '3999869599898', 24787, 0, 'user4.jpg', NULL, NULL, '2024-10-09 07:47:31', '2024-10-09 07:47:31'),
(90, '', 'admin', 'a@a.com', NULL, '2024-10-11 15:31:38', '$2y$12$uGDEVfSwHryNAdrMg9jpbunYrKkCHsLOs3QJGg1MUCKiWHkAjXFUi', NULL, NULL, 0, NULL, NULL, NULL, '2024-10-11 12:31:38', '2024-10-11 12:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `id` int(11) NOT NULL,
  `items_id` int(11) NOT NULL,
  `color_ar` varchar(50) DEFAULT NULL,
  `color_en` varchar(50) DEFAULT NULL,
  `size_ar` varchar(50) DEFAULT NULL,
  `size_en` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `discount` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `sku` varchar(100) DEFAULT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `dimensions` varchar(100) DEFAULT NULL,
  `material_ar` varchar(100) DEFAULT NULL,
  `material_en` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure for view `cartview`
--
DROP TABLE IF EXISTS `cartview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cartview`  AS SELECT sum(`itemsview`.`price`) AS `old_price`, sum(`itemsview`.`price`) - sum(`itemsview`.`price` * `itemsview`.`discount` / 100) AS `new_price`, sum(`itemsview`.`price` * `itemsview`.`discount` / 100) AS `item_price_discount`, count(`carts`.`item_id`) AS `count_items`, `itemsview`.`id` AS `id`, `itemsview`.`name_en` AS `name_en`, `itemsview`.`name_ar` AS `name_ar`, `itemsview`.`descr_en` AS `descr_en`, `itemsview`.`descr_ar` AS `descr_ar`, `itemsview`.`one_img` AS `one_img`, `itemsview`.`second_img` AS `second_img`, `itemsview`.`three_img` AS `three_img`, `itemsview`.`four_img` AS `four_img`, `itemsview`.`five_img` AS `five_img`, `itemsview`.`count` AS `count`, `itemsview`.`active` AS `active`, `itemsview`.`price` AS `price`, `itemsview`.`discount` AS `discount`, `itemsview`.`category_id` AS `category_id`, `itemsview`.`long_descr_en` AS `long_descr_en`, `itemsview`.`long_descr_ar` AS `long_descr_ar`, `itemsview`.`color_id` AS `color_id`, `itemsview`.`size_id` AS `size_id`, `itemsview`.`brand_id` AS `brand_id`, `itemsview`.`created_at` AS `created_at`, `itemsview`.`updated_at` AS `updated_at`, `itemsview`.`itemColorEn` AS `itemColorEn`, `itemsview`.`itemColorAr` AS `itemColorAr`, `itemsview`.`itemSizeEn` AS `itemSizeEn`, `itemsview`.`itemSizeAr` AS `itemSizeAr`, `itemsview`.`price_discount` AS `price_discount`, `itemsview`.`cat_id` AS `cat_id`, `itemsview`.`name_cat_en` AS `name_cat_en`, `itemsview`.`name_cat_ar` AS `name_cat_ar`, `itemsview`.`discr_en` AS `discr_en`, `itemsview`.`discr_ar` AS `discr_ar`, `itemsview`.`img_svg` AS `img_svg`, `itemsview`.`img` AS `img`, `itemsview`.`cat_created_at` AS `cat_created_at`, `itemsview`.`brands_name_ar` AS `brands_name_ar`, `itemsview`.`brands_name_en` AS `brands_name_en`, `itemsview`.`description_ar` AS `description_ar`, `itemsview`.`description_en` AS `description_en`, `itemsview`.`logo_url` AS `logo_url`, `itemsview`.`is_active` AS `is_active`, `itemsview`.`cat_updated_at` AS `cat_updated_at`, `carts`.`id` AS `cart_id`, `carts`.`user_id` AS `user_id`, `carts`.`item_id` AS `cart_item_id`, `carts`.`order` AS `cart_order`, `carts`.`created_at` AS `cart_created_at`, `carts`.`updated_at` AS `cart_updated_at`, `coupons`.`descr_en` AS `descr_en_coupon`, `coupons`.`descr_ar` AS `descr_ar_coupon`, `coupons`.`code` AS `code`, `coupons`.`category_id` AS `category_id_coupon`, `coupons`.`discount` AS `discount_coupon`, `coupons`.`expired_date` AS `expired_date` FROM ((`carts` join `itemsview` on(`itemsview`.`id` = `carts`.`item_id`)) join `coupons` on(`coupons`.`user_id` = `carts`.`user_id`)) WHERE `carts`.`order` = 0 GROUP BY `carts`.`item_id`, `carts`.`user_id` ;

-- --------------------------------------------------------

--
-- Structure for view `coupon_user_category_view`
--
DROP TABLE IF EXISTS `coupon_user_category_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `coupon_user_category_view`  AS SELECT `coupons`.`id` AS `coupon_id`, `users`.`id` AS `user_id`, `coupons`.`discount` AS `discount`, `users`.`id` AS `id`, `coupons`.`expired_date` AS `expired_date`, `users`.`name` AS `name`, `users`.`email` AS `email`, `coupons`.`code` AS `code`, `coupons`.`descr_en` AS `descr_en`, `coupons`.`descr_ar` AS `descr_ar`, `categories`.`name_en` AS `name_en`, `categories`.`name_ar` AS `name_ar`, `categories`.`img_svg` AS `img_svg` FROM ((`coupons` join `users` on(`coupons`.`user_id` = `users`.`id`)) join `categories` on(`coupons`.`category_id` = `categories`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `favoriteview`
--
DROP TABLE IF EXISTS `favoriteview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `favoriteview`  AS SELECT `users`.`id` AS `users_id`, `favorites`.`id` AS `favorite_id`, `favorites`.`user_id` AS `user_id`, `favorites`.`item_id` AS `favorite_item_id`, `favorites`.`created_at` AS `favorites_created_at`, `favorites`.`updated_at` AS `favorites_updated_at`, `fullitemsview`.`name_en` AS `name_en`, `fullitemsview`.`name_ar` AS `name_ar`, `fullitemsview`.`price` AS `price`, `fullitemsview`.`discount` AS `discount`, `fullitemsview`.`price`- `fullitemsview`.`price` * `fullitemsview`.`discount` / 100 AS `itemPriceDiscount`, `fullitemsview`.`one_img` AS `one_img`, `fullitemsview`.`sum_rating` AS `sum_rating`, `fullitemsview`.`avg_rating` AS `avg_rating`, `fullitemsview`.`active` AS `active` FROM ((`favorites` join `fullitemsview` on(`fullitemsview`.`id` = `favorites`.`item_id`)) join `users` on(`users`.`id` = `favorites`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `fullitemsview`
--
DROP TABLE IF EXISTS `fullitemsview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fullitemsview`  AS SELECT `itemsview`.`id` AS `id`, `itemsview`.`name_en` AS `name_en`, `itemsview`.`name_ar` AS `name_ar`, `itemsview`.`descr_en` AS `descr_en`, `itemsview`.`descr_ar` AS `descr_ar`, `itemsview`.`one_img` AS `one_img`, `itemsview`.`second_img` AS `second_img`, `itemsview`.`three_img` AS `three_img`, `itemsview`.`four_img` AS `four_img`, `itemsview`.`five_img` AS `five_img`, `itemsview`.`count` AS `count`, `itemsview`.`active` AS `active`, `itemsview`.`price` AS `price`, `itemsview`.`discount` AS `discount`, `itemsview`.`category_id` AS `category_id`, `itemsview`.`long_descr_en` AS `long_descr_en`, `itemsview`.`long_descr_ar` AS `long_descr_ar`, `itemsview`.`color_id` AS `color_id`, `itemsview`.`size_id` AS `size_id`, `itemsview`.`brand_id` AS `brand_id`, `itemsview`.`created_at` AS `created_at`, `itemsview`.`updated_at` AS `updated_at`, `itemsview`.`itemColorEn` AS `itemColorEn`, `itemsview`.`itemColorAr` AS `itemColorAr`, `itemsview`.`itemSizeEn` AS `itemSizeEn`, `itemsview`.`itemSizeAr` AS `itemSizeAr`, `itemsview`.`price_discount` AS `price_discount`, `itemsview`.`cat_id` AS `cat_id`, `itemsview`.`name_cat_en` AS `name_cat_en`, `itemsview`.`name_cat_ar` AS `name_cat_ar`, `itemsview`.`discr_en` AS `discr_en`, `itemsview`.`discr_ar` AS `discr_ar`, `itemsview`.`img_svg` AS `img_svg`, `itemsview`.`img` AS `img`, `itemsview`.`cat_created_at` AS `cat_created_at`, `itemsview`.`brands_name_ar` AS `brands_name_ar`, `itemsview`.`brands_name_en` AS `brands_name_en`, `itemsview`.`description_ar` AS `description_ar`, `itemsview`.`description_en` AS `description_en`, `itemsview`.`logo_url` AS `logo_url`, `itemsview`.`is_active` AS `is_active`, `itemsview`.`cat_updated_at` AS `cat_updated_at`, sum(`rating_comments_view`.`star1`) / count(0) AS `avg_star1`, sum(`rating_comments_view`.`star2`) / count(0) AS `avg_star2`, sum(`rating_comments_view`.`star3`) / count(0) AS `avg_star3`, sum(`rating_comments_view`.`star4`) / count(0) AS `avg_star4`, sum(`rating_comments_view`.`star5`) AS `sum_star5`, sum(`rating_comments_view`.`rating`) AS `sum_rating`, sum(`rating_comments_view`.`rating`) / count(0) AS `avg_rating` FROM (`itemsview` left join `rating_comments_view` on(`rating_comments_view`.`item_id` = `itemsview`.`id`)) GROUP BY `itemsview`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `fullorderview`
--
DROP TABLE IF EXISTS `fullorderview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `fullorderview`  AS SELECT `orderview`.`order_id` AS `order_id`, `orderview`.`coupon_discount` AS `coupon_discount`, `orderview`.`order_user_id` AS `order_user_id`, `orderview`.`address_id` AS `address_id`, `orderview`.`deliverytype_id` AS `deliverytype_id`, `orderview`.`payement_id` AS `payement_id`, `orderview`.`status` AS `status`, `orderview`.`price_delivery` AS `price_delivery`, `orderview`.`order_price` AS `order_price`, `orderview`.`total_price` AS `total_price`, `orderview`.`orderprocesstype_id` AS `orderprocesstype_id`, `orderview`.`coupon_id` AS `coupon_id`, `orderview`.`tracking_number` AS `tracking_number`, `orderview`.`rating` AS `rating`, `orderview`.`comment` AS `comment`, `orderview`.`orders_created_at` AS `orders_created_at`, `orderview`.`orders_updated_at` AS `orders_updated_at`, `orderview`.`cart_Item_price` AS `cart_Item_price`, `orderview`.`precentage_value_discount` AS `precentage_value_discount`, `orderview`.`item_price_discount` AS `item_price_discount`, `orderview`.`id` AS `id`, `orderview`.`name_en` AS `name_en`, `orderview`.`name_ar` AS `name_ar`, `orderview`.`descr_en` AS `descr_en`, `orderview`.`descr_ar` AS `descr_ar`, `orderview`.`one_img` AS `one_img`, `orderview`.`second_img` AS `second_img`, `orderview`.`three_img` AS `three_img`, `orderview`.`four_img` AS `four_img`, `orderview`.`five_img` AS `five_img`, `orderview`.`count` AS `count`, `orderview`.`active` AS `active`, `orderview`.`price` AS `price`, `orderview`.`discount` AS `discount`, `orderview`.`category_id` AS `category_id`, `orderview`.`long_descr_en` AS `long_descr_en`, `orderview`.`long_descr_ar` AS `long_descr_ar`, `orderview`.`color_id` AS `color_id`, `orderview`.`size_id` AS `size_id`, `orderview`.`brand_id` AS `brand_id`, `orderview`.`created_at` AS `created_at`, `orderview`.`updated_at` AS `updated_at`, `orderview`.`order` AS `order`, `orderview`.`country` AS `country`, `orderview`.`city` AS `city`, `orderview`.`street` AS `street`, `orderview`.`building` AS `building`, `orderview`.`note` AS `note`, `orderview`.`lat` AS `lat`, `orderview`.`longg` AS `longg`, `orderview`.`expired_date` AS `expired_date`, `orderprocesstypes`.`id` AS `orderprocesstypes_id`, `orderprocesstypes`.`name_en` AS `orderprocesstypes_name_en`, `orderprocesstypes`.`name_ar` AS `orderprocesstypes_name_ar`, `orderprocesstypes`.`created_at` AS `orderprocesstypes_created_at`, `orderprocesstypes`.`updated_at` AS `orderprocesstypes_updated_at`, `deliverytypes`.`name_en` AS `deliveryTypes_name_en`, `deliverytypes`.`name_ar` AS `deliveryTypes_name_ar`, `deliverytypes`.`img` AS `deliverytypes_img`, `deliverytypes`.`created_at` AS `deliverytypes_created_at`, `deliverytypes`.`updated_at` AS `deliverytypes_updated_at`, `payments`.`name_en` AS `payment_name_en`, `payments`.`name_ar` AS `payment_name_ar`, `payments`.`img` AS `payments_img`, `payments`.`created_at` AS `payments_created_at`, `payments`.`updated_at` AS `payments_updated_at`, `statues_orders`.`name_en` AS `statues_orders_name_en`, `statues_orders`.`name_ar` AS `statues_orders_name_ar` FROM ((((`orderview` join `orderprocesstypes` on(`orderview`.`orderprocesstype_id` = `orderprocesstypes`.`id`)) join `deliverytypes` on(`orderview`.`deliverytype_id` = `deliverytypes`.`id`)) join `payments` on(`orderview`.`payement_id` = `payments`.`id`)) join `statues_orders` on(`orderview`.`status` = `statues_orders`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `itemsview`
--
DROP TABLE IF EXISTS `itemsview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `itemsview`  AS SELECT `items`.`id` AS `id`, `items`.`name_en` AS `name_en`, `items`.`name_ar` AS `name_ar`, `items`.`descr_en` AS `descr_en`, `items`.`descr_ar` AS `descr_ar`, `items`.`one_img` AS `one_img`, `items`.`second_img` AS `second_img`, `items`.`three_img` AS `three_img`, `items`.`four_img` AS `four_img`, `items`.`five_img` AS `five_img`, `items`.`count` AS `count`, `items`.`active` AS `active`, `items`.`price` AS `price`, `items`.`discount` AS `discount`, `items`.`category_id` AS `category_id`, `items`.`long_descr_en` AS `long_descr_en`, `items`.`long_descr_ar` AS `long_descr_ar`, `items`.`color_id` AS `color_id`, `items`.`size_id` AS `size_id`, `items`.`brand_id` AS `brand_id`, `items`.`created_at` AS `created_at`, `items`.`updated_at` AS `updated_at`, `items_colors`.`itemColorEn` AS `itemColorEn`, `items_colors`.`itemColorAr` AS `itemColorAr`, `items_sizes`.`itemSizeEn` AS `itemSizeEn`, `items_sizes`.`itemSizeAr` AS `itemSizeAr`, `items`.`price`- `items`.`price` * `items`.`discount` / 100 AS `price_discount`, `categories`.`id` AS `cat_id`, `categories`.`name_en` AS `name_cat_en`, `categories`.`name_ar` AS `name_cat_ar`, `categories`.`discr_en` AS `discr_en`, `categories`.`discr_ar` AS `discr_ar`, `categories`.`img_svg` AS `img_svg`, `categories`.`img` AS `img`, `categories`.`created_at` AS `cat_created_at`, `brands`.`name_ar` AS `brands_name_ar`, `brands`.`name_en` AS `brands_name_en`, `brands`.`description_ar` AS `description_ar`, `brands`.`description_en` AS `description_en`, `brands`.`logo_url` AS `logo_url`, `brands`.`is_active` AS `is_active`, `categories`.`updated_at` AS `cat_updated_at` FROM ((((`items` join `categories` on(`categories`.`id` = `items`.`id`)) join `brands` on(`brands`.`id` = `items`.`brand_id`)) join `items_colors` on(`items_colors`.`id` = `items`.`color_id`)) join `items_sizes` on(`items_sizes`.`id` = `items`.`size_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `onlyfullorderview`
--
DROP TABLE IF EXISTS `onlyfullorderview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `onlyfullorderview`  AS SELECT DISTINCT `orderview`.`order_id` AS `order_id`, `orderview`.`coupon_discount` AS `coupon_discount`, `orderview`.`order_user_id` AS `order_user_id`, `orderview`.`address_id` AS `address_id`, `orderview`.`deliverytype_id` AS `deliverytype_id`, `orderview`.`payement_id` AS `payement_id`, `orderview`.`status` AS `status`, `orderview`.`price_delivery` AS `price_delivery`, `orderview`.`order_price` AS `order_price`, `orderview`.`total_price` AS `total_price`, `orderview`.`orderprocesstype_id` AS `orderprocesstype_id`, `orderview`.`coupon_id` AS `coupon_id`, `orderview`.`tracking_number` AS `tracking_number`, `orderview`.`rating` AS `rating`, `orderview`.`comment` AS `comment`, `orderview`.`orders_created_at` AS `orders_created_at`, `orderview`.`orders_updated_at` AS `orders_updated_at`, `orderview`.`cart_Item_price` AS `cart_Item_price`, `orderview`.`precentage_value_discount` AS `precentage_value_discount`, `orderview`.`item_price_discount` AS `item_price_discount`, `orderview`.`id` AS `id`, `orderview`.`name_en` AS `name_en`, `orderview`.`name_ar` AS `name_ar`, `orderview`.`descr_en` AS `descr_en`, `orderview`.`descr_ar` AS `descr_ar`, `orderview`.`one_img` AS `one_img`, `orderview`.`second_img` AS `second_img`, `orderview`.`three_img` AS `three_img`, `orderview`.`four_img` AS `four_img`, `orderview`.`five_img` AS `five_img`, `orderview`.`count` AS `count`, `orderview`.`active` AS `active`, `orderview`.`price` AS `price`, `orderview`.`discount` AS `discount`, `orderview`.`category_id` AS `category_id`, `orderview`.`long_descr_en` AS `long_descr_en`, `orderview`.`long_descr_ar` AS `long_descr_ar`, `orderview`.`color_id` AS `color_id`, `orderview`.`size_id` AS `size_id`, `orderview`.`brand_id` AS `brand_id`, `orderview`.`created_at` AS `created_at`, `orderview`.`updated_at` AS `updated_at`, `orderview`.`order` AS `order`, `orderview`.`country` AS `country`, `orderview`.`city` AS `city`, `orderview`.`street` AS `street`, `orderview`.`building` AS `building`, `orderview`.`note` AS `note`, `orderview`.`lat` AS `lat`, `orderview`.`longg` AS `longg`, `orderview`.`expired_date` AS `expired_date`, `orderprocesstypes`.`id` AS `orderprocesstypes_id`, `orderprocesstypes`.`name_en` AS `orderprocesstypes_name_en`, `orderprocesstypes`.`name_ar` AS `orderprocesstypes_name_ar`, `orderprocesstypes`.`created_at` AS `orderprocesstypes_created_at`, `orderprocesstypes`.`updated_at` AS `orderprocesstypes_updated_at`, `deliverytypes`.`name_en` AS `deliveryTypes_name_en`, `deliverytypes`.`name_ar` AS `deliveryTypes_name_ar`, `deliverytypes`.`img` AS `deliverytypes_img`, `deliverytypes`.`created_at` AS `deliverytypes_created_at`, `deliverytypes`.`updated_at` AS `deliverytypes_updated_at`, `payments`.`name_en` AS `payment_name_en`, `payments`.`name_ar` AS `payment_name_ar`, `payments`.`img` AS `payments_img`, `payments`.`created_at` AS `payments_created_at`, `payments`.`updated_at` AS `payments_updated_at`, `statues_orders`.`name_en` AS `statues_orders_name_en`, `statues_orders`.`name_ar` AS `statues_orders_name_ar` FROM ((((`orderview` join `orderprocesstypes` on(`orderview`.`orderprocesstype_id` = `orderprocesstypes`.`id`)) join `deliverytypes` on(`orderview`.`deliverytype_id` = `deliverytypes`.`id`)) join `payments` on(`orderview`.`payement_id` = `payments`.`id`)) join `statues_orders` on(`orderview`.`status` = `statues_orders`.`id`)) GROUP BY `orderview`.`order_id` ;

-- --------------------------------------------------------

--
-- Structure for view `orders_with_orderprocesstypes`
--
DROP TABLE IF EXISTS `orders_with_orderprocesstypes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `orders_with_orderprocesstypes`  AS SELECT `orders`.`id` AS `id`, `orders`.`user_id` AS `user_id`, `orders`.`address_id` AS `address_id`, `orders`.`deliverytype_id` AS `deliverytype_id`, `orders`.`payement_id` AS `payement_id`, `orders`.`status` AS `status`, `orders`.`price_delivery` AS `price_delivery`, `orders`.`price` AS `price`, `orders`.`total_price` AS `total_price`, `orders`.`orderprocesstype_id` AS `orderprocesstype_id`, `orders`.`coupon_id` AS `coupon_id`, `orders`.`tracking_number` AS `tracking_number`, `orders`.`rating` AS `rating`, `orders`.`comment` AS `comment`, `orders`.`created_at` AS `created_at`, `orders`.`updated_at` AS `updated_at`, `orderprocesstypes`.`id` AS `process_type_id`, `orderprocesstypes`.`name_en` AS `process_type_name_en`, `orderprocesstypes`.`name_ar` AS `process_type_name_ar`, `orderprocesstypes`.`created_at` AS `process_type_created_at`, `orderprocesstypes`.`updated_at` AS `process_type_updated_at` FROM (`orders` join `orderprocesstypes` on(`orders`.`orderprocesstype_id` = `orderprocesstypes`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `orderview`
--
DROP TABLE IF EXISTS `orderview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `orderview`  AS SELECT `orders`.`id` AS `order_id`, `coupon_user_category_view`.`discount` AS `coupon_discount`, `orders`.`user_id` AS `order_user_id`, `orders`.`address_id` AS `address_id`, `orders`.`deliverytype_id` AS `deliverytype_id`, `orders`.`payement_id` AS `payement_id`, `orders`.`status` AS `status`, `orders`.`price_delivery` AS `price_delivery`, `orders`.`price` AS `order_price`, `orders`.`total_price` AS `total_price`, `orders`.`orderprocesstype_id` AS `orderprocesstype_id`, `orders`.`coupon_id` AS `coupon_id`, `orders`.`tracking_number` AS `tracking_number`, `orders`.`rating` AS `rating`, `orders`.`comment` AS `comment`, `orders`.`created_at` AS `orders_created_at`, `orders`.`updated_at` AS `orders_updated_at`, sum(`items`.`price`) AS `cart_Item_price`, sum(`items`.`price` * `items`.`discount` / 100) AS `precentage_value_discount`, sum(`items`.`price` * `items`.`discount` / 100) AS `item_price_discount`, `items`.`id` AS `id`, `items`.`name_en` AS `name_en`, `items`.`name_ar` AS `name_ar`, `items`.`descr_en` AS `descr_en`, `items`.`descr_ar` AS `descr_ar`, `items`.`one_img` AS `one_img`, `items`.`second_img` AS `second_img`, `items`.`three_img` AS `three_img`, `items`.`four_img` AS `four_img`, `items`.`five_img` AS `five_img`, `items`.`count` AS `count`, `items`.`active` AS `active`, `items`.`price` AS `price`, `items`.`discount` AS `discount`, `items`.`category_id` AS `category_id`, `items`.`long_descr_en` AS `long_descr_en`, `items`.`long_descr_ar` AS `long_descr_ar`, `items`.`color_id` AS `color_id`, `items`.`size_id` AS `size_id`, `items`.`brand_id` AS `brand_id`, `items`.`created_at` AS `created_at`, `items`.`updated_at` AS `updated_at`, `carts`.`order` AS `order`, `addresses`.`country` AS `country`, `addresses`.`city` AS `city`, `addresses`.`street` AS `street`, `addresses`.`building` AS `building`, `addresses`.`note` AS `note`, `addresses`.`lat` AS `lat`, `addresses`.`longg` AS `longg`, `coupon_user_category_view`.`expired_date` AS `expired_date` FROM ((((`carts` join `orders` on(`orders`.`id` = `carts`.`order`)) join `items` on(`items`.`id` = `carts`.`item_id`)) join `addresses` on(`addresses`.`user_id` = `carts`.`user_id`)) join `coupon_user_category_view` on(`coupon_user_category_view`.`user_id` = `carts`.`user_id`)) WHERE `carts`.`order` <> 0 GROUP BY `carts`.`item_id`, `carts`.`user_id`, `carts`.`order` ;

-- --------------------------------------------------------

--
-- Structure for view `order_deliverytypes`
--
DROP TABLE IF EXISTS `order_deliverytypes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_deliverytypes`  AS SELECT DISTINCT `orders`.`id` AS `order_id`, `orders`.`user_id` AS `deliv_user_id`, `deliverytypes`.`id` AS `deliveryTypes_id`, `deliverytypes`.`name_en` AS `deliveryTypes_name_en`, `deliverytypes`.`name_ar` AS `deliveryTypes_name_ar`, `deliverytypes`.`name_en` AS `deliveryTypes_image`, `deliverytypes`.`created_at` AS `deliverytypes_created_at`, `deliverytypes`.`updated_at` AS `deliverytypes_updated_at` FROM (`orders` join `deliverytypes` on(`orders`.`deliverytype_id` = `deliverytypes`.`id`)) GROUP BY `deliverytypes`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `order_payment`
--
DROP TABLE IF EXISTS `order_payment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_payment`  AS SELECT DISTINCT `orders`.`id` AS `order_id`, `orders`.`user_id` AS `user_id`, `payments`.`id` AS `payment_id`, `payments`.`name_en` AS `payment_name_en`, `payments`.`name_ar` AS `payment_name_ar`, `payments`.`img` AS `payment_image`, `payments`.`created_at` AS `payments_created_at`, `payments`.`updated_at` AS `payments_updated_at` FROM (`orders` join `payments` on(`orders`.`payement_id` = `payments`.`id`)) GROUP BY `payments`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `ratingview`
--
DROP TABLE IF EXISTS `ratingview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ratingview`  AS SELECT sum(`reviews`.`rating`) AS `sum_rating`, sum(`reviews`.`rating`) / count(0) AS `avg_rating`, sum(`reviews`.`star1` * 100) / sum(`reviews`.`rating`) AS `percent1`, sum(`reviews`.`star2` * 100) / sum(`reviews`.`rating`) AS `percent2`, sum(`reviews`.`star3` * 100) / sum(`reviews`.`rating`) AS `percent3`, sum(`reviews`.`star4` * 100) / sum(`reviews`.`rating`) AS `percent4`, sum(`reviews`.`star5` * 100) / sum(`reviews`.`rating`) AS `percent5` FROM `reviews` ;

-- --------------------------------------------------------

--
-- Structure for view `rating_comments_view`
--
DROP TABLE IF EXISTS `rating_comments_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rating_comments_view`  AS SELECT `users`.`image` AS `image`, `users`.`name` AS `name`, `users`.`img` AS `img`, `items`.`name_ar` AS `item_name_ar`, `reviews`.`id` AS `id`, `reviews`.`user_id` AS `user_id`, `reviews`.`item_id` AS `item_id`, `reviews`.`rating` AS `rating`, `reviews`.`comment` AS `comment`, `reviews`.`star1` AS `star1`, `reviews`.`star2` AS `star2`, `reviews`.`star3` AS `star3`, `reviews`.`star4` AS `star4`, `reviews`.`star5` AS `star5`, `reviews`.`created_at` AS `created_at`, `reviews`.`updated_at` AS `updated_at` FROM ((`reviews` join `items` on(`items`.`id` = `reviews`.`item_id`)) join `users` on(`users`.`id` = `reviews`.`user_id`)) GROUP BY `reviews`.`item_id`, `reviews`.`user_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forgine_addresses_users` (`user_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
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
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forgine_carts_users` (`user_id`),
  ADD KEY `forgine_carts_items` (`item_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forgine_coupon_user` (`user_id`),
  ADD KEY `forgine_coupon_category` (`category_id`);

--
-- Indexes for table `deliverytypes`
--
ALTER TABLE `deliverytypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forgine_favorits_items` (`item_id`),
  ADD KEY `forgine_favorits_users` (`user_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forgine_items_categories` (`category_id`),
  ADD KEY `forgine_items_brands` (`brand_id`),
  ADD KEY `forgine_items_colors` (`color_id`),
  ADD KEY `forgine_items_size` (`size_id`);

--
-- Indexes for table `items_colors`
--
ALTER TABLE `items_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_sizes`
--
ALTER TABLE `items_sizes`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forgine_notification_users` (`user_id`);

--
-- Indexes for table `orderprocesstypes`
--
ALTER TABLE `orderprocesstypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forgine_orders_users` (`user_id`),
  ADD KEY `forgine_orders_coupons` (`coupon_id`),
  ADD KEY `forgine_orders_payments` (`payement_id`),
  ADD KEY `forgine_orders_orderprocesstypes` (`orderprocesstype_id`),
  ADD KEY `forgine_orders_deliverytypes` (`deliverytype_id`),
  ADD KEY `forgine_orders_addresses` (`address_id`),
  ADD KEY `forgine_orders_statues` (`status`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forgine_reviews_users` (`user_id`),
  ADD KEY `forgine_reviews_items` (`item_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`shipment_id`),
  ADD KEY `shipments_orders_constraint` (`order_id`);

--
-- Indexes for table `statues_orders`
--
ALTER TABLE `statues_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_category_id` (`main_category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `items_id` (`items_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `deliverytypes`
--
ALTER TABLE `deliverytypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `items_colors`
--
ALTER TABLE `items_colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `items_sizes`
--
ALTER TABLE `items_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderprocesstypes`
--
ALTER TABLE `orderprocesstypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `shipment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statues_orders`
--
ALTER TABLE `statues_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `forgine_addresses_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `forgine_carts_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forgine_carts_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `forgine_coupon_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `forgine_favorits_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `forgine_favorits_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `forgine_items_brands` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forgine_items_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `forgine_notification_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `forgine_orders_addresses` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forgine_orders_coupons` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forgine_orders_deliverytypes` FOREIGN KEY (`deliverytype_id`) REFERENCES `deliverytypes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forgine_orders_orderprocesstypes` FOREIGN KEY (`orderprocesstype_id`) REFERENCES `orderprocesstypes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forgine_orders_payments` FOREIGN KEY (`payement_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forgine_orders_statues` FOREIGN KEY (`status`) REFERENCES `statues_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forgine_orders_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `forgine_reviews_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forgine_reviews_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shipments`
--
ALTER TABLE `shipments`
  ADD CONSTRAINT `shipments_orders_constraint` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`main_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `variants`
--
ALTER TABLE `variants`
  ADD CONSTRAINT `variants_ibfk_1` FOREIGN KEY (`items_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
