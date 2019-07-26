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
-- Database: `quanli_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `phonghoc`
--

CREATE TABLE IF NOT EXISTS `phonghoc` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phong` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dayPhong` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lopHP` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `ghiChu` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `phonghoc`
--

INSERT INTO `phonghoc` (`sott`, `phong`, `dayPhong`, `lopHP`, `ghiChu`) VALUES
(1, 'A1-101', 'A1', NULL, 'Có Máy Chiếu'),
(2, 'A1-102', 'A1', NULL, 'Có Máy Chiếu'),
(3, 'A1-103', 'A1', NULL, 'Có Máy Chiếu'),
(4, 'A1-104', 'A1', NULL, 'Có Máy Chiếu'),
(5, 'A1-105', 'A1', NULL, 'Có Máy Chiếu'),
(6, 'A1-106', 'A1', NULL, 'Có Máy Chiếu'),
(7, 'A1-107', 'A1', NULL, 'Có Máy Chiếu'),
(8, 'A1-108', 'A1', NULL, 'Có Máy Chiếu'),
(9, 'A1-109', 'A1', NULL, NULL),
(10, 'A1-110', 'A1', NULL, NULL),
(11, 'A2-101', 'A2', NULL, 'Có Máy Chiếu'),
(12, 'A2-102', 'A2', NULL, 'Có Máy Chiếu'),
(13, 'A2-103', 'A2', NULL, 'Có Máy Chiếu'),
(14, 'A2-104', 'A2', NULL, 'Có Máy Chiếu'),
(15, 'A2-105', 'A2', NULL, 'Có Máy Chiếu'),
(16, 'A2-106', 'A2', NULL, 'Có Máy Chiếu'),
(17, 'A2-107', 'A2', NULL, 'Có Máy Chiếu'),
(18, 'Sân Thể Dục 1', 'Nhà Thể Thao', NULL, 'Có Sân Bóng Chuyền, Sân Bóng Đá'),
(19, 'Sân Thể Dục 2', 'Nhà Thể Thao', NULL, 'Có Sân Cầu Lông, Sân Bóng Bàn'),
(20, 'Phòng Thực Hành 1', 'A9', NULL, 'Có 48 máy tính, có máy chiếu'),
(21, 'Phòng Thực Hành 2', 'A9', NULL, 'Có 69 máy tính, có máy chiếu'),
(22, 'Phòng Thực Hành 3', 'A9', NULL, 'Có 69 máy tính, có máy chiếu');

-- --------------------------------------------------------

--
-- Table structure for table `quantri`
--

CREATE TABLE IF NOT EXISTS `quantri` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(50) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `matkhau` varchar(50) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `ten` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diachi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `chucvu` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngayquantri` date NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `quantri`
--

INSERT INTO `quantri` (`sott`, `user`, `matkhau`, `ten`, `ngaysinh`, `diachi`, `chucvu`, `ngayquantri`) VALUES
(1, 'Admin1', '123456', 'Nguyễn Đình Tạo', '25/5/1995', '212 Hoàng Văn Thụ', 'Sinh Viên', '2015-10-15'),
(2, 'Admin2', '123456', 'Ronaldo', '30/6/1995', 'Bồ Đào Nha', 'Phó Giám Đốc', '2015-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `tailieu`
--

CREATE TABLE IF NOT EXISTS `tailieu` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tenFile` varchar(240) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maFile` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `LoaiFile` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dungLuong` float unsigned NOT NULL,
  `moTa` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `giaoVien` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thoiGian` varchar(50) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `tailieu`
--

INSERT INTO `tailieu` (`sott`, `tenFile`, `maFile`, `LoaiFile`, `dungLuong`, `moTa`, `giaoVien`, `thoiGian`) VALUES
(29, 'Hướng Dẫn Xây Dựng Website', '1107001', 'PDF', 0.595356, 'Hướng Dẫn Xây Dựng Website, NXB TPHCM', '1107', '15/11/2015'),
(30, 'Huong dan nhap mon HTML', '1107002', 'DOC', 0.78418, 'Huong dan nhap mon HTML , sách hay , kho tìm thấy', '1107', '15/11/2015'),
(31, 'lập trình C từ cơ bản đến nâng cao', '1107003', 'PDF', 1.8366, 'lap_trinh_c_tu_co_ban_den_nang_cao.pdf', '1107', '15/11/2015'),
(32, 'Tự Học Javascrips ', '1107004', 'PDF', 14.9819, 'Javascrips.pdf', '1107', '15/11/2015'),
(33, 'Giao trinh thiet ke web', '1107005', 'PDF', 0.735835, 'Giao trinh thiet ke web.pdf', '1107', '15/11/2015'),
(34, '4The C programming Language', '1107006', 'PDF', 0.562484, '4The C programming Language', '1107', '15/11/2015'),
(35, 'Beginning Ubuntu Linux 5th Edition', '1107007', 'PDF', 17.902, 'Beginning Ubuntu Linux 5th Edition', '1107', '15/11/2015'),
(36, 'zcarte-ref-Ubuntu-vi', '1107008', 'PDF', 0.133773, 'Tóm tắt lệnh Linux', '1107', '15/11/2015'),
(37, 'giao_trinh_he_dieu_hanh_unix_va_linux', '1107009', 'PDF', 1.55441, 'giao_trinh_he_dieu_hanh_unix_va_linux.pdf', '1107', '15/11/2015'),
(38, 'Tiếng Anh chuyên ngành Tin Học', '1402001', 'PDF', 4.74653, 'Tieng anh chuyen nganh.pdf', '1402', '15/11/2015'),
(39, 'check_your_english_vocabulary_for_computer_and_information_technology', '1402002', 'PDF', 1.26108, 'check_your_english_vocabulary_for_computer_and_information_technology.pdf', '1402', '15/11/2015'),
(40, 'Tiếng Anh chuyên ngành Tin Học Bài Tập', '1402003', 'PDF', 1.0567, 'check_your_english_vocabu', '1402', '15/11/2015'),
(41, 'Bài Giảng Đồ Họa Máy Tính', '1107010', 'RAR', 0.000871658, 'dfgd', '1107', '16/11/2015'),
(42, 'Bài Giảng Đồ Họa Máy Tính 2', '1107011', 'ZIP', 11.5372, 'fg', '1107', '16/11/2015'),
(43, 'Bài Giảng Đồ Họa Máy Tính 3', '1107012', 'PPTX', 0.816613, '6465', '1107', '16/11/2015'),
(44, 'fdfdfdfdf', '1107013', 'DOCX', 0.033536, 'fdfdf', '1107', '17/11/2015'),
(45, 'fcxvcvcvc', '1107014', 'PPT', 1.05908, 'xcvxc', '1107', '17/11/2015');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
