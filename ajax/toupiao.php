<?php
// sleep(3);
if(rand(1,10)<4){
	echo 'shibai';
}else{
	$res = file_get_contents('./toupiao.txt');

	$res +=1;

	file_put_contents('./toupiao.txt', $res);
	echo 'chenggong';
}