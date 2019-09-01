-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2018 at 07:59 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_buku`
--
CREATE DATABASE IF NOT EXISTS `db_buku` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_buku`;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `id_katalog` int(11) NOT NULL,
  `judul` varchar(90) NOT NULL,
  `rating` float NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `hal` varchar(4) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `harga` varchar(11) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `tanggal_edit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_katalog`, `judul`, `rating`, `pengarang`, `penerbit`, `hal`, `gambar`, `harga`, `deskripsi`, `tanggal`, `tanggal_edit`) VALUES
(1, 14, 'Magic by the Mouthful', 0, 'Kathryn Littlewood', 'Noura Book Publising ', '344', '107404_f.jpg', '67150', 'Lagi-lagi Asosiasi Internasional Penggilas Adonan berulah! Dengan bantuan Bibi Lily, mereka mencuri Larutan Venus milik Keluarga Bliss! Kali ini atas arahan si jahat Count Caruso, dengan tujuan yang lebih kejam daripada sebelumnya! Dengan setetes Larutan Venus pada tiap potong Kue Alaska yang lezat,', '07/18/2018', '2018/07/14'),
(2, 2, 'Jarrvis Chavali', 0, 'Ainun Nufus', 'Diandra Primamitra ', '304', 'jarvice.jpg', '58000', 'Bukan tentang percintaan menggebu, ini tentang hati yang bicara tanpa banyak kata.\r\nChavali Fathina, perempuan yang hidup hanya dengan menjalani hari tanpa impian. Baginya, hidup hanya menjalani hari selagi masih bisa bernapas.\r\n', '07/13/2018', '2018-07-06'),
(3, 2, 'Patah Hati di Tanah Suci ', 0, 'Tasaro GK', 'Bentang Pustaka ', '340', 'patah.jpg', ' 62900', '"...Aku hampir-hampir kehabisan alasan untuk tetap peduli kepadamu, kecuali kenyataan bahwa aku anakmu. Lahir oleh perantara dirimu. Kita tak punya banyak kenangan, ya, Pak?"\r\n\r\nPada pusara sang ayahanda, Tasaro memutar ulang memorinya. Betapa berjaraknya hubungan yang mereka jalin selama ini. Ia me', '07/05/2018', '2018-07-06'),
(4, 3, 'New Gate', 0, 'shijiro', 'shijiro', '120', 'new-gate.jpg', '70000', 'Seorang pekerja biasa  yang terjebak di dalam duniagame bertahan hidup', '07/05/2018', '2018/07/10'),
(5, 1, 'SWEET ESCAPE 02', 0, 'Kiyoshin', 'Haru Media ', '156', 'sweet.jpg', '52700', 'Yang tadi itu... nggak salah, kan?\r\n\r\nIdolaku... memelukku?\r\n\r\n', '07/11/2018', '2018/07/13'),
(6, 3, 'Otodidak Desain dan Pemrograman Website  ', 0, 'Jubilee Enterprise', 'Elex Media Komputindo ', '144', '101149_f.jpg', '36380', 'Buku ini membahas secara praktis pemrograman dan desain website yang memadukan Dreamweaver, HTML, CSS, dan PHP bagi pemula. Pembahasan di dalam buku ini meliputi: \r\n\r\nï¿½ Memadukan Dreamweaver dan XAMPP untuk menguji pemrograman berbasis server side seperti PHP. \r\nï¿½ Mengombinasikan PHP dan Form ag', '07/12/2018', '2018-07-13'),
(7, 4, 'Jangan Berhenti Berdoa', 0, 'Dwi Suwiknyo', 'Diva Press ', '46', 'jng.jpg', '45500', 'Ada banyak doa yang telah di panjatkan, apakah semuanya terkabul? \r\nTernyata tidak. Lantas apakah kita memilih untuk berhenti berdoa? \r\nKemudian berputus asa? Lebih parah lagi, kita berpikiran negatid kepada \r\nAllah swt. Naudzubillah. Sungguh Allah swt tidak menyukai hamba-Nya yang\r\nberputus asa. Se', '07/12/2018', '2018-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_cus` int(11) NOT NULL,
  `nama_cus` varchar(40) NOT NULL,
  `email_cus` varchar(40) NOT NULL,
  `password_cus` varchar(40) NOT NULL,
  `status_cus` varchar(10) NOT NULL,
  `alamat_cus` text NOT NULL,
  `nohp_cus` int(13) NOT NULL,
  `kota_cus` varchar(20) NOT NULL,
  `jk_cus` varchar(20) NOT NULL,
  `kode_pos_cus` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_cus`, `nama_cus`, `email_cus`, `password_cus`, `status_cus`, `alamat_cus`, `nohp_cus`, `kota_cus`, `jk_cus`, `kode_pos_cus`) VALUES
(20, 'eri cahyana', 'user@g.m', 'user', 'enabled', 'kp.pamoyanan', 2147483647, '44', 'lakilaki', 40551),
(21, 'Eri Cahyana', 'ericahyana', 'eri', 'enabled', 'jfghsgrgcf', 2147483647, 'cimohai', 'enabled', 45689),
(22, 'eri', 'admin@gmail.com', 'admin', 'enabled', 'sdfsdfg', 493589347, 'dfgdhj', 'lakilaki', 5678),
(23, 'eri', 'eri123', 'eri', 'enabled', 'kp.pamoyanan rt.03/13', 9657456, 'cimahi', 'lakilaki', 40662),
(24, 'uuss', 'uss', 'uss', 'enabled', '', 0, '', 'Laki-Laki', 0),
(25, 'asd', 'asd', 'asd', 'enabled', '', 0, '', 'Laki-Laki', 0),
(26, 'qwe', 'qwe', 'qwe', 'enabled', '', 0, '', 'Laki-Laki', 0),
(27, 'qwed', 'qwed', 'qwed', 'enabled', '', 0, '', 'Laki-Laki', 0),
(28, 'azx', 'azx', 'azx', 'enabled', '', 0, '', 'Laki-Laki', 0),
(29, 'asx', 'asx', 'asx', 'enabled', '', 0, '', 'Laki-Laki', 0),
(30, 'asdf', 'asdf', 'sdf', 'enabled', '', 0, '', 'Laki-Laki', 0);

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id_katalog` int(11) NOT NULL,
  `katalog` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id_katalog`, `katalog`) VALUES
(1, 'Komik'),
(2, 'Novel'),
(3, 'Informatika'),
(4, 'LKS SMK'),
(5, 'Sejarah'),
(14, 'Buku Gambar');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Dewasa'),
(2, 'Anak'),
(3, 'Remaja'),
(4, 'Pendidikan'),
(5, 'Action'),
(6, 'Adventure'),
(10, 'Matrilal Art'),
(11, 'Fantasy'),
(12, 'Light Novel'),
(14, 'Comedy');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id_buku` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`id_buku`, `id_kategori`) VALUES
(0, 12),
(0, 3),
(2, 6),
(2, 11),
(2, 12),
(3, 6),
(3, 1),
(3, 3),
(4, 2),
(4, 14),
(4, 1),
(4, 11),
(4, 12),
(4, 10),
(5, 2),
(5, 14),
(5, 12),
(6, 4),
(6, 3),
(7, 11),
(7, 4),
(1, 5),
(1, 12),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `konfirm_beli`
--

CREATE TABLE `konfirm_beli` (
  `id_cus` int(10) NOT NULL,
  `kode_beli` int(10) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tgl_konfirm` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirm_beli`
--

INSERT INTO `konfirm_beli` (`id_cus`, `kode_beli`, `gambar`, `tgl_konfirm`) VALUES
(20, 13974, 'WhatsApp Image 2018-07-10 at 6.08.04 AM.jpeg', '2013-07-18'),
(20, 32668, 'WhatsApp Image 2018-07-10 at 6.08.08 AM.jpeg', '2013-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_beli` int(11) NOT NULL,
  `kode_beli` varchar(100) NOT NULL,
  `id_cus` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `total_harga` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_beli`, `kode_beli`, `id_cus`, `id_buku`, `qty`, `harga`, `total_harga`) VALUES
(65, '207', 21, 1, '2', '67150', '134300'),
(66, '207', 21, 3, '2', ' 62900', '260100'),
(67, '207', 21, 4, '2', '70000', '400100'),
(68, '207', 21, 2, '2', '58000', '516100'),
(69, '24244', 21, 1, '2', '67150', '134300'),
(70, '24244', 21, 3, '2', ' 62900', '260100'),
(71, '24244', 21, 4, '2', '70000', '400100'),
(72, '24244', 21, 2, '2', '58000', '516100'),
(73, '7706', 21, 1, '2', '67150', '134300'),
(74, '7706', 21, 3, '2', ' 62900', '260100'),
(75, '7706', 21, 4, '2', '70000', '400100'),
(76, '7706', 21, 2, '2', '58000', '516100'),
(77, '4904', 21, 1, '4', '67150', '268600'),
(78, '4904', 21, 3, '5', ' 62900', '583100'),
(79, '4904', 21, 4, '4', '70000', '863100'),
(80, '4904', 21, 2, '4', '58000', '1095100'),
(81, '14804', 21, 1, '4', '67150', '268600'),
(82, '14804', 21, 3, '5', ' 62900', '583100'),
(83, '14804', 21, 4, '4', '70000', '863100'),
(84, '14804', 21, 2, '4', '58000', '1095100'),
(85, '29029', 20, 4, '1', '70000', '70000'),
(86, '20556', 20, 4, '1', '70000', '70000'),
(87, '20556', 20, 1, '5', '67150', '405750'),
(88, '26497', 20, 2, '4', '58000', '232000'),
(89, '26405', 22, 5, '2', '45600000', '91200000'),
(90, '26405', 22, 1, '2', '67150', '91334300'),
(91, '26405', 22, 2, '2', '58000', '91450300'),
(92, '24826', 22, 5, '2', '45600000', '91200000'),
(93, '24826', 22, 1, '2', '67150', '91334300'),
(94, '24826', 22, 2, '2', '58000', '91450300'),
(95, '20641', 22, 5, '2', '45600000', '91200000'),
(96, '20641', 22, 1, '2', '67150', '91334300'),
(97, '20641', 22, 2, '2', '58000', '91450300'),
(98, '4806', 20, 1, '1', '67150', '67150'),
(99, '11352', 20, 5, '2', '45600000', '91200000'),
(100, '25009', 22, 5, '2', '45600000', '91200000'),
(101, '25009', 22, 4, '1', '70000', '91270000'),
(102, '4459', 22, 4, '1', '70000', '70000'),
(103, '21538', 22, 4, '1', '70000', '70000'),
(104, '6349', 23, 2, '3', '58000', '174000'),
(105, '6349', 23, 4, '3', '70000', '384000'),
(106, '24243', 23, 2, '3', '58000', '174000'),
(107, '24243', 23, 4, '3', '70000', '384000'),
(108, '11813', 23, 2, '3', '58000', '174000'),
(109, '11813', 23, 4, '4', '70000', '454000'),
(110, '7162', 23, 5, '1', '45600000', '45600000'),
(111, '3184', 20, 2, '4', '58000', '232000'),
(112, '818', 20, 4, '2', '70000', '140000'),
(113, '818', 20, 5, '3', '52700', '298100'),
(114, '13974', 20, 6, '6', '36380', '218280'),
(115, '13974', 20, 4, '6', '70000', '638280'),
(116, '13974', 20, 2, '2', '58000', '754280'),
(117, '13974', 20, 1, '1', '67150', '821430'),
(118, '13974', 20, 3, '2', ' 62900', '947230'),
(119, '13974', 20, 7, '1', '45500', '992730'),
(120, '32668', 20, 5, '7', '52700', '368900');

-- --------------------------------------------------------

--
-- Table structure for table `selesai`
--

CREATE TABLE `selesai` (
  `kode_beli` varchar(100) NOT NULL,
  `id_cus` int(11) NOT NULL,
  `qty_total` varchar(10) NOT NULL,
  `bayar` varchar(15) NOT NULL,
  `total_bayar` varchar(15) NOT NULL,
  `tgl_order` text NOT NULL,
  `cara_bayar` varchar(20) NOT NULL,
  `status_beli` enum('Order','Lunas') NOT NULL,
  `status_pengiriman` enum('Belum Di Kirim','Di Kirim','Di Terima') NOT NULL,
  `bank` varchar(20) NOT NULL,
  `nama_rek` varchar(30) NOT NULL,
  `no_rek` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selesai`
--

INSERT INTO `selesai` (`kode_beli`, `id_cus`, `qty_total`, `bayar`, `total_bayar`, `tgl_order`, `cara_bayar`, `status_beli`, `status_pengiriman`, `bank`, `nama_rek`, `no_rek`) VALUES
('11352', 20, '2', '91200000', '91200000', '12-07-18', '', 'Lunas', 'Di Kirim', 'jksdfm', 'kjsdjsdf', 0),
('11813', 23, '7', '280000', '454000', '13-07-18', '', 'Order', 'Belum Di Kirim', '', '', 0),
('13974', 20, '18', '45500', '992730', '13-07-18', '', 'Order', 'Belum Di Kirim', 'BCA', 'Eri Cahyana', 2147483647),
('14273', 22, '', '', '14273', '2018-07-12', '', 'Order', 'Belum Di Kirim', '', '', 0),
('14804', 21, '17', '232000', '1095100', '2018-07-09', '', 'Order', 'Belum Di Kirim', 'baqkn dfasf', 'c eafdfknpsf', 97809),
('20556', 20, '6', '335750', '405750', '2018-07-09', '', 'Lunas', 'Di Kirim', '', '', 0),
('20641', 22, '6', '116000', '91450300', '11-07-18', '', 'Order', 'Belum Di Kirim', '', '', 0),
('207', 21, '8', '116000', '516100', '2018-07-09', '', 'Order', 'Belum Di Kirim', '123', '123', 123),
('21538', 22, '1', '70000', '70000', '13-07-18', '', 'Order', 'Belum Di Kirim', '', '', 0),
('24243', 23, '6', '210000', '384000', '13-07-18', '', 'Lunas', 'Di Kirim', '', '', 0),
('24244', 21, '8', '116000', '516100', '2018-07-09', '', 'Order', 'Belum Di Kirim', '123', '123', 123),
('24826', 22, '6', '116000', '91450300', '11-07-18', '', 'Order', 'Belum Di Kirim', '', '', 0),
('25009', 22, '3', '70000', '91270000', '12-07-18', '', 'Order', 'Belum Di Kirim', '', '', 0),
('26405', 22, '6', '116000', '91450300', '11-07-18', '', 'Order', 'Belum Di Kirim', 'sdfsdf', 'cvbdfgh', 347456),
('26497', 20, '4', '232000', '232000', '10-07-18', '', 'Lunas', 'Di Kirim', '', '', 0),
('29029', 20, '1', '70000', '70000', '2018-07-09', '', 'Lunas', 'Di Kirim', 'bca', 'eri', 8956756),
('3184', 20, '4', '232000', '232000', '13-07-18', '', 'Lunas', 'Di Kirim', 'BCA', 'Eri Cahyana', 747549459),
('32668', 20, '7', '368900', '368900', '13-07-18', '', 'Order', 'Belum Di Kirim', '', '', 0),
('4086', 22, '', '', '', '', '', 'Order', 'Belum Di Kirim', '', '', 0),
('4459', 22, '1', '70000', '70000', '12-07-18', '', 'Order', 'Belum Di Kirim', '', '', 0),
('4806', 20, '1', '67150', '67150', '11-07-18', '', 'Lunas', 'Di Kirim', '', '', 0),
('4904', 21, '17', '232000', '1095100', '2018-07-09', '', 'Order', 'Belum Di Kirim', 'vcbcv', 'cvbcv', 0),
('6349', 23, '6', '210000', '384000', '13-07-18', '', 'Order', 'Belum Di Kirim', '', '', 0),
('7162', 23, '1', '45600000', '45600000', '13-07-18', '', 'Order', 'Belum Di Kirim', '', '', 0),
('7706', 21, '8', '116000', '516100', '2018-07-09', '', 'Order', 'Belum Di Kirim', '', '', 0),
('818', 20, '5', '158100', '298100', '13-07-18', '', 'Lunas', 'Di Kirim', 'BCA', 'Eri Cahyana', 84592334);

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_stok` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `stok` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id_stok`, `id_buku`, `stok`) VALUES
(1, 1, '25'),
(61, 0, '34'),
(62, 2, '10'),
(63, 3, '31'),
(64, 4, '57'),
(65, 5, '84'),
(66, 5, '567'),
(67, 5, '34'),
(68, 6, '59'),
(69, 7, '45');

-- --------------------------------------------------------

--
-- Table structure for table `superuser`
--

CREATE TABLE `superuser` (
  `id_su` int(11) NOT NULL,
  `status_su` varchar(10) NOT NULL,
  `nama_su` varchar(40) NOT NULL,
  `email_su` varchar(40) NOT NULL,
  `password_su` varchar(40) NOT NULL,
  `level` enum('owner','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superuser`
--

INSERT INTO `superuser` (`id_su`, `status_su`, `nama_su`, `email_su`, `password_su`, `level`) VALUES
(3, 'enabled', 'Eri Owner', 'owner@gmail.com', 'admin', 'admin'),
(15, 'enabled', 'admin', 'admin', 'admin', 'admin'),
(16, 'enabled', 'eric', 'eric', 'eric', 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE `tujuan` (
  `id_tujuan` int(11) NOT NULL,
  `kode_beli` varchar(110) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`id_tujuan`, `kode_beli`, `nama_penerima`, `kota`, `kode_pos`, `no_hp`, `alamat`) VALUES
(17, '24244', '', 'cimohai', '45689', '', ' jfghsgrgcf'),
(18, '7706', 'eri cahyana', 'cimohai', '45689', '2147483647', ' jfghsgrgcf'),
(19, '4904', 'Eri Cahyana', 'cimohai', '45689', '2147483647', ' jfghsgrgcf'),
(20, '14804', 'Eri Cahyana', 'cimohai', '45689', '2147483647', ' jfghsgrgcf'),
(21, '29029', 'eri cahyana', '44', '40551', '94358345', ' kp.pamoyanan'),
(22, '20556', 'eri cahyana', '44', '40551', '94358345', ' kp.pamoyanan'),
(23, '26497', 'eri cahyana', '44', '40551', '94358345', ' kp.pamoyanan'),
(24, '26405', 'eri', '457457', '08978', '076', ' fdghfghjgj'),
(25, '24826', 'eri', 'fhfgh', '05675', '054747', ' fghfgh'),
(26, '20641', '', '', '', '', ' '),
(27, '4806', 'eri cahyana', '44', '40551', '94358345', ' kp.pamoyanan'),
(28, '11352', 'eri cahyana', '44', '40551', '94358345', ' kp.pamoyanan'),
(29, '25009', 'eri', 'kota', '689', '048656787', 'jbkdflsdf  djrt '),
(30, '4459', 'eri', 'dfgdfg', '03453', '0890', ' fdgfgjfgnszdfs'),
(31, '21538', 'eri', 'dfgdhj', '5678', '493589347', ' sdfsdfg'),
(32, '6349', 'eri', '', '0', '0', ' '),
(33, '24243', 'eri', 'cimahi', '40662', '9657456', ' kp.pamoyanan rt.03/13'),
(34, '11813', 'eri', 'cimahi', '40662', '9657456', ' kp.pamoyanan rt.03/13'),
(35, '7162', 'eri', 'cimahi', '40662', '9657456', ' kp.pamoyanan rt.03/13'),
(36, '3184', 'eri cahyana', '44', '40551', '2147483647', ' kp.pamoyanan'),
(37, '818', 'eri cahyana', '44', '40551', '2147483647', ' kp.pamoyanan'),
(38, '13974', 'eri cahyana', '44', '40551', '2147483647', ' kp.pamoyanan'),
(39, '32668', 'eri cahyana', '44', '40551', '2147483647', ' kp.pamoyanan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_cus`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id_katalog`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfirm_beli`
--
ALTER TABLE `konfirm_beli`
  ADD PRIMARY KEY (`kode_beli`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indexes for table `selesai`
--
ALTER TABLE `selesai`
  ADD PRIMARY KEY (`kode_beli`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `superuser`
--
ALTER TABLE `superuser`
  ADD PRIMARY KEY (`id_su`);

--
-- Indexes for table `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`id_tujuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_cus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id_katalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `superuser`
--
ALTER TABLE `superuser`
  MODIFY `id_su` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id_tujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
