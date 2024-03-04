-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 04, 2024 at 09:52 AM
-- Server version: 11.2.2-MariaDB-1:11.2.2+maria~ubu2204
-- PHP Version: 8.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service1`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` uuid NOT NULL,
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
('6a23d228-d65e-11ee-809e-0242ac120002', 'sooksan', 'ss', 'ceo', 'ss', '2024-03-02 06:24:41', NULL, NULL, NULL);

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
(1, 'grill fish', 'มันคือปลาครับ', 100, '2024-03-03 03:57:37', '', 'fish', 1),
(2, 'grill pork', 'หมูย่าง', 100, '2024-03-03 03:58:04', '', 'pork', 0),
(3, 'raw pork', 'หมูดิบ', 100, '2024-03-03 03:59:46', '', 'pork', 1),
(7, 'raw pork2', 'หมูดิบ', 100, '2024-03-04 08:05:20', '', 'pork', 0),
(8, 'raw pork2', 'หมูดิบ', 100, '2024-03-04 08:07:05', '', 'pork', 1);

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
('fish', 'ปลา', 0),
('pork', 'หมู', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_bill`
--

CREATE TABLE `order_bill` (
  `id` int(11) NOT NULL,
  `table_id` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `waiter_id` uuid DEFAULT NULL,
  `order_by` uuid DEFAULT NULL,
  `price` float DEFAULT NULL,
  `date` datetime NOT NULL,
  `time_stamp` timestamp NOT NULL,
  `discount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_bill`
--

INSERT INTO `order_bill` (`id`, `table_id`, `description`, `status`, `waiter_id`, `order_by`, `price`, `date`, `time_stamp`, `discount`) VALUES
(1, '1', NULL, 'in progress', NULL, NULL, NULL, '2024-03-03 03:38:41', '2024-03-03 03:38:41', 0),
(2, '1', NULL, 'in progress', NULL, NULL, NULL, '2024-03-03 09:45:01', '2024-03-03 09:45:01', 0),
(3, '1', NULL, 'in progress', NULL, NULL, NULL, '2024-03-03 09:45:55', '2024-03-03 09:45:55', 0);

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
('in progress', 'อยู่ระหว่างการสั่ง', 1),
('paid', 'จ่ายเงินแล้ว', 1);

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
  `response_by` uuid DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_transaction`
--

INSERT INTO `order_transaction` (`id`, `order_bill_id`, `menu_id`, `count`, `menu_price`, `response_by`) VALUES
(1, 1, 2, 2, 200, NULL),
(2, 1, 1, 1, 1, NULL),
(3, 1, 1, 1, 0, NULL),
(4, 1, 1, 1, 100, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `evidence` text NOT NULL,
  `paid_to` uuid NOT NULL,
  `paid_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review_answer`
--

CREATE TABLE `review_answer` (
  `id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `review_by` uuid NOT NULL,
  `order_id` int(11) NOT NULL,
  `answer` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`answer`)),
  `submit_date` datetime NOT NULL,
  `fav_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review_question`
--

CREATE TABLE `review_question` (
  `id` int(11) NOT NULL,
  `question` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`question`)),
  `create_date` datetime NOT NULL,
  `create_by` uuid NOT NULL
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
(1, '1person', 20, NULL, NULL, NULL, 1),
(2, '1person', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_order`
--

CREATE TABLE `table_order` (
  `id` int(11) NOT NULL,
  `table_id` int(11) DEFAULT NULL,
  `note` text NOT NULL,
  `receive_id` uuid DEFAULT NULL,
  `timestamp` timestamp NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `order_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_order`
--

INSERT INTO `table_order` (`id`, `table_id`, `note`, `receive_id`, `timestamp`, `start_date`, `end_date`, `order_status`) VALUES
(1, 1, 'test', '2f7b0267-d47d-11ee-a6e5-0242ac120002', '2024-03-02 18:18:00', '2024-03-02 18:00:31', '2024-03-02 18:00:31', 'success'),
(2, 1, 'test2', '2f7b0267-d47d-11ee-a6e5-0242ac120002', '2024-03-02 18:03:50', '2024-03-02 18:00:31', '2024-03-02 18:00:31', NULL),
(3, 2, '', '181ab56c-d1a3-11ee-9e18-0242ac120002', '2024-03-04 09:51:01', '2024-03-04 09:51:01', NULL, NULL);

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
('success', 'ใช้เสร็จแล้ว', 1),
('test', 'สำหรับการทดสอบระบบ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `table_type`
--

CREATE TABLE `table_type` (
  `table_type` varchar(50) NOT NULL,
  `no_can_receive` int(11) NOT NULL,
  `time_limit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_type`
--

INSERT INTO `table_type` (`table_type`, `no_can_receive`, `time_limit`) VALUES
('1person', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` uuid NOT NULL DEFAULT uuid(),
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
('b5a54cdf-d65a-11ee-809e-0242ac120002', 'test@supass.github.io', '123456', 'customer', 'sooksan', 'stat', '0123456789', 1),
('6a23d228-d65e-11ee-809e-0242ac120002', 'test@supass.github.io0', '123456', 'customer', 'sooksan', 'stattt', '0123456789', 0),
('181ab56c-d1a3-11ee-9e18-0242ac120002', 'admin@admin', 'adminnn', 'staff', 'boszz', 'kk', NULL, 1),
('db9881d8-d1a6-11ee-9e18-0242ac120002', 'admin@adminn', 'admin', 'customer', 'boszz', 'kk', NULL, 1),
('2f7b0267-d47d-11ee-a6e5-0242ac120002', '65070242@kmitl.ac.th', NULL, 'customer', 'Supaschai', 'Photichai', NULL, 1);

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
('customer', 'ลูกค้า'),
('staff', 'staffstaffstaffstaffstaff');

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
  ADD KEY `status` (`status`);

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
  ADD KEY `response_by` (`response_by`);

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
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_bill`
--
ALTER TABLE `order_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_transaction`
--
ALTER TABLE `order_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review_answer`
--
ALTER TABLE `review_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review_question`
--
ALTER TABLE `review_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_info`
--
ALTER TABLE `table_info`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_order`
--
ALTER TABLE `table_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`type`) REFERENCES `menu_type` (`menu_type`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `order_bill`
--
ALTER TABLE `order_bill`
  ADD CONSTRAINT `order_bill_ibfk_1` FOREIGN KEY (`order_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `order_bill_ibfk_2` FOREIGN KEY (`waiter_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `order_bill_ibfk_3` FOREIGN KEY (`status`) REFERENCES `order_status` (`order_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `order_transaction`
--
ALTER TABLE `order_transaction`
  ADD CONSTRAINT `order_transaction_ibfk_1` FOREIGN KEY (`order_bill_id`) REFERENCES `order_bill` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_transaction_ibfk_3` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `order_transaction_ibfk_4` FOREIGN KEY (`response_by`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `order_bill` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`paid_to`) REFERENCES `employee` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `review_answer`
--
ALTER TABLE `review_answer`
  ADD CONSTRAINT `review_answer_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_bill` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `review_answer_ibfk_2` FOREIGN KEY (`review_by`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `review_answer_ibfk_3` FOREIGN KEY (`review_id`) REFERENCES `review_question` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `review_question`
--
ALTER TABLE `review_question`
  ADD CONSTRAINT `review_question_ibfk_1` FOREIGN KEY (`create_by`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `table_info`
--
ALTER TABLE `table_info`
  ADD CONSTRAINT `table_info_ibfk_1` FOREIGN KEY (`table_type`) REFERENCES `table_type` (`table_type`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `table_info_ibfk_2` FOREIGN KEY (`table_status`) REFERENCES `table_status` (`table_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `table_order`
--
ALTER TABLE `table_order`
  ADD CONSTRAINT `table_order_ibfk_3` FOREIGN KEY (`receive_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `table_order_ibfk_4` FOREIGN KEY (`table_id`) REFERENCES `table_info` (`table_id`),
  ADD CONSTRAINT `table_order_ibfk_5` FOREIGN KEY (`order_status`) REFERENCES `table_status` (`table_status`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `user_role` (`role`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
