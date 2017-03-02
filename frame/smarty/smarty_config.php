<?php 
require_once"smartystart.php";
$smarty->assign("a","this1 is2 a3 test4");
//注册插件自定义变量调节器插件
//定义字体函数
function FontStyle($str,$FontSize="3",$FontColor="green"){
	return '<font color="'.$FontColor.'"size="'.$FontSize.'">'.$str.'</font>';
}
$smarty->registerPlugin("modifier","MyStyle","FontStyle");
$smarty->registerPlugin("modifier","MyUcwords","ucwords");
$smarty->display("configtest.html");
?>