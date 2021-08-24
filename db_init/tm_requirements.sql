-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2019 at 02:35 PM
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
  `priority` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_requirements`
--

INSERT INTO `tm_requirements` (`id`, `name`, `description`, `type`, `requirement_goal`, `scope_of_work`, `status`, `project_id`, `created_by`, `flag`, `created_at`, `updated_at`, `start_date`, `end_date`, `deleted_at`, `complexity`, `priority`) VALUES
(1, '0', '', 'sdfasdf', '<p>fdsdfsadf</p>\r\n', 1, 1, 1, 20, 0, '2019-12-30 17:51:19', '2019-12-30 15:23:33', '2019-12-30', '2020-01-01', NULL, NULL, NULL),
(2, 'asdf', '', 'sdfasdf', '<p>w</p>\r\n', 1, 1, 1, 20, 0, '2019-12-30 17:51:05', '2019-12-30 15:24:26', '2019-12-30', '2019-12-30', NULL, NULL, NULL),
(3, '111', '', '1', '<p><a id=\"sa\" name=\"sa\"></a>requirement_goal</p>\r\n', 0, 0, 4, 20, 0, '2019-12-30 15:37:53', '2019-12-30 15:37:53', '2019-12-30', '2019-12-30', NULL, NULL, NULL),
(4, 'asdf', '', 'sdfasdf', '<p>xzczxc fdsadf sadf sd</p>\r\n', 1, 0, 2, 20, 1, '2019-12-30 17:50:38', '2019-12-30 15:40:47', '2019-12-31', '2019-12-31', '2019-12-30 17:52:03', NULL, NULL),
(5, 'asdf', '', 'sdfasdf', '<p>FGGFGGSF</p>\r\n', 0, 1, 2, 20, 0, '2019-12-30 18:43:58', '2019-12-30 18:43:58', '2020-01-01', '2020-01-01', NULL, 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tm_requirements`
--
ALTER TABLE `tm_requirements`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tm_requirements`
--
ALTER TABLE `tm_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
