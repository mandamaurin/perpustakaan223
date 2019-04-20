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
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(64) NOT NULL,
  `nomor_induk` varchar(20) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `tahun_masuk` varchar(10) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nomor_induk`, `nama_siswa`, `jk`, `kelas`, `tahun_masuk`, `alamat`) VALUES
(6, '0001', 'Amir', 'L', '8A', '2016', 'ss'),
(7, '0002', 'Amir', 'L', '1B', '2018', 'Kebon Jeruk');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(5) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `isbn` varchar(30) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(30) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `stok` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `id_klasifikasi` varchar(10) NOT NULL,
  `nomor_klasifikasi` varchar(5) NOT NULL,
  `klasifikasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `foto`, `kode`, `isbn`, `judul`, `pengarang`, `penerbit`, `tahun`, `stok`, `id_kategori`, `id_klasifikasi`, `nomor_klasifikasi`, `klasifikasi`) VALUES
(30, 'c2dafd247b4fee5cd7f2a71280907a78.jpg', 'A111', '3214578902', 'Agama Islam', 'Dul', 'Arya Duta', '2015', 60, 6, '11', '2XX', 'Agama Islam'),
(31, 'd7f044ade6b0436c5e81372f59e025b2.jpg', 'A002', '3214578907', 'Belajar Komputer SMP', 'Khristiyono', 'Erlangga', '2016', 300, 5, '7', '620', 'Teknologi'),
(32, '828ffabd202179bdf6766d365375757e.jpg', '1111', '3214578903', 'Belajar Pemrograman', 'Ahmad B.', 'Arya Duta', '2013', 10, 5, '7', '622', 'Teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id_kategori` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`id_kategori`, `nama`) VALUES
(2, 'IPS'),
(3, 'Matematika'),
(4, 'Sejarah'),
(5, 'TIK');

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

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(5) NOT NULL,
  `id_buku` int(5) NOT NULL,
  `nomor_induk` varchar(20) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tgl_pinjam` varchar(30) NOT NULL,
  `batas_pinjam` varchar(30) NOT NULL,
  `tgl_input` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `id_buku`, `nomor_induk`, `jumlah`, `tgl_pinjam`, `batas_pinjam`, `tgl_input`, `status`) VALUES
(1, 30, '0001', 1, '2019-02-09', '2019-02-12', '2019-02-13', 'Belum Dikembalikan'),
(2, 31, '0002', 3, '2019-02-13', '2019-02-16', '2019-02-13', 'Belum Dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id_tahun` int(64) NOT NULL,
  `tahun` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`id_tahun`, `tahun`) VALUES
(1, '2010'),
(2, '2011'),
(3, '2012'),
(4, '2013'),
(5, '2014'),
(6, '2015'),
(7, '2016'),
(8, '2017'),
(9, '2018'),
(10, '2019');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin', 'adminperpus', 'admin'),
(2, 'Amanda', 'manda148', 'manda00148', 'siswa'),
(3, 'Annisa', 'nisa168', 'nisa00168', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id_tahun` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
