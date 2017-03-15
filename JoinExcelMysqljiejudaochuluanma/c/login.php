<?php 
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('PRC');

require_once '../config/db.php';

require_once '../config/SmartyConfig.php';

$data = $_POST;

$name = $data['user'];
$pwd = md5(md5($data['pwd']));

$sql = " select id, pwd, grade from admin where name = '$name' ";

$res = mysql_query($sql);

$info = mysql_fetch_assoc($res);

if(!$info){
    echo '<center>
        <img src = "../image/1.png" /><br/>
        你想干毛啊,用户名密码都忘了？<br/>
        <img src = "../image/1.png" /><br/>
        <img src = "../image/3.png" /><br/>
        <img src = "../image/1.png" /><br/>
        <a href = "../index.html">返回首页</a><br/>
        <br/>请仔细阅读信息，避免不必要的错误信息插入<br/>
        如有问题请联系工作人员，联系电话138-3838-3838<br/>
        </center>';
    exit();

}else{

    if($pwd != $info['pwd']){

        echo '<center>
            <img src = "../image/1.png" /><br/>
            你想干毛啊,用户名密码都忘了？<br/>
            <img src = "../image/1.png" /><br/>
            <img src = "../image/3.png" /><br/>
            <img src = "../image/1.png" /><br/>
            <a href = "../index.html">返回首页</a><br/>
            <br/>请仔细阅读信息，避免不必要的错误信息插入<br/>
            如有问题请联系工作人员，联系电话138-3838-3838<br/>
            </center>';
        exit();

    }else{

        setcookie('user', $name, time()+2*3600);
        setcookie('id', $info['id'], time()+2*3600);
        setcookie('grade', $info['grade'], time()+2*3600);

        header('location:../view/index.html');

    }

}

