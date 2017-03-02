<?php 
date_default_timezone_set("PRC");
define("ROOT", str_replace("\\","/",dirname(__FILE__))."/");
require_once ROOT."../libs/Smarty.class.php";
$smarty=new smarty;
//叫老版本适用
//$smarty->template_dir="./value/";
//$smarty->compile_dir="./comp/";
//3中使用
$smarty->setTemplateDir(ROOT."./value/");
//$smarty->addTemplateDir("./value/");
$smarty->setCompileDir(ROOT."./comp/");
//指定配置文件目录
$smarty->setConfigDir(ROOT."./config/");
//添加插件目录
$smarty->addPluginsDir(ROOT."./plugin/");
//启用缓存
$smarty->caching=2;
//指定缓存目录
$smarty->setCacheDir(ROOT."./cache/");
//设置缓存时间
$smarty->cache_lifetime=10;
//设置定界符使用空格
$smarty->auto_literal=false;
//设置定界符
$smarty->left_delimiter="<{";
$smarty->right_delimiter="}>";
?>