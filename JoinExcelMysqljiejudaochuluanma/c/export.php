<?php 
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('PRC');

require_once '../config/db.php';

require_once '../PhpExcel/Classes/PHPExcel.php';

// require_once '../PhpExcel/Classes/PHPExcel/IOFactory.php';

// require_once '../PhpExcel/Classes/PHPExcel/Writer/Excel5.php';

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

$status = empty($_GET['status'])?'null':$_GET['status'];

// var_dump($status);
// exit();

    $sql = "select * from indent where status = '$status' and down = 0";

    // var_dump($sql);exit();

    $sql1 = " update indent set down = 1 where status = '$status' and down = 0 ";

$res = mysql_query($sql);

if(!$res){

    echo '导出订单信息失败';
    exit();

}

$res1 = mysql_query($sql1);

if(!$res1){

    echo '修改订单下载订单信息失败';
    exit();

}

$data = array();

while($row = mysql_fetch_assoc($res)){

    $data[] = $row;

}

// 导出订单excel

//创建对象
$excel = new PHPExcel();

//Excel表格式,这里简略写了8列
$tit = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T');

//表头数组
$title = array('订单编号', 'ID', '产品信息', '数量', '价格', '姓名', '收货地址', '手机', '付款方式', '快递状态', '快递单号', '订单状态', '下单日期', '下单地址', '其他', '备注', '产品核实', '地址核实', '选择快递', '确认结果' );

//填充表头信息
for($i = 0; $i < count($title); $i++){

    $excel->getActiveSheet()->setCellValue("$tit[$i]1", "$title[$i]");

}

$i = 2; 
foreach($data as  $v){ 


        $excel->getActiveSheet()->setCellValue('A' . $i,  $v['numbers']); 
        $excel->getActiveSheet()->setCellValue('B' . $i,  $v['t_id']); 
        $excel->getActiveSheet()->setCellValue('C' . $i,  $v['goods_name']); 
        $excel->getActiveSheet()->setCellValue('D' . $i,  $v['num']); 
        $excel->getActiveSheet()->setCellValue('E' . $i,  $v['price']); 
        $excel->getActiveSheet()->setCellValue('F' . $i,  $v['receiver']); 
        $excel->getActiveSheet()->setCellValue('G' . $i,  $v['address']); 
        $excel->getActiveSheet()->setCellValue('H' . $i,  $v['tel']); 
        $excel->getActiveSheet()->setCellValue('I' . $i,  $v['pay_style']); 
        $excel->getActiveSheet()->setCellValue('J' . $i,  $v['express']); 
        $excel->getActiveSheet()->setCellValue('K' . $i,  $v['express_num']); 
        $excel->getActiveSheet()->setCellValue('L' . $i,  $v['indent_status']); 
        $excel->getActiveSheet()->setCellValue('M' . $i,  $v['add_time']); 
        $excel->getActiveSheet()->setCellValue('N' . $i,  $v['indent_address']); 
        $excel->getActiveSheet()->setCellValue('O' . $i,  $v['more']); 
        $excel->getActiveSheet()->setCellValue('P' . $i,  $v['remark']);  
        $i ++; 

  
}

$write = new PHPExcel_Writer_Excel5($excel);

// 解决导出excel乱码问题  原因是缓存 这个是清楚缓存的
ob_end_clean();

header("Pragma: public");

header("Expires: 0");

header("Cache-Control:must-revalidate, post-check=0, pre-check=0");

header("Content-Type:application/force-download");

//header("Content-Type:application/vnd.ms-execl");

header("Content-Type: application/vnd.ms-excel; charset=UTF-8");

header("Content-Type:application/octet-stream");

header("Content-Type:application/download");;

$name = date('Y-m-d-H-i-s', time());

header("Content-Disposition:attachment;filename=$name.xls");

header("Content-Transfer-Encoding:binary");

$write->save('php://output');

