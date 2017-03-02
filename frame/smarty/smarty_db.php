<?php 
//静态页面 有利于搜索隐形
@$file="./cache/newindex_{$_GET['page']}.html";
$cachetime=10;
if(!file_exists($file)||filemtime($file)+$cachetime<time()){
	ob_start();//开启ob
	require_once"smartystart.php";
	$pdo=new PDO("mysql:host=localhost;dbname=myku","root","");
	$stmt=$pdo->prepare("select id,uid,title,ptime,mbody from emails");
	$stmt->execute();
	$users=$stmt->fetchAll(PDO::FETCH_ASSOC);
	$smarty->assign("users",$users);
	$smarty->display("smarty_db.html");

	$content=ob_get_contents();
	file_put_contents("$file", $content);//讲访问页面放入文件中
	echo "这是动态内容";
}else{
	require_once"$file";
	echo "这是静态内容";
}
ob_flush();//将访问页面放入内存
?>