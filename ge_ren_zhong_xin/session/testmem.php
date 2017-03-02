<?php 
require_once"memcachesession.class.php";
$mem=new Memcache;
$mem->connect("localhost",11211);

//$_SESSION['data']="shen";
print_r($_SESSION);
?>