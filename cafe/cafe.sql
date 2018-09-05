-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2017 at 02:20 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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
(8, '5.2', 'Beban Listrik', 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtl_transaksi`
--

INSERT INTO `dtl_transaksi` (`id_dtl_transaksi`, `id_transaksi`, `code_akun`, `debit`, `kredit`) VALUES
(62, 1, '3.1', 0, 2000),
(63, 1, '1.1', 2000, 0),
(64, 2, '4.1', 0, 2000),
(65, 2, '1.1', 2000, 0),
(68, 3, '5.1', 1000, 0),
(69, 3, '1.1', 0, 1000),
(70, 4, '4.1', 0, 3000),
(71, 4, '1.1', 3000, 0),
(72, 5, '6.1', 500, 0),
(73, 5, '1.1', 0, 500),
(74, 6, '4.1', 0, 2000),
(75, 6, '1.1', 2000, 0),
(76, 7, '3.1', 0, 3000),
(77, 7, '1.1', 3000, 0),
(78, 8, '5.2', 2000, 0),
(79, 8, '1.1', 0, 2000);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `id_karyawan`, `tanggal_bayar`, `gaji_bulan`, `total_gaji`) VALUES
(1, 0, '0000-00-00', 'Juanuari', 20000),
(2, 6, '1970-01-01', 'Juanuari', 20000),
(3, 6, '1970-01-01', 'Juanuari', 22222),
(4, 6, '2017-02-25', 'Juanuari', 2222);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
`id_karyawan` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `nama_karyawan` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `tgl` varchar(30) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `status` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `alamat`, `tgl`, `no_tlp`, `jabatan`, `status`, `password`) VALUES
(6, 1, 'Oka Nuantara', 'Kerobokan', '18 Juni 19', '87864555', 'Honor', 'Tidak Aktif', 'mantap'),
(7, 0, 'Ari', 'Batanghari', '20 Mei 199', '2147483647', 'Honor', '', ''),
(9, 21, 'Try Agus Suhartawan', 'Tukad Citarum', '18 Juni 19', '2147483647', 'Honor', 'Aktif', ''),
(10, 533426742, 'Gede Indraprasta', 'Citarum', '18 Juni 19', '2147483647', 'Honor', 'Aktif', ''),
(11, 0, '', '', '', '0', 'Honor', 'Aktif', 'try agus'),
(12, 0, '', '', '', '2147483647', 'Honor', 'Aktif', ''),
(13, 0, 'Try Agus Suhartawan', '', '', '2147483647', 'Honor', 'Aktif', ''),
(14, 0, 'Try Agus', '', '', '087864994123', 'Honor', 'Aktif', ''),
(15, 0, '', '', '17/07/2017', '', 'Honor', 'Aktif', '');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE IF NOT EXISTS `owner` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `username`, `password`) VALUES
(1, 'owner', '2fea6c02a98d6318d44cdf150775f07a');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` text NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl`, `keterangan`, `total`) VALUES
(1, '2017-02-26', 'Modal Surya', 2000),
(2, '2017-02-26', 'Penmasukan tgl 25 feb', 2000),
(3, '2017-02-26', 'gaji karyawan', 1000),
(4, '2017-03-01', 'pemasukan tgl 1 mar 2017', 3000),
(5, '2017-02-26', 'Pengambilan modal oka', 500),
(6, '2017-02-27', 'Pendaptan harian 27', 2000),
(7, '2017-02-01', 'Modal surya', 3000),
(8, '2017-02-28', 'Listrik', 2000);

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
MODIFY `id_coa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dtl_transaksi`
--
ALTER TABLE `dtl_transaksi`
MODIFY `id_dtl_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
