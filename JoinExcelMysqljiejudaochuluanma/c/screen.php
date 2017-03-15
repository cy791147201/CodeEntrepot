 <?php
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('PRC');

require_once '../config/db.php';

if(empty($_COOKIE['user'])){
    echo '<center>
        <img src = "../image/1.png" />
        <br/>小样你想干毛啊<br/>
        <img src = "../image/1.png" />
        <br/><img src = "../image/3.png" /><br/>
        <img src = "../image/1.png" />
        <br/><a href = "../index.html">返回首页</a><br/>
        <br/>请仔细阅读信息，避免不必要的错误信息插入<br/>
        如有问题请联系工作人员，联系电话138-3838-3838<br/>
        </center>';
        exit();
}

// 筛选条件
$sql = 'select place_name from no_send where status = 1';

$res = mysql_query($sql);

$data = array();

while($row = mysql_fetch_row($res)){

    $data[] = $row;

}
   
// var_dump($data);

$info = array();

foreach($data as $v){

    foreach($v as $val){

        $info[] = $val;

    }

}

// var_dump($info);

$total = count($info);

for($i = 0; $i < $total; $i++){

    $str = explode('1', $info[$i]);

    $num = count($str);

    $condition = '';

    for($j = 0; $j < $num; $j++){

        $condition .= $str[$j].'%';

    }

    // var_dump($condition);
    
    $sql = " update indent set status = 4 where address like '%$condition' and down = 0";

    // var_dump($sql);

    $res = mysql_query($sql);

    if(!$res){

        echo '<center>修改状态失败请及时联系管理员</center>';
        exit();

    } 

}

echo '<center>成功<br/><a href = "../view/index.html">返回</a></center>';
