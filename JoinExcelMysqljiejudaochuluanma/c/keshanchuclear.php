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

$sql = 'delete from tmp_indent where status = 1';
$sql1 = 'delete from tmp_no_send where status = 1';

$res = mysql_query($sql);
$res1 = mysql_query($sql1);

if(!$res){

    echo '删除临时订单表失败';
    exit();

}

if(!$res1){

    echo '删除临时不发货订单表失败';
    exit();

}

    echo '<center>
        <img src = "../image/1.png" /><br/>
        <img src = "../image/2.png" /><br/>
        <img src = "../image/1.png" /><br/>
        <a href = "../view/index.html">返回首页</a><br/>
        <br/>请仔细阅读信息，避免不必要的错误信息插入<br/>
        如有问题请联系工作人员，联系电话138-3838-3838<br/>
        </center>';