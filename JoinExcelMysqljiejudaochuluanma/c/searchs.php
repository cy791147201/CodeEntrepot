<?php 
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('PRC');

require_once '../config/db.php';

require_once '../config/SmartyConfig.php';

require_once '../class/tool.class.php';

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

$name = $_POST['name'];

if(empty($name)){
    echo '<center>';
    echo '<img src = "../image/1.png" /><br/>';
    echo '请输入正确的信息<br/>';
    echo '<img src = "../image/1.png" /><br/>';
    echo '<img src = "../image/3.png" /><br/>';
    echo '<img src = "../image/1.png" /><br/>';
    echo "<a href = '../view/index.html'>返回首页</a><br/>";
    echo '<img src = "../image/1.png" /><br/>';
    echo '<br/>请仔细阅读信息，避免不必要的错误订单信息插入<br/>';
    echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
    echo '</center>';
    exit();
}

$sql = "select * from yuantong where buyer = '$name' ";

$res = mysql_query($sql);

$data = array();

$row = '';

while($row = mysql_fetch_assoc($res)){

    $data[] = $row;

}

if(empty($data)){

    $str = new StrTool();

    $info = $str->MbStrSplit($name); 

    $arg0 = $info[0];
    $arg1 = $info[1];
    $arg2 = $info[2];
    $arg3 = $info[3];

    $sql1 = '';
    $sql2 = '';
    $sql3 = '';
    $sql4 = '';

    if(!empty($arg0)){

        $sql1 = "select * from yuantong where buyer like '$arg0%' ";
        $res1 = mysql_query($sql1);

        while($row1 = mysql_fetch_assoc($res1)){

            $data1[] = $row1;

        }

    }

    if(!empty($arg1)){

        $sql2 = "select * from yuantong where buyer like '$arg1%' ";
        $res2 = mysql_query($sql2);

        while($row2 = mysql_fetch_assoc($res2)){

            $data2[] = $row2;

        }
    }

    if(!empty($arg2)){

        $sql3 = "select * from yuantong where buyer like '$arg2%' ";
        $res3 = mysql_query($sql3);

        while($row3 = mysql_fetch_assoc($res3)){

            $data3[] = $row3;

        }
    }

    if(!empty($arg3)){

        $sql4 = "select * from yuantong where buyer like '$arg3%' ";
        $res4 = mysql_query($sql4);

        while($row = mysql_fetch_assoc($res4)){

            $data4[] = $row;

        }
    }

    $data[] = $data1;
    $data[] = $data2;
    $data[] = $data3;
    $data[] = $data4;

    $infos = array_filter($data);

    if(!empty($infos)){

        $datas = array();
        
        foreach ($infos as $k => $v) {

            foreach($v as $val){

                $datas[] = $val;

            }

        }

        if(empty($datas)){
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

            $smarty->assign('data', $datas);
            $smarty->display('index.tpl');

        }

    }else{
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
    }

   
}else{

    $smarty->assign('data', $data);
    $smarty->display('index.tpl');

}

