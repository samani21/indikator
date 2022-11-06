-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2022 at 03:02 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_puskesmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_indikator`
--

CREATE TABLE `tb_indikator` (
  `id` int(11) NOT NULL,
  `indikator` varchar(225) NOT NULL,
  `target` varchar(10) NOT NULL,
  `jan` varchar(50) NOT NULL,
  `feb` varchar(50) NOT NULL,
  `mar` varchar(50) NOT NULL,
  `apr` varchar(50) NOT NULL,
  `mei` varchar(50) NOT NULL,
  `jun` varchar(10) NOT NULL,
  `jul` varchar(10) NOT NULL,
  `agt` varchar(10) NOT NULL,
  `sep` varchar(10) NOT NULL,
  `okt` varchar(50) NOT NULL,
  `nov` varchar(50) NOT NULL,
  `des` varchar(50) NOT NULL,
  `rata` varchar(10) NOT NULL,
  `ruangan` varchar(50) NOT NULL,
  `tahun` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_indikator`
--

INSERT INTO `tb_indikator` (`id`, `indikator`, `target`, `jan`, `feb`, `mar`, `apr`, `mei`, `jun`, `jul`, `agt`, `sep`, `okt`, `nov`, `des`, `rata`, `ruangan`, `tahun`) VALUES
(1, 'Waktu pelayanan puskesmas sesuai ketentuan', '100', '', '', '', '', '', '100', '100', '100', '100', '', '', '', '100', 'Ruangan pendaftran dan rekam medis', '2020'),
(2, 'Waktu tunggu regestrasi pasien < 10 menit', '90', '', '', '', '', '', '73.20', '95.50', '97.54', '96.33', '', '', '', '90.64', 'Ruangan pendaftran dan rekam medis', '2020'),
(3, 'Kepuasan pelanggan', '90', '', '', '', '', '', '99', '98.23', '98.07', '97.29', '', '', '', '98.15', 'Ruangan pendaftran dan rekam medis', '2020'),
(4, 'Pemberi layanan adalah dokter', '90', '', '', '', '', '', '100', '100', '100', '100', '', '', '', '100', 'Ruangan umum', '2020'),
(5, 'Kelengkapan pengisian rekam medis berdasarkan SOAP', '90', '', '', '', '', '', '55.89', '71.89', '71.99', '71.54', '', '', '', '67.85', 'Ruangan umum', '2020'),
(6, 'Tingkat kepatuhan SOP penatalaksanaan Hipertensi', '90', '', '', '', '', '', '93.87', '90.00', '92.06', '91.02', '', '', '', '91.73', 'Ruangan umum', '2020'),
(7, 'Kepuasan pelanggan', '90', '', '', '', '', '', '91.70', '95.67', '95.67', '94.85', '', '', '', '94.50', 'Ruangan umum', '2020'),
(8, 'Kelengkapan pengisian rekam medis berdasarkan SOAP', '90', '', '', '', '', '', '84.61', '84', '85', '88.09', '', '', '', '85.42', 'Ruangan anak', '2020'),
(9, 'Pengisian formulir MTBTS secara lengkap kepada pasien', '90', '', '', '', '', '', '80.95', '76', '78', '80', '', '', '', '78.74', 'Ruangan anak', '2020'),
(10, 'Kepuasan pelanggan', '90', '', '', '', '', '', '90', '87', '91.17', '90.24', '', '', '', '89.60', 'Ruangan anak', '2020'),
(11, 'Ketersedian kelengkapan obat emergency di ruang tindakan', '100', '', '', '', '', '', '100', '100', '100', '100', '', '', '', '100', 'Ruangan tindakan', '2020'),
(12, 'Ketersediaan petugas khusus yang bertugas di ruang tindakan', '100', '', '', '', '', '', '100', '92', '100', '100', '', '', '', '98', 'Ruangan tindakan', '2020'),
(13, 'Kepuasan pelanggan', '90', '', '', '', '', '', '100', '100', '100', '100', '', '', '', '100', 'Ruangan tindakan', '2020'),
(14, 'Petugas menggunakan informasi consent saat melakukan tindakan', '100', '', '', '', '', '', '0', '0', '0', '13', '', '', '', '3.25', 'Ruangan gigi', '2020'),
(15, 'Pemberian obat antibiotik pada pasien dengan diagnosisi abses gingiva', '90', '', '', '', '', '', '100', '100', '100', '100', '', '', '', '100', 'Ruangan gigi', '2020'),
(16, 'Kepatuhan petugas menggunakan APD saat melakukan tindakan', '100', '', '', '', '', '', '92', '88', '95.7', '100', '', '', '', '93.7', 'Ruangan gigi', '2020'),
(17, 'Kepuasan pelanggan', '90', '', '', '', '', '', '98', '98', '100', '100', '', '', '', '99', 'Ruangan gigi', '2020'),
(18, 'Waktu tungu hasil pelayanan darah rutin di laboratorium < 60 menit', '95', '', '', '', '', '', '100', '100', '100', '100', '', '', '', '100', 'Ruangan laboratorium', '2020'),
(19, 'Tidak adanya kejadian kesalahan pemberian hasil lab', '100', '', '', '', '', '', '100', '100', '100', '100', '', '', '', '100', 'Ruangan laboratorium', '2020'),
(20, 'Angka pengulangan sampling darah < 10% dari jumlah pasien yang diambil sample', '90', '', '', '', '', '', '99', '100', '100', '100', '', '', '', '99.75', 'Ruangan laboratorium', '2020'),
(21, 'Kepuasan pelanggan', '90', '', '', '', '', '', '98.85', '99', '98.79', '100', '', '', '', '99.16', 'Ruangan laboratorium', '2020'),
(22, 'Jumlah pasien ANC waktu pelayan ANC(ante natal care) K<20 menit', '100', '', '', '', '', '', '100', '100', '100', '100', '', '', '', '100', 'Ruangan kia', '2020'),
(23, 'Tindakan KB MKJP dilakukan oleh bidan terlatih', '100', '', '', '', '', '', '100', '100', '100', '100', '', '', '', '100', 'Ruangan kia', '2020'),
(24, 'Kepuasan pelanggan', '90', '', '', '', '', '', '100', '100', '100', '100', '', '', '', '100', 'Ruangan kia', '2020'),
(25, 'Waktu pelayanan obat di ruangan farmasi obat jadi <10 menit', '90', '', '', '', '', '', '100', '100', '100', '100', '', '', '', '100', 'Ruangan farmasi', '2020'),
(26, 'Waktu pelayanan obat di ruangan farmasi obat racikan', '90', '', '', '', '', '', '100', '100', '100', '100', '', '', '', '100', 'Ruangan farmasi', '2020'),
(27, 'Tidak terjadi kesalahan pemberian obat kepada pasien ', '100', '', '', '', '', '', '100', '96', '100', '96', '', '', '', '98', 'Ruangan farmasi', '2020'),
(28, 'Kepuasan pelanggan', '90', '', '', '', '', '', '99', '99', '99', '99', '', '', '', '99', 'Ruangan farmasi', '2020'),
(29, 'Ketersediaan petugas bidan selama 24 jam', '100', '', '', '', '', '', '100', '100', '100', '100', '', '', '', '100', 'Ruangan persalinan', '2020'),
(30, 'Kepatuhan petugas menggunakan APD saat melakukan tindakan', '100', '', '', '', '', '', '100', '94', '100', '100', '', '', '', '98.50', 'Ruangan persalinan', '2020'),
(31, 'Kaputahan petugas terhadap penulisan partograph', '100', '', '', '', '', '', '100', '94', '96.15', '93.75', '', '', '', '95.97', 'Ruangan persalinan', '2020'),
(32, 'Kepuasan pelanggan', '90', '', '', '', '', '', '100', '100', '100', '100', '', '', '', '100', 'Ruangan persalinan', '2020'),
(33, 'Pasien 0-5 tahun yang mendapatkan pelayanan pengukuran antropometri', '90', '', '', '', '', '', '100', '100', '100', '100', '', '', '', '100', 'Ruangan gizi', '2020'),
(34, 'Kelengkapan pengisian rekam medis pasien seuai SOAP', '90', '', '', '', '', '', '100', '100', '100', '100', '', '', '', '100', 'Ruangan gizi', '2020'),
(35, 'Kepuasan pelanggan', '90', '', '', '', '', '', '100', '100', '100', '100', '', '', '', '100', 'Ruangan gizi', '2020'),
(36, 'Kelengkapan pengisian rekam medis pasien SOAP', '90', '', '', '', '', '', '81.25', '80.88', '88.46', '80', '', '', '', '82.64', 'Ruangan ispa', '2020'),
(37, 'Kepatuhan petugas menggukan APD saat bertugas di ruang pemeriksaan khusus', '100', '', '', '', '', '', '95', '98', '97', '97', '', '', '', '96.25', 'Ruangan ispa', '2020'),
(38, 'Kepuasan pelanggan', '90', '', '', '', '', '', '92.72', '91.16', '90.38', '100', '', '', '', '93.58', 'Ruangan ispa', '2020'),
(39, 'Keterangan petugas sanitasi di ruang KI', '70', '', '', '', '', '', '100', '100', '100', '100', '', '', '', '100', 'Ruangan edukasi', '2020'),
(40, 'Kepuasan pelanggan', '90', '', '', '', '', '', '100', '100', '100', '100', '', '', '', '100', 'Ruangan edukasi', '2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_indikator`
--
ALTER TABLE `tb_indikator`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_indikator`
--
ALTER TABLE `tb_indikator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
