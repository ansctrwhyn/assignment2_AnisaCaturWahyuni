-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 24, 2024 at 01:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_karyawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_gaji`
--

CREATE TABLE `data_gaji` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nominal_gaji` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_gaji`
--

INSERT INTO `data_gaji` (`id`, `id_karyawan`, `nominal_gaji`, `keterangan`) VALUES
(1, 1, 10000000, 'Test SQL'),
(2, 2, 12000000, 'Test SQL2'),
(4, 4, 15000000, 'Test SQL3');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nip` varchar(12) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('pria','wanita') DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `telpon` varchar(12) DEFAULT NULL,
  `agama` varchar(15) DEFAULT NULL,
  `status_nikah` enum('belum menikah','menikah') DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nip`, `nik`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `telpon`, `agama`, `status_nikah`, `alamat`) VALUES
(1, '00361953', '3323084304990002', 'Anisa Catur Wahyuni', 'wanita', 'Bandar Lampung', '1999-04-03', '081234567890', 'Islam', 'belum menikah', 'Kebayoran Baru'),
(4, '00233453', '3354662734550001', 'Reza Fahlevi', 'pria', 'Bandung', '2000-01-01', '081234567893', 'Islam', 'menikah', 'Pondok Labu');

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` varchar(100) DEFAULT NULL,
  `availability` enum('Full Time','Part Time','Internship') DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `lokasi` text DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id`, `name`, `role`, `availability`, `age`, `lokasi`, `experience`, `email`) VALUES
(1, 'Anisa', 'Back End', 'Part Time', 23, 'Bandung', 3, 'ansctrwhyn@gmail.com'),
(2, 'Kharis', 'Front End', 'Internship', 20, 'Jakarta', 2, 'milleepark94@gmail.com'),
(3, 'Kharis Lagi', 'Front End', 'Internship', 20, 'Jakarta', 2, 'milleepark94@gmail.com'),
(5, 'Anisa', 'Back End', 'Full Time', 34, 'Bandung', 4, 'milleepark94@gmail.com'),
(6, 'Anisa', 'Back End', 'Internship', 34, 'Bandung', 5, 'anisa.wahyuni@gmail.com'),
(7, 'Anisa', 'Back End', 'Internship', 34, 'Bandung', 5, 'anisa.wahyuni@gmail.com'),
(8, 'Anisa', 'Back End', 'Internship', 34, 'Bandung', 5, 'anisa.wahyuni@gmail.com'),
(9, 'Anisa', 'Back End', 'Part Time', 23, 'Bandung', 4, 'ansctrwhyn@gmail.com'),
(10, 'Anisa', 'Back End', 'Part Time', 23, 'Bandung', 4, 'ansctrwhyn@gmail.com'),
(11, 'Anisa', 'Back End', 'Part Time', 23, 'Bandung', 4, 'ansctrwhyn@gmail.com'),
(12, 'Kharis', 'Back End', 'Part Time', 34, 'Jakarta', 5, 'anisa.wahyuni@gmail.com'),
(13, 'Kharisma Fitri', 'Front End', 'Internship', 24, 'Bandung', 4, 'milleepark94@gmail.com'),
(14, 'Kharis', 'Back End', 'Full Time', 29, 'Bandung', 3, 'ansctrwhyn@gmail.com'),
(15, 'Anisa', 'Back End', 'Part Time', 23, 'Bandung', 4, 'ansctrwhyn@gmail.com'),
(16, 'Kharis', 'Front End', 'Full Time', 23, 'Bandung', 2, 'test@gmail.com'),
(17, 'Kharis', 'Front End', 'Full Time', 23, 'Bandung', 2, 'test@gmail.com'),
(18, 'Kharis', 'Back End', 'Part Time', 23, 'Bandung', 4, 'anisa.wahyuni@ms.mii.co.id'),
(19, 'Anisa', 'Front End', 'Full Time', 23, 'Bandung', 2, 'test@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_gaji`
--
ALTER TABLE `data_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_gaji`
--
ALTER TABLE `data_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
