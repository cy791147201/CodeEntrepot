<?php 
require_once"config.php";
$name=$_SESSION['name'];
$_SESSION=array();
if(isset($_COOKIE[session_name()])){
	setcookie(session_name(),"",time()-1,"/");
}
session_destroy();
echo "再见".$name;
echo "<a href='login.php'>重新登录</a>";
?>