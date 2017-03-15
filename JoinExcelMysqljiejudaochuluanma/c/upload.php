<?php
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('PRC');

include '../class/FileUpload.class.php';

// var_dump($_POST);

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

$act = !empty($_GET['act'])?$_GET['act']:'null';

$up = new FileUpload;

$up -> set('path', '../files/');
$up -> set('maxsize', 5000000);
$up -> set('allowtype', array('xlsx'));
$up -> set('israndname', false);

if($up -> upload('up')) {
echo 1;
    $name = $up->getFileName();
    header("location:insert.php?file=$name&act=$act");

} else {

    echo '<center>';
    echo '<img src = "../image/1.png" /><br/>';
    echo $up->getErrorMsg();
    echo '<img src = "../image/1.png" /><br/>';
    echo '<img src = "../image/3.png" /><br/>';
    echo '<img src = "../image/1.png" /><br/>';
    echo "<a href = '../view/index.html'>返回首页</a><br/>";
    echo '<br/>请仔细阅读信息，避免不必要的错误订单信息插入<br/>';
    echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
    echo '</center>';
    exit();
}




