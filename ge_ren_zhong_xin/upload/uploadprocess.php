<?php
date_default_timezone_set('PRC'); 
$username=$_POST['username'];
$fileintro=$_POST['fileintro'];
//判断大小
$size=$_FILES['myfile']['size'];
if($size>2*1024*1024){
	echo "文件过大";
	exit();
}
//获取文件类型
$type=$_FILES['myfile']['type'];
if(!$type='image/jpg'||!$type='image/jpeg'){
	echo "文件类型只能是jpg";
	exit();
}
//判断上传是否成功
if(is_uploaded_file($_FILES['myfile']['tmp_name'])){
	//动态创建文件夹 中文目录乱码 md5解决
	$path=$_SERVER['DOCUMENT_ROOT']."/upload/".md5($username);
	echo $path;
	//判断文件夹是否存在
	if(!file_exists($path)){
		mkdir($path);
	}
	//转存文件到希望目录
	//临时存放目录
	$tmp=$_FILES['myfile']['tmp_name'];
	//文件后缀名
	$houzhui=substr($_FILES['myfile']['name'],strrpos($_FILES['myfile']['name'],"."));
	//目标目录
	$move=$path."/".date('Y-m-d H-i-s').rand(1,100).$houzhui;
	//保存文件名中文转码
	//$iconv=iconv("utf-8","gb2312",$move);
	//保存名已设置为根目录个人目录时间随机1 100 后缀名  不需要再转码
if(move_uploaded_file($tmp,$move)){
	echo $_FILES['myfile']['name']."上传ok";
}else{
	echo "上传到存放目录失败";
}
}else{
	echo "临时文件上传失败";
}
?>