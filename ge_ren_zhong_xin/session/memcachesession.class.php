<?php 
//session存储数据库
class memsession{
	public static $mem; //pdo对象
	public static $maxlifetime; //最大生存时间
	
	public static function start(Memcache $memsession){
		self::$mem=$mem;
		self::$maxlifetime=ini_get("session.gc_maxlifetime");
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
		
	}	

	public static function close(){
		
	}

	public static function read($sid){
		$data=self::$mem->get($sid);
		if(empty($data)){
			return "";
		}
		return $data;
	}

	public static function write($sid,$data){
		self::$mem->set($sid,$data,MEMCACHE_COMPRESSED,0);
	}

	public static function destroy($sid){
		
	}

	public static function gc($maxlifetime){
		
	}
}
$mem=new Memcache();
$mem->connect("localhost",11211);
memsession::start($mem);
?>