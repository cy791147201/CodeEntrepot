<?php
namespace Home\Controller;
use Think\Controller;
class BeforeController extends Controller 
{
    // 检查用户是否登陆
    protected function _initialize()
    {   
        if(empty($_SESSION['id']) || empty($_SESSION['name']) || empty($_SESSION['sta']) || empty($_SESSION['r_time']) || empty($_SESSION['last_time']) || empty($_SESSION['last_ip']) || $_SESSION['CheckName'] !== md5($_SESSION['name'] . 'shenshuang'))
        {
            echo '<center>';
            $this->redirect('Index/index', null, 3, '请重新登陆');
            echo '</center>';
        }
    }

    // 检查权限
    protected function CheckAdmin($jump1, $jump2)
    {
        $CheckJurisdiction = $_SESSION['CheckJurisdiction'];
        $Admin = md5($_SESSION['jurisdiction'] . 'shenshuang');
        if($CheckJurisdiction !== $Admin)
        {   
            $_SESSION = array();
        }
        else
        {
            if($_SESSION['jurisdiction'] === 'admin')
            {
                // echo 1;
                // $this->assign('OneInfoDisplay', 'none');
                $this->display($jump1);
            }
            else
            {
                // echo 2;
                $this->display($jump2);
            }
        }
    }

    // 返回判断
    protected function ReturnJudge($msg = '', $jump = '')
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
    protected function GetIp()
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

    // thinkphp导入excel
    protected function ImportExcel($file)
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
        // var_dump($data);
    }

    // thinkphp导出excel
    protected function ExportExcel($data, $FileName = 'simple')
    {
        ini_set('max_execution_time', '0');
        Vendor('PHPExcel.PHPExcel');

        // 新建对象
        // 记得加 \ 以免找不到excel类
        $PhpExcel = new \PHPExcel();

        // 生成excel
        $PhpExcel->getProperties()
                 ->setCreator("Maarten Balliauw")
                 ->setLastModifiedBy("Maarten Balliauw")
                 ->setTitle("Office 2007 XLSX Test Document")
                 ->setSubject("Office 2007 XLSX Test Document")
                 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                 ->setKeywords("office 2007 openxml php")
                 ->setCategory("Test result file");
        $PhpExcel->getActiveSheet()->fromArray($data);
        $PhpExcel->getActiveSheet()->setTitle('Sheet1');
        $PhpExcel->setActiveSheetIndex(0);

        // 输出文件
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;FileName=$FileName");
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
        header ('Cache-Control: cache, must-revalidate');
        header ('Pragma: public');

        // 记得加 \ 以免找不到文件
        $objwriter = \PHPExcel_IOFactory::createWriter($PhpExcel, 'Excel5');
        $objwriter->save('php://output');

        exit;
    }

    // 防止sql注入
    protected function PreventSql($info)
    {
        if(is_array($info))
        {
            $data = array();
            foreach($info as $k => $v)
            {
                $data[$k] = $this->RePlaceStr($v);
            }
        }
        else
        {
            $data = $this->RePlaceStr($info);
        }
        return $data;
    }

    // 替换字符串
    private function RePlaceStr($str)
    {
        $str = str_replace('and','',$str);
        $str = str_replace('execute','',$str);
        $str = str_replace('count','',$str);
        $str = str_replace('chr','',$str);
        $str = str_replace('mid','',$str);
        $str = str_replace('master','',$str);
        $str = str_replace('truncate','',$str);
        $str = str_replace('char','',$str);
        $str = str_replace('declare','',$str);
        $str = str_replace('create','',$str);
        $str = str_replace('insert','',$str);
        // $str = str_replace('add','',$str);
        $str = str_replace('delete','',$str);
        $str = str_replace('update','',$str);
        $str = str_replace('select','',$str);
        $str = str_replace('find','',$str);
        $str = str_replace('or','',$str);
        $str = str_replace('"','',$str);
        $str = str_replace("'",'',$str);
        $str = str_replace('=','',$str);
        // $str = str_replace('<','',$str);
        $str = str_replace(' ','',$str); 
        $str = str_replace(';','',$str); 
        return $str;
    }
    
    // thinkphp 更新二维数组数据
    /*
    * @param $SaveWhere ：想要更新主键ID数组 格式array('需要更新的键值'=>array(1,2,3....));
    * @param $SaveData ：想要更新的ID数组所对应的数据 格式array(array('需要更新的键值'=>'value'); array('需要更新的键值'=>'value')....);
    * @param $TableName : 想要更新的表明
    * @param $SaveWhere : 返回更新成功后的主键ID数组
    * */
    protected function SaveAll($SaveWhere, &$SaveData, $TableName)
    {
        // var_dump($SaveWhere);
        // var_dump($SaveData);
        // var_dump($TableName);
        // exit();
        if($SaveWhere == null || $TableName == null)
        {
            return false;
        }
        //获取更新的主键id名称
        $key = array_keys($SaveWhere)[0];
        //获取更新列表的长度
        $len = count($SaveWhere[$key]);
        $flag = true;
        // $model = isset($model)?$model:M($TableName);
        $model = M($TableName);
        //开启事务处理机制
        $model->startTrans();
        //记录更新失败ID
        $error = [];
        for($i = 0; $i < $len; $i++)
        {
            //预处理sql语句
            $isRight = $model->where($key.'='.$SaveWhere[$key][$i])->save($SaveData[$i]);
  
            if($isRight == 0)
            {
                //将更新失败的记录下来
                $error[] = $i;
                $flag = false;
            }
        }

        if($flag)
        {
            //如果都成立就提交
            $model->commit();
            return $SaveWhere;
        }
        else if(count($error)>0&count($error)<$len)
        {
            //先将原先的预处理进行回滚
            $model->rollback();
            for($i = 0; $i < count($error); $i++)
            {
                //删除更新失败的ID和Data
                unset($SaveWhere[$key][$error[$i]]);
                unset($SaveData[$error[$i]]);
            }
            //重新将数组下标进行排序
            $SaveWhere[$key] = array_merge($SaveWhere[$key]);
            $SaveData = array_merge($SaveData);
            //进行第二次递归更新
            $this->saveAll($SaveWhere, $SaveData, $TableName);
            return $SaveWhere;
        }
        else
        {
            //如果都更新就回滚
            $model->rollback();
            return false;
        }
    }  

    // 封装自己比较数组不同的函数
    // 返回数组中不同的函数
    protected function ArraYDif($arr1, $arr2) 
    {
        $ArrTemp1 = $arr1;
        $ArrTemp2 = $arr2;

        // 将数组的值作为键
        $ArrTemp2 = array_flip($ArrTemp2);
        foreach($ArrTemp1 as $key => $item) 
        {   
            if(isset($ArrTemp2[$item]) && $ArrTemp2[$item] == $key) 
            {
                unset($ArrTemp1[$key]);
            }
        }
        if(!empty($arr1))
        {
            $dif = $ArrTemp1;
        }
        else
        {
            $arr1 = array_flip($arr1);
            foreach($arr2 as $key => $item) 
            {   
                if(isset($arr1[$item]) && $arr1[$item] == $key) 
                {
                    unset($arr2[$key]);
                }
            }
            $dif = $arr2;
        }
        return $dif;
    }

    // 生成数据唯一标志
    protected function CreateDataTag($table)
    {
        $Model = M($table);
        $tag = $_SESSION['id']. '_' .time();
        $sql = 'select d_tag from ' . $table . " where d_tag = '$tag' ";

        return $Model->query($sql)?$this->CreateDataTag():$tag;
    }   

    protected function ArraySort($arr, $keys, $type = 'desc') 
    {
        $keysvalue = $new_array = array();

        foreach($arr as $k => $v) 
        {
            $keysvalue[$k] = $v[$keys];
        }

        if($type == 'asc') 
        {
            asort($keysvalue);
        } 
        else 
        {
            arsort($keysvalue);
        }

        reset($keysvalue);

        foreach($keysvalue as $k => $v) 
        {
            $new_array[$k] = $arr[$k];
        }
        
        return $new_array;
    }
}