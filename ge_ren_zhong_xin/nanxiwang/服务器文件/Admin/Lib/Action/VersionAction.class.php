<?php
class VersionAction extends Action {

    public function index(){
		header('content-type:text/html;charset=utf-8');
		$ItemTemplate = M('ItemTemplate');
		$fields = $ItemTemplate->query('desc __TABLE__ `extend`');
		if(empty($fields)){  $ItemTemplate->query("ALTER TABLE __TABLE__ add `extend` text  after redirect_uri");  }

		$Item = M('Item');
		$fields = $Item->query('desc __TABLE__ `thumb`');
		if(empty($fields)){ $Item->query("ALTER TABLE __TABLE__ add `thumb` varchar(255)  after image"); }
		$fields = $Item->query('desc __TABLE__ `sms_send`');
		if(empty($fields)){ $Item->query("ALTER TABLE __TABLE__ add `sms_send` text after send_content"); }
		$fields = $Item->query('desc __TABLE__ `timer`');
		if(empty($fields)){ $Item->query("ALTER TABLE __TABLE__ add `timer` int(1) NOT NULL DEFAULT  '0'  after sms_send"); }
		$fields = $Item->query('desc __TABLE__ `user_id`');
		if(empty($fields)){ $Item->query("ALTER TABLE __TABLE__ add `user_id` int(12) NOT NULL DEFAULT  '1'  after id");}
		$fields = $Item->query('desc __TABLE__ `seller_id`');
		if(empty($fields)){ $Item->query("ALTER TABLE __TABLE__ add `seller_id` int(12) NOT NULL DEFAULT  '1'  after user_pid"); }

		$Order = M('Order');
		$rs = $Order->query('alter table __TABLE__ modify column channel_id varchar(20);');
		$rs = $Order->query('alter table __TABLE__ modify column `item_extends` text;');
		$fields = $Order->query('desc __TABLE__ `is_sent`');
		if(empty($fields)){ $Order->query("ALTER TABLE __TABLE__ add `is_sent`  tinyint(1) NOT NULL DEFAULT  '0'  after is_delete"); }
		$fields = $Order->query('desc __TABLE__ `order_page`');
		if(empty($fields)){ $Order->query("ALTER TABLE __TABLE__ add `order_page` varchar(15) NOT NULL DEFAULT 'single' after order_no");}
		$fields = $Order->query('desc __TABLE__ `user_pid`');
		if(empty($fields)){  $Order->query("ALTER TABLE __TABLE__ add `user_pid` int(12) NOT NULL DEFAULT '1' after user_id"); }
		$fields = $Order->query('desc __TABLE__ `province`');
		if(empty($fields)){  $Order->query("ALTER TABLE __TABLE__ add `province` varchar(20) after region"); }
		$fields = $Order->query('desc __TABLE__ `city`');
		if(empty($fields)){  $Order->query("ALTER TABLE __TABLE__ add `city` varchar(20) after province"); }
		$fields = $Order->query('desc __TABLE__ `area`');
		if(empty($fields)){  $Order->query("ALTER TABLE __TABLE__ add `area` varchar(20) after city"); }
		
		$User = M('User');
		$fields = $User->query('desc __TABLE__ `pid`');
		if(empty($fields)){ $User->query("ALTER TABLE __TABLE__ add `pid` int(12) NOT NULL DEFAULT  '0'  after id");}
		$fields = $User->query('desc __TABLE__ `pid`');
		$rs = $User->query("alter table __TABLE__ modify column role enum('admin','member','agent') NOT NULL DEFAULT 'admin'");
		$fields = $User->query('desc __TABLE__ `group_id`');
		if(empty($fields)){ $User->query("ALTER TABLE __TABLE__ add `group_id` int(12) NOT NULL DEFAULT  '0'  after pid");}
		
		$Comments = M('Comments');
		$Comments->query('alter table __TABLE__ modify column add_time date NOT NULL;');
		$fields = $Comments->query('desc __TABLE__ `region`');
		if(empty($fields)){ $Comments->query("ALTER TABLE __TABLE__ add `region` varchar(100) NOT NULL DEFAULT  ''  after name"); }
		$fields = $Comments->query('desc __TABLE__ `reply_content`');
		if(empty($fields)){ $Comments->query("ALTER TABLE __TABLE__ add `reply_content` text after content"); }
		$fields = $Comments->query('desc __TABLE__ `status`');
		if(empty($fields)){ $Comments->query("ALTER TABLE __TABLE__ add `status` tinyint(1) NOT NULL DEFAULT '1' after name"); }
		
		$Model = M();
		$prefix = C('DB_PREFIX');
		$Model->query("CREATE TABLE IF NOT EXISTS `{$prefix}code` (`id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,`mobile` varchar(16) NOT NULL,`item_id` int(12) NOT NULL DEFAULT '0',`code` varchar(10) NOT NULL,`type` tinyint(4) NOT NULL DEFAULT '1',`status` tinyint(1) NOT NULL DEFAULT '0',`add_time` int(10) NOT NULL,PRIMARY KEY (`id`),KEY `mobile` (`mobile`)) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
		$Model->query("CREATE TABLE IF NOT EXISTS `{$prefix}user_group` (`id` int(12) unsigned NOT NULL AUTO_INCREMENT,`name` varchar(25) NOT NULL,`discount` tinyint(3) NOT NULL DEFAULT '100',`auth` text,PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8");
		
		$UserGroup = M('UserGroup');
		$fields = $UserGroup->query('desc __TABLE__ `role`');
		if(empty($fields)){ $UserGroup->query("ALTER TABLE __TABLE__ add `role` enum('admin','agent') NOT NULL DEFAULT 'agent' after id"); }
		
		$regions = $Order->field('id,region')->select();
		foreach($regions as $reg){
			if(!empty($reg['region'])){
				list($data['province'],$data['city'],$data['area'])=explode(' ',$reg['region']);
				$Order->where(array('id'=>$reg['id']))->save($data);
			}
		}
		
		die('升级完成');
    }
}	