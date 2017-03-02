<?php 
require_once"conn.php";
require_once"config.php";
	if(isset($_POST['do'])){
	$stmt=$pdo->prepare("select * from user where name=? and md5(password)=?");
	$stmt->execute(array($_POST['name'],md5($_POST['password'])));

	if($stmt->rowCount()>0){
		$_SESSION=$stmt->fetch(PDO::FETCH_ASSOC);
		$SESSION['name']=$_POST['name'];
		header("location:index.php");
	}else{
		echo "登录失败";
	}
	}
?>
<form action="login.php" method="post">
	姓名<input type="text" name="name" value=""/><br/>
	密码<input type="password" name="password" value=""><br/>
	<input type="submit" name="do" value="登录"><br/>
</form>
