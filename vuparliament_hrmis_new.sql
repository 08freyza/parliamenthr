-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 12:32 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vuparliament_hrmis_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(24) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ot` varchar(10) DEFAULT NULL,
  `lunch_out` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lunch_in` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `absenrevision`
--

CREATE TABLE `absenrevision` (
  `id` int(11) NOT NULL,
  `emp_no` varchar(24) DEFAULT NULL,
  `absen_id` int(11) DEFAULT NULL,
  `new_start_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `new_end_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `new_lunch_out` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `new_lunch_in` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `old_start_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `old_end_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `old_lunch_out` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `old_lunch_in` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `note` text DEFAULT NULL,
  `created_id` varchar(24) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `allowance`
--

CREATE TABLE `allowance` (
  `id` bigint(20) NOT NULL,
  `allowance_name` varchar(255) DEFAULT NULL,
  `value` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ass_emp`
--

CREATE TABLE `ass_emp` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(24) DEFAULT NULL,
  `asses_for` varchar(24) DEFAULT NULL,
  `ass_title` varchar(2000) DEFAULT NULL,
  `score` int(11) DEFAULT 0,
  `score_max` int(11) DEFAULT NULL,
  `answered` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ass_emp_detail`
--

CREATE TABLE `ass_emp_detail` (
  `id` bigint(20) NOT NULL,
  `ass_id` int(11) DEFAULT NULL,
  `ass_for` varchar(24) DEFAULT NULL,
  `question` varchar(10000) DEFAULT NULL,
  `answer` text CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `award_cat`
--

CREATE TABLE `award_cat` (
  `id` bigint(20) NOT NULL,
  `award_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `award_cat`
--

INSERT INTO `award_cat` (`id`, `award_name`) VALUES
(6, 'Employee of the Year'),
(7, 'Employee of the Month');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book_main`
--

CREATE TABLE `book_main` (
  `id` bigint(20) NOT NULL,
  `booking_no` varchar(20) NOT NULL,
  `requester` varchar(24) DEFAULT NULL,
  `request_for` varchar(24) DEFAULT NULL,
  `resource_type` int(11) DEFAULT NULL,
  `resource_name` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `notes` text DEFAULT NULL,
  `asset_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_main`
--

INSERT INTO `book_main` (`id`, `booking_no`, `requester`, `request_for`, `resource_type`, `resource_name`, `quantity`, `start_date`, `end_date`, `notes`, `asset_id`) VALUES
(4, 'BK00000000001', 'admin@vanuatuparliamenth', 'EMP000003', 5, 1, 19, '2023-05-08 01:38:35', '2023-05-08 01:38:35', '-', 'CH01'),
(5, 'BK00000000002', 'admin@vanuatuparliamenth', 'EMP000001', 19, 1, 20, '2023-05-08 01:38:51', '2023-05-08 01:38:51', '-', 'CH02'),
(6, 'BK00000000003', 'admin@vanuatuparliamenth', 'EMP000003', 18, 2, 10, '2023-05-08 01:43:08', '2023-05-08 01:43:08', '-', 'CH03');

--
-- Triggers `book_main`
--
DELIMITER $$
CREATE TRIGGER `tg_book_main_insert` BEFORE INSERT ON `book_main` FOR EACH ROW BEGIN
  INSERT INTO book_seq_numbering VALUES (NULL);
  SET NEW.booking_no = CONCAT('BK', LPAD(LAST_INSERT_ID(), 11, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `book_seq_numbering`
--

CREATE TABLE `book_seq_numbering` (
  `id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_seq_numbering`
--

INSERT INTO `book_seq_numbering` (`id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `book_type`
--

CREATE TABLE `book_type` (
  `id` bigint(20) NOT NULL,
  `type_desc` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_type`
--

INSERT INTO `book_type` (`id`, `type_desc`) VALUES
(4, 'Cars'),
(5, 'Chairs'),
(6, 'Tent'),
(7, 'Tables'),
(8, 'RV 2 Admin 1'),
(9, 'RV 2 Admin 2'),
(10, 'RV 2 Admin 3'),
(11, 'RV 2 Admin 4'),
(12, 'RV 2 Admin 5'),
(13, 'RV 2 Admin 6'),
(14, 'Speaker Conference Room'),
(15, 'Opposition Conference Room'),
(16, 'Government Conference Room'),
(17, 'Library Conference Room'),
(18, 'Laptop'),
(19, 'External Hard Drive');

-- --------------------------------------------------------

--
-- Table structure for table `book_type_name`
--

CREATE TABLE `book_type_name` (
  `id` bigint(20) NOT NULL,
  `res_type` int(11) DEFAULT NULL,
  `res_type_id` int(11) DEFAULT NULL,
  `res_type_name` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_type_name`
--

INSERT INTO `book_type_name` (`id`, `res_type`, `res_type_id`, `res_type_name`) VALUES
(1, 4, 1, 'Mitsubishi Pajero Sport'),
(2, 16, 1, 'Main Meeting Room'),
(3, 18, 1, 'Acer'),
(4, 18, 2, 'Asus'),
(5, 5, 1, 'Poliform'),
(6, 19, 1, 'Sandisk');

-- --------------------------------------------------------

--
-- Table structure for table `comp_locat`
--

CREATE TABLE `comp_locat` (
  `id` bigint(20) NOT NULL,
  `locat_desc` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comp_locat`
--

INSERT INTO `comp_locat` (`id`, `locat_desc`) VALUES
(3, 'Port Vila'),
(4, 'Luganville'),
(5, 'Lenakel'),
(6, 'Lakatoro');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` bigint(20) NOT NULL,
  `name` varchar(24) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `name`, `value`) VALUES
(1, 'company_name', 'CNS Ltd.'),
(2, 'employee_code', 'DOI');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` bigint(20) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`) VALUES
(3, 'Vanuatu');

-- --------------------------------------------------------

--
-- Table structure for table `disciple_cat`
--

CREATE TABLE `disciple_cat` (
  `id` bigint(20) NOT NULL,
  `disciple_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disciple_cat`
--

INSERT INTO `disciple_cat` (`id`, `disciple_name`) VALUES
(1, 'Warning Letter 1'),
(2, 'Warning Letter 2'),
(3, 'Warning Letter 3'),
(4, 'Verbal Warning'),
(5, 'Inappropriate Behaviour Warning'),
(6, 'Office Non-Smoking Violation');

-- --------------------------------------------------------

--
-- Table structure for table `edu_inst`
--

CREATE TABLE `edu_inst` (
  `id` bigint(20) NOT NULL,
  `inst_name` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `edu_level`
--

CREATE TABLE `edu_level` (
  `id` bigint(20) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `edu_level`
--

INSERT INTO `edu_level` (`id`, `level`) VALUES
(1, 'Masters'),
(2, 'Degree'),
(3, 'Diploma'),
(4, 'Certificate');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(24) DEFAULT NULL,
  `emp_name` varchar(2000) DEFAULT NULL,
  `login_id` int(11) NOT NULL,
  `account_no` bigint(20) NOT NULL,
  `official_name` varchar(2000) DEFAULT NULL,
  `active_status` enum('Y','N') DEFAULT NULL,
  `emp_status` int(11) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `marital_status` int(11) DEFAULT 1,
  `birthday` date DEFAULT NULL,
  `place_birthday` varchar(10000) DEFAULT NULL,
  `joindate` date DEFAULT NULL,
  `eoc` date DEFAULT NULL,
  `religion` int(11) DEFAULT 1,
  `qualifications` text DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `title` int(11) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `salary_grade` varchar(50) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `blood_type` varchar(5) DEFAULT NULL,
  `hospitalized` text DEFAULT NULL,
  `medicalcond` text DEFAULT NULL,
  `shoes` varchar(5) DEFAULT NULL,
  `medicaltestnotes` text DEFAULT NULL,
  `pants` varchar(5) DEFAULT NULL,
  `medtest` int(11) DEFAULT NULL,
  `cloth` varchar(5) DEFAULT NULL,
  `weight` varchar(5) DEFAULT NULL,
  `headsize` varchar(5) DEFAULT NULL,
  `height` varchar(5) DEFAULT NULL,
  `vnpf` varchar(10) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `province` varchar(100) NOT NULL,
  `island` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL,
  `mobile_phone` varchar(20) DEFAULT NULL,
  `home_phone` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `department` bigint(20) DEFAULT NULL,
  `ministry` bigint(20) DEFAULT NULL,
  `division` bigint(20) DEFAULT NULL,
  `is_vnpf` varchar(5) DEFAULT NULL,
  `is_emp` varchar(5) DEFAULT NULL,
  `bankid` bigint(20) DEFAULT NULL,
  `keen` bigint(20) DEFAULT NULL,
  `keendate` date DEFAULT NULL,
  `fingerid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_no`, `emp_name`, `login_id`, `account_no`, `official_name`, `active_status`, `emp_status`, `gender`, `marital_status`, `birthday`, `place_birthday`, `joindate`, `eoc`, `religion`, `qualifications`, `location`, `unit`, `title`, `grade`, `salary_grade`, `bank_name`, `blood_type`, `hospitalized`, `medicalcond`, `shoes`, `medicaltestnotes`, `pants`, `medtest`, `cloth`, `weight`, `headsize`, `height`, `vnpf`, `address`, `province`, `island`, `language`, `mobile_phone`, `home_phone`, `email`, `department`, `ministry`, `division`, `is_vnpf`, `is_emp`, `bankid`, `keen`, `keendate`, `fingerid`) VALUES
(283, 'EMP000000', 'admin', 1, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(285, 'EMP000001', 'Estella Jonas BANGA', 35, 0, NULL, 'Y', NULL, 'female', 5, '1988-11-20', NULL, '2021-02-02', NULL, 15, NULL, NULL, NULL, 170, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '7770', NULL, NULL, 61, 3, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(286, 'EMP000002', 'Maxime V. BANGA', 36, 0, NULL, 'Y', NULL, 'male', 6, '1991-12-22', NULL, '2021-03-01', NULL, 14, NULL, NULL, NULL, 174, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1098793', NULL, '', '', '', '7759013', NULL, NULL, 60, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1098793),
(287, 'EMP000003', 'Albano LOLTEN', 38, 0, NULL, 'Y', NULL, 'male', 5, '1977-06-26', NULL, '2019-02-20', NULL, 3, NULL, NULL, NULL, 179, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0644286', NULL, '', '', '', '7755561', NULL, NULL, 48, 3, NULL, NULL, NULL, NULL, NULL, NULL, 644286),
(288, 'EMP000004', 'Roslyn JIMMY', 39, 0, NULL, 'Y', NULL, 'female', 6, '0000-00-00', NULL, '2012-06-30', NULL, 13, NULL, NULL, NULL, 176, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '800748', NULL, '', '', '', '7500570', NULL, NULL, 59, 3, NULL, NULL, NULL, NULL, NULL, NULL, 800748),
(289, 'EMP000005', 'Leon TETER', 40, 0, NULL, 'Y', NULL, 'male', 5, '0000-00-00', NULL, '2007-07-17', NULL, 3, NULL, NULL, NULL, 175, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '551127', NULL, '', '', '', '7716108', NULL, NULL, 58, 3, NULL, NULL, NULL, NULL, NULL, NULL, 551127),
(290, 'EMP000006', 'Ezra Raymond DICK', 41, 0, NULL, 'Y', NULL, 'male', 5, '1977-02-08', NULL, '2021-06-14', NULL, 7, NULL, NULL, NULL, 178, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '600445', NULL, '', '', '', '7743994', NULL, NULL, 47, 3, NULL, NULL, NULL, NULL, NULL, NULL, 600445),
(291, 'EMP000007', 'Joel JONAS', 42, 0, NULL, 'Y', NULL, 'male', 5, '1979-09-14', NULL, '2020-12-01', NULL, 7, NULL, NULL, NULL, 181, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1063970', NULL, '', '', '', '7751479', NULL, NULL, 54, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1063970),
(295, 'EMP000011', 'Jessy OBED', 46, 0, NULL, 'Y', NULL, 'male', 10, '1973-07-15', NULL, '2022-05-09', NULL, 15, NULL, NULL, NULL, 189, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4594156', NULL, '', '', '', '7698176', NULL, NULL, 63, 3, NULL, NULL, NULL, NULL, NULL, NULL, 4594156),
(296, 'EMP000012', 'Joan CHARLIE', 47, 0, NULL, 'Y', NULL, 'female', 6, '1998-05-27', NULL, '2023-01-16', NULL, 2, NULL, NULL, NULL, 169, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1105991', NULL, '', '', '', '7618113', NULL, NULL, 63, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1105991),
(297, 'EMP000013', 'Joelyne GEORGE', 50, 0, NULL, 'Y', NULL, 'female', 7, '1995-04-07', NULL, '2022-12-15', NULL, 2, NULL, NULL, NULL, 211, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1090227', NULL, '', '', '', '5430733', NULL, NULL, 49, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1090227),
(298, 'EMP000014', 'John GRAHAM', 55, 0, NULL, 'Y', NULL, 'male', 5, '2023-02-16', NULL, '2018-08-10', NULL, 2, NULL, NULL, NULL, 219, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '168005', NULL, '', '', '', '5430733', NULL, NULL, 63, 3, NULL, NULL, NULL, NULL, NULL, NULL, 168005),
(299, 'EMP000015', 'Jonah TOAKANASE', 58, 0, NULL, 'Y', NULL, 'male', 10, '1953-03-29', NULL, '2022-12-12', NULL, 15, NULL, NULL, NULL, 220, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '595975', NULL, '', '', '', '7719437', NULL, NULL, 65, 3, NULL, NULL, NULL, NULL, NULL, NULL, 595975),
(300, 'EMP000015', 'Paola MOLKAS', 48, 0, NULL, 'N', NULL, 'female', 8, '2023-02-16', NULL, '2017-06-15', NULL, 3, NULL, NULL, NULL, 182, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1087710', NULL, '', '', '', '7741973', NULL, NULL, 61, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1087710),
(301, 'EMP000016', 'Pascal KAPERE', 49, 0, NULL, 'Y', NULL, 'male', 8, '1968-09-04', NULL, '2008-01-08', NULL, 3, NULL, NULL, NULL, 183, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '326447', NULL, '', '', '', '7330137', NULL, NULL, 47, 3, NULL, NULL, NULL, NULL, NULL, NULL, 326447),
(302, 'EMP000017', 'Joseph Peter TITONGA', 51, 0, NULL, 'Y', NULL, 'male', 5, '1982-06-19', NULL, '2021-03-01', NULL, 2, NULL, NULL, NULL, 184, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1066846', NULL, '', '', '', '7753790', NULL, NULL, 61, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1066846),
(303, 'EMP000017', 'Leila LAURET', 61, 0, NULL, 'N', NULL, 'female', 7, '1988-06-26', NULL, '2012-04-24', NULL, 2, NULL, NULL, NULL, 223, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1073031', NULL, '', '', '', '5315056', NULL, NULL, 59, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1073031),
(304, 'EMP000018', 'Lorine SESE', 63, 0, NULL, 'Y', NULL, 'female', 5, '2023-02-16', NULL, '2009-02-23', NULL, 3, NULL, NULL, NULL, 225, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '476200', NULL, '', '', '', '7745409', NULL, NULL, 49, 3, NULL, NULL, NULL, NULL, NULL, NULL, 476200),
(305, 'EMP000019', 'Speaker of Parliament', 95, 0, NULL, 'Y', NULL, 'male', 5, '0000-00-00', NULL, '0000-00-00', NULL, 2, NULL, NULL, NULL, 172, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '22229', NULL, NULL, 64, 3, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(306, 'EMP000020', 'Raymond MANUAKE', 94, 0, NULL, 'N', NULL, 'male', 5, '0000-00-00', NULL, '2018-08-24', NULL, 2, NULL, NULL, NULL, 173, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '154757', NULL, '', '', '', '22229', NULL, NULL, 65, 3, NULL, NULL, NULL, NULL, NULL, NULL, 154757),
(307, 'EMP000020', 'Michelline MATALUE', 69, 0, NULL, 'Y', NULL, 'female', 6, '2020-05-10', NULL, '2022-12-16', NULL, 2, NULL, NULL, NULL, 230, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1124804', NULL, '', '', '', '5366590', NULL, NULL, 48, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1124804),
(308, 'EMP000020', 'Arielle Agath TARY', 91, 0, NULL, 'N', NULL, 'female', 5, '1976-12-31', NULL, '2008-01-08', NULL, 3, NULL, NULL, NULL, 199, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '641118', NULL, '', '', '', '7633323', NULL, NULL, 60, 3, NULL, NULL, NULL, NULL, NULL, NULL, 641118),
(309, 'EMP000021', 'Parliamentary Management Board', 96, 0, NULL, 'N', NULL, 'male', 10, '0000-00-00', NULL, '0000-00-00', NULL, 2, NULL, NULL, NULL, 231, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '', '22229', NULL, NULL, 64, 3, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(310, 'EMP000021', 'Bordes ALPI', 90, 0, NULL, 'Y', NULL, 'male', 6, '2023-02-16', NULL, '2019-02-20', NULL, 15, NULL, NULL, NULL, 202, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1102951', NULL, '', '', '', '7608426', NULL, NULL, 59, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1102951),
(311, 'EMP000022', 'Milenka CALO', 70, 0, NULL, 'N', NULL, 'female', 7, '1992-01-20', NULL, '2020-12-14', NULL, 2, NULL, NULL, NULL, 232, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1114691', NULL, '', '', '', '7752991', NULL, NULL, 67, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1114691),
(312, 'EMP000022', 'Elsie TORE', 89, 0, NULL, 'Y', NULL, 'female', 7, '1995-04-29', NULL, '2020-12-14', NULL, 2, NULL, NULL, NULL, 205, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1114768', NULL, '', '', '', '7319468', NULL, NULL, 58, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1114768),
(313, 'EMP000023', 'Nathalie LABAN', 72, 0, NULL, 'Y', NULL, 'female', 7, '1996-01-26', NULL, '2023-02-20', NULL, 2, NULL, NULL, NULL, 233, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1119337', NULL, '', '', '', '7692245', NULL, NULL, 55, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1119337),
(314, 'EMP000023', 'Robin SINGO', 52, 0, NULL, 'N', NULL, 'male', 7, '1996-09-30', NULL, '2019-02-27', NULL, 3, NULL, NULL, NULL, 185, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1100533', NULL, '', '', '', '5309296', NULL, NULL, 61, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1100533),
(315, 'EMP000024', 'Evelyn WOKON', 87, 0, NULL, 'N', NULL, 'female', 8, '1980-01-14', NULL, '2008-01-08', NULL, 3, NULL, NULL, NULL, 209, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '806208', NULL, '', '', '', '7633202', NULL, NULL, 59, 3, NULL, NULL, NULL, NULL, NULL, NULL, 806208),
(316, 'EMP000024', 'Marie Estelle ROSSBONG', 53, 0, NULL, 'Y', NULL, 'female', 7, '1990-05-04', NULL, '2020-01-17', NULL, 3, NULL, NULL, NULL, 186, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1085468', NULL, '', '', '', '7786240', NULL, NULL, 61, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1085468),
(317, 'EMP000025', 'Franco ATINGTING', 85, 0, NULL, 'Y', NULL, 'male', 6, '1988-08-17', NULL, '2018-08-28', NULL, 3, NULL, NULL, NULL, 210, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1101680', NULL, '', '', '', '7317734', NULL, NULL, 61, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1101680),
(318, 'EMP000025', 'Gaetan RURU', 54, 0, NULL, 'N', NULL, 'male', 7, '1964-11-03', NULL, '2010-05-10', NULL, 2, NULL, NULL, NULL, 187, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '584987', NULL, '', '', '', '7694921', NULL, NULL, 65, 3, NULL, NULL, NULL, NULL, NULL, NULL, 584987),
(319, 'EMP000026', 'Sendrela ABBIE', 56, 0, NULL, 'N', NULL, 'female', 5, '0000-00-00', NULL, '2018-05-24', NULL, 2, NULL, NULL, NULL, 188, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1085513', NULL, '', '', '', '7764250', NULL, NULL, 61, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1085513),
(320, 'EMP000026', 'Nirose SILAS', 73, 0, NULL, 'Y', NULL, 'female', 5, '1971-04-14', NULL, '2018-03-13', NULL, 15, NULL, NULL, NULL, 234, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5384554', NULL, '', '', '', '5384554', NULL, NULL, 58, 3, NULL, NULL, NULL, NULL, NULL, NULL, 5384554),
(321, 'EMP000027', 'Serah THOMAS', 0, 0, NULL, 'Y', NULL, 'female', 5, '1979-03-16', NULL, '2020-12-14', NULL, 3, NULL, NULL, NULL, 190, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1109053', NULL, '', '', '', '7788664', NULL, NULL, 49, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1109053),
(322, 'EMP000028', 'Stanley John FRED', 60, 0, NULL, 'Y', NULL, 'male', 6, '1989-09-11', NULL, '2022-12-13', NULL, 2, NULL, NULL, NULL, 191, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1072869', NULL, '', '', '', '7332272', NULL, NULL, 64, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1072869),
(323, 'EMP000027', 'George BAGE', 84, 0, NULL, 'N', NULL, 'male', 5, '1989-06-25', NULL, '2015-04-15', NULL, 18, NULL, NULL, NULL, 212, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1087053', NULL, '', '', '', '7792250', NULL, NULL, 57, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1087053),
(324, 'EMP000029', 'Stephanie CARLOT', 62, 0, NULL, 'Y', NULL, 'female', 6, '2000-09-01', NULL, '2020-12-14', NULL, 2, NULL, NULL, NULL, 192, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1114769', NULL, '', '', '', '7799011', NULL, NULL, 57, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1114769),
(325, 'EMP000030', 'Stephanie MAHIT', 64, 0, NULL, 'Y', NULL, 'female', 7, '1983-03-04', NULL, '2008-01-08', NULL, 2, NULL, NULL, NULL, 199, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '801316', NULL, '', '', '', '5490855', NULL, NULL, 61, 3, NULL, NULL, NULL, NULL, NULL, NULL, 801316),
(326, 'EMP000028', 'Georgelin VERTONY', 83, 0, NULL, 'N', NULL, 'male', 6, '1996-02-22', NULL, '2018-11-25', NULL, 3, NULL, NULL, NULL, 213, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1101679', NULL, '', '', '', '7636110', NULL, NULL, 61, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1101679),
(327, 'EMP000031', 'Barnabe TALLET', 66, 0, NULL, 'Y', NULL, 'male', 5, '1969-07-04', NULL, '2017-04-27', NULL, 2, NULL, NULL, NULL, 194, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1090873', NULL, '', '', '', '7347246', NULL, NULL, 60, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1090873),
(328, 'EMP000032', 'Timothy TOARA', 68, 0, NULL, 'N', NULL, 'male', 5, '1968-01-01', NULL, '2008-01-08', NULL, 2, NULL, NULL, NULL, 197, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '392126', NULL, '', '', '', '7643260', NULL, NULL, 61, 3, NULL, NULL, NULL, NULL, NULL, NULL, 392126),
(329, 'EMP000033', 'Tom Tyson FARATIE', 71, 0, NULL, 'Y', NULL, 'male', 7, '1972-06-30', NULL, '2020-12-03', NULL, 2, NULL, NULL, NULL, 203, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '489781', NULL, '', '', '', '7759221', NULL, NULL, 63, 3, NULL, NULL, NULL, NULL, NULL, NULL, 489781),
(330, 'EMP000032', 'Gillian WILLIE', 82, 0, NULL, 'Y', NULL, 'female', 6, '1993-07-15', NULL, '2018-08-10', NULL, 19, NULL, NULL, NULL, 214, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1093022', NULL, '', '', '', '7360243', NULL, NULL, 59, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1093022),
(331, 'EMP000034', 'Ulrich LITOUNG', 75, 0, NULL, 'Y', NULL, 'male', 6, '0000-00-00', NULL, '2020-12-01', NULL, 3, NULL, NULL, NULL, 204, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1069480', NULL, '', '', '', '7686153', NULL, NULL, 59, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1069480),
(332, 'EMP000035', 'Louise Loloma VERE', 76, 0, NULL, 'Y', NULL, 'female', 6, '1994-02-28', NULL, '2019-07-08', NULL, 15, NULL, NULL, NULL, 206, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1108247', NULL, '', '', '', '7382328', NULL, NULL, 65, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1108247),
(333, 'EMP000036', 'Vira JOSIAH', 77, 0, NULL, 'N', NULL, 'male', 7, '1986-09-25', NULL, '2011-10-26', NULL, 2, NULL, NULL, NULL, 207, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1079733', NULL, '', '', '', '7716123', NULL, NULL, 47, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1079733),
(334, 'EMP000037', 'William SANDY', 78, 0, NULL, 'Y', NULL, 'male', 5, '1975-08-15', NULL, '2022-11-07', NULL, 2, NULL, NULL, NULL, 208, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '577718', NULL, '', '', '', '7606357', NULL, NULL, 61, 3, NULL, NULL, NULL, NULL, NULL, NULL, 577718),
(335, 'EMP000035', 'Jason DANIEL', 43, 0, NULL, 'N', NULL, 'male', 7, '1993-06-24', NULL, '2018-08-10', NULL, 19, NULL, NULL, NULL, 217, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1096103', NULL, '', '', '', '7112842', NULL, NULL, 66, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1096103),
(336, 'EMP000036', 'Harry MAKI', 81, 0, NULL, 'Y', NULL, 'male', 5, '1971-06-30', NULL, '2018-08-10', NULL, 7, NULL, NULL, NULL, 215, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '848647', NULL, '', '', '', '7771615', NULL, NULL, 61, 3, NULL, NULL, NULL, NULL, NULL, NULL, 848647),
(337, 'EMP000037', 'Ianson TOKA', 80, 0, NULL, 'N', NULL, 'male', 5, '1964-03-08', NULL, '2008-01-08', NULL, 7, NULL, NULL, NULL, 216, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '383646', NULL, '', '', '', '7369862', NULL, NULL, 61, 3, NULL, NULL, NULL, NULL, NULL, NULL, 383646),
(338, 'EMP000038', 'Jean Regis DELAVEAU', 74, 0, NULL, 'Y', NULL, 'male', 6, '1990-12-30', NULL, '2020-12-01', NULL, 3, NULL, NULL, NULL, 218, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1097681', NULL, '', '', '', '7104446', NULL, NULL, 47, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1097681),
(339, 'EMP000039', 'Achille NAIMLONU', 97, 0, NULL, 'Y', NULL, 'male', 7, '1997-04-28', NULL, '2020-12-14', NULL, 3, NULL, NULL, NULL, 195, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1114764', NULL, '', '', '', '5378315', NULL, NULL, 65, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1114764),
(340, 'EMP000040', 'Kenny Rally', 59, 0, NULL, 'Y', NULL, 'male', 5, '2023-02-16', NULL, '2018-05-24', NULL, 2, NULL, NULL, NULL, 228, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1101681', NULL, '', '', '', '7745409', NULL, NULL, 49, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1101681),
(341, 'EMP000041', 'Marika Patunvanu', 65, 0, NULL, 'Y', NULL, 'female', 5, '2023-02-16', NULL, '2018-05-24', NULL, 2, NULL, NULL, NULL, 227, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1079421', NULL, '', '', '', '5315056', NULL, NULL, 49, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1079421),
(342, 'EMP000042', 'Michel NAPAU', 67, 0, NULL, 'Y', NULL, 'male', 10, '2023-02-16', NULL, '2022-12-16', NULL, 15, NULL, NULL, NULL, 228, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1126716', NULL, '', '', 'Bilingual', '5329129', NULL, NULL, 63, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1126716);

-- --------------------------------------------------------

--
-- Table structure for table `emp_allowance`
--

CREATE TABLE `emp_allowance` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(24) DEFAULT NULL,
  `allow_name` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_award`
--

CREATE TABLE `emp_award` (
  `id` bigint(20) NOT NULL,
  `award_no` varchar(40) DEFAULT NULL,
  `emp_no` varchar(24) DEFAULT NULL,
  `award_category` int(11) DEFAULT NULL,
  `award_cert` varchar(100) DEFAULT NULL,
  `award_date` date DEFAULT NULL,
  `remark` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_department`
--

CREATE TABLE `emp_department` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `Dept_code` int(11) DEFAULT NULL,
  `ministryid` int(11) DEFAULT NULL,
  `divisionid` int(11) DEFAULT NULL,
  `report_to` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_department`
--

INSERT INTO `emp_department` (`id`, `name`, `Dept_code`, `ministryid`, `divisionid`, `report_to`) VALUES
(46, 'ICT Department', NULL, 3, 14, 'EMP000006'),
(47, 'ICT Unit', NULL, 3, 14, 'EMP000006'),
(48, 'Finance & Accounts', NULL, 3, 14, 'EMP000003'),
(49, 'Human Resource', NULL, 3, 14, 'EMP000001'),
(50, 'Legal Services', NULL, 3, 11, 'EMP000002'),
(51, 'House Office', NULL, 3, 11, 'EMP000002'),
(52, 'Security & Protocol', NULL, 3, 11, 'EMP000002'),
(53, 'Library & Archive', NULL, 3, 14, 'EMP000001'),
(54, 'Committee on Social Affairs', NULL, 3, 12, 'EMP000007'),
(55, 'Committee on Economics & Foreign Policies', NULL, 3, 12, 'EMP000008'),
(56, 'Public Accounts Committee', NULL, 3, 12, 'EMP000009'),
(57, 'Committee on Institutional & Constitutional Affair', NULL, 3, 12, 'EMP000010'),
(58, 'Standing Committees', NULL, 3, 12, 'EMP000005'),
(59, 'Hansard', NULL, 3, 13, 'EMP000004'),
(60, 'House & Procedures', NULL, 3, 11, 'EMP000002'),
(61, 'Corporate Services', NULL, 3, 14, 'EMP000001'),
(63, 'Security and Protocol Unit', NULL, 3, 11, 'EMP000002'),
(64, 'Office of the Speaker of Parliament', NULL, 3, 15, 'EMP000019'),
(65, 'Office of the Clerk', NULL, 3, 17, 'EMP000021'),
(66, 'Parliamentary Researcher - Economic and Foreign Po', NULL, 3, 12, 'EMP000007'),
(67, 'Parliamentary Researcher - Social Affairs', NULL, 3, 12, 'EMP000007'),
(68, 'Parliamentary Researcher - Public Accounts Committ', NULL, 3, 12, 'EMP000005');

-- --------------------------------------------------------

--
-- Table structure for table `emp_department_old`
--

CREATE TABLE `emp_department_old` (
  `id` bigint(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `dept_code` varchar(25) DEFAULT NULL,
  `ministryid` bigint(20) DEFAULT NULL,
  `divisionid` bigint(20) DEFAULT NULL,
  `report_to` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_disciple`
--

CREATE TABLE `emp_disciple` (
  `id` bigint(20) NOT NULL,
  `disciple_no` varchar(40) DEFAULT NULL,
  `emp_no` varchar(24) DEFAULT NULL,
  `disciple_category` int(11) DEFAULT NULL,
  `disciple_date` date DEFAULT NULL,
  `sdate` date DEFAULT NULL,
  `edate` date DEFAULT NULL,
  `remark` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_disciple`
--

INSERT INTO `emp_disciple` (`id`, `disciple_no`, `emp_no`, `disciple_category`, `disciple_date`, `sdate`, `edate`, `remark`) VALUES
(2, '', 'EMP000023', 6, '2023-06-02', '0000-00-00', '0000-00-00', 'Test1');

-- --------------------------------------------------------

--
-- Table structure for table `emp_division`
--

CREATE TABLE `emp_division` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `report_to` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_division`
--

INSERT INTO `emp_division` (`id`, `name`, `report_to`) VALUES
(11, 'House & Procedures', 'EMP000002'),
(12, 'Standing Committees', 'EMP000005'),
(13, 'Hansard', 'EMP000004'),
(14, 'Corporate Services', 'EMP000001'),
(15, 'Office of the Speaker of Parliament', 'EMP000019'),
(16, 'Parliamentrary Management Board', 'EMP000019'),
(17, 'Office of the Clerk', 'EMP000021');

-- --------------------------------------------------------

--
-- Table structure for table `emp_division_old`
--

CREATE TABLE `emp_division_old` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `report_to` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_duty`
--

CREATE TABLE `emp_duty` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(24) DEFAULT NULL,
  `leave_desc` text DEFAULT NULL,
  `sdate` date DEFAULT NULL,
  `edate` date DEFAULT NULL,
  `total_day` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_edu`
--

CREATE TABLE `emp_edu` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(24) DEFAULT NULL,
  `institution` varchar(1000) DEFAULT NULL,
  `gpa` float DEFAULT NULL,
  `sdate` date DEFAULT NULL,
  `edate` date DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `major` varchar(100) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `last_education` enum('true','false') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_emergency`
--

CREATE TABLE `emp_emergency` (
  `id` bigint(20) NOT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `home_phone` varchar(255) DEFAULT NULL,
  `mobile_phone` varchar(255) DEFAULT NULL,
  `emp_no` varchar(15) DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_family_dep`
--

CREATE TABLE `emp_family_dep` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(24) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `relationship` int(11) DEFAULT NULL,
  `birth_place` varchar(50) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `marital_status` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_family_relationship`
--

CREATE TABLE `emp_family_relationship` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_family_relationship`
--

INSERT INTO `emp_family_relationship` (`id`, `name`) VALUES
(1, 'Father'),
(2, 'Mother'),
(3, 'Sister'),
(4, 'Aunty'),
(5, 'Son'),
(6, 'Daughter'),
(7, 'Father in Law'),
(8, 'Mother in Law'),
(9, 'Brother in Law'),
(10, 'Sister in Law');

-- --------------------------------------------------------

--
-- Table structure for table `emp_grade`
--

CREATE TABLE `emp_grade` (
  `id` bigint(20) NOT NULL,
  `grade` varchar(10) DEFAULT NULL,
  `grade_desc` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_grade`
--

INSERT INTO `emp_grade` (`id`, `grade`, `grade_desc`) VALUES
(1, '1', 'Non Staff'),
(2, '2', 'Staff'),
(3, '3', 'Supervisor'),
(4, '4', 'Manager'),
(5, '5', 'General Manager'),
(6, '6', 'Director');

-- --------------------------------------------------------

--
-- Table structure for table `emp_job_history`
--

CREATE TABLE `emp_job_history` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(24) NOT NULL,
  `companyname` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `sdate` date DEFAULT NULL,
  `edate` date DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_karir`
--

CREATE TABLE `emp_karir` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(24) DEFAULT NULL,
  `emp_position` int(11) DEFAULT NULL,
  `sdate` date DEFAULT NULL,
  `edate` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  `department` bigint(20) DEFAULT NULL,
  `ministry` bigint(20) DEFAULT NULL,
  `unit` bigint(20) DEFAULT NULL,
  `division` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_keen`
--

CREATE TABLE `emp_keen` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_keen`
--

INSERT INTO `emp_keen` (`id`, `name`, `title`) VALUES
(1, 'resign', 'Resignation'),
(2, 'terminate', 'Termination'),
(3, 'medicalretirement', 'Medical Retirement'),
(4, 'ageretirement', 'Retirement Age'),
(5, 'deceased', 'Deceased');

-- --------------------------------------------------------

--
-- Table structure for table `emp_language_skill`
--

CREATE TABLE `emp_language_skill` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(24) NOT NULL,
  `languagex` int(11) DEFAULT NULL,
  `readx` int(11) DEFAULT NULL,
  `writex` int(11) DEFAULT NULL,
  `speak` int(11) DEFAULT NULL,
  `listen` int(11) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `language` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave`
--

CREATE TABLE `emp_leave` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(24) DEFAULT NULL,
  `leave_desc` text DEFAULT NULL,
  `sdate` date DEFAULT NULL,
  `edate` date DEFAULT NULL,
  `total_day` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `approve_date` date DEFAULT NULL,
  `leave_type` int(11) DEFAULT NULL,
  `approve_by` varchar(24) DEFAULT NULL,
  `entry_user` varchar(24) DEFAULT NULL,
  `paidadvdate` date DEFAULT NULL,
  `curbalance` float DEFAULT NULL,
  `hours` double DEFAULT NULL,
  `is_paidadv` varchar(10) DEFAULT NULL,
  `next_approval` varchar(25) DEFAULT NULL,
  `spv_approved_by` varchar(25) DEFAULT NULL,
  `spv_approved_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `director_approved_by` varchar(25) DEFAULT NULL,
  `director_approved_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_advsalary` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_leave`
--

INSERT INTO `emp_leave` (`id`, `emp_no`, `leave_desc`, `sdate`, `edate`, `total_day`, `status`, `approve_date`, `leave_type`, `approve_by`, `entry_user`, `paidadvdate`, `curbalance`, `hours`, `is_paidadv`, `next_approval`, `spv_approved_by`, `spv_approved_date`, `director_approved_by`, `director_approved_date`, `is_advsalary`) VALUES
(25, 'EMP000038', 'Personal reasons', '2023-02-17', '2023-02-20', 3, 1, '0000-00-00', 2, '', '', '2023-02-17', 21, 24, '', 'EMP000006', '', '2023-05-27 07:09:56', '', '2023-05-27 07:09:56', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave_bal`
--

CREATE TABLE `emp_leave_bal` (
  `id` int(11) NOT NULL,
  `leave_type` int(11) DEFAULT NULL,
  `balance` varchar(7) DEFAULT NULL,
  `latestupdate` varchar(18) DEFAULT NULL,
  `latestid` varchar(9) DEFAULT NULL,
  `updatedate` varchar(18) DEFAULT NULL,
  `emp_no` varchar(9) DEFAULT NULL,
  `updateid` varchar(9) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_leave_bal`
--

INSERT INTO `emp_leave_bal` (`id`, `leave_type`, `balance`, `latestupdate`, `latestid`, `updatedate`, `emp_no`, `updateid`) VALUES
(11, 2, '21', '2023-02-16 02:18:4', 'admin', '2023-02-16 02:18:4', 'EMP000038', 'admin'),
(12, 4, '100', '2023-02-16 02:50:1', 'admin', '2023-02-16 02:50:1', 'EMP000035', 'admin'),
(13, 2, '21', '2023-02-16 02:59:1', 'admin', '2023-02-16 02:59:1', 'EMP000003', 'admin'),
(14, 14, '21', '2023-07-11 09:25:3', 'admin', '2023-07-11 09:25:3', 'EMP000000', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave_bal_old`
--

CREATE TABLE `emp_leave_bal_old` (
  `id` bigint(20) NOT NULL,
  `leave_type` bigint(20) DEFAULT NULL,
  `balance` float DEFAULT NULL,
  `latestupdate` date DEFAULT NULL,
  `latestid` varchar(15) DEFAULT NULL,
  `updatedate` date DEFAULT NULL,
  `emp_no` varchar(15) DEFAULT NULL,
  `updateid` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_loan`
--

CREATE TABLE `emp_loan` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(24) NOT NULL,
  `requestdate` date DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `startpayment` int(11) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `loanprocess` int(11) DEFAULT NULL,
  `installmentamount` int(11) DEFAULT NULL,
  `loanperiod` int(11) DEFAULT NULL,
  `interest` int(11) DEFAULT NULL,
  `totalpayment` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_marital`
--

CREATE TABLE `emp_marital` (
  `id` bigint(20) NOT NULL,
  `marital_desc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_marital`
--

INSERT INTO `emp_marital` (`id`, `marital_desc`) VALUES
(5, 'Married'),
(6, 'Single'),
(7, 'De Facto'),
(8, 'Widow'),
(9, 'Divorced'),
(10, 'Separated');

-- --------------------------------------------------------

--
-- Table structure for table `emp_med_history`
--

CREATE TABLE `emp_med_history` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(25) DEFAULT NULL,
  `hospital` varchar(25) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_med_info`
--

CREATE TABLE `emp_med_info` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_ministry`
--

CREATE TABLE `emp_ministry` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_ministry`
--

INSERT INTO `emp_ministry` (`id`, `name`) VALUES
(3, 'Vanuatu Parliament');

-- --------------------------------------------------------

--
-- Table structure for table `emp_ministry_old`
--

CREATE TABLE `emp_ministry_old` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_permit`
--

CREATE TABLE `emp_permit` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(24) DEFAULT NULL,
  `leave_desc` text DEFAULT NULL,
  `sdate` date DEFAULT NULL,
  `edate` date DEFAULT NULL,
  `total_day` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_reim`
--

CREATE TABLE `emp_reim` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(24) DEFAULT NULL,
  `reim_type` int(11) DEFAULT NULL,
  `reim_val` int(11) DEFAULT NULL,
  `reim_date` date DEFAULT NULL,
  `reim_paid` int(11) DEFAULT NULL,
  `reim_unpaid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_religion`
--

CREATE TABLE `emp_religion` (
  `id` bigint(20) NOT NULL,
  `religion_desc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_religion`
--

INSERT INTO `emp_religion` (`id`, `religion_desc`) VALUES
(1, 'Muslim'),
(2, 'Protestant'),
(3, 'Catholic'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'Atheist'),
(7, 'Presbyterian'),
(8, 'Assemblies of God'),
(9, 'Anglican'),
(10, 'Apostolic'),
(11, 'Living Water'),
(12, 'Jehova Witness'),
(13, 'Mormon'),
(14, 'Church of Christ'),
(15, 'Seven Day Adventist'),
(16, 'Life Revelation Ministry'),
(17, 'Life Revelation Ministry'),
(18, 'Pentecostal'),
(19, 'Covenant Church');

-- --------------------------------------------------------

--
-- Table structure for table `emp_salary`
--

CREATE TABLE `emp_salary` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(24) NOT NULL,
  `basic_salary` bigint(20) DEFAULT NULL,
  `deduc_salary` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_sick`
--

CREATE TABLE `emp_sick` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(24) DEFAULT NULL,
  `leave_desc` text DEFAULT NULL,
  `sdate` date DEFAULT NULL,
  `edate` date DEFAULT NULL,
  `total_day` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_skill_interest`
--

CREATE TABLE `emp_skill_interest` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(24) NOT NULL,
  `skills` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `language` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_status`
--

CREATE TABLE `emp_status` (
  `id` bigint(20) NOT NULL,
  `emp_desc` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_status`
--

INSERT INTO `emp_status` (`id`, `emp_desc`) VALUES
(1, 'permanent'),
(2, 'contract'),
(3, 'apprentice');

-- --------------------------------------------------------

--
-- Table structure for table `emp_title`
--

CREATE TABLE `emp_title` (
  `id` int(11) NOT NULL,
  `title` varchar(64) DEFAULT NULL,
  `title_code` varchar(10) DEFAULT NULL,
  `report_to` varchar(10) DEFAULT NULL,
  `colour` varchar(10) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_title`
--

INSERT INTO `emp_title` (`id`, `title`, `title_code`, `report_to`, `colour`, `code`) VALUES
(169, 'Web Developper', '012345', 'ICT Manage', 'Blue', '12345'),
(170, 'Human Resource Officer', '8150', 'Assistant ', 'Yellow', 'NULL'),
(228, 'Security 3', '8055', 'Head Secur', 'Orange', 'NULL'),
(172, 'Speaker of Parliament', 'OSA', 'N/a', 'Red', 'NULL'),
(173, 'Clerk of Parliament', '8000', 'PMB', 'Blue', 'NULL'),
(174, 'Assistant Clerk House & Procedures', '8002', 'Clerk of P', 'Orange', 'NULL'),
(175, 'Assistant Clerk Standing Committees', '8003', 'Clerk of P', 'Purple', 'NULL'),
(176, 'Assistant Clerk Hansard', '8004', 'Clerk of P', 'Brown', 'NULL'),
(177, 'Assistant Clerk Corporate Services', '8001', 'Clerk of P', 'Yellow', 'NULL'),
(178, 'ICT Manager', '8006', 'Assistant ', 'Yellow', 'NULL'),
(179, 'Finance Manager', '8005', 'Assistant ', 'Yellow', 'NULL'),
(180, 'Manager Legal Services', '8012', 'Assistant ', 'Orange', 'NULL'),
(181, 'Parliamentary Researcher - Socail Affairs', '8149', 'Assistant', 'Purple', 'NULL'),
(182, 'Office Cleaner 4', '8047', 'Assistant ', 'Yellow', 'NULL'),
(183, 'Electro Technician', '8023', 'ICT Manage', 'Yellow', 'NULL'),
(184, 'Senior Finance Officer', '8019', 'Finance Ma', 'Yellow', 'NULL'),
(185, 'Archive Officer', '8033', 'Assistant ', 'Yellow', 'NULL'),
(186, 'Switchboard Receptionist', '8137', 'Assistant ', 'YELLOW', 'NULL'),
(187, 'Inter Parliamentary Relation Officer', '8007', 'Clerk of P', 'Blue', 'NULL'),
(188, 'Office Cleaner 1', '8044', 'Assistant ', 'Yellow', 'NULL'),
(189, 'Security 3', '8053', 'Assistant', 'Orange', 'NULL'),
(190, 'Office Cleaner 5', '8160', 'Assistant ', 'Yellow', 'NULL'),
(191, 'Media Officer', '8041', 'Clerk of P', 'Blue', 'NULL'),
(192, 'Executive Secretary - Institutional & Constitutional', '8051', 'Assistant ', 'Purple', 'NULL'),
(193, 'MP Supporting Officer', '8032', 'Assistant ', 'YELLOW', 'NULL'),
(194, 'Steward Officer', '8026', 'Assistant ', 'Orange', 'NULL'),
(195, 'Public Diplomacy Officer', '8016', 'Clerk of P', 'Blue', 'NULL'),
(196, 'Human Resource Administrative Officer', '8059', 'Assistant ', 'Yellow', 'NULL'),
(197, 'Groundsman 1', '8039', 'Assistant ', 'Yellow', 'NULL'),
(198, 'Principal Finance Officer', '8005', 'Assistant ', 'Yellow', 'NULL'),
(199, 'Secretary Typist', '8030', 'Assistant ', 'Orange', 'NULL'),
(200, 'Librarian', '8010', 'Assistant ', 'Yellow', 'NULL'),
(201, 'Assistant Librarian', '8048', 'Assistant ', 'Yellow', 'NULL'),
(202, 'Hansard Reporter French', '8018', 'Assistant ', 'Brown', 'NULL'),
(203, 'Security Officer 4', '8054', 'Assistant ', 'Orange', 'NULL'),
(204, 'Hansard Reporter', '8028', 'Assistant ', 'Brown', 'NULL'),
(205, 'Executive Secretary & Reporter  - Public Accounts Committee', '8178', 'Researcher', 'Purple', 'NULL'),
(206, 'Executive Secretary to the Clerk', '8013', 'The Clerk', 'Blue', 'NULL'),
(207, 'ICT Officer', '8024', 'ICT Manage', 'Yellow', 'NULL'),
(208, 'General Maintenance Officer', '8050', 'Assistant ', 'Yellow', 'NULL'),
(209, 'Hansard Assistant Editor (French)', '8029', 'Assistant ', 'Brown', 'NULL'),
(210, 'Groundsman 4', '8042', 'Assistant ', 'Yellow', 'NULL'),
(211, 'Administrative Support Officer', '8066', 'Assistant ', 'Yellow', 'NULL'),
(212, 'Parliamentary Researcher - Institutional & Constitutional Affair', '8163', 'Assistant', 'Purple', 'NULL'),
(213, 'Driver', '8034', 'Assistant ', 'Yellow', 'NULL'),
(214, 'Hansard Editor French', '8014', 'Assistant ', 'Brown', 'NULL'),
(215, 'Groundsman 5', '8025', 'Assistant ', 'Yellow', 'NULL'),
(216, 'Groundsman 2', '8140', 'Assistant ', 'Yellow', 'NULL'),
(217, 'Parliamentary Researcher - Economic & Foreign Policies', '8009', 'Assistant', 'Purple', 'NULL'),
(218, 'Senior Application Development Administrator', '8052', 'ICT Manage', 'Yellow', 'NULL'),
(219, 'Security Officer 1', '8020', 'Head Secur', 'Orange', 'NULL'),
(220, 'Parliamentary Chaplain', '8060', 'Clerk of P', 'Blue', 'NULL'),
(221, 'Groundsman 3', '8049', 'Human Reso', 'Yellow', 'NULL'),
(223, 'Hansard Assistant Editor (English)', '8021', 'Assistant ', 'Brown', 'NULL'),
(224, 'Clerk of Parliament', '8000', 'PMB', 'Blue', 'NULL'),
(225, 'Office Cleaner 2', '8045', 'Human Reso', 'Yellow', 'NULL'),
(229, 'Security 3', '8055', 'Head Secur', 'Orange', 'NULL'),
(230, 'Assistant Procurement Officer', '8061', 'Finance Ma', 'Yellow', 'NULL'),
(231, 'Parliamentary Management Board', 'OSA', 'Speaker of', 'Red', 'NULL'),
(232, 'Executive Secretary and Reporter -Socia Affairs', '8159', 'Parliament', 'Purple', 'NULL'),
(233, 'Executive Secretary and Reporter -Economic and Foreign Policies', '8061', 'Parliament', 'Purple', 'NULL'),
(234, 'Parliamentary Researcher - Public Accounts Committee', '8008', 'Assistant ', 'Purple', 'NULL'),
(235, 'Groundsman 3', '8049', 'Human Reso', 'Yellow', 'NULL'),
(236, 'Office Cleaner 3', '8046', 'Human Reso', 'Yellow', 'NULL'),
(237, 'Security 3', '8055', 'Head Secur', 'Orange', 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `emp_title_old`
--

CREATE TABLE `emp_title_old` (
  `id` bigint(20) NOT NULL,
  `title` varchar(2000) DEFAULT NULL,
  `title_code` varchar(12) DEFAULT NULL,
  `report_to` int(11) DEFAULT NULL,
  `colour` varchar(30) DEFAULT NULL,
  `code` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_training`
--

CREATE TABLE `emp_training` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(24) NOT NULL,
  `sdate` date DEFAULT NULL,
  `edate` date DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `institution` int(11) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `certificate` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_unit`
--

CREATE TABLE `emp_unit` (
  `id` bigint(20) NOT NULL,
  `unit_desc` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_unit`
--

INSERT INTO `emp_unit` (`id`, `unit_desc`) VALUES
(7, 'ICT Unit');

-- --------------------------------------------------------

--
-- Stand-in structure for view `getnumempbasedonageandgender`
-- (See below for the actual view)
--
CREATE TABLE `getnumempbasedonageandgender` (
`gender` varchar(6)
,`a` decimal(22,0)
,`b` decimal(22,0)
,`c` decimal(22,0)
,`d` decimal(22,0)
,`e` decimal(22,0)
,`f` decimal(22,0)
,`g` decimal(22,0)
,`h` decimal(22,0)
,`i` decimal(22,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `getnumempbasedondepartment`
-- (See below for the actual view)
--
CREATE TABLE `getnumempbasedondepartment` (
`gender` enum('male','female')
,`name` varchar(50)
,`num_of_emp` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `getnumempbasedonministry`
-- (See below for the actual view)
--
CREATE TABLE `getnumempbasedonministry` (
`gender` enum('male','female')
,`name` varchar(255)
,`num_of_emp` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `getnumempbasedonworkhistory`
-- (See below for the actual view)
--
CREATE TABLE `getnumempbasedonworkhistory` (
`gender` varchar(6)
,`a` decimal(22,0)
,`b` decimal(22,0)
,`c` decimal(22,0)
,`d` decimal(22,0)
,`e` decimal(22,0)
,`f` decimal(22,0)
,`g` decimal(22,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `hospital_list`
--

CREATE TABLE `hospital_list` (
  `id` bigint(20) NOT NULL,
  `hospital_name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospital_list`
--

INSERT INTO `hospital_list` (`id`, `hospital_name`, `address`, `phone`) VALUES
(2, 'Vila Central Hospital', 'Port Vila, VANUATU', '22100');

-- --------------------------------------------------------

--
-- Table structure for table `leave_setting`
--

CREATE TABLE `leave_setting` (
  `leave_setting_id` bigint(20) NOT NULL,
  `leave_name` char(50) DEFAULT NULL,
  `eligibility` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_setting`
--

INSERT INTO `leave_setting` (`leave_setting_id`, `leave_name`, `eligibility`) VALUES
(2, 'Annual Leave', 21),
(3, 'Medical Leave', 21),
(4, 'Maternity Leave', 90),
(5, 'Severence Pay', 42),
(6, 'Leave without pay', 21),
(7, 'Annual Leave - Contract', 15),
(8, 'Sabbatical Leave', 240),
(9, 'Study Leave - Long Term', 780),
(10, 'Study Leave - Short Term', 260),
(11, 'Special Leave', 14),
(12, 'Parental Leave', 5),
(13, 'Compassionate Leave - Nuclear', 10),
(14, 'Compassionate Leave - Close Relatives', 3);

-- --------------------------------------------------------

--
-- Table structure for table `loan_type`
--

CREATE TABLE `loan_type` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `maxloan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_202`
--

CREATE TABLE `log_202` (
  `id` bigint(20) NOT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mfingerscan`
--

CREATE TABLE `mfingerscan` (
  `id` bigint(20) NOT NULL,
  `sn` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `port` varchar(255) DEFAULT NULL,
  `deviceid` varchar(50) DEFAULT NULL,
  `key` varchar(50) DEFAULT NULL,
  `scheduled` varchar(15) DEFAULT NULL,
  `type` varchar(5) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mfingerscan`
--

INSERT INTO `mfingerscan` (`id`, `sn`, `title`, `ip`, `port`, `deviceid`, `key`, `scheduled`, `type`, `status`) VALUES
(8, 'BWXP204360020', 'Fingerscan Parliament', '192.168.3.72', '4370', '1', 'X100-C', 'scheduled', '98', 'connected');

-- --------------------------------------------------------

--
-- Table structure for table `notification_list`
--

CREATE TABLE `notification_list` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(24) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` char(1) NOT NULL,
  `notification_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_list`
--

INSERT INTO `notification_list` (`id`, `emp_no`, `message`, `status`, `notification_date`) VALUES
(1, 'EMP000000', 'Please accomplish your task before 24 January 2023.', 'A', '2023-01-15 10:50:26'),
(2, 'EMP000000', 'Please accomplish your task before 20 February 2023.', 'A', '2023-02-05 10:51:40'),
(3, 'EMP000000', 'Please accomplish your task before 23 February 2023.', 'I', '2023-02-10 17:58:20'),
(4, 'EMP000000', 'Please accomplish your task before 24 February 2023.', 'I', '2023-02-15 00:00:00'),
(5, 'EMP000000', 'Please accomplish your task before 25 February 2023', 'I', '2023-02-24 02:26:57'),
(6, 'EMP000001', 'Please accomplish your task before 24 March 2022.', 'I', '2023-02-25 03:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `public_holiday`
--

CREATE TABLE `public_holiday` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `remark` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `public_holiday`
--

INSERT INTO `public_holiday` (`id`, `tanggal`, `remark`) VALUES
(13, '2023-01-01', 'New Year 2023');

-- --------------------------------------------------------

--
-- Table structure for table `reim_balance`
--

CREATE TABLE `reim_balance` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(24) DEFAULT NULL,
  `reim_type` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reim_type`
--

CREATE TABLE `reim_type` (
  `id` bigint(20) NOT NULL,
  `reim_desc` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reim_type`
--

INSERT INTO `reim_type` (`id`, `reim_desc`) VALUES
(6, 'Home Island Claim');

-- --------------------------------------------------------

--
-- Table structure for table `skill_interest_list`
--

CREATE TABLE `skill_interest_list` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` bigint(20) NOT NULL,
  `emp_no` varchar(24) NOT NULL,
  `sdate` date DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `edate` date DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `category` int(11) NOT NULL,
  `status` int(11) DEFAULT 1,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `task_activity`
--

CREATE TABLE `task_activity` (
  `id` bigint(20) NOT NULL,
  `task_id` int(11) NOT NULL,
  `emp_no` varchar(24) NOT NULL,
  `sdate` date DEFAULT NULL,
  `edate` date DEFAULT NULL,
  `activity` text DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `value` varchar(24) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `task_category`
--

CREATE TABLE `task_category` (
  `id` bigint(20) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `task_member`
--

CREATE TABLE `task_member` (
  `id` bigint(20) NOT NULL,
  `task_id` int(11) NOT NULL,
  `emp_no` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `training_institution`
--

CREATE TABLE `training_institution` (
  `id` bigint(20) NOT NULL,
  `institution_name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uc_configuration`
--

CREATE TABLE `uc_configuration` (
  `id` bigint(20) NOT NULL,
  `name` varchar(300) NOT NULL,
  `value` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_configuration`
--

INSERT INTO `uc_configuration` (`id`, `name`, `value`) VALUES
(1, 'website_name', 'PM User Management'),
(2, 'website_url', 'localhost/'),
(3, 'email', ''),
(4, 'activation', 'true'),
(5, 'resend_activation_threshold', '0'),
(6, 'language', ''),
(7, 'template', '');

-- --------------------------------------------------------

--
-- Table structure for table `uc_login_attempt`
--

CREATE TABLE `uc_login_attempt` (
  `id` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `limit_login_attempt` int(11) NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_login_attempt`
--

INSERT INTO `uc_login_attempt` (`id`, `email`, `ip_address`, `limit_login_attempt`, `updated_date`) VALUES
(2, 'admin@vanuatuparliamenthr.com', '192.168.2.163', 0, '2023-03-01 10:25:52'),
(3, 'admin@vanuatuparliamenthr.com', '192.168.3.154', 0, '2023-03-01 10:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `uc_pages`
--

CREATE TABLE `uc_pages` (
  `id` int(11) NOT NULL,
  `page` varchar(10) NOT NULL,
  `caption` varchar(150) NOT NULL,
  `parentids` varchar(10) NOT NULL,
  `class` varchar(150) NOT NULL,
  `icon` varchar(150) DEFAULT NULL,
  `ordered` varchar(2) NOT NULL,
  `private` varchar(2) DEFAULT NULL,
  `queue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uc_pages`
--

INSERT INTO `uc_pages` (`id`, `page`, `caption`, `parentids`, `class`, `icon`, `ordered`, `private`, `queue`) VALUES
(1, 'emp', 'Employee', '', '', 'glyphicon glyphicon-briefcase', 'Y', '', 1),
(2, 'emppr', 'Employee Personal', 'emp', 'emp_personal', NULL, 'Y', '', 1),
(3, 'empif', 'Employee Information', 'emp', 'emp_info', NULL, 'Y', '', 1),
(4, 'resbk', 'Resource Booking', 'emp', 'res_booking', NULL, 'Y', '', 1),
(5, 'empdt', 'Employee Detail', 'emp', 'emp_detail', NULL, 'Y', '', 1),
(6, 'stus', 'Setup User', '', '', 'fa fa-user', 'Y', '', 2),
(7, 'mngus', 'Manage User', 'stus', 'users', NULL, 'Y', '', 2),
(8, 'mngpr', 'Manage Permissions', 'stus', 'permissions', NULL, 'Y', '', 2),
(9, 'mngpp', 'Manage Permission Page', 'stus', 'permission_page_matches', NULL, 'Y', '', 2),
(10, 'mngrl', 'Manage Role', 'stus', 'roles', NULL, 'Y', '', 2),
(11, 'emprt', 'Employee Report', '', '', 'glyphicon glyphicon-stats', 'Y', '', 3),
(12, 'empst', 'Employee Status', 'emprt', 'emp_status', NULL, 'Y', '', 3),
(13, 'demrp', 'Demographic Report', 'emprt', 'demo_report', NULL, 'Y', '', 3),
(14, 'emplv', 'Employee Leave', '', '', 'fa fa-building', 'Y', '', 4),
(15, 'lea', 'Leave', 'emplv', 'leave', NULL, 'Y', '', 4),
(16, 'leabl', 'Leave Balance', 'emplv', 'leave_balance', NULL, 'Y', '', 4),
(17, 'empla', 'Employee Leave Approval', 'emplv', 'emp_leave', NULL, 'Y', '', 4),
(18, 'emplr', 'Employee Leave Report', 'emplv', 'emp_report', NULL, 'Y', '', 4),
(19, 'tmat', 'Time Attendance', '', '', 'glyphicon glyphicon-list-alt', 'Y', '', 5),
(20, 'attrt', 'Attendance Report', 'tmat', 'att_report', NULL, 'Y', '', 5),
(21, 'fng', 'Fingerscan', 'tmat', 'fingerscan', NULL, 'Y', '', 5),
(22, 'ondt', 'On Duty', 'tmat', 'on_duty', NULL, 'Y', '', 5),
(23, 'myfr', 'My Form', 'tmat', 'myform', NULL, 'Y', '', 5),
(24, 'empatt', 'Employee Attendance', 'tmat', 'emp_att', NULL, 'Y', '', 5),
(25, 'atths', 'Attendance History', 'tmat', 'att_history', NULL, 'Y', '', 5),
(26, 'usmn', 'User Manual', '', 'usermanual', 'glyphicon glyphicon-book', 'Y', '', 6),
(27, 'sett', 'Setting', '', '', 'fa fa-gears', 'Y', '', 7),
(28, 'parst', 'Parliament Setup', 'sett', 'ministrysetup', NULL, 'Y', '', 7),
(29, 'divst', 'Division Setup', 'sett', 'divsetup', NULL, 'Y', '', 7),
(30, 'depst', 'Departement Setup', 'sett', 'deptsetup', NULL, 'Y', '', 7),
(31, 'ttlst', 'Title Setup', 'sett', 'titlesetup', NULL, 'Y', '', 7),
(32, 'famst', 'Family Setup', 'sett', 'familysetup', NULL, 'Y', '', 7),
(33, 'hosst', 'Hospital Setup', 'sett', 'hospitalsetup', NULL, 'Y', '', 7),
(34, 'retst', 'Resource Type', 'sett', 'resource_type', NULL, 'Y', '', 7),
(35, 'keest', 'Keen Setup', 'sett', 'Keensetup', NULL, 'Y', '', 7),
(36, 'reist', 'Reimburstment Setup', 'sett', 'reimsetup', NULL, 'Y', '', 7),
(37, 'locst', 'Location Setup', 'sett', 'locatsetup', NULL, 'Y', '', 7),
(38, 'regst', 'Religion Setup', 'sett', 'religionsetup', NULL, 'Y', '', 7),
(39, 'marst', 'Marital Setup', 'sett', 'maritalsetup', NULL, 'Y', '', 7),
(40, 'comust', 'Company Unit Setup', 'sett', 'compunit', NULL, 'Y', '', 7),
(41, 'skst', 'Skill Setup', 'sett', 'skillsetup', NULL, 'Y', '', 7),
(42, 'edust', 'Education Setup', 'sett', 'educationsetup', NULL, 'Y', '', 7),
(43, 'cntst', 'Country Setup', 'sett', 'countrysetup', NULL, 'Y', '', 7),
(44, 'least', 'Leave Setup', 'sett', 'leavesetup', NULL, 'Y', '', 7),
(45, 'bnkst', 'Bank Setup', 'sett', 'banksetup', NULL, 'Y', '', 7),
(46, 'edist', 'Education Institution Setup', 'sett', 'eduinstsetup', NULL, 'Y', '', 7),
(47, 'tacst', 'Task Category Setup', 'sett', 'taskcatsetup', NULL, 'Y', '', 7),
(48, 'awst', 'Award Setup', 'sett', 'awardsetup', NULL, 'Y', '', 7),
(49, 'disst', 'Disciplinary Setup', 'sett', 'disciplinarysetup', NULL, 'Y', '', 7),
(50, 'instst', 'Institution Setup', 'sett', 'institutionsetup', NULL, 'Y', '', 7),
(51, 'puhst', 'Public Holiday Setup', 'sett', 'publicholidaysetup', NULL, 'Y', '', 7),
(52, 'empdisc', 'Disciplinary', 'emp', 'disciplinary', NULL, 'Y', NULL, 1),
(53, 'workhr', 'Workflow HR', 'emp', 'workflow_hr', NULL, 'Y', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `uc_pages_old`
--

CREATE TABLE `uc_pages_old` (
  `id` bigint(20) NOT NULL,
  `page` varchar(300) NOT NULL,
  `caption` varchar(300) NOT NULL,
  `parentids` varchar(300) NOT NULL,
  `ordered` enum('Y','N') NOT NULL,
  `private` enum('Y','N') NOT NULL,
  `queue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_pages_old`
--

INSERT INTO `uc_pages_old` (`id`, `page`, `caption`, `parentids`, `ordered`, `private`, `queue`) VALUES
(1, 'mgmt', 'User Management', '', 'Y', '', 11),
(2, 'lu', 'List User', 'mgmt', 'Y', '', NULL),
(3, 'lr', 'List Role', 'mgmt', 'Y', '', NULL),
(4, 'lm', 'List Menu', 'mgmt', 'Y', '', NULL),
(5, 'ei', 'Employee', '', 'Y', '', 2),
(6, 'ab', 'Employee Personal', 'ei', 'Y', '', NULL),
(7, 'ein', 'Employee Information', 'ei', 'Y', '', NULL),
(9, 'rb', 'Resource Booking', 'ei', 'Y', '', NULL),
(10, 'er', 'Employee Report', '', 'Y', '', 3),
(11, 'cer', 'Employee Status', 'er', 'Y', '', NULL),
(12, 'dr', 'Demographic Report', 'er', 'Y', '', NULL),
(14, 'ta', 'Time Attendance', '', 'Y', '', 3),
(15, 'maef', 'My Entry Form', 'ta', 'Y', '', NULL),
(16, 'ah', 'Attendance History', 'ta', 'Y', '', NULL),
(18, 'lv', 'Leave', 'ta', 'Y', '', NULL),
(19, 'emplv', 'Employee Leave', 'ta', 'Y', '', NULL),
(20, 'prm', 'Permit', 'ta', 'Y', '', NULL),
(21, 'odt', 'On Duty', 'ta', 'Y', '', NULL),
(22, 'ot', 'Over Time', 'ta', 'Y', '', NULL),
(23, 'reim', 'Reimburstment', '', 'Y', '', 4),
(24, 'mr', 'My Reimburst', 'reim', 'Y', '', NULL),
(25, 'cad', 'Career Admin', '', 'Y', '', 5),
(26, 'awh', 'Award History', 'cad', 'Y', '', NULL),
(27, 'pfm', 'Performance', '', 'Y', '', 6),
(29, 'mpf', 'My Performance', 'pfm', 'Y', '', NULL),
(30, 'dh', 'Disciplines History', 'cad', 'Y', '', NULL),
(31, 'maw', 'My Award', 'cad', 'Y', '', NULL),
(32, 'mdis', 'My Disciplines', 'cad', 'Y', '', NULL),
(38, 'edet', 'Employee Detail', 'ei', 'Y', '', NULL),
(39, 'aef', 'Employee Attendance Entry Form', 'ta', 'Y', '', NULL),
(40, 'tr', 'Training', '', 'Y', '', 9),
(41, 'mtr', 'My Training', 'tr', 'Y', '', NULL),
(42, 'etr', 'Employee Training', 'tr', 'Y', '', NULL),
(43, 'ts', 'Task Management', '', 'Y', '', 10),
(44, 'tsl', 'Task List', 'ts', 'Y', '', NULL),
(45, 'mts', 'My Task', 'ts', 'Y', '', NULL),
(46, 'py', 'Payroll (under developement)', '', 'Y', '', 7),
(47, 'st', 'Setting', '', 'Y', '', 12),
(48, 'ti', 'Institution', 'st', 'Y', '', 21),
(49, 'tc', 'Task Category', 'st', 'Y', '', 18),
(50, 'ac', 'Award Category', 'st', 'Y', '', 19),
(51, 'dc', 'Disciplinary Category', 'st', 'Y', '', 20),
(52, 'os', 'Organization Structure', '', 'Y', '', 1),
(53, 'osl', 'Organization List', 'os', 'Y', '', NULL),
(54, 'rc', 'Reimbursement Category', 'st', 'Y', '', 6),
(55, 'ps', 'Payroll Setup', 'py', '', '', NULL),
(56, 'pp', 'Payroll Process', 'py', '', '', NULL),
(57, 'br', 'Bank Report', 'py', '', '', NULL),
(58, 'vr', 'VNPF Report', 'py', '', '', NULL),
(59, 'ep', 'Employee Performance', 'pfm', 'Y', '', NULL),
(60, 'lo', 'Loan', '', 'Y', '', 8),
(61, 'ml', 'My Loan', 'lo', '', '', NULL),
(62, 'el', 'Employee Loan', 'lo', '', '', NULL),
(63, 'ls', 'Location Setting', 'st', 'Y', '', 7),
(64, 'rs', 'Religion Setting', 'st', 'Y', '', 8),
(65, 'ms', 'Marital Status', 'st', 'Y', '', 9),
(66, 'gs', 'General Configuration', 'st', 'Y', '', 10),
(67, 'cus', 'Company Unit', 'st', 'Y', '', 11),
(68, 'skt', 'Skill Type', 'st', 'Y', '', 12),
(69, 'els', 'Education Level', 'st', 'Y', '', 13),
(70, 'cs', 'Country', 'st', 'Y', '', 14),
(71, 'mis', 'Ministry Setting', 'st', 'Y', '', 1),
(72, 'fr', 'Family Relationship', 'st', 'Y', '', 2),
(73, 'hs', 'Hospital List', 'st', 'Y', '', 3),
(74, 'ks', 'Keen Setting', 'st', 'Y', '', 4),
(75, 'ds', 'Department Setting', 'st', 'Y', '', 5),
(76, 'ltype', 'Leave Type', 'st', 'Y', '', 15),
(77, 'bs', 'Bank Setting', 'st', 'Y', '', 16),
(78, 'eit', 'Education Institution', 'st', 'Y', '', 17),
(79, 'div', 'Division Setting', 'st', 'Y', '', 18);

-- --------------------------------------------------------

--
-- Table structure for table `uc_permissions`
--

CREATE TABLE `uc_permissions` (
  `id` bigint(20) NOT NULL,
  `name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_permissions`
--

INSERT INTO `uc_permissions` (`id`, `name`) VALUES
(2, 'Administrator'),
(3, 'Employee'),
(4, 'Supervisor'),
(5, 'Clerk');

-- --------------------------------------------------------

--
-- Table structure for table `uc_permission_page_matches`
--

CREATE TABLE `uc_permission_page_matches` (
  `id` bigint(20) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `create_active` varchar(5) NOT NULL,
  `update_active` varchar(5) NOT NULL,
  `delete_active` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_permission_page_matches`
--

INSERT INTO `uc_permission_page_matches` (`id`, `permission_id`, `page_id`, `create_active`, `update_active`, `delete_active`) VALUES
(1, 2, 1, 'Y', 'Y', 'Y'),
(2, 2, 2, 'Y', 'Y', 'Y'),
(3, 2, 3, 'Y', 'Y', 'Y'),
(4, 2, 4, 'Y', 'Y', 'Y'),
(5, 2, 5, 'Y', 'Y', 'Y'),
(6, 2, 6, 'Y', 'Y', 'Y'),
(7, 2, 7, 'Y', 'Y', 'Y'),
(8, 2, 8, 'Y', 'Y', 'Y'),
(9, 2, 9, 'Y', 'Y', 'Y'),
(10, 2, 10, 'Y', 'Y', 'Y'),
(11, 2, 11, 'Y', 'Y', 'Y'),
(12, 2, 12, 'N', 'Y', 'N'),
(13, 2, 13, 'Y', 'Y', 'Y'),
(14, 2, 14, 'Y', 'Y', 'Y'),
(15, 2, 15, 'Y', 'N', 'Y'),
(16, 2, 16, 'Y', 'Y', 'Y'),
(17, 2, 17, 'Y', 'Y', 'Y'),
(18, 2, 18, 'Y', 'Y', 'Y'),
(19, 2, 19, 'Y', 'Y', 'Y'),
(20, 2, 20, 'Y', 'Y', 'Y'),
(21, 2, 21, 'Y', 'Y', 'Y'),
(22, 2, 22, 'Y', 'Y', 'Y'),
(23, 2, 23, 'Y', 'Y', 'Y'),
(24, 2, 24, 'N', 'N', 'N'),
(25, 2, 25, 'Y', 'Y', 'Y'),
(26, 2, 26, 'Y', 'Y', 'Y'),
(27, 2, 27, 'Y', 'Y', 'Y'),
(28, 2, 28, 'Y', 'Y', 'Y'),
(29, 2, 29, 'Y', 'Y', 'Y'),
(30, 2, 30, 'Y', 'Y', 'Y'),
(31, 2, 31, 'Y', 'Y', 'Y'),
(32, 2, 32, 'Y', 'Y', 'Y'),
(33, 2, 33, 'Y', 'Y', 'Y'),
(34, 2, 34, 'Y', 'Y', 'Y'),
(35, 2, 35, 'Y', 'Y', 'Y'),
(36, 2, 36, 'Y', 'Y', 'Y'),
(37, 2, 37, 'Y', 'Y', 'Y'),
(38, 2, 38, 'Y', 'Y', 'Y'),
(39, 2, 39, 'Y', 'Y', 'Y'),
(40, 2, 40, 'Y', 'Y', 'Y'),
(41, 2, 41, 'Y', 'Y', 'Y'),
(42, 2, 42, 'Y', 'Y', 'Y'),
(43, 2, 43, 'Y', 'Y', 'Y'),
(44, 2, 44, 'Y', 'Y', 'Y'),
(45, 2, 45, 'Y', 'Y', 'Y'),
(46, 2, 46, 'Y', 'Y', 'Y'),
(47, 2, 47, 'Y', 'Y', 'Y'),
(48, 2, 48, 'Y', 'Y', 'Y'),
(49, 2, 49, 'Y', 'Y', 'Y'),
(50, 2, 50, 'Y', 'Y', 'Y'),
(51, 2, 51, 'Y', 'Y', 'Y'),
(52, 3, 1, 'Y', 'Y', 'Y'),
(53, 3, 2, 'Y', 'Y', 'Y'),
(54, 3, 3, 'Y', 'Y', 'Y'),
(55, 3, 4, 'Y', 'Y', 'Y'),
(56, 3, 5, 'Y', 'Y', 'Y'),
(57, 3, 6, 'Y', 'Y', 'Y'),
(58, 3, 7, 'Y', 'Y', 'Y'),
(59, 3, 14, 'Y', 'Y', 'Y'),
(60, 3, 15, 'Y', 'N', 'Y'),
(61, 3, 19, 'Y', 'Y', 'Y'),
(62, 3, 22, 'Y', 'Y', 'Y'),
(63, 3, 23, 'Y', 'Y', 'Y'),
(64, 3, 25, 'Y', 'Y', 'Y'),
(65, 3, 26, 'Y', 'Y', 'Y'),
(66, 4, 1, 'Y', 'Y', 'Y'),
(67, 4, 2, 'Y', 'Y', 'Y'),
(68, 4, 3, 'Y', 'Y', 'Y'),
(69, 4, 4, 'Y', 'Y', 'Y'),
(70, 4, 5, 'Y', 'Y', 'Y'),
(71, 4, 6, 'Y', 'Y', 'Y'),
(72, 4, 7, 'N', 'Y', 'N'),
(73, 4, 14, 'Y', 'Y', 'Y'),
(74, 4, 15, 'Y', 'Y', 'Y'),
(75, 4, 19, 'Y', 'Y', 'Y'),
(76, 4, 22, 'Y', 'Y', 'Y'),
(77, 4, 23, 'Y', 'Y', 'Y'),
(78, 4, 25, 'Y', 'Y', 'Y'),
(79, 4, 26, 'Y', 'Y', 'Y'),
(80, 5, 1, 'Y', 'Y', 'Y'),
(81, 5, 2, 'Y', 'Y', 'Y'),
(82, 5, 3, 'Y', 'Y', 'Y'),
(83, 5, 4, 'Y', 'Y', 'Y'),
(84, 5, 5, 'Y', 'Y', 'Y'),
(85, 5, 6, 'Y', 'Y', 'Y'),
(86, 5, 7, 'Y', 'Y', 'Y'),
(87, 5, 14, 'Y', 'Y', 'Y'),
(88, 5, 15, 'Y', 'Y', 'Y'),
(89, 5, 19, 'Y', 'Y', 'Y'),
(90, 5, 22, 'Y', 'Y', 'Y'),
(91, 5, 23, 'Y', 'Y', 'Y'),
(92, 5, 25, 'Y', 'Y', 'Y'),
(93, 5, 26, 'Y', 'Y', 'Y'),
(94, 2, 52, 'Y', 'Y', 'Y'),
(95, 3, 52, 'Y', 'Y', 'Y'),
(96, 4, 52, 'Y', 'Y', 'Y'),
(97, 5, 52, 'Y', 'Y', 'Y'),
(98, 2, 53, 'Y', 'Y', 'Y'),
(99, 3, 53, 'Y', 'Y', 'Y'),
(100, 4, 53, 'Y', 'Y', 'Y'),
(101, 5, 53, 'Y', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `uc_permission_page_matches_old`
--

CREATE TABLE `uc_permission_page_matches_old` (
  `id` bigint(20) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `created_active` varchar(5) NOT NULL,
  `update_active` varchar(5) NOT NULL,
  `delete_active` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `uc_reset_password`
--

CREATE TABLE `uc_reset_password` (
  `id` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `reset_token` varchar(60) NOT NULL,
  `has_used` enum('Y','N') NOT NULL,
  `reset_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_reset_password`
--

INSERT INTO `uc_reset_password` (`id`, `email`, `reset_token`, `has_used`, `reset_date`) VALUES
(1, 'admin@vanuatuparliamenthr.com', '2y10nABNkTYLnZNncb9T0tAveTg6fWiZvLTMbX5Eq5rrJdTdANV5g87a', 'Y', '2023-02-27 01:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `uc_users`
--

CREATE TABLE `uc_users` (
  `id` bigint(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `password` varchar(450) NOT NULL,
  `email` varchar(300) NOT NULL,
  `activation_token` varchar(450) NOT NULL,
  `last_activation_request` int(11) NOT NULL,
  `lost_password_request` enum('Y','N') NOT NULL,
  `active` enum('Y','N') NOT NULL,
  `title` varchar(300) NOT NULL,
  `sign_up_stamp` int(11) NOT NULL,
  `last_sign_in_stamp` int(11) NOT NULL,
  `isLeaveApprover` enum('Y','N') NOT NULL DEFAULT 'N',
  `locked_account_status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_users`
--

INSERT INTO `uc_users` (`id`, `user_name`, `display_name`, `password`, `email`, `activation_token`, `last_activation_request`, `lost_password_request`, `active`, `title`, `sign_up_stamp`, `last_sign_in_stamp`, `isLeaveApprover`, `locked_account_status`) VALUES
(1, 'admin', 'Administrator', '21232f297a57a5a743894a0e4a801fc3', 'admin@vanuatuparliamenthr.com', 'c76a5e84e4bdee527e274ea30c680d79', 6, 'N', 'Y', 'New Member', 0, 0, 'N', 'N'),
(35, 'ebanga', 'ebanga', '21232f297a57a5a743894a0e4a801fc3', 'ejbanga@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(36, 'bmaxime', 'bmaxime', '482c811da5d5b4bc6d497ffa98491e38', 'bmaxime@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(37, 'ictadmin', 'ictadmin', '482c811da5d5b4bc6d497ffa98491e38', 'povict@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(39, 'rjimmy', 'rjimmy', '482c811da5d5b4bc6d497ffa98491e38', 'rjimmy@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(40, 'tleon', 'tleon', '482c811da5d5b4bc6d497ffa98491e38', 'tleon@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(41, 'dezra', 'dezra', '21232f297a57a5a743894a0e4a801fc3', 'dezra@parliament.gov.vu', 'c76a5e84e4bdee527e274ea30c680d79', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(42, 'jjonas', 'jjonas', '482c811da5d5b4bc6d497ffa98491e38', 'jjonas@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(43, 'djason', 'djason', '482c811da5d5b4bc6d497ffa98491e38', 'djason@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(44, 'nsilas', 'nsilas', '482c811da5d5b4bc6d497ffa98491e38', 'nsilas@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(45, 'gbage', 'gbage', '482c811da5d5b4bc6d497ffa98491e38', 'gbage@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(46, 'Jobed', 'Jobed', '482c811da5d5b4bc6d497ffa98491e38', 'jobed@gmail.com', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(47, 'jcharlie', 'jcharlie', '482c811da5d5b4bc6d497ffa98491e38', 'jcharlie@gmail.com', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(48, 'pmolkas', 'pmolkas', '482c811da5d5b4bc6d497ffa98491e38', 'pmolkas@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(49, 'pkapere', 'pkapere', '482c811da5d5b4bc6d497ffa98491e38', 'pkapere@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(50, 'jgeorge', 'jgeorge', '21232f297a57a5a743894a0e4a801fc3', 'jgeorge@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(51, 'jpeter', 'jpeter', '482c811da5d5b4bc6d497ffa98491e38', 'jpeter@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(52, 'rsingo', 'rsingo', '482c811da5d5b4bc6d497ffa98491e38', 'rsingo@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(53, 'rmestelle', 'rmestelle', '482c811da5d5b4bc6d497ffa98491e38', 'rmestelle@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(54, 'rgaetan', 'rgaetan', '482c811da5d5b4bc6d497ffa98491e38', 'rgaetan@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(55, 'jgraham', 'jgraham', '482c811da5d5b4bc6d497ffa98491e38', 'jgraham@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(56, 'sabbie', 'sabbie', '482c811da5d5b4bc6d497ffa98491e38', 'sabbie@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(57, 'sthomas', 'sthomas', '482c811da5d5b4bc6d497ffa98491e38', 'sthomas@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(58, 'jtoakanase', 'jtoakanase', '482c811da5d5b4bc6d497ffa98491e38', 'jtoakanase@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(59, 'krally', 'krally', '482c811da5d5b4bc6d497ffa98491e38', 'krally@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(60, 'sjfred', 'sjfred', '482c811da5d5b4bc6d497ffa98491e38', 'sjfred@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(61, 'llauret', 'llauret', '482c811da5d5b4bc6d497ffa98491e38', 'llauret@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(62, 'scarlot', 'scarlot', '482c811da5d5b4bc6d497ffa98491e38', 'scarlot@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(63, 'lsese', 'lsese', '482c811da5d5b4bc6d497ffa98491e38', 'lsese@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(64, 'smahit', 'smahit', '482c811da5d5b4bc6d497ffa98491e38', 'smahit@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(65, 'mpatunvanu', 'mpatunvanu', '482c811da5d5b4bc6d497ffa98491e38', 'mpatunvanu@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(66, 'btallet', 'btallet', '482c811da5d5b4bc6d497ffa98491e38', 'btallet@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(67, 'mnapau', 'mnapau', '482c811da5d5b4bc6d497ffa98491e38', 'mnapau@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(68, 'ttoara', 'ttoara', '482c811da5d5b4bc6d497ffa98491e38', 'ttoara@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(69, 'mmatalue', 'mmatalue', '482c811da5d5b4bc6d497ffa98491e38', 'mmatalue@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(70, 'mcalo', 'mcalo', '482c811da5d5b4bc6d497ffa98491e38', 'mcalo@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(71, 'ttfaratie', 'ttfaratie', '482c811da5d5b4bc6d497ffa98491e38', 'ttfaratie@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(72, 'nlaban', 'nlaban', '482c811da5d5b4bc6d497ffa98491e38', 'nlaban@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(73, 'nsilas', 'nsilas', '482c811da5d5b4bc6d497ffa98491e38', 'nsilas@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(74, 'jrdelaveau', 'jrdelaveau', '21232f297a57a5a743894a0e4a801fc3', 'jrdelaveau@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(75, 'ulitoung', 'ulitoung', '482c811da5d5b4bc6d497ffa98491e38', 'ulituong@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(76, 'lvere', 'lvere', '482c811da5d5b4bc6d497ffa98491e38', 'lvere@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(77, 'vjosiah', 'vjosiah', '482c811da5d5b4bc6d497ffa98491e38', 'vjosiah@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(78, 'wsandy', 'wsandy', '482c811da5d5b4bc6d497ffa98491e38', 'wsandy@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(79, 'djason', 'djason', '482c811da5d5b4bc6d497ffa98491e38', 'djason@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(80, 'itoka', 'itoka', '482c811da5d5b4bc6d497ffa98491e38', 'itoka@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(81, 'hmaki', 'hmaki', '5f4dcc3b5aa765d61d8327deb882cf99', 'hmaki@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(82, 'willieg', 'willieg', '482c811da5d5b4bc6d497ffa98491e38', 'willieg@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(83, 'gvertony', 'gvertony', '482c811da5d5b4bc6d497ffa98491e38', 'gvertony@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(84, 'gbage', 'gbage', '482c811da5d5b4bc6d497ffa98491e38', 'gbage@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(85, 'fatingting', 'fatingting', '482c811da5d5b4bc6d497ffa98491e38', 'fatingting@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(86, 'dezra', 'dezra', '482c811da5d5b4bc6d497ffa98491e38', 'dezra@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(87, 'ewokon', 'ewokon', '482c811da5d5b4bc6d497ffa98491e38', 'ewokon@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(88, 'ejbanga', 'ejbanga', '482c811da5d5b4bc6d497ffa98491e38', 'ejbanga@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(89, 'etore', 'etore', '482c811da5d5b4bc6d497ffa98491e38', 'etore@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(90, 'boalpi', 'boalpi', '482c811da5d5b4bc6d497ffa98491e38', 'boalpi@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(91, 'atary', 'atary', '482c811da5d5b4bc6d497ffa98491e38', 'atary@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(92, 'alolten', 'alolten', '482c811da5d5b4bc6d497ffa98491e38', 'alolten@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(93, 'anaimlonu', 'anaimlonu', '482c811da5d5b4bc6d497ffa98491e38', 'anaimlonu@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(94, 'rmanuake', 'rmanuake', '482c811da5d5b4bc6d497ffa98491e38', 'rmanuake@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(95, 'speaker', 'speaker', '482c811da5d5b4bc6d497ffa98491e38', 'speaker@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(96, 'pmb', 'pmb', '482c811da5d5b4bc6d497ffa98491e38', 'pmb@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N'),
(97, 'anaimlonu', 'anaimlonu', '482c811da5d5b4bc6d497ffa98491e38', 'anaimlonu@parliament.gov.vu', 'a45a89f884d96df0fd751eb310925bf9', 0, 'N', 'Y', '-', 2023, 2023, 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `uc_user_permission_matches`
--

CREATE TABLE `uc_user_permission_matches` (
  `id` bigint(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `permission_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uc_user_permission_matches`
--

INSERT INTO `uc_user_permission_matches` (`id`, `user_id`, `permission_Id`) VALUES
(18, 'EMP000000', 2),
(19, 'EMP000001', 4),
(20, 'EMP000003', 3),
(21, 'EMP000036', 3),
(22, 'EMP000015', 3),
(23, 'EMP000016', 3),
(24, 'EMP000017', 3),
(26, 'EMP000023', 3),
(27, 'EMP000004', 4),
(28, 'EMP000024', 3),
(29, 'EMP000025', 3),
(30, 'EMP000026', 3),
(31, 'EMP000027', 3),
(32, 'EMP000028', 3),
(33, 'EMP000029', 3),
(34, 'EMP000030', 3),
(35, 'EMP000031', 3),
(36, 'EMP000032', 3),
(37, 'EMP000033', 3),
(38, 'EMP000034', 3),
(40, 'EMP000037', 3),
(41, 'EMP000039', 3),
(42, 'EMP000038', 3),
(43, 'EMP000020', 3),
(44, 'EMP000021', 3),
(45, 'EMP000022', 3),
(47, 'EMP000006', 3),
(49, 'EMP000010', 0),
(53, 'EMP000008', 3);

-- --------------------------------------------------------

--
-- Table structure for table `vnpf_history`
--

CREATE TABLE `vnpf_history` (
  `id` int(11) NOT NULL,
  `emp_no` varchar(25) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `vnpf` decimal(10,0) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_emp_leave`
-- (See below for the actual view)
--
CREATE TABLE `vw_emp_leave` (
`id` bigint(20)
,`emp_no` varchar(2000)
,`leave_desc` text
,`sdate` date
,`edate` date
,`total_day` int(11)
,`status` varchar(13)
,`approve_date` date
,`leave_type` char(50)
,`approve_by` varchar(2000)
,`entry_user` varchar(24)
,`paidadvdate` date
,`curbalance` float
,`hours` double
,`is_paidadv` varchar(10)
,`next_approval` varchar(25)
,`spv_approved_by` varchar(25)
,`spv_approved_date` datetime
,`director_approved_by` varchar(25)
,`director_approved_date` datetime
,`is_advsalary` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_emp_leave_approval`
-- (See below for the actual view)
--
CREATE TABLE `vw_emp_leave_approval` (
`id` bigint(20)
,`emp_no` varchar(2000)
,`leave_desc` text
,`sdate` date
,`total_day` int(11)
,`status` varchar(13)
,`leave_type` char(50)
,`next_approval` varchar(25)
);

-- --------------------------------------------------------

--
-- Structure for view `getnumempbasedonageandgender`
--
DROP TABLE IF EXISTS `getnumempbasedonageandgender`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getnumempbasedonageandgender`  AS SELECT `x`.`gender` AS `gender`, sum(case when `x`.`age` < 20 then 1 else 0 end) AS `a`, sum(case when `x`.`age` between 20 and 25 then 1 else 0 end) AS `b`, sum(case when `x`.`age` between 25 and 30 then 1 else 0 end) AS `c`, sum(case when `x`.`age` between 30 and 35 then 1 else 0 end) AS `d`, sum(case when `x`.`age` between 35 and 40 then 1 else 0 end) AS `e`, sum(case when `x`.`age` between 40 and 45 then 1 else 0 end) AS `f`, sum(case when `x`.`age` between 45 and 50 then 1 else 0 end) AS `g`, sum(case when `x`.`age` between 50 and 55 then 1 else 0 end) AS `h`, sum(case when `x`.`age` between 55 and 60 then 1 else 0 end) AS `i` FROM (select `employee`.`gender` AS `gender`,year(current_timestamp()) - year(`employee`.`birthday`) - (right(current_timestamp(),5) < right(`employee`.`birthday`,5)) AS `age` from `employee`) AS `x` WHERE `x`.`gender` = 'male' union all select `x`.`gender` AS `gender`,sum(case when `x`.`age` < 20 then 1 else 0 end) AS `a`,sum(case when `x`.`age` between 20 and 25 then 1 else 0 end) AS `b`,sum(case when `x`.`age` between 25 and 30 then 1 else 0 end) AS `c`,sum(case when `x`.`age` between 30 and 35 then 1 else 0 end) AS `d`,sum(case when `x`.`age` between 35 and 40 then 1 else 0 end) AS `e`,sum(case when `x`.`age` between 40 and 45 then 1 else 0 end) AS `f`,sum(case when `x`.`age` between 45 and 50 then 1 else 0 end) AS `g`,sum(case when `x`.`age` between 50 and 55 then 1 else 0 end) AS `h`,sum(case when `x`.`age` between 55 and 60 then 1 else 0 end) AS `i` from (select `employee`.`gender` AS `gender`,year(current_timestamp()) - year(`employee`.`birthday`) - (right(current_timestamp(),5) < right(`employee`.`birthday`,5)) AS `age` from `employee`) `x` where `x`.`gender` = 'female'  ;

-- --------------------------------------------------------

--
-- Structure for view `getnumempbasedondepartment`
--
DROP TABLE IF EXISTS `getnumempbasedondepartment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getnumempbasedondepartment`  AS SELECT `employee`.`gender` AS `gender`, `emp_department`.`name` AS `name`, count(`emp_department`.`name`) AS `num_of_emp` FROM (`employee` left join `emp_department` on(`employee`.`department` = `emp_department`.`id`)) GROUP BY `employee`.`gender`, `emp_department`.`name``name`  ;

-- --------------------------------------------------------

--
-- Structure for view `getnumempbasedonministry`
--
DROP TABLE IF EXISTS `getnumempbasedonministry`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getnumempbasedonministry`  AS SELECT `employee`.`gender` AS `gender`, `emp_ministry`.`name` AS `name`, count(`emp_ministry`.`name`) AS `num_of_emp` FROM ((`employee` left join `emp_department` on(`employee`.`department` = `emp_department`.`id`)) left join `emp_ministry` on(`emp_department`.`ministryid` = `emp_ministry`.`id`)) GROUP BY `employee`.`gender`, `emp_ministry`.`name``name`  ;

-- --------------------------------------------------------

--
-- Structure for view `getnumempbasedonworkhistory`
--
DROP TABLE IF EXISTS `getnumempbasedonworkhistory`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getnumempbasedonworkhistory`  AS SELECT `x`.`gender` AS `gender`, sum(case when `x`.`age` < 5 then 1 else 0 end) AS `a`, sum(case when `x`.`age` between 6 and 10 then 1 else 0 end) AS `b`, sum(case when `x`.`age` between 11 and 15 then 1 else 0 end) AS `c`, sum(case when `x`.`age` between 16 and 20 then 1 else 0 end) AS `d`, sum(case when `x`.`age` between 21 and 25 then 1 else 0 end) AS `e`, sum(case when `x`.`age` between 26 and 30 then 1 else 0 end) AS `f`, sum(case when `x`.`age` > 30 then 1 else 0 end) AS `g` FROM (select `employee`.`gender` AS `gender`,year(current_timestamp()) - year(`employee`.`joindate`) - (right(current_timestamp(),5) < right(`employee`.`joindate`,5)) AS `age` from `employee`) AS `x` WHERE `x`.`gender` = 'male' union all select `x`.`gender` AS `gender`,sum(case when `x`.`age` < 5 then 1 else 0 end) AS `a`,sum(case when `x`.`age` between 6 and 10 then 1 else 0 end) AS `b`,sum(case when `x`.`age` between 11 and 15 then 1 else 0 end) AS `c`,sum(case when `x`.`age` between 16 and 20 then 1 else 0 end) AS `d`,sum(case when `x`.`age` between 21 and 25 then 1 else 0 end) AS `e`,sum(case when `x`.`age` between 26 and 30 then 1 else 0 end) AS `f`,sum(case when `x`.`age` > 30 then 1 else 0 end) AS `g` from (select `employee`.`gender` AS `gender`,year(current_timestamp()) - year(`employee`.`joindate`) - (right(current_timestamp(),5) < right(`employee`.`joindate`,5)) AS `age` from `employee`) `x` where `x`.`gender` = 'female'  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_emp_leave`
--
DROP TABLE IF EXISTS `vw_emp_leave`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_emp_leave`  AS SELECT `a`.`id` AS `id`, `b`.`emp_name` AS `emp_no`, `a`.`leave_desc` AS `leave_desc`, `a`.`sdate` AS `sdate`, `a`.`edate` AS `edate`, `a`.`total_day` AS `total_day`, CASE WHEN `a`.`status` = 1 THEN 'Need Approval' WHEN `a`.`status` = 2 THEN 'Approved' WHEN `a`.`status` = -1 THEN 'Rejected' END AS `status`, `a`.`approve_date` AS `approve_date`, `c`.`leave_name` AS `leave_type`, `d`.`emp_name` AS `approve_by`, `a`.`entry_user` AS `entry_user`, `a`.`paidadvdate` AS `paidadvdate`, `a`.`curbalance` AS `curbalance`, `a`.`hours` AS `hours`, `a`.`is_paidadv` AS `is_paidadv`, `a`.`next_approval` AS `next_approval`, `a`.`spv_approved_by` AS `spv_approved_by`, `a`.`spv_approved_date` AS `spv_approved_date`, `a`.`director_approved_by` AS `director_approved_by`, `a`.`director_approved_date` AS `director_approved_date`, `a`.`is_advsalary` AS `is_advsalary` FROM (((`emp_leave` `a` left join `employee` `b` on(`a`.`emp_no` = `b`.`emp_no`)) left join `leave_setting` `c` on(`a`.`leave_type` = `c`.`leave_setting_id`)) left join `employee` `d` on(`a`.`approve_by` = `d`.`emp_no`))  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_emp_leave_approval`
--
DROP TABLE IF EXISTS `vw_emp_leave_approval`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_emp_leave_approval`  AS SELECT `emp_leave`.`id` AS `id`, `employee`.`emp_name` AS `emp_no`, `emp_leave`.`leave_desc` AS `leave_desc`, `emp_leave`.`sdate` AS `sdate`, `emp_leave`.`total_day` AS `total_day`, CASE WHEN `emp_leave`.`status` = 1 THEN 'Need Approval' WHEN `emp_leave`.`status` = 2 THEN 'Approved' END AS `status`, `leave_setting`.`leave_name` AS `leave_type`, `emp_leave`.`next_approval` AS `next_approval` FROM ((`emp_leave` left join `employee` on(`emp_leave`.`emp_no` = `employee`.`emp_no`)) left join `leave_setting` on(`emp_leave`.`leave_type` = `leave_setting`.`leave_setting_id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `absenrevision`
--
ALTER TABLE `absenrevision`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `allowance`
--
ALTER TABLE `allowance`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `ass_emp`
--
ALTER TABLE `ass_emp`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `ass_emp_detail`
--
ALTER TABLE `ass_emp_detail`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `award_cat`
--
ALTER TABLE `award_cat`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `book_main`
--
ALTER TABLE `book_main`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `book_seq_numbering`
--
ALTER TABLE `book_seq_numbering`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_type`
--
ALTER TABLE `book_type`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `book_type_name`
--
ALTER TABLE `book_type_name`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `comp_locat`
--
ALTER TABLE `comp_locat`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `disciple_cat`
--
ALTER TABLE `disciple_cat`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `edu_inst`
--
ALTER TABLE `edu_inst`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `edu_level`
--
ALTER TABLE `edu_level`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_allowance`
--
ALTER TABLE `emp_allowance`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_award`
--
ALTER TABLE `emp_award`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_department`
--
ALTER TABLE `emp_department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `emp_department_old`
--
ALTER TABLE `emp_department_old`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_disciple`
--
ALTER TABLE `emp_disciple`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_division`
--
ALTER TABLE `emp_division`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_division_old`
--
ALTER TABLE `emp_division_old`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_duty`
--
ALTER TABLE `emp_duty`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_edu`
--
ALTER TABLE `emp_edu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_emergency`
--
ALTER TABLE `emp_emergency`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_family_dep`
--
ALTER TABLE `emp_family_dep`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_family_relationship`
--
ALTER TABLE `emp_family_relationship`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_grade`
--
ALTER TABLE `emp_grade`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_job_history`
--
ALTER TABLE `emp_job_history`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_karir`
--
ALTER TABLE `emp_karir`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_keen`
--
ALTER TABLE `emp_keen`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_language_skill`
--
ALTER TABLE `emp_language_skill`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_leave`
--
ALTER TABLE `emp_leave`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_leave_bal`
--
ALTER TABLE `emp_leave_bal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `emp_leave_bal_old`
--
ALTER TABLE `emp_leave_bal_old`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_loan`
--
ALTER TABLE `emp_loan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_marital`
--
ALTER TABLE `emp_marital`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_med_history`
--
ALTER TABLE `emp_med_history`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_med_info`
--
ALTER TABLE `emp_med_info`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_ministry`
--
ALTER TABLE `emp_ministry`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_ministry_old`
--
ALTER TABLE `emp_ministry_old`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_permit`
--
ALTER TABLE `emp_permit`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_reim`
--
ALTER TABLE `emp_reim`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_religion`
--
ALTER TABLE `emp_religion`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_salary`
--
ALTER TABLE `emp_salary`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_sick`
--
ALTER TABLE `emp_sick`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_skill_interest`
--
ALTER TABLE `emp_skill_interest`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_status`
--
ALTER TABLE `emp_status`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_title`
--
ALTER TABLE `emp_title`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `emp_title_old`
--
ALTER TABLE `emp_title_old`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_training`
--
ALTER TABLE `emp_training`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `emp_unit`
--
ALTER TABLE `emp_unit`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `hospital_list`
--
ALTER TABLE `hospital_list`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `leave_setting`
--
ALTER TABLE `leave_setting`
  ADD PRIMARY KEY (`leave_setting_id`) USING BTREE;

--
-- Indexes for table `loan_type`
--
ALTER TABLE `loan_type`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `log_202`
--
ALTER TABLE `log_202`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `mfingerscan`
--
ALTER TABLE `mfingerscan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_list`
--
ALTER TABLE `notification_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_holiday`
--
ALTER TABLE `public_holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reim_balance`
--
ALTER TABLE `reim_balance`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `reim_type`
--
ALTER TABLE `reim_type`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `skill_interest_list`
--
ALTER TABLE `skill_interest_list`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `task_activity`
--
ALTER TABLE `task_activity`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `task_category`
--
ALTER TABLE `task_category`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `task_member`
--
ALTER TABLE `task_member`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `training_institution`
--
ALTER TABLE `training_institution`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `uc_configuration`
--
ALTER TABLE `uc_configuration`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `uc_login_attempt`
--
ALTER TABLE `uc_login_attempt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uc_pages`
--
ALTER TABLE `uc_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uc_pages_old`
--
ALTER TABLE `uc_pages_old`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `uc_permissions`
--
ALTER TABLE `uc_permissions`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `uc_permission_page_matches`
--
ALTER TABLE `uc_permission_page_matches`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `uc_permission_page_matches_old`
--
ALTER TABLE `uc_permission_page_matches_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uc_reset_password`
--
ALTER TABLE `uc_reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uc_users`
--
ALTER TABLE `uc_users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `uc_user_permission_matches`
--
ALTER TABLE `uc_user_permission_matches`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `vnpf_history`
--
ALTER TABLE `vnpf_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=580;

--
-- AUTO_INCREMENT for table `allowance`
--
ALTER TABLE `allowance`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ass_emp`
--
ALTER TABLE `ass_emp`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ass_emp_detail`
--
ALTER TABLE `ass_emp_detail`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `award_cat`
--
ALTER TABLE `award_cat`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `book_main`
--
ALTER TABLE `book_main`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `book_seq_numbering`
--
ALTER TABLE `book_seq_numbering`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `book_type`
--
ALTER TABLE `book_type`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `book_type_name`
--
ALTER TABLE `book_type_name`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comp_locat`
--
ALTER TABLE `comp_locat`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `disciple_cat`
--
ALTER TABLE `disciple_cat`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `edu_inst`
--
ALTER TABLE `edu_inst`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `edu_level`
--
ALTER TABLE `edu_level`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- AUTO_INCREMENT for table `emp_allowance`
--
ALTER TABLE `emp_allowance`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_award`
--
ALTER TABLE `emp_award`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_department`
--
ALTER TABLE `emp_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `emp_department_old`
--
ALTER TABLE `emp_department_old`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emp_disciple`
--
ALTER TABLE `emp_disciple`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emp_division`
--
ALTER TABLE `emp_division`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `emp_division_old`
--
ALTER TABLE `emp_division_old`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `emp_duty`
--
ALTER TABLE `emp_duty`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emp_edu`
--
ALTER TABLE `emp_edu`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `emp_emergency`
--
ALTER TABLE `emp_emergency`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_family_dep`
--
ALTER TABLE `emp_family_dep`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emp_family_relationship`
--
ALTER TABLE `emp_family_relationship`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `emp_grade`
--
ALTER TABLE `emp_grade`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emp_job_history`
--
ALTER TABLE `emp_job_history`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emp_karir`
--
ALTER TABLE `emp_karir`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_keen`
--
ALTER TABLE `emp_keen`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `emp_language_skill`
--
ALTER TABLE `emp_language_skill`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emp_leave`
--
ALTER TABLE `emp_leave`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `emp_leave_bal`
--
ALTER TABLE `emp_leave_bal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `emp_leave_bal_old`
--
ALTER TABLE `emp_leave_bal_old`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emp_loan`
--
ALTER TABLE `emp_loan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_marital`
--
ALTER TABLE `emp_marital`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `emp_med_history`
--
ALTER TABLE `emp_med_history`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_med_info`
--
ALTER TABLE `emp_med_info`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_ministry`
--
ALTER TABLE `emp_ministry`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emp_ministry_old`
--
ALTER TABLE `emp_ministry_old`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `emp_permit`
--
ALTER TABLE `emp_permit`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emp_reim`
--
ALTER TABLE `emp_reim`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emp_religion`
--
ALTER TABLE `emp_religion`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `emp_salary`
--
ALTER TABLE `emp_salary`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_sick`
--
ALTER TABLE `emp_sick`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emp_skill_interest`
--
ALTER TABLE `emp_skill_interest`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emp_status`
--
ALTER TABLE `emp_status`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emp_title`
--
ALTER TABLE `emp_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `emp_title_old`
--
ALTER TABLE `emp_title_old`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `emp_training`
--
ALTER TABLE `emp_training`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emp_unit`
--
ALTER TABLE `emp_unit`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hospital_list`
--
ALTER TABLE `hospital_list`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave_setting`
--
ALTER TABLE `leave_setting`
  MODIFY `leave_setting_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `loan_type`
--
ALTER TABLE `loan_type`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_202`
--
ALTER TABLE `log_202`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mfingerscan`
--
ALTER TABLE `mfingerscan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notification_list`
--
ALTER TABLE `notification_list`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `public_holiday`
--
ALTER TABLE `public_holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reim_balance`
--
ALTER TABLE `reim_balance`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reim_type`
--
ALTER TABLE `reim_type`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skill_interest_list`
--
ALTER TABLE `skill_interest_list`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_activity`
--
ALTER TABLE `task_activity`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_category`
--
ALTER TABLE `task_category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_member`
--
ALTER TABLE `task_member`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training_institution`
--
ALTER TABLE `training_institution`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uc_configuration`
--
ALTER TABLE `uc_configuration`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `uc_login_attempt`
--
ALTER TABLE `uc_login_attempt`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uc_pages`
--
ALTER TABLE `uc_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `uc_pages_old`
--
ALTER TABLE `uc_pages_old`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `uc_permissions`
--
ALTER TABLE `uc_permissions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uc_permission_page_matches`
--
ALTER TABLE `uc_permission_page_matches`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `uc_permission_page_matches_old`
--
ALTER TABLE `uc_permission_page_matches_old`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uc_reset_password`
--
ALTER TABLE `uc_reset_password`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `uc_users`
--
ALTER TABLE `uc_users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `uc_user_permission_matches`
--
ALTER TABLE `uc_user_permission_matches`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `vnpf_history`
--
ALTER TABLE `vnpf_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
