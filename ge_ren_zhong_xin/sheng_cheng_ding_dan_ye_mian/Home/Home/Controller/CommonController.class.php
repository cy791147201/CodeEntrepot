<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller 
{

    // 检查用户是否登陆
    public function _initialize()
    {   
        if(empty($_SESSION['user']['l_time']))
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
            exit();
        }
        else
        {
            $this->success($msg, $jump);
        }
        echo '</center>';
    }
    // 复制给上次登陆时间
    public function assigns()
    {
        $this->assign('time', $_SESSION['user']['l_time']);
    }
    // 最简单的thinkphp excel 导入数据库
    function ImportExcel($ExcelType, $file)
    {
        ini_set('max_execution_time', '0');
        Vendor('PHPExcel.PHPExcel.IOFactory');
        
        $objReader = \PHPExcel_IOFactory::createReader('excel2007'); 
        $objPHPExcel = $objReader->load($file); 
        $sheet = $objPHPExcel->getSheet(0); 
        $highestRow = $sheet->getHighestRow();   
        $highestColumn = $sheet->getHighestColumn();
            
        $arr = array();
        // 获取excel行信息 j从第几行开始读数据
        for($j=2; $j<=$highestRow; $j++)                        
        { 
            $str = '';
            // 获取excel列信息 highestColumn列信息 
            for($k = 'A'; $k <= $highestColumn; $k++)           
            {
                $str .= $objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue().'|*|';
            } 

            $str = mb_convert_encoding($str, 'utf-8', 'auto');
            $strs = explode("|*|", $str);

            $arr[] = $strs;

        }
        // var_dump($arr);exit();
        // 将excel信息保存在session中 插入数据时候不用循环插入
        if($ExcelType === 'address')
        {
            $_SESSION['Preg_Address'] = $arr; 
        }   
        else if($ExcelType === 'indent')
        {
            $_SESSION['Indent_Address'] = $arr; 
        }
    }
    // 去出空格
    public function trimall($str)//删除空格
    {
        $qian=array(" ","　","\t","\n","\r");$hou=array("","","","","");
        $str1 = str_replace($qian,$hou,$str);    
        $str2 = mb_ereg_replace('^(　| )+', '', $str1);
        $str3 = mb_ereg_replace('(　| )+$', '', $str2);
        $str4 = preg_replace('#\s+#', ' ',trim($str3));
        return $str4;    
    }
}