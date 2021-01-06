-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 06, 2021 lúc 04:17 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `guno_store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `coupon` double DEFAULT 0,
  `ship_cost` double NOT NULL DEFAULT 0,
  `total_bill` double NOT NULL DEFAULT 0,
  `recive_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reciver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_order` int(11) NOT NULL DEFAULT 1,
  `payment_method` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_shipper` int(11) DEFAULT NULL,
  `date_order` date NOT NULL,
  `date_finish` date DEFAULT NULL,
  `date_cancel` date DEFAULT NULL,
  `id_staff` int(10) DEFAULT NULL,
  `cancel_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `id_bill`, `id_user`, `coupon`, `ship_cost`, `total_bill`, `recive_address`, `reciver`, `phone`, `status_order`, `payment_method`, `id_shipper`, `date_order`, `date_finish`, `date_cancel`, `id_staff`, `cancel_reason`, `created_at`, `updated_at`) VALUES
(1028, 'DH1028', 6, 0, 15000, 735000, 'Thành phố Hải Phòng, Chợ hàng ,Miếu 2 Xã, sadá', 'customer2', '165165', 4, 'Thanh toán khi nhận hàng', NULL, '2018-11-23', '2018-11-23', NULL, NULL, NULL, '2018-11-23 01:11:53', '2018-11-23 02:13:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_product` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double NOT NULL,
  `product_info` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_store` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_code` int(11) DEFAULT NULL,
  `total_cart` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_code`, `total_cart`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 900000, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cart` int(11) NOT NULL,
  `id_product` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_detail`
--

INSERT INTO `cart_detail` (`id`, `id_cart`, `id_product`, `size`, `price`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(13, 1, 'SP1027', '44', 200000, 3, 600000, '2021-01-05 15:41:20', '2021-01-06 02:16:17'),
(17, 1, 'SP1', '32', 100000, 2, 300000, '2021-01-06 02:51:17', '2021-01-06 03:00:15');

--
-- Bẫy `cart_detail`
--
DELIMITER $$
CREATE TRIGGER `add_cart_detail` AFTER INSERT ON `cart_detail` FOR EACH ROW UPDATE cart SET total_cart = (SELECT SUM(total) FROM cart_detail WHERE cart_detail.id_cart = NEW.id_cart)
WHERE cart.id = NEW.id_cart
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `remove_cart_detail` AFTER DELETE ON `cart_detail` FOR EACH ROW UPDATE cart 
    SET total_cart = (SELECT SUM(total) 
                      FROM cart_detail
                      WHERE cart_detail.id_cart = 						old.id_cart)
    WHERE id = old.id_cart
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_cart_detail-Cart` AFTER UPDATE ON `cart_detail` FOR EACH ROW UPDATE cart 
    SET total_cart = (SELECT SUM(total) 
                      FROM cart_detail
                      WHERE cart_detail.id_cart = 						NEW.id_cart)
    WHERE id = NEW.id_cart
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_product`
--

CREATE TABLE `category_product` (
  `id` int(11) NOT NULL,
  `id_type` int(11) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `category_product`
--

INSERT INTO `category_product` (`id`, `id_type`, `gender`, `url`) VALUES
(1, 1, 1, '/category-product/1/1'),
(2, 1, 2, '/category-product/1/2'),
(3, 2, 1, '/category-product/2/1'),
(4, 2, 2, '/category-product/2/2'),
(5, 3, 1, '/category-product/3/1'),
(6, 3, 2, '/category-product/3/2'),
(7, 4, 1, '/category-product/4/1'),
(8, 4, 2, '/category-product/4/1'),
(9, 5, 1, '/category-product/5/1'),
(10, 5, 2, '/category-product/5/2'),
(11, 6, 1, '/category-product/6/1'),
(12, 6, 2, '/category-product/6/2'),
(13, 7, 2, '/category-product/7/2'),
(14, 8, 1, '/category-product/8/1'),
(15, 8, 2, '/category-product/8/2'),
(16, 9, 1, '/category-product/9/1'),
(17, 9, 2, '/category-product/9/2'),
(18, 10, 1, '/category-product/10/1'),
(19, 11, 2, '/category-product/11/2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `city`
--

CREATE TABLE `city` (
  `id` int(5) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `city`
--

INSERT INTO `city` (`id`, `name`, `type`) VALUES
(1, 'Thành phố Hà Nội', 'Thành phố Trung ương'),
(2, 'Tỉnh Hà Giang', 'Tỉnh'),
(4, 'Tỉnh Cao Bằng', 'Tỉnh'),
(6, 'Tỉnh Bắc Kạn', 'Tỉnh'),
(8, 'Tỉnh Tuyên Quang', 'Tỉnh'),
(10, 'Tỉnh Lào Cai', 'Tỉnh'),
(11, 'Tỉnh Điện Biên', 'Tỉnh'),
(12, 'Tỉnh Lai Châu', 'Tỉnh'),
(14, 'Tỉnh Sơn La', 'Tỉnh'),
(15, 'Tỉnh Yên Bái', 'Tỉnh'),
(17, 'Tỉnh Hoà Bình', 'Tỉnh'),
(19, 'Tỉnh Thái Nguyên', 'Tỉnh'),
(20, 'Tỉnh Lạng Sơn', 'Tỉnh'),
(22, 'Tỉnh Quảng Ninh', 'Tỉnh'),
(24, 'Tỉnh Bắc Giang', 'Tỉnh'),
(25, 'Tỉnh Phú Thọ', 'Tỉnh'),
(26, 'Tỉnh Vĩnh Phúc', 'Tỉnh'),
(27, 'Tỉnh Bắc Ninh', 'Tỉnh'),
(30, 'Tỉnh Hải Dương', 'Tỉnh'),
(31, 'Thành phố Hải Phòng', 'Thành phố Trung ương'),
(33, 'Tỉnh Hưng Yên', 'Tỉnh'),
(34, 'Tỉnh Thái Bình', 'Tỉnh'),
(35, 'Tỉnh Hà Nam', 'Tỉnh'),
(36, 'Tỉnh Nam Định', 'Tỉnh'),
(37, 'Tỉnh Ninh Bình', 'Tỉnh'),
(38, 'Tỉnh Thanh Hóa', 'Tỉnh'),
(40, 'Tỉnh Nghệ An', 'Tỉnh'),
(42, 'Tỉnh Hà Tĩnh', 'Tỉnh'),
(44, 'Tỉnh Quảng Bình', 'Tỉnh'),
(45, 'Tỉnh Quảng Trị', 'Tỉnh'),
(46, 'Tỉnh Thừa Thiên Huế', 'Tỉnh'),
(48, 'Thành phố Đà Nẵng', 'Thành phố Trung ương'),
(49, 'Tỉnh Quảng Nam', 'Tỉnh'),
(51, 'Tỉnh Quảng Ngãi', 'Tỉnh'),
(52, 'Tỉnh Bình Định', 'Tỉnh'),
(54, 'Tỉnh Phú Yên', 'Tỉnh'),
(56, 'Tỉnh Khánh Hòa', 'Tỉnh'),
(58, 'Tỉnh Ninh Thuận', 'Tỉnh'),
(60, 'Tỉnh Bình Thuận', 'Tỉnh'),
(62, 'Tỉnh Kon Tum', 'Tỉnh'),
(64, 'Tỉnh Gia Lai', 'Tỉnh'),
(66, 'Tỉnh Đắk Lắk', 'Tỉnh'),
(67, 'Tỉnh Đắk Nông', 'Tỉnh'),
(68, 'Tỉnh Lâm Đồng', 'Tỉnh'),
(70, 'Tỉnh Bình Phước', 'Tỉnh'),
(72, 'Tỉnh Tây Ninh', 'Tỉnh'),
(74, 'Tỉnh Bình Dương', 'Tỉnh'),
(75, 'Tỉnh Đồng Nai', 'Tỉnh'),
(77, 'Tỉnh Bà Rịa - Vũng Tàu', 'Tỉnh'),
(79, 'Thành phố Hồ Chí Minh', 'Thành phố Trung ương'),
(80, 'Tỉnh Long An', 'Tỉnh'),
(82, 'Tỉnh Tiền Giang', 'Tỉnh'),
(83, 'Tỉnh Bến Tre', 'Tỉnh'),
(84, 'Tỉnh Trà Vinh', 'Tỉnh'),
(86, 'Tỉnh Vĩnh Long', 'Tỉnh'),
(87, 'Tỉnh Đồng Tháp', 'Tỉnh'),
(89, 'Tỉnh An Giang', 'Tỉnh'),
(91, 'Tỉnh Kiên Giang', 'Tỉnh'),
(92, 'Thành phố Cần Thơ', 'Thành phố Trung ương'),
(93, 'Tỉnh Hậu Giang', 'Tỉnh'),
(94, 'Tỉnh Sóc Trăng', 'Tỉnh'),
(95, 'Tỉnh Bạc Liêu', 'Tỉnh'),
(96, 'Tỉnh Cà Mau', 'Tỉnh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id` int(10) UNSIGNED NOT NULL,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id`, `color_name`, `created_at`, `updated_at`) VALUES
(1, 'Trắng', NULL, NULL),
(2, 'Đen', NULL, NULL),
(3, 'Nhiều màu', NULL, NULL),
(4, 'Xanh da trời', NULL, NULL),
(5, 'Xám', NULL, NULL),
(6, 'Hồng', NULL, NULL),
(7, 'Đỏ', NULL, NULL),
(8, 'Vàng', NULL, NULL),
(9, 'Trung tính', NULL, NULL),
(10, 'Cam', NULL, NULL),
(11, 'Màu kaki', NULL, NULL),
(12, 'Nâu', NULL, NULL),
(13, 'Màu cà phê', NULL, NULL),
(14, 'Bạc', NULL, NULL),
(15, 'Hường', NULL, NULL),
(16, 'Đen sọc đỏ', '2018-11-22 13:43:47', '2018-11-22 13:43:47'),
(17, 'Tím', '2018-11-25 15:58:26', '2018-11-25 15:58:26'),
(18, 'Xám đen', '2018-11-25 16:03:49', '2018-11-25 16:03:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `config`
--

CREATE TABLE `config` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_hours` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `geo_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotline` int(11) DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_plus` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_channel` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `config`
--

INSERT INTO `config` (`id`, `title`, `company_name`, `description`, `keywords`, `working_hours`, `address`, `geo_address`, `hotline`, `mobile`, `email`, `facebook`, `google_plus`, `twitter`, `youtube_channel`, `image`, `favicon`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Your website', 'Your company\'s name', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `county`
--

CREATE TABLE `county` (
  `id` int(5) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 NOT NULL,
  `id_city` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `county`
--

INSERT INTO `county` (`id`, `name`, `type`, `id_city`) VALUES
(1, 'Quận Ba Đình', 'Quận', 1),
(2, 'Quận Hoàn Kiếm', 'Quận', 1),
(3, 'Quận Tây Hồ', 'Quận', 1),
(4, 'Quận Long Biên', 'Quận', 1),
(5, 'Quận Cầu Giấy', 'Quận', 1),
(6, 'Quận Đống Đa', 'Quận', 1),
(7, 'Quận Hai Bà Trưng', 'Quận', 1),
(8, 'Quận Hoàng Mai', 'Quận', 1),
(9, 'Quận Thanh Xuân', 'Quận', 1),
(16, 'Huyện Sóc Sơn', 'Huyện', 1),
(17, 'Huyện Đông Anh', 'Huyện', 1),
(18, 'Huyện Gia Lâm', 'Huyện', 1),
(19, 'Quận Nam Từ Liêm', 'Quận', 1),
(20, 'Huyện Thanh Trì', 'Huyện', 1),
(21, 'Quận Bắc Từ Liêm', 'Quận', 1),
(24, 'Thành phố Hà Giang', 'Thành phố', 2),
(26, 'Huyện Đồng Văn', 'Huyện', 2),
(27, 'Huyện Mèo Vạc', 'Huyện', 2),
(28, 'Huyện Yên Minh', 'Huyện', 2),
(29, 'Huyện Quản Bạ', 'Huyện', 2),
(30, 'Huyện Vị Xuyên', 'Huyện', 2),
(31, 'Huyện Bắc Mê', 'Huyện', 2),
(32, 'Huyện Hoàng Su Phì', 'Huyện', 2),
(33, 'Huyện Xín Mần', 'Huyện', 2),
(34, 'Huyện Bắc Quang', 'Huyện', 2),
(35, 'Huyện Quang Bình', 'Huyện', 2),
(40, 'Thành phố Cao Bằng', 'Thành phố', 4),
(42, 'Huyện Bảo Lâm', 'Huyện', 4),
(43, 'Huyện Bảo Lạc', 'Huyện', 4),
(45, 'Huyện Hà Quảng', 'Huyện', 4),
(47, 'Huyện Trùng Khánh', 'Huyện', 4),
(48, 'Huyện Hạ Lang', 'Huyện', 4),
(49, 'Huyện Quảng Hòa', 'Huyện', 4),
(51, 'Huyện Hoà An', 'Huyện', 4),
(52, 'Huyện Nguyên Bình', 'Huyện', 4),
(53, 'Huyện Thạch An', 'Huyện', 4),
(58, 'Thành Phố Bắc Kạn', 'Thành phố', 6),
(60, 'Huyện Pác Nặm', 'Huyện', 6),
(61, 'Huyện Ba Bể', 'Huyện', 6),
(62, 'Huyện Ngân Sơn', 'Huyện', 6),
(63, 'Huyện Bạch Thông', 'Huyện', 6),
(64, 'Huyện Chợ Đồn', 'Huyện', 6),
(65, 'Huyện Chợ Mới', 'Huyện', 6),
(66, 'Huyện Na Rì', 'Huyện', 6),
(70, 'Thành phố Tuyên Quang', 'Thành phố', 8),
(71, 'Huyện Lâm Bình', 'Huyện', 8),
(72, 'Huyện Na Hang', 'Huyện', 8),
(73, 'Huyện Chiêm Hóa', 'Huyện', 8),
(74, 'Huyện Hàm Yên', 'Huyện', 8),
(75, 'Huyện Yên Sơn', 'Huyện', 8),
(76, 'Huyện Sơn Dương', 'Huyện', 8),
(80, 'Thành phố Lào Cai', 'Thành phố', 10),
(82, 'Huyện Bát Xát', 'Huyện', 10),
(83, 'Huyện Mường Khương', 'Huyện', 10),
(84, 'Huyện Si Ma Cai', 'Huyện', 10),
(85, 'Huyện Bắc Hà', 'Huyện', 10),
(86, 'Huyện Bảo Thắng', 'Huyện', 10),
(87, 'Huyện Bảo Yên', 'Huyện', 10),
(88, 'Thị xã Sa Pa', 'Thị xã', 10),
(89, 'Huyện Văn Bàn', 'Huyện', 10),
(94, 'Thành phố Điện Biên Phủ', 'Thành phố', 11),
(95, 'Thị Xã Mường Lay', 'Thị xã', 11),
(96, 'Huyện Mường Nhé', 'Huyện', 11),
(97, 'Huyện Mường Chà', 'Huyện', 11),
(98, 'Huyện Tủa Chùa', 'Huyện', 11),
(99, 'Huyện Tuần Giáo', 'Huyện', 11),
(100, 'Huyện Điện Biên', 'Huyện', 11),
(101, 'Huyện Điện Biên Đông', 'Huyện', 11),
(102, 'Huyện Mường Ảng', 'Huyện', 11),
(103, 'Huyện Nậm Pồ', 'Huyện', 11),
(105, 'Thành phố Lai Châu', 'Thành phố', 12),
(106, 'Huyện Tam Đường', 'Huyện', 12),
(107, 'Huyện Mường Tè', 'Huyện', 12),
(108, 'Huyện Sìn Hồ', 'Huyện', 12),
(109, 'Huyện Phong Thổ', 'Huyện', 12),
(110, 'Huyện Than Uyên', 'Huyện', 12),
(111, 'Huyện Tân Uyên', 'Huyện', 12),
(112, 'Huyện Nậm Nhùn', 'Huyện', 12),
(116, 'Thành phố Sơn La', 'Thành phố', 14),
(118, 'Huyện Quỳnh Nhai', 'Huyện', 14),
(119, 'Huyện Thuận Châu', 'Huyện', 14),
(120, 'Huyện Mường La', 'Huyện', 14),
(121, 'Huyện Bắc Yên', 'Huyện', 14),
(122, 'Huyện Phù Yên', 'Huyện', 14),
(123, 'Huyện Mộc Châu', 'Huyện', 14),
(124, 'Huyện Yên Châu', 'Huyện', 14),
(125, 'Huyện Mai Sơn', 'Huyện', 14),
(126, 'Huyện Sông Mã', 'Huyện', 14),
(127, 'Huyện Sốp Cộp', 'Huyện', 14),
(128, 'Huyện Vân Hồ', 'Huyện', 14),
(132, 'Thành phố Yên Bái', 'Thành phố', 15),
(133, 'Thị xã Nghĩa Lộ', 'Thị xã', 15),
(135, 'Huyện Lục Yên', 'Huyện', 15),
(136, 'Huyện Văn Yên', 'Huyện', 15),
(137, 'Huyện Mù Căng Chải', 'Huyện', 15),
(138, 'Huyện Trấn Yên', 'Huyện', 15),
(139, 'Huyện Trạm Tấu', 'Huyện', 15),
(140, 'Huyện Văn Chấn', 'Huyện', 15),
(141, 'Huyện Yên Bình', 'Huyện', 15),
(148, 'Thành phố Hòa Bình', 'Thành phố', 17),
(150, 'Huyện Đà Bắc', 'Huyện', 17),
(152, 'Huyện Lương Sơn', 'Huyện', 17),
(153, 'Huyện Kim Bôi', 'Huyện', 17),
(154, 'Huyện Cao Phong', 'Huyện', 17),
(155, 'Huyện Tân Lạc', 'Huyện', 17),
(156, 'Huyện Mai Châu', 'Huyện', 17),
(157, 'Huyện Lạc Sơn', 'Huyện', 17),
(158, 'Huyện Yên Thủy', 'Huyện', 17),
(159, 'Huyện Lạc Thủy', 'Huyện', 17),
(164, 'Thành phố Thái Nguyên', 'Thành phố', 19),
(165, 'Thành phố Sông Công', 'Thành phố', 19),
(167, 'Huyện Định Hóa', 'Huyện', 19),
(168, 'Huyện Phú Lương', 'Huyện', 19),
(169, 'Huyện Đồng Hỷ', 'Huyện', 19),
(170, 'Huyện Võ Nhai', 'Huyện', 19),
(171, 'Huyện Đại Từ', 'Huyện', 19),
(172, 'Thị xã Phổ Yên', 'Thị xã', 19),
(173, 'Huyện Phú Bình', 'Huyện', 19),
(178, 'Thành phố Lạng Sơn', 'Thành phố', 20),
(180, 'Huyện Tràng Định', 'Huyện', 20),
(181, 'Huyện Bình Gia', 'Huyện', 20),
(182, 'Huyện Văn Lãng', 'Huyện', 20),
(183, 'Huyện Cao Lộc', 'Huyện', 20),
(184, 'Huyện Văn Quan', 'Huyện', 20),
(185, 'Huyện Bắc Sơn', 'Huyện', 20),
(186, 'Huyện Hữu Lũng', 'Huyện', 20),
(187, 'Huyện Chi Lăng', 'Huyện', 20),
(188, 'Huyện Lộc Bình', 'Huyện', 20),
(189, 'Huyện Đình Lập', 'Huyện', 20),
(193, 'Thành phố Hạ Long', 'Thành phố', 22),
(194, 'Thành phố Móng Cái', 'Thành phố', 22),
(195, 'Thành phố Cẩm Phả', 'Thành phố', 22),
(196, 'Thành phố Uông Bí', 'Thành phố', 22),
(198, 'Huyện Bình Liêu', 'Huyện', 22),
(199, 'Huyện Tiên Yên', 'Huyện', 22),
(200, 'Huyện Đầm Hà', 'Huyện', 22),
(201, 'Huyện Hải Hà', 'Huyện', 22),
(202, 'Huyện Ba Chẽ', 'Huyện', 22),
(203, 'Huyện Vân Đồn', 'Huyện', 22),
(205, 'Thị xã Đông Triều', 'Thị xã', 22),
(206, 'Thị xã Quảng Yên', 'Thị xã', 22),
(207, 'Huyện Cô Tô', 'Huyện', 22),
(213, 'Thành phố Bắc Giang', 'Thành phố', 24),
(215, 'Huyện Yên Thế', 'Huyện', 24),
(216, 'Huyện Tân Yên', 'Huyện', 24),
(217, 'Huyện Lạng Giang', 'Huyện', 24),
(218, 'Huyện Lục Nam', 'Huyện', 24),
(219, 'Huyện Lục Ngạn', 'Huyện', 24),
(220, 'Huyện Sơn Động', 'Huyện', 24),
(221, 'Huyện Yên Dũng', 'Huyện', 24),
(222, 'Huyện Việt Yên', 'Huyện', 24),
(223, 'Huyện Hiệp Hòa', 'Huyện', 24),
(227, 'Thành phố Việt Trì', 'Thành phố', 25),
(228, 'Thị xã Phú Thọ', 'Thị xã', 25),
(230, 'Huyện Đoan Hùng', 'Huyện', 25),
(231, 'Huyện Hạ Hoà', 'Huyện', 25),
(232, 'Huyện Thanh Ba', 'Huyện', 25),
(233, 'Huyện Phù Ninh', 'Huyện', 25),
(234, 'Huyện Yên Lập', 'Huyện', 25),
(235, 'Huyện Cẩm Khê', 'Huyện', 25),
(236, 'Huyện Tam Nông', 'Huyện', 25),
(237, 'Huyện Lâm Thao', 'Huyện', 25),
(238, 'Huyện Thanh Sơn', 'Huyện', 25),
(239, 'Huyện Thanh Thuỷ', 'Huyện', 25),
(240, 'Huyện Tân Sơn', 'Huyện', 25),
(243, 'Thành phố Vĩnh Yên', 'Thành phố', 26),
(244, 'Thành phố Phúc Yên', 'Thành phố', 26),
(246, 'Huyện Lập Thạch', 'Huyện', 26),
(247, 'Huyện Tam Dương', 'Huyện', 26),
(248, 'Huyện Tam Đảo', 'Huyện', 26),
(249, 'Huyện Bình Xuyên', 'Huyện', 26),
(250, 'Huyện Mê Linh', 'Huyện', 1),
(251, 'Huyện Yên Lạc', 'Huyện', 26),
(252, 'Huyện Vĩnh Tường', 'Huyện', 26),
(253, 'Huyện Sông Lô', 'Huyện', 26),
(256, 'Thành phố Bắc Ninh', 'Thành phố', 27),
(258, 'Huyện Yên Phong', 'Huyện', 27),
(259, 'Huyện Quế Võ', 'Huyện', 27),
(260, 'Huyện Tiên Du', 'Huyện', 27),
(261, 'Thị xã Từ Sơn', 'Thị xã', 27),
(262, 'Huyện Thuận Thành', 'Huyện', 27),
(263, 'Huyện Gia Bình', 'Huyện', 27),
(264, 'Huyện Lương Tài', 'Huyện', 27),
(268, 'Quận Hà Đông', 'Quận', 1),
(269, 'Thị xã Sơn Tây', 'Thị xã', 1),
(271, 'Huyện Ba Vì', 'Huyện', 1),
(272, 'Huyện Phúc Thọ', 'Huyện', 1),
(273, 'Huyện Đan Phượng', 'Huyện', 1),
(274, 'Huyện Hoài Đức', 'Huyện', 1),
(275, 'Huyện Quốc Oai', 'Huyện', 1),
(276, 'Huyện Thạch Thất', 'Huyện', 1),
(277, 'Huyện Chương Mỹ', 'Huyện', 1),
(278, 'Huyện Thanh Oai', 'Huyện', 1),
(279, 'Huyện Thường Tín', 'Huyện', 1),
(280, 'Huyện Phú Xuyên', 'Huyện', 1),
(281, 'Huyện Ứng Hòa', 'Huyện', 1),
(282, 'Huyện Mỹ Đức', 'Huyện', 1),
(288, 'Thành phố Hải Dương', 'Thành phố', 30),
(290, 'Thành phố Chí Linh', 'Thành phố', 30),
(291, 'Huyện Nam Sách', 'Huyện', 30),
(292, 'Thị xã Kinh Môn', 'Thị xã', 30),
(293, 'Huyện Kim Thành', 'Huyện', 30),
(294, 'Huyện Thanh Hà', 'Huyện', 30),
(295, 'Huyện Cẩm Giàng', 'Huyện', 30),
(296, 'Huyện Bình Giang', 'Huyện', 30),
(297, 'Huyện Gia Lộc', 'Huyện', 30),
(298, 'Huyện Tứ Kỳ', 'Huyện', 30),
(299, 'Huyện Ninh Giang', 'Huyện', 30),
(300, 'Huyện Thanh Miện', 'Huyện', 30),
(303, 'Quận Hồng Bàng', 'Quận', 31),
(304, 'Quận Ngô Quyền', 'Quận', 31),
(305, 'Quận Lê Chân', 'Quận', 31),
(306, 'Quận Hải An', 'Quận', 31),
(307, 'Quận Kiến An', 'Quận', 31),
(308, 'Quận Đồ Sơn', 'Quận', 31),
(309, 'Quận Dương Kinh', 'Quận', 31),
(311, 'Huyện Thuỷ Nguyên', 'Huyện', 31),
(312, 'Huyện An Dương', 'Huyện', 31),
(313, 'Huyện An Lão', 'Huyện', 31),
(314, 'Huyện Kiến Thuỵ', 'Huyện', 31),
(315, 'Huyện Tiên Lãng', 'Huyện', 31),
(316, 'Huyện Vĩnh Bảo', 'Huyện', 31),
(317, 'Huyện Cát Hải', 'Huyện', 31),
(318, 'Huyện Bạch Long Vĩ', 'Huyện', 31),
(323, 'Thành phố Hưng Yên', 'Thành phố', 33),
(325, 'Huyện Văn Lâm', 'Huyện', 33),
(326, 'Huyện Văn Giang', 'Huyện', 33),
(327, 'Huyện Yên Mỹ', 'Huyện', 33),
(328, 'Thị xã Mỹ Hào', 'Thị xã', 33),
(329, 'Huyện Ân Thi', 'Huyện', 33),
(330, 'Huyện Khoái Châu', 'Huyện', 33),
(331, 'Huyện Kim Động', 'Huyện', 33),
(332, 'Huyện Tiên Lữ', 'Huyện', 33),
(333, 'Huyện Phù Cừ', 'Huyện', 33),
(336, 'Thành phố Thái Bình', 'Thành phố', 34),
(338, 'Huyện Quỳnh Phụ', 'Huyện', 34),
(339, 'Huyện Hưng Hà', 'Huyện', 34),
(340, 'Huyện Đông Hưng', 'Huyện', 34),
(341, 'Huyện Thái Thụy', 'Huyện', 34),
(342, 'Huyện Tiền Hải', 'Huyện', 34),
(343, 'Huyện Kiến Xương', 'Huyện', 34),
(344, 'Huyện Vũ Thư', 'Huyện', 34),
(347, 'Thành phố Phủ Lý', 'Thành phố', 35),
(349, 'Thị xã Duy Tiên', 'Thị xã', 35),
(350, 'Huyện Kim Bảng', 'Huyện', 35),
(351, 'Huyện Thanh Liêm', 'Huyện', 35),
(352, 'Huyện Bình Lục', 'Huyện', 35),
(353, 'Huyện Lý Nhân', 'Huyện', 35),
(356, 'Thành phố Nam Định', 'Thành phố', 36),
(358, 'Huyện Mỹ Lộc', 'Huyện', 36),
(359, 'Huyện Vụ Bản', 'Huyện', 36),
(360, 'Huyện Ý Yên', 'Huyện', 36),
(361, 'Huyện Nghĩa Hưng', 'Huyện', 36),
(362, 'Huyện Nam Trực', 'Huyện', 36),
(363, 'Huyện Trực Ninh', 'Huyện', 36),
(364, 'Huyện Xuân Trường', 'Huyện', 36),
(365, 'Huyện Giao Thủy', 'Huyện', 36),
(366, 'Huyện Hải Hậu', 'Huyện', 36),
(369, 'Thành phố Ninh Bình', 'Thành phố', 37),
(370, 'Thành phố Tam Điệp', 'Thành phố', 37),
(372, 'Huyện Nho Quan', 'Huyện', 37),
(373, 'Huyện Gia Viễn', 'Huyện', 37),
(374, 'Huyện Hoa Lư', 'Huyện', 37),
(375, 'Huyện Yên Khánh', 'Huyện', 37),
(376, 'Huyện Kim Sơn', 'Huyện', 37),
(377, 'Huyện Yên Mô', 'Huyện', 37),
(380, 'Thành phố Thanh Hóa', 'Thành phố', 38),
(381, 'Thị xã Bỉm Sơn', 'Thị xã', 38),
(382, 'Thành phố Sầm Sơn', 'Thành phố', 38),
(384, 'Huyện Mường Lát', 'Huyện', 38),
(385, 'Huyện Quan Hóa', 'Huyện', 38),
(386, 'Huyện Bá Thước', 'Huyện', 38),
(387, 'Huyện Quan Sơn', 'Huyện', 38),
(388, 'Huyện Lang Chánh', 'Huyện', 38),
(389, 'Huyện Ngọc Lặc', 'Huyện', 38),
(390, 'Huyện Cẩm Thủy', 'Huyện', 38),
(391, 'Huyện Thạch Thành', 'Huyện', 38),
(392, 'Huyện Hà Trung', 'Huyện', 38),
(393, 'Huyện Vĩnh Lộc', 'Huyện', 38),
(394, 'Huyện Yên Định', 'Huyện', 38),
(395, 'Huyện Thọ Xuân', 'Huyện', 38),
(396, 'Huyện Thường Xuân', 'Huyện', 38),
(397, 'Huyện Triệu Sơn', 'Huyện', 38),
(398, 'Huyện Thiệu Hóa', 'Huyện', 38),
(399, 'Huyện Hoằng Hóa', 'Huyện', 38),
(400, 'Huyện Hậu Lộc', 'Huyện', 38),
(401, 'Huyện Nga Sơn', 'Huyện', 38),
(402, 'Huyện Như Xuân', 'Huyện', 38),
(403, 'Huyện Như Thanh', 'Huyện', 38),
(404, 'Huyện Nông Cống', 'Huyện', 38),
(405, 'Huyện Đông Sơn', 'Huyện', 38),
(406, 'Huyện Quảng Xương', 'Huyện', 38),
(407, 'Thị xã Nghi Sơn', 'Thị xã', 38),
(412, 'Thành phố Vinh', 'Thành phố', 40),
(413, 'Thị xã Cửa Lò', 'Thị xã', 40),
(414, 'Thị xã Thái Hoà', 'Thị xã', 40),
(415, 'Huyện Quế Phong', 'Huyện', 40),
(416, 'Huyện Quỳ Châu', 'Huyện', 40),
(417, 'Huyện Kỳ Sơn', 'Huyện', 40),
(418, 'Huyện Tương Dương', 'Huyện', 40),
(419, 'Huyện Nghĩa Đàn', 'Huyện', 40),
(420, 'Huyện Quỳ Hợp', 'Huyện', 40),
(421, 'Huyện Quỳnh Lưu', 'Huyện', 40),
(422, 'Huyện Con Cuông', 'Huyện', 40),
(423, 'Huyện Tân Kỳ', 'Huyện', 40),
(424, 'Huyện Anh Sơn', 'Huyện', 40),
(425, 'Huyện Diễn Châu', 'Huyện', 40),
(426, 'Huyện Yên Thành', 'Huyện', 40),
(427, 'Huyện Đô Lương', 'Huyện', 40),
(428, 'Huyện Thanh Chương', 'Huyện', 40),
(429, 'Huyện Nghi Lộc', 'Huyện', 40),
(430, 'Huyện Nam Đàn', 'Huyện', 40),
(431, 'Huyện Hưng Nguyên', 'Huyện', 40),
(432, 'Thị xã Hoàng Mai', 'Thị xã', 40),
(436, 'Thành phố Hà Tĩnh', 'Thành phố', 42),
(437, 'Thị xã Hồng Lĩnh', 'Thị xã', 42),
(439, 'Huyện Hương Sơn', 'Huyện', 42),
(440, 'Huyện Đức Thọ', 'Huyện', 42),
(441, 'Huyện Vũ Quang', 'Huyện', 42),
(442, 'Huyện Nghi Xuân', 'Huyện', 42),
(443, 'Huyện Can Lộc', 'Huyện', 42),
(444, 'Huyện Hương Khê', 'Huyện', 42),
(445, 'Huyện Thạch Hà', 'Huyện', 42),
(446, 'Huyện Cẩm Xuyên', 'Huyện', 42),
(447, 'Huyện Kỳ Anh', 'Huyện', 42),
(448, 'Huyện Lộc Hà', 'Huyện', 42),
(449, 'Thị xã Kỳ Anh', 'Thị xã', 42),
(450, 'Thành Phố Đồng Hới', 'Thành phố', 44),
(452, 'Huyện Minh Hóa', 'Huyện', 44),
(453, 'Huyện Tuyên Hóa', 'Huyện', 44),
(454, 'Huyện Quảng Trạch', 'Huyện', 44),
(455, 'Huyện Bố Trạch', 'Huyện', 44),
(456, 'Huyện Quảng Ninh', 'Huyện', 44),
(457, 'Huyện Lệ Thủy', 'Huyện', 44),
(458, 'Thị xã Ba Đồn', 'Thị xã', 44),
(461, 'Thành phố Đông Hà', 'Thành phố', 45),
(462, 'Thị xã Quảng Trị', 'Thị xã', 45),
(464, 'Huyện Vĩnh Linh', 'Huyện', 45),
(465, 'Huyện Hướng Hóa', 'Huyện', 45),
(466, 'Huyện Gio Linh', 'Huyện', 45),
(467, 'Huyện Đa Krông', 'Huyện', 45),
(468, 'Huyện Cam Lộ', 'Huyện', 45),
(469, 'Huyện Triệu Phong', 'Huyện', 45),
(470, 'Huyện Hải Lăng', 'Huyện', 45),
(471, 'Huyện Cồn Cỏ', 'Huyện', 45),
(474, 'Thành phố Huế', 'Thành phố', 46),
(476, 'Huyện Phong Điền', 'Huyện', 46),
(477, 'Huyện Quảng Điền', 'Huyện', 46),
(478, 'Huyện Phú Vang', 'Huyện', 46),
(479, 'Thị xã Hương Thủy', 'Thị xã', 46),
(480, 'Thị xã Hương Trà', 'Thị xã', 46),
(481, 'Huyện A Lưới', 'Huyện', 46),
(482, 'Huyện Phú Lộc', 'Huyện', 46),
(483, 'Huyện Nam Đông', 'Huyện', 46),
(490, 'Quận Liên Chiểu', 'Quận', 48),
(491, 'Quận Thanh Khê', 'Quận', 48),
(492, 'Quận Hải Châu', 'Quận', 48),
(493, 'Quận Sơn Trà', 'Quận', 48),
(494, 'Quận Ngũ Hành Sơn', 'Quận', 48),
(495, 'Quận Cẩm Lệ', 'Quận', 48),
(497, 'Huyện Hòa Vang', 'Huyện', 48),
(498, 'Huyện Hoàng Sa', 'Huyện', 48),
(502, 'Thành phố Tam Kỳ', 'Thành phố', 49),
(503, 'Thành phố Hội An', 'Thành phố', 49),
(504, 'Huyện Tây Giang', 'Huyện', 49),
(505, 'Huyện Đông Giang', 'Huyện', 49),
(506, 'Huyện Đại Lộc', 'Huyện', 49),
(507, 'Thị xã Điện Bàn', 'Thị xã', 49),
(508, 'Huyện Duy Xuyên', 'Huyện', 49),
(509, 'Huyện Quế Sơn', 'Huyện', 49),
(510, 'Huyện Nam Giang', 'Huyện', 49),
(511, 'Huyện Phước Sơn', 'Huyện', 49),
(512, 'Huyện Hiệp Đức', 'Huyện', 49),
(513, 'Huyện Thăng Bình', 'Huyện', 49),
(514, 'Huyện Tiên Phước', 'Huyện', 49),
(515, 'Huyện Bắc Trà My', 'Huyện', 49),
(516, 'Huyện Nam Trà My', 'Huyện', 49),
(517, 'Huyện Núi Thành', 'Huyện', 49),
(518, 'Huyện Phú Ninh', 'Huyện', 49),
(519, 'Huyện Nông Sơn', 'Huyện', 49),
(522, 'Thành phố Quảng Ngãi', 'Thành phố', 51),
(524, 'Huyện Bình Sơn', 'Huyện', 51),
(525, 'Huyện Trà Bồng', 'Huyện', 51),
(527, 'Huyện Sơn Tịnh', 'Huyện', 51),
(528, 'Huyện Tư Nghĩa', 'Huyện', 51),
(529, 'Huyện Sơn Hà', 'Huyện', 51),
(530, 'Huyện Sơn Tây', 'Huyện', 51),
(531, 'Huyện Minh Long', 'Huyện', 51),
(532, 'Huyện Nghĩa Hành', 'Huyện', 51),
(533, 'Huyện Mộ Đức', 'Huyện', 51),
(534, 'Thị xã Đức Phổ', 'Thị xã', 51),
(535, 'Huyện Ba Tơ', 'Huyện', 51),
(536, 'Huyện Lý Sơn', 'Huyện', 51),
(540, 'Thành phố Qui Nhơn', 'Thành phố', 52),
(542, 'Huyện An Lão', 'Huyện', 52),
(543, 'Thị xã Hoài Nhơn', 'Thị xã', 52),
(544, 'Huyện Hoài Ân', 'Huyện', 52),
(545, 'Huyện Phù Mỹ', 'Huyện', 52),
(546, 'Huyện Vĩnh Thạnh', 'Huyện', 52),
(547, 'Huyện Tây Sơn', 'Huyện', 52),
(548, 'Huyện Phù Cát', 'Huyện', 52),
(549, 'Thị xã An Nhơn', 'Thị xã', 52),
(550, 'Huyện Tuy Phước', 'Huyện', 52),
(551, 'Huyện Vân Canh', 'Huyện', 52),
(555, 'Thành phố Tuy Hoà', 'Thành phố', 54),
(557, 'Thị xã Sông Cầu', 'Thị xã', 54),
(558, 'Huyện Đồng Xuân', 'Huyện', 54),
(559, 'Huyện Tuy An', 'Huyện', 54),
(560, 'Huyện Sơn Hòa', 'Huyện', 54),
(561, 'Huyện Sông Hinh', 'Huyện', 54),
(562, 'Huyện Tây Hoà', 'Huyện', 54),
(563, 'Huyện Phú Hoà', 'Huyện', 54),
(564, 'Thị xã Đông Hòa', 'Thị xã', 54),
(568, 'Thành phố Nha Trang', 'Thành phố', 56),
(569, 'Thành phố Cam Ranh', 'Thành phố', 56),
(570, 'Huyện Cam Lâm', 'Huyện', 56),
(571, 'Huyện Vạn Ninh', 'Huyện', 56),
(572, 'Thị xã Ninh Hòa', 'Thị xã', 56),
(573, 'Huyện Khánh Vĩnh', 'Huyện', 56),
(574, 'Huyện Diên Khánh', 'Huyện', 56),
(575, 'Huyện Khánh Sơn', 'Huyện', 56),
(576, 'Huyện Trường Sa', 'Huyện', 56),
(582, 'Thành phố Phan Rang-Tháp Chàm', 'Thành phố', 58),
(584, 'Huyện Bác Ái', 'Huyện', 58),
(585, 'Huyện Ninh Sơn', 'Huyện', 58),
(586, 'Huyện Ninh Hải', 'Huyện', 58),
(587, 'Huyện Ninh Phước', 'Huyện', 58),
(588, 'Huyện Thuận Bắc', 'Huyện', 58),
(589, 'Huyện Thuận Nam', 'Huyện', 58),
(593, 'Thành phố Phan Thiết', 'Thành phố', 60),
(594, 'Thị xã La Gi', 'Thị xã', 60),
(595, 'Huyện Tuy Phong', 'Huyện', 60),
(596, 'Huyện Bắc Bình', 'Huyện', 60),
(597, 'Huyện Hàm Thuận Bắc', 'Huyện', 60),
(598, 'Huyện Hàm Thuận Nam', 'Huyện', 60),
(599, 'Huyện Tánh Linh', 'Huyện', 60),
(600, 'Huyện Đức Linh', 'Huyện', 60),
(601, 'Huyện Hàm Tân', 'Huyện', 60),
(602, 'Huyện Phú Quí', 'Huyện', 60),
(608, 'Thành phố Kon Tum', 'Thành phố', 62),
(610, 'Huyện Đắk Glei', 'Huyện', 62),
(611, 'Huyện Ngọc Hồi', 'Huyện', 62),
(612, 'Huyện Đắk Tô', 'Huyện', 62),
(613, 'Huyện Kon Plông', 'Huyện', 62),
(614, 'Huyện Kon Rẫy', 'Huyện', 62),
(615, 'Huyện Đắk Hà', 'Huyện', 62),
(616, 'Huyện Sa Thầy', 'Huyện', 62),
(617, 'Huyện Tu Mơ Rông', 'Huyện', 62),
(618, 'Huyện Ia H\' Drai', 'Huyện', 62),
(622, 'Thành phố Pleiku', 'Thành phố', 64),
(623, 'Thị xã An Khê', 'Thị xã', 64),
(624, 'Thị xã Ayun Pa', 'Thị xã', 64),
(625, 'Huyện KBang', 'Huyện', 64),
(626, 'Huyện Đăk Đoa', 'Huyện', 64),
(627, 'Huyện Chư Păh', 'Huyện', 64),
(628, 'Huyện Ia Grai', 'Huyện', 64),
(629, 'Huyện Mang Yang', 'Huyện', 64),
(630, 'Huyện Kông Chro', 'Huyện', 64),
(631, 'Huyện Đức Cơ', 'Huyện', 64),
(632, 'Huyện Chư Prông', 'Huyện', 64),
(633, 'Huyện Chư Sê', 'Huyện', 64),
(634, 'Huyện Đăk Pơ', 'Huyện', 64),
(635, 'Huyện Ia Pa', 'Huyện', 64),
(637, 'Huyện Krông Pa', 'Huyện', 64),
(638, 'Huyện Phú Thiện', 'Huyện', 64),
(639, 'Huyện Chư Pưh', 'Huyện', 64),
(643, 'Thành phố Buôn Ma Thuột', 'Thành phố', 66),
(644, 'Thị Xã Buôn Hồ', 'Thị xã', 66),
(645, 'Huyện Ea H\'leo', 'Huyện', 66),
(646, 'Huyện Ea Súp', 'Huyện', 66),
(647, 'Huyện Buôn Đôn', 'Huyện', 66),
(648, 'Huyện Cư M\'gar', 'Huyện', 66),
(649, 'Huyện Krông Búk', 'Huyện', 66),
(650, 'Huyện Krông Năng', 'Huyện', 66),
(651, 'Huyện Ea Kar', 'Huyện', 66),
(652, 'Huyện M\'Đrắk', 'Huyện', 66),
(653, 'Huyện Krông Bông', 'Huyện', 66),
(654, 'Huyện Krông Pắc', 'Huyện', 66),
(655, 'Huyện Krông A Na', 'Huyện', 66),
(656, 'Huyện Lắk', 'Huyện', 66),
(657, 'Huyện Cư Kuin', 'Huyện', 66),
(660, 'Thành phố Gia Nghĩa', 'Thành phố', 67),
(661, 'Huyện Đăk Glong', 'Huyện', 67),
(662, 'Huyện Cư Jút', 'Huyện', 67),
(663, 'Huyện Đắk Mil', 'Huyện', 67),
(664, 'Huyện Krông Nô', 'Huyện', 67),
(665, 'Huyện Đắk Song', 'Huyện', 67),
(666, 'Huyện Đắk R\'Lấp', 'Huyện', 67),
(667, 'Huyện Tuy Đức', 'Huyện', 67),
(672, 'Thành phố Đà Lạt', 'Thành phố', 68),
(673, 'Thành phố Bảo Lộc', 'Thành phố', 68),
(674, 'Huyện Đam Rông', 'Huyện', 68),
(675, 'Huyện Lạc Dương', 'Huyện', 68),
(676, 'Huyện Lâm Hà', 'Huyện', 68),
(677, 'Huyện Đơn Dương', 'Huyện', 68),
(678, 'Huyện Đức Trọng', 'Huyện', 68),
(679, 'Huyện Di Linh', 'Huyện', 68),
(680, 'Huyện Bảo Lâm', 'Huyện', 68),
(681, 'Huyện Đạ Huoai', 'Huyện', 68),
(682, 'Huyện Đạ Tẻh', 'Huyện', 68),
(683, 'Huyện Cát Tiên', 'Huyện', 68),
(688, 'Thị xã Phước Long', 'Thị xã', 70),
(689, 'Thành phố Đồng Xoài', 'Thành phố', 70),
(690, 'Thị xã Bình Long', 'Thị xã', 70),
(691, 'Huyện Bù Gia Mập', 'Huyện', 70),
(692, 'Huyện Lộc Ninh', 'Huyện', 70),
(693, 'Huyện Bù Đốp', 'Huyện', 70),
(694, 'Huyện Hớn Quản', 'Huyện', 70),
(695, 'Huyện Đồng Phú', 'Huyện', 70),
(696, 'Huyện Bù Đăng', 'Huyện', 70),
(697, 'Huyện Chơn Thành', 'Huyện', 70),
(698, 'Huyện Phú Riềng', 'Huyện', 70),
(703, 'Thành phố Tây Ninh', 'Thành phố', 72),
(705, 'Huyện Tân Biên', 'Huyện', 72),
(706, 'Huyện Tân Châu', 'Huyện', 72),
(707, 'Huyện Dương Minh Châu', 'Huyện', 72),
(708, 'Huyện Châu Thành', 'Huyện', 72),
(709, 'Thị xã Hòa Thành', 'Thị xã', 72),
(710, 'Huyện Gò Dầu', 'Huyện', 72),
(711, 'Huyện Bến Cầu', 'Huyện', 72),
(712, 'Thị xã Trảng Bàng', 'Thị xã', 72),
(718, 'Thành phố Thủ Dầu Một', 'Thành phố', 74),
(719, 'Huyện Bàu Bàng', 'Huyện', 74),
(720, 'Huyện Dầu Tiếng', 'Huyện', 74),
(721, 'Thị xã Bến Cát', 'Thị xã', 74),
(722, 'Huyện Phú Giáo', 'Huyện', 74),
(723, 'Thị xã Tân Uyên', 'Thị xã', 74),
(724, 'Thành phố Dĩ An', 'Thành phố', 74),
(725, 'Thành phố Thuận An', 'Thành phố', 74),
(726, 'Huyện Bắc Tân Uyên', 'Huyện', 74),
(731, 'Thành phố Biên Hòa', 'Thành phố', 75),
(732, 'Thành phố Long Khánh', 'Thành phố', 75),
(734, 'Huyện Tân Phú', 'Huyện', 75),
(735, 'Huyện Vĩnh Cửu', 'Huyện', 75),
(736, 'Huyện Định Quán', 'Huyện', 75),
(737, 'Huyện Trảng Bom', 'Huyện', 75),
(738, 'Huyện Thống Nhất', 'Huyện', 75),
(739, 'Huyện Cẩm Mỹ', 'Huyện', 75),
(740, 'Huyện Long Thành', 'Huyện', 75),
(741, 'Huyện Xuân Lộc', 'Huyện', 75),
(742, 'Huyện Nhơn Trạch', 'Huyện', 75),
(747, 'Thành phố Vũng Tàu', 'Thành phố', 77),
(748, 'Thành phố Bà Rịa', 'Thành phố', 77),
(750, 'Huyện Châu Đức', 'Huyện', 77),
(751, 'Huyện Xuyên Mộc', 'Huyện', 77),
(752, 'Huyện Long Điền', 'Huyện', 77),
(753, 'Huyện Đất Đỏ', 'Huyện', 77),
(754, 'Thị xã Phú Mỹ', 'Thị xã', 77),
(755, 'Huyện Côn Đảo', 'Huyện', 77),
(760, 'Quận 1', 'Quận', 79),
(761, 'Quận 12', 'Quận', 79),
(762, 'Quận Thủ Đức', 'Quận', 79),
(763, 'Quận 9', 'Quận', 79),
(764, 'Quận Gò Vấp', 'Quận', 79),
(765, 'Quận Bình Thạnh', 'Quận', 79),
(766, 'Quận Tân Bình', 'Quận', 79),
(767, 'Quận Tân Phú', 'Quận', 79),
(768, 'Quận Phú Nhuận', 'Quận', 79),
(769, 'Quận 2', 'Quận', 79),
(770, 'Quận 3', 'Quận', 79),
(771, 'Quận 10', 'Quận', 79),
(772, 'Quận 11', 'Quận', 79),
(773, 'Quận 4', 'Quận', 79),
(774, 'Quận 5', 'Quận', 79),
(775, 'Quận 6', 'Quận', 79),
(776, 'Quận 8', 'Quận', 79),
(777, 'Quận Bình Tân', 'Quận', 79),
(778, 'Quận 7', 'Quận', 79),
(783, 'Huyện Củ Chi', 'Huyện', 79),
(784, 'Huyện Hóc Môn', 'Huyện', 79),
(785, 'Huyện Bình Chánh', 'Huyện', 79),
(786, 'Huyện Nhà Bè', 'Huyện', 79),
(787, 'Huyện Cần Giờ', 'Huyện', 79),
(794, 'Thành phố Tân An', 'Thành phố', 80),
(795, 'Thị xã Kiến Tường', 'Thị xã', 80),
(796, 'Huyện Tân Hưng', 'Huyện', 80),
(797, 'Huyện Vĩnh Hưng', 'Huyện', 80),
(798, 'Huyện Mộc Hóa', 'Huyện', 80),
(799, 'Huyện Tân Thạnh', 'Huyện', 80),
(800, 'Huyện Thạnh Hóa', 'Huyện', 80),
(801, 'Huyện Đức Huệ', 'Huyện', 80),
(802, 'Huyện Đức Hòa', 'Huyện', 80),
(803, 'Huyện Bến Lức', 'Huyện', 80),
(804, 'Huyện Thủ Thừa', 'Huyện', 80),
(805, 'Huyện Tân Trụ', 'Huyện', 80),
(806, 'Huyện Cần Đước', 'Huyện', 80),
(807, 'Huyện Cần Giuộc', 'Huyện', 80),
(808, 'Huyện Châu Thành', 'Huyện', 80),
(815, 'Thành phố Mỹ Tho', 'Thành phố', 82),
(816, 'Thị xã Gò Công', 'Thị xã', 82),
(817, 'Thị xã Cai Lậy', 'Thị xã', 82),
(818, 'Huyện Tân Phước', 'Huyện', 82),
(819, 'Huyện Cái Bè', 'Huyện', 82),
(820, 'Huyện Cai Lậy', 'Huyện', 82),
(821, 'Huyện Châu Thành', 'Huyện', 82),
(822, 'Huyện Chợ Gạo', 'Huyện', 82),
(823, 'Huyện Gò Công Tây', 'Huyện', 82),
(824, 'Huyện Gò Công Đông', 'Huyện', 82),
(825, 'Huyện Tân Phú Đông', 'Huyện', 82),
(829, 'Thành phố Bến Tre', 'Thành phố', 83),
(831, 'Huyện Châu Thành', 'Huyện', 83),
(832, 'Huyện Chợ Lách', 'Huyện', 83),
(833, 'Huyện Mỏ Cày Nam', 'Huyện', 83),
(834, 'Huyện Giồng Trôm', 'Huyện', 83),
(835, 'Huyện Bình Đại', 'Huyện', 83),
(836, 'Huyện Ba Tri', 'Huyện', 83),
(837, 'Huyện Thạnh Phú', 'Huyện', 83),
(838, 'Huyện Mỏ Cày Bắc', 'Huyện', 83),
(842, 'Thành phố Trà Vinh', 'Thành phố', 84),
(844, 'Huyện Càng Long', 'Huyện', 84),
(845, 'Huyện Cầu Kè', 'Huyện', 84),
(846, 'Huyện Tiểu Cần', 'Huyện', 84),
(847, 'Huyện Châu Thành', 'Huyện', 84),
(848, 'Huyện Cầu Ngang', 'Huyện', 84),
(849, 'Huyện Trà Cú', 'Huyện', 84),
(850, 'Huyện Duyên Hải', 'Huyện', 84),
(851, 'Thị xã Duyên Hải', 'Thị xã', 84),
(855, 'Thành phố Vĩnh Long', 'Thành phố', 86),
(857, 'Huyện Long Hồ', 'Huyện', 86),
(858, 'Huyện Mang Thít', 'Huyện', 86),
(859, 'Huyện  Vũng Liêm', 'Huyện', 86),
(860, 'Huyện Tam Bình', 'Huyện', 86),
(861, 'Thị xã Bình Minh', 'Thị xã', 86),
(862, 'Huyện Trà Ôn', 'Huyện', 86),
(863, 'Huyện Bình Tân', 'Huyện', 86),
(866, 'Thành phố Cao Lãnh', 'Thành phố', 87),
(867, 'Thành phố Sa Đéc', 'Thành phố', 87),
(868, 'Thị xã Hồng Ngự', 'Thị xã', 87),
(869, 'Huyện Tân Hồng', 'Huyện', 87),
(870, 'Huyện Hồng Ngự', 'Huyện', 87),
(871, 'Huyện Tam Nông', 'Huyện', 87),
(872, 'Huyện Tháp Mười', 'Huyện', 87),
(873, 'Huyện Cao Lãnh', 'Huyện', 87),
(874, 'Huyện Thanh Bình', 'Huyện', 87),
(875, 'Huyện Lấp Vò', 'Huyện', 87),
(876, 'Huyện Lai Vung', 'Huyện', 87),
(877, 'Huyện Châu Thành', 'Huyện', 87),
(883, 'Thành phố Long Xuyên', 'Thành phố', 89),
(884, 'Thành phố Châu Đốc', 'Thành phố', 89),
(886, 'Huyện An Phú', 'Huyện', 89),
(887, 'Thị xã Tân Châu', 'Thị xã', 89),
(888, 'Huyện Phú Tân', 'Huyện', 89),
(889, 'Huyện Châu Phú', 'Huyện', 89),
(890, 'Huyện Tịnh Biên', 'Huyện', 89),
(891, 'Huyện Tri Tôn', 'Huyện', 89),
(892, 'Huyện Châu Thành', 'Huyện', 89),
(893, 'Huyện Chợ Mới', 'Huyện', 89),
(894, 'Huyện Thoại Sơn', 'Huyện', 89),
(899, 'Thành phố Rạch Giá', 'Thành phố', 91),
(900, 'Thành phố Hà Tiên', 'Thành phố', 91),
(902, 'Huyện Kiên Lương', 'Huyện', 91),
(903, 'Huyện Hòn Đất', 'Huyện', 91),
(904, 'Huyện Tân Hiệp', 'Huyện', 91),
(905, 'Huyện Châu Thành', 'Huyện', 91),
(906, 'Huyện Giồng Riềng', 'Huyện', 91),
(907, 'Huyện Gò Quao', 'Huyện', 91),
(908, 'Huyện An Biên', 'Huyện', 91),
(909, 'Huyện An Minh', 'Huyện', 91),
(910, 'Huyện Vĩnh Thuận', 'Huyện', 91),
(911, 'Huyện Phú Quốc', 'Huyện', 91),
(912, 'Huyện Kiên Hải', 'Huyện', 91),
(913, 'Huyện U Minh Thượng', 'Huyện', 91),
(914, 'Huyện Giang Thành', 'Huyện', 91),
(916, 'Quận Ninh Kiều', 'Quận', 92),
(917, 'Quận Ô Môn', 'Quận', 92),
(918, 'Quận Bình Thuỷ', 'Quận', 92),
(919, 'Quận Cái Răng', 'Quận', 92),
(923, 'Quận Thốt Nốt', 'Quận', 92),
(924, 'Huyện Vĩnh Thạnh', 'Huyện', 92),
(925, 'Huyện Cờ Đỏ', 'Huyện', 92),
(926, 'Huyện Phong Điền', 'Huyện', 92),
(927, 'Huyện Thới Lai', 'Huyện', 92),
(930, 'Thành phố Vị Thanh', 'Thành phố', 93),
(931, 'Thành phố Ngã Bảy', 'Thành phố', 93),
(932, 'Huyện Châu Thành A', 'Huyện', 93),
(933, 'Huyện Châu Thành', 'Huyện', 93),
(934, 'Huyện Phụng Hiệp', 'Huyện', 93),
(935, 'Huyện Vị Thuỷ', 'Huyện', 93),
(936, 'Huyện Long Mỹ', 'Huyện', 93),
(937, 'Thị xã Long Mỹ', 'Thị xã', 93),
(941, 'Thành phố Sóc Trăng', 'Thành phố', 94),
(942, 'Huyện Châu Thành', 'Huyện', 94),
(943, 'Huyện Kế Sách', 'Huyện', 94),
(944, 'Huyện Mỹ Tú', 'Huyện', 94),
(945, 'Huyện Cù Lao Dung', 'Huyện', 94),
(946, 'Huyện Long Phú', 'Huyện', 94),
(947, 'Huyện Mỹ Xuyên', 'Huyện', 94),
(948, 'Thị xã Ngã Năm', 'Thị xã', 94),
(949, 'Huyện Thạnh Trị', 'Huyện', 94),
(950, 'Thị xã Vĩnh Châu', 'Thị xã', 94),
(951, 'Huyện Trần Đề', 'Huyện', 94),
(954, 'Thành phố Bạc Liêu', 'Thành phố', 95),
(956, 'Huyện Hồng Dân', 'Huyện', 95),
(957, 'Huyện Phước Long', 'Huyện', 95),
(958, 'Huyện Vĩnh Lợi', 'Huyện', 95),
(959, 'Thị xã Giá Rai', 'Thị xã', 95),
(960, 'Huyện Đông Hải', 'Huyện', 95),
(961, 'Huyện Hoà Bình', 'Huyện', 95),
(964, 'Thành phố Cà Mau', 'Thành phố', 96),
(966, 'Huyện U Minh', 'Huyện', 96),
(967, 'Huyện Thới Bình', 'Huyện', 96),
(968, 'Huyện Trần Văn Thời', 'Huyện', 96),
(969, 'Huyện Cái Nước', 'Huyện', 96),
(970, 'Huyện Đầm Dơi', 'Huyện', 96),
(971, 'Huyện Năm Căn', 'Huyện', 96),
(972, 'Huyện Phú Tân', 'Huyện', 96),
(973, 'Huyện Ngọc Hiển', 'Huyện', 96);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `virtual_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_product` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `star` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `id_user`, `virtual_name`, `id_product`, `content`, `star`, `created_at`, `updated_at`) VALUES
(1, 5, 'van cuong', 'SP1007', 'Sản phẩm tốt!', 5, '2018-11-18 14:05:34', '2018-11-18 14:05:34'),
(2, 6, 'Ẩn danh', 'SP1007', 'Áo chất lượng khá tốt!', 4, '2018-11-18 14:17:20', '2018-11-18 14:17:20'),
(3, 6, 'Meo', 'SP1007', 'Good!!', 4, '2018-11-18 14:20:19', '2018-11-18 14:20:19'),
(7, 6, 'jacky', 'SP1012', 'Sản phẩm đẹp quá', 3, '2018-11-23 02:53:34', '2018-11-23 02:53:34'),
(8, 6, 'lucy', 'SP1012', NULL, 5, '2018-11-23 02:59:33', '2018-11-23 02:59:33'),
(9, 6, 'wendy', 'SP1013', NULL, 4, '2018-11-23 03:00:06', '2018-11-23 03:00:06'),
(10, 5, 'snow', 'SP1012', NULL, 3, '2018-11-25 12:08:06', '2018-11-25 12:08:06'),
(11, 5, 'van cuong', 'SP1011', NULL, 4, '2018-11-27 03:16:20', '2018-11-27 03:16:20'),
(12, 5, NULL, 'SP1023', NULL, 5, '2019-01-22 14:15:45', '2019-01-22 14:15:45'),
(13, 5, 'Mr C', 'SP1023', NULL, 5, '2019-01-22 14:17:37', '2019-01-22 14:17:37'),
(14, 5, 'Mr C', 'SP1023', NULL, 5, '2019-01-22 14:25:15', '2019-01-22 14:25:15'),
(15, 5, 'Mr C', 'SP1023', NULL, 5, '2019-01-22 14:25:15', '2019-01-22 14:25:15'),
(16, 5, 'Mr C', 'SP1023', NULL, 5, '2019-01-22 14:25:15', '2019-01-22 14:25:15'),
(17, 5, 'Mr C', 'SP1023', NULL, 5, '2019-01-22 14:25:15', '2019-01-22 14:25:15'),
(18, 5, 'Mr C', 'SP1023', NULL, 5, '2019-01-22 14:25:15', '2019-01-22 14:25:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `gender`
--

INSERT INTO `gender` (`id`, `name`) VALUES
(1, 'Nam'),
(2, 'Nữ'),
(3, 'Trẻ em'),
(4, 'Cả nam và nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'The Blue Exchange', NULL, NULL),
(2, 'Canifa', NULL, NULL),
(3, 'Hoang Phuc International', NULL, NULL),
(4, 'Elise', NULL, NULL),
(5, 'Lime Orange', NULL, NULL),
(6, 'EOM', '2018-11-22 13:51:33', '2018-11-22 13:51:33'),
(7, 'Gucci', '2018-11-26 09:14:49', '2018-11-26 09:14:49'),
(8, 'Chanel', '2018-11-26 09:16:50', '2018-11-26 09:16:50'),
(9, 'L&V', '2018-11-26 09:17:02', '2018-11-26 09:17:02'),
(10, 'heart club', '2018-11-26 09:17:44', '2018-11-26 09:17:44'),
(11, 'HERMET', '2018-11-26 09:18:25', '2018-11-26 09:18:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2456, '2014_10_12_000000_create_user_table', 1),
(2457, '2014_10_12_100000_create_password_resets_table', 1),
(2458, '2018_05_30_020441_create_role_table', 1),
(2459, '2018_06_08_081557_create_config_table', 1),
(2460, '2018_09_16_144349_create_type_product_table', 1),
(2461, '2018_09_16_150255_create_manufacturer_table', 1),
(2462, '2018_09_18_070517_create_bill_table', 1),
(2463, '2018_09_18_070844_create_bill_detail_table', 1),
(2464, '2018_09_18_070930_create_cart_table', 1),
(2465, '2018_09_18_071009_create_cart_detail_table', 1),
(2466, '2018_09_18_071040_create_discount_code_table', 1),
(2467, '2018_09_18_071106_create_feedback_table', 1),
(2468, '2018_09_18_071147_create_customer_table', 1),
(2469, '2018_09_18_071210_create_returns_table', 1),
(2470, '2018_09_25_030856_create_shippers_table', 1),
(2471, '2018_09_29_131846_create_store_table', 1),
(2472, '2018_10_02_104502_create_product_store_table', 1),
(2473, '2018_10_02_104936_create_supplier_table', 1),
(2474, '2018_10_05_084152_create_size_table', 1),
(2475, '2018_10_05_092242_create_color_table', 1),
(2476, '2018_10_07_022322_create_products_table', 1),
(2477, '2018_10_20_082612_create_product_images_table', 1),
(2478, '2018_10_20_083106_create_product_detail_table', 1),
(2479, '2018_10_24_012713_create_my_product_table', 1),
(2480, '2018_10_29_024120_create_package_order_table', 2),
(2481, '2018_10_29_030416_create_staff_table', 2),
(2482, '2018_10_29_030432_create_staff_type_table', 2),
(2483, '2018_11_15_161134_create_promocodes_table', 3),
(2484, '2018_11_17_102552_create_regiser_table', 4),
(2485, '2018_11_17_102740_create_register_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `my_product`
--

CREATE TABLE `my_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_size` int(10) DEFAULT NULL,
  `id_color` int(10) DEFAULT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `my_product`
--

INSERT INTO `my_product` (`id`, `id_product`, `id_user`, `id_size`, `id_color`, `image`, `created_at`, `updated_at`) VALUES
(1, 'SP1007', 6, 4, 7, '/uploads/ao_so_mi_knot_do1.jpg', '2018-11-17 01:01:42', '2018-11-17 01:01:42'),
(2, 'SP1007', 6, 1, 1, '/uploads/ao_so_mi_knot_trang1.jpg', '2018-11-18 15:29:44', '2018-11-18 15:29:44'),
(3, 'SP1024', 5, NULL, 1, 'http://project.com/uploads/somi_trang1.jpg', '2018-11-27 03:16:42', '2018-11-27 03:16:42'),
(4, 'SP1020', 19, NULL, 18, 'uploads/khoac_den1.jpg', '2020-12-22 02:40:50', '2020-12-22 02:40:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `package_order`
--

CREATE TABLE `package_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_staff` int(11) DEFAULT NULL,
  `export_staff` int(11) DEFAULT NULL,
  `shipper` int(11) DEFAULT NULL,
  `payment_method` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `date_package` date NOT NULL,
  `date_finish` date DEFAULT NULL,
  `date_cancel` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `package_order`
--

INSERT INTO `package_order` (`id`, `id_bill`, `package_staff`, `export_staff`, `shipper`, `payment_method`, `date_package`, `date_finish`, `date_cancel`, `created_at`, `updated_at`) VALUES
(5, 'DH1010', 1, 3, 5, 'Thanh toán khi nhận hàng', '2018-11-07', NULL, NULL, '2018-11-06 18:48:15', '2018-11-06 18:48:15'),
(6, 'DH1017', 1, 3, 5, 'Thanh toán khi nhận hàng', '2018-11-08', NULL, NULL, '2018-11-08 01:22:03', '2018-11-08 01:22:03'),
(7, 'DH1020', 1, 3, 5, 'Thanh toán khi nhận hàng', '2018-11-13', NULL, NULL, '2018-11-13 00:28:42', '2018-11-13 00:28:42'),
(8, 'DH1021', 1, 3, 5, 'Thanh toán khi nhận hàng', '2018-11-13', NULL, NULL, '2018-11-13 00:37:48', '2018-11-13 00:37:48'),
(9, 'DH1022', 1, 3, 5, 'Thanh toán khi nhận hàng', '2018-11-18', NULL, NULL, '2018-11-18 14:06:40', '2018-11-18 14:06:40'),
(10, 'DH1023', 2, 4, 5, 'Thanh toán khi nhận hàng', '2018-11-18', NULL, NULL, '2018-11-18 14:08:44', '2018-11-18 14:08:44'),
(11, 'DH1018', 1, 3, 5, 'Thanh toán khi nhận hàng', '2018-11-18', '2018-11-18', NULL, '2018-11-18 14:16:21', '2018-11-18 14:16:24'),
(12, 'DH1026', 2, 4, 6, 'Thanh toán khi nhận hàng', '2018-11-20', '2018-11-20', NULL, '2018-11-20 14:05:53', '2018-11-20 14:06:13'),
(13, 'DH1025', 1, 3, 5, 'Thanh toán khi nhận hàng', '2018-11-20', '2018-11-20', NULL, '2018-11-20 16:00:57', '2018-11-20 16:10:07'),
(14, 'DH1012', 1, 3, 5, 'Thanh toán khi nhận hàng', '2018-11-20', '2018-11-20', NULL, '2018-11-20 16:11:48', '2018-11-20 16:11:52'),
(15, 'DH1015', 1, 3, 5, 'Thanh toán khi nhận hàng', '2018-11-20', '2018-11-20', NULL, '2018-11-20 16:14:09', '2018-11-20 16:14:12'),
(16, 'DH1028', 1, 3, 5, 'Thanh toán khi nhận hàng', '2018-11-23', '2018-11-23', NULL, '2018-11-23 02:12:59', '2018-11-23 02:13:02'),
(17, 'DH1032', 2, 4, 6, 'Thanh toán khi nhận hàng', '2018-11-27', '2018-11-27', NULL, '2018-11-27 03:15:08', '2018-11-27 03:15:35'),
(18, 'DH1034', 1, 3, 5, 'Thanh toán khi nhận hàng', '2018-11-28', '2018-11-28', NULL, '2018-11-28 02:29:19', '2018-11-28 02:29:28'),
(19, 'DH1039', 1, 3, 5, 'Thanh toán khi nhận hàng', '2018-12-04', '2018-12-04', NULL, '2018-12-04 08:18:47', '2018-12-04 08:18:51'),
(20, 'DH1033', 1, 3, 5, 'Thanh toán khi nhận hàng', '2018-12-05', NULL, NULL, '2018-12-05 02:41:05', '2018-12-05 02:41:05'),
(21, 'DH1040', 1, 3, 5, 'Thanh toán khi nhận hàng', '2019-04-06', '2019-04-06', NULL, '2019-04-06 13:33:01', '2019-04-06 13:33:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_type` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `import_price` double NOT NULL DEFAULT 0,
  `price` double NOT NULL DEFAULT 0,
  `promotion_price` double NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `new` int(11) NOT NULL DEFAULT 0,
  `hot` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `id_product`, `name`, `id_type`, `gender`, `description`, `import_price`, `price`, `promotion_price`, `image`, `new`, `hot`, `created_at`, `updated_at`) VALUES
(1009, 'SP1007', 'Áo sơ mi Knot', 1, 1, '<p>&Aacute;o sơ mi Knot kiểu d&aacute;ng thanh lịch</p>', 0, 280000, 0, 'uploads/ao_so_mi_knot_trang1.jpg', 1, 1, '2018-11-07 21:46:31', '2019-04-06 15:04:59'),
(1026, 'SP1', 'Quần Tây', 4, 3, 'hshshshsalallaala', 123, 234, 456, 'hahaha', 1, 1, NULL, NULL),
(1032, 'SP1027', 'Áo thun ax', 2, 4, '<ol><li>asdasdasd</li><li>asdas</li><li>asf</li><li>fgr</li><li>jkl</li><li>op\'[p</li><li>\'o</li></ol>', 8, 8, 9, 'haha', 0, 0, '2021-01-02 07:56:03', NULL),
(1034, 'SP1034', 'Áo sơ mi', 3, 1, '<ol><li>Hông asdasd</li><li>asdasd</li><li>ffff</li></ol>', 3, 3, 3, 'haha', 1, 1, '2021-01-02 15:44:55', '2021-01-02 15:44:55'),
(1035, 'SP1035', 'asdasda', 0, 0, '', 0, 0, 0, 'haha', 0, 0, '2021-01-02 17:50:35', '2021-01-02 17:50:35'),
(1036, 'SP1036', 'Quần thể thao', 2, 3, '<ol><li>asdasdasdasda</li></ol><p>df</p><p>g</p><p>f</p><p>uj</p><p>yuk</p><p>y</p>', 4, 5, 6, 'haha', 0, 0, '2021-01-02 17:51:15', '2021-01-02 17:51:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_detail`
--

CREATE TABLE `product_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_store` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_detail`
--

INSERT INTO `product_detail` (`id`, `id_product`, `id_store`, `id_color`, `id_size`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'SP1005', 1, 1, 1, 7, '2018-11-02 19:26:38', '2018-11-27 13:42:01'),
(2, 'SP1005', 1, 1, 2, 6, '2018-11-02 19:26:39', '2018-11-27 13:42:01'),
(3, 'SP1005', 1, 1, 3, 9, '2018-11-02 19:26:39', '2018-11-27 13:42:01'),
(4, 'SP1005', 1, 1, 4, 6, '2018-11-02 19:26:39', '2018-11-27 13:42:01'),
(5, 'SP1005', 1, 1, 5, 0, '2018-11-02 19:26:39', '2018-11-27 13:42:02'),
(6, 'SP1005', 1, 2, 1, 0, '2018-11-02 19:26:39', '2018-11-27 13:42:02'),
(7, 'SP1005', 1, 2, 2, 2, '2018-11-02 19:26:39', '2018-11-27 13:42:02'),
(8, 'SP1005', 1, 2, 3, 5, '2018-11-02 19:26:39', '2018-11-27 13:42:02'),
(9, 'SP1005', 1, 2, 4, 0, '2018-11-02 19:26:39', '2018-11-27 13:42:02'),
(10, 'SP1005', 1, 2, 5, 0, '2018-11-02 19:26:39', '2018-11-27 13:42:02'),
(11, 'SP1005', 2, 1, 1, 0, '2018-11-02 19:48:55', '2018-11-02 19:48:55'),
(12, 'SP1005', 2, 1, 2, 6, '2018-11-02 19:48:55', '2018-11-02 19:48:55'),
(13, 'SP1005', 2, 1, 3, 8, '2018-11-02 19:48:55', '2018-11-02 19:48:55'),
(14, 'SP1005', 2, 1, 4, 7, '2018-11-02 19:48:55', '2018-11-02 19:48:55'),
(15, 'SP1005', 2, 1, 5, 0, '2018-11-02 19:48:55', '2018-11-02 19:48:55'),
(16, 'SP1005', 2, 2, 1, 9, '2018-11-02 19:48:56', '2018-11-02 19:48:56'),
(17, 'SP1005', 2, 2, 2, 9, '2018-11-02 19:48:56', '2018-11-02 19:48:56'),
(18, 'SP1005', 2, 2, 3, 9, '2018-11-02 19:48:56', '2018-11-02 19:48:56'),
(19, 'SP1005', 2, 2, 4, 9, '2018-11-02 19:48:56', '2018-11-02 19:48:56'),
(20, 'SP1005', 2, 2, 5, 0, '2018-11-02 19:48:56', '2018-11-02 19:48:56'),
(21, 'SP1007', 1, 1, 1, 128, '2018-11-13 00:17:33', '2019-03-28 14:04:42'),
(22, 'SP1007', 1, 1, 2, 18, '2018-11-13 00:17:33', '2019-03-28 14:04:42'),
(23, 'SP1007', 1, 1, 3, 10, '2018-11-13 00:17:33', '2019-03-28 14:04:42'),
(24, 'SP1007', 1, 1, 4, 13, '2018-11-13 00:17:33', '2019-03-28 14:04:42'),
(25, 'SP1007', 1, 1, 5, 0, '2018-11-13 00:17:33', '2019-03-28 14:04:42'),
(26, 'SP1007', 1, 7, 1, 4, '2018-11-13 00:17:33', '2019-03-28 14:04:42'),
(27, 'SP1007', 1, 7, 2, 9, '2018-11-13 00:17:34', '2019-03-28 14:04:42'),
(28, 'SP1007', 1, 7, 3, 14, '2018-11-13 00:17:34', '2019-03-28 14:04:42'),
(29, 'SP1007', 1, 7, 4, 5, '2018-11-13 00:17:34', '2019-03-28 14:04:42'),
(30, 'SP1007', 1, 7, 5, 0, '2018-11-13 00:17:34', '2019-03-28 14:04:42'),
(31, 'SP1007', 1, 2, 1, 4, '2018-11-13 00:17:34', '2019-03-28 14:04:42'),
(32, 'SP1007', 1, 2, 2, 6, '2018-11-13 00:17:34', '2019-03-28 14:04:42'),
(33, 'SP1007', 1, 2, 3, 13, '2018-11-13 00:17:34', '2019-03-28 14:04:42'),
(34, 'SP1007', 1, 2, 4, 9, '2018-11-13 00:17:34', '2019-03-28 14:04:42'),
(35, 'SP1007', 1, 2, 5, 0, '2018-11-13 00:17:34', '2019-03-28 14:04:42'),
(36, 'SP1011', 1, 1, 1, 3, '2018-11-23 00:41:00', '2018-11-28 02:29:27'),
(37, 'SP1011', 1, 1, 2, -3, '2018-11-23 00:41:00', '2018-11-27 03:15:35'),
(38, 'SP1011', 1, 1, 3, 4, '2018-11-23 00:41:00', '2018-11-25 08:04:04'),
(39, 'SP1011', 1, 1, 4, 0, '2018-11-23 00:41:00', '2018-11-23 00:41:00'),
(40, 'SP1011', 1, 1, 5, 6, '2018-11-23 00:41:00', '2018-11-23 00:41:00'),
(41, 'SP1011', 1, 8, 1, 3, '2018-11-23 00:41:00', '2018-11-28 02:29:27'),
(42, 'SP1011', 1, 8, 2, -3, '2018-11-23 00:41:00', '2018-11-27 03:15:35'),
(43, 'SP1011', 1, 8, 3, 4, '2018-11-23 00:41:00', '2018-11-25 08:04:04'),
(44, 'SP1011', 1, 8, 4, 7, '2018-11-23 00:41:00', '2018-11-23 00:41:00'),
(45, 'SP1011', 1, 8, 5, 5, '2018-11-23 00:41:00', '2018-11-23 00:41:00'),
(46, 'SP1011', 1, 7, 1, 3, '2018-11-23 00:41:00', '2018-11-28 02:29:27'),
(47, 'SP1011', 1, 7, 2, -3, '2018-11-23 00:41:00', '2018-11-27 03:15:35'),
(48, 'SP1011', 1, 7, 3, 4, '2018-11-23 00:41:00', '2018-11-25 08:04:04'),
(49, 'SP1011', 1, 7, 4, 2, '2018-11-23 00:41:00', '2018-11-23 00:41:00'),
(50, 'SP1011', 1, 7, 5, 0, '2018-11-23 00:41:01', '2018-11-23 00:41:01'),
(51, 'SP1012', 1, 2, 1, 5, '2018-11-23 00:41:29', '2018-11-23 00:41:29'),
(52, 'SP1012', 1, 2, 2, 4, '2018-11-23 00:41:30', '2018-11-25 12:07:39'),
(53, 'SP1012', 1, 2, 3, 4, '2018-11-23 00:41:30', '2018-11-23 02:13:02'),
(54, 'SP1012', 1, 2, 4, 5, '2018-11-23 00:41:30', '2018-11-23 00:41:30'),
(55, 'SP1012', 1, 2, 5, 2, '2018-11-23 00:41:30', '2018-11-23 00:41:30'),
(56, 'SP1013', 1, 2, 1, 6, '2018-11-23 00:42:10', '2018-11-23 00:42:10'),
(57, 'SP1013', 1, 2, 2, 3, '2018-11-23 00:42:10', '2018-11-23 02:13:02'),
(58, 'SP1013', 1, 2, 3, 2, '2018-11-23 00:42:10', '2018-11-25 12:07:39'),
(59, 'SP1013', 1, 2, 4, 3, '2018-11-23 00:42:10', '2018-11-23 00:42:10'),
(60, 'SP1013', 1, 2, 5, 7, '2018-11-23 00:42:10', '2018-11-23 00:42:10'),
(61, 'SP1013', 1, 1, 1, 8, '2018-11-23 00:42:11', '2018-11-23 00:42:11'),
(62, 'SP1013', 1, 1, 2, 3, '2018-11-23 00:42:11', '2018-11-23 02:13:02'),
(63, 'SP1013', 1, 1, 3, 2, '2018-11-23 00:42:11', '2018-11-25 12:07:39'),
(64, 'SP1013', 1, 1, 4, 8, '2018-11-23 00:42:11', '2018-11-23 00:42:11'),
(65, 'SP1013', 1, 1, 5, 4, '2018-11-23 00:42:11', '2018-11-23 00:42:11'),
(66, 'SP1010', 1, 1, 1, 2, '2018-11-23 06:51:42', '2018-11-23 06:51:42'),
(67, 'SP1010', 1, 1, 2, 4, '2018-11-23 06:51:42', '2018-11-23 06:51:42'),
(68, 'SP1010', 1, 1, 3, 0, '2018-11-23 06:51:42', '2018-11-23 06:51:42'),
(69, 'SP1010', 1, 1, 4, 0, '2018-11-23 06:51:42', '2018-11-23 06:51:42'),
(70, 'SP1010', 1, 1, 5, 0, '2018-11-23 06:51:42', '2018-11-23 06:51:42'),
(71, 'SP1024', 2, 1, 1, 4, '2018-11-27 13:43:14', '2018-11-27 13:43:14'),
(72, 'SP1024', 2, 1, 2, 5, '2018-11-27 13:43:14', '2018-11-27 13:43:14'),
(73, 'SP1024', 2, 1, 3, 8, '2018-11-27 13:43:14', '2018-11-27 13:43:14'),
(74, 'SP1024', 2, 1, 4, 9, '2018-11-27 13:43:14', '2018-11-27 13:43:14'),
(75, 'SP1024', 2, 1, 5, 0, '2018-11-27 13:43:14', '2018-11-27 13:43:14'),
(76, 'SP1025', 1, 5, 1, 2, '2018-11-27 13:45:55', '2018-11-27 13:45:55'),
(77, 'SP1025', 1, 5, 2, 2, '2018-11-27 13:45:55', '2018-11-27 13:45:55'),
(78, 'SP1025', 1, 5, 3, 3, '2018-11-27 13:45:55', '2018-11-27 13:45:55'),
(79, 'SP1025', 1, 5, 4, 3, '2018-11-27 13:45:55', '2018-11-27 13:45:55'),
(80, 'SP1025', 1, 5, 5, 5, '2018-11-27 13:45:55', '2018-11-27 13:45:55'),
(81, 'SP1023', 1, 18, 1, 0, '2018-11-27 13:46:38', '2019-04-06 13:33:10'),
(82, 'SP1023', 1, 18, 2, 2, '2018-11-27 13:46:38', '2018-11-27 13:46:38'),
(83, 'SP1023', 1, 18, 3, 4, '2018-11-27 13:46:38', '2018-11-27 13:46:38'),
(84, 'SP1023', 1, 18, 4, 5, '2018-11-27 13:46:38', '2018-11-27 13:46:38'),
(85, 'SP1023', 1, 18, 5, 8, '2018-11-27 13:46:39', '2018-11-27 13:46:39'),
(86, 'SP1021', 1, 3, 1, 4, '2018-11-27 13:48:11', '2018-11-27 13:48:11'),
(87, 'SP1021', 1, 3, 2, 4, '2018-11-27 13:48:11', '2018-11-27 13:48:11'),
(88, 'SP1021', 1, 3, 3, 4, '2018-11-27 13:48:11', '2018-11-27 13:48:11'),
(89, 'SP1021', 1, 3, 4, 4, '2018-11-27 13:48:11', '2018-11-27 13:48:11'),
(90, 'SP1021', 1, 3, 5, 0, '2018-11-27 13:48:11', '2018-11-27 13:48:11'),
(91, 'SP1024', 1, 1, 1, 54, '2018-11-29 01:53:41', '2018-11-29 01:53:41'),
(92, 'SP1024', 1, 1, 2, 3, '2018-11-29 01:53:41', '2018-11-29 01:53:41'),
(93, 'SP1024', 1, 1, 3, 3, '2018-11-29 01:53:41', '2018-11-29 01:53:41'),
(94, 'SP1024', 1, 1, 4, 0, '2018-11-29 01:53:41', '2018-11-29 01:53:41'),
(95, 'SP1024', 1, 1, 5, 0, '2018-11-29 01:53:42', '2018-11-29 01:53:42'),
(96, 'SP1023', 2, 18, 1, 5, '2018-11-29 02:07:19', '2018-11-29 02:07:19'),
(97, 'SP1023', 2, 18, 2, 5, '2018-11-29 02:07:19', '2018-11-29 02:07:19'),
(98, 'SP1023', 2, 18, 3, 5, '2018-11-29 02:07:19', '2018-11-29 02:07:19'),
(99, 'SP1023', 2, 18, 4, 5, '2018-11-29 02:07:19', '2018-11-29 02:07:19'),
(100, 'SP1023', 2, 18, 5, 5, '2018-11-29 02:07:19', '2018-11-29 02:07:19'),
(101, 'SP1015', 1, 17, 1, 4, '2018-12-02 13:50:26', '2018-12-02 13:50:26'),
(102, 'SP1015', 1, 17, 2, 4, '2018-12-02 13:50:26', '2018-12-02 13:50:26'),
(103, 'SP1015', 1, 17, 3, 0, '2018-12-02 13:50:26', '2018-12-02 13:50:26'),
(104, 'SP1015', 1, 17, 4, 4, '2018-12-02 13:50:26', '2018-12-02 13:50:26'),
(105, 'SP1015', 1, 17, 5, 4, '2018-12-02 13:50:26', '2018-12-02 13:50:26'),
(106, 'SP1015', 1, 4, 1, 3, '2018-12-02 13:50:26', '2018-12-02 13:50:26'),
(107, 'SP1015', 1, 4, 2, 3, '2018-12-02 13:50:26', '2018-12-02 13:50:26'),
(108, 'SP1015', 1, 4, 3, 0, '2018-12-02 13:50:26', '2018-12-02 13:50:26'),
(109, 'SP1015', 1, 4, 4, 0, '2018-12-02 13:50:26', '2018-12-02 13:50:26'),
(110, 'SP1015', 1, 4, 5, 0, '2018-12-02 13:50:26', '2018-12-02 13:50:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_color` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `id_product`, `id_color`, `image`, `created_at`, `updated_at`) VALUES
(1, 'SP1005', 1, 'uploads/ao_doi1.jpg,uploads/ao_doi2.jpg', '2018-11-01 09:01:10', '2018-11-01 09:01:10'),
(2, 'SP1005', 2, 'uploads/ao_thun5.jpg,uploads/aodoi1.jpg', '2018-11-01 09:01:10', '2018-11-01 09:01:10'),
(3, 'SP1006', 1, 'uploads/ao_doi1.jpg', '2018-11-05 03:36:38', '2018-11-05 03:36:38'),
(8, 'SP1007', 1, 'uploads/ao_doi3.jpg,uploads/ao_koac_nam_causal1.jpg,uploads/52598672_1436050473204800_6475665708511395840_n.jpg', '2018-11-07 21:46:31', '2019-04-06 15:04:59'),
(9, 'SP1007', 7, 'uploads/ao_ni.jpg,uploads/ao_ni_detail1.jpg,uploads/ao_ni_detail2.jpg', '2018-11-07 21:46:31', '2019-04-06 15:04:59'),
(10, 'SP1007', 2, 'uploads/ao_so_mi_knot_do1.jpg,uploads/ao_so_mi_knot_do2.jpg,uploads/ao_so_mi_knot_do3.jpg', '2018-11-07 21:46:31', '2019-04-06 15:04:59'),
(11, 'SP1010', 1, 'uploads/ao_ni.jpg,uploads/ao_ni_detail1.jpg,uploads/ao_ni_detail2.jpg', '2018-11-07 21:48:16', '2018-11-07 21:48:16'),
(15, 'SP1011', 7, 'uploads/ao_khac_nam_causess.jpg,uploads/ao_khac_nam_causess-1.jpg,uploads/ao_khac_nam_causess-2.jpg', '2018-11-19 10:35:57', '2018-11-19 10:35:57'),
(16, 'SP1011', 1, 'uploads/ao_khoac_nam_dentrang1.jpg,uploads/ao_khoac_nam_dentrang2.jpg', '2018-11-19 10:35:58', '2018-11-19 10:35:58'),
(17, 'SP1011', 8, 'uploads/ao_khoac_nam_denvang.jpg,uploads/ao_khoac_namdenvang2.jpg', '2018-11-19 10:35:58', '2018-11-19 10:35:58'),
(18, 'SP1012', 2, 'uploads/ao_koac_nam_causal1.jpg,uploads/ao_koac_nam_causal2.jpg,uploads/ao_koac_nam_causal3.jpg', '2018-11-19 10:39:19', '2018-11-19 10:39:19'),
(19, 'SP1013', 1, 'uploads/ao_tuysty1.jpg,uploads/ao_tuysty2.jpg,uploads/ao_tuysty3.jpg', '2018-11-20 13:07:43', '2018-11-20 13:07:43'),
(20, 'SP1013', 2, 'uploads/ao_tuysty_den1.jpg,uploads/ao_tuysty_den2.jpg,uploads/ao_tuysty_den3.jpg', '2018-11-20 13:07:44', '2018-11-20 13:07:44'),
(21, 'SP1014', 1, 'uploads/ao_doi3.jpg,uploads/ao_doi4.jpg,uploads/ao_doi5.jpg', '2018-11-22 14:05:34', '2018-11-22 14:05:34'),
(22, 'SP1014', 2, 'uploads/ao_thun1.jpg,uploads/ao_thun2.jpg', '2018-11-22 14:05:34', '2018-11-22 14:05:34'),
(23, 'SP1015', 17, 'uploads/vay_tim1.jpg,uploads/vay_tim2.jpg,uploads/hinh-anh-meo-con-de-thuong-nhat-1.jpg', '2018-11-25 16:02:15', '2019-04-06 13:19:47'),
(24, 'SP1015', 4, 'uploads/vay_xanh1.jpg,uploads/vay_xanh2.jpg,uploads/vay_xanh3.jpg', '2018-11-25 16:02:15', '2019-04-06 13:19:47'),
(25, 'SP1016', 18, 'uploads/vay_kesoc_trang1.jpg,uploads/vay_kesoc_trang2.jpg,uploads/vay_kesoc_trang3.jpg', '2018-11-25 16:05:56', '2018-11-25 16:05:56'),
(26, 'SP1016', 2, 'uploads/vay_kesoc_tim1.jpg,uploads/vay_kesoc_tim2.jpg,uploads/vay_kesoc_tim3.jpg', '2018-11-25 16:05:56', '2018-11-25 16:05:56'),
(27, 'SP1017', 2, 'uploads/vay_phongcach1.jpg,uploads/vay_phongcach2.jpg,uploads/vay_phongcach3.jpg', '2018-11-25 16:07:54', '2018-11-25 16:07:54'),
(28, 'SP1018', 3, 'uploads/vay_bao1.jpg,uploads/vay_bao2.jpg,uploads/vay_bao3.jpg', '2018-11-25 16:10:07', '2018-11-25 16:10:07'),
(29, 'SP1019', 18, 'uploads/hd_1.jpg,uploads/hd2.jpg,uploads/hd3.jpg', '2018-11-25 16:12:42', '2018-11-25 16:12:42'),
(30, 'SP1020', 18, 'uploads/khoac_den1.jpg,uploads/khoac_den2.jpg,uploads/khoac_den3.jpg', '2018-11-25 16:15:14', '2018-11-25 16:15:14'),
(31, 'SP1021', 3, 'uploads/hoddi_trang1.jpg,uploads/hoddi_trang2.jpg,uploads/hoddi_trang3.jpg', '2018-11-25 16:18:50', '2018-11-25 16:18:50'),
(32, 'SP1022', 2, 'uploads/khoac_ho1.jpg,uploads/khoac_ho2.jpg,uploads/khoac_ho3.jpg', '2018-11-25 16:21:42', '2018-11-25 16:21:42'),
(33, 'SP1023', 18, 'uploads/somi_trangden1.jpg,uploads/somi_trangden2.jpg,uploads/somi_trangden3.jpg', '2018-11-25 16:24:43', '2018-11-25 16:24:43'),
(34, 'SP1024', 1, 'uploads/somi_trang1.jpg,uploads/somi_trang2.jpg,uploads/somi_trang3.jpg', '2018-11-26 09:08:31', '2018-11-26 09:08:31'),
(35, 'SP1025', 5, 'uploads/somi_xam1.jpg,uploads/somi_xam2.jpg,uploads/somi_xam3.jpg', '2018-11-26 09:12:34', '2018-11-26 09:12:34'),
(36, 'SP1026', 18, 'uploads/hinh-anh-meo-con-de-thuong-nhat-1.jpg', '2019-04-06 03:37:04', '2019-04-06 03:37:04'),
(37, 'SP1027', 18, 'uploads/hinh-anh-meo-con-de-thuong-nhat-1.jpg,uploads/images.jpg,uploads/tải xuống.jpg', '2019-04-06 11:32:48', '2019-04-06 11:32:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_store`
--

CREATE TABLE `product_store` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_store` int(11) NOT NULL,
  `number` int(11) NOT NULL DEFAULT 0,
  `number_tranf` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `number_error` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_store`
--

INSERT INTO `product_store` (`id`, `id_product`, `id_store`, `number`, `number_tranf`, `status`, `number_error`, `created_at`, `updated_at`) VALUES
(1, 'SP1001', 1, 50, 0, 0, 0, NULL, NULL),
(2, 'SP1002', 1, 30, 0, 0, 0, NULL, NULL),
(3, 'SP1003', 1, 30, 0, 0, 0, NULL, NULL),
(4, 'SP1004', 1, 55, 0, 0, 0, NULL, NULL),
(5, 'SP1001', 2, 20, 0, 0, 0, NULL, NULL),
(6, 'SP1002', 2, 50, 0, 0, 0, NULL, NULL),
(7, 'SP1003', 2, 30, 0, 0, 0, NULL, NULL),
(8, 'SP1004', 2, 45, 0, 0, 0, NULL, NULL),
(9, 'SP1005', 1, 35, 0, 0, 0, '2018-11-02 19:26:39', '2018-11-27 13:42:02'),
(10, 'SP1005', 2, 57, 0, 0, 0, '2018-11-02 19:48:56', '2018-11-02 19:48:56'),
(11, 'SP1007', 1, 233, 0, 0, 0, '2018-11-13 00:17:34', '2019-03-28 14:04:42'),
(12, 'SP1011', 1, 61, 9, 0, 0, '2018-11-23 00:41:01', '2018-12-05 03:12:47'),
(13, 'SP1012', 1, 20, 0, 0, 0, '2018-11-23 00:41:30', '2018-11-25 12:07:40'),
(14, 'SP1013', 1, 57, 0, 0, 0, '2018-11-23 00:42:11', '2018-11-25 12:07:39'),
(15, 'SP1010', 1, 6, 0, 0, 0, '2018-11-23 06:51:42', '2018-11-23 06:51:42'),
(16, 'SP1024', 2, 26, 0, 0, 0, '2018-11-27 13:43:15', '2018-11-27 13:43:15'),
(17, 'SP1025', 1, 15, 0, 0, 0, '2018-11-27 13:45:55', '2018-11-27 13:45:55'),
(18, 'SP1023', 1, 19, 0, 0, 0, '2018-11-27 13:46:39', '2019-04-06 13:33:10'),
(19, 'SP1021', 1, 16, 0, 0, 0, '2018-11-27 13:48:11', '2018-11-27 13:48:11'),
(20, 'SP1024', 1, 60, 0, 0, 0, '2018-11-29 01:53:42', '2018-11-29 01:53:42'),
(21, 'SP1023', 2, 25, 0, 0, 0, '2018-11-29 02:07:19', '2018-11-29 02:07:19'),
(22, 'SP1015', 1, 22, 0, 0, 0, '2018-12-02 13:50:26', '2018-12-02 13:50:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promocodes`
--

CREATE TABLE `promocodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_used` tinyint(1) NOT NULL DEFAULT 0,
  `cash` double DEFAULT NULL,
  `percent` double DEFAULT NULL,
  `created_at` date NOT NULL,
  `expiration_date` date NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_group` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `promocodes`
--

INSERT INTO `promocodes` (`id`, `code`, `is_used`, `cash`, `percent`, `created_at`, `expiration_date`, `email`, `id_group`) VALUES
(26, '5S95-WL6J', 1, 50000, 0, '2018-11-16', '2018-12-31', 'abc@gmail.com', 1),
(27, '2K7G-5BXS', 0, 50000, 0, '2018-11-16', '2019-07-17', NULL, 1),
(28, '6ECC-YPQA', 0, 50000, 0, '2018-11-16', '2019-12-20', 'nguyencamvan56@gmail.com', 1),
(29, 'GHXJ-WRTD', 0, 50000, 0, '2018-11-16', '2018-11-30', NULL, 1),
(33, 'V6AG-U4J3', 0, 0, 20, '2018-11-17', '2018-11-30', NULL, 2),
(34, '23LE-4XHK', 0, 0, 20, '2018-11-17', '2018-11-30', NULL, 2),
(35, '8H44-XJZZ', 0, 0, 20, '2018-11-17', '2018-11-30', NULL, 2),
(36, 'AQSJ-UG5C', 0, 0, 20, '2018-11-17', '2018-11-30', NULL, 2),
(37, '34YB-MH97', 0, 0, 20, '2018-11-17', '2018-11-30', NULL, 2),
(38, 'SLAG-9TRB', 0, 12000, 0, '2019-04-06', '2019-10-31', NULL, 2),
(39, 'NXZU-8KDK', 0, 12000, 0, '2019-04-06', '2019-10-31', NULL, 2),
(40, 'HEMU-8GDA', 0, 20, 0, '2019-04-06', '2020-05-31', NULL, 1),
(41, 'LMGF-X4NK', 0, 20, 0, '2019-04-06', '2020-05-31', NULL, 1),
(42, 'XUGG-MNCG', 0, 20, 0, '2019-04-06', '2020-05-31', NULL, 1),
(43, 'MW96-6GW6', 0, 20, 0, '2019-04-06', '2020-05-31', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promocodes_group`
--

CREATE TABLE `promocodes_group` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `promocodes_group`
--

INSERT INTO `promocodes_group` (`id`, `name`) VALUES
(1, 'Mã giảm giá cho khách hàng đăng ký'),
(2, 'Mã giảm giá cho sự kiện tri ân khách hàng'),
(3, 'Mã cho tết Tây');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `register`
--

CREATE TABLE `register` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `register`
--

INSERT INTO `register` (`id`, `email`, `created_at`, `updated_at`) VALUES
(7, 'jacy.cuong.7@gmail.com', '2019-04-06 13:44:25', '2019-04-06 13:44:25'),
(8, 'jacy.cuong.6@gmail.com', '2019-04-06 13:53:28', '2019-04-06 13:53:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `returns`
--

CREATE TABLE `returns` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_returns` date NOT NULL,
  `status_returns` int(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `returns`
--

INSERT INTO `returns` (`id`, `id_user`, `reason`, `date_returns`, `status_returns`, `created_at`, `updated_at`) VALUES
(3, 5, 'Sản phẩm lỗi', '2018-11-25', 1, '2018-11-25 15:24:49', '2018-11-25 15:24:49'),
(4, 5, 'Sản phẩm lỗi', '2018-11-25', 1, '2018-11-25 15:26:49', '2018-11-25 15:26:49'),
(5, 5, 'Sản phẩm lỗi', '2018-11-25', 1, '2018-11-25 15:28:55', '2018-11-25 15:28:55'),
(6, 5, 'Sản phẩm lỗi', '2018-11-25', 1, '2018-11-25 15:30:00', '2018-11-25 15:30:00'),
(7, 5, 'Sản phẩm lỗi', '2018-11-25', 1, '2018-11-25 15:31:28', '2018-11-25 15:31:28'),
(8, 5, 'Sản phẩm lỗi', '2018-11-25', 1, '2018-11-25 15:32:04', '2018-11-25 15:32:04'),
(9, 5, 'Sản phẩm lỗi', '2018-11-25', 1, '2018-11-25 15:32:26', '2018-11-25 15:32:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_product`
--

CREATE TABLE `type_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_product`
--

INSERT INTO `type_product` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Áo sơ mi', '2020-12-29 14:33:41', '2020-12-29 14:33:41'),
(2, 'Áo phông', NULL, NULL),
(3, 'Áo khoác', NULL, NULL),
(4, 'Áo thun', NULL, NULL),
(5, 'Quần âu', NULL, NULL),
(6, 'Quần kaki', NULL, NULL),
(7, 'Váy', NULL, NULL),
(8, 'Quần short', NULL, NULL),
(9, 'Áo len & áo nỉ', NULL, NULL),
(10, 'Vest', NULL, NULL),
(11, 'Đầm', NULL, NULL),
(12, 'Áo thun', '2018-11-23 08:18:20', '2018-11-23 08:18:20'),
(58, 'ahgvsjdgjhasdkj', '2021-01-05 04:46:49', '2021-01-05 04:46:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `full_name`, `phone_number`, `address`, `create_at`, `activation`) VALUES
(1, 'admin', '$2y$10$GBozE2c.k9tRdsm/6A3Bz.hOgyZenayrLQgnCpcRRzLm9Oz6tWdd6', 'dtbao23@gmail.com', '', '', '', '2020-12-14 08:41:16', ''),
(2, 'q', '$2y$10$nkmfHkd4HLVcdChZ.670peCg2XCWJHfLXDO3wB0A3pvBV9i5Gb8FC', 'hhiieeuu11@gmail.com', 'Nguyễn Minh Hiếu', '0845606616', '', '2020-12-31 04:20:32', ''),
(3, '1', '$2y$10$wSDGNqRJzSG9udzI975L.O8En9pEI0bXUIG5v5hL9zTpYMmBe01.i', 'nmhieu03032000@gmail.com', 'Nguyễn Minh Hiếu', '0845606616', '', '2021-01-04 04:19:34', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1037;

--
-- AUTO_INCREMENT cho bảng `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
