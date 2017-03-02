<?php 
//自定义快函数
//快函数  文件名定义规范 block。函数名。php
//函数定义规范 function smarty_block_函数名（）
//参数
//1属性相关的数组
//2标记中间的内容
//3参数是smarty
//4医用参数，开始true结束false 
function smarty_block_fonts($args,$content,$smarty,&$repeat){
		//如果不!$repeat 为假 有可能输出两次 测试  输出一次空白
		$str="";
			for($i=0;$i<$args['line'];$i++){
				$str.="<font color='{$args['color']}' size='{$args['size']}'>{$content}</font><br/>";
			}
			return $str;
	
}
?>