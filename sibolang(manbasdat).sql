-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2019 at 08:48 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibolang(manbasdat)`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` varchar(6) NOT NULL,
  `NAMA_ADMIN` varchar(30) DEFAULT NULL,
  `JENIS_KELAMIN` varchar(10) NOT NULL,
  `NOTLP_ADMIN` varchar(13) DEFAULT NULL,
  `EMAIL_ADMIN` varchar(50) DEFAULT NULL,
  `ALAMAT_ADMIN` text,
  `PASSWORD_ADMIN` varchar(50) DEFAULT NULL,
  `FOTO_ADMIN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `NAMA_ADMIN`, `JENIS_KELAMIN`, `NOTLP_ADMIN`, `EMAIL_ADMIN`, `ALAMAT_ADMIN`, `PASSWORD_ADMIN`, `FOTO_ADMIN`) VALUES
('AD0001', 'Lucy 123 GG', 'perempuan', '4555', 'L@gmail.com', 'Jember', 'ggg', '021220191156542.jpg'),
('AD0002', 'Lucas123 ADE', '', '17', 'AA', 'dd', '', '0912201903510022.PNG'),
('AD0004', 'fevy', '', '', 'AS@GMAIL.COM', 'Jember', 'lucas', '27112019021322k.png'),
('AD0006', 'lucas', '', '', 'as@gmail.com', 'as', 'lucas', '291120190431094367ebfb05b9bcdec27fdc3da0b0e2d6.jpg'),
('AD0007', 'Fahrlur', '', '099', 'l7@gmil.com', 'Jember', 'admin', '021220191711535.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `ID_BANK` varchar(6) NOT NULL,
  `NAMA_BANK` varchar(8) DEFAULT NULL,
  `NO_REKENING` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`ID_BANK`, `NAMA_BANK`, `NO_REKENING`) VALUES
('BK0001', 'BRI', '7666 12121212'),
('BK0002', 'Jatim', '1222334'),
('BK0003', 'AD', 'ADD225252');

-- --------------------------------------------------------

--
-- Table structure for table `detail_jadwal`
--

CREATE TABLE `detail_jadwal` (
  `ID_DETAIL_JADWAL` varchar(6) NOT NULL,
  `ID_LAPANGAN` varchar(6) NOT NULL,
  `ID_JAM` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_jadwal`
--

INSERT INTO `detail_jadwal` (`ID_DETAIL_JADWAL`, `ID_LAPANGAN`, `ID_JAM`) VALUES
('DJ0001', 'LP0001', 'JM0001'),
('DJ0002', 'LP0001', 'JM0002'),
('DJ0003', 'LP0001', 'JM0003'),
('DJ0004', 'LP0001', 'JM0004'),
('DJ0005', 'LP0001', 'JM0005'),
('DJ0006', 'LP0001', 'JM0006'),
('DJ0007', 'LP0001', 'JM0007'),
('DJ0008', 'LP0001', 'JM0008'),
('DJ0009', 'LP0001', 'JM0009'),
('DJ0010', 'LP0001', 'JM0010'),
('DJ0011', 'LP0001', 'JM0011'),
('DJ0012', 'LP0001', 'JM0012'),
('DJ0013', 'LP0001', 'JM0013'),
('DJ0014', 'LP0001', 'JM0014'),
('DJ0015', 'LP0001', 'JM0015'),
('DJ0016', 'LP0002', 'JM0001'),
('DJ0017', 'LP0002', 'JM0002'),
('DJ0018', 'LP0002', 'JM0003'),
('DJ0019', 'LP0002', 'JM0004'),
('DJ0020', 'LP0002', 'JM0005'),
('DJ0021', 'LP0002', 'JM0006'),
('DJ0022', 'LP0002', 'JM0007'),
('DJ0023', 'LP0002', 'JM0008'),
('DJ0024', 'LP0002', 'JM0009'),
('DJ0025', 'LP0002', 'JM0010'),
('DJ0026', 'LP0002', 'JM0011'),
('DJ0027', 'LP0002', 'JM0012'),
('DJ0028', 'LP0002', 'JM0013'),
('DJ0029', 'LP0002', 'JM0014'),
('DJ0030', 'LP0002', 'JM0015'),
('DJ0031', 'LP0003', 'JM0001'),
('DJ0032', 'LP0003', 'JM0002'),
('DJ0033', 'LP0003', 'JM0003'),
('DJ0034', 'LP0003', 'JM0004'),
('DJ0035', 'LP0003', 'JM0005'),
('DJ0036', 'LP0003', 'JM0006'),
('DJ0037', 'LP0003', 'JM0007'),
('DJ0038', 'LP0003', 'JM0008'),
('DJ0039', 'LP0003', 'JM0009'),
('DJ0040', 'LP0003', 'JM0010'),
('DJ0041', 'LP0003', 'JM0011'),
('DJ0042', 'LP0003', 'JM0012'),
('DJ0043', 'LP0003', 'JM0013'),
('DJ0044', 'LP0003', 'JM0014'),
('DJ0045', 'LP0003', 'JM0015'),
('DJ0046', 'LP0004', 'JM0001'),
('DJ0047', 'LP0004', 'JM0002'),
('DJ0048', 'LP0004', 'JM0003'),
('DJ0049', 'LP0004', 'JM0004'),
('DJ0050', 'LP0004', 'JM0005'),
('DJ0051', 'LP0004', 'JM0006'),
('DJ0052', 'LP0004', 'JM0007'),
('DJ0053', 'LP0004', 'JM0008'),
('DJ0054', 'LP0004', 'JM0009'),
('DJ0055', 'LP0004', 'JM0010'),
('DJ0056', 'LP0004', 'JM0011'),
('DJ0057', 'LP0004', 'JM0012'),
('DJ0058', 'LP0004', 'JM0013'),
('DJ0059', 'LP0004', 'JM0014'),
('DJ0060', 'LP0004', 'JM0015');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `ID_DETAIL_TRANSAKSI` varchar(6) NOT NULL,
  `ID_TRANSAKSI` varchar(6) NOT NULL,
  `JAM` time NOT NULL,
  `NAMA_LAPANGAN` varchar(15) NOT NULL,
  `TANGGAL_PESANAN` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`ID_DETAIL_TRANSAKSI`, `ID_TRANSAKSI`, `JAM`, `NAMA_LAPANGAN`, `TANGGAL_PESANAN`) VALUES
('DT0001', 'TR0001', '00:00:00', '', '0000-00-00'),
('DT0002', 'TR0002', '00:00:00', '', '0000-00-00'),
('DT0003', 'TR003', '00:00:00', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `ID_JAM` varchar(6) NOT NULL,
  `JAM` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`ID_JAM`, `JAM`) VALUES
('JM0001', '08:00:00'),
('JM0002', '09:00:00'),
('JM0003', '10:00:00'),
('JM0004', '11:00:00'),
('JM0005', '12:00:00'),
('JM0006', '13:00:00'),
('JM0007', '14:00:00'),
('JM0008', '15:00:00'),
('JM0009', '16:00:00'),
('JM0010', '17:00:00'),
('JM0011', '18:00:00'),
('JM0012', '19:00:00'),
('JM0013', '20:00:00'),
('JM0014', '21:00:00'),
('JM0015', '22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `ID_LAPANGAN` varchar(6) NOT NULL,
  `NAMA_LAPANGAN` varchar(15) DEFAULT NULL,
  `HARGA_SEWA` varchar(5) DEFAULT NULL,
  `FOTO_LAPANGAN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`ID_LAPANGAN`, `NAMA_LAPANGAN`, `HARGA_SEWA`, `FOTO_LAPANGAN`) VALUES
('LP0001', 'Lapangan1', '25000', '02122019222546lap1.jpg'),
('LP0002', 'Lapangan2', '25000', '02122019222559lap2.jpg'),
('LP0003', 'Lapangan3', '25000', '02122019222608lap3.jpg'),
('LP0004', 'Lapangan4', '25000', '02122019222616lap4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ID_PELANGGAN` varchar(6) NOT NULL,
  `NAMA_PELANGGAN` varchar(30) DEFAULT NULL,
  `JENIS_KELAMIN` char(10) NOT NULL,
  `ALAMAT_PELANGGAN` text NOT NULL,
  `EMAIL_PELANGGAN` varchar(50) DEFAULT NULL,
  `NOTLP_PELANGGAN` varchar(13) DEFAULT NULL,
  `PASSWORD_PELANGGAN` varchar(50) DEFAULT NULL,
  `FOTO_PELANGGAN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`ID_PELANGGAN`, `NAMA_PELANGGAN`, `JENIS_KELAMIN`, `ALAMAT_PELANGGAN`, `EMAIL_PELANGGAN`, `NOTLP_PELANGGAN`, `PASSWORD_PELANGGAN`, `FOTO_PELANGGAN`) VALUES
('PL0001', 'lucas', 'Laki-Laki', '', 'L@gmail.com', '0', 'lucas', 'user.jpg'),
('PL0002', 'admin', 'Laki-Laki', '', 'A', '0', 'admin', '021220192242407.jpg'),
('PL0004', 'klk', 'Laki-Laki', '', '', '0', '', '291120191638148.jpg'),
('PL0005', 'lk', 'Laki-Laki', '', '', '0', '', '291120191640414.jpg'),
('PL006', 'josef', 'laki-laki', 'jember', 'AW@GMAIL.COM', '0822', 'josef', '');

-- --------------------------------------------------------

--
-- Table structure for table `tanggal_pesanan`
--

CREATE TABLE `tanggal_pesanan` (
  `ID_TANGGAL_PESANAN` varchar(6) NOT NULL,
  `ID_DETAIL_JADWAL` varchar(6) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `ID_DETAIL_TRANSAKSI` varchar(6) NOT NULL,
  `TANGGAL_PESANAN` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_TRANSAKSI` varchar(6) NOT NULL,
  `ID_PELANGGAN` varchar(6) NOT NULL,
  `ID_BANK` varchar(6) NOT NULL,
  `TANGGAL_TRANSAKSI` date DEFAULT NULL,
  `WAKTU_PEMBAYARAN` time NOT NULL,
  `BUKTI_PEMBAYARAN` varchar(50) NOT NULL,
  `STATUS_PEMBAYARAN` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`ID_TRANSAKSI`, `ID_PELANGGAN`, `ID_BANK`, `TANGGAL_TRANSAKSI`, `WAKTU_PEMBAYARAN`, `BUKTI_PEMBAYARAN`, `STATUS_PEMBAYARAN`) VALUES
('TR0001', 'PL0001', 'BK0001', '2019-12-03', '00:00:00', '', 0),
('TR0002', 'PL0002', 'BK0002', '2019-12-03', '00:00:00', '', 0),
('TR003', 'PL0004', 'BK0001', '2019-12-09', '00:00:00', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`ID_BANK`);

--
-- Indexes for table `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  ADD PRIMARY KEY (`ID_DETAIL_JADWAL`),
  ADD KEY `ID_LAPANGAN` (`ID_LAPANGAN`),
  ADD KEY `ID_JADWAL` (`ID_JAM`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`ID_DETAIL_TRANSAKSI`),
  ADD KEY `FK_MASUK` (`ID_TRANSAKSI`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`ID_JAM`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`ID_LAPANGAN`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID_PELANGGAN`);

--
-- Indexes for table `tanggal_pesanan`
--
ALTER TABLE `tanggal_pesanan`
  ADD PRIMARY KEY (`ID_TANGGAL_PESANAN`),
  ADD KEY `ID_DETAIL_JADWAL` (`ID_DETAIL_JADWAL`),
  ADD KEY `ID_DETAIL_TRANSAKSI` (`ID_DETAIL_TRANSAKSI`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_TRANSAKSI`),
  ADD KEY `ID_PELANGGAN` (`ID_PELANGGAN`),
  ADD KEY `ID_BANK` (`ID_BANK`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  ADD CONSTRAINT `detail_jadwal_ibfk_2` FOREIGN KEY (`ID_LAPANGAN`) REFERENCES `lapangan` (`ID_LAPANGAN`),
  ADD CONSTRAINT `detail_jadwal_ibfk_3` FOREIGN KEY (`ID_JAM`) REFERENCES `jam` (`ID_JAM`);

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`ID_TRANSAKSI`) REFERENCES `transaksi` (`ID_TRANSAKSI`);

--
-- Constraints for table `tanggal_pesanan`
--
ALTER TABLE `tanggal_pesanan`
  ADD CONSTRAINT `tanggal_pesanan_ibfk_1` FOREIGN KEY (`ID_DETAIL_JADWAL`) REFERENCES `detail_jadwal` (`ID_DETAIL_JADWAL`),
  ADD CONSTRAINT `tanggal_pesanan_ibfk_2` FOREIGN KEY (`ID_DETAIL_TRANSAKSI`) REFERENCES `detail_transaksi` (`ID_DETAIL_TRANSAKSI`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`ID_PELANGGAN`) REFERENCES `pelanggan` (`ID_PELANGGAN`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`ID_BANK`) REFERENCES `bank` (`ID_BANK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
