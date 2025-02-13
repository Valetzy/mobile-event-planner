-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2025 at 09:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_planner`
--

-- --------------------------------------------------------

--
-- Table structure for table `birthday_client_form`
--

CREATE TABLE `birthday_client_form` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `relationship` varchar(100) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `celebrant_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `party_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `venue` text NOT NULL,
  `venue_location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `birthday_client_form`
--

INSERT INTO `birthday_client_form` (`id`, `event_id`, `package_id`, `contact_name`, `relationship`, `contact_number`, `email`, `address`, `celebrant_name`, `dob`, `age`, `gender`, `party_date`, `start_time`, `end_time`, `venue`, `venue_location`) VALUES
(11, 0, 0, 'kate', 'anask', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'qwerfg', '2024-11-26', 29, 'Male', '0000-00-00', '00:00:21', '09:23:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay'),
(12, 0, 0, 'Marry Ann R. Palagan', 'Mother', '09709946945', 'vodatankquiros@gmail.com', 'Ipil, Zamboanga  Sibugay', 'Miya S. Aldous', '2024-11-25', 21, 'Male', '0000-00-00', '08:00:00', '20:00:00', 'Roderics', ''),
(13, 11, 0, 'kate', 'anask', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'qwerfg', '2024-11-26', 29, 'Male', '0000-00-00', '00:00:21', '09:23:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay'),
(14, 10, 0, 'kate', 'anask', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'qwerfg', '2024-11-21', 29, 'Male', '0000-00-00', '00:00:12', '00:28:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay'),
(15, 12, 0, 'kate', 'baby', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Yvonne', '2024-11-21', 21, 'Female', '0000-00-00', '00:00:02', '14:54:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay'),
(16, 10, 0, 'kate', 'Aunt', '093457765443', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Yvonne', '2024-09-19', 18, 'Female', '0000-00-00', '00:00:10', '17:00:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay'),
(17, 10, 0, 'kate', 'mother', '09606657499', 'vodatankquiros@gmail.com', 'Dalama, Payao, Zamboanga Sibugay', 'Syrine Gale Vegare Sariol', '2018-04-08', 7, 'Male', '0000-00-00', '00:00:16', '20:30:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay'),
(18, 12, 0, 'kate', 'mother', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Syrine Gale Vegare Sariol', '2018-04-08', 6, 'Male', '0000-00-00', '00:00:13', '17:00:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay'),
(19, 16, 0, 'kate', 'werty', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Dawana', '2024-12-03', 21, 'Male', '0000-00-00', '00:00:21', '09:22:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay'),
(20, 11, 0, 'kate', 'anak', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Dawana mae', '2024-12-04', 21, 'Female', '0000-00-00', '00:00:00', '12:04:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay'),
(21, 10, 0, 'kate', 'anak', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Dawana mae', '2024-12-19', 21, 'Female', '0000-00-00', '00:00:00', '12:08:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay'),
(22, 10, 0, 'kate', 'anak', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Dawana mae', '2024-12-12', 21, 'Female', '0000-00-00', '00:00:00', '12:14:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay'),
(23, 11, 0, 'kate', 'anak', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Dawana mae', '2024-12-05', 21, 'Female', '0000-00-00', '00:00:00', '12:16:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay'),
(24, 12, 0, 'kate', 'anak', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Dawana mae', '2024-12-21', 21, 'Female', '0000-00-00', '00:00:01', '13:36:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay'),
(25, 12, 0, 'Acky Nawada', 'brother', '2147483647', 'ackynawada@gmail.com', 'BAGA,NAGA,ZSP', 'khian lim', '2024-12-15', 8, 'Male', '0000-00-00', '00:00:08', '10:00:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay'),
(26, 10, 0, 'Acky Nawada', 'mother', '2147483647', 'Ackynawada@gmail.com', 'BAGA,NAGA,ZSP', 'kate vegare', '2024-12-12', 25, 'Female', '0000-00-00', '00:00:08', '09:01:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay'),
(27, 10, 0, 'Acky Nawada', 'mother', '2147483647', 'Ackynawada@gmail.com', 'BAGA,NAGA,ZSP', 'kate vegare', '1999-06-24', 25, 'Female', '0000-00-00', '00:00:08', '10:00:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay'),
(28, 18, 0, 'Acky Nawada', 'friend', '2147483647', 'Ackynawada@gmail.com', 'BAGA,NAGA,ZSP', 'kate vegare', '1999-06-24', 25, 'Female', '0000-00-00', '00:00:01', '23:59:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay'),
(29, 10, 0, 'Acky Nawada', 'mother', '2147483647', 'ackynawada@gmail.com', 'BAGA,NAGA,ZSP', 'shamm  ash', '2002-11-30', 22, 'Female', '0000-00-00', '00:00:20', '22:00:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay'),
(30, 12, 0, 'kate', 'anak', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'syring gale', '2012-12-31', 12, 'Male', '0000-00-00', '03:29:00', '15:29:00', '', ''),
(31, 10, 0, 'kate', 'sasas', '2147483647', 'vodatankquiros2@gmail.com', 'diplahan z.s', 'sasas', '2022-07-05', 2, 'Female', '0000-00-00', '01:25:00', '13:25:00', '', ''),
(32, 34, 0, 'kate', 'iro', '2147483647', 'vodatankquiros2@gmail.com', 'diplahan z.s', 'juluis', '2020-01-14', 5, 'Male', '0000-00-00', '21:42:00', '09:42:00', '', ''),
(33, 37, 11, 'kate', 'cat', '2147483647', 'vodatankquiros2@gmail.com', 'diplahan z.s', 'walington', '2022-06-18', 2, 'Male', '0000-00-00', '23:32:00', '11:32:00', '', ''),
(34, 40, 0, 'kate', 'wao', '2147483647', 'vodatankquiros2@gmail.com', 'diplahan z.s', 'walopa', '2020-07-15', 4, 'Male', '0000-00-00', '12:51:00', '00:51:00', '', ''),
(35, 44, 10, 'kate', 'Mother', '2147483647', 'vodatankquiros2@gmail.com', 'diplahan z.s', 'Miya S. Alucard', '1989-06-06', 35, 'Male', '0000-00-00', '23:48:00', '11:48:00', '', ''),
(36, 45, 18, 'kate', 'brother', '2147483647', 'vodatankquiros2@gmail.com', 'diplahan z.s', 'baby damolag', '2013-02-07', 11, 'Male', '0000-00-00', '13:26:00', '14:26:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `christening_form`
--

CREATE TABLE `christening_form` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `baby_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `baptism_date` date NOT NULL,
  `baptism_time` time NOT NULL,
  `reception_date` date NOT NULL,
  `reception_time` time NOT NULL,
  `reception_name` varchar(255) NOT NULL,
  `reception_location` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `christening_form`
--

INSERT INTO `christening_form` (`id`, `event_id`, `package_id`, `full_name`, `relationship`, `contact_number`, `email`, `address`, `baby_name`, `dob`, `gender`, `baptism_date`, `baptism_time`, `reception_date`, `reception_time`, `reception_name`, `reception_location`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 'kate', 'iro', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Juluis Walter', '2024-11-27', 'Male', '2024-11-26', '21:20:00', '2024-11-21', '09:20:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', '2024-11-20 13:21:19', '2024-11-20 13:21:19'),
(2, 0, 0, 'kate', 'iro', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Juluis Walter', '2024-11-27', 'Male', '2024-11-26', '21:20:00', '2024-11-21', '09:20:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', '2024-11-20 13:22:28', '2024-11-20 13:22:28'),
(3, 0, 0, 'kate', 'iro', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Juluis Walter', '2024-11-22', 'Male', '2024-11-21', '12:29:00', '2024-11-22', '12:29:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', '2024-11-21 04:29:13', '2024-11-21 04:29:13'),
(4, 14, 0, 'kate', 'momo', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Juluis Walter', '2024-11-29', 'Male', '2024-11-27', '23:50:00', '2024-11-14', '11:50:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', '2024-11-23 15:50:40', '2024-11-23 15:50:40'),
(5, 13, 0, 'Syrine Vegare', 'Mother', '2147483647', 'syrinevegare08@gmail.com', 'Dalama, Payao, Zamboanga Sibugay', 'Syrine Gale Vegare Sariol', '2018-04-08', 'Male', '2024-12-02', '08:00:00', '2024-12-02', '13:00:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', '2024-11-25 23:06:11', '2024-11-25 23:06:11'),
(6, 13, 0, 'Syrine Vegare', 'Mother', '2147483647', 'syrinevegare08@gmail.com', 'Dalama, Payao, Zamboanga Sibugay', 'Syrine Gale Vegare Sariol', '2018-04-08', '', '2024-12-02', '08:00:00', '2024-12-02', '13:00:00', '', 'Concepcion, Alicia, Zamboanga Sibugay', '2024-11-25 23:06:44', '2024-11-25 23:06:44'),
(7, 14, 0, 'kate', 'ana', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'sysbasta anak', '2012-07-12', 'Male', '2025-01-02', '02:32:00', '2025-01-02', '14:32:00', '', '', '2024-12-12 02:32:35', '2024-12-12 02:32:35'),
(8, 14, 0, 'kate', 'ana', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'sysbasta anak', '2024-12-17', 'Male', '2024-12-13', '03:34:00', '2024-12-19', '15:34:00', '', '', '2024-12-12 03:35:14', '2024-12-12 03:35:14'),
(9, 41, 14, 'kate', 'mother', '2147483647', 'vodatankquiros2@gmail.com', 'diplahan z.s', 'eagle', '2016-07-30', 'Male', '2025-02-06', '17:10:00', '2025-02-06', '05:12:00', '', '', '2025-01-30 07:12:18', '2025-01-30 07:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `client_customized_event`
--

CREATE TABLE `client_customized_event` (
  `id` int(11) NOT NULL,
  `organizer_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `event_package_name` varchar(255) NOT NULL,
  `event_type` int(11) NOT NULL,
  `participants` int(11) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `budget` bigint(20) NOT NULL,
  `reference_photo` varchar(255) NOT NULL,
  `add_ons` text NOT NULL,
  `selected_products` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `supplier_venue` int(11) NOT NULL,
  `supplier_location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_customized_event`
--

INSERT INTO `client_customized_event` (`id`, `organizer_id`, `client_id`, `package_id`, `event_package_name`, `event_type`, `participants`, `theme`, `budget`, `reference_photo`, `add_ons`, `selected_products`, `created`, `supplier_venue`, `supplier_location`) VALUES
(34, 2, 1, 12, 'Package 3  ', 1, 100, 'Disney', 20000, '', 'fvfdzvaweqqq', 0, '2025-01-29 21:38:22', 5, 'Concepcion, Alicia, Zamboanga Sibugay'),
(35, 2, 1, 11, 'Package 2  ', 1, 100, 'Spiderman Premium', 50000, '', 'qqqqqqqqsscssdsdsdsds', 0, '2025-01-29 23:21:50', 5, 'Concepcion, Alicia, Zamboanga Sibugay'),
(36, 2, 1, 11, 'Package 2  ', 1, 100, 'Spiderman Premium', 50000, '', 'qqqqqqqqsscssdsdsdsdssfewf', 0, '2025-01-29 23:22:22', 5, 'Concepcion, Alicia, Zamboanga Sibugay'),
(37, 2, 1, 11, 'Package 2  ', 1, 100, 'Spiderman Premium', 50000, '', 'qqqqqqqqsscssdsdsdsdssfewfdwdxw', 0, '2025-01-29 23:30:09', 5, 'Concepcion, Alicia, Zamboanga Sibugay'),
(38, 2, 1, 0, 'tata birthday', 1, 10, 'unggoy', 10000, '1738211185_logo.jpg', '10 layers nga cake', 0, '2025-01-30 12:26:25', 0, ''),
(39, 2, 1, 0, 'wwe', 1, 10, 'hello world', 100, '1738212582_bg.jpg', 'cake 10 layers with love', 0, '2025-01-30 12:49:42', 5, 'Concepcion, Alicia, Zamboanga Sibugay'),
(40, 2, 1, 0, 'wweq', 1, 100, 'hello worlds', 1000, '1738212649_bg.jpg', 'cake 10 layers with love', 0, '2025-01-30 12:50:49', 5, 'Concepcion, Alicia, Zamboanga Sibugay'),
(41, 2, 1, 14, 'the Bunyag  ', 4, 109, 'flowers', 15000, '', 'dfghnmfgrr', 0, '2025-01-30 14:58:52', 5, 'Concepcion, Alicia, Zamboanga Sibugay'),
(42, 2, 1, 15, 'Package 4  ', 5, 500, 'elegant', 150000, '', 'sdfghgsdrtyujn bvfgty78ikmjnbvcfrtyukm ', 0, '2025-01-30 15:38:38', 5, 'Concepcion, Alicia, Zamboanga Sibugay'),
(43, 2, 1, 15, 'Package 4  ', 5, 500, 'elegant', 150000, '', 'sdfgbhnfdsdfgtyhuikmn bvcxdertyhjm vcxdfghnm ', 0, '2025-01-30 15:43:19', 5, 'Concepcion, Alicia, Zamboanga Sibugay'),
(44, 2, 1, 10, 'Package 1  ', 1, 50, 'Ironman', 15000, '', 'cake 10 layers with love', 0, '2025-02-01 23:47:38', 5, 'Concepcion, Alicia, Zamboanga Sibugay'),
(45, 2, 1, 18, 'Package 4  ', 1, 50, 'Spiderman Premium', 15000, '', 'asdfgfhgjhk', 0, '2025-02-02 00:23:49', 5, 'Concepcion, Alicia, Zamboanga Sibugay'),
(46, 2, 1, 18, 'Package 4  ', 1, 50, 'Spiderman Premium', 15000, '', 'n/a', 0, '2025-02-02 01:00:32', 12, 'Lower Taway , Ipil  Zamboanga Sibugay');

-- --------------------------------------------------------

--
-- Table structure for table `client_event_selected_products`
--

CREATE TABLE `client_event_selected_products` (
  `client_poducts_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_event_selected_products`
--

INSERT INTO `client_event_selected_products` (`client_poducts_id`, `event_id`, `product_id`, `created`) VALUES
(1, 1, 3, '2024-11-10 14:22:46'),
(2, 1, 4, '2024-11-10 14:22:46'),
(3, 1, 12, '2024-11-10 14:22:46'),
(4, 1, 16, '2024-11-10 14:22:46'),
(5, 1, 17, '2024-11-10 14:22:46'),
(6, 2, 1, '2024-11-10 14:27:18'),
(7, 2, 9, '2024-11-10 14:27:18'),
(8, 2, 12, '2024-11-10 14:27:18'),
(9, 2, 16, '2024-11-10 14:27:18'),
(10, 3, 1, '2024-11-10 14:27:36'),
(11, 3, 9, '2024-11-10 14:27:36'),
(12, 3, 12, '2024-11-10 14:27:36'),
(13, 3, 16, '2024-11-10 14:27:36'),
(14, 4, 1, '2024-11-12 23:25:41'),
(15, 4, 9, '2024-11-12 23:25:41'),
(16, 4, 12, '2024-11-12 23:25:41'),
(17, 4, 16, '2024-11-12 23:25:41'),
(18, 5, 9, '2024-11-16 23:51:53'),
(19, 5, 11, '2024-11-16 23:51:53'),
(20, 5, 15, '2024-11-16 23:51:53'),
(21, 5, 16, '2024-11-16 23:51:53'),
(22, 6, 3, '2024-11-16 23:53:13'),
(23, 6, 9, '2024-11-16 23:53:13'),
(24, 6, 11, '2024-11-16 23:53:13'),
(25, 6, 12, '2024-11-16 23:53:13'),
(26, 6, 15, '2024-11-16 23:53:13'),
(27, 6, 16, '2024-11-16 23:53:13'),
(28, 7, 12, '2024-11-17 00:12:14'),
(29, 7, 14, '2024-11-17 00:12:14'),
(30, 7, 16, '2024-11-17 00:12:14'),
(31, 7, 17, '2024-11-17 00:12:14'),
(32, 8, 9, '2024-11-17 00:13:36'),
(33, 8, 10, '2024-11-17 00:13:36'),
(34, 8, 12, '2024-11-17 00:13:36'),
(35, 8, 14, '2024-11-17 00:13:36'),
(36, 8, 15, '2024-11-17 00:13:36'),
(37, 8, 16, '2024-11-17 00:13:36'),
(38, 8, 17, '2024-11-17 00:13:36'),
(39, 9, 1, '2024-11-24 01:42:09'),
(40, 9, 2, '2024-11-24 01:42:09'),
(41, 9, 9, '2024-11-24 01:42:09'),
(42, 9, 10, '2024-11-24 01:42:09'),
(43, 9, 17, '2024-11-24 01:42:09'),
(44, 10, 1, '2024-11-24 01:42:34'),
(45, 10, 2, '2024-11-24 01:42:34'),
(46, 10, 9, '2024-11-24 01:42:34'),
(47, 10, 10, '2024-11-24 01:42:34'),
(48, 10, 17, '2024-11-24 01:42:34'),
(49, 11, 1, '2024-11-24 01:45:26'),
(50, 11, 2, '2024-11-24 01:45:26'),
(51, 11, 9, '2024-11-24 01:45:26'),
(52, 11, 10, '2024-11-24 01:45:26'),
(53, 11, 17, '2024-11-24 01:45:26'),
(54, 12, 1, '2024-11-24 01:47:56'),
(55, 12, 4, '2024-11-24 01:47:56'),
(56, 12, 9, '2024-11-24 01:47:56'),
(57, 12, 14, '2024-11-24 01:47:56'),
(58, 14, 3, '2024-12-03 19:37:34'),
(59, 14, 12, '2024-12-03 19:37:34'),
(60, 14, 15, '2024-12-03 19:37:34'),
(61, 14, 17, '2024-12-03 19:37:34'),
(62, 15, 1, '2024-12-03 19:44:42'),
(63, 15, 10, '2024-12-03 19:44:42'),
(64, 15, 15, '2024-12-03 19:44:42'),
(65, 15, 18, '2024-12-03 19:44:42'),
(66, 16, 4, '2024-12-03 21:22:16'),
(67, 16, 13, '2024-12-03 21:22:16'),
(68, 16, 17, '2024-12-03 21:22:16'),
(69, 17, 1, '2024-12-07 18:11:46'),
(70, 17, 3, '2024-12-07 18:11:46'),
(71, 17, 9, '2024-12-07 18:11:46'),
(72, 17, 13, '2024-12-07 18:11:46'),
(73, 17, 16, '2024-12-07 18:11:46'),
(74, 18, 2, '2024-12-07 18:24:42'),
(75, 18, 4, '2024-12-07 18:24:42'),
(76, 18, 9, '2024-12-07 18:24:42'),
(77, 18, 12, '2024-12-07 18:24:42'),
(78, 18, 14, '2024-12-07 18:24:42'),
(79, 18, 16, '2024-12-07 18:24:42'),
(80, 38, 2, '2025-01-30 12:26:25'),
(81, 38, 19, '2025-01-30 12:26:25'),
(82, 38, 20, '2025-01-30 12:26:25'),
(83, 39, 2, '2025-01-30 12:49:42'),
(84, 39, 19, '2025-01-30 12:49:42'),
(85, 39, 20, '2025-01-30 12:49:42'),
(86, 40, 2, '2025-01-30 12:50:49'),
(87, 40, 19, '2025-01-30 12:50:49'),
(88, 40, 20, '2025-01-30 12:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `client_request_form`
--

CREATE TABLE `client_request_form` (
  `id` int(11) NOT NULL,
  `client_form_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `organizer_id` int(11) NOT NULL,
  `event_type` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `date_start` varchar(255) NOT NULL,
  `date_end` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_request_form`
--

INSERT INTO `client_request_form` (`id`, `client_form_id`, `client_id`, `organizer_id`, `event_type`, `status`, `date_start`, `date_end`, `date_created`) VALUES
(19, 14, 1, 2, 1, 'done', '2024-11-28', '2024-11-29', '2024-11-21 22:28:28'),
(20, 3, 1, 2, 4, 'done', '2024-11-28', '2024-11-29', '2024-11-21 22:28:28'),
(21, 15, 1, 2, 5, 'done', '2024-11-28', '2024-11-29', '2024-11-21 22:28:28'),
(22, 15, 1, 2, 1, 'cancelled', '2024-11-29', '2024-11-30', '2024-11-21 22:28:28'),
(23, 16, 1, 2, 1, 'done', '2024-11-28', '2024-11-28', '2024-11-21 22:28:28'),
(24, 4, 1, 2, 4, 'cancelled', '2024-11-30', '2024-11-30', '2024-11-23 23:50:40'),
(25, 16, 1, 2, 5, 'cancelled', '2024-11-30', '2024-11-30', '2024-11-24 00:39:09'),
(26, 17, 1, 2, 1, 'cancelled', '2024-11-30', '2024-11-30', '2024-11-24 01:24:41'),
(27, 18, 1, 2, 1, 'rejected', '2024-12-12', '2024-12-12', '2024-11-26 00:03:09'),
(32, 21, 1, 2, 1, 'done', '2024-12-12', '2024-12-13', '2024-12-05 00:08:25'),
(33, 22, 1, 2, 1, 'rejected', '2024-12-12', '2024-12-13', '2024-12-05 00:14:47'),
(34, 23, 1, 2, 1, 'rejected', '2024-12-12', '2024-12-13', '2024-12-05 00:16:07'),
(35, 24, 1, 2, 1, 'done', '2024-12-12', '2024-12-13', '2024-12-05 01:36:05'),
(36, 25, 7, 2, 1, 'done', '2024-12-15', '2024-12-15', '2024-12-05 18:34:57'),
(37, 26, 7, 2, 1, 'approved', '2024-12-19', '2024-12-19', '2024-12-07 18:01:20'),
(38, 27, 7, 2, 1, 'approved', '2024-12-18', '2024-12-18', '2024-12-07 18:08:17'),
(40, 29, 7, 2, 1, 'done', '2024-12-31', '2024-12-31', '2024-12-09 23:48:13'),
(42, 7, 1, 2, 4, 'done', '2025-01-01', '2025-01-05', '2024-12-12 02:32:35'),
(43, 17, 1, 2, 5, 'cancelled', '2025-01-12', '2025-01-13', '2024-12-12 02:39:25'),
(44, 30, 1, 2, 1, 'cancelled', '2025-02-04', '2025-02-05', '2024-12-12 03:33:35'),
(45, 8, 1, 2, 4, 'rejected', '2025-01-01', '2025-01-02', '2024-12-12 03:35:14'),
(46, 18, 1, 2, 5, 'rejected', '2025-01-11', '2025-01-12', '2024-12-12 03:36:08'),
(47, 31, 1, 2, 1, 'approved', '2025-01-30', '2025-01-30', '2025-01-24 01:25:40'),
(48, 32, 1, 2, 1, 'cancelled', '2025-02-05', '2025-02-05', '2025-01-29 21:42:36'),
(49, 33, 1, 2, 1, 'approved', '2025-02-05', '2025-02-05', '2025-01-29 23:32:10'),
(50, 34, 1, 2, 1, 'approved', '2025-02-06', '2025-02-06', '2025-01-30 12:51:17'),
(51, 9, 1, 2, 4, 'pending', '2025-02-06', '2025-02-06', '2025-01-30 15:12:18'),
(52, 19, 1, 2, 5, 'cancelled', '2025-02-07', '2025-02-07', '2025-01-30 15:41:57'),
(53, 20, 1, 2, 5, 'approved', '2025-02-06', '2025-02-06', '2025-01-30 15:43:39'),
(54, 35, 1, 2, 1, 'pending', '2025-02-08', '2025-02-08', '2025-02-01 23:48:10'),
(55, 36, 1, 2, 1, 'approved', '2025-02-20', '2025-02-20', '2025-02-02 00:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `decors`
--

CREATE TABLE `decors` (
  `decor_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `rental_retails` varchar(50) DEFAULT NULL,
  `product_category` varchar(100) DEFAULT NULL,
  `decor_name` varchar(100) DEFAULT NULL,
  `decor_price` decimal(10,2) DEFAULT NULL,
  `decor_image` varchar(255) DEFAULT NULL,
  `status` enum('available','unavailable') DEFAULT 'available',
  `decor_description` text DEFAULT NULL,
  `stocks` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `decors`
--

INSERT INTO `decors` (`decor_id`, `supplier_id`, `rental_retails`, `product_category`, `decor_name`, `decor_price`, `decor_image`, `status`, `decor_description`, `stocks`, `created_at`) VALUES
(5, 1, 'Retail', 'Ballons', 'flower ballons', 1000.00, 'flower balloons.jpg', 'available', 'sunflower balloon', 0, '2024-11-08 19:36:07'),
(6, 10, 'Rental', 'Ballons', 'Mixed Balloon', 250.00, 'STII LOGO.png', 'available', 'dfshgjhg', 0, '2024-12-12 19:06:20'),
(7, 10, 'Retail', 'Floral Arrangements', 'Sunflower', 50.00, 'sweet-artificial-sunflowers-1-bunch-7-heads.jpg', 'available', 'sunflower decoration for table ', 100, '2024-12-15 23:36:27'),
(8, 10, 'Retail', 'Ballons', 'Curly Ballon', 20.00, 'il_1080xN.4538731062_a23e.jpg', 'available', 'curly balloons for stage decorations\r\n', 200, '2024-12-15 23:39:18'),
(9, 10, 'Retail', 'Tableware', 'table cloth', 20.00, 'fe43f5e83fc96725c1f0e48826907955.jpg', 'available', 'wdefv vcx', 200, '2024-12-16 00:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `dresses`
--

CREATE TABLE `dresses` (
  `dress_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `rental_retails` enum('Rental','Retail') NOT NULL,
  `dress_category` enum('Casual Dresses','Formal Dresses','Work/Office Dresses','Party Dresses','Summer Dresses','Wedding Dresses','Cultural/Traditional Dresses') NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `dress_name` varchar(255) NOT NULL,
  `dress_price` decimal(10,2) NOT NULL,
  `status` enum('Available','Unavailable') NOT NULL,
  `dress_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dresses`
--

INSERT INTO `dresses` (`dress_id`, `supplier_id`, `rental_retails`, `dress_category`, `gender`, `dress_name`, `dress_price`, `status`, `dress_image`, `created_at`) VALUES
(3, 1, 'Retail', 'Formal Dresses', 'Male', 'barong', 10000.00, 'Available', '../../uploads/products/wedding.jpg', '2024-11-09 13:22:39'),
(4, 1, 'Rental', 'Casual Dresses', 'Female', 'sdvfb ', 123.00, 'Available', '../../uploads/products/happy-birthday-clown-does-a-magic-trick-with-a-top-hat-and-wand-BXWHCT.jpg', '2024-11-09 13:25:11'),
(5, 1, 'Rental', 'Formal Dresses', 'Male', 'qwdfegb', 1234.00, 'Available', '../../uploads/products/71BSpSVg8kS.jpg', '2024-11-09 13:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `organizer_id` int(11) NOT NULL,
  `event_package_name` varchar(255) NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `participants` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `theme_photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `supplier_venue` int(11) NOT NULL,
  `supplier_location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `organizer_id`, `event_package_name`, `event_type`, `participants`, `price`, `theme`, `theme_photo`, `created_at`, `supplier_venue`, `supplier_location`) VALUES
(12, 2, 'Disney', '1', 100, 20000, 'Disney', 'official-disney-princesses.jpg', '2024-11-08 17:11:09', 5, 'Concepcion, Alicia, Zamboanga Sibugay'),
(13, 2, 'Vintage', '5', 100, 300000, 'Vintage', 'wedding.jpg', '2024-11-08 17:38:11', 5, 'Concepcion, Alicia, Zamboanga Sibugay'),
(18, 2, ' Premium', '1', 50, 15000, ' Premium', 'birthday-care-package-mc.jpg', '2025-02-01 16:20:20', 5, 'Concepcion, Alicia, Zamboanga Sibugay'),
(19, 2, ' Premium', '5', 100, 50000, 'Barong tagalog', 'wedding.jpeg', '2025-02-01 17:33:25', 12, 'Lower Taway , Ipil  Zamboanga Sibugay'),
(20, 2, 'Baptism', '4', 50, 15000, 'Formal ', 'christening.jpg', '2025-02-01 17:41:06', 12, 'Lower Taway , Ipil  Zamboanga Sibugay'),
(21, 17, 'Ironman', '1', 100, 15000, 'Ironman', 'birthday.jpeg', '2025-02-01 18:25:39', 12, 'Lower Taway , Ipil  Zamboanga Sibugay'),
(22, 17, ' Premium', '5', 100, 50000, 'Barong tagalog', 'wedding.jpeg', '2025-02-01 18:26:25', 12, 'Lower Taway , Ipil  Zamboanga Sibugay'),
(23, 17, 'Package 1', '4', 50, 15000, 'Formal ', 'christening.jpg', '2025-02-01 18:27:09', 12, 'Lower Taway , Ipil  Zamboanga Sibugay');

-- --------------------------------------------------------

--
-- Table structure for table `events_photos`
--

CREATE TABLE `events_photos` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `event_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events_photos`
--

INSERT INTO `events_photos` (`id`, `file_name`, `file_path`, `event_id`, `date_created`) VALUES
(21, '8-steps-to-planting-a-tree-1024x684.jpg', 'uploads/8-steps-to-planting-a-tree-1024x684.jpg', 20, '2024-12-05 01:14:54'),
(22, '2023-New-Board-Members-Blog-Header-v2_1200-x-630-px-150x150.png', 'uploads/2023-New-Board-Members-Blog-Header-v2_1200-x-630-px-150x150.png', 20, '2024-12-05 01:14:54'),
(23, '279837462_368619338642712_2165454670139514173_n.jpg', 'uploads/279837462_368619338642712_2165454670139514173_n.jpg', 20, '2024-12-05 01:14:54'),
(24, '279908210_368619341976045_4104388157637572978_n(1).png', 'uploads/279908210_368619341976045_4104388157637572978_n(1).png', 20, '2024-12-05 01:14:54'),
(25, '279908210_368619341976045_4104388157637572978_n.png', 'uploads/279908210_368619341976045_4104388157637572978_n.png', 20, '2024-12-05 01:14:54'),
(26, '408057633_765733805597928_7508298201921866450_n.jpg', 'uploads/408057633_765733805597928_7508298201921866450_n.jpg', 20, '2024-12-05 01:14:54'),
(27, '412327661_775304557974186_984377400158830330_nthumb.jpg', 'uploads/412327661_775304557974186_984377400158830330_nthumb.jpg', 20, '2024-12-05 01:14:54'),
(28, '412335835_775287691309206_1516600151151131354_nthumb.jpg', 'uploads/412335835_775287691309206_1516600151151131354_nthumb.jpg', 20, '2024-12-05 01:14:54'),
(29, '412351844_775311004640208_8706502345908343785_nlow.jpg', 'uploads/412351844_775311004640208_8706502345908343785_nlow.jpg', 20, '2024-12-05 01:14:54'),
(30, '412357589_773497871488188_8391364990283935385_nthumb.jpg', 'uploads/412357589_773497871488188_8391364990283935385_nthumb.jpg', 20, '2024-12-05 01:14:54'),
(31, '414860488_781772193994089_8503377736474925128_nthumb.jpg', 'uploads/414860488_781772193994089_8503377736474925128_nthumb.jpg', 20, '2024-12-05 01:14:54'),
(32, '414880324_781794377325204_8497961783949811834_nlow.jpg', 'uploads/414880324_781794377325204_8497961783949811834_nlow.jpg', 20, '2024-12-05 01:14:54'),
(33, '420662980_1083901653035216_6793238480823219533_n - Copy.jpg', 'uploads/420662980_1083901653035216_6793238480823219533_n - Copy.jpg', 21, '2024-12-05 01:15:13'),
(34, '420662980_1083901653035216_6793238480823219533_n.jpg', 'uploads/420662980_1083901653035216_6793238480823219533_n.jpg', 21, '2024-12-05 01:15:13'),
(35, '1aabe9ba-5eab-47c3-a82c-aec8ca7a5bbb - Copy.jfif', 'uploads/1aabe9ba-5eab-47c3-a82c-aec8ca7a5bbb - Copy.jfif', 21, '2024-12-05 01:15:13'),
(36, '1aabe9ba-5eab-47c3-a82c-aec8ca7a5bbb.jfif', 'uploads/1aabe9ba-5eab-47c3-a82c-aec8ca7a5bbb.jfif', 21, '2024-12-05 01:15:13'),
(37, '7b8ce494-0d26-4a69-91e4-63609499a9f0.jfif', 'uploads/7b8ce494-0d26-4a69-91e4-63609499a9f0.jfif', 21, '2024-12-05 01:15:13'),
(38, 'e5c9e84e-aebd-441a-b9a1-dbdca6d7c23a.jfif', 'uploads/e5c9e84e-aebd-441a-b9a1-dbdca6d7c23a.jfif', 21, '2024-12-05 01:15:13'),
(39, '7f8327da-e72f-4386-8df4-99a82935ed46.jfif', 'uploads/7f8327da-e72f-4386-8df4-99a82935ed46.jfif', 21, '2024-12-05 01:15:13'),
(40, 'a04f4e3f-3bca-4f9b-a26e-28dcc71d54f5.jfif', 'uploads/a04f4e3f-3bca-4f9b-a26e-28dcc71d54f5.jfif', 21, '2024-12-05 01:15:13'),
(41, '464906569_1743843206452710_7195247443633867442_n.jpg', 'uploads/464906569_1743843206452710_7195247443633867442_n.jpg', 35, '2024-12-16 20:51:25'),
(42, '462564495_8653548091398365_8058744191109990360_n.jpg', 'uploads/462564495_8653548091398365_8058744191109990360_n.jpg', 35, '2024-12-16 20:51:25'),
(43, '462562292_1987458341679055_4644933182392016687_n.jpg', 'uploads/462562292_1987458341679055_4644933182392016687_n.jpg', 35, '2024-12-16 20:51:25'),
(44, '462560285_1001655258386920_3128942778745518300_n.jpg', 'uploads/462560285_1001655258386920_3128942778745518300_n.jpg', 35, '2024-12-16 20:51:25'),
(45, '462543774_858403409702639_797627316556812233_n.jpg', 'uploads/462543774_858403409702639_797627316556812233_n.jpg', 35, '2024-12-16 20:51:25'),
(46, '462542898_874444378208992_4187939666240794813_n - Copy.jpg', 'uploads/462542898_874444378208992_4187939666240794813_n - Copy.jpg', 35, '2024-12-16 20:51:25'),
(47, '462570553_1716705212454823_2846759440586616372_n (1).jpg', 'uploads/462570553_1716705212454823_2846759440586616372_n (1).jpg', 36, '2024-12-16 20:52:14'),
(48, '462542834_476465968785492_4222419979170125438_n (2).jpg', 'uploads/462542834_476465968785492_4222419979170125438_n (2).jpg', 36, '2024-12-16 20:52:14'),
(49, '462542834_476465968785492_4222419979170125438_n.jpg', 'uploads/462542834_476465968785492_4222419979170125438_n.jpg', 36, '2024-12-16 20:52:14'),
(50, '462545997_541340645309307_5947826896448615247_n.jpg', 'uploads/462545997_541340645309307_5947826896448615247_n.jpg', 36, '2024-12-16 20:52:14'),
(51, '462582421_975782731240118_5782630807793900364_n.jpg', 'uploads/462582421_975782731240118_5782630807793900364_n.jpg', 36, '2024-12-16 20:52:14'),
(52, '462547891_1265280108112548_348363571303545336_n.jpg', 'uploads/462547891_1265280108112548_348363571303545336_n.jpg', 36, '2024-12-16 20:52:14'),
(53, 'bb38997012085f977f572947c6bfc2cd.jpg', 'uploads/bb38997012085f977f572947c6bfc2cd.jpg', 40, '2025-01-24 01:12:32'),
(54, '42905980_744044005976194_9075532224551592756_n.webp', 'uploads/42905980_744044005976194_9075532224551592756_n.webp', 42, '2025-01-24 01:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `event_calendar`
--

CREATE TABLE `event_calendar` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_calendar`
--

INSERT INTO `event_calendar` (`id`, `title`, `start_date`, `end_date`) VALUES
(1, 'Event 1', '2024-12-18', '2024-12-20'),
(2, 'Event 2', '2024-12-21', '2024-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `event_products`
--

CREATE TABLE `event_products` (
  `event_product_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_products`
--

INSERT INTO `event_products` (`event_product_id`, `event_id`, `product_id`) VALUES
(99, 12, 2),
(104, 13, 2),
(107, 18, 2),
(108, 19, 23),
(109, 20, 24),
(110, 21, 25),
(111, 22, 27),
(112, 23, 28);

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE `event_types` (
  `event_type_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`event_type_id`, `event_name`, `event_image`) VALUES
(1, 'Birthday', 'birthday.jpeg'),
(4, 'Christening', 'christening.jpg'),
(5, 'Wedding', 'wedding.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `organizer_done_event`
--

CREATE TABLE `organizer_done_event` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `organizer_id` int(11) NOT NULL,
  `events_photos_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organizer_done_event`
--

INSERT INTO `organizer_done_event` (`id`, `event_id`, `organizer_id`, `events_photos_id`, `date_created`) VALUES
(1, 23, 2, 0, '2024-12-04 23:37:19'),
(2, 32, 2, 0, '2024-12-05 00:14:12'),
(3, 20, 2, 20, '2024-12-05 00:57:39'),
(4, 21, 2, 0, '2024-12-05 01:01:26'),
(7, 20, 2, 32, '2024-12-05 01:14:54'),
(8, 21, 2, 40, '2024-12-05 01:15:13'),
(9, 35, 2, 46, '2024-12-16 20:51:25'),
(10, 36, 2, 52, '2024-12-16 20:52:14'),
(11, 40, 2, 53, '2025-01-24 01:12:32'),
(12, 42, 2, 54, '2025-01-24 01:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `organizer_products`
--

CREATE TABLE `organizer_products` (
  `orga_products_id` int(11) NOT NULL,
  `organizer_id` int(11) NOT NULL,
  `event_types` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `product_photo` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organizer_products`
--

INSERT INTO `organizer_products` (`orga_products_id`, `organizer_id`, `event_types`, `product_name`, `description`, `product_photo`, `created`) VALUES
(2, 2, 1, 'Basic party decorations (balloons, banners)', '2layers cake,  \r\nMagician Clown,\r\n  Customize  themed e-invitation card,\r\nProjector &  Screen,\r\nPhotographer,\r\nCatering by Sabor', 'product_672e0c3469c801.16319894.jpeg', '2024-11-08 21:03:48'),
(22, 2, 1, 'Premium', '(ballons, mascot, decor)', 'product_679e59a68be241.94750709.jpeg', '2025-02-02 01:28:06'),
(23, 2, 5, 'Premium', '(Dress,Decor,Ballons,Flowers,Photographer,\r\nCatering by Sabor)', 'product_679e5a63517587.82452368.jpeg', '2025-02-02 01:31:15'),
(24, 2, 4, 'Baptism', 'Corner  Balloons,  Decorative  Candle', 'product_679e5c0eef4228.44812623.jpg', '2025-02-02 01:38:22'),
(25, 17, 1, 'basic party', 'balloons , decor ,  mascot', 'product_679e65d6dc2020.55056195.jpeg', '2025-02-02 02:20:06'),
(26, 17, 1, 'Premium', 'balloons, decor ,', 'product_679e6693842881.86237377.jpg', '2025-02-02 02:23:15'),
(27, 17, 5, 'vintage', 'flowers, decor , veneu', 'product_679e66cfb80ba7.36335039.jpeg', '2025-02-02 02:24:15'),
(28, 17, 4, 'Baptism', 'balloons,decor', 'product_679e66efba2582.36955748.jpg', '2025-02-02 02:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `organizer_request`
--

CREATE TABLE `organizer_request` (
  `orga_request_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `organizer_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organizer_request`
--

INSERT INTO `organizer_request` (`orga_request_id`, `supplier_id`, `organizer_id`, `status`, `date`) VALUES
(14, 1, 2, 'approved', '2024-11-09 03:34:53'),
(16, 4, 2, 'approved', '2024-11-09 03:34:53'),
(17, 5, 2, 'approved', '2024-11-09 03:34:53'),
(18, 6, 2, 'approved', '2024-11-09 03:34:53'),
(19, 1, 8, 'request', '2024-12-07 18:50:51'),
(20, 7, 8, 'request', '2024-12-07 18:52:54'),
(21, 8, 2, 'cancel', '2024-12-12 19:02:48'),
(22, 10, 2, 'approved', '2024-12-12 19:03:04'),
(23, 9, 2, 'cancel', '2024-12-14 00:26:27'),
(24, 11, 2, 'request', '2024-12-21 11:21:21'),
(25, 12, 2, 'approved', '2025-02-02 00:53:21'),
(26, 12, 17, 'approved', '2025-02-02 02:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `package_catering`
--

CREATE TABLE `package_catering` (
  `package_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `catering_name` varchar(255) NOT NULL,
  `catering_category` varchar(255) NOT NULL,
  `catering_price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `catering_participants` int(11) NOT NULL,
  `status` enum('available','unavailable') DEFAULT 'available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_catering`
--

INSERT INTO `package_catering` (`package_id`, `supplier_id`, `catering_name`, `catering_category`, `catering_price`, `image`, `catering_participants`, `status`, `created_at`) VALUES
(6, 1, 'tirada', 'appetizers', 678.00, '', 678, 'available', '2024-11-09 19:08:04'),
(7, 1, 'hhbbj ', 'desserts', 453.00, '', 334, 'available', '2024-11-09 19:08:21'),
(8, 9, 'Birthday Package', 'desserts', 10000.00, '', 20, 'available', '2024-12-16 04:08:02'),
(9, 9, 'wedding package', 'desserts', 2000.00, 'package_uploads/OIP (11).jpeg', 20, 'available', '2024-12-16 04:16:06'),
(10, 9, 'Christening package', 'desserts', 2000.00, 'package_uploads/OIP (12).jpeg', 20, 'unavailable', '2024-12-16 04:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `package_decor`
--

CREATE TABLE `package_decor` (
  `package_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `decor_name` varchar(255) NOT NULL,
  `decor_category` varchar(255) NOT NULL,
  `decor_price` decimal(10,2) NOT NULL,
  `decor_participants` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `stocks` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_decor`
--

INSERT INTO `package_decor` (`package_id`, `supplier_id`, `decor_name`, `decor_category`, `decor_price`, `decor_participants`, `image`, `stocks`, `created_at`) VALUES
(10, 1, 'qwert', 'Themed Props and Accessories', 234.00, 100, '', 0, '2024-11-09 13:14:08'),
(14, 10, 'Sunflower Stage Decor', 'Themed Props and Accessories', 10000.00, 10, 'package_uploads/5014a293908838019fc8519bb08bf982.jpg', 100, '2024-12-16 00:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `package_dress`
--

CREATE TABLE `package_dress` (
  `package_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `dress_name` varchar(255) NOT NULL,
  `dress_category` varchar(255) NOT NULL,
  `dress_price` decimal(10,2) NOT NULL,
  `dress_participants` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_dress`
--

INSERT INTO `package_dress` (`package_id`, `supplier_id`, `dress_name`, `dress_category`, `dress_price`, `dress_participants`, `created_at`) VALUES
(10, 1, 'dress', 'Casual Dresses', 1111.00, 2222, '2024-11-09 13:22:51'),
(11, 1, 'fefwef', 'Formal Dresses', 2345.00, 234, '2024-11-09 13:25:41'),
(12, 1, 'dfv', 'Casual Dresses', 234.00, 2345, '2024-11-09 13:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `package_products_1`
--

CREATE TABLE `package_products_1` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_products_1`
--

INSERT INTO `package_products_1` (`id`, `supplier_id`, `package_id`, `product_id`) VALUES
(12, 1, 10, 5),
(13, 1, 10, 3),
(14, 1, 11, 3),
(15, 1, 11, 4),
(16, 1, 11, 5),
(17, 1, 12, 3),
(18, 1, 12, 4),
(19, 1, 6, 8),
(20, 1, 6, 9),
(21, 1, 7, 8),
(22, 1, 7, 9),
(23, 10, 11, 6),
(24, 10, 12, 7),
(25, 10, 12, 8),
(26, 10, 13, 7),
(27, 10, 13, 8),
(28, 10, 14, 7),
(29, 10, 14, 8),
(30, 10, 14, 9),
(31, 9, 8, 10),
(32, 9, 9, 10),
(33, 9, 9, 11),
(34, 9, 9, 12),
(35, 9, 9, 13),
(36, 9, 10, 10),
(37, 9, 10, 11),
(38, 9, 10, 12),
(39, 9, 10, 13);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `payment_method` varchar(20) NOT NULL DEFAULT 'GCash',
  `transaction_id` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `plan`, `amount`, `payment_status`, `payment_method`, `transaction_id`, `created_at`) VALUES
(21, 1, 'monthly', 299.00, 'pending', 'GCash', 'src_twfb9LVKcn68gCULb7tXSSAe', '2024-12-21 01:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `photo_video`
--

CREATE TABLE `photo_video` (
  `photo_video_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `photo_video_name` varchar(255) NOT NULL,
  `photo_video_price` decimal(10,2) NOT NULL,
  `photo_video_image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `photo_video_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photo_video`
--

INSERT INTO `photo_video` (`photo_video_id`, `supplier_id`, `photo_video_name`, `photo_video_price`, `photo_video_image`, `status`, `photo_video_description`) VALUES
(1, 1, 'graduation pic', 10000.00, 'Screenshot 2024-10-10 221851.png', '', 'asdfghjkl;\''),
(2, 1, 'graduation pic', 10000.00, 'Screenshot 2024-10-10 221851.png', 'Available', 'asdfghjkl;\''),
(3, 1, 'Graduation', 10000.00, 'Screenshot (7).png', 'Available', 'dsfsrdtfjhljkjhdrf'),
(4, 1, 'wedding', 8900.00, 'Screenshot (15).png', 'Available', 'fbouhfjbuigervber');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_type` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `catering_category` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `status` enum('Available','Unavailable') NOT NULL,
  `product_descriptions` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `supplier_id`, `catering_category`, `product_name`, `product_image`, `status`, `product_descriptions`, `created_at`) VALUES
(8, 1, 'Salads', 'dada', '139d965af1841eb714191f0cdbee9237.jpg', 'Available', 'm,', '2024-11-09 19:01:03'),
(9, 1, 'Desserts', 'salad', 'R (3).jpeg', 'Available', 'dfvgbn', '2024-11-09 19:01:17'),
(10, 9, 'Desserts', 'Pink Cupcakes', 'R (1).jpeg', 'Unavailable', 'pink cupcakes for everyone\r\n', '2024-12-16 03:55:53'),
(11, 9, 'Desserts', 'spaghetti', 'OIP (9).jpeg', 'Unavailable', 'qwertyhbgvfds', '2024-12-16 03:59:42'),
(12, 9, 'Salads', 'salad ala king', 'OIP (8).jpeg', 'Available', 'asdfgh', '2024-12-16 04:06:42'),
(13, 9, 'Main Courses', 'Seafoods Overload', 'shutterstock_1773695441-min.jpg', 'Available', 'sdcsx fwesgvds', '2024-12-16 04:07:31');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `supplier_type` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('pending','approved','denied') NOT NULL DEFAULT 'pending',
  `password` varchar(255) NOT NULL,
  `business_pic` varchar(255) NOT NULL,
  `business_permit` varchar(255) NOT NULL,
  `dti_permit` varchar(255) NOT NULL,
  `bir_permit` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `business_name`, `supplier_type`, `address`, `contact`, `email`, `status`, `password`, `business_pic`, `business_permit`, `dti_permit`, `bir_permit`, `user_type`, `date_created`) VALUES
(10, 'By GYMS', 'decor', 'IPIL, ZSP', 2147483647, 'bygyms@gmail.com', 'approved', '$2y$10$q7d9/hgZ/PImXacNW9nNxOfoYNQbphQ6Cc3nFPEy/SV7rb9dp/QgO', 'a04f4e3f-3bca-4f9b-a26e-28dcc71d54f5.jfif', '325338686_1349153705898235_3157714871585188060_n - Copy.jpg', '420662980_1083901653035216_6793238480823219533_n.jpg', '7f8327da-e72f-4386-8df4-99a82935ed46.jfif', 'supplier', '2024-12-08 18:23:59'),
(12, 'casamiya', 'venue', 'Lower Taway , Ipil  Zamboanga Sibugay', 2147483647, 'dawolit752@kuandika.com', 'approved', '$2y$10$q7d9/hgZ/PImXacNW9nNxOfoYNQbphQ6Cc3nFPEy/SV7rb9dp/QgO', 'casamiya.jpeg', 'bussiness permit.jpg', 'dti.jpg', 'BIR.webp', 'supplier', '2025-02-02 00:45:40');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_feedback_pics`
--

CREATE TABLE `supplier_feedback_pics` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier_feedback_pics`
--

INSERT INTO `supplier_feedback_pics` (`id`, `supplier_id`, `file_name`, `file_path`, `uploaded_at`) VALUES
(9, 10, '30997_hd.jpg', '../uploads/675b29cb310363.73292133.jpg', '2024-12-12 18:22:03'),
(10, 10, '30998_hd.jpg', '../uploads/675b29cb331341.46452427.jpg', '2024-12-12 18:22:03'),
(11, 10, '30999_hd.jpg', '../uploads/675b29cb3438b6.44064008.jpg', '2024-12-12 18:22:03'),
(12, 10, '31000_hd.jpg', '../uploads/675b29cb352e19.10822033.jpg', '2024-12-12 18:22:03'),
(13, 10, '31001_hd.jpg', '../uploads/675b29cb365190.36888904.jpg', '2024-12-12 18:22:03'),
(14, 10, '33781_hd.jpg', '../uploads/675b29cb37a117.55915919.jpg', '2024-12-12 18:22:03'),
(15, 10, 'article-p.png', '../uploads/675b29cb387874.71246243.png', '2024-12-12 18:22:03'),
(16, 10, 'editor_bonnie - Copy.png', '../uploads/675b29cb397df3.52079134.png', '2024-12-12 18:22:03'),
(17, 10, 'goodnet_logo.png', '../uploads/675b29cb3ad8e7.85689761.png', '2024-12-12 18:22:03'),
(18, 10, 'goodnet-iframe-alt - Copy.png', '../uploads/675b29cb3bf332.17828678.png', '2024-12-12 18:22:03'),
(19, 10, 'goodnet-iframe-alt.png', '../uploads/675b29cb3ca1e2.86657497.png', '2024-12-12 18:22:03'),
(20, 10, '325338686_1349153705898235_3157714871585188060_n - Copy.jpg', '../uploads/675b2bca8882b1.05498812.jpg', '2024-12-12 18:30:34'),
(21, 10, '420662980_1083901653035216_6793238480823219533_n - Copy.jpg', '../uploads/675b2bca8a7134.96692910.jpg', '2024-12-12 18:30:34'),
(22, 10, '1aabe9ba-5eab-47c3-a82c-aec8ca7a5bbb - Copy.jfif', '../uploads/675b2bca8b8b60.34381154.jfif', '2024-12-12 18:30:34'),
(23, 10, '7b8ce494-0d26-4a69-91e4-63609499a9f0.jfif', '../uploads/675b2bca8ce594.95921107.jfif', '2024-12-12 18:30:34'),
(24, 10, 'a3529e96-2310-4e6f-af2a-1c888c705c3c.jpg', '../uploads/675b2c36113007.76033419.jpg', '2024-12-12 18:32:22'),
(25, 10, 'logo.jpg', '../uploads/675b2c47e0f6a6.26424747.jpg', '2024-12-12 18:32:39'),
(26, 10, 'profile.png', '../uploads/675b2cb6eafc67.27915673.png', '2024-12-12 18:34:30'),
(27, 10, 'profile.jpg', '../uploads/675b2cb6ecc632.97701260.jpg', '2024-12-12 18:34:30'),
(28, 12, 'casamiya.jpeg', '../uploads/679e618fe3ecc0.44731018.jpeg', '2025-02-01 18:01:51'),
(30, 12, 'function2.jpg', '../uploads/679e628d1e2c31.20122094.jpg', '2025-02-01 18:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `status` enum('approved','pending','denied') NOT NULL DEFAULT 'pending',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `valid_id` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `user_plan_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `company_name`, `birthday`, `age`, `gender`, `civil_status`, `address`, `contact`, `username`, `status`, `email`, `password`, `profile_pic`, `facebook`, `valid_id`, `user_type`, `user_plan_id`, `date_created`) VALUES
(1, 'kate', '', '2024-09-30', 21, 'female', 'single', 'diplahan z.s', 2147483647, 'admin', 'approved', 'vodatankquiros2@gmail.com', '$2y$10$l0TkH0Tl1H0rXj.koXikBuWJQZX32nv7IRnxvFh3aQBAiOnOUB/Mq', '../uploads/OIP.jpg', '', '../uploads/1661490819419.jpg', 'client', 0, '2024-10-31 20:34:36'),
(2, 'John Doe', '', '2024-10-09', 21, 'male', 'divorced', 'Ipil Heights, Ipil, ZSP', 922110099, 'admin', 'approved', 'tawo@gmail.com', '$2y$10$l0TkH0Tl1H0rXj.koXikBuWJQZX32nv7IRnxvFh3aQBAiOnOUB/Mq', '../uploads/1661490819419.jpg', 'https://web.facebook.com/share/p/19kDemYEQD/', '../uploads/1695623680473.png', 'organizer', 0, '2024-10-31 20:38:40'),
(11, 'Admin', '', '2024-12-08', 1, 'male', 'single', 'ipil, zsp', 1234567890, 'admin', 'approved', 'admin@gmail.com', '$2y$10$Xb4f4p7Y8pkaUojXLgNti.HZDDQ7WTetC7tcpI9f7QVMyJtLI.vuC', '---', '', '---', 'admin', 0, '2024-12-08 14:43:57'),
(17, 'layla b lala', 'Freelance', '2003-11-23', 21, 'female', 'single', 'Ipil, Zamboanga Sibugay', 2147483647, 'Habibi', 'approved', 'nawada@gmail.com', '$2y$10$v657kEwdhHjKGv1tXEf7vOOopi0Hb/xHHiY7gyb.dBkIN4cm398IO', '../uploads/pic.jpeg', '', '../uploads/valid.jpg', 'organizer', 4, '2025-02-02 02:17:24'),
(18, 'Yvonne Fabillazr', '', '2003-03-17', 21, 'female', 'single', 'Talusan, Zamboanga Sibugay', 2147483647, 'yvette', 'approved', 'yvonnefabillar27@gmail.com', '$2y$10$Uy62E8ymQwEvDDWsT5V4.O/xoqf1vVewWgh3/8weUMS8wPWqzNjUy', '../uploads/avatar.jpg.jpg', '', '../uploads/384742c1-5e0e-4a53-85db-97b496fb1e3f.jpeg', 'client', 0, '2025-02-02 10:11:00'),
(19, 'Yvonne Fabillazr', '', '2000-03-04', 24, 'male', 'single', 'Talusan, Zamboanga Sibugay', 2147483647, 'yvette', 'approved', 'yirar34623@eluxeer.com', '$2y$10$8nUnGUi3a3qOvvOgKVw2gezjEuEdenIXTXTKCVVrTXXySJpS6Tmcu', '../uploads/pic.jpeg', '', '../uploads/christening.jpg', 'client', 0, '2025-02-02 19:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_plan`
--

CREATE TABLE `user_plan` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `plan_type` varchar(255) NOT NULL,
  `amount` text NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `expire_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_plan`
--

INSERT INTO `user_plan` (`id`, `email`, `plan_type`, `amount`, `description`, `status`, `created_at`, `expire_at`) VALUES
(1, 'vodatankquiros@gmail.com', 'free', '0', 'free plan', 'active', '2025-01-23 17:42:16', '2025-02-23 17:42:16'),
(2, 'abucayjustin@gmail.com', 'free', '0', 'free plan', 'active', '2025-01-23 18:07:56', '2025-02-23 18:07:56'),
(3, 'dawolit752@kuandika.com', 'free', '0', 'free plan', 'active', '2025-02-01 17:35:10', '2025-03-01 17:35:10'),
(4, 'nawada@gmail.com', 'free', '0', 'free plan', 'active', '2025-02-01 19:13:49', '2025-03-01 19:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venue_id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `venue_name` varchar(255) DEFAULT NULL,
  `venue_image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `venue_descriptions` text DEFAULT NULL,
  `venue_price` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venue_id`, `supplier_id`, `venue_name`, `venue_image`, `status`, `venue_descriptions`, `venue_price`, `created_at`) VALUES
(10, 1, 'Function hall 1', 'official-disney-princesses.jpg', 'Available', 'qwertyuiopojhgfdxcvbg', 50000, '2024-11-09 12:37:26'),
(11, 12, 'function hall', 'function2.jpg', 'Available', '', 500, '2025-02-01 16:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `wedding_form`
--

CREATE TABLE `wedding_form` (
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `primary_contact_person` varchar(255) NOT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `bride_name` varchar(255) NOT NULL,
  `brides_mother_name` varchar(255) DEFAULT NULL,
  `brides_father_name` varchar(255) DEFAULT NULL,
  `groom_name` varchar(255) NOT NULL,
  `groom_mother_name` varchar(255) DEFAULT NULL,
  `groom_father_name` varchar(255) DEFAULT NULL,
  `wedding_date` date NOT NULL,
  `ceremony_start` time NOT NULL,
  `reception_start` time NOT NULL,
  `ceremony_name` varchar(255) DEFAULT NULL,
  `ceremony_location` text DEFAULT NULL,
  `reception_name` varchar(255) DEFAULT NULL,
  `reception_location` text DEFAULT NULL,
  `maid_honor_name` varchar(255) DEFAULT NULL,
  `best_man_name` varchar(255) DEFAULT NULL,
  `brides_maid_1` varchar(255) DEFAULT NULL,
  `brides_maid_2` varchar(255) DEFAULT NULL,
  `brides_maid_3` varchar(255) DEFAULT NULL,
  `brides_maid_4` varchar(255) DEFAULT NULL,
  `brides_maid_5` varchar(255) DEFAULT NULL,
  `brides_maid_6` varchar(255) DEFAULT NULL,
  `brides_maid_7` varchar(255) DEFAULT NULL,
  `brides_maid_8` varchar(255) DEFAULT NULL,
  `grooms_men_1` varchar(255) DEFAULT NULL,
  `grooms_men_2` varchar(255) DEFAULT NULL,
  `grooms_men_3` varchar(255) DEFAULT NULL,
  `grooms_men_4` varchar(255) DEFAULT NULL,
  `grooms_men_5` varchar(255) DEFAULT NULL,
  `grooms_men_6` varchar(255) DEFAULT NULL,
  `grooms_men_7` varchar(255) NOT NULL,
  `grooms_men_8` varchar(255) DEFAULT NULL,
  `caterer` varchar(255) DEFAULT NULL,
  `caterer_contact` varchar(255) DEFAULT NULL,
  `photo_video` varchar(255) DEFAULT NULL,
  `photo_video_contact` varchar(255) DEFAULT NULL,
  `event_id` int(11) NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `organizer_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wedding_form`
--

INSERT INTO `wedding_form` (`id`, `package_id`, `primary_contact_person`, `contact_person`, `email`, `address`, `bride_name`, `brides_mother_name`, `brides_father_name`, `groom_name`, `groom_mother_name`, `groom_father_name`, `wedding_date`, `ceremony_start`, `reception_start`, `ceremony_name`, `ceremony_location`, `reception_name`, `reception_location`, `maid_honor_name`, `best_man_name`, `brides_maid_1`, `brides_maid_2`, `brides_maid_3`, `brides_maid_4`, `brides_maid_5`, `brides_maid_6`, `brides_maid_7`, `brides_maid_8`, `grooms_men_1`, `grooms_men_2`, `grooms_men_3`, `grooms_men_4`, `grooms_men_5`, `grooms_men_6`, `grooms_men_7`, `grooms_men_8`, `caterer`, `caterer_contact`, `photo_video`, `photo_video_contact`, `event_id`, `event_type`, `organizer_id`, `created_at`) VALUES
(1, 0, 'kate', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'wdqfv', 'savf', 'sdv', 'wdcfv', 'hfgjkl', 'erhdx', '0000-00-00', '00:34:00', '12:34:00', '1', 'waefa', '1', 'FWEF', 'ASDFGHJK', 'JHGFDS', 'ASDFGH', 'DFGHJ', 'LK,JMHNGFD', 'SDFGH', 'JHNGBFV', 'JKHGF', 'cgfyj', 'drt', 'dstg', 'dth', 'fth', 'srh', 'sth', 'rtdh', '', 'sth', '1', '2323344545', 'SAGA', '2147483647', 0, '', 0, '2024-11-19 03:46:52'),
(2, 0, 'kate', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Yvonne', 'mama', 'papa', 'earl', 'mama', 'papa', '2024-11-24', '12:39:00', '00:39:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'qqqq', 'wwww', 'rrr', 'ttt', 'aa', 'dd', 'ff', 'gg', 'grr', 'eee', 'sdf', 'sdfv', 'dfv', 'qwer', 'qwer', 'we', '', 'qwer', 'SAGA', '2147483647', 'SAGA', '2147483647', 13, '5', 2, '2024-11-19 04:40:15'),
(3, 0, 'kate', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Yvonne', 'mama', 'papa', 'earl', 'mama', 'papa', '2024-11-26', '12:41:00', '00:41:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'qqqq', 'wwww', 'rrr', 'qw', 'aa', 'dd', 'ff', 'gg', 'grr', 'eee', 'sdf', 'sdfv', 'dfv', 'qwer', 'qwer', 'we', '', 'qwer', 'SAGA', '2147483647', 'SAGA', '2147483647', 13, '5', 2, '2024-11-19 04:42:06'),
(4, 0, 'kate', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Yvonne', 'mama', 'papa', 'earl', 'mama', 'papa', '2024-11-26', '12:41:00', '00:41:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'qqqq', 'wwww', 'rrr', 'qw', 'aa', 'dd', 'ff', 'gg', 'grr', 'eee', 'sdf', 'sdfv', 'dfv', 'qwer', 'qwer', 'we', '', 'qwer', 'SAGA', '2147483647', 'SAGA', '2147483647', 13, '5', 2, '2024-11-19 04:42:37'),
(5, 0, 'kate', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Yvonne', 'mama', 'papa', 'earl', 'mama', 'papa', '2024-11-26', '12:41:00', '00:41:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'qqqq', 'wwww', 'rrr', 'qw', 'aa', 'dd', 'ff', 'gg', 'grr', 'eee', 'sdf', 'sdfv', 'dfv', 'qwer', 'qwer', 'we', '', 'qwer', 'SAGA', '2147483647', 'SAGA', '2147483647', 13, '5', 2, '2024-11-19 04:44:57'),
(6, 0, 'kate', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Yvonne', 'mama', 'papa', 'earl', 'mama', 'papa', '2024-11-26', '12:41:00', '00:41:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'qqqq', 'wwww', 'rrr', 'qw', 'aa', 'dd', 'ff', 'gg', 'grr', 'eee', 'sdf', 'sdfv', 'dfv', 'qwer', 'qwer', 'we', '', 'qwer', 'SAGA', '2147483647', 'SAGA', '2147483647', 13, '5', 2, '2024-11-19 04:45:09'),
(7, 0, 'kate', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Yvonne', 'mama', 'papa', 'earl', 'mama', 'papa', '2024-11-26', '12:41:00', '00:41:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'qqqq', 'wwww', 'rrr', 'qw', 'aa', 'dd', 'ff', 'gg', 'grr', 'eee', 'sdf', 'sdfv', 'dfv', 'qwer', 'qwer', 'we', '', 'qwer', 'SAGA', '2147483647', 'SAGA', '2147483647', 13, '5', 2, '2024-11-19 04:46:35'),
(8, 0, 'kate', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Yvonne', 'mama', 'papa', 'earl', 'mama', 'papa', '2024-11-26', '12:48:00', '00:48:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'qqqq', 'wwww', 'rrr', 'qw', 'aa', 'dd', 'ff', 'gg', 'grr', 'eee', 'sdf', 'sdfv', 'dfv', 'qwer', 'qwer', 'we', '', 'qwer', 'SAGA', '2147483647', 'SAGA', '2147483647', 13, '5', 2, '2024-11-19 04:48:51'),
(9, 0, 'kate', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Yvonne', 'mama', 'papa', 'earl', 'mama', 'papa', '2024-11-26', '13:29:00', '01:29:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'qqqq', 'wwww', 'rrr', 'qw', 'aa', 'dd', 'ff', 'gg', 'grr', 'eee', 'sdf', 'sdfv', 'dfv', 'qwer', 'qwer', 'we', '', 'qwer', 'SAGA', '2147483647', 'SAGA', '2147483647', 13, '5', 2, '2024-11-19 05:30:22'),
(10, 0, 'kate', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Yvonne', 'mama', 'papa', 'earl', 'mama', 'papa', '2024-11-26', '13:29:00', '01:29:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'qqqq', 'wwww', 'rrr', 'qw', 'aa', 'dd', 'ff', 'gg', 'grr', 'eee', 'sdf', 'sdfv', 'dfv', 'qwer', 'qwer', 'we', '', 'qwer', 'SAGA', '2147483647', 'SAGA', '2147483647', 13, '5', 2, '2024-11-19 05:31:37'),
(11, 0, 'kate', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Yvonne', 'mama', 'papa', 'earl', 'mama', 'papa', '2024-11-26', '13:29:00', '01:29:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'qqqq', 'wwww', 'rrr', 'qw', 'aa', 'dd', 'ff', 'gg', 'grr', 'eee', 'sdf', 'sdfv', 'dfv', 'qwer', 'qwer', 'we', '', 'qwer', 'SAGA', '2147483647', 'SAGA', '2147483647', 13, '5', 2, '2024-11-19 05:33:38'),
(12, 0, 'kate', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Yvonne', 'mama', 'papa', 'earl', 'mama', 'papa', '2024-11-26', '13:29:00', '01:29:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'qqqq', 'wwww', 'rrr', 'qw', 'aa', 'dd', 'ff', 'gg', 'grr', 'eee', 'sdf', 'sdfv', 'dfv', 'qwer', 'qwer', 'we', '', 'qwer', 'SAGA', '2147483647', 'SAGA', '2147483647', 13, '5', 2, '2024-11-19 05:35:02'),
(13, 0, 'kate', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Yvonne', 'mama', 'papa', 'earl', 'mama', 'papa', '2024-11-26', '13:35:00', '01:35:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'qqqq', 'wwww', 'rrr', 'qw', 'aa', 'dd', 'ff', 'gg', 'grr', 'eee', 'sdf', 'sdfv', 'dfv', 'qwer', 'qwer', 'we', '', 'qwer', 'SAGA', '2147483647', 'SAGA', '2147483647', 13, '5', 2, '2024-11-19 05:35:40'),
(14, 0, 'kate', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Yvonne', 'mama', 'papa', 'earl', 'mama', 'papa', '2024-11-26', '13:35:00', '01:35:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'qqqq', 'wwww', 'rrr', 'qw', 'aa', 'dd', 'ff', 'gg', 'grr', 'eee', 'sdf', 'sdfv', 'dfv', 'qwer', 'qwer', 'we', '', 'qwer', 'SAGA', '2147483647', 'SAGA', '2147483647', 13, '5', 2, '2024-11-19 05:36:26'),
(15, 0, 'kate', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Yvonne', 'mama', 'papa', 'earl', 'mama', 'papa', '2024-11-21', '12:29:00', '00:29:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'qqqq', 'wwww', 'rrr', 'qw', 'aa', 'dd', 'ff', 'gg', 'grr', 'eee', 'sdf', 'sdfv', 'dfv', 'qwer', 'qwer', 'we', '', 'qwer', 'SAGA', '2147483647', 'SAGA', '2147483647', 13, '5', 2, '2024-11-21 04:29:55'),
(16, 0, 'kate', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Juluis Walter', 'Juluis Walter', 'Juluis Walter', 'Juluis Walter', 'Juluis Walter', 'Juluis Walter', '2024-11-30', '00:38:00', '12:38:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'Juluis Walter', 'Juluis Walter', 'Juluis Walter', 'Juluis Walter', 'Juluis Walter', 'Juluis Walter', 'Juluis Walter', 'Juluis Walter', 'Juluis Walter', 'Juluis Walter', 'Juluis Walter', 'Juluis Walter', 'Juluis Walter', 'Juluis Walter', 'Juluis Walter', 'Juluis Walter', '', 'Juluis Walter', 'SAGA', '2147483647', 'SAGA', '2147483647', 13, '5', 2, '2024-11-23 16:39:09'),
(17, 0, 'kate', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'Yvonne Polinar Fabillar', 'Yvonne Polinar Fabillar', 'Yvonne Polinar Fabillar', 'Yvonne Polinar Fabillar', 'Yvonne Polinar Fabillar', 'Yvonne Polinar Fabillar', '2025-01-12', '02:38:00', '14:38:00', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'SAGA', 'Concepcion, Alicia, Zamboanga Sibugay', 'syring gale', 'syring gale', 'syring gale', 'syring gale', 'syring gale', 'syring gale', 'syring gale', 'syring gale', 'syring gale', 'haha yah fda', 'haha yah fda', 'haha yah fda', 'haha yah fda', 'haha yah fda', 'haha yah fda', 'haha yah fda', 'haha yah fda', 'haha yah fda', NULL, NULL, NULL, NULL, 15, '5', 2, '2024-12-12 02:39:25'),
(18, 0, 'kate', '2147483647', 'vodatankquiros@gmail.com', 'diplahan z.s', 'haha yah fda', 'haha yah fda', 'haha yah fda', 'haha yah fda', 'haha yah fda', 'haha yah fda', '0000-00-00', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, 'haha yah fda', 'haha yah fda', 'haha yah fda', 'syring gale', 'syring gale', 'syring gale', 'syring gale', 'syring gale', 'syring gale', 'syring gale', 'syring gale', 'syring gale', 'syring gale', 'syring gale', 'syring gale', 'syring gale', 'syring gale', 'syring gale', NULL, NULL, NULL, NULL, 13, '5', 2, '2024-12-12 03:36:08'),
(19, 0, 'kate', '2147483647', 'vodatankquiros2@gmail.com', 'diplahan z.s', 'Miya S. Alucard', 'Miya S. Alucard', 'Miya S. Alucard', 'Miya S. Alucard', 'Miya S. Alucard', 'Miya S. Alucard', '0000-00-00', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, 'Miya S. Alucard', 'Miya S. Alucard', 'Miya S. Alucard', 'csdfs', 'fssvs', 'afafafa', 'fafaf', 'fafafaf', 'fafzs', 'svbdfb', 'sgvs', 'gvsgvsg', 'vsgvsgv', 'nftyjftjftyj', 'zbdxfbv', 'fjftyjftyjtf', 'drh', 'rhdrh', NULL, NULL, NULL, NULL, 42, '5', 2, '2025-01-30 07:41:57'),
(20, 15, 'kate', '2147483647', 'vodatankquiros2@gmail.com', 'diplahan z.s', 'Miya S. Alucard', 'Miya S. Alucard', 'Miya S. Alucard', 'Miya S. Alucard', 'Miya S. Alucard', 'Miya S. Alucard', '0000-00-00', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, 'Miya S. Alucard', 'Miya S. Alucard', 'Miya S. Alucard', 'cddd', 'dd', 'd', 'd', 'd', 'd', 'v', 'q', 'q', 'q', 'dd', 'd', 'q', 'd', 'd', NULL, NULL, NULL, NULL, 43, '5', 2, '2025-01-30 07:43:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birthday_client_form`
--
ALTER TABLE `birthday_client_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `christening_form`
--
ALTER TABLE `christening_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_customized_event`
--
ALTER TABLE `client_customized_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_event_selected_products`
--
ALTER TABLE `client_event_selected_products`
  ADD PRIMARY KEY (`client_poducts_id`);

--
-- Indexes for table `client_request_form`
--
ALTER TABLE `client_request_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `decors`
--
ALTER TABLE `decors`
  ADD PRIMARY KEY (`decor_id`);

--
-- Indexes for table `dresses`
--
ALTER TABLE `dresses`
  ADD PRIMARY KEY (`dress_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `events_photos`
--
ALTER TABLE `events_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_calendar`
--
ALTER TABLE `event_calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_products`
--
ALTER TABLE `event_products`
  ADD PRIMARY KEY (`event_product_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`event_type_id`);

--
-- Indexes for table `organizer_done_event`
--
ALTER TABLE `organizer_done_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizer_products`
--
ALTER TABLE `organizer_products`
  ADD PRIMARY KEY (`orga_products_id`);

--
-- Indexes for table `organizer_request`
--
ALTER TABLE `organizer_request`
  ADD PRIMARY KEY (`orga_request_id`);

--
-- Indexes for table `package_catering`
--
ALTER TABLE `package_catering`
  ADD PRIMARY KEY (`package_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `package_decor`
--
ALTER TABLE `package_decor`
  ADD PRIMARY KEY (`package_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `package_dress`
--
ALTER TABLE `package_dress`
  ADD PRIMARY KEY (`package_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `package_products_1`
--
ALTER TABLE `package_products_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo_video`
--
ALTER TABLE `photo_video`
  ADD PRIMARY KEY (`photo_video_id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `supplier_feedback_pics`
--
ALTER TABLE `supplier_feedback_pics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_plan`
--
ALTER TABLE `user_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venue_id`);

--
-- Indexes for table `wedding_form`
--
ALTER TABLE `wedding_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `birthday_client_form`
--
ALTER TABLE `birthday_client_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `christening_form`
--
ALTER TABLE `christening_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `client_customized_event`
--
ALTER TABLE `client_customized_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `client_event_selected_products`
--
ALTER TABLE `client_event_selected_products`
  MODIFY `client_poducts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `client_request_form`
--
ALTER TABLE `client_request_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `decors`
--
ALTER TABLE `decors`
  MODIFY `decor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dresses`
--
ALTER TABLE `dresses`
  MODIFY `dress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `events_photos`
--
ALTER TABLE `events_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `event_calendar`
--
ALTER TABLE `event_calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_products`
--
ALTER TABLE `event_products`
  MODIFY `event_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `event_types`
--
ALTER TABLE `event_types`
  MODIFY `event_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `organizer_done_event`
--
ALTER TABLE `organizer_done_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `organizer_products`
--
ALTER TABLE `organizer_products`
  MODIFY `orga_products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `organizer_request`
--
ALTER TABLE `organizer_request`
  MODIFY `orga_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `package_catering`
--
ALTER TABLE `package_catering`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `package_decor`
--
ALTER TABLE `package_decor`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `package_dress`
--
ALTER TABLE `package_dress`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `package_products_1`
--
ALTER TABLE `package_products_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `photo_video`
--
ALTER TABLE `photo_video`
  MODIFY `photo_video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `supplier_feedback_pics`
--
ALTER TABLE `supplier_feedback_pics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_plan`
--
ALTER TABLE `user_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wedding_form`
--
ALTER TABLE `wedding_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_products`
--
ALTER TABLE `event_products`
  ADD CONSTRAINT `event_products_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `organizer_products` (`orga_products_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
