-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 03:46 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cuti`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` varchar(20) NOT NULL,
  `id_user` varchar(250) NOT NULL,
  `tgl_diajukan` date NOT NULL,
  `mulai` date NOT NULL,
  `berakhir` date NOT NULL,
  `id_status_cuti` int(10) NOT NULL,
  `perihal_cuti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `id_user`, `tgl_diajukan`, `mulai`, `berakhir`, `id_status_cuti`, `perihal_cuti`) VALUES
('cuti-4d796', '5bcecad9a88ac269da0ad4c3642d9667', '2023-06-26', '2023-06-26', '2023-06-29', 3, 'gak bisa masuk'),
('cuti-57f26', '729c720634b547f89810ff920a72948c', '2023-06-13', '2023-06-13', '2023-06-17', 2, 'gak bisa masuk'),
('cuti-f33b3', 'e9d421a449daa02f8167313d6b8be515', '2023-06-27', '2023-06-27', '2023-06-30', 2, 'gak bisa masuk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
