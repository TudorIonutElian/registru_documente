-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2020 at 06:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registru_documente`
--

-- --------------------------------------------------------

--
-- Table structure for table `rd_utilizatori`
--

CREATE TABLE `rd_utilizatori` (
  `id` int(11) NOT NULL,
  `user` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `parola` varchar(15) NOT NULL,
  `rol` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rd_utilizatori`
--

INSERT INTO `rd_utilizatori` (`id`, `user`, `email`, `parola`, `rol`) VALUES
(1, 'TudorIonutElian', 'ionuteliantudor@gmail.com', 'alexandra2324', 1),
(2, 'PopescuIon', 'popescu.ion@gmail.com', '1234', 2),
(3, 'AndreiMihai', 'andrei.mihai@igpf.net', 'parola1234', 2),
(4, 'MihaiValeriu', 'mihai.valeriu@gps.net', '1234', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rd_utilizatori`
--
ALTER TABLE `rd_utilizatori`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rd_utilizatori`
--
ALTER TABLE `rd_utilizatori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
