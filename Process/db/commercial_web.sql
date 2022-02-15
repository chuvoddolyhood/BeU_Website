-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2022 at 11:00 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `commercial_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `MaChiTiet` int(11) NOT NULL,
  `SoDonDH` int(11) NOT NULL,
  `MSHH` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaTien` int(11) NOT NULL,
  `GiamGia` int(11) DEFAULT NULL,
  `ThanhTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietdathang`
--

INSERT INTO `chitietdathang` (`MaChiTiet`, `SoDonDH`, `MSHH`, `SoLuong`, `GiaTien`, `GiamGia`, `ThanhTien`) VALUES
(1, 1, 1, 2, 3290000, 0, 6580000),
(2, 2, 7, 1, 6290000, 20, 5032000),
(3, 3, 4, 2, 9690000, 0, 19380000),
(4, 3, 3, 1, 5590000, 0, 5590000),
(5, 12, 1, 2, 3290000, 0, 6580000),
(6, 12, 5, 4, 1490000, 0, 5960000),
(7, 12, 4, 1, 9690000, 0, 9690000),
(8, 12, 3, 2, 5590000, 0, 11180000),
(9, 13, 1, 2, 3290000, 0, 6580000),
(10, 13, 5, 4, 1490000, 0, 5960000),
(11, 13, 4, 1, 9690000, 0, 9690000),
(12, 13, 3, 2, 5590000, 0, 11180000),
(13, 14, 6, 1, 1605500, 5, 1605500),
(14, 15, 6, 2, 1690000, 5, 3380000),
(15, 16, 7, 2, 6290000, 0, 12580000),
(16, 17, 6, 3, 1352000, 20, 4056000),
(17, 18, 1, 1, 3290000, 0, 3290000),
(18, 31, 3, 4, 5310500, 5, 21242000),
(19, 31, 8, 1, 8490000, 0, 8490000),
(20, 32, 2, 1, 4490000, 0, 4490000),
(21, 33, 2, 1, 4490000, 0, 4490000),
(22, 34, 5, 3, 983400, 34, 2950200);

-- --------------------------------------------------------

--
-- Table structure for table `chitietnhaphang`
--

CREATE TABLE `chitietnhaphang` (
  `SoDonNhapHang` int(11) NOT NULL,
  `MSHH` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGiaNhap` int(11) NOT NULL,
  `ThanhTien` int(11) NOT NULL,
  `NoiSanXuat` varchar(50) NOT NULL,
  `NgayNhap` varchar(20) NOT NULL,
  `MSNV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitietnhaphang`
--

INSERT INTO `chitietnhaphang` (`SoDonNhapHang`, `MSHH`, `SoLuong`, `DonGiaNhap`, `ThanhTien`, `NoiSanXuat`, `NgayNhap`, `MSNV`) VALUES
(4, 3, 2, 12000, 24000, '', '09-02-2022 09:26:38', 5);

-- --------------------------------------------------------

--
-- Table structure for table `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(11) NOT NULL,
  `TaiKhoanKH` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MSNV` int(11) DEFAULT NULL,
  `TongCong` int(11) NOT NULL,
  `NgayDH` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NgayGH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TrangThaiDH` int(11) NOT NULL,
  `DiaChi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PTThanhToan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `TaiKhoanKH`, `MSNV`, `TongCong`, `NgayDH`, `NgayGH`, `TrangThaiDH`, `DiaChi`, `PTThanhToan`) VALUES
(1, 'Quoc', 2, 6580000, '22/11/2021', '27/12/2021', 1, 'Hồ Chí Minh', 1),
(2, 'Bun', 2, 5032000, '31/1/2021', '1/4/2021', 1, 'Cần Thơ', 1),
(3, 'Quoc', 0, 24970000, '11/11/2021', '12/12/2021', 1, 'Hồ Chí Minh', 1),
(12, 'Quoc', 2, 20090000, '20/11/2021', '1/12/2021', 1, 'Hồ Chí Minh', 1),
(13, 'Quoc', 0, 20090000, '20/11/2021', '1/12/2021', 1, 'Hồ Chí Minh', 1),
(14, 'Quoc', 2, 1635500, '21/11/2021', '2/12/2021', 1, 'Hồ Chí Minh', 1),
(15, 'Bun', 0, 1720000, '22/11/2021', '3/12/2021', 1, 'Cần Thơ', 1),
(16, 'Bun', 0, 6320000, '23/11/2021', '4/12/2021', 1, 'Cần Thơ', 1),
(17, 'ChucThay', 4, 1382000, '26/11/2021', '7/12/2021', 1, 'Khu II, Đ. 3/2, Xuân Khánh, Ninh Kiều, Cần Thơ', 1),
(18, 'ChucThay', 0, 3320000, '28/11/2021', '9/12/2021', 1, 'Cần Thơ', 1),
(31, 'Quoc', 0, 28275400, '14/2/2022', '25/2/2022', 4, 'Hồ Chí Minh', 1),
(32, 'Quoc', 0, 4295500, '14/2/2022', '25/2/2022', 4, 'Hồ Chí Minh', 1),
(33, 'Quoc', 0, 4490000, '14/2/2022', '25/2/2022', 4, 'Hồ Chí Minh', 1),
(34, 'Quoc', 0, 2685180, '14/2/2022', '25/2/2022', 4, 'Hồ Chí Minh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diachikh`
--

CREATE TABLE `diachikh` (
  `MaDC` int(11) NOT NULL,
  `DiaChi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MSKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diachikh`
--

INSERT INTO `diachikh` (`MaDC`, `DiaChi`, `MSKH`) VALUES
(1, 'Hồ Chí Minh', 1),
(13, 'Cần Thơ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diemgame`
--

CREATE TABLE `diemgame` (
  `MaGame` int(11) NOT NULL,
  `MSKH` int(11) NOT NULL,
  `Diem` int(11) NOT NULL,
  `NgayChoi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `MaGame` int(11) NOT NULL,
  `TenGame` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `MaGio` int(11) NOT NULL,
  `TaiKhoanKH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MSHH` int(11) NOT NULL,
  `TenHangHoa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Gia` int(50) NOT NULL,
  `SoLuong` int(10) NOT NULL,
  `PhanLoai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`MaGio`, `TaiKhoanKH`, `MSHH`, `TenHangHoa`, `Gia`, `SoLuong`, `PhanLoai`) VALUES
(32, 'Quoc', 3, 'AMD Ryzen 5 3600 / 32MB / 4.2GHz / 6 nhân 12 luồng / AM4', 5310500, 1, 'Chip AMD'),
(33, 'NguyenDinhThanh', 1, 'ASUS TUF GAMING B460M-PRO', 3290000, 1, 'Mainboard B460');

-- --------------------------------------------------------

--
-- Table structure for table `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` int(11) NOT NULL,
  `TenHH` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `QuyCach` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `GiaNhap` int(11) NOT NULL,
  `Gia` int(11) NOT NULL,
  `SoLuongHang` int(11) NOT NULL,
  `MaLoaiHang` int(11) NOT NULL,
  `GiamGia` int(4) NOT NULL DEFAULT 0,
  `LoaiSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HangHangHoa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NoiSXHangHoa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TinhTrang` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Mới',
  `BaoHanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Đang cập nhật',
  `DacBiet` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Không'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `QuyCach`, `GiaNhap`, `Gia`, `SoLuongHang`, `MaLoaiHang`, `GiamGia`, `LoaiSanPham`, `HangHangHoa`, `NoiSXHangHoa`, `TinhTrang`, `BaoHanh`, `DacBiet`) VALUES
(1, 'ASUS TUF GAMING B460M-PRO', 'món', 0, 3290000, 102, 2, 0, 'Mainboard B460', 'ASUS', 'Đài Loan', 'Mới', 'Đang cập nhật', 'Không'),
(2, 'MSI MAG B560M MORTAR WIFI', 'món', 0, 4490000, 100, 2, 0, 'Mainboard B560M', 'MSI', 'Đài Loan', 'Mới', 'Đang cập nhật', 'Hỗ trợ kết nối wifi'),
(3, 'AMD Ryzen 5 3600 / 32MB / 4.2GHz / 6 nhân 12 luồng / AM4', 'món', 12000, 5590000, 102, 1, 5, 'Chip AMD', 'AMD', 'Mỹ', 'Mới', 'Đang cập nhật', 'Không'),
(4, 'Intel Core i7 10700 / 4.8GHz / 8 Nhân 16 Luồng', 'món', 0, 9690000, 100, 1, 0, 'Chip Intel', 'INTEL', 'Mỹ', 'Mới', 'Đang cập nhật', 'Không'),
(5, '(8GB DDR4 1x8G 2666) RAM Kingston HyperX Fury Black', 'món', 0, 1490000, 100, 3, 34, 'RAM 8GB DDR4', 'Kingston', 'Mỹ', 'Mới', 'Đang cập nhật', 'Không'),
(6, '(8GB DDR4 1x8G 3000) RAM G.SKILL Trident Z RGB CL16-18-18-38', 'món', 0, 1690000, 100, 3, 20, 'RAM 8GB DDR4', 'GSKILL', 'Đài Loan', 'Mới', 'Đang cập nhật', 'Led RGB'),
(7, 'GIGABYTE GeForce GTX 1050 Ti D5 4GB', 'món', 0, 6790000, 100, 4, 12, 'GTX 1050ti', 'GIGABYTE', 'Đài Loan', 'Mới', 'Đang cập nhật', 'Phiên bản nâng cấp từ 1050'),
(8, 'MSI GeForce GTX 1650 SUPER GAMING X 4GB', 'món', 0, 8490000, 100, 4, 0, 'GTX 1650 super', 'MSI', 'Đài Loan', 'Mới', 'Đang cập nhật', 'Card chuyên dụng cho gaming');

-- --------------------------------------------------------

--
-- Table structure for table `hinhhanghoa`
--

CREATE TABLE `hinhhanghoa` (
  `MaHinh` int(11) NOT NULL,
  `TenHinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MSHH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hinhhanghoa`
--

INSERT INTO `hinhhanghoa` (`MaHinh`, `TenHinh`, `MSHH`) VALUES
(1, 'asus-tuf-gaming-b460m-pro.png', 1),
(2, 'msi-mag-b560m-mortar-wifi.png', 2),
(3, 'amd-ryzen-5-3600.png', 3),
(4, 'intel-core-i7-10700.png', 4),
(5, 'ram-kingston-hyperx-fury-black.png', 5),
(6, 'ram-g-kill-trident-z-rgb.png', 6),
(7, 'gigabyte-geforce-gtx-1050-ti-d5-4gb.png', 7),
(8, 'msi-gtx-1650-super-gaming-x-4gb.png', 8);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` int(11) NOT NULL,
  `TaiKhoanKH` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhauKH` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HoTenKH` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenCongTy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoDienThoai` int(11) NOT NULL,
  `SoFax` int(11) DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DOB` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `BeUToken` int(11) NOT NULL,
  `LuotChoi` int(11) NOT NULL,
  `googleID` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `TaiKhoanKH`, `MatKhauKH`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `SoFax`, `Email`, `DOB`, `GioiTinh`, `BeUToken`, `LuotChoi`, `googleID`) VALUES
(1, 'Quoc', 'Quoc123', 'Quốc Nguyễn', 'Thanh Company', 123, 0, 'quoc@gmail.com', '22/11/2000', 'Nam', 0, 0, ''),
(2, 'Bun', 'Bun321', 'Bún Măng', NULL, 321, NULL, 'Bunsx@gmail.com', '27/12/2000', 'Nữ', 0, 0, ''),
(3, 'Thanh', 'Thanh964594', 'Nguyễn Đình Thanh', NULL, 767732712, NULL, 'qsczsemko@gmail.com', '27/12/2000', 'Nam', 0, 0, ''),
(26, 'ChucThay', 'ThayTrungnumber1', 'Ngày mới tốt lành', NULL, 918058139, NULL, 'thanhb1805813@student.ctu.edu.vn', '2021-11-27', 'Nam', 0, 0, ''),
(27, 'NguyenDinhThanh', '', 'Nguyen Thanh', NULL, 2712, NULL, 'qsczsemko@gmail.com', '', '', 0, 0, '105790192457968582917');

-- --------------------------------------------------------

--
-- Table structure for table `lichsutimkiem`
--

CREATE TABLE `lichsutimkiem` (
  `MaLichSu` int(11) NOT NULL,
  `MSKH` int(11) NOT NULL,
  `LichSu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lichsutimkiem`
--

INSERT INTO `lichsutimkiem` (`MaLichSu`, `MSKH`, `LichSu`) VALUES
(1, 1, 'Mainboard B360'),
(2, 1, 'Ram 8gb'),
(3, 1, 'VGA 1080'),
(7, 1, 'mainboard'),
(8, 1, 'mainboard'),
(9, 1, 'led RGB'),
(10, 1, 'led'),
(11, 1, 'led'),
(12, 1, 'led'),
(13, 1, 'ram 8gb'),
(14, 1, 'ram 8gb'),
(15, 26, 'led'),
(16, 26, 'led'),
(17, 26, 'led'),
(18, 26, 'led'),
(19, 26, 'led'),
(20, 26, 'ram 8gb'),
(21, 26, 'led rgb'),
(22, 26, 'ram 8gb'),
(23, 26, 'led rgb'),
(24, 26, 'ram 8gb'),
(25, 26, 'led rgb'),
(26, 1, 'Led RGB'),
(27, 1, 'ram'),
(28, 1, 'core'),
(29, 1, 'ry'),
(30, 1, 'amd');

-- --------------------------------------------------------

--
-- Table structure for table `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` int(11) NOT NULL,
  `TenLoaiHang` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
(1, 'Chip'),
(2, 'MainBoard'),
(3, 'Ram'),
(4, 'VGA'),
(8, 'CPU'),
(9, 'Monitor');

-- --------------------------------------------------------

--
-- Table structure for table `loaivoucher`
--

CREATE TABLE `loaivoucher` (
  `MaLoai` int(11) NOT NULL,
  `TenLoaiVoucher` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaivoucher`
--

INSERT INTO `loaivoucher` (`MaLoai`, `TenLoaiVoucher`) VALUES
(1, 'Voucher trừ %'),
(2, 'Voucher trừ thẳng'),
(3, 'Voucher FreeShip 30k');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` int(11) NOT NULL,
  `TaiKhoanNV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhauNV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HoTenNV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ChucVu` int(11) NOT NULL DEFAULT 3,
  `DiaChi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoDienThoai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `TaiKhoanNV`, `MatKhauNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`) VALUES
(0, 'HT', 'HTBeUSTORE@5813', 'HT', 0, 'HT', 0),
(1, 'Admin', 'Admin', 'Admin', 1, 'Admin', 113),
(2, 'Thanh', 'Thanh123', 'Nguyễn Đình Thanh', 2, 'Cần Thơ', 964594),
(4, 'ThayTrungAdmin', 'ThayTrungAdmin', 'Thầy Trung', 1, 'Cần Thơ', 118058130),
(5, 'nghia', 'nghia', 'Trần Nhân Nghĩa', 1, 'Cần Thơ', 939635755);

-- --------------------------------------------------------

--
-- Table structure for table `phuongthucthanhtoan`
--

CREATE TABLE `phuongthucthanhtoan` (
  `MaPT` int(11) NOT NULL,
  `TenPT` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phuongthucthanhtoan`
--

INSERT INTO `phuongthucthanhtoan` (`MaPT`, `TenPT`) VALUES
(1, 'Thanh toán khi nhận '),
(2, 'Chuyển khoản ngân hà');

-- --------------------------------------------------------

--
-- Table structure for table `sanphamyeuthich`
--

CREATE TABLE `sanphamyeuthich` (
  `MSKH` int(11) NOT NULL,
  `MSHH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanphamyeuthich`
--

INSERT INTO `sanphamyeuthich` (`MSKH`, `MSHH`) VALUES
(1, 2),
(1, 8),
(2, 2),
(2, 5),
(2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `MSVoucher` int(11) NOT NULL,
  `LoaiVoucher` int(11) NOT NULL,
  `TenVoucher` varchar(20) NOT NULL,
  `Token` int(11) NOT NULL,
  `GiaTri` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`MSVoucher`, `LoaiVoucher`, `TenVoucher`, `Token`, `GiaTri`) VALUES
(1, 1, 'Voucher 5%', 10, 5),
(2, 1, 'Voucher 10%', 25, 10),
(3, 1, 'Voucher 15%', 45, 15),
(4, 1, 'Voucher 20%', 70, 20),
(5, 1, 'Voucher 25%', 100, 25),
(6, 1, 'Voucher 30%', 135, 30),
(7, 1, 'Voucher 35%', 175, 35),
(8, 1, 'Voucher 40%', 220, 40),
(9, 1, 'Voucher 45%', 270, 45),
(10, 1, 'Voucher 50%', 325, 50),
(11, 3, 'Freeship', 5, 30),
(12, 3, 'Freeship * 3', 20, 30),
(13, 2, 'Voucher 50k', 10, 50),
(14, 2, 'Voucher 100k', 20, 100),
(15, 2, 'Voucher 200k', 40, 200),
(16, 2, 'Voucher 500k', 100, 500);

-- --------------------------------------------------------

--
-- Table structure for table `voucherkh`
--

CREATE TABLE `voucherkh` (
  `MSKH` int(11) NOT NULL,
  `MSVoucher` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voucherkh`
--

INSERT INTO `voucherkh` (`MSKH`, `MSVoucher`, `SoLuong`) VALUES
(1, 2, 1),
(1, 11, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`MaChiTiet`),
  ADD KEY `SoDonDH` (`SoDonDH`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Indexes for table `chitietnhaphang`
--
ALTER TABLE `chitietnhaphang`
  ADD PRIMARY KEY (`SoDonNhapHang`),
  ADD KEY `MSHH` (`MSHH`),
  ADD KEY `MSNV` (`MSNV`);

--
-- Indexes for table `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `TaiKhoanKH` (`TaiKhoanKH`),
  ADD KEY `MSNV` (`MSNV`),
  ADD KEY `PTThanhToan` (`PTThanhToan`);

--
-- Indexes for table `diachikh`
--
ALTER TABLE `diachikh`
  ADD PRIMARY KEY (`MaDC`),
  ADD KEY `MSKH` (`MSKH`);

--
-- Indexes for table `diemgame`
--
ALTER TABLE `diemgame`
  ADD KEY `MSKH` (`MSKH`),
  ADD KEY `MaGame` (`MaGame`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`MaGame`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MaGio`),
  ADD KEY `TaiKhoanKH` (`TaiKhoanKH`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Indexes for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `MaLoaiHang` (`MaLoaiHang`);

--
-- Indexes for table `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD PRIMARY KEY (`MaHinh`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`),
  ADD UNIQUE KEY `TaiKhoanKH` (`TaiKhoanKH`);

--
-- Indexes for table `lichsutimkiem`
--
ALTER TABLE `lichsutimkiem`
  ADD PRIMARY KEY (`MaLichSu`),
  ADD KEY `MSKH` (`MSKH`);

--
-- Indexes for table `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Indexes for table `loaivoucher`
--
ALTER TABLE `loaivoucher`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- Indexes for table `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  ADD PRIMARY KEY (`MaPT`);

--
-- Indexes for table `sanphamyeuthich`
--
ALTER TABLE `sanphamyeuthich`
  ADD KEY `MSKH` (`MSKH`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`MSVoucher`),
  ADD KEY `LoaiVoucher` (`LoaiVoucher`);

--
-- Indexes for table `voucherkh`
--
ALTER TABLE `voucherkh`
  ADD KEY `MSKH` (`MSKH`),
  ADD KEY `vouckh_ibfk_2` (`MSVoucher`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  MODIFY `MaChiTiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `chitietnhaphang`
--
ALTER TABLE `chitietnhaphang`
  MODIFY `SoDonNhapHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `diachikh`
--
ALTER TABLE `diachikh`
  MODIFY `MaDC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `MaGame` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MaGio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `MSHH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  MODIFY `MaHinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MSKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `lichsutimkiem`
--
ALTER TABLE `lichsutimkiem`
  MODIFY `MaLichSu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  MODIFY `MaLoaiHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MSNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  MODIFY `MaPT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `MSVoucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `chitietdathang_ibfk_1` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`),
  ADD CONSTRAINT `chitietdathang_ibfk_2` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);

--
-- Constraints for table `chitietnhaphang`
--
ALTER TABLE `chitietnhaphang`
  ADD CONSTRAINT `chitietnhaphang_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`),
  ADD CONSTRAINT `chitietnhaphang_ibfk_2` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`);

--
-- Constraints for table `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`TaiKhoanKH`) REFERENCES `khachhang` (`TaiKhoanKH`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dathang_ibfk_3` FOREIGN KEY (`PTThanhToan`) REFERENCES `phuongthucthanhtoan` (`MaPT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `diachikh`
--
ALTER TABLE `diachikh`
  ADD CONSTRAINT `diachikh_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`);

--
-- Constraints for table `diemgame`
--
ALTER TABLE `diemgame`
  ADD CONSTRAINT `diemgame_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`),
  ADD CONSTRAINT `diemgame_ibfk_2` FOREIGN KEY (`MaGame`) REFERENCES `game` (`MaGame`);

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);

--
-- Constraints for table `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihanghoa` (`MaLoaiHang`);

--
-- Constraints for table `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD CONSTRAINT `hinhhanghoa_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);

--
-- Constraints for table `lichsutimkiem`
--
ALTER TABLE `lichsutimkiem`
  ADD CONSTRAINT `lichsutimkiem_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`);

--
-- Constraints for table `sanphamyeuthich`
--
ALTER TABLE `sanphamyeuthich`
  ADD CONSTRAINT `sanphamyeuthich_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`),
  ADD CONSTRAINT `sanphamyeuthich_ibfk_2` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`);

--
-- Constraints for table `voucher`
--
ALTER TABLE `voucher`
  ADD CONSTRAINT `voucher_ibfk_1` FOREIGN KEY (`LoaiVoucher`) REFERENCES `loaivoucher` (`MaLoai`);

--
-- Constraints for table `voucherkh`
--
ALTER TABLE `voucherkh`
  ADD CONSTRAINT `voucherkh_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `voucherkh_ibfk_2` FOREIGN KEY (`MSVoucher`) REFERENCES `voucher` (`MSVoucher`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
