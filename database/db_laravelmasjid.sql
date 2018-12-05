-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2018 at 06:15 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laravelmasjid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `idMasjid` int(11) NOT NULL,
  `username` text COLLATE utf8mb4_unicode_ci,
  `password` text COLLATE utf8mb4_unicode_ci,
  `nama` text COLLATE utf8mb4_unicode_ci,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `kontak` text COLLATE utf8mb4_unicode_ci,
  `foto` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `idMasjid`, `username`, `password`, `nama`, `alamat`, `kontak`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '$2y$10$naWrMn5oBsxU6t2d3FT/1u0kew6IOA7q/r7k1IuZzSQNyZT.j2mVG', 'Sofyan Said Atsaurry', 'Tajur Bogor', '082217192495', '839678165.jpg', 0, '2018-11-01 02:40:38', '2018-11-01 02:40:38'),
(8, 1, 'admin2', '$2y$10$NKDKPor9Nu923eudHH5Rl.kHLfPMQkMplsxDxnOnnSjUyiVo9pDCi', 'Owwin', NULL, NULL, '643440517.jpg', 1, NULL, NULL),
(9, 1, 'admin3', '$2y$10$CoVluE7R4Y4rvngbJH952urSK4c5aEjyCr8RaktexhypjI2njBLZG', NULL, NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `tglAgenda` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `lokasiKegiatan` text,
  `judul` text,
  `penanggungJawab` text,
  `kontak` text,
  `keterangan` text,
  `gambar` text,
  `tglUpload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `tglAgenda`, `jam`, `lokasiKegiatan`, `judul`, `penanggungJawab`, `kontak`, `keterangan`, `gambar`, `tglUpload`) VALUES
(1, '2018-10-03', '17:30:00', 'Masjid Alumni IPB', 'Kajian Subuh-subuh', '12', '082217192495', 'Kajian pertama', '43117687.png', '2018-10-12 00:38:16'),
(2, '2018-09-30', '11:45:00', 'Masjid Raya Kota Bogor', 'Nasihat pagi', '02', '082212124235', 'Huooooooo', 'kajian2.jpeg', '2018-10-09 10:03:51'),
(3, '2018-12-12', '19:00:00', 'Masjid Agung', 'Tabligh Akbar', 'Jaka', '09183091724124', 'acara bagus', 'kajian.jpeg', '2018-10-11 23:54:59'),
(4, '2018-11-01', '11:00:00', 'Masjid Raya Kota bogor', 'Kajian Hidayah', 'Syafeei', '082797489134', 'mantaaap', 'hidayah.jpg', '2018-10-09 10:04:25'),
(5, '2018-11-30', '12:27:00', 'Masjid Ad-Dzikra', 'Satu Kemenangan', 'Mukhsin', '0812314798695', 'datang yaa', 'uas.jpg', '2018-10-09 10:04:39'),
(6, '2018-12-01', '21:51:00', 'Lapangan', 'Peduli Gempa Lombok', 'Nasrul', '08419487156', '-', 'lombok.jpg', '2018-10-09 10:04:52'),
(7, '2018-10-19', '15:15:00', 'Masjid Alumni IPB', 'Mencintai Al-Qur\'an', 'DKM Masjid Alumni IPB', '081237489499', 'Tabligh Akbar pecinta Al-Qur\'an', '98692385.jpg', '2018-10-10 09:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `isiInfo` text,
  `expInfo` date DEFAULT NULL,
  `penulisInfo` text,
  `tglUploadInfo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `isiInfo`, `expInfo`, `penulisInfo`, `tglUploadInfo`) VALUES
(1, 'LURUSKAN SHAFF ANDA KETIKA SHOLAT BERJAMAAH !', '2018-12-12', 'Ahmad', '2018-10-16 02:09:58'),
(3, 'KEBERSIHAN SEBAGIAN DARI IMAN', '2019-02-23', NULL, '2018-10-16 03:33:17'),
(4, 'JAGALAH KEBERSIHAN !!!', '2018-12-28', 'Jaka Tarub', '2018-10-20 07:10:21'),
(6, 'Diam Saat Khutbah !', '2018-12-28', 'Jaka Tarub', '2018-10-16 14:59:32'),
(7, 'MATIKAN HANDPHONE ANDA ATAU SILENTKAN !', '2018-12-28', 'Nusron Tsani', '2018-10-16 15:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `masjid`
--

CREATE TABLE `masjid` (
  `id` int(11) NOT NULL,
  `namaMasjid` text,
  `alamatMasjid` text,
  `posLang` double DEFAULT NULL,
  `posLat` double DEFAULT NULL,
  `kota` text,
  `deskripsi` text,
  `zonaWaktu` text,
  `metode` varchar(20) DEFAULT 'MWL',
  `durasiPraadzan` int(11) DEFAULT '5',
  `iqomahSubuh` int(11) DEFAULT '5',
  `iqomahDzuhur` int(11) DEFAULT '5',
  `iqomahAshar` int(11) DEFAULT '5',
  `iqomahMaghrib` int(11) DEFAULT '5',
  `iqomahIsya` int(11) DEFAULT '5',
  `durasiSholat` int(11) DEFAULT '10',
  `durasiSolJum` int(11) DEFAULT '20',
  `wbackground` varchar(20) DEFAULT '#ffffff',
  `wtext` varchar(20) DEFAULT '#000000',
  `wfont` varchar(30) DEFAULT 'arial',
  `wborder` varchar(20) DEFAULT '#808080',
  `wftext` varchar(20) DEFAULT '#cccccc',
  `wftextshadow` varchar(20) DEFAULT '#000000',
  `wfbackground` varchar(20) DEFAULT '#323434',
  `wruntext` varchar(20) DEFAULT '#ffffff',
  `wruntextbg` varchar(20) DEFAULT '#212121',
  `updateData` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masjid`
--

INSERT INTO `masjid` (`id`, `namaMasjid`, `alamatMasjid`, `posLang`, `posLat`, `kota`, `deskripsi`, `zonaWaktu`, `metode`, `durasiPraadzan`, `iqomahSubuh`, `iqomahDzuhur`, `iqomahAshar`, `iqomahMaghrib`, `iqomahIsya`, `durasiSholat`, `durasiSolJum`, `wbackground`, `wtext`, `wfont`, `wborder`, `wftext`, `wftextshadow`, `wfbackground`, `wruntext`, `wruntextbg`, `updateData`) VALUES
(1, 'Masjid Alumni IPB', 'Jl. Cidangiang Samping Mall Botani Square', -6.601208, 106.806741, 'Bogor', 'Insya Allah', '+7', 'Kemenag', 5, 5, 6, 7, 8, 9, 11, 21, '#ffffff', '#000000', 'comic sans ms', '#808080', '#cccccc', '#000000', '#323434', '#ffffff', '#212121', '2018-11-03 04:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masjid`
--
ALTER TABLE `masjid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `masjid`
--
ALTER TABLE `masjid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
