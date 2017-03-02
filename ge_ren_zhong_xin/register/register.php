<?php 
// 设置时区
date_default_timezone_set("PRC");

// 连接数据库
function DbLink($db)
{
    $conn = @mysql_connect('localhost', 'root', '');
    $SelectDb = mysql_select_db($db, $conn); 
    if(!$SelectDb)
    {
        echo '<center>数据库连接失败</center>';
    }
    else
    {
        //设置数据库连接字符集
        mysql_query("set name utf8");
    }
}
// 插入用户数据
function InsertUser($db, $sql, $msg)
{
    // 连接数据库
    DbLink($db);

    if(mysql_query($sql))
    {
        echo '<center>注册&nbsp;&nbsp;'. $msg .'&nbsp;&nbsp;用户成功</center>'; 
    }
    else
    {   
        echo '<center>注册&nbsp;&nbsp;'. $msg .'&nbsp;&nbsp;用户失败</center>'; 
    }
}
// 查找当前数据表中是否有该用户
function SelectUser($db, $table, $msg, $user, $name)
{
    DbLink($db);

    $sql = "select $name from $table where $name = '$user'";
    $res = mysql_query($sql);
    
    $arr = array();
    while($rs = mysql_fetch_assoc($res)){
        $arr[] = $rs;
    }
    if(empty($arr))
    {
        // echo 2;
        return true;
    }
    else
    { 
        echo '<center>'.$msg.'已存在该用户请重新输入</center>';
        // echo 1; 
        return false;
    }
}

// 用户参数
// 字符串替换符号，避免sql注入
$user = str_replace(';', '', str_replace('=', '', $_POST['user']));
$pwd = str_replace(';', '', str_replace('=', '', $_POST['pwd']));

// 正则匹配只匹配英文和数字
preg_match_all('/^[a-zA-Z0-9]{5,19}/', $user, $name);
$user = $name[0][0];
preg_match_all('/^[a-zA-Z0-9]{5,19}/', $pwd, $pwds);
$pwd = md5($pwds[0][0].'shenshuang');
$time = time();

// 查找当前数据库中是否有该用户
$res1 = SelectUser('zhangdan', 'admins', '账单系统', $user, 'name');
$res2 = SelectUser('sheng_cheng_ding_dan', 'user', '生成订单系统', $user, 'user');

// var_dump($res1);
// var_dump($res2);

if($res1 !== true || $res2 !== true)
{
    exit();
}
else
{
    // 插入数据
    InsertUser('zhangdan', "INSERT INTO admins(name, pwd, sta, reg_time, last_time) VALUES ('$user', '$pwd', '1', '$time', '$time')", '账单系统');
    InsertUser('sheng_cheng_ding_dan', "INSERT INTO user(user, pwd, sta, l_time) VALUES ('$user', '$pwd', '1', '$time')", '生成订单页面');
}

// header 延时跳转
header('Refresh:5;url=../index.html');