<?php
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('PRC');

require_once '../config/db.php';

if(empty($_COOKIE['user'])){
    echo '<center>';
    echo '<img src = "../image/1.png" /><br/>';
    echo '小样你想干毛啊<br/>';
    echo '<img src = "../image/1.png" /><br/>';
    echo '<img src = "../image/3.png" /><br/>';
    echo '<img src = "../image/1.png" /><br/>';
    echo "<a href = '../index.html'>返回首页</a><br/>";
    echo '<br/>请仔细阅读信息，避免不必要的错误信息插入<br/>';
    echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
    echo '</center>';
    exit();
}

$id = $_POST['id'];
$info = $_POST['more'];
$user = $_COOKIE['user'];
$time = date('y-m-d h:i:s',time());

$grade = $_COOKIE['grade'];

if(empty($id))
{
    echo '<center>';
    echo '<img src = "../image/1.png" /><br/>';
    echo '没有查到相关数据<br/>';
    echo '<img src = "../image/1.png" /><br/>';
    echo '<img src = "../image/2.png" /><br/>';
    echo '<img src = "../image/1.png" /><br/>';
    echo "<a href = '../view/index.html'>返回首页</a>";
    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    echo "<a href = '../view/index.html'>返回前页查看(友情提示返回页面后请刷新)</a><br/>";
    echo '<img src = "../image/1.png" /><br/>';
    echo '<br/>请仔细阅读信息，避免不必要的错误订单信息插入<br/>';
    echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
    echo '</center>';
    exit(); 
}

if(empty($info))
{
    echo '<center>';
    echo '<img src = "../image/1.png" /><br/>';
    echo '请认真填写备注信息<br/>';
    echo '<img src = "../image/1.png" /><br/>';
    echo '<img src = "../image/2.png" /><br/>';
    echo '<img src = "../image/1.png" /><br/>';
    echo "<a href = '../view/index.html'>返回首页</a>";
    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    echo "<a href = '../view/index.html'>返回前页查看(友情提示返回页面后请刷新)</a><br/>";
    echo '<img src = "../image/1.png" /><br/>';
    echo '<br/>请仔细阅读信息，避免不必要的错误订单信息插入<br/>';
    echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
    echo '</center>';
    exit(); 
}

if($grade == 1 || $grade == 2){

    $sql = "update yuantong set more = '$info', upd_user = '$user', upd_time = '$time' where id = $id ";

    $res = mysql_query($sql);

    if($res){
        echo '<center>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '修改备注成功<br/>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '<img src = "../image/2.png" /><br/>';
        echo '<img src = "../image/1.png" /><br/>';
        echo "<a href = '../view/index.html'>返回首页</a>";
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo '<a href="javascript:history.go(-1)">返回前页查看(友情提示返回页面后请刷新)</a><br/>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '<br/>请仔细阅读信息，避免不必要的错误订单信息插入<br/>';
        echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
        echo '</center>';
        exit(); 
    }else{
        echo '<center>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '修改备注失败<br/>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '<img src = "../image/2.png" /><br/>';
        echo '<img src = "../image/1.png" /><br/>';
        echo "<a href = '../view/index.html'>返回首页</a>";
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo '<a href="javascript:history.go(-1)">返回前页查看(友情提示返回页面后请刷新)</a><br/>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '<br/>请仔细阅读信息，避免不必要的错误订单信息插入<br/>';
        echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
        echo '</center>';
        exit(); 
    }
}else{

    echo '<center>';
    echo '<img src = "../image/1.png" /><br/>';
    echo '小样你还没有权限啊......<br/>';
    echo '<img src = "../image/1.png" /><br/>';
    echo '<img src = "../image/3.png" /><br/>';
    echo '<img src = "../image/1.png" /><br/>';
    echo '<a href="javascript:history.go(-1)">返回前页查看</a><br/>';
    echo '<br/>请仔细阅读信息，避免不必要的错误信息插入<br/>';
    echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
    echo '</center>';
    exit(); 


}
