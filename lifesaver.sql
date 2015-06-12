-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2013 at 02:53 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lifesaver`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodbank`
--

CREATE TABLE IF NOT EXISTS `bloodbank` (
  `email_rs` varchar(50) NOT NULL,
  `nama_rs` varchar(50) DEFAULT NULL,
  `alamat_rs` varchar(50) DEFAULT NULL,
  `telepon_rs` varchar(20) DEFAULT NULL,
  `dokumen_rs` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`email_rs`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodbank`
--

INSERT INTO `bloodbank` (`email_rs`, `nama_rs`, `alamat_rs`, `telepon_rs`, `dokumen_rs`) VALUES
('rsahkapindosatnetid', 'RS. Adi Husada Kapasari', 'Jl. Kapasari 97-101 Surabaya 60141 Jawa Timur', '085866778882', '0'),
('rshgmailcom', 'Rumah Sakit Haji', 'Jalan Manyar Kerto Adi Surabaya Indonesia ', '085866778882', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cari_donor`
--

CREATE TABLE IF NOT EXISTS `cari_donor` (
  `id_caridonor` bigint(20) NOT NULL AUTO_INCREMENT,
  `email_rs` varchar(50) NOT NULL,
  `pesan_sms` varchar(160) DEFAULT NULL,
  `id_pasien` bigint(20) NOT NULL,
  PRIMARY KEY (`id_caridonor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `cari_donor`
--

INSERT INTO `cari_donor` (`id_caridonor`, `email_rs`, `pesan_sms`, `id_pasien`) VALUES
(47, 'rshgmailcom', 'butuh darah secepatnya', 30),
(48, 'rshgmailcom', 'asasas', 21),
(49, 'rshgmailcom', 'aasdsadsads', 31),
(50, 'rshgmailcom', 'lapar', 32),
(51, 'rshgmailcom', '[LifeSaver]', 33),
(52, 'rshgmailcom', '[LifeSaver]', 34);

-- --------------------------------------------------------

--
-- Table structure for table `detail_caridonor`
--

CREATE TABLE IF NOT EXISTS `detail_caridonor` (
  `id_detail_caridonor` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_caridonor` bigint(20) NOT NULL,
  `email_pendonor` varchar(50) NOT NULL,
  `setuju_donor` tinyint(1) DEFAULT NULL,
  `sudah_donor` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_detail_caridonor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `detail_caridonor`
--

INSERT INTO `detail_caridonor` (`id_detail_caridonor`, `id_caridonor`, `email_pendonor`, `setuju_donor`, `sudah_donor`) VALUES
(27, 47, 'bagusgmailcom', 0, 0),
(28, 47, 'hanifbudiartogmailcom', 1, 1),
(29, 47, 'demitdemitcom', 0, 0),
(30, 47, 'demitdemitcom', 0, 0),
(31, 47, 'demitdemitcom', 0, 0),
(32, 47, 'demitdemitcom', 0, 0),
(33, 47, 'firmanfirmancom', 0, 1),
(34, 47, 'demitdemitcom', 0, 0),
(35, 47, 'firmanfirmancom', 1, 1),
(36, 47, 'bagusgmailcom', 0, 0),
(37, 47, 'hanifbudiartogmailcom', 0, 0),
(38, 47, 'bagusgmailcom', 0, 0),
(39, 47, 'hanifbudiartogmailcom', 0, 0),
(40, 48, 'hanifbudiartogmailcom', 0, 0),
(41, 49, 'bagusgmailcom', 0, 0),
(42, 47, 'demitdemitcom', 0, 0),
(43, 47, 'firmanfirmancom', 0, 0),
(44, 50, 'hanifbudiartogmailcom', 0, 0),
(45, 50, 'hanifbudiartogmailcom', 0, 0),
(46, 50, 'bagusgmailcom', 0, 0),
(47, 52, 'bagusgmailcom', 0, 0),
(48, 52, 'hanifbudiartogmailcom', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE IF NOT EXISTS `donor` (
  `email_pendonor` varchar(50) NOT NULL,
  `nama_pendonor` varchar(50) DEFAULT NULL,
  `alamat_pendonor` varchar(100) DEFAULT NULL,
  `telepon_pendonor` varchar(20) DEFAULT NULL,
  `darah_pendonor` char(2) DEFAULT NULL,
  `availdays_start` bigint(11) DEFAULT NULL,
  `availdays_end` bigint(20) DEFAULT NULL,
  `rhesus_pendonor` char(1) DEFAULT NULL,
  `berat_pendonor` int(11) DEFAULT NULL,
  `gambar_pendonor` varchar(100) NOT NULL DEFAULT 'http://localhost/lifesaverbaru/images/1017.jpg',
  `terakhir_donor` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`email_pendonor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`email_pendonor`, `nama_pendonor`, `alamat_pendonor`, `telepon_pendonor`, `darah_pendonor`, `availdays_start`, `availdays_end`, `rhesus_pendonor`, `berat_pendonor`, `gambar_pendonor`, `terakhir_donor`) VALUES
('bagusgmailcom', 'Bagus Ardiasyah', 'Gebang Wetan Sukolilo Surabaya', '6285852538457', 'B', 1367359200, 1369951200, '-', 70, 'http://localhost/lifesaverbaru/images/1017.jpg', 0),
('demitdemitcom', 'demit', 'surabaya gebang wetan', '085746444872', 'B', 1364767200, 1367272800, '-', 65, 'http://localhost/lifesaverbaru/images/1017.jpg', NULL),
('firmanfirmancom', 'firman', 'surabaya keputih', '085123123', 'B', 1364767200, 1367272800, '-', 65, 'http://localhost/lifesaverbaru/images/1017.jpg', 1366668000),
('hanifbudiartogmailcom', 'Hanif Budiarto', 'Keputih Gang II no 27 A Surabaya Jawa Timur Indonesia', '6281234909590', 'B', 1367359200, 1369951200, '-', 60, 'http://localhost/lifesaverbaru/images/1017.jpg', 1366668000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `email` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`, `cat_id`) VALUES
('bagusgmailcom', '0cc175b9c0f1b6a831c399e269772661', 1),
('demitdemitcom', '226d4d1bd9a1b17389227221f3c582dc', 1),
('firmanfirmancom', '74bfebec67d1a87b161e5cbcf6f72a4a', 1),
('hanifbudiartogmailcom', '0cc175b9c0f1b6a831c399e269772661', 1),
('hanifhanifcom', '0cc175b9c0f1b6a831c399e269772661', 1),
('mhanifbudiartogmailcom', '72e74f574535bdc82cf4b99f8fc064e1', 1),
('rsahkapindosatnetid', '3a2d7564baee79182ebc7b65084aabd1', 2),
('rshgmailcom', '0cc175b9c0f1b6a831c399e269772661', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` bigint(20) NOT NULL AUTO_INCREMENT,
  `email_rs` varchar(50) NOT NULL,
  `nama_pasien` varchar(50) DEFAULT NULL,
  `darah_pasien` char(2) DEFAULT NULL,
  `tgl_butuhdarah` bigint(20) DEFAULT NULL,
  `penyakit_pasien` varchar(50) DEFAULT NULL,
  `status_pasien` tinyint(1) DEFAULT NULL,
  `rhesus_pasien` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `email_rs`, `nama_pasien`, `darah_pasien`, `tgl_butuhdarah`, `penyakit_pasien`, `status_pasien`, `rhesus_pasien`) VALUES
(17, 'rsahkapindosatnetid', 'Hans Alfon Ericksoon', 'A', 1367445600, 'Pendarahan pada Paru-Paru', 0, '-'),
(19, 'rsahkapindosatnetid', 'Ericks', 'AB', 1369951200, 'Penyakit sempakan gatel', 0, '+'),
(20, 'rsahkapindosatnetid', 'Hanif Budiarto', 'A', 1367272800, 'ganteng', 0, '-'),
(21, 'rshgmailcom', 'Dmitri Yanno Mahayana', 'B', 1367877600, 'Sakit Muntah Darah', 1, '-'),
(22, 'rshgmailcom', 'Endang Wahyu Pamungkas', 'A', 1369346400, 'Pendarahan Paru-Paru', 0, '-'),
(23, 'rshgmailcom', 'Galang Amanda', 'O', 1367359200, 'Sakit Jantung', 0, '-'),
(24, 'rshgmailcom', 'Ramadhani Tegar Perkasa', 'AB', 1365026400, 'Pendarahan Otak', 0, '-'),
(25, 'rshgmailcom', 'Bayu aji', 'B', 1366754400, 'Pendarahan', 1, '-'),
(26, 'rshgmailcom', 'Bayu aji 2', 'B', 1366754400, 'Pendarahan', 1, '-'),
(27, 'rshgmailcom', 'Bayu Aji lagi', 'B', 1366840800, 'Pendarahan', 1, '-'),
(28, 'rshgmailcom', 'Ahmad', 'B', 1366668000, 'Pendarahan dalam', 1, '-'),
(29, 'rshgmailcom', 'Udin', 'B', 1366754400, 'Pendarahan Luar', 1, '-'),
(30, 'rshgmailcom', 'erickon', 'B', 1368655200, 'sakit hati', 1, '-'),
(31, 'rshgmailcom', 'Felix Handani', 'B', 1368568800, 'Sakit Mata', 1, '-'),
(32, 'rshgmailcom', 'Bernard', 'B', 1367186400, 'Sakit Lapar', 1, '-'),
(33, 'rshgmailcom', 'Gagaga', 'B', 1368568800, 'Radang anus', 1, '-'),
(34, 'rshgmailcom', 'Demit', 'B', 1368568800, 'Sakit hati', 1, '-');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bloodbank`
--
ALTER TABLE `bloodbank`
  ADD CONSTRAINT `bloodbank_ibfk_1` FOREIGN KEY (`email_rs`) REFERENCES `login` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donor`
--
ALTER TABLE `donor`
  ADD CONSTRAINT `donor_ibfk_1` FOREIGN KEY (`email_pendonor`) REFERENCES `login` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
