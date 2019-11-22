-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2017 at 11:00 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum_admin`
--

CREATE TABLE `forum_admin` (
  `admin_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `member_date` int(11) NOT NULL,
  `lastup_date` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_category`
--

CREATE TABLE `forum_category` (
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_desc` text NOT NULL,
  `add_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_category`
--

INSERT INTO `forum_category` (`cat_id`, `user_id`, `cat_name`, `cat_desc`, `add_date`) VALUES
(10, 11, 'Teknik', '<font size=\"3\">Forum untuk berdiskusi dan berbagi informasi seputar teknik Informatika, Agroteknologi, dan Teknik Elektro</font>', 1493162466),
(13, 10, 'Sista', '<font size=\"3\">Forum untuk tetap up-to-date seputar tentang dunia wanita</font>', 1493196434),
(14, 12, 'Bisnis', '<font size=\"3\">Forum diskusi tentang karir, dunia kerja, dan wirausaha,</font><div><font size=\"3\">Informasi seputar lowongan kerja, peluang kerjasama, dan investasi.</font></div>', 1493196566),
(15, 13, 'Handphone & Tablet', '<font size=\"3\">Forum diskusi dan berbagi seputar handphone dan tablet.</font><div><font size=\"3\">Mulai dari tren terbaru, tips &amp; trik, komparasi produk, games, dan aplikasi hingga konsultasi sebelum membeli.</font></div>', 1493196765),
(16, 14, 'Berita dan Politik', '<font size=\"3\">Forum diskusi dan berbagi berita dari dalam maupun luar negeri.</font><div><font size=\"3\">Mulai dari ideologi, politik, ekonomi, sosial, dan budaya</font></div>', 1493197311),
(17, 15, 'Pendidikan', '<font size=\"3\">Forum diskusi dan berbagi pengetahuan tentang buku, sejarah, ilmu misteri dunia, serta kumpulan aktivitas dari beragam almamater</font>', 1493198633),
(19, 16, 'Elektronik', '<div style=\"text-align: start;\"><font size=\"3\">Forum diskusi dan berbagi tentang elektronik. Mulai dari yang terbaru, komparasi produk, hingga konsultasi sebelum pembelian</font></div>', 1493198927),
(21, 18, 'Kesehatan', '<font size=\"3\">Forum seputar dunia kesehatan yang membahas seputar penyakit, gaya hidup sehat, metode diet &amp; latihan untuk kebugaran tubuh dan hal-hal yang berhubungan dengan dunia kesehatan.</font>', 1493199525),
(22, 12, 'Cooking & Resto Guide', '<font size=\"3\">Forum bagi penggemar masak-memasak dan pemburu kuliner seru.</font>', 1493199783),
(24, 20, 'Lifestyle', 'Semua tentan gaya hidup ada disini', 1495646072);

-- --------------------------------------------------------

--
-- Table structure for table `forum_reply`
--

CREATE TABLE `forum_reply` (
  `reply_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `reply` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_reply`
--

INSERT INTO `forum_reply` (`reply_id`, `topic_id`, `user_id`, `date`, `reply`) VALUES
(1, 3, 12, 1493219634, 'dengan olahraga dan jangan begadang sis :)'),
(2, 4, 19, 1494536995, 'Tesssss'),
(3, 5, 19, 1494908054, 'Menurut ane sih gan, buncit itu karena sering makan malem dan keseringan minum air dingin'),
(4, 3, 19, 1495648953, 'Jarang-jarang minum air dingin aja:)');

-- --------------------------------------------------------

--
-- Table structure for table `forum_topic`
--

CREATE TABLE `forum_topic` (
  `topic_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `title` text NOT NULL,
  `descript` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_topic`
--

INSERT INTO `forum_topic` (`topic_id`, `cat_id`, `user_id`, `date`, `views`, `title`, `descript`) VALUES
(3, 21, 15, 1493218120, 17, 'cara mengecilkan perut buncit', '<span style=\"font-weight: normal;\">Gimana \"caranya mengecilkan perut buncit\" adalah pertanyaan yang paling sering muncul ditempat fitness. Tidak hanya bagi pria, bahkan wanita punya masalah dan keinginan yang sama untuk mengecilkan perut buncit. Yang tau gimana caranya mungkin bisa share ;)</span>'),
(5, 20, 10, 1494907918, 3, 'Perut Buncit', 'sis.. gan.. ada yang tau penyebab dan cara mengatasi perut buncit??'),
(6, 24, 15, 1496077496, 1, 'Fashion', 'Tempat diskusi dan membahas tren fashion, serta update informasi fashion terkini'),
(7, 22, 16, 1496078012, 0, 'Restaurant Review', 'Tempat berbagi pengalaman makan dan ulasan seputar resto (menu, tempat, promo).'),
(8, 15, 16, 1496078264, 0, 'Android', 'Diskusi khusus mengenai android'),
(9, 17, 18, 1496078918, 0, 'Pendidikan berbasis IT', 'Tempat untuk membahas pendidikan di bidang teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `forum_user`
--

CREATE TABLE `forum_user` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `url` varchar(50) DEFAULT NULL,
  `photo` varchar(30) NOT NULL,
  `member_date` int(11) NOT NULL,
  `lastup_date` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_user`
--

INSERT INTO `forum_user` (`user_id`, `fullname`, `password`, `email`, `url`, `photo`, `member_date`, `lastup_date`, `status`) VALUES
(11, 'Muhammad Mishlahul Umam', 'f941a5a78a5904ad4937066ce5d3e4c9', 'muh.mishlahul.umam@gmail.com', 'http://avengedsevenfold.com', 'user-11.jpg', 1493162338, 1493200329, 0),
(12, 'Yogi Nugraha', '938e14c074c45c62eb15cc05a6f36d79', 'yoginugraha@gmail.com', 'http://xxx.xxx.xxx', 'user-12.jpg', 1493194883, 1495646002, 0),
(13, 'Novi Amalia Ardha', 'ae5e3ce40e0404a45ecacaaf05e5f735', 'novi.ardha97@gmail.com', 'http://xxx.xxx.xxx', 'user-13.jpg', 1493196617, 1494305353, 0),
(14, 'Noni Wulandari', 'e37d9bad95b705cb0d0d864f0956a165', '6002noni@gmail.com', 'http://xxx.xxx.xxx', 'user-14.jpg', 1493197200, 1493197769, 0),
(15, 'Wendi Siswanto', '57a3a0c5796dd85a32fd9476b6f3362a', 'wendayyy@gmail.com', 'http://xxx.xxx.xxx', 'N', 1493198524, 1496077624, 0),
(16, 'Rizki Seftiana', '64fea43893b845d96ac6cb974b3a5d23', 'rizkiexoo@gmail.com', 'http://xxx.xxx.xxx', 'N', 1493198682, 1496078268, 0),
(17, 'Sri Mulyani', '702e4946e6db9b7a74b921fe85e83f32', 'srimulyani@gmail.com', 'http://xxx.xxx.xxx', 'user-17.jpg', 1493199051, 1493199191, 0),
(18, 'Anisah Nurul Qomariyah', '9088e8c69e4625a75b5068a3f77d777b', 'anisahicha@gmail.com', 'http://xxx.xxx.xxx', 'user-18.jpg', 1493199384, 1495922705, 1),
(19, 'Muhammad Mishlahul Umam', '80f50b0fcc9dcc02abbb604e4d0d7489', 'mishlahulumam1118@gmail.com', 'www.avengedsevenfold.com', 'user-19.jpg', 1494536886, 1495922814, 0),
(20, 'Tiara Kristin', '4600bb8b66b6a2af771fbb0566732196', 'tiara.kristin@gmail.com', ' ', 'N', 1495644984, 1495648616, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forum_admin`
--
ALTER TABLE `forum_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `forum_category`
--
ALTER TABLE `forum_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `forum_reply`
--
ALTER TABLE `forum_reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `forum_topic`
--
ALTER TABLE `forum_topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `forum_user`
--
ALTER TABLE `forum_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forum_admin`
--
ALTER TABLE `forum_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum_category`
--
ALTER TABLE `forum_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `forum_reply`
--
ALTER TABLE `forum_reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `forum_topic`
--
ALTER TABLE `forum_topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `forum_user`
--
ALTER TABLE `forum_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
