-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2016-12-11 09:26:35
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nxw`
--

-- --------------------------------------------------------

--
-- 表的结构 `nxw_advert`
--

CREATE TABLE `nxw_advert` (
  `id` int(11) UNSIGNED NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `target` enum('_blank','_self') NOT NULL,
  `description` mediumtext NOT NULL,
  `sort_order` mediumint(5) NOT NULL DEFAULT '0',
  `create_time` int(10) NOT NULL,
  `type` enum('幻灯片','广告') NOT NULL DEFAULT '幻灯片'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='广告幻灯片表-alizi.net';

--
-- 转存表中的数据 `nxw_advert`
--

INSERT INTO `nxw_advert` (`id`, `pid`, `name`, `banner`, `image`, `link`, `status`, `target`, `description`, `sort_order`, `create_time`, `type`) VALUES
(1, 0, '云南贡茶', '/201509/56bf544bdb9cd.jpg', '/201509/5607ef1848e42.jpg', 'javascript:;', 1, '_self', '', 0, 1443360670, '幻灯片'),
(2, 0, '台湾美食', '/201509/56bf54a7f3738.jpg', '/201509/5607ef23d8713.jpg', 'javascript:;', 1, '_self', '', 0, 1443360670, '幻灯片');

-- --------------------------------------------------------

--
-- 表的结构 `nxw_alipay_log`
--

CREATE TABLE `nxw_alipay_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pay_type` tinyint(1) NOT NULL DEFAULT '1',
  `discount` mediumint(5) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `trade_no` varchar(64) NOT NULL,
  `buyer_email` varchar(32) DEFAULT NULL,
  `gmt_create` datetime DEFAULT NULL,
  `notify_type` varchar(50) DEFAULT NULL,
  `quantity` mediumint(5) DEFAULT NULL,
  `out_trade_no` varchar(32) NOT NULL,
  `seller_id` varchar(30) DEFAULT NULL,
  `notify_time` datetime NOT NULL,
  `trade_status` varchar(50) NOT NULL DEFAULT '',
  `is_total_fee_adjust` char(1) DEFAULT NULL,
  `total_fee` decimal(8,2) NOT NULL,
  `gmt_payment` datetime DEFAULT NULL,
  `seller_email` varchar(32) NOT NULL DEFAULT '',
  `price` decimal(10,2) DEFAULT NULL,
  `buyer_id` varchar(30) DEFAULT NULL,
  `notify_id` varchar(32) DEFAULT NULL,
  `use_coupon` char(1) DEFAULT NULL,
  `sign_type` varchar(32) DEFAULT NULL,
  `sign` varchar(50) DEFAULT NULL,
  `body` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='支付宝支付记录-alizi.net';

-- --------------------------------------------------------

--
-- 表的结构 `nxw_article`
--

CREATE TABLE `nxw_article` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(12) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `brief` text,
  `tags` varchar(100) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `content` longtext NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `is_frozen` tinyint(1) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL,
  `add_time` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='产品表-alizi.net';

--
-- 转存表中的数据 `nxw_article`
--

INSERT INTO `nxw_article` (`id`, `category_id`, `name`, `brief`, `tags`, `image`, `status`, `sort_order`, `content`, `is_delete`, `is_frozen`, `update_time`, `add_time`) VALUES
(1, 3, '楠溪王订单系统', '1、自适应电脑和手机界面，不必再多此一举区分两个版本。\r\n2、独立后台方便管理，产品可在后台上传修改，订单可导出Excel表。\r\n3、集成多种支付方式：①支付宝即时到账；②微信支付；③个人二维码付款；④货到付款；⑤银行转账。\r\n4、精美的模板，非市面上粗俗烂作的模板与之可比；模板可随意切换且能自定义样式，让您的页面总是与众不同。\r\n5、防刷单防丢单，邮件即时通知。\r\n6、可计算运费，设置推广渠道，物流查询等等……', '', '/201509/56e2dad3193a5.jpg', 1, 0, '<span style="font-family:\'Microsoft YaHei\', tahoma, Simsun, \'Arial Unicode MS\', Mingliu, Arial, Helvetica;font-size:18px;line-height:2;">1、自适应电脑和手机界面，不必再多此一举区分两个版本。</span><br />\r\n<span style="font-family:\'Microsoft YaHei\', tahoma, Simsun, \'Arial Unicode MS\', Mingliu, Arial, Helvetica;font-size:18px;line-height:2;">2、独立后台方便管理，产品可在后台上传修改，订单可导出Excel表。</span><br />\r\n<span style="font-family:\'Microsoft YaHei\', tahoma, Simsun, \'Arial Unicode MS\', Mingliu, Arial, Helvetica;font-size:18px;line-height:2;">3、集成多种支付方式：①支付宝即时到账；②微信支付；③个人二维码付款；</span><span style="font-family:\'Microsoft YaHei\', tahoma, Simsun, \'Arial Unicode MS\', Mingliu, Arial, Helvetica;font-size:18px;line-height:2;">④货到付款；⑤银行转账。</span><br />\r\n<span style="font-family:\'Microsoft YaHei\', tahoma, Simsun, \'Arial Unicode MS\', Mingliu, Arial, Helvetica;font-size:18px;line-height:2;">4、精美的模板，非市面上粗俗烂作的模板与之可比；</span><span style="font-family:\'Microsoft YaHei\', tahoma, Simsun, \'Arial Unicode MS\', Mingliu, Arial, Helvetica;font-size:18px;line-height:2;">模板可随意切换且能自定义样式，让您的页面总是与众不同。</span><br />\r\n<span style="font-family:\'Microsoft YaHei\', tahoma, Simsun, \'Arial Unicode MS\', Mingliu, Arial, Helvetica;font-size:18px;line-height:2;">5、防刷单防丢单，邮件即时通知。</span><br />\r\n<span style="font-family:\'Microsoft YaHei\', tahoma, Simsun, \'Arial Unicode MS\', Mingliu, Arial, Helvetica;font-size:18px;line-height:2;">6、可计算运费，设置推广渠道，物流查询等等……</span>', 0, 0, 1459237118, 1459236989);

-- --------------------------------------------------------

--
-- 表的结构 `nxw_category`
--

CREATE TABLE `nxw_category` (
  `id` int(12) UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` mediumint(5) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='产品分类表-alizi.net';

--
-- 转存表中的数据 `nxw_category`
--

INSERT INTO `nxw_category` (`id`, `name`, `type`, `sort_order`) VALUES
(1, '特产美食', 1, 0),
(2, '精美礼品', 1, 0),
(3, '关于楠溪王', 2, 0);

-- --------------------------------------------------------

--
-- 表的结构 `nxw_code`
--

CREATE TABLE `nxw_code` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `item_id` int(12) NOT NULL DEFAULT '0',
  `code` varchar(10) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `add_time` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `nxw_comments`
--

CREATE TABLE `nxw_comments` (
  `id` bigint(20) NOT NULL,
  `item_id` int(12) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(25) NOT NULL,
  `region` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `reply_content` text,
  `add_time` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论表-alizi.net';

-- --------------------------------------------------------

--
-- 表的结构 `nxw_goods`
--

CREATE TABLE `nxw_goods` (
  `id` int(6) NOT NULL,
  `g_id` char(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `nxw_goods`
--

INSERT INTO `nxw_goods` (`id`, `g_id`, `user_id`, `sort_order`) VALUES
(1, 'Gid16381663266', 1, 0),
(2, 'Gid16421623202', 1, 0),
(3, 'Gid16440056006', 1, 0),
(4, 'Gid16463496429', 1, 0),
(5, 'Gid16471799903', 1, 0),
(6, 'Gid16485318317', 1, 0),
(7, 'Gid16501332065', 1, 0),
(8, 'Gid16511448270', 1, 0),
(9, 'Gid16532287880', 1, 0),
(10, 'Gid16540444128', 1, 0),
(11, 'Gid16542848198', 1, 0),
(12, 'Gid16545625159', 1, 0),
(13, 'Gid16551623758', 1, 0),
(14, 'Gid16554551968', 1, 0),
(15, 'Gid16564315029', 1, 0),
(16, 'Gid16565992208', 1, 0),
(17, 'Gid16572883260', 1, 0),
(18, 'Gid16574274157', 1, 0),
(19, 'Gid16582876902', 1, 0),
(20, 'Gid17051116685', 1, 0),
(21, 'Gid17053317771', 1, 0),
(22, 'Gid17093030776', 1, 0),
(23, 'Gid17102475231', 1, 0),
(24, 'Gid17110289805', 1, 0),
(25, 'Gid17110797110', 1, 0),
(26, 'Gid17110947061', 1, 0),
(27, 'Gid17111071492', 1, 0),
(28, 'Gid17112684827', 1, 0),
(29, 'Gid17124120538', 1, 0),
(30, 'Gid17165890615', 1, 0),
(31, 'Gid17174724132', 1, 0),
(32, 'Gid17210324194', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `nxw_item`
--

CREATE TABLE `nxw_item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `g_id` char(15) NOT NULL,
  `b_s` tinyint(3) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `sn` char(15) NOT NULL,
  `category_id` int(12) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `brief` varchar(255) NOT NULL DEFAULT '',
  `tags` varchar(100) NOT NULL DEFAULT '',
  `original_price` int(5) NOT NULL,
  `price` int(5) NOT NULL COMMENT '价格',
  `salenum` int(12) NOT NULL DEFAULT '0',
  `qrcode_pay` tinyint(1) NOT NULL DEFAULT '0',
  `qrcode_pay_info` text,
  `qrcode` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `thumb` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `is_hot` tinyint(1) NOT NULL DEFAULT '0',
  `is_big` tinyint(1) NOT NULL DEFAULT '0',
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `params` text COMMENT '套餐属性',
  `params_type` enum('radio','select') DEFAULT NULL,
  `options` text,
  `extends` text,
  `content` longtext,
  `payment` varchar(255) DEFAULT '',
  `shipping_id` int(12) NOT NULL DEFAULT '0',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `is_sent` tinyint(1) NOT NULL DEFAULT '0',
  `is_auto_send` tinyint(1) NOT NULL DEFAULT '0',
  `send_content` text,
  `sms_send` text,
  `update_time` int(10) NOT NULL,
  `add_time` int(10) NOT NULL,
  `web_t` varchar(30) DEFAULT NULL,
  `cont1` varchar(30) DEFAULT NULL,
  `cont2` varchar(30) DEFAULT NULL,
  `cont3` varchar(30) DEFAULT NULL,
  `tit` varchar(30) DEFAULT NULL,
  `tit_img` text,
  `num` int(9) DEFAULT NULL,
  `dao_time` int(1) DEFAULT NULL,
  `qiang` varchar(10) DEFAULT NULL,
  `q_info` text,
  `buy` varchar(10) DEFAULT NULL,
  `b_info` text,
  `chan` varchar(10) DEFAULT NULL,
  `c_info` text,
  `ser` varchar(10) DEFAULT NULL,
  `s_info` text,
  `tel_t1` varchar(10) DEFAULT NULL,
  `tel1` char(11) DEFAULT NULL,
  `tel_t2` varchar(10) DEFAULT NULL,
  `tel2` char(11) DEFAULT NULL,
  `sms_t` varchar(10) NOT NULL,
  `sms` char(11) NOT NULL,
  `in_t` varchar(10) NOT NULL,
  `in_in` varchar(128) DEFAULT NULL,
  `ft_img` varchar(128) DEFAULT NULL,
  `comp` varchar(30) NOT NULL,
  `path` varchar(128) DEFAULT NULL,
  `s` int(4) NOT NULL DEFAULT '0',
  `wid` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='产品表-alizi.net';

--
-- 转存表中的数据 `nxw_item`
--

INSERT INTO `nxw_item` (`id`, `g_id`, `b_s`, `user_id`, `sn`, `category_id`, `name`, `brief`, `tags`, `original_price`, `price`, `salenum`, `qrcode_pay`, `qrcode_pay_info`, `qrcode`, `image`, `thumb`, `status`, `is_hot`, `is_big`, `sort_order`, `params`, `params_type`, `options`, `extends`, `content`, `payment`, `shipping_id`, `is_delete`, `is_sent`, `is_auto_send`, `send_content`, `sms_send`, `update_time`, `add_time`, `web_t`, `cont1`, `cont2`, `cont3`, `tit`, `tit_img`, `num`, `dao_time`, `qiang`, `q_info`, `buy`, `b_info`, `chan`, `c_info`, `ser`, `s_info`, `tel_t1`, `tel1`, `tel_t2`, `tel2`, `sms_t`, `sms`, `in_t`, `in_in`, `ft_img`, `comp`, `path`, `s`, `wid`) VALUES
(1, 'Gid16381663266', 1, 1, '7HPqX0qS', 1, '11', '', '', 111, 11, 0, 0, '', '', '', '', 1, 1, 0, 0, '[{"title":"m#\\u7537","price":"11","image":"\\/201612\\/584d10d6b17f2.jpg","qrcode":""},{"title":"n#\\u5973","price":"22","image":"\\/201612\\/584d10df40ead.jpg","qrcode":""}]', 'radio', '', '[{"title":"m#\\u6b3e\\u5f0f","value":"1#2#3","type":"radio"},{"title":"n#\\u5973","value":"4#5#6","type":"radio"}]', '', '', 0, 0, 0, 0, '', 'null', 1481445640, 1481445497, '', '', '', '', '', '', 0, 1, '11', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 0, 0),
(3, 'Gid16440056006', 1, 1, '1V2ZKo5m', 1, '111', '', '', 111, 11, 0, 0, '', '', '', '', 1, 0, 0, 0, '[]', NULL, '', '', '', '', 0, 0, 0, 0, '', 'null', 0, 1481445840, '', '', '', '', '', '', NULL, 1, '11', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, 0, NULL),
(4, 'Gid16463496429', 1, 1, '2LBO9sZx', 1, '11', '', '', 111, 11, 0, 0, '', '', '', '', 1, 0, 0, 0, '[]', NULL, '', '', '', '', 0, 0, 0, 0, '', 'null', 0, 1481445994, '', '', '', '', '', '', NULL, 1, '11', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, 0, NULL),
(5, 'Gid16471799903', 1, 1, '2t6pJhab', 1, '111', '', '', 111, 11, 0, 0, '', '', '', '', 1, 0, 0, 0, '[]', NULL, '', '', '', '', 0, 0, 0, 0, '', 'null', 0, 1481446037, '', '', '', '', '', '', NULL, 1, '11', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, 0, NULL),
(6, 'Gid16532287880', 1, 1, '', 1, '11', '', '', 111, 11, 0, 0, '', '', '', '', 1, 1, 0, 0, '1111111111', NULL, '', '', '', '', 0, 0, 0, 0, '', '', 0, 1481446402, '', '', '', '', '', '', NULL, 1, '11', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, 0, NULL),
(7, 'Gid16574274157', 1, 1, '111', 1, '88', '', '', 111, 11, 0, 0, '', '', '', '', 1, 1, 0, 0, '<div class = "combo">[{"title":"m#\\u7537","price":"1","image":"\\/201612\\/584cea7c03893.jpg","qrcode":""},{"title":"n#\\u5973","price":"","image":"\\/201612\\/584cea82f2bbf.jpg","qrcode":""}]</div>', NULL, '', '', '', '', 0, 0, 0, 0, '', '', 0, 1481446662, '', '', '', '', '', '', NULL, 1, '11', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, 0, NULL),
(8, 'Gid16582876902', 1, 1, '11sasa1', 1, '88', '', '', 111, 11, 0, 0, '', '', '', '', 1, 1, 0, 0, '<div class = "combo">[{"title":"m#\\u7537","price":"1","image":"\\/201612\\/584cea7c03893.jpg","qrcode":""},{"title":"n#\\u5973","price":"","image":"\\/201612\\/584cea82f2bbf.jpg","qrcode":""}]</div>', NULL, '', '', '', '', 0, 0, 0, 0, '', '', 0, 1481446708, '', '', '', '', '', '', NULL, 1, '11', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, 0, NULL),
(9, 'Gid17112684827', 1, 1, '2H8OUe39', 1, '1', '', '', 111, 11, 0, 0, '', '', '', '', 1, 1, 0, 0, '<div class = "combo">[{"title":"m#\\u7537","price":"1","image":"\\/201612\\/584cea7c03893.jpg","qrcode":""},{"title":"n#\\u5973","price":"","image":"\\/201612\\/584cea82f2bbf.jpg","qrcode":""}]</div>', NULL, '', '', '', '', 0, 0, 0, 0, '', '', 0, 1481447486, '', '', '', '', '', '', NULL, 1, '11', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, 0, NULL),
(10, 'Gid17124120538', 1, 1, '4cIWzpxY', 1, '1', '', '', 111, 11, 0, 0, '', '', '', '', 1, 1, 0, 0, '[{"title":"m#\\u7537","price":"1","image":"\\/201612\\/584cea7c03893.jpg","qrcode":""},{"title":"n#\\u5973","price":"","image":"\\/201612\\/584cea82f2bbf.jpg","qrcode":""}]', NULL, '', '', '', '', 0, 0, 0, 0, '', '', 0, 1481447561, '', '', '', '', '', '', NULL, 1, '11', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, 0, NULL),
(11, 'Gid17165890615', 1, 1, '18l4yon1', 1, '111', '', '', 111, 11, 0, 0, '', '', '', '', 1, 1, 0, 0, '[{"title":"m#\\u7537","price":"1","image":"\\/201612\\/584cea7c03893.jpg","qrcode":""},{"title":"n#\\u5973","price":"","image":"\\/201612\\/584cea82f2bbf.jpg","qrcode":""}]', 'radio', '', '[{"title":"m#\\u6b3e\\u5f0f","value":"1#2#3","type":"radio"},{"title":"n#\\u6b3e\\u5f0f","value":"4#5#6","type":"radio"}]', '<p>{[AliziOrder]}</p>', '', 0, 0, 0, 0, '', 'null', 1481447850, 1481447818, '', '', '', '', '', '', 0, 1, '11', '', '', '', '', '', '', '', '', '', '', '', '', '', '1111111111', '', '', '', NULL, 0, 0),
(12, 'Gid17174724132', 1, 1, '6QPxjGQX', 1, '666666666', '', '', 111, 11, 0, 0, '', '', '', '', 1, 1, 0, 0, '[{"title":"m#\\u7537","price":"1","image":"\\/201612\\/584cea7c03893.jpg","qrcode":""},{"title":"n#\\u5973","price":"","image":"\\/201612\\/584cea82f2bbf.jpg","qrcode":""}]', 'radio', '', '[{"title":"m#\\u6b3e\\u5f0f","value":"1#2#3","type":"radio"},{"title":"n#\\u6b3e\\u5f0f","value":"4#5#6","type":"radio"}]', '<p>{[AliziOrder]}</p>', '', 0, 0, 0, 0, '', '', 0, 1481447867, '', '', '', '', '', '', NULL, 1, '11', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, 0, NULL),
(13, 'Gid17210324194', 1, 1, '5F1tVYCx', 1, '1111111', '', '', 111, 11, 0, 0, '', '', '', '', 1, 1, 0, 0, '[{"title":"m#\\u7537","price":"1","image":"\\/201612\\/584cea7c03893.jpg","qrcode":""},{"title":"n#\\u5973","price":"","image":"\\/201612\\/584cea82f2bbf.jpg","qrcode":""}]', 'radio', '', '[{"title":"m#\\u6b3e\\u5f0f","value":"1#2#3","type":"radio"},{"title":"n#\\u6b3e\\u5f0f","value":"4#5#6","type":"radio"}]', '<p>{[AliziOrder]}</p>', '', 0, 0, 0, 0, '', '', 0, 1481448208, '', '', '', '', '', '', NULL, 1, '11', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, 0, NULL),
(14, 'Gid16381663266', 2, 1, '2N6SlcUz', 1, '2222222', '', '', 111, 11, 0, 0, '', '', '', '', 0, 1, 0, 0, '[{"title":"m#\\u7537","price":"1","image":"\\/201612\\/584cea7c03893.jpg","qrcode":""},{"title":"n#\\u5973","price":"","image":"\\/201612\\/584cea82f2bbf.jpg","qrcode":""}]', 'radio', '', '[{"title":"m#\\u6b3e\\u5f0f","value":"1#2#3","type":"radio"},{"title":"n#\\u6b3e\\u5f0f","value":"4#5#6","type":"radio"}]', '<p>{[AliziOrder]}</p>', '', 0, 0, 0, 0, '', '', 0, 1481448089, '', '', '', '', '', '', NULL, 1, '11', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `nxw_item_group`
--

CREATE TABLE `nxw_item_group` (
  `item_id` int(12) NOT NULL,
  `group_id` int(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `nxw_item_template`
--

CREATE TABLE `nxw_item_template` (
  `id` bigint(20) NOT NULL COMMENT '产品id',
  `template` varchar(25) NOT NULL,
  `options` text NOT NULL,
  `width` varchar(20) NOT NULL DEFAULT '1',
  `show_notice` tinyint(1) NOT NULL DEFAULT '0',
  `show_comments` int(3) NOT NULL DEFAULT '0',
  `info` text,
  `color` varchar(255) NOT NULL,
  `redirect_uri` varchar(255) DEFAULT NULL,
  `extend` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='产品模板表-alizi.net';

--
-- 转存表中的数据 `nxw_item_template`
--

INSERT INTO `nxw_item_template` (`id`, `template`, `options`, `width`, `show_notice`, `show_comments`, `info`, `color`, `redirect_uri`, `extend`) VALUES
(2, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(3, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(5, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(6, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(7, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(8, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(9, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(10, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(11, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(12, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(13, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(14, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(15, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(16, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(1, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(4, 'thin', '["quantity","price","name","mobile","region","address","remark","payment"]', '750px', 0, 0, '', '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', '', 'a:3:{s:7:"padding";s:1:"0";s:10:"bottom_nav";s:1:"0";s:15:"bottom_nav_list";a:3:{i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}}'),
(17, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(18, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(19, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(20, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(21, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(22, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(23, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(24, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(25, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `nxw_order`
--

CREATE TABLE `nxw_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(12) NOT NULL,
  `user_pid` int(12) NOT NULL DEFAULT '0',
  `seller_id` int(12) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `order_no` varchar(20) NOT NULL,
  `order_page` varchar(15) NOT NULL DEFAULT 'single',
  `channel_id` varchar(20) DEFAULT NULL,
  `item_id` int(12) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_params` varchar(255) NOT NULL,
  `item_extends` text,
  `item_price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `order_price` decimal(12,2) NOT NULL,
  `shipping_price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `total_price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `quantity` mediumint(5) NOT NULL DEFAULT '1',
  `datetime` datetime NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `phone` varchar(20) NOT NULL DEFAULT '',
  `region` varchar(50) NOT NULL DEFAULT '',
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `zcode` varchar(10) NOT NULL DEFAULT '',
  `qq` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL DEFAULT '',
  `remark` varchar(100) NOT NULL,
  `payment` tinyint(1) NOT NULL DEFAULT '1',
  `payment_num` varchar(20) NOT NULL,
  `delivery_name` varchar(20) NOT NULL,
  `delivery_no` varchar(25) NOT NULL,
  `device` tinyint(1) NOT NULL DEFAULT '1',
  `add_ip` varchar(15) NOT NULL DEFAULT '',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `is_sent` tinyint(1) NOT NULL DEFAULT '0',
  `url` varchar(255) DEFAULT NULL,
  `referer` varchar(255) DEFAULT NULL,
  `add_time` int(10) NOT NULL,
  `update_time` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='产品订单表-alizi.net';

-- --------------------------------------------------------

--
-- 表的结构 `nxw_order_log`
--

CREATE TABLE `nxw_order_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `add_time` int(10) NOT NULL,
  `user_id` int(12) NOT NULL,
  `remark` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='产品订单记录表-alizi.net';

-- --------------------------------------------------------

--
-- 表的结构 `nxw_setting`
--

CREATE TABLE `nxw_setting` (
  `name` varchar(50) NOT NULL,
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='产品系统设置表-alizi.net';

--
-- 转存表中的数据 `nxw_setting`
--

INSERT INTO `nxw_setting` (`name`, `value`) VALUES
('title', '楠溪王订单管理系统'),
('keywords', '楠溪王订单管理系统'),
('logo_pc', ''),
('logo', ''),
('description', '楠溪王订单管理系统'),
('footer', 'Copyright © 2016 <a href=""  target="_blank">楠溪王</a> All Rights Reserved'),
('contact_tel', '13231955653'),
('contact_qq', ''),
('system_status', '1'),
('system_close_info', '/adminpanel123.php'),
('URL_MODEL', '0'),
('theme_color', 'ED145B'),
('system_template', 'thin'),
('order_options', '["price","quantity","payment","name","mobile","region","address","remark"]'),
('show_notice', '0'),
('record_order', '0'),
('repeat_order', '1'),
('slider_show', '1'),
('slider_num', '5'),
('item_hot_show', '1'),
('item_hot_num', '8'),
('item_category_show', '1'),
('item_category_num', '6'),
('item_category_id', '1,2'),
('show_header', '1'),
('show_bottom_nav', '1'),
('payment_global', '1'),
('payOnDelivery_status', '1'),
('payOnDelivery_fee', '0'),
('payOnDelivery_info', '安全放心'),
('bankpay_status', '0'),
('bankpay_discount', '0'),
('bankpay_info', '请联系在线客服获取银行账号'),
('alipay_status', '0'),
('alipay_type', '["1","2","3"]'),
('alipay_mail', ''),
('alipay_pid', ''),
('alipay_key', ''),
('alipay_discount', '1'),
('alipay_discount_info', '支付宝万岁'),
('wxpay_status', '0'),
('wxpay_appid', ''),
('wxpay_mchid', ''),
('wxpay_key', ''),
('wxpay_secret', ''),
('wxpay_type', '["1"]'),
('wxpay_discount', '1'),
('wxpay_discount_info', '使用微信支付'),
('mail_send', '0'),
('mail_proxy', '0'),
('mail_send_status', '["0","1","3"]'),
('mail_smtp', 'smtp.163.com'),
('mail_port', '25'),
('mail_account', ''),
('mail_password', ''),
('mail_to', 'admin@alizi.net'),
('mail_title', '[AliziStatus]：[AliziTitle]'),
('sms_send', '0'),
('sms_admin', '0'),
('sms_admin_mobile', ''),
('sms_account', ''),
('sms_password', ''),
('weixin_status', '0'),
('weixin_appid', ''),
('weixin_appsecret', ''),
('weixin_token', ''),
('weixin_encodingaeskey', ''),
('safe_mobile_limit', '20'),
('safe_order_interval', '20'),
('safe_ip_limit', '50'),
('delivery_setting', '["huitongkuaidi","debangwuliu","ems","rufengda","tiandihuayu","tiantian","jd","kuaijiesudi","shentong","shunfeng","yuantong","yunda","yuntongkuaidi","zhongtong","zhaijisong"]'),
('real_notice', '0'),
('lazyload', '0'),
('yunpay_status', '0'),
('yunpay_email', ''),
('yunpay_pid', ''),
('yunpay_key', ''),
('yunpay_discount', ''),
('yunpay_info', '');

-- --------------------------------------------------------

--
-- 表的结构 `nxw_shipping`
--

CREATE TABLE `nxw_shipping` (
  `id` int(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `less_num` tinyint(4) NOT NULL DEFAULT '1',
  `less_num_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `step_num` tinyint(3) NOT NULL DEFAULT '1',
  `step_num_cost` decimal(10,2) NOT NULL DEFAULT '1.00',
  `is_free_num` tinyint(1) NOT NULL DEFAULT '0',
  `is_free_cost` tinyint(1) NOT NULL DEFAULT '0',
  `free_num` mediumint(5) NOT NULL DEFAULT '0',
  `free_cost` decimal(12,2) NOT NULL DEFAULT '0.00',
  `update_time` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='运费模板-alizi.net';

--
-- 转存表中的数据 `nxw_shipping`
--

INSERT INTO `nxw_shipping` (`id`, `name`, `less_num`, `less_num_cost`, `step_num`, `step_num_cost`, `is_free_num`, `is_free_cost`, `free_num`, `free_cost`, `update_time`) VALUES
(1, '满100免运费', 2, '10.00', 1, '2.00', 1, 1, 50, '100.00', 1455506416);

-- --------------------------------------------------------

--
-- 表的结构 `nxw_user`
--

CREATE TABLE `nxw_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `pid` int(12) UNSIGNED NOT NULL DEFAULT '0',
  `group_id` int(12) NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  `role` enum('admin','member','agent') NOT NULL DEFAULT 'admin',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `realname` varchar(50) NOT NULL DEFAULT '',
  `mobile` varchar(15) NOT NULL,
  `qq` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `info` mediumtext NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `login_ip` char(16) NOT NULL,
  `login_time` datetime NOT NULL,
  `create_time` int(10) NOT NULL,
  `update_time` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='产品用户表-alizi.net';

--
-- 转存表中的数据 `nxw_user`
--

INSERT INTO `nxw_user` (`id`, `pid`, `group_id`, `username`, `password`, `role`, `status`, `realname`, `mobile`, `qq`, `email`, `info`, `is_delete`, `login_ip`, `login_time`, `create_time`, `update_time`) VALUES
(1, 0, 0, 'nanxiwang', 'e3b537f68e82fde4f580afcd2c215f2c', 'admin', 1, '', '', '', '', '', 0, '0.0.0.0', '2016-12-11 16:50:34', 1479016818, 0),
(2, 0, 0, 'nanxiwang', 'e3b537f68e82fde4f580afcd2c215f2c', 'admin', 1, '', '', '', '', '', 0, '', '0000-00-00 00:00:00', 1481118447, 0),
(3, 0, 0, 'nanxiwang', 'e3b537f68e82fde4f580afcd2c215f2c', 'admin', 1, '', '', '', '', '', 0, '', '0000-00-00 00:00:00', 1481435450, 0);

-- --------------------------------------------------------

--
-- 表的结构 `nxw_user_group`
--

CREATE TABLE `nxw_user_group` (
  `id` int(12) UNSIGNED NOT NULL,
  `role` enum('admin','agent') DEFAULT 'admin',
  `name` varchar(25) NOT NULL,
  `discount` tinyint(3) NOT NULL DEFAULT '100',
  `auth` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `nxw_user_log`
--

CREATE TABLE `nxw_user_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(25) NOT NULL,
  `login_ip` varchar(15) NOT NULL,
  `login_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nxw_advert`
--
ALTER TABLE `nxw_advert`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_3` (`id`),
  ADD KEY `pid` (`pid`),
  ADD KEY `status` (`status`),
  ADD KEY `sort_order` (`sort_order`);

--
-- Indexes for table `nxw_alipay_log`
--
ALTER TABLE `nxw_alipay_log`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `out_trade_no` (`out_trade_no`),
  ADD KEY `id` (`id`),
  ADD KEY `pay_type` (`pay_type`);

--
-- Indexes for table `nxw_article`
--
ALTER TABLE `nxw_article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`name`) USING BTREE,
  ADD KEY `id` (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `is_delete` (`is_delete`),
  ADD KEY `is_frozen` (`is_frozen`);

--
-- Indexes for table `nxw_category`
--
ALTER TABLE `nxw_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `sort_order` (`sort_order`);

--
-- Indexes for table `nxw_code`
--
ALTER TABLE `nxw_code`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mobile` (`mobile`),
  ADD KEY `id` (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `nxw_comments`
--
ALTER TABLE `nxw_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `nxw_goods`
--
ALTER TABLE `nxw_goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `g_id` (`g_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `sort_order` (`sort_order`);

--
-- Indexes for table `nxw_item`
--
ALTER TABLE `nxw_item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sn` (`sn`),
  ADD KEY `title` (`name`) USING BTREE,
  ADD KEY `id` (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status` (`status`),
  ADD KEY `is_delete` (`is_delete`),
  ADD KEY `is_sent` (`is_sent`),
  ADD KEY `is_auto_send` (`is_auto_send`),
  ADD KEY `s` (`s`),
  ADD KEY `g_id` (`g_id`),
  ADD KEY `b_s` (`b_s`),
  ADD KEY `is_hot` (`is_hot`),
  ADD KEY `is_big` (`is_big`),
  ADD KEY `sort_order` (`sort_order`);

--
-- Indexes for table `nxw_item_group`
--
ALTER TABLE `nxw_item_group`
  ADD KEY `item_id` (`item_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `nxw_item_template`
--
ALTER TABLE `nxw_item_template`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `nxw_order`
--
ALTER TABLE `nxw_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `is_delete` (`is_delete`),
  ADD KEY `is_sent` (`is_sent`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_pid` (`user_pid`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `order_no` (`order_no`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `add_ip` (`add_ip`);

--
-- Indexes for table `nxw_order_log`
--
ALTER TABLE `nxw_order_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `status` (`status`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `nxw_setting`
--
ALTER TABLE `nxw_setting`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `nxw_shipping`
--
ALTER TABLE `nxw_shipping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `nxw_user`
--
ALTER TABLE `nxw_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `id` (`id`),
  ADD KEY `password` (`password`),
  ADD KEY `status` (`status`),
  ADD KEY `is_delete` (`is_delete`),
  ADD KEY `pid` (`pid`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `nxw_user_group`
--
ALTER TABLE `nxw_user_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nxw_user_log`
--
ALTER TABLE `nxw_user_log`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `nxw_advert`
--
ALTER TABLE `nxw_advert`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `nxw_alipay_log`
--
ALTER TABLE `nxw_alipay_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `nxw_article`
--
ALTER TABLE `nxw_article`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `nxw_category`
--
ALTER TABLE `nxw_category`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `nxw_code`
--
ALTER TABLE `nxw_code`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `nxw_comments`
--
ALTER TABLE `nxw_comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `nxw_goods`
--
ALTER TABLE `nxw_goods`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- 使用表AUTO_INCREMENT `nxw_item`
--
ALTER TABLE `nxw_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 使用表AUTO_INCREMENT `nxw_order`
--
ALTER TABLE `nxw_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `nxw_order_log`
--
ALTER TABLE `nxw_order_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- 使用表AUTO_INCREMENT `nxw_shipping`
--
ALTER TABLE `nxw_shipping`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `nxw_user`
--
ALTER TABLE `nxw_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `nxw_user_group`
--
ALTER TABLE `nxw_user_group`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `nxw_user_log`
--
ALTER TABLE `nxw_user_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
