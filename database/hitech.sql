-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Mar 2021 pada 10.42
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', '$2y$10$qszQk1BTfRi0mS/Refc8Xup18Bo6Toq.t9lQ81008VN6T2NqHhKze', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hf`
--

CREATE TABLE `hf` (
  `id` int(255) NOT NULL,
  `tim` text NOT NULL,
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
  `logo` text NOT NULL,
  `suara` int(255) NOT NULL,
  `bayar` int(2) NOT NULL,
  `verif_code` text NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ot`
--

CREATE TABLE `ot` (
  `id` int(255) NOT NULL,
  `kategori` text NOT NULL,
  `nama` text NOT NULL,
  `kampus` text DEFAULT NULL,
  `nim` text DEFAULT NULL,
  `wa` text NOT NULL,
  `email` text NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sf`
--

CREATE TABLE `sf` (
  `id` int(255) NOT NULL,
  `tim` text NOT NULL,
  `category` text NOT NULL,
  `nama_app` text NOT NULL,
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
  `logo` text DEFAULT NULL,
  `suara` int(255) NOT NULL,
  `bayar` int(2) NOT NULL,
  `verif_code` text NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `visitor`
--

CREATE TABLE `visitor` (
  `id` int(255) NOT NULL,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `vote` int(2) NOT NULL DEFAULT 0,
  `verif_code` varchar(255) NOT NULL,
  `registered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `vote`
--

CREATE TABLE `vote` (
  `id` int(255) NOT NULL,
  `dev` text NOT NULL,
  `id_dev` int(255) NOT NULL,
  `email_visitor` text NOT NULL,
  `kesan` text NOT NULL,
  `pesan` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hf`
--
ALTER TABLE `hf`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ot`
--
ALTER TABLE `ot`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sf`
--
ALTER TABLE `sf`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `hf`
--
ALTER TABLE `hf`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ot`
--
ALTER TABLE `ot`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sf`
--
ALTER TABLE `sf`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
