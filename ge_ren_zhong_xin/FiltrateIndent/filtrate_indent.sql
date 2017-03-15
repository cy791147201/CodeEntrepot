-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-03-13 06:43:31
-- 服务器版本： 5.7.12-log
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filtrate_indent`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `u_id` int(11) NOT NULL,
  `u_name` char(19) NOT NULL,
  `u_pwd` char(32) NOT NULL,
  `sta` tinyint(4) NOT NULL,
  `r_time` char(11) NOT NULL,
  `l_time` char(11) NOT NULL,
  `l_ip` char(16) NOT NULL,
  `jurisdiction` char(5) NOT NULL,
  `w_add` int(11) NOT NULL,
  `w_upd` int(11) DEFAULT NULL,
  `w_del` int(11) DEFAULT NULL,
  `grade` int(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`u_id`, `u_name`, `u_pwd`, `sta`, `r_time`, `l_time`, `l_ip`, `jurisdiction`, `w_add`, `w_upd`, `w_del`, `grade`) VALUES
(1, 'shenshuang', 'a0d0a782871ffa5f8fdb5baab61e29a8', 1, '1', '1489387112', '127.0.0.1', 'admin', 0, 1, NULL, 0),
(75, 'shenshuang1', '52cf666b703be579d3f7568282d2934e', 1, '1489385102', '1489386998', '127.0.0.1', 'user', 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `screen`
--

CREATE TABLE `screen` (
  `s_id` int(11) NOT NULL,
  `w_ad` int(11) NOT NULL,
  `a_t` char(11) NOT NULL,
  `w_upd` int(11) DEFAULT NULL,
  `u_t` char(11) DEFAULT NULL,
  `s_tag` int(11) NOT NULL,
  `s_act` int(2) NOT NULL COMMENT '1用户缺失2快递缺失3问题件4更新用户表',
  `e_val` varchar(3) NOT NULL,
  `u_val` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `sta` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `self_data`
--

CREATE TABLE `self_data` (
  `d_id` int(11) NOT NULL,
  `d_tags` varchar(64) NOT NULL,
  `upd` varchar(64) DEFAULT NULL,
  `l0` varchar(32) NOT NULL,
  `l1` varchar(32) NOT NULL,
  `l2` varchar(64) NOT NULL,
  `l3` varchar(32) NOT NULL,
  `l4` varchar(32) NOT NULL,
  `l5` varchar(32) NOT NULL,
  `l6` varchar(32) NOT NULL,
  `l7` varchar(32) NOT NULL,
  `l8` varchar(32) NOT NULL,
  `l9` varchar(32) NOT NULL,
  `l10` varchar(32) NOT NULL,
  `l11` varchar(32) NOT NULL,
  `l12` varchar(32) NOT NULL,
  `l13` varchar(32) NOT NULL,
  `l14` varchar(32) NOT NULL,
  `l15` varchar(32) NOT NULL,
  `l16` varchar(32) NOT NULL,
  `l17` varchar(32) NOT NULL,
  `l18` varchar(32) NOT NULL,
  `l19` varchar(32) NOT NULL,
  `l20` varchar(32) NOT NULL,
  `l21` varchar(32) NOT NULL,
  `l22` varchar(32) NOT NULL,
  `l23` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `self_data_tag`
--

CREATE TABLE `self_data_tag` (
  `t_id` int(11) NOT NULL,
  `d_tag` varchar(32) NOT NULL,
  `w_ad` int(11) NOT NULL,
  `a_t` int(11) NOT NULL,
  `w_s` int(11) DEFAULT NULL,
  `s_t` varchar(11) DEFAULT NULL,
  `e_hiatus` int(1) DEFAULT '0',
  `u_hiatus` int(1) DEFAULT '0',
  `issue` int(1) DEFAULT '0',
  `upd` int(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `self_temp`
--

CREATE TABLE `self_temp` (
  `id` int(11) NOT NULL,
  `w_ad` int(11) NOT NULL,
  `a_t` char(11) NOT NULL,
  `w_upd` int(10) DEFAULT NULL,
  `u_t` char(11) DEFAULT NULL,
  `tag` int(11) NOT NULL,
  `sta` int(1) NOT NULL,
  `line` int(11) NOT NULL,
  `l_val` char(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yuantong_data`
--

CREATE TABLE `yuantong_data` (
  `d_id` int(11) NOT NULL,
  `d_tags` varchar(64) NOT NULL,
  `l0` varchar(32) NOT NULL,
  `l1` varchar(32) NOT NULL,
  `l2` varchar(64) NOT NULL,
  `l3` varchar(32) NOT NULL,
  `l4` varchar(32) NOT NULL,
  `l5` varchar(32) NOT NULL,
  `l6` varchar(32) NOT NULL,
  `l7` varchar(32) NOT NULL,
  `l8` varchar(32) NOT NULL,
  `l9` varchar(32) NOT NULL,
  `l10` varchar(32) NOT NULL,
  `l11` varchar(32) NOT NULL,
  `l12` varchar(32) NOT NULL,
  `l13` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yuantong_data_tag`
--

CREATE TABLE `yuantong_data_tag` (
  `t_id` int(11) NOT NULL,
  `d_tag` varchar(32) NOT NULL,
  `w_ad` int(11) NOT NULL,
  `a_t` int(11) NOT NULL,
  `w_s` int(11) DEFAULT NULL,
  `s_t` varchar(11) DEFAULT NULL,
  `e_hiatus` int(1) DEFAULT '0',
  `u_hiatus` int(1) DEFAULT '0',
  `issue` int(1) DEFAULT '0',
  `upd` int(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yuantong_temp`
--

CREATE TABLE `yuantong_temp` (
  `id` int(11) NOT NULL,
  `w_ad` int(11) NOT NULL,
  `a_t` char(11) NOT NULL,
  `w_upd` int(10) DEFAULT NULL,
  `u_t` char(11) DEFAULT NULL,
  `tag` int(11) NOT NULL,
  `sta` int(1) NOT NULL,
  `line` int(11) NOT NULL,
  `l_val` char(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_name` (`u_name`),
  ADD UNIQUE KEY `u_id_2` (`u_id`),
  ADD KEY `u_id` (`u_id`,`u_name`,`u_pwd`,`sta`,`jurisdiction`,`grade`);

--
-- Indexes for table `screen`
--
ALTER TABLE `screen`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `s_id_3` (`s_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `s_id_2` (`s_id`,`s_tag`,`e_val`,`u_val`,`name`,`sta`);

--
-- Indexes for table `self_data`
--
ALTER TABLE `self_data`
  ADD PRIMARY KEY (`d_id`),
  ADD UNIQUE KEY `d_id` (`d_id`),
  ADD KEY `l2` (`l2`),
  ADD KEY `l4` (`l4`),
  ADD KEY `l5` (`l5`),
  ADD KEY `l6` (`l6`),
  ADD KEY `l7` (`l7`),
  ADD KEY `l8` (`l8`),
  ADD KEY `l9` (`l9`);

--
-- Indexes for table `self_data_tag`
--
ALTER TABLE `self_data_tag`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `t_id_3` (`t_id`),
  ADD UNIQUE KEY `d_tag_2` (`d_tag`),
  ADD KEY `t_id` (`t_id`),
  ADD KEY `d_tag` (`d_tag`),
  ADD KEY `t_id_2` (`t_id`,`d_tag`);

--
-- Indexes for table `self_temp`
--
ALTER TABLE `self_temp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_3` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `tag` (`tag`),
  ADD KEY `line` (`line`),
  ADD KEY `l_name` (`l_val`),
  ADD KEY `sta` (`sta`),
  ADD KEY `id_2` (`id`,`tag`,`sta`,`line`,`l_val`);

--
-- Indexes for table `yuantong_data`
--
ALTER TABLE `yuantong_data`
  ADD PRIMARY KEY (`d_id`),
  ADD UNIQUE KEY `d_id_2` (`d_id`),
  ADD KEY `l1` (`l1`),
  ADD KEY `d_tags` (`d_tags`),
  ADD KEY `d_id` (`d_id`),
  ADD KEY `l10` (`l10`);

--
-- Indexes for table `yuantong_data_tag`
--
ALTER TABLE `yuantong_data_tag`
  ADD PRIMARY KEY (`t_id`),
  ADD UNIQUE KEY `t_id_3` (`t_id`),
  ADD UNIQUE KEY `d_tag_2` (`d_tag`),
  ADD KEY `t_id` (`t_id`),
  ADD KEY `d_tag` (`d_tag`),
  ADD KEY `t_id_2` (`t_id`,`d_tag`);

--
-- Indexes for table `yuantong_temp`
--
ALTER TABLE `yuantong_temp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_3` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `tag` (`tag`),
  ADD KEY `line` (`line`),
  ADD KEY `l_name` (`l_val`),
  ADD KEY `sta` (`sta`),
  ADD KEY `id_2` (`id`,`tag`,`sta`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- 使用表AUTO_INCREMENT `screen`
--
ALTER TABLE `screen`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `self_data`
--
ALTER TABLE `self_data`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `self_data_tag`
--
ALTER TABLE `self_data_tag`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `self_temp`
--
ALTER TABLE `self_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `yuantong_data`
--
ALTER TABLE `yuantong_data`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `yuantong_data_tag`
--
ALTER TABLE `yuantong_data_tag`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `yuantong_temp`
--
ALTER TABLE `yuantong_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
