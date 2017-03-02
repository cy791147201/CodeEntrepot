<?php 
require_once"conn.php";
require_once"config.php";
date_default_timezone_set('PRC');
if(empty($_SESSION['name'])){
		header("location:login.php");
		}
echo "你好！".$_SESSION['name']."<a href='logout.php'>退出</a>";
$stmt=$pdo->prepare("select id,uid,title,ptime from emails where uid=?");
$stmt->execute(array($_SESSION['id']));
echo "你有".$stmt->rowcount()."封邮件";
echo"<table>";
	echo "<tr><th>ID</th><th>TITLE</th><th>DATE</th></tr>";
	while(list($id,$title)=$stmt->fetch(PDO::FETCH_NUM)){
		echo"<tr>";
		echo"<td>".$id."</td>";
		echo"<td>".$title."</td>";
		echo"<td>".date('Y-m-d H:i:s')."</td>";
		echo"</tr>";
	}
echo"</table>";
?>