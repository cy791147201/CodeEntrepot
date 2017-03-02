#--------------------------------------------------
#系统名称：楠溪王订单系统 
#官方网址：暂无 
#淘宝店铺：暂无 
#备份时间：2017-01-19 17:39:28
#--------------------------------------------------


DROP TABLE IF EXISTS `nxw_advert`;
CREATE TABLE `nxw_advert` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `type` enum('幻灯片','广告') NOT NULL DEFAULT '幻灯片',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `id_3` (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `sort_order` (`sort_order`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='广告幻灯片表-alizi.net';

INSERT INTO `nxw_advert` VALUES('1','0','云南贡茶','/201509/56bf544bdb9cd.jpg','/201509/5607ef1848e42.jpg','javascript:;','1','_self','','0','1443360670','幻灯片');
INSERT INTO `nxw_advert` VALUES('2','0','台湾美食','/201509/56bf54a7f3738.jpg','/201509/5607ef23d8713.jpg','javascript:;','1','_self','','0','1443360670','幻灯片');


DROP TABLE IF EXISTS `nxw_alipay_log`;
CREATE TABLE `nxw_alipay_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `body` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `out_trade_no` (`out_trade_no`),
  KEY `id` (`id`),
  KEY `pay_type` (`pay_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='支付宝支付记录-alizi.net';



DROP TABLE IF EXISTS `nxw_article`;
CREATE TABLE `nxw_article` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(12) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `brief` text,
  `tags` varchar(100) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL,
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0',
  `content` longtext NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `is_frozen` tinyint(1) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL,
  `add_time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`name`) USING BTREE,
  KEY `id` (`id`),
  KEY `status` (`status`),
  KEY `is_delete` (`is_delete`),
  KEY `is_frozen` (`is_frozen`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='产品表-alizi.net';

INSERT INTO `nxw_article` VALUES('1','3','楠溪王订单系统','1、自适应电脑和手机界面，不必再多此一举区分两个版本。
2、独立后台方便管理，产品可在后台上传修改，订单可导出Excel表。
3、集成多种支付方式：①支付宝即时到账；②微信支付；③个人二维码付款；④货到付款；⑤银行转账。
4、精美的模板，非市面上粗俗烂作的模板与之可比；模板可随意切换且能自定义样式，让您的页面总是与众不同。
5、防刷单防丢单，邮件即时通知。
6、可计算运费，设置推广渠道，物流查询等等……','','/201509/56e2dad3193a5.jpg','1','0','<span style=\"font-family:\'Microsoft YaHei\', tahoma, Simsun, \'Arial Unicode MS\', Mingliu, Arial, Helvetica;font-size:18px;line-height:2;\">1、自适应电脑和手机界面，不必再多此一举区分两个版本。</span><br />
<span style=\"font-family:\'Microsoft YaHei\', tahoma, Simsun, \'Arial Unicode MS\', Mingliu, Arial, Helvetica;font-size:18px;line-height:2;\">2、独立后台方便管理，产品可在后台上传修改，订单可导出Excel表。</span><br />
<span style=\"font-family:\'Microsoft YaHei\', tahoma, Simsun, \'Arial Unicode MS\', Mingliu, Arial, Helvetica;font-size:18px;line-height:2;\">3、集成多种支付方式：①支付宝即时到账；②微信支付；③个人二维码付款；</span><span style=\"font-family:\'Microsoft YaHei\', tahoma, Simsun, \'Arial Unicode MS\', Mingliu, Arial, Helvetica;font-size:18px;line-height:2;\">④货到付款；⑤银行转账。</span><br />
<span style=\"font-family:\'Microsoft YaHei\', tahoma, Simsun, \'Arial Unicode MS\', Mingliu, Arial, Helvetica;font-size:18px;line-height:2;\">4、精美的模板，非市面上粗俗烂作的模板与之可比；</span><span style=\"font-family:\'Microsoft YaHei\', tahoma, Simsun, \'Arial Unicode MS\', Mingliu, Arial, Helvetica;font-size:18px;line-height:2;\">模板可随意切换且能自定义样式，让您的页面总是与众不同。</span><br />
<span style=\"font-family:\'Microsoft YaHei\', tahoma, Simsun, \'Arial Unicode MS\', Mingliu, Arial, Helvetica;font-size:18px;line-height:2;\">5、防刷单防丢单，邮件即时通知。</span><br />
<span style=\"font-family:\'Microsoft YaHei\', tahoma, Simsun, \'Arial Unicode MS\', Mingliu, Arial, Helvetica;font-size:18px;line-height:2;\">6、可计算运费，设置推广渠道，物流查询等等……</span>','0','0','1459237118','1459236989');


DROP TABLE IF EXISTS `nxw_category`;
CREATE TABLE `nxw_category` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` mediumint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `sort_order` (`sort_order`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='产品分类表-alizi.net';

INSERT INTO `nxw_category` VALUES('1','特产美食','1','0');
INSERT INTO `nxw_category` VALUES('2','精美礼品','1','0');
INSERT INTO `nxw_category` VALUES('3','关于楠溪王','2','0');


DROP TABLE IF EXISTS `nxw_check`;
CREATE TABLE `nxw_check` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `val` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='是否检测订单用户姓名手机号详细地址';



DROP TABLE IF EXISTS `nxw_code`;
CREATE TABLE `nxw_code` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mobile` varchar(16) NOT NULL,
  `item_id` int(12) NOT NULL DEFAULT '0',
  `code` varchar(10) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `add_time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mobile` (`mobile`),
  KEY `id` (`id`),
  KEY `status` (`status`),
  KEY `item_id` (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `nxw_comments`;
CREATE TABLE `nxw_comments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `item_id` int(12) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(25) NOT NULL,
  `region` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `reply_content` text,
  `add_time` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `status` (`status`),
  KEY `item_id` (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论表-alizi.net';



DROP TABLE IF EXISTS `nxw_goods`;
CREATE TABLE `nxw_goods` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `g_id` char(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `g_id` (`g_id`),
  KEY `user_id` (`user_id`),
  KEY `sort_order` (`sort_order`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `nxw_goods` VALUES('3','Gid11273123835','1','0');


DROP TABLE IF EXISTS `nxw_item`;
CREATE TABLE `nxw_item` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0',
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
  `wid` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sn` (`sn`),
  KEY `title` (`name`) USING BTREE,
  KEY `id` (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  KEY `status` (`status`),
  KEY `is_delete` (`is_delete`),
  KEY `is_sent` (`is_sent`),
  KEY `is_auto_send` (`is_auto_send`),
  KEY `s` (`s`),
  KEY `g_id` (`g_id`),
  KEY `b_s` (`b_s`),
  KEY `is_hot` (`is_hot`),
  KEY `is_big` (`is_big`),
  KEY `sort_order` (`sort_order`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='产品表-alizi.net';

INSERT INTO `nxw_item` VALUES('2','Gid11273123835','1','1','2U1G0p','2','测试','','','999','888','422','0','','','/201701/588031fc0e07e.jpg','/201701/588031fc0e07e.jpg','1','0','0','0','[{\"title\":\"a#aa\",\"price\":\"100\",\"image\":\"\\/201701\\/588057eb8fbf1.jpg\",\"qrcode\":\"\"},{\"title\":\"b#bb\",\"price\":\"200\",\"image\":\"\\/201701\\/588057ff1c0d6.jpg\",\"qrcode\":\"\"}]','radio','','[{\"title\":\"a#\\u989c\\u8272\",\"value\":\"\\u9ed1#\\u767d\",\"type\":\"radio\"},{\"title\":\"b#\\u989c\\u8272\",\"value\":\"\\u7ea2#\\u7c89\",\"type\":\"radio\"},{\"title\":\"a#\\u5c3a\\u5bf8\",\"value\":\"\\u5927#\\u5c0f\",\"type\":\"radio\"},{\"title\":\"b#\\u5c3a\\u5bf8\",\"value\":\"\\u8001#\\u5c11\",\"type\":\"radio\"}]','<p>{[AliziOrder]}</p>','','0','0','0','0','','null','1484809557','1484796451','','','','','','','1','1','','','','','','','','','','','','','','','在线下单','','','','http://shenshuang.geren.com/nanxiwang/Html/Gid11273123835/index','974','0');


DROP TABLE IF EXISTS `nxw_item_group`;
CREATE TABLE `nxw_item_group` (
  `item_id` int(12) NOT NULL,
  `group_id` int(12) NOT NULL,
  KEY `item_id` (`item_id`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `nxw_item_template`;
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
  `extend` longtext,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='产品模板表-alizi.net';

INSERT INTO `nxw_item_template` VALUES('1','thin','[\"price\",\"quantity\",\"payment\",\"name\",\"mobile\",\"region\",\"address\",\"remark\"]','1','1','0','','{\"body_bg\":\"F1F1F1\",\"form_bg\":\"FFFFFF\",\"title_bg\":\"666666\",\"button_bg\":\"EE3300\",\"font\":\"333333\",\"border\":\"666666\",\"nav_bg\":\"EE3300\"}','','');
INSERT INTO `nxw_item_template` VALUES('2','thin','[\"price\",\"quantity\",\"payment\",\"name\",\"mobile\",\"region\",\"address\",\"remark\"]','1','1','0','','{\"body_bg\":\"F1F1F1\",\"form_bg\":\"FFFFFF\",\"title_bg\":\"666666\",\"button_bg\":\"EE3300\",\"font\":\"333333\",\"border\":\"666666\",\"nav_bg\":\"EE3300\"}','','');


DROP TABLE IF EXISTS `nxw_order`;
CREATE TABLE `nxw_order` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `update_time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `status` (`status`),
  KEY `is_delete` (`is_delete`),
  KEY `is_sent` (`is_sent`),
  KEY `user_id` (`user_id`),
  KEY `user_pid` (`user_pid`),
  KEY `seller_id` (`seller_id`),
  KEY `order_no` (`order_no`),
  KEY `item_id` (`item_id`),
  KEY `add_ip` (`add_ip`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='产品订单表-alizi.net';

INSERT INTO `nxw_order` VALUES('1','1','1','1','0','895810768516','index','','2','测试','b#bb','{\"a#\\u989c\\u8272\":\"\\u65e0\",\"b#\\u989c\\u8272\":\"\\u65e0\",\"a#\\u5c3a\\u5bf8\":\"\\u65e0\",\"b#\\u5c3a\\u5bf8\":\"\\u65e0\"}','888.00','200.00','0.00','200.00','1','1484818315','','13231955653','','','','','','','','','','','1','','','','1','127.0.0.1','0','0','http://shenshuang.geren.com/nanxiwang/index.php?m=Item&a=order&id=2U1G0p&gzid=11111','http://shenshuang.geren.com/nanxiwang/index.php?m=Order&a=pay&order_no=241745722726','1484818315','0');


DROP TABLE IF EXISTS `nxw_order_log`;
CREATE TABLE `nxw_order_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `add_time` int(10) NOT NULL,
  `user_id` int(12) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `order_id` (`order_id`),
  KEY `status` (`status`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COMMENT='产品订单记录表-alizi.net';

INSERT INTO `nxw_order_log` VALUES('1','1','0','1484796553','0','测试');
INSERT INTO `nxw_order_log` VALUES('2','2','0','1484796614','0','测试');
INSERT INTO `nxw_order_log` VALUES('3','3','0','1484796673','0','测试');
INSERT INTO `nxw_order_log` VALUES('4','4','0','1484797267','0','测试');
INSERT INTO `nxw_order_log` VALUES('5','5','0','1484797400','0','测试');
INSERT INTO `nxw_order_log` VALUES('6','6','0','1484797479','0','测试');
INSERT INTO `nxw_order_log` VALUES('7','7','0','1484797540','0','测试');
INSERT INTO `nxw_order_log` VALUES('8','8','0','1484798400','0','测试');
INSERT INTO `nxw_order_log` VALUES('9','9','0','1484804719','0','');
INSERT INTO `nxw_order_log` VALUES('10','10','0','1484804841','0','');
INSERT INTO `nxw_order_log` VALUES('11','11','0','1484804896','0','');
INSERT INTO `nxw_order_log` VALUES('12','12','0','1484804967','0','');
INSERT INTO `nxw_order_log` VALUES('13','13','0','1484804976','0','');
INSERT INTO `nxw_order_log` VALUES('14','14','0','1484804999','0','');
INSERT INTO `nxw_order_log` VALUES('15','15','0','1484807040','0','');
INSERT INTO `nxw_order_log` VALUES('16','16','0','1484807060','0','');
INSERT INTO `nxw_order_log` VALUES('17','17','0','1484807072','0','');
INSERT INTO `nxw_order_log` VALUES('18','18','0','1484807090','0','');
INSERT INTO `nxw_order_log` VALUES('19','19','0','1484807104','0','');
INSERT INTO `nxw_order_log` VALUES('20','20','0','1484809949','0','');
INSERT INTO `nxw_order_log` VALUES('21','21','0','1484809974','0','');
INSERT INTO `nxw_order_log` VALUES('22','22','0','1484809982','0','');
INSERT INTO `nxw_order_log` VALUES('23','23','0','1484811421','0','');
INSERT INTO `nxw_order_log` VALUES('24','24','0','1484811441','0','');
INSERT INTO `nxw_order_log` VALUES('25','25','0','1484811458','0','');
INSERT INTO `nxw_order_log` VALUES('26','26','0','1484811514','0','');
INSERT INTO `nxw_order_log` VALUES('27','27','0','1484811584','0','');
INSERT INTO `nxw_order_log` VALUES('28','28','0','1484811594','0','');
INSERT INTO `nxw_order_log` VALUES('29','29','0','1484812593','0','');
INSERT INTO `nxw_order_log` VALUES('30','30','0','1484812642','0','');
INSERT INTO `nxw_order_log` VALUES('31','31','0','1484812656','0','');
INSERT INTO `nxw_order_log` VALUES('32','32','0','1484812684','0','');
INSERT INTO `nxw_order_log` VALUES('33','33','0','1484812696','0','');
INSERT INTO `nxw_order_log` VALUES('34','34','0','1484813702','0','');
INSERT INTO `nxw_order_log` VALUES('35','35','0','1484813711','0','');
INSERT INTO `nxw_order_log` VALUES('36','36','0','1484814078','0','');
INSERT INTO `nxw_order_log` VALUES('37','37','0','1484814639','0','');
INSERT INTO `nxw_order_log` VALUES('38','38','0','1484814677','0','');
INSERT INTO `nxw_order_log` VALUES('39','39','0','1484814705','0','');
INSERT INTO `nxw_order_log` VALUES('40','40','0','1484815597','0','');
INSERT INTO `nxw_order_log` VALUES('41','40','1','1484816680','1','1');
INSERT INTO `nxw_order_log` VALUES('42','40','0','1484816688','1','1');
INSERT INTO `nxw_order_log` VALUES('43','41','0','1484817428','0','');
INSERT INTO `nxw_order_log` VALUES('44','42','0','1484817478','0','');
INSERT INTO `nxw_order_log` VALUES('45','43','0','1484817949','0','');
INSERT INTO `nxw_order_log` VALUES('46','44','0','1484818068','0','');
INSERT INTO `nxw_order_log` VALUES('47','45','0','1484818218','0','');
INSERT INTO `nxw_order_log` VALUES('48','1','0','1484818315','0','');


DROP TABLE IF EXISTS `nxw_setting`;
CREATE TABLE `nxw_setting` (
  `name` varchar(50) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='产品系统设置表-alizi.net';

INSERT INTO `nxw_setting` VALUES('title','楠溪王订单管理系统');
INSERT INTO `nxw_setting` VALUES('keywords','楠溪王订单管理系统');
INSERT INTO `nxw_setting` VALUES('logo_pc','');
INSERT INTO `nxw_setting` VALUES('logo','');
INSERT INTO `nxw_setting` VALUES('description','楠溪王订单管理系统');
INSERT INTO `nxw_setting` VALUES('footer','Copyright © 2016 <a href=\"index.php\"  target=\"_blank\">楠溪王</a> All Rights Reserved');
INSERT INTO `nxw_setting` VALUES('contact_tel','13231955653');
INSERT INTO `nxw_setting` VALUES('contact_qq','2273844523');
INSERT INTO `nxw_setting` VALUES('system_status','1');
INSERT INTO `nxw_setting` VALUES('system_close_info','/adminpanel123.php');
INSERT INTO `nxw_setting` VALUES('URL_MODEL','0');
INSERT INTO `nxw_setting` VALUES('theme_color','ED145B');
INSERT INTO `nxw_setting` VALUES('system_template','thin');
INSERT INTO `nxw_setting` VALUES('order_options','[\"price\",\"quantity\",\"payment\",\"name\",\"mobile\",\"region\",\"address\",\"remark\"]');
INSERT INTO `nxw_setting` VALUES('show_notice','0');
INSERT INTO `nxw_setting` VALUES('record_order','0');
INSERT INTO `nxw_setting` VALUES('repeat_order','1');
INSERT INTO `nxw_setting` VALUES('slider_show','1');
INSERT INTO `nxw_setting` VALUES('slider_num','5');
INSERT INTO `nxw_setting` VALUES('item_hot_show','1');
INSERT INTO `nxw_setting` VALUES('item_hot_num','8');
INSERT INTO `nxw_setting` VALUES('item_category_show','1');
INSERT INTO `nxw_setting` VALUES('item_category_num','6');
INSERT INTO `nxw_setting` VALUES('item_category_id','1,2');
INSERT INTO `nxw_setting` VALUES('show_header','1');
INSERT INTO `nxw_setting` VALUES('show_bottom_nav','1');
INSERT INTO `nxw_setting` VALUES('payment_global','1');
INSERT INTO `nxw_setting` VALUES('payOnDelivery_status','1');
INSERT INTO `nxw_setting` VALUES('payOnDelivery_fee','0');
INSERT INTO `nxw_setting` VALUES('payOnDelivery_info','安全放心');
INSERT INTO `nxw_setting` VALUES('bankpay_status','0');
INSERT INTO `nxw_setting` VALUES('bankpay_discount','0');
INSERT INTO `nxw_setting` VALUES('bankpay_info','请联系在线客服获取银行账号');
INSERT INTO `nxw_setting` VALUES('alipay_status','0');
INSERT INTO `nxw_setting` VALUES('alipay_type','[\"1\",\"2\",\"3\"]');
INSERT INTO `nxw_setting` VALUES('alipay_mail','');
INSERT INTO `nxw_setting` VALUES('alipay_pid','');
INSERT INTO `nxw_setting` VALUES('alipay_key','');
INSERT INTO `nxw_setting` VALUES('alipay_discount','1');
INSERT INTO `nxw_setting` VALUES('alipay_discount_info','支付宝万岁');
INSERT INTO `nxw_setting` VALUES('wxpay_status','0');
INSERT INTO `nxw_setting` VALUES('wxpay_appid','');
INSERT INTO `nxw_setting` VALUES('wxpay_mchid','');
INSERT INTO `nxw_setting` VALUES('wxpay_key','');
INSERT INTO `nxw_setting` VALUES('wxpay_secret','');
INSERT INTO `nxw_setting` VALUES('wxpay_type','[\"1\"]');
INSERT INTO `nxw_setting` VALUES('wxpay_discount','1');
INSERT INTO `nxw_setting` VALUES('wxpay_discount_info','使用微信支付');
INSERT INTO `nxw_setting` VALUES('mail_send','0');
INSERT INTO `nxw_setting` VALUES('mail_proxy','0');
INSERT INTO `nxw_setting` VALUES('mail_send_status','[\"0\",\"1\",\"3\"]');
INSERT INTO `nxw_setting` VALUES('mail_smtp','smtp.163.com');
INSERT INTO `nxw_setting` VALUES('mail_port','25');
INSERT INTO `nxw_setting` VALUES('mail_account','');
INSERT INTO `nxw_setting` VALUES('mail_password','');
INSERT INTO `nxw_setting` VALUES('mail_to','admin@alizi.net');
INSERT INTO `nxw_setting` VALUES('mail_title','[AliziStatus]：[AliziTitle]');
INSERT INTO `nxw_setting` VALUES('sms_send','0');
INSERT INTO `nxw_setting` VALUES('sms_admin','0');
INSERT INTO `nxw_setting` VALUES('sms_admin_mobile','');
INSERT INTO `nxw_setting` VALUES('sms_account','');
INSERT INTO `nxw_setting` VALUES('sms_password','');
INSERT INTO `nxw_setting` VALUES('weixin_status','0');
INSERT INTO `nxw_setting` VALUES('weixin_appid','');
INSERT INTO `nxw_setting` VALUES('weixin_appsecret','');
INSERT INTO `nxw_setting` VALUES('weixin_token','');
INSERT INTO `nxw_setting` VALUES('weixin_encodingaeskey','');
INSERT INTO `nxw_setting` VALUES('safe_mobile_limit11','999');
INSERT INTO `nxw_setting` VALUES('safe_order_interval','999');
INSERT INTO `nxw_setting` VALUES('safe_ip_limit','999');
INSERT INTO `nxw_setting` VALUES('safe_check_user','1');
INSERT INTO `nxw_setting` VALUES('safe_check_tel','1');
INSERT INTO `nxw_setting` VALUES('safe_check_address','1');
INSERT INTO `nxw_setting` VALUES('delivery_setting','[\"huitongkuaidi\",\"debangwuliu\",\"ems\",\"rufengda\",\"tiandihuayu\",\"tiantian\",\"jd\",\"kuaijiesudi\",\"shentong\",\"shunfeng\",\"yuantong\",\"yunda\",\"yuntongkuaidi\",\"zhongtong\",\"zhaijisong\"]');
INSERT INTO `nxw_setting` VALUES('real_notice','0');
INSERT INTO `nxw_setting` VALUES('lazyload','0');
INSERT INTO `nxw_setting` VALUES('yunpay_status','0');
INSERT INTO `nxw_setting` VALUES('yunpay_email','');
INSERT INTO `nxw_setting` VALUES('yunpay_pid','');
INSERT INTO `nxw_setting` VALUES('yunpay_key','');
INSERT INTO `nxw_setting` VALUES('yunpay_discount','');
INSERT INTO `nxw_setting` VALUES('yunpay_info','');
INSERT INTO `nxw_setting` VALUES('safe_ip_denied','');
INSERT INTO `nxw_setting` VALUES('user','888');
INSERT INTO `nxw_setting` VALUES('safe_mobile_limit','999');
INSERT INTO `nxw_setting` VALUES('notice','');
INSERT INTO `nxw_setting` VALUES('contact_phone','13231955653');


DROP TABLE IF EXISTS `nxw_shipping`;
CREATE TABLE `nxw_shipping` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `less_num` tinyint(4) NOT NULL DEFAULT '1',
  `less_num_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `step_num` tinyint(3) NOT NULL DEFAULT '1',
  `step_num_cost` decimal(10,2) NOT NULL DEFAULT '1.00',
  `is_free_num` tinyint(1) NOT NULL DEFAULT '0',
  `is_free_cost` tinyint(1) NOT NULL DEFAULT '0',
  `free_num` mediumint(5) NOT NULL DEFAULT '0',
  `free_cost` decimal(12,2) NOT NULL DEFAULT '0.00',
  `update_time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='运费模板-alizi.net';

INSERT INTO `nxw_shipping` VALUES('1','满100免运费','2','10.00','1','2.00','1','1','50','100.00','1455506416');


DROP TABLE IF EXISTS `nxw_user`;
CREATE TABLE `nxw_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(12) unsigned NOT NULL DEFAULT '0',
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
  `update_time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `id` (`id`),
  KEY `password` (`password`),
  KEY `status` (`status`),
  KEY `is_delete` (`is_delete`),
  KEY `pid` (`pid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='产品用户表-alizi.net';

INSERT INTO `nxw_user` VALUES('1','0','0','nanxiwang','e3b537f68e82fde4f580afcd2c215f2c','admin','1','','','','','','0','127.0.0.1','2017-01-19 17:12:03','1479016818','0');


DROP TABLE IF EXISTS `nxw_user_group`;
CREATE TABLE `nxw_user_group` (
  `id` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `role` enum('admin','agent') DEFAULT 'admin',
  `name` varchar(25) NOT NULL,
  `discount` tinyint(3) NOT NULL DEFAULT '100',
  `auth` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



DROP TABLE IF EXISTS `nxw_user_log`;
CREATE TABLE `nxw_user_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `login_ip` varchar(15) NOT NULL,
  `login_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



