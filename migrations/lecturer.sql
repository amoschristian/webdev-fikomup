-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 23, 2020 at 10:12 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_fikomup`
--

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `id_lecturer` int(11) NOT NULL,
  `npd` varchar(250) NOT NULL,
  `nidn` varchar(255) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL,
  `gelar` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `kepangkatan` varchar(255) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `peguruan_tinggi` varchar(255) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `hits` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`id_lecturer`, `npd`, `nidn`, `nama_dosen`, `gelar`, `jenis_kelamin`, `agama`, `kepangkatan`, `pendidikan`, `peguruan_tinggi`, `jabatan`, `email`, `gambar`, `id_user`, `hits`, `created_at`, `updated_at`) VALUES
(2, '7007211001', '0323086905', 'ANNA AGUSTINA', 'M.Si., Ph.D.', 'Wanita', 'ISLAM', 'Lektor', 'S3', 'Universiti Sains Malaysia', 'Dekan', 'annaagustina@univpancasila.ac.id', '7007211001157915011716January2020.jpeg', 1, 1, NULL, '2020-02-23 16:14:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`id_lecturer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `id_lecturer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
