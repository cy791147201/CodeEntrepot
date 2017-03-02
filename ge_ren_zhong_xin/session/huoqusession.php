<?php 
echo "获取session";
//初始化session
session_start();
//获取所有
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
//通过key获取指定
echo "key名字是".$_SESSION['name'];
//数组
$arr=$_SESSION['az'];
foreach($arr as $key=>$val){
	echo"数组<br/>--$val";
}

?>