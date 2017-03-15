<?php 
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('PRC');

require_once '../config/db.php';

require_once '../PhpExcel/Classes/PHPExcel.php';

require_once '../PhpExcel/Classes/PHPExcel/IOFactory.php';

require_once '../PhpExcel/Classes/PHPExcel/Reader/Excel5.php';

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
// var_dump($_GET);exit();
$excelpath = '../files/'.$_GET['file'];
$act = $_GET['act'];
// var_dump($excelpath);
// var_dump($act);exit();

if($act == 'UpExcel'){
    $sql = 'select max(t_id) from yuantong';
}

if($act == 'UpNoSend'){
    $sql = 'select max(id) from no_send';
}

if($act == 'UpIndent'){
    $sql = 'select max(id) from indent';
}

$res = mysql_query($sql);
$num  = mysql_fetch_row($res);

if(empty($_GET['file']))
{
    echo '<center>';
    echo '<img src = "../image/1.png" /><br/>';
    echo '插入数据不合法<br/>';
    echo '<img src = "../image/1.png" /><br/>';
    echo '<img src = "../image/3.png" /><br/>';
    echo '<img src = "../image/1.png" /><br/>';
    echo "<a href = '../view/index.html'>返回首页</a><br/>";
    echo '<br/>请仔细阅读信息，避免不必要的错误订单信息插入<br/>';
    echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
    echo '</center>';
    exit();
}

$objReader = PHPExcel_IOFactory::createReader('excel2007'); 

$objPHPExcel = $objReader->load($excelpath); 

$sheet = $objPHPExcel->getSheet(0); 

$highestRow = $sheet->getHighestRow();   

$highestColumn = $sheet->getHighestColumn();

for($j=2; $j<=$highestRow-1; $j++)                        
{ 

    $str = '';

    for($k = 'A'; $k <= $highestColumn; $k++)           
    {

    $str .= $objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue().'|*|';

    } 

    $str = mb_convert_encoding($str, 'utf-8', 'auto');

    $strs = explode("|*|", $str);

    $user = $_COOKIE['user'];

    $time = time();

    // var_dump($strs);exit();

    if($act == 'UpExcel'){

        $sqls = "insert into yuantong(id, express, indent_id, goods_name, num, buyer, address_1, address_2, address_3, address_4, buyer_tel, addresser, seller_tel, seller_address_1, seller_address_2, seller_address_3, seller_address_4, seller_postcode, transfer, money, more, buyer_postcode, user, time) values ('{$strs[0]}', '{$strs[1]}', '{$strs[2]}', '{$strs[3]}', '{$strs[4]}', '{$strs[5]}', '{$strs[6]}', '{$strs[7]}', '{$strs[8]}', '{$strs[9]}', '{$strs[10]}', '{$strs[11]}', '{$strs[12]}', '{$strs[13]}', '{$strs[14]}', '{$strs[15]}', '{$strs[16]}', '{$strs[17]}', '{$strs[18]}', '{$strs[19]}', '{$strs[20]}', '{$strs[21]}', '$user', '$time')";

        $sql2 = 'select max(t_id) from yuantong';
    }

    if($act == 'UpNoSend'){

        $sqls = "insert into no_send(place_name, who_add, add_time, status) values ('{$strs[0]}', '$user', '$time', '1')";

        $sql2 = 'select max(id) from no_send';
        // var_dump($strs[3]);
        // var_dump($sqls);
    }

    if($act == 'UpIndent'){

        // $sqls = " insert into indent(numbers, t_id, goods_name, num, price, receiver, address, tel, pey_style, express, express_num, indent_status, add_time, indent_address, more, remark, who_add, add_times, status, down) VALUES ('{$strs[0]}', '{$strs[1]}', '{$strs[2]}', '{$strs[3]}', '{$strs[4]}', '{$strs[5]}', '{$strs[6]}', '{$strs[7]}', '{$strs[8]}', '{$strs[9]}', '{$strs[10]}', '{$strs[11]}', '{$strs[12]}', '{$strs[14]}', '{$strs[15]}', '{$strs[15]}', '$user', '$time', '0', '0') ";

        $sqls = " insert into indent(numbers, t_id, goods_name, num, price, receiver, address, tel, pay_style, express, express_num, indent_status, add_time, indent_address, more, remark, who_add, add_times, status, down) values ('{$strs[0]}', '{$strs[1]}', '{$strs[2]}', '{$strs[3]}', '{$strs[4]}', '{$strs[5]}', '{$strs[6]}', '{$strs[7]}', '{$strs[8]}', '{$strs[9]}', '{$strs[10]}', '{$strs[11]}', '{$strs[12]}', '{$strs[13]}', '{$strs[14]}', '{$strs[15]}', '$user', '$time','1','0') ";

        // var_dump($sqls);exit;

        // $sqls = "insert into indent(id, goods_name, num, buyer, buyer_address, buyer_tel, sender, sender_tel, send_address, sender_code, money, more, buyer_code, buyer_phone, who_add, add_time, status) values ('{$strs[0]}', '{$strs[1]}', '{$strs[2]}', '{$strs[3]}', '{$strs[4]}', '{$strs[5]}', '{$strs[6]}', '{$strs[7]}', '{$strs[8]}', '{$strs[9]}', '{$strs[10]}', '{$strs[11]}', '{$strs[12]}', '{$strs[13]}', '$user','$time','0')";

        // var_dump($sqls);

        $sql2 = 'select max(id) from indent';
        
        // var_dump($sqls);
    }

    $res = mysql_query($sqls);

    if(!$res){
        echo '<center>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '数据错误<br/>';
        echo '<img src = "../image/3.png" />';
        echo '<img src = "../image/1.png" /><br/>';
        echo "<a href = '../view/index.html'>返回首页</a><br/>";
        echo '<br/>请仔细阅读信息，避免不必要的错误订单信息插入<br/>';
        echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
        echo '</center>';
        exit();

    }   

}

$res = mysql_query($sql2);
$num1  = mysql_fetch_row($res);

// var_dump($res);
// var_dump($res1);
// var_dump($num);
// var_dump($num1);exit();

$num2 = $highestRow - 2;

// if($num[0] == 0){
//     $num[0] = 0;
// }

// if($num1[0] == 0){
//     $num1[0] = 0;
// }


$num3 = $num1[0] - $num[0];

$num4 = $num2 - $num3;



echo '<center>';
echo '<img src = "../image/1.png" /><br/>';
echo '插入前数据总量&nbsp;&nbsp;'.$num[0].'&nbsp;&nbsp;条<br/>';
echo 'excel表总数据量&nbsp;&nbsp;'.$num2.'&nbsp;&nbsp;条<br/>';
echo '插入后总数据量&nbsp;&nbsp;'.$num1[0].'&nbsp;&nbsp;条<br/>';
echo '<img src = "../image/1.png" /><br/>';
echo '<img src = "../image/2.png" /><br/>';
echo '<img src = "../image/1.png" /><br/>';  

if($num[0] + $num2 != $num1[0])
{
    echo '插入数据总量跟实际情况不符，数据量相差&nbsp;&nbsp;'.$num4.'&nbsp;&nbsp;条<br/>';

}else if($num[0] + $num2 == $num1[0])
{
    echo '插入数据总量跟实际情况相同,本次共插入&nbsp;&nbsp;'.$num2.'&nbsp;&nbsp;条数据<br/>';
}

echo "<br/><a href = '../view/index.html'>返回首页</a><br/>";
echo '<br/>请仔细阅读信息，避免不必要的错误订单信息插入<br/>';
echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
echo '<center/>';


