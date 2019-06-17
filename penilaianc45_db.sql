-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 17, 2019 at 02:49 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penilaianc45_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil_nilai`
--

DROP TABLE IF EXISTS `tb_hasil_nilai`;
CREATE TABLE IF NOT EXISTS `tb_hasil_nilai` (
  `id_n` int(11) NOT NULL AUTO_INCREMENT,
  `id_k` int(11) NOT NULL,
  `nilai_n` double NOT NULL,
  `status_n` int(11) NOT NULL,
  PRIMARY KEY (`id_n`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

DROP TABLE IF EXISTS `tb_karyawan`;
CREATE TABLE IF NOT EXISTS `tb_karyawan` (
  `id_k` int(11) NOT NULL AUTO_INCREMENT,
  `nip_k` varchar(15) NOT NULL,
  `nama_k` varchar(35) NOT NULL,
  `jabatan_k` int(11) NOT NULL,
  `mulai_bekerja_k` date NOT NULL,
  PRIMARY KEY (`id_k`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_u` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id_u`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
