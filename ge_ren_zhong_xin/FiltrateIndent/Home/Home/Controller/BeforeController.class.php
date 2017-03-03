<?php
namespace Home\Controller;
use Think\Controller;
class BeforeController extends Controller 
{
    // 检查用户是否登陆
    public function _initialize()
    {   
        if(empty($_SESSION['id']) || empty($_SESSION['name']) || empty($_SESSION['sta']) || empty($_SESSION['r_time']) || empty($_SESSION['last_time']) || empty($_SESSION['last_ip']))
        {
            echo '<center>';
            $this->redirect('Index/index', null, 3, '请重新登陆');
            echo '</center>';
        }  
    }

    // 返回判断
    public function ReturnJudge($msg = '', $jump = '')
    {
        echo '<center>';
        if(empty($jump))
        {
            $this->error($msg);
        }
        else
        {
            $this->success($msg, $jump);
        }
        echo '</center>';
    }
    // 退出
    public function LoginOut()
    {
        $_SESSION = array();
        $this->_initialize();
    }
    
    // php获取ip
    function GetIp()
    {
        global $ip;
        if(getenv("HTTP_CLIENT_IP"))
        {
            $ip = getenv("HTTP_CLIENT_IP");
        }
        else if(getenv("HTTP_X_FORWARDED_FOR"))
        {
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        }
        else if(getenv("REMOTE_ADDR"))
        {
            $ip = getenv("REMOTE_ADDR");
        }
        else 
        {
            $ip = "Unknow";
        }
        return $ip;
    }

    // 导入excel
    public function ImportExcel($file)
    {
        // 判断文件是什么格式
        $type = pathinfo($file); 
        $type = strtolower($type["extension"]);
        if($type == 'xlsx') 
        { 
            $type = 'Excel2007'; 
        } 
        elseif($type == 'xls')
        { 
            $type = 'Excel5'; 
        }

        ini_set('max_execution_time', '0');
        Vendor('PHPExcel.PHPExcel');

        // 判断使用哪种格式
        $objReader = \PHPExcel_IOFactory::createReader($type);
        $objPHPExcel = $objReader->load($file); 
        $sheet = $objPHPExcel->getSheet(0); 
        // 取得总行数 
        $highestRow = $sheet->getHighestRow();     
        // 取得总列数      
        $highestColumn = $sheet->getHighestColumn(); 
        //循环读取excel文件,读取一条,插入一条
        $data=array();
        //从第一行开始读取数据
        for($j=1;$j<=$highestRow;$j++)
        {
            //从A列读取数据
            for($k='A';$k<=$highestColumn;$k++)
            {
                // 读取单元格
                $data[$j][]=$objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue();
            } 
        }  
        return $data;
    }
}