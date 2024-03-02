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
-- Table structure for table `crm_tasks`
--

CREATE TABLE `crm_tasks` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `task_type` varchar(255) NOT NULL,
  `task_description` text NOT NULL,
  `task_due_date` varchar(255) NOT NULL,
  `task_status` enum('Pending','Completed') NOT NULL,
  `task_update` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `sales_rep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crm_tasks`
--

INSERT INTO `crm_tasks` (`id`, `created`, `task_type`, `task_description`, `task_due_date`, `task_status`, `task_update`, `contact`, `sales_rep`) VALUES
(1, '2020-11-08 00:00:00', 'task', 'Lunch meeting', '2020-11-12', 'Pending', '', 1, 1),
(2, '0000-00-00 00:00:00', '', 'phone calls', '2020-11-06', 'Pending', '', 2, 3),
(3, '0000-00-00 00:00:00', '', 'Follow up email', '2020-11-05', 'Pending', '', 1, 1),
(5, '2024-03-01 01:31:52', '', 'new task 1', '', 'Pending', '', 1, 1),
(6, '2024-03-01 10:42:57', '', 'fcghctguj', '2024-03-01', 'Completed', '', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crm_tasks`
--
ALTER TABLE `crm_tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crm_tasks`
--
ALTER TABLE `crm_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
