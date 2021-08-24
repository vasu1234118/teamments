-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2020 at 03:04 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aaraofwj_tm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tm_requirements`
--

CREATE TABLE `tm_requirements` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `requirement_goal` text DEFAULT NULL,
  `scope_of_work` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `flag` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `complexity` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `uniq_id` varchar(255) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_requirements`
--

INSERT INTO `tm_requirements` (`id`, `name`, `description`, `type`, `requirement_goal`, `scope_of_work`, `status`, `project_id`, `created_by`, `flag`, `created_at`, `updated_at`, `start_date`, `end_date`, `deleted_at`, `complexity`, `priority`, `uniq_id`, `customer_id`, `emp_id`) VALUES
(1, '1', '', '111111111111', '<p>sgf</p>\r\n', 1, 1, 4, 20, 0, '2020-01-03 13:35:05', '2020-01-03 13:35:05', '2020-01-03', '2020-01-03', NULL, 0, 0, 'PJ4REQ0001', 0, 0),
(2, 'edfdef', '', 'wef', '<p>sdfsfdafdsa</p>\r\n', 1, 14, 1, 20, 0, '2020-01-03 13:35:37', '2020-01-03 13:35:37', '2020-01-03', '2020-01-03', NULL, 0, 4, 'PJ1REQ0001', 0, 0),
(3, 'New Task 001', '', 'wef', '<p>adfasd</p>\r\n', 1, 13, 5, 20, 0, '2020-01-03 13:39:36', '2020-01-03 13:39:36', '2020-01-03', '2020-01-03', NULL, 0, 4, 'PJ5REQ0001', 0, 0),
(4, 'New Task 001', '', 'wef', '<p>adfasd</p>\r\n', 1, 13, 5, 20, 0, '2020-01-03 13:40:02', '2020-01-03 13:40:02', '2020-01-03', '2020-01-03', NULL, 0, 4, 'PJ5REQ0002', 0, 0),
(5, '111', '', '111111111111', '<p>dsfsaf</p>\r\n', 1, 11, 3, 20, 0, '2020-01-03 13:40:43', '2020-01-03 13:40:43', '2020-01-03', '2020-01-03', NULL, 3, 3, 'PJ3REQ0001', 0, 0),
(6, '111', '', '111111111111', '<p>dsfsaf</p>\r\n', 1, 11, 3, 20, 0, '2020-01-03 13:40:49', '2020-01-03 13:40:49', '2020-01-03', '2020-01-03', NULL, 3, 3, 'PJ3REQ0002', 0, 0),
(7, 'Milestone 1', '', '1', '', 1, 14, 1, 20, 0, '2020-01-03 19:22:07', '2020-01-03 18:35:00', '2020-01-03', '2020-01-03', NULL, 0, 4, 'PJ1REQ0002', 37, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tm_requirements`
--
ALTER TABLE `tm_requirements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_id` (`uniq_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tm_requirements`
--
ALTER TABLE `tm_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
