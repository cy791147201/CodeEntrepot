<?php 
echo "演示保存session";
session_start();
$_SESSION['name']="shen";
echo"保存成功";
//session可以保存 dobule  integer  bool  array  object
//保存inter bool
$_SESSION['a']=100;
$_SESSION['shen']="shen";
//保存数组
$az=array("2","2","2");
$_SESSION['az']=$az;
//保存对象
class z{
	var $aa;

	function __construct($aa){
		$this->aa=$aa;
	}
}
$q=new z("sssssssssss");
$_SESSION['a']=$q;
//session保存在服务器
//cookie保存在客户端
//禁用cookie后 每次请求会再建立全新session 无法让多个页面共享session
//如果用户禁用cookie 方法一将session——id()赋给变量设置变量赋给PHPSESSID

?>