<?php 
//理论上递归可以化为迭代
//迭代创建目录
function mk_dir($path){
	$arr=array();
	while(!is_dir($path)){
		array_unshift($arr,$path);
		$path=dirname($path);
	}
	if(empty($arr)){
		return true;
	}
	foreach($arr as $v){
		echo $v.'创建成功<br/>';
		mkdir($v);
	}
}
mk_dir('./a/a/a/a/a');
?>