<?php
//自定已函数 
function smarty_function_font($args,$smarty){
	$str="";
	for($i=0;$i<$args['line'];$i++){
		$str.="<font color='{$args['color']}' size='{$args['size']}'>{$args['content']}</font><br/>";
	}
	return $str;
}
?>