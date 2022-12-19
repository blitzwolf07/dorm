-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 02:29 PM
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
-- Indexes for table `tbl_dorm`
--
ALTER TABLE `tbl_dorm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
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
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dorm`
--
ALTER TABLE `tbl_dorm`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
