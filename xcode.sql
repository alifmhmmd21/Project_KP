-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2023 pada 09.41
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xcode`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggunavps`
--

CREATE TABLE `penggunavps` (
  `ktp` bigint(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `hp` bigint(12) NOT NULL,
  `subdomain` varchar(100) NOT NULL,
  `domain` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penggunavps`
--

INSERT INTO `penggunavps` (`ktp`, `nama`, `alamat`, `hp`, `subdomain`, `domain`, `id`) VALUES
(337311111, 'raven', 'salatiga', 8151234567, 'subdomainraven', 'domainraven', 22),
(3312345678, 'kakai', 'jakarta', 85751, 'subdomaincek', 'domaincek', 23),
(123123123, 'ceknama', 'cekalamat', 85751123, 'ceksubdomain', 'cekdomain', 24);

-- --------------------------------------------------------

--
-- Struktur dari tabel `visiter`
--

CREATE TABLE `visiter` (
  `id` int(11) NOT NULL,
  `no_ktp` int(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` int(25) NOT NULL,
  `tujuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `visiter`
--

INSERT INTO `visiter` (`id`, `no_ktp`, `nama`, `alamat`, `no_hp`, `tujuan`) VALUES
(17, 2324567, ' tes', 'tesalamat', 2332423, ' tes'),
(19, 2147483647, '    halo', 'halo', 2147483647, 'dasdweaw'),
(23, 213124214, ' Bujel', 'asdafasfasd', 123123123, 'iyaa bang'),
(24, 312312312, ' Faiz', 'sadasdasdqw', 12512, 'dasdasdas adsdasdsa'),
(25, 123123142, ' Raven', 'sdqdwqdq', 31323123, 'dasdwqddqdqw iyalah'),
(26, 41213123, '  Halo', 'dafwefwev', 213412321, 'tujuan kami berkunjung untuk mengikat tali silaturahim');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penggunavps`
--
ALTER TABLE `penggunavps`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `visiter`
--
ALTER TABLE `visiter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_ktp` (`no_ktp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penggunavps`
--
ALTER TABLE `penggunavps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `visiter`
--
ALTER TABLE `visiter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
