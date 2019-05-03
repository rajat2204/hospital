-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2019 at 01:32 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmsl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_setting_models`
--

CREATE TABLE `admin_setting_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `website_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lock_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fbLink` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twLink` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `goLink` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lnLink` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `openingHrs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blood_examination_models`
--

CREATE TABLE `blood_examination_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `patientId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referredBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `investigationAdvised` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `haemoglobin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `totalRBCCount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `totalWBCCount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `polymorphs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lymphocytes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eosinophils` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `monocytes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `basophils` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ers` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plateletCount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reticulocytes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pcv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mcv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mch` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mchc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bleedingTime` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clottingTime` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `malarialParasite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blood_examination_models`
--

INSERT INTO `blood_examination_models` (`id`, `patientId`, `referredBy`, `age`, `investigationAdvised`, `date`, `haemoglobin`, `totalRBCCount`, `totalWBCCount`, `polymorphs`, `lymphocytes`, `eosinophils`, `monocytes`, `basophils`, `ers`, `plateletCount`, `reticulocytes`, `pcv`, `mcv`, `mch`, `mchc`, `bleedingTime`, `clottingTime`, `malarialParasite`, `remark`, `created_at`, `updated_at`) VALUES
(1, '1234', 'Wade Mertz', '12', 'vsvfsrdv', '2019-02-11', 'vrvf', 'vrdv', 'vrfv', 'vrfdv', 'vrefre', 'grege', 'greg', 'greg', 'greg', 'greg', 'greg', 'greg', 'greg', 'greg', 'greg', 'gerg', 'greg', 'greg', '123', '2019-02-10 23:41:50', '2019-02-11 00:18:10'),
(2, '1234', 'Wade Mertz', '12', 'vsvfsrdv', '2019-02-11', 'vrvf', 'vrdv', 'vrfv', 'vrfdv', 'vrefre', 'grege', 'greg', 'greg', 'greg', 'greg', 'greg', 'greg', 'greg', 'greg', 'greg', 'gerg', 'greg', 'greg', 'gregr', '2019-02-11 00:07:42', '2019-02-11 00:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `department_models`
--

CREATE TABLE `department_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department_models`
--

INSERT INTO `department_models` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Surgery', '2019-02-07 05:28:16', '2019-02-07 05:28:16'),
(2, 'X-Ray', '2019-02-07 05:28:43', '2019-02-07 05:28:43'),
(3, 'TB Department', '2019-02-07 05:28:56', '2019-02-07 05:28:56'),
(4, 'HIV', '2019-02-07 05:29:03', '2019-02-07 05:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `diet_plan_models`
--

CREATE TABLE `diet_plan_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diet_plan_models`
--

INSERT INTO `diet_plan_models` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'LOW SUGAR', '2019-02-07 05:32:17', '2019-02-07 05:32:17'),
(2, 'HIGH SUGAR', '2019-02-07 05:33:02', '2019-02-07 05:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `disease_models`
--

CREATE TABLE `disease_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `disease_models`
--

INSERT INTO `disease_models` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'KUSTH ROG', '2019-02-07 05:34:40', '2019-02-07 05:34:40'),
(2, 'TB', '2019-02-07 05:34:48', '2019-02-07 05:34:58'),
(3, 'HIV', '2019-02-07 05:35:07', '2019-02-07 05:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_list_models`
--

CREATE TABLE `doctor_list_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_models`
--

CREATE TABLE `doctor_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctor_models`
--

INSERT INTO `doctor_models` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Liliane Blanda', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(2, 'Mr. Delmer Zulauf', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(3, 'Clotilde Howell Sr.', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(4, 'Mr. Cody Feest III', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(5, 'Cheyanne Shields', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(6, 'Dr. Dorthy Wiegand DDS', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(7, 'Lilyan Sauer', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(8, 'Margarett Blick', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(9, 'Israel Olson I', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(10, 'Charles McDermott', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(11, 'Bridget Carter', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(12, 'Osbaldo Romaguera MD', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(13, 'Prof. Stanford O\'Connell Sr.', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(14, 'Gladys Grant III', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(15, 'Wade Mertz', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(16, 'Dr. Bryon Schimmel', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(17, 'Santino Rempel Jr.', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(18, 'Joseph Tremblay', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(19, 'Mr. Esteban McKenzie DDS', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(20, 'Alfonso Dare', '2019-02-07 05:11:15', '2019-02-07 05:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `ecg_examination_models`
--

CREATE TABLE `ecg_examination_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `patientId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referredBy` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ecg_examination_models`
--

INSERT INTO `ecg_examination_models` (`id`, `patientId`, `referredBy`, `age`, `date`, `remark`, `created_at`, `updated_at`) VALUES
(1, '1234', 'Wade Mertz', '12', '2019-02-11', 'ewfwefwe', '2019-02-11 00:30:13', '2019-02-11 00:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `general_blood_models`
--

CREATE TABLE `general_blood_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `patientId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referredBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `investigationAdvised` text COLLATE utf8_unicode_ci,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bloodFasting` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bloodRandom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bloodPP` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `urea` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creatinine` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uricAcid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `totalBilirubin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `directBilirubin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sgptAlt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sgotAst` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alkPhosphatase` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `totalProtein` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `albumin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `agRatio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `general_blood_models`
--

INSERT INTO `general_blood_models` (`id`, `patientId`, `referredBy`, `age`, `investigationAdvised`, `date`, `bloodFasting`, `bloodRandom`, `bloodPP`, `urea`, `creatinine`, `uricAcid`, `totalBilirubin`, `directBilirubin`, `sgptAlt`, `sgotAst`, `alkPhosphatase`, `totalProtein`, `albumin`, `agRatio`, `created_at`, `updated_at`) VALUES
(1, '1234', 'Wade Mertz', '12', 'CSACDESE', '2019-02-11', 'FEWF', 'FEWF', 'FEWF', 'FEWF', 'FEWF', 'EWF', 'FEF', 'FEW', NULL, NULL, 'FEF', 'F', 'FEF', 'FE', '2019-02-11 05:44:23', '2019-02-11 05:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `investigation_models`
--

CREATE TABLE `investigation_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `investigation_models`
--

INSERT INTO `investigation_models` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'LOW BP', '2019-02-07 05:31:35', '2019-02-07 05:31:35'),
(2, 'HIV INVESTIGATION', '2019-02-07 05:31:54', '2019-02-07 05:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `ipd_models`
--

CREATE TABLE `ipd_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `patientId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opdDate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ipdRegNum` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ipdRegDate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `consultant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otherConsultant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prefixName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `refName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wardName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bedNum` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dod` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `provisionalDiagnosis` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiefComplaints` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pastHistory` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fh_maternal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fh_paternal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fh_other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ge_gc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ge_anaemla` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ge_bowel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ge_pulse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ge_jvp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ge_sleep` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ge_temp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ge_oedema` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ge_allergies` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ge_resp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ge_cyanosis` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ge_skin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ge_bp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ge_thirst` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ge_tongue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ge_lymph` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ge_addictions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ge_conjective` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ge_throat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ge_diet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ge_appetite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ecgTest` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `respiratorySystem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gastroIntestinalSystem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cardioVascularSystem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centralNervousSystem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `localExamination` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `investigation1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `investigation2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `investigation3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `medicine1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `potency1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `medicine2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `potency2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `medicine3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `potency3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dietPlan1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diet1Text` text COLLATE utf8_unicode_ci,
  `dietPlan2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diet2Text` text COLLATE utf8_unicode_ci,
  `yoga` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `physiotherapy` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  `dltStatus` enum('N','Y') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ipd_models`
--

INSERT INTO `ipd_models` (`id`, `patientId`, `opdDate`, `ipdRegNum`, `ipdRegDate`, `consultant`, `otherConsultant`, `prefixName`, `refName`, `wardName`, `bedNum`, `dod`, `provisionalDiagnosis`, `chiefComplaints`, `pastHistory`, `fh_maternal`, `fh_paternal`, `fh_other`, `ge_gc`, `ge_anaemla`, `ge_bowel`, `ge_pulse`, `ge_jvp`, `ge_sleep`, `ge_temp`, `ge_oedema`, `ge_allergies`, `ge_resp`, `ge_cyanosis`, `ge_skin`, `ge_bp`, `ge_thirst`, `ge_tongue`, `ge_lymph`, `ge_addictions`, `ge_conjective`, `ge_throat`, `ge_diet`, `ge_appetite`, `ecgTest`, `respiratorySystem`, `gastroIntestinalSystem`, `cardioVascularSystem`, `centralNervousSystem`, `localExamination`, `investigation1`, `investigation2`, `investigation3`, `medicine1`, `potency1`, `medicine2`, `potency2`, `medicine3`, `potency3`, `dietPlan1`, `diet1Text`, `dietPlan2`, `diet2Text`, `yoga`, `physiotherapy`, `remark`, `dltStatus`, `created_at`, `updated_at`) VALUES
(2, '1234', '2019-02-07', '1234-ipd', '2019-02-08', '17', 'dr chadda', 'S/o', 'bti', '1', '7', '2019-02-13', 'fwefe', 'fwef', 'fef', 'fewf', 'fewf', 'rtghrth', 'gre', 'reg', 'reg', 'greg', 'rgeg', 'greg', 'greg', 'greg', 'gre', 'greg', 'greg', 'gre', 'greg', 'gre', 'rgeg', 'greg', 'gre', 'greg', 'greg', 'gre', 'gre', 'ecgTest', 'greg', 'greg', 'gre', 'rge', 'gre', '1', '1', '1', '1', '16', '2', '17', '2', '12', '1', 'greg', '2', 'greg', 'yoga', 'physiotherapy', 'gregerg', 'N', '2019-02-08 04:36:25', '2019-02-08 04:36:25'),
(3, '1268', '2019-02-08', '1313', '2019-02-14', '18', 'FREGVRDTGV', 'S/o', 'GREGREG', '1', '7', '2019-01-29', 'GREG', 'GREG', 'GREG', 'GREG', 'GREG', 'GREG', 'GRE', 'RGEWAG', 'GRE', 'ERG', 'GAeg', 'REGREG', 'REG', 'GE', 'GREG', 'GER', 'Gw', 'REG', 'GAREG', 'REGG', 'REG', 'GREG', 'REG', 'GEAg', 'ERGRE', 'REG', 'geWG', 'ecgTest', 'GREG', 'GREG', 'GREG', 'REG', 'GREG', '1', '1', '1', '2', '15', '2', '17', '2', '18', '1', 'GREG', '1', 'GREG', 'yoga', 'physiotherapy', 'GREGREG', 'N', '2019-02-14 00:03:16', '2019-02-14 00:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `ipd_treatment_models`
--

CREATE TABLE `ipd_treatment_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `patientId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ipdId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `refTo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complaint` text COLLATE utf8_unicode_ci,
  `treatment` text COLLATE utf8_unicode_ci NOT NULL,
  `treatment_date` date NOT NULL,
  `medicine` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `potency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nod` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `advice` text COLLATE utf8_unicode_ci,
  `remark` text COLLATE utf8_unicode_ci,
  `consultant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_models`
--

CREATE TABLE `medicine_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medicine_models`
--

INSERT INTO `medicine_models` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'COMPLIFLAM', '2019-02-07 05:33:28', '2019-02-07 05:33:28'),
(2, 'CROCIN', '2019-02-07 05:33:37', '2019-02-07 05:33:37'),
(3, 'HAJMOLA', '2019-02-07 05:33:45', '2019-02-07 05:33:45'),
(4, 'ACILOCK', '2019-02-07 05:34:09', '2019-02-07 05:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_07_110810_create_admin_setting_models_table', 1),
(4, '2019_01_07_112336_create_doctor_models_table', 1),
(5, '2019_01_07_114547_create_yoga_list_models_table', 1),
(6, '2019_01_09_050856_create_opd_models_table', 1),
(7, '2019_01_09_104952_create_blood_examination_models_table', 1),
(8, '2019_01_09_105058_create_ecg_examination_models_table', 1),
(9, '2019_01_09_105206_create_general_blood_models_table', 1),
(10, '2019_01_09_105239_create_investigation_models_table', 1),
(11, '2019_01_09_105311_create_ipd_models_table', 1),
(12, '2019_01_09_105344_create_ipd_treatment_models_table', 1),
(13, '2019_01_09_105410_create_medicine_models_table', 1),
(14, '2019_01_09_105450_create_opd_treatment_models_table', 1),
(15, '2019_01_09_105832_create_ot_models_table', 1),
(16, '2019_01_09_105918_create_physiotherapylist_models_table', 1),
(17, '2019_01_09_105935_create_physiotherapy_models_table', 1),
(18, '2019_01_09_105959_create_semene_examination_models_table', 1),
(19, '2019_01_09_110031_create_serum_of_widal_models_table', 1),
(20, '2019_01_09_110128_create_x_ray_models_table', 1),
(21, '2019_01_09_110216_create_yoga_models_table', 1),
(22, '2019_01_09_114648_create_stool_examination_models_table', 1),
(23, '2019_01_09_120624_create_urine_examination_models_table', 1),
(24, '2019_01_09_120719_create_user_registration_models_table', 1),
(25, '2019_01_25_123517_create_refrence_table', 1),
(26, '2019_02_05_045314_create_doctor_list_models_table', 1),
(27, '2019_02_05_045513_create_medicine_table', 1),
(28, '2019_02_05_045703_create_yogalist_table', 1),
(29, '2019_02_05_045733_create_ward_models_table', 1),
(30, '2019_02_05_045751_create_department_models_table', 1),
(31, '2019_02_05_045813_create_potency_models_table', 1),
(32, '2019_02_05_045844_create_diet_plan_models_table', 1),
(33, '2019_02_06_100319_add_name_to_potency_models', 1),
(34, '2019_02_06_130908_create_disease_models_table', 1),
(35, '2019_02_07_123842_add_treatment_date_to_opd_treatment_models', 2),
(36, '2019_02_07_192834_create_model_ward_models_table', 3),
(37, '2019_02_08_121425_add_treatment_date_to_ipd_treatment_models', 3),
(38, '2019_02_09_164536_add_referby_to_ot_models', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_ward_models`
--

CREATE TABLE `model_ward_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opd_models`
--

CREATE TABLE `opd_models` (
  `orderId` int(10) UNSIGNED NOT NULL,
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `patientTitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `patientName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regNum` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `regDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regAmount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contactNum` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `consultant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otherConsultant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `patientType` enum('O','N') COLLATE utf8_unicode_ci NOT NULL,
  `patientTypeIpd` enum('O','N') COLLATE utf8_unicode_ci NOT NULL,
  `dltStatus` enum('O','N') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `opd_models`
--

INSERT INTO `opd_models` (`orderId`, `id`, `patientTitle`, `patientName`, `regNum`, `regDate`, `regAmount`, `address`, `age`, `gender`, `contactNum`, `consultant`, `otherConsultant`, `department`, `patientType`, `patientTypeIpd`, `dltStatus`, `created_at`, `updated_at`) VALUES
(62, '1234', 'Mr.', 'pankaj maurya', '1234', '2019-02-07', NULL, 'noida', '12', 'Male Adult', NULL, '15', 'Dr Chaturvedi', '1', 'O', 'O', 'O', '2019-02-07 05:42:10', '2019-02-08 02:09:11'),
(65, '12345', 'Mr.', 'susmita', '12345', '2019-02-08', NULL, '12', '43', 'Male Adult', NULL, '16', 'dr archana', '2', 'O', 'O', 'O', '2019-02-08 01:54:45', '2019-02-08 02:12:27'),
(66, '1268', 'Mrs.', 'archana', '1268', '2019-02-08', NULL, 'noida sector 35', '23', 'Female Adult', NULL, '13', 'dgfdgsvdf', '3', 'O', 'O', 'O', '2019-02-08 01:55:15', '2019-02-08 04:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `opd_treatment_models`
--

CREATE TABLE `opd_treatment_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `patientId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `refTo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `complaint` text COLLATE utf8_unicode_ci NOT NULL,
  `treatment` text COLLATE utf8_unicode_ci NOT NULL,
  `medicine` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `potency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `treatment_date` date NOT NULL,
  `nod` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `advice` text COLLATE utf8_unicode_ci,
  `remark` text COLLATE utf8_unicode_ci,
  `consultant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `opd_treatment_models`
--

INSERT INTO `opd_treatment_models` (`id`, `patientId`, `refTo`, `complaint`, `treatment`, `medicine`, `potency`, `treatment_date`, `nod`, `advice`, `remark`, `consultant`, `created_at`, `updated_at`) VALUES
(1, '1234', 'DISPENSARY,OTHER HOSPITAL', 'bukhar hthytjh', '123456', '1', '7', '2019-02-07', '2', '1', 'feel better dnt be panic', '16', NULL, '2019-02-08 04:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `ot_models`
--

CREATE TABLE `ot_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `patientId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opdDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipdRegNum` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipdRegDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dignosis` text COLLATE utf8_unicode_ci,
  `otProcessure` text COLLATE utf8_unicode_ci,
  `consultant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referby` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `otherConsultant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adviceTreatment` text COLLATE utf8_unicode_ci,
  `medicine1` text COLLATE utf8_unicode_ci,
  `medicine2` text COLLATE utf8_unicode_ci,
  `medicine3` text COLLATE utf8_unicode_ci,
  `remark` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dltStatus` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `physiotherapylist_models`
--

CREATE TABLE `physiotherapylist_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `disease` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `therapy` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `physiotherapylist_models`
--

INSERT INTO `physiotherapylist_models` (`id`, `disease`, `therapy`, `created_at`, `updated_at`) VALUES
(14, '2', '123456', '2019-02-12 05:05:19', '2019-02-12 05:20:04'),
(15, '3', 'fdhsdfh', '2019-02-12 05:20:47', '2019-02-12 05:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `physiotherapy_models`
--

CREATE TABLE `physiotherapy_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `patientId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referredBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `investigationAdvised` text COLLATE utf8_unicode_ci,
  `phyadate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disease` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `therapy` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `physiotherapy_models`
--

INSERT INTO `physiotherapy_models` (`id`, `patientId`, `referredBy`, `age`, `investigationAdvised`, `phyadate`, `disease`, `therapy`, `other`, `remark`, `created_at`, `updated_at`) VALUES
(5, '1234', 'Santino Rempel Jr.', '12', NULL, '2019-02-13', '2', '123456', '123456', 'fghjt', '2019-02-12 05:58:43', '2019-02-12 06:26:40'),
(7, '1234', 'Santino Rempel Jr.', '12', NULL, '2019-02-12', '2', '123456', 'FEFREF', 'REGREGREGERG', '2019-02-12 06:28:37', '2019-02-12 06:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `potency_models`
--

CREATE TABLE `potency_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `potency_models`
--

INSERT INTO `potency_models` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dudley Lehner I', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(2, 'Mr. Johnathon Reynolds', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(3, 'Blaise Shanahan', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(4, 'Astrid Rippin', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(5, 'Damaris Murazik', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(6, 'Colby Bartell', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(7, 'Dr. Darrick Hayes', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(8, 'Jakayla Murphy', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(9, 'Lola Anderson', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(10, 'Sigurd Feil', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(11, 'Baron O\'Connell', '2019-02-07 05:11:15', '2019-02-07 05:11:15'),
(12, 'Lourdes Medhurst', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(13, 'Houston Brown', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(14, 'Tyrell Gutmann', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(15, 'Dominique Cruickshank', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(16, 'Amelia Nader', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(17, 'Mr. Jairo Kertzmann IV', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(18, 'Mr. Karson O\'Conner Jr.', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(19, 'Mallory McLaughlin Jr.', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(20, 'Donnie Heathcote', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(21, 'Garland Hudson', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(22, 'Russel O\'Hara', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(23, 'Devyn Rath', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(24, 'Rosendo Corkery DDS', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(25, 'Myrtie Dietrich', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(26, 'Carmel Lowe I', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(27, 'Amani Bergstrom', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(28, 'Dr. Alison Haley DDS', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(29, 'Brad Ferry', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(30, 'Elsie Walter', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(31, 'Webster Effertz', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(32, 'Maximillian Nikolaus', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(33, 'Sandy Daugherty', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(34, 'Prof. Bianka Mueller', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(35, 'Prof. Stella Marks II', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(36, 'Nettie Adams', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(37, 'Natalie Dickinson', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(38, 'Prof. Lazaro Nikolaus PhD', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(39, 'Geovanny Miller PhD', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(40, 'Lia Schiller IV', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(41, 'Nora Runolfsson', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(42, 'Reyna Jones', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(43, 'Noe Daniel III', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(44, 'Ms. Brandi Abshire Jr.', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(45, 'Rebeca Carter', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(46, 'Jamison Grady', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(47, 'Dr. Karley Glover DDS', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(48, 'Clark Waters', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(49, 'Logan Weissnat PhD', '2019-02-07 05:11:16', '2019-02-07 05:11:16'),
(50, 'Mr. Seamus Jones', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(51, 'Precious Hansen', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(52, 'Carmela Labadie DDS', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(53, 'Annamarie Hand', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(54, 'Gloria Bins', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(55, 'Linnie Witting IV', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(56, 'Jaiden Bins', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(57, 'Mabelle Swift', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(58, 'Reymundo Fahey', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(59, 'Dr. Albertha Gleason Sr.', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(60, 'Prof. Alexie Boyle', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(61, 'Maia D\'Amore', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(62, 'Prof. Clare Reichel DDS', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(63, 'Prof. Allan O\'Keefe I', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(64, 'Cora Abshire IV', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(65, 'Jalyn Zboncak', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(66, 'Dr. Trey Ritchie III', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(67, 'Rasheed Hodkiewicz', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(68, 'Mr. Reuben Kreiger III', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(69, 'Vernie Senger Jr.', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(70, 'Helga Stamm', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(71, 'Ms. Hilma Hickle', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(72, 'Jacey Moore', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(73, 'Virgil Crooks', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(74, 'Olaf Towne', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(75, 'Michaela Hintz', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(76, 'Faustino Weissnat', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(77, 'Lowell Mosciski', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(78, 'Bernita Ortiz', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(79, 'Chesley Doyle', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(80, 'Dr. Marilyne Moen DVM', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(81, 'Ms. Freida Reilly', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(82, 'Jadyn Bernier', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(83, 'Mrs. Rubye VonRueden III', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(84, 'Gwen Huels', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(85, 'Melvina Schmeler MD', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(86, 'Mrs. Autumn Nikolaus', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(87, 'Joanne West III', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(88, 'Dorcas Wolff', '2019-02-07 05:11:17', '2019-02-07 05:11:17'),
(89, 'Mr. Fritz Dach DDS', '2019-02-07 05:11:18', '2019-02-07 05:11:18'),
(90, 'Jermey Hintz', '2019-02-07 05:11:18', '2019-02-07 05:11:18'),
(91, 'Devon Boyle', '2019-02-07 05:11:18', '2019-02-07 05:11:18'),
(92, 'Florida Kilback III', '2019-02-07 05:11:18', '2019-02-07 05:11:18'),
(93, 'Harrison Bosco MD', '2019-02-07 05:11:18', '2019-02-07 05:11:18'),
(94, 'Bridie Stroman', '2019-02-07 05:11:18', '2019-02-07 05:11:18'),
(95, 'Mike Okuneva', '2019-02-07 05:11:18', '2019-02-07 05:11:18'),
(96, 'Janie Dach IV', '2019-02-07 05:11:18', '2019-02-07 05:11:18'),
(97, 'Demond Blick', '2019-02-07 05:11:18', '2019-02-07 05:11:18'),
(98, 'Miss Margaret McDermott V', '2019-02-07 05:11:18', '2019-02-07 05:11:18'),
(99, 'Dr. Stephen Marks', '2019-02-07 05:11:18', '2019-02-07 05:11:18'),
(100, 'Dr. Helga Krajcik', '2019-02-07 05:11:18', '2019-02-07 05:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `refrence`
--

CREATE TABLE `refrence` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `semene_examination_models`
--

CREATE TABLE `semene_examination_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `patientId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referredBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `investigationAdvised` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `placeOfCollection` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timeOfCollectionInLab` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `consistency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `colour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ph` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `liquficationTime` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `viscocity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `count` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `motility` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `abnormalForms` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pusCells` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `epithelialCells` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rbcs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fructoseTest` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `semene_examination_models`
--

INSERT INTO `semene_examination_models` (`id`, `patientId`, `referredBy`, `age`, `investigationAdvised`, `date`, `placeOfCollection`, `timeOfCollectionInLab`, `quantity`, `consistency`, `colour`, `ph`, `liquficationTime`, `viscocity`, `count`, `motility`, `abnormalForms`, `pusCells`, `epithelialCells`, `rbcs`, `fructoseTest`, `other`, `created_at`, `updated_at`) VALUES
(3, '1234', 'Wade Mertz', '12', 'fw2fwe', '2019-02-11', 'fewf', 'fewf', 'fewf', 'wef', 'ewf', 'hytfhtrfh', 'htrh', 'htrh', 'htrh', 'htrh', 'htrh', 'htrh', 'htrh', 'thrh', 'htrh', 'htrhtrh', '2019-02-11 05:56:51', '2019-02-11 05:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `serum_of_widal_models`
--

CREATE TABLE `serum_of_widal_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `patientId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referredBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `investigationAdvised` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sTyphiO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sTyphiH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sTyphiAH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sTyphiBH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `impression` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `serum_of_widal_models`
--

INSERT INTO `serum_of_widal_models` (`id`, `patientId`, `referredBy`, `age`, `investigationAdvised`, `date`, `sTyphiO`, `sTyphiH`, `sTyphiAH`, `sTyphiBH`, `impression`, `created_at`, `updated_at`) VALUES
(1, '1234', 'Wade Mertz', '12', 'dewfdewf', '2019-02-11', 'fewf', 'fewf', 'fewf', 'fewf', 'fewfe', '2019-02-11 02:01:51', '2019-02-11 02:01:51');

-- --------------------------------------------------------

--
-- Table structure for table `stool_examination_models`
--

CREATE TABLE `stool_examination_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `patientId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referredBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `investigationAdvised` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `colour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `consistency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucus` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blood` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pusCells` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rbcs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vegetableMatter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cysts` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giardia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eHistolytica` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eCoil` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ova` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `worms` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `occultBlood` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reducingSubstances` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stool_examination_models`
--

INSERT INTO `stool_examination_models` (`id`, `patientId`, `referredBy`, `age`, `investigationAdvised`, `date`, `colour`, `consistency`, `mucus`, `blood`, `pusCells`, `rbcs`, `vegetableMatter`, `cysts`, `giardia`, `eHistolytica`, `eCoil`, `ova`, `worms`, `occultBlood`, `reducingSubstances`, `other`, `created_at`, `updated_at`) VALUES
(1, '1234', 'Wade Mertz', '12', 'fergfreg', '2019-02-11', 'gregre', 'greg', 'greg', 'greg', 'greg', 'greg', 'greg', 'greg', 'greg', 'greg', 'greg', 'greg', 'greg', 'greg', 'greg', 'greg', '2019-02-11 02:31:36', '2019-02-11 02:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `urine_examination_models`
--

CREATE TABLE `urine_examination_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `patientId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referredBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `investigationAdvised` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sample` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `colour` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `spGravity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reaction` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `albumin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `suger` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bileSalts` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bilePigments` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `acetone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `benceJonesProteins` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pusCells` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `epithellalCells` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `crystals` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rbs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bacteria` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cast` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `others` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `urine_examination_models`
--

INSERT INTO `urine_examination_models` (`id`, `patientId`, `referredBy`, `age`, `investigationAdvised`, `date`, `sample`, `quantity`, `colour`, `spGravity`, `reaction`, `albumin`, `suger`, `bileSalts`, `bilePigments`, `acetone`, `benceJonesProteins`, `pusCells`, `epithellalCells`, `crystals`, `rbs`, `bacteria`, `cast`, `others`, `created_at`, `updated_at`) VALUES
(2, '1234', 'Wade Mertz', '12', 'cewf', '2019-02-11', 'ceaswc', NULL, 'fewf', 'few', 'few', 'fewf', 'fewf', 'scsdc', 'ceaswf', 'efewf', NULL, NULL, 'fewf', 'fewf', 'fewf', 'few', 'few', 'ffewfe', '2019-02-11 04:58:41', '2019-02-11 04:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userType` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userImage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `userType`, `email`, `password`, `mobile`, `website`, `userImage`, `status`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'pankaj maurya', 'admin', 'pankajmaurya138@gmail.com', '$2y$10$uSiCWJnN35UIK4NYH1AuDeUbX0WqTCQRX42G4hOITHBBJfNg0I/4q', '', '', NULL, '1', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_registration_models`
--

CREATE TABLE `user_registration_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ward_models`
--

CREATE TABLE `ward_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ward_models`
--

INSERT INTO `ward_models` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'rger', '2019-02-07 23:18:43', '2019-02-07 23:18:43'),
(2, 'rtgh', '2019-02-07 23:18:49', '2019-02-07 23:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `x_ray_models`
--

CREATE TABLE `x_ray_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `patientId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referredBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `investigationAdvised` text COLLATE utf8_unicode_ci,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `x_ray_models`
--

INSERT INTO `x_ray_models` (`id`, `patientId`, `referredBy`, `age`, `investigationAdvised`, `date`, `description`, `remark`, `created_at`, `updated_at`) VALUES
(1, '1234', 'Wade Mertz', '12', 'xsaxcsa', '2019-02-11', 'csac', 'csacs', '2019-02-11 05:10:21', '2019-02-11 05:10:21'),
(2, '1234', 'Wade Mertz', '12', 'fwefew', '2019-02-11', 'fewf', 'fewf', '2019-02-11 05:12:23', '2019-02-11 05:12:23'),
(3, '1234', 'Wade Mertz', '12', 'csdcsdc', '2019-02-11', 'cdscsd', 'cds', '2019-02-11 05:12:53', '2019-02-11 05:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `yogalist`
--

CREATE TABLE `yogalist` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `yoga_list_models`
--

CREATE TABLE `yoga_list_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `disease` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `exersise` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `yoga_list_models`
--

INSERT INTO `yoga_list_models` (`id`, `disease`, `exersise`, `created_at`, `updated_at`) VALUES
(12, '2', 'DHANURASHAN', '2019-02-07 05:39:21', '2019-02-07 05:39:21'),
(13, '2', 'DHANURASHAN1', '2019-02-07 05:39:33', '2019-02-07 05:39:33'),
(14, '3', 'KUCH NHI HOGA', '2019-02-07 05:39:56', '2019-02-07 05:39:56'),
(15, '3', 'HO HI NHI SKTA', '2019-02-07 05:40:10', '2019-02-07 05:40:10'),
(16, '3', 'KBHI HOGA HI NHI', '2019-02-07 05:40:23', '2019-02-07 05:40:23'),
(17, '1', 'DO ANYTHING', '2019-02-12 02:19:06', '2019-02-12 02:19:06'),
(18, '1', 'ANY', '2019-02-12 02:21:10', '2019-02-12 02:21:10'),
(19, '1', 'ANY2', '2019-02-12 02:21:37', '2019-02-12 02:21:37'),
(20, '1', 'any3', '2019-02-12 02:23:24', '2019-02-12 02:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `yoga_models`
--

CREATE TABLE `yoga_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `patientId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referredBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `investigationAdvised` text COLLATE utf8_unicode_ci,
  `yogadate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disease` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `exersise` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `yoga_models`
--

INSERT INTO `yoga_models` (`id`, `patientId`, `referredBy`, `age`, `investigationAdvised`, `yogadate`, `disease`, `exersise`, `other`, `remark`, `created_at`, `updated_at`) VALUES
(5, '1234', 'Santino Rempel Jr.', '12', NULL, '2019-02-12', '3', 'KUCH NHI HOGA,HO HI NHI SKTA,KBHI HOGA HI NHI', '123', '456', '2019-02-12 00:25:13', '2019-02-12 01:53:44'),
(6, '1234', 'Santino Rempel Jr.', '12', NULL, '2019-02-12', '2', 'DHANURASHAN,DHANURASHAN1', 'ergreg', 'ergerg', '2019-02-12 00:27:35', '2019-02-12 00:27:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_setting_models`
--
ALTER TABLE `admin_setting_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_examination_models`
--
ALTER TABLE `blood_examination_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_models`
--
ALTER TABLE `department_models`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department_models_name_unique` (`name`);

--
-- Indexes for table `diet_plan_models`
--
ALTER TABLE `diet_plan_models`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `diet_plan_models_name_unique` (`name`);

--
-- Indexes for table `disease_models`
--
ALTER TABLE `disease_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_list_models`
--
ALTER TABLE `doctor_list_models`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctor_list_models_name_unique` (`name`);

--
-- Indexes for table `doctor_models`
--
ALTER TABLE `doctor_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecg_examination_models`
--
ALTER TABLE `ecg_examination_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_blood_models`
--
ALTER TABLE `general_blood_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investigation_models`
--
ALTER TABLE `investigation_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipd_models`
--
ALTER TABLE `ipd_models`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ipd_models_patientid_unique` (`patientId`);

--
-- Indexes for table `ipd_treatment_models`
--
ALTER TABLE `ipd_treatment_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `medicine_name_unique` (`name`);

--
-- Indexes for table `medicine_models`
--
ALTER TABLE `medicine_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_ward_models`
--
ALTER TABLE `model_ward_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opd_models`
--
ALTER TABLE `opd_models`
  ADD PRIMARY KEY (`orderId`),
  ADD UNIQUE KEY `opd_models_id_unique` (`id`),
  ADD UNIQUE KEY `opd_models_regnum_unique` (`regNum`);

--
-- Indexes for table `opd_treatment_models`
--
ALTER TABLE `opd_treatment_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ot_models`
--
ALTER TABLE `ot_models`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ot_models_patientid_unique` (`patientId`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `physiotherapylist_models`
--
ALTER TABLE `physiotherapylist_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `physiotherapy_models`
--
ALTER TABLE `physiotherapy_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `potency_models`
--
ALTER TABLE `potency_models`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `potency_models_name_unique` (`name`);

--
-- Indexes for table `refrence`
--
ALTER TABLE `refrence`
  ADD UNIQUE KEY `refrence_id_unique` (`id`);

--
-- Indexes for table `semene_examination_models`
--
ALTER TABLE `semene_examination_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serum_of_widal_models`
--
ALTER TABLE `serum_of_widal_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stool_examination_models`
--
ALTER TABLE `stool_examination_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urine_examination_models`
--
ALTER TABLE `urine_examination_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_registration_models`
--
ALTER TABLE `user_registration_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ward_models`
--
ALTER TABLE `ward_models`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ward_models_name_unique` (`name`);

--
-- Indexes for table `x_ray_models`
--
ALTER TABLE `x_ray_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yogalist`
--
ALTER TABLE `yogalist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `yogalist_name_unique` (`name`);

--
-- Indexes for table `yoga_list_models`
--
ALTER TABLE `yoga_list_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yoga_models`
--
ALTER TABLE `yoga_models`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_setting_models`
--
ALTER TABLE `admin_setting_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blood_examination_models`
--
ALTER TABLE `blood_examination_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department_models`
--
ALTER TABLE `department_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `diet_plan_models`
--
ALTER TABLE `diet_plan_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `disease_models`
--
ALTER TABLE `disease_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctor_list_models`
--
ALTER TABLE `doctor_list_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_models`
--
ALTER TABLE `doctor_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ecg_examination_models`
--
ALTER TABLE `ecg_examination_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_blood_models`
--
ALTER TABLE `general_blood_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `investigation_models`
--
ALTER TABLE `investigation_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ipd_models`
--
ALTER TABLE `ipd_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ipd_treatment_models`
--
ALTER TABLE `ipd_treatment_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine_models`
--
ALTER TABLE `medicine_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `model_ward_models`
--
ALTER TABLE `model_ward_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opd_models`
--
ALTER TABLE `opd_models`
  MODIFY `orderId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `opd_treatment_models`
--
ALTER TABLE `opd_treatment_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ot_models`
--
ALTER TABLE `ot_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `physiotherapylist_models`
--
ALTER TABLE `physiotherapylist_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `physiotherapy_models`
--
ALTER TABLE `physiotherapy_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `potency_models`
--
ALTER TABLE `potency_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `semene_examination_models`
--
ALTER TABLE `semene_examination_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `serum_of_widal_models`
--
ALTER TABLE `serum_of_widal_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stool_examination_models`
--
ALTER TABLE `stool_examination_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `urine_examination_models`
--
ALTER TABLE `urine_examination_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_registration_models`
--
ALTER TABLE `user_registration_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ward_models`
--
ALTER TABLE `ward_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `x_ray_models`
--
ALTER TABLE `x_ray_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `yogalist`
--
ALTER TABLE `yogalist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `yoga_list_models`
--
ALTER TABLE `yoga_list_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `yoga_models`
--
ALTER TABLE `yoga_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
