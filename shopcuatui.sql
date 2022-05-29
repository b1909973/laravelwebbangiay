-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 29, 2022 at 02:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopcuatui`
--
CREATE DATABASE IF NOT EXISTS `shopcuatui` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `shopcuatui`;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_08_074939_create_tbl_admin_table', 1),
(6, '2022_04_08_092705_create_tbl_danhmuc_table', 2),
(7, '2022_04_08_094835_create_tbl_sanpham_table', 3),
(8, '2022_04_08_164807_create_tbl_hinhanh_table', 4),
(9, '2022_04_08_165242_create_tbl_hinhanh_table', 5),
(10, '2022_04_08_190252_create_tbl_khachhang_table', 6),
(11, '2022_04_08_191022_create_tbl_khachhang_table', 7),
(12, '2022_04_10_055217_create_tbl_giohang_table', 8),
(13, '2022_04_12_125612_create_tbl_donhang_table', 9),
(14, '2022_04_12_130428_create_tbl_chitietdonhang_table', 10),
(15, '2022_04_12_133420_create_tbl_donhang_table', 11),
(16, '2022_04_12_133710_create_tbl_donhang_table', 12),
(17, '2022_04_12_133821_create_tbl_chitietdonhang_table', 12),
(18, '2022_04_15_084527_edit_sanpham_table', 13),
(19, '2022_04_15_085534_edit_sanpham1_table', 14),
(20, '2022_04_15_150834_create_tbl_thongbao_table', 15),
(21, '2022_04_15_150935_create_tbl_noidungthongbao_table', 16),
(22, '2022_04_16_134320_edit_tbl_donhang_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Quyen` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `Quyen`, `created_at`, `updated_at`) VALUES
(1, 'admin', '1234567', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chitietdonhang`
--

CREATE TABLE `tbl_chitietdonhang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Gia` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `TongTien` int(11) NOT NULL,
  `ID_DonHang` bigint(20) UNSIGNED NOT NULL,
  `ID_SanPham` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_chitietdonhang`
--

INSERT INTO `tbl_chitietdonhang` (`id`, `Gia`, `SoLuong`, `TongTien`, `ID_DonHang`, `ID_SanPham`) VALUES
(114, 450000, 3, 1350000, 81, 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TenDanhMuc` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id`, `TenDanhMuc`) VALUES
(1, 'nike'),
(2, 'adidas'),
(3, 'vans');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TrangThai` int(11) NOT NULL,
  `NgayTaoDon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayDuyetDon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `ID_KhachHang` bigint(20) UNSIGNED NOT NULL,
  `TatHienThi` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`id`, `TrangThai`, `NgayTaoDon`, `NgayDuyetDon`, `ID_KhachHang`, `TatHienThi`) VALUES
(81, 3, '15/05/2022', '15/05/2022', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ID_KhachHang` bigint(20) UNSIGNED NOT NULL,
  `ID_SanPham` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hinhanh`
--

CREATE TABLE `tbl_hinhanh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `HinhAnh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_SanPham` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_hinhanh`
--

INSERT INTO `tbl_hinhanh` (`id`, `HinhAnh`, `ID_SanPham`) VALUES
(39, 'nikeairjordanxam_3.jpg', 29),
(40, 'nikeairforcedentrang2.jpg', 30),
(41, 'nikeairforcedentrang3.jpg', 30),
(42, 'nikeairforcedentrang4.jpg', 30),
(44, 'nikeairshadow3.jpg', 31),
(45, 'nikeairshadow4.jpg', 31),
(46, 'nikeairmax97_2.jpg', 32),
(47, 'nikeairmax97_4.jpg', 32),
(48, 'nikeairmax97_3.jpg', 32),
(52, 'airforcefulltrang.jpg', 34),
(53, 'airforcefulltrang2.jpg', 34),
(54, 'airforcefulltrang3.jpg', 34),
(55, 'offwhite.jpg', 35),
(56, 'offwhite2.jpg', 35),
(57, 'offwhite3.jpg', 35),
(58, 'f1low.1jpg.jpg', 36),
(59, 'f1low.jpg', 36),
(60, 'f1low2.jpg', 36),
(61, 'muiso.jpg', 37),
(62, 'muiso1.jpg', 37),
(63, 'muiso2.jpg', 37),
(64, 'ultra.jpg', 38),
(65, 'ultra1.jpg', 38),
(66, 'ultra2.jpg', 38),
(67, 'nikezoom_2.jpg', 39),
(68, 'nikezoom_3.jpg', 39),
(69, 'nikezoom_4.jpg', 39),
(70, 'nikehong.jpg', 40),
(71, 'nikehong2.jpg', 40),
(72, 'nikehong3.jpg', 40),
(73, 'vienbac.jpg', 41),
(74, 'vienbac1.jpg', 41),
(75, 'vienbac2.jpg', 41),
(76, 'nikeairforcexanhngoc.jpg', 42),
(77, 'nikeairforcexanhngoc_2.jpg', 42),
(78, 'nikeairforcexanhngoc_3.jpg', 42),
(79, 'n83_1.jpg', 43),
(80, 'n83_2.jpg', 43),
(81, 'n83.jpg', 43),
(83, 'adidasTubular.jpg', 45),
(84, 'adidasTubular1.jpg', 45),
(85, 'adidasTubular2.jpg', 45),
(86, 'adidasAlphaB.jpeg', 46),
(87, 'adidasAlphaB2.jpeg', 46),
(88, 'adidasAlphaB3.jpeg', 46),
(89, 'hologram1.jpeg', 47),
(90, 'hologram2.jpeg', 47),
(91, 'hologram3.jpeg', 47),
(92, 'r1.jpeg', 48),
(93, 'r1_2.jpeg', 48),
(94, 'r1_3.jpeg', 48),
(98, 'sockgrey.jpeg', 50),
(99, 'sockgrey2.jpeg', 50),
(100, 'sockgrey3.jpeg', 50),
(101, 'star1.jpeg', 51),
(102, 'star2.jpeg', 51),
(103, 'star3.jpeg', 51),
(104, 'vansskool.jpg', 52),
(105, 'vansskool2.jpg', 52),
(106, 'vansskool3.jpg', 52),
(107, 'vanslip1.jpeg', 53),
(108, 'vanslip2.jpeg', 53),
(109, 'vanslip3.jpeg', 53),
(110, 'vanswoman.jpeg', 54),
(111, 'vanswoman1.jpeg', 54),
(112, 'vanswoman2.jpeg', 54),
(113, 'vansdentrang.jpeg', 55),
(114, 'vansdentrang1.jpeg', 55),
(115, 'vansdentrang2.jpeg', 55),
(120, 'nikeairshadow2.jpg', 31),
(122, 'airforcefulltrang2.jpg', 56),
(123, 'n83.jpg', 56),
(124, 'n83_2.jpg', 56),
(125, 'airforcefulltrang2.jpg', 29),
(126, 'max90.jpg', 57);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `HoTen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenTaiKhoan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MatKhau` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoDienThoai` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Khoa` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`id`, `HoTen`, `TenTaiKhoan`, `MatKhau`, `DiaChi`, `SoDienThoai`, `Khoa`) VALUES
(4, 'ngoc quy', 'ngocquy', '25d55ad283aa400af464c76d713c07ad', 'An Giang', '0858235239', 0),
(5, 'phương', 'phuong', '25d55ad283aa400af464c76d713c07ad', 'Kien Giang', '0858235239', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_noidungthongbao`
--

CREATE TABLE `tbl_noidungthongbao` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ID_ThongBao` bigint(20) UNSIGNED NOT NULL,
  `NoiDung` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DaXem` int(11) NOT NULL,
  `TatHienThi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_noidungthongbao`
--

INSERT INTO `tbl_noidungthongbao` (`id`, `ID_ThongBao`, `NoiDung`, `DaXem`, `TatHienThi`) VALUES
(36, 23, 'ĐÃ XÁC NHẬN', 0, 0),
(37, 23, 'ĐÃ GIAO THÀNH CÔNG', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TenSP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KichCo` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaChinhThuc` int(11) NOT NULL,
  `GiaGiam` int(11) NOT NULL,
  `ID_Thuonghieu` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new` int(11) NOT NULL DEFAULT 0,
  `daxoa` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id`, `TenSP`, `KichCo`, `SoLuong`, `GiaChinhThuc`, `GiaGiam`, `ID_Thuonghieu`, `slug`, `new`, `daxoa`) VALUES
(29, 'Gìay thể thao XSPORT Nike Jordan 1 Low Xám Đế Xanh REP', 42, 3, 850000, 0, 1, 'Giay the thao XSPORT Nike Jordan 1 Low Xam De Xanh REP', 1, 0),
(30, 'Gìay thể thao XSPORT Ni.ke Air Force 1 Đen Trắng REP 1:1', 41, 12, 550000, 450000, 1, 'Giay the thao XSPORT Nike Air Force 1 Den Trang REP 1:1', 0, 1),
(31, 'Giày Thể Thao XSPORT Ni.ke air shadow Rep 1:1', 42, 16, 850000, 0, 1, 'Giay The Thao XSPORT Nike air shadow Rep 1:1', 1, 0),
(32, 'Giày Thể Thao XSPORT Ni.ke Air Max 97', 42, 19, 850000, 650000, 1, 'Giay The Thao XSPORT Nike Air Max 97', 1, 0),
(34, 'Giày Thể Thao XSPORT Ni.ke Air Force 1 Full Trắng 1:1 REP', 43, 20, 950000, 0, 1, 'Giay The Thao XSPORT Nike Air Force 1 Full Trang1:1_REP', 0, 0),
(35, 'Giày Thể Thao XSPORT Ni.ke Air Jordan 4 Retro Off White Kem REP 1:1', 43, 20, 930000, 0, 1, 'Giay The Thao XSPORT Nike Air Jordan 4 Retro Off White Kem REP1:1', 0, 0),
(36, 'Giày Thể Thao XSPORT Ni.ke Jordan 1 F1 Low', 43, 20, 450000, 0, 1, 'Giay The Thao XSPORT Nike Jordan 1 F1 Low', 0, 0),
(37, 'Adidas Superstar Trắng Kẻ Đen Mũi Sò REP 1:1', 41, 20, 750000, 0, 2, 'Adidas Superstar Trang Ke Den Mui So REP 1:1', 0, 0),
(38, 'Adidas Ultra Boost 6.0 Xám Tím REP', 43, 19, 750000, 0, 2, 'Adidas Ultra Boost 6.0 Xam TimREP', 0, 0),
(39, 'Nike Zoom T67 SF', 41, 20, 550000, 0, 1, 'Nike Zoom T67 SF', 0, 0),
(40, 'Nike Jordan 1 High Hồng REP', 41, 20, 550000, 0, 1, 'Nike Jordan 1 High Hong REP', 0, 0),
(41, 'Nike Jordan 1 Low Xanh Viền Bạc REP', 42, 20, 550000, 0, 1, 'Nike Jordan 1 Low Xanh Vien Bac REP', 0, 0),
(42, 'Nike Air Force 1 Shadow Xanh Ngọc Rep 1 :1', 42, 20, 850000, 0, 1, 'Nike Air Force \n Shadow Xanh Ngoc Rep 1 :1', 0, 0),
(43, 'Giày Nike Giá Rẻ N83 2019', 41, 9, 450000, 250000, 1, 'Giay Nike Gia Re N83 2019', 1, 0),
(45, 'Gìay thể thao XSPORT Adidas Tubular Shadow Xám Kem', 42, 19, 750000, 0, 2, 'Giay the thao XSPORT Adidas Tubular Shadow Xam Kem', 1, 0),
(46, 'Giày Adidas Alphabounce', 42, 20, 2100000, 0, 2, 'Giay Adidas Alphabounce', 1, 0),
(47, 'Giày Adidas NMD R1 Black Hologram', 43, 19, 2250000, 0, 2, 'Giay Adidas NMD R1 Black Hologram', 1, 0),
(48, 'Giày Adidas NMD R1 White', 43, 19, 2100000, 0, 2, 'Giay Adidas NMD R1 White', 0, 0),
(50, 'Giày Adidas NMD CS1 PK City Sock Grey', 43, 19, 1700000, 0, 2, 'Giay Adidas NMD CS1 PK City Sock Grey', 1, 0),
(51, 'Giày Adidas Star Wars x NMD R1 V2 Lando Calrissia', 43, 20, 1650000, 0, 2, 'Giay Adidas Star Wars x NMD R1 V2 Lando Calrissia', 0, 0),
(52, 'Giày Vans Old Skool Black White', 42, 20, 1350000, 0, 3, 'Giay Vans Old Skool Black White', 1, 0),
(53, 'Giày Vans Vault OG SLIP-ON LX', 40, 17, 1050000, 0, 3, 'Giay Vans Vault OG SLIP ON LX', 1, 0),
(54, 'Giày Vans Asher Canvas Slip-on Women\'s White', 39, 20, 750000, 0, 3, 'Giay Vans Asher Canvas Slip-on Women\'s White', 1, 0),
(55, 'Giày Vans Old Skool Style 36 Marshmallow', 36, 20, 1850000, 0, 3, 'Giay Vans Old Skool Style 36 Marshmallow', 1, 0),
(56, 'giay moi', 42, 18, 2100000, 0, 1, 'giay moi', 1, 1),
(57, 'Giày thể thao nike air Max 90', 41, 20, 700000, 0, 1, 'Giay the thao nike air Max 90', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_thongbao`
--

CREATE TABLE `tbl_thongbao` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ID_DonHang` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_thongbao`
--

INSERT INTO `tbl_thongbao` (`id`, `ID_DonHang`) VALUES
(23, 81);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_chitietdonhang_id_donhang_foreign` (`ID_DonHang`),
  ADD KEY `tbl_chitietdonhang_id_sanpham_foreign` (`ID_SanPham`);

--
-- Indexes for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_donhang_id_khachhang_foreign` (`ID_KhachHang`);

--
-- Indexes for table `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_giohang_id_khachhang_foreign` (`ID_KhachHang`),
  ADD KEY `tbl_giohang_id_sanpham_foreign` (`ID_SanPham`);

--
-- Indexes for table `tbl_hinhanh`
--
ALTER TABLE `tbl_hinhanh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_hinhanh_id_sanpham_foreign` (`ID_SanPham`);

--
-- Indexes for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_noidungthongbao`
--
ALTER TABLE `tbl_noidungthongbao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_noidungthongbao_id_thongbao_foreign` (`ID_ThongBao`);

--
-- Indexes for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_sanpham_id_thuonghieu_foreign` (`ID_Thuonghieu`);

--
-- Indexes for table `tbl_thongbao`
--
ALTER TABLE `tbl_thongbao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_thongbao_id_donhang_foreign` (`ID_DonHang`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `tbl_hinhanh`
--
ALTER TABLE `tbl_hinhanh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_noidungthongbao`
--
ALTER TABLE `tbl_noidungthongbao`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_thongbao`
--
ALTER TABLE `tbl_thongbao`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD CONSTRAINT `tbl_chitietdonhang_id_donhang_foreign` FOREIGN KEY (`ID_DonHang`) REFERENCES `tbl_donhang` (`id`),
  ADD CONSTRAINT `tbl_chitietdonhang_id_sanpham_foreign` FOREIGN KEY (`ID_SanPham`) REFERENCES `tbl_sanpham` (`id`);

--
-- Constraints for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD CONSTRAINT `tbl_donhang_id_khachhang_foreign` FOREIGN KEY (`ID_KhachHang`) REFERENCES `tbl_khachhang` (`id`);

--
-- Constraints for table `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD CONSTRAINT `tbl_giohang_id_khachhang_foreign` FOREIGN KEY (`ID_KhachHang`) REFERENCES `tbl_khachhang` (`id`),
  ADD CONSTRAINT `tbl_giohang_id_sanpham_foreign` FOREIGN KEY (`ID_SanPham`) REFERENCES `tbl_sanpham` (`id`);

--
-- Constraints for table `tbl_hinhanh`
--
ALTER TABLE `tbl_hinhanh`
  ADD CONSTRAINT `tbl_hinhanh_id_sanpham_foreign` FOREIGN KEY (`ID_SanPham`) REFERENCES `tbl_sanpham` (`id`);

--
-- Constraints for table `tbl_noidungthongbao`
--
ALTER TABLE `tbl_noidungthongbao`
  ADD CONSTRAINT `tbl_noidungthongbao_id_thongbao_foreign` FOREIGN KEY (`ID_ThongBao`) REFERENCES `tbl_thongbao` (`id`);

--
-- Constraints for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `tbl_sanpham_id_thuonghieu_foreign` FOREIGN KEY (`ID_Thuonghieu`) REFERENCES `tbl_danhmuc` (`id`);

--
-- Constraints for table `tbl_thongbao`
--
ALTER TABLE `tbl_thongbao`
  ADD CONSTRAINT `tbl_thongbao_id_donhang_foreign` FOREIGN KEY (`ID_DonHang`) REFERENCES `tbl_donhang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
