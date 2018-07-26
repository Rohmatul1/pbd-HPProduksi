-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Jul 2018 pada 11.43
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbhpproduksi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bb`
--

CREATE TABLE IF NOT EXISTS `bb` (
  `kd_bb` char(8) NOT NULL,
  `nm_bb` varchar(20) DEFAULT NULL,
  `satuan` varchar(8) DEFAULT NULL,
  `hrg_satuan` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `jml` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bb`
--

INSERT INTO `bb` (`kd_bb`, `nm_bb`, `satuan`, `hrg_satuan`, `qty`, `jml`) VALUES
('BB001', 'Tepung', 'kg', 15000, 5, 75000),
('BB002', 'Gula Pasir', 'kg', 13000, 7, 91000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bop`
--

CREATE TABLE IF NOT EXISTS `bop` (
  `kd_bop` char(8) NOT NULL,
  `taksiran_bop` int(20) DEFAULT NULL,
  `taksiran_jtkl` int(20) DEFAULT NULL,
  `tarif_bop_jtkl` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bop`
--

INSERT INTO `bop` (`kd_bop`, `taksiran_bop`, `taksiran_jtkl`, `tarif_bop_jtkl`) VALUES
('BOP001', 130000, 4, 32500),
('BOP002', 200000, 4, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `kd_produk` char(8) NOT NULL,
  `nm_produk` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi1`
--

CREATE TABLE IF NOT EXISTS `produksi1` (
  `kd_pro1` char(8) NOT NULL,
  `kd_bb` char(8) DEFAULT NULL,
  `jml` int(15) DEFAULT NULL,
  `kd_tkl` char(8) DEFAULT NULL,
  `jmlkerja` int(15) DEFAULT NULL,
  `kd_bop` char(8) DEFAULT NULL,
  `tarif_bop_jtkl` int(20) DEFAULT NULL,
  `totalBP` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produksi1`
--

INSERT INTO `produksi1` (`kd_pro1`, `kd_bb`, `jml`, `kd_tkl`, `jmlkerja`, `kd_bop`, `tarif_bop_jtkl`, `totalBP`) VALUES
('PRO001', 'BB001', 75000, 'TKL001', 240000, 'BOP001', 32500, 347500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi2`
--

CREATE TABLE IF NOT EXISTS `produksi2` (
  `kd_pro2` char(8) NOT NULL,
  `kd_pro1` char(8) DEFAULT NULL,
  `saldowalPDP` int(20) NOT NULL,
  `saldoakhirPDP` int(20) NOT NULL,
  `totalHPProduksi` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tkl`
--

CREATE TABLE IF NOT EXISTS `tkl` (
  `kd_tkl` char(8) NOT NULL,
  `nm_tkl` varchar(20) DEFAULT NULL,
  `jamkerja` int(8) DEFAULT NULL,
  `upahperjam` int(11) DEFAULT NULL,
  `jmlkerja` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tkl`
--

INSERT INTO `tkl` (`kd_tkl`, `nm_tkl`, `jamkerja`, `upahperjam`, `jmlkerja`) VALUES
('TKL001', 'Renata', 8, 30000, 240000),
('TKL002', 'Rere', 10, 35000, 350000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bb`
--
ALTER TABLE `bb`
  ADD PRIMARY KEY (`kd_bb`);

--
-- Indexes for table `bop`
--
ALTER TABLE `bop`
  ADD PRIMARY KEY (`kd_bop`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kd_produk`);

--
-- Indexes for table `produksi1`
--
ALTER TABLE `produksi1`
  ADD PRIMARY KEY (`kd_pro1`), ADD KEY `kd_bb` (`kd_bb`), ADD KEY `kd_tkl` (`kd_tkl`), ADD KEY `kd_bop` (`kd_bop`);

--
-- Indexes for table `produksi2`
--
ALTER TABLE `produksi2`
  ADD PRIMARY KEY (`kd_pro2`), ADD KEY `kd_pro1` (`kd_pro1`);

--
-- Indexes for table `tkl`
--
ALTER TABLE `tkl`
  ADD PRIMARY KEY (`kd_tkl`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produksi1`
--
ALTER TABLE `produksi1`
ADD CONSTRAINT `produksi1_ibfk_1` FOREIGN KEY (`kd_bb`) REFERENCES `bb` (`kd_bb`),
ADD CONSTRAINT `produksi1_ibfk_2` FOREIGN KEY (`kd_tkl`) REFERENCES `tkl` (`kd_tkl`),
ADD CONSTRAINT `produksi1_ibfk_3` FOREIGN KEY (`kd_bop`) REFERENCES `bop` (`kd_bop`);

--
-- Ketidakleluasaan untuk tabel `produksi2`
--
ALTER TABLE `produksi2`
ADD CONSTRAINT `produksi2_ibfk_1` FOREIGN KEY (`kd_pro1`) REFERENCES `produksi1` (`kd_pro1`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
