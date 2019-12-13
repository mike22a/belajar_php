-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2019 at 01:59 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkel_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot_gaji`
--

CREATE TABLE `bobot_gaji` (
  `id_bobot_gaji` int(11) NOT NULL,
  `dari` int(11) NOT NULL,
  `sampai` int(11) NOT NULL,
  `besaran_gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cek_tools`
--

CREATE TABLE `cek_tools` (
  `id_cek` int(11) NOT NULL,
  `id_harian` int(11) NOT NULL,
  `id_tools` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cek_tools`
--

INSERT INTO `cek_tools` (`id_cek`, `id_harian`, `id_tools`) VALUES
(86, 1, 1),
(87, 1, 3),
(35, 2, 2),
(36, 2, 4),
(31, 3, 2),
(32, 3, 4),
(4, 4, 1),
(17, 4, 3),
(18, 4, 5),
(22, 30, 1),
(23, 30, 2),
(24, 30, 3);

-- --------------------------------------------------------

--
-- Table structure for table `penggajian`
--

CREATE TABLE `penggajian` (
  `id_gaji` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `tanggal_penggajian` int(11) NOT NULL,
  `nominal_tambahan` int(11) NOT NULL,
  `bobot_akhir` int(11) NOT NULL,
  `jam_lembur` int(11) NOT NULL,
  `jumlah_tools` int(11) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `rekap_upah_lembur` int(11) NOT NULL,
  `rekap_upah_harian` int(11) NOT NULL,
  `rekap_upah_makan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penggajian`
--

INSERT INTO `penggajian` (`id_gaji`, `id_user`, `tanggal_mulai`, `tanggal_selesai`, `tanggal_penggajian`, `nominal_tambahan`, `bobot_akhir`, `jam_lembur`, `jumlah_tools`, `jumlah_masuk`, `rekap_upah_lembur`, `rekap_upah_harian`, `rekap_upah_makan`) VALUES
(1, 4, '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 5, '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 6, '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `presensi_harian`
--

CREATE TABLE `presensi_harian` (
  `id_harian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `masuk` enum('ya','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi_harian`
--

INSERT INTO `presensi_harian` (`id_harian`, `id_user`, `tanggal`, `masuk`) VALUES
(1, 4, '2019-12-02', 'tidak'),
(2, 5, '2019-12-03', 'ya'),
(3, 6, '2019-12-04', 'ya'),
(4, 6, '2019-12-05', 'ya'),
(30, 5, '2019-12-04', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `presensi_lembur`
--

CREATE TABLE `presensi_lembur` (
  `id_lembur` int(11) NOT NULL,
  `id_harian` int(11) NOT NULL,
  `jam` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi_lembur`
--

INSERT INTO `presensi_lembur` (`id_lembur`, `id_harian`, `jam`) VALUES
(1, 1, 2),
(2, 2, 3),
(3, 3, 2),
(4, 4, 3),
(20, 30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `id_tools` int(11) NOT NULL,
  `nama_tool` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`id_tools`, `nama_tool`) VALUES
(1, 'tool 1'),
(2, 'tool 2'),
(3, 'tool 3'),
(4, 'tool 4'),
(5, 'tool 5');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','owner','teknisi') NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_join` date NOT NULL,
  `upah_harian` int(11) NOT NULL,
  `upah_lembur` int(11) NOT NULL,
  `upah_makan` int(11) NOT NULL,
  `pengetahuan_dasar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`, `alamat`, `tanggal_join`, `upah_harian`, `upah_lembur`, `upah_makan`, `pengetahuan_dasar`) VALUES
(1, 'administrator', 'admin', 'admin123', 'admin', 'aaaaaa', '2019-12-01', 100000, 100000, 20000, '0'),
(2, 'owner', 'owner', 'owner123', 'owner', 'aaaaaa', '2019-12-01', 1000000, 1000000, 1000000, '0'),
(3, 'teknisi', 'teknisi', 'teknisi123', 'teknisi', 'aaaaaa', '2019-12-01', 50000, 10000, 10000, '0'),
(4, 'Teknisi 1', 'teknisi_1', 'teknisi1123', 'teknisi', 'aaaaaa', '2019-12-01', 60000, 15000, 15000, '0'),
(5, 'Teknisi 2', 'teknisi_2', 'teknisi2123', 'teknisi', 'aaaaaa', '0000-00-00', 60000, 20000, 15000, '0'),
(6, 'Teknisi 3', 'teknisi_3', 'teknisi3123', 'teknisi', 'aaaaaa', '0000-00-00', 90000, 30000, 25000, '0');

-- --------------------------------------------------------

--
-- Table structure for table `workorder`
--

CREATE TABLE `workorder` (
  `id_workorder` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `kendaraan` varchar(255) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `penilaian` enum('Kurang Puas','Puas','Sangat Puas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workorder`
--

INSERT INTO `workorder` (`id_workorder`, `id_user`, `tanggal`, `nama_pelanggan`, `alamat`, `no_telp`, `kendaraan`, `keluhan`, `penilaian`) VALUES
(1, 4, '2019-12-02', 'Andi', 'aaaaaa', '0812345678', 'Amahay', 'Motor kurang nendang', 'Sangat Puas'),
(2, 5, '2019-12-03', 'Beni', 'Bantul', '0812345678', 'Beat', 'Ban lonjong', 'Puas'),
(5, 6, '2019-12-04', 'Chalrie', 'Cebongan', '081234567', 'Cucuki', 'Motor berat', 'Puas'),
(6, 6, '2019-12-05', 'Denden', 'Dorareti', '08123456', 'Dlabe', 'Kurang tajam', 'Puas'),
(8, 5, '2019-12-04', 'Eka', 'Ekaka dimana', '08123894', 'Enigma', 'Ealadalah', 'Puas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot_gaji`
--
ALTER TABLE `bobot_gaji`
  ADD PRIMARY KEY (`id_bobot_gaji`);

--
-- Indexes for table `cek_tools`
--
ALTER TABLE `cek_tools`
  ADD PRIMARY KEY (`id_cek`),
  ADD KEY `id_harian` (`id_harian`,`id_tools`),
  ADD KEY `id_tools` (`id_tools`);

--
-- Indexes for table `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `presensi_harian`
--
ALTER TABLE `presensi_harian`
  ADD PRIMARY KEY (`id_harian`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `presensi_lembur`
--
ALTER TABLE `presensi_lembur`
  ADD PRIMARY KEY (`id_lembur`),
  ADD KEY `id_harian` (`id_harian`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`id_tools`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `workorder`
--
ALTER TABLE `workorder`
  ADD PRIMARY KEY (`id_workorder`),
  ADD KEY `id_teknisi` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot_gaji`
--
ALTER TABLE `bobot_gaji`
  MODIFY `id_bobot_gaji` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cek_tools`
--
ALTER TABLE `cek_tools`
  MODIFY `id_cek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `penggajian`
--
ALTER TABLE `penggajian`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `presensi_harian`
--
ALTER TABLE `presensi_harian`
  MODIFY `id_harian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `presensi_lembur`
--
ALTER TABLE `presensi_lembur`
  MODIFY `id_lembur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `id_tools` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `workorder`
--
ALTER TABLE `workorder`
  MODIFY `id_workorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cek_tools`
--
ALTER TABLE `cek_tools`
  ADD CONSTRAINT `cek_tools_ibfk_3` FOREIGN KEY (`id_harian`) REFERENCES `presensi_harian` (`id_harian`) ON DELETE CASCADE,
  ADD CONSTRAINT `cek_tools_ibfk_4` FOREIGN KEY (`id_tools`) REFERENCES `tools` (`id_tools`);

--
-- Constraints for table `penggajian`
--
ALTER TABLE `penggajian`
  ADD CONSTRAINT `penggajian_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `presensi_harian`
--
ALTER TABLE `presensi_harian`
  ADD CONSTRAINT `presensi_harian_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `presensi_lembur`
--
ALTER TABLE `presensi_lembur`
  ADD CONSTRAINT `presensi_lembur_ibfk_1` FOREIGN KEY (`id_harian`) REFERENCES `presensi_harian` (`id_harian`) ON DELETE CASCADE;

--
-- Constraints for table `workorder`
--
ALTER TABLE `workorder`
  ADD CONSTRAINT `workorder_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
