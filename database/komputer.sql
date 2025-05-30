-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2024 at 02:06 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `komputer`
--

-- --------------------------------------------------------

--
-- Table structure for table `rekod_makmal`
--

CREATE TABLE `rekod_makmal` (
  `id` int NOT NULL,
  `namamakmal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `picmakmal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `modul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pengajarmodul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rekod_makmal`
--

INSERT INTO `rekod_makmal` (`id`, `namamakmal`, `picmakmal`, `modul`, `pengajarmodul`) VALUES
(1, 'Makmal Aplikasi Mobile', 'Rosnidaini Shudin', 'Database System', 'Rosnidaini Binti Shudin'),
(3, 'Makmal Network', 'Rosnidaini Shudin', 'Web Development', 'Rosnidaini Binti Shudin'),
(7, 'Makmal IOT', 'Rosnidaini Shudin', 'IOT', 'Rozitawati Binti Muhammad'),
(8, 'Makmal IOT', 'Rozitawati Binti Muhammad ', 'IOT', 'Rozitawati Binti Muhammad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rekod_makmal`
--
ALTER TABLE `rekod_makmal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rekod_makmal`
--
ALTER TABLE `rekod_makmal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;