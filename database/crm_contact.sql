-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 04:21 AM
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
-- Database: `quadcrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `crm_contact`
--

CREATE TABLE `crm_contact` (
  `id` int(11) NOT NULL,
  `contact_title` varchar(255) NOT NULL,
  `contact_first` varchar(255) NOT NULL,
  `contact_middle` varchar(255) NOT NULL,
  `contact_last` varchar(255) NOT NULL,
  `initial_contact_date` datetime NOT NULL DEFAULT current_timestamp(),
  `title` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` enum('Order','Quote') NOT NULL,
  `website` enum('Not Ordered','Waiting for Pick Up','Arrived at Warehouse','Shipped','Delivered') NOT NULL,
  `sales_rep` int(11) NOT NULL,
  `project_type` varchar(255) NOT NULL,
  `project_description` text NOT NULL,
  `proposal_due_date` varchar(255) NOT NULL,
  `budget` int(11) NOT NULL,
  `deliverables` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crm_contact`
--

INSERT INTO `crm_contact` (`id`, `contact_title`, `contact_first`, `contact_middle`, `contact_last`, `initial_contact_date`, `title`, `company`, `industry`, `address`, `city`, `state`, `country`, `zip`, `phone`, `email`, `status`, `website`, `sales_rep`, `project_type`, `project_description`, `proposal_due_date`, `budget`, `deliverables`) VALUES
(15, '', 'Nathan', '', 'Drake', '2024-03-02 02:14:29', '', 'Art-i-Fact', 'Art', '', '', '', '', 0, 2147483647, 'natha@smail.com', 'Order', 'Waiting for Pick Up', 1, '', '', '', 0, ''),
(16, '', 'Lucy', '', 'Adams', '2024-03-02 02:15:20', '', 'Fash-Ion', 'Clothes', '', '', '', '', 0, 2147483647, 'adams@fash.com', 'Quote', 'Not Ordered', 1, '', '', '', 30000, ''),
(17, '', 'Liam', '', 'Lukeman', '2024-03-02 02:16:35', '', 'Mine-Core', 'Mining', '', '', '', '', 0, 45343434, 'lukeman@minecore.com', 'Quote', 'Not Ordered', 1, '', '', '', 250000, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crm_contact`
--
ALTER TABLE `crm_contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crm_contact`
--
ALTER TABLE `crm_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
