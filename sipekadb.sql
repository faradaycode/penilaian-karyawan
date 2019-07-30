-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 30, 2019 at 12:36 AM
-- Server version: 10.3.14-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipekadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspek_nilai`
--

DROP TABLE IF EXISTS `aspek_nilai`;
CREATE TABLE IF NOT EXISTS `aspek_nilai` (
  `id_aspek` int(11) NOT NULL AUTO_INCREMENT,
  `aspek_ket` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_aspek`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aspek_nilai`
--

INSERT INTO `aspek_nilai` (`id_aspek`, `aspek_ket`) VALUES
(1, 'aspek teknis'),
(2, 'aspek nonteknis'),
(3, 'aspek kepribadian');

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

DROP TABLE IF EXISTS `jabatans`;
CREATE TABLE IF NOT EXISTS `jabatans` (
  `id_j` int(11) NOT NULL AUTO_INCREMENT,
  `nama_j` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_j`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id_j`, `nama_j`) VALUES
(1, 'staf');

-- --------------------------------------------------------

--
-- Table structure for table `karyawans`
--

DROP TABLE IF EXISTS `karyawans`;
CREATE TABLE IF NOT EXISTS `karyawans` (
  `id_k` int(11) NOT NULL AUTO_INCREMENT,
  `nip_k` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `nama_k` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `id_j` int(11) NOT NULL,
  `mulai_kerja` date NOT NULL,
  PRIMARY KEY (`id_k`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `karyawans`
--

INSERT INTO `karyawans` (`id_k`, `nip_k`, `nama_k`, `id_j`, `mulai_kerja`) VALUES
(1, '1253330', 'jhon doe', 1, '2018-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `nilais`
--

DROP TABLE IF EXISTS `nilais`;
CREATE TABLE IF NOT EXISTS `nilais` (
  `id_n` int(11) NOT NULL AUTO_INCREMENT,
  `id_k` int(11) NOT NULL,
  `n_teknis` double NOT NULL DEFAULT 0,
  `n_nonteknis` double NOT NULL DEFAULT 0,
  `n_pribadi` double NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_n`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nilais`
--

INSERT INTO `nilais` (`id_n`, `id_k`, `n_teknis`, `n_nonteknis`, `n_pribadi`) VALUES
(1, 1, -0.2, -0.2, -0.2);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_detail`
--

DROP TABLE IF EXISTS `nilai_detail`;
CREATE TABLE IF NOT EXISTS `nilai_detail` (
  `id_nd` int(11) NOT NULL AUTO_INCREMENT,
  `id_k` int(11) NOT NULL,
  `id_pty` int(11) NOT NULL,
  `id_aspek` int(11) NOT NULL,
  `bobot_nilai` double NOT NULL,
  PRIMARY KEY (`id_nd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaans`
--

DROP TABLE IF EXISTS `pertanyaans`;
CREATE TABLE IF NOT EXISTS `pertanyaans` (
  `id_pty` int(11) NOT NULL AUTO_INCREMENT,
  `isi_pertanyaan` text COLLATE utf8_unicode_ci NOT NULL,
  `id_aspek` int(11) NOT NULL,
  PRIMARY KEY (`id_pty`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pertanyaans`
--

INSERT INTO `pertanyaans` (`id_pty`, `isi_pertanyaan`, `id_aspek`) VALUES
(1, 'efektifitas dan efisiensi kerja', 1),
(2, 'ketepatan waktu dalam menyelesaikan tugas', 1),
(3, 'kebersihan dan kerapihan dalam menyelesaikan tugas', 1),
(4, 'tertib adminstrasi', 2),
(5, 'inisiatif', 2),
(6, 'kerjasama dan koordinatif antar bagian', 2),
(7, 'perilaku individu', 3),
(8, 'kedisiplinan individu', 3),
(9, 'tanggung jawab dan loyalitas', 3),
(10, 'kecapaian terhadap instruksi atasan', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_u` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_u`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_u`, `userid`, `username`, `password`, `photo`) VALUES
(1, 'admin', 'administrator', '202cb962ac59075b964b07152d234b70', 'admin.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
