<?php 
require_once"customsmarty.class.php";
$smarty=new smarty;
//从数据库获取动态数据 
$titles="this is test";
$contents="this is contents";
//向模板中分配变量
$smarty->assign("title",$titles);
$smarty->assign("content",$contents);
$smarty->assign("hello","申");
//加载模板并显示
$smarty->display("customsmarty.html");
?>