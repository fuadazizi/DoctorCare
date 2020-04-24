-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2020 at 11:59 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

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
-- Table structure for table `dokter`
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
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`nama`, `jeniskelamin`, `alamat`, `spesialis`, `email`, `telp`, `username`, `password`) VALUES
('Narnia', '', '', '', '', '', 'narniaa', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `jadwaltemu`
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
-- Table structure for table `jadwal_kosong`
--

CREATE TABLE `jadwal_kosong` (
  `idjadwal` int(11) NOT NULL,
  `Username_Dokter` varchar(20) NOT NULL,
  `jam` varchar(5) NOT NULL,
  `Tanggal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_kosong`
--

INSERT INTO `jadwal_kosong` (`idjadwal`, `Username_Dokter`, `jam`, `Tanggal`) VALUES
(1, 'yoga123', '09:30', '2020-01-04'),
(2, 'yoga123', '08:30', '2020-05-01'),
(4, 'narniaa', '06:14', '2020-03-31'),
(5, 'narniaa', '01:02', '2020-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
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
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`nama`, `jeniskelamin`, `alamat`, `email`, `telp`, `username`, `password`) VALUES
('Fuad Azizi', '', '', '', '', 'fuadazizi', 'c33367701511b4f6020ec61ded352059'),
('Robert Exal', '', '', '', '', 'robertex', 'e10adc3949ba59abbe56e057f20f883e'),
('Yoga', '', '', '', '', 'yogs007', '45a73564aacc33cff0bf8bf9e72370f5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `jadwaltemu`
--
ALTER TABLE `jadwaltemu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_kosong`
--
ALTER TABLE `jadwal_kosong`
  ADD PRIMARY KEY (`idjadwal`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwaltemu`
--
ALTER TABLE `jadwaltemu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `jadwal_kosong`
--
ALTER TABLE `jadwal_kosong`
  MODIFY `idjadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
