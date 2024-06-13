-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 10:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `title_name` varchar(100) NOT NULL COMMENT 'ระดับผู้ใช้งาน',
  `agency` varchar(100) NOT NULL COMMENT 'หน่วยงาน',
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`id`, `username`, `title_name`, `agency`, `password`, `name`, `surname`) VALUES
(1, 'tnc', 'Admin', 'แผนกกรรมวิธีฯ', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'จ.ท.ธนโชติ ', 'หงษ์สมดี'),
(2, 'user', 'Users', 'แผนกกรรมวิธีฯ', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'จ.ท.ธนโชติ ', 'หงษ์สมดี');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `ser_id` int(11) NOT NULL,
  `ref_d_no` varchar(100) NOT NULL,
  `ref_d_sn` int(11) NOT NULL,
  `ref_m_id` int(11) NOT NULL,
  `ser_date_lend` date NOT NULL,
  `ser_staff_id_lend` int(11) NOT NULL,
  `ser_staff_name_lend` varchar(100) NOT NULL,
  `ser_staff_id_return` int(11) NOT NULL,
  `ser_staff_name_return` varchar(100) NOT NULL,
  `ser_datesave` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_table`
--

CREATE TABLE `tbl_table` (
  `id` int(11) NOT NULL,
  `governmentagency` varchar(100) NOT NULL COMMENT 'ส่วนราชการ',
  `agen` varchar(100) NOT NULL COMMENT 'หน่วยงาน',
  `type_group` varchar(255) NOT NULL COMMENT 'ประเภท',
  `no` varchar(100) NOT NULL COMMENT 'เลขทะเบียนครุภัณฑ์',
  `detail` varchar(100) NOT NULL COMMENT 'ลักษณะ/คุณสมบัติ',
  `sn` varchar(100) NOT NULL COMMENT 'S/N',
  `location` varchar(100) NOT NULL COMMENT 'หน่วยรับผิดชอบ',
  `date` date NOT NULL,
  `supply` varchar(100) NOT NULL COMMENT 'วิธีการได้มา',
  `doc` varchar(100) NOT NULL COMMENT 'ที่เอกสาร',
  `price` int(6) NOT NULL COMMENT 'ราคา',
  `evidence` varchar(100) NOT NULL COMMENT 'หลักฐานการจ่าย',
  `status` varchar(100) NOT NULL COMMENT 'สถานะ',
  `agen_lend` varchar(100) NOT NULL,
  `name_lend` varchar(100) NOT NULL,
  `date_lend` date DEFAULT NULL,
  `tel_lend` varchar(20) NOT NULL,
  `date_night` varchar(100) NOT NULL COMMENT 'ว/ด/ป คืน',
  `name_return` varchar(100) NOT NULL COMMENT 'ชื่อผู้คืน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_table`
--

INSERT INTO `tbl_table` (`id`, `governmentagency`, `agen`, `type_group`, `no`, `detail`, `sn`, `location`, `date`, `supply`, `doc`, `price`, `evidence`, `status`, `agen_lend`, `name_lend`, `date_lend`, `tel_lend`, `date_night`, `name_return`) VALUES
(8, 'กจก.', 'อร.', 'เคส', '31010304-7010201-0007', 'Acer รุ่น : Extensa แบบ : M2610 ,CPU : Intel Core i5-4460 3.2 GHz ,RAM : 4GB DDR3 ,HDD : 1 TB', 'UDXOCST009950001B70401 ', 'แผนกกรรมวิธีข้อมูลและสถิติ กจก.อร.', '2016-09-16', 'สสท.ทร.จัดหา', 'บันทึก สสท.ทร.ที่ กห 0507.3/310 ลง 5 ส.ค.59', 19774, '-', 'ยืม/ใช้งาน', 'สำนักงาน', 'จ.ท.ธนโชติ หงษ์สมดี', '2024-05-27', '78086', '', ''),
(9, 'อร', 'กจก.', 'เคส', '111', '/-/ๅ-/เกดหเดเกดห', '1312313213', 'ผ.กรรมวิธีข้อมูฯ กจก.', '2024-05-22', 'ggg', 'eee', 23112, '-', 'สูญหาย', '', '', NULL, '', '', ''),
(10, 'กจก', 'กก', 'เครื่องปริ้น', '1223', 'กฟดดกหฟด', '2132134', 'hfhgf', '2024-05-22', 'ggg', '33/สซ./51/(ส.84/51)', 23, '-', 'ชำรุด', '', '', NULL, '', '', ''),
(11, 'กจก', 'กก', 'เคส', '127', 'ffasfd', 'asfadsfa', 'adfasd', '2024-05-21', 'asfads', 'asfads', 0, 'afsd', 'ชำรุด', '', '', NULL, '', '', ''),
(12, 'sd', 'asdaD', 'เคส', 'adfdasf', 'adsfda', 'asfadsf', 'asdfads', '2024-05-29', 'asdfads', 'asdfdas', 0, 'asfads', 'ยืม/ใช้งาน', '', '', NULL, '', '', ''),
(13, 'adfads', 'adsfadsfd', 'จอภาพ', 'asfadsf', 'asfadsf', 'asfadsfa', 'adsfadsf', '2024-05-09', 'asfads', 'asdfadsf', 4143, '1431', 'ส่งรุจำหน่าย', '', '', NULL, '', '', ''),
(14, '12432', '414', 'เคส', '12421', '141', '1342141', '124143', '2024-05-04', '1431', '1431', 12421, '12412', 'ส่งรุจำหน่าย', '', '', NULL, '', '', ''),
(16, '21343', '234', 'เคส', '214', '21421', '21431', '12421', '2024-05-28', '214', '21432', 21412, '214', 'ส่งซ่อม', '', '', NULL, '', '', ''),
(17, '1412', '1414', 'เคส', '1241', '1421', '1243', '1431', '2024-05-22', '12431', '214', 124, '1243', 'ชำรุด', '', '', '0000-00-00', '', '', ''),
(18, '21432', '12421', 'เคส', '12421', '2143212', '21421', '124321', '2024-05-23', '134312', '1241', 1241, '12431', 'สูญหาย', '', '', NULL, '', '', ''),
(19, '421432', '214', 'เคส', '124', '21421', '1243', '12431', '2024-05-22', '1243312', '12431', 143, '14', 'ชำรุด', '', '', NULL, '', '', ''),
(20, 'กจก', 'อร.', 'เครื่องสำรองไฟ', '999', '4545', '4545', 'ผ.กรรมวิธีข้อมูฯ กจก.', '2024-05-28', 'ggg', '33/สซ./51/(ส.84/51)', 23, 'gg', 'ยืม/ใช้งาน', '', '', NULL, '', '2024-06-29', ''),
(22, 'กจก', 'อร.', 'จอภาพ', '1223', 'ๅ-/ๅ-/ๅ', '2321321', '12321', '2024-05-21', 'jghjghj', 'eee', 23112, '-', 'ส่งซ่อม', '', '', '0000-00-00', '', '', ''),
(25, 'อร.', 'กก', 'เครื่องสำรองไฟ', '444444', 'sdfsfs', 'asfasdf', 'asdfasdf', '2024-06-20', '12321', '33/สซ./51/(ส.84/51)', 23, '-', 'ยืม/ใช้งาน', 'กรรม', 'ffff', '2024-06-27', '78086', '2024-06-11', ''),
(26, 'ดดดด', 'ดดดดด', 'เคส', 'ดดดด', 'ดดดดดด', 'ดดด', 'ดดดดดด', '2024-06-26', 'ด', 'ด', 0, 'ด', 'ยืม/ใช้งาน', 'กรรม', 'ffff', '2024-06-25', '111', '2024-06-15', ''),
(27, 'lll', 'กกกกก', 'จอภาพ', 'กกกกกกกก', 'กกกกกกกกกก', 'กกกกกกกก', 'กกกกกกกก', '2024-06-20', 'กกกกกกกกก', 'กกกกกกก', 0, 'กกกก', 'ยืม/ใช้งาน', 'กกกกกก', 'กกกกกก', '2024-06-01', 'กกก', '2024-06-20', '1111111'),
(28, 'อร.', 'อร.', 'เคส', '1223', 'qqqq', 'qqqq', 'qqqqq', '2024-06-12', 'qqqq', 'qqq', 0, 'qqqq', 'ยืม/ใช้งาน', '3333', '3333', '2024-06-18', '44444', '2024-06-12', 'sadad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`ser_id`);

--
-- Indexes for table `tbl_table`
--
ALTER TABLE `tbl_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_table`
--
ALTER TABLE `tbl_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
