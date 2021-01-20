-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 05:39 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kehadiran`
--

CREATE TABLE `data_kehadiran` (
  `id_hdr` int(11) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `n_peg` varchar(225) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `n_jab` varchar(50) NOT NULL,
  `hadir` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `alpha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kehadiran`
--

INSERT INTO `data_kehadiran` (`id_hdr`, `bulan`, `nik`, `n_peg`, `jk`, `n_jab`, `hadir`, `sakit`, `alpha`) VALUES
(2, '022020', '123456789', 'Yola Yosanta', 'Perempuan', 'Admin', 25, 4, 2),
(3, '032020', '987654321', 'M Holidin', 'Laki-laki', 'Staff Markrting', 25, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `ket` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `ket`, `hak_akses`) VALUES
(1, 'admin', 1),
(2, 'pegawai', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jab` int(11) NOT NULL,
  `n_jab` varchar(100) NOT NULL,
  `gaji_pokok` varchar(50) NOT NULL,
  `transport` varchar(50) NOT NULL,
  `uang_makan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jab`, `n_jab`, `gaji_pokok`, `transport`, `uang_makan`) VALUES
(1, 'Staff Marketing', '4000000', '200000', '60000'),
(8, 'Admin', '3000000', '100000', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_peg` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `n_peg` varchar(225) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `n_jab` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_peg`, `nik`, `n_peg`, `username`, `password`, `jk`, `n_jab`, `tgl_masuk`, `status`, `foto`, `hak_akses`) VALUES
(1, '123456789', 'Yola Yosanta', 'yola', '81dc9bdb52d04dc20036dbd8313ed055', 'Perempuan', 'Admin', '2020-02-11', 'Pegawai Tetap', 'yola1.jpg', 1),
(2, '987654321', 'M Holidin', 'holid', '827ccb0eea8a706c4c34a16891f84e7b', 'Laki-laki', 'Staff Marketing', '2020-03-07', 'Pegawai Tetap', 'default1.jpg', 2),
(3, '4567894321', 'Vira', 'vira', '3473c09a967dfbb09bc709a7137f1775', 'Perempuan', 'Staff Marketing', '2021-01-07', 'Pegawai Tetap', 'whatsapp2.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pot_gaji`
--

CREATE TABLE `pot_gaji` (
  `id` int(11) NOT NULL,
  `potongan` varchar(120) NOT NULL,
  `jml_pot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pot_gaji`
--

INSERT INTO `pot_gaji` (`id`, `potongan`, `jml_pot`) VALUES
(1, 'Alpha', 70000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  ADD PRIMARY KEY (`id_hdr`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jab`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_peg`);

--
-- Indexes for table `pot_gaji`
--
ALTER TABLE `pot_gaji`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kehadiran`
--
ALTER TABLE `data_kehadiran`
  MODIFY `id_hdr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_peg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pot_gaji`
--
ALTER TABLE `pot_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
