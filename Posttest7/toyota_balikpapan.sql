-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Nov 2023 pada 20.06
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
-- Database: `toyota_balikpapan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking_data`
--

CREATE TABLE `booking_data` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `car_type` varchar(255) DEFAULT NULL,
  `car_transmition` varchar(50) DEFAULT NULL,
  `tahun_produksi` int(10) DEFAULT NULL,
  `no_rangka` varchar(25) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `layanan` varchar(255) DEFAULT NULL,
  `permintaan` text DEFAULT NULL,
  `tanggal_booking` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `booking_data`
--

INSERT INTO `booking_data` (`id`, `id_user`, `car_type`, `car_transmition`, `tahun_produksi`, `no_rangka`, `nama`, `telepon`, `email`, `layanan`, `permintaan`, `tanggal_booking`) VALUES
(1, 7, 'NEW CALYA', 'manual', 2023, '2023', 'Dwi Reza Ariyadi', '085705297230', 'rezaariyadi8@gmail.com', 'Service Berkala', 'deqfeqwf', '2023-11-29'),
(2, 7, 'NEW CALYA', 'manual', 2023, '2023', 'Dwi Reza Ariyadi', '085705297230', 'rezaariyadi8@gmail.com', 'Service Berkala', 'deqfeqwf', '2023-11-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_kredit`
--

CREATE TABLE `form_kredit` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `cabang` varchar(255) NOT NULL,
  `total_dp` varchar(25) NOT NULL,
  `ktp_img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_kredit`
--

INSERT INTO `form_kredit` (`id`, `full_name`, `email`, `phone_number`, `car_type`, `kota`, `cabang`, `total_dp`, `ktp_img`) VALUES
(166, 'Dwi Reza', 'Rizkyrahmatullah72@gmail.com', 345677, 'NEW HILUX SINGLE CABIN', 'Samarinda', 'Auto200 Samarinda', 'cash', '2023-10-25 Dwi Reza.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id` int(11) NOT NULL,
  `nama_mobil` varchar(255) NOT NULL,
  `transmisi_mobil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id`, `nama_mobil`, `transmisi_mobil`) VALUES
(1, 'ALL NEW AGYA', 'A/T'),
(2, 'ALL NEW AGYA', 'M/T'),
(3, 'NEW CALYA', 'A/T'),
(4, 'NEW CALYA', 'M/T'),
(5, 'NEW RUSH', 'A/T'),
(6, 'NEW RUSH', 'M/T'),
(7, 'ALL NEW AVANZA', 'A/T'),
(8, 'ALL NEW AVANZA', 'M/T'),
(9, 'ALL NEW VELOZ', 'A/T'),
(10, 'ALL NEW VELOZ', 'M/T'),
(11, 'NEW YARIS', 'A/T'),
(12, 'NEW YARIS', 'M/T');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_data`
--

CREATE TABLE `user_data` (
  `id_user` int(15) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_data`
--

INSERT INTO `user_data` (`id_user`, `full_name`, `no_tlp`, `email`, `username`, `password`) VALUES
(7, 'Dwi Reza Ariyadi', '085705297230', 'rezaariyadi8@gmail.com', 'aesxiety', '$2y$10$wCr4Vs4Gxqkc8DNCdzwCZOuAePqia6MVMktp.R3eNE653Cdkd9vo6');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking_data`
--
ALTER TABLE `booking_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form_kredit`
--
ALTER TABLE `form_kredit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking_data`
--
ALTER TABLE `booking_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `form_kredit`
--
ALTER TABLE `form_kredit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
