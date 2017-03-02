<?php 
require_once"smartystart.php";
//注册自定义函数
//function 注册名 函数名 html文件中使用的是注册名
//最好注册函数到plugin
$smarty->registerPlugin("function","hello","hellos");
function hellos($args,$smarty){
	$str="";
	for($i=0;$i<$args['line'];$i++){
		$str.="<font color='{$args['color']}' size='{$args['size']}'>{$args['content']}</font><br/>";
	}
	return $str;
	
}
$smarty->display("function.html");
?>