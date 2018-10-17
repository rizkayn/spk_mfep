-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2018 at 06:18 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spk_mfep`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`user`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ahli`
--

CREATE TABLE IF NOT EXISTS `tb_ahli` (
`kode_ahli` int(11) NOT NULL,
  `kode_alt` int(11) DEFAULT NULL,
  `nama_ahli` varchar(255) DEFAULT NULL,
  `posisi` enum('Team Leader','Supervision Engineer','Setingkat PME/HE/BE/CI/QE') DEFAULT NULL,
  `lingkup` enum('Core Team','Supervisi','Perencanaan') DEFAULT NULL,
  `sertifikat` enum('Ada/Sesuai','Tidak Ada') DEFAULT NULL,
  `pendidikan` enum('Setara KAK','Dibawah KAK') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ahli`
--

INSERT INTO `tb_ahli` (`kode_ahli`, `kode_alt`, `nama_ahli`, `posisi`, `lingkup`, `sertifikat`, `pendidikan`) VALUES
(10, 5, 'Ringgio adiwata', 'Team Leader', '', '', ''),
(11, 5, 'Danu Efantri', 'Team Leader', '', '', ''),
(12, 5, 'SS', 'Team Leader', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alternatif`
--

CREATE TABLE IF NOT EXISTS `tb_alternatif` (
  `kode_alternatif` varchar(16) NOT NULL,
  `nama_alternatif` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `rank` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`kode_alternatif`, `nama_alternatif`, `keterangan`, `rank`, `total`) VALUES
('12345', 'PT ceremona', 'er', 1, 100),
('1234', 'pt b', 'o', 8, 85),
('T001', 'pt jasa', '-', 4, 87),
('ds', 'd', 'ds', 7, 87),
('s', 'Syarat Pengalaman KAK', 's', 6, 87),
('w', '1w', '1www', 3, 87),
('to', 'perusahaan ja', '-', 2, 97),
('hk', 'k', '', 5, 87);

-- --------------------------------------------------------

--
-- Table structure for table `tb_alternatif1`
--

CREATE TABLE IF NOT EXISTS `tb_alternatif1` (
  `kode_alternatif1` varchar(16) NOT NULL,
  `nama_alternatif1` varchar(255) DEFAULT NULL,
  `keterangan1` text,
  `rank1` int(11) DEFAULT NULL,
  `total1` double DEFAULT NULL,
  `nilai1` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alternatif1`
--

INSERT INTO `tb_alternatif1` (`kode_alternatif1`, `nama_alternatif1`, `keterangan1`, `rank1`, `total1`, `nilai1`) VALUES
('bjk', 'kjl', 'jbkj', NULL, NULL, NULL),
('de', 'e', 'd', NULL, NULL, NULL),
('jh', 'jhk', 'ho', NULL, NULL, NULL),
('riz', 'ja', 'ska', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_alternatif2`
--

CREATE TABLE IF NOT EXISTS `tb_alternatif2` (
  `kode_alternatif2` varchar(16) NOT NULL,
  `nama_alternatif2` varchar(255) DEFAULT NULL,
  `keterangan2` text,
  `rank2` int(11) DEFAULT NULL,
  `total2` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alternatif2`
--

INSERT INTO `tb_alternatif2` (`kode_alternatif2`, `nama_alternatif2`, `keterangan2`, `rank2`, `total2`) VALUES
('1234', 'pt b', 'o', 7, 85),
('12345', 'PT ceremona', 'er', 1, 100),
('ds', 'd', 'ds', 6, 87),
('s', 'Syarat Pengalaman KAK', 's', 5, 87),
('T001', 'pt jasa', '-', 4, 87),
('to', 'perusahaan ja', '-', 2, 97),
('w', '1w', '1www', 3, 87);

-- --------------------------------------------------------

--
-- Table structure for table `tb_crips`
--

CREATE TABLE IF NOT EXISTS `tb_crips` (
`kode_crips` int(11) NOT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `nama_crips` varchar(255) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_crips`
--

INSERT INTO `tb_crips` (`kode_crips`, `kode_kriteria`, `nama_crips`, `nilai`) VALUES
(2, 'C01', 'Tidak Hadir', 0),
(3, 'C01', 'Tidak Diundang', 0),
(4, 'C02', 'Ya', 100),
(5, 'C02', 'Tidak', 0),
(6, 'C03', 'Ya', 100),
(7, 'C03', 'Tidak', 0),
(8, 'C04', 'Ya', 100),
(9, 'C04', 'Tidak', 0),
(10, 'C05', 'Ya', 100),
(11, 'C05', 'Tidak', 0),
(12, 'C06', 'Ya', 100),
(13, 'C06', 'Tidak', 0),
(15, 'C07', 'Tidak', 0),
(16, 'C08', 'Ya', 100),
(17, 'C08', 'Tidak', 0),
(18, 'C09', 'Ya', 100),
(19, 'C09', 'Tidak', 0),
(20, 'C10', 'Ya', 100),
(21, 'C10', 'Tidak', 0),
(22, 'C11', 'Ya', 100),
(23, 'C11', 'Tidak', 0),
(24, 'C12', 'Ya', 100),
(25, 'C12', 'Tidak', 0),
(26, 'C13', 'Ya', 100),
(27, 'C13', 'Tidak', 0),
(28, 'C14', 'Ya', 100),
(29, 'C14', 'Tidak', 0),
(30, 'C15', 'Ya', 100),
(31, 'C15', 'Tidak', 0),
(32, 'C16', 'Ya', 100),
(33, 'C16', 'Tidak', 0),
(34, 'C17', 'Ya', 100),
(35, 'C17', 'Tidak', 0),
(36, 'C18', 'Ya', 100),
(37, 'C18', 'Tidak', 0),
(38, 'C19', 'Ya', 100),
(39, 'C19', 'Tidak', 0),
(40, 'C20', 'Ya', 100),
(41, 'C20', 'Tidak', 0),
(42, 'C21', 'Ya', 100),
(43, 'C21', 'Tidak', 0),
(44, 'C22', 'Ya', 100),
(45, 'C22', 'Tidak', 0),
(46, 'C23', 'Ya', 100),
(47, 'C23', 'Tidak', 0),
(48, 'C24', 'Ya', 100),
(49, 'C24', 'Tidak', 0),
(50, 'C25', 'Ya', 100),
(51, 'C25', 'Tidak', 0),
(52, 'C26', 'Ya', 100),
(53, 'C26', 'Tidak', 0),
(54, 'C07', 'Ya', 100),
(100, 'C01', 'Hadir', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_crips2`
--

CREATE TABLE IF NOT EXISTS `tb_crips2` (
  `kode_crips2` int(11) NOT NULL DEFAULT '0',
  `kode_kriteria2` varchar(16) DEFAULT NULL,
  `nama_crips2` varchar(255) DEFAULT NULL,
  `nilai2` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_crips2`
--

INSERT INTO `tb_crips2` (`kode_crips2`, `kode_kriteria2`, `nama_crips2`, `nilai2`) VALUES
(2, 'C01', 'Tidak Hadir', 0),
(3, 'C01', 'Tidak Diundang', 0),
(4, 'C02', 'Ya', 100),
(5, 'C02', 'Tidak', 0),
(6, 'C03', 'Ya', 100),
(7, 'C03', 'Tidak', 0),
(8, 'C04', 'Ya', 100),
(9, 'C04', 'Tidak', 0),
(10, 'C05', 'Ya', 100),
(11, 'C05', 'Tidak', 0),
(12, 'C06', 'Ya', 100),
(13, 'C06', 'Tidak', 0),
(15, 'C07', 'Tidak', 0),
(16, 'C08', 'Ya', 100),
(17, 'C08', 'Tidak', 0),
(18, 'C09', 'Ya', 100),
(19, 'C09', 'Tidak', 0),
(20, 'C10', 'Ya', 100),
(21, 'C10', 'Tidak', 0),
(22, 'C11', 'Ya', 100),
(23, 'C11', 'Tidak', 0),
(24, 'C12', 'Ya', 100),
(25, 'C12', 'Tidak', 0),
(26, 'C13', 'Ya', 100),
(27, 'C13', 'Tidak', 0),
(28, 'C14', 'Ya', 100),
(29, 'C14', 'Tidak', 0),
(30, 'C15', 'Ya', 100),
(31, 'C15', 'Tidak', 0),
(32, 'C16', 'Ya', 100),
(33, 'C16', 'Tidak', 0),
(34, 'C17', 'Ya', 100),
(35, 'C17', 'Tidak', 0),
(36, 'C18', 'Ya', 100),
(37, 'C18', 'Tidak', 0),
(38, 'C19', 'Ya', 100),
(39, 'C19', 'Tidak', 0),
(40, 'C20', 'Ya', 100),
(41, 'C20', 'Tidak', 0),
(42, 'C21', 'Ya', 100),
(43, 'C21', 'Tidak', 0),
(44, 'C22', 'Ya', 100),
(45, 'C22', 'Tidak', 0),
(46, 'C23', 'Ya', 100),
(47, 'C23', 'Tidak', 0),
(48, 'C24', 'Ya', 100),
(49, 'C24', 'Tidak', 0),
(50, 'C25', 'Ya', 100),
(51, 'C25', 'Tidak', 0),
(52, 'C26', 'Ya', 100),
(53, 'C26', 'Tidak', 0),
(54, 'C07', 'Ya', 100),
(100, 'C01', 'Hadir', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_alt`
--

CREATE TABLE IF NOT EXISTS `tb_data_alt` (
`kode_alt` int(11) NOT NULL,
  `kode_paket` varchar(16) DEFAULT NULL,
  `nama_alt` varchar(255) DEFAULT NULL,
  `nilai_alt` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_data_alt`
--

INSERT INTO `tb_data_alt` (`kode_alt`, `kode_paket`, `nama_alt`, `nilai_alt`) VALUES
(5, 'T001', 'PT. Jasa Mitra Manunggal', 1000000000),
(6, 'T001', 'PT. Nusvey Jo. PT. Nasuma Putra', 1000000000),
(7, 'T001', 'PT. Giritama Persada Jo. PT. Daya Kreasi', 1000000000),
(8, 'T001', 'PT. Giritama Persada ', 1000000000),
(9, 'T001', 'PT.CREMONAPRATAMA TOTAL ENGINEERING', 1000000000),
(10, 'T001', 'PT. ARSS BARU Jo. PT. Bermuda Konsultan', 1000000000),
(11, 'T001', 'PT. BLANTICKINDO ANEKA', 1000000000),
(12, 'T001', 'PT. ANUGRA KERIDA PRADANA', 1000000000),
(13, 'T001', 'PT. SARANA MULTIDAYA Jo. PT. ADIYA WIDYA JASA Jo. CV. UTTAKA ESSA', 1000000000),
(14, 'T001', 'PT. PURI DIMENSI Jo. PT. GARIS PUTIH SEJAJAR', 1000000000),
(15, 'T001', 'PT. INDEC INTERNUSA ', 1000000000),
(16, NULL, 'PT. INDEC INTERNUSA Jo. SECCONS', 1000000000),
(17, NULL, 'PT. GUTEG HARINDO. Jo. PT. ADHY DUTA PRIMA Jo. PT. TRIDUTA MITRAPARAMA', 1000000000),
(18, 'T001', 'PT. PERENTJANA DJAJA', 1000000000),
(19, NULL, 'PT. WIDYA GRAHA ASANAH', 1000000000),
(20, NULL, 'PT. MAXITECH UTAMA INDONESIA', 1000000000),
(21, NULL, 'PT. JECK & BROTHER''S', 1000000000),
(22, 'T001', 'PT. DISIPLAN KONSULTAN', 1000000000),
(23, 'T001', 'PT. WINSOLUSI KONSULTAN Jo. PT. BUMI PERSADA ENGINEERING Jo. PT. EIKELIA Jo. PT. ARCENDE', 1000000000),
(24, 'T001', 'PT. MULTI PHI BETA', 1000000000),
(25, 'T001', 'PT. CAKRA BUANA TOTAL MANDIRI KONSULTAN Jo. PT. PORTAL ENGINEERING PERKASA', 1000000000),
(26, 'T001', 'PT. AMSECON BERLIAN SEJAHTERA', 1000000000),
(27, 'T001', 'PT. REKAENAM GUNITA', 1000000000),
(28, 'T001', 'PT. NASUMA PUTRA Jo. PT. NUSVEY', 1000000000),
(29, 'T001', 'PT. TRIMANTRA', 1000000000),
(30, 'T001', 'PT. DARMA MITRA ANUGRAH', 1000000000),
(31, 'T001', 'PT. DELLASONTRA MOULDING INTERNASIONAL', 1000000000),
(32, 'T001', 'PT. MAZA PRADITA SARANA', 1000000000),
(33, 'T001', 'PT. PLANOSIP NUSANTARA ENGINEERING', 1000000000),
(34, 'T001', 'PT. PEMETA ENGINEERING SYSTEM', 1000000000),
(35, 'T001', 'PT. AKBARJAYA KONSULTAN Jo. PT.GUPETA WIRAUTAMA', 1000000000),
(36, 'T001', 'PT. PERANCANG ADINUSA', 1000000000),
(37, 'T001', 'PT. PURNAJASA BIMAPRATAMA', 1000000000),
(38, 'T001', 'PT. HEGAR JAYA', 1000000000),
(39, 'T001', 'PT. JASAKONS NUSAJAYA', 1000000000),
(40, 'T001', 'PT. POLA KENDALI NUSANTARA', 1000000000),
(41, 'T001', 'PT. INTIMULYA MULTI KENCANA', 1000000000),
(42, 'T001', 'PT. ARIA GRAHA', 1000000000),
(43, 'T001', 'PT. DWI ELTIS KONSULTAN', 1000000000),
(44, 'T001', 'PT. ARTHADEMO ENGINEERING KONSULTAN', 1000000000),
(45, 'T002', 'PERUSAHAAN A', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE IF NOT EXISTS `tb_kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(255) DEFAULT NULL,
  `bobot` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kode_kriteria`, `nama_kriteria`, `bobot`) VALUES
('C10', 'LDF - Form B', 0.03),
('C07', 'Form Isian 1 s.d 5', 0.03),
('C09', 'Ass - Form A', 0.03),
('C08', 'LDF - Form A', 0.03),
('C06', 'Surat Pernyataan Tidak Menuntut', 0.06),
('C05', 'Dokumen Perjanjian Kerjasama', 0.06),
('C04', 'Peserta Berbentuk Asosiasi', 0.06),
('C03', 'Memasukkan Dokumen', 0.06),
('C02', 'Mendownload Dokumen Kualifikasi', 0.06),
('C01', 'Kehadiran', 0.1),
('C11', 'Ass - Form B', 0.03),
('C12', 'LDF - Form D', 0.03),
('C13', 'Ass - Form D', 0.03),
('C14', 'LDF - Form E', 0.03),
('C15', 'Ass - Form E', 0.03),
('C16', 'LDF - Form F', 0.03),
('C17', 'Ass - Form F', 0.03),
('C18', 'LDF - Form G', 0.03),
('C19', 'Ass - Form G', 0.03),
('C20', 'LDF - Form H', 0.03),
('C21', 'Ass - Form H', 0.03),
('C22', 'LDF - Form I', 0.03),
('C23', 'Ass - Form I', 0.03),
('C24', 'LDF - Form J', 0.03),
('C25', 'Ass - Form J', 0.03),
('C26', 'Pernyataan Kebenaran Dokumen & Form', 0.03);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria1`
--

CREATE TABLE IF NOT EXISTS `tb_kriteria1` (
  `kode_kriteria1` varchar(16) NOT NULL,
  `nama_kriteria1` varchar(255) DEFAULT NULL,
  `bobot1` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria1`
--

INSERT INTO `tb_kriteria1` (`kode_kriteria1`, `nama_kriteria1`, `bobot1`) VALUES
('PQ1', 'Jumlah Pengalaman Sejenis', 50),
('PQ2', 'Nilai Pengalaman Tertinggi', 35),
('PQ3', 'Jumlah Pengalaman di Bengkulu ', 10),
('PQ4', 'Domisili Perusahaan', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria2`
--

CREATE TABLE IF NOT EXISTS `tb_kriteria2` (
  `kode_kriteria2` varchar(16) NOT NULL,
  `nama_kriteria2` varchar(255) DEFAULT NULL,
  `bobot2` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengalaman`
--

CREATE TABLE IF NOT EXISTS `tb_pengalaman` (
`kode_pengalaman` int(11) NOT NULL,
  `kode_ahli` int(11) DEFAULT NULL,
  `mulai` date DEFAULT NULL,
  `sampai` date DEFAULT NULL,
  `referensi` enum('Ada/Sesuai','Tidak Ada','','') DEFAULT NULL,
  `posisi` enum('Team Leader','Supervision Engineer','Setingkat PME/HE/BE/CI/QE','Setingkat Sub Proff') DEFAULT NULL,
  `lingkup` enum('Core Team','Supervisi','Perencanaan','Pelaksana') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rel_alternatif`
--

CREATE TABLE IF NOT EXISTS `tb_rel_alternatif` (
`ID` int(11) NOT NULL,
  `kode_alternatif` varchar(16) DEFAULT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `kode_crips` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=327 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rel_alternatif`
--

INSERT INTO `tb_rel_alternatif` (`ID`, `kode_alternatif`, `kode_kriteria`, `kode_crips`) VALUES
(127, '1234', 'C02', 5),
(126, '1234', 'C01', 100),
(125, '12345', 'C26', 52),
(124, '12345', 'C25', 50),
(131, '1234', 'C06', 12),
(130, '1234', 'C05', 10),
(129, '1234', 'C04', 8),
(128, '1234', 'C03', 7),
(135, '1234', 'C10', 20),
(134, '1234', 'C09', 18),
(133, '1234', 'C08', 16),
(132, '1234', 'C07', 15),
(136, '1234', 'C11', 22),
(138, '1234', 'C13', 26),
(137, '1234', 'C12', 24),
(142, '1234', 'C17', 34),
(141, '1234', 'C16', 32),
(140, '1234', 'C15', 30),
(139, '1234', 'C14', 28),
(121, '12345', 'C22', 44),
(122, '12345', 'C23', 46),
(123, '12345', 'C24', 48),
(118, '12345', 'C19', 38),
(119, '12345', 'C20', 40),
(120, '12345', 'C21', 42),
(115, '12345', 'C16', 32),
(116, '12345', 'C17', 34),
(117, '12345', 'C18', 36),
(112, '12345', 'C13', 26),
(113, '12345', 'C14', 28),
(114, '12345', 'C15', 30),
(109, '12345', 'C10', 20),
(110, '12345', 'C11', 22),
(111, '12345', 'C12', 24),
(106, '12345', 'C07', 54),
(107, '12345', 'C08', 16),
(108, '12345', 'C09', 18),
(103, '12345', 'C04', 8),
(104, '12345', 'C05', 10),
(105, '12345', 'C06', 12),
(100, '12345', 'C01', 100),
(101, '12345', 'C02', 4),
(102, '12345', 'C03', 6),
(143, '1234', 'C18', 36),
(144, '1234', 'C19', 38),
(145, '1234', 'C20', 40),
(146, '1234', 'C21', 42),
(147, '1234', 'C22', 44),
(148, '1234', 'C23', 46),
(149, '1234', 'C24', 48),
(150, '1234', 'C25', 50),
(151, '1234', 'C26', 52),
(155, 'T001', 'C02', 4),
(154, 'T001', 'C01', 2),
(156, 'T001', 'C03', 6),
(157, 'T001', 'C04', 8),
(158, 'T001', 'C05', 10),
(159, 'T001', 'C06', 12),
(160, 'T001', 'C07', 15),
(161, 'T001', 'C08', 16),
(162, 'T001', 'C09', 18),
(163, 'T001', 'C10', 20),
(164, 'T001', 'C11', 22),
(165, 'T001', 'C12', 24),
(166, 'T001', 'C13', 26),
(167, 'T001', 'C14', 28),
(168, 'T001', 'C15', 30),
(169, 'T001', 'C16', 32),
(170, 'T001', 'C17', 34),
(171, 'T001', 'C18', 36),
(172, 'T001', 'C19', 38),
(173, 'T001', 'C20', 40),
(174, 'T001', 'C21', 42),
(175, 'T001', 'C22', 44),
(176, 'T001', 'C23', 46),
(177, 'T001', 'C24', 48),
(178, 'T001', 'C25', 50),
(179, 'T001', 'C26', 52),
(185, 'ds', 'C03', 6),
(184, 'ds', 'C02', 4),
(183, 'ds', 'C01', 2),
(186, 'ds', 'C04', 8),
(187, 'ds', 'C05', 10),
(188, 'ds', 'C06', 12),
(189, 'ds', 'C07', 15),
(190, 'ds', 'C08', 16),
(191, 'ds', 'C09', 18),
(192, 'ds', 'C10', 20),
(193, 'ds', 'C11', 22),
(194, 'ds', 'C12', 24),
(195, 'ds', 'C13', 26),
(196, 'ds', 'C14', 28),
(197, 'ds', 'C15', 30),
(198, 'ds', 'C16', 32),
(199, 'ds', 'C17', 34),
(200, 'ds', 'C18', 36),
(201, 'ds', 'C19', 38),
(202, 'ds', 'C20', 40),
(203, 'ds', 'C21', 42),
(204, 'ds', 'C22', 44),
(205, 'ds', 'C23', 46),
(206, 'ds', 'C24', 48),
(207, 'ds', 'C25', 50),
(208, 'ds', 'C26', 52),
(209, 's', 'C01', 2),
(210, 's', 'C02', 4),
(211, 's', 'C03', 6),
(212, 's', 'C04', 8),
(213, 's', 'C05', 10),
(214, 's', 'C06', 12),
(215, 's', 'C07', 15),
(216, 's', 'C08', 16),
(217, 's', 'C09', 18),
(218, 's', 'C10', 20),
(219, 's', 'C11', 22),
(220, 's', 'C12', 24),
(221, 's', 'C13', 26),
(222, 's', 'C14', 28),
(223, 's', 'C15', 30),
(224, 's', 'C16', 32),
(225, 's', 'C17', 34),
(226, 's', 'C18', 36),
(227, 's', 'C19', 38),
(228, 's', 'C20', 40),
(229, 's', 'C21', 42),
(230, 's', 'C22', 44),
(231, 's', 'C23', 46),
(232, 's', 'C24', 48),
(233, 's', 'C25', 50),
(234, 's', 'C26', 52),
(235, 'w', 'C01', 2),
(236, 'w', 'C02', 4),
(237, 'w', 'C03', 6),
(238, 'w', 'C04', 8),
(239, 'w', 'C05', 10),
(240, 'w', 'C06', 12),
(241, 'w', 'C07', 15),
(242, 'w', 'C08', 16),
(243, 'w', 'C09', 18),
(244, 'w', 'C10', 20),
(245, 'w', 'C11', 22),
(246, 'w', 'C12', 24),
(247, 'w', 'C13', 26),
(248, 'w', 'C14', 28),
(249, 'w', 'C15', 30),
(250, 'w', 'C16', 32),
(251, 'w', 'C17', 34),
(252, 'w', 'C18', 36),
(253, 'w', 'C19', 38),
(254, 'w', 'C20', 40),
(255, 'w', 'C21', 42),
(256, 'w', 'C22', 44),
(257, 'w', 'C23', 46),
(258, 'w', 'C24', 48),
(259, 'w', 'C25', 50),
(260, 'w', 'C26', 52),
(261, 'to', 'C01', 100),
(262, 'to', 'C02', 4),
(263, 'to', 'C03', 6),
(264, 'to', 'C04', 8),
(265, 'to', 'C05', 10),
(266, 'to', 'C06', 12),
(267, 'to', 'C07', 15),
(268, 'to', 'C08', 16),
(269, 'to', 'C09', 18),
(270, 'to', 'C10', 20),
(271, 'to', 'C11', 22),
(272, 'to', 'C12', 24),
(273, 'to', 'C13', 26),
(274, 'to', 'C14', 28),
(275, 'to', 'C15', 30),
(276, 'to', 'C16', 32),
(277, 'to', 'C17', 34),
(278, 'to', 'C18', 36),
(279, 'to', 'C19', 38),
(280, 'to', 'C20', 40),
(281, 'to', 'C21', 42),
(282, 'to', 'C22', 44),
(283, 'to', 'C23', 46),
(284, 'to', 'C24', 48),
(285, 'to', 'C25', 50),
(286, 'to', 'C26', 52),
(301, 'hk', 'C01', 2),
(302, 'hk', 'C02', 4),
(303, 'hk', 'C03', 6),
(304, 'hk', 'C04', 8),
(305, 'hk', 'C05', 10),
(306, 'hk', 'C06', 12),
(307, 'hk', 'C07', 15),
(308, 'hk', 'C08', 16),
(309, 'hk', 'C09', 18),
(310, 'hk', 'C10', 20),
(311, 'hk', 'C11', 22),
(312, 'hk', 'C12', 24),
(313, 'hk', 'C13', 26),
(314, 'hk', 'C14', 28),
(315, 'hk', 'C15', 30),
(316, 'hk', 'C16', 32),
(317, 'hk', 'C17', 34),
(318, 'hk', 'C18', 36),
(319, 'hk', 'C19', 38),
(320, 'hk', 'C20', 40),
(321, 'hk', 'C21', 42),
(322, 'hk', 'C22', 44),
(323, 'hk', 'C23', 46),
(324, 'hk', 'C24', 48),
(325, 'hk', 'C25', 50),
(326, 'hk', 'C26', 52);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rel_alternatif1`
--

CREATE TABLE IF NOT EXISTS `tb_rel_alternatif1` (
  `ID1` int(11) NOT NULL,
  `kode_alternatif1` varchar(16) DEFAULT NULL,
  `kode_kriteria1` varchar(16) DEFAULT NULL,
  `kode_crips1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rel_alternatif1`
--

INSERT INTO `tb_rel_alternatif1` (`ID1`, `kode_alternatif1`, `kode_kriteria1`, `kode_crips1`) VALUES
(0, 'bjk', 'PQ1', 40),
(100, '12345', 'C01', 100),
(101, '12345', 'C02', 4),
(102, '12345', 'C03', 6),
(103, '12345', 'C04', 8),
(104, '12345', 'C05', 10),
(105, '12345', 'C06', 12),
(106, '12345', 'C07', 54),
(107, '12345', 'C08', 16),
(108, '12345', 'C09', 18),
(109, '12345', 'C10', 20),
(110, '12345', 'C11', 22),
(111, '12345', 'C12', 24),
(112, '12345', 'C13', 26),
(113, '12345', 'C14', 28),
(114, '12345', 'C15', 30),
(115, '12345', 'C16', 32),
(116, '12345', 'C17', 34),
(117, '12345', 'C18', 36),
(118, '12345', 'C19', 38),
(119, '12345', 'C20', 40),
(120, '12345', 'C21', 42),
(121, '12345', 'C22', 44),
(122, '12345', 'C23', 46),
(123, '12345', 'C24', 48),
(124, '12345', 'C25', 50),
(125, '12345', 'C26', 52),
(126, '1234', 'C01', 100),
(127, '1234', 'C02', 5),
(128, '1234', 'C03', 7),
(129, '1234', 'C04', 8),
(130, '1234', 'C05', 10),
(131, '1234', 'C06', 12),
(132, '1234', 'C07', 15),
(133, '1234', 'C08', 16),
(134, '1234', 'C09', 18),
(135, '1234', 'C10', 20),
(136, '1234', 'C11', 22),
(137, '1234', 'C12', 24),
(138, '1234', 'C13', 26),
(139, '1234', 'C14', 28),
(140, '1234', 'C15', 30),
(141, '1234', 'C16', 32),
(142, '1234', 'C17', 34),
(143, '1234', 'C18', 36),
(144, '1234', 'C19', 38),
(145, '1234', 'C20', 40),
(146, '1234', 'C21', 42),
(147, '1234', 'C22', 44),
(148, '1234', 'C23', 46),
(149, '1234', 'C24', 48),
(150, '1234', 'C25', 50),
(151, '1234', 'C26', 52),
(154, 'T001', 'C01', 2),
(155, 'T001', 'C02', 4),
(156, 'T001', 'C03', 6),
(157, 'T001', 'C04', 8),
(158, 'T001', 'C05', 10),
(159, 'T001', 'C06', 12),
(160, 'T001', 'C07', 15),
(161, 'T001', 'C08', 16),
(162, 'T001', 'C09', 18),
(163, 'T001', 'C10', 20),
(164, 'T001', 'C11', 22),
(165, 'T001', 'C12', 24),
(166, 'T001', 'C13', 26),
(167, 'T001', 'C14', 28),
(168, 'T001', 'C15', 30),
(169, 'T001', 'C16', 32),
(170, 'T001', 'C17', 34),
(171, 'T001', 'C18', 36),
(172, 'T001', 'C19', 38),
(173, 'T001', 'C20', 40),
(174, 'T001', 'C21', 42),
(175, 'T001', 'C22', 44),
(176, 'T001', 'C23', 46),
(177, 'T001', 'C24', 48),
(178, 'T001', 'C25', 50),
(179, 'T001', 'C26', 52),
(183, 'ds', 'C01', 2),
(184, 'ds', 'C02', 4),
(185, 'ds', 'C03', 6),
(186, 'ds', 'C04', 8),
(187, 'ds', 'C05', 10),
(188, 'ds', 'C06', 12),
(189, 'ds', 'C07', 15),
(190, 'ds', 'C08', 16),
(191, 'ds', 'C09', 18),
(192, 'ds', 'C10', 20),
(193, 'ds', 'C11', 22),
(194, 'ds', 'C12', 24),
(195, 'ds', 'C13', 26),
(196, 'ds', 'C14', 28),
(197, 'ds', 'C15', 30),
(198, 'ds', 'C16', 32),
(199, 'ds', 'C17', 34),
(200, 'ds', 'C18', 36),
(201, 'ds', 'C19', 38),
(202, 'ds', 'C20', 40),
(203, 'ds', 'C21', 42),
(204, 'ds', 'C22', 44),
(205, 'ds', 'C23', 46),
(206, 'ds', 'C24', 48),
(207, 'ds', 'C25', 50),
(208, 'ds', 'C26', 52),
(209, 's', 'C01', 2),
(210, 's', 'C02', 4),
(211, 's', 'C03', 6),
(212, 's', 'C04', 8),
(213, 's', 'C05', 10),
(214, 's', 'C06', 12),
(215, 's', 'C07', 15),
(216, 's', 'C08', 16),
(217, 's', 'C09', 18),
(218, 's', 'C10', 20),
(219, 's', 'C11', 22),
(220, 's', 'C12', 24),
(221, 's', 'C13', 26),
(222, 's', 'C14', 28),
(223, 's', 'C15', 30),
(224, 's', 'C16', 32),
(225, 's', 'C17', 34),
(226, 's', 'C18', 36),
(227, 's', 'C19', 38),
(228, 's', 'C20', 40),
(229, 's', 'C21', 42),
(230, 's', 'C22', 44),
(231, 's', 'C23', 46),
(232, 's', 'C24', 48),
(233, 's', 'C25', 50),
(234, 's', 'C26', 52),
(235, 'w', 'C01', 2),
(236, 'w', 'C02', 4),
(237, 'w', 'C03', 6),
(238, 'w', 'C04', 8),
(239, 'w', 'C05', 10),
(240, 'w', 'C06', 12),
(241, 'w', 'C07', 15),
(242, 'w', 'C08', 16),
(243, 'w', 'C09', 18),
(244, 'w', 'C10', 20),
(245, 'w', 'C11', 22),
(246, 'w', 'C12', 24),
(247, 'w', 'C13', 26),
(248, 'w', 'C14', 28),
(249, 'w', 'C15', 30),
(250, 'w', 'C16', 32),
(251, 'w', 'C17', 34),
(252, 'w', 'C18', 36),
(253, 'w', 'C19', 38),
(254, 'w', 'C20', 40),
(255, 'w', 'C21', 42),
(256, 'w', 'C22', 44),
(257, 'w', 'C23', 46),
(258, 'w', 'C24', 48),
(259, 'w', 'C25', 50),
(260, 'w', 'C26', 52);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rel_alternatif2`
--

CREATE TABLE IF NOT EXISTS `tb_rel_alternatif2` (
  `ID2` int(11) NOT NULL DEFAULT '0',
  `kode_alternatif2` varchar(16) DEFAULT NULL,
  `kode_kriteria2` varchar(16) DEFAULT NULL,
  `kode_crips2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rel_alternatif2`
--

INSERT INTO `tb_rel_alternatif2` (`ID2`, `kode_alternatif2`, `kode_kriteria2`, `kode_crips2`) VALUES
(205, 'ds', 'C23', 46),
(206, 'ds', 'C24', 48),
(207, 'ds', 'C25', 50),
(208, 'ds', 'C26', 52),
(209, 's', 'C01', 2),
(210, 's', 'C02', 4),
(211, 's', 'C03', 6),
(212, 's', 'C04', 8),
(213, 's', 'C05', 10),
(214, 's', 'C06', 12),
(215, 's', 'C07', 15),
(216, 's', 'C08', 16),
(217, 's', 'C09', 18),
(218, 's', 'C10', 20),
(219, 's', 'C11', 22),
(220, 's', 'C12', 24),
(221, 's', 'C13', 26),
(222, 's', 'C14', 28),
(223, 's', 'C15', 30),
(224, 's', 'C16', 32),
(225, 's', 'C17', 34),
(226, 's', 'C18', 36),
(227, 's', 'C19', 38),
(228, 's', 'C20', 40),
(229, 's', 'C21', 42),
(230, 's', 'C22', 44),
(231, 's', 'C23', 46),
(232, 's', 'C24', 48),
(233, 's', 'C25', 50),
(234, 's', 'C26', 52),
(235, 'w', 'C01', 2),
(236, 'w', 'C02', 4),
(237, 'w', 'C03', 6),
(238, 'w', 'C04', 8),
(239, 'w', 'C05', 10),
(240, 'w', 'C06', 12),
(241, 'w', 'C07', 15),
(242, 'w', 'C08', 16),
(243, 'w', 'C09', 18),
(244, 'w', 'C10', 20),
(245, 'w', 'C11', 22),
(246, 'w', 'C12', 24),
(247, 'w', 'C13', 26),
(248, 'w', 'C14', 28),
(249, 'w', 'C15', 30),
(250, 'w', 'C16', 32),
(251, 'w', 'C17', 34),
(252, 'w', 'C18', 36),
(253, 'w', 'C19', 38),
(254, 'w', 'C20', 40),
(255, 'w', 'C21', 42),
(256, 'w', 'C22', 44),
(257, 'w', 'C23', 46),
(258, 'w', 'C24', 48),
(259, 'w', 'C25', 50),
(260, 'w', 'C26', 52),
(261, 'to', 'C01', 100),
(262, 'to', 'C02', 4),
(263, 'to', 'C03', 6),
(264, 'to', 'C04', 8),
(265, 'to', 'C05', 10),
(266, 'to', 'C06', 12),
(267, 'to', 'C07', 15),
(268, 'to', 'C08', 16),
(269, 'to', 'C09', 18),
(270, 'to', 'C10', 20),
(271, 'to', 'C11', 22),
(272, 'to', 'C12', 24),
(273, 'to', 'C13', 26),
(274, 'to', 'C14', 28),
(275, 'to', 'C15', 30),
(276, 'to', 'C16', 32),
(277, 'to', 'C17', 34),
(278, 'to', 'C18', 36),
(279, 'to', 'C19', 38),
(280, 'to', 'C20', 40),
(281, 'to', 'C21', 42),
(282, 'to', 'C22', 44),
(283, 'to', 'C23', 46),
(284, 'to', 'C24', 48),
(285, 'to', 'C25', 50),
(286, 'to', 'C26', 52);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tender`
--

CREATE TABLE IF NOT EXISTS `tb_tender` (
  `kode_paket` varchar(16) NOT NULL,
  `nama_paket` varchar(255) DEFAULT NULL,
  `nilai_paket` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tender`
--

INSERT INTO `tb_tender` (`kode_paket`, `nama_paket`, `nilai_paket`) VALUES
('T001', 'Core Team Konsultan P2JN Bengkulu', 3076920000),
('T002', 'Pengawasan Teknis(PPK1) Preservasi Jalan & Pelaksanaan Jembatan BTS.SUMBAR-MUKO-MUKO-SEBELAT', 1775730000),
('T003', 'Pengawasan Teknis(PPK-02) Preservasi Jalan & Pelaksanaan Jembatan SEBELAT-BINTUNAN-KERKAP-WR.SUPRATMAN', 3054590000),
('T1', 'D', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
 ADD PRIMARY KEY (`user`);

--
-- Indexes for table `tb_ahli`
--
ALTER TABLE `tb_ahli`
 ADD PRIMARY KEY (`kode_ahli`), ADD KEY `kode_alt` (`kode_alt`);

--
-- Indexes for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
 ADD PRIMARY KEY (`kode_alternatif`);

--
-- Indexes for table `tb_alternatif1`
--
ALTER TABLE `tb_alternatif1`
 ADD PRIMARY KEY (`kode_alternatif1`);

--
-- Indexes for table `tb_alternatif2`
--
ALTER TABLE `tb_alternatif2`
 ADD PRIMARY KEY (`kode_alternatif2`);

--
-- Indexes for table `tb_crips`
--
ALTER TABLE `tb_crips`
 ADD PRIMARY KEY (`kode_crips`);

--
-- Indexes for table `tb_crips2`
--
ALTER TABLE `tb_crips2`
 ADD PRIMARY KEY (`kode_crips2`);

--
-- Indexes for table `tb_data_alt`
--
ALTER TABLE `tb_data_alt`
 ADD PRIMARY KEY (`kode_alt`), ADD KEY `kode_paket` (`kode_paket`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
 ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `tb_kriteria1`
--
ALTER TABLE `tb_kriteria1`
 ADD PRIMARY KEY (`kode_kriteria1`);

--
-- Indexes for table `tb_kriteria2`
--
ALTER TABLE `tb_kriteria2`
 ADD PRIMARY KEY (`kode_kriteria2`);

--
-- Indexes for table `tb_pengalaman`
--
ALTER TABLE `tb_pengalaman`
 ADD PRIMARY KEY (`kode_pengalaman`), ADD KEY `kode_ahli` (`kode_ahli`);

--
-- Indexes for table `tb_rel_alternatif`
--
ALTER TABLE `tb_rel_alternatif`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_rel_alternatif1`
--
ALTER TABLE `tb_rel_alternatif1`
 ADD PRIMARY KEY (`ID1`);

--
-- Indexes for table `tb_rel_alternatif2`
--
ALTER TABLE `tb_rel_alternatif2`
 ADD PRIMARY KEY (`ID2`);

--
-- Indexes for table `tb_tender`
--
ALTER TABLE `tb_tender`
 ADD PRIMARY KEY (`kode_paket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_ahli`
--
ALTER TABLE `tb_ahli`
MODIFY `kode_ahli` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_crips`
--
ALTER TABLE `tb_crips`
MODIFY `kode_crips` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `tb_data_alt`
--
ALTER TABLE `tb_data_alt`
MODIFY `kode_alt` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `tb_pengalaman`
--
ALTER TABLE `tb_pengalaman`
MODIFY `kode_pengalaman` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_rel_alternatif`
--
ALTER TABLE `tb_rel_alternatif`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=327;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_ahli`
--
ALTER TABLE `tb_ahli`
ADD CONSTRAINT `tb_ahli_ibfk_1` FOREIGN KEY (`kode_alt`) REFERENCES `tb_data_alt` (`kode_alt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_data_alt`
--
ALTER TABLE `tb_data_alt`
ADD CONSTRAINT `tb_data_alt_ibfk_1` FOREIGN KEY (`kode_paket`) REFERENCES `tb_tender` (`kode_paket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pengalaman`
--
ALTER TABLE `tb_pengalaman`
ADD CONSTRAINT `tb_pengalaman_ibfk_2` FOREIGN KEY (`kode_ahli`) REFERENCES `tb_ahli` (`kode_ahli`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
