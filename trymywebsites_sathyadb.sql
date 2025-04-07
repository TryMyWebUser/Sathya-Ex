-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2025 at 01:11 PM
-- Server version: 10.3.39-MariaDB-log-cll-lve
-- PHP Version: 8.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trymywebsites_sathyadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `a_id` int(100) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`a_id`, `heading`, `description`) VALUES
(1, 'Awesome Services From Sathya Coatings', '<p>WELCOME TO SATHYA COATINGS &ndash; 25+ YEARS OF EXCELLENCE IN SPECIALITY COATING FORMULATIONS FOR SPECIFIC REQUIREMENTS.</p>\r\n\r\n<p>AN ISO 14001:2015, ISO 45001:2018, ISO 9001:2015 CERTIFIED SPECIALITY COATINGS MANUFACTURER &amp; CUSTOMISED FORMULATION PROVIDER FOR SPECIFIC REQUIREMENTS IN THE FIELD OF HIGH-PERFORMANCE PROTECTIVE COATINGS, SPECIALITY LININGS, FLOW ENHANCEMENT COATINGS &amp; FLOOR COATINGS OF VARIOUS KINDS.</p>\r\n\r\n<p>WE ARE PROVIDING CUSTOMISED TAILOR-MADE COATINGS/CHEMICALS TO A WIDE ARRAY OF CUSTOMER BASE SINCE 1995.</p>\r\n\r\n<p>WE MANUFACTURE SPECIALISED COATINGS FOR DIFFERENT TYPES OF SUBSTRATES CATERING TO A WIDE RANGE OF CHALLENGING REQUIREMENTS.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `aboutbanner`
--

CREATE TABLE `aboutbanner` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aboutbanner`
--

INSERT INTO `aboutbanner` (`id`, `image`) VALUES
(8, 'glass-laboratory-chemical-test-tubes-with-liquid-analytical_43284-1613.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `about_images`
--

CREATE TABLE `about_images` (
  `id` int(10) NOT NULL,
  `experience` text NOT NULL,
  `img1` varchar(100) NOT NULL,
  `img2` varchar(100) NOT NULL,
  `img3` varchar(100) NOT NULL,
  `heading` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_images`
--

INSERT INTO `about_images` (`id`, `experience`, `img1`, `img2`, `img3`, `heading`, `description`) VALUES
(1, '29 + years of Experience & counting', 'closed-sand-falling-sandglass-hourglass-260nw-1056787307.jpg', 'comprehensive industrial solutions logo.jpg', 'images.jpg', 'SATHYA COATINGS', '<p><span style=\"font-size:28px\"><strong>INNOVATIVE FORMULATIONS SINCE 1995</strong></span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">WE ARE AN ISO 14001:2015, ISO 45001:2018, ISO 9001:2015 CERTIFIED MANUFACTURER &amp; TURNKEY SOLUTION PROVIDER FOR SPECIFIC REQUIREMENTS.</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">WE MANUFACTURE&nbsp; HI-PERFORMANCE &amp; TAILOR MADE FORMULATIONS FOR MULTI-VARIOUS REQUIREMENTS IN THE FIELD OF</span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:16px\">ADHESIVES</span></li>\r\n	<li><span style=\"font-size:16px\">COATINGS</span></li>\r\n	<li><span style=\"font-size:16px\">CONSTRUCTION CHEMICALS</span></li>\r\n	<li><span style=\"font-size:16px\">INDUSTRIAL CLEANERS</span></li>\r\n	<li><span style=\"font-size:16px\">METAL REPAIR COMPOUNDS</span></li>\r\n	<li><span style=\"font-size:16px\">METAL SURFACE TREATMENT CHEMICALS</span></li>\r\n	<li><span style=\"font-size:16px\">METAL WORKING FLUIDS</span></li>\r\n	<li><span style=\"font-size:16px\">RUST PREVENTIVES</span></li>\r\n</ul>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `about_page`
--

CREATE TABLE `about_page` (
  `id` int(11) NOT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `heading2` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_page`
--

INSERT INTO `about_page` (`id`, `experience`, `img1`, `img2`, `img3`, `heading`, `heading2`, `description`, `created_at`) VALUES
(1, '29+  years of Experience', 'closed-sand-falling-sandglass-hourglass-260nw-1056787307.jpg', 'metallurgical-industry-seen-from-drone_641386-431.avif', 'comprehensive industrial solutions logo.jpg', 'SATHYA COATINGS', 'INNOVATIVE FORMULATIONS SINCE 1995', '<p><span style=\"color:#ffffff\"><span style=\"background-color:#f39c12\">WELCOME TO SATHYA COATINGS &ndash; 29+</span></span> YEARS OF EXCELLENCE IN SPECIALITY COATING FORMULATIONS FOR SPECIFIC REQUIREMENTS.</p>\r\n\r\n<p>AN ISO 14001:2015, ISO 45001:2018, ISO 9001:2015 CERTIFIED MANUFACTURER &amp; CUSTOMISED FORMULATION PROVIDER FOR SPECIFIC REQUIREMENTS IN THE FIELD OF HIGH-PERFORMANCE PROTECTIVE COATINGS, SPECIALITY LININGS, FLOW ENHANCEMENT COATINGS &amp; FLOOR COATINGS OF VARIOUS KINDS.</p>\r\n\r\n<p>WE ARE PROVIDING CUSTOMISED TAILOR-MADE COATINGS/CHEMICALS TO A WIDE ARRAY OF CUSTOMER BASE SINCE 1995.</p>\r\n\r\n<p>WE MANUFACTURE SPECIALISED COATINGS FOR DIFFERENT TYPES OF SUBSTRATES CATERING TO A WIDE RANGE OF CHALLENGING REQUIREMENTS.</p>\r\n', '2024-04-03 06:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `about_pagelsit`
--

CREATE TABLE `about_pagelsit` (
  `list_id` int(10) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_pagelsit`
--

INSERT INTO `about_pagelsit` (`list_id`, `name`) VALUES
(2, 'Guaranteed Solutions'),
(3, 'Comprehensive & Exhaustive Product Range'),
(4, 'Speciality Products & Services at affordable cost');

-- --------------------------------------------------------

--
-- Table structure for table `admin_register`
--

CREATE TABLE `admin_register` (
  `admin_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirm_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_register`
--

INSERT INTO `admin_register` (`admin_id`, `username`, `phone_number`, `email`, `password`, `confirm_password`) VALUES
(1, 'admin', '9344940090', 'admin@gmail.com', 'admin@123', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `heading1` varchar(100) NOT NULL,
  `heading2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image`, `heading1`, `heading2`) VALUES
(5, 'perspectives.png', 'SPECIALTY FORMULATIONS FOR SPECIFIC REQUIREMENTS', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(100) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(1, 'ADHESIVES'),
(2, 'CONSTRUCTION CHEMICALS'),
(3, 'COATINGS'),
(4, 'METAL REPAIR COMPOUNDS'),
(5, 'METAL SURFACE TREATMENT SOLUTIONS'),
(8, 'RUST PREVENTIVES'),
(9, 'INDUSTRIAL CLEANERS'),
(11, 'METAL WORKING FLUIDS');

-- --------------------------------------------------------

--
-- Table structure for table `contactbanner`
--

CREATE TABLE `contactbanner` (
  `id` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactbanner`
--

INSERT INTO `contactbanner` (`id`, `image`) VALUES
(6, 'perspectives.png');

-- --------------------------------------------------------

--
-- Table structure for table `contactcontent`
--

CREATE TABLE `contactcontent` (
  `id` int(11) NOT NULL,
  `img1` varchar(255) DEFAULT NULL,
  `heading1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `heading2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `heading3` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactcontent`
--

INSERT INTO `contactcontent` (`id`, `img1`, `heading1`, `img2`, `heading2`, `img3`, `heading3`, `created_at`) VALUES
(1, 'contact_img01.jpg', '221 Chinnammal Nagar, Edayarpalayam, Vadavalli Road, Coimbatore-641041', 'contact_img02.jpg', '+91 93456 82897', 'contact_img03.jpg', 'info@sathyacoatings.com', '2024-04-03 07:16:06'),
(2, '', '', '', '+919994924939', '', '', '2024-11-01 15:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `id` int(10) NOT NULL,
  `main_heading` text NOT NULL,
  `sub_heading` text NOT NULL,
  `list` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`id`, `main_heading`, `sub_heading`, `list`, `image`, `title`) VALUES
(1, 'WE OFFER WIDE RANGE OF FORMULATIONS & TURNKEY SERVICES ', 'ADHESIVES - COATINGS - CONSTRUCTION CHEMICALS - FLOOR COATINGS - METAL SURFACE TREATMENT - RUST PREVENTIVE FLUIDS - INDUSTRIAL CLEANERS - METAL REPAIR COMPOUNDS', 'TECHNO COMMERCIALLY SUPERIOR OFFERINGS', 'floating-industrial-landscape-mixed-media_641298-5338.avif', 'COMPREHENSIVE PRODUCT AND SERVICE RANGE');

-- --------------------------------------------------------

--
-- Table structure for table `fimage`
--

CREATE TABLE `fimage` (
  `id` int(10) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fimage`
--

INSERT INTO `fimage` (`id`, `image`) VALUES
(1, 'tmw1.png');

-- --------------------------------------------------------

--
-- Table structure for table `galbanner`
--

CREATE TABLE `galbanner` (
  `id` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galbanner`
--

INSERT INTO `galbanner` (`id`, `image`) VALUES
(4, 'perspectives.png');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(10) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `i_id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`i_id`, `name`, `image`, `position`) VALUES
(1, 'prod 1', '1.jpg', 'gallery'),
(2, 'prod 2', '2.jpg', 'gallery'),
(3, 'prod 3', '3.jpg', 'gallery'),
(4, 'Pu floor coating', '4.jpg', 'both'),
(5, 'prod 5', '5.jpg', 'gallery'),
(6, 'prod 6', '6.jpg', 'gallery'),
(7, 'prod 7', '7.jpg', 'gallery'),
(8, 'High sri coating 01', '8.jpg', 'both'),
(9, 'prod 9', '9.jpg', 'gallery'),
(10, 'prod 10', '10.jpg', 'gallery'),
(11, 'prod 11', '11.jpg', 'gallery'),
(12, 'prod 12', '12.jpg', 'gallery'),
(13, 'prod 13', '13.jpg', 'gallery'),
(14, 'Epoxy floor coating 08', '14.jpg', 'both'),
(15, 'prod 15', '15.jpg', 'gallery'),
(16, 'Epoxy floor coating 03', '16.jpg', 'both'),
(17, 'prod 17', '17.jpg', 'gallery'),
(18, 'prod 18', '18.jpg', 'gallery'),
(19, 'prod 19', '19.jpg', 'gallery'),
(20, 'prod 20', '20.jpg', 'gallery'),
(21, 'prod 21', '21.jpg', 'gallery'),
(22, 'prod 22', '23.jpg', 'gallery'),
(23, 'prod 23', '24.jpg', 'gallery'),
(24, 'prod 24', '25.jpg', 'gallery'),
(25, 'prod 25', '26.jpg', 'gallery');

-- --------------------------------------------------------

--
-- Table structure for table `indbanner`
--

CREATE TABLE `indbanner` (
  `id` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `indbanner`
--

INSERT INTO `indbanner` (`id`, `image`) VALUES
(8, 'metallurgical-industry-seen-from-drone_641386-431.avif');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `id` int(11) NOT NULL,
  `heading1` varchar(255) NOT NULL,
  `heading2` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `box_content` text NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industry_page`
--

CREATE TABLE `industry_page` (
  `id` int(11) NOT NULL,
  `heading1` varchar(255) DEFAULT NULL,
  `heading2` varchar(255) DEFAULT NULL,
  `heading3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `industry_page`
--

INSERT INTO `industry_page` (`id`, `heading1`, `heading2`, `heading3`) VALUES
(1, 'COMPREHENSIVE RANGE OF PRODUCTS AND SERVICES ', '', 'GUARANTEED SOLUTIONS FOR CHALLENGING REQUIREMENTS IN VARIOUS TYPES OF INDUSTRIES');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `list_id` int(10) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`list_id`, `name`) VALUES
(1, 'Specific Products and services with comprehensive warranty'),
(2, 'HI-Performance Turnkey Solutions'),
(3, '3 Decades of Expertise ');

-- --------------------------------------------------------

--
-- Table structure for table `prodbaner`
--

CREATE TABLE `prodbaner` (
  `id` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodbaner`
--

INSERT INTO `prodbaner` (`id`, `image`) VALUES
(12, 'glass-laboratory-chemical-test-tubes-with-liquid-analytical_43284-1613.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `prodcontban`
--

CREATE TABLE `prodcontban` (
  `id` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodcontban`
--

INSERT INTO `prodcontban` (`id`, `image`) VALUES
(5, '360_F_212216813_AZWcslpAGF6zcIcwi0gFFW2uela5emBf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `prodsubcat`
--

CREATE TABLE `prodsubcat` (
  `subcat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `subcat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodsubcat`
--

INSERT INTO `prodsubcat` (`subcat_id`, `cat_id`, `cat_name`, `subcat_name`) VALUES
(4, 3, 'COATINGS', 'ANTI-CORROSIVE PRIMERS'),
(5, 3, 'COATINGS', 'ANTI- CORROSIVE INTERMEDIATE COATINGS'),
(6, 3, 'COATINGS', 'ANTI-CORROSIVE FINISH COATINGS'),
(7, 3, 'COATINGS', 'ANTI-CORROSIVE DTM-DIRECT TO METAL COATINGS'),
(8, 3, 'COATINGS', 'ANTI- CORROSIVE SPECIALTY COATINGS'),
(9, 3, 'COATINGS', 'HEAT RESISTANT COATING'),
(10, 3, 'COATINGS', 'PROCESS EQUIPMENT SPECIFIC COATINGS'),
(12, 3, 'COATINGS', 'FLOOR COATINGS'),
(13, 1, 'ADHESIVES', 'EPOXY ADHESIVES'),
(14, 1, 'ADHESIVES', 'POLYURETHANE ADHESIVES'),
(15, 1, 'ADHESIVES', 'PHENOLIC ADHESIVES'),
(16, 1, 'ADHESIVES', 'ACRYLIC ADHESIVES'),
(17, 1, 'ADHESIVES', 'PVA ADHESIVES'),
(18, 3, 'COATINGS', 'INTUMESCENT COATING'),
(19, 1, 'ADHESIVES', 'POTTING COMPOUNDS FOR ENCAPSULATION'),
(20, 2, 'CONSTRUCTION CHEMICALS', 'CONCRETE ADMIXTURES'),
(21, 2, 'CONSTRUCTION CHEMICALS', 'WATERPROOFING PRODUCTS'),
(22, 2, 'CONSTRUCTION CHEMICALS', 'BONDING AGENTS'),
(23, 2, 'CONSTRUCTION CHEMICALS', 'CONCRETE REPAIR & REHABILITATION'),
(24, 2, 'CONSTRUCTION CHEMICALS', 'CURING COMPOUNDS'),
(25, 2, 'CONSTRUCTION CHEMICALS', 'FIBERS FOR INTERNAL REINFORCEMENT'),
(26, 2, 'CONSTRUCTION CHEMICALS', 'JOINT & CRACK FILLERS/SEALANT'),
(27, 2, 'CONSTRUCTION CHEMICALS', 'GROUTS'),
(28, 2, 'CONSTRUCTION CHEMICALS', 'FLOOR SEALERS & DENSIFIERS'),
(29, 2, 'CONSTRUCTION CHEMICALS', 'CONCRETE PROTECTION'),
(30, 2, 'CONSTRUCTION CHEMICALS', 'DRY SHAKE FLOOR HARDENERS'),
(31, 4, 'METAL REPAIR COMPOUNDS', 'CERAMIC REINFORCED EPOXY'),
(32, 4, 'METAL REPAIR COMPOUNDS', 'STEEL REINFORCED EPOXY'),
(33, 4, 'METAL REPAIR COMPOUNDS', 'FIBER REINFORCED EPOXY'),
(34, 5, 'METAL SURFACE TREATMENT SOLUTIONS', 'RUST CONVERTOR'),
(35, 5, 'METAL SURFACE TREATMENT SOLUTIONS', 'ONE STAGE NANO PHOSPHATING CHEMICAL'),
(36, 5, 'METAL SURFACE TREATMENT SOLUTIONS', 'FOR STAINLESS STEEL'),
(37, 5, 'METAL SURFACE TREATMENT SOLUTIONS', 'FOR ALUMINIUM'),
(38, 5, 'METAL SURFACE TREATMENT SOLUTIONS', 'FOR CARBON STEEL'),
(39, 5, 'METAL SURFACE TREATMENT SOLUTIONS', 'FOR REINFORCEMENT STEEL'),
(40, 8, 'RUST PREVENTIVES', 'WATER DISPLACING RUST PREVENTIVE FLUIDS'),
(41, 8, 'RUST PREVENTIVES', 'RUST PREVENTIVE OIL'),
(43, 8, 'RUST PREVENTIVES', 'THIN FILM RUST PREVENTIVE COATINGS'),
(44, 9, 'INDUSTRIAL CLEANERS', 'ALKALINE DEGREASERS'),
(45, 9, 'INDUSTRIAL CLEANERS', 'EC0-FREINDLY WATER DILUTABLE NEUTRAL CLEANERS'),
(46, 9, 'INDUSTRIAL CLEANERS', 'SYNTHETIC HYDROCARBON BASED CLEANERS'),
(47, 11, 'METAL WORKING FLUIDS', 'NEAT CUTTING FLUID'),
(48, 11, 'METAL WORKING FLUIDS', 'SOLUBLE (EMULSIFIABLE) CUTTING FLUIDS'),
(49, 11, 'METAL WORKING FLUIDS', 'SEMI-SYNTHETIC CUTTING FLUIDS'),
(50, 11, 'METAL WORKING FLUIDS', 'SYNTHETIC CUTTING FLUIDS');

-- --------------------------------------------------------

--
-- Table structure for table `prodsubcatban`
--

CREATE TABLE `prodsubcatban` (
  `id` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodsubcatban`
--

INSERT INTO `prodsubcatban` (`id`, `image`) VALUES
(17, 'perspectives.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `read_more` text NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `subcat_id` int(10) NOT NULL,
  `subcat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `name`, `description`, `read_more`, `cat_id`, `cat_name`, `subcat_id`, `subcat_name`) VALUES
(1, 'PRIMERS', 'QUALITY OF A PRIMER IS THE MOST IMPORTANT. IT CONSOLIDATES THE SUBSTRATE AND INCREASES THE OVERALL PERFORMANCE OF THE COATING SYSTEM. WE OFFER VARIOUS TYPES OF PRIMER FORMULATIONS FOR MULTI-VARIOUS APPLICATIONS WITH DIFFERENT CHEMISTRIES \r\n\r\n', '<h1 style=\"text-align: justify;\">WE OFFER COMPLETE RANGE OF PRODUCTS WITH MENTIONED CHEMISTRIES. TAILOR MADE FORMULATIONS ARE OFFERED WITH WITH DIFFERENT VOLUME SOLIDS&nbsp; &amp; DIFFERENT&nbsp; ANTI-CORROSIVE FILLER&nbsp; OPTIONS FOR VARIOUS TYPES OF REQUIREMENTS</h1>\r\n\r\n<p><span style=\"font-size:24px\"><strong>1. EPOXY ZINC RICH&nbsp;<br />\r\n2. EPOXY ZINC PHOSPHATE<br />\r\n3. INORGANIC ZINC ETHYL SILICATE<br />\r\n4. PU-ACRYLIC HYBRID PRIMER CUM TIE COAT<br />\r\n5. SILICONE ACRYLIC BASED HEAT RESISTANT PRIMERS<br />\r\n6. 1K EPOXY-ACRYLIC UNIVERSAL PRIMER<br />\r\n7. ETCH PRIMERS FOR STAINLESS STEEL<br />\r\n8. PRIMERS FOR PLASTIC SUBSTRATE LIKE PP, UPVC, ABS ETC...</strong></span></p>\r\n', 3, 'COATINGS', 4, 'ANTI-CORROSIVE PRIMERS'),
(4, 'SATHYA- CRE RANGE OF FORMULATIONS', 'We offer wide range of formulations using different types of Epoxy resin and hardener system reinforced with various types of CERAMIC fillers for specific applications using metal repair compounds..', '<p><span style=\"font-size:12px\"><strong><span style=\"color:#1abc9c\">SATHYA-CRE- GP</span></strong>&nbsp; &nbsp; - 2-COMPONENT CERAMIC REINFORCED GENERAL PURPOSE REAPIR COMPOUND</span></p>\r\n\r\n<p><span style=\"font-size:12px\"><strong><span style=\"color:#1abc9c\">SATHYA-CRE-HR</span></strong>&nbsp; &nbsp; &nbsp;- 2 COMPONENT CERAMIC REINFORCED HEAT RESISTANT REPAIR COMPOUND SUITABLE FOR TEMPERATURES UPTO 120 Deg C</span></p>\r\n\r\n<p><span style=\"font-size:12px\"><strong><span style=\"color:#1abc9c\">SATHYA-CRE- HCR</span></strong> - 2-COMPONENT CERAMIC REINFORCED CHEMICAL RESISTANT REPAIR COMPOUND.&nbsp;</span></p>\r\n\r\n<p>&nbsp;</p>\r\n', 4, 'METAL REPAIR COMPOUNDS', 31, 'CERAMIC REINFORCED EPOXY'),
(5, 'SATHYA-SRE RANGE OF FORMULATIONS', 'We offer wide range of formulations using different types of Epoxy resin and hardener system reinforced with various types of powdered steel fillers for specific applications using metal repair compounds..', '<p><span style=\"color:#1abc9c\"><span style=\"font-size:12px\"><strong>SATHYA-SRE- GP-I</strong>&nbsp; &nbsp; &nbsp; &nbsp;- 2-COMPONENT IRON POWDER REINFORCED GENERAL PURPOSE REAPIR COMPOUND</span></span></p>\r\n\r\n<p><span style=\"color:#1abc9c\"><span style=\"font-size:12px\"><strong>SATHYA-SRE-HR-I&nbsp; </strong>&nbsp; &nbsp; &nbsp; - 2 COMPONENT IRON POWDER REINFORCED HEAT RESISTANT REPAIR COMPOUND SUITABLE FOR TEMPERATURES UPTO 200 Deg C</span></span></p>\r\n\r\n<p><span style=\"color:#1abc9c\"><span style=\"font-size:12px\"><strong>SATHYA-SRE- HCR&nbsp;</strong> &nbsp; &nbsp; - 2-COMPONENT STAINLESS STEEL POWDER REINFORCED CHEMICAL RESISTANT REPAIR COMPOUND.&nbsp;</span></span></p>\r\n\r\n<p><span style=\"color:#1abc9c\"><span style=\"font-size:12px\"><strong>SATHYA-SRE- GP-AL</strong>&nbsp; &nbsp; - 2-COMPONENT ALUMINIUM POWDER REINFORCED GENERAL PURPOSE REAPIR COMPOUND</span></span></p>\r\n\r\n<p><span style=\"color:#1abc9c\"><span style=\"font-size:12px\"><strong>SATHYA-SRE-HR-AL&nbsp; </strong>&nbsp; - 2 COMPONENT ALUMINIUM POWDER REINFORCED HEAT RESISTANT REPAIR COMPOUND SUITABLE FOR TEMPERATURES UPTO 200 Deg C DRY SERVICE &amp; 150 DEG C IMMERSION SERVICE</span></span></p>\r\n', 4, 'METAL REPAIR COMPOUNDS', 32, 'STEEL REINFORCED EPOXY'),
(6, 'SATHYA- EPA RANGE OF FORMULATIONS', 'We offer wide range of adhesive formulations for specific applications like structural bonding, repairing of concrete, Anchor bolt fixing, metal to composite bonding, metal to metal bonding, glass bonding, stone/tile fixing, honeycomb repair etc..', '<ul>\r\n	<li><span style=\"color:#1abc9c\"><span style=\"font-size:12px\">SATHYA-EPA GP-30&nbsp; &nbsp; - GENERAL PURPOSE RT CURED EPOXY ADHESIVE FOR VARIOUS APPLICATIONS WITH POT LIFE OF 30 MINUTES</span></span></li>\r\n	<li><span style=\"color:#1abc9c\"><span style=\"font-size:12px\">SATHYA-EPA GP-15&nbsp; &nbsp; - GENERAL PURPOSE RT CURED EPOXY ADHESIVE FOR VARIOUS APPLICATIONS WITH POT LIFE OF 15 MINUTES</span></span></li>\r\n	<li><span style=\"color:#1abc9c\"><span style=\"font-size:12px\">SATHYA-EPA SB 1000 - HIGH-PERFORMANCE STRUCTURAL ADHESIVE FOR PRE-CAST CONCRETE APPLICATIONS&nbsp;</span></span></li>\r\n	<li><span style=\"color:#1abc9c\"><span style=\"font-size:12px\">SATHYA-EPA CR HV&nbsp; &nbsp;- HIGH-VISCOSITY IN-SITU POUR STRUCTURAL GRADE ADHESIVE FOR TREATING CONCRETE STRUCTURAL CRACKS WITH &gt; 3MM CRACK WIDTH</span></span></li>\r\n	<li><span style=\"color:#1abc9c\"><span style=\"font-size:12px\">SATHYA-EPA CR LV&nbsp; &nbsp; - LOW-VISCOSITY IN-SITU POUR STRUCTURAL GRADE ADHESIVE FOR TREATING CONCRETE STRUCTURAL CRACKS WITH &lt; 3MM CRACK WIDTH. RECOMMENDED FOR INJECTION GROUTING. HAS A POT LIFE OF 15 MINUTES</span></span></li>\r\n	<li><span style=\"color:#1abc9c\"><span style=\"font-size:12px\">SATHYA-EPA ABF&nbsp; &nbsp; &nbsp; - HIGH-VISCOSITY FAST SETTING EPOXY ADHESIVE FOR ANCHOR BOLT FIXING WITH POT LIFE OF LESS THAN 5 MINUTES</span></span></li>\r\n	<li><span style=\"color:#1abc9c\"><span style=\"font-size:12px\">SATHYA-EPA M2M&nbsp; &nbsp; &nbsp;- HIGH STRENGTH, METAL TO METAL EPOXY BONDING ADHESIVE&nbsp;</span></span></li>\r\n	<li><span style=\"color:#1abc9c\"><span style=\"font-size:12px\">SATHYA-EPA M2C&nbsp; &nbsp; &nbsp;- HIGH STRENGTH METAL TO COMPOSITE EPOXY BONDING ADHESIVE</span></span></li>\r\n	<li><span style=\"color:#1abc9c\"><span style=\"font-size:12px\">SATHYA-EPA GB&nbsp; &nbsp; &nbsp; &nbsp;- EPOXY ADHESIVE FOR BONDING GLASS</span></span></li>\r\n	<li><span style=\"color:#1abc9c\"><span style=\"font-size:12px\">SATHYA-EPA ST&nbsp; &nbsp; &nbsp; &nbsp; - EPOXY ADHESIVE FOR STONE/LARGE FORMAT TILE FIXING WITH SPOT ADHESIVE CONCEPT. VERY HIGH STRENGTH IN SHORT DURATION &lt;15 MINS</span></span></li>\r\n</ul>\r\n', 1, 'ADHESIVES', 13, 'EPOXY ADHESIVES'),
(7, 'SATHYA-PUA RANGE OF FORMULATIONS', 'SATHYA-PUA RANGE OF FORMULATIONS ARE BASED ON 2K POLYURETHANE CHEMISTRY WITH OPTION OF FOAMING AND NON-FOAMING ADHESIVES TO SUIT WIDE RANGE OF ADHESIVE REQUIREMENTS ACROSS VARIOUS INDUSTRIES', '<p><span style=\"color:#1abc9c\"><span style=\"font-size:12px\">SATHYA&nbsp; &nbsp;- PUA-GPF&nbsp; -&nbsp; GENERAL PURPOSE 2K- PU FOAMING GRADE ADHESIVE FOR WIDE RANGE OF APPLICATIONS WITH POT LIFE OF&nbsp; &lt;15 MINS</span></span></p>\r\n\r\n<p><span style=\"color:#1abc9c\"><span style=\"font-size:12px\">SATHYA&nbsp; - PUA-F 100 -&nbsp; 2K PU ADHESIVE SPECIFICALLY TAILOR MADE FOR BONDING METAL SHEETS WITH EPS/PUF IN COMPOSITE PANEL MANUFACTURING</span></span></p>\r\n\r\n<p><span style=\"color:#1abc9c\"><span style=\"font-size:12px\">SATHYA -PUA- FW&nbsp; &nbsp; &nbsp; -&nbsp; 2K PU FOAMING ADHESIVE FOR BONDING VARIOUS TYPES OF LAMINATES WITH MADE WOOD/ COMPOSITE&nbsp;</span></span></p>\r\n\r\n<p><span style=\"color:#1abc9c\"><span style=\"font-size:12px\">SATHYA-PUA- NF&nbsp; &nbsp; &nbsp; &nbsp;- 2K NON-FOAMING PU ADHESIVE FOR VARIOUS TYPES OF BONDING APPLICATIONS REQUIRING GOOD FLEXURAL STRENGTH COMBINED WITH GOOD ADHESION</span></span></p>\r\n', 1, 'ADHESIVES', 14, 'POLYURETHANE ADHESIVES'),
(8, 'SATHYA-PROCUT NC RANGE OF FORMULATIONS', 'WE OFFER WIDE RANGE OF STRAIGHT CUTTING OILS BASED ON MINERAL OIL & BIO-BASED SUSTAINABLE OILS FOR CUTTING FLUIDS REQUIREMENTS IN METAL WORKING. ', '<ul>\r\n	<li><span style=\"color:#1abc9c\"><span style=\"font-size:12px\"><strong>SATHYA - PROCUT NC 101 - </strong>NEAT CUTTING OIL BASED ON MINERAL OIL FOR GRINDING HARD METALS &amp; DEEP-HOLE DRILLING APPLICATIONS WITH FLASH POINT OF &gt;210 Deg C</span></span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#1abc9c\"><span style=\"font-size:12px\"><strong>SATHYA-PROCUT NC 102 -&nbsp;</strong>NEAT CUTTING OIL BASED ON MINERAL OIL FOR THREADING &amp; GEAR CUTTING APPLICATIONS OF DIFFICULT MATERIALS INCLUDING SAWING, BROACHING &amp; TOOL GRINDING&nbsp;APPLICATIONS WITH FLASH POINT OF &gt;240 Deg C</span></span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#1abc9c\"><span style=\"font-size:12px\"><strong>SATHYA-PROCUT B NC-1000 - </strong>BIO-BASED NEAT CUTTING OIL WITH GOOD LUBRICATION, COOLING EFFECT &amp; ANTI-CORROSIVE PROPERTIES.SUSTAINABLE PRODUCT WITH EXCELLENT BIO-DEGRADABILITY &amp; EXTREMELY SAFE FOR OPERATORS</span></span></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', 11, 'METAL WORKING FLUIDS', 47, 'NEAT CUTTING FLUID');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `image`, `name`) VALUES
(1, 'ADHESIVE 1.jpg', 'ADHESIVES'),
(2, '2.jpg', 'COATINGS'),
(3, 'CONSTRUCTION CHEMICALS.jpg', 'CONSTRUCTION CHEMICALS'),
(4, 'METAL REPAIR COMPOUNDS.jpg', 'METAL REPAIR COMPOUNDS'),
(5, 'METAL SURFACE TREATMENT.jpg', 'METAL SURFACE TREATMENT CHEMICALS'),
(7, 'RUST PREVENTIVES.jpg', 'RUST PREVENTIVES'),
(8, 'INDUSTRIAL CLEANER.jpg', 'INDUSTRIAL CLEANERS'),
(9, 'METALWORKING_FLUIDS.webp', 'METAL WORKING FLUIDS');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `id` int(50) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `cat_name`) VALUES
(1, 'AUTOMOBILE'),
(2, 'CONSTRUCTIONS & INFRA'),
(3, 'CHEMICAL/REFINERIES/ DISTILLERIES/BREWERIES'),
(4, 'DAIRY'),
(5, 'ENGINEERING'),
(6, 'FERTILIZERS'),
(7, 'FMCG / FOOD PROCESSING'),
(8, 'GENERAL MANUFACTURING'),
(9, 'PULP & PAPER'),
(10, 'SUGAR MANUFACTURING'),
(11, 'MINING'),
(12, 'MARINE'),
(13, 'PERTOLEUM & PETROCHEMICAL'),
(14, 'PHARMA'),
(15, 'TEXTILE PROCESSING'),
(16, 'EFFLUENT TREATMENT');

-- --------------------------------------------------------

--
-- Table structure for table `turncategory`
--

CREATE TABLE `turncategory` (
  `id` int(10) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `turncategory`
--

INSERT INTO `turncategory` (`id`, `cat_name`) VALUES
(1, 'ANTI-CORROSIVE COATING SOLUTIONS FOR STEEL '),
(2, 'PROTECTIVE COATINGS FOR FLOOR & WALL'),
(3, ' COMPREHENSIVE WATERPROOFING SOLUTIONS'),
(4, 'CONCRETE STRUCTURAL REHABILITATION'),
(5, 'INDUSTRIAL GROUTING');

-- --------------------------------------------------------

--
-- Table structure for table `turncontban`
--

CREATE TABLE `turncontban` (
  `id` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `turncontban`
--

INSERT INTO `turncontban` (`id`, `image`) VALUES
(6, 'comprehensive industrial solutions logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `turnkeybanner`
--

CREATE TABLE `turnkeybanner` (
  `id` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `turnkeybanner`
--

INSERT INTO `turnkeybanner` (`id`, `image`) VALUES
(8, 'IMG-20240318-WA0020.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `turnkey_category`
--

CREATE TABLE `turnkey_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `turnkey_category`
--

INSERT INTO `turnkey_category` (`id`, `name`, `image`) VALUES
(1, 'INDUSTRIAL ANTI-CORROSIVE COATING', 'IMG-20240318-WA0020.jpg'),
(2, 'PROTECTIVE COATINGS FOR FLOOR & WALL', 'IMG-20240104-WA0022.jpg'),
(3, 'COMPREHENSIVE WATER-PROOFING SOLUTIONS', 'KULROOF applied in INFOSYS PH1- Pune.jpg'),
(4, 'CONCRETE STRUCTURAL REHABILITATION', 'IMG-20240319-WA0007.jpg'),
(5, 'COMPREHENSIVE SOLUTIONS FOR INDUSTRIAL GROUTING', 'grouting-scaled.webp');

-- --------------------------------------------------------

--
-- Table structure for table `turnproducts`
--

CREATE TABLE `turnproducts` (
  `prod_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `read_more` text DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `subcat_id` int(11) DEFAULT NULL,
  `subcat_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `turnproducts`
--

INSERT INTO `turnproducts` (`prod_id`, `name`, `description`, `read_more`, `cat_id`, `cat_name`, `subcat_id`, `subcat_name`) VALUES
(1, 'COMPREHENSIVE TURN-KEY SOLUTION FOR CUI APPLICATIONS', 'We offer comprehensive anti-corrosive coating solutions for CUI applications ranging from (-196 DEG C TO 230 DEG C). Suitable for use on both carbon and stainless steel under insulation in both cryogenic/ high-temperature service.', '<p>We offer comprehensive anti-corrosive coating solutions for CUI applications ranging from (-196 DEG C TO 230 DEG C). Suitable for use on both carbon and stainless steel under insulation in both cryogenic/ high-temperature service.Highly recommended for gas pipe lines, pre-cooling pipe lines, cryogenic storage tanks under insulation, heat resistant anti-corrosive requirements in pipes and tanks</p>\r\n', 1, 'ANTI-CORROSIVE COATING SOLUTIONS FOR STEEL ', 1, 'FOR CUI- CORROSION UNDER INSULATION'),
(2, 'prod 2', 'content 2', '<h2>Plasticizers</h2>\r\n\r\n<p>Plasticizers, Super Plasticizers, Hyper Plasticizers, Accelerators/Retarders, and Corrosion Inhibitors.</p>\r\n\r\n<h2>Super Plasticizers</h2>\r\n\r\n<p>They&#39;re also known as high-range water reducers, and they&#39;re utilized to make high-strength concrete.</p>\r\n\r\n<h2>Hyper Plasticizers</h2>\r\n\r\n<p>The product was designed primarily for use in high-performance concrete, where the highest levels of durability and performance are required.</p>\r\n\r\n<h2>Accelerators/Retarders</h2>\r\n\r\n<p>Concrete set accelerating and retarding admixtures enable concrete makers to tailor the setting time of their concrete to the unique needs of their projects.</p>\r\n\r\n<h2>Corrosion Inhibitors</h2>\r\n\r\n<p>A corrosion inhibitor, often known as an anti-corrosive, is a chemical substance that reduces the rate of corrosion of a material when introduced to a liquid or gas.</p>\r\n', 1, 'Category 1', 2, 'subcat2'),
(3, 'prod 3', 'content 3', '<h2>Plasticizers</h2>\r\n\r\n<p>Plasticizers, Super Plasticizers, Hyper Plasticizers, Accelerators/Retarders, and Corrosion Inhibitors.</p>\r\n\r\n<h2>Super Plasticizers</h2>\r\n\r\n<p>They&#39;re also known as high-range water reducers, and they&#39;re utilized to make high-strength concrete.</p>\r\n\r\n<h2>Hyper Plasticizers</h2>\r\n\r\n<p>The product was designed primarily for use in high-performance concrete, where the highest levels of durability and performance are required.</p>\r\n\r\n<h2>Accelerators/Retarders</h2>\r\n\r\n<p>Concrete set accelerating and retarding admixtures enable concrete makers to tailor the setting time of their concrete to the unique needs of their projects.</p>\r\n\r\n<h2>Corrosion Inhibitors</h2>\r\n\r\n<p>A corrosion inhibitor, often known as an anti-corrosive, is a chemical substance that reduces the rate of corrosion of a material when introduced to a liquid or gas.</p>\r\n', 1, 'Category 1', 3, 'subcat3'),
(5, 'prod 4', 'content 4', '<h2>Plasticizers</h2>\r\n\r\n<p>Plasticizers, Super Plasticizers, Hyper Plasticizers, Accelerators/Retarders, and Corrosion Inhibitors.</p>\r\n\r\n<h2>Super Plasticizers</h2>\r\n\r\n<p>They&#39;re also known as high-range water reducers, and they&#39;re utilized to make high-strength concrete.</p>\r\n\r\n<h2>Hyper Plasticizers</h2>\r\n\r\n<p>The product was designed primarily for use in high-performance concrete, where the highest levels of durability and performance are required.</p>\r\n\r\n<h2>Accelerators/Retarders</h2>\r\n\r\n<p>Concrete set accelerating and retarding admixtures enable concrete makers to tailor the setting time of their concrete to the unique needs of their projects.</p>\r\n\r\n<h2>Corrosion Inhibitors</h2>\r\n\r\n<p>A corrosion inhibitor, often known as an anti-corrosive, is a chemical substance that reduces the rate of corrosion of a material when introduced to a liquid or gas.</p>\r\n', 3, 'category 3', 4, 'subcat4');

-- --------------------------------------------------------

--
-- Table structure for table `turnsubcat`
--

CREATE TABLE `turnsubcat` (
  `subcat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `subcat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `turnsubcat`
--

INSERT INTO `turnsubcat` (`subcat_id`, `cat_id`, `cat_name`, `subcat_name`) VALUES
(1, 1, 'COMPREHENSVE PROTECTIVE COATING SOLUTIONS', 'FOR CUI- CORROSION UNDER INSULATION'),
(2, 1, 'COMPREHENSVE PROTECTIVE COATING SOLUTIONS', 'FOR ACIDIC FUME ENVIRONMENT'),
(3, 1, 'COMPREHENSVE PROTECTIVE COATING SOLUTIONS', 'FOR ACIDIC SPILLAGE ENVIRONEMENT'),
(4, 1, 'COMPREHENSVE PROTECTIVE COATING SOLUTIONS', 'FOR SILOS, HOPPER, CHUTES AND CONVEYORS'),
(5, 1, 'COMPREHENSVE PROTECTIVE COATING SOLUTIONS', 'FOR TANKS'),
(6, 1, 'COMPREHENSVE PROTECTIVE COATING SOLUTIONS', 'FOR PIPE LINES'),
(7, 1, 'COMPREHENSVE PROTECTIVE COATING SOLUTIONS', 'FOR PIPE RACKS'),
(8, 1, 'COMPREHENSVE PROTECTIVE COATING SOLUTIONS', 'FOR GENERAL PURPOSE STEEL ASSET PROTECTION'),
(9, 1, 'COMPREHENSVE PROTECTIVE COATING SOLUTIONS', 'FOR STEEL ASSETS EXPOSED TO BRINE / SEA WATER'),
(10, 1, 'COMPREHENSVE PROTECTIVE COATING SOLUTIONS', 'FOR CONDENSERS & HEAT EXCHANGERS'),
(11, 1, 'COMPREHENSVE PROTECTIVE COATING SOLUTIONS', 'FOR FIRE PROOFING(INTUMESCENT COATING)'),
(12, 1, 'COMPREHENSIVE PROTECTIVE COATING SOLUTIONS', 'FOR COOLING TOWERS'),
(13, 1, 'COMPREHENSIVE PROTECTIVE COATING SOLUTIONS', 'FOR PUMPS'),
(14, 1, 'COMPREHENSIVE PROTECTIVE COATING SOLUTIONS', 'FOR ID FAN/ DUCTS'),
(15, 1, 'COMPREHENSIVE PROTECTIVE COATING SOLUTIONS', 'FOR FLUID FLOW ENHANCEMENT'),
(16, 2, 'FLOOR & WALL', 'ANTI-GRAFFITI WALL COATINGS'),
(17, 2, 'FLOOR & WALL', 'STAIN RESISTANT WALL COATINGS'),
(18, 2, 'FLOOR & WALL', 'ANTI-FUNGAL WALL COATINGS FOR HYGENIC ROOMS & PHARMACEUTICAL MANUFACTURING'),
(19, 2, 'COMPREHENSIVE INDUSTRIAL FLOOR & WALL COATING SOLUTIONS', 'EPOXY/PU/EPU/S-CRETE FLOOR COATING'),
(20, 2, 'COMPREHENSIVE INDUSTRIAL FLOOR & WALL COATING SOLUTIONS', 'CEMENTITIOUS FLOOR UNDERLAY SOLUTIONS');

-- --------------------------------------------------------

--
-- Table structure for table `turnsubcatban`
--

CREATE TABLE `turnsubcatban` (
  `id` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `turnsubcatban`
--

INSERT INTO `turnsubcatban` (`id`, `image`) VALUES
(11, 'future-factory-plant-energy-industry-concept_31965-11985.avif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `aboutbanner`
--
ALTER TABLE `aboutbanner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_images`
--
ALTER TABLE `about_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_page`
--
ALTER TABLE `about_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_pagelsit`
--
ALTER TABLE `about_pagelsit`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `admin_register`
--
ALTER TABLE `admin_register`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactbanner`
--
ALTER TABLE `contactbanner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactcontent`
--
ALTER TABLE `contactcontent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fimage`
--
ALTER TABLE `fimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galbanner`
--
ALTER TABLE `galbanner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `indbanner`
--
ALTER TABLE `indbanner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry_page`
--
ALTER TABLE `industry_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `prodbaner`
--
ALTER TABLE `prodbaner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodcontban`
--
ALTER TABLE `prodcontban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodsubcat`
--
ALTER TABLE `prodsubcat`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `prodsubcatban`
--
ALTER TABLE `prodsubcatban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turncategory`
--
ALTER TABLE `turncategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turncontban`
--
ALTER TABLE `turncontban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turnkeybanner`
--
ALTER TABLE `turnkeybanner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turnkey_category`
--
ALTER TABLE `turnkey_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turnproducts`
--
ALTER TABLE `turnproducts`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `turnsubcat`
--
ALTER TABLE `turnsubcat`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `turnsubcatban`
--
ALTER TABLE `turnsubcatban`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `a_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aboutbanner`
--
ALTER TABLE `aboutbanner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `about_images`
--
ALTER TABLE `about_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `about_page`
--
ALTER TABLE `about_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_pagelsit`
--
ALTER TABLE `about_pagelsit`
  MODIFY `list_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_register`
--
ALTER TABLE `admin_register`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contactbanner`
--
ALTER TABLE `contactbanner`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contactcontent`
--
ALTER TABLE `contactcontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fimage`
--
ALTER TABLE `fimage`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galbanner`
--
ALTER TABLE `galbanner`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `i_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `indbanner`
--
ALTER TABLE `indbanner`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industry_page`
--
ALTER TABLE `industry_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `list_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prodbaner`
--
ALTER TABLE `prodbaner`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prodcontban`
--
ALTER TABLE `prodcontban`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prodsubcat`
--
ALTER TABLE `prodsubcat`
  MODIFY `subcat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `prodsubcatban`
--
ALTER TABLE `prodsubcatban`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `turncategory`
--
ALTER TABLE `turncategory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `turncontban`
--
ALTER TABLE `turncontban`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `turnkeybanner`
--
ALTER TABLE `turnkeybanner`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `turnkey_category`
--
ALTER TABLE `turnkey_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `turnproducts`
--
ALTER TABLE `turnproducts`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `turnsubcat`
--
ALTER TABLE `turnsubcat`
  MODIFY `subcat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `turnsubcatban`
--
ALTER TABLE `turnsubcatban`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
