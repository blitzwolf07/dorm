-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 02:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dorm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicant`
--

CREATE TABLE `tbl_applicant` (
  `id` int(50) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `resume` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_applicant`
--

INSERT INTO `tbl_applicant` (`id`, `fname`, `lname`, `contact_number`, `email`, `position`, `date`, `resume`, `status`) VALUES
(13, 'asd', 'asd', '123113', 'student@gmail.com', 'Marketing', '2022-11-19', '1-Lucas Fuel Stub.docx', 'Received');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(50) NOT NULL,
  `customer_id` int(50) NOT NULL,
  `item_id` int(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `status` int(50) NOT NULL,
  `identifier` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `customer_id`, `item_id`, `quantity`, `status`, `identifier`) VALUES
(43, 1, 3, 1, 3, 2),
(44, 1, 6, 2, 3, 2),
(53, 1, 2, 1, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(50) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`, `date_created`) VALUES
(1, 'HEMATOLOGY', '2022-09-19'),
(2, 'IMMUNOFLUORESCENCE', '2022-09-19'),
(3, 'CHEMISTRY', '2022-09-19'),
(4, 'ELECTROLYTES', '2022-09-19'),
(5, 'URINALYSIS', '2022-09-19'),
(6, 'COAGULATION', '2022-09-19'),
(7, 'CENTRIFUGE', '2022-09-19'),
(8, 'MICROSCOPE', '2022-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `id` int(50) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `term` int(50) NOT NULL,
  `tin` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`id`, `customer_name`, `customer_address`, `contact_person`, `contact_number`, `term`, `tin`, `username`, `password`) VALUES
(1, 'Northern Mindanao Medical Center', 'Zone 1 Luyong bonbon Elem. School', 'Dave', '09656604531', 30, '', 'dave', '$2y$10$yIv.CUVMEiBm1/BGOj7pIep7RmpDFp8c1VrRb73QR63oRuMSfPhU6'),
(2, 'Maria Reyna', 'asdsad', 'asdasd', '1231231', 30, '', NULL, NULL),
(3, 'Davao Specialist', 'asdsad', 'asdasd', 'asdasd', 30, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(50) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `contact_number` int(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `customer_name`, `contact_person`, `customer_address`, `contact_number`, `username`, `password`) VALUES
(1, 'Angelo M. Pinque', 'Dave Dave', 'Zone 1 Luyong bonbon Elem. School', 665213123, 'dave', '$2y$10$gkvVsHvq6PQJ4oFtYHPUYemsHpXZ7mPOCRm5ilLE9GAH1AgdZL6r.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_concern`
--

CREATE TABLE `tbl_customer_concern` (
  `id` int(50) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_subject` varchar(255) NOT NULL,
  `customer_message` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_customer_concern`
--

INSERT INTO `tbl_customer_concern` (`id`, `customer_name`, `customer_email`, `customer_subject`, `customer_message`, `date`) VALUES
(3, 'qweqwe', 'qweqw@asdasd', 'asdasd', 'asdsad', '2022-11-07'),
(4, 'fff', 'fff@ffff', 'asd', 'asd', '2022-11-07'),
(5, 'fff', 'fff@fff', 'fff', 'ffff', '2022-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dorm`
--

CREATE TABLE `tbl_dorm` (
  `id` int(50) NOT NULL,
  `dorm_name` varchar(255) NOT NULL,
  `number_rooms` int(50) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_dorm`
--

INSERT INTO `tbl_dorm` (`id`, `dorm_name`, `number_rooms`, `date_added`) VALUES
(8, 'Angelo Dorm', 10, '2022-11-20'),
(9, 'Dave Dormitory', 10, '2022-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory`
--

CREATE TABLE `tbl_inventory` (
  `id` int(50) NOT NULL,
  `item_id` int(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `date_added` date DEFAULT NULL,
  `exp_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_inventory`
--

INSERT INTO `tbl_inventory` (`id`, `item_id`, `quantity`, `date_added`, `exp_date`) VALUES
(2, 1, 61, '2022-09-20', '2023-09-20'),
(3, 2, 42, '2022-09-19', '2023-09-19'),
(4, 3, 66, '2022-09-19', '2023-09-19'),
(5, 4, 79, '2022-09-19', '2023-09-20'),
(6, 5, 44, '2022-09-20', '2023-09-20'),
(7, 6, 54, '2022-09-20', '2023-09-20'),
(8, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave`
--

CREATE TABLE `tbl_leave` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `dorm_id` int(50) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_leave`
--

INSERT INTO `tbl_leave` (`id`, `user_id`, `dorm_id`, `reason`, `message`, `status`, `date_created`) VALUES
(26, 7, 9, 'hello', '', 'Pending', '2022-12-03'),
(27, 8, 8, 'hi', '', 'Pending', '2022-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marketing_transaction`
--

CREATE TABLE `tbl_marketing_transaction` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `transaction` varchar(255) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `no_of_orders` int(11) NOT NULL,
  `item_price` varchar(11) NOT NULL,
  `total_sale` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_marketing_transaction`
--

INSERT INTO `tbl_marketing_transaction` (`id`, `client_id`, `transaction`, `invoice_number`, `product_id`, `item_id`, `no_of_orders`, `item_price`, `total_sale`, `date`) VALUES
(13, 1, 'Total Per Kit', 101, 2, 1, 15, '500.50', '2000000', '2022-07-20'),
(15, 1, 'Total Per Kit', 101, 2, 1, 5, '500.50', '2502.5', '2022-08-22'),
(16, 2, 'Total Per Kit', 603, 2, 3, 5, '450.20', '100000', '2022-09-22'),
(17, 3, 'Total Per Kit', 65, 2, 1, 3, '400.20', '1200.6', '2022-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE `tbl_messages` (
  `id` int(50) NOT NULL,
  `incoming_msg_id` int(50) NOT NULL,
  `outgoing_msg_id` int(50) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `images` varchar(255) NOT NULL,
  `emoji` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_messages`
--

INSERT INTO `tbl_messages` (`id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `images`, `emoji`, `date_time`) VALUES
(282, 1, 8, 'ss', '', '', '2022-12-01 22:14:07'),
(283, 8, 1, 'sss', '', '', '2022-12-01 22:15:04'),
(284, 1, 8, 'zzzz', '', '', '2022-12-01 22:24:10'),
(285, 8, 1, 'ss', '', '', '2022-12-01 22:41:46'),
(286, 8, 1, 'ee', '', '', '2022-12-01 22:42:12'),
(287, 1, 8, 'asd', '', '', '2022-12-01 22:44:34'),
(288, 8, 1, 'asd', '', '', '2022-12-01 22:44:50'),
(289, 8, 1, 'sadsd', '', '', '2022-12-01 23:06:00'),
(290, 1, 7, 'sss', '', '', '2022-12-01 23:07:56'),
(291, 7, 1, 'sss', '', '', '2022-12-01 23:08:05'),
(292, 1, 8, 'hello po may itatanong lang po sana ako', '', '', '2022-12-02 20:48:54'),
(293, 8, 1, 'good day dave ano po yun?', '', '', '2022-12-02 20:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rent`
--

CREATE TABLE `tbl_rent` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `dorm_id` int(50) NOT NULL,
  `room_id` int(50) NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_rent`
--

INSERT INTO `tbl_rent` (`id`, `user_id`, `dorm_id`, `room_id`, `date_in`, `date_out`) VALUES
(8, 8, 8, 8, '2022-12-01', '2022-12-31'),
(9, 7, 9, 8, '2022-12-03', '2022-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Staff'),
(3, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `id` int(50) NOT NULL,
  `dorm_id` int(50) NOT NULL,
  `room_number` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`id`, `dorm_id`, `room_number`, `date_added`) VALUES
(7, 8, '0001', '2022-11-20 00:00:00'),
(8, 8, '0002', '2022-11-20 00:00:00'),
(9, 8, '0003', '2022-11-20 00:00:00'),
(10, 9, '0001', '2022-12-02 00:00:00'),
(11, 9, '0002', '2022-12-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_order`
--

CREATE TABLE `tbl_sales_order` (
  `id` int(50) NOT NULL,
  `supplier_id` int(50) NOT NULL,
  `item_id` int(50) NOT NULL,
  `quantity_order` int(50) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `date_order` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_sales_order`
--

INSERT INTO `tbl_sales_order` (`id`, `supplier_id`, `item_id`, `quantity_order`, `invoice_number`, `date_order`) VALUES
(44, 2, 1, 5, '2703630', '2022-09-23'),
(45, 2, 4, 2, '2703630', '2022-09-23'),
(46, 2, 2, 2, '30032', '2022-09-23'),
(47, 2, 3, 6, '30032', '2022-09-23'),
(48, 2, 3, 2, 'RS-8325030', '2022-09-26'),
(49, 2, 3, 3, 'RS-8325030', '2022-09-26'),
(50, 2, 1, 1, '345678', '2022-09-26'),
(51, 2, 3, 2, '345678', '2022-09-26'),
(52, 2, 1, 1, 'RS-06223224', '2022-09-26'),
(53, 2, 4, 2, '0367620', '2022-09-26'),
(54, 2, 1, 2, 'RS-402263', '2022-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sold_order`
--

CREATE TABLE `tbl_sold_order` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `client_id` int(50) NOT NULL,
  `client_address` varchar(255) NOT NULL,
  `inclusive` varchar(255) NOT NULL,
  `exclusive` varchar(255) NOT NULL,
  `cash` varchar(255) NOT NULL,
  `charge` varchar(255) NOT NULL,
  `client_po_no` varchar(255) NOT NULL,
  `credit_limit` varchar(255) NOT NULL,
  `ar_balance` varchar(255) NOT NULL,
  `particular` varchar(255) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `shipping_instruction` varchar(255) NOT NULL,
  `special_instruction` varchar(255) NOT NULL,
  `less_vat` varchar(255) NOT NULL,
  `total_discounted_amount` varchar(255) NOT NULL,
  `amount_net_vat` varchar(255) NOT NULL,
  `percent_discount` varchar(255) NOT NULL,
  `discounted_amount` varchar(255) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `date_sold` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_sold_order`
--

INSERT INTO `tbl_sold_order` (`id`, `user_id`, `client_id`, `client_address`, `inclusive`, `exclusive`, `cash`, `charge`, `client_po_no`, `credit_limit`, `ar_balance`, `particular`, `terms`, `shipping_instruction`, `special_instruction`, `less_vat`, `total_discounted_amount`, `amount_net_vat`, `percent_discount`, `discounted_amount`, `invoice_number`, `total_amount`, `date_sold`) VALUES
(14, 3, 1, 'Opol, Misamis Oriental', '12', '', 'Cash', '', '80#  4670', '0', '583,879.83', '', '30 DAYS', 'STS', '', '1032', '1327015', '7568', '5', '430', '2703630', '8,600', '2022-09-23 00:00:00'),
(15, 3, 1, 'Opol, Misamis Oriental', '12', '', 'Cash', '', '80#  4670', '0.00', '583,879.83', '', '30 DAYS', 'STS', '', '1140', '9500', '8360', '0', '', 'RS-8325030', '9500', '2022-10-26 00:00:00'),
(16, 3, 1, 'Opol, Misamis Oriental', '12', '', 'Cash', '', '80#  4670', '0.00', '583,879.83', '', '30 DAYS', 'STS', '', '600', '5000', '4400', '0', '', '345678', '10000', '2022-11-10 00:00:00'),
(17, 3, 1, 'Opol, Misamis Oriental', '12', '', 'Cash', '', '80#  4670', '0.00', '', '', '30 DAYS', 'STS', '', '144', '1200', '1056', '0', '', 'RS-06223224', '1200', '2022-09-26 00:00:00'),
(18, 3, 1, 'Opol, Misamis Oriental', '12', '', 'Cash', '', '80#  4670', '0.00', '583,879.83', '', '30 DAYS', 'STS', '', '312', '2600', '2288', '0', '', '0367620', '2600', '2022-12-26 00:00:00'),
(19, 3, 1, 'Opol, Misamis Oriental', '12', '', 'Cash', '', '80#  4670', '0.00', '583,879.83', '', '30 DAYS', 'STS', '', '288', '2400', '2112', '0', '', 'RS-402263', '2400', '2022-09-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(50) NOT NULL,
  `id_picture` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `home_address` varchar(255) NOT NULL,
  `dorm_id` int(50) NOT NULL,
  `room_id` int(50) NOT NULL,
  `email_add` varchar(255) NOT NULL,
  `course_year` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `contact_number` int(50) NOT NULL,
  `emergency_contact_no` int(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `status_activate` varchar(255) NOT NULL,
  `role_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `id_picture`, `full_name`, `home_address`, `dorm_id`, `room_id`, `email_add`, `course_year`, `id_number`, `contact_number`, `emergency_contact_no`, `password`, `date_added`, `status`, `status_activate`, `role_id`) VALUES
(1, '', 'admin', 'admin', 0, 1, 'admin@gmail.com', 'Admin', '123', 2147483647, 0, '$2y$10$5DHmBa916Rnh6LydteRNseSVAwxCB5VJ8gKO6Xa7VwUseOIFU5K1u', '2022-09-19', 'Approved', '', 1),
(7, '7-lucas_fuel.png', 'Hello Word', 'asd', 9, 1, 'student1@gmail.com', '1', '111', 123, 123, '$2y$10$8RittmJo.b9A4/sQKv/OPuQP5fgNSHbKTEcRGljJhCTH9XZGrEweK', '2022-11-20', 'Approved', 'Active', 2),
(8, '8-lucas_fuel.png', 'Angelo Dave Montalban', 'asd', 8, 123, 'student2@gamil.com', '11', '222', 123, 123, '$2y$10$NGNMwIXmq2z0b5lPGCLjreNGRLA/6uzgSefYTrl5/jEQThd6pcEvu', '2022-11-20', 'Approved', '', 2),
(10, '9-317207369_670681964520918_4527411981121183877_n.jpg', 'Angelo M. Pinque', 'Zone 1 Luyong bonbon Opol, Mis. Or', 8, 0, 'staff@gmail.com', '', 'staff', 2147483647, 0, '$2y$10$.395lXJNc/UmaHF.9tuCo.256pqgHtpHWU.WGL7zPznuN242fNxLu', '2022-11-30', 'Approved', '', 3),
(11, '11-1.png', 'eeee e eeeeeeeee', 'eeeee', 9, 0, 'eee@gmail.com', 'BSIT 1A', '1e1e1e', 3123113, 12313123, '$2y$10$h/0VoWlsAXBYpDC4iy40T.SMTJKt/jiHW7kY/1w.2THuckvW26OmG', '2022-12-02', 'Approved', 'Active', 2),
(12, '12-316838305_360338876307037_3298585104687030214_n.jpg', 'Staff 2 ', 'Zone 1 A asdsadsadasadadasdasd', 8, 0, '', '', 'staff2', 1312313, 0, '$2y$10$qY4LzykmokgR6TrtosBj/OR.y7YunOeSCZZgFgNif104Dj4/3RTi.', '2022-12-02', 'Approved', '', 3),
(13, '13-1.png', 'Staff 3 Staff 3', 'Zone 1 A asdsadsadasadadasdasd', 9, 0, '', '', 'Staff3', 212213123, 0, '$2y$10$ophPZbDBmKhsbHOuAfmlRePYga1trE/fcSvhmSA0K3ae1VrC.hkrC', '2022-12-03', 'Approved', '', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer_concern`
--
ALTER TABLE `tbl_customer_concern`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dorm`
--
ALTER TABLE `tbl_dorm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_marketing_transaction`
--
ALTER TABLE `tbl_marketing_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rent`
--
ALTER TABLE `tbl_rent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sales_order`
--
ALTER TABLE `tbl_sales_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sold_order`
--
ALTER TABLE `tbl_sold_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_applicant`
--
ALTER TABLE `tbl_applicant`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customer_concern`
--
ALTER TABLE `tbl_customer_concern`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_dorm`
--
ALTER TABLE `tbl_dorm`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_marketing_transaction`
--
ALTER TABLE `tbl_marketing_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT for table `tbl_rent`
--
ALTER TABLE `tbl_rent`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_sales_order`
--
ALTER TABLE `tbl_sales_order`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_sold_order`
--
ALTER TABLE `tbl_sold_order`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
