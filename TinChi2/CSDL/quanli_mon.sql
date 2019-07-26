-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 29, 2014 at 02:19 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quanli_mon`
--

-- --------------------------------------------------------

--
-- Table structure for table `101001`
--

CREATE TABLE IF NOT EXISTS `101001` (
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
-- Dumping data for table `101001`
--

INSERT INTO `101001` (`sott`, `dsMon`, `maHP`, `soTC`, `hocKy`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `phong`, `toiDa`, `soLuong`, `thoiGian`) VALUES
(2, 'Tiếng Anh 1', '101001140201', 3, 1, '1-4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 75, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `105001`
--

CREATE TABLE IF NOT EXISTS `105001` (
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
-- Dumping data for table `105001`
--

INSERT INTO `105001` (`sott`, `dsMon`, `maHP`, `soTC`, `hocKy`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `phong`, `toiDa`, `soLuong`, `thoiGian`) VALUES
(2, 'Tin Học Đại Cương', '105001110801', 3, 1, NULL, NULL, '6-7', '1-2', NULL, NULL, NULL, NULL, 75, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `105002`
--

CREATE TABLE IF NOT EXISTS `105002` (
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
-- Dumping data for table `105002`
--

INSERT INTO `105002` (`sott`, `dsMon`, `maHP`, `soTC`, `hocKy`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `phong`, `toiDa`, `soLuong`, `thoiGian`) VALUES
(2, 'Thực hành máy tính', '105002110801', 2, 2, NULL, NULL, '1-4', NULL, NULL, NULL, NULL, NULL, 75, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `105003`
--

CREATE TABLE IF NOT EXISTS `105003` (
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
-- Dumping data for table `105003`
--

INSERT INTO `105003` (`sott`, `dsMon`, `maHP`, `soTC`, `hocKy`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `phong`, `toiDa`, `soLuong`, `thoiGian`) VALUES
(2, 'Thiết kế Web', '105003110701', 2, 2, '6-9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 75, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `105004`
--

CREATE TABLE IF NOT EXISTS `105004` (
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
-- Dumping data for table `105004`
--

INSERT INTO `105004` (`sott`, `dsMon`, `maHP`, `soTC`, `hocKy`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `phong`, `toiDa`, `soLuong`, `thoiGian`) VALUES
(2, 'Lập trình cơ bản', '105004110701', 4, 2, '1-4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 75, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `106001`
--

CREATE TABLE IF NOT EXISTS `106001` (
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
-- Dumping data for table `106001`
--

INSERT INTO `106001` (`sott`, `dsMon`, `maHP`, `soTC`, `hocKy`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `phong`, `toiDa`, `soLuong`, `thoiGian`) VALUES
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
-- Table structure for table `107001`
--

CREATE TABLE IF NOT EXISTS `107001` (
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
-- Dumping data for table `107001`
--

INSERT INTO `107001` (`sott`, `dsMon`, `maHP`, `soTC`, `hocKy`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `phong`, `toiDa`, `soLuong`, `thoiGian`) VALUES
(3, 'Giải tích 1', '107001120101', 3, 1, NULL, '6-9', NULL, NULL, NULL, NULL, NULL, NULL, 75, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `107003`
--

CREATE TABLE IF NOT EXISTS `107003` (
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
-- Dumping data for table `107003`
--

INSERT INTO `107003` (`sott`, `dsMon`, `maHP`, `soTC`, `hocKy`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `phong`, `toiDa`, `soLuong`, `thoiGian`) VALUES
(2, 'Đại số tuyến tính và Hình giải tích', '107003120101', 3, 1, NULL, NULL, NULL, NULL, '1-4', NULL, NULL, NULL, 75, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `107004`
--

CREATE TABLE IF NOT EXISTS `107004` (
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
-- Dumping data for table `107004`
--

INSERT INTO `107004` (`sott`, `dsMon`, `maHP`, `soTC`, `hocKy`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `phong`, `toiDa`, `soLuong`, `thoiGian`) VALUES
(2, 'Vật lý đại cương', '107004120101', 3, 1, NULL, NULL, '8-9', '3-4', NULL, NULL, NULL, NULL, 75, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `107005`
--

CREATE TABLE IF NOT EXISTS `107005` (
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
-- Dumping data for table `107005`
--

INSERT INTO `107005` (`sott`, `dsMon`, `maHP`, `soTC`, `hocKy`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `phong`, `toiDa`, `soLuong`, `thoiGian`) VALUES
(2, 'Đại số số học', '107005120101', 3, 2, NULL, '1-4', NULL, NULL, NULL, NULL, NULL, NULL, 75, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ds_khoa`
--

CREATE TABLE IF NOT EXISTS `ds_khoa` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tenKhoa` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nganh` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maKhoa` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ds_khoa`
--

INSERT INTO `ds_khoa` (`sott`, `tenKhoa`, `nganh`, `maKhoa`) VALUES
(1, 'Công Nghệ Thông Tin', '105-104', '11'),
(2, 'Toán', '107-109', '12'),
(3, 'Văn', '106-110', '13'),
(4, 'Ngoại Ngữ', '101-108', '14');

-- --------------------------------------------------------

--
-- Table structure for table `ds_mon`
--

CREATE TABLE IF NOT EXISTS `ds_mon` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `maMon` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tenMon` varchar(220) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soTC` int(10) unsigned NOT NULL,
  `HK` int(10) unsigned NOT NULL,
  `UuTien` varchar(220) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rangBuoc` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `khoa` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `ds_mon`
--

INSERT INTO `ds_mon` (`sott`, `maMon`, `tenMon`, `soTC`, `HK`, `UuTien`, `rangBuoc`, `khoa`) VALUES
(15, '106001', 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1', 2, 1, '106-105-101-104-107-109-110-108', NULL, 'Văn'),
(16, '106002', 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 2', 3, 3, '106-105-101-104-107-109-110-108', '106001', 'Văn'),
(17, '105001', 'Tin Học Đại Cương', 3, 1, '105-101-104-107-106-109-110-108', NULL, 'Công Nghệ Thông Tin'),
(18, '105002', 'Thực hành máy tính', 2, 2, '105-104', NULL, 'Công Nghệ Thông Tin'),
(19, '105003', 'Thiết kế Web', 2, 2, '105-104', NULL, 'Công Nghệ Thông Tin'),
(20, '105004', 'Lập trình cơ bản', 4, 2, '105-104', NULL, 'Công Nghệ Thông Tin'),
(21, '105005', 'Hệ quản trị cơ sở dữ liệu', 3, 3, '105-104', NULL, 'Công Nghệ Thông Tin'),
(22, '105006', 'Toán Logic', 2, 3, '105-104', NULL, 'Công Nghệ Thông Tin'),
(23, '105007', 'Toán rời rạc', 3, 3, '105-104', NULL, 'Công Nghệ Thông Tin'),
(24, '105008', 'Lập trình hướng đối tượng', 4, 3, '105-104', '105004', 'Công Nghệ Thông Tin'),
(26, '105009', 'Nhập môn thuật toán', 3, 4, '105-104', NULL, 'Công Nghệ Thông Tin'),
(27, '105010', 'Cấu trúc dữ liệu', 4, 4, '105-104', '105008', 'Công Nghệ Thông Tin'),
(28, '105011', 'Hệ điều hành Linux', 2, 4, '105-104', NULL, 'Công Nghệ Thông Tin'),
(29, '105012', 'Thực hành lập trình', 2, 4, '105-104', NULL, 'Công Nghệ Thông Tin'),
(30, '105013', 'Đồ họa máy tính', 3, 5, '105-104', NULL, 'Công Nghệ Thông Tin'),
(31, '105014', 'Nhập môn mạng máy tính', 3, 5, '105-104', NULL, 'Công Nghệ Thông Tin'),
(32, '105015', 'Lập trình ứng dụng web', 3, 5, '105-104', '105003', 'Công Nghệ Thông Tin'),
(33, '105016', 'Kiến trúc máy tính', 3, 5, '105-104', NULL, 'Công Nghệ Thông Tin'),
(34, '105017', 'Phân tích và thiết kế hệ thống thông tin', 3, 5, '105-104', NULL, 'Công Nghệ Thông Tin'),
(35, '105018', 'Nhập môn công nghệ phần mềm', 3, 5, '105-104', NULL, 'Công Nghệ Thông Tin'),
(36, '105019', 'Quản trị mạng máy tính', 3, 6, '105-104', NULL, 'Công Nghệ Thông Tin'),
(37, '105020', 'Nguyên lý hệ điều hành', 3, 6, '105-104', NULL, 'Công Nghệ Thông Tin'),
(38, '105021', 'Ngôn ngữ hình thức', 3, 6, '105-104', NULL, 'Công Nghệ Thông Tin'),
(39, '105022', 'Thực hành làm việc nhóm', 2, 6, '105-104', NULL, 'Công Nghệ Thông Tin'),
(40, '105023', 'Công Nghệ .NET', 4, 6, '105-104', NULL, 'Công Nghệ Thông Tin'),
(41, '105024', 'Nhập môn cơ sở dữ liệu', 3, 6, '105-104', NULL, 'Công Nghệ Thông Tin'),
(42, '106003', 'Tư tưởng Hồ Chí Minh', 2, 4, '106-105-101-104-107-109-110-108', '106002', 'Văn'),
(43, '106004', 'Đường lối cách mạng của Đảng Cộng sản Việt Nam', 3, 5, '106-105-101-104-107-109-110-108', '106003', 'Văn'),
(44, '107001', 'Giải tích 1', 3, 1, '107-105-101-104-109-108', NULL, 'Toán'),
(45, '107002', 'Giải tích 2', 3, 2, '107-105-101-104-109-108', '107001', 'Toán'),
(46, '107003', 'Đại số tuyến tính và Hình giải tích', 3, 1, '107-105-101-104-109-108', NULL, 'Toán'),
(47, '107004', 'Vật lý đại cương', 3, 1, '107-105-101-104-109-108', NULL, 'Toán'),
(48, '107005', 'Đại số số học', 3, 2, '107-105-101-104-109-108', NULL, 'Toán'),
(49, '107006', 'Toán Logic', 3, 2, '107-109', NULL, 'Toán'),
(50, '107007', 'Toán rời rạc', 4, 3, '107-109', NULL, 'Toán'),
(51, '107008', 'Xác suất thống kê', 3, 4, '107-105-101-104-109-108', NULL, 'Toán'),
(52, '101001', 'Tiếng Anh 1', 3, 1, '101-105-104-107-106-108-109-110', NULL, 'Ngoại Ngữ'),
(53, '101002', 'Tiếng Anh 2', 2, 2, '101-105-104-107-106-108-109-110', '101001', 'Ngoại Ngữ'),
(54, '101003', 'Tiếng Anh 3', 2, 3, '101-105-104-107-106-108-109-110', '101002', 'Ngoại Ngữ'),
(55, '106005', 'Tiếng Việt', 3, 2, '106-110', NULL, 'Văn'),
(56, '101004', 'Ngoại Ngữ I', 3, 4, '101-108', '', 'Ngoại Ngữ'),
(57, '101005', 'Ngoại Ngữ II', 4, 5, '101-108', '101004', 'Ngoại Ngữ'),
(58, '101006', 'Cơ sở văn hóa Việt Nam', 2, 2, '101-108', '', 'Ngoại Ngữ'),
(59, '101007', 'Ngôn ngữ học đối chiếu', 3, 2, '101-108', '', 'Ngoại Ngữ'),
(60, '101008', 'Phương Pháp nghiên cứu khóa học', 3, 3, '101-108', '', 'Ngoại Ngữ'),
(61, '101009', 'Logic Học', 4, 3, '101-108', '', 'Ngoại Ngữ'),
(62, '101010', 'Lịch sử văn minh Thế giới', 4, 3, '101-108', '', 'Ngoại Ngữ'),
(63, '101011', 'Luyện Âm', 3, 4, '101-108', '', 'Ngoại Ngữ'),
(64, '101012', 'Ngữ Pháp', 3, 4, '101-108', '', 'Ngoại Ngữ'),
(65, '101013', 'Văn hóa Anh', 3, 5, '101-108', '', 'Ngoại Ngữ'),
(66, '101014', 'Văn hóa Mỹ', 3, 5, '101-108', '', 'Ngoại Ngữ'),
(67, '101015', 'Ngữ âm học tiếng Anh', 3, 5, '101-108', '', 'Ngoại Ngữ'),
(68, '101016', 'Hình thái học tiếng Anh', 3, 5, '101-108', '', 'Ngoại Ngữ'),
(69, '101017', 'Ngữ nghĩa học tiếng Anh', 3, 5, '101-108', '', 'Ngoại Ngữ'),
(70, '101018', 'Cú pháp học tiếng Anh', 3, 5, '101-108', '', 'Ngoại Ngữ'),
(71, '101019', 'Văn học Anh', 3, 6, '101-108', '101013', 'Ngoại Ngữ'),
(72, '101020', 'Văn học Mỹ', 3, 6, '101-108', '101014', 'Ngoại Ngữ'),
(73, '101021', 'Luyện Nghe', 3, 6, '101-108', '', 'Ngoại Ngữ'),
(74, '101022', 'Luyện Nói', 3, 6, '101-108', '', 'Ngoại Ngữ'),
(75, '101023', 'Luyện Đọc', 3, 6, '101-108', '', 'Ngoại Ngữ'),
(76, '101024', 'Luyện Viết', 3, 6, '101-108', '', 'Ngoại Ngữ'),
(77, '101025', 'Nghiệp Vụ Giảng Dạy', 4, 7, '101', '', 'Ngoại Ngữ'),
(78, '101026', 'Giao tiếp và giao tiếp giao văn hóa', 4, 7, '101', '', 'Ngoại Ngữ'),
(79, '101027', 'Phân tích diễn ngôn', 4, 7, '101', '', 'Ngoại Ngữ'),
(80, '101028', 'Ngữ dụng học', 4, 7, '101', '', 'Ngoại Ngữ'),
(81, '101029', 'Rèn luyện nghiệp vụ', 4, 8, '101', '101025', 'Ngoại Ngữ'),
(82, '101030', 'Thực tập sư phạm', 8, 8, '101', '', 'Ngoại Ngữ'),
(83, '107009', 'Tập hợp Logic', 4, 1, '107-109', '', 'Toán'),
(84, '107010', 'Đại số tuyến tính và giải tích 1', 4, 2, '107-109', '', 'Toán'),
(85, '107011', 'Đại số tuyến tính và giải tích 2', 4, 3, '107-109', '107010', 'Toán'),
(86, '107012', 'Đại số tuyến tính và giải tích 3', 4, 4, '107-109', '107011', 'Toán'),
(87, '107013', 'Phương trình vi phân', 4, 2, '107-109', '', 'Toán'),
(88, '107014', 'Giải tích phức', 3, 2, '107-109', '', 'Toán'),
(89, '107015', 'Không gian metric và Không gian tô pô', 3, 3, '107-109', '', 'Toán'),
(90, '107016', 'Lý thuyết độ đo và tích phân', 3, 3, '107-109', '', 'Toán'),
(91, '107017', 'Đại số đại cương ', 3, 2, '107-109', '', 'Toán'),
(92, '107018', 'Vành đa thức và Mođun (Toán)', 4, 3, '107-109', '', 'Toán'),
(93, '107019', 'Số Học', 3, 2, '107-109', '', 'Toán'),
(94, '107020', 'Lý thuyết Galois ', 3, 3, '107-109', '', 'Toán'),
(95, '107021', 'Hình học Afin và Hình học Euclid', 4, 4, '107-109', '', 'Toán'),
(96, '107022', 'Hình học xạ ảnh', 4, 4, '107-109', '', 'Toán'),
(97, '107023', 'Hình học vi phân', 4, 4, '107-109', '107013', 'Toán'),
(98, '107024', 'Quy hoạch tuyến tính', 4, 4, '107-109', '', 'Toán'),
(99, '107025', 'Phương trình đạo hàm riêng', 4, 5, '107-109', '', 'Toán'),
(100, '107026', 'Ứng dụng tin học trong dạy học toán', 4, 5, '107-109', '', 'Toán');

-- --------------------------------------------------------

--
-- Table structure for table `ds_nganh`
--

CREATE TABLE IF NOT EXISTS `ds_nganh` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nganh` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rutgon` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ma` varchar(20) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ds_nganh`
--

INSERT INTO `ds_nganh` (`sott`, `nganh`, `rutgon`, `ma`) VALUES
(1, 'Công Nghệ Thông Tin', 'CNTT', '105'),
(2, 'Sư Phạm Văn', 'SPVAN', '106'),
(3, 'Sư Phạm Toán', 'SPTOAN', '107'),
(4, 'Sư Phạm Tin', 'SPTIN', '104'),
(5, 'Tổng Hợp Anh', 'THANH', '108'),
(6, 'Tổng Hợp Toán', 'THTOAN', '109'),
(7, 'Tổng Hợp Văn', 'THVAN', '110'),
(8, 'Sư Phạm Anh', 'SPANH', '101');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
