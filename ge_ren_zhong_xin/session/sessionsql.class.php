<?php 
//session存储数据库
date_default_timezone_set('PRC');
class dbsession{
	public static $pdo; //pdo对象
	public static $ctime; //当前时间
	public static $maxlifetime; //最大生存时间
	public static $uip; //用户正在用ip
	public static $uagent; //用户浏览器
	
	public static function start(PDO $pdo){
		self::$pdo=$pdo;
		self::$ctime=date('Y-m-d H:i:s',time());
		self::$maxlifetime=ini_get("session.gc_maxlifetime");
		self::$uip=self::$uip=!empty($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP']:
				   (!empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR']:
				   (!empty($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR']:"unlnow"));
		filter_var(self::$uip,FILTER_VALIDATE_IP)===false && self::$uip="unknow";
		self::$uagent=!empty($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:"";
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
		$sql="select * from session where sid=?";
		$stmt=self::$pdo->prepare($sql);
		$stmt->execute(array($sid));
		$res=$stmt->fetch(PDO::FETCH_ASSOC);

		if(!$res){
			return "";
		}

		if($res['utime']+self::$maxlifetime<self::$ctime){
			self::destroy($sid);
			return"";
		}

		if($res['ip']!=self::$uip||$res['uagent']!=self::$uagent){
			self::destroy($sid);
			return"";
		}

		return $res['sdata'];
	}

	public static function write($sid,$data){
		$sql="select * from session where sid=?";
		$stmt=self::$pdo->prepare($sql);
		$stmt->execute(array($sid));
		$res=$stmt->fetch(PDO::FETCH_ASSOC);

		if($res){
			if($res['sdata']!=$data||$res['utime']+10<self::$ctime){
				$sql="update session set sdata=?, utime=? where sid=?";
							$stmt=self::$pdo->prepare($sql);
							$stmt->execute(array($data,self::$ctime,$sid));
			}
		}else{
			if(!empty($data)){
				$sql="insert into session(sid,sdata,utime,ip,uagent)values(?,?,?,?,?)";
						$stmt=self::$pdo->prepare($sql);
						$stmt->execute(array($sid,$data,self::$ctime,self::$uip,self::$uagent));
			}
		}
	}

	public static function destroy($sid){
		$sql="delete from session where sid=?";
		$stmt=self::$pdo->prepare($sql);
		return $stmt->execute(array($sid));
	}

	public static function gc($maxlifetime){
		$sql="delete from session where utime<?";
		$stmt=self::$pdo->prepare($sql);
		return $stmt->execute(array(self::$ctime-self::$maxlifetime));
	}
}
	
?>