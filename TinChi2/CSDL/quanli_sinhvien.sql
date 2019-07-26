-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 29, 2014 at 02:20 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quanli_sinhvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `newsv`
--

CREATE TABLE IF NOT EXISTS `newsv` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ho` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gioiTinh` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `masv` varchar(20) NOT NULL,
  `nganh` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lop` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(255) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `ngaysinh` varchar(20) NOT NULL,
  `thanhPho` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `khoa` int(11) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `newsv`
--

INSERT INTO `newsv` (`sott`, `ho`, `ten`, `gioiTinh`, `masv`, `nganh`, `lop`, `matkhau`, `ngaysinh`, `thanhPho`, `khoa`) VALUES
(13, 'Nguyễn Đình ', 'Tạo', 'Nam', '361050001', 'Công Nghệ Thông Tin', 'CNTT 36', '25/5/1995', '25/5/1995', 'Bình Định', 36),
(14, 'Trần Quốc ', 'Tiến', 'Nam', '361050002', 'Công Nghệ Thông Tin', 'CNTT 36', '5/9/1994', '5/9/1994', 'Bình Định', 36),
(15, 'Thân Thanh ', 'Tỉnh', 'Nam', '361050003', 'Công Nghệ Thông Tin', 'CNTT 36', '10/1/1995', '10/1/1995', 'Bình Định', 36),
(16, 'Nguyễn Ngọc ', 'Toại', 'Nam', '361050004', 'Công Nghệ Thông Tin', 'CNTT 36', '5/8/1994', '5/8/1994', 'Bình Định', 36),
(17, 'Hồ Văn ', 'Tú', 'Nam', '361050005', 'Công Nghệ Thông Tin', 'CNTT 36', '7/10/1995', '7/10/1995', 'Bình Định', 36),
(18, 'Đõ Thanh ', 'Tùng', 'Nam', '361050006', 'Công Nghệ Thông Tin', 'CNTT 36', '7/10/1995', '7/10/1995', 'Bình Định', 36),
(19, 'Trương Công ', 'Thành', 'Nam', '361050007', 'Công Nghệ Thông Tin', 'CNTT 36', '7/1/1995', '7/1/1995', 'Bình Định', 36),
(20, 'Nguyễn Tư ', 'Thiên', 'Nam', '361050008', 'Công Nghệ Thông Tin', 'CNTT 36', '7/5/1995', '7/5/1995', 'Bình Định', 36),
(21, 'Trương Văn ', 'Thiện', 'Nam', '361050009', 'Công Nghệ Thông Tin', 'CNTT 36', '8/10/1995', '8/10/1995', 'Đắk Lắk', 36),
(22, 'Nguyễn Văn ', 'Thủy', 'Nam', '361050010', 'Công Nghệ Thông Tin', 'CNTT 36', '11/10/1995', '11/10/1995', 'Quảng Nam', 36);

-- --------------------------------------------------------

--
-- Table structure for table `thongtin`
--

CREATE TABLE IF NOT EXISTS `thongtin` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ho` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `masv` varchar(20) NOT NULL,
  `nganh` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lop` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(255) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `ngaysinh` varchar(20) NOT NULL,
  `hokhau` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `khoa` int(11) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `thongtin`
--

INSERT INTO `thongtin` (`sott`, `ho`, `ten`, `masv`, `nganh`, `lop`, `matkhau`, `ngaysinh`, `hokhau`, `khoa`) VALUES
(1, '', 'sfsd', '38105001', 'Công Nghệ Thông Tin', 'CNTT K38', '12/3/1995', '12/3/1995', 'An Giang', 38),
(2, '', 'sfsd', '38105001', 'Công Nghệ Thông Tin', '', '12/3/1995', '12/3/1995', 'An Giang', 38),
(3, 'nguyen van ', 'teo', '37105001', 'Công Nghệ Thông Tin', 'CNTT K37', '25/5/1995', '25/5/1995', 'An Giang', 37);

-- --------------------------------------------------------

--
-- Table structure for table `tinhvatp`
--

CREATE TABLE IF NOT EXISTS `tinhvatp` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tenTP` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `vitri` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `tinhvatp`
--

INSERT INTO `tinhvatp` (`sott`, `tenTP`, `vitri`) VALUES
(1, 'An Giang', 'Miền Nam'),
(2, 'Bà Rịa - Vũng Tàu', 'Miền Nam'),
(3, 'Bắc Giang', 'Miền Bắc'),
(4, 'Bắc Kạn', 'Miền Bắc'),
(5, 'Bạc Liêu', 'Miền Nam'),
(6, 'Bắc Ninh', 'Miền Bắc'),
(7, 'Bến Tre', 'Miền Nam'),
(8, 'Bình Định', 'Miền Trung'),
(9, 'Bình Dương', 'Miền Nam'),
(10, 'Bình Phước', 'Miền Nam'),
(11, 'Bình Thuận', 'Miền Nam'),
(12, 'Cà Mau', 'Miền Nam'),
(13, 'Cao Bằng', 'Miền Bắc'),
(14, 'Đắk Lắk', 'Tây Nguyên'),
(15, 'Đắk Nông', 'Tây Nguyên'),
(16, 'Điện Biên', 'Miền Bắc'),
(17, 'Đồng Nai', 'Miền Nam'),
(18, 'Đồng Tháp', 'Miền Nam'),
(19, 'Gia Lai', 'Tây Nguyên'),
(20, 'Hà Giang', 'Miền Bắc'),
(21, 'Quảng Nam', 'Miền Trung'),
(22, 'Quảng Ngãi', 'Miền Trung'),
(23, 'Quảng Ninh', 'Miền Bắc'),
(24, 'Quảng Trị', 'Miền Trung'),
(25, 'Sóc Trăng', 'Miền Nam'),
(26, 'Sơn La', 'Miền Bắc'),
(27, 'Tây Ninh', 'Miền Nam'),
(28, 'Thái Bình', 'Miền Bắc'),
(29, 'Thái Nguyên', 'Miền Bắc'),
(30, 'Thanh Hóa', 'Miền Trung'),
(31, 'Thừa Thiên Huế', 'Miền Trung'),
(32, 'Tiền Giang', 'Miền Nam'),
(33, 'Trà Vinh', 'Miền Nam'),
(34, 'Tuyên Quang', 'Miền Bắc'),
(35, 'Vĩnh Long', 'Miền Nam'),
(36, 'Vĩnh Phúc', 'Miền Bắc'),
(37, 'Yên Bái', 'Miền Bắc'),
(38, 'Phú Yên', 'Miền Trung'),
(39, 'Hà Nam', 'Miền Bắc'),
(40, 'Hà Tỉnh', 'Miền Trung'),
(41, 'Hải Dương', 'Miền Bắc'),
(42, 'Hậu Giang', 'Miền Nam'),
(43, 'Hòa Bình', 'Miền Bắc'),
(44, 'Hưng Yên', 'Miền Bắc'),
(45, 'Khánh Hòa', 'Miền Trung'),
(46, 'Kiên Giang', 'Miền Nam'),
(47, 'Kon Tum', 'Tây Nguyên'),
(48, 'Lai Châu', 'Miền Bắc'),
(49, 'Lâm Đồng', 'Tây Nguyên'),
(50, 'Lạng Sơn', 'Miền Bắc'),
(51, 'Lào Cai', 'Miền Bắc'),
(52, 'Long An', 'Miền Nam'),
(53, 'Nam Định', 'Miền Trung'),
(54, 'Nghệ An', 'Miền Trung'),
(55, 'Ninh Bình', 'Miền Trung'),
(56, 'Ninh Thuận', 'Miền Nam'),
(57, 'Phú Thọ', 'Miền Bắc'),
(58, 'Quảng Bình', 'Miền Trung'),
(59, 'Cần Thơ', 'Miền Nam'),
(60, 'Đà Nẵng', 'Miền Trung'),
(61, 'Hải Phòng', 'Miền Bắc'),
(62, 'Hà Nội', 'Miền Bắc'),
(63, 'TP HCM', 'Miền Nam');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
