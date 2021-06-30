-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 29, 2021 at 08:11 AM
-- Server version: 10.3.28-MariaDB-log-cll-lve
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wwwmilonelectron_unitedsherpur`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_info`
--

CREATE TABLE `access_info` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `login_period` datetime NOT NULL,
  `logout_period` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `access_info`
--

INSERT INTO `access_info` (`user_id`, `login_period`, `logout_period`) VALUES
(13, '2021-02-25 17:24:44', '0000-00-00 00:00:00'),
(11, '2021-02-25 17:30:03', '0000-00-00 00:00:00'),
(11, '2021-02-25 17:31:39', '2021-02-25 17:34:32'),
(14, '2021-02-25 17:34:41', '0000-00-00 00:00:00'),
(13, '2021-02-27 12:58:22', '0000-00-00 00:00:00'),
(13, '2021-02-28 09:12:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `pid` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill` int(11) NOT NULL COMMENT 'ID of bills table',
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admitted' COMMENT 'admitted or released'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admit_type`
--

CREATE TABLE `admit_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cabin_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admit_type`
--

INSERT INTO `admit_type` (`id`, `type`, `room_no`, `cabin_no`, `seat_no`, `price`, `trash`) VALUES
(11, 'cabin', '', '208', '', 5000.00, 0),
(10, 'cabin', '', '207', '', 0.00, 0),
(9, 'cabin', '', '206', '', 0.00, 0),
(8, 'cabin', '', '205', '', 0.00, 0),
(12, 'cabin', '', '101', '', 2000.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `advanced_payment`
--

CREATE TABLE `advanced_payment` (
  `id` int(100) UNSIGNED NOT NULL,
  `created` date NOT NULL,
  `payment_date` date NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ad_pay`
--

CREATE TABLE `ad_pay` (
  `id` int(11) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `pay_amount` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ad_salary`
--

CREATE TABLE `ad_salary` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `advance_amount` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `altra_doctor_payment`
--

CREATE TABLE `altra_doctor_payment` (
  `id` int(100) NOT NULL,
  `date` date NOT NULL,
  `doctor_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` decimal(8,2) NOT NULL,
  `trash` int(10) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `pid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_office` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upazila` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admission_date` date NOT NULL,
  `admission_time` time NOT NULL,
  `disease` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clearance_date` date NOT NULL,
  `clearance_time` time NOT NULL,
  `bed_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_doctor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `op_relation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `op_pa_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `op_age` int(7) NOT NULL,
  `op_village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `op_post_office` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `op_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `op_upazila` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_of_unconscious` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_of_operation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_of_witness` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name_of_witness` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village_of_witness` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `witness_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `witness_upazila` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `witness_date` date NOT NULL,
  `name_of_consentant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name_of_consentant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village_of_consentant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consentant_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consentant_upazila` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consentant_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `bank_name` varchar(252) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_account`
--

CREATE TABLE `bank_account` (
  `id` int(10) UNSIGNED NOT NULL,
  `datetime` date NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holder_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holder_contact` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `init_balance` decimal(10,2) NOT NULL,
  `pre_balance` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_name`
--

CREATE TABLE `bank_name` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `bank_name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barcode`
--

CREATE TABLE `barcode` (
  `id` int(10) UNSIGNED NOT NULL,
  `img_height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_width` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_width` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos_x` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos_y` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barcode`
--

INSERT INTO `barcode` (`id`, `img_height`, `img_width`, `code_width`, `code_height`, `pos_x`, `pos_y`, `code_type`) VALUES
(1, '68', '209', '2', '40', '104', '23', 'code128'),
(2, '68', '209', '2', '40', '104', '23', 'code128');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `voucher` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pid` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` decimal(10,2) NOT NULL COMMENT 'Without  Vat amount',
  `vat` int(100) NOT NULL COMMENT 'Vat percentage',
  `vat_amount` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `less_type` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `last_paid` decimal(10,2) NOT NULL,
  `last_payment_date` date NOT NULL,
  `payment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `refereed_doctor` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `date`, `voucher`, `pid`, `title`, `details`, `subtotal`, `vat`, `vat_amount`, `total`, `discount`, `less_type`, `grand_total`, `paid`, `due`, `last_paid`, `last_payment_date`, `payment_status`, `refereed_doctor`, `status`) VALUES
(1, '2021-02-25', '2102250001', '0001', 'consultancy', '', 0.00, 0, 0.00, 500.00, 0.00, NULL, 500.00, 100.00, 400.00, 100.00, '2021-02-25', 'pending', NULL, NULL),
(2, '2021-02-25', '2102250002', '0002', 'consultancy', '', 0.00, 0, 0.00, 500.00, 0.00, NULL, 500.00, 500.00, 0.00, 500.00, '2021-02-25', 'pending', NULL, NULL),
(3, '2021-02-25', '2102250003', '00001', 'diagnosis', 'diagnosis', 500.00, 0, 0.00, 500.00, 100.00, 'Flat', 400.00, 400.00, 0.00, 400.00, '2021-02-25', 'pending', NULL, 'diagnosis'),
(4, '2021-02-25', '2102250004', '00002', 'diagnosis', 'diagnosis', 500.00, 0, 0.00, 500.00, 0.00, 'Flat', 500.00, 500.00, 0.00, 500.00, '2021-02-25', 'pending', NULL, 'diagnosis'),
(5, '2021-02-25', '2102250005', '00003', 'diagnosis', 'diagnosis', 400.00, 0, 0.00, 400.00, 0.00, 'Flat', 400.00, 400.00, 0.00, 400.00, '2021-02-25', 'pending', NULL, 'diagnosis'),
(6, '2021-03-14', '2103140006', '0002', 'diagnosis', 'diagnosis', 1050.00, 0, 0.00, 1050.00, 0.00, 'Percentage', 1050.00, 1000.00, 50.00, 1000.00, '2021-03-14', 'pending', NULL, 'diagnosis');

-- --------------------------------------------------------

--
-- Table structure for table `bonus`
--

CREATE TABLE `bonus` (
  `id` int(100) UNSIGNED NOT NULL,
  `created` date NOT NULL,
  `bonus_date` date NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bonus` decimal(10,2) NOT NULL COMMENT 'Bonus  (%)',
  `trash` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bonus_structure`
--

CREATE TABLE `bonus_structure` (
  `id` int(10) UNSIGNED NOT NULL,
  `eid` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fields` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` decimal(10,2) NOT NULL,
  `remarks` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(45) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `closing`
--

CREATE TABLE `closing` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `opening` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hand_cash` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'auto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `ref` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'expression [ registration:10 or pathology:15 ]. registration -> ID = 10 and pathology -> ID = 15',
  `person` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'doctors:ID or marketer:ID or pc:ID',
  `type` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commission_payment`
--

CREATE TABLE `commission_payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_date` date NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  `due` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultancies`
--

CREATE TABLE `consultancies` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `pid` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ID of doctors table',
  `reference_name` int(100) NOT NULL,
  `room` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'any description for patient',
  `bill` int(11) NOT NULL COMMENT 'ID of bills table',
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'pending or complete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultancies`
--

INSERT INTO `consultancies` (`id`, `date`, `pid`, `doctor`, `reference_name`, `room`, `notes`, `bill`, `status`) VALUES
(1, '2021-02-25', '0001', '1', 1, '', NULL, 1, 'pending'),
(2, '2021-02-25', '0002', '1', 1, '', NULL, 2, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE `cost` (
  `id` int(100) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `cost_field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spend_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` tinyint(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cost_bill`
--

CREATE TABLE `cost_bill` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `voucher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_qty` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cost_bill`
--

INSERT INTO `cost_bill` (`id`, `patient_id`, `voucher`, `bill_by`, `total_qty`, `grand_total`, `trash`, `date`) VALUES
(1, 2, '000001', 'jgh', 2.00, 2400.00, 0, '2021-02-25'),
(2, 2, '000002', 'aa', 3.00, 9000.00, 0, '2021-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `cost_bill_items`
--

CREATE TABLE `cost_bill_items` (
  `id` int(11) NOT NULL,
  `voucher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cost_bill_items`
--

INSERT INTO `cost_bill_items` (`id`, `voucher`, `item_id`, `price`, `quantity`, `total`, `trash`) VALUES
(1, '000001', 5, 190.00, 1.00, 190.00, 0),
(14, '000009', 8, 6000.00, 1.00, 6000.00, 0),
(13, '000009', 7, 1000.00, 1.00, 1000.00, 0),
(12, '000009', 6, 3500.00, 1.00, 3500.00, 0),
(11, '000009', 2, 1350.00, 1.00, 1350.00, 0),
(15, '000009', 9, 4500.00, 1.00, 3500.00, 0),
(16, '000010', 7, 1000.00, 1.00, 1000.00, 0),
(17, '000010', 8, 6000.00, 1.00, 6000.00, 0),
(18, '000010', 9, 4500.00, 1.00, 3500.00, 0),
(19, '000011', 2, 1350.00, 1.00, 1350.00, 0),
(20, '000011', 8, 6014.00, 1.00, 6014.00, 0),
(28, '000012', 9, 5000.00, 1.00, 5000.00, 0),
(27, '000012', 8, 8500.00, 1.00, 8500.00, 0),
(26, '000012', 7, 1000.00, 1.00, 1000.00, 0),
(25, '000012', 6, 3500.00, 1.00, 3500.00, 0),
(29, '000014', 2, 1000.00, 1.00, 1000.00, 0),
(30, '000014', 6, 3500.00, 1.00, 3500.00, 0),
(31, '000014', 7, 1000.00, 1.00, 1000.00, 0),
(32, '000014', 8, 6500.00, 1.00, 6500.00, 0),
(33, '000014', 9, 3500.00, 1.00, 3500.00, 0),
(34, '000015', 6, 3500.00, 1.00, 3500.00, 0),
(35, '000016', 2, 1350.00, 1.00, 1350.00, 0),
(38, '000018', 6, 2100.00, 1.00, 2100.00, 0),
(39, '000018', 9, 2345.00, 1.00, 2345.00, 0),
(40, '000019', 10, 3000.00, 1.00, 3000.00, 0),
(41, '000019', 11, 1500.00, 1.00, 1500.00, 0),
(42, '000019', 13, 500.00, 1.00, 500.00, 0),
(43, '000019', 14, 500.00, 1.00, 500.00, 0),
(44, '000019', 6, 700.00, 1.00, 700.00, 0),
(61, '000021', 10, 3000.00, 1.00, 3000.00, 0),
(60, '000021', 6, 700.00, 1.00, 700.00, 0),
(59, '000021', 13, 500.00, 1.00, 500.00, 0),
(58, '000021', 14, 500.00, 1.00, 500.00, 0),
(57, '000021', 11, 1500.00, 1.00, 1500.00, 0),
(56, '000021', 7, 1000.00, 1.00, 1000.00, 0),
(73, '000023', 7, 1000.00, 1.00, 1000.00, 0),
(72, '000023', 6, 500.00, 1.00, 500.00, 0),
(71, '000023', 14, 500.00, 1.00, 500.00, 0),
(70, '000023', 13, 500.00, 1.00, 500.00, 0),
(69, '000023', 11, 1500.00, 1.00, 1500.00, 0),
(68, '000023', 10, 3000.00, 1.00, 3000.00, 0),
(74, '000025', 10, 3000.00, 1.00, 3000.00, 0),
(75, '000025', 6, 500.00, 1.00, 500.00, 0),
(76, '000025', 7, 1000.00, 1.00, 1000.00, 0),
(77, '000025', 14, 500.00, 1.00, 500.00, 0),
(78, '000025', 13, 500.00, 1.00, 500.00, 0),
(79, '000025', 11, 1500.00, 1.00, 1500.00, 0),
(80, '000026', 7, 1000.00, 1.00, 1000.00, 0),
(81, '000026', 6, 3000.00, 1.00, 3000.00, 0),
(82, '000026', 9, 3000.00, 1.00, 3000.00, 0),
(83, '000026', 8, 6000.00, 1.00, 6000.00, 0),
(84, '000027', 11, 3000.00, 1.00, 3000.00, 0),
(85, '000027', 7, 1000.00, 1.00, 1000.00, 0),
(86, '000027', 6, 500.00, 1.00, 500.00, 0),
(87, '000027', 14, 500.00, 1.00, 500.00, 0),
(88, '000027', 13, 500.00, 1.00, 500.00, 0),
(89, '000027', 9, 1700.00, 1.00, 1700.00, 0),
(90, '000028', 6, 3500.00, 1.00, 3500.00, 0),
(91, '000028', 7, 1000.00, 1.00, 1000.00, 0),
(92, '000028', 14, 500.00, 1.00, 500.00, 0),
(93, '000028', 12, 1500.00, 1.00, 1500.00, 0),
(94, '000029', 6, 4000.00, 1.00, 4000.00, 0),
(95, '000029', 7, 1000.00, 1.00, 1000.00, 0),
(96, '000029', 8, 7000.00, 1.00, 7000.00, 0),
(97, '000029', 9, 4500.00, 1.00, 4500.00, 0),
(98, '000029', 13, 500.00, 1.00, 500.00, 0),
(99, '000029', 14, 1000.00, 1.00, 1000.00, 0),
(100, '000030', 6, 3500.00, 1.00, 3500.00, 0),
(101, '000030', 7, 1000.00, 1.00, 1000.00, 0),
(102, '000030', 8, 6000.00, 1.00, 6000.00, 0),
(103, '000030', 9, 4500.00, 1.00, 4500.00, 0),
(104, '000031', 6, 4000.00, 1.00, 4000.00, 0),
(105, '000031', 7, 1000.00, 1.00, 1000.00, 0),
(106, '000031', 8, 6000.00, 1.00, 6000.00, 0),
(107, '000031', 9, 5000.00, 1.00, 5000.00, 0),
(108, '000031', 13, 500.00, 1.00, 500.00, 0),
(109, '000031', 14, 500.00, 1.00, 500.00, 0),
(110, '000001', 2, 1200.00, 2.00, 2400.00, 0),
(111, '000002', 4, 5000.00, 1.00, 5000.00, 0),
(112, '000002', 1, 2000.00, 2.00, 4000.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cost_field`
--

CREATE TABLE `cost_field` (
  `id` int(100) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `create_reports`
--

CREATE TABLE `create_reports` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `procedure_id` int(11) NOT NULL,
  `standard` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily_wages`
--

CREATE TABLE `daily_wages` (
  `id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `emp_id` int(11) NOT NULL,
  `attendance` decimal(10,2) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `bonus` decimal(10,2) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deduction_structure`
--

CREATE TABLE `deduction_structure` (
  `id` int(10) UNSIGNED NOT NULL,
  `eid` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fields` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `remarks` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `designation_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `created_at`, `designation_name`, `trash`) VALUES
(1, '2020-11-19', 'Managing Director', 0),
(2, '2020-11-07', 'Manager', 1),
(3, '2020-11-08', 'Labourer', 1),
(4, '2020-11-16', 'operator', 1),
(5, '2020-11-19', 'Laboratory Technician ', 0),
(6, '2020-11-19', 'Nurse', 0),
(7, '2020-11-19', 'O.T. Specialist ', 0),
(8, '2020-11-19', 'Nurse Maid', 0),
(9, '2020-11-19', 'Night Guard ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `delivery` date NOT NULL COMMENT 'Date value',
  `pid` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Test name',
  `group_id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_id` int(11) NOT NULL,
  `gender` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refereed_doctor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Test group',
  `room` varchar(110) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_doctor_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_doctor_fee` decimal(8,2) NOT NULL,
  `remarks` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Normal, High, Low etc',
  `amount` decimal(10,2) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `bill` int(11) NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`id`, `date`, `delivery`, `pid`, `name`, `group_id`, `test_id`, `gender`, `reference_name`, `refereed_doctor`, `group`, `room`, `result`, `alt_doctor_id`, `alt_doctor_fee`, `remarks`, `amount`, `cost`, `bill`, `status`) VALUES
(1, '2021-02-25', '2021-02-25', '00001', '', '95', 156, '', '1', '1', '', '', NULL, '0', 0.00, NULL, 0.00, 0.00, 3, 'pending'),
(2, '2021-02-25', '2021-02-25', '00002', '', '95', 156, '', '1', '1', '', '', NULL, '0', 0.00, NULL, 0.00, 0.00, 4, 'pending'),
(3, '2021-02-25', '2021-02-25', '00003', '', '45', 101, '', '1', '1', '', '', NULL, '0', 0.00, NULL, 0.00, 0.00, 5, 'pending'),
(4, '2021-03-14', '2021-03-14', '0002', '', '36', 103, '', '10', '1', '', '', NULL, '0', 0.00, NULL, 0.00, 0.00, 6, 'pending'),
(5, '2021-03-14', '2021-03-14', '0002', '', '35', 107, '', '10', '1', '', '', NULL, '0', 0.00, NULL, 0.00, 0.00, 6, 'pending'),
(6, '2021-03-14', '2021-03-14', '0002', '', '36', 104, '', '10', '1', '', '', NULL, '0', 0.00, NULL, 0.00, 0.00, 6, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) UNSIGNED NOT NULL,
  `fullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialised` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` decimal(8,2) NOT NULL DEFAULT 0.00,
  `commission` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `fullName`, `designation`, `degree`, `specialised`, `hospital`, `mobile`, `phone`, `email`, `fee`, `commission`, `address`, `image`, `room_no`, `status`) VALUES
(1, 'Dr. Hasinatul Ferdous (Lopa)', 'Gynecologist', 'MBBS', 'Gynecologist', 'MMCS', '01712009954', '', '', 500.00, '100', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_payment`
--

CREATE TABLE `doctor_payment` (
  `id` int(100) NOT NULL,
  `date` date NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `total_paid` decimal(8,2) NOT NULL,
  `payment` decimal(8,2) NOT NULL,
  `less` decimal(8,2) NOT NULL,
  `due` decimal(8,2) NOT NULL,
  `trash` int(10) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_payment`
--

INSERT INTO `doctor_payment` (`id`, `date`, `doctor_id`, `total_paid`, `payment`, `less`, `due`, `trash`) VALUES
(1, '2021-02-25', 1, 500.00, 500.00, 0.00, 500.00, 0),
(2, '2021-03-14', 1, 1000.00, 500.00, 0.00, 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `due_collection`
--

CREATE TABLE `due_collection` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pid` int(11) NOT NULL,
  `admission_id` int(11) NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `previous_paid` decimal(10,2) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `due_payment`
--

CREATE TABLE `due_payment` (
  `id` int(45) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voucher_number` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `prev_paid` decimal(10,2) NOT NULL,
  `prev_due` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `remission` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emergencies`
--

CREATE TABLE `emergencies` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `pid` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill` int(11) NOT NULL COMMENT 'ID of bills table',
  `status` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `emp_id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joining_date` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overtime` int(11) NOT NULL,
  `entry_time` time NOT NULL,
  `exit_time` time NOT NULL,
  `present_address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `path` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_mapping`
--

CREATE TABLE `group_mapping` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_mapping`
--

INSERT INTO `group_mapping` (`id`, `group_id`, `test_id`) VALUES
(1, 11, 9),
(2, 18, 3),
(5, 23, 71),
(6, 23, 68),
(7, 23, 69),
(8, 23, 70),
(20, 37, 79),
(21, 38, 85),
(22, 38, 86),
(23, 38, 83),
(24, 38, 84),
(32, 41, 90),
(38, 44, 100),
(55, 36, 102),
(56, 36, 103),
(57, 36, 104),
(58, 36, 81),
(59, 36, 80),
(60, 36, 82),
(61, 36, 77),
(62, 36, 78),
(63, 36, 76),
(69, 35, 107),
(70, 35, 72),
(71, 35, 73),
(72, 35, 74),
(73, 35, 75),
(81, 47, 110),
(82, 46, 109),
(83, 40, 105),
(84, 40, 106),
(85, 40, 111),
(86, 40, 88),
(87, 39, 108),
(88, 39, 112),
(89, 39, 113),
(90, 39, 96),
(91, 39, 98),
(92, 39, 89),
(93, 39, 97),
(94, 39, 87),
(95, 39, 91),
(96, 43, 114),
(97, 49, 115),
(98, 50, 116),
(99, 51, 117),
(100, 53, 118),
(101, 54, 119),
(102, 55, 120),
(103, 56, 121),
(104, 60, 122),
(106, 57, 123),
(107, 58, 124),
(108, 61, 125),
(109, 62, 126),
(111, 63, 129),
(112, 69, 130),
(114, 73, 132),
(115, 74, 133),
(116, 75, 134),
(117, 76, 135),
(118, 78, 137),
(119, 79, 138),
(120, 80, 139),
(121, 81, 140),
(122, 82, 141),
(123, 48, 142),
(124, 83, 143),
(125, 84, 144),
(126, 85, 145),
(133, 42, 146),
(134, 42, 93),
(135, 42, 95),
(136, 42, 94),
(137, 42, 92),
(139, 87, 148),
(141, 88, 149),
(142, 89, 150),
(143, 89, 82),
(144, 90, 151),
(145, 91, 152),
(146, 92, 153),
(147, 93, 154),
(148, 94, 155),
(151, 96, 156),
(152, 95, 0),
(153, 45, 101);

-- --------------------------------------------------------

--
-- Table structure for table `group_name`
--

CREATE TABLE `group_name` (
  `id` int(10) NOT NULL,
  `position` int(11) DEFAULT NULL,
  `group_name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_name`
--

INSERT INTO `group_name` (`id`, `position`, `group_name`, `trash`) VALUES
(1, 0, 'BIOCHEMICAL_EXAMI', 0),
(2, 1, 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 0),
(4, 2, 'URINE_EXAMINATION_REPORT', 0),
(16, 3, 'STOOL', 0),
(24, 7, 'STOOL__EXAMINATION_REPORT', 0),
(25, 8, 'ABC', 0),
(26, 9, 'Blood', 0),
(28, 4, 'BIOCAMISTRI', 0),
(29, 5, 'IMONOLOGY', 0),
(30, 6, 'OTHERS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `incentive_structure`
--

CREATE TABLE `incentive_structure` (
  `id` int(10) UNSIGNED NOT NULL,
  `eid` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fields` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` decimal(10,2) NOT NULL,
  `remarks` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `income_field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `income_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` tinyint(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income_field`
--

CREATE TABLE `income_field` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income_field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `income_field`
--

INSERT INTO `income_field` (`id`, `code`, `income_field`, `trash`) VALUES
(3, '0003', 'MEDICARE', 1),
(4, '0004', 'Rent', 1),
(5, '0005', 'Test', 1),
(6, '0006', 'Current Bill', 1),
(7, '0007', 'Prashant ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `investigation`
--

CREATE TABLE `investigation` (
  `id` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `room` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `trash` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `status`, `trash`) VALUES
(1, 'Cabin 202', 2000.00, 'available', 0),
(2, 'Cabin 203', 1500.00, 'available', 0),
(3, 'Cabin 204', 1800.00, 'available', 0),
(4, 'OT Siger', 5000.00, 'available', 0);

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `ref` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'expression [ registration:10 or pathology:15 or pid:123456 ]. registration -> ID = 10 and pathology -> ID = 15 and pid = patient ID',
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'income or cost or liability or assets'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`id`, `date`, `ref`, `details`, `amount`, `status`) VALUES
(1, '2021-02-25', '', 'consultancy', 100.00, 'income'),
(2, '2021-02-25', '', 'consultancy', 500.00, 'income'),
(3, '2021-02-25', 'pid:00001', 'diagnosis', 400.00, 'income'),
(4, '2021-02-25', 'pid:00002', 'diagnosis', 500.00, 'income'),
(5, '2021-02-25', 'pid:00003', 'diagnosis', 400.00, 'income'),
(6, '2021-03-14', 'pid:0002', 'diagnosis', 1000.00, 'income');

-- --------------------------------------------------------

--
-- Table structure for table `marketer`
--

CREATE TABLE `marketer` (
  `id` int(10) UNSIGNED NOT NULL,
  `create_at` date NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commission` decimal(10,2) NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0,
  `img_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marketer`
--

INSERT INTO `marketer` (`id`, `create_at`, `name`, `mobile`, `commission`, `address`, `trash`, `img_url`) VALUES
(10, '2021-03-14', 'Raphael Glass', 'Praesentium sed dist', 40.00, 'Harum non molestiae ', 0, ''),
(11, '2021-03-14', 'Rajah Vincent', '123456789', 40.00, 'Sint aut obcaecati i', 0, ''),
(12, '2021-03-14', 'Palmer Adkins', '123456789', 40.00, 'Rerum illum cum ad ', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `product_name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(252) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_cat` varchar(252) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory` varchar(252) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `unit` varchar(252) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(252) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `messages_date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messages_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messages_mobile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messages_text` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `messages_condition` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meta_info`
--

CREATE TABLE `meta_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_status` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mixed_patient`
--

CREATE TABLE `mixed_patient` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refd_doctor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lab_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `examination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `comments` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mixed_report`
--

CREATE TABLE `mixed_report` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `test_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opening_balance`
--

CREATE TABLE `opening_balance` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `opening_amount` decimal(10,2) NOT NULL,
  `initial_invest` decimal(10,2) NOT NULL,
  `closing_amount` decimal(10,2) NOT NULL,
  `status` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1st : opening balance always on top',
  `trash` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opening_balance`
--

INSERT INTO `opening_balance` (`id`, `date`, `opening_amount`, `initial_invest`, `closing_amount`, `status`, `trash`) VALUES
(1, '2021-02-25', 0.00, 0.00, 3300.00, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `outstock`
--

CREATE TABLE `outstock` (
  `id` int(200) NOT NULL,
  `date` date NOT NULL,
  `voucher_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_voucher_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reagent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE `overtime` (
  `id` int(255) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `hourly_rate` decimal(10,2) NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parameter`
--

CREATE TABLE `parameter` (
  `id` int(11) NOT NULL,
  `position` int(11) DEFAULT NULL,
  `parameter_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `trash` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parameter`
--

INSERT INTO `parameter` (`id`, `position`, `parameter_name`, `ref_value`, `result`, `unit`, `created_at`, `trash`) VALUES
(1, NULL, 'Parameter 1', '100', NULL, 'M/L', '2020-10-19', 1),
(3, NULL, 'Parameter 2', '12', 'Test', 't-m', '2020-10-21', 1),
(4, NULL, 'Parameter 3', '12', NULL, 'll', '2020-10-19', 1),
(5, NULL, 'Parameter 4', '12', NULL, 'lo', '2020-10-19', 1),
(6, NULL, 'Consistency', 'Soft', 'Soft', '0', '2020-11-03', 1),
(7, NULL, 'Color', 'Brown', 'Brown', '0', '2020-11-03', 1),
(9, NULL, 'Blood', 'Nil', 'Nil', '0', '2020-11-03', 1),
(10, NULL, 'Reaction', 'Alkaline', 'Alkaline', '0', '2020-11-03', 1),
(11, NULL, 'Occult Blood Test', 'Not done', NULL, '0', '2020-10-19', 1),
(12, NULL, 'Reducing Substance', 'Nil', NULL, '0', '2020-10-19', 1),
(13, NULL, 'Protozoa of', 'N. F', 'N. F', '0', '2020-11-03', 1),
(14, NULL, 'Cysts of', 'N.F', 'N.F', '0', '2020-11-03', 1),
(15, NULL, 'Larva of ', 'N.F', 'N.F', '0', '2020-11-03', 1),
(16, NULL, 'Ova of', 'N.F', 'N.F', '0', '2020-11-03', 1),
(17, NULL, 'Vegetable Cells', '0 - 2 / HPF', '0 - 2 / HPF', '0', '2020-11-03', 1),
(18, NULL, 'Epithelial Cell', '1 - 2 / HPF', '1 - 2 / HPF', '0', '2020-11-03', 1),
(19, NULL, 'Pus Cells', '0  -2 / HPF', '0  -2 / HPF', '0', '2020-11-03', 1),
(20, NULL, 'R B C', 'Nil', 'Nil', '0', '2020-11-03', 1),
(21, NULL, 'Macrophage', 'Nil', 'Nil', '0', '2020-11-03', 1),
(22, NULL, 'Fat Globules', 'Nil', 'Nil', '0', '2020-11-03', 1),
(23, NULL, 'Muscle  Fibres', 'Nil', 'Nil', '0', '2020-11-03', 1),
(24, NULL, 'Starch', 'Nil', 'Nil', '0', '2020-11-03', 1),
(25, NULL, 'Charcot Leyden Crystals', 'Nil ', 'Nil ', '0', '2020-11-03', 1),
(26, NULL, 'Blastocystis', 'Nil', 'Nil', '0', '2020-11-03', 1),
(27, NULL, 'Floatation / Ova Count', 'Not Done', 'Not Done', '0', '2020-11-03', 1),
(28, NULL, 'CHEST P/A', '1', '', '0', '2020-11-01', 1),
(29, NULL, ' USG P/P', '1', '', '0', '2020-11-01', 1),
(30, NULL, ' ASO', '1', '', '0', '2020-11-01', 1),
(33, NULL, 'BIocamical Exam', '5d4f', '', 'df5', '2020-11-02', 1),
(36, NULL, 'Mucus', 'Nil', 'Nil', '0', '2020-11-03', 1),
(37, NULL, 'Occult Blood Test', 'Not done', 'Not done', '0', '2020-11-03', 1),
(38, NULL, 'Reducing Substance', 'Nil', 'Nil', '0', '2020-11-03', 1),
(39, NULL, 'Amikacin', 'S', 'S', ' ', '2020-11-03', 1),
(40, NULL, 'Ceftriaxone', 'R', 'R', ' ', '2020-11-03', 1),
(41, NULL, 'Tetracycline', 'I', 'I', ' ', '2020-11-03', 1),
(42, NULL, 'Cephalexin', 'R', 'R', ' ', '2020-11-03', 1),
(43, NULL, 'Levofloxacin', 'S', 'S', ' ', '2020-11-03', 1),
(44, NULL, 'Cecixime', 'R', 'R', ' ', '2020-11-03', 1),
(45, NULL, 'Ciprofloxacin', 'S', 'S', ' ', '2020-11-03', 1),
(46, NULL, 'Clindamycin', 'I', 'I', '  ', '2020-11-03', 1),
(47, NULL, 'Linezokid', 'I', 'I', ' ', '2020-11-03', 1),
(48, NULL, 'Penicillin-G', ' ', ' ', ' ', '2020-11-03', 1),
(49, NULL, 'Colistin', 'R', 'R', ' ', '2020-11-03', 1),
(50, NULL, 'Cefepime', 'R', 'R', ' ', '2020-11-03', 1),
(51, NULL, 'Meropenem', 'S', 'S', ' ', '2020-11-03', 1),
(52, NULL, 'Cephradine', 'R', 'R', ' ', '2020-11-03', 1),
(53, NULL, 'Azithromycin', 'I', 'I', ' ', '2020-11-03', 1),
(54, NULL, 'Amoxicillin/ Clavulanate', 'R', 'R', ' ', '2020-11-03', 1),
(55, NULL, 'Co- Trimoxazole', ' ', ' ', ' ', '2020-11-03', 1),
(56, NULL, 'Gentamycin', 'S', 'S', ' ', '2020-11-03', 1),
(57, NULL, 'Nitrofurantoin', 'S', 'S', '  ', '2020-11-03', 1),
(58, NULL, 'Ceftazidime', 'R', 'R', ' ', '2020-11-03', 1),
(59, NULL, 'Cefuroxime', 'R', 'R', ' ', '2020-11-03', 1),
(60, NULL, 'Cefurozime', 'R', 'R', ' ', '2020-11-03', 1),
(61, NULL, 'Fluconazole', ' ', ' ', ' ', '2020-11-03', 1),
(62, NULL, 'Trimethoprime/ Sulphamehoxazole', 'I', 'I', ' ', '2020-11-03', 1),
(63, NULL, 'Flucloxacillin', 'I', 'I', ' ', '2020-11-03', 1),
(64, NULL, 'RBS', '4.3 -5.7', '', 'mmol/l', '2020-11-04', 1),
(65, NULL, 'S. Bilirubin', '0.3 - 1.2', '', 'mg/dl', '2020-11-04', 1),
(66, NULL, 'Appearance', 'Clear', 'Clear', 'Clear', '2020-11-07', 1),
(67, NULL, 'P 111', '0.256', '', '%', '2020-11-17', 1),
(68, NULL, 'P 222', '0.542', '', '%', '2020-11-17', 1),
(69, NULL, 'P 333', '0.65', '', '%', '2020-11-17', 1),
(70, NULL, 'A 111', '0.256', '', '%', '2020-11-17', 1),
(71, NULL, 'Neutrophils', '(40-70%)', '', '%', '2020-11-18', 1),
(72, NULL, 'Lymphocytes', '(20-40%)', '', '%', '2020-11-18', 1),
(73, NULL, 'Monocytes', '(2-6%)', '', '%', '2020-11-18', 1),
(74, NULL, 'Eosinophils', '(1-8%)', '', '%', '2020-11-18', 1),
(75, NULL, 'Basophils', '(0-1%)', '', '%', '2020-11-18', 1),
(76, NULL, 'ESR', 'Male 0-9/Female 0-10.', '', '0', '2020-11-18', 1),
(77, NULL, 'Hemoglobin (Hb%)', 'Male/Female16/14.8gm/dl', '', 'gm/dl', '2020-11-18', 1),
(78, NULL, 'Total Count (WBC)', '4000-11000/cmm.', '', 'cmm', '2020-11-18', 1),
(79, 3, 'ESR', 'Male 0-9/Female 0-10', '', '00', '2020-11-25', 1),
(80, 16, 'Hemoglobin (Hb%)', 'Male: 12-16gm/dl<br>Female: 12-14 gm/dl', 'gm/dl   %', '%', '2021-02-25', 0),
(81, 17, 'Total Count (WBC)', '4000-11000/cmm.', '/cmm', '/cmm', '2021-02-25', 0),
(82, 19, 'Neutrophils', '(40-75%)', '%', '%', '2021-02-25', 0),
(83, 20, 'Lymphocytes', '(20-45%)', '%', '%', '2021-02-25', 0),
(84, 21, 'Monocytes', '(02-10%)', '%', '%', '2021-02-25', 0),
(85, 22, 'Eosinophils', '(02-06%)', '%', '%', '2021-02-25', 0),
(86, 23, 'Basophils', '(00%)', '00%', '%', '2021-02-25', 0),
(87, 88, 'S.G.P.T (AST)', 'Upto 45 U/L', '', '00', '2020-11-25', 0),
(88, 89, 'S. Bilirubin (Total)', '0.2-1.2mg/dl', '', 'mg/dl', '2021-01-11', 0),
(89, 90, 'S.Creatinine', '0.6-1.5mg/dl', '', 'mg/dl', '2021-01-11', 0),
(90, 91, 'Skin Scraping for Fungus', 'N/A', '', '', '2020-11-29', 0),
(91, 92, 'Fasting Blood sugar (FBS)', '6.66 mmol/L', '', 'mmol/L', '2021-01-11', 0),
(92, 93, 'Blood Sugar (2 Hours After Breakfast)', '<10.0 mmol/L', '', 'mmol/L', '2021-01-11', 0),
(93, 94, 'Random Blood Sugar (RBS)', 'Upto 7.8 mmol/L', '', 'mmol/L', '2021-01-11', 0),
(94, 95, 'S. Cholesterol', '100-220mg/dl', '', 'mg/dl', '2021-01-11', 0),
(95, 96, 'S. Triglycerides', 'Upto 150mg/dl', '', 'mg/dl', '2021-01-11', 0),
(96, 97, 'H.D.L', 'Upto 55mg/dl', '', 'mg/dl', '2021-01-11', 0),
(97, 98, 'L.D.L', '50-150mg/dl', '', 'mg/dl', '2021-01-11', 0),
(98, 99, 'VDRL', 'N/A', 'Non-Reactive', '', '2020-11-29', 0),
(99, 100, 'TPHA', '00', 'Negative', '', '2021-01-11', 0),
(100, 101, 'Pregnancy Test', '00', '', '', '2021-01-11', 0),
(101, 102, 'Malaria Parasite (MP)', 'N/A', '', '', '2020-11-29', 0),
(102, 103, 'TO', 'Upto 1:80', '', '', '2020-11-29', 0),
(103, 104, 'TH', 'Upto 1:80', '', '', '2020-11-29', 0),
(104, 105, 'AH', 'Upto 1:40', '', '', '2020-11-29', 0),
(105, 106, 'BH', 'Upto 1:40', '', '', '2020-11-29', 0),
(106, 108, 'Quantity', '', '10ml', '', '2021-01-17', 0),
(107, 109, 'Colour', '', 'Straw', '', '2021-01-17', 0),
(108, 110, 'Appearance ', '', 'Clear', '', '2021-01-17', 0),
(109, 111, 'Sediment ', '', 'Nil', '', '2021-01-17', 0),
(110, 113, 'Ph (Reaction)', '', 'Acidic', '', '2021-01-17', 0),
(111, 114, 'Portein (Albumin)', '00', '', '', '2021-01-11', 0),
(112, 115, 'Sugar (Reducing Substances)', '', 'Nil', '', '2021-01-17', 0),
(113, 116, 'Phosphate', '', 'Nil', '', '2021-01-17', 0),
(114, 118, 'Pus Cell', '', '04-05/HPF', '', '2021-01-17', 0),
(115, 119, 'Epithelial Cells', '', '06-08/HPF', '', '2021-01-17', 0),
(116, 120, 'RBC', '', 'Nil', '', '2021-01-17', 0),
(117, 121, 'Tricomonus Vaginalis ', '', 'Nil', '', '2021-01-17', 0),
(118, 122, 'Spermetazooa', '', 'Nil', '', '2021-01-17', 0),
(119, 128, 'Triple Phosphate', '', 'Nil', '', '2021-01-17', 0),
(120, 129, 'Calcium Oxalate', '', 'Nil', '', '2021-01-17', 0),
(121, 130, 'Amorphous Phosphates', '', 'Nil', '', '2021-01-17', 0),
(122, 131, 'Urates', '', 'Nil', '', '2021-01-17', 0),
(123, 132, 'Granullar Cast', '', 'Nil', '', '2021-01-17', 0),
(124, 123, 'Blood Group (ABO) System', '00', '', '', '2021-01-17', 0),
(125, 124, 'Rh Factor', '00', '', '', '2021-01-11', 0),
(126, 125, 'HBsAG (ICT Method)', '00', '', '', '2021-01-11', 0),
(127, 126, 'Protein (Albumin)', '', 'Nil', '', '2021-01-17', 0),
(128, NULL, 'Test', 'test-Ref', '', '', '2020-11-26', 1),
(129, 114, 'test', 'test', '', '', '2021-01-11', 1),
(130, 86, 'Xray', '0', '', '', '2021-01-17', 0),
(131, 87, 'P/P', '0', '', '', '2020-11-28', 0),
(132, 15, 'ESR', 'Male: 0-9<br>Female: 0-10', '', 'mm in 1st Hour', '2021-01-15', 0),
(133, 24, 'Serum Uric Acid', '1.5-7 mg/dl', '', 'mg/dl', '2021-01-11', 0),
(134, 25, 'Platelet Count', '(150000-400000)/cmm', '(150000-400000)/cmm', '/cmm', '2021-02-25', 0),
(135, 26, 'C Reactive Protein (CRP)', 'Upto 6.0 mg/l', '', 'mg/l', '2021-01-11', 0),
(136, 27, 'ESR (Westerngreen Method)', 'Male: 0-10<br>Female: 0-20', 'mm in the 1st hour', 'mm in 1st hour', '2021-02-25', 0),
(137, 28, 'Total Circulating Eiosinophil Count (TCE)', '40-400/cmm', '', '/cmm', '2021-01-11', 0),
(138, 29, 'ECG', '00', '', '', '2021-01-11', 0),
(139, 30, 'W/A', '0', '', '', '2021-01-11', 0),
(140, 31, 'Bleeding Time (BT)', '(3-5) Min', '', 'Min', '2021-01-11', 0),
(141, 32, 'Clotting Time (CT)', '(5-11) Min', '', 'Min', '2021-01-11', 0),
(142, 33, 'Aso Titre', '200 IU/ml', '', 'IU/ml', '2020-12-09', 0),
(143, 34, 'RA', '0', 'Negative', '', '2020-12-09', 0),
(144, 35, 'XRay L/S B/V', '0', '', '', '2020-12-23', 0),
(145, 36, 'Xray Chest P/A', '0', '', '', '2020-12-23', 0),
(146, 37, 'XRay Soft Tissu', '0', '', '', '2020-12-23', 0),
(147, 38, 'Xray L/s Letaral View', '0', '', '', '2020-12-23', 0),
(148, 39, 'Xray Rt Wrist Joint', '0', '', '', '2020-12-23', 0),
(149, 40, 'XRay Lt Wrist Joint', '0', '', '', '2020-12-23', 0),
(150, 41, 'XRay Rt Knee', '0', '', '', '2020-12-23', 0),
(151, 42, 'Xray Lt Knee', '0', '', '', '2020-12-23', 0),
(152, 43, 'XRay Rt Leg', '0', '', '', '2020-12-23', 0),
(153, 44, 'XRay Lt Leg', '0', '', '', '2020-12-23', 0),
(154, 45, 'XRay Lt Leg', '0', '', '', '2020-12-23', 0),
(155, 46, 'XRay Rt Sholder', '0', '', '', '2020-12-23', 0),
(156, 47, 'XRay Lt Sholder', '0', '', '', '2020-12-23', 0),
(157, 48, 'XRay Lt Sholder', '0', '', '', '2020-12-23', 0),
(158, 49, 'XRay Skull', '0', '', '', '2020-12-23', 0),
(159, 50, 'Xray L/s Letaral View', '0', '', '', '2021-01-11', 0),
(160, 51, 'XRay Lt Wrist Joint', '0', '', '', '2021-01-11', 0),
(161, 52, 'XRay Lt Wrist Joint', '0', '', '', '2021-01-11', 0),
(162, 53, 'XRay Skull', '0', '', '', '2021-01-11', 0),
(163, 54, 'XRay Rt Knee', '0', '', '', '2021-01-11', 0),
(164, 55, 'XRay LT knee', '0', '', '', '2021-01-11', 0),
(165, 56, 'XRay Rt Shoulder', '0', '', '', '2021-01-11', 0),
(166, 57, 'XRay Lt Shoulder', '0', '', '', '2021-01-11', 0),
(167, 58, 'Xray Chest P/A', '0', '', '', '2021-01-11', 0),
(168, 59, 'XRay Rt Leg', '0', '', '', '2021-01-11', 0),
(169, 60, 'XRay PNS', '0', '', '', '2021-01-11', 0),
(170, 61, 'XRay Neack', '0', '', '', '2021-01-11', 0),
(171, 62, 'XRay Rt Albow', '0', '', '', '2021-01-11', 0),
(172, 63, 'XRay Rt Albow', '0', '', '', '2021-01-11', 0),
(173, 64, 'XRay Rt Albow', '0', '', '', '2021-01-11', 0),
(174, 65, 'XRay Rt Albow', '0', '', '', '2021-01-11', 0),
(175, 66, 'XRay Rt Albow', '0', '', '', '2021-01-11', 0),
(176, 67, 'XRay Rt Albow', '0', '', '', '2021-01-11', 0),
(177, 68, 'XRay Rt Albow', '0', '', '', '2021-01-11', 0),
(178, 69, 'XRay Rt Foot', '0', '', '', '2021-01-11', 0),
(179, 70, 'XRay Rt Foot', '0', '', '', '2021-01-11', 0),
(180, 71, 'XRay Lt Albow', '0', '', '', '2021-01-11', 0),
(181, 72, 'USG of Kub', '0', '', '', '2021-01-11', 0),
(182, 73, 'USG of L/A', '0', '', '', '2021-01-11', 0),
(183, 74, 'USG of Uterus Adnexae', '0', '', '', '2021-01-11', 0),
(184, 75, 'USG of Uterus Adnexae', '0', '', '', '2021-01-11', 0),
(185, 76, 'Semen Analysis', '0', '', '', '2021-01-17', 0),
(186, 77, 'FNAC', '0', '', '', '2021-01-01', 0),
(187, 78, 'PBF', '0', '', '', '2021-01-01', 0),
(188, 79, 'Blood', '0', '', '', '2021-01-17', 0),
(189, 80, 'Medicine', '0', '', '', '2021-01-17', 0),
(190, 81, 'XRay Pealvis', '0', '', '', '2021-01-11', 0),
(191, 82, 'Xray L/s Letaral View', '0', '', '', '2021-01-11', 0),
(192, 83, 'XRay Rt Hip Joint', '0', '0', '', '2021-01-12', 0),
(193, 84, 'XRay Lt Hip Joint', '0', '0', '', '2021-01-12', 0),
(194, 85, 'Xray L/s Letaral View', '0', '0', '', '2021-01-12', 0),
(195, 18, '<b>Differential Count</b>', '.', '', '', '2021-01-17', 0),
(196, 13, 'Test-8', '', '', '', '2021-01-17', 0),
(197, 107, '<b>Physical Examination</b>', '', '', '', '2021-01-17', 0),
(198, 112, '<b>Chemical Examination</b>', '', '', '', '2021-01-17', 0),
(199, 14, 'Microscopic Examination', '', '', '', '2021-01-17', 0),
(200, 117, '<b>Microscopic Examination</b>', '', '', '', '2021-01-17', 0),
(201, 127, '<b>Crystal</b>', '', '', '', '2021-01-17', 0),
(202, 105, 'Cells', '', '', '', '2021-01-17', 1),
(203, 0, 'P/S', '0', '0', '', '2021-01-29', 0),
(204, 1, 'S.TSH', '0', '0', '0', '2021-02-04', 0),
(205, 2, 'S.TSH', '0', '0', '0', '2021-02-04', 0),
(206, 3, 'Anti H Pylori', '0', '0', '', '2021-02-12', 0),
(207, 4, 'BTCT', '0', '0', '', '2021-02-12', 0),
(208, 5, 'XRay Rt Ankle B/u', '0', '0', '0', '2021-02-18', 0),
(209, 6, 'XRay Lt Ankle B/u', '0', '0', '', '2021-02-18', 0),
(210, 7, 'XRay Rt Hand', '0', '0', '', '2021-02-19', 0),
(211, 8, 'XRay Lt Hand', '0', '0', '', '2021-02-19', 0),
(212, 9, 'TC', '20-40', '20-50', '%', '2021-02-25', 0),
(213, 10, 'DC', '30-40', '30-40', '%', '2021-02-25', 0),
(214, 11, 'Hb%', '10-16', '10-16', '%', '2021-02-25', 0),
(215, 12, 'ESR', '10-16', '10-16', '%', '2021-02-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `pid` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'JSON String. { ''relation'' : ''person name'' }',
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_report` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `date`, `pid`, `name`, `guardian`, `gender`, `age`, `address`, `contact`, `is_report`) VALUES
(1, '2021-02-25', '0001', '', 'unset', '0', 0, '', '', 0),
(2, '2021-02-25', '0002', 'aaaa', 'unset', 'Female', 0, '', '', 1),
(3, '2021-02-25', '00001', 'kAMAL', '', 'Male', 30, 'SHERPUR', '01710511241', 0),
(4, '2021-02-25', '00002', 'TEST', '', 'Male', 30, 'SHERPUR', '01710511241', 0),
(5, '2021-02-25', '00003', 'himel', '', 'Male', 35, 'SHERPUR', '01710511241', 0),
(6, '2021-03-14', '0002', 'Arsenio Whitley', '', 'Female', 0, 'Labore pariatur Ess', '351', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient_admission`
--

CREATE TABLE `patient_admission` (
  `id` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `admit_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seat_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cabin_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` decimal(10,2) DEFAULT NULL,
  `due` decimal(10,2) DEFAULT NULL,
  `pair` decimal(10,2) DEFAULT NULL,
  `patient_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_report` int(1) NOT NULL DEFAULT 0,
  `trash` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_admission`
--

INSERT INTO `patient_admission` (`id`, `pid`, `date`, `admit_type`, `room_no`, `seat_no`, `cabin_no`, `days`, `amount`, `paid`, `due`, `pair`, `patient_id`, `name`, `age`, `gender`, `contact`, `address`, `is_report`, `trash`) VALUES
(1, 1, '2021-02-25', 'cabin', '', NULL, '101', '1', '2000', 2000.00, 0.00, 2000.00, '', 'kAMAL', '30', 'Male', '01710511241', 'SHERPUR', 0, 0),
(2, 0, '2021-02-25', 'cabin', '', NULL, '207', '1', '0', 0.00, 0.00, 0.00, '', 'Sharif Dm ', '35', 'Male', '01710511241', 'sherpur', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient_barcode`
--

CREATE TABLE `patient_barcode` (
  `id` int(10) NOT NULL,
  `img_height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_width` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_width` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos_x` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos_y` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_barcode`
--

INSERT INTO `patient_barcode` (`id`, `img_height`, `img_width`, `code_width`, `code_height`, `pos_x`, `pos_y`, `code_type`) VALUES
(1, '68', '209', '2', '40', '104', '23', 'code128');

-- --------------------------------------------------------

--
-- Table structure for table `patient_histories`
--

CREATE TABLE `patient_histories` (
  `id` int(11) NOT NULL,
  `pid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_id` int(11) NOT NULL,
  `parameter_id` int(11) NOT NULL,
  `test_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parameter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `standard` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_histories`
--

INSERT INTO `patient_histories` (`id`, `pid`, `test_id`, `parameter_id`, `test_name`, `parameter`, `standard`, `value`, `description`, `created_at`) VALUES
(1, '00001', 156, 212, '', '', '', '20-40', '', '2021-02-25 12:26:51'),
(2, '00001', 156, 213, '', '', '', '20-30', '', '2021-02-25 12:26:51'),
(3, '00001', 156, 214, '', '', '', '5-15', '', '2021-02-25 12:26:51'),
(4, '00001', 156, 132, '', '', '', '2-8', '', '2021-02-25 12:26:51'),
(5, '00002', 156, 212, '', '', '', '20-40', '', '2021-02-25 12:32:17'),
(6, '00002', 156, 213, '', '', '', '10-20', '', '2021-02-25 12:32:17'),
(7, '00002', 156, 214, '', '', '', '5-10', '', '2021-02-25 12:32:17'),
(8, '00002', 156, 132, '', '', '', '2-5', '', '2021-02-25 12:32:17'),
(9, '00003', 101, 80, '', '', '', '10-14gm/dl   %', '', '2021-02-25 13:07:26'),
(10, '00003', 101, 81, '', '', '', '5000-7000/cmm', '', '2021-02-25 13:07:26'),
(11, '00003', 101, 195, '', '', '', '', '', '2021-02-25 13:07:26'),
(12, '00003', 101, 82, '', '', '', '50-60%', '', '2021-02-25 13:07:26'),
(13, '00003', 101, 83, '', '', '', '25-30%', '', '2021-02-25 13:07:26'),
(14, '00003', 101, 84, '', '', '', '3-7%', '', '2021-02-25 13:07:26'),
(15, '00003', 101, 85, '', '', '', '4-6%', '', '2021-02-25 13:07:26'),
(16, '00003', 101, 86, '', '', '', '00%', '', '2021-02-25 13:07:26'),
(17, '00003', 101, 134, '', '', '', '(150000-200000)/cmm', '', '2021-02-25 13:07:26'),
(18, '00003', 101, 136, '', '', '', '5mm in the 1st hour', '', '2021-02-25 13:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_pid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pc`
--

CREATE TABLE `pc` (
  `id` int(11) UNSIGNED NOT NULL,
  `fullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commission` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `prescription_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symptoms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `test` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `privilege_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(100) NOT NULL,
  `access` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`id`, `date`, `privilege_name`, `user_id`, `access`) VALUES
(1, '2021-01-06', 'admin', 11, '{\"dashboard\":[\"doctors\",\"todays_consultancy\",\"todays_total_report\",\"total_diagnosis\",\"total_investigation\",\"todays_due\",\"total_cost\",\"total_income\"],\"doctor-menu\":[\"add\",\"all\",\"payment\",\"payment_all\",\"alt_doctor_payment\",\"altra_doctor_all_payment\"],\"marketer-menu\":[\"add\",\"all\",\"commission-list\",\"marketer_commision_collect\",\"all_payment\"],\"investigation-menu\":[\"group\",\"test\",\"addMenu\",\"all\"],\"consultancy-menu\":[\"add\",\"all\",\"report\"],\"diagnosis-menu\":[\"add\",\"all\",\"due_list\",\"com\"],\"tests\":[\"add\",\"list\"],\"ultra_test\":[\"add_ultra\",\"all_ultra\"],\"cost_menu\":[\"field\",\"new\",\"all\"],\"income_menu\":[\"field\",\"new\",\"all\"],\"bank_menu\":[\"add-bank\",\"add-new\",\"all-acc\",\"add\",\"ledger\",\"all\"],\"employee_menu\":[],\"salary_menu\":[],\"report_menu\":[\"cost\",\"drCom\",\"diagnosis\",\"patientReport\",\"assets\",\"balance_menu\"],\"sms_menu\":[\"send-sms\",\"custom-sms\",\"sms-report\"],\"privilege-menu\":[],\"theme_menu\":[\"logo\",\"tools\"]}'),
(2, '2021-01-11', 'user', 5, '{\"dashboard\":[\"doctors\",\"todays_consultancy\",\"todays_total_report\",\"total_diagnosis\",\"total_investigation\",\"todays_due\",\"total_cost\",\"total_income\"],\"doctor-menu\":[\"add\",\"all\",\"payment\",\"payment_all\",\"alt_doctor_payment\",\"altra_doctor_all_payment\"],\"marketer-menu\":[\"add\",\"all\",\"commission-list\",\"marketer_commision_collect\",\"all_payment\"],\"investigation-menu\":[\"group\",\"test\",\"addMenu\",\"all\"],\"consultancy-menu\":[\"add\",\"all\",\"report\"],\"diagnosis-menu\":[\"add\",\"all\",\"due_list\",\"com\"],\"tests\":[\"add\",\"list\"],\"ultra_test\":[\"add_ultra\",\"all_ultra\"],\"cost_menu\":[\"field\",\"new\",\"all\"],\"report_menu\":[\"cost\",\"drCom\",\"diagnosis\",\"patientReport\",\"assets\",\"balance_menu\"]}');

-- --------------------------------------------------------

--
-- Table structure for table `procedures`
--

CREATE TABLE `procedures` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `test_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parameter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referral_value` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'with Condition',
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `unit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trash` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `voucher_no` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `total_discount` decimal(10,2) NOT NULL,
  `transport_cost` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `final_due` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reagent`
--

CREATE TABLE `reagent` (
  `id` int(200) NOT NULL,
  `date` date NOT NULL,
  `reagent` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reagent_stock`
--

CREATE TABLE `reagent_stock` (
  `id` int(200) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `voucher_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reagent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recharge_sms`
--

CREATE TABLE `recharge_sms` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` varchar(192) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recharge_sms`
--

INSERT INTO `recharge_sms` (`id`, `date`, `amount`, `sms`) VALUES
(1, '2020-11-18', '500', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `pid` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ID of patients. Connect to patients table. ',
  `type` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'admission or, consultancy or, emergency or, pathology',
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'pending or admitted or released or consultancy or emergency'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `date`, `pid`, `type`, `status`) VALUES
(15, '2021-01-03', '0254', 'consultancy', 'consultancy'),
(16, '2021-02-25', '0001', 'consultancy', 'consultancy'),
(17, '2021-02-25', '0002', 'consultancy', 'consultancy');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `remark` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rf_pc_commission_payment`
--

CREATE TABLE `rf_pc_commission_payment` (
  `id` int(100) NOT NULL,
  `date` date NOT NULL,
  `rf_pc_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` decimal(8,2) NOT NULL,
  `trash` int(10) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rf_pc_commission_payment`
--

INSERT INTO `rf_pc_commission_payment` (`id`, `date`, `rf_pc_id`, `payment`, `trash`) VALUES
(3, '2020-11-18', '2', 9.40, 0),
(4, '2020-11-28', '2', 50.00, 0),
(5, '2021-01-17', '1', 0.00, 0),
(6, '2021-03-14', '10', 500.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `created` date NOT NULL,
  `payment_date` date NOT NULL,
  `emp_id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_salary` decimal(10,2) NOT NULL,
  `adjust_amount` decimal(10,2) NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_records`
--

CREATE TABLE `salary_records` (
  `id` int(11) NOT NULL,
  `created` date NOT NULL,
  `payment_date` date NOT NULL,
  `emp_id` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `remarks` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trash` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_structure`
--

CREATE TABLE `salary_structure` (
  `id` int(10) UNSIGNED NOT NULL,
  `eid` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `basic` decimal(10,2) NOT NULL,
  `incentive` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `deduction` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `bonus` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voucher_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `paid` decimal(10,2) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `remission` decimal(10,2) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_data` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('00dd57854f8c3e9fd621fe766837f1fd', '92.118.160.41', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.c', 1618812021, ''),
('0130632ca929b4795ad7fd474d2ef094', '54.191.109.214', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618896351, ''),
('01320c8b8811106e0ea7f4adb2b39228', '34.212.170.228', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622009276, ''),
('0133f8215d9b9795ee3b1af2355c0275', '69.12.66.230', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.117 Safari/537.36', 1623710145, ''),
('01468225a2fd2fdfaf47e68421ec8d31', '124.71.180.89', 'Mozilla/5.0 (Windows NT 10.8; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3116.88 Safari/537.36', 1614212997, ''),
('0155227a0c5cecd3c955ddb3415adf7f', '159.253.31.111', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 11_2_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 1621581107, ''),
('0155da8bb56f63f542d19f94f9d7d4ba', '38.122.112.147', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 1624667418, ''),
('0171d24d63ffcfaaaf39b79e6497d2b2', '138.246.253.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 1619182625, ''),
('0190c0924331bbdfa6a3db615f5ee5b5', '54.189.127.99', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622455394, ''),
('01c0463853d8d1ac000070c5bc05f0d8', '34.212.150.251', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622525128, ''),
('01c74c2ecfecf255834889678c28c81f', '46.45.185.172', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36', 1620881809, ''),
('01d0e1da4a02c37cb74b0bfac74d3b4d', '103.107.198.230', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 1621873923, ''),
('01e63ce8b4cc2b2ccf3d4f3d70b47113', '203.89.120.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', 1624965322, 'a:12:{s:9:\"user_data\";s:0:\"\";s:7:\"user_id\";i:1001;s:12:\"login_period\";s:22:\"2021-06-29 17:16:09 pm\";s:4:\"name\";s:16:\"Freelance IT Lab\";s:5:\"email\";s:19:\"mrskuet08@gmail.com\";s:8:\"username\";s:14:\"freelanceitlab\";s:6:\"mobile\";s:11:\"01937476716\";s:9:\"privilege\";s:5:\"super\";s:5:\"image\";s:27:\"private/images/pic-male.png\";s:6:\"branch\";s:10:\"Mymensingh\";s:6:\"holder\";s:5:\"super\";s:8:\"loggedin\";b:1;}'),
('01f4221fbd44b0712a64fee1acb24b6a', '34.254.63.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620405703, ''),
('0208f23a417a8585cdfe5b4a337d13ba', '3.249.213.193', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624312404, ''),
('02091cd2c37b5e9e3ce609811f0b1018', '23.224.68.74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.3', 1616744697, ''),
('0233d84d74442d8bd0b2f84681621a7e', '44.230.198.163', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620019615, ''),
('023bfaf7f6d2a31ed72bfbe4bf894178', '67.207.196.222', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 1614251070, ''),
('024b859bfe0bcd14227fcffa74242e03', '54.149.75.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624340402, ''),
('024fce9ec67b3188fd47f15cb612932e', '54.214.228.2', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618031728, ''),
('02ea74f3896ba8e572726c31f9cc6402', '52.11.200.204', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1621975611, ''),
('02f097675900f05e2eb43b0cfd4b9a67', '92.118.77.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 1620872348, ''),
('0301983a21fa3a3d8d8ce8405c0d9536', '52.24.250.106', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1617946141, ''),
('032c1b665b85f6a07fa5237d3d10510b', '52.12.1.54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1622505819, ''),
('03459ad6bd801dc780ac7019cc646522', '36.99.136.138', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614142779, ''),
('03583378abd43928bdc2eaad45f44d59', '167.114.185.54', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.83 Safari/537.1', 1614062289, ''),
('036a6abc3936471df312b06d07b706b5', '198.12.99.107', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/33.0', 1614266285, ''),
('036cfb42ba9bf645b18ef9b2777bda73', '95.217.207.28', 'httpx - Open-source project (github.com/projectdiscovery/httpx)', 1615214703, ''),
('03800ae1203cc7cfafd8abb84728bb11', '207.246.124.225', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 1621857141, ''),
('0387dce79d67b6b1d5d65256d582f90a', '69.12.72.188', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 1621128094, ''),
('038a467401109c0a254f87594cc83ce6', '208.80.194.42', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50728)', 1615902850, ''),
('03ab9e79c66c401c6fa60e2800c62e6b', '221.2.155.200', 'Mozilla/5.0', 1614256022, ''),
('03f609d7dfbb0ed03b209acca3a19417', '221.2.155.200', 'Mozilla/5.0', 1614255975, ''),
('0418d47524e9a0b7eb4a9a2e1d508b61', '121.37.133.156', 'Mozilla/5.0 (Windows NT 5.8; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.2678.88 Safari/537.36', 1615488712, ''),
('0426865022ecb53b290e00987a051ec0', '23.224.68.74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.3', 1616744698, ''),
('042b17a8758ce2b485a2aa43bd93d5d4', '34.213.49.43', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622010286, ''),
('042b96a4476409ff754c92672b83d8b0', '34.211.129.207', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622361019, ''),
('04572f7724c85a1523f0cfb16d27fe44', '124.71.180.89', 'Mozilla/5.0 (Windows NT 7.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3817.88 Safari/537.36', 1614380762, ''),
('04800ade0e6b92d9297881ad000d5333', '124.71.180.89', 'Mozilla/5.0 (Windows NT 10.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.2710.88 Safari/537.36', 1614091087, ''),
('04932cec01a0e7025f180ab6f2e83459', '35.161.211.125', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1619328777, ''),
('04a886f2f76b5a04942271c0038e5f97', '54.212.110.174', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622618950, ''),
('04b307582da43b7d64c5e3e6d3724c86', '66.249.93.211', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1614266972, ''),
('04ba044d578d1796ea8545958b6b66a1', '158.175.164.89', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36', 1619673250, ''),
('04d696e7b8cce121d2d19451b58bad99', '34.217.14.226', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623043430, ''),
('04e95457501723ddc78cbbd8e23630b4', '52.37.48.226', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1622535775, ''),
('04fd3bfac104f3da6123595350daebcd', '52.214.124.200', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621467746, ''),
('052a1b7be953c2f10c6c90fb57ec1497', '18.237.30.16', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622698163, ''),
('05351ecd38ed974b89d178026af7d4fb', '54.184.209.186', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621577737, ''),
('053a22922e9b08b8b9e50ddc73ab1cba', '47.103.42.187', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.3', 1615259063, ''),
('0542ff3df56aa696960bc1418f231e25', '54.36.148.88', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1622848869, ''),
('05453e08dac98b006a511a8e2b0702bd', '54.202.75.138', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:53.0) Gecko/20100101 Firefox/53.0', 1614130764, ''),
('05521c4c88b17042f1a620494301e25b', '54.203.3.145', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623215564, ''),
('05782f1455611ceeb3f21c24d4588710', '159.138.59.237', 'HuaweiWebCatBot/6.0) (To acquire the allowed html pages as reliable information of URL categorization in the automatic p', 1614331377, ''),
('05acc41bf5bba20174e5f3f90baf9ba6', '34.211.44.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1614576640, ''),
('05b15b555c5a8d27f887124160637e4c', '103.62.48.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 1617182748, ''),
('05ea2af7a438ea9d9d51344a3de7a224', '221.2.155.200', 'Mozilla/5.0', 1614255403, ''),
('05ea83e3e482c5ab4e4c049ca6dbe4cd', '31.13.127.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 1624799520, ''),
('062c561e7266dc2439227a64d49f289c', '52.212.30.97', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620422745, ''),
('062cb33542faad28ece87f2220834b48', '59.175.144.14', 'GRequests/0.10', 1621044765, ''),
('0641596bd26992db1a2ad5c87e17d93d', '93.158.90.137', 'Mozilla/5.0 (Linux; Android 8.0.0; SM-G960F Build/R16NW) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.84 Mobi', 1621841583, ''),
('064ba40689eac0bc6571f26fa5bd0c6d', '124.71.180.89', 'Mozilla/5.0 (Windows NT 9.7; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.1396.88 Safari/537.36', 1614138555, ''),
('064db1ed7f96a69e26f08ea7d4b78ee1', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.2370.88 Safari/537.36', 1614109234, ''),
('0656d4a83ea30d34e3e5c0a8402dad1d', '199.244.88.132', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1617673979, ''),
('06b1e62d6ab34521205a36bd404ceb2e', '121.37.133.156', 'Mozilla/5.0 (Windows NT 8.9; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3866.88 Safari/537.36', 1614482786, ''),
('06bcbda9bb2e396d53ecf669ef7f7976', '34.219.250.145', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615873589, ''),
('06bdeff353a8e31aea8e1f3333c8df1d', '66.249.79.154', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1616557652, ''),
('06cd346b12ce8cb34bad9c2e43534cca', '54.184.78.65', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620278543, ''),
('06e099bdb6da6cfb956cee8cb71ee713', '124.71.180.89', 'Mozilla/5.0 (Windows NT 5.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3959.88 Safari/537.36', 1614322751, ''),
('06f4805ba5370976f4f939d08c83247c', '34.254.63.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620403504, ''),
('074c4555d22b8d73e53c29195b66909a', '44.242.145.111', 'Go-http-client/1.1', 1614497603, ''),
('0767632bbb3bb053eb792b8cc97ee2c0', '66.249.79.159', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.90 Mob', 1624925004, ''),
('077f97d3679192f34a64ea87a100fd0a', '137.135.84.149', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.71 Safari/534.24', 1615440266, ''),
('078cc53a0251c24957571cea01e01cb4', '54.188.17.155', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623303121, ''),
('07cf98aec2481030b39b98ea99efd9f2', '52.34.244.33', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619501230, ''),
('07e83db812f35d8f27d2570795fcd1e5', '54.202.37.251', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1616562988, ''),
('08007d8eb1a8a319eb341824d98780bc', '195.24.67.44', 'Mozilla/5.48698 (Windows NT 12.2; WOW64; rv:18.0) Gecko/3252276 Firefox/18.0', 1616228308, ''),
('080480fe72a0cdccb777a5e7bae5c88f', '157.55.39.178', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 1614188692, ''),
('081fe84fd39aef90e666f62e296ca183', '44.192.67.240', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 1618287570, ''),
('0824928631c26d17d0089e2b48b5f8a0', '34.209.200.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1614230926, ''),
('084e9992a89ccbca85d29cc2fe87c298', '93.158.91.228', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:15.0) Gecko/20100101 Firefox/15.0.1', 1616834372, ''),
('0860e3c10deb05e770747d7f5b033f56', '54.90.196.91', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:68.0) Gecko/20100101 Firefox/68.0', 1623787262, ''),
('086fc444e2a3e33aa8f13147dc812221', '35.163.6.136', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621662718, ''),
('089b44669fe712c81c7cdcd43d8800e5', '34.212.49.69', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624858908, ''),
('08aec0dae0bfd0cb602f8c76d2f0192a', '34.212.150.251', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623304233, ''),
('091e87b5a2b8fc12079090417c5bc627', '157.90.1.3', 'Mozilla/5.0 (Linux; arm_64; Android 10; YAL-L21) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 YaBrowser/2', 1614168521, ''),
('09235b9ae6e0fe9322bb9f4c0f182e2a', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.1884.88 Safari/537.36', 1614344817, ''),
('092bdc5cc2a82b7aabef02a7055e971b', '54.202.84.16', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618896097, ''),
('0934d387fe6f0b2652cbf31a1f23d9bf', '34.219.73.64', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617945361, ''),
('093faa33dca07817edaf4ea042d06286', '54.171.164.116', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623188370, ''),
('094114c52f544a5fadbc6f65d8d56b05', '54.36.149.3', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1622834619, ''),
('09634aac17a65cba2ad9afbcc9fa1cb9', '177.53.249.116', 'curl/7.29.0', 1615052279, ''),
('097b4c64c96ff945736202ad326a9831', '124.71.180.89', 'Mozilla/5.0 (Windows NT 9.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.2433.88 Safari/537.36', 1614073748, ''),
('098e79a19c32c16a71d80362e4978aab', '34.249.171.42', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620685288, ''),
('09c7a10cdf7faf1038fb48be9c2f89dc', '34.77.162.7', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1617810958, ''),
('09d4bbb51fed793f773d9d52523332c9', '34.220.13.221', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622455433, ''),
('09d8b837ed1fded4851dab739d42e6bc', '89.108.88.240', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.4506', 1616418118, ''),
('0a0d6d05a71487ca6a901f3553225ca3', '34.220.134.159', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621142686, ''),
('0a568edd49b7b9b4b3d20c6771e0e749', '34.86.35.23', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1620738114, ''),
('0a5d78d9ec258337b6a6c9071e9ade42', '54.218.45.48', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615180662, ''),
('0a6587aa92148ca8af28d66a1625eb5e', '34.82.181.33', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.67 Safari/537.36', 1619376592, ''),
('0a71ceb9adf532e3807aa6f71055c265', '54.212.205.99', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624947264, ''),
('0a747b1c13c61e89cb1108189acc5f1a', '121.37.133.156', 'Mozilla/5.0 (Windows NT 5.4; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3747.88 Safari/537.36', 1615797771, ''),
('0a86f9d1e6add8875acdb946ed469634', '58.53.128.88', 'GRequests/0.10', 1624957266, ''),
('0a8929c3cad5a8b4c3e5480d056d8163', '3.138.153.13', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 1614071332, ''),
('0ac26ebbf6f8419821f3aef15cd99436', '38.122.112.147', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1615287856, ''),
('0acafb47117e9b9c47e4a25e66977dfc', '18.237.148.160', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623215677, ''),
('0ae5ba175e4ca60818afac7633538b43', '121.37.133.156', 'Mozilla/5.0 (Windows NT 6.5; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3883.88 Safari/537.36', 1614900744, ''),
('0aebb4437e35feab4fb56ae97ac3669a', '92.204.170.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.24 Safari/537.36', 1619027087, ''),
('0aed0e1be30748695a4efc6c8bfa3cd2', '54.202.224.17', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616562445, ''),
('0afbc522c833d7a05bb01bb283355f6c', '103.132.183.231', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 1614252873, 'a:12:{s:9:\"user_data\";s:0:\"\";s:7:\"user_id\";s:2:\"14\";s:12:\"login_period\";s:22:\"2021-02-25 17:34:41 pm\";s:4:\"name\";s:30:\"Sherpur United (pvt.) Hospital\";s:5:\"email\";s:34:\"sherpurunitedpvthospital@gmail.com\";s:8:\"username\";s:13:\"unitedsherpur\";s:6:\"mobile\";s:11:\"01907088200\";s:9:\"privilege\";s:5:\"super\";s:5:\"image\";s:0:\"\";s:6:\"branch\";s:0:\"\";s:6:\"holder\";s:5:\"super\";s:8:\"loggedin\";b:1;}'),
('0b037a09be4858ea473c639205f8d8ba', '54.213.27.220', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619587069, ''),
('0b572acb95adea7718612ef4f257652a', '54.191.249.20', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622614275, ''),
('0b70961cb3eded944171a44f7b1ddfcb', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.5; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.1969.88 Safari/537.36', 1614729924, ''),
('0ba39cff20cec88ef5550666d5cf2043', '54.218.78.232', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618290990, ''),
('0bc5923281369b7fabe236b49dbd36d4', '36.99.136.137', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614254214, ''),
('0bdfd791ce362039de4d278a7b11a603', '66.249.73.92', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1615911789, ''),
('0beac637509e3aac001f5afd9d4dfea8', '134.122.8.117', 'Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)', 1622558788, ''),
('0bff54e70b8d76828289519d9efe68db', '185.170.200.143', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3833.90 Safari/537.36', 1614267140, ''),
('0c5ac979e500590615cfb074c078d3a1', '54.191.41.53', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1616100473, ''),
('0c9e2830966948f2ce6e8fdc2f709b7d', '54.201.58.202', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624598310, ''),
('0ca85a2d134c327ff74b185b4ed12e0f', '54.244.167.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621748226, ''),
('0cb30c731e0675f46c028415d3a96bee', '92.118.160.45', 'Go http package', 1623521220, ''),
('0ccb2931d1685f7d43fe726f87a62394', '34.253.200.111', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624051957, ''),
('0cd71aa267190f18c15602ff85b3d652', '54.245.217.251', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621141894, ''),
('0ce72083a240fb92aa92c8930c977c63', '34.213.192.31', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1621111662, ''),
('0d0cd847f5ffc61ca520557f5520ebdf', '34.246.223.10', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1617319595, ''),
('0d10d2ad7e20e5df39444fc29fdaf6b5', '34.223.90.125', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621402380, ''),
('0d1d4c6374de3da1b6ffa87d42042f24', '52.39.71.112', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618552681, ''),
('0d2b9489dc4e22e99aa00fbb0ff883f0', '54.36.149.35', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1622012065, ''),
('0d55439a3957803106e9350e68ee3c5f', '34.219.86.164', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619933363, ''),
('0d68acd5f69fec61073f5c17bfe556c1', '54.171.194.183', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623121654, ''),
('0d9c0bf9f4bbaed052365dc180870d61', '34.96.130.15', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1618974652, ''),
('0dab2d414cf65be84dba67c79338989f', '54.202.94.83', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622870834, ''),
('0dacd6b4ba7ec3869e3b1cfb765635db', '35.165.78.168', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623736309, ''),
('0de1a0e93faca86e637ef58d7a977ae8', '137.226.113.44', 'Mozilla/5.0 (X11; Linux x86_64; rv:84.0) Gecko/20100101 Firefox/84.0', 1624534031, ''),
('0e04a05a9380edf06e7897e0cb160839', '35.80.16.31', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616735178, ''),
('0e281ad3cf2ae0a94e2258e555f406d7', '54.213.188.136', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621661799, ''),
('0e3c0712bfb1d7f95b55ad9e599d1f67', '121.37.133.156', 'Mozilla/5.0 (Windows NT 8.9; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3432.88 Safari/537.36', 1614523969, ''),
('0e5181ccf962c50912f9fe5d3da3b1c9', '34.211.74.15', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621057819, ''),
('0e5482ea84bf94a20e52ec1c072ac5ac', '18.237.73.250', 'Go-http-client/1.1', 1617426505, ''),
('0e74215fd2492a41e4ae696d975830e2', '34.219.114.46', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619242259, ''),
('0e83feb7196795b8e787e35abe2b3a24', '121.37.133.156', 'Mozilla/5.0 (Windows NT 7.8; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.1144.88 Safari/537.36', 1615021929, ''),
('0e948f8f1a2c09e76b372358d0c855cc', '44.234.40.157', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618463436, ''),
('0ea519255d1d2c92b7983641a2799014', '34.254.63.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620405703, ''),
('0ead4d1acd81fc979ca31b724246c07b', '54.218.239.137', 'Go-http-client/1.1', 1616217898, ''),
('0eb4792ba739cc354a53c2a3e0cb78d4', '18.237.222.205', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1616908898, ''),
('0efa7a684f9109b36f22500e1714c0d6', '35.167.194.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624224739, ''),
('0f0aa389108f732b9488fe96422e6b3b', '54.187.7.137', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624426238, ''),
('0f4a55519d0d458cdb6dc57066dbaeba', '35.82.15.175', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621141842, ''),
('0f87dc2de2e66df5f93fdedf98a4dd92', '54.216.91.210', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624147861, ''),
('0f8b8fbb227afa07f26b23fa55796fbf', '185.220.100.252', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3563.0 Safari/537.36', 1620817712, ''),
('0fecdae024a60d89ba086eed932b3f8d', '18.236.84.193', 'Go-http-client/1.1', 1616476527, ''),
('10328b1d2f991b5b89a5973044c36ae4', '82.156.194.84', 'Mozilla/5.0 (Linux; Android 10; LIO-AN00 Build/HUAWEILIO-AN00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Ch', 1623432674, ''),
('10511d80a38341e801e39169b0f519ca', '3.235.141.148', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', 1624238265, ''),
('1059e42f306404ab7d2a93cc3b5c0a3a', '52.49.215.115', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623708577, ''),
('105d1db0d51d2b1658ef4e8ed906e429', '54.203.73.198', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36', 1615059454, ''),
('1063f8eae63982db89cc97b53174894f', '34.66.12.98', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 1621037967, ''),
('10821f101df354206beab336a34fdb09', '51.77.129.159', 'Mozilla/5.0 (compatible; Dataprovider.com)', 1614192371, ''),
('10861e210bb1349409c8319e5159dc48', '66.249.79.158', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1623808622, ''),
('1088ba6a42b28c71d665f127b026213a', '34.217.18.33', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621662611, ''),
('10a98801cf5ef5fe39f64a335c541062', '54.187.25.230', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619932960, ''),
('11486061cbe25dfdb4329ed265783134', '216.151.2.52', 'Mozilla/5.0 (compatible; WbSrch/1.2 +https://wbsrch.com)', 1620015434, ''),
('1152ef33f73377c0a8e2885b553967b2', '54.36.148.68', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1619771539, ''),
('115c5cce3c64355c52ad51309fe64c0d', '196.196.246.23', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 YaBrowser/18.1.1.839 Yowser/2.', 1620861552, ''),
('117cbf2571d41e2681f2fc9669fbe378', '54.186.254.147', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622613125, ''),
('11832e4d86a81a0736869bc543c609c7', '54.36.148.1', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1620521279, ''),
('11b8f0cb25bec850bc1a0ebcb2b7b86e', '157.55.39.6', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 1623623622, ''),
('11c7c67bfe451acebe481a63ca975218', '80.87.193.180', 'Mozilla/5.81181 (Windows NT 20.2; WOW64; rv:18.0) Gecko/8787388 Firefox/18.0', 1622763549, ''),
('11c8e0247e538d7b1061b817a097d7f1', '34.219.160.127', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1621284360, ''),
('11f3ce8a12a9500dabf1219ad98bf499', '52.88.14.212', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624771341, ''),
('121ce936b5b72bdf3d3ad068d9e8572b', '34.215.230.37', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623132785, ''),
('122713ad34130c30345e500b83eb39e2', '104.154.224.237', 'python-requests/2.25.1', 1623188376, ''),
('122d75ec52959586db48e6f6b4ebb693', '54.221.27.173', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 1614162899, ''),
('1240dc5e8149a6754003cf5dc080c0fe', '44.242.135.140', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618290973, ''),
('1261426c61c66fdbca1f147bf8a2755b', '219.138.163.116', 'GRequests/0.10', 1623023927, ''),
('127266c71222e728d8047588caa997ea', '34.210.5.223', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622783790, ''),
('127cd17fdfb1f92fabc22563173844ae', '173.249.22.173', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.115 Safari/537.36', 1617829747, ''),
('12cfed936da18fd8b14efa7b05b19710', '54.212.102.23', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624946947, ''),
('12d43f97d70b142fd54ea90aa80f6e05', '34.208.111.123', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621835122, ''),
('12dadf5a4f31fb1df23271a10d5efe88', '52.11.25.115', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620885173, ''),
('12e576751a3e90edc0ff7ef509301e0e', '92.118.160.61', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.c', 1618815886, ''),
('135fb3c2c6c3ebad8915c28b28bf9b96', '34.213.29.173', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1617082456, ''),
('13e25cf348548c04c60cb2f350538bf9', '203.89.120.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 1614848907, ''),
('13e999db3afe41093adfbcbd3a83b80b', '52.49.210.119', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1617226490, ''),
('13ec0db5b83c41b6cb7e35fa27bb8f07', '54.212.110.174', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622525588, ''),
('13f7dae764103a7f9a31b01d2a87b983', '52.43.242.105', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618031755, ''),
('140b67a12a6d29e1305ff0142e5952e4', '216.19.195.205', 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X; fi-fi) AppleWebKit/420+ (KHTML, like Gecko) Safari/419.3', 1622808420, ''),
('140cf2874e423220d799bb19e8ff7f43', '121.5.78.29', 'Mozilla/5.0 (Linux; Android 10; LIO-AN00 Build/HUAWEILIO-AN00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Ch', 1614573782, ''),
('141957a39acd758f7d3dba2ce4bbdfb3', '54.36.148.68', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1622030875, ''),
('1452fdb6a2bd40162d44cbfc77b68c75', '124.71.180.89', 'Mozilla/5.0 (Windows NT 7.4; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3876.88 Safari/537.36', 1614442624, ''),
('1458ebfc574e3a43faca2dc66a4fa324', '52.209.171.196', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621459443, ''),
('1464c7f0f0f049df7a34f6b8fafcd20a', '54.202.206.157', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622524975, ''),
('14f9a815f06bf7641c82445ce7362acd', '138.246.253.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 1614910069, ''),
('15030b3f570ed0e8a4a40ae68e567c26', '52.26.61.42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615581354, ''),
('1551e7cce2c99c8e7238403b27a3539d', '18.236.167.92', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1621402345, ''),
('156d0d80800db7687ff549dd3d1939d9', '52.13.96.238', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620711976, ''),
('15b32156f5e3a423bbe9a5e73550f19f', '34.221.154.215', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619760516, ''),
('15b58f671ceda534b2117a3b8fee2733', '18.184.195.200', 'Mozilla/5.0 (Windows NT 6.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.89 Safari/537.36', 1615531512, ''),
('15c3cf7abbd4d62e9509e2ab50fbf2ea', '171.13.14.17', 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A3', 1623425973, ''),
('1613c02b45988d88942c3dd07f7aca93', '52.37.7.246', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:57.0) Gecko/20100101 Firefox/57.0', 1614325060, ''),
('163163f8e0aa786fa5a55d7bf1cd1311', '54.184.1.223', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621661418, ''),
('168cd611d34331e2fc283f9b32daef82', '54.191.161.146', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624512882, ''),
('168f056bbe4e56c01eb0a725494d5d21', '198.204.240.246', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:64.0) Gecko/20100101 Firefox/64.0', 1619029576, ''),
('16938e69fdd42cf4ba2a481071c4e17d', '175.136.231.230', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 1615331476, ''),
('16e642a11349bbb9815a59582027c3d0', '137.226.113.44', 'Mozilla/5.0 (X11; Linux x86_64; rv:84.0) Gecko/20100101 Firefox/84.0', 1623332097, ''),
('16f1eae132c302f46e6a7d90aee1da99', '121.37.133.156', 'Mozilla/5.0 (Windows NT 5.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.1711.88 Safari/537.36', 1614575391, ''),
('170db6da79dd0dcb01468dcc31c2cb7d', '52.214.124.200', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621467746, ''),
('172c9489846f0aa444cf4fa16670e11d', '42.83.147.36', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko)Chrome/74.0.3729.169 Safari/537.36', 1623060496, ''),
('1749c402fa4a89e1e253f4ca85789761', '132.232.81.163', 'Mozilla/5.0 (compatible; ThinkBot/0.3.0; +In_the_test_phase,_if_the_spider_brings_you_trouble,_please_add_our_IP_to_the_', 1624195116, ''),
('17595a44462515e013de549fa42c1d88', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.1472.88 Safari/537.36', 1614746142, ''),
('1766aa905ac5aff03f0ec56fe0f1f7e7', '52.89.28.92', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615439415, ''),
('177689f09a204f78c4ae258ae81ab122', '52.35.116.130', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1621370930, ''),
('1782aa3b54639056a0bd8c3c44963549', '35.202.196.187', 'python-requests/2.25.1', 1623363115, ''),
('17e1accea436705fb88b5cccd86ac987', '161.97.175.100', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0', 1614140278, ''),
('17e63f5381a0e930092f59c98b4e1f33', '52.210.64.239', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1622151782, ''),
('17e89472e2eb3e6de4f48f831deea201', '44.234.45.52', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619501189, ''),
('182f919e8e78d17c19665e7509de8232', '34.208.111.45', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623820753, ''),
('1851b424e55daa4a0ed83648bffe4b9e', '54.213.1.111', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624339269, ''),
('18d85a10cbf92bfa10e07bb3f3a6a2aa', '34.254.63.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620405703, ''),
('18d85dea47cd65b966c4c2c7c19e19d0', '124.71.180.89', 'Mozilla/5.0 (Windows NT 7.5; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.2863.88 Safari/537.36', 1614221318, ''),
('18f3452b1d6ec13bc90e6ff429b9073a', '34.223.4.166', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620625316, ''),
('191350ba81af53935bdc01b5f623d9eb', '54.187.193.14', '0', 1620047820, ''),
('19151416cb22b303b02c44fc35a0f998', '18.237.142.110', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622956337, ''),
('192bdd4d0c897658edee7e7ad0e20b14', '35.167.41.56', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624425766, ''),
('192c48d1fe6cc1d88c826cde7d609daf', '73.244.202.3', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 1614078033, ''),
('193a569178b58893efae1e5ba7f47ed0', '66.249.79.150', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1615784795, ''),
('194cde2ed7a6efce758e29373b266045', '138.197.197.212', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 1614078290, ''),
('199ab0fb4e0690058b459eaf7c6ffee4', '121.37.133.156', 'Mozilla/5.0 (Windows NT 8.8; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3790.88 Safari/537.36', 1614785453, ''),
('19d84454de35d322c16beaa38ae03e45', '121.37.133.156', 'Mozilla/5.0 (Windows NT 6.8; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.2245.88 Safari/537.36', 1615748696, ''),
('19ef713dbfa6a831f74230c7ad000c18', '199.244.88.132', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1619081777, ''),
('19fb7c201bdac5dd3d9839165479b1d2', '199.187.126.42', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 1621117610, ''),
('1a02507b4dd95ffcb312ebd76733ca71', '34.238.162.7', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_1 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.0 Mobile/14', 1614140740, ''),
('1a0f8eb14dc5dccb623efb6eef02d6fb', '54.36.148.68', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1624693153, ''),
('1a4402750633675d73b75245eade045d', '51.91.218.19', 'Mozilla/5.0 (compatible; Dataprovider.com)', 1624676074, ''),
('1a5afd2172243d66d8efff4158528fc1', '52.17.237.132', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621373347, ''),
('1a6bd0d0344c68e1058dfef9190428f7', '51.210.219.11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 1616585031, ''),
('1ab710d47ffc462f6746222713f74122', '72.79.50.66', 'panscient.com', 1622430019, ''),
('1ae2a79ef254cb525041baeaecc7e0f1', '23.94.138.18', 'python-requests/2.25.1', 1616800717, ''),
('1b1aec6c307699011f6ffc43fc6453aa', '34.219.60.138', 'Go-http-client/1.1', 1616476532, ''),
('1b361a121f197308b4fe0953269d91d9', '34.222.60.240', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623132735, ''),
('1b395d7356e4edd6123fbe138085b6d1', '167.172.229.218', 'Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)', 1617151178, ''),
('1b61fb55938822002567f5261611488b', '34.221.99.166', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615873573, ''),
('1b6255953cf8e41c78c0ae42de78c896', '54.245.78.161', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614575816, ''),
('1b65db1fd0311ef7969e3538a092243e', '52.214.124.200', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621467746, ''),
('1b8a4cbfc18a8b975a7b458b957b8b10', '51.210.219.11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 1623585326, ''),
('1b8bd93e53751612dcdd8e43fb512975', '34.219.197.185', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1618518614, ''),
('1b95319eb4528533fc277d9223660094', '54.71.44.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621835231, ''),
('1ba4022c0035fbbb3dff91c7af8f98fb', '54.187.118.172', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1622581952, ''),
('1bd0db1d205b5849e5375995bd7adc57', '186.179.42.47', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 YaBrowser/18.1.1.839 Yowser/2.', 1622766969, ''),
('1be430f5b6348fb6447731cb51d1e7e7', '72.79.50.66', 'panscient.com', 1622430020, ''),
('1be5272f3bcf32d0ac5a3b6ef6b14465', '34.212.121.145', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617772522, ''),
('1c0ffe44af1382ed776a039c6c1826f3', '38.122.112.147', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1615637300, ''),
('1c13d7572e9b77da95ec9c7438d0683b', '18.236.235.247', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1616653357, ''),
('1c52b72ce914ababef33284eb54c1234', '177.53.249.116', 'curl/7.29.0', 1615052279, ''),
('1cade9b456d9b75d0562e87d2fbd9fc8', '44.242.135.140', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618290973, ''),
('1ce2e6257e61fdfd3c53373e70c617e5', '58.53.128.234', 'GRequests/0.10', 1619292020, ''),
('1ce6f3f2d03c1320593f698e50035414', '54.184.1.223', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621661418, ''),
('1ce9935b2889d1afe76aed54a22c4273', '35.192.142.107', 'python-requests/2.25.1', 1621786552, ''),
('1d050554b4486543dbf9dec7b200d77d', '34.222.235.171', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1621143508, ''),
('1d08b078c77e9cca76ab1c415b4c0229', '54.153.12.201', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 1615826577, ''),
('1d124c872241fd734cd3b99cfb3c8e5d', '61.135.15.146', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chr', 1621750147, ''),
('1d2497edb207d8760328572e59aa5c5c', '54.202.118.81', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622012248, ''),
('1d3e1e7dde0c17c03748fb1465f05224', '72.13.62.25', 'Mozilla/5.0 (compatible; ips-agent)', 1624292057, ''),
('1d4da96e02a845234f654e7b204a4d05', '174.138.54.121', 'Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)', 1614504199, ''),
('1db2efa17ca4fc733bbdfa1c484081c9', '3.249.213.193', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624312403, ''),
('1de94f4b16df05b517858a998477fa89', '47.96.122.85', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.3', 1615529605, ''),
('1e093124ef172a310447ec205bae5574', '66.249.65.126', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.102 Mo', 1616926917, ''),
('1e1ee00350b6e843bea038e347481fa3', '34.212.170.228', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622009276, ''),
('1e4a8ed947fec8dc237fa1a1ece198f4', '62.171.173.97', 'Screaming Frog SEO Spider/14.3', 1617280269, ''),
('1e670a4fbccdf8a4a33d27358fbe8426', '99.79.73.100', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', 1618299456, ''),
('1eab8c41f544190e6f84870bd5ab20cb', '158.69.124.97', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 1617131017, ''),
('1ebe4507bbac4442ef8396d4e776c453', '121.37.133.156', 'Mozilla/5.0 (Windows NT 8.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3274.88 Safari/537.36', 1615433949, ''),
('1ec832a981c57c5c0c2854b3d66678b0', '64.246.165.210', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:59.0) Gecko/20100101 Firefox/59.0', 1619222597, ''),
('1ed3745cfeb546735d2de0f3aa13a68b', '54.188.191.216', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1619904763, ''),
('1ee89bd67f2fcc77d030cca770693f3c', '54.190.153.209', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622007456, ''),
('1ef337c4f72f88330d4b5a2a2a595c3b', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.1400.88 Safari/537.36', 1614301901, ''),
('1f0824cbcb39324c2abadd7ad1b4d063', '219.138.163.119', 'GRequests/0.10', 1617274745, ''),
('1f0f67e2c3d02c8cb63dc59d7d0e286b', '199.244.88.132', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1620352708, ''),
('1f7b20144bbcc6f833b6ae3c4d5d022e', '35.163.192.176', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621921435, ''),
('1f911ca5a7a7c0e1ecfa14a95e975dcd', '52.26.72.247', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622956595, ''),
('1f9df6a1399018a38d37a7e7cd8adaa5', '54.218.239.137', 'Go-http-client/1.1', 1616217899, ''),
('1fb10f1088043429104b9c4cb03d3c27', '34.222.173.182', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614921307, ''),
('1fba345e06f28b902be295bc110894a1', '221.2.155.200', 'Mozilla/5.0', 1614255425, ''),
('1fd03f4d6ad8b8b5c15111883e60508e', '138.246.253.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 1624029451, ''),
('1fd1ee59e85bf19483fb0da4a13ca90f', '54.171.167.121', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1622144492, ''),
('20a7360fb5849d437c3c52466e04a3b5', '34.219.4.58', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1618431512, ''),
('20af2d05fa5e4e409174c77a9ec3185f', '52.40.28.198', 'Go-http-client/1.1', 1616562460, ''),
('20db75e9d621b712a0424d63d3f774d6', '44.234.49.139', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618722557, ''),
('210206d976474a28733b1e33f7437f8a', '18.184.195.200', 'python-requests/2.18.4', 1615530650, ''),
('213bdbadcc719048415917682cd6af71', '54.206.37.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 1616158178, ''),
('215de29e25a07651c106f8e1e0abdceb', '35.238.13.208', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 1621081663, ''),
('21732e421ae78dae3dd5ad173c8a7f1a', '54.186.122.30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1617222429, ''),
('2174d65e117a20a6cfe3b240aafd4aba', '52.43.126.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623389267, '');
INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('21788d26586a061fe36eec417d6ce25d', '38.122.112.147', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623701699, ''),
('2180752f69906fb39733a35aa610e532', '44.234.150.46', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620625284, ''),
('219a9fad2088237caf7bc18c30cf800c', '34.208.82.179', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1618465055, ''),
('21a70398d557bcfe12a0f5601d1801cb', '34.219.30.227', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1617914203, ''),
('21fd8436937392397632ea8eb9f0ef77', '34.72.146.195', 'ltx71 - (http://ltx71.com/)', 1614164429, ''),
('224732dc87055a05b1243a23056a6138', '111.7.100.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614504382, ''),
('229453865320bcb9cf30965dd0bc5511', '35.194.12.28', 'python-requests/2.25.1', 1621960853, ''),
('22a45e66141e7c9eb25825401f1cca1a', '51.210.219.11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 1617109890, ''),
('22d159add5bd7e2465a5433af912d40e', '66.249.79.150', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1618359962, ''),
('22d2407c9c37b0dd516731156bd54317', '108.62.9.81', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', 1623700556, ''),
('22ea80af7b20703ecb3dbc4909f6ea02', '18.236.239.242', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623529738, ''),
('22f6acc3f7db748af2ba3163fcfa06ba', '34.211.147.166', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621489365, ''),
('23019eb884f871ed60999370b8fc8932', '54.36.148.68', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1618663162, ''),
('230d9c2e4194eab48435298796e9e7fe', '54.36.148.62', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1618421256, ''),
('231d147dd6efb53e0d037aecc397d29b', '132.232.75.2', 'Mozilla/5.0 (compatible; ThinkBot/0.3.0; +In_the_test_phase,_if_the_spider_brings_you_trouble,_please_add_our_IP_to_the_', 1622944076, ''),
('232476484c204dcec5160ef1ee676825', '34.220.217.190', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620797897, ''),
('2348473eb6cc464947343378c67b575c', '18.130.231.167', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', 1615657299, ''),
('234fd9492a05697bd98fc387995a27cb', '52.13.248.207', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621836127, ''),
('235e6d5c4ecf5d8b3e229fefeae26eee', '18.237.223.28', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614748485, ''),
('236eba6bbdf7cc84c8a77a7ecb2db500', '161.69.99.11', 'Go-http-client/1.1', 1614250057, ''),
('237a14bc858a8307ed5cc983f1d4a139', '92.204.170.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4099.2 Safari/537.36', 1618947712, ''),
('2384600f70ab659fa56e8f71405015c4', '138.246.253.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 1618622548, ''),
('23c057b32b0478faca58c88357e7eb64', '27.115.124.101', 'Mozilla/5.0 (Linux; U; Android 8.1.0; zh-CN; EML-AL00 Build/HUAWEIEML-AL00) AppleWebKit/537.36 (KHTML, like Gecko) Versi', 1614317115, ''),
('23ca04d2ec223ad58e6253034976fa21', '54.184.116.109', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1616791512, ''),
('23dd5a124956aff504b0030bbf1aa474', '67.207.196.222', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 1614251070, ''),
('23edee341173187bb5ebc96953a7b4d3', '34.219.26.124', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1623185168, ''),
('240086cc1a0f65812d70b76bcecdec65', '18.236.118.0', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617512871, ''),
('2413bb4c76a3b216883fdf5c4680f57b', '35.162.84.174', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1614663124, ''),
('24245f66d23b63c16bb7a586dbd5775f', '121.37.133.156', 'Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.2104.88 Safari/537.36', 1614502878, ''),
('2429d957b1b34dd0258317e89b662598', '34.218.231.75', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1621315697, ''),
('243bc56d2ded96b56d55c9ef5c509035', '54.213.218.248', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620019649, ''),
('2447ae5a677f53b20d59d954313b00ce', '137.226.113.44', 'Mozilla/5.0 (X11; Linux x86_64; rv:84.0) Gecko/20100101 Firefox/84.0', 1622729921, ''),
('2460ad6274389c5452aa1427e4923fdb', '121.37.133.156', 'Mozilla/5.0 (Windows NT 5.9; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.2650.88 Safari/537.36', 1616344481, ''),
('2468789202e693dac430e84028f31dcc', '34.221.190.255', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1617687068, ''),
('2470503fe6fb472db37ffd8405f1d62a', '54.200.152.143', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624080168, ''),
('247a69c9d205dd67dd0afdfb7dd16746', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.2581.88 Safari/537.36', 1614270186, ''),
('247ee2af15aa567d997a1754d316c3a9', '34.220.13.221', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622455433, ''),
('24d104969ac038d93350cfe7361b1faf', '52.49.215.115', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623708577, ''),
('2531e55f645b2508ae1807c87ef68db4', '54.74.253.18', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1622863116, ''),
('255ebb1c2387af064274bc2ec0e8ed2b', '195.201.192.96', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:21.0) Gecko/20100101 Firefox/21.0', 1614074886, ''),
('258771db30788b9ff70c51f8f36979ba', '62.115.15.146', 'Mozilla/5.0 Firefox/33.0', 1622083929, ''),
('258e1a2a0c839a938e07734db62e8ec4', '188.87.161.30', 'Mozilla/5.0 (Linux; Android 9.0; MI 8 SE) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.119 Mobile Safari/537.', 1614265550, ''),
('2591555ef4f4310a429f8ba2251d024f', '54.214.130.55', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619242247, ''),
('25affc622ab153335c56c38d6efb88d5', '92.118.160.9', 'Go http package', 1624704627, ''),
('26a3a0757d2b88efc46e5ff5428e9c03', '121.37.133.156', 'Mozilla/5.0 (Windows NT 5.7; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3883.88 Safari/537.36', 1615535003, ''),
('26a7c2b360b8c90c3ca97015c08fb979', '124.71.180.89', 'Mozilla/5.0 (Windows NT 10.7; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.2294.88 Safari/537.36', 1614292429, ''),
('26a84a2e6dc7c4d61d6e09cf101da249', '35.160.214.86', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1619295817, ''),
('26cf666c63bdc72bdf2fdea056d9c16b', '35.162.16.199', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622007535, ''),
('27050a816b9d5350f41e6c6301d73296', '34.208.133.180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1619501262, ''),
('2712af9286870a63884617881d4eeca0', '34.209.96.21', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624169980, ''),
('272bd728e03865b42fd7e3fc69358374', '34.221.178.214', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615063871, ''),
('27335dfe99e4c2d1e18fd87baf06d971', '34.222.61.162', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622189616, ''),
('273c34e55778961e17209b3eaef7af1e', '42.193.8.97', 'Mozilla/5.0 (Linux; Android 10; LIO-AN00 Build/HUAWEILIO-AN00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Ch', 1623743976, ''),
('273eaeeae97e4c1eba1ab18135c044d7', '34.212.189.221', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621921042, ''),
('2799451d3799de9556f2b2011de09177', '72.79.50.66', 'panscient.com', 1622430022, ''),
('27999ced2e0890b892dfaabd4d22b3f7', '52.12.171.207', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624170371, ''),
('27b4bf550dd90a2d526831fa044ce1af', '54.245.176.184', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1614922666, ''),
('27b6bfd60d970927eddf7f5989d46d94', '34.222.116.68', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624136383, ''),
('280515ea706c056f3acc8de0c5a6ae80', '37.59.46.161', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWeb            Kit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 ', 1614524845, ''),
('283674436170a19f4c3fe225a4c72f49', '93.158.90.166', 'Mozilla/5.0 (Linux; Android 8.0.0; SM-G960F Build/R16NW) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.84 Mobi', 1621841583, ''),
('285930b5684c5acf7e2c530c429d329f', '15.237.142.234', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 1621447534, ''),
('28b17265cc84a0df8ddf0dc49f31ff74', '157.55.39.178', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 1614188693, ''),
('28d3caa8e2743341e9242d10f07d695e', '171.13.14.76', 'Mozilla/5.0 (Linux; Android 8.0; Pixel 2 Build/OPD3.170816.012) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3765.', 1623425955, ''),
('28f424661cb0d4077f16938cc6cfd91e', '34.86.35.22', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1618344654, ''),
('290731e0dffcd819b59e8d5c9057fc7e', '34.217.109.236', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623908335, ''),
('29092005bac67fa91e875520900ca411', '3.142.123.187', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 1616201873, ''),
('291c621422a66ac3e2c3b13f5d32b4e7', '34.212.137.31', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624511535, ''),
('293aa71bc06d0c127e237f9f72afa9de', '52.66.242.180', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.3', 1621738860, ''),
('29470b3892ae8c38b4e9aa8b20d6947c', '52.41.41.85', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622092010, ''),
('2956ccee008db1cefe556be8abe9fe62', '18.237.73.250', 'Go-http-client/1.1', 1617426506, ''),
('296a7d2627d05756615e42f53abe0d0e', '52.41.73.220', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622956476, ''),
('29743f733ad7124dcee27bf9e27f5582', '34.242.76.230', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1622064117, ''),
('29b5357e5373a80b53c0a2b3af36600a', '219.138.163.119', 'GRequests/0.10', 1617274741, ''),
('29e1e02753a6e85ec2aa3865eb351a57', '54.189.37.244', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618636308, ''),
('29f0a4e1384e79889e89027afd0d122a', '35.193.224.92', 'python-requests/2.25.1', 1622048382, ''),
('29f3821233e07eea41dd13fd0c8987a3', '34.222.236.236', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_3) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.65 Safari/537.31', 1616712973, ''),
('2a0579b515db81a19b7202c44c4655df', '219.138.163.119', 'GRequests/0.10', 1618468560, ''),
('2a3df5be7f126400a79caa3dd018ae34', '40.77.167.27', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 1616176893, ''),
('2a41bf9d15eae9b1627b7984477c3973', '66.249.79.159', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1624072630, ''),
('2a7f4a6647d9e79259627e1a94bf0e5f', '34.220.26.12', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623389515, ''),
('2a86275104255be4ab5949bbb803fd03', '162.55.51.154', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987 Safari/537.36', 1624695691, ''),
('2a91e90701abf58f5fae5b264127ddc3', '121.37.133.156', 'Mozilla/5.0 (Windows NT 8.8; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3790.88 Safari/537.36', 1614785455, ''),
('2ac747303297c990368e2231dd315381', '124.71.180.89', 'Mozilla/5.0 (Windows NT 10.8; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3381.88 Safari/537.36', 1614179058, ''),
('2ae57f74b802652ea07c1ff0b6ff26b9', '222.178.220.178', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 1616230361, ''),
('2b19b4692805da90c57886fa8ce7e28b', '54.246.70.14', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623362830, ''),
('2b3978bf63a7e7be3dfbcfc82c4366b5', '207.244.230.205', 'colly - https://github.com/gocolly/colly/v2', 1624625551, ''),
('2b48b050b1e3f890f47622d7f2d57a0e', '34.222.198.117', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615354510, ''),
('2b4fa34a9c831700e2268d0d72c9dc2f', '37.120.145.94', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36 OPR/5', 1622513513, ''),
('2b675eaceabc55a6e663c31c6167c51f', '54.187.7.137', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624426237, ''),
('2b86859c554d8cf1f8953f5177e67d10', '34.222.173.230', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621143181, ''),
('2b8fa7316c084046397f36e93e7e6eeb', '121.37.133.156', 'Mozilla/5.0 (Windows NT 10.8; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.1711.88 Safari/537.36', 1616058411, ''),
('2b95c2ab417a478c163b235864c550a6', '138.246.253.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 1621589730, ''),
('2c31db1ce08e7d6fd2f3bab6622deaf6', '157.90.182.29', 'Mozilla/5.0 (compatible; BLEXBot/1.0; +http://webmeup-crawler.com/)', 1623237396, ''),
('2c41566a583036189f60431ff39a378f', '219.138.163.116', 'GRequests/0.10', 1623023921, ''),
('2c4232df9251c18bf3f447a3f5419395', '34.253.200.111', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624051957, ''),
('2c8184518e663ad3fdc78985a22d20a8', '52.31.81.196', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1622239473, ''),
('2c8ddf3194e141d3825dd6490ceda8cc', '34.220.128.136', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1618914326, ''),
('2c90c8d533f586f62ac7fcc2286b84fe', '34.214.165.30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1622872506, ''),
('2c99e933f3e4112630a5af2d6b354c1d', '34.209.55.37', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622360813, ''),
('2cc2d7ebd6a440962a97991dd1e61a6c', '18.237.30.76', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624080393, ''),
('2d03ac904b52e97d2e5df11269cfb38a', '54.218.81.1', 'Go-http-client/1.1', 1614139684, ''),
('2d15bb7cf5c83a047b63c7ac001417d4', '185.220.102.251', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1623060076, ''),
('2d6d167c32039a70d2eb271f98ab6a1c', '54.212.102.23', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624946946, ''),
('2dba359836fdf22ec8c620dd407254da', '66.203.112.161', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36', 1614886236, ''),
('2e20d3308f5d1b61f5bee45a747c93a1', '51.222.43.158', 'Mozilla/5.0 (Linux; Android 5.1.1; SM-G925F Build/LMY47X) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.94 Mob', 1614187281, ''),
('2e2865a4f17a7d794cbd81f2352e47a0', '13.57.226.21', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 1621625952, ''),
('2e7ef7f15681b814d8038d6ef682130d', '34.217.72.214', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620019650, ''),
('2e951fe01b672dcd02fa079f694e8eba', '40.77.167.72', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 1618594716, ''),
('2ec3ed627d91a11061d4d34e3e757377', '132.232.75.2', 'Mozilla/5.0 (compatible; ThinkBot/0.3.0; +In_the_test_phase,_if_the_spider_brings_you_trouble,_please_add_our_IP_to_the_', 1623272224, ''),
('2ec8bb35f4a4eb27633cbece8147bb6c', '121.37.133.156', 'Mozilla/5.0 (Windows NT 7.8; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.2731.88 Safari/537.36', 1615175990, ''),
('2ec90b92d28303a77bc7a8db3658c54e', '38.111.114.33', 'Opera/9.80 (X11; Linux i686; U; en) Presto/2.2.15 Version/10.10', 1619188867, ''),
('2edb7fd9363e4dbc71b58709fcc640c7', '40.76.225.102', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', 1623267537, ''),
('2ee1763c0f8fdc655f56b667d3849241', '18.237.112.201', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624425802, ''),
('2ee5b9fc9d63e6af2aec26837e86a535', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3340.88 Safari/537.36', 1615695859, ''),
('2eea0fecdf16330dd4359c67925c35e3', '221.2.155.200', 'Mozilla/5.0', 1614255999, ''),
('2eff136ddfd8fb87c692bfea90e8531a', '18.236.225.172', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615839929, ''),
('2f0cd23554ea73305f332589e2733c24', '121.37.133.156', 'Mozilla/5.0 (Windows NT 5.8; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.2940.88 Safari/537.36', 1616226445, ''),
('2f2ab4af52ac70397915e3be37b0492a', '54.191.229.175', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621401607, ''),
('2f5ffea07000b5cbb7c6309ba3461c05', '18.237.9.176', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621835383, ''),
('2f7e7eb92e7403a3a9c7c0e4ac75237f', '59.175.144.14', 'GRequests/0.10', 1621044765, ''),
('2f9ca551018804863961512f0f349ffd', '38.122.112.147', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1615637300, ''),
('2feae609ab23917a803519d45a80993e', '52.214.124.200', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621467746, ''),
('30102c846443181bc3e9177983b0240f', '52.31.215.46', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620940234, ''),
('3023438de336da835b6558eefc693293', '35.80.16.30', 'Go-http-client/1.1', 1617167283, ''),
('306a664eca9b5b437a303f1d81b1647f', '103.79.168.220', '0', 1614232899, ''),
('308739bb5702a02b163d48034b4947f2', '35.163.140.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624567963, ''),
('308fd7a607cf41f6dec72ac3bf073d93', '34.223.90.125', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621402380, ''),
('309e9aabd6f4abd762d5331a14273af7', '34.96.130.32', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1624659482, ''),
('31059f1a6f542163bc5f17161583bff0', '149.56.150.118', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36 React.', 1621890362, ''),
('317bd17bef71e036dd516b7715e33735', '89.22.101.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1616340435, ''),
('31a62b17a61f8183480d19eefabc127f', '58.53.128.88', 'GRequests/0.10', 1624471015, ''),
('31a7ab9cd18ca5a5d12be086c6e7688e', '54.214.175.159', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624598173, ''),
('31b9592a01cf4b32bb39f12eac01b500', '34.221.23.183', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623736392, ''),
('31eaac3a58e8870a048978e318337645', '52.37.25.83', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620106588, ''),
('32277c1f55d2003334dc42e3d690c805', '52.26.13.80', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624772583, ''),
('324253edadf1fe5399d0f66412b8a07a', '54.191.29.183', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621661936, ''),
('324c868633a5697444f7f91c1585d5a6', '34.221.16.134', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1614716483, ''),
('3274ec534d24af82ec0a1ba7b4dd90a2', '35.163.67.49', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619587443, ''),
('32b8483e4dca6771c74a47e7cea4920f', '18.237.125.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1619209628, ''),
('32c8d4e415e997cdcdb74bff2ae71a77', '34.217.72.214', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620019650, ''),
('32dd41215f468bb473ca7e64b855c771', '34.77.162.9', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: sca', 1616100791, ''),
('32e88db68122542a732571676bdd71f2', '47.74.3.219', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.3', 1615325976, ''),
('3308a37ed514956b0bc47b4202c59bd7', '38.122.112.147', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1619302857, ''),
('3336b29085e4148ab680f4c5ca8ff090', '92.118.160.61', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.c', 1619259061, ''),
('334811f93345e97d0babf5795875fa54', '121.37.133.156', 'Mozilla/5.0 (Windows NT 5.7; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.1265.88 Safari/537.36', 1615897180, ''),
('334fbcb2724d43ca5c9a133c52187b92', '34.77.162.26', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1621897573, ''),
('336323a1707381a413067fe42df9a902', '44.242.171.29', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615785238, ''),
('3384fc67e0251b1dc423616335bb22d1', '208.110.85.68', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1619378325, ''),
('33b3c594cc7b4f06256ca054d99126ba', '92.118.160.37', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.c', 1618240129, ''),
('33cca82df9d81a1547f9274feeb9db35', '34.213.161.236', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622698140, ''),
('340126a3f80a9962fa96c18013ba7baa', '35.166.214.66', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623302044, ''),
('3458c2c1b28a4cf55a9f4374b4a50471', '112.230.45.125', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chr', 1621478290, ''),
('348c2fbbda9928b58692b6e73a026858', '134.175.228.189', 'Mozilla/5.0 (compatible; ThinkBot/0.3.0; +In_the_test_phase,_if_the_spider_brings_you_trouble,_please_add_our_IP_to_the_', 1623405528, ''),
('349bcbf853d1588b690f1c9acea1eee2', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.1953.88 Safari/537.36', 1614080060, ''),
('34aa86902e361432fa5777933113100a', '54.188.78.182', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1619586599, ''),
('34ac8edbcfc8643a8838c29e1f038eb2', '34.86.35.21', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1620786784, ''),
('34b419ab6bb3406d33c5fe0970b81ec5', '34.219.208.217', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622094086, ''),
('34c7ff8f2882e1ea89dd89bfbbd7a2f5', '34.217.66.38', '0', 1621253813, ''),
('35023c633de647692a4ab8167a3a54f6', '54.187.149.228', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1623044170, ''),
('35431c335a0c19bac2e05302cf05ce9c', '34.219.208.217', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622094087, ''),
('3574c486a6dfa1e6503347a46a52a9b4', '221.2.155.200', 'Mozilla/5.0', 1614255999, ''),
('357e1ccb8d73162b8eaf3ba530c93c0a', '34.212.33.204', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621315226, ''),
('35808d8d181d899e5a4040b683d06109', '173.211.77.246', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 1618240406, ''),
('3584214b2541336270db67643153832c', '34.242.76.230', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1622064116, ''),
('35876dd8ce6002d5f7473da5ff7c5b5e', '18.237.24.224', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617599285, ''),
('3588e4172926a4b37aae09905cd73b99', '34.219.202.78', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623908090, ''),
('35a500fc013e964fa7d00438b11a7160', '103.62.48.227', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 1623897379, ''),
('35b2ad5c3bf9faaecb8f44bdeaf3782a', '35.165.214.64', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614317048, ''),
('35b8f056631ffd2cc3088681dce10580', '72.79.50.66', 'panscient.com', 1622430024, ''),
('35dae4848fabe4b972e6e3e6a9f6bcb4', '52.37.181.220', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1619415732, ''),
('35dd94d31900aab68aa76c2c8bdf0d00', '34.216.186.218', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624598006, ''),
('35dff120e9afe68745df7ff78ce86bc3', '124.71.180.89', 'Mozilla/5.0 (Windows NT 5.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.1808.88 Safari/537.36', 1614283003, ''),
('35e7711ee2b3c30e866fdc1f4c1f396b', '54.213.213.112', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622525347, ''),
('360acedf6286b3a6ec6b474c4b9085d6', '34.223.42.161', 'Go-http-client/1.1', 1615513208, ''),
('3638fa27ec1d82dbc7ccc6dacc67910c', '34.209.204.216', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620537712, ''),
('3641addeeff822460a510cbef8693999', '34.86.35.16', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1619538652, ''),
('364d1d1c765d3e217efbc5c501720812', '44.242.153.184', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617858976, ''),
('364e0c6ed43830c288114abfa21f1dcf', '35.164.52.174', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622613625, ''),
('3680cd6a8af2a2772ff5328df68485dd', '52.41.235.27', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622184288, ''),
('36869662321f7a2cebe8b518f0dc631f', '95.217.76.161', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 1622257356, ''),
('3696612be719bc1a73be9703f0b0c55b', '36.99.136.137', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614254121, ''),
('36a47ed09e3f5ce7e75312d8ad798eb6', '219.138.163.116', 'GRequests/0.10', 1616129178, ''),
('36c4c71513e86325ae98fb59bc1e2543', '58.53.128.88', 'GRequests/0.10', 1624957266, ''),
('3701624ae3055ada5318bfdbc6a96f72', '3.15.233.193', 'CheckMarkNetwork/1.0 (+http://www.checkmarknetwork.com/spider.html)', 1614144153, ''),
('370dbf5392868f46d3361d3e5067ae2c', '18.216.136.118', 'Mozilla/5.0 (Linux; U; Android 4.4.2; en-US; HM NOTE 1W Build/KOT49H) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0', 1622146128, ''),
('3713596eb5f4513632afd612ca6ec4b9', '54.214.88.96', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624858731, ''),
('3716562400ae436c2c8c7386c08194d7', '54.188.44.151', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1622147926, ''),
('371a7613f8508f33dff76eb9effadb76', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.1949.88 Safari/537.36', 1614814875, ''),
('375e4d88eca22a4fd85c62731bb54283', '54.187.86.112', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1621835775, ''),
('376e678a96f43136a9a010607846e729', '34.222.128.211', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623736321, ''),
('37b618118ec28341876e0591c2f912e3', '64.246.161.42', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:59.0) Gecko/20100101 Firefox/59.0', 1622604151, ''),
('37e1f8ee5b8fa8fc6fffbb0fb924fc7b', '103.132.183.231', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 1614408675, 'a:12:{s:9:\"user_data\";s:0:\"\";s:7:\"user_id\";s:2:\"13\";s:12:\"login_period\";s:22:\"2021-02-27 12:58:22 pm\";s:4:\"name\";s:23:\"Sherpur United Hospital\";s:5:\"email\";s:17:\"sherpur@gmail.com\";s:8:\"username\";s:16:\"sherpurunited123\";s:6:\"mobile\";s:11:\"01839973101\";s:9:\"privilege\";s:5:\"super\";s:5:\"image\";s:36:\"public/profiles/sherpurunited123.png\";s:6:\"branch\";s:0:\"\";s:6:\"holder\";s:5:\"super\";s:8:\"loggedin\";b:1;}'),
('37f128f10bac2ec4f3f037400e9d8c94', '35.193.31.115', 'python-requests/2.25.1', 1622752195, ''),
('380b71ee3a50316ab695fccb46be8063', '100.20.156.189', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618549817, ''),
('38100619cf3eb2e4d9fbd4f717b2f962', '54.148.62.207', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621055489, ''),
('382bada70d29b719ef2d155fc118b2ad', '42.236.10.78', 'Mozilla/5.0 (Linux; U; Android 8.1.0; zh-CN; EML-AL00 Build/HUAWEIEML-AL00) AppleWebKit/537.36 (KHTML, like Gecko) Versi', 1614116194, ''),
('383c57b38834644bcc1d441b2804b558', '34.221.50.132', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1619123763, ''),
('38423728e15284d468215c072ca48c6a', '34.223.254.209', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1623875833, ''),
('3897a9376db8619fdba14acc3c9d12bf', '54.216.91.210', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624147860, ''),
('38f99564bc6adc43ba2f88de5e129b89', '92.204.170.186', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 1617197826, ''),
('38f9c67f6b76b4b2523e5d836a24070b', '195.201.41.238', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.9 Safari/536.5', 1614126700, ''),
('391bf1f68215790d94061c2a4543f34e', '34.82.190.249', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2227.0 Safari/537.36', 1624439935, ''),
('39238c9a05c1126c031240d755a531e8', '52.24.155.176', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621489485, ''),
('392597ac4c3606eb8adc0fba623a5ca4', '121.37.133.156', 'Mozilla/5.0 (Windows NT 7.8; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.2731.88 Safari/537.36', 1615175989, ''),
('39291191ab8317432af4dc13d6e03b83', '34.96.130.15', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1618514547, ''),
('39299f63808c19b36d263f416964ade8', '42.236.10.74', 'Go-http-client/1.1', 1623430221, ''),
('394c3ac0bf45bc25de99f5bcf5fd4a37', '68.183.116.34', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 1616582699, ''),
('396e7f7bcb555b04a6d28467b2646e4d', '54.36.148.214', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1620526871, ''),
('398d85de8ef5a2c75ef1ea9f67e1f893', '34.210.50.167', 'Go-http-client/1.1', 1614062519, ''),
('39a2405d95b67a24bc9d26ffa5a35a4b', '54.189.230.128', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:82.0) Gecko/20100101 Firefox/82.0', 1623703948, ''),
('39b9f943d0a4fb18b89eb0a915b10bdf', '54.36.148.234', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1619441507, ''),
('39bc084ef10872713a5ded05f6cad2ff', '59.175.144.14', 'GRequests/0.10', 1617049189, ''),
('39c299039fd6883751a745bc15524b92', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.1458.88 Safari/537.36', 1614700677, ''),
('3a0884f46e84192403e8d469f79894ed', '23.224.68.74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.3', 1616744697, ''),
('3a22c8f6e46481606c7172e6f6580162', '34.254.63.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620405703, ''),
('3a3272b6c875010b607133d41fc8ae79', '34.211.143.213', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614426920, ''),
('3a3f12f48d94d60f5960a59a0bb32d7d', '54.189.230.128', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:82.0) Gecko/20100101 Firefox/82.0', 1624379490, ''),
('3a909a877f0c480993aff80214b2b3c7', '54.244.166.191', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622696960, ''),
('3af2fbea9eb08e0da9dffcda4b4c3f8d', '54.184.209.186', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621577737, ''),
('3b05cf7bc31d52a51541ec2fdef37cf5', '54.71.44.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621835232, ''),
('3b1f5bf1355c6d12d163e402479259d5', '34.219.116.6', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616390042, ''),
('3b22992368f33e167a6b5b47c302b7c2', '45.32.21.17', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_8; en-us) AppleWebKit/534.50 (KHTML, like Gecko) Version/5.1 Safari/534.5', 1619127954, ''),
('3baef180724d489ffa8b03de00281911', '18.237.112.201', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624425803, ''),
('3bb8d8a3690d7517e53fb5c089fa9a57', '158.69.126.135', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 1614156863, ''),
('3bd6f6a5fe58956f033f0f79d0c9b0a1', '54.190.110.108', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1616994270, ''),
('3c43da52a11a2b0e6164a541a2388dd5', '63.32.55.80', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1622845235, ''),
('3c45be22de1db65006d9bc96be4fb14e', '3.101.22.63', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 1616180846, ''),
('3c6ee25a86f0e3fb3a9104938d1add42', '34.254.63.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620405703, ''),
('3c8fd31cfd8054540c9a0f0bba369d8b', '18.237.39.145', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1617774116, ''),
('3cb0a3af0bdd9d9b3eb961fea4793bdc', '52.41.63.243', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621577207, ''),
('3cc2f24b7c7893c52c030fc633017846', '54.190.58.74', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624686132, ''),
('3cc911ae8bda0f3aef44e3077d5d6719', '52.208.135.95', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621027488, ''),
('3d19f5b884ac5266d44056d71f99b2dc', '3.127.68.198', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1615126894, ''),
('3d1bc9eceaef655a4182d96191cbdf2b', '34.77.162.23', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: sca', 1616112222, ''),
('3d3b47ac6d0fc6f2d5c396eeeee0298f', '54.201.112.108', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1622063371, ''),
('3d4ba2785a93eeb3e8a3d7fb81c8003e', '144.217.135.206', 'Mozilla/5.0 (compatible; Dataprovider.com)', 1616609528, ''),
('3d9d3d4cd3bef7affb73715688486aa4', '34.77.162.8', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1619553509, ''),
('3dda5fb362261ae2a0e1d60a5b549b91', '13.52.255.209', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 1617991463, ''),
('3e0d3c09bf2a753ed073c01bd6283866', '137.226.113.44', 'Mozilla/5.0 (X11; Linux x86_64; rv:84.0) Gecko/20100101 Firefox/84.0', 1618495975, ''),
('3e0fa3fe51d81d18858c1fe3aa21a570', '34.223.110.205', 'Go-http-client/1.1', 1614587796, ''),
('3e40b662d3d70adce78d196c236a0741', '34.209.44.238', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1621197058, ''),
('3e55ec63c52e296c0f7fe12b438fdf78', '18.237.195.160', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618895573, ''),
('3e65ebf7bd7e9b4898b702e4c337e158', '34.222.160.30', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618896876, ''),
('3e9d368765b0fbd031e73c5b36ef6775', '38.145.77.63', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.2 Mobile/15', 1614259698, ''),
('3eb4e580e5157076e2e0e5d8d04d55bf', '34.208.37.160', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624858934, ''),
('3ebb9d7646a1a2f37543d1e5d96cd085', '66.249.79.128', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.90 Mob', 1623875136, ''),
('3ee7bec20de908dfde5bf4bc5d4446de', '34.217.18.33', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621661989, ''),
('3f15e358b4afe379ce1b1256f56e3e02', '92.118.77.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 1623426433, ''),
('3f26c8d6c028113bee0e6492ffea3bc9', '54.213.165.228', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622619527, ''),
('3f2d1e511fe0d34a37225d814ee5a1ce', '34.214.170.41', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624512417, ''),
('3f6ce57c4982ca8f6db4ddaa33908613', '52.12.171.207', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624170371, ''),
('3f85363a96a946fca74f095a4b48495f', '13.58.153.49', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', 1623619177, ''),
('3fb713291dd842dd02f1c8f54e427afc', '34.77.162.16', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1618298607, ''),
('3fcaa41d841959572429db6b1ee73cfd', '34.221.251.234', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623529772, ''),
('3fe84442122ac08207729a9a31495f76', '44.234.150.206', 'Go-http-client/1.1', 1617599305, ''),
('3ff8bad2caec478e11ed59c6b8c335dd', '37.49.230.208', 'python-requests/2.25.1', 1622724397, ''),
('4006f468852aa9c57d8221bacb0c79db', '34.252.109.71', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621544948, ''),
('400ce72f46a72e1e1cbd7869a3327e9e', '34.224.166.170', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 1614178618, ''),
('405736ef1364dc93f10b04dff58cc3f9', '18.237.148.160', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622870717, ''),
('40575800bd2b4231f0c7df2221534a9f', '44.234.40.157', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618463436, ''),
('409a0af69129cc0a8fb3b99f3d6fe6df', '137.135.84.149', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.71 Safari/534.24', 1615437861, ''),
('40a090c522061a28cb79ab87d9ea90f9', '35.80.16.30', 'Go-http-client/1.1', 1617167285, ''),
('40a46de8562b3dff48a1816a92efcaf6', '92.118.160.5', 'Go http package', 1624247609, ''),
('40b6733539a8feb3e9af891bae701fc9', '138.246.253.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 1622728329, ''),
('40e33f3faad1663dc4c69a466ad7e0f7', '205.169.39.84', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 1614119090, ''),
('414e2721a3d2708039e83a21e5c3c4e9', '52.36.104.64', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624511549, ''),
('4157d82353c62e07b4b83266cb86338e', '18.184.17.216', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', 1621543106, ''),
('416b83332c74c4e5ba5bc5e525397751', '34.221.251.234', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623529772, ''),
('4172dfb6a02766ea1e9ec6e3196b7f78', '52.13.202.90', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1618258863, ''),
('4175fc876d51be0e5f5e65229affb7e3', '138.246.253.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 1620414653, ''),
('4185e7cc85e5ada5d4da3e8402a4908a', '34.220.52.9', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621057691, ''),
('41c540490f2a3f5a5c3ce4016440ff88', '35.80.14.132', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614834781, ''),
('41d481d1c57831e7f50c376019ab257e', '38.122.112.147', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1619302853, ''),
('41da1f2786af96c6248bda33b53c405c', '18.237.145.205', 'Go-http-client/1.1', 1615957890, ''),
('42032b42a92fb05004e7d47782155641', '36.99.136.135', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614862112, ''),
('420cbd64202b1ee4dd662ada2330d85d', '54.214.130.55', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619242245, ''),
('42648506e65d22e5759cb38467f4e66e', '44.228.141.196', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620797858, ''),
('42b99ffd9791e50628e1f70b24307693', '121.5.109.55', 'Mozilla/5.0 (Linux; Android 10; LIO-AN00 Build/HUAWEILIO-AN00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Ch', 1623366715, ''),
('42e5185e2ca0b936ed1c8b4271e1b9be', '54.191.177.220', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621577183, ''),
('4315a6efa98748fc7b40d82682163b3e', '203.89.120.5', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 1615721748, 'a:12:{s:9:\"user_data\";s:0:\"\";s:7:\"user_id\";i:1001;s:12:\"login_period\";s:22:\"2021-03-14 17:36:01 pm\";s:4:\"name\";s:16:\"Freelance IT Lab\";s:5:\"email\";s:19:\"mrskuet08@gmail.com\";s:8:\"username\";s:14:\"freelanceitlab\";s:6:\"mobile\";s:11:\"01937476716\";s:9:\"privilege\";s:5:\"super\";s:5:\"image\";s:27:\"private/images/pic-male.png\";s:6:\"branch\";s:10:\"Mymensingh\";s:6:\"holder\";s:5:\"super\";s:8:\"loggedin\";b:1;}'),
('43b3ef3dd32f0d51780838b0e5ff00ce', '34.213.49.43', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622010287, ''),
('43b4e1faa61766233a3e01904290455c', '54.212.169.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1618378915, ''),
('43d29331cec5b4c2262b18ad856f4c91', '44.234.45.49', 'Go-http-client/1.1', 1615612887, ''),
('43e67ad2739f59e5e739f354a4e7c54b', '54.202.240.118', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622009228, ''),
('4411cce22c6cc92c047d7c592c538a43', '34.220.75.201', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624170338, ''),
('4421b3bb3747f1aec6f067bd3518345e', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.9; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.1710.88 Safari/537.36', 1615591291, ''),
('4491b8af63c3844fdd00c3f19a683990', '173.208.244.90', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1624590690, ''),
('449363bea8a812a3ba02ae0af4b2dc7f', '54.191.141.192', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1617396944, ''),
('44960856e5aa1c2c4510ee9ebcda4c79', '47.52.147.41', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.3', 1615258583, ''),
('44bf82e6c2d772af31ae43d0ebd84dab', '54.149.61.240', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615667182, ''),
('44ce7f9130bbb0d3c6c31f18de177659', '157.90.116.154', 'Mozilla/5.0 (X11; Linux i586; rv:31.0) Gecko/20100101 Firefox/73.0', 1622108195, '');
INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('44d3a1ec7fa5cef84d934e1ecaea71e6', '18.237.151.6', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624511683, ''),
('4536740c2095f1b7a2d6a346ea493810', '44.234.121.203', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615354522, ''),
('455c4a6ff7d3f993f2dac26e562061b2', '18.237.148.160', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623215677, ''),
('456dd51daacaa54a1485dfe67e25aeb1', '62.115.15.146', 'Mozilla/5.0 Firefox/33.0', 1616902383, ''),
('457b882991745865cf61d996be1a343e', '54.202.71.121', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1619727716, ''),
('45aec19e76ad1f54a7d6618ffe282e86', '34.216.185.202', '0', 1614132251, ''),
('45afa2b36580135f0cfb45946a4685d2', '121.37.133.156', 'Mozilla/5.0 (Windows NT 5.4; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.1793.88 Safari/537.36', 1615326350, ''),
('45e09a65a3645733c7b88bc6cc2e30ad', '51.210.219.11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 1617109890, ''),
('45f2ccb75d39137f24231103fac92d9b', '54.245.174.112', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624948524, ''),
('45f31f70773d7c8d330e2a78cc4ddf10', '203.89.120.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', 1614252281, 'a:12:{s:9:\"user_data\";s:0:\"\";s:7:\"user_id\";s:2:\"13\";s:12:\"login_period\";s:22:\"2021-02-25 17:24:44 pm\";s:4:\"name\";s:23:\"Sherpur United Hospital\";s:5:\"email\";s:17:\"sherpur@gmail.com\";s:8:\"username\";s:16:\"sherpurunited123\";s:6:\"mobile\";s:11:\"01839973101\";s:9:\"privilege\";s:5:\"super\";s:5:\"image\";s:36:\"public/profiles/sherpurunited123.png\";s:6:\"branch\";s:0:\"\";s:6:\"holder\";s:5:\"super\";s:8:\"loggedin\";b:1;}'),
('4615e8343b8bf2d2654fd3b461009c3b', '18.224.66.54', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 1614508951, ''),
('464a7c9ee03581c6e0c3ba71c54e2e43', '18.237.151.6', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624511682, ''),
('46612868b441da703cd947f423eaeab5', '92.118.160.57', 'Go http package', 1618715422, ''),
('4681bc64d040af87118b884cf4f035dc', '34.217.79.188', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1617254591, ''),
('468dff825547191369862fee1a992ea6', '34.222.61.162', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622189617, ''),
('46a691a6e0867a5639f4370f1f1698bf', '95.217.34.209', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 1622426742, ''),
('46cbeac8574a98973b822f15c29de88b', '124.71.180.89', 'Mozilla/5.0 (Windows NT 9.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.2433.88 Safari/537.36', 1614073748, ''),
('46cf2b7561aa442c7dc4ae771e0c6cf0', '51.158.108.61', '0', 1621454577, ''),
('46e9f04eab2fb6e55999a66d011444ed', '34.223.4.166', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620625316, ''),
('46ea14fd30bf2c93987952018ace75c6', '18.237.176.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1618551613, ''),
('470ed329921a78e2e699954e17f67013', '3.249.238.249', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1617303743, ''),
('4711d0121e77f0ca44f5ee0d94ad7dd8', '34.219.156.138', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622360867, ''),
('474b46edb76ff3c95443faf53dfad824', '207.246.124.225', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 1621857150, ''),
('475bcdde6575ff240b74ca9c3c0b74d5', '54.148.220.220', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614139660, ''),
('4769c5f008ffbb1ed35132f6e3db42bd', '44.234.20.66', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617772516, ''),
('4770b5c9e0d28e0255534e140feeb13d', '54.202.229.90', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624858711, ''),
('4780be28d544ebcb360d24dbd44f0d3b', '54.187.85.204', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1616219820, ''),
('4797ae340d4bdac6d60f71df58d3c5af', '66.249.72.198', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.97 Mob', 1620529385, ''),
('47c140722d99fa259c9702564766bc5c', '44.234.51.243', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614062443, ''),
('47d219ba777066ed4f6d767016760378', '54.201.137.160', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622871400, ''),
('47e1d510a8cee4cbacefbe4e509a1578', '18.236.249.30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624000667, ''),
('47ed813d7861dec01ed5e44b15353cac', '205.169.39.84', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', 1614119098, ''),
('47f44601423c6ffb3454f323fc3df1ec', '216.19.195.177', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.19 (KHTML, like Gecko) Chrome/1.0.154.53 Safari/525.19', 1619927080, ''),
('47f77c3f5d13ad43938e848035ee1626', '54.191.79.209', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623303503, ''),
('480553293b37122ba65d6d6890703c13', '3.16.27.158', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 1624864948, ''),
('4813ef896732649e0948acbc7cd40619', '34.247.245.103', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620164094, ''),
('4848de298ccfd702d8b5bdf803b973ef', '34.254.63.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620405703, ''),
('485a08903ba5c00107bfb1a27ce2885b', '54.187.77.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617167266, ''),
('485f89a8cdc5bc595cb1b30711d68b3c', '54.70.251.84', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624511688, ''),
('48db66d80a06038c6373b438f94dc566', '54.216.91.210', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624147860, ''),
('48dee506eca6c429f9feea51952eb25f', '54.209.149.228', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 1614112125, ''),
('4910bdd2c063c7113c08d5306e070c21', '39.101.217.74', 'GRequests/0.10', 1616787077, ''),
('49354b0912f4cd32fcc0c16d4149ecd3', '34.210.5.168', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623736742, ''),
('49452aab9d368013d31768461b84e1cf', '54.185.222.4', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624686806, ''),
('495a286f232584bb2e726510efe3cf1f', '121.37.31.163', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.3', 1615529603, ''),
('495a4a17fd9af12ab408ffca0eac5364', '54.184.78.65', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620278543, ''),
('4992b4cca9da021bd1072b8d6cd4babc', '34.219.73.64', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617945361, ''),
('4993411a48a35eab418c98ddd2d3bb7a', '34.223.82.43', 'Go-http-client/1.1', 1616822656, ''),
('49c1b3488cb4416133f92f3f21a7d34b', '34.222.237.65', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614834779, ''),
('49c38ed53db9eea80882a0d2990937c4', '54.186.133.181', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1623225643, ''),
('49fd5f2d7fa581b490094dba22cfc483', '54.36.148.251', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1619059670, ''),
('4a0d65cc96a58c85eb93d2ca373c2b1a', '44.234.87.169', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618031722, ''),
('4a0db94eff66933075ded39377c1fb76', '194.110.114.122', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 1614972764, ''),
('4a11e5de92aa317150e78afc36700274', '185.200.117.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 1616063006, ''),
('4a1d467129729a1f1f7311270f043773', '18.237.103.192', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614501694, ''),
('4a45d1535a896501c532d6cc097f866d', '54.36.149.15', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1618386931, ''),
('4a8c4ddfbf0eedd7c3cdbe2e4485c5c7', '205.169.39.206', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', 1614922821, ''),
('4a8cd1947bf329c3a4e3956a4018f9c9', '34.82.182.44', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2224.3 Safari/537.36', 1614071052, ''),
('4aa94360bfa326c8fbfb34f0f3ab2585', '44.234.89.42', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 1614838671, ''),
('4abbc37059185b2a2f1e1c73d29d25b4', '20.83.153.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4240.193 Safari/537.36', 1615065259, ''),
('4aeae647182a068c429a95f5ea7c0773', '52.24.143.9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1614490368, ''),
('4af7993df1c2bf0bee32d7984442a254', '173.211.77.246', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 1618240406, ''),
('4afd9aa430b9f2df8be761ed7ff36cde', '94.130.96.26', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Safari/604.1.38', 1616850269, ''),
('4b0e68a9750dac72607564da2f145238', '34.219.158.148', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619068618, ''),
('4b25d3c6ce929b1a5a70a4f92981b5cb', '35.239.153.226', 'python-requests/2.25.1', 1623450317, ''),
('4b41cf8651fb4ab368ea3e7e19dea33e', '121.37.133.156', 'Mozilla/5.0 (Windows NT 7.4; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.2341.88 Safari/537.36', 1614658356, ''),
('4b4f8edde2c4fa97db1758db0f5da3cf', '216.19.195.0', 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en-us) AppleWebKit/312.8 (KHTML, like Gecko) Safari/312.6', 1617786416, ''),
('4b51ec4be5e00eb500a78293afa50a60', '54.36.148.122', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1622681729, ''),
('4b58b2c784a2da5356d716057b7db86f', '124.71.180.89', 'Mozilla/5.0 (Windows NT 6.5; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.1747.88 Safari/537.36', 1614249303, ''),
('4b8eef4478372ccf0ac95ce9b58c279c', '34.209.74.76', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620279788, ''),
('4b9babd112aae585772471f961501e75', '54.195.32.108', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1622584346, ''),
('4bd8811be66fd106883007b55361ad0e', '18.237.138.131', 'Go-http-client/1.1', 1616562490, ''),
('4bdced4ce584c67ff2dd16033473eb75', '18.237.138.131', 'Go-http-client/1.1', 1616562489, ''),
('4bed51c5681fe67f170e8a41179d90a1', '34.223.6.141', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623044296, ''),
('4c16ab98e8ba51760ceea043a47a4e85', '54.203.73.198', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:82.0) Gecko/20100101 Firefox/82.0', 1621327289, ''),
('4c25004a0b92c9e5df5ee4016844c083', '54.171.164.116', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623188371, ''),
('4c37b8271a790638a8163fa52e9eb3f9', '54.187.164.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1618691436, ''),
('4c79b1a4c662114917770a3f32bfff79', '54.202.55.102', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616994205, ''),
('4c9daef8ca919d1b7108f7a05cf18941', '221.2.155.200', 'Mozilla/5.0', 1614256022, ''),
('4ca0cea449ebfe5c7d2bd4d390dcc0bc', '51.158.191.84', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:79.0) Gecko/20100101 Firefox/79.0', 1620457447, ''),
('4cabf27ffa0822942934465334b53f44', '54.214.156.222', 'Go-http-client/1.1', 1615092980, ''),
('4cc8fbf02a2e0525d7fa23d8fbb39f19', '54.77.236.226', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624658094, ''),
('4d020ac7ff333fbfdae37cecb01b9f55', '192.99.18.136', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:72.0) Gecko/20100101 Firefox/72.0', 1623264059, ''),
('4d0365b9f8c68e05753c6da06a44da94', '54.201.151.57', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622783844, ''),
('4d3d727b488a3f8bc5d9442356d138fd', '38.122.112.147', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1615287854, ''),
('4d80bdf32310266c8497eaa1940a800b', '42.236.10.93', 'Mozilla/5.0 (Linux; U; Android 8.1.0; zh-CN; EML-AL00 Build/HUAWEIEML-AL00) AppleWebKit/537.36 (KHTML, like Gecko) Versi', 1614648714, ''),
('4d84f0799b64478d7922d7332cf27fff', '192.99.18.136', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:72.0) Gecko/20100101 Firefox/72.0', 1623264055, ''),
('4e06d0befce1b1e5f5e1382a3a9d9904', '52.209.114.168', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623102774, ''),
('4e4bd4879ce601c8e8c9006dfe0cfe99', '34.215.242.173', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615236825, ''),
('4e8240c54a3d648f528d76d1b93a713c', '54.36.148.117', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1617795715, ''),
('4e9e0b6edb6d3c2240301efef4bea44b', '219.138.163.119', 'GRequests/0.10', 1618468562, ''),
('4ea7ecdb6e0c9e283d7aed3f4258fdcf', '34.77.162.14', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: sca', 1616197265, ''),
('4ecca39742eee12c7b928aa4611c61b7', '54.202.7.254', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1614889536, ''),
('4f506d19793edb92201bea80e1832ad1', '34.213.71.95', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1622926570, ''),
('4f575a62d0843324d3aef5cda1be9cab', '18.197.69.18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', 1615509144, ''),
('4f973438bb686c4f33482e63f52c0f9e', '54.184.228.86', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620020980, ''),
('4fc21eb7c00625179e0dd95b41edd819', '54.191.79.209', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622455420, ''),
('4fcf2e1811c5f3d59674983335ecb122', '52.43.126.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623389267, ''),
('4fdff45a3bcde265b42dad154e8b3ac9', '121.37.133.156', 'Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.1997.88 Safari/537.36', 1616448103, ''),
('4fe3c148ea3f54323d5d37c836dd09b3', '3.249.238.249', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1617303743, ''),
('4ffdb89607ee4390875c217969eb28f8', '54.184.153.171', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620625641, ''),
('50002aa0d06cfbd4209c3b90ec070215', '52.40.105.238', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624947017, ''),
('5010800885e475051b45c39e9782019b', '45.57.226.159', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 YaBrowser/18.1.1.839 Yowser/2.', 1616765895, ''),
('5067f4fc76a5d493ece4732914d7d003', '18.237.229.44', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618722535, ''),
('50a98cc29bc24b38c014ab1dbbe0c073', '35.160.138.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615149234, ''),
('50bc074dc2ff9e4abf6c146a06b1b72f', '34.222.58.139', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1623963086, ''),
('50bc55c10138d0e2c092e41fdec13daa', '34.220.26.12', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622956189, ''),
('51022e070c918f0e6b7379ce1b05455f', '44.234.147.240', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620106451, ''),
('510441e0932725c1d1e28a62900762a0', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3340.88 Safari/537.36', 1615695859, ''),
('510bab7cdf3429ba8d2f997ed60680dd', '157.55.39.6', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 1621207476, ''),
('511088f1df630222306170798fed4590', '103.67.159.77', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', 1622943082, ''),
('512034151f5591602a9fe53bbfa2e25d', '52.41.41.85', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622092009, ''),
('512103fc1c50b78ef4198597345ddf57', '54.216.91.210', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624147861, ''),
('513e31d48f5fb22a2ffbbc59a08f621f', '34.77.162.7', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: sca', 1616790225, ''),
('51788391ea1ad9f286960253c26c9857', '34.218.242.118', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619933254, ''),
('517e34fb04233ecad11f2cdd840b3720', '23.251.152.10', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.79 Safari/537.36', 1615540139, ''),
('518e9896b6eff9ab3b7d6f26f1a572eb', '18.203.110.81', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1622497531, ''),
('519b8dfe2a1deafc8547623e8f5d6247', '34.219.180.109', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623303023, ''),
('51ac3ff708e39e4fa19c97b51cdb5451', '52.213.169.140', 'node-fetch/1.0 (+https://github.com/bitinn/node-fetch)', 1614266968, ''),
('51eba65123ae308ac9ecb052b3e2ec62', '199.244.88.132', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1622521485, ''),
('5224189c706005a3b4a877458d193b63', '35.225.69.0', 'python-requests/2.25.1', 1622664900, ''),
('52318de73fae99578c2e70d915304caa', '92.118.160.61', 'Go http package', 1623556336, ''),
('523946793fad9412fe1a5b224e988d9c', '192.71.36.158', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge', 1618180947, ''),
('52516db4cbd932850ac536c6a5628db0', '52.209.114.168', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623102775, ''),
('526fc4e9470a8281361825311a55a137', '34.219.202.78', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623908090, ''),
('528f79c77997898a4663382471946d5e', '206.180.173.245', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 1615758702, ''),
('529b0743c8e10fccf198601f71323b59', '124.71.180.89', 'Mozilla/5.0 (Windows NT 9.9; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.1879.88 Safari/537.36', 1614391431, ''),
('52ba3dbd169888d908e92466fe46ab2b', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.2482.88 Safari/537.36', 1614555911, ''),
('52cb9a0f6519c81ad9a0e1088c5a8c55', '34.216.186.218', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624598006, ''),
('52cbd543e595b13407527ab269d4f804', '181.214.183.206', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.2 Mobile/15', 1614642567, ''),
('52dc5883eefcc6c08191202422c13d65', '52.35.80.218', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615527201, ''),
('52eddac3e55b692f433969b44e2f426d', '76.72.172.165', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 1624962779, ''),
('52f366bb0095ca451399838f516a7f15', '54.244.176.209', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615959191, ''),
('53465c0afbfb4356f399bd672e10ca8d', '89.108.88.240', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.4506', 1616418118, ''),
('539aa8e5e3b5237c693f4a221b63442d', '18.144.101.123', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 1616782192, ''),
('53c76a1bd476e7f750ff866df714ca31', '129.146.160.67', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4240.193 Safari/537.36', 1614917542, ''),
('53cc100018529b18747064929d5cc526', '89.108.88.240', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; InfoPath.2)', 1616418115, ''),
('53e3ba4ab85650ebffc3869ce11cf6f8', '23.96.90.107', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_8; en-us) AppleWebKit/534.50 (KHTML, like Gecko) Version/5.1 Safari/534.5', 1615017293, ''),
('5412b9e111bb48f0f997cd927f9079bd', '34.213.91.122', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615957872, ''),
('541a27256ce1a7d9fe9b0b571ae9a13e', '54.190.164.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616476496, ''),
('541bbe7aa739247f798372a9ce5948de', '18.237.145.205', 'Go-http-client/1.1', 1615957890, ''),
('54880bb6722eb8c5dd6ff24ef06e8553', '34.209.232.146', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622010307, ''),
('54901ebfe5cffb253e77df6b8093e5cf', '35.161.43.146', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622186624, ''),
('54b5b8d176851a28bc4e0d11439f9be9', '124.71.180.89', 'Mozilla/5.0 (Windows NT 9.8; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3185.88 Safari/537.36', 1614311914, ''),
('54b82d92d6c370925d817e02d00a378b', '52.33.121.178', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615612863, ''),
('54dfc4045a29d7f2f70abebed1d77292', '18.237.106.111', '0', 1615206938, ''),
('54e9ba8411d2623df80403a8978ea5e9', '40.77.167.72', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 1618594716, ''),
('555ae7ce97dbd36e7a4ca0946dce7c8e', '124.71.180.89', 'Mozilla/5.0 (Windows NT 7.4; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3876.88 Safari/537.36', 1614442630, ''),
('55633020754cbff16444cb4d20991312', '34.219.227.238', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622007341, ''),
('5572ae318f98ecaf2562daddf7518df0', '34.219.129.87', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621661564, ''),
('55a4747cf551f1a213ae1176f355a113', '121.37.133.156', 'Mozilla/5.0 (Windows NT 7.9; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3306.88 Safari/537.36', 1614955445, ''),
('55b2d915582e7962aee3d62dad54f276', '93.158.91.234', 'Mozilla/5.0 (iPhone9,4; U; CPU iPhone OS 10_0_1 like Mac OS X) AppleWebKit/602.1.50 (KHTML, like Gecko) Version/10.0 Mob', 1623438932, ''),
('560b2fad641a07d8c2bcb7e97c356fe6', '171.13.14.8', 'Mozilla/5.0 (Linux; Android 8.0; Pixel 2 Build/OPD3.170816.012) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3765.', 1614372046, ''),
('5618f5a3128fa406910b52c02950e714', '138.246.253.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 1621032194, ''),
('5664299df85a1504ed083c04fd8e33c8', '44.242.164.105', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617686126, ''),
('566e37e63d861df210fb597b2043e4e5', '137.226.113.44', 'Mozilla/5.0 (X11; Linux x86_64; rv:84.0) Gecko/20100101 Firefox/84.0', 1623332098, ''),
('566f15e4c741a98dbb5e88d5ff63ab67', '35.163.253.56', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622614851, ''),
('5679901f9212c71111840d739244988f', '34.213.225.199', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1621890937, ''),
('56b11f45d030739d326112b960717631', '44.242.175.235', 'Go-http-client/1.1', 1614748369, ''),
('56b2137f3bdbbc0e59ce179dbd7e20d2', '52.41.64.109', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622008532, ''),
('56bb7ee44d26fea961731363e9b83b5f', '34.218.41.44', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1619989849, ''),
('5721293b7ce93fa137975d1e5fcacbcf', '52.41.63.243', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621577207, ''),
('572ab0536f25c4be17aac70f3ce03cb4', '18.237.106.111', '0', 1615206939, ''),
('5736da8bcaf34029f5c48c6336ed92ff', '52.13.124.242', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622696972, ''),
('5742ce9764a4847ef7ad7d627055d47f', '50.112.195.201', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624339830, ''),
('5747049d416aaa3589b5851b2c263b79', '34.213.190.30', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614062443, ''),
('577a10f8ff55f29939c69c232b007646', '34.252.109.71', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621544949, ''),
('5788983ec527d3b9f4cff190b49e6f9b', '54.216.91.210', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624147861, ''),
('5788e579086552bea1d0e33a77f2d4db', '156.146.36.105', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:50.0) Gecko/20100101 Firefox/50.0', 1623071935, ''),
('57ad65107884d469928a366e5fa2f050', '217.12.221.2', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1621621478, ''),
('57bf8d17a12b77883ea6963b13fda13f', '35.185.253.184', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2227.0 Safari/537.36', 1619376592, ''),
('57c58b2642f750f39db04a201d00dc54', '54.188.57.202', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620975914, ''),
('57e45170fe84a0b49b2cd66cd482555b', '34.211.183.172', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1617569069, ''),
('57ee5c6d6a995865bb1fc1819af12de6', '221.2.155.200', 'Mozilla/5.0', 1614255452, ''),
('580139d3111372a299e679a742fa5df7', '34.66.12.98', 'python-requests/2.25.1', 1621037967, ''),
('582827d3c047c843b5b9dfcfbd9533d1', '54.245.178.58', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618895250, ''),
('5876923dad2a20918e22aaa1a7399b12', '54.201.224.243', '0', 1624893466, ''),
('58772e53ec1d9208d95df4166f724a9d', '72.79.50.66', 'panscient.com', 1622430026, ''),
('58a5292f5adc7f1e7c1f8cb704e038eb', '18.237.37.57', 'Go-http-client/1.1', 1615873639, ''),
('58d0489aca1fae43366c2bbe65880184', '78.47.119.7', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 YaBrowser/18.1.1.839 Yowser/2.', 1620244150, ''),
('58e09e479318d66543ae03156cc58835', '44.242.136.245', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618636366, ''),
('58f482e1054a7bdd4fccafad9e9fd722', '18.237.37.57', 'Go-http-client/1.1', 1615873638, ''),
('58fce8a64eacb89568a9d288ae34b0a7', '159.69.62.182', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:21.0) Gecko/20100101 Firefox/21.0', 1614072093, ''),
('5910baae0597f75e92e17d3e380174c2', '111.7.100.26', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614762411, ''),
('59be9293716b0bbc8a97755862802279', '34.220.52.9', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621057691, ''),
('59dd9a6e8de49a73fa9c4425a5c10e80', '54.148.43.242', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1616044214, ''),
('5a0bf97f5ed888c6717046604b10420b', '52.214.124.200', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621467746, ''),
('5a10886c0563cd982b21077cee2501da', '34.222.173.230', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621143181, ''),
('5a49c5a998c8907fd6536de5b374f50d', '34.222.173.182', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614921307, ''),
('5acf6a063536755ed04cb9d9ee047fc3', '72.79.50.66', 'panscient.com', 1622430017, ''),
('5b38a808a6f2c4d6f2d8b1291afb5144', '180.163.220.3', 'Mozilla/5.0 (Linux; U; Android 8.1.0; zh-CN; EML-AL00 Build/HUAWEIEML-AL00) AppleWebKit/537.36 (KHTML, like Gecko) Versi', 1623722425, ''),
('5b43cca138d5e9dfa14e18a2dca7377a', '13.58.141.241', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0', 1614186837, ''),
('5b4bfa915b2d06dda2b84d671295351b', '34.216.255.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1617309684, ''),
('5b67a2df7fdbd1fec8b6a7eec1a0aa88', '34.223.42.161', 'Go-http-client/1.1', 1615513207, ''),
('5b7d55f048f25e613529a6710db00cbd', '52.32.215.130', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1617168582, ''),
('5b943dd164cd59462e98c9239dee44c8', '221.2.155.200', 'Mozilla/5.0', 1614255974, ''),
('5b9805fb5feb00dec52656eada7e8eec', '167.114.232.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:79.0) Gecko/20100101 Firefox/79.0', 1614124692, ''),
('5ba1592e8206f912f12b01b3a6f6c13a', '158.175.164.89', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36', 1619673250, ''),
('5badbdcc6ea323510bb7ee8e24fdf92a', '93.158.91.189', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:15.0) Gecko/20100101 Firefox/15.0.1', 1616834371, ''),
('5beaf260be20f6d81cc689c51f1c1769', '54.185.255.126', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622184759, ''),
('5bfa290085b534b238daf8431ac6b0ff', '54.212.243.18', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621835282, ''),
('5c058bb8106c7eb6c83e0842665fd52c', '51.210.219.11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 1616585031, ''),
('5c44b8c822374dab093426fc76b5820f', '34.223.247.226', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1622841383, ''),
('5c94eb72411264716b70dc55ce0cc37c', '92.118.160.57', 'Go http package', 1618080263, ''),
('5c999e58b459ba2ba37fca797369d2c6', '192.3.166.60', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 1614781052, ''),
('5cc9cb64c1ba5be4c84cdc9a99c51f93', '35.162.52.2', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620106599, ''),
('5d109213f283bc94fad259008de786a2', '18.237.30.16', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622698162, ''),
('5d6dfbac362a9ad605b027929897cfaa', '18.236.230.19', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621315485, ''),
('5d99cc53f3441999ea7ff7f0c61f0414', '34.96.130.29', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1621572429, ''),
('5dc482711c2985641551aaf735d81d94', '52.27.167.117', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/68.0.3440.106 Safari/537.36', 1622063373, ''),
('5dc92868c96dd0c487bfb03368317bbd', '34.219.129.87', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621661564, ''),
('5deb5095ded663b18b7dae4968275ecd', '34.223.255.169', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1618777620, ''),
('5deb5347d8686098203141c07499c97c', '54.202.229.90', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624858711, ''),
('5df016ac12ea386c5e15008f475d85c9', '18.237.216.94', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1618864735, ''),
('5e02206daabc65ae6df322fbdce07ada', '3.143.221.255', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', 1619358629, ''),
('5e0c282d92ff79b3079bc1b77b6e06f0', '173.211.79.226', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 1620662171, ''),
('5e2f66e56d9f0612e8a1ae8c3dae0342', '54.200.152.143', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624080173, ''),
('5e41f1dd0ecfd3dcc9840849e252cfc9', '35.238.13.208', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 1621081663, ''),
('5e87c231bc3a56267ac880f9cc5e0018', '198.71.56.237', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 1620901231, ''),
('5e9d3be7198b9fc048d08e9040ccacc3', '54.213.95.65', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621920459, ''),
('5ea1430aa7df95f3163b30a630fd8f90', '34.220.166.243', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624339304, ''),
('5ea82fc27d8683f3753e002ede396581', '100.21.218.158', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:82.0) Gecko/20100101 Firefox/82.0', 1623181554, ''),
('5ebe5497d34b223ae8500aa26c66fe62', '54.36.148.27', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1623487202, ''),
('5edee24e06c527471012086fa8254890', '92.118.160.1', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.c', 1616867595, ''),
('5f12834e33a05ce0e9698b7a6b7239b0', '199.244.88.132', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1621179785, ''),
('5f2a46e136520c17d91feac0c3be3417', '54.246.70.14', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623362831, ''),
('5f38888e668bd39775d0f2672a9f1ec5', '124.71.180.89', 'Mozilla/5.0 (Windows NT 5.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3285.88 Safari/537.36', 1614134315, ''),
('5f41c83ea8d731e267a40a674c4419a5', '34.220.26.12', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622956189, ''),
('5f705f33a798e6f07d852b6de98fe662', '35.226.78.254', 'python-requests/2.25.1', 1622397263, ''),
('5f92bdab46929c2693d8291587be4c39', '121.37.133.156', 'Mozilla/5.0 (Windows NT 5.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3981.88 Safari/537.36', 1614597846, ''),
('5fa5ea43c5ac51b5f6e8b65d82a8e8a0', '103.15.216.130', 'GRequests/0.10', 1622552143, ''),
('5fa7c7dc0e8849153ed2d0248b978dc0', '54.216.91.210', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624147280, ''),
('5fddc0ec6b3e97a61c84de14d440603b', '34.244.136.224', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623966805, ''),
('5feb16009e7e55e64fea7938cb85e582', '107.191.126.112', 'Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; .NET4.0C; .NET4.0E; .NET CLR 2.0.50727; .NET CLR 3.0.30729; .NET CLR 3', 1614266285, ''),
('60438089c07c104543c14d7487233505', '34.220.221.145', 'Go-http-client/1.1', 1616132158, ''),
('604918365956bafc2d042bf5a4bd4dba', '93.158.90.169', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 1624322279, ''),
('604c3f27321c6152a1484c83dbdb912b', '222.178.220.178', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 1616230359, ''),
('605dbffa66495389132c3d36a87581f7', '54.202.1.185', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1616703695, ''),
('6077c79c531338a5f79cfab37ebcc9dc', '18.237.195.160', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618895574, ''),
('608d7902ec99865030252b1d7cd1bd76', '149.56.150.2', 'Mozilla/5.0 (compatible; Dataprovider.com)', 1624675654, ''),
('60b03ac69cb9d1137823f97d00003210', '54.36.148.249', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1621250460, ''),
('60cee21a6d3b1d8e2c9d414ff1023405', '44.234.252.152', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620278535, ''),
('60d09cc47f7959a0e8873865ea233f54', '54.203.73.198', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:82.0) Gecko/20100101 Firefox/82.0', 1616501304, ''),
('60de76cb48bdc34d04c9dd16ef8ebcf1', '192.36.71.133', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge', 1618180948, ''),
('60fd52b0c31cb41592fb699a248de3a9', '23.224.68.74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.3', 1615136143, ''),
('6122185ee024db9ed9347967fd44df44', '63.32.55.80', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1622845235, ''),
('61438a6b4eedd47c85066999eb7dd1ea', '34.221.24.125', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1614977409, ''),
('614cabcc825524433416ddb56864bf06', '54.218.97.212', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619933053, ''),
('61644c0722e3c057ef21a0c9d36edae8', '18.237.187.153', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621055088, ''),
('616b6a9776e5edfe0c8e547c9b1e5793', '34.220.46.189', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1617999789, ''),
('619b898e331c69789598287e725fb618', '23.224.68.74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.3', 1616744727, ''),
('619e450ea05950b2ee93cf208673e180', '34.220.149.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624947581, ''),
('61a5ca952e49769c8d9f62773254b5ae', '52.39.71.112', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618552682, ''),
('61f4d73a5aeadfb43ee77dc73454c118', '35.162.120.241', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624079930, ''),
('622e2d355004188ef095113324e1761e', '138.199.36.204', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1620352151, ''),
('62599844063c0a20334a639a984656f7', '34.223.82.43', 'Go-http-client/1.1', 1616822655, ''),
('626daf7d6704351134d0df8e98cbd9b7', '52.12.127.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1621024445, ''),
('628c75e8b04aab4bacef7044ccecb00e', '54.213.105.187', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622455415, ''),
('629823cb0ed762eadd74d551d4150647', '34.219.190.29', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1619673331, ''),
('62e97f7a23158f946cd6412099cb674e', '35.166.214.66', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623302043, ''),
('6328a33d44ade2f26bb9f3090799b99d', '54.69.146.12', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622182709, ''),
('63c2789b13f1851f3c94539aab59768d', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3559.88 Safari/537.36', 1615951083, ''),
('6408d75003c4494ac35eb155dab9fcef', '52.114.14.71', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1614252171, ''),
('64329bf1eb3915891ce6dc773b11a6e0', '104.238.217.123', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', 1614083808, ''),
('6498f075b8f78ef7b91e7569a2c517d4', '128.90.147.120', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.1.2 Safari/605.1.15', 1615836859, ''),
('64a930b6a8f8e11994c9b8ed9ef8d062', '54.189.127.99', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622455393, ''),
('64ad89d166e9c23655a5b0e4071a5940', '54.216.91.210', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624147860, ''),
('64c767340e08dd033536deb4a257214b', '138.246.253.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 1623327616, ''),
('64e5a94af95f32af9c64298e488b1c59', '54.171.167.121', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1622144492, ''),
('64e81513e9ee1e5d88e7b50c4992d0d4', '34.221.159.176', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619760610, ''),
('64f2bbabfc4c1c89963a269e2d2ed7d6', '52.32.48.93', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624258861, ''),
('650a51dec29ba615334496c80bdd359d', '52.214.124.200', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621467425, ''),
('652186aa25601c171d2c7e7211e5c87f', '54.187.25.230', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619932961, ''),
('6530cf9a7c97f9a4343585e20c3c24fc', '34.251.147.56', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623877868, ''),
('655a3a591b4801a7f2afa37a99a000ce', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3579.88 Safari/537.36', 1616283055, ''),
('6578a6353a563f62c1c36c14abf2b6b2', '18.237.187.153', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621055088, ''),
('65831d82e7df8c62c5400a4d8e61201d', '54.186.131.186', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624597892, ''),
('6585eb7f98cf1e9e2a3fc291dc761266', '34.105.18.9', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2225.0 Safari/537.36', 1619376591, ''),
('65b6d69424cf47376a18f1f21a2d4289', '58.53.128.234', 'GRequests/0.10', 1620584753, ''),
('65c0c412f12ca832ace458f880c76758', '50.112.195.201', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624339830, ''),
('66152c866216d528689fad713415c043', '35.80.16.31', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616735178, ''),
('662ff4d9aca2bdb076fc3ebbfb940150', '54.171.194.183', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623121654, ''),
('6636239677a73262b247b2a52fe23d61', '34.222.48.239', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622374497, ''),
('6637b5ff80218aaff5cf9b8e053cc2c4', '54.218.45.48', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615180662, ''),
('666ea441cf27d402ff914f88268630b1', '121.37.133.156', 'Mozilla/5.0 (Windows NT 10.8; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.1711.88 Safari/537.36', 1616058410, ''),
('66a6f50eb725974889b162dc23b6acce', '52.11.150.194', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1619381885, ''),
('66ad920237b3156b176382e60749b42b', '34.220.131.235', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621748560, ''),
('66b193d63c59e5ed4422503a4911ddca', '185.141.34.12', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36', 1620654073, ''),
('66bfc068c38571fe79451c25a9d05088', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.2370.88 Safari/537.36', 1614109235, ''),
('66d291a304fc95c216b381c817b23e09', '121.5.109.55', 'Mozilla/5.0 (Linux; Android 10; LIO-AN00 Build/HUAWEILIO-AN00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Ch', 1623366721, ''),
('67268799520268d5e6a989d84853748b', '34.254.63.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620405703, ''),
('67322aa2626b7854f1d59da0675bf864', '44.242.145.111', 'Go-http-client/1.1', 1614497563, ''),
('679183f56bf46f57bc910867086f4875', '54.202.247.228', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1622617159, ''),
('67dc927a5b178d64c04725749a7c187d', '52.13.21.190', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1616305938, ''),
('680a540890f5422ffaca553bcc619dfc', '38.18.36.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 1615430041, ''),
('680d0d7fefdb14e8f7653cecfe102af9', '35.82.15.175', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621141842, ''),
('6812fb60e7c0d6fff487bffb42a958fe', '54.170.5.25', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623438112, ''),
('68173684a242121f7af3cc9692773853', '181.215.202.16', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.2 Mobile/15', 1614117430, '');
INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('685a61f48d416603a29dd646c1daa13c', '66.249.73.24', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1622566003, ''),
('6860f5e6aa910d646395d503f344789d', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3226.88 Safari/537.36', 1614802386, ''),
('686e404f63bb8ff9ba2d8a05f5b62854', '15.236.206.16', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0', 1620144749, ''),
('68803b7bbc17282044b06489b9ebfcb3', '199.244.88.132', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1618499611, ''),
('6898a86c05a9b5eda6d565ec605a0280', '121.37.133.156', 'Mozilla/5.0 (Windows NT 10.4; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.2815.88 Safari/537.36', 1616007325, ''),
('68ac5d253cc5854fbd881a8a191f82c3', '52.213.169.140', 'node-fetch/1.0 (+https://github.com/bitinn/node-fetch)', 1614266969, ''),
('68b7dbf1258698c4c99fbf2381b77467', '124.71.180.89', 'Mozilla/5.0 (Windows NT 9.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.2434.88 Safari/537.36', 1614230029, ''),
('68c1917f43e2f8836bb100b0d285921f', '34.223.6.141', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623044296, ''),
('68dbd80bcab7d367af84e5eab0ad169e', '54.245.176.84', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1617049494, ''),
('68e146d6469ebdc325f5a2501a46bd60', '34.221.24.3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1618605459, ''),
('68ef111b3a39702c29d06589d196c8bd', '51.158.108.77', '0', 1618987633, ''),
('695504eb1bd171ffabbb8ef0e822403b', '54.218.210.194', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624080092, ''),
('69ad7a14c69692fa6d05b326dca442a4', '124.71.180.89', 'Mozilla/5.0 (Windows NT 9.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.1953.88 Safari/537.36', 1614165108, ''),
('69ad95f3a52b5e810814ee67a22103ba', '54.218.78.232', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618290990, ''),
('69d9fc03614587a8b0843fd81cd8b23c', '34.221.163.122', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615785240, ''),
('6a070d755db946409c09751274bf4350', '54.153.20.34', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 1617381459, ''),
('6a5332ae5ad09767794376f77325663c', '34.214.66.93', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623215892, ''),
('6a5669d91bd70048af3a9a6f49019842', '34.217.210.89', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622612748, ''),
('6aa0dcaf64e756f028610737170db6f8', '63.35.196.8', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624398266, ''),
('6aa669a2a03e9376c32293e611ecda3e', '54.36.148.239', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1614238561, ''),
('6ab83ca33eaab1727f85062f990199ef', '67.227.32.192', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 1618293413, ''),
('6adb31cff55f9d7099e96a8da66bb676', '54.203.73.198', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:82.0) Gecko/20100101 Firefox/82.0', 1616501304, ''),
('6ae60c7cdbdc09bdf56390a1fc5aaa34', '121.37.133.156', 'Mozilla/5.0 (Windows NT 8.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.1954.88 Safari/537.36', 1614934249, ''),
('6b2140cb5272a0cc367396f0c542a007', '44.235.91.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615526480, ''),
('6b227e84dfce4b58fc771756aa97aca8', '34.68.32.56', 'python-requests/2.25.1', 1623100853, ''),
('6b3b6805680f6a9db999beb1d15c5cae', '38.122.112.147', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1616265797, ''),
('6b630452dd9e8c68373f3520a96e0d15', '52.114.14.71', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5', 1614252171, ''),
('6b6ca9e0a353ce1beddc973f7872f694', '59.175.144.14', 'GRequests/0.10', 1619708175, ''),
('6b72cf27ee3979d3aa1616722576d98a', '40.77.167.27', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 1616176894, ''),
('6b987db922052d3dc044e38ce9c7d5b9', '198.11.183.27', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.3', 1615529601, ''),
('6ba0743830cedbd9deefbdead39024dc', '54.213.147.111', '0', 1616418038, ''),
('6ba1cc127444746b9a082e9b3b999b94', '34.220.80.236', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_3) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.65 Safari/537.31', 1624661328, ''),
('6bab72e5eed912b71059069040dc9192', '158.101.108.23', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 1621804777, ''),
('6bc209e3909fd0a4a127e852cc61721a', '124.126.78.131', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chr', 1621341765, ''),
('6bcbe4805ef3be2c7a44c4c1b068c1d7', '54.185.222.4', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624686807, ''),
('6c1b80a7f99a7cdb400798d477d2f374', '54.213.1.111', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624339265, ''),
('6c4fd2463bd7b895376cbfd4dd18f817', '167.114.185.54', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.83 Safari/537.1', 1614062263, ''),
('6c654999d2b26622d379acf290be165a', '192.36.52.37', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:15.0) Gecko/20100101 Firefox/15.0.1', 1620983952, ''),
('6c75235a61766779f14ecd98ea315b55', '34.212.35.185', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623647837, ''),
('6c8b728f3378fe3d311a9667f4775823', '121.37.133.156', 'Mozilla/5.0 (Windows NT 10.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.2599.88 Safari/537.36', 1614764343, ''),
('6caeb5b49207b97a002a5dc4a76a1167', '44.242.158.26', 'Go-http-client/1.1', 1614317041, ''),
('6cd36b6db3e358973fc188d2e0799b6c', '54.218.210.194', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624080085, ''),
('6d210304a7e541905fff7063a9e5b4dc', '52.13.69.70', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624511529, ''),
('6d5c4166673c26a8905ec54fcf1f7641', '221.234.44.18', 'GRequests/0.10', 1615631008, ''),
('6d8941175eab33f525388b916c7d1b0f', '176.125.228.12', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 1618369290, ''),
('6dc1935e37c8f2e09584bcbf07227bac', '52.48.96.14', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621895381, ''),
('6dc8edaf52a79ba8d41b5e3455d421ce', '62.115.15.146', 'Mozilla/5.0 Firefox/33.0', 1616902383, ''),
('6dc919316b350c10ca5b8b0183727a0d', '34.215.230.37', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623132784, ''),
('6dce0b948e84e3cea76363826ce8f78c', '34.220.131.235', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621748559, ''),
('6dd04968e7732cd2fed2be896f0f653f', '34.212.122.63', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618895258, ''),
('6e15fa09f126250773c61f811d93bb2c', '173.211.79.226', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 1620662171, ''),
('6e43833e10df3cc380a45182c225444e', '83.97.20.51', 'httpx - Open-source project (github.com/projectdiscovery/httpx)', 1620569206, ''),
('6e61594fbd3f5d3bc420374232aa5307', '18.237.1.224', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624598358, ''),
('6e62cda0a06b93806abff4b71aadfe6a', '124.71.180.89', 'Mozilla/5.0 (Windows NT 7.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.1241.88 Safari/537.36', 1614130077, ''),
('6eb9b7b443a456ab710cb583dcb0a4b1', '18.237.148.160', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622870716, ''),
('6ecde704e36ecdcb531085535f981cd4', '54.36.148.68', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1620220151, ''),
('6ed40c31eae3093b6b1672a773504a01', '54.184.5.98', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614230414, ''),
('6ee72f35e773421f2bf3e52e99b2c54e', '54.200.69.190', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621402073, ''),
('6f52d9aaefde02fb04c319c6b176d650', '93.158.90.143', 'Mozilla/5.0 (Linux; Android 8.0.0; SM-G960F Build/R16NW) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.84 Mobi', 1621733833, ''),
('6f868431aa3c30ac693334e1e3b0ef64', '54.198.42.99', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 1622310941, ''),
('6f9b9015e5879156be80a0c6e26501e1', '107.175.37.72', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 YaBrowser/18.1.1.839 Yowser/2.', 1622013226, ''),
('6fa36e4793ca5d056931431a37913a3c', '54.195.32.108', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1622584346, ''),
('6fe56f41910bd408598f288c257e2d60', '54.78.30.43', 'Pandalytics/1.0 (https://domainsbot.com/pandalytics/)', 1617227631, ''),
('6fe6c10c0062db47fe961f08222fa11f', '69.12.72.188', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 1621128095, ''),
('6fec457759edaf4f43ac1a279aea30a1', '80.87.193.180', 'Mozilla/5.81181 (Windows NT 20.2; WOW64; rv:18.0) Gecko/8787388 Firefox/18.0', 1622763549, ''),
('6ff37ede3f3f7881779da8bf3038fa83', '34.219.73.114', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1623822141, ''),
('7011229b44c2caa2f40c58d538739a5c', '104.238.217.123', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36', 1614083808, ''),
('702ce9ad8ac21b977393d466cf400810', '54.187.153.205', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616217866, ''),
('70341770a03433e10f1d9a9cff1b5641', '34.219.91.55', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618549839, ''),
('7055f5bb2ecabfe237e942faab45907a', '54.189.230.128', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:82.0) Gecko/20100101 Firefox/82.0', 1624379490, ''),
('706325ecf6d5bfbff6bc91275fc7f9e2', '54.213.218.248', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620019649, ''),
('709661a2f4f4b01362c78ba65f7504a9', '34.208.81.193', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617167264, ''),
('70a82aa5dd39810798e4889832f1f0e4', '42.193.8.97', 'Mozilla/5.0 (Linux; Android 10; LIO-AN00 Build/HUAWEILIO-AN00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Ch', 1623743988, ''),
('70df4fc755e9cafbbef96c71430be8d5', '18.236.140.219', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1621458416, ''),
('70f85448645d8b89704b3b5e2d75cc5c', '69.12.66.230', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.117 Safari/537.36', 1623710146, ''),
('7136968d82f7e67cddf4612783b355d4', '52.209.171.196', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621459443, ''),
('713771915f58b2773c9e72a4c78e72b3', '34.219.180.109', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623216159, ''),
('715779caa3bbeb6a8c0e5af83b20a6a2', '124.126.78.131', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chr', 1621341765, ''),
('715c8e97b64c3f8bb3424a5b1dd382ce', '121.5.78.29', 'Mozilla/5.0 (Linux; Android 10; LIO-AN00 Build/HUAWEILIO-AN00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Ch', 1614573781, ''),
('716a9b193b7df312f12675895c5f5918', '72.79.50.66', 'panscient.com', 1622430026, ''),
('717533b38cfe7c4aa9e9e4878a7086b7', '54.189.37.244', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618636309, ''),
('7180c8f05b5aa9a4626dcf3b2892dd0a', '44.242.158.26', 'Go-http-client/1.1', 1614317040, ''),
('7180e872d57769b60d312e68efdee47a', '141.98.91.158', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Safari/537.36', 1624386047, ''),
('718f41d844dcbc8c7f03fa35deed68a2', '92.118.160.57', 'Go http package', 1618034523, ''),
('7197250d595b30b9783e357249ceb9aa', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.5; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.1969.88 Safari/537.36', 1614729923, ''),
('71b45fc01fb792f613d571e855733fd2', '62.115.15.146', 'Mozilla/5.0 Firefox/33.0', 1614317914, ''),
('71e1e3f32786aab0bc8c1e4bfb780bb9', '124.71.180.89', 'Mozilla/5.0 (Windows NT 7.7; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.2207.88 Safari/537.36', 1614100556, ''),
('7215e534e761a85d8d9bf313a87548ad', '34.86.35.6', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1622637916, ''),
('72186164f9e2c178d32c4f32152e16e6', '54.67.38.45', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 1623435514, ''),
('7259d012821cad0f2e4af179d82e3290', '54.203.118.121', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615181233, ''),
('7260518df66cb7c58013553d6b41f682', '44.234.189.91', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617945333, ''),
('727ec9f763552a5a69992d891448ef56', '20.83.170.80', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4240.193 Safari/537.36', 1614635193, ''),
('728983b7d728c1c7f4df1c2e1111f182', '34.211.143.213', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614426921, ''),
('72bb67f611f7dccb268f8f54601a687d', '205.169.39.226', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', 1614114374, ''),
('72dc4f5fea59734d00e2b8302c8a85c8', '121.37.133.156', 'Mozilla/5.0 (Windows NT 10.4; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.2815.88 Safari/537.36', 1616007325, ''),
('72ee380a9b8d75153c2c789d64578216', '52.49.210.119', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1617226490, ''),
('72f2e26933f898319664180760cdf7bc', '40.117.185.219', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.71 Safari/534.24', 1614407718, ''),
('7338377a0f5ffa714156b523c44bbd1b', '54.36.148.72', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1615308334, ''),
('733f0b46f9a9ef753df8dce647a9d9e6', '54.190.36.162', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1617599703, ''),
('73414796d1d703fabebd4c4e0cccfeb2', '54.190.58.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1621920760, ''),
('73444ae61b333a5b3b3a3348ffa2d268', '34.220.221.145', 'Go-http-client/1.1', 1616132159, ''),
('734bd7eaab5df2e2117bec71caead1ea', '89.108.88.240', 'Mozilla/5.0 (Windows NT 6.0) AppleWebKit/535.11 (KHTML, like Gecko) Chrome/17.0.963.46 Safari/535.11', 1616418112, ''),
('73703a873947e18a688f85ffa62c2fd4', '34.254.63.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620405703, ''),
('738b728d937fa6a60a4642d4e9ac01fd', '62.115.15.146', 'Mozilla/5.0 Firefox/33.0', 1614317913, ''),
('738c7c7a7f9f767be539ce3535434676', '34.221.154.215', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619760516, ''),
('7395dccbd5c252b9eb7a6cdbcab670d0', '34.219.161.184', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623530478, ''),
('73c1a5a1b3915a9db777f845c7b28da2', '111.7.100.23', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614208598, ''),
('73f234f99b6b5a965a729161f86607e3', '64.246.165.200', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:59.0) Gecko/20100101 Firefox/59.0', 1624349303, ''),
('74879d327ec69b36d2a974b170355ded', '34.222.72.76', 'Go-http-client/1.1', 1615957921, ''),
('74b5e66e68efe3990683dc3f2acb3024', '52.40.105.238', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624947017, ''),
('74ca1015d5c924e7d13f006cae0bb5dc', '34.212.38.74', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614921305, ''),
('74cf18cc931d40b9d7f1c01bca14c894', '54.71.186.247', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619416033, ''),
('75095ce20e16cb3197f10a13ca364918', '34.220.166.243', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624339303, ''),
('752eacccdcee9e98e8f629d3a8688a75', '34.209.23.28', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624395341, ''),
('7540e209e1cd850c3959d81819af13d5', '54.188.170.168', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615957876, ''),
('756bcb53f61556db36bba8d7843928d1', '121.37.133.156', 'Mozilla/5.0 (Windows NT 8.4; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.1202.88 Safari/537.36', 1616112355, ''),
('7589d2be7740c3d157dbf14c7339648b', '121.37.133.156', 'Mozilla/5.0 (Windows NT 5.7; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.1265.88 Safari/537.36', 1615897181, ''),
('75bbfd9425b90359a134330080dc886d', '54.187.150.23', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620853228, ''),
('75d534a7c1931ae91f3457d4755ddc8a', '52.43.148.100', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624080367, ''),
('75e8447646008326e3f1d1e75950c011', '124.71.180.89', 'Mozilla/5.0 (Windows NT 5.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3285.88 Safari/537.36', 1614134316, ''),
('75f2e874402acaff7a7b32089308127f', '54.36.148.161', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1615878612, ''),
('75fec4822cbb3627da888b15a6e0e5ca', '18.237.224.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1621748009, ''),
('760207641d929af87565d49ec01b4acb', '52.40.138.251', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1616822658, ''),
('76319ef9325f8be16761d7dbcbde328d', '51.158.108.61', '0', 1619018133, ''),
('763ba3030aa825cacd6938e916ae7d04', '44.234.59.34', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619328523, ''),
('763c4551bb06d1c785a8f1140e02237f', '54.185.255.126', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622184760, ''),
('7640c45849c020b2745bce3125577384', '34.222.60.240', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623132741, ''),
('76777b5b0a828875423e0638c13ed88e', '40.117.185.219', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.71 Safari/534.24', 1614194728, ''),
('767a5a562282985736f91ed79e99dfe2', '18.236.169.255', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614411341, ''),
('768955561c53864f6243b07a65576bc9', '34.212.137.43', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1616390316, ''),
('76c1866765cf596ebf1e0dd95bb6e93f', '54.188.56.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1618118883, ''),
('76d11021c8c37faa1013b0a27fdd2d59', '72.79.50.66', 'panscient.com', 1622430026, ''),
('76d99632e16f63d7482d6f1a6103a4ee', '137.135.84.149', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.71 Safari/534.24', 1615440266, ''),
('76e442e3438b5e103a0fbe7babb00080', '35.163.221.114', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1623360333, ''),
('76eb61808c845117fc556293a75233ca', '138.246.253.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 1622087913, ''),
('772243bc414d8310f7bc2ded52e7db77', '40.117.185.219', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.71 Safari/534.24', 1614407718, ''),
('7752bbcf3db332c0ae9aa8ff6d038665', '54.216.155.41', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621631664, ''),
('775e69819287e2db411b51e030b215c6', '156.146.34.101', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)', 1614131014, ''),
('777b41fdba5b652cbdbf76b88add4fd0', '172.105.4.254', 'python-requests/2.24.0', 1615867899, ''),
('779f00c074cbcc93478419b9f13a8403', '34.219.156.138', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622360867, ''),
('77ecd272c59f58edadf7724840a4afa0', '124.71.180.89', 'Mozilla/5.0 (Windows NT 5.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.1808.88 Safari/537.36', 1614283002, ''),
('784a1347b1268c698a7beb048f756f10', '52.214.124.200', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621467746, ''),
('78627ba903831c7b5b02618026cc2fcb', '54.187.76.177', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/603.3.8 (KHTML, like Gecko)', 1621722187, ''),
('7873006516fde5f6faa55e6d1ebc0dcf', '38.122.112.147', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623701698, ''),
('7893d3c994eebcb1d62a57b3a4a16125', '63.35.196.8', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624398266, ''),
('78a366434462d89cf34ab107cd4b9d19', '54.202.118.81', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622012249, ''),
('78aa317d5cb9e30ebac10ce3652d3323', '52.13.96.238', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620711976, ''),
('78ae2a1ce1f3b98f04b1a3d4c10c217e', '54.78.119.104', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623707959, ''),
('78b50d27f85b31f6be813832bea9d256', '54.245.178.58', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618895250, ''),
('78b602ccdd5274aea98e7b24a319177e', '54.214.116.247', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623304044, ''),
('78c10001a029cb161f7fcfcd86778a3f', '52.41.73.220', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622956477, ''),
('78cc8fe7dfe2066c801165b0a68971c8', '34.223.244.32', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618290938, ''),
('78f2b700bf09b2d2ac7ec69ed25f473e', '54.36.148.107', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1623635376, ''),
('78f51ad3138db027e2fd205a5c0124fb', '54.189.230.128', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:82.0) Gecko/20100101 Firefox/82.0', 1618425136, ''),
('7902f840e0f73b87cfaeec4fe21910df', '34.221.99.166', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615873573, ''),
('7915f218c63e5a32b0f5fa704ab47745', '35.180.119.114', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', 1617969880, ''),
('79461f5c1f77ddb34e8b2daf51ac3ba5', '40.76.225.102', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', 1623267539, ''),
('7954a8b15e8adc506dad423f074b0acd', '35.232.189.99', 'python-requests/2.25.1', 1624836616, ''),
('795887510d213949dd3d4f694f0397f7', '52.213.169.140', 'node-fetch/1.0 (+https://github.com/bitinn/node-fetch)', 1614266968, ''),
('797f1c965e33814f96e3e42b08e148b6', '18.237.221.117', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', 1614361107, ''),
('799449637f5ad743c18ae85d360f5e58', '34.246.223.10', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1617319595, ''),
('79a03293e65f528b50ad5433e5979a31', '121.37.133.156', 'Mozilla/5.0 (Windows NT 5.4; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.2796.88 Safari/537.36', 1614973126, ''),
('79ad4436b90564174114f99c213e5f2f', '54.153.50.238', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 1622218475, ''),
('79c58a74ee1620ec652cdbf012c499af', '54.191.79.209', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622455419, ''),
('79d3a28897475fbaa3c06251aa8ec5fa', '54.185.170.115', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624947547, ''),
('79d67fba554301e01563c2a25ebb3138', '44.242.144.124', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618290927, ''),
('79dadb35d08c03ece2d31b1763aa091a', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3230.88 Safari/537.36', 1614125865, ''),
('7a10201284b0bab3d00861d60e31de56', '34.222.240.182', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624686265, ''),
('7a4a3f57a729925228755e16a67e8bfa', '124.126.78.185', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chr', 1622513149, ''),
('7a609ff1bf89a08a7a2a2770cf2aa2a6', '54.190.69.239', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1621229250, ''),
('7a6284596489189143943fbb29396c06', '34.212.33.204', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621315226, ''),
('7a74b5c8b29b98fcb905844640beff38', '52.11.228.142', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621489569, ''),
('7a7c7e69d8e83f6cd16881aaa2951007', '124.71.180.89', 'Mozilla/5.0 (Windows NT 10.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3608.88 Safari/537.36', 1614370568, ''),
('7ad29d7569d683bfb792cf83fca871a0', '34.222.72.76', 'Go-http-client/1.1', 1615957921, ''),
('7addb04d0574927ea67c8ed5924ef730', '92.204.170.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.44 Safari/537.36 OPR/6', 1619535423, ''),
('7b09cc80734e9347b76616cfb01ce6a3', '195.24.67.44', 'Mozilla/5.48698 (Windows NT 12.2; WOW64; rv:18.0) Gecko/3252276 Firefox/18.0', 1616228308, ''),
('7b40162ff6230b00661b026122f53266', '35.232.175.210', 'python-requests/2.25.1', 1622839553, ''),
('7b585190d4849a6fa3a57d83e4a30e2a', '34.105.19.82', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.93 Safari/537.36', 1614071052, ''),
('7b816a6fea9524c1d5f0e688538fedfb', '62.210.92.175', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.14; rv:68.0) Gecko/20100101 Firefox/68.0', 1614291242, ''),
('7bbe526a193a59f5f473bfae38004e39', '157.90.117.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987 Safari/537.36', 1614546586, ''),
('7bc48cefe96aa6532705c2a0c51024f1', '13.58.141.241', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0', 1614243496, ''),
('7bc66e6baf48d7823143373b4d6065bd', '34.249.171.42', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620685288, ''),
('7bdbad21ee61d1f3ecfbc67f023e9d8d', '52.213.169.140', 'node-fetch/1.0 (+https://github.com/bitinn/node-fetch)', 1614266969, ''),
('7bf252e3d850ca171253f27aa9ed06c8', '121.37.133.156', 'Mozilla/5.0 (Windows NT 8.7; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3716.88 Safari/537.36', 1615274012, ''),
('7c119698b1443e1f6a7bdad67061b725', '18.237.162.120', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620365414, ''),
('7c1e52c1d85f3e4030bf87ed95faad88', '34.213.36.34', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618377553, ''),
('7c212a69314672a13a1b0f171d6991e1', '34.220.26.12', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623389515, ''),
('7c3a0173226a76d828e2ab44bf049eb1', '54.216.91.210', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624147861, ''),
('7c54d9f57621ac13ada0ed722b90128c', '34.217.109.236', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623908329, ''),
('7c79c835c1d9d709b7dc4e0fe6954dbf', '54.203.76.167', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1616876425, ''),
('7c7a9652514ca4779c026fb0fa686e99', '44.234.56.72', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619242217, ''),
('7c94dbb25fadd94bab34b164305e3adc', '54.187.76.177', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/603.3.8 (KHTML, like Gecko)', 1621722187, ''),
('7c9703e9a81e3acf417b5fe7b6db982f', '66.249.79.150', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.95 Mob', 1616557585, ''),
('7cc08881917526d47bfc45a7570b39af', '92.118.77.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 1623426437, ''),
('7cde45976c6c254d80cd86ba10931e2a', '54.214.88.96', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624858732, ''),
('7ce3453e3c8db4194d9c35afd9c26d2a', '92.118.160.45', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.c', 1623521219, ''),
('7cf865e7f87dda87d015bea379eddd9a', '54.203.114.255', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624598041, ''),
('7cfd0276239e48ddf509b2d753f02c0b', '181.215.75.234', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.2 Mobile/15', 1614290797, ''),
('7d1a289c2700d2c198848a5813d8c26f', '66.249.65.112', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.127 Mo', 1618304485, ''),
('7d3142777f487b3eee6839c8214619f1', '66.249.73.92', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.188 Mo', 1615896606, ''),
('7d38853668a6e245784451defc4cb440', '192.71.12.140', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:15.0) Gecko/20100101 Firefox/15.0.1', 1614818183, ''),
('7d431c092c2f1f60a464419154373203', '54.214.156.222', 'Go-http-client/1.1', 1615092980, ''),
('7d4fc8185fffbc80a277fbf241646738', '23.106.249.52', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', 1614147577, ''),
('7d714b30b6718ced377463a48f78927d', '34.219.60.138', 'Go-http-client/1.1', 1616476533, ''),
('7d884e7756e26afe9e45e50be7e59a47', '69.171.211.85', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.2 Mobile/15', 1616494238, ''),
('7da625cb161a498c6f05c04ff388505c', '162.55.51.154', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987 Safari/537.36', 1624695690, ''),
('7da717138216853bdd65e6167e496433', '52.43.79.221', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1623097441, ''),
('7dbe3ed5c8ca0a081d786cccac5a0e18', '34.212.131.49', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1622700146, ''),
('7dcd24a8090f72ff16d39dae482c8051', '34.222.105.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624170009, ''),
('7dd29a88eeeab1b3cf4a7b54606dcb94', '52.11.163.214', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624654306, ''),
('7df39c466fbd102998c93e2e80cc2137', '54.185.72.184', 'Go-http-client/1.1', 1617167280, ''),
('7df5fb2d35e8308438332c1f523c5187', '34.222.198.117', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615354510, ''),
('7e30f6eca83b813cc5b290a16064c875', '52.36.31.206', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622525886, ''),
('7e456a69037d45b78aabb1be2945b2c7', '34.218.244.30', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623132439, ''),
('7e70ba752a609a45e28e389c71fe23d2', '193.200.151.103', 'Mozilla/5.0 (Windows NT 6.0; WOW64; rv:24.0) Gecko/20100101 Firefox/24.0', 1622260047, ''),
('7eac6bd79e2e6a5f93039b4142c1704b', '54.189.251.73', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620334408, ''),
('7ee34905a47c4046e8052a78ece66c25', '124.71.180.89', 'Mozilla/5.0 (Windows NT 10.7; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.1913.88 Safari/537.36', 1614240118, ''),
('7ee6cba38cf01b71e86ea53026333dde', '34.211.129.207', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622361010, ''),
('7f053a3189627b45c14a4928bb076dec', '95.168.171.150', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/533.4 (KHTML, like Gecko) Chrome/5.0.375.99 Safari/533.4', 1618438273, ''),
('7f14e320646ac8279ac63d65bce0320c', '34.219.60.135', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623135998, ''),
('7f1a583c8720e51dbea8788be50c4d45', '124.71.180.89', 'Mozilla/5.0 (Windows NT 10.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.2589.88 Safari/537.36', 1614105200, ''),
('7f2606234a4fd693bf32475952053f3f', '54.244.213.49', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624772558, ''),
('7f65cedf1cfa92bfd045d9e34e7f481a', '34.68.189.236', 'python-requests/2.25.1', 1623275586, ''),
('7f9de8c163f78ad57646774380949ee5', '58.53.128.88', 'GRequests/0.10', 1621568861, ''),
('7fb079eaefe16060d4741fcd3ad2baa5', '95.217.76.161', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 1624832994, ''),
('7fd87da5019abb490c7ec210f195875a', '44.234.189.91', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617945334, ''),
('7ffcc2d62fadb9aaab9f5a948ad64251', '54.218.115.155', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624827668, ''),
('8011de5897e52f16e4bf06d900e96742', '212.90.39.68', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1622544716, ''),
('801b4fc5887f09cb1b36efe86ee8030f', '137.226.113.44', 'Mozilla/5.0 (X11; Linux x86_64; rv:84.0) Gecko/20100101 Firefox/84.0', 1616669658, ''),
('808dc3f63e02a4b3bd25b26075eed2e2', '23.224.68.74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.3', 1616744727, ''),
('80e9c256879649a7011009b43df3801e', '18.237.142.110', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622956338, ''),
('8105715d3810d692cb9b88b3315aca90', '34.209.232.146', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622010307, ''),
('816a186debb2bbcd0bc2822ae8c51318', '18.237.229.44', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618722535, ''),
('8197182574052a4fc5d5826cc6dae5d5', '52.41.101.121', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619416009, ''),
('81acd4aa9782068520342534851019d3', '54.212.62.28', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619760732, ''),
('81c9df5315d3ef42e43acdf2bb557701', '34.208.104.161', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622382857, ''),
('81cd47c2c99ccc88a56bf61475a31b6d', '34.220.112.241', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1618033581, ''),
('820ea36e448de147345100e654ebc7c0', '192.71.2.171', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:15.0) Gecko/20100101 Firefox/15.0.1', 1614818182, ''),
('82167ae02858c7d1357ec7ba1ff72128', '34.72.146.195', 'ltx71 - (http://ltx71.com/)', 1614164472, ''),
('824223d36ebe1b0ef31a3154cd23a934', '103.79.168.220', '0', 1614232898, ''),
('82441cd1cb0bd23567afa3bfaec3c79e', '209.145.54.243', 'python-requests/2.24.0', 1622741481, ''),
('825ce7576e485bfcd265d86a5d972387', '18.237.170.236', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614662130, ''),
('825e07c05bd1802188288c3188f3e0bd', '54.188.17.155', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622784737, ''),
('829d6365a48c58e55d5c3dcbe09795b3', '34.245.30.213', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621351251, ''),
('82a8f683c0a53122ffac1322fe10f8fa', '18.237.245.169', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624339811, ''),
('82aaa2a73d324d4c4a7a93374e647df6', '54.191.199.165', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624429304, ''),
('82b281a5c7393b91009bba112e5f3420', '18.237.172.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620594651, ''),
('82de9dd42cf2fb14c6db80712e97a05d', '137.226.113.44', 'Mozilla/5.0 (X11; Linux x86_64; rv:84.0) Gecko/20100101 Firefox/84.0', 1622729921, ''),
('82e5a4e4ab731da0e378cbabb0b73f03', '34.219.158.148', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619068618, ''),
('82ea04983f3f91b451ce68519293f67b', '18.144.6.238', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 1619197765, ''),
('82eb902cb99f6dd63b6d5718db03856c', '54.202.94.89', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1618950033, ''),
('82fb11a6695aee43ea02c657e3d1a43a', '52.32.215.155', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1618172311, ''),
('836e909e1e579c2109f26fde18c3edc4', '34.217.20.170', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622181859, ''),
('839105fca409b863197fdb849de0ddf6', '36.99.136.143', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614142440, ''),
('83a4128776764a3ec9c2abf3028d8513', '95.179.140.210', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1309.0 Safari/537.17', 1624170371, ''),
('83ac959458bf533466663a62035f41d8', '5.188.62.214', 'Mozilla/5.0 (Windows NT 6.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2224.3 Safari/537.36', 1622996917, ''),
('83c07dbfb635c1724226ee4a56c0c6b7', '34.212.38.74', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614921307, ''),
('83d2a7fc816d41b6b263d49f616595d5', '124.126.78.185', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chr', 1622513146, ''),
('83f96878bc789009a54ead0b95e2e3de', '203.89.120.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.192 Safari/537.36', 1614515445, ''),
('840509de6f5c8014fc671f09bdcb84b7', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3351.88 Safari/537.36', 1614717486, ''),
('84303ab9264cf26c799280521eb6e2d3', '121.37.133.156', 'Mozilla/5.0 (Windows NT 8.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3274.88 Safari/537.36', 1615433950, ''),
('8436d0b8975caa531618226385e5d5d1', '34.77.162.32', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: sca', 1616717788, ''),
('845607be0445675314d3ca8b589da935', '144.217.135.193', 'Mozilla/5.0 (Linux; Android 5.1.1; SM-G925F Build/LMY47X) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.94 Mob', 1619297512, ''),
('84638c40987e660a63c8729ddd39ded6', '34.218.66.147', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621578127, ''),
('847a7d1c0559ad1fb6ec01694548c486', '92.118.160.45', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.c', 1624716577, ''),
('84806cfc1acd3cd07b8dddcdec233159', '52.211.41.73', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621287571, ''),
('848104036304430cdfa0cfc141702aca', '40.114.85.128', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 1614570976, ''),
('848bde865e8adeed8cffbf213c6b2289', '38.122.112.147', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 1624667421, ''),
('84c8388a2ece77dbac1b240f825deefa', '157.90.117.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987 Safari/537.36', 1614546588, ''),
('850aa33ee1ce30ff700321d29994b35b', '34.220.60.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1623648598, ''),
('8520abe3d4415c673a77c17ad1d5a76d', '124.71.180.89', 'Mozilla/5.0 (Windows NT 10.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3608.88 Safari/537.36', 1614370568, ''),
('852f52f9255bfd66c00876533a75d2da', '42.193.8.97', 'Mozilla/5.0 (Linux; Android 10; LIO-AN00 Build/HUAWEILIO-AN00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Ch', 1623743983, ''),
('852fcb0df2c513de4dfd951d251e381f', '221.234.44.18', 'GRequests/0.10', 1615631007, ''),
('853867d9c375127fae96dd7056154aaa', '52.12.12.81', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620711943, ''),
('853e6bfeb98fd1abc324ec87765447ae', '3.15.233.193', 'CheckMarkNetwork/1.0 (+http://www.checkmarknetwork.com/spider.html)', 1614144153, ''),
('8563e754b01607256e490cceb3914f05', '34.247.245.103', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620164094, ''),
('8577ee6fe7bce03804ebab17aac39d81', '54.151.69.174', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 1622312654, ''),
('859d62d2ddc24b2ffa68bb6dcb70da6b', '54.212.49.27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615754680, ''),
('85a7a9a3f6c650a279a2f32fc9bf5cb5', '54.155.254.30', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624485136, ''),
('864dbfc93d53a2b9ec383e908909971b', '167.114.185.54', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.83 Safari/537.1', 1614062289, ''),
('8662362fd693cb554144d816b1cb7568', '54.187.77.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617167266, ''),
('86a64e92808a9cd54d1879b813a71e5e', '34.221.163.122', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615785240, ''),
('86e1294c2c13fef1d47cb8ea8e6a44af', '188.165.208.97', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWeb            Kit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 ', 1614525389, ''),
('87047a2c6851925c0d333de07799b306', '34.245.96.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620134218, ''),
('8719c0f6bedfaf9c58dd3c98a66db338', '44.234.121.203', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615354522, ''),
('8720e045b09c2f7b01709ee56aecfaaf', '54.201.151.57', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622783845, ''),
('872360c8f0a6ca8190796fe7f705c69a', '18.237.30.76', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624080397, ''),
('87302c54129d867314b253bf1ee3f674', '54.186.43.189', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1618205820, ''),
('87335db0b5461bebbc45250c11fd656f', '51.77.129.159', 'Mozilla/5.0 (compatible; Dataprovider.com)', 1619297860, ''),
('873904639a4862aeb42d0069a13594b9', '54.36.148.48', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1620507869, ''),
('87406463eb6f5e84e8dd39fd97d0f4fd', '8.2.209.251', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.2 Mobile/15', 1621850216, ''),
('8766d3136afedce0dabc3ea2f8bea701', '34.220.218.181', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1616619055, ''),
('8783a7370e7193a3b78bd236c871e9b1', '54.75.104.183', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1622754674, ''),
('878bf45143164583bd25ebd04d424c14', '93.190.93.172', 'Mozilla/5.0 (Linux; U; Android 4.4.2; en-US; HM NOTE 1W Build/KOT49H) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0', 1622619725, ''),
('878c884ecb012aa09ec59a61caa4c40d', '92.118.160.57', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.c', 1618715422, ''),
('87ae1b014885c8cd855ef54fa7d007dd', '52.12.7.243', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623908114, ''),
('87db5e2350610996421a213a9f7bb20c', '52.12.181.25', '0', 1623678252, ''),
('87defe4b0b568e88eb2ee48724f08f61', '124.71.180.89', 'Mozilla/5.0 (Windows NT 5.5; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.2352.88 Safari/537.36', 1614403118, '');
INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('87e772644070d969bc2a583fd0124498', '38.145.106.215', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.2 Mobile/15', 1614259698, ''),
('87ee68446239f49615e0c91190c94f7e', '54.186.71.79', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1616477086, ''),
('87fe472501fa43fbf418b9f5df313e9f', '18.237.156.39', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1619037467, ''),
('8804c971968442f703584fb2f2c2f5e8', '157.90.116.154', 'Mozilla/5.0 (X11; Linux i586; rv:31.0) Gecko/20100101 Firefox/73.0', 1622108195, ''),
('88082445019e68d76d2c51c48ca4a5b7', '34.210.84.193', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615007632, ''),
('88593ace902d0301b2d6f9809a65262e', '52.211.41.73', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621287572, ''),
('8868f8dd94a283334ecb6ed0a1c1334b', '54.216.91.210', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624147861, ''),
('886ffbbf1151e9ec40e915151cfbb830', '54.244.166.191', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622454659, ''),
('888930a9a439128ae64b8f62ea369856', '54.221.27.173', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 1614162899, ''),
('8895eb2cef2fda502b49ecb574b43fe0', '92.118.160.61', 'Go http package', 1616974988, ''),
('88a0a6b3f766b9a971456d8c46121d5d', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.2482.88 Safari/537.36', 1614555911, ''),
('88adf40a05b9dc46a15af1dc732c915b', '111.7.100.25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614185385, ''),
('88b6a7a9669e5f65b981b50d23831183', '100.20.59.137', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616562453, ''),
('88f3e9782b39d8d4e0aea7b6271bfeb7', '34.211.148.102', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615408482, ''),
('891580fe9e066b8b24c27db391844a79', '18.144.1.9', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 1618597532, ''),
('89a44742f85f1a0c9988dc4d6e20e1a5', '35.164.153.80', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622697007, ''),
('89c2919505d0160012679beacc242d82', '34.212.121.145', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617772522, ''),
('8a03c73cb30603e19f0e7796dcae8e6e', '52.31.81.196', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1622239473, ''),
('8a2785256c08a15b5b9459ac32c22ce5', '121.37.133.156', 'Mozilla/5.0 (Windows NT 10.7; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3967.88 Safari/537.36', 1616171855, ''),
('8a312ed432d276a98ad9e6b171429c0f', '144.217.135.193', 'Mozilla/5.0 (compatible; Dataprovider.com)', 1619297506, ''),
('8a33eb164c5dd1d5c2012babae39ab74', '158.222.11.168', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 YaBrowser/18.1.1.839 Yowser/2.', 1623484453, ''),
('8abeb4342af8c32c1c9d7e668081acc8', '54.184.59.44', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1616186698, ''),
('8ae4a94732ce365d1fede325060526db', '34.215.230.37', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622525380, ''),
('8b09acc99e39929ab70eabc60af7c02b', '18.237.216.209', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1616358745, ''),
('8b17bc73b0b1709bfb0d37adb6bce991', '54.70.69.212', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1621629565, ''),
('8b2e5fe2dd3809c9f29378a2b0f51166', '54.70.252.76', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620160023, ''),
('8b7083d863d130d835fd0b6486416965', '54.36.148.68', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1616478417, ''),
('8b82c8970b5ce25521a9d4bad2b9e9b1', '172.245.153.122', 'Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.2874.3 Safari/537.36', 1619615516, ''),
('8b8511b99888a3cfa0537467168741ad', '45.148.124.117', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1624382972, ''),
('8b8670b3d2fc0573f3823617bbe2d3cf', '36.99.136.133', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614198225, ''),
('8bb5e9145201a4fe8007210bbe66f345', '113.35.251.98', 'curl/7.29.0', 1622952879, ''),
('8bf65744991ed8a893f54ca098660a0f', '100.21.218.158', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:82.0) Gecko/20100101 Firefox/82.0', 1623181554, ''),
('8c011966319978a6b3699837ac96fdf7', '54.245.78.161', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614575815, ''),
('8c124edafc64ddb9800ae92123064b59', '111.7.100.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614208491, ''),
('8c3d566a5745fe90e56654e3808b2963', '18.184.6.149', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1623147744, ''),
('8c48bc26988cdddd43bd1823844fb620', '34.67.203.99', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.104 Safari/537.36', 1621125170, ''),
('8c4b80f29187d4b64282a3657859c051', '52.26.13.80', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624772583, ''),
('8c62ae3bd154629a8ee36c2076318601', '34.210.144.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1623270650, ''),
('8c66d270b0038cdd36e1b89a41196210', '44.242.145.111', 'Go-http-client/1.1', 1614497684, ''),
('8c8eceb1c44af2955dffb3dd5715fe4b', '58.53.128.234', 'GRequests/0.10', 1619292015, ''),
('8c98338e67797bf1d5b955d780d5a669', '54.187.229.121', '0', 1617623802, ''),
('8cf5f75299d4edd8ab06146a60ca0a6c', '34.215.124.113', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623908348, ''),
('8d0260d656fa0e70e741f1c68e06204e', '34.217.210.89', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622612748, ''),
('8d048b0d479145728f694ccbeec064b2', '95.217.76.161', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 1623177068, ''),
('8d541e5a0e0503500135853d4929bece', '34.216.179.112', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620451250, ''),
('8d6cb673f1b04f049b7f386531776d99', '34.219.91.55', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618549838, ''),
('8d7719ed1fba494ec6326024e4231bce', '34.217.94.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615496644, ''),
('8d853fb7e596ea43ac7b4a286df1013e', '3.249.61.235', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624569022, ''),
('8dac724cdca38b07699bbd8e3eed0e94', '92.118.160.5', 'Go http package', 1618686654, ''),
('8dc11bdb6fb8a9a49ae74a487eed8a07', '54.184.5.98', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614230414, ''),
('8dc7916223cfeb774aea19ddd37cb4b7', '44.234.58.138', 'Go-http-client/1.1', 1616994277, ''),
('8de620117db4d810ba65f0dee2a825ea', '54.190.153.209', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622007461, ''),
('8e12db8ccec6de46d297b12d8188d4b3', '52.12.198.199', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622185312, ''),
('8e155a3ae735e00345e76d0d4eb0914d', '34.219.180.109', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623216011, ''),
('8e204adb9d8fd2c538aee1ebe7142207', '54.191.249.20', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622614275, ''),
('8e3acc77618aa307ede81e15fba6d4a9', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.1780.88 Safari/537.36', 1614086551, ''),
('8e3b0b54b36f7c50cb85aa2fdcf922e2', '124.71.180.89', 'Mozilla/5.0 (Windows NT 7.7; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.2207.88 Safari/537.36', 1614100553, ''),
('8e3caca39b48767317dbe59a07cd590f', '54.200.175.218', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621577813, ''),
('8e4b776c475852d9a72acebc7a448ba6', '44.234.58.152', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619932976, ''),
('8e81560e50dc20943d736c2cc73646ec', '54.188.170.168', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615957875, ''),
('8ea54182e7548f186d9ac23b0766ff88', '92.118.160.1', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.c', 1620583708, ''),
('8eb1a341a4e6a4cfce33ad6015ebfd76', '34.223.244.32', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618290938, ''),
('8eb2cf3f3ce2e75a5f07bd5bd6567b23', '37.49.230.208', 'python-requests/2.25.1', 1622682731, ''),
('8ecaeb131a0e9e950dd72eea3264a5f5', '51.158.191.84', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:79.0) Gecko/20100101 Firefox/79.0', 1620457447, ''),
('8ee7a2d40e96a0646e91880fac856fd7', '34.122.181.9', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.79 Safari/537.36', 1614535939, ''),
('8ee91b7be78b52110d960f31905ecee1', '64.246.165.170', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:59.0) Gecko/20100101 Firefox/59.0', 1617547738, ''),
('8efe7a3fde6d44ca3188e2b337f881db', '34.86.35.33', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1621059976, ''),
('8f001db9f513a4af4807baeefa19113a', '34.220.79.65', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621228883, ''),
('8f09a4de980abc68d257101e9aa07548', '54.191.177.220', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621577185, ''),
('8f2c80f7dcb242694d1d5cc49dd8c9a1', '216.19.195.28', 'Mozilla/5.0 (Macintosh; U; Intel Mac OS X; en-US) AppleWebKit/533.4 (KHTML, like Gecko) Chrome/5.0.375.86 Safari/533.4', 1619927080, ''),
('8f39666914a40fecc292a540b9d6fd2e', '52.27.50.163', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622527016, ''),
('8f5f01853e45eb9bb55e0dc986dfa094', '34.216.177.175', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615267593, ''),
('8f62e65a2301fa08d2913eabad4e6352', '52.13.124.242', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622696972, ''),
('8f950fd5cbd34418058ff640c3b9efb0', '66.249.72.200', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.97 Mob', 1621085019, ''),
('8fba2c0f080433511793113f87297600', '185.220.102.244', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36', 1623060065, ''),
('8ff98e494b610b56f3b4d858d9ba5ce9', '54.200.255.189', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624859879, ''),
('900e59fb43d4336ffb28878d40e59b13', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.1400.88 Safari/537.36', 1614301902, ''),
('9044d92bb633563491515e0cf0bc7e23', '54.203.71.243', 'Go-http-client/1.1', 1615354230, ''),
('90492bb99510fb10529fd582fc35192d', '58.53.128.88', 'GRequests/0.10', 1617849429, ''),
('9053d6bc71deca5215609761d90d57a7', '124.71.180.89', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.2907.88 Safari/537.36', 1614142750, ''),
('9059800bb0ea7c36b8f048cc519a7f35', '52.53.162.201', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 1614962465, ''),
('90be8fca4c25d96a0ed81e6401d00570', '107.175.197.170', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.2322.165 Safari/537.36', 1622919741, ''),
('90cc40a541a0c6fa397a98dc622fb4f8', '54.36.148.58', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1614205720, ''),
('90cf070bf744f5d0a14648008f97bfed', '92.204.170.186', 'Mozilla/5.0 (Windows NT 10.0; ) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 1619461772, ''),
('90d65313776e50b0a11942280f3b7586', '52.38.202.188', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615614425, ''),
('90dc487952fd36283c69c81861b0062c', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3579.88 Safari/537.36', 1616283055, ''),
('90f1445583b8bb59e529062f015ab835', '92.118.160.41', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.c', 1624296878, ''),
('90fae74a41101ffbcc19c554cdc0694a', '68.183.116.34', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 1616582700, ''),
('911ff87a062d5f652ba1eb39c91d9498', '121.37.133.156', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.1596.88 Safari/537.36', 1614678975, ''),
('9132fd335affac9d419eee7ee2697ad3', '34.219.244.35', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623301915, ''),
('9145d7a4c97675c7a9eda0053f990601', '34.211.51.136', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/68.0.3440.106 Safari/537.36', 1616477090, ''),
('9165f9c585dca3be9b848411b533153d', '128.199.53.20', 'httpx - Open-source project (github.com/projectdiscovery/httpx)', 1623832876, ''),
('9178b23e9a8e576ffe016fcae624c636', '23.224.68.74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.3', 1616744727, ''),
('917d2df4257788e6ffbb5eddfac86867', '54.212.110.174', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622525588, ''),
('918c0e3e129337e9469661721b165b1b', '34.218.242.118', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619933254, ''),
('91c1ec99d1f0e8a88b2acb38322bb48f', '51.77.149.226', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/88.0.4298.0 Safari/537.36', 1614357846, ''),
('91d838d1234170d325e50349132ca7c1', '161.69.99.11', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko/20120101 Firefox/29.0', 1614250057, ''),
('9231435415c00cf1fe22ac676ea50b01', '34.122.181.9', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.79 Safari/537.36', 1614535939, ''),
('927feb740b41ec71a8244bd4ae1c6d56', '162.247.74.217', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.125 Safari/537.36', 1615576802, ''),
('92ba42ab64d638ea38e7b5c06b7fa9c8', '62.210.141.4', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1614739333, ''),
('92f14ad4dcb737bf4dae1bc719e271f7', '34.209.55.37', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622360820, ''),
('9313ac31427aaf32af6f7a1b6546b471', '34.218.244.30', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623132440, ''),
('9361f190f1e751d147bb7691b6755ada', '34.221.247.240', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1616271476, ''),
('93628d68b5ac44378d50ab2f80c697bd', '124.71.180.89', 'Mozilla/5.0 (Windows NT 9.8; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3185.88 Safari/537.36', 1614311914, ''),
('938c58011e9d8e23cc6e523e4eafbed0', '124.71.180.89', 'Mozilla/5.0 (Windows NT 7.5; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.2863.88 Safari/537.36', 1614221318, ''),
('93963f2959d9715b6cfe2249000a98d8', '54.244.177.224', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1619004969, ''),
('939f865b8bac20df614b5d44d3ed7fe5', '52.37.11.154', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1617136763, ''),
('93ac3da2802b26f475f2c75c670f75d6', '54.202.48.22', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622696948, ''),
('9406879425eb2c3a8626183b4119556d', '54.36.148.68', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1623676072, ''),
('94238ea96c03ab49edceaf4ca6dc970e', '121.37.133.156', 'Mozilla/5.0 (Windows NT 5.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3159.88 Safari/537.36', 1615846845, ''),
('942571872ea5f1b4dbb362feeaa5da92', '54.36.148.72', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1614226020, ''),
('944a9be95f1115c1ba057cfcc81bcacc', '66.249.72.196', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1621135487, ''),
('946270cd1ee3ed61aec0731f4bfb987e', '54.218.81.1', 'Go-http-client/1.1', 1614139683, ''),
('94714cc376c5cc3d34915130e33c8001', '92.118.77.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 1623426439, ''),
('9497df776d60a0f27c20c5636bdf764f', '34.208.111.123', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621835122, ''),
('9497e9957354a16110a7abc928efeb2b', '54.244.180.189', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1618086214, ''),
('94aa973e3808f3f3d14400267018d96f', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.4; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3104.88 Safari/537.36', 1615645377, ''),
('94b8d9824e241633aa94bf1bafd858b2', '34.218.255.36', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624426200, ''),
('94c1ecfbfe8137575075ea9737816eee', '54.212.158.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624772280, ''),
('94cf048c24305d08aaebebd0f2b962fe', '92.118.160.9', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.c', 1624704627, ''),
('94fa8488287f4559ab3f06b26e192d2b', '138.246.253.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 1618068257, ''),
('951034f883247c2399715bee3980a76a', '34.254.63.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620403504, ''),
('951eed587a786abc6808351175cf7e0a', '91.227.68.190', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.2 (KHTML, like Gecko) Chrome/15.0.874.106 Safari/535.2 YE', 1615425006, ''),
('95216412583db9093e376dfeb7e95f62', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.1472.88 Safari/537.36', 1614746141, ''),
('95330266d8b44150a6027cfba04e1da8', '35.239.149.53', 'python-requests/2.25.1', 1623013423, ''),
('954ee007427f60a714bba161109c98fd', '167.114.232.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:79.0) Gecko/20100101 Firefox/79.0', 1614124692, ''),
('9559e6c5aaf3142552b71218865e85b7', '124.71.180.89', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.2881.88 Safari/537.36', 1614113428, ''),
('95a08395cba8bca2bd3056340eb96c71', '137.226.113.44', 'Mozilla/5.0 (X11; Linux x86_64; rv:84.0) Gecko/20100101 Firefox/84.0', 1617943924, ''),
('95ad9c92de50a364954fbffbddee9aed', '72.13.46.6', 'Mozilla/5.0 (compatible; ips-agent)', 1614499236, ''),
('95f3f6ddca74beeaa46d600b84426a1f', '121.37.133.156', 'Mozilla/5.0 (Windows NT 6.5; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.1980.88 Safari/537.36', 1614847539, ''),
('95fae0f4b1cb76f1a89c3de86eb3c3f7', '54.201.93.235', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1622442846, ''),
('96094c9a4700a676c409d73741dac11b', '66.249.79.159', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1622288076, ''),
('960bdbe281dd19af7aaf27d51eebaf27', '34.77.162.6', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1624070181, ''),
('9619ac63c972947ef189c79d6121857f', '172.245.66.89', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 1614746841, ''),
('9630627c8923c283fed2efac9bdbd7d0', '18.237.103.192', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614501693, ''),
('9648f40615fa7f5d36adc9cc8e9efac3', '128.90.154.215', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.1.2 Safari/605.1.15', 1614227949, ''),
('96532c7b8552d464e39b2632ddebc192', '124.71.180.89', 'Mozilla/5.0 (Windows NT 6.7; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3435.88 Safari/537.36', 1614197507, ''),
('965eec72e1c405a9440a8b481bd1e81a', '121.37.133.156', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.1747.88 Safari/537.36', 1614622222, ''),
('96ac8fd40cf07837483b09852fdcc8c1', '111.7.100.22', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614504714, ''),
('96f964cde8879bdce22b726eafed4d90', '23.224.68.74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.3', 1616744698, ''),
('972c22a2bdd6af646e4c63d3a4ff6587', '54.184.64.78', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616822604, ''),
('973973a6e581dff4aa5bf4dd33e32237', '52.39.183.64', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620678664, ''),
('9747415bd9824636f16ad90416f8e467', '58.53.128.148', 'GRequests/0.10', 1620141236, ''),
('97ac0a61ecc232e2882ed52fc369c714', '44.234.150.46', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620625284, ''),
('97c80be541db7174cc9a938dce192c8b', '34.213.91.122', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615957872, ''),
('97d8f1afe0cf0656502e7ededb5477c8', '66.249.79.148', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1619653510, ''),
('97e1ae8e72fcc3d9fc31f2ee06e9a995', '221.229.218.152', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3 like Mac OS X) AppleWebKit/602.1.50 (KHTML', 1615046932, ''),
('97e85b60d0fab8604c97004d932dd9dd', '52.49.241.206', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1617227585, ''),
('97f08412e036ac3742b639ac02b4e3c5', '58.53.128.148', 'GRequests/0.10', 1615793158, ''),
('97ff2643b8c2a85bf864e211b076d9a6', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.9; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3270.88 Safari/537.36', 1614915145, ''),
('983ccbdc81b3dbb33d8b576d15693e37', '34.219.155.49', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623736704, ''),
('9849a942853a0ca2ac18aa1125a7440e', '54.187.153.205', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616217866, ''),
('986921fccf34ba8d0e2ef6f6c35f698e', '146.148.47.248', 'python-requests/2.25.1', 1622135421, ''),
('987a075a44abfb42b9896836ff83c688', '18.237.223.28', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614748485, ''),
('98963ebb42f4671e96acf78320945b2a', '38.122.112.147', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1619302844, ''),
('98af4589ffeeaea59bf22c3771942635', '34.214.5.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1622783891, ''),
('98cc290a416047618915905837c6a28f', '132.232.75.2', 'Mozilla/5.0 (compatible; ThinkBot/0.3.0; +In_the_test_phase,_if_the_spider_brings_you_trouble,_please_add_our_IP_to_the_', 1622944077, ''),
('98d7b71a58cba3d6f5efc1ad0629b5f3', '58.53.128.88', 'GRequests/0.10', 1615470286, ''),
('992fde4a3c57e6cad4a65a86280092bd', '54.202.224.233', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619329326, ''),
('994184cbde9fd1ca11b18549a3738650', '121.37.133.156', 'Mozilla/5.0 (Windows NT 5.5; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.2238.88 Safari/537.36', 1615230558, ''),
('9946ab034845c4237a768f16d962a77e', '34.220.75.201', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624170343, ''),
('99698ba6702444898e09244eec5043dd', '34.86.35.28', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1618910566, ''),
('99c4b54ff670d42053d785c6ad30b067', '35.80.17.152', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616304013, ''),
('99ce77356a5056b82d2fc0089a676a3e', '34.245.30.213', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621351252, ''),
('99df8278e499d800976bfabbd4c932ec', '52.41.101.121', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619416009, ''),
('99e6ffcf762b41b66e891bda72c986fb', '23.224.68.74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.3', 1616744727, ''),
('99f841adfa33361cf91340c7076c167e', '63.32.54.95', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624915021, ''),
('9a4ff3997142c9da0e467e61b2f81a96', '34.96.130.20', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1622229026, ''),
('9a526a1ca6a05b188d4dfae07243976e', '198.71.56.237', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 1620901231, ''),
('9a7533794b749b4edf305a7c12d69f53', '44.234.45.52', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619501189, ''),
('9a9010676082bfdfc7e072a60e44fca9', '54.190.45.58', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622382881, ''),
('9a96d42bdb29278b311b1af57a64dc0b', '54.90.196.91', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:68.0) Gecko/20100101 Firefox/68.0', 1623787262, ''),
('9aa0ecb1061341e7db5bbbb5fe173667', '121.37.133.156', 'Mozilla/5.0 (Windows NT 10.9; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.2192.88 Safari/537.36', 1614885819, ''),
('9ab83b6727f7ac574979785673a12c79', '18.236.180.30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1623304962, ''),
('9ae67573e61194aeb4d6b79a3fb1fa6c', '124.71.180.89', 'Mozilla/5.0 (Windows NT 10.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.2710.88 Safari/537.36', 1614091082, ''),
('9af592b414db36a7076fd45c34879629', '34.251.61.8', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620336653, ''),
('9afaa8e7936c894a4abc5fd57287984c', '54.214.116.247', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623304043, ''),
('9b0f6e551aede171936fb7bd68e28bdd', '58.53.128.88', 'GRequests/0.10', 1623494072, ''),
('9b47736877bf9d03dc1597ea4b850f0c', '18.237.9.176', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621835382, ''),
('9b67f4747061952ed4f1cb2b7b1ee921', '34.254.63.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620405703, ''),
('9b6faca1f22dcddc2f22661d96ff6763', '18.236.230.19', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621315485, ''),
('9ba7c8397d8997383003d8aa8109fb5a', '121.37.133.156', 'Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.1997.88 Safari/537.36', 1616448102, ''),
('9bb14bd46b2a885e0314514d7fcbeb0d', '92.204.170.186', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36', 1617391830, ''),
('9bddd0f14ea3cc6ae20f60f4f09f5e9a', '35.225.48.181', 'python-requests/2.25.1', 1623624399, ''),
('9bf37887454bb4562311661819b4aabb', '54.170.5.25', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623438112, ''),
('9c16bf32569647157be8631fb43e595d', '121.37.133.156', 'Mozilla/5.0 (Windows NT 10.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.2599.88 Safari/537.36', 1614764343, ''),
('9c2bc9525d53564b7726c2cffcbdfbc7', '54.187.59.218', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1621583667, ''),
('9c3d50bd3909bac3f957f5991c543bfc', '34.223.110.205', 'Go-http-client/1.1', 1614587796, ''),
('9c3dcc72f444becbdcb63eedc65a6c94', '18.184.195.200', 'python-requests/2.18.4', 1619423405, ''),
('9c4860f209720bc25c631d7573f2b913', '198.71.55.250', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 1621117611, ''),
('9c6a62b4dd96059d5c19d45c553a80b9', '34.217.97.110', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624481506, ''),
('9ca7372b4437838d549105ae2599053e', '35.162.172.220', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623043483, ''),
('9cbac3e4e7c561f91c6d3ed62e5e07cc', '121.37.133.156', 'Mozilla/5.0 (Windows NT 8.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3676.88 Safari/537.36', 1614828692, ''),
('9cdedbe4417ea0355065b111642b8fed', '35.163.25.122', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619068093, ''),
('9ce3c51411b08e9e55fb30b2cc89e12f', '138.246.253.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 1617326800, ''),
('9d12bec146978702883207c20d1d9062', '63.32.54.95', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624915021, ''),
('9d3f3fecf59bdf50129d9e1ef42974f6', '34.222.77.71', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615356202, ''),
('9d5a1b90b3803a62acef8673e5e8f1c1', '89.108.88.240', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; GTB7.2; MRSPUTNIK 2, 4, 0, 493; .NET CLR 1.1.4322; .NET4', 1616418114, ''),
('9dac9dbe240b6b505040f8153db4d2e8', '58.53.128.88', 'GRequests/0.10', 1624021186, ''),
('9db3f63011f4cfe07b5b017d217ea588', '34.209.96.21', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624169980, ''),
('9db5fd422b3109c0e3f2bbc37fd9ec34', '54.77.236.226', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624658093, ''),
('9dd99cca2ba4393fb4f90cabc1ac6ea9', '52.49.241.206', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1617227585, ''),
('9df85ff29258078e6c7bb3e4e0c2f052', '107.150.59.242', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1621057924, ''),
('9e1bd77c01587da97c7c3aba390a6b4a', '13.59.86.103', '0', 1624512048, ''),
('9e33218c726c30e8819c33b23f00ef80', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3226.88 Safari/537.36', 1614802386, ''),
('9e371541b67a25e71c8d5b4d8a4d3213', '34.241.96.175', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623793341, ''),
('9e46a7dfb815ce653dacbc650c029b86', '59.175.144.14', 'GRequests/0.10', 1618931808, ''),
('9e5c38dd9b90b70fdf88331b94b745d7', '54.191.79.209', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623303502, ''),
('9e5f0ce9005223c150717a853613e4b6', '35.161.31.220', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1619243720, ''),
('9e80573890707a13c10b2cbe8833afc0', '54.213.188.136', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621661799, ''),
('9e9623e7597d648aa845916bd69507e5', '3.250.185.221', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.3', 1623348298, ''),
('9e9f4ec05c900b0a25bd7208f6fa5002', '124.71.180.89', 'Mozilla/5.0 (Windows NT 7.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.1568.88 Safari/537.36', 1614117814, ''),
('9ea260acb6804cddd370dadf7b90329e', '54.244.213.49', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624772559, ''),
('9ec0ad6e5e16ae7ed8d3bb1b60d13aaa', '34.83.8.5', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.93 Safari/537.36', 1624439935, ''),
('9ecab82525cc79f8b5fb890fff0809ce', '54.191.229.175', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621401608, ''),
('9ee386818f143e63aaa07e91825797b4', '82.156.194.84', 'Mozilla/5.0 (Linux; Android 10; LIO-AN00 Build/HUAWEILIO-AN00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Ch', 1623432671, ''),
('9ef0693dc710770ee40a85c04fea1b50', '52.36.31.206', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623389503, ''),
('9f14b9eb448d96b1a2ea62aeb0bf1cad', '44.229.15.73', 'Go-http-client/1.1', 1617512892, ''),
('9f2bd02a0e1fb744fe3dec214225ce8d', '34.217.18.33', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621662610, ''),
('9f98f7a6cc411a9fc6c698b51cf6027c', '92.118.160.61', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.c', 1623556336, ''),
('9fbdc2effd96911785505cfb72e76c55', '38.18.36.2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 1615430040, ''),
('9fc11721614cbd2fe97624f0657f291b', '34.241.87.41', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623274391, ''),
('9fd205153edda0a991e7765ee42342bf', '3.249.122.23', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620771606, ''),
('9fdd79389f45afb9487fcfe4f9b9ef24', '72.79.50.66', 'panscient.com', 1622430018, ''),
('9ff8e11b8cc29275a84d5ad7c137106e', '173.67.201.48', 'httpx - Open-source project (github.com/projectdiscovery/httpx)', 1614166938, ''),
('a002a56630573179768e0d279821aaa0', '52.12.189.20', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615006964, ''),
('a0055a733ae72fccc4a16876526a3de6', '89.108.88.240', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.4506', 1616418113, ''),
('a08937b2bc4961f9b6808e237015df45', '52.213.169.140', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/80.0.3987.0 Safari/537.36', 1614266969, ''),
('a089e518d4ffe4780c9de7b323eba26c', '34.241.87.41', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623274390, ''),
('a126a82cd3a1c4f9b2b4382e464c7adb', '54.218.97.212', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619933053, ''),
('a15bb3a630a6dc2bf9e1665eb0247ced', '167.114.185.54', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.83 Safari/537.1', 1614062289, ''),
('a17f3cef86bd31a42c19d0f16b82ba42', '54.203.125.3', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616476505, ''),
('a1969594a8c2a06e35df97c86d60cc5a', '34.219.198.177', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1622236132, ''),
('a1c077273868095c6e7c9cf2d51fc83d', '206.180.173.245', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 1615758702, ''),
('a1dfacb8a8d68ebe62208eea7d5adce1', '34.223.6.141', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623135017, ''),
('a1f8c9e88318c1b6b0a1eb48f8081494', '72.79.50.66', 'panscient.com', 1622430017, ''),
('a1faaad303b20e590fa37bdaef4d4dde', '35.202.105.45', 'python-requests/2.25.1', 1622484993, ''),
('a204bacd4687505c78b92d1e27f365f4', '42.236.10.93', 'Mozilla/5.0 (Linux; U; Android 8.1.0; zh-CN; EML-AL00 Build/HUAWEIEML-AL00) AppleWebKit/537.36 (KHTML, like Gecko) Versi', 1623884391, ''),
('a24629659927d980616a6d0076473d54', '34.209.237.111', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/68.0.3440.106 Safari/537.36', 1614143344, ''),
('a250c44843da5a8c206b1c12badd3a8d', '36.99.136.130', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614198322, ''),
('a256161f3c3abff088610fddfb8f078d', '121.37.133.156', 'Mozilla/5.0 (Windows NT 5.5; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.2238.88 Safari/537.36', 1615230558, ''),
('a25ee76ed1c872a5cd59232e536491c9', '162.55.56.252', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987 Safari/537.36', 1619374595, ''),
('a26b7fd4aa32c5d2e3a5f5628eb703c1', '35.164.52.174', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622613625, ''),
('a273785fa8d4d2944dba323d710d9270', '167.114.185.54', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.83 Safari/537.1', 1614062287, ''),
('a29a83a0fc869529d13aa8c83857261c', '34.222.1.208', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622871193, ''),
('a2afa64ebd03d10560e29a7bc08a1bdf', '34.221.23.75', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618204524, ''),
('a2c77faf907f15c6605079fc00f6581b', '124.71.180.89', 'Mozilla/5.0 (Windows NT 5.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.2400.88 Safari/537.36', 1614205312, ''),
('a2c79ec7c7bf3ea28ffb18b1c3990404', '54.191.138.255', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620506257, ''),
('a2ebdea58f8afde313f87e53f568bbfd', '40.117.185.219', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.71 Safari/534.24', 1614402289, ''),
('a2f369f9d64dcbe8b886ef481fdf2832', '34.254.157.111', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620250031, ''),
('a2fd3321c38492533e12d6cb7d038d30', '35.162.172.220', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623136029, ''),
('a2fe0f0ea85bba6ae69fd93e602c8d7a', '199.244.88.132', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1619578162, ''),
('a312e97993bca18ea7fe330821ea9ef2', '54.216.91.210', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624147860, ''),
('a32ec803b449f6c1411caac10297bba4', '66.249.93.212', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1614266971, ''),
('a35d0c2bbf737eec05eae68fc9322218', '44.234.56.72', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619242217, ''),
('a365175eb3f51ddfdd52df0b20978e85', '92.118.160.57', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.c', 1618080263, ''),
('a39d50e75efa0b90832b55c4865ec799', '52.42.120.190', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1614317764, ''),
('a3a71d63f417e0f1d44578d8ee87298e', '34.219.86.164', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619933358, ''),
('a3d05cdefbc52e2fe7e7660177c0c5a5', '124.71.180.89', 'Mozilla/5.0 (Windows NT 10.7; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.2294.88 Safari/537.36', 1614292429, ''),
('a3de0f5cb1b4d038a70f5e9f4b777983', '34.217.18.33', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621661988, ''),
('a3dfd33036746d16231bdb3d723effe4', '44.242.145.111', 'Go-http-client/1.1', 1614497563, ''),
('a4217a6007f036c87c6e9f12c343640d', '35.162.172.220', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623043483, ''),
('a47150165ee234c32c90396b42741eb2', '36.99.136.130', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614862112, ''),
('a4bf037683fd823e57dba284bd25d9e3', '42.236.10.74', 'Go-http-client/1.1', 1623430221, ''),
('a4e002eeb5d6d82b37dc431246cd612d', '35.162.16.199', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622007539, ''),
('a4f1d0e55a0f9f180e734e68285a6ee0', '52.24.155.176', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621489486, ''),
('a51fad31f0a39479927faacb6057d522', '192.71.10.105', 'Mozilla/5.0 (iPhone; CPU iPhone OS 12_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.0 Mobile/15E1', 1619391128, ''),
('a5374f05a094f06f1607252fe5719b25', '52.213.169.140', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/80.0.3987.0 Safari/537.36', 1614266969, ''),
('a54f69c8e5bf93785e887befbf783d92', '54.149.139.86', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1619763516, ''),
('a5825d963a854613addcd60eb85470c8', '137.135.84.149', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.71 Safari/534.24', 1615437861, ''),
('a5880ef09cc03d24cf9d2feec96e395f', '66.249.93.211', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1614266972, ''),
('a5ba13dc45466cbb21bead6d69500798', '44.229.15.73', 'Go-http-client/1.1', 1617512893, ''),
('a5c47f25db98a641bfb4d44c4210ed21', '36.99.136.137', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614254123, ''),
('a5ddf3b93ada892e69e7bf93d5d1f2a2', '18.237.245.169', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624339811, ''),
('a5ee3e4a6914ed28b7b48ea938a8d37a', '34.222.128.211', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623736321, ''),
('a60253f6a5325490d3f18abc69fc1b24', '23.20.117.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0', 1623493565, ''),
('a61f5ee6b46512402d780afd8d95ce5d', '54.185.160.206', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623993403, ''),
('a63eb626810d833b0ed6a35d56a36f54', '208.80.194.42', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50728)', 1618980768, ''),
('a65a679a626e8e977a12914a5320a1d0', '3.15.233.193', 'CheckMarkNetwork/1.0 (+http://www.checkmarknetwork.com/spider.html)', 1614144153, ''),
('a661858f81fc1408dec635a858bf5dc9', '34.96.130.28', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1617909793, ''),
('a67ce24f1c2cc9c6e96e7299b6fe4f33', '92.118.160.61', 'Go http package', 1618224503, ''),
('a6a511a081c469c16ba0a4e184fd4134', '34.217.20.170', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622181858, ''),
('a6a5e4514a1d05d8741bd6fc34db39b0', '124.71.180.89', 'Mozilla/5.0 (Windows NT 10.7; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3651.88 Safari/537.36', 1614357655, ''),
('a6e54403ee96ae6bac87d92fb8cb4118', '34.220.79.65', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621228883, ''),
('a6f65bf7034085a69a74f77246fcf311', '59.175.144.14', 'GRequests/0.10', 1619708176, ''),
('a7ad228890f99646719d62da2a52b505', '52.42.239.30', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1617655469, ''),
('a7bf17a6cc9c40edb7b45a30300a5bde', '35.80.14.33', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616132146, ''),
('a7ce3b1136415defe1e4398b8ef2f898', '40.117.185.219', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.71 Safari/534.24', 1614196515, ''),
('a7eb27d9613f791665edfa912547838f', '18.191.24.185', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 1615038621, ''),
('a80086f5d428c6e202502bb15cb9aa0e', '34.220.134.159', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621142683, ''),
('a82d6c5a31b9ade8c5e304b0972ede3c', '121.37.133.156', 'Mozilla/5.0 (Windows NT 7.8; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.1144.88 Safari/537.36', 1615021928, ''),
('a83046dbdf8a11ca4a58c61b9b5526ce', '121.37.133.156', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3781.88 Safari/537.36', 1614866953, ''),
('a831bf8d42d4c2e7802bfcccc4293ed6', '100.20.156.189', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618549817, ''),
('a840fb54b88fc525ed9aab44d8cf7e98', '138.199.36.143', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.170 Safari/537.36 OPR/5', 1620157782, ''),
('a853c7e1f1dc269f35c83f3df92da6e5', '191.96.57.244', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.2 Mobile/15', 1614122718, ''),
('a85de6481193d1aa9f05babe0e3bca48', '47.96.157.194', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.3', 1615328761, ''),
('a860b32d7575c726e61b2f3e9885a71a', '54.203.73.198', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:82.0) Gecko/20100101 Firefox/82.0', 1617083049, ''),
('a862fed319f46dafbf4381948962e7a1', '92.118.77.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 1623426436, '');
INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('a86d8446632baa6ab66e8597ae879cfd', '54.70.65.70', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621748200, ''),
('a8fabf229102527195ab7ffdae552bb4', '34.219.161.184', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623530478, ''),
('a91ae7b610c592cb8d3dca6f7d7c124c', '54.36.148.233', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1619797666, ''),
('a940943cfada2b05535b8f2893244db6', '34.77.162.26', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: sca', 1616583617, ''),
('a95d9f38ed32f4900267b654272696c4', '199.187.126.42', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 1621117610, ''),
('a991d01c04e7d9d2ad699b5bc6b06820', '34.215.230.37', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622612753, ''),
('a9b3ceac956bc398e7052d55dfe0a9fb', '34.213.190.30', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614062443, ''),
('a9cc0daa344426c327860fc9e3c49b4c', '92.118.160.5', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.c', 1618686654, ''),
('a9d487cf236c5facdd36797616b4fcad', '208.80.194.42', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50728)', 1617134874, ''),
('a9dc7e08ca1a52158964a0c60454174b', '44.234.45.49', 'Go-http-client/1.1', 1615612887, ''),
('a9dd8e3cc8c629139e61227ed06779e9', '44.233.199.225', 'Go-http-client/1.1', 1615874089, ''),
('aa13a3e4a4efa15c057e8b8c47e15e4e', '54.201.106.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1617514219, ''),
('aa16e428eb51aa7d4a143deee5b71c9e', '54.202.102.95', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1623531633, ''),
('aa3d7125173dc004814547e3d144b2d4', '91.227.68.190', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.2 (KHTML, like Gecko) Chrome/15.0.874.106 Safari/535.2 YE', 1615425006, ''),
('aa491480c7a501c74442045db6b2284a', '54.36.148.108', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1624633215, ''),
('aa6d5b1a624a8bf854248ccdbbe53f78', '34.221.32.247', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1619156591, ''),
('aa8e6dd2adb699a4446fb761d213f073', '34.245.96.135', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620134218, ''),
('aab34ed8e35a93a11ce9c264e95107b8', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.8; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3917.88 Safari/537.36', 1614333865, ''),
('aade78bdcef6a18abb9c72eee5bd0046', '54.214.96.32', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618895445, ''),
('ab1f64544a328e16707643bdfbaa58b9', '18.236.122.250', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1622181820, ''),
('ab30536793cb6a70accc8327961f804c', '44.242.166.244', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617772547, ''),
('ab30573fe612600c28a2477bab493966', '124.71.180.89', 'Mozilla/5.0 (Windows NT 7.5; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.2375.88 Safari/537.36', 1614189580, ''),
('ab980cf6cd7ad59fcba8c0eadb224344', '54.186.131.186', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624597888, ''),
('ab9f8e3be1c4c0584d49a24241794e21', '124.71.180.89', 'Mozilla/5.0 (Windows NT 5.8; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3567.88 Safari/537.36', 1614428238, ''),
('abca8c01ad5b20d8819b27781d12817f', '45.144.225.119', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36 Edge', 1623060066, ''),
('abcfd4053460c148a4a96cf7f26cd0c1', '34.254.63.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620405703, ''),
('abd499d873c5be8c10e64127cbeb70d3', '40.89.163.70', 'Mozilla/5.0 (Linux; U; Android 4.4.2; en-US; HM NOTE 1W Build/KOT49H) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0', 1623769862, ''),
('ac4e42f73fbf572b4b8def5fb26a2347', '72.79.50.66', 'panscient.com', 1622430027, ''),
('ac7530d2fd65e59bb04e89c2010403bc', '35.166.171.32', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1616964963, ''),
('ac8762f51de82246409aae400b9f965b', '39.101.217.74', 'GRequests/0.10', 1616787076, ''),
('ac98de54ede80682c2cef83c3e3d4c51', '54.186.157.168', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1618832519, ''),
('ac9e3b75c1f093afbd18a34551e4d20f', '54.36.148.68', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1619099059, ''),
('acce6226536d6f56265821d6082085a3', '54.186.145.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1621487327, ''),
('acded1b42114c99c5382cb03423e4682', '31.210.20.31', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', 1624950384, ''),
('aceb544121360639624005443434e888', '124.71.180.89', 'Mozilla/5.0 (Windows NT 10.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.1563.88 Safari/537.36', 1614151780, ''),
('aced2a83b800afb5242689f1dbfc8178', '193.200.151.103', 'Mozilla/5.0 (Windows NT 6.0; WOW64; rv:24.0) Gecko/20100101 Firefox/24.0', 1620344695, ''),
('acf9098b991f8cf88b14a76894b41bf7', '51.158.98.24', '0', 1621489329, ''),
('ad1c5f5f283e09a1c933992039918598', '54.245.138.76', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1616735282, ''),
('ad3ef8de0c26fcae995593eb25f1c1d2', '35.163.253.56', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622614852, ''),
('ad44c70461c93d5e3c4418da8bb99534', '67.227.32.192', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 1618293413, ''),
('ad4908b5e7c62a1322c40b2c93840752', '52.11.228.142', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621489569, ''),
('ad918bc141fa918a0f9a5e04aa231f68', '111.7.100.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614761909, ''),
('adab679bcd34ddb016876046ef534e00', '35.165.214.64', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614317048, ''),
('adb6f60b733e9531fae3808cf3fafc51', '54.203.73.198', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:82.0) Gecko/20100101 Firefox/82.0', 1621327289, ''),
('adc309a725608ff8bf6737a801359b1f', '192.210.133.18', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4240.193 Safari/537.36', 1614363542, ''),
('adcf8fa2dc288f66675ac03334daa6d9', '44.234.49.139', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618722558, ''),
('ae0020f36c30cbd432714881894be2c7', '44.242.171.29', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615785238, ''),
('ae10163d00293b43bed0dcdcc8e1d2af', '44.234.24.151', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_3) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.65 Safari/537.31', 1621981517, ''),
('ae161263bb84760405768a69962ddba6', '124.71.180.89', 'Mozilla/5.0 (Windows NT 5.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3718.88 Safari/537.36', 1614415904, ''),
('ae6bab54a803698e230bc1b073986bd2', '3.248.170.229', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623396099, ''),
('ae755a35c60770a71005fdbe79c310c3', '58.53.128.148', 'GRequests/0.10', 1615793167, ''),
('ae82d2f20c7c4756744ff84dc5a91bcf', '92.118.160.57', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.c', 1618034523, ''),
('ae96939ca6a4cc1dc9739c1bc5d4d574', '52.40.246.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1619068562, ''),
('aeb55253ea3b7f1dc1226e034bfbc825', '121.37.133.156', 'Mozilla/5.0 (Windows NT 8.4; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.2814.88 Safari/537.36', 1615374903, ''),
('aed7409202cf1dd03019e970c8e6f763', '54.154.58.175', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623448502, ''),
('af485843f71843c8f4245d7e1cf5e83a', '111.7.100.27', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614761908, ''),
('afac709d0db20ecc3ee1120d063db45e', '34.221.23.75', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618204524, ''),
('afb6d304a3112ff177935dfe84c1a69c', '54.70.251.84', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624511688, ''),
('b02c8d6f65a122d6f085e9e67387b4dc', '72.13.62.27', 'Mozilla/5.0 (compatible; ips-agent)', 1617127960, ''),
('b033c9d60376256beb9a942982b749f5', '216.151.2.52', 'Mozilla/5.0 (compatible; WbSrch/1.2 +https://wbsrch.com)', 1620015434, ''),
('b04e6637c0aa3bf15ab7622150daf686', '124.71.180.89', 'Mozilla/5.0 (Windows NT 5.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3959.88 Safari/537.36', 1614322750, ''),
('b06f5fee014683bb645604d761bfb4be', '52.37.206.66', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623133951, ''),
('b0bdf3bbe59639fd38b446515f465705', '54.213.122.223', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1623132116, ''),
('b0ffad3fd18b26bc3def0bc1c1d7bdc5', '52.214.124.200', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621467746, ''),
('b105799ed58f59ceaa26f9adb8347154', '54.201.58.202', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624598310, ''),
('b10c7c79cee2cd91f388a9e783cc5218', '54.213.27.220', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619587070, ''),
('b134e63179f853cbc24a49f0f9cd4000', '54.78.119.104', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623707959, ''),
('b13a1c750a5db6fa306c6f1642e3c385', '47.88.9.50', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.3', 1615529598, ''),
('b14dd56688c4938a2f92092289b64560', '137.226.113.44', 'Mozilla/5.0 (X11; Linux x86_64; rv:84.0) Gecko/20100101 Firefox/84.0', 1614296750, ''),
('b15eed3f56345a0abafd1674f4608a57', '34.219.180.109', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623303022, ''),
('b16d65158c3ed078d0c092ca20c69e91', '216.145.14.142', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:59.0) Gecko/20100101 Firefox/59.0', 1620897699, ''),
('b17c458665fc7356d03c120b0c4a7d31', '132.232.81.163', 'Mozilla/5.0 (compatible; ThinkBot/0.3.0; +In_the_test_phase,_if_the_spider_brings_you_trouble,_please_add_our_IP_to_the_', 1624195109, ''),
('b19ba2bdb107e46c83707bedc94d4f8f', '34.215.230.37', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622612753, ''),
('b1ec1dc1ad0b3e97e4f8214e1c3146bf', '54.186.174.208', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622374466, ''),
('b1f3c3296ae197633e96cef67e76f591', '23.224.68.74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.3', 1616744727, ''),
('b219448958c50ce3c206226a5184907a', '44.234.38.246', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621055117, ''),
('b24790a22f3c7779cc025fdf86ef383d', '192.151.156.190', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1618656654, ''),
('b250ec53b2eee621d2624c0e5417dc33', '34.219.250.145', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615873588, ''),
('b251748562a2e66e9001507cd71e24c7', '35.163.159.102', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1619643183, ''),
('b2713d24415cecde9af404ffda6bf7b8', '95.168.171.150', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/533.4 (KHTML, like Gecko) Chrome/5.0.375.99 Safari/533.4', 1618438273, ''),
('b291bebb75dd76ff1413017dd9044f44', '205.169.39.206', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 1614922819, ''),
('b2b05633f795ce46b50f56dddd7ccb86', '34.221.159.176', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619760610, ''),
('b2b09af6eb2a318b2d4db4deb96c411b', '52.36.168.152', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624686838, ''),
('b2bdbaec8d5b4423a8f5a03062b6c9d3', '162.55.56.252', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987 Safari/537.36', 1619374594, ''),
('b2dd9af3f2a03084636c890be47646f8', '18.237.155.174', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615095440, ''),
('b2df157e72fcae532d7e6860f7efd143', '52.34.244.33', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619501230, ''),
('b2ea065fe6cfa21b8d5b28ab34a14e8c', '196.199.122.78', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 YaBrowser/18.1.1.839 Yowser/2.', 1618296517, ''),
('b2f9fdefe4933948dcf1ccefc8524ed9', '18.237.83.82', '0', 1624892937, ''),
('b306e59b33c8256227407695c2acffa1', '195.181.168.183', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4240.193 Safari/537.36', 1614687163, ''),
('b30a21be7f64f09c186dc7cd33b8cdc5', '44.242.175.235', 'Go-http-client/1.1', 1614748369, ''),
('b31a355c2ad74b3561082080d3645350', '54.216.155.41', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621631663, ''),
('b327d199edfb4ac12d0d5345e5f83240', '92.118.160.41', 'Go http package', 1624296878, ''),
('b35bd7cb08fcec27a71867f2a53badaa', '44.234.58.152', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619932976, ''),
('b3696329ac77f6aa0ab15225a8e74f2d', '31.13.115.119', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534+ (KHTML, like Gecko) BingPreview/1.0b', 1616846834, ''),
('b3748c1cbc563cfbb20c092d43e6f62e', '34.208.103.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615323067, ''),
('b37c348bb8b009696ac392d064fb7735', '52.36.168.152', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624686838, ''),
('b39b4aac6b6dee86986a3cb3f614ac62', '52.210.64.239', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1622151782, ''),
('b3a4c9cc750d3f966b0e3078def78e55', '80.255.7.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36', 1614886071, ''),
('b3cc9363368bed0be7e23d91461e96f5', '34.221.75.11', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623648040, ''),
('b3efdf007624f39c913ec451f4702f84', '54.68.144.195', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1617482843, ''),
('b420dd342d9b58bef2d54e60c1962a92', '92.204.170.186', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.0 Safari/537.36', 1619117398, 'a:1:{s:9:\"user_data\";s:0:\"\";}'),
('b4554aa092396b241b3e9214365310da', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.1458.88 Safari/537.36', 1614700677, ''),
('b481e15dfcd26730210cbb7cc056b39f', '124.71.180.89', 'Mozilla/5.0 (Windows NT 5.5; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.2352.88 Safari/537.36', 1614403118, ''),
('b4822df55f39fac871fec8eed415cd54', '52.214.124.200', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621467746, ''),
('b49694a6958c30432a71217270915f76', '66.249.72.196', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1620529389, ''),
('b4ac13ec7229203224c4efd7ba495b5f', '18.184.195.200', 'Mozilla/5.0 (Windows NT 6.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.89 Safari/537.36', 1615531512, ''),
('b4bb8f11942ca264feb8a778f8657ac6', '54.36.148.201', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1614756288, ''),
('b4e8cc44e1636a1c7b42e77da99df32b', '92.118.77.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 1620872345, ''),
('b5352f01fa2e0999e065ce2f7ec911c5', '34.219.158.148', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619068651, ''),
('b53c0008299f43fdb9f4b4936eb12bc8', '54.213.62.166', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1617340248, ''),
('b53f38368b421f8a095fa0e3c318c6a4', '52.255.201.194', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 1622232226, ''),
('b553454af23eb0fd28e079379bc9f194', '54.218.152.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615439549, ''),
('b55f22cfdb9f8b54e67ad00a90c029cc', '54.187.136.160', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621836072, ''),
('b56eb19ac3f59cfc2c4785f6e4353775', '54.36.148.101', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1622813094, ''),
('b587f262b8fa473f860dde883d985b51', '121.37.133.156', 'Mozilla/5.0 (Windows NT 8.9; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3432.88 Safari/537.36', 1614523971, ''),
('b599b226798e6d4eae3dc5cd939d4495', '34.77.162.8', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1623491666, ''),
('b5c462d8f7babff7dd2fefdfb7201ac7', '18.134.98.50', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', 1623050795, ''),
('b5d759ec253e43284a9ce7dc620d5ac1', '121.37.133.156', 'Mozilla/5.0 (Windows NT 5.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3159.88 Safari/537.36', 1615846845, ''),
('b5d9fd3517b6277eaa45d914bb1f1b0c', '18.237.2.183', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616994221, ''),
('b5df70d4942a84d12f078414bfb2c7bc', '34.222.48.239', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622374497, ''),
('b5e8787eb64bd425d85ca1f8bc531a29', '44.234.147.240', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620106451, ''),
('b6419387c174879d0732d3be6689571d', '124.71.180.89', 'Mozilla/5.0 (Windows NT 7.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3763.88 Safari/537.36', 1614174021, ''),
('b6797dca49541b49d401c333501e2ec1', '40.117.185.219', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.71 Safari/534.24', 1614194728, ''),
('b6ae9e48d02eb0509da76b8e42ffb7c6', '18.237.221.117', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', 1614361107, ''),
('b6d5466b237912eb9e34973fe69c43b2', '34.220.149.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624947581, ''),
('b6d5ce7ec6983a84ce7637edc4febae9', '18.237.151.50', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621920471, ''),
('b72c5aa6bbb9eb7a9a05ce729b265720', '54.202.73.209', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621748303, ''),
('b73b4ef42009d37985e7d06666c88ac7', '34.218.66.147', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621578127, ''),
('b76ddb5b0af46209371facdd13e3fd2d', '34.96.130.20', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1624315823, ''),
('b77d81a80d72ce1c7aea26a2c5a74fcc', '103.132.183.231', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 1614411207, ''),
('b77e352d5ae50236670a3961dfcf86ec', '52.13.248.207', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621836122, ''),
('b7804edf8be5ac938d2b0e7c71bd972a', '103.120.144.144', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 YaBrowser/18.1.1.839 Yowser/2.', 1616057316, ''),
('b79741d498ca8820f58d8ca680697c85', '137.226.113.44', 'Mozilla/5.0 (X11; Linux x86_64; rv:84.0) Gecko/20100101 Firefox/84.0', 1618495975, ''),
('b7a926c28624f3d16d8b0b98570689dc', '54.149.240.255', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622454210, ''),
('b804f3a1ce94f0b8184de87dca2e38b9', '5.62.56.185', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 OPR/36.0.2', 1623783728, ''),
('b82f13ff6f15bddad79d51058c3d7886', '23.224.68.74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.3', 1617142038, ''),
('b88db27c0152b02603727fac15d1d5ab', '128.199.53.20', 'httpx - Open-source project (github.com/projectdiscovery/httpx)', 1623783890, ''),
('b89d9ddeae1ef00c74da5265d05841ee', '54.244.1.193', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615268841, ''),
('b8a0780aea96496af2947d8816446a40', '54.213.95.65', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621920458, ''),
('b8a2df0e4d41017d6ab4cbfb498888be', '39.106.98.188', 'GRequests/0.10', 1617478018, ''),
('b8a5c07866a4cd8d99eaca6cdc3dd216', '35.162.52.2', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620106599, ''),
('b8e5113b921dd8dd455410921ffe157f', '51.222.43.158', 'Mozilla/5.0 (compatible; Dataprovider.com)', 1614187273, ''),
('b92acc2389da5fc9d4d450619a214fda', '34.218.66.203', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624172639, ''),
('b94b07ff03a897567bf5355f504f6743', '34.96.130.32', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1619148916, ''),
('b98339a7717131093a781862ec14b812', '92.118.77.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 1620872347, ''),
('ba29a7cc61f0f71bcc2b04113875990b', '54.203.125.3', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616476504, ''),
('ba61d29c311a73c8a93c2668b90ae553', '138.246.253.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 1615446088, ''),
('ba989b160eb7eba661d9723934616021', '54.214.218.234', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1623738650, ''),
('baa67ad449ac5d2586c56c4b3670c3a7', '34.210.5.168', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623736742, ''),
('bad3997c2d6ceea69c76a60b1d498bab', '3.249.122.23', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620771606, ''),
('badeb4dea6b3e719265a8a76d2925c68', '94.130.96.26', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Safari/604.1.38', 1616850268, ''),
('bae00939f94a5066527e92aacb7a629a', '54.194.243.233', 'Pandalytics/1.0 (https://domainsbot.com/pandalytics/)', 1624423411, ''),
('bb26fa22701962b8b4325c1ddfbe2873', '54.36.148.68', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1617809476, ''),
('bb2ce1b1af31853aa3262e4fc886daf4', '89.22.101.69', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36', 1616340435, ''),
('bb4855be9d128a20c74ffa7287b53510', '35.224.176.55', 'python-requests/2.25.1', 1622309934, ''),
('bb4ad1421e059c75414de09c7f1c55ec', '52.48.96.14', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621895381, ''),
('bb5d14fcb9b10696e5fac7b4a8a3f1d6', '34.77.162.8', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1620169994, ''),
('bb77a830242edcc44c448d33bbde05ec', '52.33.181.105', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1617426711, ''),
('bb80d0f68ce1208e6784165cd060f0aa', '34.208.104.161', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622382857, ''),
('bbc8f910d351b23b3f6c35e878d8a843', '216.145.11.94', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.10; rv:59.0) Gecko/20100101 Firefox/59.0', 1615810622, ''),
('bbef271b895bee8953ee7387d899072f', '54.190.80.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624741663, ''),
('bbf359eddf3c2ba5f3e0f6cbd40da4fd', '44.234.252.152', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620278535, ''),
('bc4b0a60692bdec5aa79309c3ead8f85', '54.191.29.183', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621661937, ''),
('bc507a4461fcd927641ea691dac57aab', '54.188.17.155', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622784736, ''),
('bc5f13a50e5b22178853c88b718d001c', '40.89.163.70', 'Mozilla/5.0 (Linux; U; Android 4.4.2; en-US; HM NOTE 1W Build/KOT49H) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0', 1623769845, ''),
('bc97fa7d60bcea1d0049a142de78e4f1', '52.33.121.178', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615612863, ''),
('bcb600adf51698a3efa71a9889f6f791', '34.222.85.35', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621661966, ''),
('bce165f12d6663f9af768592641fd7ed', '35.230.91.61', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2226.0 Safari/537.36', 1619376593, ''),
('bcfb0480f1709c6affe95c2061728c32', '18.216.136.118', 'Mozilla/5.0 (Linux; U; Android 4.4.2; en-US; HM NOTE 1W Build/KOT49H) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0', 1622146130, ''),
('bd02d04526155b504d2b2a4b9a2a1586', '52.34.167.231', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1616532241, ''),
('bd14f9e92a68d04ef91a572a6db5cbf6', '157.55.39.6', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 1623364121, ''),
('bd6d73ee7a56115e56039607288b5c6b', '123.6.49.6', 'Go-http-client/1.1', 1623722487, ''),
('bd767ef867ab334e9d44953a889c8d9c', '18.118.107.244', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', 1624826514, ''),
('bd85f20f5f19cc7178af5aacea0cf8c9', '54.241.78.180', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 1622835967, ''),
('bd9d539283344a5acf539cfb688dd2b4', '54.188.17.155', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623303122, ''),
('be25f07a82bf80b79e965c246f82b21c', '121.37.133.156', 'Mozilla/5.0 (Windows NT 5.4; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3747.88 Safari/537.36', 1615797772, ''),
('be3c8f597e54baa85ca9804d016e0549', '157.55.39.6', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 1621207475, ''),
('be56a2f47855b339397dd89eecdef40b', '52.88.49.251', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1614140132, ''),
('be771292bf28e1316a634821ebaad5cb', '167.172.229.218', 'Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)', 1617151181, ''),
('be7aeaf0a3b0a2f67e52f8d513039de7', '34.219.180.109', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623216158, ''),
('be8b575fc6cc34cac80724cba7a26688', '40.117.185.219', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.71 Safari/534.24', 1614196515, ''),
('be9e5a643052c1efc79a24dcf67b485e', '35.161.244.217', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1614748873, ''),
('bec8bf39fef6268f4e2dcfe22a2a14b7', '54.245.77.60', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615698266, ''),
('bee4a770090ee1662c759435ecdd35b3', '42.236.10.125', 'Mozilla/5.0 (Linux; U; Android 8.1.0; zh-CN; EML-AL00 Build/HUAWEIEML-AL00) AppleWebKit/537.36 (KHTML, like Gecko) Versi', 1623425881, ''),
('bf024e167a70b90346505ac0e24252b4', '66.249.79.154', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1617756364, ''),
('bf7bd4518a24f2fd71f584ab5cdf9ef7', '54.214.175.159', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624598173, ''),
('bfbb60c2628dea5e21cc91bfb5ee22e9', '137.226.113.44', 'Mozilla/5.0 (X11; Linux x86_64; rv:84.0) Gecko/20100101 Firefox/84.0', 1617943924, ''),
('bff074e0cbadd026763b755d3c88f26b', '34.77.162.9', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1622179361, ''),
('c01286f980e77b969882add06f66ddfb', '82.156.194.105', 'Mozilla/5.0 (Linux; Android 10; LIO-AN00 Build/HUAWEILIO-AN00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Ch', 1623446063, ''),
('c01f88b4ec69a831f06b5898319ca1aa', '34.212.150.251', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622525127, ''),
('c06f0e91a9dc752c3c6687cc4dbf6eb3', '193.46.254.155', 'Mozilla/5.0 zgrab/0.x', 1623271997, ''),
('c08178a6db4c17b4cf3be6a7a571f0fb', '23.251.152.10', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.79 Safari/537.36', 1615540140, ''),
('c086a9eba69a6adb32319039d8d6913b', '58.53.128.234', 'GRequests/0.10', 1620584748, ''),
('c0955dc3401289f21f262ba9b7e9997f', '137.226.113.44', 'Mozilla/5.0 (X11; Linux x86_64; rv:84.0) Gecko/20100101 Firefox/84.0', 1617290355, ''),
('c0c4cf8e29cbbd4054fca9066e8d1012', '124.71.180.89', 'Mozilla/5.0 (Windows NT 9.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.2434.88 Safari/537.36', 1614230029, ''),
('c0c7de011c55ad1f99eb4d68c0c49385', '66.249.79.128', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.97 Mob', 1622311824, ''),
('c0d60601b104150325b44a75f0de3236', '52.214.124.200', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621467746, ''),
('c0e88b2a1bb756f3c5b95f6cc56daa86', '34.215.213.164', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624686832, ''),
('c0f5c336d13a02627e28c32861562727', '34.241.96.175', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623793341, ''),
('c1025d2b9ab94f9ad8eb7d50696b9e74', '137.226.113.44', 'Mozilla/5.0 (X11; Linux x86_64; rv:84.0) Gecko/20100101 Firefox/84.0', 1619698683, ''),
('c10c83f13832fd099718d970a72c3736', '18.237.24.224', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617599284, ''),
('c10e3cb7f15d547057404a0ad9468102', '138.246.253.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 1616078391, ''),
('c1adcd3a6a8321b0ea33db05e1222923', '128.90.154.215', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.1.2 Safari/605.1.15', 1614230091, ''),
('c1d795486b087cc33ee60307451b1d95', '174.138.54.121', 'Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)', 1614504197, ''),
('c207cbe68ee2f5312d7a03c519d3f7fe', '44.233.199.225', 'Go-http-client/1.1', 1615874087, ''),
('c2436e1d798d7a6a1059f417437b5913', '18.237.151.50', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621920472, ''),
('c2631c8ea6b88bb0f974531811d853a2', '18.237.180.96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1619468694, ''),
('c27bc12c64f904b54648e3f937b04e42', '144.217.135.206', 'Mozilla/5.0 (Linux; Android 5.1.1; SM-G925F Build/LMY47X) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.94 Mob', 1616609535, ''),
('c29105b3f2c27b31e0fc513adc6c4dac', '54.245.217.251', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621141894, ''),
('c2aac10fc9c75cc30915e7713f6aed4d', '34.212.150.251', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623304232, ''),
('c2b62a693a28181e17086bd088bb8ee5', '149.56.150.2', 'Mozilla/5.0 (Linux; Android 5.1.1; SM-G925F Build/LMY47X) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.94 Mob', 1624675659, ''),
('c2cdfae0ef0b6d7ea82b21db532dcb02', '54.36.148.114', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1624446532, ''),
('c2ce10ad28038f80bafbe08d6ecd087f', '34.216.109.17', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620710851, ''),
('c2dcc47cfad037a25b05d44988471ff0', '54.201.79.41', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624049361, ''),
('c2f21bb9a304a14b05f95df801435187', '35.80.14.33', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616132146, ''),
('c2fb50a8bf779429c668b65b6e257cb3', '34.216.165.220', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1618642884, ''),
('c2ff3ba2fb062a9599beacebde82eba3', '54.185.160.206', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623993403, ''),
('c30989c7f8a58f3c395ab458ade6dbae', '54.244.111.205', 'Go-http-client/1.1', 1614062484, ''),
('c31af2b1cd5cf2ef189c85b9d0cc43ed', '34.216.229.205', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618895663, ''),
('c3665223a8f4dd3131a88b8b895ae069', '72.79.50.66', 'panscient.com', 1622430022, ''),
('c36d0e24b5e82d05b485f473dc2cccf5', '34.218.255.36', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624426201, ''),
('c36e57cac2c0a9920e4cd067fccc6ee4', '38.122.112.147', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 1624667431, ''),
('c3862aa43fd4b20a1faed598cb1dc888', '34.219.1.212', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620765284, ''),
('c39006ef10a84e9a3e71e145fefe13fd', '92.118.160.57', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.c', 1619431784, ''),
('c3aa2c72997b80e7c3bd67ffd3a213a1', '54.38.123.228', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1618907308, ''),
('c3e49358725d12812993ea9e3a6fd571', '138.246.253.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 1616676028, ''),
('c3f4a6b712fc1bf089f1d3ceb6308fe3', '34.212.189.221', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621921043, ''),
('c3f4e1963ba7ecbc3f5e5fed81af24e6', '121.37.133.156', 'Mozilla/5.0 (Windows NT 8.7; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3716.88 Safari/537.36', 1615274013, ''),
('c42eb6a7f0d083fd4b6c56db1efd2fd1', '54.202.94.83', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623133192, ''),
('c461fb7072913ea949e4ab1c4a272026', '69.197.185.134', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 1621982402, ''),
('c4867f9e9f97e48d68430d9f640df74f', '35.167.202.134', 'Go-http-client/1.1', 1614512683, ''),
('c48ffe5935e20d7e764b66b730a7e3b7', '34.213.36.34', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618377553, ''),
('c49d956eedb7e29c4e89f04779c3a741', '34.222.127.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1621055255, ''),
('c4a45ffd6e336daeec3d00cdf3453a44', '206.180.187.25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 1615325821, ''),
('c4b339fe3f80cce9c1bb8ac475523289', '44.242.168.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617426483, ''),
('c4c7a4b7dfed0ca200ef1f8aa41a6b6c', '52.41.235.27', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622184288, ''),
('c50c679a547c2564b05005cb8c1cccbc', '175.136.231.230', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 1615331478, ''),
('c517b3b2bab10d47bf155f457aed80ae', '34.77.162.8', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1617928335, ''),
('c535896c3d8930839cf421bfd3cc8041', '34.77.162.33', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: sca', 1616475562, ''),
('c54fc70d1ff88167dfc1f3b75102877c', '161.97.175.100', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0', 1614140281, ''),
('c556160680702cc32c773e50c21f781a', '54.148.220.220', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614139659, ''),
('c582b719cfcee817df4186bdeb1eca37', '185.141.34.12', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36', 1620654073, ''),
('c58350926b0f49308def4cb3d46c9eef', '38.122.112.147', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1616265798, ''),
('c59638c5cbabb2f7a19cabc18b1ad5ab', '167.114.185.54', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36 Edge', 1614062268, ''),
('c5c9e83f6338c76bd69e8d51db585baa', '104.155.138.10', 'python-requests/2.25.1', 1622222770, ''),
('c5eb93c70f97b268767ae6783e47f42f', '34.210.5.223', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622783791, ''),
('c600f778733da5b96637506ee1bb7b36', '121.37.133.156', 'Mozilla/5.0 (Windows NT 5.8; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.2678.88 Safari/537.36', 1615488713, ''),
('c611ba92d5c5c484766af4be0b674819', '46.45.185.185', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36', 1620881820, ''),
('c62f7c4c85a04e92481eedd7026bb49f', '40.85.178.11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0 Safari/537.36', 1614370547, ''),
('c63d631e637f733a291b2ff539a02b46', '34.77.162.8', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: sca', 1615879407, ''),
('c67d4a9ec93b7277d169390eac9cf5e6', '76.72.172.165', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 1624962779, ''),
('c67f4736b16daa6f796dd7e77ec897f3', '80.255.7.122', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36', 1614886079, ''),
('c6d2d654cb48bfcb1966fee81e01e87e', '51.210.219.11', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 1623585326, ''),
('c6ec2dd00ea1e1a89472bcc580e9cf30', '5.188.62.214', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2227.1 Safari/537.36', 1619839123, ''),
('c712c831fe836ac701207b42d6fd8687', '34.222.1.208', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622871192, ''),
('c739fd94aa97a33a3476382810cfab4b', '203.89.120.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.182 Safari/537.36', 1613982396, ''),
('c73ff187a6d025cc2d6116aa4bf2ccf1', '54.216.91.210', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624147280, ''),
('c7494f96931b7fa3c3e913b807e2f759', '54.212.243.18', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621835282, ''),
('c7691fc78f79758bf066f3189f12f0eb', '34.216.177.175', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615267593, ''),
('c78653f0003d4a778b371f7c39b79586', '156.146.34.101', 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)', 1614131015, ''),
('c79fe3a8d66e390e5680b19fee7252a3', '34.215.100.215', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624512909, ''),
('c7b9144dd044e0834e7aededbd184492', '138.128.114.111', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 1617708771, ''),
('c7ccb7b97a00a65d10757a49dfa4b5c6', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3230.88 Safari/537.36', 1614125865, ''),
('c7e5a5dddccd5f578852fed8c778a700', '52.205.251.172', 'Go-http-client/1.1', 1621467281, ''),
('c7fe4df4c14c6eb611c5797871e16b5c', '34.86.35.31', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1623458959, ''),
('c873f66b69d0cef415b4ef42383b4ffd', '52.17.237.132', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621373347, ''),
('c8d8ac1c953594fed8ab77e3d624f83c', '52.34.80.68', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620278954, ''),
('c8e5a279edc353b3730d11e84badd311', '52.212.30.97', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620422745, ''),
('c8f55c1555bf76084a877afb7c4c2b5c', '121.5.109.55', 'Mozilla/5.0 (Linux; Android 10; LIO-AN00 Build/HUAWEILIO-AN00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Ch', 1623022963, ''),
('c8f623531bf9cbc32510da7399325f71', '18.144.162.4', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 1624025678, ''),
('c8f9be85c923942427ea798458449456', '34.86.35.20', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1624028363, ''),
('c8fdd21e0c9139b2bc01c7b4f0a53524', '54.69.98.38', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620801032, ''),
('c9084834f123e7153b443b79d4c88a34', '34.219.158.148', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619068651, ''),
('c91eb6f5a123609f66cc773c52008b90', '34.216.229.205', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618895663, ''),
('c924d9976b5487bc0fafde203c2a6f80', '192.210.177.64', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 YaBrowser/18.1.1.839 Yowser/2.', 1620379743, ''),
('c96ba91e748f1015a9bd3ec252d0818c', '54.214.96.32', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618895444, ''),
('c97e346eaa802feaef53163e018acca8', '171.13.14.84', 'Mozilla/5.0 (Linux; Android 8.0; Pixel 2 Build/OPD3.170816.012) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3765.', 1614372090, ''),
('ca0af9c3acb0bc56d40785af6c2b93c1', '124.71.180.89', 'Mozilla/5.0 (Windows NT 5.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3718.88 Safari/537.36', 1614415904, ''),
('ca19546baffcd8145dbb4efcbba14120', '34.217.34.27', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623389312, ''),
('ca33f9990a92203ecaf60b85d0cd2b7b', '54.36.148.68', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1621282031, ''),
('ca65e14c9c89c02083b307fdfbfa7987', '54.184.64.78', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616822604, ''),
('ca90be4e3bc4af3a0698f20a2319a0b3', '124.71.180.89', 'Mozilla/5.0 (Windows NT 9.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.2440.88 Safari/537.36', 1614160771, ''),
('ca95fc3488a0d3871f60bfb60af8d6cf', '23.224.68.74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.3', 1616744697, ''),
('caad92320976df9edec928184a0d8640', '44.234.89.42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', 1614783318, ''),
('cad461133671ec6591b089a800e1b86c', '100.20.59.137', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616562454, ''),
('caf7afc8332a58bea8b759aa332858f8', '158.69.124.97', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36', 1617131017, ''),
('caf7d99c3573c7da9d789b4716e58dcc', '107.191.126.112', 'Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; .NET4.0C; .NET4.0E; .NET CLR 2.0.50727; .NET CLR 3.0.30729; .NET CLR 3', 1614266285, ''),
('cb1eefe3f37c486ff5ca04996598af9d', '54.214.228.2', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618031728, ''),
('cb271575a166abf558cf6a97083e0db0', '39.106.98.188', 'GRequests/0.10', 1617478024, ''),
('cb2ac675c31b453e8f727f3ff35a77dc', '54.189.49.157', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1623392847, ''),
('cb4e7a36cdf3f9e5a116ffdae5ef6437', '54.70.65.70', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621748200, ''),
('cb5715f8f223ef7d288564162feb1ea4', '18.236.169.255', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614411341, '');
INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('cb7e5a44cd20eeccd1751ee207e86d51', '54.148.17.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624308323, ''),
('cb8d15455009bac4e6734f6cdabaa525', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.2642.88 Safari/537.36', 1614156387, ''),
('cb9280ce7cbc528e9973368c2515b68f', '34.254.63.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620405703, ''),
('cb95f3f111d456605ca99cd143d030ea', '54.186.240.216', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1614403433, ''),
('cbe9901acdf6834d770e7a4660b11c5c', '18.203.110.81', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1622497531, ''),
('cc236e977315cb7bb5766329ba2179cc', '176.125.228.12', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 1618369291, ''),
('cc2a286b91890982c841a44a35628c07', '52.36.31.206', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622526006, ''),
('cc3bd807504284c7f7f90ff0d9d91f0d', '35.163.67.49', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619587438, ''),
('cc3dcfcf9653b0f65fb81c7888a1aaac', '35.80.17.152', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616304013, ''),
('cc4662762fd3a9c619398331c0da1c9a', '52.88.14.212', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624771342, ''),
('cc69febd218cf1dd440db9a1f418f3e2', '23.224.68.74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.3', 1615136143, ''),
('cc7b3c4e4cc9996eda794df3a5e3360a', '54.189.122.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620937630, ''),
('ccb5c7d9456209e5efdbccc0f054adaa', '124.71.180.89', 'Mozilla/5.0 (Windows NT 6.7; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.1437.88 Safari/537.36', 1614258985, ''),
('ccb934aa60d997aeefcc1e1424d6e5c5', '34.86.35.6', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1620436695, ''),
('ccd45649946935d0fea4316b263d6a4f', '92.118.160.61', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.c', 1616974980, ''),
('cd0573fc806194e986459d3381bdcafd', '34.254.199.202', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1622670805, ''),
('cd0c478af972eee3ef5186031f8c30d5', '34.215.157.84', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621835322, ''),
('cd41f79452f9a363f56f63c0781af446', '202.134.14.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36', 1614143421, ''),
('cd444b45ca1f8a67d7ed501b41053ed2', '13.58.141.241', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0', 1614186838, ''),
('cd5505e75b883d26760e5a3859b587fb', '52.214.124.200', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621467746, ''),
('cd70c6a290a90d2da0d514f8cc17a244', '54.185.170.115', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624947555, ''),
('cd788093320431276f06a44b151907a6', '198.12.99.107', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:52.0) Gecko/20100101 Firefox/33.0', 1614266285, ''),
('cd88dd704903ba360d9bda0bcc545368', '54.202.224.17', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616562445, ''),
('cd99c7b0111b375421377b4a1724825b', '34.244.136.224', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623966805, ''),
('cd9a8efe39f120ce4dbf4e0bf82504b2', '93.158.90.161', 'Mozilla/5.0 (Linux; Android 8.0.0; SM-G960F Build/R16NW) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.84 Mobi', 1621733833, ''),
('ce15fc1168b244301140cbca1027abf2', '111.7.100.25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614185384, ''),
('ce450a2623ba7918ffaab4eaeb0f05de', '42.236.10.93', 'Mozilla/5.0 (Linux; U; Android 8.1.0; zh-CN; EML-AL00 Build/HUAWEIEML-AL00) AppleWebKit/537.36 (KHTML, like Gecko) Versi', 1614116075, ''),
('ce746a9185194e7afd2369e9d7f0321e', '54.193.79.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36', 1620410176, ''),
('ced465be0682ed7f12ed06c2aad4806b', '34.96.130.26', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1620430851, ''),
('cedb7141c3f8ebbc40ef385674ecc75c', '35.166.214.66', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622956460, ''),
('cf06de9c92de0fc35641ace4bec3e1e8', '34.208.141.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622185204, ''),
('cf11e35a33a538564c3517c3800df9a6', '34.219.155.49', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623736704, ''),
('cf1661e56297ce1bfc4249d240418f69', '44.234.87.169', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618031721, ''),
('cf6e36c34f6f1e788af0b8b0601aa2a9', '54.244.111.205', 'Go-http-client/1.1', 1614062484, ''),
('cf8c82888c4ba8922a27ba99d4b89e23', '54.200.69.190', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621402074, ''),
('cf9917a4f5d75c84dff1e6deef83025e', '54.190.164.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616476497, ''),
('cf9ba3b50b891502fa4caa0da226adfd', '69.25.58.60', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.79 Safari/537.16', 1614148234, ''),
('cf9ff4f22bd0f3d2ef700594bb3c79aa', '82.156.194.105', 'Mozilla/5.0 (Linux; Android 10; LIO-AN00 Build/HUAWEILIO-AN00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Ch', 1623446060, ''),
('cfd2c659c961b7bdb718fab653ca3933', '157.55.39.6', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 1623364123, ''),
('cff7b7a99639e9b88370bf45d2e3e72a', '51.77.246.68', 'Mozilla/5.0 (compatible; Dataprovider.com)', 1616613106, ''),
('cff97b41a9620e828de2eeb6a668ca15', '52.13.67.41', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623530435, ''),
('d000da0542ddafbeb12467dc66f88a9d', '109.70.100.31', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3563.0 Safari/537.36', 1614122649, ''),
('d0290312dfce211eaf8aed3b8fb16feb', '34.217.97.16', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622186253, ''),
('d035d148bc103a08b09313b8371de22e', '66.249.79.158', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1623884378, ''),
('d05bbc853fa86f840e6cc5e4d0fdc5ad', '137.226.113.44', 'Mozilla/5.0 (X11; Linux x86_64; rv:84.0) Gecko/20100101 Firefox/84.0', 1617290355, ''),
('d071879570423d9dd54fcf2ae2768581', '34.219.227.238', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622007340, ''),
('d0a0de9a6e326a795e83ad4f415d9860', '58.53.128.88', 'GRequests/0.10', 1621568860, ''),
('d0bb4f2d81ebd1b43a32330c49d0658b', '52.214.124.200', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621467746, ''),
('d13d2ed96e3f5b8b03d27fc774d9b781', '58.53.128.88', 'GRequests/0.10', 1617849434, ''),
('d1480c6115caa11e16bcfb01f7cbfe8f', '58.53.128.148', 'GRequests/0.10', 1620141230, ''),
('d150118c663b8c7a9aff12af34402589', '138.246.253.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36', 1619839186, ''),
('d194e6d7e014450e7b74295adf235b6a', '54.213.33.139', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1618292588, ''),
('d1a0ed79f2b74d27bf93c2e9b703197d', '34.222.105.53', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624170009, ''),
('d1acd96cb450d234035d85e6a05d458b', '23.224.68.74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.3', 1616744727, ''),
('d1b4f66f77555bb9c492b9bb3b1903d4', '44.242.145.111', 'Go-http-client/1.1', 1614497684, ''),
('d1b6b8177e4f94f10c3fe3491834f89a', '18.237.67.102', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1619556209, ''),
('d1d0ad28f5bbd841162572893f215cc1', '72.79.50.66', 'panscient.com', 1622430020, ''),
('d1f8b0009e57161843867975a067573e', '52.41.64.109', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622008531, ''),
('d207b8b36eebf67552e3dd381458f31c', '34.247.106.187', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621981143, ''),
('d21f22a8b589d784b0948d82eb38a60a', '34.220.242.115', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/68.0.3440.106 Safari/537.36', 1614140137, ''),
('d2206428ff871ccfd1c168a9a02abc12', '38.122.112.147', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1615637300, ''),
('d233bdd63461c8fe7b0fe665194f2285', '52.13.67.41', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623530434, ''),
('d245274ae650d4c544c0c691f198fdb5', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.2581.88 Safari/537.36', 1614270184, ''),
('d247cf83c9158a682b169f844de21e7b', '35.161.43.146', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622186624, ''),
('d24f2b13962d7cb849bf0fc1e0cd0c82', '34.247.106.187', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621981143, ''),
('d28db60a459adfeba46ac81fdab5e171', '52.214.124.200', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621467746, ''),
('d29ca445ae4b895897096718ebf9c1d4', '66.203.112.161', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Safari/537.36', 1614886168, ''),
('d29dbee4536b57b5027d75bc79d21bb7', '54.187.136.160', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621836073, ''),
('d2a08563626a6f40cabcb05e373a2d6e', '54.202.94.83', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622870828, ''),
('d2a8331faec0d8fff8376198fa7433a2', '137.226.113.44', 'Mozilla/5.0 (X11; Linux x86_64; rv:84.0) Gecko/20100101 Firefox/84.0', 1624534031, ''),
('d2e94eb5d3e196ddfca199883d5a3ff9', '62.115.15.146', 'Mozilla/5.0 Firefox/33.0', 1622083929, ''),
('d3170aabe3c461e356f7feaf39e67995', '34.208.111.45', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623820753, ''),
('d31d4ae33e11d37b158cfdd81b183c7b', '44.234.59.34', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619328522, ''),
('d3441684ae83671a5f7e96c1a2e0134b', '18.237.2.183', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616994221, ''),
('d378f926f0ea02fe0a84d252ab401fcf', '44.234.49.16', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_3) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.65 Safari/537.31', 1619390456, ''),
('d39549459a313cdf8efaefa803415ea2', '34.68.217.190', 'python-requests/2.25.1', 1622926489, ''),
('d39782350552b6921aa0afa093b1e26b', '58.53.128.88', 'GRequests/0.10', 1624471014, ''),
('d3a4189408f653fc05c890537b550223', '149.56.150.118', 'Mozilla/5.0 (Linux; Android 5.1.1; SM-G925F Build/LMY47X) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.94 Mob', 1621890367, ''),
('d3c6a2724f7bcc81d68dd1c35143021d', '124.71.180.89', 'Mozilla/5.0 (Windows NT 9.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.1953.88 Safari/537.36', 1614165108, ''),
('d3c733dc9f4c7d3c90edf24313f31df7', '3.121.224.35', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1 Safari/605.1.15', 1615066375, ''),
('d3c7ad138195b7f3654d9331135cefe3', '54.186.174.208', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622374466, ''),
('d43f269b9f9b674ee27314052ee4c6db', '54.71.92.11', '0', 1623063550, ''),
('d4405c5aaa19c0bc59327b1393f67fca', '199.244.88.132', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1616947791, ''),
('d45b79cbac053e062c9a7243f3ea7a29', '124.71.180.89', 'Mozilla/5.0 (Windows NT 6.9; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3223.88 Safari/537.36', 1614121848, ''),
('d4892552f9a56e637eaa7b5af963dc57', '34.208.81.193', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617167264, ''),
('d490dc14cba5ea33e01e006140de7d4b', '52.205.251.172', 'Go-http-client/1.1', 1621467282, ''),
('d4967b75c4da8138e19b5938050ec0a5', '52.13.39.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1614802485, ''),
('d4ab8e7f15d1793abcb01e0dfb1d1447', '185.170.200.141', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3833.90 Safari/537.36', 1614267141, ''),
('d4bbc3a5d6b8c5b567bcabbab44078a8', '38.122.112.147', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1615287856, ''),
('d4d867d94fc0c4559d26c287647cf3b3', '54.36.148.72', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1614196848, ''),
('d500f808e13b98ebb9bcfdfc89465977', '35.165.78.168', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623736309, ''),
('d501c7807a4315fc071340419be4ccfe', '34.83.11.124', 'Mozilla/5.0 (Windows NT 6.4; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2225.0 Safari/537.36', 1614071051, ''),
('d510e9e8046a9a1522796b6b10f50aa8', '54.190.45.58', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622382880, ''),
('d56b34ac5f16a885bd1527e26d604dd0', '54.202.206.157', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622524977, ''),
('d58625fe612edcda0bb8f10e72dc5a1f', '35.80.14.132', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614834781, ''),
('d5adf5665c4c5da122f14a99ff80e6e8', '18.236.84.193', 'Go-http-client/1.1', 1616476528, ''),
('d5d3e02f45df10da48fef119265d7f7c', '121.37.133.156', 'Mozilla/5.0 (Windows NT 7.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.2622.88 Safari/537.36', 1614639705, ''),
('d5e70cdb3a73e35f8927cc3d476843f8', '54.216.91.210', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624147861, ''),
('d5fd4e8b6c80507fb4a20b8de4230a7c', '107.152.140.52', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 YaBrowser/18.1.1.839 Yowser/2.', 1624743328, ''),
('d60ee63581bff98195840f1f2de2ee72', '34.215.230.37', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622525379, ''),
('d636a6a7d652268524dd057ad6aa86d8', '52.208.135.95', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621027489, ''),
('d6570c3e9c8703aafc6d83a250039da0', '36.99.136.139', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614142439, ''),
('d68cef3ccfb33fae80770aedf7123233', '216.19.195.28', 'Mozilla/5.0 (X11; U; SunOS sun4u; en-US; rv:1.9b5) Gecko/2008032620 Firefox/3.0b5', 1617786417, ''),
('d6b06c99d1a85a5a706d86e3aee16100', '206.180.187.25', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 1615325821, ''),
('d6ca27203667fb4311e8e43f247b04dd', '54.202.69.98', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1621660249, ''),
('d72c4b4868f2101eb175dd9ce2d59c20', '95.217.207.28', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1618322430, ''),
('d75f015228df8feb8f861a83e55db7f7', '34.254.63.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620405703, ''),
('d789c3c4ec2710a97dfa5a306bf54ab9', '54.212.157.17', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617858935, ''),
('d7915f8235ab6011c2317fcefdff227c', '54.244.166.191', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622696961, ''),
('d7d431107d2ffccbeca184c2c50f7816', '54.36.149.54', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1621793532, ''),
('d7d6b259054db6eef2eaa4d5e8109a0e', '59.175.144.14', 'GRequests/0.10', 1617049189, ''),
('d7fd2bec2a5d2b6adaf372ff74d5f89e', '52.12.12.81', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620711943, ''),
('d81f700c2a8a87106195ce019350a14e', '191.96.80.226', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.2 Mobile/15', 1614651907, ''),
('d897da8cd20dc6e2cddc0805d27a3d20', '18.237.136.161', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1623484467, ''),
('d9152f5dc587ddba4b97f425ccd74eb5', '54.75.104.183', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1622754674, ''),
('d92821b48aa90b6c24d21492978d9e01', '54.189.230.128', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 1620184042, ''),
('d95eddb9248bf386b76731b29403bced', '54.216.91.210', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624147860, ''),
('d96b2046f8079479e18c8a8bfcba7418', '192.71.3.26', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:15.0) Gecko/20100101 Firefox/15.0.1', 1620983952, ''),
('d9b512e0541c7baaf9653c453cc8be69', '34.211.147.166', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621489365, ''),
('d9b662bee51528c7b31bb96be2f85adb', '54.185.240.86', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1623444943, ''),
('d9c7edbcc2d2990c3b0b03a3f5ee5f48', '54.36.148.46', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1617884811, ''),
('da0672b468f208b1e14debca49d5679c', '34.214.170.41', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624512412, ''),
('da0741af9f721081a82ba722f48f17e1', '18.236.239.242', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623529731, ''),
('da2f8f2e77b1674bffb49e6e0c970f99', '35.230.37.60', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2227.0 Safari/537.36', 1624439935, ''),
('da3830e6b260b285b97cf290558f2161', '18.236.118.0', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617512872, ''),
('da5c9604e57823227f65b31c42b24061', '35.162.125.221', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1623703718, ''),
('da6812fa175d3c4977f17e87379c611f', '121.37.133.156', 'Mozilla/5.0 (Windows NT 8.4; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.1202.88 Safari/537.36', 1616112355, ''),
('da9037d51a88a177948bed2df18e11c6', '34.215.124.113', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623908350, ''),
('da973323f55e06ef2deb80cb147aa22b', '52.32.172.7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615786155, ''),
('dade9f6ae425009f9b52562caf4ac22d', '54.212.135.100', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624686848, ''),
('db25ad09986dd664b0837af2092bd1cd', '121.37.133.156', 'Mozilla/5.0 (Windows NT 8.4; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.2844.88 Safari/537.36', 1615126763, ''),
('db2f3daa2e9c763ce522f35353fee697', '35.164.53.52', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618463402, ''),
('db30dfb18ca50e052808c70b78c5e95a', '124.71.180.89', 'Mozilla/5.0 (Windows NT 7.5; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.2375.88 Safari/537.36', 1614189581, ''),
('db3503563f8a2151aed8532d22e09749', '54.203.73.198', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:82.0) Gecko/20100101 Firefox/82.0', 1621318287, ''),
('db58d342909f8ab9aa9291a59d7d42fa', '54.71.157.246', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1616013153, ''),
('db76155ea7b455efadaa9e6d4aa75ebc', '44.242.144.124', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618290927, ''),
('dbc84de42cc970b6d36569e00bb067db', '34.67.203.99', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 1621125172, ''),
('dbc8a2072b7f9261ee7f4e8a77650dab', '54.203.71.243', 'Go-http-client/1.1', 1615354231, ''),
('dbecfce36f8ee0c7da76da9933f31a7e', '54.189.230.128', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:82.0) Gecko/20100101 Firefox/82.0', 1623703948, ''),
('dc1136ac00cf268fd52a80c5bf858e85', '205.169.39.226', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 1614114370, ''),
('dc113dbe34d68fc890b2c194e768e480', '34.86.35.26', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1618620730, ''),
('dc42a3a01e2a3e3507c9b7ced553d2c8', '54.36.148.68', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1621006392, ''),
('dc5e567b4043c1dca793b57933828d26', '54.244.166.191', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622454659, ''),
('dc65f9d8c7ade17c3e2738020280573e', '34.221.23.183', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623736392, ''),
('dca0f5fef9b254f672e57ae07c8ce2ce', '34.213.2.219', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1622410450, ''),
('dcb916b0ca2c8eca33b82dcab5cd7118', '63.35.164.187', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 1621471528, ''),
('dcbaff5c819d73fa5272fc0c52ec3c0b', '108.62.9.81', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', 1623700556, ''),
('dcc1612d32f0a106aa30470d2ab40a38', '54.212.135.100', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624686848, ''),
('dccd362c073c7f6f54c628fb8a932769', '132.232.75.2', 'Mozilla/5.0 (compatible; ThinkBot/0.3.0; +In_the_test_phase,_if_the_spider_brings_you_trouble,_please_add_our_IP_to_the_', 1623272225, ''),
('dcd38a6d0b494390631bc448db46e0e7', '103.15.216.130', 'GRequests/0.10', 1622552143, ''),
('dd37f13a00578c578e0c6b93607975dc', '35.222.159.156', 'python-requests/2.25.1', 1624230686, ''),
('dd5d10ec99e9c1c4b3a695f3bd224f2b', '44.234.89.42', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 1614838670, ''),
('dd7272636deee9084878573634f3bc01', '44.242.166.244', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617772547, ''),
('dd8447f34b820663ea8e14b487edd6b7', '23.100.232.233', 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0;  Trident/5.0)', 1614272528, ''),
('dd8a167d6ca33d9e7700e8f94a309172', '221.2.155.200', 'Mozilla/5.0', 1614255452, ''),
('ddadb0498ed4ee4839cbddf00677e0ba', '52.36.31.206', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623389503, ''),
('de03ef09cbbcc79d65ee26a2069a9fa4', '92.118.77.10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36', 1620872344, ''),
('de1ba7b2e889a4d89992e3fe94959947', '34.251.61.8', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620336653, ''),
('de4fdd0f396b0f66fd7c6a0f365a74aa', '34.254.157.111', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620250031, ''),
('de506661d7de8aba76eb11c80d560be3', '52.34.80.68', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620278953, ''),
('de6942955517ef13f3acbe7280ea5681', '44.242.136.245', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618636366, ''),
('de7f3b65af35a0e70b81620a8a42d739', '208.80.194.42', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50728)', 1617750228, ''),
('deaba0e18a524000d42d061ec2746c91', '34.216.27.187', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615927071, ''),
('ded251daedbd4dfff0a0df369e4278af', '34.66.12.98', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.67 Safari/537.36', 1621037974, ''),
('dee2ff2985bf5b2add09fd9cc8c9b041', '38.122.112.147', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Safari/537.36', 1624667426, ''),
('dee3841e5778ca6151a369c8037b84bf', '54.36.148.127', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1621270513, ''),
('df5ef492f3513496227f24318dea6194', '34.77.162.22', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1618557793, ''),
('df65696942f1d9b5077efe01360a2cc8', '52.13.19.229', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1618345769, ''),
('dfa153b91784b4fc10b2697a37064e9f', '54.74.253.18', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1622863116, ''),
('dfccfeca95a0a00db75e1cfb2569993f', '35.224.214.188', 'python-requests/2.25.1', 1621873538, ''),
('dfe32703e0237e07d8810c1a7a68ee7f', '34.223.6.141', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623135016, ''),
('e0c3e161d4b0d7dd00dd1193c6aeffd0', '92.118.160.45', 'Go http package', 1624716578, ''),
('e0cc0e617ce1b5fa1492b8daecded688', '34.77.162.22', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: sca', 1615941735, ''),
('e0d4bcc5569451146e736f1426fc929c', '35.167.202.134', 'Go-http-client/1.1', 1614512683, ''),
('e0e8d4b5229da451ca973198cfc0a0f6', '54.212.157.17', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617858935, ''),
('e0fc0587b4434b812f0c46a615851221', '35.163.25.122', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619068093, ''),
('e12ec9599bd6ea238fbcb3c8848225c0', '109.69.66.99', 'webtech/1.2.11', 1614264053, ''),
('e1758f53d655b1c39f5d2521d3a2013a', '34.67.203.99', 'python-requests/2.25.1', 1621125170, ''),
('e18246f5b207dabcee10343b07018544', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3434.88 Safari/537.36', 1614147072, ''),
('e193c32795b13e58c18951aa0151e227', '129.146.40.188', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36', 1618897638, ''),
('e19972db30832948ee1a25152de43152', '34.213.225.63', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1623566177, ''),
('e1b03ee55dc8ba1c8aa19db400fd0d86', '52.31.215.46', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620940233, ''),
('e1d6afdb2e1528b7c7b6ce7e78b9c79b', '54.149.111.49', '0', 1618831967, ''),
('e21f16d0484db98104632efd50871515', '58.53.128.88', 'GRequests/0.10', 1615470277, ''),
('e230eb00869eadb25a6342a25eced412', '124.71.180.89', 'Mozilla/5.0 (Windows NT 9.5; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.1284.88 Safari/537.36', 1614169312, ''),
('e235e9c88686f8c3359e94e7d47e0386', '34.215.157.84', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621835322, ''),
('e241b3d61d77782bb91df1c823cbacb6', '192.3.178.35', 'python-requests/2.23.0', 1614538220, ''),
('e24b4f1484c3abce704f3c6eea060746', '54.202.73.209', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621748303, ''),
('e25f3f3a58568a5e9b7949a38ed4b147', '34.251.147.56', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623877869, ''),
('e2c644020d916eb7b05cc53cc79dd4dc', '34.212.35.185', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623647843, ''),
('e2ffeab3dd0fea37fead2da408753042', '208.80.194.42', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50728)', 1615289862, ''),
('e30ea3147f94e004b1519c31f74f1a3a', '34.221.75.11', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623648039, ''),
('e3226fcf616ff4b1353c8272fb64ce42', '54.245.136.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1621802481, ''),
('e324abe1f3bd5548695b7a5ead6510d6', '52.214.214.78', 'Pandalytics/1.0 (https://domainsbot.com/pandalytics/)', 1614568333, ''),
('e336703709e3a7a166ed7c7b97fe68bf', '34.77.162.17', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: sca', 1615867502, ''),
('e34d32c29011b07318549725e3b27cda', '34.67.255.15', 'python-requests/2.25.1', 1622577490, ''),
('e35492b5329558b664725556d8c30f75', '92.118.160.17', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.c', 1621251619, ''),
('e35757e2bbdfbb7b4ecdc552652825aa', '23.224.68.74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.3', 1617142039, ''),
('e363ca44246e2c1dfc0a37fd9416c1ca', '134.175.228.189', 'Mozilla/5.0 (compatible; ThinkBot/0.3.0; +In_the_test_phase,_if_the_spider_brings_you_trouble,_please_add_our_IP_to_the_', 1623405525, ''),
('e36607aa0c71ebd48ae81742bced9812', '34.86.35.18', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1618305382, ''),
('e370f30281de7c8d8c6515e4c961caa6', '107.150.29.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 1616608250, ''),
('e3719a4f78ccb907087c4eab017d35ac', '121.79.135.146', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 1622513148, ''),
('e3ac2a3de40891fd5104cea5dcd4309e', '35.162.173.93', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1619847879, ''),
('e4147b9209803e82262a5e201aec6346', '93.158.91.209', 'Mozilla/5.0 (iPhone9,4; U; CPU iPhone OS 10_0_1 like Mac OS X) AppleWebKit/602.1.50 (KHTML, like Gecko) Version/10.0 Mob', 1623438932, ''),
('e41ce74e83567592daf0bbe2c33308d3', '198.71.55.250', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:40.0) Gecko/20100101 Firefox/40.0', 1621117611, ''),
('e424f7da1b5da01654ddf4fc8f84d908', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3351.88 Safari/537.36', 1614717487, ''),
('e42a92860fe33b4a5a6ff7840e810869', '54.202.84.16', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618896097, ''),
('e43eaf440b53282583046f72f9a94e0a', '208.80.194.41', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50728)', 1614675915, ''),
('e4d2bea4477a1f21bc8cfa3808d685f4', '124.71.180.89', 'Mozilla/5.0 (Windows NT 10.7; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3651.88 Safari/537.36', 1614357653, ''),
('e4e763dfe8e0db26bb35968b69d71d2e', '121.37.133.156', 'Mozilla/5.0 (Windows NT 8.4; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.2814.88 Safari/537.36', 1615374903, ''),
('e4ec5ff0e9f619c30e69a81eed8e1cc2', '34.96.130.19', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1623795369, ''),
('e517f775b8da1ae2d9827a689528647f', '111.7.100.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614208491, ''),
('e527b7b3ccda50877180ff3779f6cc2c', '121.37.133.156', 'Mozilla/5.0 (Windows NT 6.2; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.2104.88 Safari/537.36', 1614502879, ''),
('e541faf243631cfd84bc02e723d278b9', '44.234.58.138', 'Go-http-client/1.1', 1616994276, ''),
('e54f2e9f083d83f17f847c2c4180950e', '58.53.128.88', 'GRequests/0.10', 1624021185, ''),
('e55a59124c5d5a58cb1cea4a2e58140c', '121.37.133.156', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3707.88 Safari/537.36', 1616395037, ''),
('e58cc713caa64b2a1aec8e64cf7e29ba', '36.99.136.131', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614862683, ''),
('e5b3f30bf5d5e43bc73cbb4341e3b864', '69.25.58.60', 'Mozilla/5.0 (Windows N\\T 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.79 Safari/537.16', 1614138157, ''),
('e5f4e31a14de132afb30899d6e684997', '44.242.145.111', 'Go-http-client/1.1', 1614497603, ''),
('e5f970e05456b1f50178460077044262', '52.27.13.160', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1622959876, ''),
('e607470033e7069c57fec512b02c1901', '34.221.202.176', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1623012132, ''),
('e609c19256e98f78e49f253c33a2c0a1', '54.36.148.20', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1617779097, ''),
('e64404b1cae6e5ac42ab08c9a0ac707d', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.9; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3270.88 Safari/537.36', 1614915145, ''),
('e65980a30236e899f9ce82b2c832bb08', '124.227.31.52', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chr', 1621478276, ''),
('e6aa38e723e37c1d7429e8d46abb9c8b', '34.219.116.6', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616390043, ''),
('e6d2d1b9741b0d359a82a69cdfd3fddb', '38.122.112.147', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623701699, ''),
('e700cf9c4e1ff3f409131e1edddfa864', '23.106.248.251', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 1614575923, ''),
('e70f64f88bf58a2e58ff4c8cee30e132', '34.77.162.13', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1619137318, ''),
('e715ca4fa8236a6949aaa8ddfe8fec75', '44.234.20.66', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617772515, ''),
('e73a518b647562f18154e951fcbb1536', '34.254.199.202', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1622670805, ''),
('e742113d44a201d011de0046cbfce2c9', '54.209.149.228', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 1614112127, ''),
('e747ce716a79e413c80a28ba0400cff6', '54.216.91.210', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624147860, ''),
('e76b9997ab48400caee409d49f26a74d', '51.77.128.212', 'Mozilla/5.0 (compatible; Dataprovider.com)', 1621890686, ''),
('e780eef82ab7580ad39a72628bb8ac77', '54.154.58.175', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623448502, ''),
('e782a14b6018786af7ba3dc0af08243d', '124.71.180.89', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.2907.88 Safari/537.36', 1614142751, ''),
('e78958029e1e80c22e633c9d7e8bebee', '35.163.6.136', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621662718, ''),
('e79d847622eddadb578fefcad3c1ace4', '34.77.162.9', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: sca', 1615577697, ''),
('e7aa0bbc27d96b8f0e4f8e3cc724e175', '54.203.114.255', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624598046, ''),
('e7af7d8db7e775042f8114f6f7c68f26', '35.163.93.220', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620107660, ''),
('e7b436038a33610ed9250960ecbc931b', '54.213.252.206', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1622321085, ''),
('e7d00d3ccc62d7ceae62f3c23cdffa3d', '123.6.49.6', 'Go-http-client/1.1', 1623722487, ''),
('e7d4d8764d0d9591778bd7ab0095798e', '208.80.194.41', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50728)', 1616519069, ''),
('e7d8934ced4845da36fcd2c8fed57e25', '121.37.133.156', 'Mozilla/5.0 (Windows NT 8.9; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3866.88 Safari/537.36', 1614482787, ''),
('e81a280b49ec64de175481c41c9935f4', '3.249.237.202', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620856550, ''),
('e8223bfcc4fa99472616caea3918a8b2', '203.89.120.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36', 1614252599, 'a:12:{s:9:\"user_data\";s:0:\"\";s:7:\"user_id\";s:2:\"11\";s:12:\"login_period\";s:22:\"2021-02-25 17:30:03 pm\";s:4:\"name\";s:11:\"developer24\";s:5:\"email\";s:21:\"developer24@gmail.com\";s:8:\"username\";s:11:\"developer24\";s:6:\"mobile\";s:11:\"01983667651\";s:9:\"privilege\";s:5:\"admin\";s:5:\"image\";s:0:\"\";s:6:\"branch\";s:0:\"\";s:6:\"holder\";s:5:\"admin\";s:8:\"loggedin\";b:1;}'),
('e8469ca206022365a9410ef4366a2f28', '38.122.112.147', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1616265798, ''),
('e85b62d278de8dd586e19e3812448f09', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.1201.88 Safari/537.36', 1614974425, ''),
('e8828853c73e1b748428662f4889ff25', '52.89.28.92', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615439416, ''),
('e8aa7201bdee0d91fb95a16497c1446d', '54.202.55.102', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1616994205, ''),
('e8b2bfc4c208e93d51d688053e554bdb', '23.94.138.18', 'python-requests/2.25.1', 1616800718, ''),
('e8ed33a81c108121465eb923c6055e30', '18.237.250.241', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1618728939, ''),
('e90b56ee8a7d9169ded9b192684ae332', '44.235.91.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615526480, ''),
('e928a1a209842c33058295d765dddf4d', '92.118.160.61', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.c', 1618224502, ''),
('e9532c0d8fb22c4a845587c0627e45ee', '54.36.148.214', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1624605873, ''),
('e989488b3e20dc3135106f114987b84b', '34.96.130.29', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1621030471, ''),
('e9917745ba10c4bb63772d4d68c83f71', '52.13.69.70', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624511537, ''),
('e9d02bf1f2473e6cba8b131f5e36e7e2', '23.224.68.74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.3', 1616744697, ''),
('e9d061c0dc3177ee1e5b6e055fcd5e7a', '34.219.244.35', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623301914, ''),
('e9d7d3a707a1b4f68eca91f1f8dfce71', '181.215.216.244', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.2 Mobile/15', 1614292478, ''),
('e9da31bcfc7ddcceb4f4b147b6865c20', '54.36.148.67', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1619071514, ''),
('e9f6192ab5cf5205d031dfc0ff44f106', '54.184.61.60', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622379929, ''),
('e9fa9862178b62a0cfac017a651cc500', '34.77.162.17', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1618534656, ''),
('ea37f533750b0c028fb1fba6e1bdaec2', '44.242.168.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617426483, ''),
('ea4ee671a73784864ac782065bb11cb8', '192.71.225.127', 'Mozilla/5.0 (iPhone; CPU iPhone OS 12_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.0 Mobile/15E1', 1619391127, ''),
('ea827c8d5dbcf2bb2f0cb03ddc7c79e5', '54.191.130.58', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620075274, ''),
('ea83b49fb830f9d34ab7c5ea720be428', '34.77.162.9', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: sca', 1615626087, ''),
('ea90c67d1f371dbd1a824e0ac7ba0e9e', '18.236.192.235', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1621716104, ''),
('eae2fb3142736b523af9805570f5f6a5', '34.221.201.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1622092383, ''),
('eaed56ca8d10bcc5e520692f815dd086', '178.62.74.6', 'Mozilla/5.0 (Windows NT 6.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.116 Safari/537.36', 1620470675, ''),
('eb203cc324eec76249f8d97abe9167ce', '52.40.28.198', 'Go-http-client/1.1', 1616562460, ''),
('eb3b80fb5db213211101b7d3bfa4abe2', '20.185.68.103', 'python-requests/2.25.1', 1622946542, ''),
('eb63ae624c46482bde3a4190845e15be', '34.212.122.63', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618895258, ''),
('eb6d256bc2f0391f4401dfe9cda1deea', '35.164.153.80', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622697007, ''),
('eba35e8bd3bff0fbd2e7e85b8e657de9', '54.202.48.22', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622696949, ''),
('ebba1ec11662830429deb0a041dc51df', '52.12.189.20', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1615006963, ''),
('ebf43ced267bca59278f1238e0ccb6ca', '40.70.187.176', 'python-requests/2.25.1', 1620788552, ''),
('ec179279795f72c55d3f3a9c58542688', '167.114.185.54', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.83 Safari/537.1', 1614062290, ''),
('ec7bdd1b5510d5ef4768179647c7fd19', '65.154.226.165', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.71 Safari/537.36', 1614121675, ''),
('ec7c173235280fe21b7eea7b30b18f2e', '38.122.112.147', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1615637299, ''),
('ec950f3b554473c2d0eb90985e650261', '34.208.141.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622185204, ''),
('ecd4b2c4735bb2dd1a2dd25714f54d7a', '34.77.162.9', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: sca', 1616489046, ''),
('ed0aa8d9e5e3b987f67f85bb8cf41bbb', '54.148.62.207', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621055489, ''),
('edbb69c36609b797275a9d3ab490c702', '173.249.22.173', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.115 Safari/537.36', 1617829069, ''),
('edd82d7f3724e1076e9e57276cb97318', '13.58.141.241', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0', 1614243496, ''),
('ee00c41d140518ed55d30792eff5682f', '54.71.186.247', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619416033, ''),
('ee46ee21d57e9e5a56ae50c619b0fef7', '52.36.31.206', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622526005, ''),
('ee4d4a7de47b3f8f9f88d40b4b4ea7ec', '34.77.162.11', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1623748120, ''),
('ee7f904c31433ef9d9f69fe80215f3b7', '44.234.51.243', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614062443, ''),
('ee90b8f9d4ba5d71db1d6e6cc5d91fd5', '34.214.27.247', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620419384, ''),
('eea5d03f4d690f3e35075d2a1b971225', '54.191.161.146', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624512881, ''),
('eedb79815a626b8881742c85ca356a51', '208.80.194.41', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50728)', 1618365169, ''),
('eeff064e76533d853fb2a130f21d28bc', '111.7.100.20', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614504382, ''),
('ef159ff6efc721abb0dfcdc7c83bd32f', '34.220.116.212', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622007408, ''),
('ef8cfb22f7ab96e736128649df0a1df1', '221.2.155.200', 'Mozilla/5.0', 1614255425, ''),
('ef9b75c4a0c384ba1e9ac3259eecf3a6', '158.69.64.72', 'python-requests/2.18.4', 1614062626, ''),
('efa3714bbb57b8918cedf9c18f7f7edb', '18.237.170.236', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614662130, ''),
('efb1e55ad7b0d8d58545d0f57af236a6', '54.244.167.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621748225, ''),
('f025f209aa0852cda51969c4696483ad', '34.220.217.190', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620797898, '');
INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('f05e95ab18faac89644a6630817e5b55', '121.37.133.156', 'Mozilla/5.0 (Windows NT 5.8; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.2940.88 Safari/537.36', 1616226443, ''),
('f0652b0353487108582958e9060ea968', '66.249.79.152', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.84 Mob', 1619587048, ''),
('f112ecde9dfa89bbbcddebb4598bbe69', '92.118.160.1', 'Go http package', 1616867595, ''),
('f11a382ac7d403ffbc46c7000a8156e4', '44.242.164.105', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617686126, ''),
('f14f995307b6187838aaf7fdf84b50dc', '121.37.133.156', 'Mozilla/5.0 (Windows NT 8.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.2564.88 Safari/537.36', 1614542805, ''),
('f15f0125defbf458771db187815b5454', '193.200.151.103', 'Mozilla/5.0 (Windows NT 6.0; WOW64; rv:24.0) Gecko/20100101 Firefox/24.0', 1620344694, ''),
('f191a3956f732eb1b84d2c662705f846', '34.222.237.65', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1614834779, ''),
('f1b0faafc67ceb3af3b64576c43d84c3', '34.219.186.20', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619933260, ''),
('f1c70c9913148a37394a0de812407caa', '54.36.148.68', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1623644892, ''),
('f1e538851e5e91d6b7263c2b415aeec6', '34.77.162.17', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: sca', 1615933132, ''),
('f1f47e60a71def1e14a79dff5271594e', '44.230.198.163', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620019615, ''),
('f20158576ed27232f6afaf2bc553b79a', '113.35.251.98', 'curl/7.29.0', 1622952879, ''),
('f21dad801d94db8c1e7df48a3fb9b04f', '54.36.148.160', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1622051796, ''),
('f225dfa9db1d20778c8a7878e0bcfaff', '121.37.133.156', 'Mozilla/5.0 (Windows NT 5.7; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3883.88 Safari/537.36', 1615535002, ''),
('f2366605a9787f22ab255ebe02ce579a', '34.217.64.96', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623044225, ''),
('f2452fda485d1cf667fe9c53aebecf09', '54.218.117.13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1624914014, ''),
('f26cd7bae2fa68e04c84acef64153d79', '3.249.237.202', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620856551, ''),
('f27badcb848d0c701ab8e7b9742dd629', '34.223.94.83', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621055579, ''),
('f2eafd054f332f86fb36c02f85a22901', '54.200.175.218', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621577813, ''),
('f2ecc799fc1750579862e3c1e0bc6ad5', '35.197.31.4', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36', 1624439934, ''),
('f2fb81fb67e5a4eb505efe861bd6553d', '34.219.186.20', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619933260, ''),
('f30efbd8f979929bc65b16c54a296468', '66.249.73.25', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.97 Mob', 1622569755, ''),
('f317acca5ace952bdccf75d131a37703', '35.161.68.114', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624253328, ''),
('f326db6116d9812a0966bcfbe2c1a4eb', '59.175.144.14', 'GRequests/0.10', 1618931807, ''),
('f350a752110f912b53377f4dc20ea190', '124.71.180.89', 'Mozilla/5.0 (Windows NT 7.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.1821.88 Safari/537.36', 1614183923, ''),
('f35251945c001057a64c78a1c0a50402', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3210.88 Safari/537.36', 1615075387, ''),
('f36a1502674385c98a97d7b510ea8348', '54.149.111.49', '0', 1618831968, ''),
('f3afad156851198e7f762206c9b00fa2', '52.33.226.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1617860133, ''),
('f3f505db4acd220a25f6eab6ac7ee5ba', '54.149.222.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1622265311, ''),
('f4134a775aef1726f0e9e75dbe45420b', '34.215.213.164', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624686833, ''),
('f42f0d7e7ced0f3e3f3b54279ceb85f0', '54.187.229.121', '0', 1617623800, ''),
('f4477e7a60d2deae7d9874d07e76ea74', '38.122.112.147', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623701698, ''),
('f4593596526bc224cc1ff3d8c754be74', '34.219.181.160', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1622355908, ''),
('f49df5bf6865cc3c0d517f79e0dc3fbd', '66.249.79.159', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1624856953, ''),
('f4b47833d4f1ea702bd9a9cd83096f2b', '34.222.160.30', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618896875, ''),
('f4b61efccafd3066fd187cdddd80ac55', '34.219.181.101', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1614836197, ''),
('f4cf2cba0423951a8c0e010fc86febed', '35.162.172.220', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623136029, ''),
('f507bb038ea57665d6fe7c0593c95dcf', '46.45.185.185', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36', 1620881819, ''),
('f5083ed6bef5e787bdd44df4da644ae8', '3.122.252.124', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.3', 1622809849, ''),
('f510b37111d5cf92d268bb9acfd5c0c4', '44.228.141.196', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1620797858, ''),
('f53566cee28c47da9c30c08fee22581b', '34.223.94.83', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621055578, ''),
('f5648e0db42ff59762a3eb7087eb3413', '34.83.44.235', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.67 Safari/537.36', 1614071051, ''),
('f5a71b264182c8e0d13277715ea1ed27', '18.216.42.101', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 1615561837, ''),
('f5d26c7ba378daf54511d909f51bb79b', '92.118.160.1', 'Go http package', 1620583709, ''),
('f62c8c942b628b684c3443e58191090b', '61.135.15.146', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chr', 1621750148, ''),
('f6564916bdd4ca4965178db6273e28a7', '3.248.170.229', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1623396100, ''),
('f65e62012a4707dc7db15d326d3456ca', '34.217.23.176', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1622667058, ''),
('f660ee7fd757a8c37ad6a18685c48b22', '137.226.113.44', 'Mozilla/5.0 (X11; Linux x86_64; rv:84.0) Gecko/20100101 Firefox/84.0', 1619698683, ''),
('f6e823fbbf6ad71a83786191d7d6514a', '3.249.61.235', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624569022, ''),
('f6f2409ed93b90d91ffa6918630244b3', '161.97.175.100', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/72.0', 1614140287, ''),
('f7126560e9b9be7371854a36944c8798', '54.216.91.210', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624147860, ''),
('f7155ff9b16472def3463b43512cceca', '38.122.112.147', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1616265797, ''),
('f72775e0dd52bcf8c481d34287c1de44', '52.33.110.172', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1623988081, ''),
('f75d415f88de1ca98360d438908b65f6', '72.79.50.66', 'panscient.com', 1622430024, ''),
('f762668e7d879e88f65492da79f83490', '66.249.93.212', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36 Google Favicon', 1614266972, ''),
('f77ede811f084cb32700bc3fe831412c', '34.217.33.74', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620246898, ''),
('f7ba70aa121ee99955deca25b5f74fab', '54.189.230.128', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:82.0) Gecko/20100101 Firefox/82.0', 1618425137, ''),
('f7bc8e8907146532b4da6748367fe123', '34.222.8.153', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1615875275, ''),
('f8180478316a22be1081a27eadbb19c4', '38.122.112.147', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1619302840, ''),
('f8220d94b00d5f96d9840a0f8fe553cb', '44.242.153.184', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1617858976, ''),
('f89a3128a1e90ba4f5d7f9ef26aecd1a', '144.126.139.249', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', 1624558947, ''),
('f8c568e97243384964fefe4ecd15c14b', '34.221.94.172', '0', 1624288844, ''),
('f8c9b57e37e3521091728db7e239d97a', '121.37.133.156', 'Mozilla/5.0 (Windows NT 6.5; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3883.88 Safari/537.36', 1614900744, ''),
('f8d22ac5f0eafdcd2408412e34d07dd6', '34.86.35.13', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1624637063, ''),
('f8dc0ea20863a8aefb3af77c003cff15', '121.37.133.156', 'Mozilla/5.0 (Windows NT 8.6; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.2564.88 Safari/537.36', 1614542804, ''),
('f8e8551a5f635de8a8f1efb0a85d7fe1', '54.203.73.198', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:82.0) Gecko/20100101 Firefox/82.0', 1621318287, ''),
('f901450b14076ce58b807b8e4373085d', '134.122.8.117', 'Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)', 1622558791, ''),
('f9479e11d94a72f9010f80c4a27023b3', '34.212.49.69', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624858907, ''),
('f952cc640e8b40f373d5d9a1fe9a7260', '194.110.114.122', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:62.0) Gecko/20100101 Firefox/62.0', 1614972764, ''),
('f956cdb41134a1e9326fbeea4ac2c0fe', '35.167.200.207', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1623616838, ''),
('f9793bdd032d6350567f5fc625a541b2', '92.118.160.61', 'Go http package', 1619259062, ''),
('f97bc0067abeb603479df97ed504a2de', '203.89.120.5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 1624965355, 'a:12:{s:9:\"user_data\";s:0:\"\";s:7:\"user_id\";i:1001;s:12:\"login_period\";s:22:\"2021-06-29 17:16:26 pm\";s:4:\"name\";s:16:\"Freelance IT Lab\";s:5:\"email\";s:19:\"mrskuet08@gmail.com\";s:8:\"username\";s:14:\"freelanceitlab\";s:6:\"mobile\";s:11:\"01937476716\";s:9:\"privilege\";s:5:\"super\";s:5:\"image\";s:27:\"private/images/pic-male.png\";s:6:\"branch\";s:10:\"Mymensingh\";s:6:\"holder\";s:5:\"super\";s:8:\"loggedin\";b:1;}'),
('f9ac7d1cd5948d13385396ac68b5839c', '121.37.133.156', 'Mozilla/5.0 (Windows NT 10.7; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3967.88 Safari/537.36', 1616171855, ''),
('f9b044ef1e6c23c63e24a84b7d5156ac', '54.202.224.233', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619329326, ''),
('f9b3561554c7a9f5aab2cc8175c2f431', '121.37.133.156', 'Mozilla/5.0 (Windows NT 9.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3210.88 Safari/537.36', 1615075387, ''),
('f9c5c81217667df31bcd5e9e163266e7', '34.217.14.226', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623043431, ''),
('f9d356bd07ec209445a2a880e4e98586', '54.203.34.232', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1617827045, ''),
('f9e1cfa1e95f235c03ddca96f5e0b4fa', '124.71.180.89', 'Mozilla/5.0 (Windows NT 5.8; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3567.88 Safari/537.36', 1614428239, ''),
('f9f8952d1b39339a3d5cea5626b78dbc', '34.241.22.28', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.3', 1617279086, ''),
('fa2b1c756940e704ee021012ac022d35', '34.213.161.236', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622698140, ''),
('fa366837e618c0dbf290b1ca422b669b', '121.37.133.156', 'Mozilla/5.0 (Windows NT 10.9; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.2192.88 Safari/537.36', 1614885819, ''),
('fa3c75ec916b434673cd0e6d246f16b3', '35.238.13.208', 'python-requests/2.25.1', 1621081663, ''),
('fa4956624e09cb8fa8fdec1f7d54d354', '92.118.160.5', 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.c', 1624247609, ''),
('fa657652e493e42b0d1d25f2ace7b531', '34.212.137.31', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624511536, ''),
('fa79803a417fb2273f965281a1cc2c0a', '66.249.65.97', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1616928367, ''),
('faafc2a643f8b653988fa12b6450e75d', '167.114.185.54', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.83 Safari/537.1', 1614062264, ''),
('fab8f6eae876535aa3753a285b4dc3bc', '18.236.240.50', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 1620192020, ''),
('fabde06f6da1bfba58782c607aa2f79a', '66.249.79.158', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1623814676, ''),
('fb08462b8c3e44b94a1cf90c530ab8c9', '38.122.112.147', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1615287854, ''),
('fb09be4892c3d991ed00d0521573ed63', '54.203.73.198', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:82.0) Gecko/20100101 Firefox/82.0', 1617083049, ''),
('fb18a80697fe17dd08d3218b3ebfa960', '44.234.38.246', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621055116, ''),
('fb2c5de0f33d5b03be9a528e1b07107a', '54.203.3.145', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623215561, ''),
('fb430173a46900cd2687356ea818ff1b', '54.36.148.68', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1619785399, ''),
('fb49efea60a3fb97963b181efa5fc808', '36.99.136.134', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36', 1614198225, ''),
('fb5318b0829e04a2553f9730e2cbdffc', '35.239.243.58', 'python-requests/2.25.1', 1623537553, ''),
('fb77b0aa9583387915844869ce54dc0f', '52.214.124.200', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621467424, ''),
('fbba6a18c043aff263fc1bad8a0c5627', '193.200.151.103', 'Mozilla/5.0 (Windows NT 6.0; WOW64; rv:24.0) Gecko/20100101 Firefox/24.0', 1622260046, ''),
('fbcf1f2c95aac976f03f79965a93e01e', '54.36.148.116', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1618405264, ''),
('fc31dfd62c62914ea3d0f8434104dff2', '121.37.133.156', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.1596.88 Safari/537.36', 1614678975, ''),
('fc57c899545e5a555a1b5c7342d05d00', '199.244.88.132', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 1620650834, ''),
('fc871c3867a00c8eb9474f9c8bc66d71', '35.167.41.56', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1624425766, ''),
('fca7639c19e1b50bf64231572198fff5', '34.219.60.135', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623135997, ''),
('fcad32250abf5c93f91a0a2ba47cda14', '35.163.192.176', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621921435, ''),
('fcbf595a5b6559f38b14c73446207984', '52.214.124.200', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1621467746, ''),
('fcdead206809eaffe55af016b72d8de4', '34.220.116.212', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622007408, ''),
('fce9987894a762f153a9dc938f6c4fcd', '116.58.201.255', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:85.0) Gecko/20100101 Firefox/85.0', 1614481927, 'a:12:{s:9:\"user_data\";s:0:\"\";s:7:\"user_id\";s:2:\"13\";s:12:\"login_period\";s:22:\"2021-02-28 09:12:54 am\";s:4:\"name\";s:23:\"Sherpur United Hospital\";s:5:\"email\";s:17:\"sherpur@gmail.com\";s:8:\"username\";s:16:\"sherpurunited123\";s:6:\"mobile\";s:11:\"01839973101\";s:9:\"privilege\";s:5:\"super\";s:5:\"image\";s:36:\"public/profiles/sherpurunited123.png\";s:6:\"branch\";s:0:\"\";s:6:\"holder\";s:5:\"super\";s:8:\"loggedin\";b:1;}'),
('fcf0b496d26adb26bfe4da4891a1a1cc', '34.254.63.92', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1620405703, ''),
('fcf338c2748fbdebc3d5794207bf7b6a', '58.53.128.88', 'GRequests/0.10', 1623494072, ''),
('fcf6dc07eb9a358bd094395e08c7e8bf', '54.149.240.255', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622454209, ''),
('fd392a5d8cb46fa5b778308bce0b09a3', '34.210.50.167', 'Go-http-client/1.1', 1614062519, ''),
('fd5d286e1316f258df33be6177a2b332', '40.117.185.219', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534.24 (KHTML, like Gecko) Chrome/11.0.696.71 Safari/534.24', 1614402289, ''),
('fd79b4bbf4b28cffb185b0288683d045', '35.164.53.52', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618463403, ''),
('fd8c0aef827dd89d637eeae3e03c609c', '34.211.74.15', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1621057820, ''),
('fd9bc059599a3fedbdc6bb0ab56c323a', '8.2.209.251', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.1.2 Mobile/15', 1621854245, ''),
('fdac5a8ea48e8673755e40d23c591ad0', '95.217.76.161', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.129 Safari/537.36', 1622250327, ''),
('fdae0e65ba408113a00d05411f3bd833', '34.86.35.33', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1622605404, ''),
('fdd1bd5433730b35d60bf6c594391567', '34.238.162.7', 'Mozilla/5.0 (iPhone; CPU iPhone OS 10_3_1 like Mac OS X) AppleWebKit/603.1.30 (KHTML, like Gecko) Version/10.0 Mobile/14', 1614140740, ''),
('fdd285b623bd31eec173d4b60a088707', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.1953.88 Safari/537.36', 1614080060, ''),
('fdf70e2fdb647627a0e77bbf62a0055f', '52.43.242.105', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618031755, ''),
('fe0170531e716b921df01b53028462bd', '185.100.87.250', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.87 Safari/537.36 OPR/5', 1623060088, ''),
('fe4feb49a76af1e6f4a7afcb2ef3acff', '54.155.254.30', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:81.0) Gecko/20100101 Firefox/81.0', 1624485137, ''),
('fe864cc60554e637b89e10ceb52e4639', '34.219.114.46', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619242259, ''),
('fe9554edddb47bb01b5e6a9b83689f5b', '95.211.209.158', 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.2977.51 Safari/537.36', 1614157995, ''),
('feaa283a0bf0dec961d915b852eba930', '34.217.64.96', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623044225, ''),
('feab400a02ce098968d6c8500c42fb13', '121.5.109.55', 'Mozilla/5.0 (Linux; Android 10; LIO-AN00 Build/HUAWEILIO-AN00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Ch', 1623022956, ''),
('feb0800478002ed2ac771a47bd7082e1', '54.191.109.214', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1618896351, ''),
('fec8819ae4ac3d99b22638d9b5794bda', '54.36.149.42', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 1617091072, ''),
('fedd63ac62c3e3fcea198b0d6c5e3ba0', '54.212.62.28', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1619760732, ''),
('fee017675e452762207aaafb0a70bff8', '92.204.170.186', 'Mozilla/5.0 (Windows NT 10.0; ) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.34 Safari/537.36 Edg/83.0.478.25', 1619299360, ''),
('feeabd4159013465ebbbb17e43a007a9', '221.2.155.200', 'Mozilla/5.0', 1614255403, ''),
('fef0877fb82fbad46ec23e311bebf8a7', '34.77.162.8', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customer', 1622002261, ''),
('ff10a648f7e54ec8b6c41b4130a436fe', '34.219.180.109', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1623216011, ''),
('ff1bd6d533bba1774b838f0577d2521d', '219.138.163.116', 'GRequests/0.10', 1616129173, ''),
('ff30810ffa3fb2f508461564cc9ddbc1', '52.36.31.206', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 1622525887, ''),
('ff96945d45bcea7d6dc9740ed6c7e565', '124.71.180.89', 'Mozilla/5.0 (Windows NT 8.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.1780.88 Safari/537.36', 1614086551, ''),
('ffbb49e4833b49b4d8b35bfb98879e5c', '13.59.35.119', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.150 Safari/537.36', 1616924359, '');

-- --------------------------------------------------------

--
-- Table structure for table `sitemeta`
--

CREATE TABLE `sitemeta` (
  `id` int(10) UNSIGNED NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_record`
--

CREATE TABLE `sms_record` (
  `id` int(11) UNSIGNED NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_time` time NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_characters` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_messages` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_report` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pcs',
  `purchase_price` decimal(10,2) NOT NULL,
  `sell_price` decimal(10,2) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `position` int(11) DEFAULT NULL,
  `test_name` varchar(252) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `created_at` date NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `position`, `test_name`, `room`, `fee`, `cost`, `created_at`, `trash`) VALUES
(1, 1, 'PHYSICAL CHARACTER', '0', 0.00, 0.00, '2020-10-19', 1),
(2, 0, 'MICROSCOPIC EXAMINATION', '0', 0.00, 0.00, '2020-10-19', 1),
(3, 0, 'CHEMICAL EXAMINATION', '105', 300.00, 0.00, '2020-11-18', 1),
(4, 0, 'SIRINCE 5ml', '0', 0.00, 0.00, '2020-11-01', 1),
(5, 0, 'EDT TIUB', '0', 0.00, 0.00, '2020-11-01', 1),
(6, 0, 'TSH', '0', 0.00, 0.00, '2020-11-01', 1),
(7, 0, 'T3', '1', 0.00, 0.00, '2020-11-01', 1),
(8, 0, 'FBS', '0', 0.00, 0.00, '2020-11-01', 1),
(9, 0, '2hrs ABF', '0', 0.00, 0.00, '2020-11-01', 1),
(10, 0, 'WIDEL', '0', 0.00, 0.00, '2020-11-01', 1),
(11, 0, 'ASO', '0', 0.00, 0.00, '2020-11-01', 1),
(12, 0, 'CHEST P/A', '12', 0.00, 0.00, '2020-11-01', 1),
(13, 0, 'USG P/P', '13', 0.00, 0.00, '2020-11-01', 1),
(14, 0, 'KBS', '0', 0.00, 0.00, '2020-11-02', 1),
(15, 0, 'Biochemical analysis report', '201', 0.00, 0.00, '2020-11-04', 1),
(16, 0, 'S. Bilirubin', '201', 0.00, 0.00, '2020-11-10', 1),
(17, 0, 'CBS/CP', '201', 350.00, 0.00, '2020-11-18', 1),
(18, 0, 'Platelate Count', '201', 300.00, 0.00, '2020-11-18', 1),
(19, 0, 'T.C.E', '201', 300.00, 0.00, '2020-11-18', 1),
(20, 0, 'M.P Test', '201', 80.00, 0.00, '2020-11-18', 1),
(21, 0, 'B.T.CT', '201', 300.00, 0.00, '2020-11-18', 1),
(22, 0, 'Blood Suger F/R/2hr', '201', 100.00, 0.00, '2020-11-18', 1),
(23, 0, 'TC', '201', 150.00, 0.00, '2020-11-18', 1),
(24, 0, 'DC', '201', 150.00, 0.00, '2020-11-18', 1),
(25, 0, 'Blood Urea', '201', 500.00, 0.00, '2020-11-18', 1),
(26, 0, 'S. Creatinic', '201', 500.00, 0.00, '2020-11-18', 1),
(27, 0, 'S. Cholesterol', '201', 500.00, 0.00, '2020-11-18', 1),
(28, 0, 'S.G.O.T', '201', 500.00, 0.00, '2020-11-18', 1),
(29, 0, 'S.G.P.T.', '201', 500.00, 0.00, '2020-11-18', 1),
(30, 0, 'A.S.O. Titre', '201', 400.00, 0.00, '2020-11-18', 1),
(31, 0, 'R.A Test', '201', 400.00, 0.00, '2020-11-18', 1),
(32, 0, 'Widal Test', '201', 300.00, 0.00, '2020-11-18', 1),
(33, 0, 'T.P.H.A', '201', 450.00, 0.00, '2020-11-18', 1),
(34, 0, 'HBsAg (Screening)', '201', 450.00, 0.00, '2020-11-18', 1),
(35, 0, 'HIV', '201', 500.00, 0.00, '2020-11-18', 1),
(36, 0, 'Blood Group', '201', 100.00, 0.00, '2020-11-18', 1),
(37, 0, 'V.D.R.L', '201', 350.00, 0.00, '2020-11-18', 1),
(38, 0, 'ICT For Malaria', '201', 350.00, 0.00, '2020-11-18', 1),
(39, 0, 'ICT For Kala-Azar', '201', 500.00, 0.00, '2020-11-18', 1),
(40, 0, 'ICT For T.B', '201', 500.00, 0.00, '2020-11-18', 1),
(41, 0, 'Lipid Prodile', '201', 1000.00, 0.00, '2020-11-18', 1),
(42, 0, 'ESR', '201', 150.00, 0.00, '2020-11-18', 1),
(43, 0, 'HB%', '201', 150.00, 0.00, '2020-11-18', 1),
(44, 0, 'CRP (Latest)', '201', 400.00, 0.00, '2020-11-18', 1),
(45, 0, 'Syphilis AB (ICT)', '201', 500.00, 0.00, '2020-11-18', 1),
(46, 0, 'OGTT (3 Sample)', '201', 300.00, 0.00, '2020-11-18', 1),
(47, 0, 'Sputum AFB', '201', 400.00, 0.00, '2020-11-18', 1),
(48, 0, 'S. Uric Acid', '201', 450.00, 0.00, '2020-11-18', 1),
(49, 0, 'S. Calcium', '201', 500.00, 0.00, '2020-11-18', 1),
(50, 0, 'Urine For R/E', '201', 150.00, 0.00, '2020-11-18', 1),
(51, 0, 'Urine For PT', '201', 100.00, 0.00, '2020-11-18', 1),
(52, 0, 'Stool For R/E', '201', 220.00, 0.00, '2020-11-18', 1),
(53, 0, 'Semen Anaiysis', '201', 500.00, 0.00, '2020-11-18', 1),
(54, 0, 'P/S For G/S and R/E', '201', 500.00, 0.00, '2020-11-18', 1),
(55, 0, 'Skin ? Mail Scraping', '201', 250.00, 0.00, '2020-11-18', 1),
(56, 0, 'MT', '201', 350.00, 0.00, '2020-11-18', 1),
(57, 0, 'Whole Abdomen', '201', 600.00, 0.00, '2020-11-18', 1),
(58, 0, 'Lower Abdomen', '201', 550.00, 0.00, '2020-11-18', 1),
(59, 0, 'Pregnancy Profile', '201', 550.00, 0.00, '2020-11-18', 1),
(60, 0, 'Uterus and Adnexa', '201', 550.00, 0.00, '2020-11-18', 1),
(61, 0, 'U.S.G Color', '201', 750.00, 0.00, '2020-11-18', 1),
(62, 0, 'E.C.G', '201', 300.00, 0.00, '2020-11-18', 1),
(63, 0, 'E.C.G/With Report', '201', 350.00, 0.00, '2020-11-18', 1),
(64, 0, 'X-Ray', '201', 300.00, 0.00, '2020-11-18', 1),
(65, 0, 'Digital X-Ray', '201', 450.00, 0.00, '2020-11-18', 1),
(66, 0, 'X-Ray-Report', '201', 100.00, 0.00, '2020-11-18', 1),
(67, 0, 'Dental X -Ray', '201', 200.00, 0.00, '2020-11-18', 1),
(68, 0, 'ESR', '113', 100.00, 0.00, '2020-11-18', 1),
(69, 0, 'Hemoglobin (Hb%)', '113', 100.00, 0.00, '2020-11-18', 1),
(70, 0, 'Total Count (WBC)', '113', 100.00, 0.00, '2020-11-18', 1),
(71, 0, 'Differential Count', '113', 100.00, 0.00, '2020-11-18', 1),
(72, 6, 'ESR', '00', 0.00, 0.00, '2020-11-25', 0),
(73, 7, 'Hemoglobin (Hb%)', '113', 100.00, 0.00, '2020-11-29', 0),
(74, 8, 'Total Count  (WBC)', '00', 100.00, 0.00, '2020-12-06', 0),
(75, 9, 'Differential Count', '00', 200.00, 0.00, '2020-11-28', 0),
(76, 24, 'S.G.P.T  (AST)', '113', 400.00, 0.00, '2020-11-29', 0),
(77, 20, 'S. Bilirubin (Total)', '113', 300.00, 0.00, '2020-11-29', 0),
(78, 22, 'S.  Creatinine', '113', 400.00, 0.00, '2021-01-10', 0),
(79, 25, 'Skin Scraping for Fungus', '111', 200.00, 0.00, '2020-11-29', 0),
(80, 10, 'Fasting Blood Sugar (FBS)', '00', 100.00, 0.00, '2020-12-07', 0),
(81, 3, 'Blood Sugar (2 Hours After Breakfast)', '113', 100.00, 0.00, '2020-12-09', 0),
(82, 18, 'Random Blood Sugar (RBS)', '113', 100.00, 0.00, '2021-01-17', 0),
(83, 21, 'S. Cholesterol', '00', 0.00, 0.00, '2020-11-25', 1),
(84, 23, 'S. Triglycerides', '00', 0.00, 0.00, '2020-11-25', 1),
(85, 11, 'H.D.L', '00', 0.00, 0.00, '2020-11-25', 1),
(86, 13, 'L.D.L', '00', 0.00, 0.00, '2020-11-25', 1),
(87, 27, 'VDRL', '113', 400.00, 0.00, '2020-11-29', 0),
(88, 26, 'TPHA', '113', 400.00, 0.00, '2020-11-29', 0),
(89, 17, 'Pregnancy Test', '111', 100.00, 0.00, '2020-12-09', 0),
(90, 14, 'Malaria Parasite (MP)', '113', 50.00, 0.00, '2020-11-29', 0),
(91, 28, 'Widal Test', '113', 300.00, 0.00, '2020-11-29', 0),
(92, 16, 'Physical Examination', '00', 100.00, 0.00, '2020-12-07', 0),
(93, 4, 'Chemical Examination', '00', 100.00, 0.00, '2020-12-07', 0),
(94, 15, 'Microscopic Examination', '00', 100.00, 0.00, '2020-12-07', 0),
(95, 5, 'Crystal', '00', 0.00, 0.00, '2020-11-25', 0),
(96, 2, 'Blood Group (ABO) System', '00', 100.00, 0.00, '2020-12-07', 0),
(97, 19, 'Rh Factor', '00', 0.00, 0.00, '2020-11-25', 0),
(98, 12, 'HBsAG (ICT Method)', '00', 400.00, 0.00, '2020-12-06', 0),
(99, 0, 'Xray', '115', 300.00, 0.00, '2021-01-17', 0),
(100, 1, 'P/P', '111', 600.00, 0.00, '2020-11-28', 0),
(101, NULL, 'CBC', '113', 400.00, 100.00, '2020-11-29', 0),
(102, NULL, 'Lipid Profile', '113', 1000.00, 0.00, '2020-11-29', 0),
(103, NULL, 'Serum Uric Acid', '113', 450.00, 0.00, '2020-11-29', 0),
(104, NULL, 'S. Cholesterol', '113', 500.00, 0.00, '2020-11-29', 0),
(105, NULL, 'Platelet Count', '113', 300.00, 0.00, '2020-11-29', 0),
(106, NULL, 'C Reactive Protein (CRP)', '113', 400.00, 0.00, '2020-11-29', 0),
(107, NULL, 'ESR (Westerngreen Method)', '113', 100.00, 0.00, '2020-11-29', 0),
(108, NULL, 'Total Circulating Eiosinophil Count (TCE)', '113', 200.00, 0.00, '2020-12-06', 0),
(109, NULL, 'ECG', '101', 250.00, 0.00, '2020-12-06', 0),
(110, NULL, 'W/A', '111', 600.00, 0.00, '2020-12-06', 0),
(111, NULL, 'Blood Examination', '113', 300.00, 0.00, '2020-12-09', 0),
(112, NULL, 'RA', '113', 400.00, 0.00, '2020-12-09', 0),
(113, NULL, 'ASO Titre', '113', 400.00, 0.00, '2020-12-09', 0),
(114, NULL, 'Xray L/S B/V', '115', 600.00, 0.00, '2020-12-23', 0),
(115, NULL, 'Xray Rt Wrist Joint', '115', 300.00, 0.00, '2021-01-17', 0),
(116, NULL, 'Xray Lt Wrist Joint', '115', 300.00, 0.00, '2021-01-17', 0),
(117, NULL, 'Xray Skull', '115', 300.00, 0.00, '2020-12-23', 0),
(118, NULL, 'Xray Rt Knee', '115', 300.00, 0.00, '2021-01-17', 0),
(119, NULL, 'Xray Lt Knee', '115', 300.00, 0.00, '2021-01-17', 0),
(120, NULL, 'XRay Rt Shoulder', '115', 300.00, 0.00, '2020-12-23', 0),
(121, NULL, 'XRay Lt Shoulder', '115', 300.00, 0.00, '2020-12-23', 0),
(122, NULL, 'XRay Chest P/A', '115', 300.00, 0.00, '2020-12-23', 0),
(123, NULL, 'XRay Rt Leg', '115', 300.00, 0.00, '2020-12-23', 0),
(124, NULL, 'XRay Lt Leg', '115', 300.00, 0.00, '2020-12-23', 0),
(125, NULL, 'XRay PNS', '115', 300.00, 0.00, '2020-12-24', 0),
(126, NULL, 'XRay Neack', '115', 300.00, 0.00, '2020-12-24', 0),
(127, NULL, 'XRay Neack', '115', 300.00, 0.00, '2020-12-24', 0),
(128, NULL, 'XRay Rt Albow', '115', 300.00, 0.00, '2020-12-31', 0),
(129, NULL, 'XRay Rt Albow', '115', 300.00, 0.00, '2020-12-31', 0),
(130, NULL, 'XRay Lt Albow', '115', 300.00, 0.00, '2020-12-31', 0),
(131, NULL, 'XRay Rt Foot', '115', 300.00, 0.00, '2020-12-31', 0),
(132, NULL, 'XRay Lt Foot', '115', 300.00, 0.00, '2020-12-31', 0),
(133, NULL, 'USG of Kub', '111', 600.00, 0.00, '2020-12-31', 0),
(134, NULL, 'USG of L/A', '111', 600.00, 0.00, '2020-12-31', 0),
(135, NULL, 'USG of Uterus Adnexae', '111', 600.00, 0.00, '2020-12-31', 0),
(136, NULL, 'USG of Uterus Adnexae', '111', 600.00, 0.00, '2020-12-31', 0),
(137, NULL, 'Semen Analysis', '113', 600.00, 0.00, '2021-01-01', 0),
(138, NULL, 'FNAC', '113', 1200.00, 0.00, '2021-01-01', 0),
(139, NULL, 'PBF', '113', 200.00, 0.00, '2021-01-01', 0),
(140, NULL, 'Blood', '113', 1500.00, 0.00, '2021-01-17', 0),
(141, NULL, 'Medicine', '113', 200.00, 0.00, '2021-01-17', 0),
(142, NULL, 'XRay Pealvis', '115', 300.00, 0.00, '2021-01-07', 0),
(143, NULL, 'XRay Rt Hip Joint', '115', 300.00, 0.00, '2021-01-12', 0),
(144, NULL, 'XRay Lt Hip Joint', '115', 300.00, 0.00, '2021-01-12', 0),
(145, NULL, 'XRay L/s Letaral View', '115', 300.00, 0.00, '2021-01-12', 0),
(146, NULL, 'Urine Examination Report', '113', 100.00, 0.00, '2021-01-17', 0),
(147, NULL, 'Urine Examination Report-1', '113', 100.00, 0.00, '2021-01-17', 1),
(148, NULL, 'P/S', '113', 600.00, 0.00, '2021-01-29', 0),
(149, NULL, 'S.TSH', '113', 1200.00, 0.00, '2021-02-04', 0),
(150, NULL, 'Anti H Pylori', '113', 1200.00, 0.00, '2021-02-12', 0),
(151, NULL, 'BTCT', '113', 200.00, 0.00, '2021-02-12', 0),
(152, NULL, 'XRay Rt Ankle B/u', '115', 300.00, 0.00, '2021-02-18', 0),
(153, NULL, 'XRay Lt Ankle B/u', '115', 300.00, 0.00, '2021-02-18', 0),
(154, NULL, 'XRay Rt Hand', '115', 300.00, 0.00, '2021-02-19', 0),
(155, NULL, 'XRay Lt Hand', '115', 300.00, 0.00, '2021-02-19', 0),
(156, NULL, 'CBC 2', '104', 500.00, 400.00, '2021-02-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test_group`
--

CREATE TABLE `test_group` (
  `id` int(11) NOT NULL,
  `position` int(11) DEFAULT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `remarks` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `trash` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_group`
--

INSERT INTO `test_group` (`id`, `position`, `group_name`, `price`, `remarks`, `created_at`, `trash`) VALUES
(6, NULL, 'Others', 0.00, '', '2020-10-19', 1),
(11, NULL, 'BIOCHEMICAL EXAM', 0.00, 'Remarks', '2020-10-19', 1),
(12, NULL, 'IMMUNOLOGY/SEROLOGY', 0.00, '', '2020-10-19', 1),
(13, NULL, 'ELISA METHOD', 0.00, '', '2020-10-19', 1),
(14, NULL, 'ELECTROLYTES', 0.00, '', '2020-10-19', 1),
(15, NULL, 'COLOUR DROPLER', 0.00, '', '2020-10-19', 1),
(16, NULL, 'STOOL  EXAMINATION REPORT', 0.00, '', '2020-10-19', 1),
(18, NULL, 'URINE EXAMINATION REPORT', 0.00, '', '2020-10-22', 1),
(19, NULL, 'Liquid biopsy', 0.00, '', '2020-10-29', 1),
(20, NULL, 'Sputum', 0.00, '', '2020-10-29', 1),
(23, NULL, 'CBC', 400.00, '', '2020-11-01', 1),
(24, NULL, 'IMONOLOGY', 0.00, '', '2020-11-01', 1),
(27, NULL, 'x-RAY', 0.00, '', '2020-11-01', 1),
(28, NULL, 'ULTRASOUND', 0.00, '', '2020-11-01', 1),
(34, NULL, 'ULTRASONGRAM', 0.00, '', '2020-11-18', 1),
(35, 39, 'Complete Blood Count', 400.00, '', '2020-11-25', 0),
(36, 40, 'Biochemical Examination', 0.00, '', '2020-11-25', 0),
(37, 41, 'Skin Examination Report', 0.00, '', '2020-11-25', 0),
(38, 42, 'Lipid Profile', 0.00, '', '2020-11-25', 0),
(39, 43, 'Serological Examination', 0.00, '', '2020-11-25', 0),
(40, 44, 'Blood Examinaion Report', 0.00, '', '2020-11-25', 0),
(41, 45, 'Microscopic Examination', 0.00, '', '2020-11-25', 0),
(42, 46, 'Urine Examination Report', 0.00, '', '2020-11-25', 0),
(43, 0, 'Xray L/s b/v', 600.00, '', '2020-11-28', 0),
(44, 1, 'USG', 600.00, '', '2020-11-28', 0),
(45, 2, 'CBC Report', 500.00, '', '2020-11-29', 0),
(46, 3, 'ECG', 250.00, '0', '2020-12-06', 0),
(47, 4, 'W/A', 600.00, '0', '2020-12-06', 0),
(48, 5, 'Xray L/s Lateral Veiw', 300.00, '', '2020-12-23', 0),
(49, 6, 'Xray Rt Wrist Joint', 300.00, '', '2020-12-23', 0),
(50, 7, 'Xray Lt Wrist Joint', 300.00, '', '2020-12-23', 0),
(51, 8, 'Xray Skull', 300.00, '', '2020-12-23', 0),
(52, 9, 'Xray Soft Tissu', 300.00, '', '2020-12-23', 0),
(53, 10, 'Xray Rt Knee', 300.00, '', '2020-12-23', 0),
(54, 11, 'Xray Lt Knee', 300.00, '', '2020-12-23', 0),
(55, 12, 'Xray Rt Sholder', 300.00, '', '2020-12-23', 0),
(56, 13, 'XRay Lt Sholder', 300.00, '', '2020-12-23', 0),
(57, 14, 'Xray Rt Leg', 300.00, '', '2020-12-23', 0),
(58, 15, 'Xray Lt Leg', 300.00, '', '2020-12-23', 0),
(59, NULL, 'Xray Lt Leg', 300.00, '', '2020-12-23', 1),
(60, 16, 'XRay Chest P/A', 300.00, '', '2020-12-23', 0),
(61, 17, 'XRay PNS', 300.00, '0', '2020-12-24', 0),
(62, 18, 'XRay Neack', 300.00, '0', '2020-12-24', 0),
(63, 19, 'XRay Rt Albow', 300.00, '0', '2020-12-31', 0),
(64, 20, 'Xray Rt elbow', 300.00, '0', '2020-12-31', 0),
(65, 21, 'XRay Rt Albow', 300.00, '0', '2020-12-31', 0),
(66, 22, 'XRay Rt Albow', 300.00, '0', '2020-12-31', 0),
(67, 23, 'XRay Rt Albow', 300.00, '0', '2020-12-31', 0),
(68, 24, 'XRay Lt Albow', 300.00, '0', '2020-12-31', 0),
(69, 25, 'XRay Lt Albow', 300.00, '0', '2020-12-31', 0),
(70, 26, 'XRay Lt Albow', 300.00, '0', '2020-12-31', 0),
(71, 27, 'XRay Rt Foot', 300.00, '0', '2020-12-31', 0),
(72, 28, 'XRay Lt Foot', 300.00, '0', '2020-12-31', 0),
(73, 29, 'XRay Lt Foot', 300.00, '0', '2020-12-31', 1),
(74, 30, 'USG Of Kub', 600.00, '0', '2020-12-31', 0),
(75, 31, 'USG of L/A', 600.00, '0', '2020-12-31', 0),
(76, 32, 'USG of Uterus Adnexae', 600.00, '0', '2020-12-31', 0),
(77, 33, 'USG of Uterus Adnexae', 600.00, '0', '2020-12-31', 0),
(78, 34, 'Semen Analysis', 600.00, '0', '2021-01-01', 0),
(79, 36, 'FNAC', 1200.00, '0', '2021-01-01', 0),
(80, 35, 'PBF', 0.00, '', '2021-01-01', 0),
(81, 37, 'Blood', 1500.00, '0', '2021-01-03', 0),
(82, 38, 'Medicine', 200.00, '0', '2021-01-03', 0),
(83, NULL, 'XRay Rt Hip Joint', 300.00, '0', '2021-01-12', 0),
(84, NULL, 'XRay Lt Hip Joint', 300.00, '0', '2021-01-12', 0),
(85, NULL, 'Xray L/s Lateral Veiw', 300.00, '0', '2021-01-12', 0),
(86, NULL, 'P/S', 600.00, '0', '2021-01-29', 0),
(87, NULL, 'P/S', 600.00, '0', '2021-01-29', 0),
(88, NULL, 'S.TSH', 1200.00, '0', '2021-02-04', 0),
(89, NULL, 'Anti H Pylori', 1200.00, '0', '2021-02-12', 0),
(90, NULL, 'BTCT', 200.00, '0', '2021-02-12', 0),
(91, NULL, 'XRay Rt Ankle B/U', 300.00, '0', '2021-02-18', 0),
(92, NULL, 'XRay Lt Ankle B/U', 300.00, '0', '2021-02-18', 0),
(93, NULL, 'XRay Rt Hand', 300.00, '0', '2021-02-19', 0),
(94, NULL, 'XRay Lt Hand', 300.00, '', '2021-02-19', 0),
(95, NULL, 'Biocamical', 0.00, '', '2021-02-25', 0),
(96, NULL, 'CBC', 0.00, '', '2021-02-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test_histories`
--

CREATE TABLE `test_histories` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `procedure_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_voucher` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `standerd` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `report` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_mapping`
--

CREATE TABLE `test_mapping` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `parameter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_mapping`
--

INSERT INTO `test_mapping` (`id`, `test_id`, `parameter_id`) VALUES
(1, 9, 30),
(2, 9, 29),
(3, 3, 1),
(4, 3, 3),
(5, 3, 4),
(6, 3, 5),
(7, 25, 70),
(8, 25, 9),
(9, 25, 44),
(10, 71, 75),
(11, 71, 74),
(12, 71, 72),
(13, 71, 73),
(14, 71, 71),
(15, 68, 76),
(16, 69, 77),
(17, 70, 78),
(19, 73, 80),
(20, 74, 81),
(21, 75, 86),
(22, 75, 85),
(23, 75, 83),
(24, 75, 84),
(25, 75, 82),
(26, 76, 87),
(27, 77, 88),
(28, 78, 89),
(29, 79, 90),
(30, 80, 91),
(31, 81, 92),
(32, 83, 94),
(33, 84, 95),
(34, 85, 96),
(35, 86, 97),
(36, 87, 98),
(37, 88, 99),
(38, 89, 100),
(39, 90, 101),
(40, 91, 104),
(41, 91, 105),
(42, 91, 103),
(43, 91, 102),
(44, 92, 108),
(45, 92, 107),
(46, 92, 106),
(47, 92, 109),
(48, 93, 110),
(49, 93, 113),
(50, 93, 127),
(51, 93, 112),
(52, 94, 115),
(53, 94, 114),
(54, 94, 116),
(55, 94, 118),
(56, 94, 117),
(57, 95, 121),
(58, 95, 120),
(59, 95, 123),
(60, 95, 119),
(61, 95, 122),
(62, 96, 124),
(63, 97, 125),
(64, 98, 126),
(65, 82, 93),
(66, 99, 130),
(67, 100, 131),
(76, 72, 132),
(77, 102, 94),
(78, 102, 95),
(79, 102, 96),
(80, 102, 97),
(81, 103, 133),
(82, 104, 94),
(83, 105, 134),
(84, 106, 135),
(85, 107, 136),
(86, 108, 137),
(87, 111, 140),
(88, 111, 141),
(89, 112, 143),
(90, 113, 142),
(91, 137, 185),
(92, 138, 186),
(93, 139, 187),
(94, 140, 188),
(95, 141, 189),
(147, 146, 199),
(148, 146, 197),
(149, 146, 106),
(150, 146, 107),
(151, 146, 108),
(152, 146, 109),
(153, 146, 198),
(154, 146, 110),
(155, 146, 112),
(156, 146, 113),
(157, 146, 114),
(158, 146, 115),
(159, 146, 116),
(160, 146, 117),
(161, 146, 118),
(162, 146, 127),
(163, 146, 201),
(164, 146, 119),
(165, 146, 120),
(166, 146, 121),
(167, 146, 122),
(168, 146, 123),
(169, 156, 212),
(170, 156, 213),
(171, 156, 214),
(172, 156, 132),
(173, 101, 80),
(174, 101, 81),
(175, 101, 195),
(176, 101, 82),
(177, 101, 83),
(178, 101, 84),
(179, 101, 85),
(180, 101, 86),
(181, 101, 134),
(182, 101, 136);

-- --------------------------------------------------------

--
-- Table structure for table `test_name`
--

CREATE TABLE `test_name` (
  `id` int(10) NOT NULL,
  `group_name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_name`
--

INSERT INTO `test_name` (`id`, `group_name`, `test_name`) VALUES
(16, 'BIOCHEMICAL_EXAMI', 'A/G_Ration'),
(18, 'BIOCHEMICAL_EXAMI', 'S._Phosphorus_(Inorganic)'),
(20, 'BIOCHEMICAL_EXAMI', 'CK-(Total)'),
(22, 'BIOCHEMICAL_EXAMI', 'S._Lipase'),
(23, 'BIOCHEMICAL_EXAMI', 'S._Lactate_dehydrogenase_(LDH)_Total'),
(24, 'BIOCHEMICAL_EXAMI', 'S._Acid_Phosphatase_(Total)'),
(29, 'BIOCHEMICAL_EXAMI', 'S._Triglyceride'),
(30, 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'Heamoglobin_(HB)'),
(34, 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'HBs Ag (Screening Test)'),
(35, 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'HIV_(Screening_Test)'),
(36, 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'VDRL_(Screening_Test)'),
(37, 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'TPHA'),
(38, 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'Blood_Group_System'),
(39, 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'Blood_AB_O'),
(40, 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'Group_Rh(D)_Factor'),
(41, 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'At_(Kala-Azar)'),
(49, 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'CRP_(Serology_Test)'),
(75, 'URINE_EXAMINATION_REPORT', 'ALBUMIN'),
(76, 'URINE_EXAMINATION_REPORT', 'SUGAR'),
(78, 'URINE_EXAMINATION_REPORT', 'BILE_PIGMENT'),
(84, 'URINE_EXAMINATION_REPORT', 'CALCIUM_OXALATE'),
(85, 'URINE_EXAMINATION_REPORT', 'URIC_ACID/URATE'),
(88, 'URINE_EXAMINATION_REPORT', 'AMOR_PHOSPHATE'),
(90, 'URINE_EXAMINATION_REPORT', 'HAEMOGLOBIN_(HB)'),
(102, 'BIOCHEMICAL_EXAMI', 'SUGAR_(EACH_TEST)'),
(103, 'BIOCHEMICAL_EXAM', 'G._T.T_(EACH_TEST)_UP_TO_3_SEMPLE'),
(105, 'BIOCHEMICAL_EXAM', 'S.G.O.T'),
(106, 'BIOCHEMICAL_EXAM', 'SERUM_ALK.PHOS'),
(107, 'BIOCHEMICAL_EXAM', 'SERUM_ALBUMIN'),
(108, 'BIOCHEMICAL_EXAM', 'SERUM_GLOBULIN'),
(109, 'BIOCHEMICAL_EXAM', 'SERUM_A.G.RATIO'),
(110, 'BIOCHEMICAL_EXAM', 'SERUM_AMYLASE'),
(111, 'BIOCHEMICAL_EXAM', 'SERUM_BILIRUBIN'),
(112, 'BIOCHEMICAL_EXAM', 'SERUM_CREATININE'),
(113, 'BIOCHEMICAL_EXAM', 'CHOLESTEROL'),
(114, 'BIOCHEMICAL_EXAM', 'SERUM_CALCIUM'),
(118, 'BIOCHEMICAL_EXAM', 'LIPID_PROFILE'),
(122, 'ABC', 'Blood_Test'),
(123, 'Blood', 'Blood_Test'),
(124, 'Blood', 'Rbs'),
(125, 'BIOCAMISTRI', 'FBS'),
(126, 'BIOCAMISTRI', '2hrs_ABF'),
(127, 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'WIDEL'),
(128, 'SEROLOGICAL_&_BLOOD_EXAMINATION REPORT', 'ASO'),
(129, 'IMONOLOGY', 'TSH'),
(130, 'IMONOLOGY', 'T3'),
(131, 'OTHERS', 'SIRINCE_5ml'),
(132, 'OTHERS', 'EDT_TIUB');

-- --------------------------------------------------------

--
-- Table structure for table `theme_setting`
--

CREATE TABLE `theme_setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_pattern` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_background` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_map` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `header` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_icon` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_icon` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signature` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theme_setting`
--

INSERT INTO `theme_setting` (`id`, `theme_color`, `background_pattern`, `login_background`, `google_map`, `footer`, `header`, `logo`, `menu_icon`, `social_icon`, `language`, `signature`) VALUES
(1, '#00695c', 'public/img/background459623386.png', 'private/images/background24018.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3091.148925420826!2d89.51161527507686!3d22.87585642054873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff9a4b7a54139f%3A0x1a72740d1989f91c!2sHorticulture+Centre%2C+Doulatpur%2C+Khulna!5e0!3m2!1sen!2s!4v1488304602841\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '{\"l_footer_text\":\"\",\"addr_moblile\":\"+8801718926673\",\"addr_email\":\"contact@info.com\",\"addr_address\":\"Old Dhaka Bus Stand,Muktagacha\",\"footer_img\":\"public\\/img\\/footer_484510.jpg\"}', '{\"site_name\":\"Sherpur United (Pvt) Hospital\",\"place_name\":\"Kalir Bazar, Bottola, Sherpur-2100\",\"addr_moblile\":\"01907088200\",\"is_banner\":\"yes\"}', '{\"logo\":\"public\\/img\\/logo_556701.png\",\"faveicon\":\"public\\/img\\/favicon_198347.png\"}', '{\"aside_menu\":\"fa fa-angle-right\",\"footer_menu\":\"fa fa-caret-right\"}', '{\"s_facebook\":\"https:\\/\\/facebook.com\",\"s_twitter\":\"https:\\/\\/twitter.com\",\"s_gplus\":\"https:\\/\\/plus.google.com\",\"s_pinterest\":\"https:\\/\\/www.pinterest.com\\/\"}', 'en', '{\"name\":\"Sherpur United (Pvt) Hospital\",\"designation\":\"Sherpur United (Pvt) Hospital\"}');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_date` date NOT NULL,
  `bank` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `transaction_date`, `bank`, `account_number`, `transaction_type`, `source`, `amount`, `transaction_by`, `remarks`) VALUES
(2, '2020-09-01', 'Dbbl', '54654646546', 'Credit', '', '2000', 'jgklj', '');

-- --------------------------------------------------------

--
-- Table structure for table `ultra_patient`
--

CREATE TABLE `ultra_patient` (
  `id` int(10) NOT NULL,
  `patient_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specimen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reff_doctor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ultra_patient`
--

INSERT INTO `ultra_patient` (`id`, `patient_id`, `created_at`, `name`, `age`, `gender`, `specimen`, `reff_doctor`) VALUES
(1, '0002', '2021-02-25', 'aaaa', '0', 'Female', 'whole_abdomen', '');

-- --------------------------------------------------------

--
-- Table structure for table `ultra_patient_report`
--

CREATE TABLE `ultra_patient_report` (
  `id` int(10) NOT NULL,
  `created_at` date NOT NULL,
  `patient_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_report` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ultra_patient_report`
--

INSERT INTO `ultra_patient_report` (`id`, `created_at`, `patient_id`, `test_name`, `test_report`) VALUES
(1, '2021-02-25', '0002', 'Liver', 'Normal in size with homogenous echotexture No focal lesion is seen.'),
(2, '2021-02-25', '0002', 'G_B', 'Well visualized. No Calculus is seen in the lumen of the gall bladder.'),
(3, '2021-02-25', '0002', 'Biliary_tree', 'Intrahepatic biliary channels and CBD are not dilated.'),
(4, '2021-02-25', '0002', 'Pancreas', 'Appears normal.fdghff is uniform.'),
(5, '2021-02-25', '0002', 'Spleen', 'Normal in size with uniform echopattern. No focal lesion is seen.'),
(6, '2021-02-25', '0002', 'Kidneys', 'Both kidneys are normal in size, shape and position. CMD of the both kidneys are well maintained. P.C systems are not dilated No mass lesion or calculus is seen.'),
(7, '2021-02-25', '0002', 'Urinary_bladder', 'Well filled with regular in outline. No intravesical lesion or calculus is seen.'),
(8, '2021-02-25', '0002', 'Prostate', 'Normal in size'),
(9, '2021-02-25', '0002', 'comments', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `opening` datetime NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maritial_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facecbook` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privilege` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `opening`, `name`, `l_name`, `gender`, `birthday`, `maritial_status`, `position`, `about`, `website`, `facecbook`, `twitter`, `email`, `username`, `password`, `privilege`, `image`, `mobile`, `branch`) VALUES
(11, '2021-01-06 10:19:39', 'developer24', '', '', '', '', '', '', '', '', '', 'developer24@gmail.com', 'developer24', '3d5ac6fb4269a3db634ba72d77f0b5b8', 'admin', '', '01983667651', ''),
(13, '2021-02-25 05:24:38', 'Sherpur United Hospital', '', '', '', '', '', '', '', '', '', 'sherpur@gmail.com', 'sherpurunited123', '246cec4d3754eba17236f5872dba41c6', 'super', 'public/profiles/sherpurunited123.png', '01839973101', ''),
(14, '2021-02-25 05:34:19', 'Sherpur United (pvt.) Hospital', '', '', '', '', '', '', '', '', '', 'sherpurunitedpvthospital@gmail.com', 'unitedsherpur', '10e4fca6145604aea2cfcebf1642ae79', 'super', '', '01907088200', '');

-- --------------------------------------------------------

--
-- Table structure for table `vat`
--

CREATE TABLE `vat` (
  `id` int(11) NOT NULL,
  `percentage` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vat`
--

INSERT INTO `vat` (`id`, `percentage`, `vat_id`) VALUES
(1, '0', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admit_type`
--
ALTER TABLE `admit_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advanced_payment`
--
ALTER TABLE `advanced_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_date` (`payment_date`),
  ADD KEY `emp_id` (`emp_id`(250));

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
-- Indexes for table `altra_doctor_payment`
--
ALTER TABLE `altra_doctor_payment`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `rf_pc_id` (`doctor_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
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
-- Indexes for table `barcode`
--
ALTER TABLE `barcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `date` (`date`),
  ADD KEY `voucher` (`voucher`),
  ADD KEY `pid` (`pid`),
  ADD KEY `title` (`title`);

--
-- Indexes for table `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`(250)),
  ADD KEY `bonus_date` (`bonus_date`);

--
-- Indexes for table `bonus_structure`
--
ALTER TABLE `bonus_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `closing`
--
ALTER TABLE `closing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commission_payment`
--
ALTER TABLE `commission_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultancies`
--
ALTER TABLE `consultancies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `cost`
--
ALTER TABLE `cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost_bill`
--
ALTER TABLE `cost_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost_bill_items`
--
ALTER TABLE `cost_bill_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost_field`
--
ALTER TABLE `cost_field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_reports`
--
ALTER TABLE `create_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_wages`
--
ALTER TABLE `daily_wages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_at` (`created_at`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `deduction_structure`
--
ALTER TABLE `deduction_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`),
  ADD KEY `refereed_doctor` (`refereed_doctor`),
  ADD KEY `alt_doctor_id` (`alt_doctor_id`),
  ADD KEY `bill` (`bill`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_payment`
--
ALTER TABLE `doctor_payment`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `rf_pc_id` (`doctor_id`);

--
-- Indexes for table `due_collection`
--
ALTER TABLE `due_collection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `due_payment`
--
ALTER TABLE `due_payment`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `group_mapping`
--
ALTER TABLE `group_mapping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `test_id` (`test_id`);

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
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_field`
--
ALTER TABLE `income_field`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `code` (`id`);

--
-- Indexes for table `investigation`
--
ALTER TABLE `investigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
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
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `mixed_patient`
--
ALTER TABLE `mixed_patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mixed_report`
--
ALTER TABLE `mixed_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opening_balance`
--
ALTER TABLE `opening_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outstock`
--
ALTER TABLE `outstock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_id` (`emp_id`(250));

--
-- Indexes for table `parameter`
--
ALTER TABLE `parameter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trash` (`trash`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_admission`
--
ALTER TABLE `patient_admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_barcode`
--
ALTER TABLE `patient_barcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_histories`
--
ALTER TABLE `patient_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `parameter_id` (`parameter_id`);

--
-- Indexes for table `patient_info`
--
ALTER TABLE `patient_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procedures`
--
ALTER TABLE `procedures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reagent`
--
ALTER TABLE `reagent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reagent_stock`
--
ALTER TABLE `reagent_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recharge_sms`
--
ALTER TABLE `recharge_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rf_pc_commission_payment`
--
ALTER TABLE `rf_pc_commission_payment`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `rf_pc_id` (`rf_pc_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_date` (`payment_date`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `salary_records`
--
ALTER TABLE `salary_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_date` (`payment_date`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `salary_structure`
--
ALTER TABLE `salary_structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `sitemeta`
--
ALTER TABLE `sitemeta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_record`
--
ALTER TABLE `sms_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_group`
--
ALTER TABLE `test_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trash` (`trash`);

--
-- Indexes for table `test_histories`
--
ALTER TABLE `test_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_mapping`
--
ALTER TABLE `test_mapping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `parameter_id` (`parameter_id`);

--
-- Indexes for table `test_name`
--
ALTER TABLE `test_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme_setting`
--
ALTER TABLE `theme_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ultra_patient`
--
ALTER TABLE `ultra_patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ultra_patient_report`
--
ALTER TABLE `ultra_patient_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vat`
--
ALTER TABLE `vat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admit_type`
--
ALTER TABLE `admit_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `advanced_payment`
--
ALTER TABLE `advanced_payment`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ad_pay`
--
ALTER TABLE `ad_pay`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ad_salary`
--
ALTER TABLE `ad_salary`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `altra_doctor_payment`
--
ALTER TABLE `altra_doctor_payment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_account`
--
ALTER TABLE `bank_account`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_name`
--
ALTER TABLE `bank_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barcode`
--
ALTER TABLE `barcode`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bonus`
--
ALTER TABLE `bonus`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bonus_structure`
--
ALTER TABLE `bonus_structure`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(45) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `closing`
--
ALTER TABLE `closing`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commission_payment`
--
ALTER TABLE `commission_payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consultancies`
--
ALTER TABLE `consultancies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cost`
--
ALTER TABLE `cost`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cost_bill`
--
ALTER TABLE `cost_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cost_bill_items`
--
ALTER TABLE `cost_bill_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `cost_field`
--
ALTER TABLE `cost_field`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `create_reports`
--
ALTER TABLE `create_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily_wages`
--
ALTER TABLE `daily_wages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deduction_structure`
--
ALTER TABLE `deduction_structure`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor_payment`
--
ALTER TABLE `doctor_payment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `due_collection`
--
ALTER TABLE `due_collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `due_payment`
--
ALTER TABLE `due_payment`
  MODIFY `id` int(45) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emergencies`
--
ALTER TABLE `emergencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_mapping`
--
ALTER TABLE `group_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `group_name`
--
ALTER TABLE `group_name`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `incentive_structure`
--
ALTER TABLE `incentive_structure`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income_field`
--
ALTER TABLE `income_field`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `investigation`
--
ALTER TABLE `investigation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `marketer`
--
ALTER TABLE `marketer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meta_info`
--
ALTER TABLE `meta_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mixed_patient`
--
ALTER TABLE `mixed_patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mixed_report`
--
ALTER TABLE `mixed_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opening_balance`
--
ALTER TABLE `opening_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `outstock`
--
ALTER TABLE `outstock`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parameter`
--
ALTER TABLE `parameter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient_admission`
--
ALTER TABLE `patient_admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient_barcode`
--
ALTER TABLE `patient_barcode`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_histories`
--
ALTER TABLE `patient_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `patient_info`
--
ALTER TABLE `patient_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pc`
--
ALTER TABLE `pc`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `procedures`
--
ALTER TABLE `procedures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reagent`
--
ALTER TABLE `reagent`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reagent_stock`
--
ALTER TABLE `reagent_stock`
  MODIFY `id` int(200) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recharge_sms`
--
ALTER TABLE `recharge_sms`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rf_pc_commission_payment`
--
ALTER TABLE `rf_pc_commission_payment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_records`
--
ALTER TABLE `salary_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_structure`
--
ALTER TABLE `salary_structure`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sitemeta`
--
ALTER TABLE `sitemeta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_record`
--
ALTER TABLE `sms_record`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `test_group`
--
ALTER TABLE `test_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `test_histories`
--
ALTER TABLE `test_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_mapping`
--
ALTER TABLE `test_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `test_name`
--
ALTER TABLE `test_name`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `theme_setting`
--
ALTER TABLE `theme_setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ultra_patient`
--
ALTER TABLE `ultra_patient`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ultra_patient_report`
--
ALTER TABLE `ultra_patient_report`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vat`
--
ALTER TABLE `vat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
