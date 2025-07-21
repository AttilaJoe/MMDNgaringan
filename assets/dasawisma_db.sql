-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2025 at 02:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dasawisma_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_keluarga`
--

CREATE TABLE `anggota_keluarga` (
  `nik_keluarga` varchar(16) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `nik_kepala_keluarga` varchar(16) DEFAULT NULL,
  `status_perkawinan` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `pendidikan` varchar(10) DEFAULT NULL,
  `pekerjaan` varchar(10) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `ibu`
--

CREATE TABLE `ibu` (
  `nik_ibu` varchar(16) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `nama_suami` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `jumlah_anggota_keluarga`
--

CREATE TABLE `jumlah_anggota_keluarga` (
  `nik` varchar(16) DEFAULT NULL,
  `jumlah_anggota_laki` int(11) DEFAULT NULL,
  `jumlah_anggota_perempuan` int(11) DEFAULT NULL,
  `balita_laki` int(11) DEFAULT NULL,
  `balita_perempuan` int(11) DEFAULT NULL,
  `pasangan_usia_subur` int(11) DEFAULT NULL,
  `wanita_usia_subur` int(11) DEFAULT NULL,
  `ibu_hamil` int(11) DEFAULT NULL,
  `ibu_menyusui` int(11) DEFAULT NULL,
  `lansia` int(11) DEFAULT NULL,
  `tiga_buta` int(11) DEFAULT NULL,
  `berkebutuhan_khusus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelahiran_bayi`
--

CREATE TABLE `kelahiran_bayi` (
  `nik_ibu` varchar(16) DEFAULT NULL,
  `nama_bayi` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `akta_kelahiran` tinyint(1) DEFAULT NULL,
  `tanggal_kelahiran` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kematian_melahirkan`
--

CREATE TABLE `kematian_melahirkan` (
  `nik_ibu` varchar(16) DEFAULT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `tanggal_meninggal` date DEFAULT NULL,
  `sebab_meninggal` varchar(20) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kepala_keluarga`
--

CREATE TABLE `kepala_keluarga` (
  `NIK` varchar(16) NOT NULL,
  `nama_kepala_rumah` varchar(20) DEFAULT NULL,
  `jumlah_kepala_keluarga` int(11) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `keterangan`
--

CREATE TABLE `keterangan` (
  `nik` varchar(16) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_rumah`
--

CREATE TABLE `kriteria_rumah` (
  `nik` varchar(16) DEFAULT NULL,
  `sehat_layak_huni` tinyint(1) DEFAULT NULL,
  `kegiatan_usaha_kesehatan_lingkungan` tinyint(1) DEFAULT NULL,
  `tempat_pembuangan_sampah` tinyint(1) DEFAULT NULL,
  `spal` tinyint(1) DEFAULT NULL,
  `jamban` tinyint(1) DEFAULT NULL,
  `stiker_P4K` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `makanan_pokok`
--

CREATE TABLE `makanan_pokok` (
  `nik` varchar(16) DEFAULT NULL,
  `beras` int(11) DEFAULT NULL,
  `non_beras` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mengikuti_kegiatan`
--

CREATE TABLE `mengikuti_kegiatan` (
  `nik` varchar(16) DEFAULT NULL,
  `up2k` tinyint(1) DEFAULT NULL,
  `pemanfaatan_tanah_pekarangan` tinyint(1) DEFAULT NULL,
  `industri_rumah_tangga` tinyint(1) DEFAULT NULL,
  `kerja_bakti` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `user_id` varchar(3) NOT NULL,
  `username` varchar(10) DEFAULT NULL,
  `full_name` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `nomor_hp` varchar(12) DEFAULT NULL,
  `dibuat_pada` date DEFAULT NULL,
  `diperbarui_pada` date DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `sumber_air_keluarga`
--

CREATE TABLE `sumber_air_keluarga` (
  `nik` varchar(16) DEFAULT NULL,
  `sumur` tinyint(1) DEFAULT NULL,
  `dll` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  ADD PRIMARY KEY (`nik_keluarga`),
  ADD KEY `nik_kepala_keluarga` (`nik_kepala_keluarga`);

--
-- Indexes for table `ibu`
--
ALTER TABLE `ibu`
  ADD PRIMARY KEY (`nik_ibu`);

--
-- Indexes for table `jumlah_anggota_keluarga`
--
ALTER TABLE `jumlah_anggota_keluarga`
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `kelahiran_bayi`
--
ALTER TABLE `kelahiran_bayi`
  ADD KEY `nik_ibu` (`nik_ibu`);

--
-- Indexes for table `kematian_melahirkan`
--
ALTER TABLE `kematian_melahirkan`
  ADD KEY `nik_ibu` (`nik_ibu`);

--
-- Indexes for table `kepala_keluarga`
--
ALTER TABLE `kepala_keluarga`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `keterangan`
--
ALTER TABLE `keterangan`
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `kriteria_rumah`
--
ALTER TABLE `kriteria_rumah`
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `makanan_pokok`
--
ALTER TABLE `makanan_pokok`
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `mengikuti_kegiatan`
--
ALTER TABLE `mengikuti_kegiatan`
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `sumber_air_keluarga`
--
ALTER TABLE `sumber_air_keluarga`
  ADD KEY `nik` (`nik`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  ADD CONSTRAINT `anggota_keluarga_ibfk_1` FOREIGN KEY (`nik_kepala_keluarga`) REFERENCES `kepala_keluarga` (`NIK`);

--
-- Constraints for table `jumlah_anggota_keluarga`
--
ALTER TABLE `jumlah_anggota_keluarga`
  ADD CONSTRAINT `jumlah_anggota_keluarga_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `kepala_keluarga` (`NIK`);

--
-- Constraints for table `kelahiran_bayi`
--
ALTER TABLE `kelahiran_bayi`
  ADD CONSTRAINT `kelahiran_bayi_ibfk_1` FOREIGN KEY (`nik_ibu`) REFERENCES `ibu` (`nik_ibu`);

--
-- Constraints for table `kematian_melahirkan`
--
ALTER TABLE `kematian_melahirkan`
  ADD CONSTRAINT `kematian_melahirkan_ibfk_1` FOREIGN KEY (`nik_ibu`) REFERENCES `ibu` (`nik_ibu`);

--
-- Constraints for table `keterangan`
--
ALTER TABLE `keterangan`
  ADD CONSTRAINT `keterangan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `kepala_keluarga` (`NIK`);

--
-- Constraints for table `kriteria_rumah`
--
ALTER TABLE `kriteria_rumah`
  ADD CONSTRAINT `kriteria_rumah_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `kepala_keluarga` (`NIK`);

--
-- Constraints for table `makanan_pokok`
--
ALTER TABLE `makanan_pokok`
  ADD CONSTRAINT `makanan_pokok_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `kepala_keluarga` (`NIK`);

--
-- Constraints for table `mengikuti_kegiatan`
--
ALTER TABLE `mengikuti_kegiatan`
  ADD CONSTRAINT `mengikuti_kegiatan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `kepala_keluarga` (`NIK`);

--
-- Constraints for table `sumber_air_keluarga`
--
ALTER TABLE `sumber_air_keluarga`
  ADD CONSTRAINT `sumber_air_keluarga_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `kepala_keluarga` (`NIK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
