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

    // thinkphp导入excel
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

    // 防止sql注入
    public function PreventSql($info)
    {
        if(is_array($info))
        {
            $data = array();
            foreach($info as $k => $v)
            {
                // $data[$k] = str_replace('find', '', str_replace('select', '', str_replace('update', '',  str_replace('delete', '', str_replace('insert', '', str_replace('>', '', str_replace('<', '', str_replace('=', '', $v))))))));
                $data[$k] = $this->RePlaceStr($v);
            }
        }
        else
        {
            // $data = str_replace('find', '', str_replace('select', '', str_replace('update', '',  str_replace('delete', '', str_replace('insert', '', str_replace('>', '', str_replace('<', '', str_replace('=', '', $info))))))));
            $data = $this->RePlaceStr($info);
        }
        return $data;
    }

    // 替换字符串
    public function RePlaceStr($str)
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
        $str = str_replace('delete','',$str);
        $str = str_replace('update','',$str);
        $str = str_replace('select','',$str);
        $str = str_replace('find','',$str);
        $str = str_replace('or','',$str);
        $str = str_replace('"','',$str);
        $str = str_replace("'",'',$str);
        $str = str_replace('=','',$str);
        $str = str_replace('<','',$str);
        // $str = str_replace(' ','',$str); 
        $str = str_replace(';','',$str); 
        return $str;
    }
    // thinkphp 更新数组
    /*
    * @param $SaveWhere ：想要更新主键ID数组 格式array('需要更新的键值'=>array(1,2,3....));
    * @param $SaveData ：想要更新的ID数组所对应的数据 格式array(array('需要更新的键值'=>'value'); array('需要更新的键值'=>'value')....);
    * @param $TableName : 想要更新的表明
    * @param $SaveWhere : 返回更新成功后的主键ID数组
    * */
    public function SaveAll($SaveWhere, &$SaveData, $TableName)
    {
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
            // var_dump($model->_sql());
            if($isRight == 0)
            {
                //将更新失败的记录下来
                $error[] = $i;
                $flag = false;
            }
            //$flag=$flag&&$isRight;
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
    public function ArraYDif($arr1, $arr2) 
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
    public function CreateDataTag($table)
    {
        $Model = M($table);
        $tag = $_SESSION['id']. '_' .time();
        $sql = 'select d_tag from ' . $table . " where d_tag = '$tag' ";

        return $Model->query($sql)?$this->CreateDataTag():$tag;
    }   
}