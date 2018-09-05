-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2017 at 03:53 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'surya', '2fea6c02a98d6318d44cdf150775f07a');

-- --------------------------------------------------------

--
-- Table structure for table `coa`
--

CREATE TABLE IF NOT EXISTS `coa` (
`id_coa` int(11) NOT NULL,
  `code_akun` varchar(10) NOT NULL,
  `nama_akun` varchar(20) NOT NULL,
  `code_coa` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coa`
--

INSERT INTO `coa` (`id_coa`, `code_akun`, `nama_akun`, `code_coa`) VALUES
(1, '1.1', 'Kas', 1),
(2, '2.1', 'Utang', 2),
(3, '5.1', 'Beban Gaji', 5),
(4, '3.1', 'Modal', 3),
(6, '4.1', 'Pendapatan harian', 4),
(7, '6.1', 'Pengambilan modal', 6),
(8, '5.2', 'Beban Listrik', 5),
(9, '1.2', 'Perlengkapan', 1),
(10, '1.3', 'Peralatan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dtl_transaksi`
--

CREATE TABLE IF NOT EXISTS `dtl_transaksi` (
`id_dtl_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `code_akun` varchar(11) NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=272 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtl_transaksi`
--

INSERT INTO `dtl_transaksi` (`id_dtl_transaksi`, `id_transaksi`, `code_akun`, `debit`, `kredit`) VALUES
(88, 3, '1.2', 706000, 0),
(89, 3, '1.1', 0, 706000),
(92, 5, '1.2', 227000, 0),
(93, 5, '1.1', 0, 227000),
(98, 4, '1.1', 2814900, 0),
(99, 4, '4.1', 0, 2814900),
(100, 6, '1.2', 929000, 0),
(101, 6, '1.1', 0, 929000),
(102, 7, '1.1', 6286500, 0),
(103, 7, '4.1', 0, 6286500),
(104, 8, '1.2', 6219600, 0),
(105, 8, '1.1', 0, 6219600),
(106, 9, '1.1', 7082300, 0),
(107, 9, '4.1', 0, 7082300),
(108, 10, '1.2', 12567300, 0),
(109, 10, '1.1', 0, 12567300),
(110, 11, '1.1', 5410000, 0),
(111, 11, '4.1', 0, 5410000),
(112, 12, '1.2', 2372900, 0),
(113, 12, '1.1', 0, 2372900),
(114, 13, '1.1', 5347200, 0),
(115, 13, '4.1', 0, 5347200),
(118, 14, '1.2', 1082000, 0),
(119, 14, '1.1', 0, 1082000),
(120, 15, '1.1', 7458400, 0),
(121, 15, '4.1', 0, 7458400),
(122, 16, '1.2', 885000, 0),
(123, 16, '1.1', 0, 885000),
(124, 17, '1.1', 5056700, 0),
(125, 17, '4.1', 0, 5056700),
(126, 18, '1.2', 4295200, 0),
(127, 18, '1.1', 0, 4295200),
(128, 19, '1.1', 3158000, 0),
(129, 19, '4.1', 0, 3158000),
(130, 20, '1.2', 6516000, 0),
(131, 20, '1.1', 0, 6516000),
(132, 21, '1.1', 7055400, 0),
(133, 21, '4.1', 0, 7055400),
(134, 22, '1.2', 1430200, 0),
(135, 22, '1.1', 0, 1430200),
(136, 23, '1.1', 3976700, 0),
(137, 23, '4.1', 0, 3976700),
(138, 24, '1.2', 749825, 0),
(139, 24, '1.1', 0, 749825),
(140, 25, '1.1', 4186600, 0),
(141, 25, '4.1', 0, 4186600),
(142, 26, '1.2', 1080500, 0),
(143, 26, '1.1', 0, 1080500),
(144, 27, '1.1', 3424300, 0),
(145, 27, '4.1', 0, 3424300),
(146, 28, '1.2', 545000, 0),
(147, 28, '1.1', 0, 545000),
(148, 29, '1.1', 59000400, 0),
(149, 29, '4.1', 0, 59000400),
(150, 30, '1.2', 2199800, 0),
(151, 30, '1.1', 0, 2199800),
(152, 31, '1.1', 3057800, 0),
(153, 31, '4.1', 0, 3057800),
(154, 32, '1.2', 242500, 0),
(155, 32, '1.1', 0, 242500),
(156, 33, '1.1', 5640800, 0),
(157, 33, '4.1', 0, 5640800),
(158, 34, '1.2', 7249000, 0),
(159, 34, '1.1', 0, 7249000),
(160, 35, '1.1', 3779600, 0),
(161, 35, '4.1', 0, 3779600),
(162, 36, '1.2', 2624100, 0),
(163, 36, '1.1', 0, 2624100),
(164, 37, '1.1', 3147100, 0),
(165, 37, '4.1', 0, 3147100),
(166, 38, '1.2', 2788000, 0),
(167, 38, '1.1', 0, 2788000),
(168, 39, '1.1', 4140400, 0),
(169, 39, '4.1', 0, 4140400),
(170, 40, '1.2', 569500, 0),
(171, 40, '1.1', 0, 569500),
(172, 41, '1.1', 3186700, 0),
(173, 41, '4.1', 0, 3186700),
(174, 42, '1.2', 1470600, 0),
(175, 42, '1.1', 0, 1470600),
(176, 43, '1.1', 5357000, 0),
(177, 43, '4.1', 0, 5357000),
(178, 44, '1.2', 784000, 0),
(179, 44, '1.1', 0, 784000),
(180, 45, '1.1', 4485800, 0),
(181, 45, '4.1', 0, 4485800),
(182, 46, '1.2', 586800, 0),
(183, 46, '1.1', 0, 586800),
(184, 47, '1.1', 3757600, 0),
(185, 47, '4.1', 0, 3757600),
(186, 48, '1.2', 1580400, 0),
(187, 48, '1.1', 0, 1580400),
(188, 49, '1.1', 5900400, 0),
(189, 49, '4.1', 0, 5900400),
(190, 50, '1.2', 7403000, 0),
(191, 50, '1.1', 0, 7403000),
(192, 51, '1.1', 2670800, 0),
(193, 51, '4.1', 0, 2670800),
(198, 52, '1.2', 1381000, 0),
(199, 52, '1.1', 0, 1381000),
(200, 53, '1.1', 5686600, 0),
(201, 53, '4.1', 0, 5686600),
(202, 54, '1.2', 684500, 0),
(203, 54, '1.1', 0, 684500),
(204, 55, '1.1', 4832300, 0),
(205, 55, '4.1', 0, 4832300),
(206, 56, '1.2', 1107100, 0),
(207, 56, '1.1', 0, 1107100),
(208, 57, '1.1', 6849900, 0),
(209, 57, '4.1', 0, 6849900),
(210, 58, '1.2', 730800, 0),
(211, 58, '1.1', 0, 730800),
(212, 59, '1.1', 7375700, 0),
(213, 59, '4.1', 0, 7375700),
(214, 60, '1.2', 6724500, 0),
(215, 60, '1.1', 0, 6724500),
(216, 61, '1.1', 5162600, 0),
(217, 61, '4.1', 0, 5162600),
(218, 62, '1.2', 1461700, 0),
(219, 62, '1.1', 0, 1461700),
(220, 63, '1.1', 1567500, 0),
(221, 63, '4.1', 0, 1567500),
(222, 64, '5.1', 4769000, 0),
(223, 64, '1.1', 0, 4769000),
(224, 65, '5.1', 1861000, 0),
(225, 65, '1.1', 0, 1861000),
(226, 66, '5.1', 1861000, 0),
(227, 66, '1.1', 0, 1861000),
(228, 67, '5.1', 2161000, 0),
(229, 67, '1.1', 0, 2161000),
(230, 68, '5.1', 5469000, 0),
(231, 68, '1.1', 0, 5469000),
(232, 69, '5.1', 2161000, 0),
(233, 69, '1.1', 0, 2161000),
(234, 70, '5.1', 1861000, 0),
(235, 70, '1.1', 0, 1861000),
(236, 71, '5.1', 2061000, 0),
(237, 71, '1.1', 0, 2061000),
(238, 72, '5.1', 1761000, 0),
(239, 72, '1.1', 0, 1761000),
(240, 73, '5.1', 1961000, 0),
(241, 73, '1.1', 0, 1961000),
(242, 74, '5.1', 1961000, 0),
(243, 74, '1.1', 0, 1961000),
(244, 75, '5.1', 1961000, 0),
(245, 75, '1.1', 0, 1961000),
(246, 76, '5.1', 1761000, 0),
(247, 76, '1.1', 0, 1761000),
(260, 2, '1.1', 452060, 0),
(261, 2, '4.1', 0, 452060),
(262, 1, '1.1', 19330800, 0),
(263, 1, '4.1', 0, 19330800),
(264, 79, '5.1', 2000000, 0),
(265, 79, '1.1', 0, 2000000),
(266, 78, '5.1', 1500000, 0),
(267, 78, '1.1', 0, 1500000),
(268, 77, '5.1', 1000000, 0),
(269, 77, '1.1', 0, 1000000),
(270, 80, '1.1', 10000000, 0),
(271, 80, '4.1', 0, 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE IF NOT EXISTS `gaji` (
`id_gaji` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `gaji_bulan` varchar(20) NOT NULL,
  `total_gaji` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `id_karyawan`, `tanggal_bayar`, `gaji_bulan`, `total_gaji`) VALUES
(1, 0, '0000-00-00', 'Januari', 20000),
(2, 6, '1970-01-01', 'Januari', 20000),
(3, 6, '1970-01-01', 'Januari', 22222),
(4, 6, '2017-02-25', 'Januari', 2222),
(5, 6, '1970-01-01', 'Maret', 999),
(6, 11, '2017-01-29', 'Januari', 4769000),
(8, 13, '2017-01-29', 'Januari', 1861000),
(10, 12, '2017-01-29', 'Januari', 5469000),
(11, 15, '2017-01-29', 'Januari', 2161000),
(12, 14, '2017-01-29', 'Januari', 1861000),
(13, 16, '2017-01-29', 'Januari', 2061000),
(14, 17, '2017-01-29', 'Januari', 1761000),
(15, 18, '2017-01-29', 'Januari', 1961000),
(16, 19, '2017-01-29', 'Januari', 1961000),
(17, 20, '2017-01-29', 'Januari', 1961000),
(18, 21, '2017-01-29', 'Januari', 1761000),
(19, 22, '2017-01-29', 'Januari', 800000),
(20, 23, '2017-01-29', 'Januari', 1800000),
(21, 24, '2017-01-29', 'Januari', 1800000);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
`id_karyawan` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `nama_karyawan` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `tgl` varchar(10) NOT NULL,
  `no_tlp` int(11) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `alamat`, `tgl`, `no_tlp`, `jabatan`, `status`, `password`) VALUES
(11, 1, 'Agus', 'Sanur', '03/03/1988', 2147483647, 'Manager', 'Aktif', 'AGUS'),
(12, 2, 'Pak Nyoman', 'Sanur', '31/12/2016', 2147483647, 'Chef', 'Aktif', 'NYOMAN'),
(13, 3, 'Sofi', 'Sanur', '12/04/2017', 2147483647, 'Waitress', 'Aktif', 'SOFI'),
(14, 4, 'Fitri', 'Sanur', '14/12/2016', 2147483647, 'Waitress', 'Aktif', 'FITRI'),
(15, 5, 'Kadek Dewi', 'Sanur', '23/11/2016', 2147483647, 'Waitress', 'Aktif', 'DEWI'),
(16, 6, 'Rafiatno', 'Sanur', '17/08/2016', 2147483647, 'Manager', 'Aktif', 'RAFIATNO'),
(17, 7, 'Wayan Adnyana', 'Sanur', '13/09/2016', 2147483647, 'Waiter', 'Aktif', 'ADNYANA'),
(18, 8, 'Komang Sudani', 'Sanur', '16/06/2016', 2147483647, 'Manager', 'Aktif', 'SUDANI'),
(19, 9, 'Nyoman Sudewi', 'Sanur', '09/03/2016', 2147483647, 'Manager', 'Aktif', 'SUDEWI'),
(20, 10, 'Gung De', 'Sanur', '13/03/2017', 2147483647, 'Kitchen', 'Aktif', 'GUNGDE'),
(21, 11, 'Putu Dika', 'Sanur', '08/12/2015', 2147483647, 'Kitchen', 'Aktif', 'DIKA'),
(22, 12, 'Kadek Dika', 'Sanur', '13/03/2017', 2147483647, 'Kitchen', 'Aktif', 'KADEK'),
(23, 13, 'Kadek S', 'Sanur', '13/03/2017', 2147483647, 'Cashier', 'Aktif', 'KADEKS'),
(24, 14, 'I Wayan Brindawan', 'Jl. Anyelir GG Rama II No 6', '20/11/1992', 361248307, 'Cashier', 'Aktif', 'BIBIN');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE IF NOT EXISTS `owner` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `username`, `password`) VALUES
(1, 'owner', '72122ce96bfec66e2396d2e25225d70a');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` text NOT NULL,
  `total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl`, `keterangan`, `total`) VALUES
(1, '2016-12-31', 'Penjualan', '19330800'),
(2, '2017-01-01', 'Penjualan', '452060'),
(3, '2017-01-01', 'Pembelian', '706000'),
(4, '2017-01-02', 'Penjualan', '2814900'),
(5, '2017-01-02', 'Pembelian', '227000'),
(6, '2017-01-03', 'Pembelian', '929000'),
(7, '2017-01-03', 'Penjualan', '6286500'),
(8, '2017-01-04', 'Pembelian', '6219600'),
(9, '2017-01-04', 'Penjualan', '7082300'),
(10, '2017-01-05', 'Pembelian', '12567300'),
(11, '2017-01-05', 'Penjualan', '5410000'),
(12, '2017-01-06', 'Pembelian', '2372900'),
(13, '2017-01-06', 'Penjualan', '5347200'),
(14, '2017-01-07', 'Pembelian', '1082000'),
(15, '2017-01-07', 'Penjualan', '7458400'),
(16, '2017-01-08', 'Pembelian', '885000'),
(17, '2017-01-08', 'Penjualan', '5056700'),
(18, '2017-01-09', 'Pembelian', '4295200'),
(19, '2017-01-09', 'Penjualan', '3158000'),
(20, '2017-01-10', 'Pembelian', '6516000'),
(21, '2017-01-10', 'Penjualan', '7055400'),
(22, '2017-01-11', 'Pembelian', '1430200'),
(23, '2017-01-11', 'Penjualan', '3976700'),
(24, '2017-01-12', 'Pembelian', '749825'),
(25, '2017-01-12', 'Penjualan', '4186600'),
(26, '2017-01-13', 'Pembelian', '1080500'),
(27, '2017-01-13', 'Penjualan', '3424300'),
(28, '2017-01-14', 'Pembelian', '545000'),
(29, '2017-01-14', 'Penjualan', '59000400'),
(30, '2017-01-15', 'Pembelian', '2199800'),
(31, '2017-01-15', 'Penjualan', '3057800'),
(32, '2017-01-16', 'Pembelian', '242500'),
(33, '2017-01-18', 'Penjualan', '5640800'),
(34, '2017-01-17', 'Pembelian', '7249000'),
(35, '2017-01-17', 'Penjualan', '3779600'),
(36, '2017-01-18', 'Pembelian', '2624100'),
(37, '2017-01-18', 'Penjualan', '3147100'),
(38, '2017-01-19', 'Pembelian', '2788000'),
(39, '2017-01-19', 'Penjualan', '4140400'),
(40, '2017-01-20', 'Pembelian', '569500'),
(41, '2017-01-20', 'Penjualan', '3186700'),
(42, '2017-01-21', 'Pembelian', '1470600'),
(43, '2017-01-21', 'Penjualan', '5357000'),
(44, '2017-01-22', 'Pembelian', '784000'),
(45, '2017-01-22', 'Penjualan', '4485800'),
(46, '2017-01-23', 'Pembelian', '586800'),
(47, '2017-01-23', 'Penjualan', '3757600'),
(48, '2017-01-24', 'Pembelian', '1580400'),
(49, '2017-01-24', 'Penjualan', '5900400'),
(50, '2017-01-25', 'Pembelian', '7403000'),
(51, '2017-01-25', 'Penjualan', '2670800'),
(52, '2017-01-26', 'Pembelian', '1381000'),
(53, '2017-01-26', 'Penjualan', '5686600'),
(54, '2017-01-27', 'Pembelian', '684500'),
(55, '2017-01-27', 'Penjualan', '4832300'),
(56, '2017-01-28', 'Pembelian', '1107100'),
(57, '2017-01-28', 'Penjualan', '6849900'),
(58, '2017-01-29', 'Pembelian', '730800'),
(59, '2017-01-29', 'Penjualan', '7375700'),
(60, '2017-01-30', 'Pembelian', '6724500'),
(61, '2017-01-30', 'Penjualan', '5162600'),
(62, '2017-01-31', 'Pembelian', '1461700'),
(63, '2017-01-31', 'Penjualan', '1567500'),
(64, '2017-01-29', 'pembayaran gaji Agus', '4769000'),
(65, '2017-01-29', 'pembayaran gaji Pak Nyoman', '1861000'),
(66, '2017-01-29', 'pembayaran gaji Sofi', '1861000'),
(67, '2017-01-29', 'pembayaran gaji Fitri', '2161000'),
(68, '2017-01-29', 'pembayaran gaji Pak Nyoman', '5469000'),
(69, '2017-01-29', 'pembayaran gaji Kadek Dewi', '2161000'),
(70, '2017-01-29', 'pembayaran gaji Fitri', '1861000'),
(71, '2017-01-29', 'pembayaran gaji Rafiatno', '2061000'),
(72, '2017-01-29', 'pembayaran gaji Wayan Adnyana', '1761000'),
(73, '2017-01-29', 'pembayaran gaji Komang Sudani', '1961000'),
(74, '2017-01-29', 'pembayaran gaji Nyoman Sudewi', '1961000'),
(75, '2017-01-29', 'pembayaran gaji Gung De', '1961000'),
(76, '2017-01-29', 'pembayaran gaji Putu Dika', '1761000'),
(77, '2017-01-29', 'pembayaran gaji Kadek Dika Andreawan', '1000000'),
(78, '2017-01-29', 'pembayaran gaji Kadek Sucipta', '1500000'),
(79, '2017-01-29', 'pembayaran gaji I Wayan Brindawan', '2000000'),
(80, '2017-05-03', 'tes', '10000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coa`
--
ALTER TABLE `coa`
 ADD PRIMARY KEY (`id_coa`);

--
-- Indexes for table `dtl_transaksi`
--
ALTER TABLE `dtl_transaksi`
 ADD PRIMARY KEY (`id_dtl_transaksi`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
 ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
 ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `coa`
--
ALTER TABLE `coa`
MODIFY `id_coa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `dtl_transaksi`
--
ALTER TABLE `dtl_transaksi`
MODIFY `id_dtl_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=272;
--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
