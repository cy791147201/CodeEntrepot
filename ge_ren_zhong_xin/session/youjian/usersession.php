<?php 
//注册php session周期
$path="f:/session/";
session_set_save_handler("open","close","read","write","destroy","gc");
function open($path,$name){
	return true;
}	
function close(){
	return true;
}
function read($sid){
	global $path;
	$filename=$path."SE_".$sid;
	return @file_get_contents($filename);
}
function write($sid,$data){
	global $path;
	$filename=$path."SE_".$sid;
	return file_put_contents($filename, $data);
}
function destroy($sid){
	global $path;
	$filename=$path."SE_".$sid;
	return @unlink($filename);
}
function gc($maxlifetime){
	global $path;
	foreach(glob($path."SE_") as $file){
		if(filetime($file)+$maxlifetime<time()){
			@unlink($file);
		}
	}
	return true;
}	
session_start();
?>