-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2020 at 03:20 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nagaimame`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` char(30) NOT NULL,
  `pass` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `pass`) VALUES
(1, 'pakar', 'pakar');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` char(3) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`) VALUES
('G01', 'benang putih pada batang'),
('G02', 'butir bulat berwarna coklat pada batang'),
('G03', 'jorong berwarna coklat pada batang'),
('G04', 'batang menguning'),
('G05', 'pangkal batang bengkak berair'),
('G06', 'batang busuk kering'),
('G07', 'bercak putih pada daun'),
('G08', 'daun diselimuti tepung berwarna coklat'),
('G09', 'pada daun muncul cincin kuning kecoklatan'),
('G10', 'tulang daun menguning'),
('G11', 'daun menjadi layu'),
('G12', 'pada permukaan daun muncul bercak berwarna coklat'),
('G13', 'pada permukaan bawah daun muncul bercak berwarna hitam'),
('G14', 'muncul benjolan putih pada batang'),
('G15', 'muncul cincin kuning dengan inti berwarna coklat tua'),
('G16', 'buah diselimuti bubuk berwarna coklat kehitaman'),
('G17', 'tulang daun bagian bawah berwarna merah bata'),
('G18', 'pada batang muncul bercak berwarna jingga');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(9) NOT NULL,
  `nama_petani` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `id_penyakit` char(3) NOT NULL,
  `noID` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `nama_petani`, `alamat`, `id_penyakit`, `noID`) VALUES
(1, 'jim', 'mia', 'P03', '::1'),
(2, 'hai', 'hui', 'P01', '::1'),
(3, 'budi', 'csac', 'P02', '::1'),
(4, 'mlca', 'alc\r\n', 'P03', '::1'),
(5, 'cac', 'cs', 'P01', '::1'),
(6, 'jim', 'sc\r\n', 'P01', '::1'),
(7, 'ainz', 'albedo', 'P01', '::1'),
(8, 'scheq', 'cc', 'P04', '::1'),
(9, 'csac', 'csac', 'P03', '::1'),
(10, 'budi', 's', 'P06', '::1'),
(11, 's', 's', 'P04', '::1'),
(12, 'f', 'f', 'P01', '::1'),
(13, 'budi', 'c', 'P05', '::1'),
(14, 'g', 'gg', 'P06', '::1'),
(15, 'qwe', 'fafa', 'P05', '::1'),
(16, 'qwe', 'fafa', 'P03', '::1'),
(17, 'hjj', 'jjj', 'P05', '::1'),
(18, 'qwe', 'yeh', 'P03', '::1'),
(19, 'qw', 'w', 'P05', '::1'),
(20, 'tr', 'yr', 'P02', '::1'),
(21, 'cascas', 'acsca', 'P05', '::1'),
(22, 'acas', 'casca', 'P01', '::1'),
(23, 'acc', 'cascas', 'P03', '::1'),
(24, 'ttm', 'vsdv', 'P04', '::1'),
(25, 'acasc', 'sacsa', 'P01', '::1'),
(26, 'acsac', 'casca', 'P01', '::1'),
(27, 'qwq', 'fqfq', 'P03', '::1'),
(28, 'cascas', 'casca', 'P06', '::1'),
(29, 'acasc', 'cascasc', 'P01', '::1'),
(30, 'cascasc', 'acasc', 'P06', '::1'),
(31, 'cas', 'casca', 'P06', '::1'),
(32, 'Sandy', 'merah batang', 'P06', '::1'),
(33, 'Omen', 'Kacangnya laletan', 'P06', '::1'),
(34, 'sacasc', 'ascasca', 'P05', '::1'),
(35, 'ssaikawa', 'saka', 'P01', '::1'),
(36, 'sacasc', 'cascas', 'P05', '::1'),
(37, 'mendi', 'la', 'P04', '::1'),
(38, 'jrjr', 'rjrjt', 'P06', '::1'),
(39, 'rnrt', 'rnrt', 'P01', '::1'),
(40, 'rnrtn', 'rntr', 'P06', '::1'),
(41, 'rnrtnr', 'trnr', 'P05', '::1'),
(42, 'acacs', 'avava', 'P04', '::1'),
(43, 'avasv', 'asvasva', 'P03', '::1'),
(44, 'avav', 'avsava', 'P02', '::1'),
(45, 'vasva', 'asvasv', 'P03', '::1'),
(46, 'mma', 'sacsa', 'P03', '::1'),
(47, 'lll', 'njnj', 'P05', '::1'),
(48, 'hbhb', 'fh\r\n', 'P02', '::1'),
(49, 'ygygH', 'hh', 'P04', '::1'),
(50, 'kmkmq', 'vgg', 'P01', '::1'),
(51, 'bhbh', 'rd', 'P06', '::1'),
(52, 'sa', 'ca\r\n', 'P03', '::1'),
(53, 'CASC', 'CASC', 'P05', '::1'),
(54, 'casca', ' VA', 'P02', '::1'),
(55, 'BSBS', 'DSBSD', 'P04', '::1'),
(56, 'BBW', 'B', 'P01', '::1'),
(57, 'BEBE', 'ERBER', 'P06', '::1'),
(58, 'BRBEB', 'EBERB', 'P06', '::1'),
(59, 'olo', 'kina', 'P06', '::1'),
(60, 'daici', 'kai', 'P01', '::1'),
(61, 'budi', 'casc', 'P05', '::1'),
(62, 'saikawa', 'ttenji', 'P05', '::1'),
(63, 'maika', 'saia', 'P02', '::1'),
(64, 'cascas', 'csac', 'P03', '::1'),
(65, 'svsvsd', 'dv', 'P02', '::1'),
(66, 'acasc', 'cascas', 'P05', '::1'),
(67, 'min', 'sacsa', 'P06', '::1'),
(68, 'camsc', 'scmaksc', 'P06', '::1'),
(69, 'cascasc', 'casca', 'P02', '::1'),
(70, 'cascas', 'csaca', 'P05', '::1'),
(71, 'ascsa', 'cac', 'P06', '::1'),
(72, 'jij', 'sckam', 'P02', '::1'),
(73, 'budi', 'casc', 'P03', '::1'),
(74, 'scasc', 'cascas', 'P04', '::1'),
(75, 'sacasc', 'scacas', 'P04', '::1'),
(76, 'wwe', 'rwe', 'P01', '::1'),
(77, 'acssac', 'scaca', 'P06', '::1'),
(78, 'camskc', 'acskac', 'P02', '::1'),
(79, 'ascasc', 'cascas', 'P06', '::1'),
(80, 'qwcqcw', 'cqwcq', 'P03', '::1'),
(81, 'ascas', 'casc', 'P03', '::1'),
(82, 'ascascas', 'sacas', 'P05', '::1'),
(83, 'sacasc', 'cascas', 'P02', '::1'),
(84, 'sain', 'nsak\r\n', 'P04', '::1'),
(85, 'csac', 'asc', 'P04', '::1'),
(86, 'vvs', 'vds', 'P01', '::1'),
(87, 'cascasc', 'casc', 'P06', '::1'),
(88, 'asc', 'casc', 'P03', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` char(3) NOT NULL,
  `nama_penyakit` varchar(30) NOT NULL,
  `info_penyakit` text NOT NULL,
  `penanganan` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `info_penyakit`, `penanganan`, `gambar`) VALUES
('P01', 'Layu Sklerotium', 'Penyakit ini disebabkan oleh cendawan sclerotium rolfsii Sacc yang disebut juga Corticium rolfsii (Sacc) Curzi. Gejalanya pada pangkal batang mula-mula terdapat benang-benang putih seperti bulu berubah bentuk menjadi butir-butir bulat atau jorong dan warnanya berubah menjadi cokelat.', 'Cabut tanaman yang terserang lalu segera bakar, Pencegahannya dapat dilakukan dengan menjaga drainase agar tetap baik dan mengatur jarak tanam', 'http://nagaimamebean.000webhostapp.com/image/sklerotium.jpg'),
('P02', 'Karat Daun', 'Penyakit ini disebabkan oleh cendawan Uromyces phaseoli (Pers) Wint yang termasuk Uredinales atau cendawan karat. Gejalanya mula-mula hanya terdapat bercak kecil berwarna putih, semakin lama bercak menjadi cokelat bertepung dikelilingi warna kuning atau cincin cokelat yang kemudian berkembang menjadi cokelat tua.', 'Pengendaliannya dengan pemilihan benih yang baik dan pengiliran tanaman. Pengendalian dengan cara penyemprotan fungisida kontak.', 'http://nagaimamebean.000webhostapp.com/image/karat.jpg'),
('P03', 'Layu Fusarium', 'Penyebabnya adalah cendawan Fusarium oxysporum f. sp. phaseoli. Gejalanya adalah bagian tulang daun pada mulanya menguning, kemudian menjalar ke tangkai daun dan akhirnya daun menjadi layu. Warna kuning ini juga dapat menjalar ke helai daun.', 'Pengendaliannya dengan cara memusnahkan tanaman yang terserang dan menggunakan benih yang tahan terhadap serangan patogen. Dapat pula dengan cara menyiramkan larutan fungisida, misalnya Benhate dengan dosis 2 g/l air ke tanah bekas tanaman yang sakit.', 'http://nagaimamebean.000webhostapp.com/image/layu fus.jpg'),
('P04', 'Bercak Daun', 'Penyebabnya adalah cendawan Cercospora canescens. Gejalanya berupa bercak berbentuk bulat. Bercak pada permukaan daun bagian atau berwarna cokelat, sedangkan pada permukaan bawah tampak berwarna hitam. Bercak-bercak tersebut umumnya berbentuk bulat dengan diameter 1-5 mm. ', 'Pemberian fungisida yang efektif dan tepat untuk penyakit ini. Fungisida yang bisa digunakan adalah Score 250 EC dan Anvil 50 SC. pencegahannya dengan melakukan sanitasi lingkungan dan kontrol saluran drainase.', 'http://nagaimamebean.000webhostapp.com/image/bercak.jpg'),
('P05', 'Antraknosa', 'Penyakit ini disebabkan oleh Colletrotichum lindemuthianum atau Gloesporium lindemuthianum atau Glomerella lindemuthianum. gejalanya muncul bercak-bercak berwarna coklat kemerahan atau jingga pada batang yg terinfeksi cendawan hingga akhirnya busuk kering lalu menyebar ke tulang daun bagian bawah yang berubah warna menjadi merah bata', 'Membuat jarak tanam yang lebih renggang dan tidak menanam tanaman kacang-kacangan secara berulang. Apabila serangan mulai tinggi bisa dikendalikan menggunakan fungisida yang berbahan aktif propineb, dithiocarbamate dan mankozeb', 'http://nagaimamebean.000webhostapp.com/image/anta.jpg'),
('P06', 'Hawar Kacang', 'Penyebabnya adalah lalat kacang Phiomya phaseoli Tr atau Agromyza phaseoli Cog. Gejalanya daun tanaman muda (umur 14-30 hari) berbintik putih, kemudian menjadi kuning dengan titik cokelat di tengahnya. Titik cokelat tersebut merupakan tempat atau bekas tusukan hama sewaktu menghisap cairan tanaman dan tempat meletakkan telur.', 'lakukan pergiliran tanaman, penanaman dilakukan secara serempak, pada awal penanaman atau pada saat tanaman masih muda, lahan diberi mulsa dari jerami padi atau alang-alang. tanaman yang terserang segera dicabut, dibakar, atau dipendam di dalam tanah. pencegahan dapat dilakukan pada awal penanaman dengan insektisida berbahab aktif tiodikarb sebanyak 10-20 g/kg benih. Insektisida ini dapat pula disemprotkan pada tanaman berumur 8-10 hari, Hama dapat pula dibasmi dengan insektisida berbahan aktif monokrotofos. Penyemprotan dilakukan pada saat tanaman berumur 8 hari. Selain menggunakan insektisida semprot, dapat pula digunakan insektisida yang dipendam dalam tanah, bahan aktif karbofuran  misalnya Furadan 3 G.', 'http://nagaimamebean.000webhostapp.com/image/lalat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rules_penyakit`
--

CREATE TABLE `rules_penyakit` (
  `id_rules` int(9) NOT NULL,
  `id_penyakit` char(3) NOT NULL,
  `id_gejala` char(3) NOT NULL,
  `keyakinan` float DEFAULT NULL,
  `ketidakyakinan` float DEFAULT NULL,
  `CF` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rules_penyakit`
--

INSERT INTO `rules_penyakit` (`id_rules`, `id_penyakit`, `id_gejala`, `keyakinan`, `ketidakyakinan`, `CF`) VALUES
(5, 'P02', 'G07', 0.6, 0.1, 0.5),
(6, 'P02', 'G08', 0.7, 0.14, 0.56),
(7, 'P02', 'G09', 0.8, 0.1, 0.7),
(8, 'P02', 'G11', 0.8, 0.06, 0.74),
(9, 'P02', 'G12', 0.9, 0.1, 0.8),
(10, 'P03', 'G04', 0.6, 0.11, 0.49),
(11, 'P03', 'G10', 0.7, 0.12, 0.58),
(12, 'P03', 'G11', 0.7, 0.14, 0.56),
(13, 'P04', 'G08', 0.8, 0.13, 0.67),
(14, 'P04', 'G11', 0.7, 0.13, 0.57),
(15, 'P04', 'G12', 0.8, 0.05, 0.75),
(16, 'P04', 'G13', 0.9, 0.06, 0.84),
(17, 'P05', 'G06', 0.6, 0.05, 0.55),
(18, 'P05', 'G11', 0.5, 0.14, 0.36),
(19, 'P05', 'G16', 0.7, 0.1, 0.6),
(20, 'P05', 'G17', 0.9, 0.07, 0.83),
(21, 'P05', 'G18', 0.7, 0.08, 0.62),
(22, 'P06', 'G03', 0.9, 0.06, 0.84),
(23, 'P06', 'G05', 0.9, 0.06, 0.84),
(24, 'P06', 'G14', 0.8, 0.07, 0.73),
(25, 'P06', 'G15', 0.8, 0.07, 0.73),
(50, 'P01', 'G01', 0.6, 0.12, 0.48),
(51, 'P01', 'G02', 0.8, 0.09, 0.71),
(52, 'P01', 'G03', 0.8, 0.12, 0.68),
(53, 'P01', 'G18', 0.7, 0.13, 0.57);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_analisa`
--

CREATE TABLE `tmp_analisa` (
  `id_gejala` char(3) NOT NULL,
  `id_penyakit` char(3) NOT NULL,
  `noID` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_analisa`
--

INSERT INTO `tmp_analisa` (`id_gejala`, `id_penyakit`, `noID`) VALUES
('G04', 'P03', '::1'),
('G10', 'P03', '::1'),
('G11', 'P03', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_cf`
--

CREATE TABLE `tmp_cf` (
  `id_gejala` char(3) NOT NULL,
  `noID` char(30) NOT NULL,
  `ket` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_cf`
--

INSERT INTO `tmp_cf` (`id_gejala`, `noID`, `ket`) VALUES
('G11', '::1', 'y'),
('G04', '::1', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_gejala`
--

CREATE TABLE `tmp_gejala` (
  `id_gejala` char(3) NOT NULL,
  `noID` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_penyakit`
--

CREATE TABLE `tmp_penyakit` (
  `id_penyakit` char(3) NOT NULL,
  `noID` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_penyakit`
--

INSERT INTO `tmp_penyakit` (`id_penyakit`, `noID`) VALUES
('P03', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_petani`
--

CREATE TABLE `tmp_petani` (
  `id_petani` int(9) NOT NULL,
  `nama_petani` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `noID` char(30) NOT NULL,
  `ctr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_petani`
--

INSERT INTO `tmp_petani` (`id_petani`, `nama_petani`, `alamat`, `noID`, `ctr`) VALUES
(1, 'saijaku', 'mem', 'asakusa', 1),
(2, 'saiki', 'dai', 'benjo', 3),
(3, 'kaisa', 'kaka', 'benjo', 2),
(4, 'acas', 'casc', '::1', 0),
(5, 'sacasc', 'ascasca', '::1', 0),
(6, 'acasc', 'acasca', '::1', 0),
(7, 'shiro', 'kaka', '::1', 0),
(8, 'ssaikawa', 'saka', '::1', 0),
(9, 'sacasc', 'cascas', '::1', 0),
(10, 'acas', 'scasa', '::1', 0),
(11, 'acasca', 'scasca', '::1', 0),
(12, 'cascasc', 'csaca', '::1', 0),
(13, 'casca', 'ascas', '::1', 0),
(14, 'qwe', 'sca', '::1', 0),
(15, 'jjfj', 'jfj', '::1', 0),
(16, 'bfs', 'sac', '::1', 0),
(17, 'caca', 'casca', '::1', 1),
(18, 'saiki', 'kasa', '::1', 1),
(19, 'maika', 'katakuni', '::1', 1),
(20, 'sakai', 'scasc', '::1', 1),
(21, 'casca', 'casc', '::1', 1),
(22, 'mendi', 'la', '::1', 1),
(23, 'sacac', 'ascac', '::1', 1),
(24, 'sacac', 'sca', '::1', 1),
(25, 'cascas', 'scacs', '::1', 1),
(26, 'jrjr', 'rjrjt', '::1', 1),
(27, 'rnrt', 'rnrt', '::1', 1),
(28, 'rnrtn', 'rntr', '::1', 1),
(29, 'rnrtnr', 'trnr', '::1', 1),
(30, 'acacs', 'avava', '::1', 1),
(31, 'avasv', 'asvasva', '::1', 1),
(32, 'avav', 'avsava', '::1', 1),
(33, 'vasva', 'asvasv', '::1', 1),
(34, 'vasva', 'asvasv', '::1', 1),
(35, 'mma', 'sacsa', '::1', 1),
(36, 'lll', 'njnj', '::1', 1),
(37, 'hbhb', 'fh\r\n', '::1', 1),
(38, 'ygygH', 'hh', '::1', 1),
(39, 'kmkmq', 'vgg', '::1', 1),
(40, 'bhbh', 'rd', '::1', 1),
(41, 'sa', 'ca\r\n', '::1', 1),
(42, 'CASC', 'CASC', '::1', 1),
(43, 'casca', ' VA', '::1', 1),
(44, 'BSBS', 'DSBSD', '::1', 1),
(45, 'BBW', 'B', '::1', 1),
(46, 'BEBE', 'ERBER', '::1', 1),
(47, 'BRBEB', 'EBERB', '::1', 1),
(48, 'olo', 'kina', '::1', 1),
(49, 'daici', 'kai', '::1', 1),
(50, 'budi', 'casc', '::1', 1),
(51, 'cascas', 'ascas', '::1', 1),
(52, 'saikawa', 'ttenji', '::1', 1),
(53, 'saikawa', 'ttenji', '::1', 1),
(54, 'maika', 'saia', '::1', 1),
(55, 'cascas', 'csac', '::1', 1),
(56, 'svsvsd', 'dv', '::1', 1),
(57, 'acasc', 'cascas', '::1', 1),
(58, 'min', 'sacsa', '::1', 1),
(59, 'camsc', 'scmaksc', '::1', 1),
(60, 'cascasc', 'casca', '::1', 1),
(61, 'cascas', 'csaca', '::1', 1),
(62, 'ascsa', 'cac', '::1', 1),
(63, 'jij', 'sckam', '::1', 1),
(64, 'budi', 'casc', '::1', 1),
(65, 'scasc', 'cascas', '::1', 1),
(66, 'sacasc', 'scacas', '::1', 1),
(67, 'wwe', 'rwe', '::1', 1),
(68, 'acssac', 'scaca', '::1', 1),
(69, 'camskc', 'acskac', '::1', 1),
(70, 'ascasc', 'cascas', '::1', 1),
(71, 'qwcqcw', 'cqwcq', '::1', 1),
(72, 'ascas', 'casc', '::1', 1),
(73, 'ascascas', 'sacas', '::1', 1),
(74, 'sacasc', 'cascas', '::1', 1),
(75, 'sain', 'nsak\r\n', '::1', 1),
(76, 'csac', 'asc', '::1', 1),
(77, 'vvs', 'vds', '::1', 1),
(78, 'cascasc', 'casc', '::1', 1),
(79, 'asc', 'casc', '::1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `rules_penyakit`
--
ALTER TABLE `rules_penyakit`
  ADD PRIMARY KEY (`id_rules`);

--
-- Indexes for table `tmp_petani`
--
ALTER TABLE `tmp_petani`
  ADD PRIMARY KEY (`id_petani`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `rules_penyakit`
--
ALTER TABLE `rules_penyakit`
  MODIFY `id_rules` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tmp_petani`
--
ALTER TABLE `tmp_petani`
  MODIFY `id_petani` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
