<?php 
//静态页面 有利于搜索隐形
//如果没有缓存则连接数据库
require_once"smartystart.php";
if(!$smarty->isCached("smarty_db.html",$_SERVER['REQUEST_URI'])){

	$pdo=new PDO("mysql:host=localhost;dbname=myku","root","");
	$stmt=$pdo->prepare("select id,uid,title,ptime,mbody from emails");
	$stmt->execute();
	$users=$stmt->fetchAll(PDO::FETCH_ASSOC);
	$smarty->assign("users",$users);
	echo "动态页面";
}
//不缓存de  页面包含<{nocache}>不缓存的内容<{/nocache}>
$smarty->assign("time",date("Y-m-d H:i:s"));
$smarty->display("smarty_db.html",$_SERVER['REQUEST_URI']);
//清除所有缓存
//$smarty->clearAllcache();


?>