-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Mar 2020 pada 03.17
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_airmas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `uuid_login` varchar(255) DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `name`, `email`, `password`, `uuid_login`) VALUES
(1, 'uye', '', 'malintanhernawanputra.net@gmail.com', 'ccc7ec124a41493efbb2c57f6932bfa3', '-'),
(2, 'uye', 'masuk uye', 'malintanhernawanputra.net@gmail.com', 'ccc7ec124a41493efbb2c57f6932bfa3', '127157fa-6407-11ea-ad4b-28d244b09b5d '),
(3, 'uye', 'masuk uye', 'malintanhernawanputra.net@gmail.com', 'ccc7ec124a41493efbb2c57f6932bfa3', '-'),
(4, 'malintan', 'ma ma', 'malintanhernawanputra.net@gmail.com', 'ccc7ec124a41493efbb2c57f6932bfa3', '-'),
(5, 'malintan2112', 'Hernawan Malintan', '112201605502@mhs.dinus.ac.id', 'ccc7ec124a41493efbb2c57f6932bfa3', '-'),
(6, 'bruno', 'mantul jiwa', 'dirkom@mail', 'f3770595e0cb4d9a988bd5da98d2187d', 'b175ace6-6436-11ea-8041-28d244b09b5d'),
(7, 'admin', 'masuk masuk', 'admin@email.com', '21232f297a57a5a743894a0e4a801fc3', '1bbd88ac-653c-11ea-8d6d-28d244b09b5d');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
