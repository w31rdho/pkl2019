-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2019 at 02:23 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kankermulut`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diagnosa`
--

CREATE TABLE `tbl_diagnosa` (
  `id_diagnosa` int(10) NOT NULL,
  `id_user` varchar(225) DEFAULT NULL,
  `kode_gejala` varchar(10) DEFAULT NULL,
  `jawab` enum('','Ya','Tidak') DEFAULT NULL,
  `diagnosa_ke` varchar(10) DEFAULT NULL,
  `tgl_diagnosa` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_diagnosa`
--

INSERT INTO `tbl_diagnosa` (`id_diagnosa`, `id_user`, `kode_gejala`, `jawab`, `diagnosa_ke`, `tgl_diagnosa`) VALUES
(139, '3', 'G013', 'Tidak', '1', '2019-11-17 17:48:13'),
(138, '3', 'G012', 'Tidak', '1', '2019-11-17 17:48:12'),
(137, '3', 'G011', 'Tidak', '1', '2019-11-17 17:48:11'),
(136, '3', 'G010', 'Tidak', '1', '2019-11-17 17:48:09'),
(135, '3', 'G009', 'Tidak', '1', '2019-11-17 17:48:08'),
(134, '3', 'G008', 'Tidak', '1', '2019-11-17 17:48:07'),
(133, '3', 'G007', 'Tidak', '1', '2019-11-17 17:48:06'),
(132, '3', 'G006', 'Tidak', '1', '2019-11-17 17:48:05'),
(131, '3', 'G005', 'Ya', '1', '2019-11-17 17:48:03'),
(130, '3', 'G004', 'Ya', '1', '2019-11-17 17:48:02'),
(129, '3', 'G003', 'Ya', '1', '2019-11-17 17:48:01'),
(128, '3', 'G002', 'Ya', '1', '2019-11-17 17:47:59'),
(127, '3', 'G001', 'Ya', '1', '2019-11-17 17:47:58'),
(157, '4', 'G012', 'Tidak', '1', '2019-11-17 21:29:39'),
(156, '4', 'G011', 'Tidak', '1', '2019-11-17 21:29:38'),
(155, '4', 'G010', 'Ya', '1', '2019-11-17 21:29:33'),
(154, '4', 'G009', 'Ya', '1', '2019-11-17 21:29:30'),
(153, '4', 'G008', 'Ya', '1', '2019-11-17 21:29:28'),
(152, '4', 'G007', 'Ya', '1', '2019-11-17 21:29:25'),
(151, '4', 'G006', 'Ya', '1', '2019-11-17 21:29:21'),
(150, '4', 'G005', 'Tidak', '1', '2019-11-17 21:29:19'),
(149, '4', 'G004', 'Tidak', '1', '2019-11-17 21:29:17'),
(148, '4', 'G003', 'Tidak', '1', '2019-11-17 21:29:12'),
(147, '4', 'G002', 'Tidak', '1', '2019-11-17 21:29:09'),
(146, '4', 'G001', 'Tidak', '1', '2019-11-17 21:29:05'),
(145, '3', 'G019', 'Tidak', '1', '2019-11-17 17:48:20'),
(144, '3', 'G018', 'Tidak', '1', '2019-11-17 17:48:18'),
(143, '3', 'G017', 'Tidak', '1', '2019-11-17 17:48:17'),
(142, '3', 'G016', 'Tidak', '1', '2019-11-17 17:48:16'),
(141, '3', 'G015', 'Tidak', '1', '2019-11-17 17:48:15'),
(140, '3', 'G014', 'Tidak', '1', '2019-11-17 17:48:14'),
(158, '4', 'G013', 'Tidak', '1', '2019-11-17 21:29:41'),
(159, '4', 'G014', 'Tidak', '1', '2019-11-17 21:29:42'),
(160, '4', 'G015', 'Tidak', '1', '2019-11-17 21:29:43'),
(161, '4', 'G016', 'Tidak', '1', '2019-11-17 21:29:47'),
(162, '4', 'G017', 'Tidak', '1', '2019-11-17 21:29:48'),
(163, '4', 'G018', 'Ya', '1', '2019-11-17 21:29:50'),
(164, '4', 'G019', 'Ya', '1', '2019-11-17 21:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gejala`
--

CREATE TABLE `tbl_gejala` (
  `kode_gejala` varchar(10) NOT NULL,
  `nama_gejala` text,
  `tgl_gejala` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gejala`
--

INSERT INTO `tbl_gejala` (`kode_gejala`, `nama_gejala`, `tgl_gejala`) VALUES
('G007', 'Adanya bercak mirip luka yang cekung di bagian tengah dan disertai rasa sakit.', '2019-11-17 17:01:46'),
('G006', 'Adanya luka yang muncul pada bagian bawah lidah atau gusi.', '2019-11-17 17:01:41'),
('G005', 'Adanya ruam berwarna merah (erythroplakia).', '2019-11-17 17:01:34'),
('G004', 'Adanya penebalan atau adanya bercak putih pada mukosa bibir.', '2019-11-17 17:01:21'),
('G002', 'Saat diraba pada pinggiran tumor terasa keras.', '2019-11-17 17:01:10'),
('G003', 'Adanya kerak atau keropeng pada tepi merah bibir.', '2019-11-17 17:01:15'),
('G001', 'Peradangan kronis yang terjadi pada usus besar (kolon) dan rektum.', '2019-11-17 17:01:05'),
('G008', 'Rasa sakit pada tenggorokan.', '2019-11-17 17:01:50'),
('G009', 'Lidah terasa nyeri berkepanjangan yang biasanya sampai terasa pada rahang.', '2019-11-17 17:01:59'),
('G010', 'Lidah mati rasa dan sulit digerakkan.', '2019-11-17 17:02:04'),
('G011', 'Dasar Tukak berwarna merah kelabu, lemas menampakkan permukaann butiran kecil.', '2019-11-17 17:02:09'),
('G012', 'Terdapat Hifa kandida.', '2019-11-17 17:02:14'),
('G013', 'Gambaran bercak putih dengan latar belakang berwarna merah memberi kesan bintik.', '2019-11-17 17:02:20'),
('G014', 'Terdapat bercak atau plak berwarna merah terang.', '2019-11-17 17:02:25'),
('G015', 'Tumor terletak pada mukosa pipi.', '2019-11-17 17:02:29'),
('G016', 'Tumor pada mulanya relatif lunak dan berbatas jelas.', '2019-11-17 17:02:34'),
('G017', 'Tumor yang awalnya lunak kemudian menjadi kuat dan lebih keras.', '2019-11-17 17:02:40'),
('G018', 'Terletak pada duapertiga anterior dan massa yang timbul tak terasa sakit.', '2019-11-17 17:02:44'),
('G019', 'Terletak pada sepertiga posterior dan rasa sakit yang dialami dihubungkan dengan sakit tenggorokan.', '2019-11-17 17:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pakar`
--

CREATE TABLE `tbl_pakar` (
  `id_pakar` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pakar`
--

INSERT INTO `tbl_pakar` (`id_pakar`, `nama`, `username`, `password`) VALUES
(1, 'Admin Pakar', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyakit`
--

CREATE TABLE `tbl_penyakit` (
  `kode_penyakit` varchar(10) NOT NULL,
  `nama_penyakit` text,
  `keterangan` text,
  `tgl_penyakit` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penyakit`
--

INSERT INTO `tbl_penyakit` (`kode_penyakit`, `nama_penyakit`, `keterangan`, `tgl_penyakit`) VALUES
('P004', 'Karsinoma pada komisura bibir.', '- Ditimbulkan karena merokok secara berlebihan selama bertahun-tahun.', '2019-11-17 17:06:43'),
('P005', 'Karsinoma verukosa pada mukosa pipi.', '- Didahului timbulnya leukoplakia.\r\n- Berupa tumor dengan pertumbuhan lebih bersifat ekspansif daripada infiltratif.\r\n- Disebabkan karena aplikasi kapur yang berulang-ulang sehubungan dengan kebiasaan mengunyah dan mengisap kapur sirih.', '2019-11-17 17:07:06'),
('P001', 'Karsinoma pada bibir (tepi merah bibir).', '- Kebiasaan merokok dan menghisap pipa.\r\n- Terlihat terutama diantara pekerja yang bekerja di udara terbuka.', '2019-11-17 17:05:59'),
('P002', 'Karsinoma pada pinggir lidah.', '- Lebih banyak menyerang laki-laki.\r\n- Bisa disebabkan karena gigi tiruan.', '2019-11-17 17:06:18'),
('P003', 'Karsinoma pada dasar mulut.', '- Menyerang orang pada usia pertengahan dan usia lanjut dengan pervalensi tertinggi pada dekade ketujuh.', '2019-11-17 17:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relasi`
--

CREATE TABLE `tbl_relasi` (
  `id_relasi` int(10) NOT NULL,
  `kode_penyakit` varchar(10) DEFAULT NULL,
  `kode_gejala` varchar(10) DEFAULT NULL,
  `ket` enum('','Ya','Tidak') DEFAULT NULL,
  `tgl_relasi` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_relasi`
--

INSERT INTO `tbl_relasi` (`id_relasi`, `kode_penyakit`, `kode_gejala`, `ket`, `tgl_relasi`) VALUES
(1, 'P001', 'G001', 'Ya', '2019-11-17 17:47:28'),
(2, 'P001', 'G002', 'Ya', '2019-11-17 17:47:28'),
(3, 'P001', 'G003', 'Ya', '2019-11-17 17:47:28'),
(4, 'P001', 'G004', 'Ya', '2019-11-17 17:47:28'),
(5, 'P002', 'G001', '', '2019-11-17 17:10:05'),
(6, 'P002', 'G002', '', '2019-11-17 17:10:05'),
(7, 'P002', 'G003', '', '2019-11-17 17:10:05'),
(8, 'P002', 'G004', '', '2019-11-17 17:10:05'),
(9, 'P001', 'G005', 'Ya', '2019-11-17 17:47:28'),
(10, 'P001', 'G006', 'Tidak', '2019-11-17 17:47:28'),
(11, 'P002', 'G005', '', '2019-11-17 17:10:05'),
(12, 'P002', 'G006', 'Ya', '2019-11-17 17:10:05'),
(13, 'P002', 'G007', 'Ya', '2019-11-17 17:10:05'),
(14, 'P002', 'G008', 'Ya', '2019-11-17 17:10:05'),
(15, 'P002', 'G009', 'Ya', '2019-11-17 17:10:05'),
(16, 'P003', 'G001', '', '2019-11-17 17:09:53'),
(17, 'P003', 'G002', 'Ya', '2019-11-17 17:09:53'),
(18, 'P003', 'G003', '', '2019-11-17 17:09:53'),
(19, 'P003', 'G004', '', '2019-11-17 17:09:53'),
(20, 'P003', 'G005', '', '2019-11-17 17:09:53'),
(21, 'P003', 'G006', '', '2019-11-17 17:09:53'),
(22, 'P003', 'G007', '', '2019-11-17 17:09:53'),
(23, 'P003', 'G008', '', '2019-11-17 17:09:53'),
(24, 'P003', 'G009', '', '2019-11-17 17:09:53'),
(25, 'P003', 'G010', '', '2019-11-17 17:09:53'),
(26, 'P003', 'G011', 'Ya', '2019-11-17 17:09:53'),
(27, 'P003', 'G012', '', '2019-11-17 17:09:53'),
(28, 'P004', 'G001', '', '2019-11-17 17:10:33'),
(29, 'P004', 'G002', '', '2019-11-17 17:10:33'),
(30, 'P004', 'G003', '', '2019-11-17 17:10:33'),
(31, 'P004', 'G004', 'Ya', '2019-11-17 17:10:33'),
(32, 'P004', 'G005', '', '2019-11-17 17:10:33'),
(33, 'P004', 'G006', '', '2019-11-17 17:10:33'),
(34, 'P004', 'G007', '', '2019-11-17 17:10:33'),
(35, 'P004', 'G008', '', '2019-11-17 17:10:33'),
(36, 'P004', 'G009', '', '2019-11-17 17:10:33'),
(37, 'P004', 'G010', '', '2019-11-17 17:10:33'),
(38, 'P004', 'G011', '', '2019-11-17 17:10:33'),
(39, 'P004', 'G012', 'Ya', '2019-11-17 17:10:33'),
(40, 'P004', 'G013', 'Ya', '2019-11-17 17:10:33'),
(41, 'P001', 'G007', 'Tidak', '2019-11-17 17:47:28'),
(42, 'P001', 'G008', 'Tidak', '2019-11-17 17:47:28'),
(43, 'P001', 'G009', 'Tidak', '2019-11-17 17:47:28'),
(44, 'P001', 'G010', 'Tidak', '2019-11-17 17:47:28'),
(45, 'P001', 'G011', 'Tidak', '2019-11-17 17:47:28'),
(46, 'P001', 'G012', 'Tidak', '2019-11-17 17:47:28'),
(47, 'P001', 'G013', 'Tidak', '2019-11-17 17:47:28'),
(48, 'P001', 'G014', 'Tidak', '2019-11-17 17:47:28'),
(49, 'P001', 'G015', 'Tidak', '2019-11-17 17:47:28'),
(50, 'P001', 'G016', 'Tidak', '2019-11-17 17:47:28'),
(51, 'P001', 'G017', 'Tidak', '2019-11-17 17:47:28'),
(52, 'P001', 'G018', 'Tidak', '2019-11-17 17:47:28'),
(53, 'P001', 'G019', 'Tidak', '2019-11-17 17:47:28'),
(54, 'P002', 'G010', 'Ya', '2019-11-17 17:10:05'),
(55, 'P002', 'G011', '', '2019-11-17 17:10:05'),
(56, 'P002', 'G012', '', '2019-11-17 17:10:05'),
(57, 'P002', 'G013', '', '2019-11-17 17:10:05'),
(58, 'P002', 'G014', '', '2019-11-17 17:10:05'),
(59, 'P002', 'G015', '', '2019-11-17 17:10:05'),
(60, 'P002', 'G016', '', '2019-11-17 17:10:05'),
(61, 'P002', 'G017', '', '2019-11-17 17:10:05'),
(62, 'P002', 'G018', 'Ya', '2019-11-17 17:10:05'),
(63, 'P002', 'G019', 'Ya', '2019-11-17 17:10:05'),
(64, 'P003', 'G013', '', '2019-11-17 17:09:53'),
(65, 'P003', 'G014', '', '2019-11-17 17:09:53'),
(66, 'P003', 'G015', '', '2019-11-17 17:09:53'),
(67, 'P003', 'G016', '', '2019-11-17 17:09:53'),
(68, 'P003', 'G017', '', '2019-11-17 17:09:53'),
(69, 'P003', 'G018', '', '2019-11-17 17:09:53'),
(70, 'P003', 'G019', '', '2019-11-17 17:09:53'),
(71, 'P004', 'G014', '', '2019-11-17 17:10:33'),
(72, 'P004', 'G015', '', '2019-11-17 17:10:33'),
(73, 'P004', 'G016', '', '2019-11-17 17:10:33'),
(74, 'P004', 'G017', '', '2019-11-17 17:10:33'),
(75, 'P004', 'G018', '', '2019-11-17 17:10:33'),
(76, 'P004', 'G019', '', '2019-11-17 17:10:33'),
(77, 'P005', 'G001', '', '2019-11-17 17:11:01'),
(78, 'P005', 'G002', '', '2019-11-17 17:11:01'),
(79, 'P005', 'G003', '', '2019-11-17 17:11:01'),
(80, 'P005', 'G004', 'Ya', '2019-11-17 17:11:01'),
(81, 'P005', 'G005', '', '2019-11-17 17:11:01'),
(82, 'P005', 'G006', '', '2019-11-17 17:11:01'),
(83, 'P005', 'G007', '', '2019-11-17 17:11:01'),
(84, 'P005', 'G008', '', '2019-11-17 17:11:01'),
(85, 'P005', 'G009', '', '2019-11-17 17:11:01'),
(86, 'P005', 'G010', '', '2019-11-17 17:11:01'),
(87, 'P005', 'G011', '', '2019-11-17 17:11:01'),
(88, 'P005', 'G012', '', '2019-11-17 17:11:01'),
(89, 'P005', 'G013', '', '2019-11-17 17:11:01'),
(90, 'P005', 'G014', 'Ya', '2019-11-17 17:11:01'),
(91, 'P005', 'G015', 'Ya', '2019-11-17 17:11:01'),
(92, 'P005', 'G016', 'Ya', '2019-11-17 17:11:01'),
(93, 'P005', 'G017', 'Ya', '2019-11-17 17:11:01'),
(94, 'P005', 'G018', '', '2019-11-17 17:11:01'),
(95, 'P005', 'G019', '', '2019-11-17 17:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` text,
  `no_hp` varchar(14) DEFAULT NULL,
  `alamat` text,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `tgl_daftar` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `email`, `no_hp`, `alamat`, `username`, `password`, `tgl_daftar`) VALUES
(3, 'user', 'user@user.com', '081234567890', 'user', 'user', 'user', '2019-11-17 17:47:52'),
(4, 'tes', 'tes@tes.com', '081234567890', 'tes', 'tes', 'tes', '2019-11-17 21:28:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_diagnosa`
--
ALTER TABLE `tbl_diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`);

--
-- Indexes for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `tbl_pakar`
--
ALTER TABLE `tbl_pakar`
  ADD PRIMARY KEY (`id_pakar`);

--
-- Indexes for table `tbl_penyakit`
--
ALTER TABLE `tbl_penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- Indexes for table `tbl_relasi`
--
ALTER TABLE `tbl_relasi`
  ADD PRIMARY KEY (`id_relasi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_diagnosa`
--
ALTER TABLE `tbl_diagnosa`
  MODIFY `id_diagnosa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `tbl_pakar`
--
ALTER TABLE `tbl_pakar`
  MODIFY `id_pakar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_relasi`
--
ALTER TABLE `tbl_relasi`
  MODIFY `id_relasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
