<?php 
require_once"config.php";
try{
	$pdo=new PDO(DSN,USER,PASS);
}catch(PDOException $e){
	echo "错误".$e->getMessage();
}
?>