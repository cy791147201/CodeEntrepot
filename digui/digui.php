<?php 
//递归 层数太深不适用耗费资源
echo array_sum(range(1,100)).'<br/>';

function sum($n){
	if($n>1){
		return sum($n-1)+$n;
	}else{
		return 1;
	}
}
echo  sum(100).'<br/>';
//递归读取目录
function recdir($path,$lev=0){
	$fo=opendir($path);
	while(($row=readdir($fo))!==false){
		if($row=='.' || $row=='..'){
			continue;
		}
		echo '|—'.str_repeat('—',$lev).$row.'<br/>';
		if(is_dir($path.'/'.$row)){
			recdir($path.'/'.$row,$lev+1);
		}
	}
	closedir($fo);
}
recdir('./',0);
//递归创建目录
/*
//echo mkdir('./a')?'ok':'nook';
function mk_dir($path){
	//目录存在返回true
	if(file_exists($path) && is_dir($path)){
		return true;
	}
	//副目录存在创建
	if(is_dir(dirname($path))){
		return mkdir($path);
	}
	//父目录也不存在
	mk_dir(dirname($path));
	return mkdir($path);
}
mk_dir('./a/1/1/1/1/1');

function mk_dir($path){
	if(is_dir($path)){
		return true;
	}
	return is_dir(dirname($path))||mk_dir(dirname($path))?mkdir($path):false;
}
echo mk_dir('./aa/aaa/aaa')?'ok':'nook';

echo mkdir('./aaa/aa',0777,true)?'ok':'nook';*/
//递归删除目录
function deldir($path){
	if(!is_dir($path)){
		return NULL;
	}
	$fo=opendir($path);
	while(($row=readdir($fo))!==false){
		if($row=='.' || $row=='..'){
			continue;
		}
		if(!is_dir($path.'/'.$row)){
			unlink($path.'/'.$row);
		}else{
			deldir($path.'/'.$row);
		}
	}
	closedir($fo);
	rmdir($path);
	echo "删了".$path."<br/>";
	return true;
}
deldir('./aaa');

?>