-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2017 at 02:04 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klch`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_info`
--

CREATE TABLE `access_info` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `login_period` datetime NOT NULL,
  `logout_period` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `access_info`
--

INSERT INTO `access_info` (`user_id`, `login_period`, `logout_period`) VALUES
(24, '2017-05-06 11:07:56', '0000-00-00 00:00:00'),
(24, '2017-05-06 11:16:11', '0000-00-00 00:00:00'),
(24, '2017-05-06 11:21:31', '0000-00-00 00:00:00'),
(24, '2017-05-06 11:26:25', '2017-05-06 18:31:09'),
(24, '2017-05-06 11:48:24', '0000-00-00 00:00:00'),
(24, '2017-05-06 11:50:10', '0000-00-00 00:00:00'),
(24, '2017-05-06 13:13:32', '0000-00-00 00:00:00'),
(24, '2017-05-06 13:37:40', '0000-00-00 00:00:00'),
(24, '2017-05-06 15:22:16', '0000-00-00 00:00:00'),
(24, '2017-05-06 17:05:17', '0000-00-00 00:00:00'),
(24, '2017-05-06 17:16:19', '0000-00-00 00:00:00'),
(24, '2017-05-06 17:21:32', '0000-00-00 00:00:00'),
(24, '2017-05-06 18:01:23', '0000-00-00 00:00:00'),
(24, '2017-05-07 10:14:36', '2017-05-07 18:18:56'),
(24, '2017-05-07 10:21:26', '0000-00-00 00:00:00'),
(24, '2017-05-07 10:36:52', '0000-00-00 00:00:00'),
(24, '2017-05-07 10:38:17', '0000-00-00 00:00:00'),
(24, '2017-05-07 10:38:48', '0000-00-00 00:00:00'),
(24, '2017-05-07 10:43:15', '0000-00-00 00:00:00'),
(24, '2017-05-07 10:58:09', '0000-00-00 00:00:00'),
(24, '2017-05-07 11:10:00', '0000-00-00 00:00:00'),
(24, '2017-05-07 11:35:52', '0000-00-00 00:00:00'),
(24, '2017-05-07 11:51:11', '0000-00-00 00:00:00'),
(24, '2017-05-07 15:13:53', '0000-00-00 00:00:00'),
(24, '2017-05-07 16:20:51', '0000-00-00 00:00:00'),
(24, '2017-05-07 17:33:10', '0000-00-00 00:00:00'),
(24, '2017-05-07 17:39:55', '0000-00-00 00:00:00'),
(24, '2017-05-07 17:52:39', '0000-00-00 00:00:00'),
(24, '2017-05-08 10:13:40', '0000-00-00 00:00:00'),
(24, '2017-05-08 10:13:41', '0000-00-00 00:00:00'),
(24, '2017-05-08 10:14:25', '0000-00-00 00:00:00'),
(24, '2017-05-08 10:54:25', '0000-00-00 00:00:00'),
(24, '2017-05-08 11:08:25', '0000-00-00 00:00:00'),
(24, '2017-05-08 11:18:33', '0000-00-00 00:00:00'),
(24, '2017-05-08 12:08:38', '0000-00-00 00:00:00'),
(24, '2017-05-08 12:14:31', '0000-00-00 00:00:00'),
(24, '2017-05-08 12:48:22', '0000-00-00 00:00:00'),
(24, '2017-05-08 12:51:10', '0000-00-00 00:00:00'),
(24, '2017-05-08 12:53:53', '0000-00-00 00:00:00'),
(24, '2017-05-08 12:58:55', '0000-00-00 00:00:00'),
(24, '2017-05-08 13:14:51', '0000-00-00 00:00:00'),
(24, '2017-05-08 13:43:52', '0000-00-00 00:00:00'),
(24, '2017-05-08 13:48:13', '0000-00-00 00:00:00'),
(24, '2017-05-08 16:12:30', '2017-05-08 18:28:26'),
(24, '2017-05-09 10:14:18', '0000-00-00 00:00:00'),
(24, '2017-05-09 10:14:37', '0000-00-00 00:00:00'),
(24, '2017-05-09 10:14:45', '0000-00-00 00:00:00'),
(24, '2017-05-09 10:15:22', '0000-00-00 00:00:00'),
(24, '2017-05-09 10:16:20', '2017-05-09 10:16:31'),
(24, '2017-05-09 10:17:21', '2017-05-09 18:24:01'),
(24, '2017-05-09 10:25:30', '0000-00-00 00:00:00'),
(24, '2017-05-09 15:15:55', '0000-00-00 00:00:00'),
(24, '2017-05-09 15:19:19', '0000-00-00 00:00:00'),
(24, '2017-05-09 18:05:50', '0000-00-00 00:00:00'),
(24, '2017-05-10 09:50:10', '0000-00-00 00:00:00'),
(24, '2017-05-10 10:00:46', '0000-00-00 00:00:00'),
(24, '2017-05-10 10:15:14', '0000-00-00 00:00:00'),
(24, '2017-05-10 10:18:25', '0000-00-00 00:00:00'),
(24, '2017-05-10 10:50:11', '0000-00-00 00:00:00'),
(24, '2017-05-10 11:13:59', '0000-00-00 00:00:00'),
(24, '2017-05-10 11:26:15', '0000-00-00 00:00:00'),
(24, '2017-05-10 11:30:23', '0000-00-00 00:00:00'),
(24, '2017-05-10 15:56:21', '0000-00-00 00:00:00'),
(24, '2017-05-10 16:52:27', '0000-00-00 00:00:00'),
(24, '2017-05-10 17:07:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `pid` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `guardian` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `seat` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `bill` int(11) NOT NULL COMMENT 'ID of bills table',
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admitted' COMMENT 'admitted or released'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admissions`
--

INSERT INTO `admissions` (`id`, `date`, `pid`, `guardian`, `seat`, `bill`, `status`) VALUES
(23, '2017-05-06', '1705060001', 'Joymongal Biswas', 'cabin:1', 6, 'admitted'),
(24, '2017-05-07', '1705070035', 'DEF', 'cabin:2', 16, 'admitted'),
(25, '2017-05-07', '1705070036', 'Joymongal Biswas', 'cabin:3', 17, 'admitted'),
(26, '2017-05-06', '1705060028', 'Joymongal Biswas', 'cabin:4', 25, 'admitted'),
(27, '2017-05-08', '1705080043', 'test206', 'ward:14', 29, 'admitted'),
(28, '2017-05-08', '1705080044', 'Mr. Aknda', 'ward:13', 30, 'admitted'),
(29, '2017-05-08', '1705080045', 'test207', 'ward:16', 31, 'admitted'),
(30, '2017-05-09', '1705090050', 'test210', 'ward:', 46, 'admitted'),
(31, '2017-05-09', '1705090051', 'test211', 'cabin:5', 47, 'admitted'),
(32, '2017-05-10', '1705100056', 'Imtiaz Ahmed', 'ward:15', 52, 'admitted');

-- --------------------------------------------------------

--
-- Table structure for table `ad_pay`
--

CREATE TABLE `ad_pay` (
  `id` int(11) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `pay_amount` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ad_pay`
--

INSERT INTO `ad_pay` (`id`, `emp_id`, `date`, `pay_amount`) VALUES
(1, 5, '2016-12-20', '5000'),
(2, 5, '2016-12-30', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `ad_salary`
--

CREATE TABLE `ad_salary` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `advance_amount` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ad_salary`
--

INSERT INTO `ad_salary` (`id`, `emp_id`, `date`, `advance_amount`) VALUES
(1, 5, '2016-12-07', '5000'),
(2, 5, '2016-12-07', '5000'),
(3, 2, '2016-10-01', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `bank_account`
--

CREATE TABLE `bank_account` (
  `id` int(10) UNSIGNED NOT NULL,
  `datetime` date NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `holder_name` varchar(255) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `pre_balance` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank_account`
--

INSERT INTO `bank_account` (`id`, `datetime`, `bank_name`, `holder_name`, `account_number`, `pre_balance`) VALUES
(13, '2016-11-05', 'Sonali_Bank_Limited', 'Rony Debnath', '101020', 2375),
(14, '0000-00-00', 'Janata_Bank_Limited', 'abcd', '123456789123', 50000),
(15, '0000-00-00', 'National_Bank_Limited', 'asdf', '123456789857458', 5000000),
(16, '2017-01-14', 'AB_Bank_Limited', 'asdfasdf', '123456789456123', 50000),
(17, '2017-01-25', 'Dutch_Bangla_Bank', 'Maruf hasan', '15610550882', 16000),
(18, '2017-02-14', 'Sonali_Bank_Limited', 'Rony Debnath', '10102000', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `bank_name`
--

CREATE TABLE `bank_name` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `bank_name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bank_name`
--

INSERT INTO `bank_name` (`id`, `date`, `bank_name`) VALUES
(1, '2017-03-12', 'Sonali_Bank_Limited'),
(2, '2017-03-12', 'Janata_Bank_Limited'),
(3, '2017-03-12', 'Agrani_Bank_Limited'),
(4, '2017-03-12', 'Rupali_Bank_Limited'),
(5, '2017-03-12', 'AB_Bank_Limited'),
(6, '2017-03-12', 'Jamuna_Bank_Limited'),
(7, '2017-03-12', 'National_Bank_Limited'),
(8, '2017-03-12', 'NCC_Bank_Limited'),
(9, '2017-03-12', 'Prime_Bank_Limited'),
(10, '2017-03-12', 'Standard_Bank_Limited'),
(11, '2017-03-12', 'The_City_Bank_Limited'),
(12, '2017-03-12', 'Trust_Bank_Limited'),
(13, '2017-03-12', 'Islami_Bank_Bangladesh_Limited'),
(14, '2017-03-12', 'The_City_Bank_Limited'),
(15, '2017-03-12', 'Dutch_Bangla_Bank');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `voucher` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `pid` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `last_paid` decimal(10,2) NOT NULL,
  `last_payment_date` date NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `date`, `voucher`, `pid`, `title`, `details`, `total`, `discount`, `grand_total`, `paid`, `due`, `last_paid`, `last_payment_date`, `status`) VALUES
(5, '2017-05-06', '1705060001', '1705060001', 'admission', 'Unknown', '500.00', '0.00', '500.00', '0.00', '500.00', '0.00', '2017-05-06', NULL),
(6, '2017-05-06', '1705060006', '1705060001', 'admission', 'Unknown', '500.00', '10.00', '490.00', '0.00', '490.00', '0.00', '2017-05-06', NULL),
(7, '2017-05-06', '1705060007', '1705060028', 'consultancy', '', '1656.60', '56.60', '1600.00', '1200.00', '400.00', '1200.00', '2017-05-06', NULL),
(8, '2017-05-06', '1705060008', '1705060028', 'consultancy', '', '1656.60', '56.60', '1600.00', '1200.00', '400.00', '1200.00', '2017-05-06', NULL),
(9, '2017-05-06', '1705060009', '1705060028', 'consultancy', '', '1656.60', '56.60', '1600.00', '1200.00', '400.00', '1200.00', '2017-05-06', NULL),
(10, '2017-05-06', '1705060010', '1705060028', 'consultancy', '', '1656.60', '56.60', '1600.00', '1200.00', '400.00', '1200.00', '2017-05-06', NULL),
(11, '2017-05-06', '1705060011', '1705060028', 'consultancy', '', '1656.60', '56.60', '1600.00', '1200.00', '400.00', '1200.00', '2017-05-06', NULL),
(12, '2017-05-06', '1705070012', '1705060028', 'consultancy', '', '1656.60', '56.60', '1600.00', '1200.00', '400.00', '1200.00', '2017-05-06', NULL),
(13, '2017-05-07', '1705070013', '1705070029', 'diagnosis', 'diagnosis', '4880.00', '80.00', '4800.00', '4000.00', '800.00', '4000.00', '2017-05-07', 'diagnosis'),
(14, '0000-00-00', '1705070014', '1705070029', 'emergency', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0000-00-00', 'emergency'),
(15, '2017-05-07', '1705070015', '1705070034', 'consultancy', 'dfdffdf', '1000.00', '0.00', '1000.00', '500.00', '500.00', '500.00', '2017-05-07', NULL),
(16, '2017-05-07', '1705070016', '1705070035', 'admission', 'Unknown', '5000.00', '10.00', '4990.00', '3500.00', '1490.00', '3500.00', '2017-05-07', NULL),
(17, '2017-05-07', '1705070017', '1705070036', 'admission', 'alsdfkja', '500.00', '10.00', '490.00', '10.00', '480.00', '10.00', '2017-05-07', NULL),
(18, '2017-05-06', '1705070018', '1705060001', 'consultancy', '', '501.00', '0.00', '501.00', '0.00', '501.00', '0.00', '2017-05-06', NULL),
(19, '2017-05-06', '1705070019', '1705060028', 'consultancy', '', '501.00', '0.00', '501.00', '0.00', '501.00', '0.00', '2017-05-06', NULL),
(20, '2017-05-07', '1705070020', '1705070037', 'consultancy', '', '1656.60', '56.60', '1600.00', '1200.00', '400.00', '1200.00', '2017-05-07', NULL),
(21, '2017-05-08', '1705080021', '1705080038', 'consultancy', '', '1509.00', '309.00', '1200.00', '1200.00', '0.00', '1200.00', '2017-05-08', NULL),
(22, '2017-05-08', '1705080022', '1705080040', 'emergency', '', '500.00', '100.00', '400.00', '400.00', '0.00', '400.00', '2017-05-08', 'emergency'),
(23, '2017-05-06', '1705080023', '	1705060028', 'consultancy', '', '502.00', '0.00', '502.00', '0.00', '502.00', '0.00', '2017-05-06', NULL),
(24, '2017-05-08', '1705080024', '1705080041', 'consultancy', '', '501.00', '0.00', '501.00', '0.00', '501.00', '0.00', '2017-05-08', NULL),
(25, '2017-05-06', '1705080025', '1705060028', 'admission', 'fgfdhhgfh', '4.00', '2.00', '2.00', '2.00', '0.00', '2.00', '2017-05-06', NULL),
(26, '2017-05-08', '1705080026', '1705080042', 'diagnosis', 'diagnosis', '900.00', '0.00', '900.00', '600.00', '300.00', '600.00', '2017-05-08', 'diagnosis'),
(27, '2017-05-08', '1705080026', '1705080042', 'diagnosis', 'diagnosis', '300.00', '0.00', '300.00', '0.00', '300.00', '0.00', '2017-05-08', 'diagnosis'),
(28, '2017-05-08', '1705080026', '1705080042', 'diagnosis', 'diagnosis', '200.00', '0.00', '200.00', '0.00', '200.00', '0.00', '2017-05-08', 'diagnosis'),
(29, '2017-05-08', '1705080029', '1705080043', 'admission', '', '500.00', '0.00', '500.00', '0.00', '500.00', '0.00', '2017-05-08', NULL),
(30, '2017-05-08', '1705080030', '1705080044', 'admission', 'Amar soril ta kharap lagtache!', '500.00', '1.00', '499.00', '400.00', '99.00', '400.00', '2017-05-08', NULL),
(31, '2017-05-08', '1705080031', '1705080045', 'admission', 'test', '600.00', '0.00', '600.00', '0.00', '600.00', '0.00', '2017-05-08', NULL),
(40, '2017-05-08', '1705080032', '1705060001', 'operation', 'Unknown', '12706.00', '206.00', '12500.00', '10000.00', '2500.00', '10000.00', '2017-05-08', NULL),
(41, '2017-05-09', '1705090041', '1705060001', 'operation', 'test', '94704.00', '1704.00', '93000.00', '93000.00', '0.00', '93000.00', '2017-05-09', NULL),
(42, '2017-05-09', '1705090042', '1705080045', 'operation', 'test', '12409.00', '409.00', '12000.00', '12000.00', '0.00', '12000.00', '2017-05-09', NULL),
(43, '2017-05-09', '1705090043', '1705060001', 'operation', 'Unknown', '12903.00', '103.00', '12800.00', '10000.00', '2800.00', '10000.00', '2017-05-09', NULL),
(44, '2017-05-09', '1705090044', '1705090048', 'emergency', 'demo', '500.00', '0.00', '500.00', '0.00', '500.00', '0.00', '2017-05-09', 'emergency'),
(45, '2017-05-09', '1705090045', '1705090049', 'consultancy', '', '1006.00', '206.00', '800.00', '800.00', '0.00', '800.00', '2017-05-09', NULL),
(46, '2017-05-09', '1705090046', '1705090050', 'admission', '', '500.00', '0.00', '500.00', '0.00', '500.00', '0.00', '2017-05-09', NULL),
(47, '2017-05-09', '1705090047', '1705090051', 'admission', 'test211', '600.00', '0.00', '600.00', '0.00', '600.00', '0.00', '2017-05-09', NULL),
(48, '2017-05-09', '1705090048', '1705090052', 'diagnosis', 'diagnosis', '1080.00', '80.00', '1000.00', '600.00', '400.00', '600.00', '2017-05-09', 'diagnosis'),
(49, '2017-05-09', '1705090049', '1705090053', 'emergency', 'Soril valo na.', '500.00', '50.00', '450.00', '400.00', '50.00', '400.00', '2017-05-09', 'emergency'),
(50, '2017-05-09', '1705090050', '1705090054', 'diagnosis', 'diagnosis', '198.00', '5.00', '193.00', '0.00', '193.00', '0.00', '2017-05-09', 'diagnosis'),
(51, '2017-05-09', '1705090051', '1705090055', 'consultancy', '', '502.00', '0.00', '502.00', '500.00', '2.00', '500.00', '2017-05-09', NULL),
(52, '2017-05-10', '1705100052', '1705100056', 'admission', 'jkhjkhj', '400.00', '2.00', '398.00', '398.00', '0.00', '398.00', '2017-05-10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bonus_structure`
--

CREATE TABLE `bonus_structure` (
  `id` int(10) UNSIGNED NOT NULL,
  `eid` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fields` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `percentage` decimal(10,2) NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bonus_structure`
--

INSERT INTO `bonus_structure` (`id`, `eid`, `fields`, `percentage`, `remarks`, `status`) VALUES
(9, '0003', 'Choto Eid', '50.00', '', ''),
(10, '0003', 'Boro Eid', '50.00', '', ''),
(11, '0003', 'Puja', '50.00', '', ''),
(12, '0004', 'Choto Eid', '50.00', '', ''),
(13, '0004', 'Boro Eid', '50.00', '', ''),
(14, '0005', 'Choto Eid', '50.00', '', ''),
(15, '0005', 'Boro Eid', '50.00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cabin`
--

CREATE TABLE `cabin` (
  `id` int(10) UNSIGNED NOT NULL,
  `cabin_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cabin_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nurse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `doctor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cabin`
--

INSERT INTO `cabin` (`id`, `cabin_no`, `cabin_type`, `rent`, `nurse`, `doctor`, `status`) VALUES
(1, '10', 'Cabin Type 1', '500', 'Alex Joe,Andru Gear', 'Andru Gear', 'Booked'),
(2, '11', 'Cabin Type 2', '600', 'A,B,C,D,E', 'R,O,N,Y', 'Booked'),
(3, '12', 'Cabin Type 3', '700', 'Aracelis Sparling', 'Alex Joe', 'Booked'),
(4, '50', 'Cabin Type 1', '680', 'Alex Joe', 'Aracelis Sparling', 'Booked'),
(5, '100', 'Cabin Type 3', '1212', 'Andru Gear', 'Andru Gear', 'Booked');

-- --------------------------------------------------------

--
-- Table structure for table `closing`
--

CREATE TABLE `closing` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `opening` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `income` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cost` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `salary_cost` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hand_cash` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `opening_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'auto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `closing`
--

INSERT INTO `closing` (`id`, `date`, `opening`, `income`, `cost`, `salary_cost`, `bank`, `hand_cash`, `opening_type`) VALUES
(1, '2017-03-21', '880', '880', '500', '100', '1000', '-10620', 'auto'),
(2, '2017-03-22', '-10119', '501', '100', '0', '0', '-10219', 'auto'),
(3, '2017-03-23', '-7569', '2650', '0', '0', '0', '-7569', 'auto');

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE `commission` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `person` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `balance` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `ref` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'expression [ registration:10 or pathology:15 ]. registration -> ID = 10 and pathology -> ID = 15',
  `person` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `person_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'doctors:ID or marketer:ID or pc:ID',
  `type` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`id`, `date`, `ref`, `person`, `person_id`, `type`, `amount`) VALUES
(16, '2017-05-06', 'registration:27', 'Jayanta Biswas', '', 'referred', '10.00'),
(17, '2017-05-06', 'registration:28', 'Jayanta Biswas', '', 'referred', '10.00'),
(18, '2017-05-07', 'registration:29', 'Jayanta Biswas', '', 'referred', '50.00'),
(19, '2017-05-06', 'registration:27', 'Rony Debnath', '', 'pc', '15.00'),
(20, '2017-05-06', 'registration:27', 'Khairul Islam', '', 'marketer', '20.00'),
(21, '2017-05-07', 'registration:33', 'Jayanta Biswas', '', 'referred', '5.00'),
(22, '2017-05-07', 'registration:33', 'Rony Debnath', '', 'pc', '5.00'),
(23, '2017-05-07', 'registration:33', 'Maruf Hasan', '', 'marketer', '5.00'),
(24, '2017-05-07', 'registration:34', 'Rony Debnath', '', 'pc', '10.00'),
(25, '2017-05-07', 'registration:37', 'Jayanta Biswas', '', 'referred', '10.00'),
(26, '2017-05-08', 'registration:38', 'Jayanta Biswas', '', 'referred', '15.00'),
(27, '2017-05-08', 'registration:41', 'Jayanta Biswas', '', 'referred', '0.00'),
(28, '2017-05-08', 'registration:42', 'Jayanta Biswas', '', 'referred', '0.00'),
(29, '2017-05-08', 'registration:43', 'Jayanta Biswas', '', 'referred', '10.00'),
(30, '2017-05-08', 'registration:43', 'Rony Debnath', '', 'pc', '10.00'),
(31, '2017-05-08', 'registration:44', 'Rony Debnath', '1', 'pc', '10.00'),
(32, '2017-05-09', 'registration:46', 'Jayanta Biswas', '4', 'referred', '0.00'),
(33, '2017-05-09', 'registration:46', 'Rony Debnath', '4', 'pc', '0.00'),
(34, '2017-05-09', 'registration:46', 'Maruf Hasan', '3', 'marketer', '0.00'),
(35, '2017-05-06', 'registration:30', 'Khairul Islam', '', 'marketer', '10.00'),
(36, '2017-05-09', 'registration:47', 'Abir Khan', '1', 'referred', '20.00'),
(37, '2017-05-09', 'registration:47', 'Rony Debnath', '3', 'pc', '20.00'),
(38, '2017-05-09', 'registration:47', 'Maruf Hasan', '4', 'marketer', '10.00'),
(39, '2017-05-09', 'registration:49', 'Jayanta Biswas', '4', 'referred', '15.00'),
(40, '2017-05-09', 'registration:51', 'Jayanta Biswas', '4', 'referred', '10.00'),
(41, '2017-05-09', 'registration:52', 'Jayanta Biswas', '4', 'referred', '15.00'),
(42, '2017-05-09', 'registration:53', 'Jayanta Biswas', '3', 'referred', '10.00'),
(43, '2017-05-09', 'registration:53', 'Rony Debnath', '3', 'pc', '15.00'),
(44, '2017-05-09', 'registration:53', 'Maruf Hasan', '3', 'marketer', '20.00'),
(45, '2017-05-09', 'registration:54', 'Amir Chand mitro', '4', 'referred', '20.00'),
(46, '2017-05-09', 'registration:54', 'Rony Debnath', '3', 'pc', '5.00'),
(47, '2017-05-09', 'registration:54', 'Imtiaz ', '4', 'marketer', '10.00'),
(48, '2017-05-09', 'registration:55', 'Jayanta Biswas', '1', 'referred', '0.00'),
(49, '2017-05-09', 'registration:55', 'Rony Debnath', '1', 'pc', '0.00'),
(50, '2017-05-09', 'registration:55', 'Maruf Hasan', '1', 'marketer', '0.00'),
(51, '2017-05-10', 'registration:56', 'Jayanta Biswas', '4', 'referred', '0.00'),
(52, '2017-05-10', 'registration:56', 'Rony Debnath', '3', 'pc', '10.00'),
(53, '2017-05-10', 'registration:56', 'Maruf Hasan', '1', 'marketer', '0.00'),
(54, '2017-05-10', 'registration:58', 'Jayanta Biswas', '3', 'referred', '20.00'),
(55, '2017-05-10', 'registration:58', 'Rony Debnath', '4', 'pc', '15.00'),
(56, '2017-05-10', 'registration:58', 'Maruf Hasan', '1', 'marketer', '17.00');

-- --------------------------------------------------------

--
-- Table structure for table `commission_meta`
--

CREATE TABLE `commission_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_date` date NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `person` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `due` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `commission_meta`
--

INSERT INTO `commission_meta` (`id`, `payment_date`, `type`, `person`, `balance`, `amount`, `due`) VALUES
(15, '2017-05-10', '', 'Jayanta Biswas', '0.00', '1500.00', '-1500.00');

-- --------------------------------------------------------

--
-- Table structure for table `consultancies`
--

CREATE TABLE `consultancies` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `pid` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `doctor` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ID of doctors table',
  `room` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8_unicode_ci COMMENT 'any description for patient',
  `bill` int(11) NOT NULL COMMENT 'ID of bills table',
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'pending or complete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `consultancies`
--

INSERT INTO `consultancies` (`id`, `date`, `pid`, `doctor`, `room`, `notes`, `bill`, `status`) VALUES
(18, '2017-05-06', '1705060028', '3', '5', NULL, 12, 'pending'),
(19, '2017-05-06', '1705060028', '6', '8', NULL, 12, 'pending'),
(20, '2017-05-06', '1705060028', '7', '7', NULL, 12, 'pending'),
(21, '2017-05-06', '1705060028', '', '', NULL, 12, 'pending'),
(22, '2017-05-07', '1705070034', '11', '10', NULL, 15, 'pending'),
(23, '2017-05-06', '1705060001', '3', '5', NULL, 18, 'pending'),
(24, '2017-05-06', '1705060028', '3', '3', NULL, 19, 'pending'),
(25, '2017-05-07', '1705070037', '3', '5', NULL, 20, 'pending'),
(26, '2017-05-07', '1705070037', '6', '8', NULL, 20, 'pending'),
(27, '2017-05-07', '1705070037', '7', '7', NULL, 20, 'pending'),
(28, '2017-05-08', '1705080038', '6', '8', NULL, 21, 'pending'),
(29, '2017-05-08', '1705080038', '8', '6', NULL, 21, 'pending'),
(30, '2017-05-06', '	1705060028', '6', '8', NULL, 23, 'pending'),
(31, '2017-05-08', '1705080041', '3', '5', NULL, 24, 'pending'),
(32, '2017-05-09', '1705090049', '6', '8', NULL, 45, 'pending'),
(33, '2017-05-09', '1705090049', '8', '6', NULL, 45, 'pending'),
(34, '2017-05-09', '1705090055', '6', '8', NULL, 51, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE `cost` (
  `id` int(100) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `cost_field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `spend_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cost`
--

INSERT INTO `cost` (`id`, `date`, `cost_field`, `description`, `amount`, `spend_by`) VALUES
(1, '2017-03-21', 'Employee Salary', 'Lorem ipsum dolor sit amet', '500', 'Rony Debnath'),
(2, '2017-02-11', 'Electricity Bill', 'Lorem ipsum dolor sit amet', '6000', 'Araf Karim'),
(3, '2017-02-11', 'Maintenance', 'Lorem ipsum dolor sit amet', '7000', 'Jayanta Biswas'),
(4, '2017-02-16', 'Rent', 'afsadf', '500', 'Maruf hasan'),
(5, '2017-03-22', 'Electricity Bill', 'asa', '100', 'Rony'),
(6, '2017-03-22', 'Rent', 'Sub Let House Rent', '2200', 'Abdullah'),
(7, '2017-03-22', 'Rent', 'Ven Rent', '250', 'Abdullah'),
(8, '2017-03-22', 'Maintenance', 'kokmomko', '2200', 'njijni'),
(9, '2017-03-22', 'Maintenance', 'fsgsgsgsr', '2000', 'dsfsedf'),
(10, '2017-03-22', 'Electricity Bill', 'zgss', '1500', 'sgdgh'),
(11, '2017-03-22', 'Electricity Bill', 'ydjdfhdfh', '5000', 'xdfgfdgh'),
(12, '2017-03-22', 'Store Rent', 'xddxfhgdg', '10000', 'xdcfgvnhm'),
(13, '2017-03-22', 'Store Rent', ' vcbfdgr', '12000', 'sdgsgsdrg'),
(14, '2017-03-22', 'Labor Cost', 'xcghhfdhfh', '500', 'thfgyj'),
(15, '2017-03-22', 'Labor Cost', 'fghht', '700', 'Abdullah'),
(16, '2017-03-22', 'Rent', 'fgjhdtdt', '3600', 'jfjfgjgfg'),
(17, '2017-03-22', 'Rent', 'xdfhftft', '4500', 'dsfsedf'),
(18, '2017-03-21', 'Rent', 'fxgdgdgdg', '1800', 'nfgjyytutyu'),
(19, '2017-03-21', 'Rent', 'dffhgfthfth', '8500', 'hfghfghfg'),
(20, '2017-03-21', 'Maintenance', 'gjfgjfyjty', '2000', 'vvvvvvvvvvvvvvvvvvvvvv'),
(21, '2017-03-21', 'Maintenance', 'deeefffffff', '1800', 'dfgrtuuyg'),
(22, '2017-03-21', 'Electricity Bill', 'dhgjhgjtyty', '8000', 'dfythjhj'),
(23, '2017-03-21', 'Electricity Bill', 'gchngfgfj', '8700', 'nfdhjdfh'),
(24, '2017-03-21', 'Store Rent', 'hfhjfhf', '15000', 'xgfhfjfjfj'),
(25, '2017-03-21', 'Store Rent', 'fgnjhfjfj', '18000', 'nhhh'),
(26, '2017-03-21', 'Labor Cost', 'xgfgfgxfgg', '400', 'gfghfghxfghh'),
(27, '2017-03-21', 'Labor Cost', 'ghjfgjfjh', '600', 'gfjhjjty'),
(28, '2017-03-21', 'Rent', 'jjhfgj', '6000', 'jgjghjghj'),
(29, '2017-03-21', 'Rent', 'fdjjdttyu', '9000', 'cfhfgjhghj');

-- --------------------------------------------------------

--
-- Table structure for table `cost_field`
--

CREATE TABLE `cost_field` (
  `id` int(100) UNSIGNED NOT NULL,
  `cost_field` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cost_field`
--

INSERT INTO `cost_field` (`id`, `cost_field`) VALUES
(1, 'Employee Salary'),
(2, 'Rent'),
(3, 'Maintenance'),
(4, 'Electricity Bill'),
(5, 'Store Rent'),
(6, 'Labor Cost');

-- --------------------------------------------------------

--
-- Table structure for table `deduction_structure`
--

CREATE TABLE `deduction_structure` (
  `id` int(10) UNSIGNED NOT NULL,
  `eid` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fields` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `deduction_structure`
--

INSERT INTO `deduction_structure` (`id`, `eid`, `fields`, `amount`, `remarks`, `status`) VALUES
(9, '0004', 'Advanced Pay', '800.00', '', ''),
(10, '0004', 'Professional Tax ', '600.00', '', ''),
(11, '0004', 'Loan', '400.00', '', ''),
(12, '0004', 'Provisional Fund', '200.00', '', ''),
(13, '0005', 'Advanced Pay', '800.00', '', ''),
(14, '0005', 'Professional Tax ', '600.00', '', ''),
(15, '0005', 'Loan', '400.00', '', ''),
(16, '0005', 'Provisional Fund', '200.00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `delivery` date NOT NULL COMMENT 'Date value',
  `pid` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Test name',
  `group` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Test group',
  `result` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remarks` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Normal, High, Low etc',
  `amount` decimal(10,2) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `bill` int(11) NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`id`, `date`, `delivery`, `pid`, `name`, `group`, `result`, `remarks`, `amount`, `cost`, `bill`, `status`) VALUES
(2, '2017-05-07', '2017-05-13', '1705070029', 'Blood Sugar- GTT', 'BIOCHEMISTRY', NULL, NULL, '200.00', '0.00', 13, 'pending'),
(3, '2017-05-07', '2017-05-13', '1705070029', 'PCV,MCV,MCH,MCHC', 'HAEMATOLOGY', NULL, NULL, '300.00', '0.00', 13, 'pending'),
(4, '2017-05-07', '2017-05-13', '1705070029', 'CBC/TC,DC,ESR,Hb%', 'HAEMATOLOGY', NULL, NULL, '200.00', '0.00', 13, 'pending'),
(5, '2017-05-07', '2017-05-13', '1705070029', 'Urine Pregnancy (HCG) Test', 'IMMUNOLOGY', NULL, NULL, '500.00', '0.00', 13, 'pending'),
(6, '2017-05-07', '2017-05-13', '1705070029', 'KUB', 'ULTRASONOGRAPHT', NULL, NULL, '100.00', '0.00', 13, 'pending'),
(7, '2017-05-07', '2017-05-13', '1705070029', 'ECG', 'ECG', NULL, NULL, '580.00', '0.00', 13, 'pending'),
(8, '2017-05-07', '2017-05-13', '1705070029', 'ABCD', 'HAEMATOLOGY', NULL, NULL, '500.00', '250.00', 13, 'pending'),
(9, '2017-05-07', '2017-05-13', '1705070029', 'Khairul', 'FLUIDS', NULL, NULL, '2000.00', '1650.00', 13, 'pending'),
(10, '2017-05-07', '2017-05-13', '1705070029', 'efg', 'Abc', NULL, NULL, '500.00', '6022.00', 13, 'pending'),
(11, '2017-05-08', '0000-00-00', '1705080042', 'Blood Sugar- GTT', 'BIOCHEMISTRY', NULL, NULL, '200.00', '0.00', 26, 'pending'),
(12, '2017-05-08', '0000-00-00', '1705080042', 'efg', 'Abc', NULL, NULL, '500.00', '6022.00', 26, 'pending'),
(13, '2017-05-08', '0000-00-00', '1705080042', 'Blood Sugar- GTT', 'BIOCHEMISTRY', NULL, NULL, '200.00', '0.00', 26, 'pending'),
(14, '2017-05-08', '0000-00-00', '1705080042', 'PCV,MCV,MCH,MCHC', 'HAEMATOLOGY', NULL, NULL, '300.00', '0.00', 27, 'pending'),
(15, '2017-05-08', '0000-00-00', '1705080042', 'Blood Sugar- GTT', 'BIOCHEMISTRY', NULL, NULL, '200.00', '0.00', 28, 'pending'),
(16, '2017-05-09', '0000-00-00', '1705090052', 'PCV,MCV,MCH,MCHC', 'HAEMATOLOGY', NULL, NULL, '300.00', '0.00', 48, 'pending'),
(17, '2017-05-09', '0000-00-00', '1705090052', 'CBC/TC,DC,ESR,Hb%', 'HAEMATOLOGY', NULL, NULL, '200.00', '0.00', 48, 'pending'),
(18, '2017-05-09', '0000-00-00', '1705090052', 'ECG', 'ECG', NULL, NULL, '580.00', '0.00', 48, 'pending'),
(19, '2017-05-09', '0000-00-00', '1705090054', 'CBC/TC,DC,ESR,Hb%', 'HAEMATOLOGY', NULL, NULL, '200.00', '500.00', 50, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) UNSIGNED NOT NULL,
  `fullName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `degree` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `specialised` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hospital` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fee` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `commission` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `room_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `fullName`, `designation`, `degree`, `specialised`, `hospital`, `mobile`, `phone`, `email`, `fee`, `commission`, `address`, `image`, `room_no`) VALUES
(3, 'Jayanta Biswas', 'Anesthisia', 'Unknown', 'A', 'Unknown', '01775219457', '456963', 'bjayanta.neo@gmail.com', '501', '20', 'Mymensingh', 'public/upload/doctors/doctor-1486288392.png', '5'),
(6, 'Imtiaz Ahmed', 'Asst_Professor', 'Unknown', 'B', 'Unknown', '01775219457', '456963', 'bjayanta.neo@gmail.com', '502', '20', 'Unknown', 'public/upload/doctors/doctor-1486277271.png', '8'),
(7, 'Araf Karim', 'Asst_Professor', 'Unknown', 'C', 'Unknown', '01775219457', '456963', 'bjayanta.neo@gmail.com', '503', '20', 'Unknown', 'public/upload/doctors/doctor-1486277271.png', '7'),
(8, 'Maruf Hasan', 'Anesthisia', 'Unknown', 'D', 'Unknown', '01775219457', '456963', 'bjayanta.neo@gmail.com', '504', '20', 'Unknown', 'public/upload/doctors/doctor-1486277271.png', '6'),
(9, 'Rony Debnath', 'Asst_Professor', 'Unknown', 'E', 'Unknown', '01775219457', '456963', 'bjayanta.neo@gmail.com', '505', '20', 'Unknown', 'public/upload/doctors/doctor-1486277271.png', '9'),
(10, 'Khairul', 'Professor', 'Unknown', 'F', 'Unknown', '01775219457', '456963', 'bjayanta.neo@gmail.com', '506', '20', 'Unknown', 'public/upload/doctors/doctor-1486988610.jpg', '2'),
(11, 'Abid Khan', 'Professor', 'Msc', 'G', 'MMC', '01624390079', '01624390079', 'abc@gmail.com', '1000', '8', 'abc ', 'public/upload/doctors/doctor-1487824464.jpg', '10'),
(12, 'Maruf', 'Asst_Professor', 'dfd', 'H', 'Unknown', '01234567890', '4545', 'ronycse9@gmail.com', '500', '10', 'fdfdf', 'public/upload/doctors/doctor-1487996589.png', '44');

-- --------------------------------------------------------

--
-- Table structure for table `emergencies`
--

CREATE TABLE `emergencies` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `pid` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8_unicode_ci,
  `bill` int(11) NOT NULL COMMENT 'ID of bills table',
  `status` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `emergencies`
--

INSERT INTO `emergencies` (`id`, `date`, `pid`, `notes`, `bill`, `status`) VALUES
(5, '2017-05-09', '1705090053', 'emergency', 49, 'emergency');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `emp_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `joining_date` date NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `present_address` text COLLATE utf8_unicode_ci NOT NULL,
  `permanent_address` text COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `date`, `emp_id`, `name`, `joining_date`, `gender`, `mobile`, `present_address`, `permanent_address`, `designation`, `path`, `status`) VALUES
(3, '2017-02-14', '0003', 'Jayanta Biswas', '2017-02-14', 'Male', '01735189237', 'Mymensingh', 'Mymensingh', 'Accountant', 'public/upload/employee/employee_86069_0003.png', 'active'),
(4, '2017-02-27', '0001', 'Sirazul Islam', '2007-10-10', 'Male', '01775219457', 'Mymensingh, Dhaka Bangladesh.', 'Mymensingh, Dhaka Bangladesh.', 'Accountant', 'public/employee/employee_55365_0001.jpg', 'active'),
(5, '2017-02-27', '0002', 'Kamrul Islam', '2008-10-10', 'Male', '01757674512', 'fjoidd khkf', 'fjoidd khkf', 'Security Gard', 'public/employee/employee_33211_0002.jpg', 'disabled'),
(6, '2017-02-27', '0004', 'Samima Akther', '2016-10-10', 'Female', '01969552552', 'oounvknf kjdhkfndf', 'oounvknf kjdhkfndf', 'Office Assistant', 'public/employee/employee_40850_0004.jpg', 'active'),
(7, '2017-03-16', '0005', 'Khairul Islam', '2016-12-01', 'Male', '01822481485', 'Mymensingh', 'Mymensingh', 'Director', 'public/employee/employee_69616_0005.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `group_name`
--

CREATE TABLE `group_name` (
  `id` int(10) NOT NULL,
  `group_name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incentive_structure`
--

CREATE TABLE `incentive_structure` (
  `id` int(10) UNSIGNED NOT NULL,
  `eid` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fields` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `percentage` decimal(10,2) NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `incentive_structure`
--

INSERT INTO `incentive_structure` (`id`, `eid`, `fields`, `percentage`, `remarks`, `status`) VALUES
(16, '0002', 'HRA', '10.00', '', ''),
(17, '0002', 'DA', '8.00', '', ''),
(18, '0002', 'TA', '6.00', '', ''),
(19, '0002', 'CCA', '4.00', '', ''),
(20, '0002', 'Medical', '2.00', '', ''),
(21, '0003', 'HRA', '10.00', '', ''),
(22, '0003', 'DA', '8.00', '', ''),
(23, '0003', 'TA', '6.00', '', ''),
(24, '0003', 'CCA', '4.00', '', ''),
(25, '0003', 'Medical', '2.00', '', ''),
(26, '0004', 'HRA', '10.00', '', ''),
(27, '0004', 'DA', '8.00', '', ''),
(28, '0004', 'TA', '6.00', '', ''),
(29, '0004', 'CCA', '4.00', '', ''),
(30, '0004', 'Medical', '2.00', '', ''),
(31, '0005', 'HRA', '10.00', '', ''),
(32, '0005', 'DA', '8.00', '', ''),
(33, '0005', 'TA', '6.00', '', ''),
(34, '0005', 'CCA', '4.00', '', ''),
(35, '0005', 'Medical', '2.00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `investigation`
--

CREATE TABLE `investigation` (
  `id` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `test_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `test_fee` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `room` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `investigation`
--

INSERT INTO `investigation` (`id`, `date`, `group`, `test_name`, `test_fee`, `cost`, `room`) VALUES
(6, '2017-05-07', 'BIOCHEMISTRY', 'Blood Sugar- GTT', '200', '0.00', '3'),
(7, '2017-05-07', 'HAEMATOLOGY', 'PCV,MCV,MCH,MCHC', '300', '0.00', '5'),
(8, '2017-05-07', 'HAEMATOLOGY', 'CBC/TC,DC,ESR,Hb%', '200', '0.00', '7'),
(9, '2017-05-07', 'IMMUNOLOGY', 'Urine Pregnancy (HCG) Test', '500', '0.00', '4'),
(10, '2017-05-07', 'ULTRASONOGRAPHT', 'KUB', '100', '0.00', '1'),
(11, '2017-02-28', 'ECG', 'ECG', '580', '0.00', '2'),
(12, '2017-03-12', 'HAEMATOLOGY', 'ABCD', '500', '250.00', '6'),
(13, '2017-03-12', 'FLUIDS', 'Khairul', '2000', '1650.00', '8'),
(14, '2017-05-07', 'Abc', 'efg', '500', '6022.00', '701');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `ref` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'expression [ registration:10 or pathology:15 or pid:123456 ]. registration -> ID = 10 and pathology -> ID = 15 and pid = patient ID',
  `details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'income or cost or liability or assets'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`id`, `date`, `ref`, `details`, `amount`, `status`) VALUES
(6, '2017-05-06', 'registration:28', 'consultancy', '1200.00', 'income'),
(7, '2017-05-06', 'registration:28', 'consultancy', '1200.00', 'income'),
(8, '2017-05-06', 'registration:28', 'consultancy', '1200.00', 'income'),
(9, '2017-05-06', 'registration:28', 'consultancy', '1200.00', 'income'),
(10, '2017-05-06', 'registration:28', 'consultancy', '1200.00', 'income'),
(11, '2017-05-06', 'registration:28', 'consultancy', '1200.00', 'income'),
(12, '2017-05-07', 'registration:29', 'diagnosis', '4000.00', 'income'),
(23, '2017-05-07', 'registration:29', 'diagnosis', '4000.00', 'income'),
(24, '2017-05-07', 'registration:34', 'consultancy', '500.00', 'income'),
(25, '2017-05-07', 'registration:35', 'admission', '3500.00', 'income'),
(26, '2017-05-07', 'registration:36', 'admission', '10.00', 'income'),
(27, '2017-05-06', 'registration:27', 'consultancy', '0.00', 'income'),
(28, '2017-05-06', 'pid:1705070034', 'operation', '4560.00', 'cost'),
(29, '2017-05-06', 'registration:28', 'consultancy', '0.00', 'income'),
(30, '2017-05-07', 'registration:37', 'consultancy', '1200.00', 'income'),
(31, '2017-05-08', 'registration:38', 'consultancy', '1200.00', 'income'),
(32, '2017-05-08', 'registration:40', 'emergency', '400.00', 'income'),
(33, '2017-05-06', 'registration:', 'consultancy', '0.00', 'income'),
(34, '2017-05-08', 'registration:41', 'consultancy', '0.00', 'income'),
(35, '2017-05-06', 'registration:28', 'admission', '2.00', 'income'),
(36, '2017-05-08', 'registration:42', 'diagnosis', '600.00', 'income'),
(37, '2017-05-08', 'registration:42', 'diagnosis', '6022.00', 'cost'),
(38, '2017-05-08', 'registration:42', 'diagnosis', '0.00', 'income'),
(39, '2017-05-08', 'registration:42', 'diagnosis', '0.00', 'income'),
(40, '2017-05-08', 'registration:43', 'admission', '0.00', 'income'),
(41, '2017-05-08', 'registration:44', 'admission', '400.00', 'income'),
(42, '2017-05-08', 'registration:45', 'admission', '0.00', 'income'),
(51, '2017-05-08', 'registration:27', 'operation', '10000.00', 'income'),
(52, '2017-05-08', 'pid:1705060001', 'doctors', '501.00', 'cost'),
(53, '2017-05-08', 'pid:1705060001', 'doctors', '502.00', 'cost'),
(54, '2017-05-08', 'pid:1705060001', 'doctors', '503.00', 'cost'),
(55, '2017-05-08', 'pid:1705060001', 'doctors', '503.00', 'cost'),
(56, '2017-05-09', 'registration:27', 'operation', '93000.00', 'income'),
(57, '2017-05-09', 'pid:1705060001', 'doctors', '502.00', 'cost'),
(58, '2017-05-09', 'pid:1705060001', 'doctors', '502.00', 'cost'),
(59, '2017-05-09', 'pid:1705070029', 'doctors', '502.00', 'cost'),
(60, '2017-05-09', 'registration:45', 'operation', '12000.00', 'income'),
(61, '2017-05-09', 'pid:1705080045', 'doctors', '503.00', 'cost'),
(62, '2017-05-09', 'pid:1705080045', 'doctors', '501.00', 'cost'),
(63, '2017-05-09', 'pid:1705080045', 'doctors', '505.00', 'cost'),
(64, '2017-05-09', 'registration:27', 'operation', '10000.00', 'income'),
(65, '2017-05-09', 'pid:1705060001', 'doctors', '501.00', 'cost'),
(66, '2017-05-09', 'pid:1705060001', 'doctors', '502.00', 'cost'),
(67, '2017-05-09', 'pid:1705060001', 'doctors', '502.00', 'cost'),
(68, '2017-05-09', 'registration:48', 'emergency', '0.00', 'income'),
(69, '2017-05-09', 'registration:49', 'consultancy', '800.00', 'income'),
(70, '2017-05-09', 'registration:50', 'admission', '0.00', 'income'),
(71, '2017-05-09', 'registration:51', 'admission', '0.00', 'income'),
(72, '2017-05-09', 'registration:52', 'diagnosis', '600.00', 'cost'),
(73, '2017-05-09', 'registration:53', 'emergency', '400.00', 'income'),
(74, '2017-05-09', 'registration:54', 'diagnosis', '0.00', 'income'),
(75, '2017-05-09', 'registration:54', 'diagnosis', '500.00', 'cost'),
(76, '2017-05-09', 'registration:55', 'consultancy', '500.00', 'income'),
(77, '2017-05-10', 'registration:56', 'admission', '398.00', 'income');

-- --------------------------------------------------------

--
-- Table structure for table `marketer`
--

CREATE TABLE `marketer` (
  `id` int(10) UNSIGNED NOT NULL,
  `create_at` date NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `commission` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `img_url` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `marketer`
--

INSERT INTO `marketer` (`id`, `create_at`, `name`, `mobile`, `commission`, `address`, `img_url`) VALUES
(1, '2017-02-27', 'Maruf Hasan', '01254878578', '17', 'Mymensingh', 't5kar_1m42er31e.png'),
(2, '2017-02-27', 'Rony', '01254878578', '20', 'Mymensingh', '3ar7ete2m_k2r63.png'),
(3, '2017-02-27', 'khairul Islam', '01254878578', '20', 'Mymensingh', 'ma_t472erk5re13.png'),
(5, '2017-02-27', 'Maruf Hasan', '01254878578', '20', 'Mymensingh', 'r08eat4r70e1m_k.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `messages_date` varchar(20) NOT NULL,
  `messages_name` varchar(250) NOT NULL,
  `messages_mobile` varchar(50) NOT NULL,
  `messages_text` text NOT NULL,
  `messages_condition` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `meta_info`
--

CREATE TABLE `meta_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_status` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meta_info`
--

INSERT INTO `meta_info` (`id`, `meta_key`, `meta_value`, `meta_status`) VALUES
(2, 'vat', '30', '');

-- --------------------------------------------------------

--
-- Table structure for table `operation`
--

CREATE TABLE `operation` (
  `id` int(100) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `fee` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `operation`
--

INSERT INTO `operation` (`id`, `name`, `description`, `fee`) VALUES
(2, 'Khairul Filtering', 'Cardio vus attack by khairul ', '10200'),
(4, 'Khairul Virus', 'Unknown', '25000'),
(5, 'Khairul Bacteria', 'Unknown', '6800'),
(6, 'Khairul HIV', 'Unknown', '7900'),
(7, 'Khairul Diabetic', 'Unknown', '78000');

-- --------------------------------------------------------

--
-- Table structure for table `operations`
--

CREATE TABLE `operations` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `pid` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'patients table ID',
  `operation` int(10) UNSIGNED NOT NULL COMMENT 'operation table ID',
  `specialised` int(10) UNSIGNED NOT NULL COMMENT 'doctors table ID',
  `others` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `bill` int(10) UNSIGNED NOT NULL COMMENT 'bills table ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `operations`
--

INSERT INTO `operations` (`id`, `date`, `pid`, `operation`, `specialised`, `others`, `amount`, `note`, `bill`) VALUES
(33, '2017-05-08', '1705060001', 2, 3, '', '501.00', 'Unknown', 40),
(34, '2017-05-08', '1705060001', 2, 6, '', '502.00', 'Unknown', 40),
(35, '2017-05-08', '1705060001', 2, 7, '', '503.00', 'Unknown', 40),
(36, '2017-05-08', '1705060001', 2, 0, 'Medicine', '200.00', 'Unknown', 40),
(37, '2017-05-08', '1705060001', 2, 0, 'Oxizen', '800.00', 'Unknown', 40),
(38, '2017-05-09', '1705060001', 5, 6, '', '502.00', 'test', 41),
(39, '2017-05-09', '1705060001', 5, 6, '', '502.00', 'test', 41),
(40, '2017-05-09', '1705060001', 5, 0, 'Medicine', '500.00', 'test', 41),
(41, '2017-05-09', '1705060001', 5, 0, 'Oxizen', '500.00', 'test', 41),
(42, '2017-05-09', '1705080045', 2, 7, '', '503.00', 'test', 42),
(43, '2017-05-09', '1705080045', 2, 3, '', '501.00', 'test', 42),
(44, '2017-05-09', '1705080045', 2, 9, '', '505.00', 'test', 42),
(45, '2017-05-09', '1705080045', 2, 0, 'Oxizen', '200.00', 'test', 42),
(46, '2017-05-09', '1705080045', 2, 0, 'Medicine', '500.00', 'test', 42),
(47, '2017-05-09', '1705060001', 2, 3, '', '501.00', 'Unknown', 43),
(48, '2017-05-09', '1705060001', 2, 6, '', '502.00', 'Unknown', 43),
(49, '2017-05-09', '1705060001', 2, 0, 'Medicine', '200.00', 'Unknown', 43),
(50, '2017-05-09', '1705060001', 2, 0, 'Oxizen', '1500.00', 'Unknown', 43);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `pid` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `guardian` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'JSON String. { ''relation'' : ''person name'' }',
  `gender` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci,
  `contact` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `date`, `pid`, `name`, `guardian`, `gender`, `age`, `address`, `contact`) VALUES
(27, '2017-05-06', '1705060001', 'Jayanta Biswas', '{"Father":"Joymongal Biswas"}', 'Male', 27, 'Mymensingh', '01775219457'),
(28, '2017-05-06', '1705060028', 'Jayanta Biswas', '{"Father":"Joymongal Biswas"}', 'Male', 27, 'Mymensingh', '01775219457'),
(29, '2017-05-07', '1705070029', 'Araf Karim', '{"Father":"Mr. Karim"}', 'Male', 27, 'Mymensingh', '01234567890'),
(30, '2017-05-07', '1705070029', 'demo name', '{"Father":"demo"}', 'Male', 25, 'demo', '09858745874'),
(31, '2017-05-07', '1705070031', '', '{"Father":""}', 'Male', 0, '', ''),
(32, '2017-05-07', '1705070031', '', '{"Father":""}', 'Male', 0, '', ''),
(33, '2017-05-07', '1705070033', '', '{"Father":""}', 'Male', 0, '', ''),
(34, '2017-05-07', '1705070034', 'Imtiaz', '{"Father":"Mr. Ahmed"}', 'Male', 27, 'Mymensingh', '01234567890'),
(35, '2017-05-07', '1705070035', 'ABC', '{"Father":"DEF"}', 'Male', 27, 'Mymensingh', '01775219458'),
(36, '2017-05-07', '1705070036', 'Jayanta Biswas', '{"Father":"Joymongal Biswas"}', 'Male', 27, 'asdf', '01775219457'),
(37, '2017-05-07', '1705070037', 'Amin', '{"Father":"Father"}', 'Male', 25, 'Mongal Graha', '01775219459'),
(38, '2017-05-08', '1705080038', 'test2017', '{"Father":"test2017"}', 'Male', 25, 'test2017', '09858745875'),
(39, '2017-05-08', '1705080039', 'test201', '{"Father":"test201"}', 'Male', 25, 'test201', '09685748521'),
(40, '2017-05-08', '1705080040', 'test203', '{"Father":"test203"}', 'Male', 0, 'test203', '01254875854'),
(41, '2017-05-08', '1705080041', 'test204', '{"Father":"test204"}', 'Male', 25, 'test204', '12586985745'),
(42, '2017-05-08', '1705080042', 'test205', '{"Father":"test205"}', 'Male', 25, 'test205', '0985874587'),
(43, '2017-05-08', '1705080043', 'test206', '{"Father":"test206"}', 'Male', 25, 'test206', '01985693258'),
(44, '2017-05-08', '1705080044', 'Woadud Akanda', '{"Father":"Mr. Aknda"}', 'Male', 23, 'Mymensingh', '01234567890'),
(45, '2017-05-08', '1705080045', 'test207', '{"Father":"test207"}', 'Male', 52, 'test207', '01965825874'),
(46, '2017-05-09', '1705090046', '1705080040', '{"Father":"Khalilur Rahman"}', 'Male', 20, 'hghghgh', '016524390079'),
(47, '2017-05-09', '1705090047', 'Khani Khan', '{"Father":"fdsfsdfs"}', 'Male', 10, 'hjghjghj', '01624390079'),
(48, '2017-05-09', '1705090048', 'test208', '{"Father":"test208"}', 'Male', 25, 'test208', '01968532587'),
(49, '2017-05-09', '1705090049', 'test209', '{"Father":"test209"}', 'Male', 20, 'test209', '01985625478'),
(50, '2017-05-09', '1705090050', 'test210', '{"Father":"test210"}', 'Male', 20, 'test210', '01968532587'),
(51, '2017-05-09', '1705090051', 'test211', '{"Father":"test211"}', 'Male', 20, 'test211', '01968532587'),
(52, '2017-05-09', '1705090052', 'test212', '{"Father":"test212"}', 'Male', 25, 'test212', '01985874587'),
(53, '2017-05-09', '1705090053', 'Sohel ', '{"Father":"Mr. Rahman"}', 'Male', 27, 'Mymensingh', '01234567890'),
(54, '2017-05-09', '1705090054', 'Numan', '{"Father":"Abc"}', 'Male', 20, 'ASFSDFSDFSDF ', '011624390079'),
(55, '2017-05-09', '1705090055', 'Maria Khan', '{"Father":"Abc"}', 'Male', 20, 'dfd', '011624390079'),
(56, '2017-05-10', '1705100056', 'Lima Akter', '{"Husband":"Imtiaz Ahmed"}', 'Female', 20, 'dfddsafsd', '01600000000'),
(57, '2017-05-10', '1705100057', 'Waduad', '{"Father":["Jayanta Biswas","Rony Debnath","Maruf Hasan"]}', 'Male', 22, 'Mymensingh', '01775219459'),
(58, '2017-05-10', '1705100057', 'Waduad', '{"Father":["Jayanta Biswas","Rony Debnath","Maruf Hasan"]}', 'Male', 22, 'Mymensingh', '01775219459');

-- --------------------------------------------------------

--
-- Table structure for table `pc`
--

CREATE TABLE `pc` (
  `id` int(11) UNSIGNED NOT NULL,
  `fullName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `commission` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pc`
--

INSERT INTO `pc` (`id`, `fullName`, `mobile`, `commission`, `address`, `image`) VALUES
(4, 'Rony Debnath', '01822481485', '15', 'Kalibari, Mymensingh', 'public/upload/pc/neco_1o0l_crlta5p2et26t.png'),
(5, 'Maruf Hasan', '01775219457', '15', 'Unknown', 'public/upload/pc/patent-collector-1488000097.jpg'),
(6, 'Khairul Islam', '01775219457', '15', 'Unknown', 'public/upload/pc/patent-collector-1488000106.png');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `pid` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ID of patients. Connect to patients table. ',
  `type` varchar(45) COLLATE utf8_unicode_ci NOT NULL COMMENT 'admission or, consultancy or, emergency or, pathology',
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'pending or admitted or released or consultancy or emergency'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `date`, `pid`, `type`, `status`) VALUES
(27, '2017-05-06', '1705060001', 'admissions', 'admitted'),
(28, '2017-05-06', '1705060028', 'consultancies', 'consultancy'),
(29, '2017-05-07', '1705070029', 'diagnosis', 'diagnosis'),
(30, '2017-05-07', '1705070029', 'emergencies', 'emergency'),
(31, '2017-05-07', '1705070031', 'consultancies', 'consultancy'),
(32, '2017-05-07', '1705070031', 'emergencies', 'emergency'),
(33, '2017-05-07', '1705070033', 'admissions', 'admitted'),
(34, '2017-05-07', '1705070034', 'consultancies', 'consultancy'),
(35, '2017-05-07', '1705070035', 'admissions', 'admitted'),
(36, '2017-05-07', '1705070036', 'admissions', 'admitted'),
(37, '2017-05-07', '1705070037', 'consultancies', 'consultancy'),
(38, '2017-05-08', '1705080038', 'consultancies', 'consultancy'),
(39, '2017-05-08', '1705080039', 'consultancies', 'consultancy'),
(40, '2017-05-08', '1705080040', 'emergencies', 'emergency'),
(41, '2017-05-08', '1705080041', 'consultancies', 'consultancy'),
(42, '2017-05-08', '1705080042', 'diagnosis', 'diagnosis'),
(43, '2017-05-08', '1705080043', 'admissions', 'admitted'),
(44, '2017-05-08', '1705080044', 'admissions', 'admitted'),
(45, '2017-05-08', '1705080045', 'admissions', 'admitted'),
(46, '2017-05-09', '1705090046', 'emergencies', 'emergency'),
(47, '2017-05-09', '1705090047', 'emergencies', 'emergency'),
(48, '2017-05-09', '1705090048', 'emergencies', 'emergency'),
(49, '2017-05-09', '1705090049', 'consultancies', 'consultancy'),
(50, '2017-05-09', '1705090050', 'admissions', 'admitted'),
(51, '2017-05-09', '1705090051', 'admissions', 'admitted'),
(52, '2017-05-09', '1705090052', 'diagnosis', 'diagnosis'),
(53, '2017-05-09', '1705090053', 'emergencies', 'emergency'),
(54, '2017-05-09', '1705090054', 'diagnosis', 'diagnosis'),
(55, '2017-05-09', '1705090055', 'consultancies', 'consultancy'),
(56, '2017-05-10', '1705100056', 'admissions', 'admitted'),
(57, '2017-05-10', '1705100057', 'consultancies', 'consultancy'),
(58, '2017-05-10', '1705100057', 'consultancies', 'consultancy');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `salary_amount` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bonus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `issue_date` date NOT NULL,
  `payment_year` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `payment_month` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `payment_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `emp_id`, `salary_amount`, `bonus`, `issue_date`, `payment_year`, `payment_month`, `payment_type`, `bank_name`, `account_number`) VALUES
(1, 5, '5500', '', '2016-12-28', '2016', 'February', 'bank', 'Agrani_Bank_Limited', '5444694654654654'),
(2, 5, '5500', '', '2016-12-28', '2016', 'January', 'bank', 'Agrani_Bank_Limited', '5444694654654654'),
(3, 5, '5500', '', '2016-12-27', '2016', 'September', 'bank', 'Agrani_Bank_Limited', '5444694654654654'),
(4, 33, '500', '', '2017-01-17', '2017', 'January', 'cash', '0', ''),
(5, 2, '25000', '255', '2017-02-06', '2017', 'February', 'cash', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `salary_records`
--

CREATE TABLE `salary_records` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `eid` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fields` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amounts` decimal(10,2) NOT NULL,
  `remarks` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salary_records`
--

INSERT INTO `salary_records` (`id`, `date`, `eid`, `fields`, `amounts`, `remarks`, `status`) VALUES
(40, '2017-03-21', '0001', 'basic', '10000.00', 'basic', ''),
(41, '2017-03-18', '0002', 'basic', '12000.00', 'basic', ''),
(42, '2017-03-18', '0002', 'HRA', '1200.00', 'insentive', ''),
(43, '2017-03-18', '0002', 'DA', '960.00', 'insentive', ''),
(44, '2017-03-18', '0002', 'TA', '720.00', 'insentive', ''),
(45, '2017-03-18', '0002', 'CCA', '480.00', 'insentive', ''),
(46, '2017-03-18', '0002', 'Medical', '240.00', 'insentive', ''),
(47, '2017-03-18', '0002', 'Extra', '0.00', 'insentive', ''),
(48, '2017-03-18', '0003', 'basic', '14000.00', 'basic', ''),
(49, '2017-03-18', '0003', 'HRA', '1400.00', 'insentive', ''),
(50, '2017-03-18', '0003', 'DA', '1120.00', 'insentive', ''),
(51, '2017-03-18', '0003', 'TA', '840.00', 'insentive', ''),
(52, '2017-03-18', '0003', 'CCA', '560.00', 'insentive', ''),
(53, '2017-03-18', '0003', 'Medical', '280.00', 'insentive', ''),
(54, '2017-03-18', '0003', 'Extra', '0.00', 'insentive', ''),
(55, '2017-03-18', '0003', 'Choto Eid', '7000.00', 'bonus', ''),
(56, '2017-03-18', '0003', 'Boro Eid', '7000.00', 'bonus', ''),
(57, '2017-03-18', '0003', 'Puja', '7000.00', 'bonus', ''),
(58, '2017-03-18', '0003', 'Extra', '0.00', 'bonus', '');

-- --------------------------------------------------------

--
-- Table structure for table `salary_structure`
--

CREATE TABLE `salary_structure` (
  `id` int(10) UNSIGNED NOT NULL,
  `eid` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `basic` decimal(10,2) NOT NULL,
  `incentive` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `deduction` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `bonus` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salary_structure`
--

INSERT INTO `salary_structure` (`id`, `eid`, `basic`, `incentive`, `deduction`, `bonus`) VALUES
(9, '0001', '10000.00', 'no', 'no', 'no'),
(10, '0002', '12000.00', 'yes', 'no', 'no'),
(11, '0003', '14000.00', 'yes', 'no', 'yes'),
(12, '0004', '16000.00', 'yes', 'yes', 'yes'),
(13, '0005', '18000.00', 'yes', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('0d0cfeddb0b7e564c275528d8af14781', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 1494410169, 'a:12:{s:9:"user_data";s:0:"";s:7:"user_id";s:2:"24";s:12:"login_period";s:22:"2017-05-10 10:18:25 am";s:4:"name";s:10:"Superadmin";s:5:"email";s:14:"asdf@yahoo.com";s:8:"username";s:10:"superadmin";s:6:"mobile";s:11:"01912000000";s:9:"privilege";s:5:"admin";s:5:"image";s:30:"public/profiles/superadmin.jpg";s:6:"branch";s:1:"1";s:6:"holder";s:5:"admin";s:8:"loggedin";b:1;}'),
('3276f92b3f73ab52b882bf98c76e0c74', '192.168.1.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.96 Safari/537.36', 1494414417, 'a:12:{s:9:"user_data";s:0:"";s:7:"user_id";s:2:"24";s:12:"login_period";s:22:"2017-05-10 10:00:46 am";s:4:"name";s:10:"Superadmin";s:5:"email";s:14:"asdf@yahoo.com";s:8:"username";s:10:"superadmin";s:6:"mobile";s:11:"01912000000";s:9:"privilege";s:5:"admin";s:5:"image";s:30:"public/profiles/superadmin.jpg";s:6:"branch";s:1:"1";s:6:"holder";s:5:"admin";s:8:"loggedin";b:1;}'),
('474a57e958e2d399ac8b2c3d0c370eb4', '192.168.1.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.96 Safari/537.36', 1494417154, 'a:12:{s:9:"user_data";s:0:"";s:7:"user_id";s:2:"24";s:12:"login_period";s:22:"2017-05-10 17:07:10 pm";s:4:"name";s:10:"Superadmin";s:5:"email";s:14:"asdf@yahoo.com";s:8:"username";s:10:"superadmin";s:6:"mobile";s:11:"01912000000";s:9:"privilege";s:5:"admin";s:5:"image";s:30:"public/profiles/superadmin.jpg";s:6:"branch";s:1:"1";s:6:"holder";s:5:"admin";s:8:"loggedin";b:1;}'),
('639db106606c9de84a068971cb94457e', '192.168.1.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.96 Safari/537.36', 1494417724, 'a:12:{s:9:"user_data";s:0:"";s:7:"user_id";s:2:"24";s:12:"login_period";s:22:"2017-05-10 16:52:27 pm";s:4:"name";s:10:"Superadmin";s:5:"email";s:14:"asdf@yahoo.com";s:8:"username";s:10:"superadmin";s:6:"mobile";s:11:"01912000000";s:9:"privilege";s:5:"admin";s:5:"image";s:30:"public/profiles/superadmin.jpg";s:6:"branch";s:1:"1";s:6:"holder";s:5:"admin";s:8:"loggedin";b:1;}'),
('7942e64f2e1541923fe789fab29c166f', '192.168.0.107', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/20100101 Firefox/47.0', 1498906757, 'a:12:{s:9:"user_data";s:0:"";s:7:"user_id";s:2:"14";s:12:"login_period";s:22:"2017-07-01 16:59:25 pm";s:4:"name";s:10:"Superadmin";s:5:"email";s:20:"superadmin@gmail.com";s:8:"username";s:10:"superadmin";s:6:"mobile";s:11:"00000000000";s:9:"privilege";s:5:"super";s:5:"image";s:39:"public/employee/employee_superadmin.jpg";s:6:"branch";s:0:"";s:6:"holder";s:5:"super";s:8:"loggedin";b:1;}'),
('b0bf783bfb70379075c9a75dcff7fefe', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/20100101 Firefox/47.0', 1498906467, 'a:12:{s:9:"user_data";s:0:"";s:7:"user_id";s:2:"14";s:12:"login_period";s:22:"2017-07-01 16:54:31 pm";s:4:"name";s:10:"Superadmin";s:5:"email";s:20:"superadmin@gmail.com";s:8:"username";s:10:"superadmin";s:6:"mobile";s:11:"00000000000";s:9:"privilege";s:5:"super";s:5:"image";s:39:"public/employee/employee_superadmin.jpg";s:6:"branch";s:0:"";s:6:"holder";s:5:"super";s:8:"loggedin";b:1;}'),
('f61b6523646a5be8151ea2ef9686fa1b', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36', 1494417752, 'a:12:{s:9:"user_data";s:0:"";s:7:"user_id";s:2:"24";s:12:"login_period";s:22:"2017-05-10 15:56:21 pm";s:4:"name";s:10:"Superadmin";s:5:"email";s:14:"asdf@yahoo.com";s:8:"username";s:10:"superadmin";s:6:"mobile";s:11:"01912000000";s:9:"privilege";s:5:"admin";s:5:"image";s:30:"public/profiles/superadmin.jpg";s:6:"branch";s:1:"1";s:6:"holder";s:5:"admin";s:8:"loggedin";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `sms_record`
--

CREATE TABLE `sms_record` (
  `id` int(11) UNSIGNED NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_time` time NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `total_characters` varchar(4) NOT NULL,
  `total_messages` varchar(2) NOT NULL,
  `delivery_report` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_record`
--

INSERT INTO `sms_record` (`id`, `delivery_date`, `delivery_time`, `mobile`, `message`, `total_characters`, `total_messages`, `delivery_report`) VALUES
(60, '2017-03-23', '13:21:34', '01775219457', 'Hello. How r u?', '45', '1', '1'),
(59, '2017-03-23', '13:17:33', '01822481485', 'Hello, This is a test message.', '60', '1', '0'),
(58, '2017-03-23', '13:17:27', '01969552552', 'Hello, This is a test message.', '60', '1', '1'),
(57, '2017-03-23', '13:17:24', '01757674512', 'Hello, This is a test message.', '60', '1', '1'),
(56, '2017-03-23', '13:17:20', '01775219457', 'Hello, This is a test message.', '60', '1', '1'),
(55, '2017-03-23', '13:17:14', '01735189237', 'Hello, This is a test message.', '60', '1', '1'),
(61, '2017-03-23', '13:21:57', ' 01749113443', 'Hello. How r u?', '45', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `test_name`
--

CREATE TABLE `test_name` (
  `id` int(10) NOT NULL,
  `group_name` text COLLATE utf8_unicode_ci NOT NULL,
  `test_name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_date` date NOT NULL,
  `bank` varchar(100) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `transaction_type` varchar(100) NOT NULL,
  `source` varchar(255) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `transaction_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `transaction_date`, `bank`, `account_number`, `transaction_type`, `source`, `amount`, `transaction_by`) VALUES
(5, '2017-03-21', 'Sonali_Bank_Limited', '101020', 'Credit', 'Cash', '1000', 'Rony'),
(6, '2017-03-21', 'Sonali_Bank_Limited', '101020', 'Debit', 'Cash', '50', 'Jayanta'),
(7, '2017-01-25', 'Dutch_Bangla_Bank', '15610550882', 'Credit', '', '5000', 'Self'),
(8, '2017-01-25', 'Dutch_Bangla_Bank', '15610550882', 'Credit', '', '2000', 'Maruf hasan'),
(9, '2017-01-25', 'Dutch_Bangla_Bank', '15610550882', 'Debit', '', '1000', 'Maruf hasan'),
(10, '2017-02-14', 'Sonali_Bank_Limited', '101020', 'Credit', '', '1520', 'Rony'),
(11, '2017-03-21', 'Sonali_Bank_Limited', '101020', 'Debit', '', '100', 'Rony'),
(12, '2017-03-21', 'Sonali_Bank_Limited', '101020', 'Credit', 'Cash', '5', 'R'),
(13, '2017-03-23', 'Sonali_Bank_Limited', '101020', 'Debit', 'Others', '5000', 'Khairul Islam');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `opening` datetime NOT NULL,
  `name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `maritial_status` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `about` text NOT NULL,
  `website` varchar(100) NOT NULL,
  `facecbook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `privilege` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `branch` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `opening`, `name`, `l_name`, `gender`, `birthday`, `maritial_status`, `position`, `about`, `website`, `facecbook`, `twitter`, `email`, `username`, `password`, `privilege`, `image`, `mobile`, `branch`) VALUES
(24, '2016-11-14 11:41:05', 'Superadmin', 'superadmin', 'male', '2016-11-14', 'single', 'director', 'superadmin', '', '', '', 'asdf@yahoo.com', 'superadmin', '262478f2a0b13b0532b5fddd18822a0f', 'admin', 'public/profiles/superadmin.jpg', '01912000000', '1'),
(25, '2017-02-14 02:31:44', 'user2017', '', '', '', '', '', '', '', '', '', 'user2017@yahoo.com', 'user2017', 'b10784b7e4c46cd5fd916eb892528467', 'user', 'public/profiles/user2017.png', '01900000000', '2');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` int(11) UNSIGNED NOT NULL,
  `ward_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ward_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_bed` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bed_no` text COLLATE utf8_unicode_ci NOT NULL,
  `rent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supervisor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nurse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `doctor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `ward_no`, `ward_type`, `total_bed`, `bed_no`, `rent`, `supervisor`, `nurse`, `doctor`, `status`) VALUES
(11, '1', 'Ward Type 1', '20', '1', '600', 'Araf Karim', 'Alex Joe', 'Bryce Number', 'Booked'),
(12, '1', 'Ward Type 1', '20', '2', '600', 'Araf Karim', 'Alex Joe', 'Bryce Number', 'Booked'),
(13, '1', 'Ward Type 1', '20', '3', '600', 'Araf Karim', 'Alex Joe', 'Bryce Number', 'Booked'),
(14, '1', 'Ward Type 1', '20', '4', '600', 'Araf Karim', 'Alex Joe', 'Bryce Number', 'Booked'),
(15, '1', 'Ward Type 1', '20', '5', '600', 'Araf Karim', 'Alex Joe', 'Bryce Number', 'Booked'),
(16, '1', 'Ward Type 1', '20', '6', '600', 'Araf Karim', 'Alex Joe', 'Bryce Number', 'Booked'),
(17, '1', 'Ward Type 1', '20', '7', '600', 'Araf Karim', 'Alex Joe', 'Bryce Number', 'Available'),
(18, '1', 'Ward Type 1', '20', '8', '600', 'Araf Karim', 'Alex Joe', 'Bryce Number', 'Available'),
(19, '1', 'Ward Type 1', '20', '9', '600', 'Araf Karim', 'Alex Joe', 'Bryce Number', 'Available'),
(20, '1', 'Ward Type 1', '20', '10', '600', 'Araf Karim', 'Alex Joe', 'Bryce Number', 'Available'),
(21, '1', 'Ward Type 1', '20', '11', '600', 'Araf Karim', 'Alex Joe', 'Bryce Number', 'Available'),
(22, '1', 'Ward Type 1', '20', '12', '600', 'Araf Karim', 'Alex Joe', 'Bryce Number', 'Available'),
(23, '1', 'Ward Type 1', '20', '13', '600', 'Araf Karim', 'Alex Joe', 'Bryce Number', 'Available'),
(24, '1', 'Ward Type 1', '20', '14', '600', 'Araf Karim', 'Alex Joe', 'Bryce Number', 'Available'),
(25, '1', 'Ward Type 1', '20', '15', '600', 'Araf Karim', 'Alex Joe', 'Bryce Number', 'Available'),
(26, '1', 'Ward Type 1', '20', '16', '600', 'Araf Karim', 'Alex Joe', 'Bryce Number', 'Available'),
(27, '1', 'Ward Type 1', '20', '17', '600', 'Araf Karim', 'Alex Joe', 'Bryce Number', 'Available'),
(28, '1', 'Ward Type 1', '20', '18', '600', 'Araf Karim', 'Alex Joe', 'Bryce Number', 'Available'),
(29, '1', 'Ward Type 1', '20', '19', '600', 'Araf Karim', 'Alex Joe', 'Bryce Number', 'Available'),
(30, '1', 'Ward Type 1', '20', '20', '600', 'Araf Karim', 'Alex Joe', 'Bryce Number', 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_pay`
--
ALTER TABLE `ad_pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_salary`
--
ALTER TABLE `ad_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_account`
--
ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_name`
--
ALTER TABLE `bank_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonus_structure`
--
ALTER TABLE `bonus_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cabin`
--
ALTER TABLE `cabin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `closing`
--
ALTER TABLE `closing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commission_meta`
--
ALTER TABLE `commission_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultancies`
--
ALTER TABLE `consultancies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost`
--
ALTER TABLE `cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost_field`
--
ALTER TABLE `cost_field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deduction_structure`
--
ALTER TABLE `deduction_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergencies`
--
ALTER TABLE `emergencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_name`
--
ALTER TABLE `group_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incentive_structure`
--
ALTER TABLE `incentive_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investigation`
--
ALTER TABLE `investigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketer`
--
ALTER TABLE `marketer`
  ADD PRIMARY KEY (`id`) USING HASH;

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_info`
--
ALTER TABLE `meta_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_records`
--
ALTER TABLE `salary_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_structure`
--
ALTER TABLE `salary_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `sms_record`
--
ALTER TABLE `sms_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_name`
--
ALTER TABLE `test_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `ad_pay`
--
ALTER TABLE `ad_pay`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ad_salary`
--
ALTER TABLE `ad_salary`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bank_account`
--
ALTER TABLE `bank_account`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `bank_name`
--
ALTER TABLE `bank_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `bonus_structure`
--
ALTER TABLE `bonus_structure`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `cabin`
--
ALTER TABLE `cabin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `closing`
--
ALTER TABLE `closing`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `commission_meta`
--
ALTER TABLE `commission_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `consultancies`
--
ALTER TABLE `consultancies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `cost`
--
ALTER TABLE `cost`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `cost_field`
--
ALTER TABLE `cost_field`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `deduction_structure`
--
ALTER TABLE `deduction_structure`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `emergencies`
--
ALTER TABLE `emergencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `group_name`
--
ALTER TABLE `group_name`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `incentive_structure`
--
ALTER TABLE `incentive_structure`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `investigation`
--
ALTER TABLE `investigation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `marketer`
--
ALTER TABLE `marketer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meta_info`
--
ALTER TABLE `meta_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `operation`
--
ALTER TABLE `operation`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `operations`
--
ALTER TABLE `operations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `pc`
--
ALTER TABLE `pc`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `salary_records`
--
ALTER TABLE `salary_records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `salary_structure`
--
ALTER TABLE `salary_structure`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `sms_record`
--
ALTER TABLE `sms_record`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `test_name`
--
ALTER TABLE `test_name`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
