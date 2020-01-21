-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jan 2020 pada 21.57
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
  `FOTO_ADMIN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `NAMA_ADMIN`, `JENIS_KELAMIN`, `NOTLP_ADMIN`, `EMAIL_ADMIN`, `ALAMAT_ADMIN`, `PASSWORD_ADMIN`, `FOTO_ADMIN`) VALUES
('AD0001', 'superadmin', 'Laki-laki', '4555', 'L@gmail.com', 'Jember', 'superadmin', '080120200038036.jpg'),
('AD0002', 'admin', 'Laki-laki', '089912', 'AS@GMAIL.COM', 'Jember', 'admin', '090120201624297.jpg'),
('AD0003', 'lucas', 'Laki-laki', '2322232223', 'L@gmail.com', 'Jember', 'lucas', '040120200116285.jpg');

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
('BK0002', 'JATIM', '56577 192988'),
('BK0003', 'MANDIRI', '42431 323452'),
('BK0004', 'BCA', '76233231329');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_jadwal`
--

CREATE TABLE `detail_jadwal` (
  `ID_DETAIL_JADWAL` varchar(6) NOT NULL,
  `ID_LAPANGAN` varchar(6) NOT NULL,
  `ID_JAM` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_jadwal`
--

INSERT INTO `detail_jadwal` (`ID_DETAIL_JADWAL`, `ID_LAPANGAN`, `ID_JAM`) VALUES
('DJ0001', 'LP0001', 'JM0001'),
('DJ0002', 'LP0002', 'JM0001'),
('DJ0003', 'LP0003', 'JM0001'),
('DJ0004', 'LP0004', 'JM0001'),
('DJ0005', 'LP0001', 'JM0002'),
('DJ0006', 'LP0002', 'JM0002'),
('DJ0007', 'LP0003', 'JM0002'),
('DJ0008', 'LP0004', 'JM0002'),
('DJ0009', 'LP0001', 'JM0003'),
('DJ0010', 'LP0002', 'JM0003'),
('DJ0011', 'LP0003', 'JM0003'),
('DJ0012', 'LP0004', 'JM0003'),
('DJ0013', 'LP0001', 'JM0004'),
('DJ0014', 'LP0002', 'JM0004'),
('DJ0015', 'LP0003', 'JM0004'),
('DJ0016', 'LP0004', 'JM0004'),
('DJ0017', 'LP0001', 'JM0005'),
('DJ0018', 'LP0002', 'JM0005'),
('DJ0019', 'LP0003', 'JM0005'),
('DJ0020', 'LP0004', 'JM0005'),
('DJ0021', 'LP0001', 'JM0006'),
('DJ0022', 'LP0002', 'JM0006'),
('DJ0023', 'LP0003', 'JM0006'),
('DJ0024', 'LP0004', 'JM0006'),
('DJ0025', 'LP0001', 'JM0007'),
('DJ0026', 'LP0002', 'JM0007'),
('DJ0027', 'LP0003', 'JM0007'),
('DJ0028', 'LP0004', 'JM0007'),
('DJ0029', 'LP0001', 'JM0008'),
('DJ0030', 'LP0002', 'JM0008'),
('DJ0031', 'LP0003', 'JM0008'),
('DJ0032', 'LP0004', 'JM0008'),
('DJ0033', 'LP0001', 'JM0009'),
('DJ0034', 'LP0002', 'JM0009'),
('DJ0035', 'LP0003', 'JM0009'),
('DJ0036', 'LP0004', 'JM0009'),
('DJ0037', 'LP0001', 'JM0010'),
('DJ0038', 'LP0002', 'JM0010'),
('DJ0039', 'LP0003', 'JM0010'),
('DJ0040', 'LP0004', 'JM0010'),
('DJ0041', 'LP0001', 'JM0011'),
('DJ0042', 'LP0002', 'JM0011'),
('DJ0043', 'LP0003', 'JM0011'),
('DJ0044', 'LP0004', 'JM0011'),
('DJ0045', 'LP0001', 'JM0012'),
('DJ0046', 'LP0002', 'JM0012'),
('DJ0047', 'LP0003', 'JM0012'),
('DJ0048', 'LP0004', 'JM0012'),
('DJ0049', 'LP0001', 'JM0013'),
('DJ0050', 'LP0002', 'JM0013'),
('DJ0051', 'LP0003', 'JM0013'),
('DJ0052', 'LP0004', 'JM0013'),
('DJ0053', 'LP0001', 'JM0014'),
('DJ0054', 'LP0002', 'JM0014'),
('DJ0055', 'LP0003', 'JM0014'),
('DJ0056', 'LP0004', 'JM0014'),
('DJ0057', 'LP0001', 'JM0015'),
('DJ0058', 'LP0002', 'JM0015'),
('DJ0059', 'LP0003', 'JM0015'),
('DJ0060', 'LP0004', 'JM0015');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `ID_DETAIL_TRANSAKSI` varchar(6) NOT NULL,
  `ID_TRANSAKSI` varchar(6) NOT NULL,
  `ID_DETAIL_JADWAL` varchar(6) NOT NULL,
  `JAM` time NOT NULL,
  `NAMA_LAPANGAN` varchar(15) NOT NULL,
  `TANGGAL_PESANAN` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`ID_DETAIL_TRANSAKSI`, `ID_TRANSAKSI`, `ID_DETAIL_JADWAL`, `JAM`, `NAMA_LAPANGAN`, `TANGGAL_PESANAN`) VALUES
('DT0001', 'TR0001', 'DJ0001', '08:00:00', 'Lapangan 1', '18/01/2020'),
('DT0002', 'TR0001', 'DJ0005', '09:00:00', 'Lapangan 1', '18/01/2020'),
('DT0003', 'TR0001', 'DJ0009', '10:00:00', 'Lapangan 1', '18/01/2020'),
('DT0004', 'TR0002', 'DJ0001', '08:00:00', 'Lapangan 1', '18/01/2020'),
('DT0005', 'TR0002', 'DJ0005', '09:00:00', 'Lapangan 1', '18/01/2020'),
('DT0006', 'TR0002', 'DJ0009', '10:00:00', 'Lapangan 1', '18/01/2020'),
('DT0007', 'TR0003', 'DJ0025', '14:00:00', 'Lapangan 1', '25/01/2020'),
('DT0008', 'TR0003', 'DJ0029', '15:00:00', 'Lapangan 1', '25/01/2020'),
('DT0009', 'TR0003', 'DJ0033', '16:00:00', 'Lapangan 1', '25/01/2020'),
('DT0010', 'TR0004', 'DJ0025', '14:00:00', 'Lapangan 1', '25/01/2020'),
('DT0011', 'TR0004', 'DJ0029', '15:00:00', 'Lapangan 1', '25/01/2020'),
('DT0012', 'TR0004', 'DJ0033', '16:00:00', 'Lapangan 1', '25/01/2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam`
--

CREATE TABLE `jam` (
  `ID_JAM` varchar(6) NOT NULL,
  `JAM` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jam`
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
-- Struktur dari tabel `lapangan`
--

CREATE TABLE `lapangan` (
  `ID_LAPANGAN` varchar(6) NOT NULL,
  `NAMA_LAPANGAN` varchar(15) DEFAULT NULL,
  `HARGA_SEWA` varchar(5) DEFAULT NULL,
  `FOTO_LAPANGAN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lapangan`
--

INSERT INTO `lapangan` (`ID_LAPANGAN`, `NAMA_LAPANGAN`, `HARGA_SEWA`, `FOTO_LAPANGAN`) VALUES
('LP0001', 'Lapangan 1', '25000', '0201202010350702122019222559lap2.jpg'),
('LP0002', 'Lapangan 2', '25000', '10012020000628451608.jpg'),
('LP0003', 'Lapangan 3', '25000', '02122019222608lap3.jpg'),
('LP0004', 'Lapangan 4', '25000', '02122019222616lap4.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
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
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`ID_PELANGGAN`, `NAMA_PELANGGAN`, `JENIS_KELAMIN`, `ALAMAT_PELANGGAN`, `EMAIL_PELANGGAN`, `NOTLP_PELANGGAN`, `PASSWORD_PELANGGAN`, `FOTO_PELANGGAN`) VALUES
('PL0001', 'lucas', 'Perempuan', 'Jember', 'L@gmail.com', '08999212121', 'lucas', '080120200033227.jpg'),
('PL0002', 'admin', 'Laki-laki', 'Jember', 'R@gmail.com', '0', 'admin', '080120200033511 (1).jpg'),
('PL0003', 'fahrul', 'Laki-laki', 'Jember', 'R@gmail.com', '0', 'fahrul', '080120200036111 (2).jpg'),
('PL0004', 'rendy', 'Laki-laki', 'Jember', 'R@gmail.com', '0', 'rendy', '080120200036231 (3).jpg'),
('PL0005', 'mila', 'Laki-laki', 'Jember', 'Mila@gmail.com', '0812 9999 999', 'mila', '080120200036341 (4).jpg'),
('PL0006', 'widya', 'Laki-laki', 'Jember', 'widya@gmail.com', '0999 9999 999', 'widya', '080120200036471 (5).jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggal_pesanan`
--

CREATE TABLE `tanggal_pesanan` (
  `ID_TANGGAL_PESANAN` varchar(6) NOT NULL,
  `ID_DETAIL_JADWAL` varchar(6) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `TANGGAL_PESANAN` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tanggal_pesanan`
--

INSERT INTO `tanggal_pesanan` (`ID_TANGGAL_PESANAN`, `ID_DETAIL_JADWAL`, `STATUS`, `TANGGAL_PESANAN`) VALUES
('TP0005', 'DJ0003', 1, '14/01/2020'),
('TP0006', 'DJ0001', 1, '14/01/2020'),
('TP0007', 'DJ0013', 1, '14/01/2020'),
('TP0009', 'DJ0006', 1, '14/01/2020'),
('TP0010', 'DJ0002', 1, '14/01/2020'),
('TP0011', 'DJ0002', 1, '14/01/2020'),
('TP0012', 'DJ0010', 1, '14/01/2020'),
('TP0013', 'DJ0002', 1, '14/01/2020'),
('TP0014', 'DJ0002', 1, ''),
('TP0015', 'DJ0003', 1, '18/01/2020'),
('TP0016', 'DJ0001', 1, '25/01/2020'),
('TP0017', 'DJ0001', 1, '26/01/2020'),
('TP0019', 'DJ0012', 1, '26/01/2020'),
('TP0023', 'DJ0004', 1, '25/01/2020'),
('TP0024', 'DJ0008', 1, '25/01/2020'),
('TP0025', 'DJ0016', 1, '25/01/2020'),
('TP0026', 'DJ0004', 1, '27/01/2020'),
('TP0027', 'DJ0004', 1, '28/01/2020'),
('TP0028', 'DJ0003', 1, '28/01/2020'),
('TP0029', 'DJ0007', 1, '28/01/2020'),
('TP0030', 'DJ0057', 1, '15/01/2020'),
('TP0032', 'DJ0005', 1, '16/01/2020'),
('TP0033', 'DJ0004', 1, '20/01/2020'),
('TP0037', 'DJ0015', 1, '20/01/2020'),
('TP0038', 'DJ0007', 1, '20/01/2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_TRANSAKSI` varchar(6) NOT NULL,
  `ID_PELANGGAN` varchar(6) NOT NULL,
  `ID_BANK` varchar(6) NOT NULL,
  `HARGA_TOTAL` int(8) NOT NULL,
  `TANGGAL_TRANSAKSI` char(10) DEFAULT NULL,
  `WAKTU_PEMBAYARAN` time NOT NULL,
  `BUKTI_PEMBAYARAN` varchar(50) NOT NULL,
  `STATUS_PEMBAYARAN` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`ID_TRANSAKSI`, `ID_PELANGGAN`, `ID_BANK`, `HARGA_TOTAL`, `TANGGAL_TRANSAKSI`, `WAKTU_PEMBAYARAN`, `BUKTI_PEMBAYARAN`, `STATUS_PEMBAYARAN`) VALUES
('TR0001', 'PL0002', 'BK0003', 75000, '2020/01/19', '00:00:00', 'BELUM MEMBAYAR', 0),
('TR0002', 'PL0002', 'BK0003', 75000, '2020/01/19', '00:00:00', 'BELUM MEMBAYAR', 0),
('TR0003', 'PL0002', '1', 75000, '2020/01/21', '00:00:00', 'BELUM MEMBAYAR', 0),
('TR0004', 'PL0002', '1', 75000, '2020/01/21', '00:00:00', 'BELUM MEMBAYAR', 0);

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
  ADD KEY `ID_JADWAL` (`ID_JAM`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`ID_DETAIL_TRANSAKSI`),
  ADD KEY `FK_MASUK` (`ID_TRANSAKSI`),
  ADD KEY `ID_DETAIL_JADWAL` (`ID_DETAIL_JADWAL`);

--
-- Indeks untuk tabel `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`ID_JAM`);

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
-- Indeks untuk tabel `tanggal_pesanan`
--
ALTER TABLE `tanggal_pesanan`
  ADD PRIMARY KEY (`ID_TANGGAL_PESANAN`),
  ADD KEY `ID_DETAIL_JADWAL` (`ID_DETAIL_JADWAL`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_TRANSAKSI`),
  ADD KEY `ID_PELANGGAN` (`ID_PELANGGAN`),
  ADD KEY `ID_BANK` (`ID_BANK`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  ADD CONSTRAINT `detail_jadwal_ibfk_2` FOREIGN KEY (`ID_LAPANGAN`) REFERENCES `lapangan` (`ID_LAPANGAN`),
  ADD CONSTRAINT `detail_jadwal_ibfk_3` FOREIGN KEY (`ID_JAM`) REFERENCES `jam` (`ID_JAM`);

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`ID_TRANSAKSI`) REFERENCES `transaksi` (`ID_TRANSAKSI`);

--
-- Ketidakleluasaan untuk tabel `tanggal_pesanan`
--
ALTER TABLE `tanggal_pesanan`
  ADD CONSTRAINT `tanggal_pesanan_ibfk_1` FOREIGN KEY (`ID_DETAIL_JADWAL`) REFERENCES `detail_jadwal` (`ID_DETAIL_JADWAL`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`ID_PELANGGAN`) REFERENCES `pelanggan` (`ID_PELANGGAN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
