<?php 
session_start();
//删除某一个key
unset($_SESSION['name']);
//删除所有 删除跟自己浏览器相关的session文件
session_destroy();
?>