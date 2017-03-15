<?php
 //设置时区
 date_default_timezone_set('PRC');
 /*
  返回的提交消息
  status:状态
  msg:提示信息
 */
 $msg = array('status'=>0,'msg'=>'');
  
 //获取提交过来的数据
 $name = $_POST['username'];
 $pwd = $_POST['userpwd'];
  
 //模拟登录验证
 $user = array();
 $user['name'] = 'jack';
 $user['pwd'] = 'jack2014';
  
 if($name != $user['name']){
  $msg['msg'] = '111111111111!';
  $str = json_encode($msg);
  echo $str;
  exit;
 }else if($pwd != $user['pwd']){
  $msg['msg'] = '22222222222!';
  $str = json_encode($msg);
  echo $str;
  exit;
 }
  
 $msg['msg'] = '33333333333333!';
 $msg['status'] = 1;
 $str = json_encode($msg);
 echo $str;