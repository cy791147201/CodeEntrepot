-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-02-17 02:02:01
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
-- 表的结构 `nxw_check`
--

CREATE TABLE `nxw_check` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `val` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='是否检测订单用户姓名手机号详细地址';

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
(3, 'Gid11273123835', 1, 0),
(6, 'Gid17414788266', 1, 0);

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
  `qiang` varchar(20) DEFAULT NULL,
  `q_info` text,
  `buy` varchar(20) DEFAULT NULL,
  `b_info` text,
  `chan` varchar(20) DEFAULT NULL,
  `c_info` text,
  `ser` varchar(20) DEFAULT NULL,
  `s_info` text,
  `tel_t1` varchar(20) DEFAULT NULL,
  `tel1` char(11) DEFAULT NULL,
  `tel_t2` varchar(20) DEFAULT NULL,
  `tel2` char(11) DEFAULT NULL,
  `sms_t` varchar(20) NOT NULL,
  `sms` char(11) NOT NULL,
  `in_t` varchar(20) NOT NULL,
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
(2, 'Gid11273123835', 1, 1, '2U1G0p', 2, '11111111', '', '', 999, 888, 502, 0, '', '', '', '', 1, 0, 0, 0, '[{"title":"\\u5957\\u99101#combo1","price":"1","image":"\\/201702\\/58a3f2b6b1a0c.jpg","qrcode":null},{"title":"\\u8863\\u670d1#goods1","price":"1","image":"\\/201702\\/58a3f2b6b1a0c.jpg","qrcode":null},{"title":"\\u5957\\u99102#combo2","price":"3","image":"\\/201702\\/589fdbe975a32.jpg","qrcode":null},{"title":"\\u8863\\u670d2#goods2","price":"4","image":"\\/201702\\/58a3ff80b0b72.jpg","qrcode":null}]', 'radio', NULL, '[{"title":"\\u8863\\u670d1#goods1\\/\\u989c\\u8272","value":"\\u7ea2\\u8272#\\u767d\\u8272#\\u7d2b\\u8272","type":"radio","image":""},{"title":"\\u8863\\u670d2#goods2\\/\\u989c\\u8272","value":"\\u9ed1\\u8272#\\u767d\\u8272#\\u7070\\u8272","type":"radio","image":""},{"title":"\\u5957\\u99102#combo2","value":"\\u8863\\u670d\\u4e8c","type":"radio","image":"\\/201702\\/58a570f4b62ee.jpg"},{"title":"\\u5957\\u99102#combo2property1\\/\\u8863\\u670d\\u4e00\\/\\u989c\\u8272","value":"\\u7ea2\\u8272#\\u767d\\u8272#\\u7d2b\\u8272","type":"radio","image":""},{"title":"\\u5957\\u99102#combo2property1\\/\\u8863\\u670d\\u4e00\\/\\u5c3a\\u7801","value":"1#2#3","type":"radio","image":""},{"title":"\\u5957\\u99102#combo2property1\\/\\u8863\\u670d\\u4e00\\/\\u989c\\u8272","value":"\\u7ea2\\u8272#\\u767d\\u8272#\\u7d2b\\u8272","type":"radio","image":""},{"title":"\\u5957\\u99102#combo2property1\\/\\u8863\\u670d\\u4e00\\/\\u5c3a\\u7801","value":"1#2#3","type":"radio","image":""},{"title":"\\u5957\\u99102#combo2","value":"\\u8863\\u670d\\u4e00","type":"radio","image":"\\/201702\\/58a570f962ff0.jpg"}]', '<p>{[AliziOrder]}</p>', '', 0, 0, 0, 0, '', 'null', 1487237401, 1484796451, '', '', '', '', '', '', 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '在线下单', '', '', '', 'http://shenshuang.geren.com/nanxiwang/Html/Gid11273123835/index', 0, 1000),
(5, 'Gid17414788266', 1, 1, '8Loon6', 1, '222222222', '', '', 2222, 22, 0, 0, '', '', '', '', 1, 0, 0, 0, '[{"title":"a#aa","price":"1111","image":"\\/201702\\/58a02db9193e8.jpg","qrcode":null}]', 'radio', NULL, '[{"title":"a#\\u652f\\u6301","value":"\\u7ea2\\u8272#\\u767d\\u8272#\\u7d2b\\u8272","type":"radio","image":""},{"title":"a#\\u989c\\u8272","value":"\\u7ea2\\u8272#\\u767d\\u8272#\\u7d2b\\u8272","type":"radio","image":""}]', '<p>{[AliziOrder]}</p>', '', 0, 0, 0, 0, '', 'null', 1486892521, 1486892507, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '<p>1</p>', '', '', NULL, 0, 0);

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
(1, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(2, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(3, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(4, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL),
(5, 'thin', '["price","quantity","payment","name","mobile","region","address","remark"]', '1', 1, 0, NULL, '{"body_bg":"F1F1F1","form_bg":"FFFFFF","title_bg":"666666","button_bg":"EE3300","font":"333333","border":"666666","nav_bg":"EE3300"}', NULL, NULL);

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
  `datetime` char(11) NOT NULL,
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

--
-- 转存表中的数据 `nxw_order`
--

INSERT INTO `nxw_order` (`id`, `user_id`, `user_pid`, `seller_id`, `status`, `order_no`, `order_page`, `channel_id`, `item_id`, `item_name`, `item_params`, `item_extends`, `item_price`, `order_price`, `shipping_price`, `total_price`, `quantity`, `datetime`, `name`, `mobile`, `phone`, `region`, `province`, `city`, `area`, `address`, `zcode`, `qq`, `mail`, `remark`, `payment`, `payment_num`, `delivery_name`, `delivery_no`, `device`, `add_ip`, `is_delete`, `is_sent`, `url`, `referer`, `add_time`, `update_time`) VALUES
(1, 1, 1, 1, 0, '895810768516', 'index', '', 2, '测试', 'b#bb', '{"a#\\u989c\\u8272":"\\u65e0","b#\\u989c\\u8272":"\\u65e0","a#\\u5c3a\\u5bf8":"\\u65e0","b#\\u5c3a\\u5bf8":"\\u65e0"}', '888.00', '200.00', '0.00', '200.00', 1, '1484818315', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Item&a=order&id=2U1G0p&gzid=11111', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=241745722726', 1484818315, 0),
(2, 1, 1, 1, 0, '404055905269', 'index', '', 2, '测试', 'b#bb', '{"a#\\u989c\\u8272":"\\u65e0","b#\\u989c\\u8272":"\\u7c89","a#\\u5c3a\\u5bf8":"\\u65e0","b#\\u5c3a\\u5bf8":"\\u8001"}', '888.00', '2000.00', '0.00', '2000.00', 10, '1484879612', '', '13231955565', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1484879612, 0),
(3, 1, 1, 1, 0, '173598563742', 'index', '', 3, '测试二', 'a#男', '{"a#\\u989c\\u8272":"\\u65e0","b#\\u989c\\u8272":"\\u65e0"}', '111.00', '222.00', '0.00', '222.00', 1, '1486431467', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&do=sta_none&id=8FRwGf', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1486431467, 0),
(4, 1, 1, 1, 0, '157191871655', 'index', '', 3, '测试二', 'a#男', '{"a#\\u989c\\u8272":"\\u65e0","b#\\u989c\\u8272":"\\u65e0"}', '111.00', '222.00', '0.00', '222.00', 1, '1486431643', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&do=sta_none&id=8FRwGf', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1486431643, 0),
(5, 1, 1, 1, 0, '884888372866', 'index', '', 3, '测试二', 'b#女', '{"a#\\u989c\\u8272":"\\u65e0","b#\\u989c\\u8272":"\\u7ea2"}', '111.00', '111.00', '0.00', '111.00', 1, '1486431670', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&do=sta_none&id=8FRwGf', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1486431670, 0),
(6, 1, 1, 1, 0, '840038619799', 'index', '', 3, '测试二', 'a#男', '{"a#\\u989c\\u8272":"\\u767d"}', '111.00', '222.00', '0.00', '222.00', 1, '1486434280', '', '13231955565', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=8FRwGf', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1486434280, 0),
(7, 1, 1, 1, 0, '329958843428', 'index', '', 3, '测试二', 'a#男', '{"a#\\u989c\\u8272":"\\u65e0","b#\\u989c\\u8272":"\\u65e0"}', '111.00', '222.00', '0.00', '222.00', 1, '1486434325', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=8FRwGf', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1486434325, 0),
(8, 1, 1, 1, 0, '341189472638', 'index', '', 3, '测试二', 'b#女', '{"a#\\u989c\\u8272":"\\u65e0","b#\\u989c\\u8272":"\\u7ea2"}', '111.00', '111.00', '0.00', '111.00', 1, '1486434337', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=8FRwGf', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1486434337, 0),
(9, 1, 1, 1, 0, '658389372882', 'index', '', 3, '测试二', 'b#女', '{"a#\\u989c\\u8272":"\\u65e0","b#\\u989c\\u8272":"\\u65e0"}', '111.00', '111.00', '0.00', '111.00', 1, '1486434430', '', '13231955555', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=8FRwGf&aaa=11111', '', 1486434430, 0),
(10, 1, 1, 1, 0, '491495599948', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910":"\\u65e0","b#aa":"\\u65e0"}', '888.00', '100.00', '0.00', '100.00', 1, '1486877563', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1486877563, 0),
(11, 1, 1, 1, 0, '750887836100', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', 'null', '888.00', '100.00', '0.00', '100.00', 1, '1486878586', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1486878586, 0),
(12, 1, 1, 1, 0, '408414104011', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', 'null', '888.00', '100.00', '0.00', '100.00', 1, '1486878599', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=750887836100', 1486878599, 0),
(13, 1, 1, 1, 0, '623870763867', 'index', '', 2, '11111111', 'b#bb', '{"a#\\u5957\\u9910\\u4e00":"\\u65e0","a#\\u5957\\u9910\\u4e8c":"\\u65e0"}', '888.00', '200.00', '0.00', '200.00', 1, '1486878637', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=408414104011', 1486878637, 0),
(14, 1, 1, 1, 0, '272451249811', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"\\u65e0","a#\\u5957\\u9910\\u4e8c":"\\u65e0"}', '888.00', '100.00', '0.00', '100.00', 1, '1486878739', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1486878739, 0),
(15, 1, 1, 1, 0, '276951886465', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', 'null', '888.00', '100.00', '0.00', '100.00', 1, '1486879608', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=272451249811', 1486879608, 0),
(16, 1, 1, 1, 0, '356894515272', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"a"}', '888.00', '100.00', '0.00', '100.00', 1, '1486881045', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=276951886465', 1486881045, 0),
(17, 1, 1, 1, 0, '982328646184', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57","a#\\u5957\\u9910\\u4e8c":"\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57"}', '888.00', '100.00', '0.00', '100.00', 1, '1486881067', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=356894515272', 1486881067, 0),
(18, 1, 1, 1, 0, '564853720821', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"a","a#\\u5957\\u9910\\u4e8c":"a"}', '888.00', '100.00', '0.00', '100.00', 1, '1486884844', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p&do=show', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=category', 1486884844, 0),
(19, 1, 1, 1, 0, '731463189354', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57","a#\\u5957\\u9910\\u4e8c":"\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57"}', '888.00', '100.00', '0.00', '100.00', 1, '1486884907', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p&do=show', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=564853720821', 1486884907, 0),
(20, 1, 1, 1, 0, '362538473320', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b572222222"}', '888.00', '100.00', '0.00', '100.00', 1, '1486885111', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p&do=show', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=731463189354', 1486885111, 0),
(21, 1, 1, 1, 0, '769476484591', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b572222222"}', '888.00', '100.00', '0.00', '100.00', 1, '1486885715', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p&do=show', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=731463189354', 1486885715, 0),
(22, 1, 1, 1, 0, '230340116396', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b5711111111"}', '888.00', '100.00', '0.00', '100.00', 1, '1486885726', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p&do=show', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=769476484591', 1486885726, 0),
(23, 1, 1, 1, 0, '339017347228', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b5711111111","a#\\u5957\\u9910":"\\u65e0"}', '888.00', '100.00', '0.00', '100.00', 1, '1486885771', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p&do=show', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=230340116396', 1486885771, 0),
(24, 1, 1, 1, 0, '359157515056', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b5711111111","a#\\u5957\\u9910":"\\u65e0"}', '888.00', '100.00', '0.00', '100.00', 1, '1486885772', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p&do=show', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=230340116396', 1486885772, 0),
(25, 1, 1, 1, 0, '748507008505', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"\\u65e0","a#\\u5957\\u9910":"\\u65e0"}', '888.00', '100.00', '0.00', '100.00', 1, '1486885886', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p&do=show', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=339017347228', 1486885886, 0),
(26, 1, 1, 1, 0, '125958186659', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"\\u65e0","a#\\u5957\\u9910":"\\u65e0"}', '888.00', '100.00', '0.00', '100.00', 1, '1486885887', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p&do=show', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=339017347228', 1486885887, 0),
(27, 1, 1, 1, 0, '277636998879', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"\\u65e0","a#\\u5957\\u9910":"\\u65e0"}', '888.00', '100.00', '0.00', '100.00', 1, '1486885889', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p&do=show', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=339017347228', 1486885889, 0),
(28, 1, 1, 1, 0, '508368817609', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b5711111111","a#\\u5957\\u9910":"\\u65e0"}', '888.00', '100.00', '0.00', '100.00', 1, '1486885950', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1486885950, 0),
(29, 1, 1, 1, 0, '503404026557', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b5711111111","a#\\u5957\\u9910":"\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b572222222"}', '888.00', '100.00', '0.00', '100.00', 1, '1486886114', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=508368817609', 1486886114, 0),
(30, 1, 1, 1, 0, '436452064296', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b5711111111","a#\\u5957\\u9910":"\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b572222222"}', '888.00', '100.00', '0.00', '100.00', 1, '1486886165', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=503404026557', 1486886165, 0),
(31, 1, 1, 1, 0, '650262872502', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b5711111111","b#\\u5957\\u9910":"\\u65e0"}', '888.00', '100.00', '0.00', '100.00', 1, '1486886226', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=436452064296', 1486886226, 0),
(32, 1, 1, 1, 0, '345660806508', 'index', '', 2, '11111111', 'b#bb', '{"a#\\u5957\\u9910\\u4e00":"\\u65e0","b#\\u5957\\u9910":"\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b572222222"}', '888.00', '200.00', '0.00', '200.00', 1, '1486886268', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=650262872502', 1486886268, 0),
(33, 1, 1, 1, 0, '191152664818', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b5711111111","b#\\u5957\\u9910":"\\u65e0"}', '888.00', '100.00', '0.00', '100.00', 1, '1486886312', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=345660806508', 1486886312, 0),
(34, 1, 1, 1, 0, '186166648835', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"\\u65e0","b#\\u5957\\u9910":"\\u65e0"}', '888.00', '100.00', '0.00', '100.00', 1, '1486886326', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=191152664818', 1486886326, 0),
(35, 1, 1, 1, 0, '463884879607', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"\\u65e0","b#\\u5957\\u9910":"\\u65e0"}', '888.00', '100.00', '0.00', '100.00', 1, '1486886349', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=186166648835', 1486886349, 0),
(36, 1, 1, 1, 0, '340131193418', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"\\u65e0","b#\\u5957\\u9910":"\\u65e0"}', '888.00', '100.00', '0.00', '100.00', 1, '1486886349', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=186166648835', 1486886349, 0),
(37, 1, 1, 1, 0, '879213589035', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"\\u65e0","b#\\u5957\\u9910":"\\u65e0"}', '888.00', '100.00', '0.00', '100.00', 1, '1486886441', '', '', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=340131193418', 1486886441, 0),
(38, 1, 1, 1, 0, '695680727688', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910\\u4e00":"\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b5711111111","a#\\u5957\\u9910":"\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b57\\u6d4b\\u8bd5\\u540d\\u5b572222222"}', '888.00', '100.00', '0.00', '100.00', 1, '1486888051', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=879213589035', 1486888051, 0),
(39, 1, 1, 1, 0, '863681311995', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910":"\\u6d4b\\u8bd5\\u4e00"}', '888.00', '100.00', '0.00', '100.00', 1, '1486947046', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1486947046, 0),
(40, 1, 1, 1, 0, '918065044866', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910":"\\u6d4b\\u8bd5\\u4e8c"}', '888.00', '100.00', '0.00', '100.00', 1, '1486947106', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Item&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Item&a=category', 1486947106, 0),
(41, 1, 1, 1, 0, '121058563525', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910":"\\u6d4b\\u8bd5\\u56db"}', '888.00', '100.00', '0.00', '100.00', 1, '1486951320', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p&do=show', '', 1486951320, 0),
(42, 1, 1, 1, 0, '588762500180', 'index', '', 2, '11111111', 'a#测试名字测试名字测试名字测试名字测试名字测试名字', '{"a#\\u5957\\u9910":"\\u6d4b\\u8bd5\\u4e09"}', '888.00', '100.00', '0.00', '100.00', 1, '1486951384', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p&do=show', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=121058563525', 1486951384, 0),
(43, 1, 1, 1, 0, '520188772662', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u5957\\u9910":"\\u6d4b\\u8bd5\\u4e09"}', '888.00', '100.00', '0.00', '100.00', 1, '1486952231', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Item&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Item&a=category', 1486952231, 0),
(44, 1, 1, 1, 0, '187039723941', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u5957\\u9910":"\\u6d4b\\u8bd5\\u4e8c"}', '888.00', '100.00', '0.00', '100.00', 1, '1486952273', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Item&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=520188772662', 1486952273, 0),
(45, 1, 1, 1, 0, '685431792817', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u5957\\u9910":"\\u7d2b\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1486953261', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1486953261, 0),
(46, 1, 1, 1, 0, '813862367764', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u5957\\u9910":"\\u7d2b\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1486953314', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Item&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Item&a=category', 1486953314, 0),
(47, 1, 1, 1, 0, '929587445175', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u5957\\u9910":"\\u7ea2\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1486953436', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Item&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=813862367764', 1486953436, 0),
(48, 1, 1, 1, 0, '284055553562', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u5957\\u9910":"\\u7d2b\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1486953482', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Item&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=929587445175', 1486953482, 0),
(49, 1, 1, 1, 0, '277409382645', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u5957\\u9910":"\\u7d2b\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1486953503', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1486953503, 0),
(50, 1, 1, 1, 0, '442290972340', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u5957\\u9910":"\\u7d2b\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1486953548', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=277409382645', 1486953548, 0),
(51, 1, 1, 1, 0, '284364106835', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u5957\\u9910\\u642d\\u914d":"\\u8863\\u670d\\u4e00","a#\\u4e3b\\u8863\\u670d\\u5c3a\\u5bf8":"170","a#\\u5957\\u9910\\u8863\\u670d\\u5c3a\\u5bf8":"20","a#\\u8863\\u670d\\u989c\\u8272":"\\u7d2b\\u8272","a#\\u5957\\u9910\\u8863\\u670d\\u989c\\u8272":"\\u7070\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1486958065', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1486958065, 0),
(52, 1, 1, 1, 0, '463334809065', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u5957\\u9910\\u642d\\u914d":"\\u8863\\u670d\\u4e00","a#\\u4e3b\\u8863\\u670d\\u5c3a\\u5bf8":"170","a#\\u5957\\u9910\\u8863\\u670d\\u5c3a\\u5bf8":"30","a#\\u8863\\u670d\\u989c\\u8272":"\\u7d2b\\u8272","a#\\u5957\\u9910\\u8863\\u670d\\u989c\\u8272":"\\u767d\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1486963600', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1486963600, 0),
(53, 1, 1, 1, 0, '663133758477', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u5957\\u9910\\u642d\\u914d":"\\u8863\\u670d\\u4e8c","a#\\u4e3b\\u8863\\u670d\\u5c3a\\u5bf8":"170","a#\\u5957\\u9910\\u8863\\u670d\\u5c3a\\u5bf8":"10","a#\\u8863\\u670d\\u989c\\u8272":"\\u7d2b\\u8272","a#\\u5957\\u9910\\u8863\\u670d\\u989c\\u8272":"\\u9ed1\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1486963887', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1486963887, 0),
(54, 1, 1, 1, 0, '776472109893', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u5957\\u9910\\u642d\\u914d":"\\u8863\\u670d\\u4e8c","a#\\u8863\\u670d\\u5c3a\\u5bf8":"170","a#\\u5957\\u9910\\u5c3a\\u5bf8":"10","a#\\u8863\\u670d\\u989c\\u8272":"\\u767d\\u8272","a#\\u5957\\u9910\\u989c\\u8272":"\\u767d\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1486965457', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1486965457, 0),
(55, 1, 1, 1, 0, '729649213241', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u5957\\u9910\\u642d\\u914d":"\\u8863\\u670d\\u4e8c","a#\\u8863\\u670d\\u5c3a\\u5bf8":"180","a#\\u5957\\u9910\\u5c3a\\u5bf8":"10","a#\\u8863\\u670d\\u989c\\u8272":"\\u767d\\u8272","a#\\u5957\\u9910\\u989c\\u8272":"\\u767d\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1486965529', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=776472109893', 1486965529, 0),
(56, 1, 1, 1, 0, '625164336543', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u5957\\u9910\\u642d\\u914d":"\\u8863\\u670d\\u4e00","a#\\u8863\\u670d\\u5c3a\\u5bf8":"170","a#\\u5957\\u9910\\u5c3a\\u5bf8":"10","a#\\u8863\\u670d\\u989c\\u8272":"\\u767d\\u8272","a#\\u5957\\u9910\\u989c\\u8272":"\\u767d\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1486968582', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1486968582, 0),
(57, 1, 1, 1, 0, '657843216438', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u8863\\u670d\\u5c3a\\u5bf8":"180","a#\\u8863\\u670d\\u989c\\u8272":"\\u7ea2\\u8272","a#\\u5957\\u9910\\u642d\\u914d":"\\u8863\\u670d\\u4e8c","a#\\u5957\\u9910\\u5c3a\\u5bf8":"10","a#\\u5957\\u9910\\u989c\\u8272":"\\u9ed1\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1486970224', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1486970224, 0),
(58, 1, 1, 1, 0, '525255613616', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u8863\\u670d\\u5c3a\\u5bf8":"170","a#\\u8863\\u670d\\u989c\\u8272":"\\u7ea2\\u8272","a#\\u5957\\u9910\\u642d\\u914d":"\\u8863\\u670d\\u4e8c","a#\\u5957\\u9910\\u5c3a\\u5bf8":"10","a#\\u5957\\u9910\\u989c\\u8272":"\\u9ed1\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1486970858', '', '13211111111', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1486970858, 0),
(59, 1, 1, 1, 0, '129168698773', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u8863\\u670d\\u5c3a\\u5bf8":"175","a#\\u8863\\u670d\\u989c\\u8272":"\\u7ea2\\u8272","a#\\u5957\\u9910\\u642d\\u914d":"\\u8863\\u670d\\u4e09","a#\\u5957\\u9910\\u5c3a\\u5bf8":"30","a#\\u5957\\u9910\\u989c\\u8272":"\\u767d\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1486978399', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Item&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Item&a=category', 1486978399, 0),
(60, 1, 1, 1, 0, '564259005959', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u8863\\u670d\\u5c3a\\u5bf8":"180","a#\\u8863\\u670d\\u989c\\u8272":"\\u7d2b\\u8272","a#\\u5957\\u9910\\u642d\\u914d":"\\u8863\\u670d\\u56db","a#\\u5957\\u9910\\u5c3a\\u5bf8":"30","a#\\u5957\\u9910\\u989c\\u8272":"\\u767d\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1486979264', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p&do=show', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=category', 1486979264, 0),
(61, 1, 1, 1, 0, '340291334576', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u8863\\u670d\\u5c3a\\u5bf8":"180","a#\\u8863\\u670d\\u989c\\u8272":"\\u767d\\u8272","a#\\u5957\\u9910\\u642d\\u914d":"\\u8863\\u670d\\u4e00","a#\\u5957\\u9910\\u5c3a\\u5bf8":"30","a#\\u5957\\u9910\\u989c\\u8272":"\\u767d\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1486979311', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Item&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Item&a=category', 1486979311, 0),
(62, 1, 1, 1, 0, '907573173370', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u8863\\u670d\\u5c3a\\u5bf8":"180","a#\\u8863\\u670d\\u989c\\u8272":"\\u767d\\u8272","a#\\u5957\\u9910\\u642d\\u914d":"\\u8863\\u670d\\u56db","a#\\u5957\\u9910\\u5c3a\\u5bf8":"\\u65e0","a#\\u5957\\u9910\\u989c\\u8272":"\\u65e0"}', '888.00', '100.00', '0.00', '100.00', 1, '1486979404', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p&do=show', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=category', 1486979404, 0),
(63, 1, 1, 1, 0, '996824622156', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u8863\\u670d\\u5c3a\\u5bf8":"\\u65e0","a#\\u8863\\u670d\\u989c\\u8272":"\\u65e0","a#\\u5957\\u9910\\u642d\\u914d":"\\u65e0","a#\\u5957\\u9910\\u5c3a\\u5bf8":"\\u65e0","a#\\u5957\\u9910\\u989c\\u8272":"\\u65e0"}', '888.00', '100.00', '0.00', '100.00', 1, '1486979430', '', '13213195555', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p&do=show', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=907573173370', 1486979430, 0),
(64, 1, 1, 1, 0, '136921836640', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u8863\\u670d\\u5c3a\\u5bf8":"170","a#\\u8863\\u670d\\u989c\\u8272":"\\u7ea2\\u8272","a#\\u5957\\u9910\\u642d\\u914d":"\\u8863\\u670d\\u4e8c","a#\\u5957\\u9910\\u5c3a\\u5bf8":"\\u65e0","a#\\u5957\\u9910\\u989c\\u8272":"\\u65e0"}', '888.00', '100.00', '0.00', '100.00', 1, '1487037617', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Item&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Item&a=category', 1487037617, 0),
(65, 1, 1, 1, 0, '928891261363', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u8863\\u670d\\u5c3a\\u5bf8":"180","a#\\u8863\\u670d\\u989c\\u8272":"\\u7d2b\\u8272","a#\\u5957\\u99101-\\u642d\\u914d":"\\u8863\\u670d\\u4e00","\\u5957\\u99101-\\u5c3a\\u5bf8":"20","\\u5957\\u99101-\\u989c\\u8272":"\\u767d\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1487054387', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1487054387, 0),
(66, 1, 1, 1, 0, '386800638884', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u8863\\u670d\\u5c3a\\u5bf8":"180","a#\\u8863\\u670d\\u989c\\u8272":"\\u65e0","a#\\u5957\\u99101-\\u642d\\u914d":"\\u8863\\u670d\\u4e00","\\u5957\\u99101-\\u5c3a\\u5bf8":"20","\\u5957\\u99101-\\u989c\\u8272":"\\u7070\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1487054564', '', '13231955555', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1487054564, 0),
(67, 1, 1, 1, 0, '954630711466', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u8863\\u670d\\u5c3a\\u5bf8":"170","a#\\u8863\\u670d\\u989c\\u8272":"\\u7ea2\\u8272","a#\\u5957\\u99101-\\u642d\\u914d":"\\u8863\\u670d\\u4e8c","\\u5957\\u99101-\\u5c3a\\u5bf8":"10","\\u5957\\u99101-\\u989c\\u8272":"\\u9ed1\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1487054670', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=386800638884', 1487054670, 0),
(68, 1, 1, 1, 0, '112952518601', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u8863\\u670d\\u5c3a\\u5bf8":"\\u65e0","a#\\u8863\\u670d\\u989c\\u8272":"\\u65e0","a#\\u5957\\u99101-\\u642d\\u914d":"\\u65e0","\\u5957\\u99101-\\u5c3a\\u5bf8":"\\u65e0","\\u5957\\u99101-\\u989c\\u8272":"\\u65e0"}', '888.00', '100.00', '0.00', '100.00', 1, '1487055413', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=954630711466', 1487055413, 0),
(69, 1, 1, 1, 0, '175341851413', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u8863\\u670d\\u5c3a\\u5bf8":"170","a#\\u8863\\u670d\\u989c\\u8272":"\\u7ea2\\u8272","a#\\u5957\\u99101-\\u642d\\u914d":"\\u8863\\u670d\\u4e00","\\u5957\\u99101-\\u5c3a\\u5bf8":"10","\\u5957\\u99101-\\u989c\\u8272":"\\u9ed1\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1487055783', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=112952518601', 1487055783, 0),
(70, 1, 1, 1, 0, '813286554101', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u8863\\u670d\\u5c3a\\u5bf8":"170","a#\\u8863\\u670d\\u989c\\u8272":"\\u7ea2\\u8272","a#\\u5957\\u99101-\\u642d\\u914d":"\\u8863\\u670d\\u4e00","\\u5957\\u99101-\\u5c3a\\u5bf8":"10","\\u5957\\u99101-\\u989c\\u8272":"\\u9ed1\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1487056399', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=175341851413', 1487056399, 0),
(71, 1, 1, 1, 0, '122295382694', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u8863\\u670d\\u5c3a\\u5bf8":"170","a#\\u8863\\u670d\\u989c\\u8272":"\\u7ea2\\u8272","a#\\u5957\\u99101-\\u642d\\u914d":"\\u8863\\u670d\\u4e09","\\u5957\\u99101-\\u5c3a\\u5bf8":"30","\\u5957\\u99101-\\u989c\\u8272":"\\u7070\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1487056580', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=813286554101', 1487056580, 0),
(72, 1, 1, 1, 0, '975107027325', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u8863\\u670d\\u5c3a\\u5bf8":"180","a#\\u8863\\u670d\\u989c\\u8272":"\\u7d2b\\u8272","a#\\u5957\\u99101-\\u642d\\u914d":"\\u8863\\u670d\\u56db","\\u5957\\u99101-\\u5c3a\\u5bf8":"20","\\u5957\\u99101-\\u989c\\u8272":"\\u767d\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1487056624', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1487056624, 0),
(73, 1, 1, 1, 0, '766986543971', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u8863\\u670d\\u5c3a\\u5bf8":"180","a#\\u8863\\u670d\\u989c\\u8272":"\\u7d2b\\u8272","a#\\u5957\\u99101-\\u642d\\u914d":"\\u8863\\u670d\\u4e8c","\\u5957\\u99101-\\u5c3a\\u5bf8":"10","\\u5957\\u99101-\\u989c\\u8272":"\\u9ed1\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1487057484', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=975107027325', 1487057484, 0),
(74, 1, 1, 1, 0, '841104754288', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u8863\\u670d\\u5c3a\\u5bf8":"180","a#\\u8863\\u670d\\u989c\\u8272":"\\u7d2b\\u8272","a#\\u5957\\u99101-\\u642d\\u914d":"\\u8863\\u670d\\u4e00","\\u5957\\u99101-\\u5c3a\\u5bf8":"30","\\u5957\\u99101-\\u989c\\u8272":"\\u767d\\u8272"}', '888.00', '100.00', '0.00', '100.00', 1, '1487057596', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Item&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Item&a=category', 1487057596, 0),
(75, 1, 1, 1, 0, '932062133104', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u8863\\u670d\\u5c3a\\u5bf8":"180","a#\\u8863\\u670d\\u989c\\u8272":"\\u767d\\u8272","a#\\u5957\\u99101-\\u642d\\u914d":"\\u8863\\u670d\\u4e00","\\u5957\\u99101-\\u5c3a\\u5bf8":"10","\\u5957\\u99101-\\u989c\\u8272":"\\u767d\\u8272"}', '888.00', '999.00', '0.00', '999.00', 1, '1487057631', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Item&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=841104754288', 1487057631, 0),
(76, 1, 1, 1, 0, '442369813532', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u8863\\u670d\\u5c3a\\u5bf8":"180","a#\\u8863\\u670d\\u989c\\u8272":"\\u65e0","a#\\u5957\\u99101-\\u642d\\u914d":"\\u8863\\u670d\\u4e00","\\u5957\\u99101-\\u5c3a\\u5bf8":"10","\\u5957\\u99101-\\u989c\\u8272":"\\u767d\\u8272"}', '888.00', '999.00', '0.00', '999.00', 1, '1487120284', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1487120284, 0),
(77, 1, 1, 1, 0, '683539739657', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u8863\\u670d\\u5c3a\\u5bf8":"170","a#\\u8863\\u670d\\u989c\\u8272":"\\u767d\\u8272","a#\\u5957\\u99101-\\u642d\\u914d":"\\u8863\\u670d\\u4e8c","\\u5957\\u99101-\\u5c3a\\u5bf8":"10","\\u5957\\u99101-\\u989c\\u8272":"\\u767d\\u8272"}', '888.00', '999.00', '0.00', '999.00', 1, '1487120300', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=442369813532', 1487120300, 0),
(78, 1, 1, 1, 0, '328745548264', 'index', '', 2, '11111111', 'a#测试', '{"a#\\u8863\\u670d\\u5c3a\\u5bf8":"170","a#\\u8863\\u670d\\u989c\\u8272":"\\u7ea2\\u8272","a#\\u5957\\u99101-\\u642d\\u914d":"\\u8863\\u670d\\u4e00","\\u5957\\u99101-\\u5c3a\\u5bf8":"10","\\u5957\\u99101-\\u989c\\u8272":"\\u9ed1\\u8272"}', '888.00', '999.00', '0.00', '999.00', 1, '1487120437', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=683539739657', 1487120437, 0),
(79, 1, 1, 1, 0, '345907289554', 'index', '', 2, '11111111', '套餐1#combo1', '{"\\u5957\\u99101#combo1":"\\u8863\\u670d\\u4e00","\\u5957\\u99101#combo1property1\\/\\u8863\\u670d\\u4e00\\/\\u989c\\u8272":"\\u7d2b\\u82721"}', '888.00', '1.00', '0.00', '1.00', 1, '1487231204', '', '13231955653', '', '', NULL, NULL, NULL, '', '', '', '', '', 1, '', '', '', 1, '127.0.0.1', 0, 0, 'http://shenshuang.geren.com/nanxiwang/index.php?m=Index&a=order&id=2U1G0p', 'http://shenshuang.geren.com/nanxiwang/adminpanel123.php?m=Item&a=index', 1487231204, 0);

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

--
-- 转存表中的数据 `nxw_order_log`
--

INSERT INTO `nxw_order_log` (`id`, `order_id`, `status`, `add_time`, `user_id`, `remark`) VALUES
(1, 1, 0, 1484796553, 0, '测试'),
(2, 2, 0, 1484796614, 0, '测试'),
(3, 3, 0, 1484796673, 0, '测试'),
(4, 4, 0, 1484797267, 0, '测试'),
(5, 5, 0, 1484797400, 0, '测试'),
(6, 6, 0, 1484797479, 0, '测试'),
(7, 7, 0, 1484797540, 0, '测试'),
(8, 8, 0, 1484798400, 0, '测试'),
(9, 9, 0, 1484804719, 0, ''),
(10, 10, 0, 1484804841, 0, ''),
(11, 11, 0, 1484804896, 0, ''),
(12, 12, 0, 1484804967, 0, ''),
(13, 13, 0, 1484804976, 0, ''),
(14, 14, 0, 1484804999, 0, ''),
(15, 15, 0, 1484807040, 0, ''),
(16, 16, 0, 1484807060, 0, ''),
(17, 17, 0, 1484807072, 0, ''),
(18, 18, 0, 1484807090, 0, ''),
(19, 19, 0, 1484807104, 0, ''),
(20, 20, 0, 1484809949, 0, ''),
(21, 21, 0, 1484809974, 0, ''),
(22, 22, 0, 1484809982, 0, ''),
(23, 23, 0, 1484811421, 0, ''),
(24, 24, 0, 1484811441, 0, ''),
(25, 25, 0, 1484811458, 0, ''),
(26, 26, 0, 1484811514, 0, ''),
(27, 27, 0, 1484811584, 0, ''),
(28, 28, 0, 1484811594, 0, ''),
(29, 29, 0, 1484812593, 0, ''),
(30, 30, 0, 1484812642, 0, ''),
(31, 31, 0, 1484812656, 0, ''),
(32, 32, 0, 1484812684, 0, ''),
(33, 33, 0, 1484812696, 0, ''),
(34, 34, 0, 1484813702, 0, ''),
(35, 35, 0, 1484813711, 0, ''),
(36, 36, 0, 1484814078, 0, ''),
(37, 37, 0, 1484814639, 0, ''),
(38, 38, 0, 1484814677, 0, ''),
(39, 39, 0, 1484814705, 0, ''),
(40, 40, 0, 1484815597, 0, ''),
(41, 40, 1, 1484816680, 1, '1'),
(42, 40, 0, 1484816688, 1, '1'),
(43, 41, 0, 1484817428, 0, ''),
(44, 42, 0, 1484817478, 0, ''),
(45, 43, 0, 1484817949, 0, ''),
(46, 44, 0, 1484818068, 0, ''),
(47, 45, 0, 1484818218, 0, ''),
(48, 1, 0, 1484818315, 0, ''),
(49, 2, 0, 1484879612, 0, ''),
(50, 3, 0, 1486431467, 0, ''),
(51, 4, 0, 1486431643, 0, ''),
(52, 5, 0, 1486431670, 0, ''),
(53, 6, 0, 1486434280, 0, ''),
(54, 7, 0, 1486434325, 0, ''),
(55, 8, 0, 1486434337, 0, ''),
(56, 9, 0, 1486434430, 0, ''),
(57, 10, 0, 1486877563, 0, ''),
(58, 11, 0, 1486878586, 0, ''),
(59, 12, 0, 1486878599, 0, ''),
(60, 13, 0, 1486878637, 0, ''),
(61, 14, 0, 1486878739, 0, ''),
(62, 15, 0, 1486879608, 0, ''),
(63, 16, 0, 1486881045, 0, ''),
(64, 17, 0, 1486881067, 0, ''),
(65, 18, 0, 1486884844, 0, ''),
(66, 19, 0, 1486884907, 0, ''),
(67, 20, 0, 1486885111, 0, ''),
(68, 21, 0, 1486885715, 0, ''),
(69, 22, 0, 1486885726, 0, ''),
(70, 23, 0, 1486885771, 0, ''),
(71, 24, 0, 1486885772, 0, ''),
(72, 25, 0, 1486885886, 0, ''),
(73, 26, 0, 1486885887, 0, ''),
(74, 27, 0, 1486885889, 0, ''),
(75, 28, 0, 1486885950, 0, ''),
(76, 29, 0, 1486886114, 0, ''),
(77, 30, 0, 1486886165, 0, ''),
(78, 31, 0, 1486886226, 0, ''),
(79, 32, 0, 1486886268, 0, ''),
(80, 33, 0, 1486886312, 0, ''),
(81, 34, 0, 1486886326, 0, ''),
(82, 35, 0, 1486886349, 0, ''),
(83, 36, 0, 1486886349, 0, ''),
(84, 37, 0, 1486886441, 0, ''),
(85, 38, 0, 1486888051, 0, ''),
(86, 39, 0, 1486947046, 0, ''),
(87, 40, 0, 1486947106, 0, ''),
(88, 41, 0, 1486951320, 0, ''),
(89, 42, 0, 1486951384, 0, ''),
(90, 43, 0, 1486952231, 0, ''),
(91, 44, 0, 1486952273, 0, ''),
(92, 45, 0, 1486953261, 0, ''),
(93, 46, 0, 1486953314, 0, ''),
(94, 47, 0, 1486953436, 0, ''),
(95, 48, 0, 1486953482, 0, ''),
(96, 49, 0, 1486953503, 0, ''),
(97, 50, 0, 1486953548, 0, ''),
(98, 51, 0, 1486958065, 0, ''),
(99, 52, 0, 1486963600, 0, ''),
(100, 53, 0, 1486963887, 0, ''),
(101, 54, 0, 1486965457, 0, ''),
(102, 55, 0, 1486965529, 0, ''),
(103, 56, 0, 1486968582, 0, ''),
(104, 57, 0, 1486970224, 0, ''),
(105, 58, 0, 1486970858, 0, ''),
(106, 59, 0, 1486978399, 0, ''),
(107, 60, 0, 1486979264, 0, ''),
(108, 61, 0, 1486979311, 0, ''),
(109, 62, 0, 1486979404, 0, ''),
(110, 63, 0, 1486979430, 0, ''),
(111, 64, 0, 1487037617, 0, ''),
(112, 65, 0, 1487054387, 0, ''),
(113, 66, 0, 1487054564, 0, ''),
(114, 67, 0, 1487054670, 0, ''),
(115, 68, 0, 1487055413, 0, ''),
(116, 69, 0, 1487055783, 0, ''),
(117, 70, 0, 1487056399, 0, ''),
(118, 71, 0, 1487056580, 0, ''),
(119, 72, 0, 1487056624, 0, ''),
(120, 73, 0, 1487057484, 0, ''),
(121, 74, 0, 1487057596, 0, ''),
(122, 75, 0, 1487057631, 0, ''),
(123, 76, 0, 1487120284, 0, ''),
(124, 77, 0, 1487120300, 0, ''),
(125, 78, 0, 1487120437, 0, ''),
(126, 79, 0, 1487231204, 0, '');

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
('footer', 'Copyright © 2016 <a href="index.php"  target="_blank">楠溪王</a> All Rights Reserved'),
('contact_tel', '13231955653'),
('contact_qq', '2273844523'),
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
('safe_mobile_limit11', '999'),
('safe_order_interval', '999'),
('safe_ip_limit', '999'),
('safe_check_user', '1'),
('safe_check_tel', '1'),
('safe_check_address', '1'),
('delivery_setting', '["huitongkuaidi","debangwuliu","ems","rufengda","tiandihuayu","tiantian","jd","kuaijiesudi","shentong","shunfeng","yuantong","yunda","yuntongkuaidi","zhongtong","zhaijisong"]'),
('real_notice', '0'),
('lazyload', '0'),
('yunpay_status', '0'),
('yunpay_email', ''),
('yunpay_pid', ''),
('yunpay_key', ''),
('yunpay_discount', ''),
('yunpay_info', ''),
('safe_ip_denied', ''),
('user', '888'),
('safe_mobile_limit', '999'),
('notice', ''),
('contact_phone', '13231955653');

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
(1, 0, 0, 'nanxiwang', 'e3b537f68e82fde4f580afcd2c215f2c', 'admin', 1, '', '', '', '', '', 0, '127.0.0.1', '2017-02-16 12:57:00', 1479016818, 0);

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
-- Indexes for table `nxw_check`
--
ALTER TABLE `nxw_check`
  ADD PRIMARY KEY (`id`);

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
-- 使用表AUTO_INCREMENT `nxw_check`
--
ALTER TABLE `nxw_check`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `nxw_item`
--
ALTER TABLE `nxw_item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `nxw_order`
--
ALTER TABLE `nxw_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- 使用表AUTO_INCREMENT `nxw_order_log`
--
ALTER TABLE `nxw_order_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
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
