-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2019 pada 08.41
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` varchar(6) NOT NULL,
  `NAMA_ADMIN` varchar(30) DEFAULT NULL,
  `JENIS_KELAMIN` varchar(10) NOT NULL,
  `NOTLP_ADMIN` varchar(13) DEFAULT NULL,
  `EMAIL_ADMIN` varchar(50) DEFAULT NULL,
  `ALAMAT_ADMIN` text,
  `PASSWORD_ADMIN` varchar(50) DEFAULT NULL,
  `FOTO_ADMIN` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `NAMA_ADMIN`, `JENIS_KELAMIN`, `NOTLP_ADMIN`, `EMAIL_ADMIN`, `ALAMAT_ADMIN`, `PASSWORD_ADMIN`, `FOTO_ADMIN`) VALUES
('AD0001', 'Lucy 123 GG', 'perempuan', '4555', 'L@gmail.com', 'Jember', 'ggg', 0x3032313232303139313135363534322e6a7067),
('AD0002', 'Lucas123 ADE', '', '17', 'AA', 'dd', '', 0x3032313232303139313130373331372e6a7067),
('AD0004', 'fevy', '', '', 'AS@GMAIL.COM', 'Jember', 'lucas', 0x32373131323031393032313332326b2e706e67),
('AD0006', 'lucas', '', '', 'as@gmail.com', 'as', 'lucas', 0x323931313230313930343331303934333637656266623035623962636465633237666463336461306230653264362e6a7067),
('AD0007', 'Fahrlur', '', '099', 'l7@gmil.com', 'Jember', 'admin', 0x3032313232303139313731313533352e6a7067);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `ID_BANK` varchar(6) NOT NULL,
  `NAMA_BANK` varchar(8) DEFAULT NULL,
  `NO_REKENING` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`ID_BANK`, `NAMA_BANK`, `NO_REKENING`) VALUES
('BK0001', 'BRI', '7666 12121212'),
('BK0002', 'Jatim', '1222334'),
('BK0003', 'AD', 'ADD225252');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_jadwal`
--

CREATE TABLE `detail_jadwal` (
  `ID_DETAIL_JADWAL` varchar(6) NOT NULL,
  `ID_LAPANGAN` varchar(6) NOT NULL,
  `ID_JADWAL` varchar(6) NOT NULL,
  `STATUS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `ID_DETAIL_TRANSAKSI` varchar(6) NOT NULL,
  `ID_TRANSAKSI` varchar(6) NOT NULL,
  `ID_DETAIL_JADWAL` varchar(6) NOT NULL,
  `TANGGAL_PESANAN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `ID_JADWAL` varchar(6) NOT NULL,
  `JAM` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`ID_JADWAL`, `JAM`) VALUES
('JD0001', '08:00:00'),
('JD0002', '09:00:00'),
('JD0003', '10:00:00'),
('JD0004', '11:00:00'),
('JD0005', '12:00:00'),
('JD0006', '13:00:00'),
('JD0007', '14:00:00'),
('JD0008', '15:00:00'),
('JD0009', '16:00:00'),
('JD0010', '17:00:00'),
('JD0011', '18:00:00'),
('JD0012', '19:00:00'),
('JD0013', '20:00:00'),
('JD0014', '21:00:00'),
('JD0015', '22:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `ID_PEMBAYARAN` varchar(6) NOT NULL,
  `ID_DETAIL_TRANSAKSI` varchar(6) NOT NULL,
  `WAKTU_PEMBAYARAN` datetime DEFAULT NULL,
  `BUKTI_PEMBAYARAN` longblob,
  `STATUS_PEMBAYARAN` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapangan`
--

CREATE TABLE `lapangan` (
  `ID_LAPANGAN` varchar(6) NOT NULL,
  `NAMA_LAPANGAN` varchar(15) DEFAULT NULL,
  `HARGA_SEWA` float(7,0) DEFAULT NULL,
  `FOTO_LAPANGAN` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lapangan`
--

INSERT INTO `lapangan` (`ID_LAPANGAN`, `NAMA_LAPANGAN`, `HARGA_SEWA`, `FOTO_LAPANGAN`) VALUES
('LP0001', 'Lapangan1', 25000, 0x30323132323031393232323534366c6170312e6a7067),
('LP0002', 'Lapangan2', 25000, 0x30323132323031393232323535396c6170322e6a7067),
('LP0003', 'Lapangan3', 25000, 0x30323132323031393232323630386c6170332e6a7067),
('LP0004', 'Lapangan4', 25000, 0x30323132323031393232323631366c6170342e6a7067),
('LP0005', 'Lap6', 23000, 0x303231323230313932323237323663656e7465722e6a7067);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ID_PELANGGAN` varchar(6) NOT NULL,
  `NAMA_PELANGGAN` varchar(30) DEFAULT NULL,
  `JENIS_KELAMIN` char(10) NOT NULL,
  `EMAIL_PELANGGAN` varchar(50) DEFAULT NULL,
  `NOTLP_PELANGGAN` decimal(13,0) DEFAULT NULL,
  `PASSWORD_PELANGGAN` varchar(50) DEFAULT NULL,
  `FOTO_PELANGGAN` longblob,
  `STATUS_PELANGGAN` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`ID_PELANGGAN`, `NAMA_PELANGGAN`, `JENIS_KELAMIN`, `EMAIL_PELANGGAN`, `NOTLP_PELANGGAN`, `PASSWORD_PELANGGAN`, `FOTO_PELANGGAN`, `STATUS_PELANGGAN`) VALUES
('PL0001', 'Lucas', 'Laki-Laki', 'L@gmail.com', '0', '0777', 0x32393131323031393136333631396b2e706e67, 1),
('PL0002', 'asa', 'Laki-Laki', 'A', '0', '', 0x3032313232303139323234323430372e6a7067, 0),
('PL0004', 'klk', 'Laki-Laki', '', '0', '', 0x3239313132303139313633383134382e6a7067, 0),
('PL0005', 'lk', 'Laki-Laki', '', '0', '', 0x3239313132303139313634303431342e6a7067, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_TRANSAKSI` varchar(6) NOT NULL,
  `ID_ADMIN` varchar(6) NOT NULL,
  `ID_PELANGGAN` varchar(6) NOT NULL,
  `ID_BANK` varchar(6) NOT NULL,
  `TGL_TRANSAKSI` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`ID_TRANSAKSI`, `ID_ADMIN`, `ID_PELANGGAN`, `ID_BANK`, `TGL_TRANSAKSI`) VALUES
('TR0001', 'AD0001', 'PL0001', 'BK0001', '2019-12-03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`ID_BANK`);

--
-- Indeks untuk tabel `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  ADD PRIMARY KEY (`ID_DETAIL_JADWAL`),
  ADD KEY `ID_LAPANGAN` (`ID_LAPANGAN`),
  ADD KEY `ID_JADWAL` (`ID_JADWAL`),
  ADD KEY `STATUS` (`STATUS`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`ID_DETAIL_TRANSAKSI`),
  ADD KEY `FK_MASUK` (`ID_TRANSAKSI`),
  ADD KEY `ID_DETAIL_JADWAL` (`ID_DETAIL_JADWAL`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`ID_JADWAL`);

--
-- Indeks untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`ID_PEMBAYARAN`),
  ADD KEY `ID_TRANSAKSI` (`ID_DETAIL_TRANSAKSI`);

--
-- Indeks untuk tabel `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`ID_LAPANGAN`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID_PELANGGAN`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_TRANSAKSI`),
  ADD KEY `ID_ADMIN` (`ID_ADMIN`),
  ADD KEY `ID_PELANGGAN` (`ID_PELANGGAN`),
  ADD KEY `ID_BANK` (`ID_BANK`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  ADD CONSTRAINT `detail_jadwal_ibfk_1` FOREIGN KEY (`ID_JADWAL`) REFERENCES `jadwal` (`ID_JADWAL`),
  ADD CONSTRAINT `detail_jadwal_ibfk_2` FOREIGN KEY (`ID_LAPANGAN`) REFERENCES `lapangan` (`ID_LAPANGAN`);

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`ID_TRANSAKSI`) REFERENCES `transaksi` (`ID_TRANSAKSI`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`ID_DETAIL_JADWAL`) REFERENCES `detail_jadwal` (`ID_DETAIL_JADWAL`);

--
-- Ketidakleluasaan untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD CONSTRAINT `konfirmasi_pembayaran_ibfk_1` FOREIGN KEY (`ID_DETAIL_TRANSAKSI`) REFERENCES `detail_transaksi` (`ID_DETAIL_TRANSAKSI`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`ID_PELANGGAN`) REFERENCES `pelanggan` (`ID_PELANGGAN`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`ID_BANK`) REFERENCES `bank` (`ID_BANK`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
