<?php 
session_start();
session_destroy();
foreach ($_COOKIE as $key => $value) {
	setcookie($key,"",time()-1);
	echo "删除所有成功";
}
?>