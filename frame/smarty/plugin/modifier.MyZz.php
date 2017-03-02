<?php 
//文件命名规范modifier.修改器名字.php
//函数命名规范smarty_modifier_修改器名字
function smarty_modifier_MyZz($text,$zz,$str){
	return preg_replace($zz,$str,$text);
}
?>