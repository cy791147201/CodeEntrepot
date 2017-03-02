<?php 
class sessions{
	private static $path;
	public static function start($path="f:/session/"){
		self::$path=$path;
		//注册php session周期
		session_set_save_handler(
			array(__CLASS__,"open"),
			array(__CLASS__,"close"),
			array(__CLASS__,"read"),
			array(__CLASS__,"write"),
			array(__CLASS__,"destroy"),
			array(__CLASS__,"gc")
			);
		session_start();
	}
	public static function open($path,$name){
		return true;
	}	
	public static function close(){
		return true;
	}
	public static function read($sid){
		$filename=self::$path."SE_".$sid;
		return @file_get_contents($filename);
	}
	public static function write($sid,$data){
		$filename=self::$path."SE_".$sid;
		return file_put_contents($filename, $data);
	}
	public static function destroy($sid){
		$filename=self::$path."SE_".$sid;
		return @unlink($filename);
	}
	public static function gc($maxlifetime){
		foreach(glob(self::$path."SE_") as $file){
			if(filetime($file)+$maxlifetime<time()){
				@unlink($file);
			}
		}
		return true;
	}	
}
//开启
sessions::start();
?>