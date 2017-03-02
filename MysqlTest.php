<?php
$link = @mysql_connect('localhost','root','root');
if(!$link) 
{	
	echo '连接错误';
}
else 
{
	echo '可以连接';
}
?> 