-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2019 at 05:44 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smp_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `id` int(64) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `nama_klasifikasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`id`, `nomor`, `nama_klasifikasi`) VALUES
(1, '0 - 99', 'Informasi Umum'),
(2, '100 -  199', 'Filsafat Psikologi'),
(3, '200 - 299', 'Agama'),
(4, '300 - 399', 'Ilmu Sosial & Keluarga'),
(5, '400 - 499', 'Bahasa'),
(6, '500 - 599', 'Ilmu Alam & Matematika'),
(7, '600 - 699', 'Teknologi'),
(8, '700 - 799', 'Seni'),
(9, '800 - 899', 'Sastra'),
(10, '900 - dsb', 'Geografi & Sejarah'),
(11, '2XX', 'Agama Islam'),
(12, '2X1', 'Al-Qur\'an'),
(13, '2X2', 'Hadis yang Berkaitan'),
(14, '2X3', 'Aqaid & Ilmu Kalam'),
(15, '2X4', 'Fiqih'),
(16, '2X5', 'Akhlak & Tasawuf'),
(17, '2X6', 'Sosial & Budaya Islam'),
(18, '2X7', 'Filsafat Islam & Perkembangan'),
(19, '2X8', 'Aliran & Sekte Islam'),
(20, '2X9', 'Sejarah & Biografi Islam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
