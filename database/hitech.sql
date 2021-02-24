-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 06:06 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hitech`
--

-- --------------------------------------------------------

--
-- Table structure for table `hf`
--

CREATE TABLE `hf` (
  `id` int(255) NOT NULL,
  `judul_alat` text NOT NULL,
  `nama_ketua` text NOT NULL,
  `nim_ketua` text NOT NULL,
  `nama_anggota` text NOT NULL,
  `nim_anggota` text NOT NULL,
  `nama_anggota2` text DEFAULT NULL,
  `nim_anggota2` text DEFAULT NULL,
  `kampus` text NOT NULL,
  `link` text NOT NULL,
  `wa` text NOT NULL,
  `email` text NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ot`
--

CREATE TABLE `ot` (
  `id` int(255) NOT NULL,
  `kategori` text NOT NULL,
  `nama` text NOT NULL,
  `kampus` text NOT NULL,
  `nim` text NOT NULL,
  `wa` text NOT NULL,
  `email` text NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sf`
--

CREATE TABLE `sf` (
  `id` int(255) NOT NULL,
  `kat_app` text NOT NULL,
  `nama_app` text NOT NULL,
  `nama_ketua` text NOT NULL,
  `nim_ketua` text NOT NULL,
  `nama_anggota` text NOT NULL,
  `nim_anggota` text NOT NULL,
  `nama_anggota2` text DEFAULT NULL,
  `nim_anggota2` text DEFAULT NULL,
  `kampus` text NOT NULL,
  `link_gdrive` text NOT NULL,
  `wa` text NOT NULL,
  `email` text NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sf`
--

INSERT INTO `sf` (`id`, `kat_app`, `nama_app`, `nama_ketua`, `nim_ketua`, `nama_anggota`, `nim_anggota`, `nama_anggota2`, `nim_anggota2`, `kampus`, `link_gdrive`, `wa`, `email`, `tgl_daftar`) VALUES
(1, '', 'Asa', 'ADS', '156422', 'ASa', '63', '', '', 'Udinus', '', '08', 'akbar.dwi14@gmail.com', '2021-02-24 03:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(255) NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `fullname`, `email`, `password`, `registered`) VALUES
(1, 'Akbar Syahputra', 'akbar.dwi14@gmail.com', '$2y$10$imbO9wc/jGuyCsSaJczV0edYsP1.bEvic09Ml298vSNHd1lmevqMG', '2021-02-24 04:51:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hf`
--
ALTER TABLE `hf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ot`
--
ALTER TABLE `ot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sf`
--
ALTER TABLE `sf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hf`
--
ALTER TABLE `hf`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ot`
--
ALTER TABLE `ot`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sf`
--
ALTER TABLE `sf`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
