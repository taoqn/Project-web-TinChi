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
-- Database: `quanli_diem`
--

-- --------------------------------------------------------

--
-- Table structure for table `361050001`
--

CREATE TABLE IF NOT EXISTS `361050001` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Dsach` varchar(220) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maMon` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maHP` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `soTC` int(11) NOT NULL,
  `HK` int(11) NOT NULL,
  `T2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T4` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T5` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T6` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T7` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoigian` date DEFAULT NULL,
  `chuyenCan` float DEFAULT NULL,
  `giuaKy` float DEFAULT NULL,
  `cuoiKy` float DEFAULT NULL,
  `DTB` float DEFAULT NULL,
  `dangKy` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rangBuoc` varchar(240) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `loai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `361050001`
--

INSERT INTO `361050001` (`sott`, `Dsach`, `maMon`, `maHP`, `soTC`, `HK`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `thoigian`, `chuyenCan`, `giuaKy`, `cuoiKy`, `DTB`, `dangKy`, `rangBuoc`, `loai`) VALUES
(13, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1', '106001', '106001130204', 2, 1, '', '', '', '6-9', '', '', '', NULL, 10, 5, 6, 6.2, 'hoanThanh', '', 'HocKy-1'),
(14, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 2', '106002', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106001', NULL),
(15, 'Tin Học Đại Cương', '105001', '105001110801', 3, 1, '', '', '6-7', '1-2', '', '', '', NULL, 10, 1, 5, 4.7, 'hoanThanh', '', 'HocKy-1'),
(16, 'Thực hành máy tính', '105002', '105002110801', 2, 2, '', '', '1-4', '', '', '', '', NULL, 10, 5, 6, 6.2, 'hoanThanh', '', 'HocKy-1'),
(17, 'Thiết kế Web', '105003', '105003110701', 2, 2, '6-9', '', '', '', '', '', '', NULL, 8, 5.5, 6.6, 6.52, 'hoanThanh', '', 'HocKy-1'),
(18, 'Lập trình cơ bản', '105004', NULL, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(19, 'Hệ quản trị cơ sở dữ liệu', '105005', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(20, 'Toán Logic', '105006', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(21, 'Toán rời rạc', '105007', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(22, 'Lập trình hướng đối tượng', '105008', NULL, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105004', NULL),
(23, 'Nhập môn thuật toán', '105009', NULL, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(24, 'Cấu trúc dữ liệu', '105010', NULL, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105008', NULL),
(25, 'Hệ điều hành Linux', '105011', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(26, 'Thực hành lập trình', '105012', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(27, 'Đồ họa máy tính', '105013', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(28, 'Nhập môn mạng máy tính', '105014', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(29, 'Lập trình ứng dụng web', '105015', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105003', NULL),
(30, 'Kiến trúc máy tính', '105016', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(31, 'Phân tích và thiết kế hệ thống thông tin', '105017', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(32, 'Nhập môn công nghệ phần mềm', '105018', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(33, 'Quản trị mạng máy tính', '105019', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(34, 'Nguyên lý hệ điều hành', '105020', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(35, 'Ngôn ngữ hình thức', '105021', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(36, 'Thực hành làm việc nhóm', '105022', NULL, 2, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(37, 'Công Nghệ .NET', '105023', NULL, 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(38, 'Nhập môn cơ sở dữ liệu', '105024', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(39, 'Tư tưởng Hồ Chí Minh', '106003', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106002', NULL),
(40, 'Đường lối cách mạng của Đảng Cộng sản Việt Nam', '106004', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106003', NULL),
(41, 'Giải tích 1', '107001', '107001120101', 3, 1, '', '6-9', '', '', '', '', '', NULL, 10, 2, 3, 3.5, 'hoanThanh', NULL, 'HocKy-1'),
(42, 'Giải tích 2', '107002', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '107001', NULL),
(43, 'Đại số tuyến tính và Hình giải tích', '107003', '107003120101', 3, 1, '', '', '', '', '1-4', '', '', NULL, 10, 5, 6, 6.2, 'hoanThanh', '', 'HocKy-1'),
(44, 'Vật lý đại cương', '107004', '107004120101', 3, 1, '', '', '8-9', '3-4', '', '', '', NULL, 10, 5, 6, 6.2, 'hoanThanh', '', 'HocKy-1'),
(45, 'Đại số số học', '107005', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(46, 'Xác suất thống kê', '107008', NULL, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(47, 'Tiếng Anh 1', '101001', '101001140201', 3, 1, '1-4', '', '', '', '', '', '', NULL, 10, 5, 8, 7.6, 'hoanThanh', '', 'HocKy-1'),
(48, 'Tiếng Anh 2', '101002', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101001', NULL),
(49, 'Tiếng Anh 3', '101003', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101002', NULL),
(50, 'Tin Học Đại Cương', '105001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4.7, NULL, '', NULL),
(51, 'Giải tích 1', '107001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3.5, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `361050002`
--

CREATE TABLE IF NOT EXISTS `361050002` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Dsach` varchar(220) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maMon` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maHP` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `soTC` int(11) NOT NULL,
  `HK` int(11) NOT NULL,
  `T2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T4` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T5` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T6` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T7` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoigian` date DEFAULT NULL,
  `chuyenCan` float DEFAULT NULL,
  `giuaKy` float DEFAULT NULL,
  `cuoiKy` float DEFAULT NULL,
  `DTB` float DEFAULT NULL,
  `dangKy` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rangBuoc` varchar(240) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `loai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `361050002`
--

INSERT INTO `361050002` (`sott`, `Dsach`, `maMon`, `maHP`, `soTC`, `HK`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `thoigian`, `chuyenCan`, `giuaKy`, `cuoiKy`, `DTB`, `dangKy`, `rangBuoc`, `loai`) VALUES
(13, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1', '106001', '106001130204', 2, 1, '', '', '', '6-9', '', '', '', NULL, 10, 5, 7, 6.9, 'hoanThanh', '', 'HocKy-1'),
(14, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 2', '106002', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106001', NULL),
(15, 'Tin Học Đại Cương', '105001', '105001110801', 3, 1, '', '', '6-7', '1-2', '', '', '', NULL, 6, 7, 8, 7.6, 'hoanThanh', '', 'HocKy-1'),
(16, 'Thực hành máy tính', '105002', '105002110801', 2, 2, '', '', '1-4', '', '', '', '', NULL, 7, 5, 6, 5.9, 'hoanThanh', '', 'HocKy-1'),
(17, 'Thiết kế Web', '105003', '105003110701', 2, 2, '6-9', '', '', '', '', '', '', NULL, 7.7, 7.5, 7.7, 7.66, 'hoanThanh', '', 'HocKy-1'),
(18, 'Lập trình cơ bản', '105004', NULL, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(19, 'Hệ quản trị cơ sở dữ liệu', '105005', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(20, 'Toán Logic', '105006', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(21, 'Toán rời rạc', '105007', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(22, 'Lập trình hướng đối tượng', '105008', NULL, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105004', NULL),
(23, 'Nhập môn thuật toán', '105009', NULL, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(24, 'Cấu trúc dữ liệu', '105010', NULL, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105008', NULL),
(25, 'Hệ điều hành Linux', '105011', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(26, 'Thực hành lập trình', '105012', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(27, 'Đồ họa máy tính', '105013', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(28, 'Nhập môn mạng máy tính', '105014', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(29, 'Lập trình ứng dụng web', '105015', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105003', NULL),
(30, 'Kiến trúc máy tính', '105016', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(31, 'Phân tích và thiết kế hệ thống thông tin', '105017', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(32, 'Nhập môn công nghệ phần mềm', '105018', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(33, 'Quản trị mạng máy tính', '105019', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(34, 'Nguyên lý hệ điều hành', '105020', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(35, 'Ngôn ngữ hình thức', '105021', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(36, 'Thực hành làm việc nhóm', '105022', NULL, 2, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(37, 'Công Nghệ .NET', '105023', NULL, 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(38, 'Nhập môn cơ sở dữ liệu', '105024', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(39, 'Tư tưởng Hồ Chí Minh', '106003', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106002', NULL),
(40, 'Đường lối cách mạng của Đảng Cộng sản Việt Nam', '106004', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106003', NULL),
(41, 'Giải tích 1', '107001', '107001120101', 3, 1, '', '6-9', '', '', '', '', '', NULL, 4, 5, 6, 5.6, 'hoanThanh', '', 'HocKy-1'),
(42, 'Giải tích 2', '107002', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '107001', NULL),
(43, 'Đại số tuyến tính và Hình giải tích', '107003', '107003120101', 3, 1, '', '', '', '', '1-4', '', '', NULL, 8, 9, 2, 4, 'hoanThanh', '', 'HocKy-1'),
(44, 'Vật lý đại cương', '107004', '107004120101', 3, 1, '', '', '8-9', '3-4', '', '', '', NULL, 10, 6, 6, 6.4, 'hoanThanh', '', 'HocKy-1'),
(45, 'Đại số số học', '107005', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(46, 'Xác suất thống kê', '107008', NULL, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(47, 'Tiếng Anh 1', '101001', '101001140201', 3, 1, '1-4', '', '', '', '', '', '', NULL, 10, 8, 4, 5.4, 'hoanThanh', '', 'HocKy-1'),
(48, 'Tiếng Anh 2', '101002', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101001', NULL),
(49, 'Tiếng Anh 3', '101003', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101002', NULL),
(50, 'Đại số tuyến tính và Hình giải tích', '107003', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `361050003`
--

CREATE TABLE IF NOT EXISTS `361050003` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Dsach` varchar(220) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maMon` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maHP` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `soTC` int(11) NOT NULL,
  `HK` int(11) NOT NULL,
  `T2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T4` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T5` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T6` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T7` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoigian` date DEFAULT NULL,
  `chuyenCan` float DEFAULT NULL,
  `giuaKy` float DEFAULT NULL,
  `cuoiKy` float DEFAULT NULL,
  `DTB` float DEFAULT NULL,
  `dangKy` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rangBuoc` varchar(240) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `loai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `361050003`
--

INSERT INTO `361050003` (`sott`, `Dsach`, `maMon`, `maHP`, `soTC`, `HK`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `thoigian`, `chuyenCan`, `giuaKy`, `cuoiKy`, `DTB`, `dangKy`, `rangBuoc`, `loai`) VALUES
(13, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1', '106001', '106001130204', 2, 1, '', '', '', '6-9', '', '', '', NULL, 10, 1, 5, 4.7, 'hoanThanh', '', 'HocKy-1'),
(14, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 2', '106002', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106001', NULL),
(15, 'Tin Học Đại Cương', '105001', '105001110801', 3, 1, '', '', '6-7', '1-2', '', '', '', NULL, 9, 10, 2, 4.3, 'hoanThanh', '', 'HocKy-1'),
(16, 'Thực hành máy tính', '105002', '105002110801', 2, 2, '', '', '1-4', '', '', '', '', NULL, 8, 8, 8, 8, 'hoanThanh', '', 'HocKy-1'),
(17, 'Thiết kế Web', '105003', '105003110701', 2, 2, '6-9', '', '', '', '', '', '', NULL, 8, 8, 2, 3.8, 'hoanThanh', '', 'HocKy-1'),
(18, 'Lập trình cơ bản', '105004', NULL, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(19, 'Hệ quản trị cơ sở dữ liệu', '105005', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(20, 'Toán Logic', '105006', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(21, 'Toán rời rạc', '105007', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(22, 'Lập trình hướng đối tượng', '105008', NULL, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105004', NULL),
(23, 'Nhập môn thuật toán', '105009', NULL, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(24, 'Cấu trúc dữ liệu', '105010', NULL, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105008', NULL),
(25, 'Hệ điều hành Linux', '105011', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(26, 'Thực hành lập trình', '105012', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(27, 'Đồ họa máy tính', '105013', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(28, 'Nhập môn mạng máy tính', '105014', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(29, 'Lập trình ứng dụng web', '105015', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105003', NULL),
(30, 'Kiến trúc máy tính', '105016', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(31, 'Phân tích và thiết kế hệ thống thông tin', '105017', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(32, 'Nhập môn công nghệ phần mềm', '105018', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(33, 'Quản trị mạng máy tính', '105019', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(34, 'Nguyên lý hệ điều hành', '105020', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(35, 'Ngôn ngữ hình thức', '105021', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(36, 'Thực hành làm việc nhóm', '105022', NULL, 2, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(37, 'Công Nghệ .NET', '105023', NULL, 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(38, 'Nhập môn cơ sở dữ liệu', '105024', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(39, 'Tư tưởng Hồ Chí Minh', '106003', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106002', NULL),
(40, 'Đường lối cách mạng của Đảng Cộng sản Việt Nam', '106004', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106003', NULL),
(41, 'Giải tích 1', '107001', '107001120101', 3, 1, '', '6-9', '', '', '', '', '', NULL, 10, 5, 6, 6.2, 'hoanThanh', '', 'HocKy-1'),
(42, 'Giải tích 2', '107002', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '107001', NULL),
(43, 'Đại số tuyến tính và Hình giải tích', '107003', '107003120101', 3, 1, '', '', '', '', '1-4', '', '', NULL, 3, 10, 6, 6.5, 'hoanThanh', '', 'HocKy-1'),
(44, 'Vật lý đại cương', '107004', '107004120101', 3, 1, '', '', '8-9', '3-4', '', '', '', NULL, 10, 8, 6, 6.8, 'hoanThanh', '', 'HocKy-1'),
(45, 'Đại số số học', '107005', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(46, 'Xác suất thống kê', '107008', NULL, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(47, 'Tiếng Anh 1', '101001', '101001140201', 3, 1, '1-4', '', '', '', '', '', '', NULL, 10, 6, 6, 6.4, 'hoanThanh', '', 'HocKy-1'),
(48, 'Tiếng Anh 2', '101002', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101001', NULL),
(49, 'Tiếng Anh 3', '101003', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101002', NULL),
(50, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1', '106001', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4.7, NULL, '', NULL),
(51, 'Tin Học Đại Cương', '105001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4.3, NULL, '', NULL),
(52, 'Thiết kế Web', '105003', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3.8, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `361050004`
--

CREATE TABLE IF NOT EXISTS `361050004` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Dsach` varchar(220) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maMon` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maHP` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `soTC` int(11) NOT NULL,
  `HK` int(11) NOT NULL,
  `T2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T4` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T5` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T6` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T7` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoigian` date DEFAULT NULL,
  `chuyenCan` float DEFAULT NULL,
  `giuaKy` float DEFAULT NULL,
  `cuoiKy` float DEFAULT NULL,
  `DTB` float DEFAULT NULL,
  `dangKy` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rangBuoc` varchar(240) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `loai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `361050004`
--

INSERT INTO `361050004` (`sott`, `Dsach`, `maMon`, `maHP`, `soTC`, `HK`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `thoigian`, `chuyenCan`, `giuaKy`, `cuoiKy`, `DTB`, `dangKy`, `rangBuoc`, `loai`) VALUES
(13, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1', '106001', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(14, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 2', '106002', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106001', NULL),
(15, 'Tin Học Đại Cương', '105001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(16, 'Thực hành máy tính', '105002', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(17, 'Thiết kế Web', '105003', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(18, 'Lập trình cơ bản', '105004', NULL, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(19, 'Hệ quản trị cơ sở dữ liệu', '105005', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(20, 'Toán Logic', '105006', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(21, 'Toán rời rạc', '105007', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(22, 'Lập trình hướng đối tượng', '105008', NULL, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105004', NULL),
(23, 'Nhập môn thuật toán', '105009', NULL, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(24, 'Cấu trúc dữ liệu', '105010', NULL, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105008', NULL),
(25, 'Hệ điều hành Linux', '105011', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(26, 'Thực hành lập trình', '105012', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(27, 'Đồ họa máy tính', '105013', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(28, 'Nhập môn mạng máy tính', '105014', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(29, 'Lập trình ứng dụng web', '105015', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105003', NULL),
(30, 'Kiến trúc máy tính', '105016', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(31, 'Phân tích và thiết kế hệ thống thông tin', '105017', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(32, 'Nhập môn công nghệ phần mềm', '105018', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(33, 'Quản trị mạng máy tính', '105019', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(34, 'Nguyên lý hệ điều hành', '105020', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(35, 'Ngôn ngữ hình thức', '105021', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(36, 'Thực hành làm việc nhóm', '105022', NULL, 2, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(37, 'Công Nghệ .NET', '105023', NULL, 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(38, 'Nhập môn cơ sở dữ liệu', '105024', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(39, 'Tư tưởng Hồ Chí Minh', '106003', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106002', NULL),
(40, 'Đường lối cách mạng của Đảng Cộng sản Việt Nam', '106004', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106003', NULL),
(41, 'Giải tích 1', '107001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(42, 'Giải tích 2', '107002', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '107001', NULL),
(43, 'Đại số tuyến tính và Hình giải tích', '107003', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(44, 'Vật lý đại cương', '107004', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(45, 'Đại số số học', '107005', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(46, 'Xác suất thống kê', '107008', NULL, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(47, 'Tiếng Anh 1', '101001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(48, 'Tiếng Anh 2', '101002', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101001', NULL),
(49, 'Tiếng Anh 3', '101003', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101002', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `361050005`
--

CREATE TABLE IF NOT EXISTS `361050005` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Dsach` varchar(220) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maMon` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maHP` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `soTC` int(11) NOT NULL,
  `HK` int(11) NOT NULL,
  `T2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T4` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T5` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T6` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T7` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoigian` date DEFAULT NULL,
  `chuyenCan` float DEFAULT NULL,
  `giuaKy` float DEFAULT NULL,
  `cuoiKy` float DEFAULT NULL,
  `DTB` float DEFAULT NULL,
  `dangKy` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rangBuoc` varchar(240) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `loai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `361050005`
--

INSERT INTO `361050005` (`sott`, `Dsach`, `maMon`, `maHP`, `soTC`, `HK`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `thoigian`, `chuyenCan`, `giuaKy`, `cuoiKy`, `DTB`, `dangKy`, `rangBuoc`, `loai`) VALUES
(13, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1', '106001', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(14, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 2', '106002', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106001', NULL),
(15, 'Tin Học Đại Cương', '105001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(16, 'Thực hành máy tính', '105002', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(17, 'Thiết kế Web', '105003', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(18, 'Lập trình cơ bản', '105004', NULL, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(19, 'Hệ quản trị cơ sở dữ liệu', '105005', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(20, 'Toán Logic', '105006', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(21, 'Toán rời rạc', '105007', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(22, 'Lập trình hướng đối tượng', '105008', NULL, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105004', NULL),
(23, 'Nhập môn thuật toán', '105009', NULL, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(24, 'Cấu trúc dữ liệu', '105010', NULL, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105008', NULL),
(25, 'Hệ điều hành Linux', '105011', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(26, 'Thực hành lập trình', '105012', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(27, 'Đồ họa máy tính', '105013', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(28, 'Nhập môn mạng máy tính', '105014', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(29, 'Lập trình ứng dụng web', '105015', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105003', NULL),
(30, 'Kiến trúc máy tính', '105016', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(31, 'Phân tích và thiết kế hệ thống thông tin', '105017', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(32, 'Nhập môn công nghệ phần mềm', '105018', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(33, 'Quản trị mạng máy tính', '105019', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(34, 'Nguyên lý hệ điều hành', '105020', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(35, 'Ngôn ngữ hình thức', '105021', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(36, 'Thực hành làm việc nhóm', '105022', NULL, 2, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(37, 'Công Nghệ .NET', '105023', NULL, 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(38, 'Nhập môn cơ sở dữ liệu', '105024', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(39, 'Tư tưởng Hồ Chí Minh', '106003', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106002', NULL),
(40, 'Đường lối cách mạng của Đảng Cộng sản Việt Nam', '106004', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106003', NULL),
(41, 'Giải tích 1', '107001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(42, 'Giải tích 2', '107002', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '107001', NULL),
(43, 'Đại số tuyến tính và Hình giải tích', '107003', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(44, 'Vật lý đại cương', '107004', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(45, 'Đại số số học', '107005', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(46, 'Xác suất thống kê', '107008', NULL, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(47, 'Tiếng Anh 1', '101001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(48, 'Tiếng Anh 2', '101002', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101001', NULL),
(49, 'Tiếng Anh 3', '101003', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101002', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `361050006`
--

CREATE TABLE IF NOT EXISTS `361050006` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Dsach` varchar(220) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maMon` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maHP` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `soTC` int(11) NOT NULL,
  `HK` int(11) NOT NULL,
  `T2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T4` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T5` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T6` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T7` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoigian` date DEFAULT NULL,
  `chuyenCan` float DEFAULT NULL,
  `giuaKy` float DEFAULT NULL,
  `cuoiKy` float DEFAULT NULL,
  `DTB` float DEFAULT NULL,
  `dangKy` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rangBuoc` varchar(240) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `loai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `361050006`
--

INSERT INTO `361050006` (`sott`, `Dsach`, `maMon`, `maHP`, `soTC`, `HK`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `thoigian`, `chuyenCan`, `giuaKy`, `cuoiKy`, `DTB`, `dangKy`, `rangBuoc`, `loai`) VALUES
(13, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1', '106001', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(14, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 2', '106002', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106001', NULL),
(15, 'Tin Học Đại Cương', '105001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(16, 'Thực hành máy tính', '105002', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(17, 'Thiết kế Web', '105003', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(18, 'Lập trình cơ bản', '105004', NULL, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(19, 'Hệ quản trị cơ sở dữ liệu', '105005', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(20, 'Toán Logic', '105006', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(21, 'Toán rời rạc', '105007', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(22, 'Lập trình hướng đối tượng', '105008', NULL, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105004', NULL),
(23, 'Nhập môn thuật toán', '105009', NULL, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(24, 'Cấu trúc dữ liệu', '105010', NULL, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105008', NULL),
(25, 'Hệ điều hành Linux', '105011', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(26, 'Thực hành lập trình', '105012', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(27, 'Đồ họa máy tính', '105013', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(28, 'Nhập môn mạng máy tính', '105014', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(29, 'Lập trình ứng dụng web', '105015', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105003', NULL),
(30, 'Kiến trúc máy tính', '105016', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(31, 'Phân tích và thiết kế hệ thống thông tin', '105017', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(32, 'Nhập môn công nghệ phần mềm', '105018', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(33, 'Quản trị mạng máy tính', '105019', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(34, 'Nguyên lý hệ điều hành', '105020', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(35, 'Ngôn ngữ hình thức', '105021', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(36, 'Thực hành làm việc nhóm', '105022', NULL, 2, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(37, 'Công Nghệ .NET', '105023', NULL, 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(38, 'Nhập môn cơ sở dữ liệu', '105024', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(39, 'Tư tưởng Hồ Chí Minh', '106003', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106002', NULL),
(40, 'Đường lối cách mạng của Đảng Cộng sản Việt Nam', '106004', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106003', NULL),
(41, 'Giải tích 1', '107001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(42, 'Giải tích 2', '107002', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '107001', NULL),
(43, 'Đại số tuyến tính và Hình giải tích', '107003', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(44, 'Vật lý đại cương', '107004', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(45, 'Đại số số học', '107005', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(46, 'Xác suất thống kê', '107008', NULL, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(47, 'Tiếng Anh 1', '101001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(48, 'Tiếng Anh 2', '101002', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101001', NULL),
(49, 'Tiếng Anh 3', '101003', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101002', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `361050007`
--

CREATE TABLE IF NOT EXISTS `361050007` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Dsach` varchar(220) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maMon` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maHP` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `soTC` int(11) NOT NULL,
  `HK` int(11) NOT NULL,
  `T2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T4` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T5` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T6` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T7` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoigian` date DEFAULT NULL,
  `chuyenCan` float DEFAULT NULL,
  `giuaKy` float DEFAULT NULL,
  `cuoiKy` float DEFAULT NULL,
  `DTB` float DEFAULT NULL,
  `dangKy` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rangBuoc` varchar(240) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `loai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `361050007`
--

INSERT INTO `361050007` (`sott`, `Dsach`, `maMon`, `maHP`, `soTC`, `HK`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `thoigian`, `chuyenCan`, `giuaKy`, `cuoiKy`, `DTB`, `dangKy`, `rangBuoc`, `loai`) VALUES
(13, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1', '106001', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(14, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 2', '106002', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106001', NULL),
(15, 'Tin Học Đại Cương', '105001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(16, 'Thực hành máy tính', '105002', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(17, 'Thiết kế Web', '105003', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(18, 'Lập trình cơ bản', '105004', NULL, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(19, 'Hệ quản trị cơ sở dữ liệu', '105005', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(20, 'Toán Logic', '105006', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(21, 'Toán rời rạc', '105007', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(22, 'Lập trình hướng đối tượng', '105008', NULL, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105004', NULL),
(23, 'Nhập môn thuật toán', '105009', NULL, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(24, 'Cấu trúc dữ liệu', '105010', NULL, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105008', NULL),
(25, 'Hệ điều hành Linux', '105011', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(26, 'Thực hành lập trình', '105012', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(27, 'Đồ họa máy tính', '105013', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(28, 'Nhập môn mạng máy tính', '105014', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(29, 'Lập trình ứng dụng web', '105015', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105003', NULL),
(30, 'Kiến trúc máy tính', '105016', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(31, 'Phân tích và thiết kế hệ thống thông tin', '105017', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(32, 'Nhập môn công nghệ phần mềm', '105018', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(33, 'Quản trị mạng máy tính', '105019', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(34, 'Nguyên lý hệ điều hành', '105020', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(35, 'Ngôn ngữ hình thức', '105021', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(36, 'Thực hành làm việc nhóm', '105022', NULL, 2, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(37, 'Công Nghệ .NET', '105023', NULL, 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(38, 'Nhập môn cơ sở dữ liệu', '105024', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(39, 'Tư tưởng Hồ Chí Minh', '106003', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106002', NULL),
(40, 'Đường lối cách mạng của Đảng Cộng sản Việt Nam', '106004', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106003', NULL),
(41, 'Giải tích 1', '107001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(42, 'Giải tích 2', '107002', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '107001', NULL),
(43, 'Đại số tuyến tính và Hình giải tích', '107003', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(44, 'Vật lý đại cương', '107004', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(45, 'Đại số số học', '107005', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(46, 'Xác suất thống kê', '107008', NULL, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(47, 'Tiếng Anh 1', '101001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(48, 'Tiếng Anh 2', '101002', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101001', NULL),
(49, 'Tiếng Anh 3', '101003', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101002', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `361050008`
--

CREATE TABLE IF NOT EXISTS `361050008` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Dsach` varchar(220) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maMon` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maHP` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `soTC` int(11) NOT NULL,
  `HK` int(11) NOT NULL,
  `T2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T4` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T5` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T6` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T7` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoigian` date DEFAULT NULL,
  `chuyenCan` float DEFAULT NULL,
  `giuaKy` float DEFAULT NULL,
  `cuoiKy` float DEFAULT NULL,
  `DTB` float DEFAULT NULL,
  `dangKy` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rangBuoc` varchar(240) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `loai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `361050008`
--

INSERT INTO `361050008` (`sott`, `Dsach`, `maMon`, `maHP`, `soTC`, `HK`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `thoigian`, `chuyenCan`, `giuaKy`, `cuoiKy`, `DTB`, `dangKy`, `rangBuoc`, `loai`) VALUES
(13, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1', '106001', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(14, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 2', '106002', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106001', NULL),
(15, 'Tin Học Đại Cương', '105001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(16, 'Thực hành máy tính', '105002', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(17, 'Thiết kế Web', '105003', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(18, 'Lập trình cơ bản', '105004', NULL, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(19, 'Hệ quản trị cơ sở dữ liệu', '105005', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(20, 'Toán Logic', '105006', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(21, 'Toán rời rạc', '105007', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(22, 'Lập trình hướng đối tượng', '105008', NULL, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105004', NULL),
(23, 'Nhập môn thuật toán', '105009', NULL, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(24, 'Cấu trúc dữ liệu', '105010', NULL, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105008', NULL),
(25, 'Hệ điều hành Linux', '105011', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(26, 'Thực hành lập trình', '105012', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(27, 'Đồ họa máy tính', '105013', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(28, 'Nhập môn mạng máy tính', '105014', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(29, 'Lập trình ứng dụng web', '105015', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105003', NULL),
(30, 'Kiến trúc máy tính', '105016', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(31, 'Phân tích và thiết kế hệ thống thông tin', '105017', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(32, 'Nhập môn công nghệ phần mềm', '105018', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(33, 'Quản trị mạng máy tính', '105019', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(34, 'Nguyên lý hệ điều hành', '105020', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(35, 'Ngôn ngữ hình thức', '105021', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(36, 'Thực hành làm việc nhóm', '105022', NULL, 2, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(37, 'Công Nghệ .NET', '105023', NULL, 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(38, 'Nhập môn cơ sở dữ liệu', '105024', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(39, 'Tư tưởng Hồ Chí Minh', '106003', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106002', NULL),
(40, 'Đường lối cách mạng của Đảng Cộng sản Việt Nam', '106004', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106003', NULL),
(41, 'Giải tích 1', '107001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(42, 'Giải tích 2', '107002', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '107001', NULL),
(43, 'Đại số tuyến tính và Hình giải tích', '107003', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(44, 'Vật lý đại cương', '107004', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(45, 'Đại số số học', '107005', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(46, 'Xác suất thống kê', '107008', NULL, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(47, 'Tiếng Anh 1', '101001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(48, 'Tiếng Anh 2', '101002', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101001', NULL),
(49, 'Tiếng Anh 3', '101003', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101002', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `361050009`
--

CREATE TABLE IF NOT EXISTS `361050009` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Dsach` varchar(220) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maMon` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maHP` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `soTC` int(11) NOT NULL,
  `HK` int(11) NOT NULL,
  `T2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T4` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T5` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T6` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T7` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoigian` date DEFAULT NULL,
  `chuyenCan` float DEFAULT NULL,
  `giuaKy` float DEFAULT NULL,
  `cuoiKy` float DEFAULT NULL,
  `DTB` float DEFAULT NULL,
  `dangKy` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rangBuoc` varchar(240) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `loai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `361050009`
--

INSERT INTO `361050009` (`sott`, `Dsach`, `maMon`, `maHP`, `soTC`, `HK`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `thoigian`, `chuyenCan`, `giuaKy`, `cuoiKy`, `DTB`, `dangKy`, `rangBuoc`, `loai`) VALUES
(13, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1', '106001', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(14, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 2', '106002', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106001', NULL),
(15, 'Tin Học Đại Cương', '105001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(16, 'Thực hành máy tính', '105002', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(17, 'Thiết kế Web', '105003', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(18, 'Lập trình cơ bản', '105004', NULL, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(19, 'Hệ quản trị cơ sở dữ liệu', '105005', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(20, 'Toán Logic', '105006', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(21, 'Toán rời rạc', '105007', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(22, 'Lập trình hướng đối tượng', '105008', NULL, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105004', NULL),
(23, 'Nhập môn thuật toán', '105009', NULL, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(24, 'Cấu trúc dữ liệu', '105010', NULL, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105008', NULL),
(25, 'Hệ điều hành Linux', '105011', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(26, 'Thực hành lập trình', '105012', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(27, 'Đồ họa máy tính', '105013', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(28, 'Nhập môn mạng máy tính', '105014', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(29, 'Lập trình ứng dụng web', '105015', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105003', NULL),
(30, 'Kiến trúc máy tính', '105016', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(31, 'Phân tích và thiết kế hệ thống thông tin', '105017', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(32, 'Nhập môn công nghệ phần mềm', '105018', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(33, 'Quản trị mạng máy tính', '105019', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(34, 'Nguyên lý hệ điều hành', '105020', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(35, 'Ngôn ngữ hình thức', '105021', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(36, 'Thực hành làm việc nhóm', '105022', NULL, 2, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(37, 'Công Nghệ .NET', '105023', NULL, 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(38, 'Nhập môn cơ sở dữ liệu', '105024', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(39, 'Tư tưởng Hồ Chí Minh', '106003', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106002', NULL),
(40, 'Đường lối cách mạng của Đảng Cộng sản Việt Nam', '106004', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106003', NULL),
(41, 'Giải tích 1', '107001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(42, 'Giải tích 2', '107002', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '107001', NULL),
(43, 'Đại số tuyến tính và Hình giải tích', '107003', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(44, 'Vật lý đại cương', '107004', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(45, 'Đại số số học', '107005', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(46, 'Xác suất thống kê', '107008', NULL, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(47, 'Tiếng Anh 1', '101001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(48, 'Tiếng Anh 2', '101002', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101001', NULL),
(49, 'Tiếng Anh 3', '101003', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101002', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `361050010`
--

CREATE TABLE IF NOT EXISTS `361050010` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Dsach` varchar(220) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maMon` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maHP` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `soTC` int(11) NOT NULL,
  `HK` int(11) NOT NULL,
  `T2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T4` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T5` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T6` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T7` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoigian` date DEFAULT NULL,
  `chuyenCan` float DEFAULT NULL,
  `giuaKy` float DEFAULT NULL,
  `cuoiKy` float DEFAULT NULL,
  `DTB` float DEFAULT NULL,
  `dangKy` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `rangBuoc` varchar(240) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `loai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `361050010`
--

INSERT INTO `361050010` (`sott`, `Dsach`, `maMon`, `maHP`, `soTC`, `HK`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `CN`, `thoigian`, `chuyenCan`, `giuaKy`, `cuoiKy`, `DTB`, `dangKy`, `rangBuoc`, `loai`) VALUES
(13, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 1', '106001', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(14, 'Những nguyên lý cơ bản của chủ nghĩa Mác-Lênin 2', '106002', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106001', NULL),
(15, 'Tin Học Đại Cương', '105001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(16, 'Thực hành máy tính', '105002', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(17, 'Thiết kế Web', '105003', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(18, 'Lập trình cơ bản', '105004', NULL, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(19, 'Hệ quản trị cơ sở dữ liệu', '105005', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(20, 'Toán Logic', '105006', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(21, 'Toán rời rạc', '105007', NULL, 3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(22, 'Lập trình hướng đối tượng', '105008', NULL, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105004', NULL),
(23, 'Nhập môn thuật toán', '105009', NULL, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(24, 'Cấu trúc dữ liệu', '105010', NULL, 4, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105008', NULL),
(25, 'Hệ điều hành Linux', '105011', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(26, 'Thực hành lập trình', '105012', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(27, 'Đồ họa máy tính', '105013', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(28, 'Nhập môn mạng máy tính', '105014', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(29, 'Lập trình ứng dụng web', '105015', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '105003', NULL),
(30, 'Kiến trúc máy tính', '105016', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(31, 'Phân tích và thiết kế hệ thống thông tin', '105017', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(32, 'Nhập môn công nghệ phần mềm', '105018', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(33, 'Quản trị mạng máy tính', '105019', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(34, 'Nguyên lý hệ điều hành', '105020', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(35, 'Ngôn ngữ hình thức', '105021', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(36, 'Thực hành làm việc nhóm', '105022', NULL, 2, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(37, 'Công Nghệ .NET', '105023', NULL, 4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(38, 'Nhập môn cơ sở dữ liệu', '105024', NULL, 3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(39, 'Tư tưởng Hồ Chí Minh', '106003', NULL, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106002', NULL),
(40, 'Đường lối cách mạng của Đảng Cộng sản Việt Nam', '106004', NULL, 3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106003', NULL),
(41, 'Giải tích 1', '107001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(42, 'Giải tích 2', '107002', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '107001', NULL),
(43, 'Đại số tuyến tính và Hình giải tích', '107003', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(44, 'Vật lý đại cương', '107004', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(45, 'Đại số số học', '107005', NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(46, 'Xác suất thống kê', '107008', NULL, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(47, 'Tiếng Anh 1', '101001', NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(48, 'Tiếng Anh 2', '101002', NULL, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101001', NULL),
(49, 'Tiếng Anh 3', '101003', NULL, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101002', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
