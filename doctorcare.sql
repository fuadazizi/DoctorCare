-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Bulan Mei 2020 pada 16.38
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctorcare`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `nama` varchar(255) NOT NULL,
  `jeniskelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `spesialis` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`nama`, `jeniskelamin`, `alamat`, `spesialis`, `email`, `telp`, `username`, `password`) VALUES
('Indra Wahyudi', 'Laki-laki', 'Samarinda', 'Penyakit Hati', 'indrawahyudi2710@gmail.com', '081247123341', 'indra', '202cb962ac59075b964b07152d234b70'),
('Priyoga ', 'Laki-laki', 'Bandung', 'Penyakit Hati', 'priyoga@gmail.com', '081231134223', 'yoga', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwaltemu`
--

CREATE TABLE `jadwaltemu` (
  `id` int(10) NOT NULL,
  `Username_Pasien` varchar(30) NOT NULL,
  `Username_Dokter` varchar(30) NOT NULL,
  `jam` varchar(15) NOT NULL,
  `Tanggal` varchar(30) NOT NULL,
  `Penyakit` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_kosong`
--

CREATE TABLE `jadwal_kosong` (
  `idjadwal` int(11) NOT NULL,
  `Username_Dokter` varchar(20) NOT NULL,
  `jam` varchar(5) NOT NULL,
  `Tanggal` varchar(30) NOT NULL,
  `empty` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_kosong`
--

INSERT INTO `jadwal_kosong` (`idjadwal`, `Username_Dokter`, `jam`, `Tanggal`, `empty`) VALUES
(26, 'indra', '01:00', '2020-05-04', 0),
(27, 'yoga', '05:10', '2020-05-30', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `nama` varchar(255) NOT NULL,
  `jeniskelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`nama`, `jeniskelamin`, `alamat`, `email`, `telp`, `username`, `password`) VALUES
('Fuad Azizi', 'Laki-laki', 'Bandung', 'fuad@gmail.com', '081234567890', 'fuad', '202cb962ac59075b964b07152d234b70'),
('Hafidz Lazuardi', 'Laki-laki', 'Paser', 'hafidz@gmail.com', '081351183481', 'hafidz', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `jadwaltemu`
--
ALTER TABLE `jadwaltemu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_kosong`
--
ALTER TABLE `jadwal_kosong`
  ADD PRIMARY KEY (`idjadwal`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal_kosong`
--
ALTER TABLE `jadwal_kosong`
  MODIFY `idjadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
