-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2024 at 06:02 AM
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
-- Database: `du_an_mau`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(11) NOT NULL,
  `bill_name` varchar(255) NOT NULL,
  `bill_address` varchar(255) NOT NULL,
  `bill_tel` varchar(50) NOT NULL,
  `bill_email` varchar(100) NOT NULL,
  `bill_pttt` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1.Thanh toán trực tiếp\r\n2. Chuyển khoản\r\n3. Thanh toán Online',
  `total` int(10) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0. Đơn hàng mới\r\n1. Đang xử lý\r\n2. Đang giao hàng\r\n3. Đã giao hàng',
  `receive_name` varchar(255) DEFAULT NULL,
  `receive_address` varchar(255) DEFAULT NULL,
  `receive_tel` varchar(50) DEFAULT NULL,
  `ngay_dat` varchar(50) NOT NULL,
  `ma_kh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id_bill`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `total`, `trang_thai`, `receive_name`, `receive_address`, `receive_tel`, `ngay_dat`, `ma_kh`) VALUES
(81, 'Trương Văn Tùng', 'Bắc Lý, Lý Nhân, Hà Nam', '0868313293', 'admin@gmail.com', 0, 3000000, 0, NULL, NULL, NULL, '10:44:37pm 16/02/2024', 54),
(82, 'Trương Văn Tùng', 'Bắc Lý, Lý Nhân, Hà Nam', '0868313293', 'admin@gmail.com', 0, 61900000, 0, NULL, NULL, NULL, '10:44:49pm 16/02/2024', 54),
(83, 'Trương Văn Tùng', 'Bắc Lý, Lý Nhân, Hà Nam', '0868313293', 'admin@gmail.com', 0, 5250000, 0, NULL, NULL, NULL, '10:46:25pm 16/02/2024', 54),
(84, 'Trương Văn Tùng', 'Bắc Lý, Lý Nhân, Hà Nam', '0868313293', 'admin@gmail.com', 0, 7750000, 0, NULL, NULL, NULL, '10:55:41pm 16/02/2024', 54);

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `ma_bl` int(11) NOT NULL COMMENT 'Mã bình luận',
  `noi_dung` varchar(255) NOT NULL COMMENT 'Nội dung',
  `ma_sp` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `ma_kh` int(11) NOT NULL COMMENT 'Mã khách hàng',
  `ngay_bl` varchar(50) NOT NULL COMMENT 'Ngày bình luận'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `hinh` varchar(255) DEFAULT NULL,
  `ten_sp` varchar(255) DEFAULT NULL,
  `gia` int(11) NOT NULL,
  `so_luong` int(3) NOT NULL,
  `thanh_tien` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `ma_kh`, `ma_sp`, `hinh`, `ten_sp`, `gia`, `so_luong`, `thanh_tien`, `id_bill`) VALUES
(132, 54, 22, 'arvn-ban-phim-co-akko-3087-v2-ds-horizon-akko-switch-v3-cream-yellow-1_c05cfdb040994f64abdb6b00ff2ed5ae_grande.webp', 'Bàn phím cơ AKKO 3087 v2 DS Horizon Akko Switch V3', 1500000, 1, 1500000, 81),
(133, 54, 22, 'arvn-ban-phim-co-akko-3087-v2-ds-horizon-akko-switch-v3-cream-yellow-1_c05cfdb040994f64abdb6b00ff2ed5ae_grande.webp', 'Bàn phím cơ AKKO 3087 v2 DS Horizon Akko Switch V3', 1500000, 1, 1500000, 81),
(134, 54, 20, '048vn_fe12b78c0a64470fb59d97a86e20fc8d_grande.webp', 'Laptop gaming MSI Raider GE68 HX 13VG 048VN', 61900000, 1, 61900000, 82),
(135, 54, 13, 'chuot-g-pro-wireless-red_ff44f385041a4d20ab32700a7446b9e9_c2e7abdc2f9046c796d59b139581aa67_grande.webp', 'Chuột Gaming GrenPro TUF M4 Wireless', 750000, 7, 5250000, 83),
(136, 54, 22, 'arvn-ban-phim-co-akko-3087-v2-ds-horizon-akko-switch-v3-cream-yellow-1_c05cfdb040994f64abdb6b00ff2ed5ae_grande.webp', 'Bàn phím cơ AKKO 3087 v2 DS Horizon Akko Switch V3', 1500000, 2, 3000000, 84),
(137, 54, 16, 'gearvn_logitech_g502hero_cdd967f8c51f4c4eb475006c46d883b2_grande.webp', 'Chuột Logitech G502 Hero Gaming', 950000, 5, 4750000, 84);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `ma_kh` int(11) NOT NULL COMMENT 'Mã khách hàng',
  `ho_ten` varchar(50) NOT NULL COMMENT 'Họ và tên',
  `email` varchar(50) NOT NULL COMMENT 'Địa chỉ email ',
  `mat_khau` varchar(50) NOT NULL COMMENT 'Mật khẩu',
  `hinh` varchar(255) DEFAULT NULL COMMENT 'Hình ảnh',
  `dia_chi` varchar(255) DEFAULT NULL COMMENT 'Địa chỉ',
  `so_dt` varchar(13) DEFAULT NULL COMMENT 'Số điện thoại',
  `vai_tro` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Vai trò ( nếu là 2 thì là quản trị viên )',
  `kich_hoat` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Kích hoạt ( nếu là 2 thì trạng thái là đã kích hoạt ) '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`ma_kh`, `ho_ten`, `email`, `mat_khau`, `hinh`, `dia_chi`, `so_dt`, `vai_tro`, `kich_hoat`) VALUES
(54, 'Trương Văn Tùng', 'kiemthu@gmail.com', '1234567', 'mim_yam_00.png', 'Bắc Lý, Lý Nhân, Hà Nam', '0868313293', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

CREATE TABLE `loai` (
  `ma_loai` int(11) NOT NULL COMMENT 'Mã loại',
  `ten_loai` varchar(50) NOT NULL COMMENT 'Tên loại'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`ma_loai`, `ten_loai`) VALUES
(13, 'LapTop Asus Gaming'),
(14, 'LapTop Acer Gaming'),
(15, 'LapTop ROG Gaming'),
(16, 'LapTop MSI Gaming'),
(17, 'Chuột Gaming'),
(18, 'Bàn Phím');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `ma_sp` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `ten_sp` varchar(50) NOT NULL COMMENT 'Tên sản phẩm',
  `don_gia` int(11) NOT NULL COMMENT 'Đơn giá',
  `giam_gia` int(11) DEFAULT 0 COMMENT 'Giảm giá',
  `hinh` varchar(255) NOT NULL COMMENT 'Hình ảnh',
  `ngay_nhap` date NOT NULL COMMENT 'Ngày nhập',
  `mo_ta` text DEFAULT NULL COMMENT 'Mô tả',
  `so_luot_xem` int(11) NOT NULL DEFAULT 0 COMMENT 'Số lượt xem',
  `ma_loai` int(11) NOT NULL COMMENT 'Mã loại'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`ma_sp`, `ten_sp`, `don_gia`, `giam_gia`, `hinh`, `ngay_nhap`, `mo_ta`, `so_luot_xem`, `ma_loai`) VALUES
(6, 'Laptop gaming Acer Nitro V ANV15 51 72VS', 24900000, 0, 'web_push_720x360_a38b966b11ac49e0a5e8beef9ac97161.webp', '2024-01-07', '                                Intel® Core™ i7-13620H (10 nhân, 16 luồng, 3.60 GHz up to 4.90 GHz, 24 MB Intel® Smart Cache)                            ', 3, 14),
(7, 'Laptop gaming MSI Katana A15 AI B8VE 402VN', 27990000, 0, '53f9_8b03964d08864ffcab012c418b59ce65_grande.webp', '2024-01-17', '                                Ryzen 7 8845HS (3.8GHz upto 5.1GHz, 8 cores 16 threads, 24MB cache)                            ', 1, 16),
(10, 'Laptop gaming ASUS ROG Strix SCAR 16 G634JZR NM009', 10790000, 0, 'hn246w_7ef31c56c11d46218f8a399931b8e562_grande.webp', '2024-01-17', '                                Intel® Core™ i9-14900HX 2.2 GHz (36MB Cache, up to 5.8 GHz, 24 cores, 32 Threads)                            ', 0, 15),
(11, 'Laptop gaming ASUS TUF Gaming F15 FX507ZC4 HN099W', 23900000, 0, 'lp520w_dfddfcf4a46d43e4b82391209328e195_grande.webp', '2024-01-17', 'Intel® Core™ i7-12700H Processor 2.3 GHz (24M Cache, up to 4.7 GHz, 14 cores: 6 P-cores and 8 E-cores)', 0, 13),
(12, 'Chuột Gaming Asus TUF M4 Wireless', 850000, 0, 'chuot_aa348bf0177b4795a39ab66d51e62ed7.jpg', '2024-01-17', 'Chuột gaming không dây TUF GAMING M4 Wireless 2.4, siêu nhẹ, cảm biến 12.000 dpi, nắp vỏ bằng PBT, feet chuột 100% PTFE, Armoury Crate', 0, 17),
(13, 'Chuột Gaming GrenPro TUF M4 Wireless', 750000, 0, 'chuot-g-pro-wireless-red_ff44f385041a4d20ab32700a7446b9e9_c2e7abdc2f9046c796d59b139581aa67_grande.webp', '2024-01-18', '          Kích thước\r\n\r\n116.6 x 62.15 x 38.2 ( mm ) ( Dài x Rộng x Cao )\r\n\r\nTrọng lượng\r\n\r\n99g\r\n\r\nCảm biến\r\n\r\nHERO\r\n\r\nĐộ phân giải\r\n\r\n200 – 12000 DPI\r\n\r\nTăng tốc tối đa\r\n\r\n > 40 G\r\n\r\nTốc độ tối đa\r\n\r\n> 400 IPS\r\n\r\nTốc độ báo cáo không dây\r\n\r\n1000Hz ( 1ms )\r\n\r\nCông nghệ LIGHTSPEED\r\n\r\nCó\r\n\r\nBộ vi xử lý\r\n\r\nARM 32-bit\r\n\r\nTuổi thọ pin\r\n\r\n250 giờ\r\n\r\nBộ nhớ tích hợp\r\n\r\n1 cấu hình\r\n\r\nHệ thống\r\n\r\nỨng lực Nút Cơ học\r\n\r\nTương thích phần mềm\r\n\r\nLogitech Gaming Software                                                  ', 0, 17),
(16, 'Chuột Logitech G502 Hero Gaming', 950000, 0, 'gearvn_logitech_g502hero_cdd967f8c51f4c4eb475006c46d883b2_grande.webp', '2024-01-20', 'Cảm biến:	HERO\r\nĐộ phân giải: 	100 - 25.000 dpi\r\nTăng tốc tối đa:	> 40 G\r\nTốc độ tối đa:	> 400 IPS\r\nNút:	11 nút\r\nĐịnh dạng dữ liệu USB:	16 bit/trục\r\nTốc độ báo cáo USB: 	1000 Hz (1ms)\r\nBộ vi xử lý:	ARM 32-bit\r\nBộ nhớ tích hợp:	Tối đa 5 cấu hình (yêu cầu phần mềm 127.1.7)\r\nChân PTFE:	> 250 ki-lô-mé', 30, 17),
(17, 'LapTOp Aser Nitro V Tiger 2023', 15000000, 0, 'acer_nitro_5__4__3eeed926d80f4252b0720f96190a35ae_78a604ac9a324bae967a6164bde207f6_grande.webp', '2024-01-20', '                                Intel Core i5-13420H (3.4GHz up to 4.6GHz 12MB Smart Cache, 8 nhân 12 luồng)/\r\n8GB DDR5 5200MHz (2x SO-DIMM socket, up to 32GB SDRAM)                            ', 8, 14),
(18, 'Laptop gaming MSI GF63 12UC 887VN', 19490000, 0, 'gf63-final_6ce8b15400404b2baf9632d843a2c4c7_large_c22125bccefc4149b1b7321cfc2ed062_grande.webp', '2024-01-20', 'Intel Core i7-12650H 3.5GHz up to 4.70GHz 24MB, 10 nhân, 16 luồng', 0, 16),
(19, 'Laptop gaming MSI Bravo 15 B7ED 010VN', 16490000, 0, '010vn-fix_7cfb6f2a9b854e4d80d160030659985c_grande.webp', '2024-01-20', ' AMD Ryzen 5-7535HS 3.30GHz upto 4.55GHz, 6 cores 12 threads, 16MB Cache, DDR5 16GB (2 x 8GB) 4800MHz; 2 slots, Up to 64GB                                                        ', 0, 16),
(20, 'Laptop gaming MSI Raider GE68 HX 13VG 048VN', 61900000, 0, '048vn_fe12b78c0a64470fb59d97a86e20fc8d_grande.webp', '2024-01-20', 'Intel® Core™ i7 13700HX 3.7GHz up to 5.0GHz 30MB, 16 Cores 24 Threads, 32GB (16x2) DDR5 5600MHz (2x SO-DIMM socket, up to 64GB SDRAM)', 0, 16),
(21, 'Laptop gaming ASUS ROG Flow X13 GV302XU MU223W', 49000000, 0, 'mu223w_e8cd9c186d034d1892f20b023077fed7_grande.webp', '2024-01-20', 'Ryzen™ 9 7940HS Mobile Processor (8-core/16-thread, 16MB L3 cache, up to 5.2 GHz max boost), 16GB (8x2) LPDDR5 6400Mhz Onboard', 20, 15),
(22, 'Bàn phím cơ AKKO 3087 v2 DS Horizon Akko Switch V3', 15000000, 0, 'arvn-ban-phim-co-akko-3087-v2-ds-horizon-akko-switch-v3-cream-yellow-1_c05cfdb040994f64abdb6b00ff2ed5ae_grande.webp', '2024-01-20', '<p>Thương hiệu Akko Kiểu bàn phím Fullsize (87 phím) Kết nối USB Type-C, có thể tháo rời Kích thước 360 x 140 x 40mm Trọng lượng ~0.95 kg</p>', 1, 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `ma_sp` (`ma_sp`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `ma_kh` (`ma_kh`),
  ADD KEY `ma_sp` (`ma_sp`),
  ADD KEY `id_bill` (`id_bill`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Indexes for table `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ma_sp`),
  ADD KEY `ma_loai` (`ma_loai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `ma_bl` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã bình luận', AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `ma_kh` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã khách hàng', AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `loai`
--
ALTER TABLE `loai`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã loại', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ma_sp` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm', AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`ma_sp`) REFERENCES `sanpham` (`ma_sp`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`ma_kh`) REFERENCES `khachhang` (`ma_kh`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khachhang` (`ma_kh`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`ma_sp`) REFERENCES `sanpham` (`ma_sp`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id_bill`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`ma_loai`) REFERENCES `loai` (`ma_loai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
