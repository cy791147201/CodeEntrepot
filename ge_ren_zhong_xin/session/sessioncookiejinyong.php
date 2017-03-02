<?php 
//cookie 禁用后可以使用
if($_GET['PHPSESSID']){
	session_id($_GET['PHPSESSID']);
}
	session_start();
//2用常量SID  在超链接上添加xxxname=xxx&SID
//3php ini 中添加session use_trans_sid=1 重启apache
?>