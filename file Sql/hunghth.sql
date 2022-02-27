-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th2 25, 2022 lúc 10:58 PM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hunghth`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `parent_id` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `addMenu` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `active`, `parent_id`, `created_at`, `updated_at`, `addMenu`, `deleted_at`) VALUES
(30, 'Mobile', 'mobile', 1, 0, '2022-02-25 11:02:41', '2022-02-25 11:02:41', 1, NULL),
(31, 'Máy tính', 'may-tinh', 1, 0, '2022-02-25 11:02:56', '2022-02-25 11:41:40', 1, NULL),
(32, 'Quần áo và trang sức', 'quan-ao-va-trang-suc', 1, 0, '2022-02-25 11:03:07', '2022-02-25 12:41:11', 1, NULL),
(33, 'Đồ gia dụng', 'do-gia-dung', 1, 0, '2022-02-25 11:03:16', '2022-02-25 11:03:16', 1, NULL),
(34, 'Asus', 'asus', 1, 31, '2022-02-25 11:03:46', '2022-02-25 11:03:46', 0, NULL),
(35, 'Vaio', 'vaio', 1, 31, '2022-02-25 11:03:54', '2022-02-25 11:03:54', 1, NULL),
(36, 'Dell', 'dell', 1, 31, '2022-02-25 11:04:01', '2022-02-25 11:04:01', 1, NULL),
(37, 'Iphone', 'iphone', 1, 30, '2022-02-25 11:04:08', '2022-02-25 13:19:50', 0, NULL),
(40, 'Huawei', 'huawei', 1, 30, '2022-02-25 11:16:41', '2022-02-25 13:25:43', 1, NULL),
(41, 'Sam sung', 'sam-sung', 1, 30, '2022-02-25 11:46:06', '2022-02-25 13:09:22', 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CodeId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `Name`, `CodeId`, `Phone`, `Email`, `note`, `created_at`, `updated_at`, `address`, `status`) VALUES
(1, 'thinhhung', '000214', '0300000000', 'hungtph03027@gmail.com', NULL, '2022-02-25 12:44:52', '2022-02-25 13:51:02', 'thuy ha', 1),
(2, 'thinhhhung', '23123', '1231231231', 'hungtph03027@gmail.com', NULL, '2022-02-25 15:36:27', '2022-02-25 15:36:27', 'thuy ha', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_carts`
--

CREATE TABLE `customer_carts` (
  `customerId` bigint(20) UNSIGNED NOT NULL,
  `productId` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `price` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer_carts`
--

INSERT INTO `customer_carts` (`customerId`, `productId`, `quantity`, `price`) VALUES
(1, 21, 4, 125000),
(1, 17, 4, 22258010),
(2, 16, 2, 6072000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `created_at`, `updated_at`, `active`, `slug`) VALUES
(1, 'trang chi', 0, NULL, NULL, 1, ''),
(2, 'San pham moi', 0, NULL, NULL, 1, ''),
(3, 'spm1', 2, NULL, NULL, 1, ''),
(7, 'thijnh hưng', 1, '2022-02-14 02:34:12', '2022-02-14 02:34:12', 1, 'thijnh-hung'),
(8, 'menu1.1.234', 7, '2022-02-14 02:50:44', '2022-02-14 03:04:41', 1, 'menu11234');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_11_070205_create_categories_table', 1),
(7, '2022_02_12_201758_add_column_tomenu', 2),
(8, '2022_02_13_105446_create_products_table', 3),
(9, '2022_02_13_162159_add_column_delete_at', 4),
(10, '2022_02_13_162924_create_menus_table', 5),
(11, '2022_02_13_165528_add_column_menu_active', 6),
(12, '2022_02_14_093132_add_column_slug', 7),
(13, '2022_02_14_100929_add_column_delete_at_products', 8),
(14, '2022_02_14_160410_create_product_categories_table', 9),
(15, '2022_02_14_162640_add_column_images', 10),
(16, '2022_02_15_075129_create_sliders_table', 11),
(17, '2022_02_15_085823_create_settings_table', 12),
(18, '2022_02_15_093236_add_column_type', 13),
(19, '2022_02_15_155920_create_roles_table', 14),
(20, '2022_02_15_162937_create_role_users_table', 15),
(21, '2022_02_16_151609_create_permisstions_table', 16),
(22, '2022_02_16_153358_add_column_key_permisstion', 17),
(29, '2022_02_16_171529_create_permisstion_roles_table', 18),
(30, '2022_02_23_072145_drop_cart', 19),
(31, '2022_02_23_073138_create_customers_table', 20),
(35, '2022_02_23_073302_create_customer_carts_table', 21),
(36, '2022_02_23_183024_add_column_status_cart', 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permisstions`
--

CREATE TABLE `permisstions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) NOT NULL DEFAULT '0',
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permisstions`
--

INSERT INTO `permisstions` (`id`, `name`, `display`, `parent_id`, `key`) VALUES
(77, 'slider', 'slider', 0, ''),
(78, 'sliderList', 'List slider', 77, 'sliderList'),
(79, 'sliderAdd', 'Add slider', 77, 'sliderAdd'),
(80, 'sliderEdit', 'Edit slider', 77, 'sliderEdit'),
(81, 'sliderDelete', 'Delete slider', 77, 'sliderDelete'),
(82, 'setting', 'setting', 0, ''),
(83, 'settingList', 'List setting', 82, 'settingList'),
(84, 'settingAdd', 'Add setting', 82, 'settingAdd'),
(85, 'settingEdit', 'Edit setting', 82, 'settingEdit'),
(86, 'settingDelete', 'Delete setting', 82, 'settingDelete'),
(87, 'user', 'user', 0, ''),
(88, 'userList', 'List user', 87, 'userList'),
(89, 'userAdd', 'Add user', 87, 'userAdd'),
(90, 'userEdit', 'Edit user', 87, 'userEdit'),
(91, 'userDelete', 'Delete user', 87, 'userDelete'),
(92, 'role', 'role', 0, ''),
(93, 'roleList', 'List role', 92, 'roleList'),
(94, 'roleAdd', 'Add role', 92, 'roleAdd'),
(95, 'roleEdit', 'Edit role', 92, 'roleEdit'),
(96, 'roleDelete', 'Delete role', 92, 'roleDelete'),
(97, 'permisstion', 'permisstion', 0, ''),
(98, 'permisstionList', 'List permisstion', 97, 'permisstionList'),
(99, 'permisstionAdd', 'Add permisstion', 97, 'permisstionAdd'),
(100, 'permisstionEdit', 'Edit permisstion', 97, 'permisstionEdit'),
(101, 'permisstionDelete', 'Delete permisstion', 97, 'permisstionDelete'),
(112, 'category', 'category', 0, ''),
(113, 'categoryList', 'List category', 112, 'categoryList'),
(114, 'categoryAdd', 'Add category', 112, 'categoryAdd'),
(115, 'categoryEdit', 'Edit category', 112, 'categoryEdit'),
(116, 'categoryDelete', 'Delete category', 112, 'categoryDelete'),
(117, 'categoryRestore', 'Restore category', 112, 'categoryRestore'),
(118, 'categoryForceDelete', 'ForceDelete category', 112, 'categoryForceDelete'),
(125, 'product', 'product', 0, ''),
(126, 'productList', 'List product', 125, 'productList'),
(127, 'productAdd', 'Add product', 125, 'productAdd'),
(128, 'productEdit', 'Edit product', 125, 'productEdit'),
(129, 'productDelete', 'Delete product', 125, 'productDelete'),
(130, 'productRestore', 'Restore product', 125, 'productRestore'),
(131, 'productForceDelete', 'ForceDelete product', 125, 'productForceDelete'),
(138, 'menu', 'menu', 0, ''),
(139, 'menuList', 'List menu', 138, 'menuList'),
(140, 'menuAdd', 'Add menu', 138, 'menuAdd'),
(141, 'menuEdit', 'Edit menu', 138, 'menuEdit'),
(142, 'menuDelete', 'Delete menu', 138, 'menuDelete'),
(143, 'menuRestore', 'Restore menu', 138, 'menuRestore'),
(144, 'menuForceDelete', 'ForceDelete menu', 138, 'menuForceDelete'),
(145, 'order', 'order', 0, ''),
(146, 'orderList', 'List order', 145, 'orderList'),
(147, 'orderEdit', 'Edit order', 145, 'orderEdit'),
(148, 'orderDelete', 'Delete order', 145, 'orderDelete'),
(149, 'orderRestore', 'Restore order', 145, 'orderRestore'),
(150, 'orderForceDelete', 'ForceDelete order', 145, 'orderForceDelete');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permisstion_roles`
--

CREATE TABLE `permisstion_roles` (
  `roleId` bigint(20) UNSIGNED NOT NULL,
  `permisstionId` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permisstion_roles`
--

INSERT INTO `permisstion_roles` (`roleId`, `permisstionId`) VALUES
(3, 113),
(3, 114),
(3, 126),
(3, 127),
(3, 128),
(3, 146),
(3, 129),
(3, 147);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productSlug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `userId` tinyint(4) DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userEdit` tinyint(4) DEFAULT NULL,
  `sale` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `productName`, `productSlug`, `description`, `userId`, `price`, `image`, `tag`, `status`, `active`, `created_at`, `updated_at`, `deleted_at`, `images`, `userEdit`, `sale`) VALUES
(12, 'Iphone 13', 'iphone-13', '<p>Iphone đẹp gi&aacute; rẻ</p>', 1, 20000000, 'iphone-13-0-1.jpg', 'iphone!mobie', 1, 1, '2022-02-15 00:08:15', '2022-02-15 00:08:15', NULL, 'Iphone 13-13-1.jpg!iphone-13-72-1.jpg', 1, 0),
(16, 'Điều hòa Daikin', 'dieu-hoa-daikin', '<p>Điều h&ograve;a lạnh về mua đ&ocirc;ng, ấm về m&ugrave;a hạ&nbsp;<img alt=\"angel\" src=\"https://hunghth.dev/admins/all/ckeditor/plugins/smiley/images/angel_smile.png\" style=\"height:23px; width:23px\" title=\"angel\" />&nbsp;<img alt=\"angel\" src=\"https://hunghth.dev/admins/all/ckeditor/plugins/smiley/images/angel_smile.png\" style=\"height:23px; width:23px\" title=\"angel\" /><img alt=\"angel\" src=\"https://hunghth.dev/admins/all/ckeditor/plugins/smiley/images/angel_smile.png\" style=\"height:23px; width:23px\" title=\"angel\" /><img alt=\"angel\" src=\"https://hunghth.dev/admins/all/ckeditor/plugins/smiley/images/angel_smile.png\" style=\"height:23px; width:23px\" title=\"angel\" /><img alt=\"angel\" src=\"https://hunghth.dev/admins/all/ckeditor/plugins/smiley/images/angel_smile.png\" style=\"height:23px; width:23px\" title=\"angel\" /><img alt=\"angel\" src=\"https://hunghth.dev/admins/all/ckeditor/plugins/smiley/images/angel_smile.png\" style=\"height:23px; width:23px\" title=\"angel\" /><img alt=\"angel\" src=\"https://hunghth.dev/admins/all/ckeditor/plugins/smiley/images/angel_smile.png\" style=\"height:23px; width:23px\" title=\"angel\" /><img alt=\"angel\" src=\"https://hunghth.dev/admins/all/ckeditor/plugins/smiley/images/angel_smile.png\" style=\"height:23px; width:23px\" title=\"angel\" /><img alt=\"angel\" src=\"https://hunghth.dev/admins/all/ckeditor/plugins/smiley/images/angel_smile.png\" style=\"height:23px; width:23px\" title=\"angel\" /><img alt=\"angel\" src=\"https://hunghth.dev/admins/all/ckeditor/plugins/smiley/images/angel_smile.png\" style=\"height:23px; width:23px\" title=\"angel\" /><img alt=\"angel\" src=\"https://hunghth.dev/admins/all/ckeditor/plugins/smiley/images/angel_smile.png\" style=\"height:23px; width:23px\" title=\"angel\" /><img alt=\"angel\" src=\"https://hunghth.dev/admins/all/ckeditor/plugins/smiley/images/angel_smile.png\" style=\"height:23px; width:23px\" title=\"angel\" /><img alt=\"angel\" src=\"https://hunghth.dev/admins/all/ckeditor/plugins/smiley/images/angel_smile.png\" style=\"height:23px; width:23px\" title=\"angel\" /><img alt=\"angel\" src=\"https://hunghth.dev/admins/all/ckeditor/plugins/smiley/images/angel_smile.png\" style=\"height:23px; width:23px\" title=\"angel\" /><img alt=\"angel\" src=\"https://hunghth.dev/admins/all/ckeditor/plugins/smiley/images/angel_smile.png\" style=\"height:23px; width:23px\" title=\"angel\" /><img alt=\"angel\" src=\"https://hunghth.dev/admins/all/ckeditor/plugins/smiley/images/angel_smile.png\" style=\"height:23px; width:23px\" title=\"angel\" /><img alt=\"angel\" src=\"https://hunghth.dev/admins/all/ckeditor/plugins/smiley/images/angel_smile.png\" style=\"height:23px; width:23px\" title=\"angel\" /></p>', 1, 7590000, 'dieu-hoa-daikin-49-1.jpg', 'dieuhoa!daikin', 1, 1, '2022-02-15 00:21:29', '2022-02-15 00:21:53', NULL, 'Điều hòa Daikin-58-1.jpg', 1, 20),
(17, 'Hawai 1', 'hawai-1', '<p>Sam Sung Untral đẹp đến từng Cm</p>', 1, 25009000, 'samsung-galaxy-44-1.jpg', 'samsung', 1, 1, '2022-02-15 00:47:54', '2022-02-25 11:47:49', NULL, 'SaMSuNg Galaxy-48-1.jpg!samsung-galaxy-1-1.jpg', 1, 11),
(18, 'Áo nữ', 'ao-nu', '<p>&aacute;o đẹp cho nữ&nbsp;</p>', 4, 2500000, 'ao-nu-64-1.jpg', 'aodep!aonu', 1, 1, '2022-02-15 00:49:15', '2022-02-15 00:49:15', NULL, '', 1, 0),
(19, 'galaxy  A51', 'galaxy-a51', '<p>Huawei P20 Pro l&agrave; một trong những thiết bị di động được nhiều &ldquo;game thủ&rdquo; đ&aacute;nh gi&aacute; cao v&agrave; ưa chuộng. Bởi thiết bị sở hữu bộ xử l&yacute; Kirin 970 c&ugrave;ng với dung lượng RAM l&ecirc;n tới 6GB&nbsp; v&agrave; ROM 128GB. Từ đ&oacute; gi&uacute;p thiết bị c&oacute; thể hoạt động mượt m&agrave;, trơn tru khi sử dụng những ứng dụng nặng v&agrave; c&oacute; tốc độ xử l&yacute; cao. Đi k&egrave;m với đ&oacute; l&agrave; vi&ecirc;n pin c&oacute; dung lượng l&ecirc;n tới 4000mAh. V&igrave; vậy, đ&acirc;y ch&iacute;nh l&agrave; chiếc smartphone c&oacute; cấu h&igrave;nh cao được nhiều người y&ecirc;u th&iacute;ch.&nbsp;</p>', 1, 5490000, 'galaxy-a51-12-1.jpg', 'galaxya51!a51', 1, 1, '2022-02-15 00:50:18', '2022-02-25 11:46:52', NULL, 'galaxy-a51-85-1.jpeg!galaxy-a51-61-1.jpg', 1, 0),
(21, 'Quần bò nhập khẩu', 'quan-bo-nhap-khau', '<p>Quần b&ograve; nhập khẩu mới đẹp</p>', 4, 250000, 'quan-bo-nhap-khau-71-4.jpg', 'quanbo!quan', 0, 1, '2022-02-17 01:01:29', '2022-02-25 11:45:34', NULL, 'quan-bo-nhap-khau-99-1.jpg', 1, 50),
(22, 'Áo đẹp cho nữ', 'ao-dep-cho-nu', '<p>Quần &aacute;o đẹp</p>', 4, 1800000, 'ao-dep-cho-nu-86-4.jpg', 'aonu!aodep', 1, 1, '2022-02-17 02:05:17', '2022-02-22 03:56:14', NULL, 'Áo đẹp cho nữ-1-4.jpg!ao-dep-cho-nu-84-4.jpg', 1, 0),
(23, 'vaio 1', 'vaio-1', '<p>Sản phẩm đẹp, cấu h&igrave;nh cao ưu nh&igrave;n, ph&ugrave; hợp cho học sinh sinh vi&ecirc;n,</p>\r\n\r\n<table border=\"1\" cellspacing=\"0\" id=\"tblGeneralAttribute\">\r\n	<tbody>\r\n		<tr>\r\n			<td>CPU</td>\r\n			<td>AMD Ryzen 7 4800H 2.9GHz up to 4.2GHz 8MB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>RAM</td>\r\n			<td>8GB DDR4 3200MHz&nbsp;(2x SO-DIMM socket, up to 32GB SDRAM)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&Ocirc;̉ cứng</td>\r\n			<td>512GB SSD PCIE G3X4 (C&ograve;n trống 1 khe SSD M.2 PCIE)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Card đồ họa</td>\r\n			<td>NVIDIA GeForce GTX 1650 4GB GDDR6</td>\r\n		</tr>\r\n		<tr>\r\n			<td>M&agrave;n h&igrave;nh</td>\r\n			<td>15.6&quot; FHD (1920 x 1080), IPS Non-Glare, NanoEdge, 144Hz,&nbsp;Adaptive-Sync, 63% sRGB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cổng giao tiếp</td>\r\n			<td>\r\n			<p>1x&nbsp;Type&nbsp;C&nbsp;USB&nbsp;3.2&nbsp;Gen&nbsp;2&nbsp;with&nbsp;Power&nbsp;Delivery&nbsp;and&nbsp;Display&nbsp;Port</p>\r\n\r\n			<p>3x USB 3.2 Gen 1 Type-A</p>\r\n\r\n			<p>1x HDMI 2.0b</p>\r\n\r\n			<p>1x&nbsp;3.5mm&nbsp;Combo&nbsp;Audio&nbsp;Jack</p>\r\n\r\n			<p>1x RJ45 LAN Jack</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Audio</td>\r\n			<td>Dolby Atmos</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Numberpad</td>\r\n			<td>None</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Led-Keyboard</td>\r\n			<td>Keyboard 4-Zone RGB</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chu&acirc;̉n LAN</td>\r\n			<td>10/100/1000 Base T</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chuẩn WIFI</td>\r\n			<td>802.11ax (2x2) Wi-Fi 6 (Gig+)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bluetooth</td>\r\n			<td>v5.1</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Webcam</td>\r\n			<td>None</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hệ điều h&agrave;nh</td>\r\n			<td>Windows 10 Home</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Pin</td>\r\n			<td>4 Cell 56WHrs</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng lượng</td>\r\n			<td>2.3 kg</td>\r\n		</tr>\r\n		<tr>\r\n			<td>M&agrave;u sắc</td>\r\n			<td>Eclipse Gray</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kích thước</td>\r\n			<td>35.4 x 25.9 x 2.26 ~ 2.72 (cm)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, 11234456, 'sanp-laptop-1-96-1.jpg', 'laptop11', 1, 1, '2022-02-19 02:23:43', '2022-02-25 15:49:48', NULL, 'vaio-1-20-1.jpg!vaio-1-0-1.jpg', 1, 90),
(24, 'Iphone 12', 'iphone-12', '<h2>D&ograve;ng m&aacute;y IPhone 12 Pro Max</h2>\r\n\r\n<p>Phi&ecirc;n bản đắt gi&aacute; nhất của thế thế hệ IPhone 12; đ&oacute; ch&iacute;nh l&agrave;&nbsp;<a href=\"https://dienthoaigiakho.vn/tin-cong-nghe/iphone-12-pro-max-bi-nong-may-lam-the-nao-de-khac-phuc/\">IPhone 12 Pro Max.</a>&nbsp;D&ograve;ng m&aacute;y n&agrave;y sở hữu m&agrave;n h&igrave;nh XDR OLED với k&iacute;ch thước l&agrave; 6.7 inch; c&ugrave;ng với đ&oacute; l&agrave; hỗ trợ tần số qu&eacute;t 120 Hz. C&aacute;c cấu h&igrave;nh IPhone 12 Pro Max c&ograve;n lại th&igrave; c&oacute; sự tương đồng với iPhone 12 Pro. Đồng nghĩa rằng d&ograve;ng m&aacute;y n&agrave;y sẽ c&oacute; kết cấu gồm khung th&eacute;p kh&ocirc;ng gỉ; mặt lưng bằng k&iacute;nh; bộ xử l&yacute; A14 Bionic v&ocirc; c&ugrave;ng mạnh mẽ, RAM 6 GB; c&ugrave;ng với đ&oacute; l&agrave; bộ nhớ lưu trữ từ 128 GB, 256 GB đến 512 GB.</p>\r\n\r\n<p>V&igrave; k&iacute;ch thước c&oacute; phần to hơn n&ecirc;n vi&ecirc;n pin chắc chắn sẽ c&oacute; dung lượng lớn hơn. Chiếc IPhone 12 Pro Max sẽ được nh&agrave; điều h&agrave;nh trang bị vi&ecirc;n pin 3.687 mAh; c&aacute;p sạc th&ocirc;ng qua cổng Lightning. Ch&iacute;nh v&igrave; như vậy n&ecirc;n sẽ kh&ocirc;ng c&oacute; chuyện Apple loại bỏ đi cổng sạc Lightning v&agrave; chuyển sang sử dụng loại cổng USB-C tr&ecirc;n thiết bị IPhone ra mắt năm nay.</p>\r\n\r\n<p>IPhone 12 Pro Max sẽ được ra mắt với 4 phi&ecirc;n bản m&agrave;u giống hệt như IPhone 12 Pro; đ&oacute; l&agrave;: Gray, Silver White, Mighnight Blue v&agrave; Gold. Tất nhi&ecirc;n rằng IPhone 12 Pro Max sẽ vẫn được trang bị t&iacute;nh năng hỗ trợ mạng 5G với cả hai băng tần l&agrave; Sub-6 GHz v&agrave; mmWare. Cấu h&igrave;nh IPhone 12 Pro Max sẽ được trang bị bộ 3 camera ở phần mặt sau. Nếu x&eacute;t về gi&aacute; th&agrave;nh th&igrave; đ&acirc;y ch&iacute;nh l&agrave; d&ograve;ng thiết bị IPhone c&oacute; gi&aacute; th&agrave;nh cao nhất hiện tại. Cấu h&igrave;nh của thiết bị n&agrave;y được đ&aacute;nh gi&aacute; l&agrave; sẽ mang lại rất nhiều sự bất ngờ chơ người ti&ecirc;u d&ugrave;ng.</p>', 1, 20000000, 'iphone-12-97-1.jpg', 'iphone!iphone12', 1, 1, '2022-02-25 11:51:20', '2022-02-25 15:50:20', NULL, 'Iphone 12-72-1.jpg!iphone-12-55-1.jpg!iphone-12-10-1.jpg', 1, 10),
(25, 'Iphone 8', 'iphone-8', '<p>Iphone rẻ gi&aacute; đẹp</p>', 1, 20000000, 'iphone-8-95-1.jpg', 'iphone 8!iphone', 1, 1, '2022-02-25 11:59:04', '2022-02-25 12:33:19', '2022-02-25 12:33:19', 'Iphone 8-3-1.jpg!iphone-8-37-1.jpg!iphone-8-21-1.jpg!iphone-8-86-1.jpg', 1, 10),
(26, 'Laptop Asus 1', 'laptop-asus-1', '<p>Lap top Asus 1 ngon bổ rẻ cho mọi người</p>', 1, 20000000, 'laptop-asus-1-75-1.jpg', 'laptop!vaio!asus', 1, 1, '2022-02-25 12:02:38', '2022-02-25 12:33:17', '2022-02-25 12:33:17', 'Laptop Asus 1-50-1.jpg!laptop-asus-1-99-1.jpg', 1, 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_categories`
--

CREATE TABLE `product_categories` (
  `categoryId` bigint(20) UNSIGNED NOT NULL,
  `productId` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_categories`
--

INSERT INTO `product_categories` (`categoryId`, `productId`) VALUES
(35, 23),
(32, 22),
(33, 22),
(32, 21),
(41, 19),
(32, 18),
(40, 17),
(33, 16),
(37, 12),
(37, 24),
(37, 25),
(34, 26);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Quản trị hệ thông', NULL, NULL, NULL),
(2, 'content', 'Viết bài', NULL, NULL, NULL),
(3, 'sale', 'Sale', NULL, NULL, NULL),
(4, 'developer', 'Phát triển web', NULL, NULL, '2022-02-16 10:44:06'),
(5, 'Dev1', 'Quản ttrij hệ thống', '2022-02-16 07:57:44', '2022-02-16 07:47:35', '2022-02-16 07:57:44'),
(7, 'test123', 'test chuc nangtest chuc nang', '2022-02-16 10:57:33', '2022-02-16 10:23:19', '2022-02-16 10:57:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_users`
--

CREATE TABLE `role_users` (
  `userId` bigint(20) UNSIGNED NOT NULL,
  `roleId` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_users`
--

INSERT INTO `role_users` (`userId`, `roleId`) VALUES
(11, 2),
(1, 1),
(2, 4),
(4, 3),
(2, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value_key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `key`, `value_key`, `active`, `deleted_at`, `created_at`, `updated_at`, `type`) VALUES
(3, 'phone', '09899999', 1, NULL, '2022-02-15 02:53:12', '2022-02-15 02:53:12', 'text'),
(4, 'address', 'Hà Nội', 1, NULL, '2022-02-15 02:53:36', '2022-02-15 02:53:36', 'text'),
(5, 'Slogan', 'Buy Evething . Just you want!!!! Gì cũng rẻ cho mọi nhà', 1, NULL, '2022-02-15 02:54:24', '2022-02-25 15:49:37', 'textarea'),
(10, 'autorun', 'Kính chào quý khách hàng.', 1, NULL, '2022-02-24 11:03:15', '2022-02-24 11:03:15', 'textarea'),
(11, 'facebook', 'https://www.facebook.com/hung.thinh.54/', 1, NULL, '2022-02-24 11:04:48', '2022-02-24 11:04:48', 'textarea'),
(12, 'instagram', 'https://www.facebook.com/hung.thinh.54/', 1, NULL, '2022-02-24 11:05:00', '2022-02-24 11:05:00', 'textarea');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `slug`, `image`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'slider1', 'slider1', 'slider1-28-1.jpg', 1, '2022-02-15 01:48:48', '2022-02-15 01:34:07', '2022-02-15 01:48:48'),
(2, 'slider2', 'slider2', 'slider2-26-1.jpg', 1, NULL, '2022-02-15 01:34:13', '2022-02-15 01:52:03'),
(3, 'slider 3', 'slider-3', 'slider-3-72-1.jpg', 1, '2022-02-15 01:49:53', '2022-02-15 01:34:22', '2022-02-15 01:49:53'),
(4, 'slider4', 'slider4', 'slider4-65-1.jpg', 1, NULL, '2022-02-15 01:51:28', '2022-02-15 01:51:28'),
(5, 'slider5', 'slider5', 'slider5-78-1.jpg', 1, NULL, '2022-02-15 01:51:34', '2022-02-15 01:51:34'),
(6, 'slider6', 'slider6', 'slider6-43-1.jpg', 1, NULL, '2022-02-15 01:51:45', '2022-02-15 01:51:45'),
(7, 'slider7', 'slider7', 'slider7-25-1.jpg', 1, NULL, '2022-02-15 01:51:54', '2022-02-15 01:51:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `user`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Thinh hung', 'hung', 'hung@gmail.com', NULL, '$2y$10$c8TtR8ebDOluzTUPblJTcOJdB/lci2jFeYHeev//nU2p2JvT21KS.', NULL, NULL, NULL),
(2, 'Devolop', 'Dev', 'dev@gmail.com', NULL, '$2y$10$c8TtR8ebDOluzTUPblJTcOJdB/lci2jFeYHeev//nU2p2JvT21KS.', NULL, NULL, NULL),
(4, 'salee', 'sale', 'sale@gmail.com', NULL, '$2y$10$4gpu4VdHcFsr6ey3CcLv9uTjLsCWQT1d5w2jqfyro.DmSWnRe5HSO', NULL, '2022-02-15 07:56:19', '2022-02-15 08:55:36'),
(11, 'content', 'contetn', 'conten@gmail.com', NULL, '$2y$10$migkC/TL0zGWSpwJpw3ymONlD9OckhXpQGbUDyxVEasnA8IXwEOZm', NULL, '2022-02-15 10:07:36', '2022-02-15 11:11:45');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer_carts`
--
ALTER TABLE `customer_carts`
  ADD KEY `customer_carts_customerid_foreign` (`customerId`),
  ADD KEY `customer_carts_productid_foreign` (`productId`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permisstions`
--
ALTER TABLE `permisstions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permisstion_roles`
--
ALTER TABLE `permisstion_roles`
  ADD KEY `permisstion_roles_roleid_foreign` (`roleId`),
  ADD KEY `permisstion_roles_permisstionid_foreign` (`permisstionId`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_productname_unique` (`productName`),
  ADD UNIQUE KEY `products_productslug_unique` (`productSlug`);

--
-- Chỉ mục cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD KEY `product_categories_categoryid_foreign` (`categoryId`),
  ADD KEY `product_categories_productid_foreign` (`productId`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_users`
--
ALTER TABLE `role_users`
  ADD KEY `role_users_userid_foreign` (`userId`),
  ADD KEY `role_users_roleid_foreign` (`roleId`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `permisstions`
--
ALTER TABLE `permisstions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `customer_carts`
--
ALTER TABLE `customer_carts`
  ADD CONSTRAINT `customer_carts_customerid_foreign` FOREIGN KEY (`customerId`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_carts_productid_foreign` FOREIGN KEY (`productId`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `permisstion_roles`
--
ALTER TABLE `permisstion_roles`
  ADD CONSTRAINT `permisstion_roles_permisstionid_foreign` FOREIGN KEY (`permisstionId`) REFERENCES `permisstions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permisstion_roles_roleid_foreign` FOREIGN KEY (`roleId`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_categoryid_foreign` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_categories_productid_foreign` FOREIGN KEY (`productId`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role_users`
--
ALTER TABLE `role_users`
  ADD CONSTRAINT `role_users_roleid_foreign` FOREIGN KEY (`roleId`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_users_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
