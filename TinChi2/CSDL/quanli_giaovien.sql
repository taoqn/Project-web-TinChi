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
-- Database: `quanli_giaovien`
--

-- --------------------------------------------------------

--
-- Table structure for table `1107`
--

CREATE TABLE IF NOT EXISTS `1107` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `dsMon` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `maHP` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `soTC` int(11) DEFAULT NULL,
  `hocKy` int(11) DEFAULT NULL,
  `T2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T4` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T5` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T6` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T7` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phong` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `toiDa` int(11) DEFAULT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `thoiGian` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `1107`
--

INSERT INTO `1107` (`sott`, `dsMon`, `maHP`, `soTC`, `hocKy`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `phong`, `toiDa`, `soLuong`, `thoiGian`) VALUES
(2, 'Lập trình cơ bản', '105004110701', 4, 2, '1-4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 75, 0, NULL),
(3, 'Thiết kế Web', '105003110701', 2, 2, '6-9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 75, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `1108`
--

CREATE TABLE IF NOT EXISTS `1108` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `dsMon` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `maHP` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `soTC` int(11) DEFAULT NULL,
  `hocKy` int(11) DEFAULT NULL,
  `T2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T4` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T5` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T6` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T7` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phong` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `toiDa` int(11) DEFAULT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `thoiGian` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `1108`
--

INSERT INTO `1108` (`sott`, `dsMon`, `maHP`, `soTC`, `hocKy`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `phong`, `toiDa`, `soLuong`, `thoiGian`) VALUES
(2, 'Thực hành máy tính', '105002110801', 2, 2, NULL, NULL, '1-4', NULL, NULL, NULL, NULL, NULL, 75, 3, NULL),
(3, 'Tin Học Đại Cương', '105001110801', 3, 1, NULL, NULL, '6-7', '1-2', NULL, NULL, NULL, NULL, 75, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `1201`
--

CREATE TABLE IF NOT EXISTS `1201` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `dsMon` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `maHP` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `soTC` int(11) DEFAULT NULL,
  `hocKy` int(11) DEFAULT NULL,
  `T2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T4` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T5` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T6` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T7` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phong` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `toiDa` int(11) DEFAULT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `thoiGian` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `1201`
--

INSERT INTO `1201` (`sott`, `dsMon`, `maHP`, `soTC`, `hocKy`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `phong`, `toiDa`, `soLuong`, `thoiGian`) VALUES
(2, 'Đại số số học', '107005120101', 3, 2, NULL, '1-4', NULL, NULL, NULL, NULL, NULL, NULL, 75, 0, NULL),
(4, 'Đại số tuyến tính và Hình giải tích', '107003120101', 3, 1, NULL, NULL, NULL, NULL, '1-4', NULL, NULL, NULL, 75, 3, NULL),
(5, 'Giải tích 1', '107001120101', 3, 1, NULL, '6-9', NULL, NULL, NULL, NULL, NULL, NULL, 75, 3, NULL),
(6, 'Vật lý đại cương', '107004120101', 3, 1, NULL, NULL, '8-9', '3-4', NULL, NULL, NULL, NULL, 75, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `1302`
--

CREATE TABLE IF NOT EXISTS `1302` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `dsMon` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `maHP` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `soTC` int(11) DEFAULT NULL,
  `hocKy` int(11) DEFAULT NULL,
  `T2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T4` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T5` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T6` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T7` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phong` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `toiDa` int(11) DEFAULT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `thoiGian` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `1302`
--

INSERT INTO `1302` (`sott`, `dsMon`, `maHP`, `soTC`, `hocKy`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `phong`, `toiDa`, `soLuong`, `thoiGian`) VALUES
(2, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1', '106001130209', 2, 1, '1-4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 200, 0, NULL),
(3, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1', '106001130210', 2, 1, '6-9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 200, 0, NULL),
(4, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1', '106001130207', 2, 1, NULL, '1-4', NULL, NULL, NULL, NULL, NULL, NULL, 200, 0, NULL),
(5, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1', '106001130208', 2, 1, NULL, '6-9', NULL, NULL, NULL, NULL, NULL, NULL, 200, 0, NULL),
(6, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1', '106001130205', 2, 1, NULL, NULL, '1-4', NULL, NULL, NULL, NULL, NULL, 200, 0, NULL),
(7, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1', '106001130206', 2, 1, NULL, NULL, '6-9', NULL, NULL, NULL, NULL, NULL, 200, 0, NULL),
(8, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1', '106001130203', 2, 1, NULL, NULL, NULL, '1-4', NULL, NULL, NULL, NULL, 200, 0, NULL),
(9, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1', '106001130204', 2, 1, NULL, NULL, NULL, '6-9', NULL, NULL, NULL, NULL, 200, 3, NULL),
(10, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1', '106001130201', 2, 1, NULL, NULL, NULL, NULL, '1-4', NULL, NULL, NULL, 200, 0, NULL),
(11, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1', '106001130202', 2, 1, NULL, NULL, NULL, NULL, '6-9', NULL, NULL, NULL, 200, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `1402`
--

CREATE TABLE IF NOT EXISTS `1402` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `dsMon` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `maHP` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `soTC` int(11) DEFAULT NULL,
  `hocKy` int(11) DEFAULT NULL,
  `T2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T4` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T5` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T6` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T7` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phong` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `toiDa` int(11) DEFAULT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `thoiGian` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `1402`
--

INSERT INTO `1402` (`sott`, `dsMon`, `maHP`, `soTC`, `hocKy`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `phong`, `toiDa`, `soLuong`, `thoiGian`) VALUES
(2, 'Tiếng Anh 1', '101001140201', 3, 1, '1-4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 75, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `giaovien`
--

CREATE TABLE IF NOT EXISTS `giaovien` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tenGV` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maGV` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `khoa` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `chucVu` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaySinh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thanhPho` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `matKhau` varchar(50) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `giaovien`
--

INSERT INTO `giaovien` (`sott`, `tenGV`, `maGV`, `khoa`, `chucVu`, `ngaySinh`, `thanhPho`, `matKhau`) VALUES
(5, 'Trần Thiên Thành', '1108', 'Công Nghệ Thông Tin', 'Trưởng Khoa', '9/9/1950', 'Bình Định', '9/9/1950'),
(6, 'Lê Thị Liên', '1103', 'Công Nghệ Thông Tin', 'Giảng viên', '9/9/1970', 'Bình Định', '9/9/1970'),
(8, 'Lê Văn Hùng', '1104', 'Công Nghệ Thông Tin', 'Phó Khoa', '7/10/1965', 'Đắk Lắk', '7/10/1965'),
(9, 'Lê Văn Kiều', '1105', 'Công Nghệ Thông Tin', 'Phó Khoa', '7/10/1967', 'Đà Nẵng', '7/10/1967'),
(10, 'Nguyễn Thị Tuyết', '1107', 'Công Nghệ Thông Tin', 'Giảng viên', '7/10/1955', 'Bình Định', '7/10/1955'),
(11, 'Bùi Trọng Kiều', '1101', 'Công Nghệ Thông Tin', 'Giảng viên', '8/6/1966', 'Bình Định', '8/6/1966'),
(12, 'Lê Hữu Trọng', '1102', 'Công Nghệ Thông Tin', 'Giảng Viên', '8/9/1975', 'Quảng Nam', '8/9/1975'),
(13, 'Trần Văn Lợi', '1302', 'Văn', 'Trưởng Khoa', '8/12/1950', 'Bình Định', '8/12/1950'),
(14, 'Lê Đình Nam', '1301', 'Văn', 'Phó Khoa', '25/8/1964', 'Bình Định', '25/8/1964'),
(15, 'Lê Thị Mười', '1401', 'Ngoại Ngữ', 'Phó Khoa', '25/8/1964', 'Bình Phước', '25/8/1964'),
(16, 'Phạm Thị Tuyết', '1402', 'Ngoại Ngữ', 'Phó Khoa', '2/9/1964', 'Gia Lai', '2/9/1964'),
(18, 'Phạm Lê Nguyên', '1106', 'Công Nghệ Thông Tin', 'Phó Khoa', '4/8/1950', 'Bắc Kạn', '4/8/1950'),
(19, 'Phạm Nguyên Trường', '1201', 'Toán', 'Giảng Viên', '7/8/1959', 'Bình Dương', '7/8/1959'),
(20, 'Lê Nguyên Xuân', '1202', 'Toán', 'Giảng Viên', '6/9/1969', 'Bình Dương', '6/9/1969'),
(21, 'Lê Thị Ngà', '1203', 'Toán', 'Giảng Viên', '6/9/1969', 'Bình Dương', '6/9/1969'),
(22, 'Phạm Thị Xuân', '1204', 'Toán', 'Giảng Viên', '6/9/1977', 'Bến Tre', '6/9/1977'),
(23, 'Phạm Thị Xuân', '1403', 'Ngoại Ngữ', 'Giảng Viên', '7/7/1980', 'Điện Biên', '7/7/1980'),
(24, 'Nguyễn Thị Xuân', '1404', 'Ngoại Ngữ', 'Giảng Viên', '9/7/1980', 'Phú Thọ', '9/7/1980'),
(25, 'Lê Văn Hùng', '1405', 'Ngoại Ngữ', 'Trưởng Khoa', '25/8/1950', 'Đà Nẵng', '25/8/1950'),
(26, 'Lê Văn Vỹ', '1406', 'Ngoại Ngữ', 'Phó Khoa', '25/8/1951', 'Đắk Nông', '25/8/1951'),
(27, 'Phan Thị Lệ', '1407', 'Ngoại Ngữ', 'Phó Khoa', '25/8/1951', 'Bình Định', '25/8/1951'),
(28, 'Phan Thị Lệ Hằng', '1408', 'Ngoại Ngữ', 'Phó Khoa', '25/8/1951', 'Bình Định', '25/8/1951'),
(29, 'Mạnh Hồng Quang', '1409', 'Ngoại Ngữ', 'Phó Khoa', '25/8/1951', 'Bình Định', '25/8/1951'),
(30, 'Phạm Thế Thành', '1205', 'Toán', 'Trưởng Khoa', '15/8/1950', 'Điện Biên', '15/8/1950'),
(31, 'Phạm Thế Hùng', '1206', 'Toán', 'Phó Khoa', '15/8/1950', 'Đắk Lắk', '15/8/1950'),
(32, 'Phạm Thế Mạnh', '1207', 'Toán', 'Phó Khoa', '15/8/1950', 'Bình Định', '15/8/1950'),
(33, 'Mạnh Phạm', '1208', 'Toán', 'Giảng Viên', '15/8/1950', 'Bình Định', '15/8/1950'),
(34, 'Lê Hằng', '1209', 'Toán', 'Giảng Viên', '15/8/1950', 'Bình Định', '15/8/1950'),
(35, 'Phạm Thị Hồng', '1210', 'Toán', 'Giảng Viên', '15/8/1950', 'Bình Định', '15/8/1950');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
