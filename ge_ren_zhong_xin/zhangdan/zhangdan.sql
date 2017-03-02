-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-01-17 06:25:14
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zhangdan`
--

-- --------------------------------------------------------

--
-- 表的结构 `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `name` char(20) NOT NULL,
  `pwd` char(33) NOT NULL,
  `sta` tinyint(1) DEFAULT '1',
  `reg_time` char(11) NOT NULL,
  `last_time` char(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admins`
--

INSERT INTO `admins` (`id`, `name`, `pwd`, `sta`, `reg_time`, `last_time`) VALUES
(1, 'shenshuang', 'a0d0a782871ffa5f8fdb5baab61e29a8', 1, '1484115648', '1484618914');

-- --------------------------------------------------------

--
-- 表的结构 `classify`
--

CREATE TABLE `classify` (
  `ids` int(10) NOT NULL,
  `names` char(10) NOT NULL,
  `stas` tinyint(1) NOT NULL,
  `users` char(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `hua_fei_info`
--

CREATE TABLE `hua_fei_info` (
  `id` int(10) NOT NULL,
  `name` char(10) NOT NULL,
  `classify` int(10) NOT NULL,
  `money` int(6) NOT NULL,
  `sta` tinyint(1) NOT NULL,
  `time` char(11) NOT NULL,
  `upd_time` char(11) DEFAULT NULL,
  `user` char(20) NOT NULL,
  `more` char(20) DEFAULT '暂无'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `pwd` (`pwd`),
  ADD KEY `sta` (`sta`);

--
-- Indexes for table `classify`
--
ALTER TABLE `classify`
  ADD PRIMARY KEY (`ids`),
  ADD KEY `sta` (`stas`),
  ADD KEY `names` (`names`);

--
-- Indexes for table `hua_fei_info`
--
ALTER TABLE `hua_fei_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sta` (`sta`),
  ADD KEY `time` (`time`),
  ADD KEY `upd_time` (`upd_time`),
  ADD KEY `money` (`money`),
  ADD KEY `user` (`user`),
  ADD KEY `more` (`more`),
  ADD KEY `classify` (`classify`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `classify`
--
ALTER TABLE `classify`
  MODIFY `ids` int(10) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `hua_fei_info`
--
ALTER TABLE `hua_fei_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
