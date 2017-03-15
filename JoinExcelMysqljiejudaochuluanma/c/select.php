<?php 
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('PRC');

require_once '../config/db.php';

require_once '../config/SmartyConfig.php';

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

$id1 = $_POST['express'];
$id2 = $_POST['indent'];

$tel = $_POST['tel'];
$id = $_POST['id'];

$sql = '';

if($id1 != ''){

    $sql = "select * from yuantong where express = '$id1' ";

}

if($id2 != ''){

    $sql = "select * from yuantong where indent_id = '$id2' ";

}


if($tel != ''){

    $sql = "select * from yuantong where buyer_tel = '$tel' ";

}

if($id != ''){

    $sql = "select * from yuantong where id = '$id' ";

}

$res = mysql_query($sql);    

$data = array();

$row = '';

if(empty($res)){

    echo '<center>';
    echo '<img src = "../image/1.png" /><br/>';
    echo '没有查到相关信息，请输入正确的信息<br/>';
    echo '<img src = "../image/1.png" /><br/>';
    echo '<img src = "../image/3.png" /><br/>';
    echo '<img src = "../image/1.png" /><br/>';
    echo "<a href = '../view/index.html'>返回首页</a><br/>";
    echo '<img src = "../image/1.png" /><br/>';
    echo '<br/>请仔细阅读信息，避免不必要的错误订单信息插入<br/>';
    echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
    echo '</center>';
    exit();

}else{
    while($row = mysql_fetch_assoc($res))
    {
        $data[] = $row;
    }
  
    if(empty($data)){

        echo '<center>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '没有查到相关信息，请输入正确的信息<br/>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '<img src = "../image/3.png" /><br/>';
        echo '<img src = "../image/1.png" /><br/>';
        echo "<a href = '../view/index.html'>返回首页</a><br/>";
        echo '<br/>请仔细阅读信息，避免不必要的错误订单信息插入<br/>';
        echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
        echo '</center>';
        exit();
        
    }else{

        $smarty->assign('data', $data);
        $smarty->display('index.tpl');

    }

}





