<?php 
require_once"sessionsql.class.php";
try{
	$pdo=new PDO("mysql:host=localhost;dbname=myku","root","");
}catch(PDOException $e){
	echo "错误".$e->getMangess();
}
dbsession::start($pdo);
$_SESSION['data']="shesn";
?>