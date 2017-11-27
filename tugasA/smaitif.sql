-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2017 at 01:04 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_siswasmkn2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE IF NOT EXISTS `tbl_jurusan` (
  `id_jurusan` varchar(30) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `nama_jurusan`, `keterangan`) VALUES
('001', 'MIA', 'Matematika dan Ilmu Pengetahuan Alam'),
('002', 'IIS', 'Ilmu-ilmu Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE IF NOT EXISTS `tbl_siswa` (
  `nis` int(15) NOT NULL,
  `nisn` int(50) NOT NULL,
  `nama_siswa` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nama_orang_tua` varchar(50) NOT NULL,
  `sekolah_asal` varchar(150) NOT NULL,
  `tahun_lulus` int(20) NOT NULL,
  `kepala_sekolah` varchar(100) NOT NULL,
  `nomor_ijazah` varchar(200) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nis`, `nisn`, `nama_siswa`, `alamat`, `no_telp`, `tempat_lahir`, `tgl_lahir`, `nama_orang_tua`, `sekolah_asal`, `tahun_lulus`, `kepala_sekolah`, `nomor_ijazah`, `nama_jurusan`, `keterangan`, `foto`, `guru`) VALUES
(320, 7536, 'Nur Azizah Ali', '', '082229765490', 'Bontang', '1998-01-15', 'Akhmad Akbar Ali', 'SMAIT Ihsanul Fikri', 20160428, 'Nur Cahyo, S, Pd.', '08 DN-XX Mk.8172651472', 'MIA', 'Cukup Baik', 'profile.png', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` enum('admin','guru') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin 1', 'admin'),
(7, 'Admin 2', '21232f297a57a5a743894a0e4a801fc3', 'Admin 2', 'admin'),
(8, 'pengurus', 'ef4113dcac30d9fea0cd4ed7caa66ee8', 'pengurus', 'guru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nis`,`nomor_ijazah`), ADD UNIQUE KEY `nomor_ijazah` (`nomor_ijazah`), ADD UNIQUE KEY `nis` (`nis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
