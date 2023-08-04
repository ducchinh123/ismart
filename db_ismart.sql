-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 03, 2023 lúc 12:58 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_ismart`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cate_post`
--

CREATE TABLE `tbl_cate_post` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `status` enum('Chờ duyệt','Công khai') NOT NULL DEFAULT 'Chờ duyệt',
  `creator` enum('Admin') NOT NULL DEFAULT 'Admin',
  `create_at` varchar(255) NOT NULL,
  `is_trash` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cate_post`
--

INSERT INTO `tbl_cate_post` (`id`, `name`, `slug`, `parent_id`, `status`, `creator`, `create_at`, `is_trash`) VALUES
(30, 'Kinh doanh', 'kinh-doanh', 0, 'Công khai', 'Admin', '2023-07-25', 'no'),
(31, 'Bất động sản', 'bat-dong-san', 30, 'Công khai', 'Admin', '2023-07-25', 'no'),
(32, 'Học tập', 'hoc-tap', 0, 'Công khai', 'Admin', '2023-07-26', 'no'),
(33, 'Thi tốt nghiệp THPT QG', 'thi-tot-nghiep-thpt-qg', 32, 'Công khai', 'Admin', '2023-07-26', 'no');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cate_product`
--

CREATE TABLE `tbl_cate_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` enum('Công khai','Chờ duyệt') NOT NULL DEFAULT 'Chờ duyệt',
  `creator` varchar(255) NOT NULL DEFAULT 'Admin',
  `create_at` varchar(255) NOT NULL,
  `is_trash` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cate_product`
--

INSERT INTO `tbl_cate_product` (`id`, `name`, `slug`, `parent_id`, `status`, `creator`, `create_at`, `is_trash`) VALUES
(43, 'Điện thoại thông minh', 'dien-thoai-thong-minh', 0, 'Công khai', 'Admin', '2023-08-02', 'no');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_image_product`
--

CREATE TABLE `tbl_image_product` (
  `id` int(11) NOT NULL,
  `img_one` varchar(255) NOT NULL,
  `img_two` varchar(255) NOT NULL,
  `img_three` varchar(255) NOT NULL,
  `img_four` varchar(255) NOT NULL,
  `img_five` varchar(255) NOT NULL,
  `img_six` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `creator` varchar(255) NOT NULL DEFAULT 'Admin',
  `create_at` varchar(255) NOT NULL,
  `status` enum('Chờ duyệt','Công khai') NOT NULL DEFAULT 'Chờ duyệt',
  `is_trash` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `detail_order` text NOT NULL,
  `paymethod` varchar(20) NOT NULL,
  `st_order` enum('Chờ duyệt','Đang vận chuyển','Thành công') NOT NULL DEFAULT 'Chờ duyệt',
  `status` varchar(20) NOT NULL DEFAULT 'Công khai',
  `num_order` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `code_order` varchar(255) NOT NULL,
  `create_at` varchar(20) NOT NULL,
  `is_trash` varchar(10) NOT NULL DEFAULT 'no',
  `is_order` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `fullname`, `email`, `address`, `phone`, `note`, `detail_order`, `paymethod`, `st_order`, `status`, `num_order`, `total`, `code_order`, `create_at`, `is_trash`, `is_order`) VALUES
(116, 'Đặng Đức Chính', 'chinhddph28756@gmail.com', 'Xã Giao Long, Giao thủy, Nam Định', '0888525597', '', '{\"39\":{\"id\":\"39\",\"code\":\"#BANPHIMCHUOT\",\"price\":\"1790000\",\"thumb\":\".\\/public\\/images\\/products\\/ban-phim.jpg\",\"name\":\"B\\u00e0n ph\\u00edm Gaming Asus ROG Strix Scope \",\"qty\":1,\"sub_total\":1790000,\"url\":\"san-pham\\/ban-phim-gaming-asus-rog-strix-scope-.39.28.html\"}}', 'payment-home', 'Chờ duyệt', 'Công khai', 1, 1790000, '#ISM1690974245', '02-08-2023', 'no', 1),
(117, 'Đặng Đức Chính', 'chinhddph28756@gmail.com', 'Xã Giao Long, Giao thủy, Nam Định', '0888525597', '', '{\"38\":{\"id\":\"38\",\"code\":\"#CHUOTMAYTINH\",\"price\":\"290000\",\"thumb\":\".\\/public\\/images\\/products\\/chuot-1-Copy.jpg\",\"name\":\"Chu\\u1ed9t Kh\\u00f4ng d\\u00e2y Logitech M190 \",\"qty\":1,\"sub_total\":290000,\"url\":\"san-pham\\/chuot-khong-day-logitech-m190-.38.28.html\"},\"39\":{\"id\":\"39\",\"code\":\"#BANPHIMCHUOT\",\"price\":\"1790000\",\"thumb\":\".\\/public\\/images\\/products\\/ban-phim.jpg\",\"name\":\"B\\u00e0n ph\\u00edm Gaming Asus ROG Strix Scope \",\"qty\":1,\"sub_total\":1790000,\"url\":\"san-pham\\/ban-phim-gaming-asus-rog-strix-scope-.39.28.html\"}}', 'direct-payment', 'Thành công', 'Công khai', 2, 2080000, '#ISM1690974494', '02-08-2023', 'no', 1),
(118, 'Phan Văn Cương', 'chinhdd.ph28756@gmail.com', 'Bắc Từ Liêm, Hà Nội', '0888525597', '', '{\"39\":{\"id\":\"39\",\"code\":\"#BANPHIMCHUOT\",\"price\":\"1790000\",\"thumb\":\".\\/public\\/images\\/products\\/ban-phim.jpg\",\"name\":\"B\\u00e0n ph\\u00edm Gaming Asus ROG Strix Scope \",\"qty\":1,\"sub_total\":1790000,\"url\":\"san-pham\\/ban-phim-gaming-asus-rog-strix-scope-.39.28.html\"}}', 'payment-home', 'Đang vận chuyển', 'Công khai', 1, 1790000, '#ISM1690976105', '02-08-2023', 'no', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` enum('Chờ duyệt','Công khai') NOT NULL DEFAULT 'Chờ duyệt',
  `creator` enum('Admin') NOT NULL DEFAULT 'Admin',
  `create_at` varchar(255) NOT NULL,
  `is_trash` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_pages`
--

INSERT INTO `tbl_pages` (`id`, `title`, `description`, `slug`, `status`, `creator`, `create_at`, `is_trash`) VALUES
(16, 'Giới thiệu', '<p><strong>Ismart</strong> l&agrave; một trang web thương mại điện tử cấp độ c&aacute;&nbsp; nh&acirc;n</p>\r\n\r\n<p><strong>Admin quản l&yacute;</strong>: Đặng Đức Ch&iacute;nh</p>\r\n\r\n<p><strong>Nghề nghiệp hiện tại</strong>: Sinh vi&ecirc;n</p>\r\n', 'gioi-thieu', 'Công khai', 'Admin', '2023-08-01', 'no'),
(23, 'Liên hệ', '<p>Đ&acirc;y l&agrave; trang li&ecirc;n hệ</p>\r\n', 'lien-he', 'Công khai', 'Admin', '2023-07-26', 'no');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc_short` text NOT NULL,
  `desc_detail` text NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT './public/images/img-thumb.png',
  `id_cate_posts` int(11) NOT NULL,
  `status` enum('Chờ duyệt','Công khai') NOT NULL DEFAULT 'Chờ duyệt',
  `creator` varchar(255) NOT NULL DEFAULT 'Admin',
  `slug` varchar(255) DEFAULT NULL,
  `create_at` varchar(255) NOT NULL,
  `is_trash` varchar(10) NOT NULL DEFAULT 'no',
  `display` varchar(10) NOT NULL DEFAULT 'block'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_posts`
--

INSERT INTO `tbl_posts` (`id`, `title`, `desc_short`, `desc_detail`, `image`, `id_cate_posts`, `status`, `creator`, `slug`, `create_at`, `is_trash`, `display`) VALUES
(38, 'Đại gia đất nền rẽ sang làm nhà ở xã hội', 'Kim Oanh Group, đại gia chuyên phát triển các dự án đất nền phía Nam, vừa thông báo kế hoạch xây 40.000 căn nhà xã hội, nhà giá rẻ từ năm ... ', '<p>Kim Oanh Group, đại gia chuy&ecirc;n ph&aacute;t triển c&aacute;c dự &aacute;n đất nền ph&iacute;a Nam, vừa th&ocirc;ng b&aacute;o kế hoạch x&acirc;y 40.000 căn nh&agrave; x&atilde; hội, nh&agrave; gi&aacute; rẻ từ năm 2023 đến năm 2028.</p>\r\n\r\n<p>B&agrave; Đặng Thị Kim Oanh, Chủ tịch HĐQT Kim Oanh Group, cho biết ph&aacute;t triển nh&agrave; ở x&atilde; hội v&agrave; nh&agrave; thương mại gi&aacute; rẻ phục vụ đại đa số người lao động, sẽ l&agrave; chiến lược mới của doanh nghiệp từ năm 2023 trở đi. C&ocirc;ng ty đặt mục ti&ecirc;u sẽ ph&aacute;t triển 26 dự &aacute;n (gồm 23 dự &aacute;n nh&agrave; ở x&atilde; hội v&agrave; 3 dự &aacute;n nh&agrave; ở thu nhập thấp) với tổng cộng khoảng 40.000 sản phẩm từ nay đến năm 2028, tổng mức đầu tư khoảng 31.000 tỷ đồng.</p>\r\n\r\n<p>Giai đoạn 1, từ nay đến năm 2026, doanh nghiệp sẽ giới thiệu ra thị trường 14 dự &aacute;n với 25.000 sản phẩm. Ri&ecirc;ng năm 2023 sẽ giới thiệu ra thị trường 4.800 sản phẩm nh&agrave; ở x&atilde; hội thấp tầng v&agrave; cao tầng tại B&igrave;nh Dương v&agrave; Đồng Nai.</p>\r\n\r\n<p>Để chuẩn bị cho chiến lược mới, giữa th&aacute;ng 7 c&ocirc;ng ty đ&atilde; k&yacute; kết hợp t&aacute;c chiến lược với Tập đo&agrave;n Surbana Jurong, một doanh nghiệp gi&agrave;u kinh nghiệm đ&atilde; tham gia ph&aacute;t triển hơn 80% lượng nh&agrave; ở x&atilde; hội tại Singapore. Dự &aacute;n nh&agrave; ở x&atilde; hội đầu ti&ecirc;n của doanh nghiệp ph&aacute;t triển c&ugrave;ng đối t&aacute;c tại B&igrave;nh Dương, dự kiến sẽ c&ocirc;ng bố ra thị trường trong qu&yacute; III n&agrave;y.</p>\r\n\r\n<p><img alt=\"Phối cảnh dự án nhà ở xã hội thấp tầng Richland Residence do Kim Oanh Group làm chủ đầu tư tại Bến Cát, Bình Dương dự kiến sẽ tung ra thời gian tới.\" src=\"https://i1-vnexpress.vnecdn.net/2023/07/25/a-tb-NOXH-Kimoanh-Group-9941-1690267539.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=fZpPBBWvRRoQUt-toncWUw\" /></p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"1\" id=\"google_ads_iframe_/27973503/Vnexpress/Desktop/Inimage/Batdongsan/batdongsan.detail_0\" name=\"google_ads_iframe_/27973503/Vnexpress/Desktop/Inimage/Batdongsan/batdongsan.detail_0\" sandbox=\"\" scrolling=\"no\" tabindex=\"0\" title=\"3rd party ad content\" width=\"1\"></iframe></p>\r\n\r\n<p>Phối cảnh dự &aacute;n nh&agrave; ở x&atilde; hội thấp tầng Richland Residence do Kim Oanh Group l&agrave;m chủ đầu tư tại Bến C&aacute;t, B&igrave;nh Dương dự kiến sẽ tung ra thời gian tới.</p>\r\n\r\n<p>B&agrave; Oanh chia sẻ, c&ocirc;ng ty đang sở hữu hơn 500 ha đất tại nhiều khu vực như B&igrave;nh Dương, Đồng Nai, B&agrave; Rịa Vũng T&agrave;u, Ph&uacute; Quốc (Ki&ecirc;n Giang). Tại đ&acirc;y, doanh nghiệp cũng sẽ d&agrave;nh ra 20% quỹ đất để ph&aacute;t triển c&aacute;c dự &aacute;n nh&agrave; ở x&atilde; hội. B&ecirc;n cạnh đ&oacute;, hiện c&ocirc;ng ty b&aacute;n nh&agrave; gi&aacute; rẻ 900 triệu đồng một căn tại B&igrave;nh Dương.</p>\r\n\r\n<p>Động th&aacute;i rẽ sang l&agrave;m nh&agrave; ở x&atilde; hội của Kim Oanh Group đ&aacute;nh dấu bước chuyển của doanh nghiệp sau 15 năm chủ yếu ph&aacute;t triển ph&acirc;n kh&uacute;c đất nền ở thị trường bất động sản ph&iacute;a Nam. Định hướng của doanh nghiệp được đưa ra trong bối cảnh cuộc đua ph&aacute;t triển nh&agrave; ở x&atilde; hội tăng nhiệt. Từ đầu năm 2023, Ch&iacute;nh phủ đặt mục ti&ecirc;u ph&aacute;t triển một triệu căn nh&agrave; ở x&atilde; hội, c&ugrave;ng với đ&oacute; g&oacute;i t&iacute;n dụng 120.000 tỷ được triển khai nhằm hỗ trợ cho vay chủ đầu tư, người mua nh&agrave; ở x&atilde; hội, nh&agrave; ở c&ocirc;ng nh&acirc;n với l&atilde;i suất thấp hơn 1,5-2% một năm. Đầu th&aacute;ng 7, Ng&acirc;n h&agrave;ng Nh&agrave; nước cho biết, một số nh&agrave; băng bắt đầu cho vay g&oacute;i ưu đ&atilde;i n&agrave;y.</p>\r\n\r\n<p>G&oacute;i 120.000 tỷ đồng đang l&agrave; mục ti&ecirc;u nhắm đến của kh&ocirc;ng &iacute;t doanh nghiệp bất động sản khi thị trường đầu tư, đầu cơ t&agrave;i sản bước v&agrave;o m&ugrave;a đ&ocirc;ng ế ẩm. Kể từ khi được c&ocirc;ng bố đến nay, g&oacute;i t&iacute;n dụng n&agrave;y đ&atilde; li&ecirc;n tục h&acirc;m n&oacute;ng ph&acirc;n kh&uacute;c nh&agrave; ở x&atilde; hội với loạt &ocirc;ng lớn đ&aacute;nh tiếng c&ugrave;ng tham gia.</p>\r\n\r\n<p>Ngo&agrave;i Kim Oanh Group, hiện c&aacute;c doanh nghiệp đăng k&yacute; x&acirc;y nh&agrave; ở x&atilde; hội số lượng lớn ph&iacute;a Nam c&oacute; thể kể đến: Ho&agrave;ng Qu&acirc;n đặt mục ti&ecirc;u triển khai 50.000 căn hộ nh&agrave; ở x&atilde; hội; Nam Long dự định x&acirc;y 20.000 căn ph&acirc;n kh&uacute;c n&agrave;y tại c&aacute;c tỉnh Hải Ph&ograve;ng, Đồng Nai, Cần Thơ, Long An; Tập đo&agrave;n Danh Kh&ocirc;i cũng l&ecirc;n kế hoạch ph&aacute;t triển nh&agrave; ở x&atilde; hội tại huyện Nh&agrave; B&egrave; hoặc quận 12. Loạt &ocirc;ng lớn ph&iacute;a Bắc như Vinhome, Viglacera... cũng kh&ocirc;ng đứng ngo&agrave;i đường đua ph&aacute;t triển dự &aacute;n nh&agrave; ở x&atilde; hội.</p>\r\n\r\n<p>&Ocirc;ng L&ecirc; Ho&agrave;ng Ch&acirc;u, Chủ tịch Hiệp hội Bất động sản TP HCM (HoREA), đ&aacute;nh gi&aacute; sự tham gia của doanh nghiệp v&agrave;o việc ph&aacute;t triển nh&agrave; ở x&atilde; hội v&agrave; nh&agrave; gi&aacute; rẻ đ&oacute;ng vai tr&ograve; lớn trong việc gi&uacute;p c&acirc;n bằng lại thị trường nh&agrave; ở sau nhiều năm bị lệch pha cung cầu (thừa nh&agrave; gi&aacute; cao thiếu nh&agrave; gi&aacute; thấp vừa t&uacute;i tiền cho người lao động).</p>\r\n\r\n<p>Theo &ocirc;ng Ch&acirc;u, nh&agrave; ở x&atilde; hội v&agrave; nh&agrave; gi&aacute; rẻ l&agrave; ph&acirc;n kh&uacute;c bất động sản ti&ecirc;u d&ugrave;ng thiết yếu c&oacute; chức năng an cư (ở thật) v&agrave; c&oacute; nhu cầu rất lớn, c&oacute; thể đứng vững ngay cả khi thị trường n&oacute;ng sốt hay khủng hoảng. Nếu c&oacute; ch&iacute;nh s&aacute;ch hỗ trợ người mua tốt, khả năng chi trả sẽ được cải thiện, từng bước gi&uacute;p thị trường t&igrave;m lại đ&agrave; phục hồi thanh khoản.</p>\r\n\r\n<p>Chủ tịch HoREA nhận định trong giai đoạn to&agrave;n thị trường bất động sản đ&igrave;nh trệ, mất thanh khoản như hiện nay, sự khởi động của c&aacute;c dự &aacute;n nh&agrave; ở x&atilde; hội, nh&agrave; gi&aacute; rẻ cho thấy t&iacute;n hiệu c&aacute;c doanh nghiệp địa ốc dần hướng đến mục ti&ecirc;u ph&aacute;t triển l&agrave;nh mạnh, bền vững hơn.</p>\r\n\r\n<p><strong>Vũ L&ecirc;</strong></p>\r\n', './public/images/posts/bds-home.jpg', 31, 'Công khai', 'Admin', 'dai-gia-dat-nen-re-sang-lam-nha-o-xa-hoi', '2023-07-26', 'no', 'block'),
(40, 'Thí sinh 64 tuổi “thở phào” khi tốt nghiệp THPT 2023', '(NLĐO) - Bà Ngô Thị Kim Chi - 64 tuổi, ngụ quận 7, TP HCM - là một trong những thí sinh lớn tuổi nhất kỳ thi tốt nghiệp THPT 2023. Sau khi xem kết quả, bà nhẹ nhõm vì đậu tốt nghiệp với số điểm 31,55', '<h2><strong>(NLĐO) - B&agrave; Ng&ocirc; Thị Kim Chi - 64 tuổi, ngụ quận 7, TP HCM - l&agrave; một trong những th&iacute; sinh lớn tuổi nhất kỳ thi tốt nghiệp THPT 2023. Sau khi xem kết quả, b&agrave; nhẹ nh&otilde;m v&igrave; đậu tốt nghiệp với số điểm 31,55</strong></h2>\r\n\r\n<p>Với ước mơ trở th&agrave;nh gi&aacute;o vi&ecirc;n dạy m&ocirc;n to&aacute;n, b&agrave; Chi đ&atilde; nỗ lực, hy vọng rất nhiều ở kỳ thi lần n&agrave;y. D&ugrave; số điểm kh&ocirc;ng như mong muốn nhưng b&agrave; vẫn tự h&agrave;o v&igrave; m&igrave;nh đ&atilde; cố gắng hết sức v&agrave; đậu tốt nghiệp với 31,55 điểm. Trong đ&oacute;, m&ocirc;n to&aacute;n 5,8 điểm; ngữ văn 6,75 điểm; vật l&yacute; 6 điểm; h&oacute;a học 6 điểm; sinh học 7 điểm.</p>\r\n\r\n<p>Thầy Nguyễn Quang Ph&uacute;, gi&aacute;o vi&ecirc;n chủ nhiệm, cho biết những ng&agrave;y gần thi, b&agrave; Chi lu&ocirc;n chăm chỉ đến Trung t&acirc;m Gi&aacute;o dục nghề nghiệp - Gi&aacute;o dục thường xuy&ecirc;n quận 7 để &ocirc;n tập v&agrave; hướng dẫn b&agrave;i cho c&aacute;c bạn c&ugrave;ng lớp.</p>\r\n\r\n<p><img alt=\"Thí sinh 64 tuổi “thở phào” khi tốt nghiệp THPT 2023 - Ảnh 1.\" id=\"img_606401466671943680\" src=\"https://nld.mediacdn.vn/thumb_w/684/291774122806476800/2023/7/20/anh-8-16898413742641443539702.jpg\" title=\"Thí sinh 64 tuổi “thở phào” khi tốt nghiệp THPT 2023 - Ảnh 1.\" /></p>\r\n\r\n<p>Th&iacute; sinh U70 đậu tốt nghiệp THPT</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h3><a href=\"https://nld.com.vn/giao-duc-khoa-hoc/mot-truong-hoc-o-tp-hcm-co-mua-diem-10-trong-ky-thi-tot-nghiep-thpt-20230719074447625.htm\" target=\"_blank\">Một trường học ở TP HCM c&oacute; &ldquo;mưa&rdquo; điểm 10 trong kỳ thi tốt nghiệp THPT</a></h3>\r\n	</li>\r\n</ul>\r\n\r\n<p>Trao đổi với ph&oacute;ng vi&ecirc;n chiều 20-7, b&agrave; Chi cho biết đang tham khảo điểm chuẩn của c&aacute;c trường ĐH, CĐ ở TP HCM c&oacute; đ&agrave;o tạo ng&agrave;nh Sư phạm to&aacute;n. &quot;T&ocirc;i kh&ocirc;ng đặt nặng vấn đề phải v&agrave;o được trường ĐH, trường CĐ cũng kh&ocirc;ng sao cả, miễn sao được tiếp tục theo đuổi ước mơ&quot; &ndash; b&agrave; Chi t&acirc;m sự.</p>\r\n\r\n<p>Dựa v&agrave;o điểm thi năm nay, b&agrave; Chi chọn t&igrave;m c&aacute;c trường c&oacute; x&eacute;t tuyển khối A00, A02, B00, B03, mức điểm dao động 17- 18. &quot;T&ocirc;i cũng nhờ mọi người xung quanh tư vấn th&ecirc;m để lựa chọn nguyện vọng ph&ugrave; hợp. T&ocirc;i biết với điểm thi lần n&agrave;y, m&igrave;nh kh&ocirc;ng thể v&agrave;o Trường ĐH Sư phạm TP HCM nhưng t&ocirc;i sẽ kh&ocirc;ng bỏ cuộc &quot; - b&agrave; Chi bộc bạch</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Thí sinh 64 tuổi “thở phào” khi tốt nghiệp THPT 2023 - Ảnh 3.\" id=\"img_606401709857374208\" src=\"https://nld.mediacdn.vn/thumb_w/684/291774122806476800/2023/7/20/anh-6-16898414323121948680661.jpg\" title=\"Thí sinh 64 tuổi “thở phào” khi tốt nghiệp THPT 2023 - Ảnh 3.\" /></p>\r\n\r\n<p>Lớp &ocirc;n tập để chuẩn bị cho kỳ thi tốt nghiệp THPT 2023</p>\r\n\r\n<p>Thầy Ph&uacute; cho biết: &quot;B&agrave; Chi l&agrave; một học sinh đặc biệt. Với một người lớn tuổi, gặp kh&oacute; khăn trong việc ghi nhớ th&igrave; điểm số như vậy qu&aacute; xuất sắc. Từ lớp 6 đến lớp 12, b&agrave; Chi lu&ocirc;n đạt học sinh giỏi. Th&aacute;ng 4 vừa qua, b&agrave; c&ograve;n nhận giải III học sinh giỏi cấp TP hệ GDTX với m&ocirc;n Địa l&yacute;&quot;.</p>\r\n\r\n<p>Huế Xu&acirc;n</p>\r\n', './public/images/posts/thi-sinh-64-tuoi.jpg', 33, 'Công khai', 'Admin', 'thi-sinh-64-tuoi-tho-phao-khi-tot-nghiep-thpt-2023', '2023-07-26', 'no', 'block');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `price_new` varchar(255) NOT NULL,
  `price_old` varchar(255) DEFAULT 'Hiện trống',
  `desc_short` text NOT NULL,
  `desc_detail` text NOT NULL,
  `main_img` varchar(255) NOT NULL DEFAULT './public/images/img-product.png',
  `id_cate_prod` int(11) NOT NULL,
  `status` enum('Chờ duyệt','Công khai') NOT NULL DEFAULT 'Chờ duyệt',
  `notification` enum('Còn hàng','Hết hàng') NOT NULL DEFAULT 'Hết hàng',
  `creator` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL DEFAULT 'Admin',
  `create_at` varchar(255) NOT NULL,
  `is_featured` varchar(10) DEFAULT NULL,
  `is_bestseller` varchar(10) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `number` int(6) NOT NULL,
  `is_trash` varchar(10) NOT NULL DEFAULT 'no',
  `display` varchar(10) NOT NULL DEFAULT 'block'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `name`, `code`, `price_new`, `price_old`, `desc_short`, `desc_detail`, `main_img`, `id_cate_prod`, `status`, `notification`, `creator`, `create_at`, `is_featured`, `is_bestseller`, `slug`, `number`, `is_trash`, `display`) VALUES
(52, 'a', '#DTTM1', '47990000', '69990000', 'test', '<p>test</p>\r\n', './public/images/products/iphone.jpg', 43, 'Công khai', 'Còn hàng', 'Admin', '2023-08-02', 'on', 'on', 'a', 20, 'no', 'block');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sliders`
--

CREATE TABLE `tbl_sliders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `creator` enum('Admin') NOT NULL DEFAULT 'Admin',
  `create_at` varchar(255) NOT NULL,
  `status` enum('Chờ duyệt','Công khai') NOT NULL DEFAULT 'Chờ duyệt',
  `is_trash` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `create_at` int(11) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `fullname`, `username`, `email`, `phone`, `create_at`, `address`, `password`) VALUES
(1, 'Đặng Đức Chính', 'admin123', 'chinhdd.ph28756@gmail.com', '0888525597', 1689129458, 'Giao Long, Giao Thủy, Nam Định', '4f47b294e2e76d7b39876e74ee5cfbd3');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_cate_post`
--
ALTER TABLE `tbl_cate_post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_cate_product`
--
ALTER TABLE `tbl_cate_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_image_product`
--
ALTER TABLE `tbl_image_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_sliders`
--
ALTER TABLE `tbl_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_cate_post`
--
ALTER TABLE `tbl_cate_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `tbl_cate_product`
--
ALTER TABLE `tbl_cate_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `tbl_image_product`
--
ALTER TABLE `tbl_image_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT cho bảng `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `tbl_sliders`
--
ALTER TABLE `tbl_sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
