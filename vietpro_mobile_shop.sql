-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 27, 2020 lúc 04:05 PM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vietpro_mobile_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(6, 'Blackberry'),
(3, 'HTC'),
(10, 'Huawei'),
(1, 'iPhone'),
(4, 'Nokia'),
(7, 'OPPO'),
(13, 'redmi'),
(2, 'Samsung'),
(5, 'Sony'),
(9, 'Vivo'),
(8, 'Xiaomi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `comm_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `comm_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comm_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comm_date` datetime NOT NULL,
  `comm_details` text COLLATE utf8_unicode_ci NOT NULL,
  `comm_vulgar` text COLLATE utf8_unicode_ci NOT NULL,
  `comm_status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`comm_id`, `prd_id`, `comm_name`, `comm_mail`, `comm_date`, `comm_details`, `comm_vulgar`, `comm_status`) VALUES
(1, 1, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', '', 1),
(3, 3, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', '', 1),
(4, 4, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', '', 1),
(5, 5, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', '', 1),
(6, 6, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', '', 1),
(7, 7, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', '', 1),
(8, 8, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', '', 1),
(9, 9, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', '', 1),
(10, 10, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', '', 1),
(11, 11, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', '', 1),
(12, 12, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', '', 1),
(13, 13, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', '', 1),
(14, 14, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời vcl', 'Đây thực sự là một sản phẩm tuyệt vời ***', 1),
(15, 15, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', '', 1),
(16, 16, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', '', 1),
(17, 17, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', '', 1),
(18, 18, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', '', 1),
(19, 19, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', '', 1),
(20, 20, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 'Đây thực sự là một sản phẩm tuyệt vời', 1),
(21, 21, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 'Đây thực sự là một sản phẩm tuyệt vời', 1),
(22, 22, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 'Đây thực sự là một sản phẩm tuyệt vời', 1),
(23, 23, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 'Đây thực sự là một sản phẩm tuyệt vời', 1),
(24, 24, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 'Đây thực sự là một sản phẩm tuyệt vời', 1),
(25, 25, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 'Đây thực sự là một sản phẩm tuyệt vời', 1),
(26, 26, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 'Đây thực sự là một sản phẩm tuyệt vời', 1),
(27, 27, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 'Đây thực sự là một sản phẩm tuyệt vời', 1),
(28, 28, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 'Đây thực sự là một sản phẩm tuyệt vời', 1),
(29, 29, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 'Đây thực sự là một sản phẩm tuyệt vời', 1),
(30, 30, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời', 'Đây thực sự là một sản phẩm tuyệt vời', 1),
(31, 21, 'admin', 'admin@gamil.com', '2020-04-01 07:52:38', 'very good', 'very good', 1),
(32, 21, 'admin', 'admin@gamil.com', '2020-04-01 07:54:44', 'very good', 'very good', 1),
(33, 26, 'admin', 'admin@gamil.com', '2020-04-01 07:55:01', 'fadfadsfa', 'fadfadsfa', 1),
(34, 26, 'admin', 'admin@gamil.com', '2020-04-01 07:55:27', 'fadfadsfa', 'fadfadsfa', 1),
(35, 26, 'admin', 'admin@gamil.com', '2020-04-01 07:55:29', 'fadfadsfa', 'fadfadsfa', 1),
(39, 1, 'admin', 'admin@gmail.com', '2020-05-20 00:00:00', 'dầdsfasfd', 'dầdsfasfd', 1),
(40, 1, 'nam', 'nam@gmail.com', '2020-05-20 00:00:00', 'adfad', 'adfad', 1),
(45, 3, 'admin', 'admin@gamil.com', '2020-05-20 13:42:42', 'abc', 'abc', 1),
(48, 5, 'nam', 'admin@gamil.com', '2020-05-23 17:30:51', 'dkm thang vcl ..........\r\n', '*** thang *** ..........\r\n', 1),
(49, 1, 'admin', 'admin@gamil.com', '2020-05-23 17:47:10', 'dkm abcccc vcl ......\r\n', '*** abcccc *** ......\r\n', 1),
(50, 1, 'admin', 'admin@gamil.com', '2020-05-24 08:07:08', 'dkm afadfdfasd vcl fadsfasdfas', '*** afadfdfasd *** fadsfasdfas', 1),
(53, 1, 'admin', 'admin@gamil.com', '2020-05-24 08:17:54', 'dkm vcl vcl adfadsfadsf vcl vcl', '*** *** *** adfadsfadsf *** ***', 1),
(54, 5, 'admin', 'admin@gamil.com', '2020-05-24 08:31:10', 'thang dkm dkm vcl ddfadf vcl', 'thang *** *** *** ddfadf ***', 1),
(55, 1, 'admin', 'admin@gamil.com', '2020-05-27 03:48:27', 'afdadf dmm dkm vcl adfadsf', 'afdadf *** *** *** adfadsf', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `prd_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `prd_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_price` int(11) UNSIGNED NOT NULL,
  `prd_warranty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_accessories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_new` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_promotion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_status` int(1) NOT NULL,
  `prd_featured` int(1) NOT NULL,
  `prd_details` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`prd_id`, `cat_id`, `prd_name`, `prd_image`, `prd_price`, `prd_warranty`, `prd_accessories`, `prd_new`, `prd_promotion`, `prd_status`, `prd_featured`, `prd_details`) VALUES
(1, 1, 'iPhone 7 Plus 32GB Rose Gold', 'iPhone-7-Plus-32GB-Rose-Gold.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(2, 1, 'iPhone X 256GB Silver Seedstock', 'iPhone-X-256GB-Silver-Seedstock.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(3, 1, 'iPhone Xr 2 Sim 64GB Yellow', 'iPhone-Xr-2-Sim-64GB-Yellow.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(4, 1, 'iPhone Xr 2 Sim 56GB Red', 'iPhone-Xr-2-Sim-256GB-Red.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(5, 1, 'iPhone Xs 256GB Gold', 'iPhone-Xs-256GB-Gold.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 0, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(6, 2, 'Samsung Galaxy A9 2018 Black', 'Samsung-Galaxy-A9-2018-Black.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(7, 2, 'Samsung Galaxy J2 Core Gold', 'Samsung-Galaxy-J2-Core-Gold.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(8, 2, 'Samsung Galaxy J4 Core Black', 'Samsung-Galaxy-J4-Core-Black.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(9, 2, 'Samsung Galaxy S9 Plus 64GB Orchid Gray', 'Samsung-Galaxy-S9-Plus-64GB-Orchid-Gray.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(10, 2, 'Samsung Galaxy S9 Plus Black 128GB', 'Samsung-Galaxy-S9-Plus-Black-128GB.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 0, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(11, 4, 'Nokia 1 red', 'Nokia-1-red.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(12, 4, 'Nokia 3.1 Black', 'Nokia-3.1-Black.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(13, 4, 'Nokia 6.1 Plus Blue', 'Nokia-6.1-Plus-Blue.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(14, 4, 'Nokia 6.1 Plus White', 'Nokia-6.1-Plus-White.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(15, 4, 'Nokia 150 White', 'Nokia-150-White.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 0, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(16, 7, 'OPPO A3s 16GB Red', 'OPPO-A3s–16GB-Red.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(17, 7, 'OPPO A7 64GB Blue', 'OPPO-A7-64GB-Blue.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(18, 7, 'OPPO F7 128GB Black', 'OPPO-F7-128GB-Black.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(19, 7, 'OPPO F9 Sunrise Red', 'OPPO-F9-Sunrise-Red.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(20, 7, 'OPPO R17 Pro Lavender', 'OPPO-R17-Pro-Lavender.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 0, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(21, 8, 'Xiaomi Mi 8 Pro Black', 'Xiaomi-Mi-8-Pro-Black.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(22, 8, 'Xiaomi Mi A1 Black', 'Xiaomi-Mi-A1-Black.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(23, 8, 'Xiaomi Mi A1 Gold', 'Xiaomi-Mi-A1-Gold.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(24, 8, 'Xiaomi Mi Max 3 Ram 4 64GB-Black', 'Xiaomi-Mi-Max-3-Ram-4–64GB-Black.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(25, 8, 'Xiaomi Redmi Note 6 Pro 32GB Blue', 'Xiaomi-Redmi-Note-6-Pro–32GB-Blue.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 0, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(26, 9, 'Vivo V7 Gold', 'Vivo-V7-Gold.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(27, 9, 'Vivo V9 Gold', 'Vivo-V9-Gold.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(28, 9, 'Vivo Y53C Gold', 'Vivo-Y53C-Gold.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(29, 9, 'Vivo Y69 Gold', 'Vivo-Y69-Gold.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(30, 9, 'Vivo Y81i Red', 'Vivo-Y81i-Red.png', 10000000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'like new 99%', 'Dán Màn Hình 4D', 0, 0, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.   ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_full` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_level` int(1) NOT NULL,
  `token` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_full`, `user_mail`, `user_pass`, `user_level`, `token`) VALUES
(2, 'Administrator', 'admin@gmail.com', '123456', 1, ''),
(4, 'Nguyễn Van B', 'nguyenvanb@gmail.com', '123456', 2, ''),
(5, 'Nguyễn Van C', 'nguyenvanc@gmail.com', '123456', 2, 'b46077cbb160ae14158a49e40d70499c'),
(9, 'Phương Nam', 'namnpc16cntt01@gmail.com', '123456', 1, '286a27fec8752891819f80c900d7795a');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vulgarwords`
--

CREATE TABLE `vulgarwords` (
  `id` int(11) NOT NULL,
  `vulgar_words` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vulgar_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vulgarwords`
--

INSERT INTO `vulgarwords` (`id`, `vulgar_words`, `vulgar_date`) VALUES
(1, 'dkm', '0000-00-00 00:00:00'),
(4, 'vcl', '2020-05-23 22:29:01'),
(5, 'dmm', '2020-05-27 08:48:04');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comm_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_mail` (`user_mail`);

--
-- Chỉ mục cho bảng `vulgarwords`
--
ALTER TABLE `vulgarwords`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `prd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `vulgarwords`
--
ALTER TABLE `vulgarwords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
