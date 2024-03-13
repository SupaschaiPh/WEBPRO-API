-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 13, 2024 at 09:39 AM
-- Server version: 11.3.2-MariaDB-1:11.3.2+maria~ubu2204
-- PHP Version: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g11hotpot`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` varchar(100) NOT NULL,
  `e_name` varchar(100) DEFAULT NULL,
  `e_lastname` varchar(100) DEFAULT NULL,
  `duty` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `salary` float DEFAULT NULL,
  `profile_url` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `e_name`, `e_lastname`, `duty`, `address`, `start_date`, `end_date`, `salary`, `profile_url`) VALUES
('2024-03-08-11-27-44-0344-65eaf630c7d8c', 'manager', 'manager', 'ผู้จัดการ', 'sooksan hotpot', '2024-03-08 11:42:27', NULL, NULL, '/bucket/upload/employee/65f14a4088511.jpg'),
('2024-03-08-11-29-17-0317-65eaf68d41743', 'cashier', 'cashier', 'แคชเชียร์', 'sooksan hotpot', '2024-03-08 11:43:07', NULL, NULL, '/bucket/upload/employee/65f14a69a77cb.jpg'),
('2024-03-08-11-29-31-0331-65eaf69b4a3cf', 'chef', 'chef', 'พนักงานครัว', 'sooksan hotpot', '2024-03-08 11:43:27', NULL, NULL, '/bucket/upload/employee/65f14f51e3c28.jpg'),
('2024-03-08-11-29-42-0342-65eaf6a6d5c5b', 'service', 'service', 'พนักงานเสิร์ฟ', 'sooksan hotpot', '2024-03-08 11:44:04', NULL, NULL, '/bucket/upload/employee/65f150a56947b.jpg'),
('2024-03-08-11-47-29-0329-65eafad1b9bd4', 'table1', 'table@sooksanHp', 'พนักงานเสิร์ฟ', 'sooksan hotpot', '2024-03-08 12:00:43', NULL, NULL, '/bucket/upload/employee/65f150b3e8c84.jpg'),
('2024-03-08-11-47-43-0343-65eafadf45ba0', 'table2', 'table@sooksanHp', 'พนักงานเสิร์ฟ', 'sooksan hotpot', '2024-03-08 12:01:07', NULL, NULL, '/bucket/upload/employee/65f150cd9c81f.jpg'),
('2024-03-08-11-47-49-0349-65eafae5bdaca', 'table3', 'table@sooksanHp', 'พนักงานเสิร์ฟ', 'sooksan hotpot', '2024-03-08 12:07:05', NULL, NULL, '/bucket/upload/employee/65f151912edce.jpg'),
('2024-03-08-11-47-55-0355-65eafaeb0a3c9', 'table4', 'table@sooksanHp', 'พนักงานเสิร์ฟ', 'sooksan hotpot', '2024-03-08 12:07:05', NULL, NULL, '/bucket/upload/employee/65f151a3f31e8.jpg'),
('2024-03-08-11-48-03-0303-65eafaf3c054b', 'table5', 'table@sooksanHp', 'พนักงานเสิร์ฟ', 'sooksan hotpot', '2024-03-08 12:07:05', NULL, NULL, '/bucket/upload/employee/65f151b69287d.jpg'),
('2024-03-08-11-48-09-0309-65eafaf962a19', 'table6', 'table@sooksanHp', 'พนักงานเสิร์ฟ', 'sooksan hotpot', '2024-03-08 12:07:05', NULL, NULL, '/bucket/upload/employee/65f151c6a265a.jpg'),
('2024-03-08-11-48-17-0317-65eafb0128a31', 'table7', 'table@sooksanHp', 'พนักงานเสิร์ฟ', 'sooksan hotpot', '2024-03-08 12:07:05', NULL, NULL, '/bucket/upload/employee/65f151f3042aa.jpg'),
('2024-03-08-11-48-23-0323-65eafb078e1bb', 'table8', 'table@sooksanHp', 'พนักงานเสิร์ฟ', 'sooksan hotpot', '2024-03-08 12:07:05', NULL, NULL, '/bucket/upload/employee/65f1520380cf9.jpg'),
('2024-03-08-11-48-30-0330-65eafb0e49163', 'table9', 'table@sooksanHp', 'พนักงานเสิร์ฟ', 'sooksan hotpot', '2024-03-08 12:07:05', NULL, NULL, '/bucket/upload/employee/65f1520eaf8ef.jpg'),
('2024-03-08-11-48-38-0338-65eafb165e86f', 'table10', 'table@sooksanHp', 'พนักงานเสิร์ฟ', 'sooksan hotpot', '2024-03-08 12:07:05', NULL, NULL, '/bucket/upload/employee/65f150c10fcc9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` float NOT NULL,
  `last_update_date` datetime NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `title`, `description`, `price`, `last_update_date`, `img_url`, `type`, `active`) VALUES
(1, 'ซุปหมาล่า', '', 49, '2024-03-03 03:57:37', '/bucket/upload/menu/65f1490072d7c.png', 'น้ำซุป', 1),
(2, 'ซุปกระดูกหมู', '', 49, '2024-03-03 03:58:04', '/bucket/upload/menu/65edea172d10d.png', 'น้ำซุป', 1),
(3, 'ซุปต้มยำกุ้ง', '', 49, '2024-03-03 03:59:46', '/bucket/upload/menu/65edea1de7ce8.png', 'น้ำซุป', 1),
(4, 'ซุปเห็ด', '', 49, '2024-03-04 08:05:20', '/bucket/upload/menu/65edff3cd90de.png', 'น้ำซุป', 1),
(5, 'ซุปมะเขือเทศ', '', 49, '2024-03-04 08:07:05', '/bucket/upload/menu/65edff7b89ba6.png', 'น้ำซุป', 1),
(6, 'ซุปกระดูกไก่', '', 49, '2024-03-10 15:33:31', '/bucket/upload/menu/65edff872a239.png', 'น้ำซุป', 1),
(7, 'สันคอหมูสไลด์', 'หมู', 69, '2024-03-10 16:21:26', '/bucket/upload/menu/65edffe1a7d1d.png', 'เนื้อสัตว์', 1),
(8, 'หมูสไลด์', 'หมู', 63, '2024-03-10 19:32:43', '/bucket/upload/menu/65ee0099f1ac9.png', 'เนื้อสัตว์', 1),
(9, 'หมูคุโรบูตะสไลด์', 'หมู', 82, '2024-03-10 19:32:43', '/bucket/upload/menu/65ee00a95879d.png', 'เนื้อสัตว์', 1),
(10, 'หมูนุ่ม', 'หมู', 62, '2024-03-10 19:38:52', '/bucket/upload/menu/65ee00b44ef3f.png', 'เนื้อสัตว์', 1),
(11, 'หมูชาบู', 'หมู', 72, '2024-03-10 19:45:37', '/bucket/upload/menu/65f13cc462454.png', 'เนื้อสัตว์', 1),
(12, 'เนื้อไก่', 'ไก่', 52, '2024-03-10 15:47:41', '/bucket/upload/menu/65ee00c1af1c4.png', 'เนื้อสัตว์', 1),
(13, 'เนื้อสไลด์ออสเตรเลีย', 'เนื้อ', 107, '2024-03-10 15:47:41', '/bucket/upload/menu/65ee00d59e814.png', 'เนื้อสัตว์', 1),
(14, 'เนื้อสไลด์อเมริกา', 'เนื้อ', 107, '2024-03-10 15:50:19', '/bucket/upload/menu/65ee00e1909dc.png', 'เนื้อสัตว์', 1),
(15, 'เนื้อวัว', 'เนื้อ', 62, '2024-03-10 15:50:19', '/bucket/upload/menu/65ee00ed35fb0.png', 'เนื้อสัตว์', 1),
(16, 'หอยแมลงภู่', 'หอย', 102, '2024-03-10 15:51:37', '/bucket/upload/menu/65ee01535d871.png', 'ทะเล', 1),
(17, 'กุ้งสด', 'กุ้ง', 93, '2024-03-10 15:51:37', '/bucket/upload/menu/65ee015d542d2.png', 'ทะเล', 1),
(18, 'ปลาหมึกสด', 'ปลาหมึก', 88, '2024-03-10 15:51:37', '/bucket/upload/menu/65ee01679c617.png', 'ทะเล', 1),
(19, 'เนื้อปลาสด', 'ปลา', 84, '2024-03-10 15:51:37', '/bucket/upload/menu/65ee017215267.png', 'ทะเล', 1),
(20, 'ชุดเซ็ต S', NULL, 199, '2024-03-10 15:57:29', '/bucket/upload/menu/65f143364f03e.png', 'ชุดเซ็ต', 1),
(21, 'ชุดเซ็ต M', NULL, 299, '2024-03-10 15:57:29', '/bucket/upload/menu/65f1433f566da.png', 'ชุดเซ็ต', 1),
(22, 'ชุดเซ็ต L', NULL, 399, '2024-03-10 15:57:29', '/bucket/upload/menu/65f14347585fb.png', 'ชุดเซ็ต', 1),
(23, 'ชุดเซ็ต XL', NULL, 499, '2024-03-10 15:57:29', '/bucket/upload/menu/65f1435149515.png', 'ชุดเซ็ต', 1),
(24, 'ผักกาดขาว', NULL, 36, '2024-03-10 16:57:51', '/bucket/upload/menu/65ee0211a3a71.png', 'ผัก', 1),
(25, 'ผักปวยเล้ง', NULL, 32, '2024-03-10 16:57:51', '/bucket/upload/menu/65f170475f6ed.jpg', 'ผัก', 1),
(26, 'ผักขึ้นฉ่าย', NULL, 29, '2024-03-10 16:57:51', '/bucket/upload/menu/65f17052d193c.jpg', 'ผัก', 1),
(27, 'ผักกวางตุ้ง', NULL, 27, '2024-03-10 16:57:51', '/bucket/upload/menu/65f1705e59def.jpg', 'ผัก', 1),
(28, 'ข้าวโพดอ่อน', NULL, 26, '2024-03-10 16:57:51', '/bucket/upload/menu/65f170719074a.jpg', 'ผัก', 1),
(29, 'ผักบุ้ง', NULL, 23, '2024-03-10 16:57:51', '/bucket/upload/menu/65ee02c7e1518.png', 'ผัก', 1),
(30, 'ต้นหอม', NULL, 23, '2024-03-10 16:57:51', '/bucket/upload/menu/65f1708f7e6cb.jpg', 'ผัก', 1),
(31, 'เห็ดเข็มทอง', NULL, 40, '2024-03-10 16:57:51', '/bucket/upload/menu/65f1709f8b548.jpg', 'ผัก', 1),
(32, 'เห็ดหอม', NULL, 49, '2024-03-10 16:57:51', '/bucket/upload/menu/65f170ad958db.jpg', 'ผัก', 1),
(33, 'เห็ดฟาง', NULL, 36, '2024-03-10 16:57:51', '/bucket/upload/menu/65ee02fa115d5.png', 'ผัก', 1),
(34, 'ข้าวผัดกระเทียม', NULL, 39, '2024-03-10 17:03:47', '/bucket/upload/menu/65f17100c23cc.webp', 'จานเดี่ยว', 1),
(35, 'ข้าวเปล่า', NULL, 17, '2024-03-10 17:03:47', '/bucket/upload/menu/65ee034d44cc2.png', 'จานเดี่ยว', 1),
(36, 'บะหมี่หยก', NULL, 65, '2024-03-10 17:03:47', '/bucket/upload/menu/65ee035794c10.png', 'จานเดี่ยว', 1),
(37, 'ไข่ไก่', NULL, 14, '2024-03-10 17:05:24', '/bucket/upload/menu/65ee045aae6e5.png', 'อื่นๆ', 1),
(38, 'ลูกชิ้นหยดน้ำไข่เค็ม\r\n', NULL, 84, '2024-03-10 17:05:24', '/bucket/upload/menu/65ee04663008a.png', 'อื่นๆ', 1),
(39, 'ลูกชิ้นกุ้ง', NULL, 95, '2024-03-10 17:05:24', '/bucket/upload/menu/65ee0470c44ab.png', 'อื่นๆ', 1),
(40, 'ลูกชิ้นปู', NULL, 87, '2024-03-10 17:05:24', '/bucket/upload/menu/65ee047aea1f4.png', 'อื่นๆ', 1),
(41, 'ลูกชิ้นหยดไข่กุ้ง', NULL, 86, '2024-03-10 17:05:24', '/bucket/upload/menu/65ee048b62caf.png', 'อื่นๆ', 1),
(42, 'สาหร่ายทรงเครื่อง', NULL, 84, '2024-03-10 17:05:24', '/bucket/upload/menu/65ee0498647cb.png', 'อื่นๆ', 1),
(43, 'เต้าหู้เนื้อปลา', NULL, 60, '2024-03-10 17:05:24', '/bucket/upload/menu/65ee04a5b72c8.png', 'อื่นๆ', 1),
(44, 'เกี๊ยวกุุ้ง', NULL, 100, '2024-03-10 17:05:24', '/bucket/upload/menu/65ee04afd7731.png', 'อื่นๆ', 1),
(45, 'วุ้นเส้น', NULL, 18, '2024-03-10 17:05:24', '/bucket/upload/menu/65ee04bab6bd4.png', 'อื่นๆ', 1),
(46, 'น้ำอัดลม', NULL, 30, '2024-03-10 17:10:17', '/bucket/upload/menu/65ee04f5a2af8.png', 'เครื่องดื่ม', 1),
(47, 'ชามะนาว', NULL, 25, '2024-03-10 17:10:17', '/bucket/upload/menu/65ee05016bc95.png', 'เครื่องดื่ม', 1),
(48, 'ชาไทยเย็น', NULL, 45, '2024-03-10 17:10:17', '/bucket/upload/menu/65ee050ae8e14.png', 'เครื่องดื่ม', 1),
(49, 'เก็กฮวยเย็น', NULL, 45, '2024-03-10 17:10:17', '/bucket/upload/menu/65ee0516c30be.png', 'เครื่องดื่ม', 1),
(50, 'กาแฟปั่น', NULL, 50, '2024-03-10 17:10:17', '/bucket/upload/menu/65f17154e93c1.jpg', 'เครื่องดื่ม', 1),
(51, 'ทับทิมกรอบ', NULL, 48, '2024-03-10 17:12:49', '/bucket/upload/menu/65ee060331d0a.png', 'ของหวาน', 1),
(52, 'บัวลอย', NULL, 59, '2024-03-10 17:12:49', '/bucket/upload/menu/65ee060d2a578.png', 'ของหวาน', 1),
(53, 'เต้าทึง', NULL, 45, '2024-03-10 17:12:49', '/bucket/upload/menu/65ee061671ee2.png', 'ของหวาน', 1),
(54, 'รวมมิตร', NULL, 48, '2024-03-10 17:12:49', '/bucket/upload/menu/65f1714c1b432.webp', 'ของหวาน', 1),
(55, 'ลูกตาลเย็น', NULL, 45, '2024-03-10 17:12:49', '/bucket/upload/menu/65ee062804791.png', 'ของหวาน', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_type`
--

CREATE TABLE `menu_type` (
  `menu_type` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_type`
--

INSERT INTO `menu_type` (`menu_type`, `description`, `active`) VALUES
('ของหวาน', 'ของหวานน', 1),
('จานเดี่ยว', 'จานเดี่ยวว', 1),
('ชุดเซ็ต', 'ชุดรวม', 1),
('ทะเล', 'ปลา หอย หมึก', 1),
('น้ำซุป', 'น้ำซุปป', 1),
('ผัก', 'ผักจ้า', 1),
('อื่นๆ', 'ไข่ ลูกชิ้น เกี๊ยว', 1),
('เครื่องดื่ม', 'น้ำ', 1),
('เนื้อสัตว์', 'เนื้อหมู วัว', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_bill`
--

CREATE TABLE `order_bill` (
  `id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `waiter_id` varchar(100) DEFAULT NULL,
  `order_by` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `date` datetime NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `discount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_bill`
--

INSERT INTO `order_bill` (`id`, `table_id`, `description`, `status`, `waiter_id`, `order_by`, `price`, `date`, `time_stamp`, `discount`) VALUES
(1, 9, NULL, 'ชำระเงินแล้ว', NULL, '2024-03-08-11-29-17-0317-65eaf68d41743', NULL, '2024-03-11 21:27:35', '2024-03-13 08:44:14', 0),
(2, 5, NULL, 'ชำระเงินแล้ว', NULL, '2024-03-08-11-29-17-0317-65eaf68d41743', NULL, '2024-03-11 22:29:38', '2024-03-13 08:44:50', 0),
(3, 2, NULL, 'ชำระเงินแล้ว', NULL, NULL, 656, '2024-03-12 01:47:19', '2024-03-13 08:32:12', 0),
(4, 8, NULL, 'ชำระเงินแล้ว', NULL, '2024-03-08-11-29-17-0317-65eaf68d41743', 985, '2024-03-13 14:24:20', '2024-03-13 07:28:26', 0),
(5, 8, NULL, 'ชำระเงินแล้ว', NULL, '2024-03-08-11-29-17-0317-65eaf68d41743', 455, '2024-03-13 15:33:57', '2024-03-13 08:35:42', 0),
(6, 1, NULL, 'ชำระเงินแล้ว', NULL, '2024-03-08-11-29-17-0317-65eaf68d41743', 350, '2024-03-13 15:44:00', '2024-03-13 08:45:35', 0),
(7, 2, NULL, 'ชำระเงินแล้ว', NULL, '2024-03-08-11-29-17-0317-65eaf68d41743', 430, '2024-03-13 15:46:42', '2024-03-13 08:47:02', 0),
(8, 5, NULL, 'ชำระเงินแล้ว', NULL, '2024-03-08-11-29-17-0317-65eaf68d41743', 626, '2024-03-13 15:47:42', '2024-03-13 08:47:57', 0),
(9, 9, NULL, 'ชำระเงินแล้ว', NULL, '2024-03-13-12-12-19-0319-65f135b3a31c2', 248, '2024-03-13 15:48:22', '2024-03-13 09:14:51', 0),
(10, 3, NULL, 'ชำระเงินแล้ว', NULL, '2024-03-13-12-12-19-0319-65f135b3a31c2', 248, '2024-03-13 15:51:13', '2024-03-13 08:51:32', 0),
(11, 1, NULL, 'ชำระเงินแล้ว', NULL, '2024-03-13-12-12-19-0319-65f135b3a31c2', 49, '2024-03-13 16:15:42', '2024-03-13 09:15:49', 0),
(12, 2, NULL, 'ชำระเงินแล้ว', NULL, '2024-03-13-12-12-19-0319-65f135b3a31c2', 539, '2024-03-13 16:29:56', '2024-03-13 09:30:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `order_status` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`order_status`, `description`, `active`) VALUES
('กำลังปรุงอาหาร', 'อาหารกำลังดำเนินการปรุง', 1),
('ชำระเงินแล้ว', 'จ่ายเงินแล้ว', 1),
('ปรุงอาหารเสร็จสิ้น', 'ปรุงอาหารเสร็จสิ้น จะดำเนิการส่งต่อให้พนักงานเสิร์ฟ', 1),
('ยกเลิก', 'บิลถูกยกเลิก', 1),
('อยู่ระหว่างการสั่ง', 'อยู่ระหว่างการสั่ง', 1),
('อาหารถูกเสิร์ฟ', 'อาหารเสิร์ฟแล้ว', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_transaction`
--

CREATE TABLE `order_transaction` (
  `id` int(11) NOT NULL,
  `order_bill_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `menu_price` float NOT NULL,
  `response_by` varchar(100) DEFAULT NULL,
  `trans_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_transaction`
--

INSERT INTO `order_transaction` (`id`, `order_bill_id`, `menu_id`, `count`, `menu_price`, `response_by`, `trans_status`) VALUES
(1, 1, 1, 1, 49, NULL, 'ปรุงอาหารเสร็จสิ้น'),
(2, 1, 21, 1, 299, NULL, 'ปรุงอาหารเสร็จสิ้น'),
(3, 1, 8, 3, 63, NULL, 'ปรุงอาหารเสร็จสิ้น'),
(4, 1, 17, 2, 93, NULL, 'ปรุงอาหารเสร็จสิ้น'),
(5, 1, 27, 1, 27, NULL, 'ปรุงอาหารเสร็จสิ้น'),
(6, 1, 31, 1, 40, NULL, 'ปรุงอาหารเสร็จสิ้น'),
(7, 2, 5, 1, 49, NULL, 'อาหารถูกเสิร์ฟ'),
(8, 2, 21, 1, 299, NULL, 'ปรุงอาหารเสร็จสิ้น'),
(9, 2, 8, 2, 63, NULL, 'ปรุงอาหารเสร็จสิ้น'),
(10, 2, 10, 2, 62, NULL, 'ปรุงอาหารเสร็จสิ้น'),
(11, 3, 3, 1, 49, NULL, 'ปรุงอาหารเสร็จสิ้น'),
(12, 3, 22, 1, 399, NULL, 'ปรุงอาหารเสร็จสิ้น'),
(13, 3, 8, 2, 63, NULL, 'ปรุงอาหารเสร็จสิ้น'),
(14, 3, 9, 1, 82, NULL, 'ปรุงอาหารเสร็จสิ้น'),
(15, 4, 6, 1, 49, NULL, 'ปรุงอาหารเสร็จสิ้น'),
(16, 4, 23, 1, 499, NULL, 'ปรุงอาหารเสร็จสิ้น'),
(17, 4, 15, 1, 62, NULL, 'ปรุงอาหารเสร็จสิ้น'),
(18, 4, 18, 1, 88, NULL, 'ปรุงอาหารเสร็จสิ้น'),
(19, 4, 26, 1, 29, NULL, 'ปรุงอาหารเสร็จสิ้น'),
(20, 4, 37, 1, 14, NULL, 'ปรุงอาหารเสร็จสิ้น'),
(21, 4, 38, 1, 84, NULL, 'ปรุงอาหารเสร็จสิ้น'),
(22, 4, 43, 1, 60, NULL, 'ปรุงอาหารเสร็จสิ้น'),
(23, 4, 44, 1, 100, NULL, 'ปรุงอาหารเสร็จสิ้น'),
(24, 5, 5, 1, 49, NULL, 'กำลังปรุงอาหาร'),
(25, 5, 20, 1, 199, NULL, 'กำลังปรุงอาหาร'),
(26, 5, 7, 3, 69, NULL, 'กำลังปรุงอาหาร'),
(27, 6, 4, 1, 49, NULL, 'กำลังปรุงอาหาร'),
(28, 6, 20, 1, 199, NULL, 'กำลังปรุงอาหาร'),
(29, 6, 16, 1, 102, NULL, 'กำลังปรุงอาหาร'),
(30, 7, 5, 1, 49, NULL, 'กำลังปรุงอาหาร'),
(31, 7, 21, 1, 299, NULL, 'กำลังปรุงอาหาร'),
(32, 7, 35, 1, 17, NULL, 'กำลังปรุงอาหาร'),
(33, 7, 36, 1, 65, NULL, 'กำลังปรุงอาหาร'),
(34, 8, 5, 1, 49, NULL, 'กำลังปรุงอาหาร'),
(35, 8, 22, 1, 399, NULL, 'กำลังปรุงอาหาร'),
(36, 8, 8, 1, 63, NULL, 'กำลังปรุงอาหาร'),
(37, 8, 18, 1, 88, NULL, 'กำลังปรุงอาหาร'),
(38, 8, 27, 1, 27, NULL, 'กำลังปรุงอาหาร'),
(39, 9, 2, 1, 49, NULL, 'กำลังปรุงอาหาร'),
(40, 9, 20, 1, 199, NULL, 'กำลังปรุงอาหาร'),
(41, 10, 1, 1, 49, NULL, 'กำลังปรุงอาหาร'),
(42, 10, 20, 1, 199, NULL, 'กำลังปรุงอาหาร'),
(43, 11, 2, 1, 49, NULL, 'กำลังปรุงอาหาร'),
(44, 12, 5, 1, 49, NULL, 'กำลังปรุงอาหาร'),
(45, 12, 21, 1, 299, NULL, 'กำลังปรุงอาหาร'),
(46, 12, 25, 1, 32, NULL, 'กำลังปรุงอาหาร'),
(47, 12, 26, 2, 29, NULL, 'กำลังปรุงอาหาร'),
(48, 12, 35, 3, 17, NULL, 'กำลังปรุงอาหาร'),
(49, 12, 47, 2, 25, NULL, 'กำลังปรุงอาหาร');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `evidence` text NOT NULL,
  `paid_to` varchar(100) DEFAULT NULL,
  `paid_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `bill_id`, `evidence`, `paid_to`, `paid_date`) VALUES
(1, 1, 'check', '6a23d228-d65e-11ee-809e-0242ac120002', '2024-03-07 11:52:14'),
(3, 2, 'pay to 2024-03-07-12-27-07-0307-65e9b29b01de2 by qrcode or link @ 2024.03.09 07:54:04', '2024-03-07-12-27-07-0307-65e9b29b01de2', '2024-03-09 07:54:04'),
(4, 0, 'pay to 2024-03-07-12-27-07-0307-65e9b29b01de2 by qrcode or link @ 2024.03.12 03:05:47', '2024-03-07-12-27-07-0307-65e9b29b01de2', '2024-03-12 03:05:47'),
(5, 6, 'qrcode', NULL, '2024-03-11 20:37:48'),
(6, 7, 'เงินสด', NULL, '2024-03-11 20:37:48'),
(7, 6, 'qrcode', NULL, '2024-03-11 20:37:48'),
(8, 7, 'เงินสด', NULL, '2024-03-11 20:37:48'),
(9, 4, 'เงินสด', '2024-03-08-11-29-17-0317-65eaf68d41743', '2024-03-13 14:28:25'),
(10, 5, 'โอนเงิน', '2024-03-08-11-29-17-0317-65eaf68d41743', '2024-03-13 15:35:42'),
(11, 6, 'ผ่านบัตร', '2024-03-08-11-29-17-0317-65eaf68d41743', '2024-03-13 15:45:35'),
(12, 7, 'โอนเงิน', '2024-03-08-11-29-17-0317-65eaf68d41743', '2024-03-13 15:47:02'),
(13, 8, 'โอนเงิน', '2024-03-08-11-29-17-0317-65eaf68d41743', '2024-03-13 15:47:57'),
(14, 10, 'เงินสด', '2024-03-13-12-12-19-0319-65f135b3a31c2', '2024-03-13 15:51:31'),
(15, 9, 'เงินสด', '2024-03-13-12-12-19-0319-65f135b3a31c2', '2024-03-13 16:14:51'),
(16, 11, 'โอนเงิน', '2024-03-13-12-12-19-0319-65f135b3a31c2', '2024-03-13 16:15:49'),
(17, 12, 'ผ่านบัตร', '2024-03-13-12-12-19-0319-65f135b3a31c2', '2024-03-13 16:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `review_answer`
--

CREATE TABLE `review_answer` (
  `id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `review_by` varchar(100) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `answer` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`answer`)),
  `submit_date` datetime NOT NULL,
  `fav_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review_answer`
--

INSERT INTO `review_answer` (`id`, `review_id`, `review_by`, `order_id`, `answer`, `submit_date`, `fav_score`) VALUES
(1, 1, '2024-03-08-11-29-17-0317-65eaf68d41743', NULL, '{\"q1\":\"1\",\"q2\":\"1\",\"q3\":\"1\",\"q4\":\"1\",\"q5\":\"1\",\"q6\":\"1\",\"cusReview\":\"\\u0e1e\\u0e19\\u0e31\\u0e01\\u0e07\\u0e32\\u0e19\\u0e1a\\u0e23\\u0e34\\u0e01\\u0e32\\u0e23\\u0e41\\u0e22\\u0e48\\u0e21\\u0e32\\u0e01 \\u0e1e\\u0e19\\u0e31\\u0e01\\u0e07\\u0e32\\u0e19\\u0e0a\\u0e32\\u0e22\"}', '2024-03-13 14:31:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `review_question`
--

CREATE TABLE `review_question` (
  `id` int(11) NOT NULL,
  `question` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`question`)),
  `create_date` datetime NOT NULL,
  `create_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_info`
--

CREATE TABLE `table_info` (
  `table_id` int(11) NOT NULL,
  `table_type` varchar(50) NOT NULL,
  `position_x` int(11) DEFAULT NULL,
  `position_y` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `table_status` varchar(50) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_info`
--

INSERT INTO `table_info` (`table_id`, `table_type`, `position_x`, `position_y`, `priority`, `table_status`, `active`) VALUES
(1, '6person', NULL, NULL, NULL, 'โต๊ะว่าง', 1),
(2, '6person', NULL, NULL, NULL, 'โต๊ะว่าง', 1),
(3, '6person', NULL, NULL, NULL, 'โต๊ะว่าง', 1),
(4, '6person', NULL, NULL, NULL, 'โต๊ะว่าง', 1),
(5, '6person', NULL, NULL, NULL, 'โต๊ะว่าง', 1),
(6, '6person', NULL, NULL, NULL, 'โต๊ะว่าง', 1),
(7, '6person', NULL, NULL, NULL, 'โต๊ะว่าง', 1),
(8, '6person', NULL, NULL, NULL, 'โต๊ะว่าง', 1),
(9, '6person', NULL, NULL, NULL, 'โต๊ะว่าง', 1),
(10, '6person', NULL, NULL, NULL, 'โต๊ะว่าง', 1),
(11, '6person', NULL, NULL, NULL, 'โต๊ะว่าง', 1),
(12, '6person', NULL, NULL, NULL, 'โต๊ะว่าง', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_order`
--

CREATE TABLE `table_order` (
  `id` int(11) NOT NULL,
  `table_id` int(11) DEFAULT NULL,
  `note` text NOT NULL,
  `receive_id` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `order_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_order`
--

INSERT INTO `table_order` (`id`, `table_id`, `note`, `receive_id`, `timestamp`, `start_date`, `end_date`, `order_status`) VALUES
(1, 1, 'test', '2f7b0267-d47d-11ee-a6e5-0242ac120002', '2024-03-13 08:43:27', '2024-03-02 18:00:31', '2024-03-02 18:00:31', 'ใช้งานแล้ว'),
(2, 7, 'test2', '2f7b0267-d47d-11ee-a6e5-0242ac120002', '2024-03-11 21:52:48', '2024-03-02 18:00:31', '2024-03-02 18:00:31', 'กำลังใช้งาน'),
(4, 2, '', '181ab56c-d1a3-11ee-9e18-0242ac120002', '2024-03-04 10:19:39', '2024-03-04 10:16:41', '2024-03-04 11:16:41', NULL),
(5, 3, 'จำนวนลูกค้า : 3 ท่าน \r\n ความต้องการเพิ่มเติม : อยากได้โต๊ะเสริม', '2024-03-13-12-12-19-0319-65f135b3a31c2', '2024-03-13 08:50:59', '2024-03-14 19:50:00', NULL, 'ใช้งานแล้ว'),
(6, 1, 'จำนวนลูกค้า : 6 ท่าน \r\n ความต้องการเพิ่มเติม : ', '2024-03-13-12-12-19-0319-65f135b3a31c2', '2024-03-13 09:15:10', '2024-03-14 15:51:00', NULL, 'ใช้งานแล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `table_status`
--

CREATE TABLE `table_status` (
  `table_status` varchar(50) NOT NULL,
  `table_status_desc` varchar(100) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_status`
--

INSERT INTO `table_status` (`table_status`, `table_status_desc`, `active`) VALUES
('กำลังใช้งาน', 'โต๊ะที่จอง ลูกค้ากำลังใช้บริการ', 1),
('ถูกจอง', 'ลูกค้าทำการจองโต๊ะ', 1),
('โต๊ะว่าง', 'โต๊ะที่ไม่มีลูกค้า และยังไม่ถูกจอง', 1),
('โต๊ะไม่ว่าง', 'โต๊ะกำลังใช้งาน', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_type`
--

CREATE TABLE `table_type` (
  `table_type` varchar(50) NOT NULL,
  `no_can_receive` int(11) NOT NULL,
  `time_limit` float NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_type`
--

INSERT INTO `table_type` (`table_type`, `no_can_receive`, `time_limit`, `active`) VALUES
('1person', 1, 0, 1),
('2person', 2, 0, 1),
('3person', 3, 0, 1),
('4person', 4, 0, 1),
('5person', 5, 0, 1),
('6person', 6, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(100) NOT NULL DEFAULT md5(rand()),
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `tel` varchar(12) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `name`, `lastname`, `tel`, `active`) VALUES
('2024-03-08-11-27-44-0344-65eaf630c7d8c', 'manager@sooksanhotpot', 'manager@sooksanhotpot', 'staff', 'manager', 'g11hotpot', '33153453', 1),
('2024-03-08-11-29-17-0317-65eaf68d41743', 'cashier@sooksanhotpot', 'cashier@sooksanhotpot', 'พนักงานร้าน', 'cashier', 'g11hotpot', NULL, 1),
('2024-03-08-11-29-31-0331-65eaf69b4a3cf', 'chef@sooksanhotpot', 'chef@sooksanhotpot', 'พนักงานร้าน', 'chef', 'g11hotpot', '0837158015', 1),
('2024-03-08-11-29-42-0342-65eaf6a6d5c5b', 'service@sooksanhotpot', 'service@sooksanhotpot', 'พนักงานร้าน', 'service', 'g11hotpot', '', 1),
('2024-03-08-11-47-29-0329-65eafad1b9bd4', 'table1@sooksanhotpot', 'table1@sooksanhotpot', 'โต๊ะ', 'table1', 'g11hotpot', '', 1),
('2024-03-08-11-47-43-0343-65eafadf45ba0', 'table2@sooksanhotpot', 'table2@sooksanhotpot', 'โต๊ะ', 'table', 'g11hotpot', '', 1),
('2024-03-08-11-47-49-0349-65eafae5bdaca', 'table3@sooksanhotpot', 'table3@sooksanhotpot', 'โต๊ะ', 'table', 'g11hotpot', '', 1),
('2024-03-08-11-47-55-0355-65eafaeb0a3c9', 'table4@sooksanhotpot', 'table4@sooksanhotpot', 'โต๊ะ', 'table', 'g11hotpot', '', 1),
('2024-03-08-11-48-03-0303-65eafaf3c054b', 'table5@sooksanhotpot', 'table5@sooksanhotpot', 'โต๊ะ', 'table', 'g11hotpot', '', 1),
('2024-03-08-11-48-09-0309-65eafaf962a19', 'table6@sooksanhotpot', 'table6@sooksanhotpot', 'โต๊ะ', 'table', 'g11hotpot', '', 1),
('2024-03-08-11-48-17-0317-65eafb0128a31', 'table7@sooksanhotpot', 'table7@sooksanhotpot', 'โต๊ะ', 'table', 'g11hotpot', '', 1),
('2024-03-08-11-48-23-0323-65eafb078e1bb', 'table8@sooksanhotpot', 'table8@sooksanhotpot', 'โต๊ะ', 'table', 'g11hotpot', '', 1),
('2024-03-08-11-48-30-0330-65eafb0e49163', 'table9@sooksanhotpot', 'table9@sooksanhotpot', 'โต๊ะ', 'table', 'g11hotpot', '', 1),
('2024-03-08-11-48-38-0338-65eafb165e86f', 'table10@sooksanhotpot', 'table10@sooksanhotpot', 'โต๊ะ', 'table', 'g11hotpot', '', 1),
('2024-03-13-12-12-19-0319-65f135b3a31c2', 'wongwiwat@gmail.com', '12345', 'ลูกค้า', 'วงศ์วิวัธน์', 'เนียมอ่อน', '0837158015', 1),
('2024-03-13-12-12-59-0359-65f135dbe8605', 'sathita@gmail.com', '12345', 'ลูกค้า', 'สาธิตา', 'ติวะวงศ์', '0888888888', 1),
('2024-03-13-12-15-01-0301-65f1365521218', 'supaschai@gmail.com', '12345', 'ลูกค้า', 'สุภัศชัย', 'โพธิชัย', '0891234567', 1),
('2024-03-13-12-20-18-0318-65f137921e88b', 'onwara@gmail.com', '12345', 'ลูกค้า', 'อรวรา', 'หงษ์เผือก', '0987654321', 1),
('2024-03-13-12-21-10-0310-65f137c65091a', 'rata@gmail.com', '12345', 'ลูกค้า', 'รตา', 'อุณหะ', '0855555555', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role` varchar(50) NOT NULL,
  `role_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role`, `role_desc`) VALUES
('พนักงานร้าน', 'พนักงานร้าน'),
('ลูกค้า', 'ลูกค้า'),
('โต๊ะ', 'โต๊ะ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`e_name`),
  ADD KEY `lastname` (`e_lastname`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `title` (`title`),
  ADD KEY `menu_ibfk_1` (`type`);

--
-- Indexes for table `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`menu_type`);

--
-- Indexes for table `order_bill`
--
ALTER TABLE `order_bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_by` (`order_by`),
  ADD KEY `waiter_id` (`waiter_id`),
  ADD KEY `status` (`status`),
  ADD KEY `table_id` (`table_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`order_status`);

--
-- Indexes for table `order_transaction`
--
ALTER TABLE `order_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_bill_id` (`order_bill_id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `response_by` (`response_by`),
  ADD KEY `trans_status` (`trans_status`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_id` (`bill_id`),
  ADD KEY `payment_ibfk_2` (`paid_to`);

--
-- Indexes for table `review_answer`
--
ALTER TABLE `review_answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `review_by` (`review_by`),
  ADD KEY `review_id` (`review_id`);

--
-- Indexes for table `review_question`
--
ALTER TABLE `review_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `create_by` (`create_by`);

--
-- Indexes for table `table_info`
--
ALTER TABLE `table_info`
  ADD PRIMARY KEY (`table_id`),
  ADD KEY `table_type` (`table_type`),
  ADD KEY `table_status` (`table_status`);

--
-- Indexes for table `table_order`
--
ALTER TABLE `table_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_id` (`table_id`),
  ADD KEY `receive_id` (`receive_id`),
  ADD KEY `order_status` (`order_status`);

--
-- Indexes for table `table_status`
--
ALTER TABLE `table_status`
  ADD PRIMARY KEY (`table_status`);

--
-- Indexes for table `table_type`
--
ALTER TABLE `table_type`
  ADD PRIMARY KEY (`table_type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `email_password` (`email`,`password`),
  ADD KEY `password` (`password`),
  ADD KEY `user_ibfk_1` (`role`),
  ADD KEY `name` (`name`),
  ADD KEY `lastname` (`lastname`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `order_bill`
--
ALTER TABLE `order_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_transaction`
--
ALTER TABLE `order_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `review_answer`
--
ALTER TABLE `review_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review_question`
--
ALTER TABLE `review_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_info`
--
ALTER TABLE `table_info`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `table_order`
--
ALTER TABLE `table_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`type`) REFERENCES `menu_type` (`menu_type`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
