-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-02-28 07:27:20
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kefuchoujiang`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `user` char(20) NOT NULL,
  `pwd` char(32) NOT NULL,
  `grade` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `user`, `pwd`, `grade`, `status`) VALUES
(1, 'shenshuang', '552e190abdbb090600b47727e9e53ab3', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `indent`
--

CREATE TABLE `indent` (
  `id` int(9) NOT NULL,
  `user` char(30) NOT NULL,
  `prize` varchar(10) NOT NULL,
  `tel` char(11) NOT NULL,
  `address` text NOT NULL,
  `combo` text NOT NULL,
  `money` int(5) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1用户提交2管理员修改8未处理已删除9以处理已删除',
  `add_time` char(11) NOT NULL,
  `who_upd` char(30) NOT NULL,
  `upd_time` char(11) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `indent`
--

INSERT INTO `indent` (`id`, `user`, `prize`, `tel`, `address`, `combo`, `money`, `status`, `add_time`, `who_upd`, `upd_time`, `url`) VALUES
(1, '0', '手套', '1111111', '0', '0', 0, 8, '1481881836', '1', '1482043319', 'http://lyj1209a.shi-teng.cn/ceshichoujiang/'),
(2, '0', '手套', '111', '0', '0', 0, 8, '1481890901', '1', '1482043317', 'http://localhost/ceshichoujiang/'),
(3, '0', '皮带', '1111', '0', '0', 0, 8, '1481890947', '1', '1482043315', 'http://localhost/ceshichoujiang/'),
(4, '0', '皮带', '1111', '0', '0', 0, 8, '1481891003', '1', '1482043313', 'http://localhost/ceshichoujiang/'),
(5, '0', '围巾', '11111111', '0', '0', 0, 8, '1481891042', '1', '1482043311', 'http://localhost/ceshichoujiang/'),
(6, '0', '围巾', '1111', '0', '0', 0, 8, '1481891114', '1', '1482043309', 'http://localhost/ceshichoujiang/'),
(7, '0', '无', '333333333', '0', '0', 0, 8, '1481892213', '1', '1482043307', 'http://localhost/ceshichoujiang/'),
(8, '111111', '无', '333333', '222222', '0', 0, 8, '1481892311', '1', '1482043305', 'http://localhost/ceshichoujiang/'),
(9, '333333', '围巾', '111111', '2222222', '0', 0, 8, '1481892337', '1', '1482043303', 'http://localhost/ceshichoujiang/'),
(10, '2111', '无', '0', '222222222', '0', 0, 8, '1481895235', '1', '1482043302', 'http://localhost/ceshichoujiang/'),
(11, '姓名', '无', '0', '地址', '0', 0, 8, '1481895279', '1', '1482043300', 'http://localhost/ceshichoujiang/'),
(12, '姓名', '无', '1111111', '地址', '0', 0, 8, '1481895316', '1', '1482043298', 'http://localhost/ceshichoujiang/'),
(13, '申爽', '围巾', '2147483647', '北京', '0', 0, 8, '1481895510', '1', '1482043296', 'http://localhost/ceshichoujiang/'),
(14, '申爽', '手套', '13231955653', '北京', '0', 0, 8, '1481895557', '1', '1482043294', 'http://localhost/ceshichoujiang/'),
(15, '0', '手套', '11111', '0', '0', 0, 8, '1481966933', '1', '1482043292', 'http://localhost/ceshichoujiang/'),
(16, '0', '围巾', '111', '0', '0', 0, 8, '1481967742', '1', '1482043290', 'http://localhost/ceshichoujiang/'),
(17, '0', '无', '111', '0', '0', 0, 8, '1481967983', '1', '1482043288', 'http://localhost/ceshichoujiang/'),
(18, '0', '无', '11111', '0', '0', 0, 8, '1481967997', '1', '1482043286', 'http://localhost/ceshichoujiang/'),
(19, '0', '无', '11111111', '0', '0', 0, 8, '1481968013', '1', '1482043284', 'http://localhost/ceshichoujiang/'),
(20, '0', '无', '1111', '0', '0', 0, 8, '1481968074', '1', '1482043281', 'http://localhost/ceshichoujiang/'),
(21, '0', '无', '1111', '0', '0', 0, 8, '1481968095', '1', '1482043272', 'http://localhost/ceshichoujiang/'),
(22, '0', '无', '111111', '0', '0', 0, 8, '1481968139', '1', '1482043270', 'http://localhost/ceshichoujiang/'),
(23, '0', '无', '11111', '0', '0', 0, 8, '1481968160', '1', '1482043268', 'http://localhost/ceshichoujiang/'),
(24, '0', '无', '', '0', '0', 0, 8, '1481968551', '1', '1482043262', 'http://localhost/ceshichoujiang/'),
(25, '0', '无', '', '0', '0', 0, 8, '1481968582', '1', '1482043260', 'http://localhost/ceshichoujiang/'),
(26, '0', '无', '', '0', '0', 0, 8, '1481968679', '1', '1482043258', 'http://localhost/ceshichoujiang/'),
(27, '0', '无', '', '0', '0', 0, 8, '1481968704', '1', '1482043256', 'http://localhost/ceshichoujiang/'),
(28, '0', '无', '', '0', '0', 0, 8, '1481971089', '1', '1482043254', 'http://localhost/ceshichoujiang/'),
(29, '0', '无', '', '0', '0', 0, 8, '1481971103', '1', '1482043252', 'http://localhost/ceshichoujiang/'),
(30, '0', '无', '', '0', '0', 0, 8, '1481971194', '1', '1482043150', 'http://localhost/ceshichoujiang/'),
(31, '0', '无', '13231955653', '0', '0', 0, 1, '1481971354', '0', '', 'http://localhost/ceshichoujiang/'),
(32, '0', '围巾', '13231955653', '0', '0', 0, 1, '1481971420', '0', '', 'http://localhost/ceshichoujiang/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `pwd` (`pwd`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `indent`
--
ALTER TABLE `indent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `status` (`status`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `indent`
--
ALTER TABLE `indent`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
