-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2015 at 12:45 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lms_tepin_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_user` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `nama` varchar(45) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `password`, `status`, `nama`) VALUES
('adminsman7', '2be8a5fd6d4a0f5cd75ad0535137a82a', 'admin', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `analisis`
--

CREATE TABLE IF NOT EXISTS `analisis` (
  `id_analisis` int(11) NOT NULL AUTO_INCREMENT,
  `jawaban` varchar(45) NOT NULL,
  `nis` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  PRIMARY KEY (`id_analisis`),
  KEY `id_soal` (`id_soal`),
  KEY `nis` (`nis`),
  KEY `nis_2` (`nis`),
  KEY `id_ujian` (`id_ujian`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `analisis`
--

INSERT INTO `analisis` (`id_analisis`, `jawaban`, `nis`, `id_soal`, `id_ujian`) VALUES
(1, 'F', 121310001, 6, 7),
(2, 'D', 121310001, 7, 7),
(3, 'A', 121310002, 6, 7),
(4, 'D', 121310002, 7, 7);

-- --------------------------------------------------------

--
-- Stand-in structure for view `analisis_tingkat_kesukaran`
--
CREATE TABLE IF NOT EXISTS `analisis_tingkat_kesukaran` (
`id_analisis` int(11)
,`nis` int(11)
,`nama_siswa` varchar(45)
,`id_soal` int(11)
,`benar` int(0)
,`salah` int(0)
,`id_ujian` int(11)
,`nama_ujian` varchar(45)
);
-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `id_foto` bigint(20) NOT NULL AUTO_INCREMENT,
  `file_foto` varchar(100) NOT NULL,
  `pemilik` bigint(20) NOT NULL,
  PRIMARY KEY (`id_foto`),
  KEY `nip` (`pemilik`),
  KEY `pemilik` (`pemilik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `nip` bigint(20) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jklamin_guru` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dispict` varchar(100) NOT NULL,
  `status` varchar(45) NOT NULL,
  `id_mp` int(11) NOT NULL,
  PRIMARY KEY (`nip`),
  KEY `id_mp` (`id_mp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `jklamin_guru`, `password`, `email`, `dispict`, `status`, `id_mp`) VALUES
(195705111981032, 'NIENA YULIANA', 'Perempuan', '320875d0f755cc003336cfdf31b3c46e', 'NIENAYULIANA@domain.com', 'unknown.png', 'guru', 18),
(195706141981011, 'DAHLAN SYAEFUDIN', 'Laki-Laki', '78b94595cdc5fecf24c770ad9730b1eb', 'DAHLANSYAEFUDIN@domain.com', 'unknown.png', 'guru', 16),
(195805071984031, 'UDIN HASAN MUHIDIN', 'Laki-Laki', '5f637a2faf19d5f4355ab6a27c3dc805', 'UDINHASANMUHIDIN@domain.com', 'unknown.png', 'guru', 13),
(195810171985032, 'ENNY SUMARNI GANDAWIJAYA', 'Perempuan', '72338c513b02ec50faaad7a178f7244b', 'ENNYSUMARNIGANDAWIJAYA@domain.com', 'unknown.png', 'guru', 13),
(195903041984032, 'IMAS SETIAMAH', 'Perempuan', 'ff0974f4fee9455bfd9e414e797bd051', 'IMASSETIAMAH@domain.com', 'unknown.png', 'guru', 16),
(196208131989031, 'TATANG OJANG', 'Laki-Laki', '30604bb596177b7bc7ad373ae42879a2', 'TATANGOJANG@domain.com', 'unknown.png', 'guru', 1),
(195505101984031006, 'WAWAN SUANDANA', 'Laki-Laki', '54c410da7b22c5930fc79b368ee67174', 'WAWANSUANDANA@domain.com', 'unknown.png', 'guru', 11),
(195506171982031002, 'HAM BUDIYAMAN', 'Laki-Laki', '8aa7f4c29c30137c5aa3e2685d403730', 'HAMBUDIYAMAN@domain.com', 'unknown.png', 'guru', 12),
(195606141985031008, 'H. WAWAN RUSWENDA', 'Laki-Laki', '77b88b310308347536b9f36a1f7826ba', 'H.WAWANRUSWENDA@domain.com', 'unknown.png', 'guru', 5),
(195609111982032011, 'RAFLIS SYARIF', 'Perempuan', '81abbd00ba1e5ed55ac8cd418962106b', 'RAFLISSYARIF@domain.com', 'unknown.png', 'guru', 15),
(195701241981032002, 'II WIDANINGSIH', 'Perempuan', 'a3bca4340a9a3d2f12aef55f98df6ce6', 'IIWIDANINGSIH@domain.com', 'unknown.png', 'guru', 5),
(195709201984031006, 'ADE SAEFUDIN', 'Laki-Laki', '52dee86ad83039aeb585054f08effd2f', 'ADESAEFUDIN@domain.com', 'unknown.png', 'guru', 6),
(195712161984032004, 'LINGGUAN ALAM', 'Perempuan', '146fa62d62d804520c3663ed2f1cfd24', 'LINGGUANALAM@domain.com', 'unknown.png', 'guru', 18),
(195808071986031015, 'MOH. TOHA MIHARJA RAHMAN', 'Laki-Laki', 'a8a6a23922f616981d0ed3bf5f9e819d', 'MOH.TOHAMIHARJARAHMAN@domain.com', 'unknown.png', 'guru', 16),
(195808241981012003, 'N LILY MARLIANA', 'Perempuan', '1cefab3de2502bcaf0c2983ffc53dc9c', 'NLILYMARLIANA@domain.com', 'unknown.png', 'guru', 10),
(195809181983032005, 'NANI SUMARTINI', 'Perempuan', '5cc082ed2915e765278071381414a035', 'NANISUMARTINI@domain.com', 'unknown.png', 'guru', 10),
(195811301983022001, 'IIN KARTINI', 'Perempuan', '157c7feb8f1fde63411e2ad05d6b3999', 'IINKARTINI@domain.com', 'unknown.png', 'guru', 16),
(195912051989031008, 'MUHAJAR ABDUL HADI', 'Laki-Laki', '18af3329e078f839766d579e2d7b1461', 'MUHAJARABDULHADI@domain.com', 'unknown.png', 'guru', 7),
(195912311991051014, 'SYAFRUDDIN ISMAIL', 'Laki-Laki', 'a10791a4f118d086a09770ffd3ea97b7', 'SYAFRUDDINISMAIL@domain.com', 'unknown.png', 'guru', 12),
(196001211982031012, 'LUKMAN SYARIEF', 'Laki-Laki', 'f1e29987b4503d19ae1e878c34b5cca2', 'LUKMANSYARIEF@domain.com', 'unknown.png', 'guru', 8),
(196006221986032005, 'DINI RUKITASARI', 'Perempuan', '95402a69dde44a1559987b81bdba30a6', 'DINIRUKITASARI@domain.com', 'unknown.png', 'guru', 19),
(196007281986032003, 'TUTI HERAWATI', 'Perempuan', 'd8c5b1edf9345798a1a737ead7cd09a8', 'TUTIHERAWATI@domain.com', 'unknown.png', 'guru', 7),
(196012111984031005, 'DEDE DARWADI', 'Laki-Laki', '61b1ca97ba4d62adfc7d3939014b270b', 'DEDEDARWADI@domain.com', 'unknown.png', 'guru', 18),
(196107111987032001, 'RADEN CASWIRIH', 'Perempuan', '69fc77d31709475016aa046d67234c69', 'RADENCASWIRIH@domain.com', 'unknown.png', 'guru', 1),
(196204191985121001, 'APEP RAHDIANA', 'Laki-Laki', '3abdec667e93e372a8ecdaf384bf1a11', 'APEPRAHDIANA@domain.com', 'unknown.png', 'guru', 9),
(196211141987031006, 'MOHAMAD AHYAR', 'Laki-Laki', '00caa6b8925f3bcb67865052fc3c217d', 'MOHAMADAHYAR@domain.com', 'unknown.png', 'guru', 11),
(196211291989031005, 'EDI JUNAEDI', 'Laki-Laki', '56bf1e306aedc30afbc4e92619101062', 'EDIJUNAEDI@domain.com', 'unknown.png', 'guru', 11),
(196212271998022001, 'DHEWAYANI', 'Perempuan', 'f7ccf6dda1a7ed8e0f81b0bede0d2759', 'DHEWAYANI@domain.com', 'unknown.png', 'guru', 5),
(196302031988032003, 'TRI HARTI DYAH P.S.H', 'Perempuan', '596e86e822e28c8091ef3f8d3486b14d', 'TRIHARTIDYAHP.S.H@domain.com', 'unknown.png', 'guru', 20),
(196401171987032000, 'YUYUN SARININGSIH', 'Perempuan', '1b0b6c86caba3bc370342ec5243a795b', 'YUYUNSARININGSIH@domain.com', 'unknown.png', 'guru', 8),
(196404081989032009, 'NINA BARLIAH', 'Perempuan', 'bba7fb76cd4adbec0d8b2eb7796b6677', 'NINABARLIAH@domain.com', 'unknown.png', 'guru', 1),
(196405101989032010, 'DEWI KURNIATI', 'Perempuan', '2df2f694786a92d5a52c418390152c35', 'DEWIKURNIATI@domain.com', 'unknown.png', 'guru', 18),
(196406241993031008, 'ABDUL ROHMAN QOM', 'Laki-Laki', 'b3a76218f529070146f4d2e5e90d857d', 'ABDULROHMANQOM@domain.com', 'unknown.png', 'guru', 4),
(196407121988031014, 'AGUS THIAN', 'Laki-Laki', '73cc5a9f1e5b44188d0dbc8b2f190b01', 'AGUSTHIAN@domain.com', 'unknown.png', 'guru', 16),
(196505051988111001, 'UDIN', 'Laki-Laki', 'bc413f753b7c3f7b59dc86e7b09ca784', 'UDIN@domain.com', 'unknown.png', 'guru', 4),
(196506061990032005, 'SITI  ZUMROHATIN', 'Perempuan', '9df5ab308d6965d2444f7a1cd0523666', 'SITIZUMROHATIN@domain.com', 'unknown.png', 'guru', 4),
(196506231989032007, 'LILIS AMINAH', 'Perempuan', '7a35890921370b7d3654b4d585153efb', 'LILISAMINAH@domain.com', 'unknown.png', 'guru', 6),
(196603081990011001, 'MAMAN SURATMAN', 'Laki-Laki', '3e1134d3155eec35c4d33e10f2f9d172', 'MAMANSURATMAN@domain.com', 'unknown.png', 'guru', 8),
(196606021988111001, 'RAHMAT KARIM', 'Laki-Laki', '942096cf6902cd244f2348c93a19b4ca', 'RAHMATKARIM@domain.com', 'unknown.png', 'guru', 4),
(196607081989031014, 'MUHAMAD DENNY BUDIYANA', 'Laki-Laki', 'f109f68e864f54b9b31b2e4f33a8c719', 'MUHAMADDENNYBUDIYANA@domain.com', 'unknown.png', 'guru', 9),
(196709052007012016, 'KASNAWATI', 'Perempuan', 'acd80ac6beeb62484b77b5cf8976d313', 'KASNAWATI@domain.com', 'unknown.png', 'guru', 18),
(196712121992032007, 'YETI NURHAYATI', 'Perempuan', '447752a647e529f2b3eb9beabdeb8048', 'YETINURHAYATI@domain.com', 'unknown.png', 'guru', 2),
(196806121997021001, 'NIA KURNIA', 'Laki-Laki', '35f66cbab854a9060c64de09ad0cc976', 'NIAKURNIA@domain.com', 'unknown.png', 'guru', 10),
(196912021993011001, 'SAKIM', 'Laki-Laki', '21fb65cc4706cff2351aab72f2795470', 'SAKIM@domain.com', 'unknown.png', 'guru', 6),
(197006061997022001, 'RR DYAH SRI ANDAYANI', 'Perempuan', 'f4e152e14c74dd9d555daa845d0ef4c6', 'RRDYAHSRIANDAYANI@domain.com', 'unknown.png', 'guru', 5),
(197107012006042019, 'YULIATI ASLAMI', 'Perempuan', 'f4a8bb26726c8b40338a1119cd895604', 'YULIATIASLAMI@domain.com', 'unknown.png', 'guru', 1),
(197303252008012003, 'DEWI SUPARDINI', 'Perempuan', '06aa59bc0b9944f2db1202932a6719e9', 'DEWISUPARDINI@domain.com', 'unknown.png', 'guru', 2),
(197307182008012004, 'RESPATI SRI NIRINGTYAS', 'Perempuan', '19ac2cf3b824885bed0b61cdbc5f781d', 'RESPATISRINIRINGTYAS@domain.com', 'unknown.png', 'guru', 1),
(197311052005011007, 'OTONG KARMA', 'Laki-Laki', 'e88a8a5e10185072d0f365e8ce507bf4', 'OTONGKARMA@domain.com', 'unknown.png', 'guru', 2),
(197504122008012007, 'DEBBY REANI APRILIAN', 'Perempuan', 'd93cc21f8e0be2fd25ac1b46efbe2370', 'DEBBYREANIAPRILIAN@domain.com', 'unknown.png', 'guru', 5),
(197703112005012008, 'AI HAMIDAH', 'Perempuan', 'fe1464aa1800749a629a75add72ed1dc', 'AIHAMIDAH@domain.com', 'unknown.png', 'guru', 9),
(197708102008012014, 'ERNI ERNAWATI', 'Perempuan', '74b53b801b502c460916bcb23fb59a81', 'ERNIERNAWATI@domain.com', 'unknown.png', 'guru', 6),
(197902022008012012, 'INTAN PUJI UTAMI', 'Perempuan', '4e9d6940da8495d567c8304151262a48', 'INTANPUJIUTAMI@domain.com', 'unknown.png', 'guru', 2),
(198004092006042007, 'RETNO INTAN SARI FATIMAH', 'Perempuan', '557914dc35ce87f57c2398fdf9cc5369', 'RETNOINTANSARIFATIMAH@domain.com', 'unknown.png', 'guru', 11),
(198612122009022002, 'PRAMITA CAHYANINGRUM MUGHNI', 'Perempuan', 'a8e5615c6fcc84ddc76c0271da8697da', 'PRAMITACAHYANINGRUMMUGHNI@domain.com', 'unknown.png', 'guru', 8);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(45) NOT NULL,
  `id_tahun_ajaran` int(11) NOT NULL,
  PRIMARY KEY (`id_kelas`),
  KEY `id_tahun_ajaran` (`id_tahun_ajaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `id_tahun_ajaran`) VALUES
(1, 'X IBB', 5),
(2, 'X MIA 1', 5),
(3, 'X MIA 2', 5),
(4, 'X MIA 3', 5),
(5, 'X MIA 4', 5),
(6, 'X MIA 5', 5),
(7, 'X MIA 6', 5),
(8, 'X IIS 1', 5),
(9, 'X IIS 2', 5),
(10, 'X IIS 3', 5),
(11, 'X IIS 4', 5),
(12, 'XI MIA 1', 5),
(13, 'XI MIA 2', 5),
(14, 'XI MIA 3', 5),
(15, 'XI MIA 4', 5),
(16, 'XI MIA 5', 5),
(17, 'XI MIA 6', 5),
(18, 'XI MIA 7', 5),
(19, 'XI IIS 1', 5),
(20, 'XI IIS 2', 5),
(21, 'XII IPA 1', 5),
(22, 'XII IPA 2', 5),
(23, 'XII IPA 3', 5),
(24, 'XII IPA 4', 5),
(25, 'XII IPA 5', 5),
(26, 'XII IPA 6', 5),
(27, 'XII IPS 1', 5),
(28, 'XII IPS 2', 5),
(29, 'XII IPS 3', 5),
(30, 'XII IPS 4', 5);

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
  `id_modul` int(11) NOT NULL AUTO_INCREMENT,
  `nama_modul` varchar(45) NOT NULL,
  `file_modul` varchar(100) NOT NULL,
  `penyusun` varchar(45) NOT NULL,
  `id_mp` int(11) NOT NULL,
  PRIMARY KEY (`id_modul`),
  KEY `id_mp` (`id_mp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `file_modul`, `penyusun`, `id_mp`) VALUES
(2, 'Bahasa Indonesia 2', '1680-5192-2-PB.pdf', 'Sunaryo', 1),
(3, 'Kata Penghubung', '1680-5192-2-PB.pdf', 'Sunaryo', 1),
(6, 'Hukum Ekonomi', 'ipi40737.pdf', 'Endang Ahmad', 17);

-- --------------------------------------------------------

--
-- Table structure for table `mp`
--

CREATE TABLE IF NOT EXISTS `mp` (
  `id_mp` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mp` varchar(45) NOT NULL,
  PRIMARY KEY (`id_mp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `mp`
--

INSERT INTO `mp` (`id_mp`, `nama_mp`) VALUES
(1, 'Bahasa Indonesia'),
(2, 'Bahasa Inggris'),
(3, 'Bahasa Sunda'),
(4, 'Biologi'),
(5, 'Ekonomi'),
(6, 'Fisika'),
(7, 'Geografi'),
(8, 'Kimia'),
(9, 'Matematika IPA'),
(10, 'Matematika IPS'),
(11, 'Olahraga'),
(12, 'Pendidikan Agama Islam'),
(13, 'Sejarah'),
(14, 'Teknologi Informasi dan Komunikasi'),
(15, 'Sosiologi'),
(16, 'Bimbingan dan Konseling'),
(17, 'Elektronika'),
(18, 'Pendidikan Kewarga Negaraan'),
(19, 'Bahasa Jepang'),
(20, 'Bahasa Jerman');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `j_nilai` varchar(10) NOT NULL,
  `info_nilai` float NOT NULL,
  `id_mp` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  PRIMARY KEY (`id_nilai`),
  KEY `nis` (`nis`,`id_ujian`,`id_kelas`),
  KEY `id_ujian` (`id_ujian`),
  KEY `id_kelas` (`id_kelas`),
  KEY `id_mp` (`id_mp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `j_nilai`, `info_nilai`, `id_mp`, `nis`, `id_ujian`, `id_kelas`) VALUES
(1, '1', 50, 18, 121310001, 1, 24),
(2, '2', 80, 18, 121310001, 2, 24),
(3, '3', 100, 18, 121310001, 3, 24),
(4, '4', 99, 18, 121310001, 4, 24),
(5, '5', 98, 18, 121310001, 5, 24),
(6, '1', 56, 16, 121310001, 1, 24),
(7, '2', 80, 16, 121310001, 2, 24),
(8, '3', 77, 16, 121310001, 3, 24),
(9, '4', 100, 16, 121310001, 4, 24),
(10, '5', 34, 16, 121310001, 5, 24),
(11, '6', 99, 16, 121310001, 6, 24),
(12, '1', 90, 16, 141510001, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ortu`
--

CREATE TABLE IF NOT EXISTS `ortu` (
  `id_ortu` bigint(20) NOT NULL,
  `nama_ortu` varchar(100) NOT NULL,
  `password` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `dispict` varchar(100) NOT NULL,
  `nis` int(11) NOT NULL,
  UNIQUE KEY `nis_2` (`nis`),
  KEY `nis` (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ortu`
--

INSERT INTO `ortu` (`id_ortu`, `nama_ortu`, `password`, `status`, `dispict`, `nis`) VALUES
(1111, 'ORTU', '469eb28221c8e6d092ddafacb87799bf', 'ortu', 'unknown.png', 121310001);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` int(11) NOT NULL,
  `nama_siswa` varchar(45) NOT NULL,
  `jklamin_siswa` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dispict` varchar(100) NOT NULL,
  `status` varchar(45) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  PRIMARY KEY (`nis`),
  KEY `id_kelas` (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `jklamin_siswa`, `password`, `email`, `dispict`, `status`, `id_kelas`) VALUES
(121310001, 'AJENG TIAWANTIKA', 'Perempuan', 'aac5573b79c578c67d5be392628bcdce', 'AJENGTIAWANTIKA@domain.com', 'unknown.png', 'siswa', 24),
(121310002, 'ALDA RIO TUA G', 'Laki-Laki', '9e376ce79e05af41bef6b4cadd1401d3', 'ALDARIOTUAG@domain.com', 'unknown.png', 'siswa', 22),
(121310003, 'ANGGIA PUTRI LESTARI', 'Perempuan', '9ec26e8cb0eea1e151539212962818fc', 'ANGGIAPUTRILESTARI@domain.com', 'unknown.png', 'siswa', 28),
(121310004, 'ANNISA LATIFAH SURYANA', 'Perempuan', '7a2864198b54cee3f035a73a0b768ed5', 'ANNISALATIFAHSURYANA@domain.com', 'unknown.png', 'siswa', 24),
(121310005, 'ARBI SAEFUL BAHRI', 'Laki-Laki', '82cfe0d0242e6a876ebc387a586a7605', 'ARBISAEFULBAHRI@domain.com', 'unknown.png', 'siswa', 29),
(121310006, 'ARYA FERALDI PRATAMA', 'Laki-Laki', '5e4265ff91059a1825f6c060183cce06', 'ARYAFERALDIPRATAMA@domain.com', 'unknown.png', 'siswa', 26),
(121310007, 'BILLY GRAHAM', 'Laki-Laki', 'ee5914c21bbc26a23550e9fc3139f109', 'BILLYGRAHAM@domain.com', 'unknown.png', 'siswa', 24),
(121310008, 'CHICHA ANNISA SARASWATI', 'Perempuan', '4ddb83e92f99fe8f28ddda4523bb120b', 'CHICHAANNISASARASWATI@domain.com', 'unknown.png', 'siswa', 26),
(121310010, 'DEYANA MAULINA KRESNAWATI', 'Perempuan', '24ed35eed197d873aba34f949c31f20b', 'DEYANAMAULINAKRESNAWATI@domain.com', 'unknown.png', 'siswa', 21),
(121310011, 'DINDA ZARRA ZENITTA AULYA', 'Perempuan', '23020f9d116229a7775256fa969a8683', 'DINDAZARRAZENITTAAULYA@domain.com', 'unknown.png', 'siswa', 24),
(121310012, 'FAUZI IRFANDIKA', 'Laki-Laki', '2e013acfd5cc356735876421880de894', 'FAUZIIRFANDIKA@domain.com', 'unknown.png', 'siswa', 23),
(121310013, 'GALIH RENDY REYNALDI', 'Laki-Laki', '3967000ecb43ab751420647d104bd997', 'GALIHRENDYREYNALDI@domain.com', 'unknown.png', 'siswa', 30),
(121310014, 'GIRI AVIANTO HERLAMBANG', 'Laki-Laki', 'a6d68a566d4b3aa6f295ad172a5047f0', 'GIRIAVIANTOHERLAMBANG@domain.com', 'unknown.png', 'siswa', 29),
(121310016, 'IRA PRASASTI DEWI', 'Perempuan', 'adab3b4de75c620782746137fec495ab', 'IRAPRASASTIDEWI@domain.com', 'unknown.png', 'siswa', 21),
(121310017, 'IRDHAM KUSUMA', 'Laki-Laki', '0c69e43a7b2645bcebb37372e121a83e', 'IRDHAMKUSUMA@domain.com', 'unknown.png', 'siswa', 25),
(121310018, 'ISMI BILIARBORITA TAN', 'Perempuan', '37b53f1f13255637d1101db6c3d5c50b', 'ISMIBILIARBORITATAN@domain.com', 'unknown.png', 'siswa', 30),
(121310019, 'JOVANY DENINTA FITRI', 'Perempuan', '8b3e34366f8e5a6a0f7be32864a3ea88', 'JOVANYDENINTAFITRI@domain.com', 'unknown.png', 'siswa', 30),
(121310020, 'MICHA SHANDY', 'Perempuan', '6ef2dad49e262883f2041a56a8f4793a', 'MICHASHANDY@domain.com', 'unknown.png', 'siswa', 24),
(121310021, 'MUHAMMAD ARIF HENDRO PRIYONO', 'Laki-Laki', 'e0f9476c86939aaad87a882c0e2df125', 'MUHAMMADARIFHENDROPRIYONO@domain.com', 'unknown.png', 'siswa', 28),
(121310022, 'MUHAMMAD HARDIPO RENDRAKARA', 'Laki-Laki', '53eeecdf24e27f45ace5e8f4edc95a8a', 'MUHAMMADHARDIPORENDRAKARA@domain.com', 'unknown.png', 'siswa', 29),
(121310023, 'MUHAMMAD RIZKI ALFARIZI', 'Laki-Laki', '42cb58f934b16c98edf6b517e8e6f568', 'MUHAMMADRIZKIALFARIZI@domain.com', 'unknown.png', 'siswa', 22),
(121310024, 'NIKI DITO FARRUK', 'Laki-Laki', '5680352ef9d30af8eae80562a9321bfa', 'NIKIDITOFARRUK@domain.com', 'unknown.png', 'siswa', 23),
(121310026, 'REGINA NURFASA PUTRI', 'Perempuan', '2230f2161512f4943e65540e3224d156', 'REGINANURFASAPUTRI@domain.com', 'unknown.png', 'siswa', 24),
(121310027, 'RENO RELANDANI', 'Laki-Laki', '37860ce4dc648c83d04a35bec0ed757a', 'RENORELANDANI@domain.com', 'unknown.png', 'siswa', 27),
(121310028, 'REYNALDI NATA PRAWIRA', 'Laki-Laki', '509e04a670576925fefda65a1389393d', 'REYNALDINATAPRAWIRA@domain.com', 'unknown.png', 'siswa', 23),
(121310029, 'REYNALDI PERDANA TIRTASASMITA', 'Laki-Laki', '3738b85b1fefbed617f397ecfe922ac1', 'REYNALDIPERDANATIRTASASMITA@domain.com', 'unknown.png', 'siswa', 23),
(121310030, 'RIVA MOHAMAD FADHILLAH DAULAY', 'Laki-Laki', '2b99840d011e0fdf07e700b0f82fd8b1', 'RIVAMOHAMADFADHILLAHDAULAY@domain.com', 'unknown.png', 'siswa', 22),
(121310031, 'SHAFIRA RYANTI MINRAI', 'Perempuan', 'a55ccbcb0a37f8d5ddce4a2e5c449c58', 'SHAFIRARYANTIMINRAI@domain.com', 'unknown.png', 'siswa', 21),
(121310032, 'SINDY NURAENY', 'Perempuan', 'ecde41d19e331fe9ce0bde15a33c993a', 'SINDYNURAENY@domain.com', 'unknown.png', 'siswa', 26),
(121310033, 'SVASTI SATRIANI', 'Perempuan', '90337bad1a488cdec5b16661d4eb3505', 'SVASTISATRIANI@domain.com', 'unknown.png', 'siswa', 26),
(121310035, 'VIRLIA DIAN FRIDAYANTI', 'Perempuan', 'b6f9602802631bf6396ce782dcfb553e', 'VIRLIADIANFRIDAYANTI@domain.com', 'unknown.png', 'siswa', 25),
(121310036, 'WANDA RESTU PERTIWI', 'Perempuan', '2a94edfa06440433ce804c2b33c5cf2e', 'WANDARESTUPERTIWI@domain.com', 'unknown.png', 'siswa', 28),
(121310037, 'ALESSA PRASYA AYUNINGTYAS', 'Perempuan', 'fe9eecfd715f564ce36ced26461a997d', 'ALESSAPRASYAAYUNINGTYAS@domain.com', 'unknown.png', 'siswa', 30),
(121310038, 'AMELIA SUTARI MEILINDA', 'Perempuan', 'cb9f2e312db259bc1388be9c6ed12d8b', 'AMELIASUTARIMEILINDA@domain.com', 'unknown.png', 'siswa', 28),
(121310039, 'ANGGRA ALNADIE', 'Laki-Laki', '89f1b105fdedc7592ab2bde87ce5efbf', 'ANGGRAALNADIE@domain.com', 'unknown.png', 'siswa', 18),
(121310040, 'ANNISA PUTRI PITALOKA', 'Perempuan', '67c6e70f10063a5321baf48d5876457b', 'ANNISAPUTRIPITALOKA@domain.com', 'unknown.png', 'siswa', 21),
(121310041, 'AQBIL BANI MUTSLA', 'Laki-Laki', 'a9861a7a29425c1e60c4cae87ae3e67e', 'AQBILBANIMUTSLA@domain.com', 'unknown.png', 'siswa', 22),
(121310042, 'ARMELIA FIRANA DEAMETA', 'Perempuan', '5d01cb3b1703ca08fb57bf9e77d5e0a7', 'ARMELIAFIRANADEAMETA@domain.com', 'unknown.png', 'siswa', 30),
(121310043, 'ASMI AYUNI', 'Perempuan', 'd213082fb744ead40cde0392db5a691f', 'ASMIAYUNI@domain.com', 'unknown.png', 'siswa', 26),
(121310044, 'AYU KOMANG DEWI SAVITRI', 'Perempuan', '16b05c856be9ba4f9d980957d186446e', 'AYUKOMANGDEWISAVITRI@domain.com', 'unknown.png', 'siswa', 24),
(121310045, 'CHANDRA GHAISANI AMIARSA', 'Perempuan', '093c9cf74b17982f2e858907cb9c487e', 'CHANDRAGHAISANIAMIARSA@domain.com', 'unknown.png', 'siswa', 24),
(121310046, 'DICKY YOGA PRASETYO', 'Laki-Laki', '4bc3bb0be1a3fc08245da0dadf98b957', 'DICKYYOGAPRASETYO@domain.com', 'unknown.png', 'siswa', 28),
(121310047, 'DIMAS EKA PANCA NUGRAHA FIRMANSYAH', 'Laki-Laki', 'e5ca318198249cdd31ecbd8063a2bc8f', 'DIMASEKAPANCANUGRAHAFIRMANSYAH@domain.com', 'unknown.png', 'siswa', 21),
(121310048, 'DINITA SRIHIANG', 'Perempuan', '8f78bd9f2a71a24dff5ab0d1a6ada4c2', 'DINITASRIHIANG@domain.com', 'unknown.png', 'siswa', 22),
(121310049, 'DWI SRI NURJANAH', 'Perempuan', '739ee636c88b6f46ca26bcbc76e553b1', 'DWISRINURJANAH@domain.com', 'unknown.png', 'siswa', 27),
(121310050, 'ERSALINA TRISNAWATI TARYANA', 'Perempuan', 'd700878a1fbefedd7580c78b3c99f131', 'ERSALINATRISNAWATITARYANA@domain.com', 'unknown.png', 'siswa', 22),
(121310052, 'FAIQ ROZAANO', 'Laki-Laki', 'b3bb7fc1dcd243741dde551257c37190', 'FAIQROZAANO@domain.com', 'unknown.png', 'siswa', 23),
(121310053, 'FAISAR RAHMAN', 'Laki-Laki', 'a67090549914c70e1ff688a813ce0792', 'FAISARRAHMAN@domain.com', 'unknown.png', 'siswa', 21),
(121310055, 'GHILMAN NAUFAN NURFAZA', 'Laki-Laki', 'b1ae21d102cdb178140245aef31c7a52', 'GHILMANNAUFANNURFAZA@domain.com', 'unknown.png', 'siswa', 28),
(121310056, 'HANAN AULALIA', 'Perempuan', '3f110b99a6ca5bbc718e673aa24c7544', 'HANANAULALIA@domain.com', 'unknown.png', 'siswa', 25),
(121310058, 'IRVAN ADITYA PRATAMA', 'Laki-Laki', 'bd5a80c1c5264cc59caa6cbfc349f18a', 'IRVANADITYAPRATAMA@domain.com', 'unknown.png', 'siswa', 29),
(121310059, 'MOHAMAD KEVIN ZULFIKAR', 'Laki-Laki', '8a2b8efee36dfdb75bb45b1f0669d71f', 'MOHAMADKEVINZULFIKAR@domain.com', 'unknown.png', 'siswa', 30),
(121310060, 'MUHAMAD EMIR KEVIN FALEVI', 'Laki-Laki', 'da90a2c7688999f5f7c7b64dc788c0d4', 'MUHAMADEMIRKEVINFALEVI@domain.com', 'unknown.png', 'siswa', 21),
(121310061, 'NABILLA SITI SYAWALIA', 'Perempuan', 'c8362541efa6c5e39b716a78b9d3baa9', 'NABILLASITISYAWALIA@domain.com', 'unknown.png', 'siswa', 24),
(121310062, 'NATASYA CESARIA RAWIS', 'Perempuan', 'fefacb27eeb86f5b2dbf00e7fc85ad4a', 'NATASYACESARIARAWIS@domain.com', 'unknown.png', 'siswa', 21),
(121310063, 'NURUL VICKA DWIJULIANTY', 'Perempuan', '06c7764be4759ee99acdc6f9529d201c', 'NURULVICKADWIJULIANTY@domain.com', 'unknown.png', 'siswa', 29),
(121310064, 'RADEN ARIQ RAYHAN RADITYA', 'Laki-Laki', '46756135f9533a636040ec46aab19cec', 'RADENARIQRAYHANRADITYA@domain.com', 'unknown.png', 'siswa', 28),
(121310065, 'RIKA KOMALA', 'Perempuan', 'e7c2751fa505e547a6465b7a8dff239c', 'RIKAKOMALA@domain.com', 'unknown.png', 'siswa', 24),
(121310066, 'RIO SURYA SAPOETRA', 'Laki-Laki', '9524ba117fb5e30d8e3bf1bbda9df7c2', 'RIOSURYASAPOETRA@domain.com', 'unknown.png', 'siswa', 28),
(121310067, 'RIZKIA NUR AFIANI', 'Perempuan', '8e16e67401a588ee1beb33604cf462ab', 'RIZKIANURAFIANI@domain.com', 'unknown.png', 'siswa', 29),
(121310069, 'TRIA ARIEF RACHMAN', 'Laki-Laki', '0eeb0256c5dd5c07ac40ee5ae54ff0a5', 'TRIAARIEFRACHMAN@domain.com', 'unknown.png', 'siswa', 30),
(121310070, 'VINA ALFIA NIKMATUL AZIZAH', 'Perempuan', 'eda7bd00bf37481bc0a1a25eced4d88b', 'VINAALFIANIKMATULAZIZAH@domain.com', 'unknown.png', 'siswa', 24),
(121310071, 'ZAKI MUTHAHHARI LUBIS', 'Laki-Laki', '2fe5135bfb8f9a7c9ee03b44750a31ed', 'ZAKIMUTHAHHARILUBIS@domain.com', 'unknown.png', 'siswa', 22),
(121310072, 'AMANDA RASYIDA ALIYA', 'Perempuan', 'cba01759284665ecbea04854a2f2eefb', 'AMANDARASYIDAALIYA@domain.com', 'unknown.png', 'siswa', 25),
(121310073, 'AMELITA FEBRIANI', 'Perempuan', '59f09016abc6b500f8101a74c0c036d1', 'AMELITAFEBRIANI@domain.com', 'unknown.png', 'siswa', 30),
(121310074, 'APRIANA FAJAR', 'Laki-Laki', '3e8b00894434ce5eea89607e586c522e', 'APRIANAFAJAR@domain.com', 'unknown.png', 'siswa', 28),
(121310075, 'BIANCA NABILLA POETRY', 'Perempuan', 'e37d69c65efbda01a23d24096c9e7214', 'BIANCANABILLAPOETRY@domain.com', 'unknown.png', 'siswa', 28),
(121310076, 'BOBBY BUDIMAN WICAKSONO', 'Laki-Laki', '42b75c4f65344c790c1cd17ff9544ef0', 'BOBBYBUDIMANWICAKSONO@domain.com', 'unknown.png', 'siswa', 23),
(121310077, 'DANI SATRIA NURAMAN', 'Laki-Laki', 'ef072256f79e1226ca259e228efd6b46', 'DANISATRIANURAMAN@domain.com', 'unknown.png', 'siswa', 21),
(121310078, 'DILIA GEUGEUT PINANTY', 'Perempuan', '33f147a9319c073c2c753b8b5ec81ed2', 'DILIAGEUGEUTPINANTY@domain.com', 'unknown.png', 'siswa', 23),
(121310079, 'DILLA NUR FADILLAH SANUSI', 'Perempuan', '80cd61734ec766b83da079d5a7064f39', 'DILLANURFADILLAHSANUSI@domain.com', 'unknown.png', 'siswa', 28),
(121310080, 'GHINA NUR KARIMAH', 'Perempuan', 'ed67e4f29d3f2ca7f4521e9e7811cf50', 'GHINANURKARIMAH@domain.com', 'unknown.png', 'siswa', 28),
(121310081, 'GIFARI MUHAMMAD NAWARI', 'Laki-Laki', '53f1997316d938eb30cd7539c4e3e828', 'GIFARIMUHAMMADNAWARI@domain.com', 'unknown.png', 'siswa', 22),
(121310082, 'LINA NURYUNIASARI', 'Perempuan', 'a5860ef8b900b0410d1d7fc1a0b81173', 'LINANURYUNIASARI@domain.com', 'unknown.png', 'siswa', 21),
(121310083, 'LUTFI AHMAD FIKRI', 'Laki-Laki', '23d4ffa3132af63579b2bba4f0ba551d', 'LUTFIAHMADFIKRI@domain.com', 'unknown.png', 'siswa', 22),
(121310084, 'LUTHFI ANDRIANI NUGROHO', 'Perempuan', 'b05928ec1c91017c5c58b66503c41f3e', 'LUTHFIANDRIANINUGROHO@domain.com', 'unknown.png', 'siswa', 28),
(121310085, 'MARYAM MITHA NURAZIZAH', 'Perempuan', 'c77b4505d216b17ad51162ad5f4538b7', 'MARYAMMITHANURAZIZAH@domain.com', 'unknown.png', 'siswa', 27),
(121310086, 'MOCH.RAKA DWI PRASETYO', 'Laki-Laki', '484639aaa2ca86d103ce470fcfbd7f09', 'MOCH.RAKADWIPRASETYO@domain.com', 'unknown.png', 'siswa', 21),
(121310087, 'MOCHAMAD ILYAS FARIZ', 'Laki-Laki', '6b45417f19d078ea24e0ad207fba3fe7', 'MOCHAMADILYASFARIZ@domain.com', 'unknown.png', 'siswa', 29),
(121310088, 'MOCHAMAD IQBAL SATRIA JAYA', 'Laki-Laki', 'ece978b8529ef86345c296036ea77759', 'MOCHAMADIQBALSATRIAJAYA@domain.com', 'unknown.png', 'siswa', 28),
(121310089, 'MONICA FITRIYANA DJANI', 'Perempuan', '79379c1c2937af2a5cc97021de999554', 'MONICAFITRIYANADJANI@domain.com', 'unknown.png', 'siswa', 30),
(121310090, 'MUHAMMAD GHASSAN FADILLAH RAMADHIAN', 'Laki-Laki', '087852555149cb82b0aec00ffe592e0c', 'MUHAMMADGHASSANFADILLAHRAMADHIAN@domain.com', 'unknown.png', 'siswa', 25),
(121310091, 'MUHAMMAD REZA KUSUMAH DARMAWAN', 'Laki-Laki', 'ca70b9c69cef4a35b1cb4a0934b35106', 'MUHAMMADREZAKUSUMAHDARMAWAN@domain.com', 'unknown.png', 'siswa', 22),
(121310093, 'MUHAMMAD HAIKAL FADHLIKA', 'Laki-Laki', 'd8b04b0a8a5ebe6cda3af2265fda9eae', 'MUHAMMADHAIKALFADHLIKA@domain.com', 'unknown.png', 'siswa', 27),
(121310094, 'NABILA AYU MUTHIA FADHILA', 'Perempuan', '3608d32c18e14ab3243d1b5dc1ed798d', 'NABILAAYUMUTHIAFADHILA@domain.com', 'unknown.png', 'siswa', 23),
(121310095, 'NABILA DHIYA AQILA HERYATNA', 'Perempuan', '7c24982a0db93409ffa93e2281a20bf4', 'NABILADHIYAAQILAHERYATNA@domain.com', 'unknown.png', 'siswa', 22),
(121310096, 'NIA KURNIASIH', 'Perempuan', 'b31d9e801d174945da9466ca0a1c8d21', 'NIAKURNIASIH@domain.com', 'unknown.png', 'siswa', 29),
(121310097, 'PRISKA PRISILA YULIANI SANJAYA', 'Perempuan', '8b3c665c7460a79600f2cd4f08e65750', 'PRISKAPRISILAYULIANISANJAYA@domain.com', 'unknown.png', 'siswa', 23),
(121310098, 'RACHMANIA FEBRIYATI', 'Perempuan', 'd3013dbc9cde20ed8de3e060598a85f9', 'RACHMANIAFEBRIYATI@domain.com', 'unknown.png', 'siswa', 27),
(121310099, 'RACHMI ARIN TIMOMOR', 'Perempuan', '18999a7dea199c98a9246f1f6f26007c', 'RACHMIARINTIMOMOR@domain.com', 'unknown.png', 'siswa', 22),
(121310101, 'ROFIQ FADILLAH AWAL', 'Laki-Laki', '91124f74f70092fda40902ca725970f9', 'ROFIQFADILLAHAWAL@domain.com', 'unknown.png', 'siswa', 22),
(121310102, 'SHANE SAHIRA', 'Perempuan', '9e0da5385e0f603e642d07349fde37b0', 'SHANESAHIRA@domain.com', 'unknown.png', 'siswa', 24),
(121310103, 'SILVI MILASARY', 'Perempuan', 'a56bfd7186c29c1ce5a7b6fa1e389de4', 'SILVIMILASARY@domain.com', 'unknown.png', 'siswa', 28),
(121310104, 'TASYA NABILA AUFA', 'Perempuan', '86058f1ca3522f88e5763880893e9fa0', 'TASYANABILAAUFA@domain.com', 'unknown.png', 'siswa', 22),
(121310105, 'THALITHA SHAFIRA UTOMO', 'Perempuan', '423f5dad77a627780e8908cc9bbeb875', 'THALITHASHAFIRAUTOMO@domain.com', 'unknown.png', 'siswa', 21),
(121310106, 'TREESHIA MEGAH WATI MANALU', 'Perempuan', '0b3ed6257f525d828f937966013b6174', 'TREESHIAMEGAHWATIMANALU@domain.com', 'unknown.png', 'siswa', 23),
(121310107, 'YOLASA ARSAS', 'Perempuan', '9b5b7d47fe0422ec07c049e489130e53', 'YOLASAARSAS@domain.com', 'unknown.png', 'siswa', 28),
(121310108, 'AGHNIA FAZA WAHYUDI LESTARI', 'Perempuan', '132c20769c47d1a0871957cc204ebc0b', 'AGHNIAFAZAWAHYUDILESTARI@domain.com', 'unknown.png', 'siswa', 23),
(121310109, 'ANGIE SEPTIYANI ABTHONI', 'Perempuan', '9951159e608bf6fef4de5fe01f9ebccb', 'ANGIESEPTIYANIABTHONI@domain.com', 'unknown.png', 'siswa', 26),
(121310110, 'ANINDITA MARVIANA', 'Perempuan', 'ae785a3bb11060b1fc12e486017a95f7', 'ANINDITAMARVIANA@domain.com', 'unknown.png', 'siswa', 22),
(121310111, 'ANNISA NURJANNAH', 'Perempuan', 'ccb6c1e316e1ef5de8d9be677360143e', 'ANNISANURJANNAH@domain.com', 'unknown.png', 'siswa', 29),
(121310112, 'ANTI PUTRI ANDANA', 'Perempuan', '31a0d9183a604847bf3428cf46c8fda9', 'ANTIPUTRIANDANA@domain.com', 'unknown.png', 'siswa', 25),
(121310113, 'ARIS AJI ADYATMAKA', 'Laki-Laki', '0bfa7f05e2b99052415fb56abdf99750', 'ARISAJIADYATMAKA@domain.com', 'unknown.png', 'siswa', 27),
(121310114, 'AZMI RATNA NINGSIH', 'Perempuan', 'cbee96d065c07860e178c3ed9fa21194', 'AZMIRATNANINGSIH@domain.com', 'unknown.png', 'siswa', 21),
(121310115, 'BAYU GADA PANGESTU', 'Laki-Laki', '76b5246422c8f10ad9eabc7711855909', 'BAYUGADAPANGESTU@domain.com', 'unknown.png', 'siswa', 27),
(121310116, 'DIAN JASMINE AZ ZAHRA', 'Perempuan', 'bb378f9459fe6e245c018ae992746133', 'DIANJASMINEAZZAHRA@domain.com', 'unknown.png', 'siswa', 26),
(121310117, 'ERNI NOVINA BELLAWATI', 'Perempuan', '81b7fb88ce295195655241a951dad9df', 'ERNINOVINABELLAWATI@domain.com', 'unknown.png', 'siswa', 28),
(121310118, 'FAJAR  NURUL HIKAM', 'Laki-Laki', '9374a2b78f483d6a619a42d12dee3960', 'FAJARNURULHIKAM@domain.com', 'unknown.png', 'siswa', 27),
(121310119, 'FALHAN SAFRANI AWWAL', 'Laki-Laki', '0e589e3f34a0c216de0e7b217a5a82c5', 'FALHANSAFRANIAWWAL@domain.com', 'unknown.png', 'siswa', 26),
(121310120, 'FARADZ VERGIAN', 'Laki-Laki', 'b5dc4f5f82c7ad68ec4639d0e0fd9bd9', 'FARADZVERGIAN@domain.com', 'unknown.png', 'siswa', 28),
(121310121, 'FARIHA HADAINA', 'Perempuan', '5d067732ed2af0dc4e30e09218a0daeb', 'FARIHAHADAINA@domain.com', 'unknown.png', 'siswa', 21),
(121310122, 'FEBEU WULANDARI', 'Perempuan', '3886d602f08b463ed192a91d10bf5e02', 'FEBEUWULANDARI@domain.com', 'unknown.png', 'siswa', 28),
(121310124, 'HAJO RIVALBO MARCO', 'Laki-Laki', 'a4ff0220254aaedd85de4657c74e2654', 'HAJORIVALBOMARCO@domain.com', 'unknown.png', 'siswa', 29),
(121310125, 'IKBAL RUFIANDIKA SAPUTRA', 'Laki-Laki', '1b07970e6d5a7c396dfc2c5d361afcca', 'IKBALRUFIANDIKASAPUTRA@domain.com', 'unknown.png', 'siswa', 27),
(121310126, 'IRWAN TIRTA NUGRAHA', 'Laki-Laki', '04ac3d9b3fcc425369c0ba8c65c18007', 'IRWANTIRTANUGRAHA@domain.com', 'unknown.png', 'siswa', 26),
(121310127, 'KRISNA SETIAWAN', 'Laki-Laki', '01736b4a0dea6e11e1c768d468eb80f2', 'KRISNASETIAWAN@domain.com', 'unknown.png', 'siswa', 27),
(121310128, 'LUTFI PUTRA IBRAHIM', 'Laki-Laki', 'c1a9538e8da41d189403cbf149d47f46', 'LUTFIPUTRAIBRAHIM@domain.com', 'unknown.png', 'siswa', 28),
(121310129, 'MIFTAH BISYIR WIDYAWAN', 'Laki-Laki', '334e021fdb210258c80c6b12f017b7cc', 'MIFTAHBISYIRWIDYAWAN@domain.com', 'unknown.png', 'siswa', 28),
(121310130, 'MOHAMAD JEHAN FAJARI', 'Laki-Laki', '8a74826cdc58dc4b598b5a7e32d43484', 'MOHAMADJEHANFAJARI@domain.com', 'unknown.png', 'siswa', 22),
(121310131, 'MUHAMMAD FATHRUL QUDDUS', 'Laki-Laki', '81081700abe93bce3fe9c7d8a6260a6d', 'MUHAMMADFATHRULQUDDUS@domain.com', 'unknown.png', 'siswa', 25),
(121310132, 'MUHAMMAD REZEKI PRATAMA', 'Laki-Laki', '69a9efe05db06a18713352698f8ce220', 'MUHAMMADREZEKIPRATAMA@domain.com', 'unknown.png', 'siswa', 24),
(121310133, 'MUHAMMAD RIFKY PUTRA PRATAMA', 'Laki-Laki', 'a607563c181a5dd3f699e65f60d99b4e', 'MUHAMMADRIFKYPUTRAPRATAMA@domain.com', 'unknown.png', 'siswa', 26),
(121310134, 'NAML BELAGAMA LADFAREZSA', 'Laki-Laki', 'e7346c2f06357ea69e8c64159a5c0e3d', 'NAMLBELAGAMALADFAREZSA@domain.com', 'unknown.png', 'siswa', 24),
(121310135, 'Rd.SITI ADRINA NURMEDINA SUJAI', 'Perempuan', '286a353d0cd42e1f97936732ca073855', 'Rd.SITIADRINANURMEDINASUJAI@domain.com', 'unknown.png', 'siswa', 24),
(121310136, 'RICKY TRIANDIKA PRATAMA', 'Laki-Laki', '5d2f630cc0569f9ac1fcc8c646542307', 'RICKYTRIANDIKAPRATAMA@domain.com', 'unknown.png', 'siswa', 26),
(121310137, 'RIDWAN ALI ERLANGGA RAHMAN', 'Laki-Laki', 'e625cd315a550fba41e4bbf934fdf272', 'RIDWANALIERLANGGARAHMAN@domain.com', 'unknown.png', 'siswa', 26),
(121310138, 'RIVALDO FEBRIANA PUTRA', 'Laki-Laki', '358311fb69dfb94303f42c7b897a1aaa', 'RIVALDOFEBRIANAPUTRA@domain.com', 'unknown.png', 'siswa', 25),
(121310139, 'SARAH NABILA FAUZIYYAH', 'Perempuan', '2f01d0272e782da1f814900f1820dd9f', 'SARAHNABILAFAUZIYYAH@domain.com', 'unknown.png', 'siswa', 30),
(121310140, 'SITI ELVA HEPZIBAH', 'Perempuan', '08df2c2a18ac849838851bac013f0f0d', 'SITIELVAHEPZIBAH@domain.com', 'unknown.png', 'siswa', 21),
(121310141, 'SITI HARTINI NUR AISSYAH', 'Perempuan', '1200a3320db99e220573c1a98cd51c50', 'SITIHARTININURAISSYAH@domain.com', 'unknown.png', 'siswa', 25),
(121310142, 'TRIAJI GILANG PAMUNGKAS', 'Laki-Laki', '4e01766da6a5bff46cd7cb35b0ee462f', 'TRIAJIGILANGPAMUNGKAS@domain.com', 'unknown.png', 'siswa', 22),
(121310143, 'VEIRLYANI HUURIYAH FADJAR', 'Perempuan', '5caaf8d1fe5626d9e15ba3385af77f64', 'VEIRLYANIHUURIYAHFADJAR@domain.com', 'unknown.png', 'siswa', 29),
(121310145, 'WINDY AZALIA SYIFARA', 'Perempuan', '546a177cf69859d2bc1ed7cd052ee422', 'WINDYAZALIASYIFARA@domain.com', 'unknown.png', 'siswa', 23),
(121310146, 'ADI SUKMA LINUHUNG', 'Laki-Laki', '8c6c0806cc1b03360adc48e9169600c3', 'ADISUKMALINUHUNG@domain.com', 'unknown.png', 'siswa', 29),
(121310147, 'ALAM ADITYA SAPUTRA', 'Laki-Laki', '96e71653c00a9c8e84b8d1c668a81368', 'ALAMADITYASAPUTRA@domain.com', 'unknown.png', 'siswa', 29),
(121310148, 'ANNISA YASMIN', 'Perempuan', 'e141a6e564ae2348bcce4ba97001ea64', 'ANNISAYASMIN@domain.com', 'unknown.png', 'siswa', 23),
(121310150, 'BAKHTIAR LUTHFI FAKHROZI', 'Laki-Laki', 'be4742be1f886a0d32c14cb797718c2e', 'BAKHTIARLUTHFIFAKHROZI@domain.com', 'unknown.png', 'siswa', 24),
(121310151, 'DAWAM FIRMAN HERMAJA', 'Laki-Laki', 'bf0619ee16f99ef2acd3675cf3e82d10', 'DAWAMFIRMANHERMAJA@domain.com', 'unknown.png', 'siswa', 22),
(121310152, 'FARHAN ADISTYA KUSNADI', 'Laki-Laki', 'cd999bca3fc1ccb4bc6d6f96e6fde7bf', 'FARHANADISTYAKUSNADI@domain.com', 'unknown.png', 'siswa', 21),
(121310153, 'FARLANIZA PUTRI UTAMI', 'Perempuan', 'a7622bc934db90b0487743abd62f1812', 'FARLANIZAPUTRIUTAMI@domain.com', 'unknown.png', 'siswa', 23),
(121310154, 'GITA AULIYA', 'Perempuan', 'f9f7413a58227536138e5884ad6c62ae', 'GITAAULIYA@domain.com', 'unknown.png', 'siswa', 29),
(121310155, 'HANNA SAHRAS', 'Perempuan', 'a83eeadab8e8f44a653ebad99a8280e4', 'HANNASAHRAS@domain.com', 'unknown.png', 'siswa', 23),
(121310156, 'HARSA ABDILLAH PALAHARDJA', 'Laki-Laki', '6ee71e158280ff03941cf5f928dc1250', 'HARSAABDILLAHPALAHARDJA@domain.com', 'unknown.png', 'siswa', 29),
(121310157, 'ICHRAMA RENGGITA EKHANANTA', 'Perempuan', '3e2b493d13339b5ca969c0cd9ae67c67', 'ICHRAMARENGGITAEKHANANTA@domain.com', 'unknown.png', 'siswa', 24),
(121310158, 'IFNI GIANOVIA', 'Perempuan', 'a7a42ca152968cc31670e83bb4398d4e', 'IFNIGIANOVIA@domain.com', 'unknown.png', 'siswa', 25),
(121310159, 'INTAN AULIA RAHIMA', 'Perempuan', '02ec7f96f0aa400cc1fb7cb435cb7c30', 'INTANAULIARAHIMA@domain.com', 'unknown.png', 'siswa', 24),
(121310160, 'IQBAL WALI YUDIN', 'Laki-Laki', '57d76a092e31bf186716ac4a3bb41a7b', 'IQBALWALIYUDIN@domain.com', 'unknown.png', 'siswa', 30),
(121310161, 'JEREMIA HAOJAHAN PARDAMEAN', 'Laki-Laki', '2d32f83a2a5009c736493bc9d203d71e', 'JEREMIAHAOJAHANPARDAMEAN@domain.com', 'unknown.png', 'siswa', 22),
(121310162, 'JOSEVANNI SUMUAL', 'Perempuan', '589b27ce87bfeaee5959d55979a47e88', 'JOSEVANNISUMUAL@domain.com', 'unknown.png', 'siswa', 30),
(121310163, 'KEMALA ANDARI DOVIANTI', 'Perempuan', '3d2fee5ed4ba0f6ebb6060fe38138488', 'KEMALAANDARIDOVIANTI@domain.com', 'unknown.png', 'siswa', 21),
(121310164, 'MUHAMMAD ARIQ NAUFAL', 'Laki-Laki', '0fae751370635b0366434c4dc3e1cfdd', 'MUHAMMADARIQNAUFAL@domain.com', 'unknown.png', 'siswa', 21),
(121310165, 'MUHAMMAD DIVO ALAM', 'Laki-Laki', '9cae021f07bfa2473d3392d5257bd755', 'MUHAMMADDIVOALAM@domain.com', 'unknown.png', 'siswa', 25),
(121310166, 'MUHAMMAD INDIANA LANGLANGBUANA', 'Laki-Laki', '4b2fe51886a7875be729dc4188457d7b', 'MUHAMMADINDIANALANGLANGBUANA@domain.com', 'unknown.png', 'siswa', 29),
(121310168, 'N.TISANNI HIMMATUL MAULA', 'Perempuan', 'e9e9df24d178317f8528ff196e043464', 'N.TISANNIHIMMATULMAULA@domain.com', 'unknown.png', 'siswa', 22),
(121310169, 'NIKKY NOVIAPRATAMI', 'Perempuan', 'deae0d76e64ce2649a65e753f28170ca', 'NIKKYNOVIAPRATAMI@domain.com', 'unknown.png', 'siswa', 26),
(121310170, 'R.MUHAMMAD MAULUDI BURDAH', 'Laki-Laki', '63980737599233823a8e8a681866c6de', 'R.MUHAMMADMAULUDIBURDAH@domain.com', 'unknown.png', 'siswa', 26),
(121310171, 'RAHADIAN GUSTIANSYAH', 'Laki-Laki', '0b0f6bfab5cf8ae7c84577e652b88e94', 'RAHADIANGUSTIANSYAH@domain.com', 'unknown.png', 'siswa', 25),
(121310172, 'RANDY REYNALDI', 'Laki-Laki', 'f0ab93abb89b35f319d513d49689090f', 'RANDYREYNALDI@domain.com', 'unknown.png', 'siswa', 28),
(121310173, 'RIDHA DELANI', 'Perempuan', '5abd98f159b73682fa80b5d5845b6c54', 'RIDHADELANI@domain.com', 'unknown.png', 'siswa', 21),
(121310174, 'RIFKY RAMA HERLAMBANG', 'Laki-Laki', '87b411cad42ac5b9156a45881db2f908', 'RIFKYRAMAHERLAMBANG@domain.com', 'unknown.png', 'siswa', 21),
(121310175, 'RIRI ARIANTI KUNCONO', 'Perempuan', '11e242f5dae4a686d5259f557582b989', 'RIRIARIANTIKUNCONO@domain.com', 'unknown.png', 'siswa', 22),
(121310177, 'RISYIDA  LAMIYA NABILA HAKIM', 'Perempuan', 'da402586688e170def44b6e13ee045d4', 'RISYIDALAMIYANABILAHAKIM@domain.com', 'unknown.png', 'siswa', 23),
(121310178, 'SELA SAPITRI', 'Perempuan', 'b5b77386714493c9e6d9938e7fcacaab', 'SELASAPITRI@domain.com', 'unknown.png', 'siswa', 23),
(121310179, 'SUGIARTO', 'Laki-Laki', '40585f96780ca18872fd1227ff8eae01', 'SUGIARTO@domain.com', 'unknown.png', 'siswa', 23),
(121310180, 'WANDA SHELAWATI', 'Perempuan', '2336c3753a672a4c6e7bd3073f777cc1', 'WANDASHELAWATI@domain.com', 'unknown.png', 'siswa', 21),
(121310181, 'YOSUA CHRISTIAN HAMONANGAN TAMBUNAN', 'Laki-Laki', 'bae54748c69472987a995cb373a4fd1f', 'YOSUACHRISTIANHAMONANGANTAMBUNAN@domain.com', 'unknown.png', 'siswa', 24),
(121310182, 'AL PEPA INDRA ASHARI', 'Laki-Laki', '17a4d5f154a0dbefdb95682912e2f26d', 'ALPEPAINDRAASHARI@domain.com', 'unknown.png', 'siswa', 21),
(121310183, 'ALVIN BANJARSARI SUDANA', 'Laki-Laki', 'f4c4b57a4547bf8cc9b6657b245f3db5', 'ALVINBANJARSARISUDANA@domain.com', 'unknown.png', 'siswa', 23),
(121310184, 'ANDREW KANISIUS', 'Laki-Laki', 'ada3993e2b8e1e33a3901c481021eebf', 'ANDREWKANISIUS@domain.com', 'unknown.png', 'siswa', 26),
(121310185, 'ANNISA SYIFA WIDIANINGTYAS', 'Perempuan', 'a2958a4599584653b7a72f61cd6f0e22', 'ANNISASYIFAWIDIANINGTYAS@domain.com', 'unknown.png', 'siswa', 27),
(121310186, 'ANTI ELOK ENDERIYANI SAPUTRI', 'Perempuan', '340cfcb44ed933e2f215c22aec0c1e25', 'ANTIELOKENDERIYANISAPUTRI@domain.com', 'unknown.png', 'siswa', 30),
(121310187, 'ARIA DASA MAULANA', 'Laki-Laki', 'cfb5f6ea46cea45991b28bac8ceb141e', 'ARIADASAMAULANA@domain.com', 'unknown.png', 'siswa', 23),
(121310188, 'ARIF ACHMAD GUSTYANDA', 'Laki-Laki', '57a582d82f392bc72a19a3bbd893dceb', 'ARIFACHMADGUSTYANDA@domain.com', 'unknown.png', 'siswa', 21),
(121310189, 'BUNGA SASKIA YULIANTY', 'Perempuan', '89506346f8e7a46461a2007b062aae84', 'BUNGASASKIAYULIANTY@domain.com', 'unknown.png', 'siswa', 23),
(121310190, 'DENADA FERITA SIHITE', 'Perempuan', 'a60af817a9926a81d32e1da47e8f40aa', 'DENADAFERITASIHITE@domain.com', 'unknown.png', 'siswa', 27),
(121310191, 'DWIKA RIZKI DARMAWAN', 'Laki-Laki', 'c6a4967f891803ba13d4ce12b4a3b3d0', 'DWIKARIZKIDARMAWAN@domain.com', 'unknown.png', 'siswa', 23),
(121310192, 'FIKRI NAUFAL FATHURRAHMAN', 'Laki-Laki', '370bc7aa557413ecebbc705438eb6a7f', 'FIKRINAUFALFATHURRAHMAN@domain.com', 'unknown.png', 'siswa', 25),
(121310193, 'FUAD MUHAMAD', 'Laki-Laki', 'db125e856df15e30ce429b8b3cc37052', 'FUADMUHAMAD@domain.com', 'unknown.png', 'siswa', 21),
(121310194, 'GHEA CHOLIFAH SANTIKA', 'Perempuan', '1c823429010ed7fdf4937eaf4a24911a', 'GHEACHOLIFAHSANTIKA@domain.com', 'unknown.png', 'siswa', 23),
(121310195, 'GINA MAWARNI', 'Perempuan', 'd336296acaf2228f8fa7911226c15c5e', 'GINAMAWARNI@domain.com', 'unknown.png', 'siswa', 23),
(121310196, 'GIOVANNI GRAZIANI SJAFEI', 'Laki-Laki', 'f5938a96634bbfc7b042f921b39f9e34', 'GIOVANNIGRAZIANISJAFEI@domain.com', 'unknown.png', 'siswa', 29),
(121310197, 'INDRANY YULIAN PUTRI', 'Perempuan', '8958f163be8a76403c5c371a2123fe05', 'INDRANYYULIANPUTRI@domain.com', 'unknown.png', 'siswa', 29),
(121310198, 'IRFAN FATHUR RAHMAN', 'Laki-Laki', '09fd7b95bcf9036085810d2a14d1baf8', 'IRFANFATHURRAHMAN@domain.com', 'unknown.png', 'siswa', 30),
(121310199, 'IVAN ARUKA EUGENE', 'Laki-Laki', '6b7bc56a09acff74aeb29ef3aaab3c1c', 'IVANARUKAEUGENE@domain.com', 'unknown.png', 'siswa', 28),
(121310200, 'JESI ROSELIN', 'Perempuan', 'fe9ed3062d3f8d6e6945b2d46ab6ef47', 'JESIROSELIN@domain.com', 'unknown.png', 'siswa', 24),
(121310201, 'KANIA SITI SARAH', 'Perempuan', 'd498eac122b6d06dca5fc6d4e56924a3', 'KANIASITISARAH@domain.com', 'unknown.png', 'siswa', 27),
(121310202, 'KARINA PUTRI DIANNI', 'Perempuan', 'ef8df3332261dcff7e28a35357be577c', 'KARINAPUTRIDIANNI@domain.com', 'unknown.png', 'siswa', 23),
(121310203, 'KARTIKA NATARINAWATI CAHYONO', 'Perempuan', 'c0b55668734f43fd723aaa5b7b1b055d', 'KARTIKANATARINAWATICAHYONO@domain.com', 'unknown.png', 'siswa', 28),
(121310204, 'KHARISMA ZAHID', 'Perempuan', 'e6521fad2a859d3314887c4084b2ef6d', 'KHARISMAZAHID@domain.com', 'unknown.png', 'siswa', 23),
(121310205, 'KRISNA YUDHA GANESHA PUTRI', 'Perempuan', '4be2be71a47e33693a3f0d42b35261c5', 'KRISNAYUDHAGANESHAPUTRI@domain.com', 'unknown.png', 'siswa', 25),
(121310206, 'MUHAMMAD RIZKY HARDIANA PUTRA', 'Laki-Laki', '2a6ea7e8dc49b51dc6c19bce6e295a31', 'MUHAMMADRIZKYHARDIANAPUTRA@domain.com', 'unknown.png', 'siswa', 25),
(121310207, 'POPPY OCTAVIRA', 'Perempuan', '60a8b263b499e0e575f10bec79336137', 'POPPYOCTAVIRA@domain.com', 'unknown.png', 'siswa', 28),
(121310208, 'R.M. RASYID FEBRIANSYAH AFANDI', 'Laki-Laki', '74f286c773ff303c97830624ce005979', 'R.M.RASYIDFEBRIANSYAHAFANDI@domain.com', 'unknown.png', 'siswa', 29),
(121310209, 'RADELLA RIVA IRAWAN', 'Perempuan', '0defd69cecdecfc0fd9d0333cb4f1972', 'RADELLARIVAIRAWAN@domain.com', 'unknown.png', 'siswa', 28),
(121310210, 'RADEN YUSI PURNAMASARI', 'Perempuan', 'ebb14a3a89c75744e2eb243d7c32c472', 'RADENYUSIPURNAMASARI@domain.com', 'unknown.png', 'siswa', 23),
(121310211, 'RAHMATIKA DESIANA', 'Perempuan', 'ab14bf74a57951eebc91ce263a95288e', 'RAHMATIKADESIANA@domain.com', 'unknown.png', 'siswa', 23),
(121310212, 'RANI NURAINI', 'Perempuan', '1021b273379f900650943fa74b54e515', 'RANINURAINI@domain.com', 'unknown.png', 'siswa', 21),
(121310214, 'SILVIA NURUL FITHRIYAH', 'Perempuan', '195055bc359dc7b3e3bf285d0dd63019', 'SILVIANURULFITHRIYAH@domain.com', 'unknown.png', 'siswa', 25),
(121310217, 'WILDAN RASYID ALHAFIZ', 'Laki-Laki', 'b510ca3258c7d0bde075936975d758b5', 'WILDANRASYIDALHAFIZ@domain.com', 'unknown.png', 'siswa', 22),
(121310218, 'WULAN ANNISYA FAUZIAH', 'Perempuan', '10c49144a60b3a49384847cf1470b32d', 'WULANANNISYAFAUZIAH@domain.com', 'unknown.png', 'siswa', 21),
(121310219, 'ADINDA RAHMI HUMAIRA', 'Perempuan', 'aa156eef09e83eadad2e050c7e96554d', 'ADINDARAHMIHUMAIRA@domain.com', 'unknown.png', 'siswa', 21),
(121310220, 'ADITYA PRATAMA', 'Laki-Laki', '24394eadda626a0bf5324e7604ff2fe3', 'ADITYAPRATAMA@domain.com', 'unknown.png', 'siswa', 27),
(121310221, 'ALTI LATHIFAH', 'Perempuan', 'c8aa77f7186f099151751e3e23007bd6', 'ALTILATHIFAH@domain.com', 'unknown.png', 'siswa', 29),
(121310222, 'ANNISA PUJI LARASSATY', 'Perempuan', '0d5dbb97332d8c7cdb2c78fad9db3a66', 'ANNISAPUJILARASSATY@domain.com', 'unknown.png', 'siswa', 25),
(121310223, 'AYU SARASWATI', 'Perempuan', '77f6e8b0fab848b4eb35a5dbedf91b07', 'AYUSARASWATI@domain.com', 'unknown.png', 'siswa', 27),
(121310224, 'BINTANG PRASETYO', 'Laki-Laki', 'f79edc8d31cd872571da4456f04e8efe', 'BINTANGPRASETYO@domain.com', 'unknown.png', 'siswa', 30),
(121310225, 'DILA ASTI INDRIATY', 'Perempuan', '75dd921cba855476f69c51c59f286fc4', 'DILAASTIINDRIATY@domain.com', 'unknown.png', 'siswa', 27),
(121310226, 'DIVI AMANDA KHAERUNISA', 'Perempuan', '8ce55ef45037cfbf61ef166c4069a515', 'DIVIAMANDAKHAERUNISA@domain.com', 'unknown.png', 'siswa', 29),
(121310227, 'ELVANALI ELVANA', 'Perempuan', '0a897b46ea1706da469b29a422f31804', 'ELVANALIELVANA@domain.com', 'unknown.png', 'siswa', 28),
(121310228, 'FACHRI RENALDI', 'Laki-Laki', 'fb69da625815419007b71f4dc42940bf', 'FACHRIRENALDI@domain.com', 'unknown.png', 'siswa', 29),
(121310229, 'FAKHRI SUBAGJA', 'Laki-Laki', 'c442ad163b5c3a2f848ed91bb20884be', 'FAKHRISUBAGJA@domain.com', 'unknown.png', 'siswa', 28),
(121310230, 'FIRDAUS HADYAN FADHIL', 'Laki-Laki', '44f9508de70f0d00ef3399097fd31b34', 'FIRDAUSHADYANFADHIL@domain.com', 'unknown.png', 'siswa', 29),
(121310231, 'GIFFARI ADITYA PUTRA', 'Laki-Laki', '860441e4c3dba0ed59dfabee55e410ac', 'GIFFARIADITYAPUTRA@domain.com', 'unknown.png', 'siswa', 23),
(121310232, 'IQBAL IBNU SINA', 'Laki-Laki', 'ede56838bac9db76240f616c55243251', 'IQBALIBNUSINA@domain.com', 'unknown.png', 'siswa', 27),
(121310233, 'IQRA PRAMUDYA UTOMO', 'Laki-Laki', '3d47c2a360bd2efc6c687a54a683a8c7', 'IQRAPRAMUDYAUTOMO@domain.com', 'unknown.png', 'siswa', 27),
(121310234, 'KHANZA RAHMASILLA', 'Perempuan', '46015721e768b8fcbca4014ed0c96a43', 'KHANZARAHMASILLA@domain.com', 'unknown.png', 'siswa', 23),
(121310235, 'KIRANA OKTAVIAN WULANDARI', 'Perempuan', 'bc89be5cb5eca12975958c713940cf00', 'KIRANAOKTAVIANWULANDARI@domain.com', 'unknown.png', 'siswa', 25),
(121310236, 'LARASSATI SURYA LESTARI', 'Perempuan', 'ba9573d934a98fae34e8659750e92bce', 'LARASSATISURYALESTARI@domain.com', 'unknown.png', 'siswa', 22),
(121310237, 'LIFYNDA ARYA PUTRI', 'Perempuan', '893af661db7ccea50f0e47ac09cb19b1', 'LIFYNDAARYAPUTRI@domain.com', 'unknown.png', 'siswa', 29),
(121310238, 'LUTFI LUQMAN KHARY', 'Laki-Laki', '447950779b72aa99c3fae39fdc01a4e6', 'LUTFILUQMANKHARY@domain.com', 'unknown.png', 'siswa', 24),
(121310239, 'MICHAEL KUSUMAH PRASETYO', 'Laki-Laki', 'cda0142e9614e121cae0840b1e044172', 'MICHAELKUSUMAHPRASETYO@domain.com', 'unknown.png', 'siswa', 23),
(121310240, 'MUHAMMAD HELMI MAKARIM', 'Laki-Laki', 'f00f7cc6e0aff89e14d15a0a1c1bf5a2', 'MUHAMMADHELMIMAKARIM@domain.com', 'unknown.png', 'siswa', 21),
(121310241, 'MUSHAD BACHDY HARRY', 'Laki-Laki', '30a3a186b0d822ab7f4f79e1ed0e785d', 'MUSHADBACHDYHARRY@domain.com', 'unknown.png', 'siswa', 24),
(121310242, 'NADIA SYIFA AYUSNITA', 'Perempuan', 'c435b207fd1090e194dc817a8e551b8d', 'NADIASYIFAAYUSNITA@domain.com', 'unknown.png', 'siswa', 21),
(121310243, 'NARISWARI KRIS ADININGSIH', 'Perempuan', '90ac9408d129aaa3f08bf79f43df5395', 'NARISWARIKRISADININGSIH@domain.com', 'unknown.png', 'siswa', 25),
(121310244, 'RAFI RAMADHAN PUTRA', 'Laki-Laki', '658dbd724aa26ccb6d5bf469067f31b8', 'RAFIRAMADHANPUTRA@domain.com', 'unknown.png', 'siswa', 21),
(121310245, 'RIRIN SITI RAHMAWATI', 'Perempuan', 'd3911aa245cab2bd7523b0d152e55442', 'RIRINSITIRAHMAWATI@domain.com', 'unknown.png', 'siswa', 25),
(121310246, 'RIVALDI ILYAS', 'Laki-Laki', 'fec974c063aadb9734bb0baec6b251d5', 'RIVALDIILYAS@domain.com', 'unknown.png', 'siswa', 30),
(121310247, 'RIZAL FARIS FATHURRAHMAN', 'Laki-Laki', '7d20f4a22994bdbea5ccd152e1a7ed40', 'RIZALFARISFATHURRAHMAN@domain.com', 'unknown.png', 'siswa', 21),
(121310248, 'SAFIRA ASYSHIFA ', 'Perempuan', 'c354c0afb91f16ccdc3ffedf7ad524a3', 'SAFIRAASYSHIFA@domain.com', 'unknown.png', 'siswa', 25),
(121310250, 'SAORI DWISASKIA SOFYAN', 'Perempuan', '3554b4b8a152ee583ec0416b39272a19', 'SAORIDWISASKIASOFYAN@domain.com', 'unknown.png', 'siswa', 26),
(121310251, 'SASKIA AURYN NUGRAHA PADMANAGARA', 'Perempuan', 'cefca97308091007c72a82807bb08900', 'SASKIAAURYNNUGRAHAPADMANAGARA@domain.com', 'unknown.png', 'siswa', 24),
(121310252, 'SHEILA PERMATA ANDRIANI', 'Perempuan', 'af55246b2b356153cbf21e221683a8c1', 'SHEILAPERMATAANDRIANI@domain.com', 'unknown.png', 'siswa', 24),
(121310253, 'SHINTA AYU AFRHIANI', 'Perempuan', '45765d02b830069a463eb59546b9e66f', 'SHINTAAYUAFRHIANI@domain.com', 'unknown.png', 'siswa', 22),
(121310254, 'TUBAGUS VIBI RIZKI MAULANA PRIBADI', 'Laki-Laki', '60bee393f9d79e6f6fecc4d86594f320', 'TUBAGUSVIBIRIZKIMAULANAPRIBADI@domain.com', 'unknown.png', 'siswa', 23),
(121310255, 'YOSHIDA PRATAMA RISNANDAR', 'Laki-Laki', 'c46406510929def5aa72bcad67f69bb3', 'YOSHIDAPRATAMARISNANDAR@domain.com', 'unknown.png', 'siswa', 27),
(121310256, 'AGNES SUCIATI WARDANI', 'Perempuan', '2397d20794faf445b6af44b2937d5315', 'AGNESSUCIATIWARDANI@domain.com', 'unknown.png', 'siswa', 27),
(121310257, 'AISYA SYARIFA SERVIA', 'Perempuan', 'a3568bed27a9256c267212ecd35a0baa', 'AISYASYARIFASERVIA@domain.com', 'unknown.png', 'siswa', 27),
(121310258, 'ALVIARINI INTAN KURNIA', 'Perempuan', 'fa28f5e0f2ba5311abfd9e5f9e50903b', 'ALVIARINIINTANKURNIA@domain.com', 'unknown.png', 'siswa', 27),
(121310259, 'ASTARI YULIANDHANY', 'Perempuan', '352921020b5d691be94859f413b24a96', 'ASTARIYULIANDHANY@domain.com', 'unknown.png', 'siswa', 22),
(121310260, 'CINDY ANNA DAMAYANTI', 'Perempuan', '2d8992dd7c123d09459e0dcceefd2ce0', 'CINDYANNADAMAYANTI@domain.com', 'unknown.png', 'siswa', 28),
(121310261, 'DEA AULIA FIRDAUS', 'Perempuan', '4cb40a49628d43360793ecf6fdbb9193', 'DEAAULIAFIRDAUS@domain.com', 'unknown.png', 'siswa', 25),
(121310262, 'DEWI PUSPITA', 'Perempuan', '369d7a6d94becae313a6120e00661b1d', 'DEWIPUSPITA@domain.com', 'unknown.png', 'siswa', 22),
(121310263, 'FEBRINA MAGHFIRANI ZAENUDIN', 'Perempuan', '1ae670699ee4e779f58791ade89a2141', 'FEBRINAMAGHFIRANIZAENUDIN@domain.com', 'unknown.png', 'siswa', 27),
(121310264, 'FEBRI FITRIYANTI H.', 'Perempuan', 'f5e0a29348ac370ff91abdc23faf42f1', 'FEBRIFITRIYANTIH.@domain.com', 'unknown.png', 'siswa', 29),
(121310265, 'FERI MUHAMMAD ALI AKBAR', 'Laki-Laki', '96a342caa86fb5feb924c4fdd14f873e', 'FERIMUHAMMADALIAKBAR@domain.com', 'unknown.png', 'siswa', 24),
(121310266, 'IRNE MEISYA SETIADI', 'Perempuan', '1b949102d2b73c4a859bc52a23dce1a5', 'IRNEMEISYASETIADI@domain.com', 'unknown.png', 'siswa', 26),
(121310267, 'JOKIE PATIARAJA SIANTURI', 'Laki-Laki', 'e487b9a14cd85b104183071ccb46ff10', 'JOKIEPATIARAJASIANTURI@domain.com', 'unknown.png', 'siswa', 22),
(121310268, 'MADE AGUNG DWICAHYA', 'Laki-Laki', '4d4a999f139ae0410324f1368f249ddc', 'MADEAGUNGDWICAHYA@domain.com', 'unknown.png', 'siswa', 24),
(121310269, 'MESSY YUNIASARY', 'Perempuan', '2def0d78eb9c205febd9ba961fe045b4', 'MESSYYUNIASARY@domain.com', 'unknown.png', 'siswa', 26),
(121310270, 'MOCHAMAD DWIKY ARIFIN', 'Laki-Laki', 'e58bb9b1c0450108bb9a0eb4c509915a', 'MOCHAMADDWIKYARIFIN@domain.com', 'unknown.png', 'siswa', 27),
(121310271, 'MOMON MULYADI', 'Laki-Laki', '02f25b8230214e5e04affd928bf2c2da', 'MOMONMULYADI@domain.com', 'unknown.png', 'siswa', 22),
(121310272, 'MOCH. EGGY PRATAMA', 'Laki-Laki', 'c514a7c26866ef7a19fa4555654b9259', 'MOCH.EGGYPRATAMA@domain.com', 'unknown.png', 'siswa', 29),
(121310273, 'MUHAMMAD GUNTUR IBRAHIM', 'Laki-Laki', 'd2840a642e9a10bfb53ffc4fbb1d25dc', 'MUHAMMADGUNTURIBRAHIM@domain.com', 'unknown.png', 'siswa', 30),
(121310274, 'MUHAMMAD RAYA FAHREZA', 'Laki-Laki', '9f5a1868c503bef608a615223a5cb6c5', 'MUHAMMADRAYAFAHREZA@domain.com', 'unknown.png', 'siswa', 30),
(121310275, 'MUHAMMAD RIFAI', 'Laki-Laki', 'd596502f2683d4cf593a185c78d622e8', 'MUHAMMADRIFAI@domain.com', 'unknown.png', 'siswa', 30),
(121310276, 'NADYA ANDINI PUTRI', 'Perempuan', 'b6a01526c45f0ee9a5a1adaddc2a01a4', 'NADYAANDINIPUTRI@domain.com', 'unknown.png', 'siswa', 29),
(121310277, 'RADINAL DEWANTARA HUSEIN', 'Laki-Laki', '936de3260e7445b1a86d4da09ca3faf1', 'RADINALDEWANTARAHUSEIN@domain.com', 'unknown.png', 'siswa', 25),
(121310278, 'RAKHMALIANI SYAFIRA', 'Perempuan', '85a8d2c68e511d6a7e83db74a47429bc', 'RAKHMALIANISYAFIRA@domain.com', 'unknown.png', 'siswa', 23),
(121310279, 'RANI NOVITASARI', 'Perempuan', '9bbfc830ebdb64229399736eb44c2557', 'RANINOVITASARI@domain.com', 'unknown.png', 'siswa', 27),
(121310280, 'REGI MUNALDI DIBA', 'Laki-Laki', 'a20ea71269bdb4e730f31c1feb1d37ee', 'REGIMUNALDIDIBA@domain.com', 'unknown.png', 'siswa', 27),
(121310281, 'RESA SUBAGJA MICHAEL SITORUS', 'Laki-Laki', '7961608619a17ae831cd0eb1e51fd29a', 'RESASUBAGJAMICHAELSITORUS@domain.com', 'unknown.png', 'siswa', 26),
(121310282, 'RIVAN FAIZAL RAMDHANI', 'Laki-Laki', '945d70170ae11d5dc90005a93553ff60', 'RIVANFAIZALRAMDHANI@domain.com', 'unknown.png', 'siswa', 30),
(121310283, 'RIZKI PRATAMA RAMADHAN', 'Laki-Laki', 'eb502657a17b6757b0a4b7eed826e73e', 'RIZKIPRATAMARAMADHAN@domain.com', 'unknown.png', 'siswa', 25),
(121310285, 'SARAH AMALIA', 'Perempuan', '9157ee53e30f5d7c2c9f5244ecb8466c', 'SARAHAMALIA@domain.com', 'unknown.png', 'siswa', 27),
(121310286, 'SETIAWAN SATRIA NUGRAHA', 'Laki-Laki', '816cbf3d9bc6cf015dd12225a5507bdf', 'SETIAWANSATRIANUGRAHA@domain.com', 'unknown.png', 'siswa', 27),
(121310288, 'TANIA PRAMESTI KUSUMA WARDHANI', 'Perempuan', 'a710e15e08a7ddc46df3690fe62595d2', 'TANIAPRAMESTIKUSUMAWARDHANI@domain.com', 'unknown.png', 'siswa', 30),
(121310289, 'TIYON ASGA DINDA KUSWARA', 'Laki-Laki', '119a240d77fba2e306ef211b928c21e2', 'TIYONASGADINDAKUSWARA@domain.com', 'unknown.png', 'siswa', 28),
(121310290, 'TRIS RIKO KUSUMA YUDHA', 'Laki-Laki', '886f2862d74e35b8d97ca529f283750d', 'TRISRIKOKUSUMAYUDHA@domain.com', 'unknown.png', 'siswa', 29),
(121310291, 'VEGA ASRI NADILA', 'Perempuan', '83112d662e568883687795c3cf3b4c1f', 'VEGAASRINADILA@domain.com', 'unknown.png', 'siswa', 26),
(121310292, 'ADRIANSYAH PAMUNGKAS', 'Laki-Laki', '838ab4831a46787aa8578479721855a6', 'ADRIANSYAHPAMUNGKAS@domain.com', 'unknown.png', 'siswa', 27),
(121310294, 'ANGGIA SEPTIANI HARTOYO', 'Perempuan', 'b0fac0fba35d2d14ce0d41166d122a81', 'ANGGIASEPTIANIHARTOYO@domain.com', 'unknown.png', 'siswa', 21),
(121310295, 'APRILIA ALDIYA ANGGRAENI', 'Perempuan', '1b2c2e66e66342f2e19d0a909c209fb2', 'APRILIAALDIYAANGGRAENI@domain.com', 'unknown.png', 'siswa', 21),
(121310296, 'BAGUS INDRIAWAN', 'Laki-Laki', '6b5c607bb385862bd177d1300e864790', 'BAGUSINDRIAWAN@domain.com', 'unknown.png', 'siswa', 25),
(121310297, 'BILLY MUHAMMAD IRZAN', 'Laki-Laki', 'ed44dde875d2771a86983207d2177ec3', 'BILLYMUHAMMADIRZAN@domain.com', 'unknown.png', 'siswa', 29),
(121310299, 'DENISA NURUL FIKRI HENDARMIN', 'Perempuan', '2683da649cf805238fc9a70a0106e9a9', 'DENISANURULFIKRIHENDARMIN@domain.com', 'unknown.png', 'siswa', 22),
(121310300, 'DESTY MANTISA', 'Perempuan', '7671880e6657a3295cb0cf262d49fddb', 'DESTYMANTISA@domain.com', 'unknown.png', 'siswa', 25),
(121310301, 'DIKI PRATAMA PUTRA', 'Laki-Laki', 'a12fa37d8dbc08ee38cb90bc5757ccef', 'DIKIPRATAMAPUTRA@domain.com', 'unknown.png', 'siswa', 25),
(121310302, 'FADHILLA', 'Perempuan', '1d3cc8d5fff0a543999fb1ba24596130', 'FADHILLA@domain.com', 'unknown.png', 'siswa', 25),
(121310303, 'FANNISA LIVIANDRA SUTEJO', 'Perempuan', '105b2d657e12af560cf0c5c3fd2fdfb2', 'FANNISALIVIANDRASUTEJO@domain.com', 'unknown.png', 'siswa', 29),
(121310304, 'FINA FADILLAH NURANISSA', 'Perempuan', '68b92f70988e4c6f1d38a36090526b47', 'FINAFADILLAHNURANISSA@domain.com', 'unknown.png', 'siswa', 29),
(121310305, 'GETHA GEA GUMILAR', 'Perempuan', '5c5eba3fc100c9d82abfb75fc15e1375', 'GETHAGEAGUMILAR@domain.com', 'unknown.png', 'siswa', 22),
(121310307, 'HAFIZH ACHMAD DINAN', 'Laki-Laki', '79a48f91d5ec25112810cca4afa0090d', 'HAFIZHACHMADDINAN@domain.com', 'unknown.png', 'siswa', 24),
(121310308, 'HANIF  NAUFAL HAFIZHAN', 'Laki-Laki', '4fdc800c211306b4731caf46349a824f', 'HANIFNAUFALHAFIZHAN@domain.com', 'unknown.png', 'siswa', 30),
(121310310, 'IKRIMAH NUR AZIZ', 'Perempuan', '980caf16e8e2b967c2db37883e05fb5b', 'IKRIMAHNURAZIZ@domain.com', 'unknown.png', 'siswa', 23),
(121310311, 'IMAM SEPTYAN N', 'Laki-Laki', '39dacf3959d58a2de2e42d7cb2d8b113', 'IMAMSEPTYANN@domain.com', 'unknown.png', 'siswa', 29),
(121310312, 'INEKE AULIA RAHMAWATI', 'Perempuan', '0bbf0f9d31595b26aecfc51548ce449e', 'INEKEAULIARAHMAWATI@domain.com', 'unknown.png', 'siswa', 28),
(121310313, 'IRA YULISTIA YULIANTI', 'Perempuan', 'dc23c7b936eb7b4691e302eb6d1d9eeb', 'IRAYULISTIAYULIANTI@domain.com', 'unknown.png', 'siswa', 27),
(121310314, 'KEYNA RATU NEFIRA', 'Perempuan', '09cce89c2ec254aa28f075c80cd68384', 'KEYNARATUNEFIRA@domain.com', 'unknown.png', 'siswa', 21),
(121310315, 'LUQMAN SAKHA GHIA', 'Laki-Laki', 'cd84a502e0fa66669fce464cc182215d', 'LUQMANSAKHAGHIA@domain.com', 'unknown.png', 'siswa', 30),
(121310316, 'MOCHAMMAD RAFI ALFARIZ', 'Laki-Laki', '0eead8e0b206940fb4fceb8762df62d0', 'MOCHAMMADRAFIALFARIZ@domain.com', 'unknown.png', 'siswa', 28),
(121310317, 'MUHAMMAD AZKA HIDAYAT', 'Laki-Laki', '31585180dc19bd178d91d40fd60657f1', 'MUHAMMADAZKAHIDAYAT@domain.com', 'unknown.png', 'siswa', 22),
(121310318, 'MUHAMMAD IKHSAN RENALDY', 'Laki-Laki', 'a3c3ba405222bcc99f48955e4ba80e30', 'MUHAMMADIKHSANRENALDY@domain.com', 'unknown.png', 'siswa', 21),
(121310319, 'MUTIARA RIZKY SETIAWAN', 'Perempuan', 'c0687de4237d65f560471225ae53e43c', 'MUTIARARIZKYSETIAWAN@domain.com', 'unknown.png', 'siswa', 27),
(121310320, 'NANDA RIZKI AMALIA', 'Perempuan', 'd1c8988900c00e48faf621f943ea9499', 'NANDARIZKIAMALIA@domain.com', 'unknown.png', 'siswa', 25),
(121310321, 'NURUSYIFA', 'Perempuan', 'b9be895a442d4566924ff6b36ca6a928', 'NURUSYIFA@domain.com', 'unknown.png', 'siswa', 22),
(121310322, 'RADEN VIVI NOYANTI', 'Perempuan', '3d0f2412c73d673f304a0b2056a839a1', 'RADENVIVINOYANTI@domain.com', 'unknown.png', 'siswa', 26),
(121310323, 'RAFI TRI BUDIASKARI', 'Laki-Laki', '7e51355b115c99620528ac85702dd822', 'RAFITRIBUDIASKARI@domain.com', 'unknown.png', 'siswa', 21),
(121310324, 'RENA PUJI WAHYUNI', 'Perempuan', '23f8cafc45375171f640e77aa90e72b7', 'RENAPUJIWAHYUNI@domain.com', 'unknown.png', 'siswa', 22),
(121310325, 'REYNALDI AUDREYANA OKTAVIANDI', 'Laki-Laki', '1cae53f956bbbaf87c07cc1ba99a9401', 'REYNALDIAUDREYANAOKTAVIANDI@domain.com', 'unknown.png', 'siswa', 24),
(121310326, 'RIZKI FAJAR RAMADHAN', 'Laki-Laki', 'b5512d0f92d08228d16c8ffcc7edf7fb', 'RIZKIFAJARRAMADHAN@domain.com', 'unknown.png', 'siswa', 24),
(121310327, 'TANISA NURYIFA DEWI', 'Perempuan', 'eae8ce56b01c21e7db24f1a8c9396f76', 'TANISANURYIFADEWI@domain.com', 'unknown.png', 'siswa', 27),
(121310328, 'YOELINAR DWIE SETYAWANI', 'Perempuan', '6ac889f749101192d202670a594db89d', 'YOELINARDWIESETYAWANI@domain.com', 'unknown.png', 'siswa', 22),
(121310329, 'ZAKI TWINOVIANI', 'Perempuan', '9bf3cb591b98880ddc8b2fe85f753e1e', 'ZAKITWINOVIANI@domain.com', 'unknown.png', 'siswa', 27),
(121310330, 'AFINA APRILIA RIJAYANA', 'Perempuan', 'e672e8e8e0e842966d69e3f1d4ddda54', 'AFINAAPRILIARIJAYANA@domain.com', 'unknown.png', 'siswa', 22),
(121310331, 'AGRIE SATRYA PERDANA', 'Laki-Laki', 'b990a3abb11600fbb651396c7495c7e3', 'AGRIESATRYAPERDANA@domain.com', 'unknown.png', 'siswa', 22),
(121310332, 'ANDREAN GEORGE WIBISONO', 'Laki-Laki', '7e6af29eb2d297776bea9568f71d3074', 'ANDREANGEORGEWIBISONO@domain.com', 'unknown.png', 'siswa', 24),
(121310333, 'ASRIFA  NURHALIZA', 'Perempuan', 'dad6401b51687245d23d005f12815515', 'ASRIFANURHALIZA@domain.com', 'unknown.png', 'siswa', 28),
(121310334, 'BARI UMRAN FAJRI NABALAH', 'Laki-Laki', 'c6b0b5b7471267735c5c0f10f3ccaffa', 'BARIUMRANFAJRINABALAH@domain.com', 'unknown.png', 'siswa', 21),
(121310335, 'BELLA MONIQA RAMADHINI SONDA', 'Perempuan', '931fa14cdcd6b1f8f82026a377aa2e78', 'BELLAMONIQARAMADHINISONDA@domain.com', 'unknown.png', 'siswa', 24),
(121310336, 'CHANDRA BUDHI RIZKY', 'Laki-Laki', 'fa7310d5302ac92ae2fe2ff64353af54', 'CHANDRABUDHIRIZKY@domain.com', 'unknown.png', 'siswa', 25),
(121310337, 'CHYNTIA INSANI DEWI', 'Perempuan', 'de4d2f59e7e54171e2f50a4dd1127989', 'CHYNTIAINSANIDEWI@domain.com', 'unknown.png', 'siswa', 21),
(121310338, 'DIAN DHIFANI AJARSARI', 'Perempuan', '3aae1f5acc6459daefab5a7c128be25f', 'DIANDHIFANIAJARSARI@domain.com', 'unknown.png', 'siswa', 27),
(121310339, 'DITA LARASATI', 'Perempuan', '4a7ea877a1615f46aaf23a0dcb0efdac', 'DITALARASATI@domain.com', 'unknown.png', 'siswa', 22),
(121310340, 'DWIYANTO LIBRANTARA', 'Laki-Laki', 'db113bd522f2222fbdf3eb1b1b512a3e', 'DWIYANTOLIBRANTARA@domain.com', 'unknown.png', 'siswa', 26),
(121310341, 'FARIAN FIRSANDI', 'Laki-Laki', '084ee2f602156a197a759a3ec28f7a46', 'FARIANFIRSANDI@domain.com', 'unknown.png', 'siswa', 24),
(121310343, 'FUAD PRANA DEWAJIE', 'Laki-Laki', '4e583803babfc74076ad3e52290574c0', 'FUADPRANADEWAJIE@domain.com', 'unknown.png', 'siswa', 28),
(121310344, 'HANA WIDYATARI', 'Perempuan', 'b19a3881d44ec0762120ecf0bbb0c64c', 'HANAWIDYATARI@domain.com', 'unknown.png', 'siswa', 25),
(121310345, 'IHSAN FARRASSALAM AMMARPRAWIRA', 'Laki-Laki', '0fad0821c20ffd60809525cf5cf70d53', 'IHSANFARRASSALAMAMMARPRAWIRA@domain.com', 'unknown.png', 'siswa', 22),
(121310346, 'IQBAL SATRIA N', 'Laki-Laki', 'a8c2c1e44dfacc9d4588482a540a6595', 'IQBALSATRIAN@domain.com', 'unknown.png', 'siswa', 26),
(121310347, 'IRMAWATI', 'Perempuan', '7dbd88034e20a69c5f0dd0d330f13136', 'IRMAWATI@domain.com', 'unknown.png', 'siswa', 26),
(121310348, 'JAMALLUDIN JAMAL', 'Laki-Laki', '3fee4c9369a36ac9f6853e1e37975774', 'JAMALLUDINJAMAL@domain.com', 'unknown.png', 'siswa', 24),
(121310349, 'JESSICA ASTRIA', 'Perempuan', '714df96b592c3f8e9a99eeb9d269e60d', 'JESSICAASTRIA@domain.com', 'unknown.png', 'siswa', 26),
(121310350, 'MARSHA ANDRIA AMANDA', 'Perempuan', '88fc8ecd0bf7420396ab93782983811f', 'MARSHAANDRIAAMANDA@domain.com', 'unknown.png', 'siswa', 24),
(121310351, 'NABILA ANNISA', 'Perempuan', 'f12b971b8cbf3f409bb6d4208f2b96e9', 'NABILAANNISA@domain.com', 'unknown.png', 'siswa', 26),
(121310352, 'NATASYA ANGGARI WIDYASTUTI', 'Perempuan', '523e00156b559613d70ceccef329d564', 'NATASYAANGGARIWIDYASTUTI@domain.com', 'unknown.png', 'siswa', 24),
(121310353, 'NERISSA ARVIANI HARTOYO', 'Perempuan', 'da37615eae4e1991027d9e8df4da0729', 'NERISSAARVIANIHARTOYO@domain.com', 'unknown.png', 'siswa', 22),
(121310354, 'REZA BANYU ALAMSYAH', 'Laki-Laki', 'd7b1c12a19ff695864f5302e2021b750', 'REZABANYUALAMSYAH@domain.com', 'unknown.png', 'siswa', 29),
(121310355, 'REZADIRA MALIK', 'Laki-Laki', '720bba798f3437bfc98174f66f1507fb', 'REZADIRAMALIK@domain.com', 'unknown.png', 'siswa', 30),
(121310356, 'RICKY HILMI SUDRAJAD', 'Laki-Laki', 'fac66307ad16fd8402d6e295d39ebc26', 'RICKYHILMISUDRAJAD@domain.com', 'unknown.png', 'siswa', 23),
(121310357, 'RIDZKI TWINASTITI ', 'Perempuan', '444383beb99a5a0052647745f90ca7d8', 'RIDZKITWINASTITI@domain.com', 'unknown.png', 'siswa', 28),
(121310358, 'RIMA RAHMAWATI', 'Perempuan', 'a153fb082ad90dfd471c818b33b29bb3', 'RIMARAHMAWATI@domain.com', 'unknown.png', 'siswa', 29),
(121310360, 'RIZALDI CAESAR YUNIARDI', 'Laki-Laki', '6e717bac03a2a8455e7981aa06bb2623', 'RIZALDICAESARYUNIARDI@domain.com', 'unknown.png', 'siswa', 23),
(121310361, 'SALMA SILVIANI WAHYUDIN', 'Perempuan', '471832cb6c969b9fa79347044638dbe8', 'SALMASILVIANIWAHYUDIN@domain.com', 'unknown.png', 'siswa', 27),
(121310362, 'SHOFA PUTRI AISYAH', 'Perempuan', '0b7bf6ca176c0ee5e6122ea7af7f4045', 'SHOFAPUTRIAISYAH@domain.com', 'unknown.png', 'siswa', 29),
(121310363, 'SURYA SOMANTRI', 'Laki-Laki', 'bd0a409075d52df6843792293dc05c82', 'SURYASOMANTRI@domain.com', 'unknown.png', 'siswa', 27),
(121310364, 'SYEH ABDUL HALIM AL HASANY', 'Laki-Laki', '9149c55a244b3d3b25420ef0c0324476', 'SYEHABDULHALIMALHASANY@domain.com', 'unknown.png', 'siswa', 26),
(121310365, 'TOVANI BARKAH', 'Laki-Laki', '4614af64dd5121a7f5e62e3356e8ca1e', 'TOVANIBARKAH@domain.com', 'unknown.png', 'siswa', 25),
(121310366, 'VIVI NOVIYANTI', 'Perempuan', 'd01d6dd63a5081176bf45547953b33a5', 'VIVINOVIYANTI@domain.com', 'unknown.png', 'siswa', 29),
(121310368, 'MAOYA SALSABILA ', 'Perempuan', 'af959771861efcff3e7bb5655018fd3e', 'MAOYASALSABILA@domain.com', 'unknown.png', 'siswa', 21),
(121310381, 'NUZULLA FIRDAUS', 'Perempuan', '442f27a1bb2ac1ae08f715ec3cce3f62', 'NUZULLAFIRDAUS@domain.com', 'unknown.png', 'siswa', 21),
(121310382, 'MADE ANGGARA DWI P', 'Laki-Laki', '117a2dd568396d1523178e6da14163ee', 'MADEANGGARADWIP@domain.com', 'unknown.png', 'siswa', 25),
(121310383, 'N. YULISMA ARIESTA HALIK', 'Perempuan', '10ad5dd9af0542ac41d768f623c2f740', 'N.YULISMAARIESTAHALIK@domain.com', 'unknown.png', 'siswa', 30),
(131410001, 'ADLI RAIHAN', 'Laki-Laki', '20e170ef97ad63213c9623cb8bde2272', 'ADLIRAIHAN@domain.com', 'unknown.png', 'siswa', 12);
INSERT INTO `siswa` (`nis`, `nama_siswa`, `jklamin_siswa`, `password`, `email`, `dispict`, `status`, `id_kelas`) VALUES
(131410002, 'AKMAL ABYAN', 'Laki-Laki', '767212ecbe26cd6030119bc0cf342151', 'AKMALABYAN@domain.com', 'unknown.png', 'siswa', 12),
(131410003, 'ARIQ ANAS BAHAR', 'Laki-Laki', '5c94b838b1d9479c534b7f1592a30b08', 'ARIQANASBAHAR@domain.com', 'unknown.png', 'siswa', 12),
(131410004, 'BERDIAWAN SURYA NUGRAHA', 'Laki-Laki', '1e251a19c3540bd846feb4d1af61fa23', 'BERDIAWANSURYANUGRAHA@domain.com', 'unknown.png', 'siswa', 12),
(131410005, 'FATTYA SALSABILLA', 'Perempuan', '88bd67d2fa8ef08a5c15972933a2b41e', 'FATTYASALSABILLA@domain.com', 'unknown.png', 'siswa', 12),
(131410006, 'FAUZIA NURHALIZA', 'Perempuan', '730fe32cddb46cf1b8ad503ff2d9074e', 'FAUZIANURHALIZA@domain.com', 'unknown.png', 'siswa', 12),
(131410007, 'FEBRIYANTI', 'Perempuan', 'bc1fe5a78a8f8d9f5e1ab05b139a6483', 'FEBRIYANTI@domain.com', 'unknown.png', 'siswa', 12),
(131410008, 'FIKRI REFORMASI GUNAWAN', 'Laki-Laki', '539faa861fdada80588fc910293773d4', 'FIKRIREFORMASIGUNAWAN@domain.com', 'unknown.png', 'siswa', 12),
(131410009, 'FINGKA QIMARA ABSAR', 'Perempuan', 'febcae8f6a7bcb05982bb43311c2ac6a', 'FINGKAQIMARAABSAR@domain.com', 'unknown.png', 'siswa', 12),
(131410010, 'FIRDHA BELIANA PRAMESTI', 'Perempuan', '0a8223e92b58d2b256655a719f106546', 'FIRDHABELIANAPRAMESTI@domain.com', 'unknown.png', 'siswa', 12),
(131410011, 'GHINA FARIDAH', 'Perempuan', '82e8a06e3953a7b2fac6e71db6f96e2b', 'GHINAFARIDAH@domain.com', 'unknown.png', 'siswa', 12),
(131410012, 'HANA LUTHFIA QUDRATUNADA', 'Perempuan', '2d38f48e3530c38b7d8d620c42ffc95e', 'HANALUTHFIAQUDRATUNADA@domain.com', 'unknown.png', 'siswa', 12),
(131410013, 'HANNE AYUNINGTIAS ELSA', 'Perempuan', 'a624ebca3b425e92291aedea6a192876', 'HANNEAYUNINGTIASELSA@domain.com', 'unknown.png', 'siswa', 12),
(131410014, 'HESTI PAMBUDININGTYAS', 'Perempuan', 'f26c3962e8e2adfb67c2ae712b3128a8', 'HESTIPAMBUDININGTYAS@domain.com', 'unknown.png', 'siswa', 12),
(131410015, 'KHANSA NUR SHADRINA', 'Perempuan', '4743371234f8b21d0019221151cb268f', 'KHANSANURSHADRINA@domain.com', 'unknown.png', 'siswa', 12),
(131410016, 'LONIKA DWI PUSPA INDAH', 'Perempuan', '571a5de6e6bd6fc0dedf7ba72854c1e6', 'LONIKADWIPUSPAINDAH@domain.com', 'unknown.png', 'siswa', 12),
(131410017, 'MOCH. UMAR FIRMANSYAH ', 'Laki-Laki', '6e9d7007c0e158deabce0b86a6e4c09c', 'MOCH.UMARFIRMANSYAH@domain.com', 'unknown.png', 'siswa', 12),
(131410018, 'MONICA CINDY CLAUDE', 'Perempuan', '3e4b0b4a3fd03c837b9a9c7125558635', 'MONICACINDYCLAUDE@domain.com', 'unknown.png', 'siswa', 12),
(131410019, 'MUHAMMAD ILHAM FADLUROHMAN', 'Laki-Laki', '3bad62a369f66b4060f8bd519d13388c', 'MUHAMMADILHAMFADLUROHMAN@domain.com', 'unknown.png', 'siswa', 12),
(131410020, 'MUHAMMAD LUTHAN IRGI AMYSEBI', 'Laki-Laki', '6f75a780ec21143595d140efa5182650', 'MUHAMMADLUTHANIRGIAMYSEBI@domain.com', 'unknown.png', 'siswa', 12),
(131410021, 'NABILAH ALYA INSANI', 'Perempuan', '86dfed4d4ce94a15ff5775e87c48be15', 'NABILAHALYAINSANI@domain.com', 'unknown.png', 'siswa', 12),
(131410022, 'NADHIRA SALSABILA AZZAHRA', 'Perempuan', '3ef14c008fbcb6b267773a3e119c3c5e', 'NADHIRASALSABILAAZZAHRA@domain.com', 'unknown.png', 'siswa', 12),
(131410023, 'NIDA KHOIRUNNISA', 'Perempuan', '2c671bcca67e216c709580f5dbce3fba', 'NIDAKHOIRUNNISA@domain.com', 'unknown.png', 'siswa', 12),
(131410024, 'NUR SALMA EKADINANTI', 'Perempuan', '78e6009fb776b18b5a9987032480691b', 'NURSALMAEKADINANTI@domain.com', 'unknown.png', 'siswa', 12),
(131410025, 'RENALDI', 'Laki-Laki', '8ef54d6c4b2648f18c5d7a551b6f4bdb', 'RENALDI@domain.com', 'unknown.png', 'siswa', 12),
(131410026, 'REYHAN HASYAFTALA', 'Laki-Laki', 'c04da6871eba8b3f74af08a4a9718427', 'REYHANHASYAFTALA@domain.com', 'unknown.png', 'siswa', 12),
(131410027, 'RICHVA ADITIA PRATAMA', 'Laki-Laki', '85e96999b78fa8120b7024e6a30ebb1b', 'RICHVAADITIAPRATAMA@domain.com', 'unknown.png', 'siswa', 12),
(131410028, 'RIZKIA NOVIANA', 'Perempuan', '0a4ed414098329f051ccb2b30f285fd8', 'RIZKIANOVIANA@domain.com', 'unknown.png', 'siswa', 12),
(131410029, 'RONALD GHIFARI ERFAN', 'Laki-Laki', 'f5ab9b2ed6602d1fd16a1ea7bf5888e5', 'RONALDGHIFARIERFAN@domain.com', 'unknown.png', 'siswa', 12),
(131410030, 'SITI YASYFA FITRIA', 'Perempuan', '31fc13cc41810350c7bd9dc8bbb72383', 'SITIYASYFAFITRIA@domain.com', 'unknown.png', 'siswa', 12),
(131410031, 'TAZA NURJANNAH', 'Perempuan', 'f48447f60848f1bab4444b87ca9f30e4', 'TAZANURJANNAH@domain.com', 'unknown.png', 'siswa', 12),
(131410032, 'ZAHRA NAFHANI BUDIWATY', 'Perempuan', 'd23dc9cb927cf526dfe549de98c19d96', 'ZAHRANAFHANIBUDIWATY@domain.com', 'unknown.png', 'siswa', 12),
(131410033, 'ALIFIA FADHILAH', 'Perempuan', '26cd93a5cb288d68b39136d48a385291', 'ALIFIAFADHILAH@domain.com', 'unknown.png', 'siswa', 13),
(131410034, 'ANNISA HANIFAH', 'Perempuan', '9f09e0069a0f66cfc6f18f234192a622', 'ANNISAHANIFAH@domain.com', 'unknown.png', 'siswa', 13),
(131410035, 'AZIZZAH SUPARTINI', 'Perempuan', '6076354875e6b8ce24d6d89f9ee8cc3b', 'AZIZZAHSUPARTINI@domain.com', 'unknown.png', 'siswa', 13),
(131410036, 'BAYU REZA', 'Laki-Laki', '43a8aa4d0c19179d7b36a4c55842bcec', 'BAYUREZA@domain.com', 'unknown.png', 'siswa', 13),
(131410037, 'DEA SALSABILA', 'Perempuan', 'a57124a25644a606a5ab4cbafdb08eed', 'DEASALSABILA@domain.com', 'unknown.png', 'siswa', 13),
(131410038, 'FAJARINGGA GALIH TIANTORO', 'Laki-Laki', '3ae57adc48a45f6471ca91e1dfb05ab5', 'FAJARINGGAGALIHTIANTORO@domain.com', 'unknown.png', 'siswa', 13),
(131410039, 'FIRDA CAHYA FEBRIANI', 'Perempuan', 'c709c68adec6da7e020d09094ccb3225', 'FIRDACAHYAFEBRIANI@domain.com', 'unknown.png', 'siswa', 13),
(131410040, 'ISMAYA EFAN CAHYANI', 'Perempuan', '968af4019167901a6bacd0f63777574a', 'ISMAYAEFANCAHYANI@domain.com', 'unknown.png', 'siswa', 13),
(131410041, 'LUTHFI NUGRAHA SYAH', 'Laki-Laki', '68696236115da2e82c590677c5875275', 'LUTHFINUGRAHASYAH@domain.com', 'unknown.png', 'siswa', 13),
(131410042, 'MOCHAMAD ASY-SYAMS', 'Laki-Laki', '00c3179543ec0058978915fbd32d723e', 'MOCHAMADASY-SYAMS@domain.com', 'unknown.png', 'siswa', 13),
(131410044, 'MOCHAMMAD FAHMI FAKHRUDDIN', 'Laki-Laki', 'e002cfc5c4da3bde1b4576258fb42e95', 'MOCHAMMADFAHMIFAKHRUDDIN@domain.com', 'unknown.png', 'siswa', 13),
(131410045, 'MOHAMMAD RIZKY WIRANEGARA', 'Laki-Laki', '3dd4d3080ae69e59ad2aae79147d04fb', 'MOHAMMADRIZKYWIRANEGARA@domain.com', 'unknown.png', 'siswa', 13),
(131410046, 'MUHAMAD ADHA SUGEMA', 'Laki-Laki', '228e3d528c4304b4ba97463bc7a43817', 'MUHAMADADHASUGEMA@domain.com', 'unknown.png', 'siswa', 13),
(131410048, 'MUHAMMAD FARHAN HADINATA', 'Laki-Laki', '3e16e0623e577d05a132f4a2548b20a7', 'MUHAMMADFARHANHADINATA@domain.com', 'unknown.png', 'siswa', 13),
(131410049, 'MUHAMMAD RAFFLY SURYADI', 'Laki-Laki', '106550641a38494a23a21396c9e6ffc0', 'MUHAMMADRAFFLYSURYADI@domain.com', 'unknown.png', 'siswa', 13),
(131410050, 'MUTIA RAMADINA', 'Perempuan', 'd4a253e92da79b859f3969ed2b17bbea', 'MUTIARAMADINA@domain.com', 'unknown.png', 'siswa', 13),
(131410051, 'NADA HASNA PERMANA', 'Perempuan', '2f5fcc0d56c4c617074e0729078bcde6', 'NADAHASNAPERMANA@domain.com', 'unknown.png', 'siswa', 13),
(131410052, 'NADYA ADITHASARI', 'Perempuan', '4b14f3e140b702142d3245f31e15c7e3', 'NADYAADITHASARI@domain.com', 'unknown.png', 'siswa', 13),
(131410053, 'NAGIA', 'Perempuan', '3eac17c0b860c6a1bb24d7d15e731797', 'NAGIA@domain.com', 'unknown.png', 'siswa', 13),
(131410054, 'NINDIRA GEMALA FITRIANDRA HASSYA', 'Perempuan', '5de612d1750ada33c95f30366d772ca8', 'NINDIRAGEMALAFITRIANDRAHASSYA@domain.com', 'unknown.png', 'siswa', 13),
(131410055, 'NISA HAFIDZATUL ADILA', 'Perempuan', '7b52929d43f0a12585386bfdd1add7e9', 'NISAHAFIDZATULADILA@domain.com', 'unknown.png', 'siswa', 13),
(131410056, 'RACHMAD REZKI', 'Laki-Laki', '477c8005e4e0f4db8e6950d73646cb44', 'RACHMADREZKI@domain.com', 'unknown.png', 'siswa', 13),
(131410057, 'RAHMI VINA SHAFIRA', 'Perempuan', 'd8c7483b676218035f21fcdea7e9e10f', 'RAHMIVINASHAFIRA@domain.com', 'unknown.png', 'siswa', 13),
(131410058, 'REZA KURNIADI', 'Laki-Laki', '4d020326b02ea18b127e3bd810a7064d', 'REZAKURNIADI@domain.com', 'unknown.png', 'siswa', 13),
(131410059, 'RICKY PRASETYA UTAMA', 'Laki-Laki', '5941e2621e9a5b09bb8607034eded763', 'RICKYPRASETYAUTAMA@domain.com', 'unknown.png', 'siswa', 13),
(131410060, 'RIFQI MOCHAMAD RIDWANSYAH', 'Laki-Laki', '851f4770033323b472ede29a307765ef', 'RIFQIMOCHAMADRIDWANSYAH@domain.com', 'unknown.png', 'siswa', 13),
(131410061, 'SAFITRI INTAN PURNAMA SARI', 'Perempuan', 'a6a50486a606b27b7a96c208f005accb', 'SAFITRIINTANPURNAMASARI@domain.com', 'unknown.png', 'siswa', 13),
(131410062, 'SHAFWAN ASHIDQI MAULADI SURYAMAN', 'Laki-Laki', '5085963b63bbaf264bad3f2b33b81145', 'SHAFWANASHIDQIMAULADISURYAMAN@domain.com', 'unknown.png', 'siswa', 13),
(131410063, 'SINTHYA DEWI AGUSTIANY', 'Perempuan', '85d19a61d748b705f82af58fb9ba539b', 'SINTHYADEWIAGUSTIANY@domain.com', 'unknown.png', 'siswa', 13),
(131410064, 'TIARA PUTRI RANTIKA', 'Perempuan', '45b6e1134a1759018dc9d4a03972f3c0', 'TIARAPUTRIRANTIKA@domain.com', 'unknown.png', 'siswa', 13),
(131410065, 'VALERY VIOLA FIORENTINA', 'Perempuan', 'b24d03d038383cd61a7e57294d11fac7', 'VALERYVIOLAFIORENTINA@domain.com', 'unknown.png', 'siswa', 13),
(131410066, 'VANIA RARASHITA', 'Perempuan', '69ad0b4c97383ac73bd55e90a36df79d', 'VANIARARASHITA@domain.com', 'unknown.png', 'siswa', 13),
(131410067, 'VIVI NOVYANTI', 'Perempuan', 'b14f9e8456c6bc8dd1d94a5a940121a7', 'VIVINOVYANTI@domain.com', 'unknown.png', 'siswa', 13),
(131410068, 'WIDI AYU YULIANINGRAT', 'Perempuan', '064bf527cf9fa1a90b49c4c0c4d41e6d', 'WIDIAYUYULIANINGRAT@domain.com', 'unknown.png', 'siswa', 13),
(131410070, 'AYSHA SYAWALANDIA SAPTARI', 'Perempuan', '3ffbdaf85d62e773acf511f0b26f27e7', 'AYSHASYAWALANDIASAPTARI@domain.com', 'unknown.png', 'siswa', 14),
(131410071, 'BHAKTI MUHAMMAD R.', 'Laki-Laki', '753ec56f4a4e18fb920a6211db9adc57', 'BHAKTIMUHAMMADR.@domain.com', 'unknown.png', 'siswa', 14),
(131410072, 'DHIFANI RIZQITA HARASTI', 'Perempuan', '701c548a6cf24893ccdfaeccbed76da5', 'DHIFANIRIZQITAHARASTI@domain.com', 'unknown.png', 'siswa', 14),
(131410073, 'FADILAH NOVIANTI', 'Perempuan', '31d3b74195178c84108f73b325f8e627', 'FADILAHNOVIANTI@domain.com', 'unknown.png', 'siswa', 14),
(131410074, 'FINA DAMAYANTI', 'Perempuan', 'd0351ccc4b0e7f9a07e3c1efa539e5d5', 'FINADAMAYANTI@domain.com', 'unknown.png', 'siswa', 14),
(131410075, 'IRFAN NOVRIZAL', 'Laki-Laki', 'c4cd85584042a39cb6430282013e763c', 'IRFANNOVRIZAL@domain.com', 'unknown.png', 'siswa', 14),
(131410076, 'ISAGI PRAHA NUGRAHA', 'Laki-Laki', '163fe0ef8d0f7a9387aa68b466f6ceb3', 'ISAGIPRAHANUGRAHA@domain.com', 'unknown.png', 'siswa', 14),
(131410077, 'LANI YULIANI', 'Perempuan', 'b4f59a44032da7a4b028687d1def1066', 'LANIYULIANI@domain.com', 'unknown.png', 'siswa', 14),
(131410078, 'LUTFI RIFIDA AGUSTIAN', 'Laki-Laki', '2c48144cbcfcf950f36ccdae75f86aae', 'LUTFIRIFIDAAGUSTIAN@domain.com', 'unknown.png', 'siswa', 14),
(131410079, 'MARTHINI', 'Perempuan', 'daf26f39ca02c796c4f81a650bf73353', 'MARTHINI@domain.com', 'unknown.png', 'siswa', 14),
(131410080, 'MAUDI ALMIRA DEVINA', 'Perempuan', 'df4b4065e96d000eb7610f300009b4e2', 'MAUDIALMIRADEVINA@domain.com', 'unknown.png', 'siswa', 14),
(131410081, 'MILA NIRMALASARI', 'Perempuan', '0ebff42c5fb2e19e53928f4f12eedb71', 'MILANIRMALASARI@domain.com', 'unknown.png', 'siswa', 14),
(131410082, 'MOHAMMAD FAHMI MUSLIM', 'Laki-Laki', '68f0f0936982e8a596b8ecd64ffe6f99', 'MOHAMMADFAHMIMUSLIM@domain.com', 'unknown.png', 'siswa', 14),
(131410083, 'MUHAMAD SIDIQ', 'Laki-Laki', '2bd9ee13dd47c2d36c9521e4a38a1970', 'MUHAMADSIDIQ@domain.com', 'unknown.png', 'siswa', 14),
(131410084, 'MUHAMMAD FAUZAN RIZKIATAMA SYAM', 'Laki-Laki', '66b6c895e474f19ea12b6c94f6ed5b84', 'MUHAMMADFAUZANRIZKIATAMASYAM@domain.com', 'unknown.png', 'siswa', 14),
(131410085, 'MUHAMMAD RIZKI SUBAGJA', 'Laki-Laki', '421ba595718121546f7d046ab15cb08c', 'MUHAMMADRIZKISUBAGJA@domain.com', 'unknown.png', 'siswa', 14),
(131410086, 'MUTIARA ELVIRA', 'Perempuan', '39acc5714b4c07cf7020020693a55ce0', 'MUTIARAELVIRA@domain.com', 'unknown.png', 'siswa', 14),
(131410087, 'MUTIARA SRI RAMADHANI', 'Perempuan', 'e57653969b3cc915b2b61f09a09b81cf', 'MUTIARASRIRAMADHANI@domain.com', 'unknown.png', 'siswa', 14),
(131410088, 'NOFIAH FAHMI SARI', 'Perempuan', '5595282702ceb4898812e789ddc98773', 'NOFIAHFAHMISARI@domain.com', 'unknown.png', 'siswa', 14),
(131410090, 'PUTRI NUR BUDIATI', 'Perempuan', '01773b736a749d8c0321a9aa3064e566', 'PUTRINURBUDIATI@domain.com', 'unknown.png', 'siswa', 14),
(131410091, 'RANI SAFITRI', 'Perempuan', 'ba77a4a133a13f9e5994b0ac33540853', 'RANISAFITRI@domain.com', 'unknown.png', 'siswa', 14),
(131410092, 'RATU AFIFANI SAGARA MUGHNI', 'Perempuan', '6fdc5c01051dab3abc9b99a71df5222c', 'RATUAFIFANISAGARAMUGHNI@domain.com', 'unknown.png', 'siswa', 14),
(131410094, 'SALMA FAUZIYAH PUTRI', 'Perempuan', '244019363d4dbc8372ebd4bf7e929dd7', 'SALMAFAUZIYAHPUTRI@domain.com', 'unknown.png', 'siswa', 14),
(131410095, 'SAMUDRA AKHMAD MAULANA', 'Laki-Laki', 'd2e8cc8cf6bdbcec97d9c8b5ee52d650', 'SAMUDRAAKHMADMAULANA@domain.com', 'unknown.png', 'siswa', 14),
(131410096, 'SANKY HALDIANSYAH OKTAVIANA', 'Laki-Laki', '2c6b79165c616c317077974e121b94ce', 'SANKYHALDIANSYAHOKTAVIANA@domain.com', 'unknown.png', 'siswa', 14),
(131410097, 'SUCI RAHAYU PRATIWI', 'Perempuan', 'aebabcaaa24706a808ccccd89b1b34f4', 'SUCIRAHAYUPRATIWI@domain.com', 'unknown.png', 'siswa', 14),
(131410098, 'SYACHNURUL AVELIA MAYAZIRA', 'Perempuan', 'fa309fd2b33e2770d6268aea4e1dfc62', 'SYACHNURULAVELIAMAYAZIRA@domain.com', 'unknown.png', 'siswa', 14),
(131410099, 'THALITA PUSPA PARAMITHA', 'Perempuan', 'bad16d7066e71de3c68fe3123f056bdc', 'THALITAPUSPAPARAMITHA@domain.com', 'unknown.png', 'siswa', 14),
(131410100, 'WIEDA NADILIANI', 'Perempuan', '24a563b47744abe857df6d10aee05930', 'WIEDANADILIANI@domain.com', 'unknown.png', 'siswa', 14),
(131410101, 'YANFA AFUZA', 'Perempuan', '9e0f654ea8c4455bdb2faf6a548ef7bc', 'YANFAAFUZA@domain.com', 'unknown.png', 'siswa', 14),
(131410102, 'YUSHA FAZRIAL KAMAL', 'Perempuan', 'c02aafd9139c64c3d061d0d981e2533f', 'YUSHAFAZRIALKAMAL@domain.com', 'unknown.png', 'siswa', 14),
(131410103, 'ADELLIA FRANSISCA', 'Perempuan', 'cf0a6ef30be03c2b733de9cfad30c9b8', 'ADELLIAFRANSISCA@domain.com', 'unknown.png', 'siswa', 15),
(131410104, 'ALIKA SALSABILA', 'Perempuan', '71076ce022f785c00c0a121e1c07a5c4', 'ALIKASALSABILA@domain.com', 'unknown.png', 'siswa', 15),
(131410105, 'AQIL AMALLUDIN MUHAMMAD', 'Laki-Laki', '0a49818dedc713a8101df025af15fa46', 'AQILAMALLUDINMUHAMMAD@domain.com', 'unknown.png', 'siswa', 15),
(131410106, 'ASH SHYFA TEMBANG KHARISMA', 'Perempuan', 'b529fc26ea5d5c83d1f8eb6207901a61', 'ASHSHYFATEMBANGKHARISMA@domain.com', 'unknown.png', 'siswa', 15),
(131410107, 'AULIA DIASPUTRI', 'Perempuan', 'e4a80e95f8fb2685b0e6dc05812064fb', 'AULIADIASPUTRI@domain.com', 'unknown.png', 'siswa', 15),
(131410108, 'AZKA AULIA SALSABILA', 'Perempuan', 'd7f9acf7c235593baa74567b0651f688', 'AZKAAULIASALSABILA@domain.com', 'unknown.png', 'siswa', 15),
(131410109, 'BANON MAHBUBAH', 'Perempuan', '2c6148712893c7d2a2889dd631b50291', 'BANONMAHBUBAH@domain.com', 'unknown.png', 'siswa', 15),
(131410110, 'BELLA ZHARFAN AULIA', 'Perempuan', '29f830d91921141b0564de35d945a30d', 'BELLAZHARFANAULIA@domain.com', 'unknown.png', 'siswa', 15),
(131410111, 'CHYNTIA DIAN MULYANI', 'Perempuan', 'ac2506083acedb864f3eb98c54083db8', 'CHYNTIADIANMULYANI@domain.com', 'unknown.png', 'siswa', 15),
(131410112, 'CINDHA RIZKIANA', 'Perempuan', '0244c642c54fb9da9b4a898884502949', 'CINDHARIZKIANA@domain.com', 'unknown.png', 'siswa', 15),
(131410113, 'DELLA FADHILAH', 'Perempuan', 'a22485dadb9d0982e36a997ed259a4fd', 'DELLAFADHILAH@domain.com', 'unknown.png', 'siswa', 15),
(131410114, 'DIANA FITRIA SHOFA', 'Perempuan', 'c528b674f4d000ddd2ab172bc24b942a', 'DIANAFITRIASHOFA@domain.com', 'unknown.png', 'siswa', 15),
(131410115, 'ERINA NURAINI FITRI', 'Perempuan', '222d30af8a2fba801447d8bea0d38884', 'ERINANURAINIFITRI@domain.com', 'unknown.png', 'siswa', 15),
(131410116, 'FAUZAN KEMAL MARZUKA', 'Laki-Laki', 'f0883f278e6f7783ec343d776cce77fa', 'FAUZANKEMALMARZUKA@domain.com', 'unknown.png', 'siswa', 15),
(131410117, 'GALEH ADJIE PANGESTU', 'Laki-Laki', 'e2fba349098a9a5d62166e28639884cf', 'GALEHADJIEPANGESTU@domain.com', 'unknown.png', 'siswa', 15),
(131410118, 'GHAFIRA UMARI', 'Perempuan', 'b64c99c8664afe3371ae7c43f22122e6', 'GHAFIRAUMARI@domain.com', 'unknown.png', 'siswa', 15),
(131410119, 'HANIFATI ALMAS', 'Perempuan', '0bf5726ad15fc5ac761086648488dfc0', 'HANIFATIALMAS@domain.com', 'unknown.png', 'siswa', 15),
(131410120, 'ISHMA FEBY HANIYAH', 'Perempuan', '45c9755d1bece46dfb236eb58d219325', 'ISHMAFEBYHANIYAH@domain.com', 'unknown.png', 'siswa', 15),
(131410121, 'JIHAN FAKHRIA BAEHAQI', 'Perempuan', 'e04144af27957eae8a1fe38b4e4ecf5d', 'JIHANFAKHRIABAEHAQI@domain.com', 'unknown.png', 'siswa', 15),
(131410123, 'MUHAMAD NAUFAL HARMY', 'Laki-Laki', 'd12b69aa5ec0644775f1cc5c00d79bea', 'MUHAMADNAUFALHARMY@domain.com', 'unknown.png', 'siswa', 15),
(131410124, 'MONICA MELVRIANA PUTRI C', 'Perempuan', '2064d8dbc59b1e36bdb3bf6ae6664c5c', 'MONICAMELVRIANAPUTRIC@domain.com', 'unknown.png', 'siswa', 15),
(131410125, 'MOZA PANGESTU', 'Laki-Laki', '9fe1ae53d72784de88c616559fae3f71', 'MOZAPANGESTU@domain.com', 'unknown.png', 'siswa', 15),
(131410126, 'MUFFARIZAL SANDHIKA FUNAYA', 'Laki-Laki', 'ca11fd239251635ccefbc001b1fda8ce', 'MUFFARIZALSANDHIKAFUNAYA@domain.com', 'unknown.png', 'siswa', 15),
(131410127, 'MUHAMMAD JAKARIA RAHMADI', 'Laki-Laki', 'b26492f49e22e8cc8b29fc291a090ae1', 'MUHAMMADJAKARIARAHMADI@domain.com', 'unknown.png', 'siswa', 15),
(131410129, 'NABILLA ALMAVANIYA IDRIS', 'Perempuan', '30be5bc0f9eedd8c320f463fb88dffa1', 'NABILLAALMAVANIYAIDRIS@domain.com', 'unknown.png', 'siswa', 15),
(131410130, 'RATU ALDAMIA RAFISYAHDINI', 'Perempuan', 'f36130f8a8824570eae3d887b9ebce54', 'RATUALDAMIARAFISYAHDINI@domain.com', 'unknown.png', 'siswa', 15),
(131410131, 'REFRINA MADANI', 'Perempuan', '458e325e73a7f27a022174a09dcb40ea', 'REFRINAMADANI@domain.com', 'unknown.png', 'siswa', 15),
(131410132, 'RIDELLA SRINAVO', 'Perempuan', '56156da8db04b832686bc1437f65dee9', 'RIDELLASRINAVO@domain.com', 'unknown.png', 'siswa', 15),
(131410133, 'RIZKY YOGI BUDIANSYAH', 'Laki-Laki', '7724819429f4512cf90aa2ba4bdd3c79', 'RIZKYYOGIBUDIANSYAH@domain.com', 'unknown.png', 'siswa', 15),
(131410134, 'YOSELINA SINAGA', 'Perempuan', '947138393ae1a62c9ce756427d80252c', 'YOSELINASINAGA@domain.com', 'unknown.png', 'siswa', 15),
(131410135, 'A NIENDA PUTTI AYUDIYA', 'Perempuan', '4e0fd61bbd8763b73f7a0472c92229aa', 'ANIENDAPUTTIAYUDIYA@domain.com', 'unknown.png', 'siswa', 16),
(131410136, 'ALICIA RAHMA ROSA', 'Perempuan', '994d72744d8ca69e63ba792cb91960d3', 'ALICIARAHMAROSA@domain.com', 'unknown.png', 'siswa', 16),
(131410137, 'AMALIA FHITRI HASANAH', 'Perempuan', '07f5a5e3e29e79a57ca9a34c28bd6eb7', 'AMALIAFHITRIHASANAH@domain.com', 'unknown.png', 'siswa', 16),
(131410138, 'AMAN ABADI NUGRAHA', 'Laki-Laki', 'cd1f1318e3059b3b6b3230fdaf7ad483', 'AMANABADINUGRAHA@domain.com', 'unknown.png', 'siswa', 16),
(131410139, 'AZKA AGHNIA GHASSANI', 'Perempuan', 'd4716d9cef0c90fa08ebcdd69e24f158', 'AZKAAGHNIAGHASSANI@domain.com', 'unknown.png', 'siswa', 16),
(131410140, 'AZWARD NURFAUZAN', 'Laki-Laki', '8fb4d19b9bad1c8bb3cb131db473c4d2', 'AZWARDNURFAUZAN@domain.com', 'unknown.png', 'siswa', 16),
(131410141, 'DELLA SAPPHIRA GANDJAR', 'Perempuan', '8883efe37c4cd1c7d3b7c18a67ef62b7', 'DELLASAPPHIRAGANDJAR@domain.com', 'unknown.png', 'siswa', 16),
(131410143, 'DITA TRI KRESNAWATI', 'Perempuan', 'f4f9a3835bfa4fcfeb5cdd4d3df31f53', 'DITATRIKRESNAWATI@domain.com', 'unknown.png', 'siswa', 16),
(131410144, 'EKA MADYATI', 'Perempuan', '5dad82370bfc870a92d7ccf9a1061b68', 'EKAMADYATI@domain.com', 'unknown.png', 'siswa', 16),
(131410145, 'ERICKA RHAMADIANTY', 'Perempuan', '0e6df62fd5a1a66b33da662ff079dc23', 'ERICKARHAMADIANTY@domain.com', 'unknown.png', 'siswa', 16),
(131410146, 'ERISKA PRISCILIA HAMDANI SULTONI ROCHMAN', 'Perempuan', 'a0c083e21e7d0fc1c5cb020c215a4165', 'ERISKAPRISCILIAHAMDANISULTONIROCHMAN@domain.com', 'unknown.png', 'siswa', 16),
(131410147, 'FARHAN MUSYAFFA AHSAR', 'Laki-Laki', '1b8d1407ce2ff1822bab75d32e42a5bd', 'FARHANMUSYAFFAAHSAR@domain.com', 'unknown.png', 'siswa', 16),
(131410148, 'FATHIMAH AZZAHRO HASNI RIFAYANTI', 'Perempuan', 'ba61db88a2a419b8e9bbbfbf4d5f8e11', 'FATHIMAHAZZAHROHASNIRIFAYANTI@domain.com', 'unknown.png', 'siswa', 16),
(131410149, 'FAUZAN IBRAHIM', 'Laki-Laki', 'dd85bc4c4edaa575aaf9e09907eaf154', 'FAUZANIBRAHIM@domain.com', 'unknown.png', 'siswa', 16),
(131410150, 'FAWZAN WIDYA BRATA', 'Laki-Laki', 'ddf2962b8e64f9fe6001c2561d44b004', 'FAWZANWIDYABRATA@domain.com', 'unknown.png', 'siswa', 16),
(131410151, 'FEERDA FIRMANSYAH', 'Perempuan', '4e0303f2172cfb240d6b1e836a814be5', 'FEERDAFIRMANSYAH@domain.com', 'unknown.png', 'siswa', 16),
(131410152, 'INDAH SARASWATI DUHA', 'Perempuan', '88b0359ffadae6fcfe0123e48fc3e555', 'INDAHSARASWATIDUHA@domain.com', 'unknown.png', 'siswa', 16),
(131410153, 'IQNA KAFILA ASFARAINY', 'Perempuan', '411b15fd2778b7b946f09e23c35cdc86', 'IQNAKAFILAASFARAINY@domain.com', 'unknown.png', 'siswa', 16),
(131410154, 'JULIFIKA AULIA NUGROHO', 'Perempuan', 'e66faf50d1574b9a371cc3dce3b6d9a6', 'JULIFIKAAULIANUGROHO@domain.com', 'unknown.png', 'siswa', 16),
(131410155, 'MOCHAMAD RIDZKI ZULIANDINO', 'Laki-Laki', '90bd8f6c38260a816914edef3a0439a4', 'MOCHAMADRIDZKIZULIANDINO@domain.com', 'unknown.png', 'siswa', 16),
(131410156, 'MOHAMMAD IDRIS ASYRAF ALI', 'Laki-Laki', 'd5c1e9d9bd6d01325963dcb7b2c8e272', 'MOHAMMADIDRISASYRAFALI@domain.com', 'unknown.png', 'siswa', 16),
(131410157, 'MONICA DESSY PRILIANI', 'Perempuan', '4e0062372e2198891f0c9c857c11b454', 'MONICADESSYPRILIANI@domain.com', 'unknown.png', 'siswa', 16),
(131410158, 'MUHAMMAD KHANSA IRSYAD IRAWAN', 'Laki-Laki', '49f5bd3392836ca0c5df56082a4cf095', 'MUHAMMADKHANSAIRSYADIRAWAN@domain.com', 'unknown.png', 'siswa', 16),
(131410159, 'MUHAMMAD PATRICK RENATA', 'Laki-Laki', '28a6bcaf769cee0860b5d074bc20fa38', 'MUHAMMADPATRICKRENATA@domain.com', 'unknown.png', 'siswa', 16),
(131410160, 'NOVIA PUSPITA SARI', 'Perempuan', '62223b34663327dddc149d204747187f', 'NOVIAPUSPITASARI@domain.com', 'unknown.png', 'siswa', 16),
(131410161, 'NUR NOVYA INDRIANI', 'Perempuan', '84f61c9cd4b56b11c969694e6c4bfc36', 'NURNOVYAINDRIANI@domain.com', 'unknown.png', 'siswa', 16),
(131410162, 'PRAMBANDANTY POETRI IRNANDY', 'Perempuan', '3e615b5f1902df24c551a680c0d9c9db', 'PRAMBANDANTYPOETRIIRNANDY@domain.com', 'unknown.png', 'siswa', 16),
(131410163, 'RADEN FIRRA FARHANAH KHAIRUNNISA', 'Perempuan', 'a085987918fa6847877b16c24af73591', 'RADENFIRRAFARHANAHKHAIRUNNISA@domain.com', 'unknown.png', 'siswa', 16),
(131410164, 'RAHMADHIKA PUTRA SOMANTRI', 'Laki-Laki', 'b20bed2f731b0c81f7c5382a4d35c744', 'RAHMADHIKAPUTRASOMANTRI@domain.com', 'unknown.png', 'siswa', 16),
(131410165, 'RAHMADITHA PRABANDARI', 'Perempuan', '0c08e9e515d42716211e1c1ca3740ee9', 'RAHMADITHAPRABANDARI@domain.com', 'unknown.png', 'siswa', 16),
(131410166, 'RHEINANDA AWLIYA AGISTA', 'Perempuan', '86b9145204a7477c516f8eb7b65351f7', 'RHEINANDAAWLIYAAGISTA@domain.com', 'unknown.png', 'siswa', 16),
(131410167, 'RIFQY NAUFAL FIRDAUS', 'Laki-Laki', 'e868726eccb683298908250ae4cd294a', 'RIFQYNAUFALFIRDAUS@domain.com', 'unknown.png', 'siswa', 16),
(131410168, 'SASKIA TEJA WIDYA', 'Perempuan', '4387b095c4a6a507336cdc2d309fa9c0', 'SASKIATEJAWIDYA@domain.com', 'unknown.png', 'siswa', 16),
(131410169, 'TRYSAKTI RUSLAN AKBAR', 'Laki-Laki', '680b9e23d4870252557c8f1ed816831a', 'TRYSAKTIRUSLANAKBAR@domain.com', 'unknown.png', 'siswa', 16),
(131410170, 'VINNA AULIA YULINAR', 'Perempuan', '8a3eada48e64aee434e97f6b7f09ff66', 'VINNAAULIAYULINAR@domain.com', 'unknown.png', 'siswa', 16),
(131410171, 'AFINA MUTHI FATHARANI', 'Perempuan', 'ee30f9f1d250b137974ed375bda46241', 'AFINAMUTHIFATHARANI@domain.com', 'unknown.png', 'siswa', 17),
(131410172, 'ALFIN SALIM', 'Laki-Laki', '5a5b9f2bb3cd6d06c13a6c9663015084', 'ALFINSALIM@domain.com', 'unknown.png', 'siswa', 17),
(131410173, 'ANJASMORO BANGUN PANGESTU', 'Laki-Laki', '2aaca5142dd7e98003d102cf05e2f26f', 'ANJASMOROBANGUNPANGESTU@domain.com', 'unknown.png', 'siswa', 17),
(131410174, 'ARIEF DANIANTO', 'Laki-Laki', '0fce230e1b1ee3fae7c2e2b8ee0fd1d6', 'ARIEFDANIANTO@domain.com', 'unknown.png', 'siswa', 17),
(131410175, 'CINDY PERMANIK', 'Perempuan', '4ed15545a252b65edc9f7c020a80f5a8', 'CINDYPERMANIK@domain.com', 'unknown.png', 'siswa', 17),
(131410176, 'DHARMA ANGGARA', 'Laki-Laki', 'f5555ae52bf8f8337a72f3fb7441056a', 'DHARMAANGGARA@domain.com', 'unknown.png', 'siswa', 17),
(131410177, 'DHIA HANA MERWITRA', 'Perempuan', 'ed90a7154a7093b8a3707e36794be257', 'DHIAHANAMERWITRA@domain.com', 'unknown.png', 'siswa', 17),
(131410178, 'DIMAS BAYU PERMANA', 'Laki-Laki', 'a926f71b685d9d530e206b254e234969', 'DIMASBAYUPERMANA@domain.com', 'unknown.png', 'siswa', 17),
(131410179, 'EKO BUDI SULISTYO', 'Laki-Laki', '3695c15d2e4e225f10dfa04e8e8e3b7d', 'EKOBUDISULISTYO@domain.com', 'unknown.png', 'siswa', 17),
(131410180, 'FADIAH ASHFAHANI ARIFAH', 'Perempuan', 'f84cdc0b34973eabd62efab8edcd0ee3', 'FADIAHASHFAHANIARIFAH@domain.com', 'unknown.png', 'siswa', 17),
(131410182, 'JULIANNE FILADELFIA IMELSI', 'Perempuan', 'c25d9d65d037a954f70afe72f388655d', 'JULIANNEFILADELFIAIMELSI@domain.com', 'unknown.png', 'siswa', 17),
(131410183, 'MASIIKAH SALSABILA', 'Perempuan', '62034ef13cb372914986dd983dc57dca', 'MASIIKAHSALSABILA@domain.com', 'unknown.png', 'siswa', 17),
(131410184, 'MUHAMAD JOFRAN ANGGRAPUTRA S', 'Laki-Laki', '8e41f50fd6cab8e75c47cf36facbea92', 'MUHAMADJOFRANANGGRAPUTRAS@domain.com', 'unknown.png', 'siswa', 17),
(131410186, 'NAURA SALSABILA TAMI', 'Perempuan', '0ec9c2aceccc9a8323b703d8709cf4e6', 'NAURASALSABILATAMI@domain.com', 'unknown.png', 'siswa', 17),
(131410187, 'RAHADIANTI NUGRAHA', 'Perempuan', '48bed98241853243fcb0e5c85548a94f', 'RAHADIANTINUGRAHA@domain.com', 'unknown.png', 'siswa', 17),
(131410188, 'RAKA RACHMANKA', 'Laki-Laki', '2e283f2870ffb8726485a131e49b3d4a', 'RAKARACHMANKA@domain.com', 'unknown.png', 'siswa', 17),
(131410189, 'RANDYASTA ADIPRATAMA', 'Laki-Laki', '82a8c6bb40e5f4b86a777b0553d4aab5', 'RANDYASTAADIPRATAMA@domain.com', 'unknown.png', 'siswa', 17),
(131410190, 'REKA NIA KHUSNUL NISYA', 'Perempuan', '013a9612ef7b808bfe28cab66be6fade', 'REKANIAKHUSNULNISYA@domain.com', 'unknown.png', 'siswa', 17),
(131410191, 'REZA NOVITRIANINGRUM', 'Perempuan', 'f8b3617e15a5b9c8e00255d3bc5220d2', 'REZANOVITRIANINGRUM@domain.com', 'unknown.png', 'siswa', 17),
(131410192, 'RICKY SIMBOLON', 'Laki-Laki', '72e07282de8cfe402caab155c7c7aab1', 'RICKYSIMBOLON@domain.com', 'unknown.png', 'siswa', 17),
(131410193, 'RIFQY ADHI PRATAMA', 'Laki-Laki', 'cb9cd73ced33803f8160b34aad9b2d90', 'RIFQYADHIPRATAMA@domain.com', 'unknown.png', 'siswa', 17),
(131410194, 'RIVA FATIMAH AZZAHRA DJUHARA', 'Perempuan', 'fff8f3363165ba18ac0e860d0a2cd14b', 'RIVAFATIMAHAZZAHRADJUHARA@domain.com', 'unknown.png', 'siswa', 17),
(131410195, 'RIZKIA FERISKA', 'Perempuan', '1b24b5762972a5b5d20805dd70b6358e', 'RIZKIAFERISKA@domain.com', 'unknown.png', 'siswa', 17),
(131410196, 'RIZKY ADITYA NUGRAHA', 'Laki-Laki', '232741a5dac4badfbfa293119160c0e0', 'RIZKYADITYANUGRAHA@domain.com', 'unknown.png', 'siswa', 17),
(131410197, 'RIZKY FADHILA PUTRA', 'Laki-Laki', '109b9e7a204cde61efe4c12bd9c848e8', 'RIZKYFADHILAPUTRA@domain.com', 'unknown.png', 'siswa', 17),
(131410199, 'SALMA SEPINA NURDINI', 'Perempuan', 'fd1627649613cc9d0259a13d55b9d085', 'SALMASEPINANURDINI@domain.com', 'unknown.png', 'siswa', 17),
(131410200, 'SEPTIANE LATHIFAH', 'Perempuan', 'f83486b785d79c18bbe7795d4cbfbc35', 'SEPTIANELATHIFAH@domain.com', 'unknown.png', 'siswa', 17),
(131410201, 'SHAOMI PUTRI ALDYANI', 'Perempuan', 'c61ebae7ee58830aeb2d158cbb05b810', 'SHAOMIPUTRIALDYANI@domain.com', 'unknown.png', 'siswa', 17),
(131410202, 'SILMI NABILAH', 'Perempuan', '4758381cd872c597d671e3b1ce6e8092', 'SILMINABILAH@domain.com', 'unknown.png', 'siswa', 17),
(131410203, 'SINTIA MUSTOPA', 'Perempuan', '4c6ad9eb618c979723eefe7b933b7400', 'SINTIAMUSTOPA@domain.com', 'unknown.png', 'siswa', 17),
(131410204, 'VEGA SATRIA PERDANA', 'Laki-Laki', '7b5e05da55349fe3789d5a2e280da57d', 'VEGASATRIAPERDANA@domain.com', 'unknown.png', 'siswa', 17),
(131410205, 'ZULKIFLI GUMILANG RAHAYU', 'Laki-Laki', 'e0c3e5868ca637a69b8bd96feb668798', 'ZULKIFLIGUMILANGRAHAYU@domain.com', 'unknown.png', 'siswa', 17),
(131410206, 'ABDILLAH RAHMAN AT TAMAAMI', 'Laki-Laki', '16a646b9d1986fe053095bf7137df2c8', 'ABDILLAHRAHMANATTAMAAMI@domain.com', 'unknown.png', 'siswa', 18),
(131410207, 'ADNAN ZAIDI', 'Laki-Laki', 'ad1338e9acd6049d0a74d692e80f107e', 'ADNANZAIDI@domain.com', 'unknown.png', 'siswa', 18),
(131410208, 'ADRIAN DWIHANDIANA MUH', 'Laki-Laki', '855d72d7aecb731b54007e3d21349361', 'ADRIANDWIHANDIANAMUH@domain.com', 'unknown.png', 'siswa', 18),
(131410209, 'AFINA PUTRI INDRIANI', 'Perempuan', '9eb17885a024517f73f8ac2b40bd9fbb', 'AFINAPUTRIINDRIANI@domain.com', 'unknown.png', 'siswa', 18),
(131410210, 'AINA SHALIHA', 'Perempuan', '494414f3b0e907c158e9a0b9dec9810f', 'AINASHALIHA@domain.com', 'unknown.png', 'siswa', 18),
(131410211, 'ALIFIA SYIFA ANNISA FEBRIANTI', 'Perempuan', '5ac855cad054d044c2d328413abedf32', 'ALIFIASYIFAANNISAFEBRIANTI@domain.com', 'unknown.png', 'siswa', 18),
(131410213, 'ANNISA NURUL HUDA', 'Perempuan', 'e5a6e2323e415b08628c65cc902e4ed9', 'ANNISANURULHUDA@domain.com', 'unknown.png', 'siswa', 18),
(131410214, 'ANNISA REZKY SURYA IKHWANINGRUM', 'Perempuan', '2a8311fd814a27dbe4d6ed69b60c90fc', 'ANNISAREZKYSURYAIKHWANINGRUM@domain.com', 'unknown.png', 'siswa', 18),
(131410215, 'DEVI OKTAVIANY', 'Perempuan', '716a3130c0251b37168be138d01b2fa2', 'DEVIOKTAVIANY@domain.com', 'unknown.png', 'siswa', 18),
(131410216, 'ELZALITA MARAYA', 'Perempuan', '67642bd03e330bf39af9e0d790352784', 'ELZALITAMARAYA@domain.com', 'unknown.png', 'siswa', 18),
(131410217, 'FARIS RIFQI FAKHRUDIN', 'Laki-Laki', '688f763c15df33285aa21e8269e734ed', 'FARISRIFQIFAKHRUDIN@domain.com', 'unknown.png', 'siswa', 18),
(131410218, 'FARRA SYAKILA BALQIS', 'Perempuan', 'e5a63ed3df58acff4345af8a3f2693e5', 'FARRASYAKILABALQIS@domain.com', 'unknown.png', 'siswa', 18),
(131410219, 'FATIMAH AFIATIN MUTHMAINNAH', 'Perempuan', '244c862211d2379869d8dacb7fe0ab81', 'FATIMAHAFIATINMUTHMAINNAH@domain.com', 'unknown.png', 'siswa', 18),
(131410221, 'GHITHA SILMI RACHMANI', 'Perempuan', 'cee734e2c6fb56521d5f4d18e2a22b10', 'GHITHASILMIRACHMANI@domain.com', 'unknown.png', 'siswa', 18),
(131410222, 'GINA HARDINA', 'Perempuan', '7c227ce42f7d4c813be4a05540ec39f5', 'GINAHARDINA@domain.com', 'unknown.png', 'siswa', 18),
(131410223, 'JIHAN PUTRI AZZAHRA', 'Perempuan', '3c6eb02650087157659c9d408e2b64ee', 'JIHANPUTRIAZZAHRA@domain.com', 'unknown.png', 'siswa', 18),
(131410224, 'JUANITA MARCHELLA', 'Perempuan', '780cc0d4af476b901ac45e8220f1ad30', 'JUANITAMARCHELLA@domain.com', 'unknown.png', 'siswa', 18),
(131410225, 'KHAIDIR FAJRI RAMADAN', 'Laki-Laki', '1cb077ad10f372d333b5709d9e601725', 'KHAIDIRFAJRIRAMADAN@domain.com', 'unknown.png', 'siswa', 18),
(131410226, 'LISYIANA ANGGUN BUDININGRAT', 'Perempuan', '01d1849e33442ddc33346ecfec34245e', 'LISYIANAANGGUNBUDININGRAT@domain.com', 'unknown.png', 'siswa', 18),
(131410227, 'LITA RAHMA ARYATI', 'Perempuan', '633d0464f3f907a6c1923bb9aab49e66', 'LITARAHMAARYATI@domain.com', 'unknown.png', 'siswa', 18),
(131410228, 'MUHAMMAD FAZAR AZRY YUSLIWAN', 'Laki-Laki', 'b6af6f74ec4051299522445187f6bb6b', 'MUHAMMADFAZARAZRYYUSLIWAN@domain.com', 'unknown.png', 'siswa', 18),
(131410229, 'PUTRI SIFA FAUJIAH', 'Perempuan', 'a042ebacffae2d83312ae409262eb15e', 'PUTRISIFAFAUJIAH@domain.com', 'unknown.png', 'siswa', 18),
(131410230, 'RADEN AYU RAUDHAH NURJANNAH', 'Perempuan', '84829c11cbe593e726162596b0037444', 'RADENAYURAUDHAHNURJANNAH@domain.com', 'unknown.png', 'siswa', 18),
(131410231, 'REFVA SEPTIANSYAH', 'Laki-Laki', 'd93d6d800257df5333ccac86de057fa7', 'REFVASEPTIANSYAH@domain.com', 'unknown.png', 'siswa', 19),
(131410232, 'RIJAL ABDULHAKIM', 'Laki-Laki', '1ad33cd111c8748c9f07f3cc5a9f4264', 'RIJALABDULHAKIM@domain.com', 'unknown.png', 'siswa', 18),
(131410233, 'RISMA NOVERIA', 'Perempuan', 'f35e813f3f1e0dbf8a121f4432ac1848', 'RISMANOVERIA@domain.com', 'unknown.png', 'siswa', 18),
(131410234, 'RIZQA RAMADHANI TRISFALIA', 'Perempuan', 'b5c07f2ae4c556e405e18a1b1925140e', 'RIZQARAMADHANITRISFALIA@domain.com', 'unknown.png', 'siswa', 18),
(131410235, 'SANJAYA MARTADIPRAJA', 'Laki-Laki', '62894025f761defd911492482dc2285d', 'SANJAYAMARTADIPRAJA@domain.com', 'unknown.png', 'siswa', 18),
(131410236, 'TAUFIK ACHMAD CIPTADI', 'Laki-Laki', '4cc8135dcfe4616abf792082b06f548d', 'TAUFIKACHMADCIPTADI@domain.com', 'unknown.png', 'siswa', 18),
(131410237, 'YUDHITIA ALIFA ADRIANE PUTRI', 'Perempuan', 'd635f77e2514dec76e95f633136329cc', 'YUDHITIAALIFAADRIANEPUTRI@domain.com', 'unknown.png', 'siswa', 18),
(131410238, 'ADE RAZAB', 'Laki-Laki', '42ab7255c18ebd00dd4b623c2aed71ef', 'ADERAZAB@domain.com', 'unknown.png', 'siswa', 19),
(131410239, 'ANASTASYA EMMANUELLE C.E', 'Perempuan', '661a2f9b5ec9dc732fbadcf1623d6ace', 'ANASTASYAEMMANUELLEC.E@domain.com', 'unknown.png', 'siswa', 19),
(131410240, 'ARISTYANA KHUSNUL KHOTIMAH', 'Laki-Laki', '7207b17d91774f55901aff5bff59368e', 'ARISTYANAKHUSNULKHOTIMAH@domain.com', 'unknown.png', 'siswa', 19),
(131410241, 'DEDY ABDUL AZIZ', 'Laki-Laki', '975712951e0891046da29457faf0011c', 'DEDYABDULAZIZ@domain.com', 'unknown.png', 'siswa', 19),
(131410242, 'DIANA CRISTIANTI', 'Perempuan', '58619f3b4ae1cea189b4734834ad20ea', 'DIANACRISTIANTI@domain.com', 'unknown.png', 'siswa', 19),
(131410243, 'FADHILA KHAIRANI', 'Perempuan', 'cb31fcabb296415856262e4f4a32d99d', 'FADHILAKHAIRANI@domain.com', 'unknown.png', 'siswa', 19),
(131410244, 'GHINAYATI RODHIYATU ALIYA', 'Perempuan', '24cbe13c724d2344c2a56696e1c63e99', 'GHINAYATIRODHIYATUALIYA@domain.com', 'unknown.png', 'siswa', 19),
(131410245, 'GINA GEGANA SALEHA', 'Perempuan', '69d9b2ce7cad506cb1b76870e1284e05', 'GINAGEGANASALEHA@domain.com', 'unknown.png', 'siswa', 19),
(131410246, 'GITHA RIZQIA RACHMATIKA', 'Perempuan', 'dc43baf9d7746d6495f4acf5c3655d55', 'GITHARIZQIARACHMATIKA@domain.com', 'unknown.png', 'siswa', 19),
(131410247, 'GREDI TEGAR MANDIRI', 'Laki-Laki', 'ef15ea55c405ae5a3f035edd752acd87', 'GREDITEGARMANDIRI@domain.com', 'unknown.png', 'siswa', 19),
(131410248, 'HAFIDZ FATWA HADYANTO', 'Laki-Laki', '62c7bd301b3477d96b1a9b058be083aa', 'HAFIDZFATWAHADYANTO@domain.com', 'unknown.png', 'siswa', 19),
(131410249, 'IBRAHIM AL FARIZI', 'Laki-Laki', '6e86432113abe27cb22852df934198cc', 'IBRAHIMALFARIZI@domain.com', 'unknown.png', 'siswa', 19),
(131410250, 'KANIA DEWI', 'Perempuan', 'dd6ec8814ddfe1cfd686d5458889234a', 'KANIADEWI@domain.com', 'unknown.png', 'siswa', 19),
(131410251, 'KRISTIN MONIKA', 'Perempuan', '9a6f989ef7e88b447aebd2c9e91e2ae0', 'KRISTINMONIKA@domain.com', 'unknown.png', 'siswa', 19),
(131410252, 'LARAS HIJRIYANI', 'Perempuan', '610f0bac109e83a1e83970964116102c', 'LARASHIJRIYANI@domain.com', 'unknown.png', 'siswa', 19),
(131410253, 'LATIFAH HERLYANI', 'Perempuan', '05f89f867028fbb477d3e4e32e0fcd04', 'LATIFAHHERLYANI@domain.com', 'unknown.png', 'siswa', 19),
(131410254, 'LUTFI NAUFAL AZHAR', 'Laki-Laki', 'a2016c172d08ba68f140cf7da0796dc8', 'LUTFINAUFALAZHAR@domain.com', 'unknown.png', 'siswa', 19),
(131410255, 'MILDY OCEANI', 'Perempuan', '81ceb41e98abf90c518f318902b8013f', 'MILDYOCEANI@domain.com', 'unknown.png', 'siswa', 19),
(131410256, 'MOCH. GERRY GOVINDA', 'Laki-Laki', '990dc71d0904b8f57f56bd4360f59a77', 'MOCH.GERRYGOVINDA@domain.com', 'unknown.png', 'siswa', 19),
(131410257, 'MUHAMAD ARIF DHIâ€™FAN S.', 'Laki-Laki', 'ed064d404303a1a2383859748f06ffb2', 'MUHAMADARIFDHIâ€™FANS.@domain.com', 'unknown.png', 'siswa', 19),
(131410258, 'MUHAMMAD FATHAN MUBINA', 'Laki-Laki', 'f84e89f6fe2839d40025a061b2ef106a', 'MUHAMMADFATHANMUBINA@domain.com', 'unknown.png', 'siswa', 19),
(131410259, 'MUHAMMAD NAUFAL ABDURRAHMAN', 'Laki-Laki', 'ed38c6d9d34d045d59e3fe9f7f2d9848', 'MUHAMMADNAUFALABDURRAHMAN@domain.com', 'unknown.png', 'siswa', 19),
(131410260, 'MUHAMMAD RIZKY MAULANA', 'Laki-Laki', 'df395e620cf7f6bb0adb52aa21d2933e', 'MUHAMMADRIZKYMAULANA@domain.com', 'unknown.png', 'siswa', 19),
(131410261, 'NABILLA RATU FALYA ALIVANISA', 'Perempuan', 'e34ea3a304c85b9939d55a0d9caacf78', 'NABILLARATUFALYAALIVANISA@domain.com', 'unknown.png', 'siswa', 19),
(131410262, 'NADHIFAH KHAERUNISA', 'Perempuan', '51b05dd2d0fd22fc03fbb133ec1a7c3f', 'NADHIFAHKHAERUNISA@domain.com', 'unknown.png', 'siswa', 19),
(131410263, 'RADEN RORO ELVIN NEZA SANTARI', 'Perempuan', '43d87cf3267aa266f9785f02413d4e84', 'RADENROROELVINNEZASANTARI@domain.com', 'unknown.png', 'siswa', 19),
(131410264, 'REKSA ADITYA', 'Laki-Laki', 'de4bb4ccd8a45769d4dcb292aeb755fd', 'REKSAADITYA@domain.com', 'unknown.png', 'siswa', 19),
(131410265, 'REZA MUHAMAD SYARIF F.', 'Laki-Laki', 'e28fa955f879706d459672b407743a46', 'REZAMUHAMADSYARIFF.@domain.com', 'unknown.png', 'siswa', 19),
(131410266, 'RICKY SETIAWAN', 'Laki-Laki', '3dd3c6db591ad2af3ff539bc0e34f9b1', 'RICKYSETIAWAN@domain.com', 'unknown.png', 'siswa', 19),
(131410267, 'RIFA MUTIARA', 'Perempuan', 'c915c4eda328d4171a69896f9a57c97f', 'RIFAMUTIARA@domain.com', 'unknown.png', 'siswa', 19),
(131410268, 'SAEPUL ROHMAN', 'Laki-Laki', '3b815f9d6ee71c30fd3e8061c94e3627', 'SAEPULROHMAN@domain.com', 'unknown.png', 'siswa', 19),
(131410269, 'SINTHIA HENDRIANI', 'Perempuan', 'a9f056ea55d4bd281892a2742ca4eed6', 'SINTHIAHENDRIANI@domain.com', 'unknown.png', 'siswa', 19),
(131410270, 'SYARA SHAVIRA BILLAH', 'Perempuan', 'c6eedffe8e0428fe3e371eaa68eb4036', 'SYARASHAVIRABILLAH@domain.com', 'unknown.png', 'siswa', 19),
(131410271, 'TANIA CLARISSA ADJIE', 'Perempuan', 'cef1b763f96577aa1a29003d3df4d29a', 'TANIACLARISSAADJIE@domain.com', 'unknown.png', 'siswa', 19),
(131410272, 'TIARA RAWI MARIANI', 'Perempuan', 'd3132d9a79bb2642c3428ba7cf02993b', 'TIARARAWIMARIANI@domain.com', 'unknown.png', 'siswa', 19),
(131410273, 'VIRA ROSALIA DHARMAWAN', 'Perempuan', '12ac033b95cc5e2d5180e0efd56e503e', 'VIRAROSALIADHARMAWAN@domain.com', 'unknown.png', 'siswa', 19),
(131410274, 'YOSI ERDIANI', 'Perempuan', 'd09b0be626aee704a3400894bab90f65', 'YOSIERDIANI@domain.com', 'unknown.png', 'siswa', 19),
(131410275, 'YUDA OCTAPIANA', 'Laki-Laki', '30d28b26153586d6309ee669c0ea2e6b', 'YUDAOCTAPIANA@domain.com', 'unknown.png', 'siswa', 19),
(131410276, 'YUDISTYA PUTRA DENIS', 'Laki-Laki', '90a2d9de833892412fb7bef610c05db7', 'YUDISTYAPUTRADENIS@domain.com', 'unknown.png', 'siswa', 19),
(131410278, 'ANNISA PERMATA SARI', 'Perempuan', '326f6e2d9f17e2a85ee60f3aa0b31195', 'ANNISAPERMATASARI@domain.com', 'unknown.png', 'siswa', 20),
(131410279, 'BAGUS GIVARI TRIMUNARDI', 'Laki-Laki', 'babf1846a2b7546dc015a24af93e4ab0', 'BAGUSGIVARITRIMUNARDI@domain.com', 'unknown.png', 'siswa', 20),
(131410280, 'CITRA ACHMALLIYAH', 'Perempuan', 'ab0f8fe4fb981a63c4ab2b9648794f9a', 'CITRAACHMALLIYAH@domain.com', 'unknown.png', 'siswa', 20),
(131410281, 'DARA LUMMA VIOLLA', 'Perempuan', '99bad0e7f2f2d1e29c744a2d4dace00a', 'DARALUMMAVIOLLA@domain.com', 'unknown.png', 'siswa', 20),
(131410282, 'DEVI SEPTIANI', 'Perempuan', 'e353ee876a3577acb470eaf1c947ba2f', 'DEVISEPTIANI@domain.com', 'unknown.png', 'siswa', 20),
(131410283, 'GIANLUIGI VIEIRA IRAWAN', 'Laki-Laki', '98732dde3bbc0a802b7980980cc9f5c1', 'GIANLUIGIVIEIRAIRAWAN@domain.com', 'unknown.png', 'siswa', 20),
(131410284, 'HARIER FATHNAN FAZAR FIRDAUS', 'Laki-Laki', '93eab919f93468b2c7d2298f54c8b9fd', 'HARIERFATHNANFAZARFIRDAUS@domain.com', 'unknown.png', 'siswa', 20),
(131410285, 'I GUSTI NGURAH SURYA', 'Laki-Laki', 'c15d2b0a4dfa8c9183bd38f889e43a19', 'IGUSTINGURAHSURYA@domain.com', 'unknown.png', 'siswa', 20),
(131410286, 'KHATHAYA IZZATI', 'Perempuan', 'a551ad8464d6dad9908925619b573ef4', 'KHATHAYAIZZATI@domain.com', 'unknown.png', 'siswa', 20),
(131410287, 'M. ALDY APRIANSYAH KAMAL', 'Laki-Laki', 'ee2decba29211cddd4d5a64ef8bd0215', 'M.ALDYAPRIANSYAHKAMAL@domain.com', 'unknown.png', 'siswa', 20),
(131410288, 'MELISSA ', 'Perempuan', 'b68bf688933a6cd1277452d888ea9cc2', 'MELISSA@domain.com', 'unknown.png', 'siswa', 20),
(131410289, 'MUHAMMAD FARIS', 'Laki-Laki', 'aa79a10910f251e17d657672c2bac33b', 'MUHAMMADFARIS@domain.com', 'unknown.png', 'siswa', 20),
(131410290, 'MUHAMMAD PRINGGODIGDO', 'Laki-Laki', 'c3ceeb8c8d56649708dee4bfeabc08f9', 'MUHAMMADPRINGGODIGDO@domain.com', 'unknown.png', 'siswa', 20),
(131410291, 'NISYA FEBIANA', 'Perempuan', 'ea4537cc6c5b73c4c251d27ed5fedb2f', 'NISYAFEBIANA@domain.com', 'unknown.png', 'siswa', 20),
(131410292, 'NOVA ADELIA KINANTI', 'Perempuan', '7350027ef22cbf53af325e37ef5bc43a', 'NOVAADELIAKINANTI@domain.com', 'unknown.png', 'siswa', 20),
(131410293, 'NOVIA WULAN PUTRI', 'Perempuan', '7e0ca05b2b9041ebd748c2595cfef374', 'NOVIAWULANPUTRI@domain.com', 'unknown.png', 'siswa', 20),
(131410294, 'NUGRA WAGHE WASISTHA', 'Laki-Laki', 'b4fad82719f79c75da56d4413153f6ea', 'NUGRAWAGHEWASISTHA@domain.com', 'unknown.png', 'siswa', 20),
(131410295, 'NUR RAHMA', 'Perempuan', 'b38ee2bbfbff4d0b827020684dfae7aa', 'NURRAHMA@domain.com', 'unknown.png', 'siswa', 20),
(131410297, 'RADEN SYIFA DEWI MAYANGSARI', 'Perempuan', '9c0c15f78f9543426cf37cbd73fd237b', 'RADENSYIFADEWIMAYANGSARI@domain.com', 'unknown.png', 'siswa', 20),
(131410298, 'RAGIL ARIE RAHARJO', 'Laki-Laki', 'e47463a3371008ab54a1b51ecd5d2708', 'RAGILARIERAHARJO@domain.com', 'unknown.png', 'siswa', 20),
(131410299, 'RESTY RIZKIYA SEPTIYANI', 'Perempuan', 'e3e35b169cc094e60f37a8da077113c0', 'RESTYRIZKIYASEPTIYANI@domain.com', 'unknown.png', 'siswa', 20),
(131410300, 'REZKY SANGGA', 'Laki-Laki', 'f763b472bccda36a04395b98afcaf931', 'REZKYSANGGA@domain.com', 'unknown.png', 'siswa', 20),
(131410301, 'RULLY REYNALDI', 'Laki-Laki', '038dc4a733e33963b0ec4287e0f64639', 'RULLYREYNALDI@domain.com', 'unknown.png', 'siswa', 20),
(131410302, 'SALMA SALSABILA SURYADI', 'Perempuan', '6b81ab11013876ed2d94e3d678edfce7', 'SALMASALSABILASURYADI@domain.com', 'unknown.png', 'siswa', 20),
(131410303, 'SAVA TRIDINA PUTRI', 'Perempuan', 'cd94748661d74b18926f803c6d801f6e', 'SAVATRIDINAPUTRI@domain.com', 'unknown.png', 'siswa', 20),
(131410304, 'SHAFIRA ANINDIA NUR LATIFAH', 'Perempuan', '6373785fe082bc1147ee92aff38a7f1e', 'SHAFIRAANINDIANURLATIFAH@domain.com', 'unknown.png', 'siswa', 20),
(131410305, 'SHANIA ARIQ CHINDRARIANIE', 'Perempuan', '35001af0ed173d194c9cc32d441746d7', 'SHANIAARIQCHINDRARIANIE@domain.com', 'unknown.png', 'siswa', 20),
(131410306, 'SHANIA DARA SHAFIRA', 'Perempuan', 'ef7934878640e1426b3d6f509af4bce2', 'SHANIADARASHAFIRA@domain.com', 'unknown.png', 'siswa', 20),
(131410307, 'SHIILA ALIYA K', 'Perempuan', '493e2a2732bcbba129243cd6cf818803', 'SHIILAALIYAK@domain.com', 'unknown.png', 'siswa', 20),
(131410308, 'SYIFA SALMAJATUN AINI', 'Perempuan', 'dff53f8382fad4ece604c4a43f1c9932', 'SYIFASALMAJATUNAINI@domain.com', 'unknown.png', 'siswa', 20),
(131410309, 'T. MHD. RADYZA DIPASHA', 'Laki-Laki', 'bdd8db19952c2f5f1726057b6fe3edca', 'T.MHD.RADYZADIPASHA@domain.com', 'unknown.png', 'siswa', 20),
(131410310, 'WITA SEPTYANI', 'Perempuan', '9b38427f4bbacb0e3bef487b17318f3c', 'WITASEPTYANI@domain.com', 'unknown.png', 'siswa', 20),
(131410311, 'ZAHRA PUTRI NABILLA', 'Perempuan', '744a0a376fe1e99987cf60fe2e5a2a7a', 'ZAHRAPUTRINABILLA@domain.com', 'unknown.png', 'siswa', 20),
(131411313, 'NADYA SAVIRA CHAERANI', 'Perempuan', 'c7761c989b0f9a6ce82a3c881ddbaa41', 'NADYASAVIRACHAERANI@domain.com', 'unknown.png', 'siswa', 28),
(131411315, 'SHERLY KURNIA BUANA', 'Perempuan', '24005ae41ea3e529cb17f892610f4d66', 'SHERLYKURNIABUANA@domain.com', 'unknown.png', 'siswa', 29),
(131411316, 'ALMANETTA RAHMANDA PUTRI KOMARA', 'Perempuan', '6cc7bcda1fa6579f697cbcb8c4c87503', 'ALMANETTARAHMANDAPUTRIKOMARA@domain.com', 'unknown.png', 'siswa', 30),
(141510001, 'AGNITA FITRIANI', 'Perempuan', 'e6efb1a6cedcd14eba9c3a3838318913', 'AGNITAFITRIANI@domain.com', 'unknown.png', 'siswa', 1),
(141510002, 'AUDREY SYAHADA', 'Perempuan', 'a0057704947eee4950a71e7ad93433f0', 'AUDREYSYAHADA@domain.com', 'unknown.png', 'siswa', 1),
(141510003, 'AULIA KHAFIYAN NADILA', 'Perempuan', '5d0ac9dbbe193aa133aa7b32ac60abc6', 'AULIAKHAFIYANNADILA@domain.com', 'unknown.png', 'siswa', 1),
(141510004, 'BURHAN FAUZAN', 'Laki-Laki', '549437a5960180adb0bc2c76bbce8d7a', 'BURHANFAUZAN@domain.com', 'unknown.png', 'siswa', 1),
(141510005, 'DANIEL PONTAS ', 'Laki-Laki', '1894cc6b79983d783de74751ad5e6308', 'DANIELPONTAS@domain.com', 'unknown.png', 'siswa', 1),
(141510006, 'DIAH CITRADEWI', 'Perempuan', 'f6aebf7dfd9166acb6e3c7c75abce74c', 'DIAHCITRADEWI@domain.com', 'unknown.png', 'siswa', 1),
(141510007, 'DIKA ZAHRAN ANARGYA', 'Laki-Laki', '7e899ac8bdb9df7a0a08ac83b4577eab', 'DIKAZAHRANANARGYA@domain.com', 'unknown.png', 'siswa', 1),
(141510008, 'HANIFA NURUL HANA', 'Perempuan', '29519d28132eb995e7d6779167bbc0ba', 'HANIFANURULHANA@domain.com', 'unknown.png', 'siswa', 1),
(141510009, 'JESSICA APRILINDA', 'Perempuan', '3d2ad5a7c51f38ad2e8b7b6744af3669', 'JESSICAAPRILINDA@domain.com', 'unknown.png', 'siswa', 1),
(141510010, 'MUHAMAD RENALDI AULIA', 'Laki-Laki', 'e1db63644087167c7ee31c6749053fd0', 'MUHAMADRENALDIAULIA@domain.com', 'unknown.png', 'siswa', 1),
(141510011, 'NABILA SRI MUFIDAH', 'Perempuan', '05fb51e959608d3f9a19dfd81d536cd5', 'NABILASRIMUFIDAH@domain.com', 'unknown.png', 'siswa', 1),
(141510012, 'NURAHMAN AL FAIZ', 'Perempuan', '90a62a89685beaedeeba5e019967f45f', 'NURAHMANALFAIZ@domain.com', 'unknown.png', 'siswa', 1),
(141510013, 'RAHEL YUNI ARTA SAMOSIR', 'Perempuan', '7751eabd21b1fce22326c097e72b32d5', 'RAHELYUNIARTASAMOSIR@domain.com', 'unknown.png', 'siswa', 1),
(141510014, 'RENA MELATI FADLILLAH', 'Perempuan', '1b4554a8fdba8004742fd37b3a421b6a', 'RENAMELATIFADLILLAH@domain.com', 'unknown.png', 'siswa', 1),
(141510015, 'RENI RENITA', 'Perempuan', 'a03631c7b1145e8f3389fbeae3cb13d2', 'RENIRENITA@domain.com', 'unknown.png', 'siswa', 1),
(141510016, 'RESSA FEBBIL HURUMMAQSHURAT', 'Perempuan', '45c71a7d27028a46ecdbf3afef0813a4', 'RESSAFEBBILHURUMMAQSHURAT@domain.com', 'unknown.png', 'siswa', 1),
(141510017, 'REZA REYNALDI', 'Laki-Laki', 'a4567629f281e8b6ace9d51faa1163d3', 'REZAREYNALDI@domain.com', 'unknown.png', 'siswa', 1),
(141510018, 'RYAN ADITHYA NOVALDHI', 'Laki-Laki', '06937c158b31c017a81f847a4a3c790f', 'RYANADITHYANOVALDHI@domain.com', 'unknown.png', 'siswa', 1),
(141510019, 'SALMA DEVIRIANI GAMALECI', 'Perempuan', '18e667e399c6d317861a4ef513dfe027', 'SALMADEVIRIANIGAMALECI@domain.com', 'unknown.png', 'siswa', 1),
(141510020, 'SARAH SHAFIRA NURANNISA', 'Perempuan', 'e9b2804a5056dfd958c3540abad4cf21', 'SARAHSHAFIRANURANNISA@domain.com', 'unknown.png', 'siswa', 1),
(141510021, 'SUYING SUMANTRI', 'Perempuan', '6d4c99d21ecfb9874653a6f84c10a489', 'SUYINGSUMANTRI@domain.com', 'unknown.png', 'siswa', 1),
(141510022, 'SYIFA AYUSANTIKA CHANIAGO', 'Perempuan', 'd5f396863dd62812aa9dcff2c7c98ebf', 'SYIFAAYUSANTIKACHANIAGO@domain.com', 'unknown.png', 'siswa', 1),
(141510023, 'VENA MARIANA YUSUF', 'Perempuan', '7b95db9a70a37373ab8c5d5db95062b4', 'VENAMARIANAYUSUF@domain.com', 'unknown.png', 'siswa', 1),
(141510024, 'ADRIAN SAFRIS SHIDIK', 'Laki-Laki', '1367d33b310f753cab84ebee003c18e2', 'ADRIANSAFRISSHIDIK@domain.com', 'unknown.png', 'siswa', 2),
(141510025, 'ALFAN RIZQIYA ZIDNI', 'Laki-Laki', '9ca7f976ac35c10615ce8ec961ada15d', 'ALFANRIZQIYAZIDNI@domain.com', 'unknown.png', 'siswa', 2),
(141510026, 'ANANDA PUTRI KHOIRIN', 'Perempuan', 'f0dc050731358e71506c08e272ceef40', 'ANANDAPUTRIKHOIRIN@domain.com', 'unknown.png', 'siswa', 2),
(141510027, 'ANDREEANSYAH ERLAMBANG PS', 'Laki-Laki', 'ffa3806a94d032003efc15541edc52b2', 'ANDREEANSYAHERLAMBANGPS@domain.com', 'unknown.png', 'siswa', 2),
(141510028, 'ANGGI IQRO RIZKI ANUGRAH', 'Laki-Laki', '238a3b044eaa5f3fede67caebc50fe06', 'ANGGIIQRORIZKIANUGRAH@domain.com', 'unknown.png', 'siswa', 2),
(141510029, 'AULIA AGHNIA NURILMIANTI', 'Perempuan', '000faff6b2f06d4c01af7fa39f8bee90', 'AULIAAGHNIANURILMIANTI@domain.com', 'unknown.png', 'siswa', 2),
(141510030, 'BENJAMIN TAZAKA G.G.', 'Laki-Laki', 'a82a0ebddb2083ab2180821385cf01e2', 'BENJAMINTAZAKAG.G.@domain.com', 'unknown.png', 'siswa', 2),
(141510031, 'DWIKY ANGGIT REFSIANTO', 'Laki-Laki', '99b520fe3ec0d0a0e2b05d8bd7e97937', 'DWIKYANGGITREFSIANTO@domain.com', 'unknown.png', 'siswa', 2),
(141510032, 'ELSA NOVIANA SIMABURA', 'Perempuan', '2ed78af7b81d0719a948539560c94a12', 'ELSANOVIANASIMABURA@domain.com', 'unknown.png', 'siswa', 2),
(141510033, 'ENENG SITIMASROHAH', 'Perempuan', '2a1e8a7601904ebc7c93a9b09762b368', 'ENENGSITIMASROHAH@domain.com', 'unknown.png', 'siswa', 2),
(141510034, 'FIDELA AFIFA', 'Perempuan', '314eac17cf9501ebc61374982042f6ff', 'FIDELAAFIFA@domain.com', 'unknown.png', 'siswa', 2),
(141510036, 'GHINAA ALIYYAH TJ', 'Perempuan', '39f3abd39487f10e3c4d00071b34ff9b', 'GHINAAALIYYAHTJ@domain.com', 'unknown.png', 'siswa', 2),
(141510037, 'IRA FAHIRA', 'Perempuan', '5277e37dcebcca3d42b7a7d1d663bed4', 'IRAFAHIRA@domain.com', 'unknown.png', 'siswa', 2),
(141510038, 'MAHARANI WISESA VIDYA T.', 'Perempuan', 'ca108537047b82e97d1c217da65730d1', 'MAHARANIWISESAVIDYAT.@domain.com', 'unknown.png', 'siswa', 2),
(141510039, 'MUHAMMAD KURNIA PRATAMA', 'Laki-Laki', 'e116cdb4dfcf54c6921728fa90deec7a', 'MUHAMMADKURNIAPRATAMA@domain.com', 'unknown.png', 'siswa', 2),
(141510040, 'MUHAMMAD RIJALUDDIN IQ', 'Laki-Laki', '929c31be96a8d2329c7cf6b1dff645e8', 'MUHAMMADRIJALUDDINIQ@domain.com', 'unknown.png', 'siswa', 2),
(141510041, 'MUHAMMAD ZAHID WALIULLAH', 'Laki-Laki', 'a9d2f8ca7e03f2c77ffeaa709d254934', 'MUHAMMADZAHIDWALIULLAH@domain.com', 'unknown.png', 'siswa', 2),
(141510042, 'MUTIARA AYU NURANNISA', 'Perempuan', 'b35aecbf0c77380907babb821782324d', 'MUTIARAAYUNURANNISA@domain.com', 'unknown.png', 'siswa', 2),
(141510043, 'NABILAH HARDINI', 'Perempuan', 'f7bb3c9e55ab9aaaebcd159705c88dd8', 'NABILAHHARDINI@domain.com', 'unknown.png', 'siswa', 2),
(141510044, 'NIA SABILA', 'Perempuan', 'c99225fcfb1e0c0b0b451afba5b2713f', 'NIASABILA@domain.com', 'unknown.png', 'siswa', 2),
(141510045, 'PRIHATNA BAGASKARA', 'Laki-Laki', '829b811d133f98c5e0a1c4c33135c023', 'PRIHATNABAGASKARA@domain.com', 'unknown.png', 'siswa', 2),
(141510046, 'PUTRI CHALQIE AZZACHRA S.', 'Perempuan', '87982417b112cdfbc49902efe6d4284f', 'PUTRICHALQIEAZZACHRAS.@domain.com', 'unknown.png', 'siswa', 2),
(141510047, 'REGITA APRILIA MAHARANI Y.', 'Perempuan', 'eeb5e3b10077f13d76f0bc66b83a73ba', 'REGITAAPRILIAMAHARANIY.@domain.com', 'unknown.png', 'siswa', 2),
(141510048, 'REZA NURFARIDAH', 'Perempuan', 'bbece4fdd39619e216170dbdbed71775', 'REZANURFARIDAH@domain.com', 'unknown.png', 'siswa', 2),
(141510049, 'SAFFANAH NADHIRA FADHLAN', 'Perempuan', 'ef90338f402a4d984aaddad7fe86c975', 'SAFFANAHNADHIRAFADHLAN@domain.com', 'unknown.png', 'siswa', 2),
(141510050, 'SALSABILA RIZQIA PRANSGIARTI', 'Perempuan', '06fa50b97370a044adfc0158630444f9', 'SALSABILARIZQIAPRANSGIARTI@domain.com', 'unknown.png', 'siswa', 2);
INSERT INTO `siswa` (`nis`, `nama_siswa`, `jklamin_siswa`, `password`, `email`, `dispict`, `status`, `id_kelas`) VALUES
(141510051, 'SASKA SHAFIRA RIZKIA', 'Perempuan', '3dc01e4b457add6e0c55782dee8c9a3c', 'SASKASHAFIRARIZKIA@domain.com', 'unknown.png', 'siswa', 2),
(141510052, 'SAVIRA BELLADINA', 'Perempuan', 'd2c0194e7f902a0607cb3e362b659147', 'SAVIRABELLADINA@domain.com', 'unknown.png', 'siswa', 2),
(141510053, 'SEPTIAN PRAMITRA SUKARJO', 'Laki-Laki', 'f5620c4264bfb421053f358fb8153d53', 'SEPTIANPRAMITRASUKARJO@domain.com', 'unknown.png', 'siswa', 2),
(141510054, 'SHANIA SHABRINA HERMAN', 'Perempuan', '0bea620d461b5e88ae4da4acd6fb7cd6', 'SHANIASHABRINAHERMAN@domain.com', 'unknown.png', 'siswa', 2),
(141510055, 'SILVYA MALINDA', 'Perempuan', '61ec6aee505280062da907f9e55225ad', 'SILVYAMALINDA@domain.com', 'unknown.png', 'siswa', 2),
(141510056, 'SITI FATIMAH', 'Perempuan', '8de4c23c1cbf6c122d88451f9e50e57a', 'SITIFATIMAH@domain.com', 'unknown.png', 'siswa', 2),
(141510057, 'TESSA THAHIRA', 'Perempuan', 'f1d977896706c88fc52200e7cae853ef', 'TESSATHAHIRA@domain.com', 'unknown.png', 'siswa', 2),
(141510058, 'TOBY MALIK SHERIDAN', 'Laki-Laki', 'c195fa47205168fcb8bcb87d01517ce4', 'TOBYMALIKSHERIDAN@domain.com', 'unknown.png', 'siswa', 2),
(141510059, 'WENING SARI ANZAILLA', 'Perempuan', '48a7d78e909f57a2016fb0c6f8afe0c3', 'WENINGSARIANZAILLA@domain.com', 'unknown.png', 'siswa', 2),
(141510060, 'YEMIMA DAME NATALIA', 'Perempuan', 'f469480ce73536398d27f2e78469da07', 'YEMIMADAMENATALIA@domain.com', 'unknown.png', 'siswa', 2),
(141510061, 'ADINDA AULIA SALSABILA', 'Perempuan', '64f3bf0e51ec6f318c975f93040ee3a6', 'ADINDAAULIASALSABILA@domain.com', 'unknown.png', 'siswa', 3),
(141510062, 'ADY PERMANA', 'Laki-Laki', '9feaec22a8ea555018bd0ee773321c87', 'ADYPERMANA@domain.com', 'unknown.png', 'siswa', 3),
(141510063, 'AFRALIA ANBAR', 'Perempuan', '0e4b4357d3a68af48def71bea70d5304', 'AFRALIAANBAR@domain.com', 'unknown.png', 'siswa', 3),
(141510064, 'AGUNG GUMILANG AZWAN', 'Laki-Laki', '1d6f1f6213b881363ac2e430f0d8b5f6', 'AGUNGGUMILANGAZWAN@domain.com', 'unknown.png', 'siswa', 3),
(141510065, 'ANOCOVA IZZATUR RAHMAN', 'Laki-Laki', '2f8c0fa5ae1c6f97afadce5cf984a549', 'ANOCOVAIZZATURRAHMAN@domain.com', 'unknown.png', 'siswa', 3),
(141510067, 'AYUNDA ANGGUN KHARISMA', 'Perempuan', 'a09d8a9905da895c3fcec802f2e1941e', 'AYUNDAANGGUNKHARISMA@domain.com', 'unknown.png', 'siswa', 3),
(141510068, 'BAYU FAHMIAJI FADILLAH', 'Laki-Laki', 'f84efc376f69db6ae7c16fd21f2ebb97', 'BAYUFAHMIAJIFADILLAH@domain.com', 'unknown.png', 'siswa', 3),
(141510069, 'CLARA JENNY CLAUSS', 'Perempuan', '5508064cdddd9d32b0a4f07f495cc563', 'CLARAJENNYCLAUSS@domain.com', 'unknown.png', 'siswa', 3),
(141510070, 'DHITA RESTU PUTRI RAMADHANI', 'Perempuan', '84ef5fd6616d15f2344893762e1bcf1d', 'DHITARESTUPUTRIRAMADHANI@domain.com', 'unknown.png', 'siswa', 3),
(141510071, 'DIVYA RIZKY KIRANA', 'Perempuan', 'bf4433dc39f138fdb08bd410aadadd66', 'DIVYARIZKYKIRANA@domain.com', 'unknown.png', 'siswa', 3),
(141510072, 'FADHILAH MUHAMMAD FATHAN', 'Laki-Laki', '23de90adf8bfe16712f759efcb5565c5', 'FADHILAHMUHAMMADFATHAN@domain.com', 'unknown.png', 'siswa', 3),
(141510073, 'FAJAR RIDHANI MERZARIO', 'Laki-Laki', '8f141bf8b7b6afb3f1250224ca6b6aa0', 'FAJARRIDHANIMERZARIO@domain.com', 'unknown.png', 'siswa', 3),
(141510074, 'FENY FEBRIYANTY', 'Perempuan', 'ec82d6727680c7244c0ca631b8cc8b0e', 'FENYFEBRIYANTY@domain.com', 'unknown.png', 'siswa', 3),
(141510075, 'FRIMA NOPRIYANA', 'Laki-Laki', '61fb488d36bdac1a314503e2a31eb72a', 'FRIMANOPRIYANA@domain.com', 'unknown.png', 'siswa', 3),
(141510076, 'GILANG RAMADHAN SURYAMAN', 'Laki-Laki', 'c5264f527e7debff150b2d5827158b66', 'GILANGRAMADHANSURYAMAN@domain.com', 'unknown.png', 'siswa', 3),
(141510077, 'ILHAM FIRMANSYAH MUSLIM', 'Laki-Laki', '719a25c999324e0227efbac983f92ee2', 'ILHAMFIRMANSYAHMUSLIM@domain.com', 'unknown.png', 'siswa', 3),
(141510078, 'JOICE ESTER MANIHURUK', 'Perempuan', 'be93050a031f56e0e4bbe565461d9c76', 'JOICEESTERMANIHURUK@domain.com', 'unknown.png', 'siswa', 3),
(141510079, 'KARINA DWI LESTARI', 'Perempuan', 'f2693959525f04b467f7d6695892ef91', 'KARINADWILESTARI@domain.com', 'unknown.png', 'siswa', 3),
(141510080, 'MADE MUDYA WIKAN M.', 'Laki-Laki', '2bfb5b3ca211c65c9785d6d0513318d9', 'MADEMUDYAWIKANM.@domain.com', 'unknown.png', 'siswa', 3),
(141510081, 'MARKASAN SOUBIL HAQ', 'Laki-Laki', '2b98c8c88614800a18f33a115d3a257f', 'MARKASANSOUBILHAQ@domain.com', 'unknown.png', 'siswa', 3),
(141510082, 'MOCHAMAD RIFKY PRATAMA H', 'Laki-Laki', '3646876e47f54561f7de4dbd590a45bd', 'MOCHAMADRIFKYPRATAMAH@domain.com', 'unknown.png', 'siswa', 3),
(141510083, 'MUHAMMAD BAGJA FIRDAUS', 'Laki-Laki', '2c1ae6cfb188b9388075bc01241f1607', 'MUHAMMADBAGJAFIRDAUS@domain.com', 'unknown.png', 'siswa', 3),
(141510084, 'MUTHIARA RAMADHANI', 'Perempuan', '7154372dd69e7f90af7b24bed3003af7', 'MUTHIARARAMADHANI@domain.com', 'unknown.png', 'siswa', 3),
(141510085, 'MUTIARA OLIVIA ANANDA', 'Perempuan', 'e228983a9c902810fd7564c53e37bad1', 'MUTIARAOLIVIAANANDA@domain.com', 'unknown.png', 'siswa', 3),
(141510086, 'NANDA ASYIAH HASTAPUTRI', 'Perempuan', '7ced8b115a00f130474ada047b396af1', 'NANDAASYIAHHASTAPUTRI@domain.com', 'unknown.png', 'siswa', 3),
(141510087, 'NAYA SHAFIRA', 'Perempuan', '833f36c64470a6b93e509d05a1104444', 'NAYASHAFIRA@domain.com', 'unknown.png', 'siswa', 3),
(141510088, 'NEILA ZAKIAH HANUN', 'Perempuan', '1b2184ca6a40dae31aa435f9de056cf6', 'NEILAZAKIAHHANUN@domain.com', 'unknown.png', 'siswa', 3),
(141510089, 'NURUL HIDAYAH NASUTION', 'Perempuan', '030130d214368af6faf479ea9d09899d', 'NURULHIDAYAHNASUTION@domain.com', 'unknown.png', 'siswa', 3),
(141510090, 'RAIHAN MAHSA KURNIAWAN', 'Laki-Laki', 'dab66dcbf71306cc1a16f1501c590eae', 'RAIHANMAHSAKURNIAWAN@domain.com', 'unknown.png', 'siswa', 3),
(141510091, 'RICKY FEBRIAN', 'Laki-Laki', '61ab1b0ab6ed185029b2cbff9c5c07e0', 'RICKYFEBRIAN@domain.com', 'unknown.png', 'siswa', 3),
(141510092, 'RIFALDI JULIAWAN', 'Laki-Laki', 'ea06b2ec1072dd53e4d87a0a51a9974e', 'RIFALDIJULIAWAN@domain.com', 'unknown.png', 'siswa', 3),
(141510093, 'RISYA YUNIAR ANWAR', 'Perempuan', 'f17ce97116bfe556c32fb0dc14fbee5f', 'RISYAYUNIARANWAR@domain.com', 'unknown.png', 'siswa', 3),
(141510094, 'SHOFIE LATHIFAH', 'Perempuan', '09451d39d7d87e7290e94a69eb703876', 'SHOFIELATHIFAH@domain.com', 'unknown.png', 'siswa', 3),
(141510095, 'SUBAKRI GINENG SOBARI', 'Laki-Laki', 'abea099e22a1cba407f9731bec72c706', 'SUBAKRIGINENGSOBARI@domain.com', 'unknown.png', 'siswa', 3),
(141510096, 'TIA NURAENI', 'Perempuan', '9c34182d07d82ccc8b312d45f592b84a', 'TIANURAENI@domain.com', 'unknown.png', 'siswa', 3),
(141510097, 'VIERA BERLIANA AZZACHRA', 'Perempuan', '608aee7d4d4053002c5fc8f468b48c28', 'VIERABERLIANAAZZACHRA@domain.com', 'unknown.png', 'siswa', 3),
(141510098, 'ACHMAD FAUZI', 'Laki-Laki', '6cbc84f4ffbcdbc0e904e794791e9f5a', 'ACHMADFAUZI@domain.com', 'unknown.png', 'siswa', 4),
(141510099, 'ADITYA RAMADHANY', 'Laki-Laki', '135b99d29aa0b0b74662e2bc57af8e35', 'ADITYARAMADHANY@domain.com', 'unknown.png', 'siswa', 4),
(141510100, 'ALYA NURFITRIYAH', 'Perempuan', '350f8206cc704e2625acbb7ec52436c7', 'ALYANURFITRIYAH@domain.com', 'unknown.png', 'siswa', 4),
(141510101, 'ASRIANA DEWI HUMAIRA', 'Perempuan', 'efde1fac19a59f32e07b8d5cbd00cad7', 'ASRIANADEWIHUMAIRA@domain.com', 'unknown.png', 'siswa', 4),
(141510102, 'BETTY SETIATI NURSYABANI', 'Perempuan', '6fabbc407f3616f4f6a70dbc926b613f', 'BETTYSETIATINURSYABANI@domain.com', 'unknown.png', 'siswa', 4),
(141510103, 'BIANCA KENCANA L.', 'Perempuan', 'f24c3e399abb4003c11b801d99dd190b', 'BIANCAKENCANAL.@domain.com', 'unknown.png', 'siswa', 4),
(141510104, 'CHAIRUNNISA KUMALA GIFFARIANY', 'Perempuan', '5e77aa807da42f8ba037e829bb00c8e6', 'CHAIRUNNISAKUMALAGIFFARIANY@domain.com', 'unknown.png', 'siswa', 4),
(141510105, 'DEICHA AFIFA C.', 'Perempuan', '599e83a9e9f8226eba9a0f3866e6861d', 'DEICHAAFIFAC.@domain.com', 'unknown.png', 'siswa', 4),
(141510106, 'DENDY HADINATA', 'Laki-Laki', '2fa0b35f8a82ea96a14ee8ecb696d583', 'DENDYHADINATA@domain.com', 'unknown.png', 'siswa', 4),
(141510107, 'DHICKA DAULIKA ICHWANI', 'Laki-Laki', 'be858050feb80e686f9c4bbc0c47445a', 'DHICKADAULIKAICHWANI@domain.com', 'unknown.png', 'siswa', 4),
(141510108, 'DIFFANIA SALSABILA', 'Perempuan', '079095546166dec1d56a9d5a2dc8e7d5', 'DIFFANIASALSABILA@domain.com', 'unknown.png', 'siswa', 4),
(141510109, 'DIMAS ADITYA NURFIRDAUS', 'Laki-Laki', 'fd5d06567dc091e10276bbf8d129b43b', 'DIMASADITYANURFIRDAUS@domain.com', 'unknown.png', 'siswa', 4),
(141510110, 'DIMAS BERYL RACHMAN', 'Laki-Laki', 'd0332da1e920a69cd79a6ac3aae54e08', 'DIMASBERYLRACHMAN@domain.com', 'unknown.png', 'siswa', 4),
(141510111, 'DISTA FARIDA NURNISA', 'Perempuan', '0b8b9f787d59b5cb63819e037e636ad5', 'DISTAFARIDANURNISA@domain.com', 'unknown.png', 'siswa', 4),
(141510112, 'FEBRIANI SAFITRI', 'Perempuan', '0d5c23ee980d104a93bfbe258be21fec', 'FEBRIANISAFITRI@domain.com', 'unknown.png', 'siswa', 4),
(141510113, 'GABRIEL ALMAYDA S.', 'Laki-Laki', '84cbcc66813d801612ac311e8524aba7', 'GABRIELALMAYDAS.@domain.com', 'unknown.png', 'siswa', 4),
(141510114, 'INTAN OKTAVIANI', 'Perempuan', '2c93893cc75e28b55b9dc5eb98d334df', 'INTANOKTAVIANI@domain.com', 'unknown.png', 'siswa', 4),
(141510115, 'IQLIMA SEKAR P.', 'Perempuan', 'e8b4ee0f162fadb5ba503d8062f35539', 'IQLIMASEKARP.@domain.com', 'unknown.png', 'siswa', 4),
(141510116, 'JORDAN PRIMA KHARISMA', 'Laki-Laki', 'e9cd855444a3612fa66ae665d4af3994', 'JORDANPRIMAKHARISMA@domain.com', 'unknown.png', 'siswa', 4),
(141510117, 'LINDA MUSTIKA', 'Perempuan', 'a17cea6a761440f2f770bd80fcc06312', 'LINDAMUSTIKA@domain.com', 'unknown.png', 'siswa', 4),
(141510118, 'M. MUSTAQIM RAMDHANY DARMAZA', 'Laki-Laki', '49fc5dbc39ab288bd4edbaecd3fc3378', 'M.MUSTAQIMRAMDHANYDARMAZA@domain.com', 'unknown.png', 'siswa', 4),
(141510119, 'MELY INDRIYANI', 'Perempuan', 'a5b136a676d961eff62c08512e0abc52', 'MELYINDRIYANI@domain.com', 'unknown.png', 'siswa', 4),
(141510120, 'MUHAMMAD DAFFA BERNA', 'Laki-Laki', 'c4d67deb3849ed5ad3e4b81eb04fb995', 'MUHAMMADDAFFABERNA@domain.com', 'unknown.png', 'siswa', 4),
(141510121, 'MUHAMMAD DANDI L.', 'Laki-Laki', '241e7521b453c805d8943fe93eda509f', 'MUHAMMADDANDIL.@domain.com', 'unknown.png', 'siswa', 4),
(141510122, 'MUHAMMAD FARHAN S.', 'Laki-Laki', 'b2b763e059d8bd7d31a9f98053fcf5e5', 'MUHAMMADFARHANS.@domain.com', 'unknown.png', 'siswa', 4),
(141510123, 'MUHAMMAD NAUFAL A.', 'Laki-Laki', 'aad3fc7709fc4d12b8fd9410e057e769', 'MUHAMMADNAUFALA.@domain.com', 'unknown.png', 'siswa', 4),
(141510124, 'MUHAMMAD SHAFLY H.', 'Laki-Laki', 'a8ecec10518167f2f8c3af4eedfeabe1', 'MUHAMMADSHAFLYH.@domain.com', 'unknown.png', 'siswa', 4),
(141510125, 'NADHIFA AYUSHA LESMANA', 'Perempuan', '9b4d88de8e10030eec0ca1c38204dd87', 'NADHIFAAYUSHALESMANA@domain.com', 'unknown.png', 'siswa', 4),
(141510126, 'NUR ALLYA CITRANAGARA', 'Laki-Laki', 'f2bc49041de1cf7fd82123e1ffe173f6', 'NURALLYACITRANAGARA@domain.com', 'unknown.png', 'siswa', 4),
(141510127, 'RADEN ZAHRA NADHIRA Y.', 'Perempuan', '3acacdbd974a0f5f3205de4c07151f37', 'RADENZAHRANADHIRAY.@domain.com', 'unknown.png', 'siswa', 4),
(141510128, 'RAMA', 'Laki-Laki', 'e29e4507316b4fa964ef7209bd53befe', 'RAMA@domain.com', 'unknown.png', 'siswa', 4),
(141510129, 'RIFKY PAJAR KEMALUDDIN', 'Laki-Laki', '71e705b0aed0ed4a0323b44a9cc37adc', 'RIFKYPAJARKEMALUDDIN@domain.com', 'unknown.png', 'siswa', 4),
(141510130, 'SABINE FATIMAH SAYIDINA', 'Perempuan', '351892124fc870799a844a1f936030a5', 'SABINEFATIMAHSAYIDINA@domain.com', 'unknown.png', 'siswa', 4),
(141510131, 'SEDYA ISTIQOMAH', 'Laki-Laki', '69ddfe756d87b722d70dbf309d8ff9b8', 'SEDYAISTIQOMAH@domain.com', 'unknown.png', 'siswa', 4),
(141510132, 'VIVI SUSANTI', 'Perempuan', 'e80a78f4e0bd331a0a7cbc70c50bc68e', 'VIVISUSANTI@domain.com', 'unknown.png', 'siswa', 4),
(141510133, 'YASMIN ALMA SARASWATI', 'Perempuan', '1a737c7f7859c9f7789de27aed142c96', 'YASMINALMASARASWATI@domain.com', 'unknown.png', 'siswa', 4),
(141510134, 'YUGHA PRIYANDHA PUTRA', 'Perempuan', 'd33f4db7014c27a4c6483d2ba0e45657', 'YUGHAPRIYANDHAPUTRA@domain.com', 'unknown.png', 'siswa', 4),
(141510135, 'ANITA PERMATASARI', 'Perempuan', '5755cab1024b72b9ec2f312671523d0e', 'ANITAPERMATASARI@domain.com', 'unknown.png', 'siswa', 5),
(141510136, 'BIMA SAM', 'Laki-Laki', '80bda518ce231058566c6ae0535bfad1', 'BIMASAM@domain.com', 'unknown.png', 'siswa', 5),
(141510137, 'CATHERINE RAHEL L.', 'Perempuan', '4cf6bbcfdc660484e45831023cc7f6a6', 'CATHERINERAHELL.@domain.com', 'unknown.png', 'siswa', 5),
(141510138, 'CINDY CORNELIA', 'Perempuan', 'ab0df0dfb98187c5535a132a6d2789e8', 'CINDYCORNELIA@domain.com', 'unknown.png', 'siswa', 5),
(141510139, 'DAFFA FADHIL HARDIYANTO', 'Laki-Laki', '76d797c639fed4e25087c7ab99bb6d68', 'DAFFAFADHILHARDIYANTO@domain.com', 'unknown.png', 'siswa', 5),
(141510140, 'DESTIA SRI FADHILAH', 'Perempuan', '45ef66312ec89262d9b223126f2d36c8', 'DESTIASRIFADHILAH@domain.com', 'unknown.png', 'siswa', 5),
(141510141, 'DIKY PERMANA PUTRA', 'Laki-Laki', '414acf6953845d6d3f750b81d10f29fa', 'DIKYPERMANAPUTRA@domain.com', 'unknown.png', 'siswa', 5),
(141510142, 'EKA PUTRI LARASATI LESTARI', 'Perempuan', 'd18c9d28e0a603091042e6cfab224387', 'EKAPUTRILARASATILESTARI@domain.com', 'unknown.png', 'siswa', 5),
(141510143, 'FAISAL FADHILAH', 'Laki-Laki', '6c5d7dd2bcff62bf7e6a70359e136022', 'FAISALFADHILAH@domain.com', 'unknown.png', 'siswa', 5),
(141510144, 'FARENT BONATAMA SAGALA', 'Laki-Laki', '3bc0ab7e0b4362450545619594154ca5', 'FARENTBONATAMASAGALA@domain.com', 'unknown.png', 'siswa', 5),
(141510145, 'FARHAN PRADANA TALLEI', 'Laki-Laki', '60518b978f883e6cda16cfba51753053', 'FARHANPRADANATALLEI@domain.com', 'unknown.png', 'siswa', 5),
(141510146, 'FATHIYA NAFIDAH HUSNA', 'Perempuan', '8d24512d6027c54a7d9adffd75082dc9', 'FATHIYANAFIDAHHUSNA@domain.com', 'unknown.png', 'siswa', 5),
(141510147, 'FATRA YUSUF', 'Laki-Laki', 'f6f6b07362601da2667ff5ce8e696587', 'FATRAYUSUF@domain.com', 'unknown.png', 'siswa', 5),
(141510148, 'GHINA ASYIFA TRESNA', 'Perempuan', '9e9569a7cbb6fc9d14415a02eb25240f', 'GHINAASYIFATRESNA@domain.com', 'unknown.png', 'siswa', 5),
(141510149, 'GINA RAHMANI SUNARTO', 'Perempuan', '9a4c43e7885bb0bdbd7c84858c73baec', 'GINARAHMANISUNARTO@domain.com', 'unknown.png', 'siswa', 5),
(141510150, 'HERZAN HARIS', 'Laki-Laki', '8defde767759e88303e3a3583125c405', 'HERZANHARIS@domain.com', 'unknown.png', 'siswa', 5),
(141510151, 'JIHAN NABILA BARIZKI', 'Perempuan', '94a4e96efff6602009f1a4a323324efe', 'JIHANNABILABARIZKI@domain.com', 'unknown.png', 'siswa', 5),
(141510152, 'KHANSA SANA RAMADHANI', 'Perempuan', '032937a86db6d279b65c1623cea44a4a', 'KHANSASANARAMADHANI@domain.com', 'unknown.png', 'siswa', 5),
(141510153, 'KRISTIAN NUGROHO', 'Laki-Laki', '7915d20cc88f3d84adfea05f6b20995d', 'KRISTIANNUGROHO@domain.com', 'unknown.png', 'siswa', 5),
(141510154, 'MOHAMMAD ELMIRIO F.', 'Laki-Laki', '6d69ce59a74a0a731e9a41c7c254f1a1', 'MOHAMMADELMIRIOF.@domain.com', 'unknown.png', 'siswa', 5),
(141510155, 'MUHAMAD RAKHA SULTAN F.', 'Laki-Laki', '21ce822787788064a898c2bd0a37dfac', 'MUHAMADRAKHASULTANF.@domain.com', 'unknown.png', 'siswa', 5),
(141510156, 'MUHAMMAD FAUZAN I.', 'Laki-Laki', '8db40142b2418e61d1a4e790f5ea7244', 'MUHAMMADFAUZANI.@domain.com', 'unknown.png', 'siswa', 5),
(141510157, 'MUHAMMAD FAUZAN RAFLY', 'Laki-Laki', '36312d388da2d473632732ec6a4d47e9', 'MUHAMMADFAUZANRAFLY@domain.com', 'unknown.png', 'siswa', 5),
(141510158, 'MUHAMMAD ILHAM S.', 'Laki-Laki', '86e30d3ac7c542206c60c2abe65f7d73', 'MUHAMMADILHAMS.@domain.com', 'unknown.png', 'siswa', 5),
(141510159, 'MUHAMMAD PARIS AL F.', 'Laki-Laki', '89cf91a003eab0ef594fb0f557466f6e', 'MUHAMMADPARISALF.@domain.com', 'unknown.png', 'siswa', 5),
(141510160, 'NABILA FARA DEGA R.', 'Perempuan', '4997ea202c483e3e487822022df8d28a', 'NABILAFARADEGAR.@domain.com', 'unknown.png', 'siswa', 5),
(141510161, 'NIKITA SHELA AMANDA K.', 'Perempuan', 'aeec9e6596194ac7f856ac89ab6ae341', 'NIKITASHELAAMANDAK.@domain.com', 'unknown.png', 'siswa', 5),
(141510162, 'NINDYA YUSNIKA PUTRI', 'Perempuan', 'f5daee1cb6e4bc0959ea73352c03daac', 'NINDYAYUSNIKAPUTRI@domain.com', 'unknown.png', 'siswa', 5),
(141510163, 'NOVI DWIMAR LESTARI', 'Perempuan', '10edcfb8ffa381d863c97ecf93057975', 'NOVIDWIMARLESTARI@domain.com', 'unknown.png', 'siswa', 5),
(141510164, 'RIRIN WINAYA', 'Perempuan', '0f6596f114c9bfe843ffd9fec525e9e5', 'RIRINWINAYA@domain.com', 'unknown.png', 'siswa', 5),
(141510165, 'SHAFIRA AZZAHRA', 'Perempuan', '5a0cc02a47f5df4d2121137c2bf10ae9', 'SHAFIRAAZZAHRA@domain.com', 'unknown.png', 'siswa', 5),
(141510166, 'SHANDRA OKTA LISTA', 'Perempuan', '61bc88b2f6b19216bdbc43420c56219b', 'SHANDRAOKTALISTA@domain.com', 'unknown.png', 'siswa', 5),
(141510167, 'SHELLA MARTHALENA', 'Perempuan', 'e460735fe0f7b9671a34e53d79e4db4e', 'SHELLAMARTHALENA@domain.com', 'unknown.png', 'siswa', 5),
(141510168, 'WIA MUTIARA S.', 'Perempuan', '76544adeb9a8399c709897e43ee44011', 'WIAMUTIARAS.@domain.com', 'unknown.png', 'siswa', 5),
(141510169, 'ZIHAN NUR FADLILAH', 'Perempuan', '302f023aaaa53f9fe1a950d567a949e0', 'ZIHANNURFADLILAH@domain.com', 'unknown.png', 'siswa', 5),
(141510170, 'ABDAN SAKURO', 'Laki-Laki', '000b0d4bb08cc2aee2bd0fdf813d4a95', 'ABDANSAKURO@domain.com', 'unknown.png', 'siswa', 6),
(141510171, 'AJENG HENDARTI', 'Perempuan', 'ce69951796a9dc8398326c6995ca854d', 'AJENGHENDARTI@domain.com', 'unknown.png', 'siswa', 6),
(141510172, 'ALDA MAULIDINA NUGRAHA', 'Perempuan', 'bcc8595d84d3cb131f3347bf08482e1e', 'ALDAMAULIDINANUGRAHA@domain.com', 'unknown.png', 'siswa', 6),
(141510173, 'ALDIKA RIZKI DIVANSYAH', 'Laki-Laki', '36c1c33b365b062d23644af4d751b736', 'ALDIKARIZKIDIVANSYAH@domain.com', 'unknown.png', 'siswa', 6),
(141510174, 'ALIYA HANIIFAH NURDEVITA', 'Perempuan', '2b0aef3a41389c2e92402b7d61682335', 'ALIYAHANIIFAHNURDEVITA@domain.com', 'unknown.png', 'siswa', 6),
(141510175, 'ALMIRA FIRNA FITRIANTI L.', 'Perempuan', '808f1abbe492bff500b8278f17657a13', 'ALMIRAFIRNAFITRIANTIL.@domain.com', 'unknown.png', 'siswa', 6),
(141510176, 'ARIEL MIRZA DWINANDA A', 'Laki-Laki', 'f3ed354db5461369d8ceb1ebbe3ece25', 'ARIELMIRZADWINANDAA@domain.com', 'unknown.png', 'siswa', 6),
(141510177, 'ARIL RIZQI SUHERMAN', 'Laki-Laki', '1b4c9cd2b665985cbf9b6b65e442ad52', 'ARILRIZQISUHERMAN@domain.com', 'unknown.png', 'siswa', 6),
(141510178, 'ASHFA SAMIAL HAMDA', 'Laki-Laki', '01a0fe7e8f628449ce476d886f15719f', 'ASHFASAMIALHAMDA@domain.com', 'unknown.png', 'siswa', 6),
(141510179, 'AULIA NUR RAHMAN', 'Perempuan', '4aae0ce9e4bc43d0f53655ec08bad7b8', 'AULIANURRAHMAN@domain.com', 'unknown.png', 'siswa', 6),
(141510180, 'AYU KARTIKA SARI', 'Perempuan', '1fabf03fbcb147fff4ddeff785ceb7c5', 'AYUKARTIKASARI@domain.com', 'unknown.png', 'siswa', 6),
(141510181, 'AZALEA ANNISA P', 'Perempuan', 'e19d8ee9df37ced1817bab06e8742f88', 'AZALEAANNISAP@domain.com', 'unknown.png', 'siswa', 6),
(141510182, 'BAGAS HAMDANIRAHMAN', 'Laki-Laki', '2144603a5d414c073ceae8e711153558', 'BAGASHAMDANIRAHMAN@domain.com', 'unknown.png', 'siswa', 6),
(141510183, 'BENEDIKTA VURRY PUTRI', 'Perempuan', '2ee563e9f610bc5ecd056b1ab640acf5', 'BENEDIKTAVURRYPUTRI@domain.com', 'unknown.png', 'siswa', 6),
(141510184, 'CARLENE MUTIARA FEBY', 'Perempuan', 'c5855dce97f1320f7a2367667e895a44', 'CARLENEMUTIARAFEBY@domain.com', 'unknown.png', 'siswa', 6),
(141510185, 'DISHA NABILAH SOMANTRI', 'Perempuan', '14ae09024b311eeba583045bfb148c80', 'DISHANABILAHSOMANTRI@domain.com', 'unknown.png', 'siswa', 6),
(141510186, 'DZAKY ATHARIQ FERREIRA', 'Laki-Laki', '424e0ef82d0fa4707cfba4571b2eb050', 'DZAKYATHARIQFERREIRA@domain.com', 'unknown.png', 'siswa', 6),
(141510187, 'FAIZAL MUHAMMAD IRSAN', 'Laki-Laki', 'b494fa49975292991d12259690b7fd6d', 'FAIZALMUHAMMADIRSAN@domain.com', 'unknown.png', 'siswa', 6),
(141510188, 'FANI RAHMASARI', 'Perempuan', '0b42996ab65793650058ca6ba03258da', 'FANIRAHMASARI@domain.com', 'unknown.png', 'siswa', 6),
(141510189, 'JODY PRIMAJAKA', 'Laki-Laki', '086d777db61b14b77e783422ee032584', 'JODYPRIMAJAKA@domain.com', 'unknown.png', 'siswa', 6),
(141510190, 'KAMIL MUHAMMAD G.', 'Laki-Laki', '86f1f4e462f2b2e312151101552801b9', 'KAMILMUHAMMADG.@domain.com', 'unknown.png', 'siswa', 6),
(141510191, 'KHAIRANI DITHA ZHAFIRA', 'Perempuan', 'd6a12d946a19c6126b09ccb87721fc8e', 'KHAIRANIDITHAZHAFIRA@domain.com', 'unknown.png', 'siswa', 6),
(141510192, 'LUTHFIAH AMINATI RAIS J.', 'Perempuan', '4ae84b1d233fbf91fa0ec3a05e2e35b7', 'LUTHFIAHAMINATIRAISJ.@domain.com', 'unknown.png', 'siswa', 6),
(141510193, 'MUCHAMAD FIRLI NURFAJAR', 'Laki-Laki', '5298ef0b9f24e61b506a29e920e4ffea', 'MUCHAMADFIRLINURFAJAR@domain.com', 'unknown.png', 'siswa', 6),
(141510194, 'NUKI PATSA S.', 'Laki-Laki', '5acb2485d07f278d83863c8567db2858', 'NUKIPATSAS.@domain.com', 'unknown.png', 'siswa', 6),
(141510195, 'RAMA WANDANA', 'Laki-Laki', '8a97d6931224bc19665c3a5c97a0d918', 'RAMAWANDANA@domain.com', 'unknown.png', 'siswa', 6),
(141510196, 'RIDZKA ROHMATUL UTAMA', 'Laki-Laki', 'efcbeca07d4dadfc4b8f698cb119f8dc', 'RIDZKAROHMATULUTAMA@domain.com', 'unknown.png', 'siswa', 6),
(141510197, 'RINI YUNIA SIMBOLON', 'Perempuan', 'bbc9060e2b7b42ef35414cddec65355d', 'RINIYUNIASIMBOLON@domain.com', 'unknown.png', 'siswa', 6),
(141510198, 'RYDO SEMA PANGESTU', 'Laki-Laki', '05cf6e4fe7a95062b4770c3833ba78ef', 'RYDOSEMAPANGESTU@domain.com', 'unknown.png', 'siswa', 6),
(141510199, 'SALSABILA', 'Perempuan', '9329ef17bd7eefb591d8e1e7a4d3528d', 'SALSABILA@domain.com', 'unknown.png', 'siswa', 6),
(141510200, 'SOFI WULANDARI ASTUTI', 'Perempuan', 'f1fe0480eebd861391e6791c79122791', 'SOFIWULANDARIASTUTI@domain.com', 'unknown.png', 'siswa', 6),
(141510201, 'SOPIAH', 'Perempuan', '0b3dc94e8656ad92e11135bd720e3502', 'SOPIAH@domain.com', 'unknown.png', 'siswa', 6),
(141510202, 'VERAWATI ROMAULI S.', 'Perempuan', 'e7825feb8b5bbe4a3a3bb668e898b11e', 'VERAWATIROMAULIS.@domain.com', 'unknown.png', 'siswa', 6),
(141510203, 'VINA MADYANA WIRYANI', 'Perempuan', 'dd6ceb27d72ff1ed5b51551cc5d8c14a', 'VINAMADYANAWIRYANI@domain.com', 'unknown.png', 'siswa', 6),
(141510204, 'WIDIASTUTI EKA PUTRI', 'Perempuan', '1452ce48336924e84568362398fa7ebd', 'WIDIASTUTIEKAPUTRI@domain.com', 'unknown.png', 'siswa', 6),
(141510205, 'ALI AKBAR RAFSANJANI', 'Laki-Laki', 'bdcfac52ec9695ad9e5c32b750aad198', 'ALIAKBARRAFSANJANI@domain.com', 'unknown.png', 'siswa', 7),
(141510206, 'ANINDA PUTRIANA RIDWAN', 'Perempuan', '2bbbdd9121421b7da40e932a3a9aabdc', 'ANINDAPUTRIANARIDWAN@domain.com', 'unknown.png', 'siswa', 7),
(141510207, 'CINTYA ANANDA PUTRI', 'Perempuan', '072fcaf01c8952e666cd9cc30f68ea87', 'CINTYAANANDAPUTRI@domain.com', 'unknown.png', 'siswa', 7),
(141510208, 'DAFFA FAUZANANDAR', 'Laki-Laki', 'e1fedfaf8d0f5dfe6c40c6bd9e3d2369', 'DAFFAFAUZANANDAR@domain.com', 'unknown.png', 'siswa', 7),
(141510209, 'DHENALIA NUR SALSABILA', 'Perempuan', 'c57dbdaf7116168bb7e692cd68ed4761', 'DHENALIANURSALSABILA@domain.com', 'unknown.png', 'siswa', 7),
(141510210, 'EKA CAICILIYA PUTRI', 'Perempuan', '9e355f11579cb9971b31fef6b670060e', 'EKACAICILIYAPUTRI@domain.com', 'unknown.png', 'siswa', 7),
(141510211, 'FAISAL NANDA RAMADHAN', 'Laki-Laki', '71a5d3355aff5fc4ca3b7001f2de9edc', 'FAISALNANDARAMADHAN@domain.com', 'unknown.png', 'siswa', 7),
(141510212, 'FARHAN CAVALERA P.', 'Laki-Laki', 'd0506df3b71070defa75d262f5a9e088', 'FARHANCAVALERAP.@domain.com', 'unknown.png', 'siswa', 7),
(141510213, 'FARHAN LATIEF AZIZ D.', 'Laki-Laki', 'd843bda920a8b77b9535a20e061401fc', 'FARHANLATIEFAZIZD.@domain.com', 'unknown.png', 'siswa', 7),
(141510214, 'FAUZAN AKMAL AZIZ', 'Laki-Laki', 'bc8c3e10677e8c37c137ed2c754ec877', 'FAUZANAKMALAZIZ@domain.com', 'unknown.png', 'siswa', 7),
(141510215, 'FAZA NAUFAL ALGHIFARY', 'Laki-Laki', '1b87979516de2130e455151eee4270bb', 'FAZANAUFALALGHIFARY@domain.com', 'unknown.png', 'siswa', 7),
(141510216, 'FERNANDA ALIF MUNAZAR', 'Perempuan', '6a90bbd851af604eb7c70853cf67ed56', 'FERNANDAALIFMUNAZAR@domain.com', 'unknown.png', 'siswa', 7),
(141510217, 'FITRI MAELANI', 'Perempuan', '8109a06846ddad4ac746308eb9002b89', 'FITRIMAELANI@domain.com', 'unknown.png', 'siswa', 7),
(141510218, 'GALIH RIZKY PRATAMA', 'Laki-Laki', '81fe84c21bbd8f976e4c0545b7fc4642', 'GALIHRIZKYPRATAMA@domain.com', 'unknown.png', 'siswa', 7),
(141510219, 'GREGORIUS TRI HENDRAWAN MANURUNG', 'Laki-Laki', '535733a714898a1801ee699bd358d2d0', 'GREGORIUSTRIHENDRAWANMANURUNG@domain.com', 'unknown.png', 'siswa', 7),
(141510220, 'HANIF PRATAMA', 'Laki-Laki', '0504fc927b46538cc19a9205f9963eb8', 'HANIFPRATAMA@domain.com', 'unknown.png', 'siswa', 7),
(141510221, 'ISMAIL AKROMUL JUNDI', 'Laki-Laki', '9af04034a45fb195535da5b4d5ec36b9', 'ISMAILAKROMULJUNDI@domain.com', 'unknown.png', 'siswa', 7),
(141510222, 'KARINA ALDA CYRILLA', 'Perempuan', '56332f66dfa7dc02fdba74d681d5107b', 'KARINAALDACYRILLA@domain.com', 'unknown.png', 'siswa', 7),
(141510223, 'LEVIA ANINDITA', 'Perempuan', '9afa0a54564f0a27ae012e584d7d7f07', 'LEVIAANINDITA@domain.com', 'unknown.png', 'siswa', 7),
(141510224, 'MEIDIANA PRADINA PUTRI', 'Perempuan', '6868e16747f0fa2c6e4ea4995332e04f', 'MEIDIANAPRADINAPUTRI@domain.com', 'unknown.png', 'siswa', 7),
(141510225, 'MOCH. RIZKY LUTFI', 'Laki-Laki', 'f634cd5cdb3728849cacc47abddd3c70', 'MOCH.RIZKYLUTFI@domain.com', 'unknown.png', 'siswa', 7),
(141510226, 'MOHAMAD TAUFIK', 'Laki-Laki', 'd3b04d028c143d2ccb2cb2998efbcfc7', 'MOHAMADTAUFIK@domain.com', 'unknown.png', 'siswa', 7),
(141510227, 'MUHAMAD AKBAR FIRHAN', 'Laki-Laki', '61e5d079d775cb238034cd82ebdfd235', 'MUHAMADAKBARFIRHAN@domain.com', 'unknown.png', 'siswa', 7),
(141510228, 'NABYLA SEPRILYA', 'Perempuan', 'bae790ad17aaa4569045a5cf0c4d1bb8', 'NABYLASEPRILYA@domain.com', 'unknown.png', 'siswa', 7),
(141510229, 'NUR FATIMA SARAH', 'Perempuan', 'c0c6eb43589f869464398551b59ac667', 'NURFATIMASARAH@domain.com', 'unknown.png', 'siswa', 7),
(141510230, 'RADEN VIONITA EFRIANA', 'Perempuan', 'ba447eb644394253a3a27fb2186c56f7', 'RADENVIONITAEFRIANA@domain.com', 'unknown.png', 'siswa', 7),
(141510231, 'RAFIKA DWI ASTARI', 'Perempuan', '65e2825fa5dc0559f8f745ab9ed55b09', 'RAFIKADWIASTARI@domain.com', 'unknown.png', 'siswa', 7),
(141510232, 'RD.FADHIL EKAPUTRA A.', 'Laki-Laki', 'a25ae46b032e89b4d4a151b6572e1849', 'RD.FADHILEKAPUTRAA.@domain.com', 'unknown.png', 'siswa', 7),
(141510233, 'RETNO ANGRAENI U.', 'Perempuan', '72bebe66b1321e9378750841f0fe16fc', 'RETNOANGRAENIU.@domain.com', 'unknown.png', 'siswa', 7),
(141510234, 'RIFQI NURFALIH SUHANA', 'Laki-Laki', '7cc969c48fef417719844cef3080bac7', 'RIFQINURFALIHSUHANA@domain.com', 'unknown.png', 'siswa', 7),
(141510235, 'RR. NABILA AZZAHRA SALMA M.', 'Perempuan', '9a88e46ab9c875e8026ec77874714c27', 'RR.NABILAAZZAHRASALMAM.@domain.com', 'unknown.png', 'siswa', 7),
(141510236, 'SYACHRUL PUTRA SYAM', 'Laki-Laki', 'f30679c7f3c461c85945d5e0e55f988d', 'SYACHRULPUTRASYAM@domain.com', 'unknown.png', 'siswa', 7),
(141510237, 'THASYA FATHARANI', 'Laki-Laki', '8fd4c61ee22f1d58d301f9bdfcecd3c5', 'THASYAFATHARANI@domain.com', 'unknown.png', 'siswa', 7),
(141510238, 'VEBA REKSADIRAJA', 'Laki-Laki', '015d4ca9feeed0e548f064e5d2c78d0e', 'VEBAREKSADIRAJA@domain.com', 'unknown.png', 'siswa', 7),
(141510239, 'YUSPIA ZAINUR', 'Perempuan', 'dedca67c84459a880738b56bc9e25af4', 'YUSPIAZAINUR@domain.com', 'unknown.png', 'siswa', 7),
(141510240, 'ZAHRA NISA', 'Perempuan', '236437082d83bfb22cf1ec1d8d8aab77', 'ZAHRANISA@domain.com', 'unknown.png', 'siswa', 7),
(141510241, 'ALFA ARIFIA SETIAWAN', 'Perempuan', '26a9ad55dde659d39fc1516a91ef19a8', 'ALFAARIFIASETIAWAN@domain.com', 'unknown.png', 'siswa', 8),
(141510242, 'ALVIA PUTRI ANSORI', 'Perempuan', '59b9217acff37951b90eeda14d885b52', 'ALVIAPUTRIANSORI@domain.com', 'unknown.png', 'siswa', 8),
(141510243, 'BANDA PUTRI LINUDIA', 'Perempuan', 'ea3c3b887c04a446ed33409ec21b811e', 'BANDAPUTRILINUDIA@domain.com', 'unknown.png', 'siswa', 8),
(141510244, 'CANDRA KIRANA PUTRI A.', 'Perempuan', 'd179c4074d76d7148d519234bc82e35c', 'CANDRAKIRANAPUTRIA.@domain.com', 'unknown.png', 'siswa', 8),
(141510245, 'DEA ZANETTI', 'Perempuan', 'b36f76a90b8bc941d9d1d0d3bf663634', 'DEAZANETTI@domain.com', 'unknown.png', 'siswa', 8),
(141510247, 'DIMAS SOPIAN PRATAMA', 'Laki-Laki', '8b72746fe3272fa2f50c823c1cc29881', 'DIMASSOPIANPRATAMA@domain.com', 'unknown.png', 'siswa', 8),
(141510248, 'FAHMI ACHMAD FADHLAN', 'Laki-Laki', '08b4a7c5eab1ded30cc6e5bbe9082e2a', 'FAHMIACHMADFADHLAN@domain.com', 'unknown.png', 'siswa', 8),
(141510249, 'FAUZAN GHILMAN JIHAD', 'Laki-Laki', '827f51ded1e4dc94bbe0480e3291e0db', 'FAUZANGHILMANJIHAD@domain.com', 'unknown.png', 'siswa', 8),
(141510250, 'GEVARRELLSYA QINTARA A.', 'Laki-Laki', '32f5a87c2391cbdc7f4e2099264a25fd', 'GEVARRELLSYAQINTARAA.@domain.com', 'unknown.png', 'siswa', 8),
(141510251, 'HARI RAMDANI', 'Laki-Laki', '3055302a35dee218311e9266fedf514c', 'HARIRAMDANI@domain.com', 'unknown.png', 'siswa', 8),
(141510252, 'HARRIDH KRISHNANDA S.', 'Laki-Laki', '18a4be5938221f2580bb9ff99090a49e', 'HARRIDHKRISHNANDAS.@domain.com', 'unknown.png', 'siswa', 8),
(141510253, 'INTAN PUTRI PERMATASARI', 'Perempuan', '4066d4baca6a1008c02d0c6d7c4b1ff0', 'INTANPUTRIPERMATASARI@domain.com', 'unknown.png', 'siswa', 8),
(141510254, 'JASMINE MAYA AQILLA', 'Perempuan', 'fce8235a32a8d7d7df05757c01cfacc6', 'JASMINEMAYAAQILLA@domain.com', 'unknown.png', 'siswa', 8),
(141510255, 'KARTIKA WULAN DEWI', 'Perempuan', '1f966c10d8b8c0d89aa4c9d01ac216d0', 'KARTIKAWULANDEWI@domain.com', 'unknown.png', 'siswa', 8),
(141510256, 'MARIZKA PUTRI DIANTI', 'Perempuan', '77b05c9f93eac31c7ecfbda96f7fd382', 'MARIZKAPUTRIDIANTI@domain.com', 'unknown.png', 'siswa', 8),
(141510257, 'MEIRYFANNI SALSABILA', 'Perempuan', 'fdcb9ea74167ca89cead00530540a036', 'MEIRYFANNISALSABILA@domain.com', 'unknown.png', 'siswa', 8),
(141510258, 'MOCHAMAD ALVIARI RIZKYA', 'Laki-Laki', '2ccee9084d938bb1a278e0caa2b017e9', 'MOCHAMADALVIARIRIZKYA@domain.com', 'unknown.png', 'siswa', 8),
(141510259, 'MUHAMMAD RAFQI SADIKIN', 'Laki-Laki', 'a7d4616c252b48b21c661f4142ba4374', 'MUHAMMADRAFQISADIKIN@domain.com', 'unknown.png', 'siswa', 8),
(141510260, 'NAISYA AFIFAH SEININA', 'Perempuan', '11040786dc52953b2722463d46251543', 'NAISYAAFIFAHSEININA@domain.com', 'unknown.png', 'siswa', 8),
(141510261, 'NALA DESMALIANDRI', 'Perempuan', 'b8c5824b4a0314c68a89b1acc151076e', 'NALADESMALIANDRI@domain.com', 'unknown.png', 'siswa', 8),
(141510262, 'NAZARA RAMANDIRA AL F.', 'Perempuan', 'f93b0d72ccb90ea99c5aaa6a9da64852', 'NAZARARAMANDIRAALF.@domain.com', 'unknown.png', 'siswa', 8),
(141510263, 'NOVIANDINI PUTRI FAUZIYAH', 'Perempuan', '4862f7ea8daa29ed1bbcc04c6583e461', 'NOVIANDINIPUTRIFAUZIYAH@domain.com', 'unknown.png', 'siswa', 8),
(141510264, 'PUTRI SHINTA GUNAWAN', 'Perempuan', 'b88f421b9f814584ec9857064d8fc692', 'PUTRISHINTAGUNAWAN@domain.com', 'unknown.png', 'siswa', 8),
(141510265, 'RAYHAN ANDAFFA A.', 'Laki-Laki', '2ef51cd79e8e1d4a3fd7d7ee2e54a994', 'RAYHANANDAFFAA.@domain.com', 'unknown.png', 'siswa', 8),
(141510266, 'RENDRA ARIF', 'Laki-Laki', '93fee7b14c420cb65fbf85cabf666016', 'RENDRAARIF@domain.com', 'unknown.png', 'siswa', 8),
(141510267, 'RHEINA SUKMAWATI', 'Perempuan', 'ebab8276b3ca0115b78d538a5f5ba9ac', 'RHEINASUKMAWATI@domain.com', 'unknown.png', 'siswa', 8),
(141510268, 'RIFA HERMAWAN', 'Perempuan', '50760da0ab6405598893c676a4fe49b0', 'RIFAHERMAWAN@domain.com', 'unknown.png', 'siswa', 8),
(141510269, 'SASRIANI WIDA NURHETTY', 'Perempuan', '412aa09c1bfd43deff28df1d4cc7dd6f', 'SASRIANIWIDANURHETTY@domain.com', 'unknown.png', 'siswa', 8),
(141510270, 'SHALMA AULIA', 'Perempuan', 'd90aa77f591692e9085ae63f0d2ce7b5', 'SHALMAAULIA@domain.com', 'unknown.png', 'siswa', 8),
(141510271, 'SHEILA ANGESTI LATIVIA', 'Perempuan', '90878612379f0f8c578f8315bdceac90', 'SHEILAANGESTILATIVIA@domain.com', 'unknown.png', 'siswa', 8),
(141510272, 'SONIA APRILIA SURYA', 'Perempuan', '7a90c65d4f6c7f13053d17a8b67502a0', 'SONIAAPRILIASURYA@domain.com', 'unknown.png', 'siswa', 8),
(141510273, 'SYAFIRA DWI SEPTYANTHI', 'Perempuan', 'cfbd95865afca2a90ee09d91756cb40e', 'SYAFIRADWISEPTYANTHI@domain.com', 'unknown.png', 'siswa', 8),
(141510274, 'TUBAGUS AKBAR GANJAR I.', 'Laki-Laki', '1f1a36eecf7678eab12f2f125cb3694c', 'TUBAGUSAKBARGANJARI.@domain.com', 'unknown.png', 'siswa', 8),
(141510275, 'VENI MARIANI YUSUF', 'Perempuan', '10d954c5b2e019cabd4ad82e58dd38fa', 'VENIMARIANIYUSUF@domain.com', 'unknown.png', 'siswa', 8),
(141510276, 'ALWAN ABDILAH', 'Laki-Laki', '9787122d80a36b5a0388f317de2dd003', 'ALWANABDILAH@domain.com', 'unknown.png', 'siswa', 9),
(141510277, 'GERRY FAHREZA', 'Laki-Laki', 'cfa79df88e1562f0fa18a28f20c8e256', 'GERRYFAHREZA@domain.com', 'unknown.png', 'siswa', 9),
(141510278, 'IHSAN MIFTAHUR ROHMAN', 'Laki-Laki', '812439f8f4c0a5acd4e07ea4e6ac4097', 'IHSANMIFTAHURROHMAN@domain.com', 'unknown.png', 'siswa', 9),
(141510279, 'LEVIANA', 'Perempuan', '3d852b37ac782e5d4c4638bfb2bb8a66', 'LEVIANA@domain.com', 'unknown.png', 'siswa', 9),
(141510280, 'MOCHAMAD NUR ROCHMAN', 'Laki-Laki', 'f8b163fca0f28a0b91d86d10a0b1f7bd', 'MOCHAMADNURROCHMAN@domain.com', 'unknown.png', 'siswa', 9),
(141510281, 'MUHAMMAD ARIE SYAHRIAL ', 'Laki-Laki', '678f1eeee248cd39d8921a1b25da4dc7', 'MUHAMMADARIESYAHRIAL@domain.com', 'unknown.png', 'siswa', 9),
(141510283, 'MULYANI PUTRI RAHAYU', 'Perempuan', 'd5d5086249d7f38ea6e126de11dbec67', 'MULYANIPUTRIRAHAYU@domain.com', 'unknown.png', 'siswa', 9),
(141510284, 'NADIA COSTA NURHAPSARI', 'Perempuan', '5010c7ac39cf509362051ee2d2e16a2d', 'NADIACOSTANURHAPSARI@domain.com', 'unknown.png', 'siswa', 9),
(141510285, 'NENG MUSTIKA PRATIWI', 'Perempuan', 'e44dede87318b5055a920c2086600e58', 'NENGMUSTIKAPRATIWI@domain.com', 'unknown.png', 'siswa', 9),
(141510286, 'R MUTIA DESTRIANI', 'Perempuan', '2baf141f72593882246534c0fd73f194', 'RMUTIADESTRIANI@domain.com', 'unknown.png', 'siswa', 9),
(141510287, 'RAIHAN LINTANG R.', 'Laki-Laki', '564c1c49571d9d377c6fc60656c16579', 'RAIHANLINTANGR.@domain.com', 'unknown.png', 'siswa', 9),
(141510288, 'RATU MOJA KACHITA', 'Perempuan', '50d9781e1e7b143b968c065ce0bf7549', 'RATUMOJAKACHITA@domain.com', 'unknown.png', 'siswa', 9),
(141510289, 'REFANIA MEGANTARI PUTRI', 'Perempuan', 'bd4ae3a966829c4085d930e8bba7448d', 'REFANIAMEGANTARIPUTRI@domain.com', 'unknown.png', 'siswa', 9),
(141510290, 'REFLI MUHAMMAD O.', 'Laki-Laki', 'd0a0cf23fd688f54a030a4a2938941da', 'REFLIMUHAMMADO.@domain.com', 'unknown.png', 'siswa', 9),
(141510291, 'REKSY FAUZAN PUTRA A.', 'Laki-Laki', 'e35f9a20f75e52cd0224382b99cb709a', 'REKSYFAUZANPUTRAA.@domain.com', 'unknown.png', 'siswa', 9),
(141510292, 'REVA MEGA ARANDEA', 'Laki-Laki', '20b15b48aa762f9708226015ee863d94', 'REVAMEGAARANDEA@domain.com', 'unknown.png', 'siswa', 9),
(141510293, 'RISKA PUSPITA SAPUTRA', 'Perempuan', '3c7462180815daef10fd19cc89987533', 'RISKAPUSPITASAPUTRA@domain.com', 'unknown.png', 'siswa', 9),
(141510294, 'RISKY AINUN FAJRI', 'Laki-Laki', 'f714eacf6a02b9fdc6b38067c664504c', 'RISKYAINUNFAJRI@domain.com', 'unknown.png', 'siswa', 9),
(141510295, 'RIVAL ALTAMILANO', 'Laki-Laki', '3da5937c2b69e9e47dc8675bd82b5f05', 'RIVALALTAMILANO@domain.com', 'unknown.png', 'siswa', 9),
(141510296, 'RIVALDI MUHAMMAD M.', 'Laki-Laki', '4aa0b53c4ab09b76042eada9c9f56ee3', 'RIVALDIMUHAMMADM.@domain.com', 'unknown.png', 'siswa', 9),
(141510297, 'RIZKI GUSTAMAN FIRDAUS', 'Laki-Laki', '75d48032b704507d8124d66ae9bdc0aa', 'RIZKIGUSTAMANFIRDAUS@domain.com', 'unknown.png', 'siswa', 9),
(141510298, 'RIZKY SEPTIAN RASTA P.', 'Laki-Laki', 'fcd4feced85e7917f18a40164e702cdf', 'RIZKYSEPTIANRASTAP.@domain.com', 'unknown.png', 'siswa', 9),
(141510299, 'SARAH FEBRIANTY', 'Perempuan', 'f4dca55c647c172e40a206b9cae29bf1', 'SARAHFEBRIANTY@domain.com', 'unknown.png', 'siswa', 9),
(141510300, 'SHAFIRA EKA NUZULA', 'Perempuan', 'b81f697f61c10dfc000bb280ba0760c2', 'SHAFIRAEKANUZULA@domain.com', 'unknown.png', 'siswa', 9),
(141510301, 'SHEILLA HAYATUN NUFUS', 'Perempuan', '63323c3b85970c136cbf7c86a3328d4a', 'SHEILLAHAYATUNNUFUS@domain.com', 'unknown.png', 'siswa', 9),
(141510302, 'SHILVIA DWITAMI SANJAYA', 'Perempuan', '85f940be58a8bd1ad2b0a516faad1980', 'SHILVIADWITAMISANJAYA@domain.com', 'unknown.png', 'siswa', 9),
(141510303, 'SILFYA MAULANY', 'Perempuan', '9e22ce111ab7eda82a74233e3599ba78', 'SILFYAMAULANY@domain.com', 'unknown.png', 'siswa', 9),
(141510304, 'SWANDY HAMONANGAN S.', 'Laki-Laki', '8cfe73471316083cf2cab6d0256c71a6', 'SWANDYHAMONANGANS.@domain.com', 'unknown.png', 'siswa', 9),
(141510305, 'SYAHIDIN TAUFIK', 'Laki-Laki', '42aaa007e0930e19c5ea6bb8280b363d', 'SYAHIDINTAUFIK@domain.com', 'unknown.png', 'siswa', 9),
(141510306, 'SYAHRIL ROESENO', 'Laki-Laki', 'dddca64d539f7dd94881b84012adbf86', 'SYAHRILROESENO@domain.com', 'unknown.png', 'siswa', 9),
(141510307, 'SYFA LATHIFAH FAUZIYYAH', 'Perempuan', 'f20e6469ff8e26ac9d4e1905ba5d9e39', 'SYFALATHIFAHFAUZIYYAH@domain.com', 'unknown.png', 'siswa', 9),
(141510308, 'VIESCA AULIA NUR', 'Perempuan', 'caa0fc2cfb0d27013d18ddc45ef2c20d', 'VIESCAAULIANUR@domain.com', 'unknown.png', 'siswa', 9),
(141510309, 'WELLY ANGRENI', 'Perempuan', '7d496d3fafab6e0c9a046069df9bc2fa', 'WELLYANGRENI@domain.com', 'unknown.png', 'siswa', 9),
(141510310, 'WIRNATYA MEIDINDA', 'Perempuan', 'daf41a9caad8eda71801300bf7c9feae', 'WIRNATYAMEIDINDA@domain.com', 'unknown.png', 'siswa', 9),
(141510311, 'ZSABILLA ZSAFIRA', 'Perempuan', '773b4b4a3cfbb6f61dc22723098a1ce3', 'ZSABILLAZSAFIRA@domain.com', 'unknown.png', 'siswa', 9),
(141510312, 'ADELINA AGRAISHA', 'Perempuan', 'fc731b80efc90f690b9fec23a5628e8a', 'ADELINAAGRAISHA@domain.com', 'unknown.png', 'siswa', 10),
(141510313, 'ADITIA GUSTIAWAN', 'Laki-Laki', 'bf9fde54a3ad2681c7e1a3ccf60715c0', 'ADITIAGUSTIAWAN@domain.com', 'unknown.png', 'siswa', 10),
(141510314, 'ALTHARIQ GAFFARULLAH YASSYA N', 'Laki-Laki', '97cb661be7f7d180186dbce7084a872e', 'ALTHARIQGAFFARULLAHYASSYAN@domain.com', 'unknown.png', 'siswa', 10),
(141510315, 'ANNISA RAHMAH FAUZIYYAH', 'Perempuan', '2cbc49da2167da29d181687ee6b686cc', 'ANNISARAHMAHFAUZIYYAH@domain.com', 'unknown.png', 'siswa', 10),
(141510316, 'ARIEL AFFASA YUSUF', 'Laki-Laki', 'b53315994dd4a203900ac121784e4d20', 'ARIELAFFASAYUSUF@domain.com', 'unknown.png', 'siswa', 10),
(141510317, 'ASTRI FITRIANI WIJAYAPUTRI', 'Perempuan', '86942796cd9dfb284e2635852f6b1211', 'ASTRIFITRIANIWIJAYAPUTRI@domain.com', 'unknown.png', 'siswa', 10),
(141510318, 'BERTA PRATIWI SISWANTO', 'Perempuan', '2be7c1455db60e24331595af5581e2a5', 'BERTAPRATIWISISWANTO@domain.com', 'unknown.png', 'siswa', 10),
(141510319, 'DEFRIANSYAH ARIA PUTRA', 'Laki-Laki', 'c14b4fea02e20ea798584dcc07e8efbd', 'DEFRIANSYAHARIAPUTRA@domain.com', 'unknown.png', 'siswa', 10),
(141510320, 'DERIEL MUGHIA GEMILANG', 'Laki-Laki', '851b31b3905b92372deda525c4ebda2d', 'DERIELMUGHIAGEMILANG@domain.com', 'unknown.png', 'siswa', 10),
(141510321, 'DINAR AMBARWATI', 'Perempuan', '6ec52a2b483eb01890f15473010e526f', 'DINARAMBARWATI@domain.com', 'unknown.png', 'siswa', 10),
(141510322, 'DINDA MAULINA', 'Perempuan', '45cebd2f9114a340ee08e51d500e8ab5', 'DINDAMAULINA@domain.com', 'unknown.png', 'siswa', 10),
(141510323, 'DINI ISTIHANA', 'Perempuan', '43f6e89d57bd1e19fe17c40e0e0f4f28', 'DINIISTIHANA@domain.com', 'unknown.png', 'siswa', 10),
(141510324, 'DIO AHMAD SOPIAN', 'Laki-Laki', '87e923439501590e10e5a4b1d2bb5850', 'DIOAHMADSOPIAN@domain.com', 'unknown.png', 'siswa', 10),
(141510325, 'FAHMI IRAWAN', 'Laki-Laki', 'deaa74bdab9fd070e03372ed880ea3a4', 'FAHMIIRAWAN@domain.com', 'unknown.png', 'siswa', 10),
(141510326, 'FANNY OCTARIA', 'Perempuan', '4696e150c8ab0fad1831476a18f41e20', 'FANNYOCTARIA@domain.com', 'unknown.png', 'siswa', 10),
(141510327, 'FARRAS JILAN FADHILLAH', 'Perempuan', '695fc422cdcef89826848c79e52ef97a', 'FARRASJILANFADHILLAH@domain.com', 'unknown.png', 'siswa', 10),
(141510328, 'KEVIN ATHALLA NAUFAL', 'Laki-Laki', '3d285d6e3e32a4b053406c2cc516722b', 'KEVINATHALLANAUFAL@domain.com', 'unknown.png', 'siswa', 10),
(141510329, 'KHARISMA JINGGA', 'Perempuan', '70423c5f1d3e676279aeb2140e194c59', 'KHARISMAJINGGA@domain.com', 'unknown.png', 'siswa', 10),
(141510330, 'KIAGUS MUHAMMAD ZAKI RIZKI', 'Laki-Laki', '83bda02e4fdf9c90f2e76a8c6396aca8', 'KIAGUSMUHAMMADZAKIRIZKI@domain.com', 'unknown.png', 'siswa', 10),
(141510331, 'KINANTI ALIFANISSA MAHINDA', 'Perempuan', 'c793745116e3284ebedfcf9210518e38', 'KINANTIALIFANISSAMAHINDA@domain.com', 'unknown.png', 'siswa', 10),
(141510332, 'MOCHAMAD ARIA RAMADHAN', 'Laki-Laki', '4add9a8f1fc718dab04dac2492b21f53', 'MOCHAMADARIARAMADHAN@domain.com', 'unknown.png', 'siswa', 10),
(141510333, 'MOCHAMAD FARHAN KURNIA', 'Laki-Laki', '52c3e40fb5eb4d587094073ff16efbcd', 'MOCHAMADFARHANKURNIA@domain.com', 'unknown.png', 'siswa', 10),
(141510334, 'MOCHAMAD FEBRI DARMANSYAH', 'Laki-Laki', '8eebc70237c1bb32463983cda131aa95', 'MOCHAMADFEBRIDARMANSYAH@domain.com', 'unknown.png', 'siswa', 10),
(141510335, 'MOCHAMAD HARRIS ALLANDA', 'Laki-Laki', '75bfb8afe965def5f7ea4a49b5081fcc', 'MOCHAMADHARRISALLANDA@domain.com', 'unknown.png', 'siswa', 10),
(141510336, 'MOHAMAD RAFI MAULANA SAPUTRA', 'Laki-Laki', '70ff43d46637a52bdab1c09434495ac2', 'MOHAMADRAFIMAULANASAPUTRA@domain.com', 'unknown.png', 'siswa', 10),
(141510337, 'MUHAMAD ARVINO FADHLAN', 'Laki-Laki', 'b430f1eabe4d08ddb176e5cbbb49742b', 'MUHAMADARVINOFADHLAN@domain.com', 'unknown.png', 'siswa', 10),
(141510338, 'MUHAMAD RIZQY SATRIA PRIBADI', 'Laki-Laki', '28bfe6a3ffee5598e07ecd9ef37baa28', 'MUHAMADRIZQYSATRIAPRIBADI@domain.com', 'unknown.png', 'siswa', 10),
(141510339, 'MUHAMMAD DAFFA PUTRA HEIMAWAN', 'Laki-Laki', 'ccf619cc3a65181aec285c289c41ab35', 'MUHAMMADDAFFAPUTRAHEIMAWAN@domain.com', 'unknown.png', 'siswa', 10),
(141510340, 'MUHAMMAD IQBAL ILHAM', 'Laki-Laki', 'bf027fe29c1eb118ba9c6e0f1957cacb', 'MUHAMMADIQBALILHAM@domain.com', 'unknown.png', 'siswa', 10),
(141510341, 'MUHAMMAD RIZKI ARIANSYAH', 'Laki-Laki', '90926e4f2ec8c8c6141d4a0ae3e545a1', 'MUHAMMADRIZKIARIANSYAH@domain.com', 'unknown.png', 'siswa', 10),
(141510342, 'MUHAMMAD ZELZA DZIKRILLAH M.', 'Laki-Laki', '793bcc87b5c5e60debae71d683a6a00f', 'MUHAMMADZELZADZIKRILLAHM.@domain.com', 'unknown.png', 'siswa', 10),
(141510343, 'MUTHIA FEBRIANTI SATARI A', 'Perempuan', '6c51a682ffd9b945bc83b1239cd02383', 'MUTHIAFEBRIANTISATARIA@domain.com', 'unknown.png', 'siswa', 10),
(141510344, 'NADIVA FADHILA RASYADA', 'Perempuan', '0144232af04bbd91f9d775c7098f12b1', 'NADIVAFADHILARASYADA@domain.com', 'unknown.png', 'siswa', 10),
(141510345, 'NANDITA FASYA RUSADI', 'Perempuan', 'd6a16bdc7e5c11c93d4f120364ca656b', 'NANDITAFASYARUSADI@domain.com', 'unknown.png', 'siswa', 10),
(141510346, 'NATASYA MAHARANI', 'Perempuan', 'feba7ff17cdf8dd684073777ad42688f', 'NATASYAMAHARANI@domain.com', 'unknown.png', 'siswa', 10),
(141510347, 'NOVAL MUHAMMAD RIDWAN', 'Laki-Laki', '89c55070dd7198764293da5f92a0d868', 'NOVALMUHAMMADRIDWAN@domain.com', 'unknown.png', 'siswa', 10),
(141510348, 'PERIS TRI PUTRA', 'Laki-Laki', '7e5ec4d6053b47ae81e12728dfb41ea9', 'PERISTRIPUTRA@domain.com', 'unknown.png', 'siswa', 10),
(141510349, 'PUTRI NABILLA NOVIYANTI', 'Perempuan', 'fbf7834720dd568084dde5b5f4f42afa', 'PUTRINABILLANOVIYANTI@domain.com', 'unknown.png', 'siswa', 10),
(141510350, 'RADEN RORO MICHELLE FABIANI', 'Perempuan', 'c597bc2e23867baf7afe1988ef1a523c', 'RADENROROMICHELLEFABIANI@domain.com', 'unknown.png', 'siswa', 10),
(141510351, 'ADITYA SEFTIAN', 'Laki-Laki', '8ba169b88d64ceee09b5b37527381c8a', 'ADITYASEFTIAN@domain.com', 'unknown.png', 'siswa', 11),
(141510352, 'ANITA DEWI ARYANI', 'Perempuan', 'abcb7e9ffff3ec491cc8050520fe7fbb', 'ANITADEWIARYANI@domain.com', 'unknown.png', 'siswa', 11),
(141510353, 'ANNISA FITRI YANI', 'Perempuan', '821899fb6d356cacc24f4cad882874fc', 'ANNISAFITRIYANI@domain.com', 'unknown.png', 'siswa', 11),
(141510354, 'ARIF PRAMANA', 'Laki-Laki', 'eb02c5c5a0323e763c24218788ca557f', 'ARIFPRAMANA@domain.com', 'unknown.png', 'siswa', 11),
(141510355, 'ASRI AINUN SYARIFAH', 'Perempuan', 'e3a295997b2bf663e2a24eae31743188', 'ASRIAINUNSYARIFAH@domain.com', 'unknown.png', 'siswa', 11),
(141510356, 'BABBY PRIYANKA SASKIA', 'Perempuan', 'ab9ce9c2177a44bbd12c28a4bfd4f986', 'BABBYPRIYANKASASKIA@domain.com', 'unknown.png', 'siswa', 11),
(141510357, 'CLARIN APRILIA PUTRI', 'Perempuan', '6dc68208d3c0d660c48c69fb6dbbc244', 'CLARINAPRILIAPUTRI@domain.com', 'unknown.png', 'siswa', 11),
(141510358, 'DANI ADHI CANDRA', 'Laki-Laki', '6ed7c42bf84e21555f1f100393ad8d22', 'DANIADHICANDRA@domain.com', 'unknown.png', 'siswa', 11),
(141510359, 'DETI HARYATI', 'Perempuan', '8feb89acafc3a4e01a6e311000025c5c', 'DETIHARYATI@domain.com', 'unknown.png', 'siswa', 11),
(141510360, 'ECKY MUHAMMAD RACHMAT', 'Laki-Laki', '52f27622dab93cbd089d6b53d8ff8634', 'ECKYMUHAMMADRACHMAT@domain.com', 'unknown.png', 'siswa', 11),
(141510361, 'FACHRI NOER FAJRI', 'Laki-Laki', 'a988cc03c37fd12ca040500109c3ac09', 'FACHRINOERFAJRI@domain.com', 'unknown.png', 'siswa', 11),
(141510362, 'FADHILA SUKMA', 'Perempuan', 'd34cb2d1ba04bce1aa5226282a3ecc23', 'FADHILASUKMA@domain.com', 'unknown.png', 'siswa', 11),
(141510363, 'FAISAL BAGOES MULYANTO', 'Laki-Laki', 'efbd6401d5846b54cad1a105c61fa813', 'FAISALBAGOESMULYANTO@domain.com', 'unknown.png', 'siswa', 11),
(141510364, 'ILHAM RIZQI FEBRIAN', 'Laki-Laki', 'e29f96e0658a9249ddbd56fed0958121', 'ILHAMRIZQIFEBRIAN@domain.com', 'unknown.png', 'siswa', 11),
(141510365, 'IQSI RIZKI FEBRINA', 'Perempuan', 'df6a06335ca937507ba2f95717f7c8d9', 'IQSIRIZKIFEBRINA@domain.com', 'unknown.png', 'siswa', 11),
(141510366, 'ITA NOVITA', 'Perempuan', '211bee2309ab2032da3b6b28eec9a592', 'ITANOVITA@domain.com', 'unknown.png', 'siswa', 11),
(141510367, 'LIA AMELIA', 'Perempuan', 'd38c16075b3c718cb8c65fa0b71ca21e', 'LIAAMELIA@domain.com', 'unknown.png', 'siswa', 11),
(141510368, 'LITA HANDAYANI', 'Perempuan', '33f50555aedabbf2bc6b33f3f4052874', 'LITAHANDAYANI@domain.com', 'unknown.png', 'siswa', 11),
(141510369, 'MAWATI PURWARA', 'Perempuan', 'c8c684eea5a8d703df703ca484108e7b', 'MAWATIPURWARA@domain.com', 'unknown.png', 'siswa', 11),
(141510370, 'MOHAMAD ATARIQ UTAMA', 'Laki-Laki', 'd5fdd30957a3e47a0ad85e65b319c475', 'MOHAMADATARIQUTAMA@domain.com', 'unknown.png', 'siswa', 11),
(141510371, 'MUHAMAD FADILAH HAIKAL', 'Laki-Laki', '2176afacd4aa837cdea9af9f7f074f21', 'MUHAMADFADILAHHAIKAL@domain.com', 'unknown.png', 'siswa', 11),
(141510372, 'MUHAMMAD AQSHA SYAUQI ILHAM', 'Laki-Laki', '3267517435a7b60b59239d0554bb895c', 'MUHAMMADAQSHASYAUQIILHAM@domain.com', 'unknown.png', 'siswa', 11),
(141510373, 'MUHAMMAD FAJAR AJI DHARMA', 'Laki-Laki', '39be646295acb6b77ce6e9dac5491536', 'MUHAMMADFAJARAJIDHARMA@domain.com', 'unknown.png', 'siswa', 11),
(141510374, 'MUHAMMAD GUNTUR RAMADHAN', 'Laki-Laki', 'd08e7511d9f65ee1ac3f5f416c5034e4', 'MUHAMMADGUNTURRAMADHAN@domain.com', 'unknown.png', 'siswa', 11),
(141510375, 'MUHAMMAD NUR ILHAM', 'Laki-Laki', 'a84834e29651c22b3aeb44f794a34b5d', 'MUHAMMADNURILHAM@domain.com', 'unknown.png', 'siswa', 11),
(141510376, 'MUHAMMAD RIDWAN', 'Laki-Laki', 'db292e454cc1e1db4acbcd09a07c39a3', 'MUHAMMADRIDWAN@domain.com', 'unknown.png', 'siswa', 11),
(141510377, 'NAMIRA MUDIA SYAIKA', 'Perempuan', 'b8b75e86f5a162d08b41a372231b17e8', 'NAMIRAMUDIASYAIKA@domain.com', 'unknown.png', 'siswa', 11),
(141510378, 'NUR AULIA SHAHNYA', 'Perempuan', '125e5e937a969aaa62ae00c21b08f69f', 'NURAULIASHAHNYA@domain.com', 'unknown.png', 'siswa', 11),
(141510379, 'RADEN FITRI OKTAVIANI RESMAYA', 'Perempuan', 'acfa35bd80fca0c4325ecda6e6f76f68', 'RADENFITRIOKTAVIANIRESMAYA@domain.com', 'unknown.png', 'siswa', 11),
(141510380, 'REYVALDI IGNASIUS SOEMANTRI', 'Laki-Laki', 'cf4cbcdb76078224b6d9973aa4ab9c8c', 'REYVALDIIGNASIUSSOEMANTRI@domain.com', 'unknown.png', 'siswa', 11),
(141510381, 'RISKY FIDELANO', 'Laki-Laki', '1b1767de86a0b4d78586a211f75fe56d', 'RISKYFIDELANO@domain.com', 'unknown.png', 'siswa', 11),
(141510382, 'RUMONDANG MARINTAN VIRA N', 'Perempuan', 'd4ba2955508f9caad4e1385c42f295ae', 'RUMONDANGMARINTANVIRAN@domain.com', 'unknown.png', 'siswa', 11),
(141510383, 'SALSABILA', 'Perempuan', 'a247688c0ddb16d50c8d8de6ceb715c6', 'SALSABILA@domain.com', 'unknown.png', 'siswa', 11),
(141510384, 'TAMKIN MAUDINA AZ ZAHRA', 'Perempuan', 'a2dea08d5a1d24f66c0b9a7deb6f0856', 'TAMKINMAUDINAAZZAHRA@domain.com', 'unknown.png', 'siswa', 11),
(141510385, 'TIAS SAFIRA HANDAYANI', 'Perempuan', 'b5f3f7bd7636dc49bc9593b25cbd42d7', 'TIASSAFIRAHANDAYANI@domain.com', 'unknown.png', 'siswa', 11),
(141510386, 'TOMMY IRSYAD NAJIB', 'Perempuan', '12de4e524c6484ecc112d9f7686069e5', 'TOMMYIRSYADNAJIB@domain.com', 'unknown.png', 'siswa', 11),
(141510387, 'WIDYA AIDA SARTIKA WIRIADIMADJA', 'Perempuan', '989eb1923786d92e927d9a685ef13f4a', 'WIDYAAIDASARTIKAWIRIADIMADJA@domain.com', 'unknown.png', 'siswa', 11),
(141510396, 'ANDI SYARIFUDIN', 'Laki-Laki', '2eb1168526bbae21ad56090706fd7d43', 'ANDISYARIFUDIN@domain.com', 'unknown.png', 'siswa', 1),
(141510397, 'ANDRE NOERSEHAN', 'Laki-Laki', '1f6d1446606e7fbdbb8a1d4e06e6018e', 'ANDRENOERSEHAN@domain.com', 'unknown.png', 'siswa', 1),
(141510398, 'MUTIYA NURFARIDAH', 'Perempuan', '7171cc0200dfc05cce81e0795d366feb', 'MUTIYANURFARIDAH@domain.com', 'unknown.png', 'siswa', 1),
(141510399, 'ARDRA SEVIAULINA', 'Perempuan', 'a3da9d8aa214ac2b521f17f9b9cd2497', 'ARDRASEVIAULINA@domain.com', 'unknown.png', 'siswa', 8),
(141510400, 'FAISHAL ZHARFAN HIDAYAT', 'Laki-Laki', 'c20e690b32c98bbfbfa74e6129e5dd40', 'FAISHALZHARFANHIDAYAT@domain.com', 'unknown.png', 'siswa', 8),
(141510401, 'NABILA AZAHRA', 'Perempuan', '16681e6ffd7a6f14d243502b22997c76', 'NABILAAZAHRA@domain.com', 'unknown.png', 'siswa', 8),
(141510402, 'JESICA CITROMULYO', 'Perempuan', 'e5f2af904a394efa30b672f50850a790', 'JESICACITROMULYO@domain.com', 'unknown.png', 'siswa', 7),
(141510403, 'MARTIFA FIRLI DEVI', 'Perempuan', 'aac3fe46cbfad9d5a0ece1d7e6096f06', 'MARTIFAFIRLIDEVI@domain.com', 'unknown.png', 'siswa', 11),
(141511388, 'RAKADITYA NOVIANDA PRADANA', 'Laki-Laki', '52ae615a1a844649c2fdfad20b6164ec', 'RAKADITYANOVIANDAPRADANA@domain.com', 'unknown.png', 'siswa', 14),
(141511389, 'DWINI NUR SAFIRA', 'Perempuan', '66c1a7466bbe37121ea5a0bc9a5a2cf7', 'DWININURSAFIRA@domain.com', 'unknown.png', 'siswa', 16),
(141511390, 'DIFA SATRIA DASFRIANA', 'Laki-Laki', '753cfd0a9514370943f39710126712ab', 'DIFASATRIADASFRIANA@domain.com', 'unknown.png', 'siswa', 17),
(141511391, 'ANDINI MAHARANI P', 'Perempuan', '1d98074d1f87bc9b786e648aec8612c2', 'ANDINIMAHARANIP@domain.com', 'unknown.png', 'siswa', 20),
(141511392, 'MUHAMMAD WISHNU HERLAMBANG', 'Laki-Laki', 'e477ebff18da4d6c161495ad33b70db6', 'MUHAMMADWISHNUHERLAMBANG@domain.com', 'unknown.png', 'siswa', 20);

-- --------------------------------------------------------

--
-- Stand-in structure for view `skor_analisis_tingkat_kesukaran`
--
CREATE TABLE IF NOT EXISTS `skor_analisis_tingkat_kesukaran` (
`nis` int(11)
,`nama_siswa` varchar(45)
,`skor` decimal(38,2)
,`id_ujian` int(11)
,`nama_ujian` varchar(45)
);
-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
  `isi_soal` varchar(100) NOT NULL,
  `opsi_a` varchar(100) NOT NULL,
  `opsi_b` varchar(100) NOT NULL,
  `opsi_c` varchar(100) NOT NULL,
  `opsi_d` varchar(100) NOT NULL,
  `opsi_e` varchar(100) NOT NULL,
  `kunci` enum('A','B','C','D','E') NOT NULL,
  `tampil` enum('ya','tidak') NOT NULL,
  `penyusun` varchar(100) NOT NULL,
  `id_mp` int(11) NOT NULL,
  PRIMARY KEY (`id_soal`),
  KEY `id_mp` (`id_mp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `isi_soal`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `kunci`, `tampil`, `penyusun`, `id_mp`) VALUES
(6, '<p>lorem ipsum&nbsp;</p>', 'Kata', 'Lorem', 'Isum', 'adalah', 'contoh', 'A', 'ya', 'NIENA YULIANA', 18),
(7, '<p>asdasd</p>', 'asd', 'asd', 'wqe', 'sd', 'qwe', 'D', 'ya', 'NIENA YULIANA', 18),
(8, '<p>dadasdasd</p>', 'asd', 'wewre', 'fghfh', 'we', 'dfgdg', 'E', 'tidak', 'NIENA YULIANA', 18);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE IF NOT EXISTS `tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tahun_ajaran` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tahun_ajaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun_ajaran`, `nama_tahun_ajaran`) VALUES
(1, '2010 - 2011'),
(2, '2011 - 2012'),
(3, '2012 - 2013'),
(4, '2013 - 2014'),
(5, '2014 - 2015');

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE IF NOT EXISTS `ujian` (
  `id_ujian` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ujian` varchar(45) NOT NULL,
  `durasi` int(11) NOT NULL,
  `aktif` enum('ya','tidak') NOT NULL,
  `penyusun` varchar(45) NOT NULL,
  `id_mp` int(11) NOT NULL,
  PRIMARY KEY (`id_ujian`),
  KEY `id_mp` (`id_mp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`id_ujian`, `nama_ujian`, `durasi`, `aktif`, `penyusun`, `id_mp`) VALUES
(1, 'Ujian Harian Ganjil', 10, 'tidak', 'NIENA YULIANA', 18),
(2, 'UTS Ganjil', 10, 'tidak', 'NIENA YULIANA', 18),
(3, 'UAS Ganjil', 10, 'tidak', 'NIENA YULIANA', 18),
(4, 'Ujian Harian Genap', 10, 'tidak', 'NIENA YULIANA', 18),
(5, 'UTS Genap', 2, 'tidak', 'NIENA YULIANA', 18),
(6, 'UAS Genap', 2, 'tidak', 'NIENA YULIANA', 18),
(7, 'Trayout Ujian Harian', 3, 'ya', 'NIENA YULIANA', 18);

-- --------------------------------------------------------

--
-- Structure for view `analisis_tingkat_kesukaran`
--
DROP TABLE IF EXISTS `analisis_tingkat_kesukaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `analisis_tingkat_kesukaran` AS (select `analisis`.`id_analisis` AS `id_analisis`,`analisis`.`nis` AS `nis`,`siswa`.`nama_siswa` AS `nama_siswa`,`analisis`.`id_soal` AS `id_soal`,(case when (`analisis`.`jawaban` = `soal`.`kunci`) then 1 else 0 end) AS `benar`,(case when (`analisis`.`jawaban` = `soal`.`kunci`) then 0 else 1 end) AS `salah`,`analisis`.`id_ujian` AS `id_ujian`,`ujian`.`nama_ujian` AS `nama_ujian` from (((`analisis` left join `soal` on((`soal`.`id_soal` = `analisis`.`id_soal`))) left join `ujian` on((`ujian`.`id_ujian` = `analisis`.`id_ujian`))) left join `siswa` on((`siswa`.`nis` = `analisis`.`nis`))) where (`analisis`.`id_ujian` > 6) order by `analisis`.`id_ujian`,`analisis`.`id_soal`);

-- --------------------------------------------------------

--
-- Structure for view `skor_analisis_tingkat_kesukaran`
--
DROP TABLE IF EXISTS `skor_analisis_tingkat_kesukaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `skor_analisis_tingkat_kesukaran` AS (select `analisis_tingkat_kesukaran`.`nis` AS `nis`,`analisis_tingkat_kesukaran`.`nama_siswa` AS `nama_siswa`,round(((sum(`analisis_tingkat_kesukaran`.`benar`) / (sum(`analisis_tingkat_kesukaran`.`benar`) + sum(`analisis_tingkat_kesukaran`.`salah`))) * 100),2) AS `skor`,`analisis_tingkat_kesukaran`.`id_ujian` AS `id_ujian`,`analisis_tingkat_kesukaran`.`nama_ujian` AS `nama_ujian` from `analisis_tingkat_kesukaran` group by `analisis_tingkat_kesukaran`.`id_ujian`,`analisis_tingkat_kesukaran`.`nis` order by round(((sum(`analisis_tingkat_kesukaran`.`benar`) / (sum(`analisis_tingkat_kesukaran`.`benar`) + sum(`analisis_tingkat_kesukaran`.`salah`))) * 100),2) desc);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `analisis`
--
ALTER TABLE `analisis`
  ADD CONSTRAINT `analisis_ibfk_1` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id_soal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `analisis_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `analisis_ibfk_3` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id_ujian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_mp`) REFERENCES `mp` (`id_mp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajaran` (`id_tahun_ajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id_ujian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_4` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_5` FOREIGN KEY (`id_mp`) REFERENCES `mp` (`id_mp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ortu`
--
ALTER TABLE `ortu`
  ADD CONSTRAINT `ortu_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`id_mp`) REFERENCES `mp` (`id_mp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `ujian_ibfk_1` FOREIGN KEY (`id_mp`) REFERENCES `mp` (`id_mp`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
