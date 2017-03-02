<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>新建网页</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="网址说明" />
<link rel="stylesheet" href="upload.css"/>
<style>

</style>
</head>
<body>
	<form enctype="multipart/form-data" method="post" action="uploadprocess.php" name="myform">
		<table>
			<tr><h2>文件上传</h2></tr>
			<tr><td>用户名</td><td><input type="text" name="username" /></td></tr>
			<tr><td>文件信息</td><td><textarea name="fileintro"></textarea></td></tr>
			<tr><td>选择文件</td><td><input type="file" name="myfile" /></td></tr>
			<tr><td colspan="2"><input type="submit" value="上传文件" /></td></tr>
		</table>
	</form>
</body>
</html>