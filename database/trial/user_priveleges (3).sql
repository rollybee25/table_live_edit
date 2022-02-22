-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2022 at 09:59 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_priveleges`
--

CREATE TABLE `user_priveleges` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `summary` varchar(5) NOT NULL DEFAULT 'Yes',
  `view_list` varchar(5) NOT NULL DEFAULT 'Yes',
  `edit_list` varchar(5) NOT NULL DEFAULT 'Yes',
  `copy_list` varchar(5) NOT NULL DEFAULT 'Yes',
  `track_list` varchar(5) NOT NULL DEFAULT 'Yes',
  `cancel_list` varchar(5) NOT NULL DEFAULT 'No',
  `calendar` varchar(5) NOT NULL DEFAULT 'Yes',
  `download` varchar(5) NOT NULL DEFAULT 'Yes',
  `kpi_jobs` varchar(5) NOT NULL DEFAULT 'Yes',
  `kpi_inspector` varchar(5) NOT NULL DEFAULT 'Yes',
  `kpi_report` varchar(5) NOT NULL DEFAULT 'Yes',
  `kpi_report_team` varchar(5) NOT NULL DEFAULT 'Yes',
  `kpi_booking` varchar(5) NOT NULL DEFAULT 'No',
  `new_project` varchar(5) NOT NULL DEFAULT 'Yes',
  `project_template` varchar(5) NOT NULL DEFAULT 'No',
  `client_new` varchar(5) NOT NULL DEFAULT 'Yes',
  `client_viewedit` varchar(5) NOT NULL DEFAULT 'Yes',
  `client_tic` varchar(5) NOT NULL DEFAULT 'Yes',
  `client_ticsera` varchar(5) NOT NULL DEFAULT 'Yes',
  `factory` varchar(5) NOT NULL DEFAULT 'Yes',
  `supplier` varchar(5) NOT NULL DEFAULT 'Yes',
  `user` varchar(5) NOT NULL DEFAULT 'No',
  `inspector` varchar(5) NOT NULL DEFAULT 'Yes',
  `sales` varchar(5) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_priveleges`
--

INSERT INTO `user_priveleges` (`id`, `user_id`, `summary`, `view_list`, `edit_list`, `copy_list`, `track_list`, `cancel_list`, `calendar`, `download`, `kpi_jobs`, `kpi_inspector`, `kpi_report`, `kpi_report_team`, `kpi_booking`, `new_project`, `project_template`, `client_new`, `client_viewedit`, `client_tic`, `client_ticsera`, `factory`, `supplier`, `user`, `inspector`, `sales`) VALUES
(1, 2, 'true', 'true', 'true', 'true', 'true', 'false', 'true', 'true', 'true', 'true', 'true', 'true', 'false', 'true', 'false', 'true', 'true', 'true', 'true', 'true', 'true', 'false', 'true', 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_priveleges`
--
ALTER TABLE `user_priveleges`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_priveleges`
--
ALTER TABLE `user_priveleges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
