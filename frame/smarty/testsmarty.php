<?php 
 date_default_timezone_set("PRC");
require_once "../libs/Smarty.class.php";
$smarty=new smarty;
//叫老版本适用
//$smarty->template_dir="./value/";
//$smarty->compile_dir="./comp/";
//3中使用
$smarty->setTemplateDir("./value/");
$smarty->addTemplateDir("./value/");
$smarty->setCompileDir("./comp/");
//设置定界符使用空格
$smarty->auto_literal=false;
//设置定界符
$smarty->left_delimiter="<{";
$smarty->right_delimiter="}>";
$smarty->assign("title","this is a demo");
$smarty->assign("content","this is a content");
$smarty->assign("hello","this is a goodworld");
$smarty->display("./value/customsmarty.html");
?>