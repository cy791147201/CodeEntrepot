<?php
namespace Home\Controller;
use Think\Controller;
class IndentStatisticsController extends CommonController  
{
    // 展示订单地址统计首页
    public function index()
    {   
        $this->assigns();
        $this->display();
    }
    // 更新数据 添加数据 删除数据 展示界面
    public function Handles()
    {
        // var_dump($_POST);exit();
        // var_dump($_GET);exit();
        $info = I('post.');
        $info1 = I('get.');
        $act = empty($info['act'])?$info1['act']:$info['act'];
        $PregAddress = M('PregAddress');
        // var_dump($act);exit();
        if($act === 'upd1')
        {   
            $where['id'] = $info['g_id'];

            $data['sheng'] = $info['sheng'];
            $data['shi'] = $info['shi'];
            $data['who_add'] = $_SESSION['user']['name'];
            $data['add_time'] = time();

            $res = $PregAddress->where($where)->save($data);

            if(!$res)
            {
                $this->ReturnJudge('更新失败');
            }
        }
        else if($act === 'upd')
        {
            $where['id'] = $info1['g_id'];

            $info = $PregAddress->where($where)->find();

            if(!$info)
            {
                $this->ReturnJudge('没有找到该条数据');
            }

            $this->assigns();
            $this->assign('info', $info);
            $this->assign('act', 'upd1');
            $this->display('UpdAddress');
            exit();
        }
        else if($act === 'del')
        {
            $where['id'] = $info1['g_id'];
            $data['sta'] = 9;
            // 
            $res = $PregAddress->where($where)->save($data);
            if(!$res)
            {
                $this->ReturnJudge('删除失败');
            }
        }
        else if($act === 'add')
        {
            $this->assign('act', 'add1');
            $this->display('UpdAddress');
            exit();
        }
        else if($act === 'add1')
        {
            $data['sheng'] = $info['sheng'];
            $data['shi'] = $info['shi'];
            $data['who_add'] = $_SESSION['user']['name'];
            $data['add_time'] = time();
            $data['sta'] = 1;
            $data['sign'] = $PregAddress->max('sign') + 1;

            $res = $PregAddress->add($data);

            if(!$res)
            {
                $this->ReturnJudge('更新失败');
            }
        }
        else
        {
            $this->ReturnJudge('What Are You 弄啥嘞！');
        }

        $this->ReturnJudge('操作成功', 'ShowAddress');
    }
    // 展示已添加地址
    public function ShowAddress()
    {   
        $data = I('get.');
        // 分页类 thinkphp
        $page = isset($data['count'])?$data['count']+0:1;
        if($page < 1)
        {
            $page = 1;
        }
        $num = 15;
        $offset = ($page - 1) * $num;

        $where['sta'] = 1;
        $PregAddress = M('PregAddress');
        $total = $PregAddress->where($where)->count();

        if($page > ceil($total / $num))
        {
            $page = 1;
        }
        $page = new \Org\Tool\Page($total, $num);
        $pages = $page->page(0, 1, 2, 3, 4, 5, 6);

        $where['sta'] = 1;
        $PregAddress = M('preg_address');
        $info = $PregAddress->where($where)->limit($offset, $num)->order('id ASC')->select();

        $this->assigns();
        $this->assign('page', $pages);
        $this->assign('info', $info);
        $this->display();
    }
    // 添加地址
    public function AddAddress()
    {
        $data = I('post.');
        // var_dump($data);exit();
        $up = new \Think\Upload();// 实例化上传类
        $up->maxSize = 3145728;// 设置附件上传大小
        $up->allowExts  = array('xlsx', 'xls');// 设置附件上传类型
        if($data['type'] == 'address')
        {
            $up->rootPath  = 'Uploads/Excel/Address/';//设置附件上传目录
            $ExcelType = 'address';
        }
        else if($data['type'] == 'indent')
        {
            $up->rootPath  = 'Uploads/Excel/Indent/';//设置附件上传目录
            $ExcelType = 'indent';
        }
        else
        {
            $this->ReturnJudge('不闹好吗');
        }

        //上传单个文件 
        $res = $up->uploadOne($_FILES['file']);
        if(!$res)
        {
            $this->ReturnJudge($up->getError());
        }
        else
        {
            $dir = date('Y-m-d', time());
            $file = str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']).$up->rootPath.$dir.'/'.$res['savename'];
            // var_dump($file);
            // var_dump(str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
            // exit();
            // $this->ReturnJudge('上传成功', 'Handle/OrderList');
            $this->DisposeExcel($ExcelType, $file);
        }
    }
    // 处理excel信息 thinkphp excel 
    public function DisposeExcel($ExcelType, $obj)
    {
        $this->ImportExcel($ExcelType, $obj);

        $Lie1 = array();
        $lie2 = array();
// var_dump($_SESSION['Indent_Address']);exit();
        if($ExcelType === 'address')
        {
            $data1 = $_SESSION['Preg_Address'];

            $data = array();
            foreach($data1 as $v)
            {
                $tmp[0] = $this->trimall($v[0]);
                $tmp[1] = $this->trimall($v[1]);
                
                $data[] = $tmp;
            }
// var_dump($data);exit();
            //不要订单编号 
            // foreach($data as $v)
            // {  
            //     $Lie1[] = $v[0];
            //     $lie2[] = $v[1];
            // } 
            // 转化数据数组
            // 将原数组转化成sql需要的语句
            // $arr = array();
            // $tmp = '';
            // foreach($data as $v)
            // {
            //     $tmp['sheng'] = "('" . trim($v[0]). "'";
            //     $tmp['shi'] = "'" . trim($v[1]). "'";
            //     $tmp['sta'] = "'" . 1 . "'";
            //     $tmp['sign'] = "'" . $sign . "')";
            //     // 将单个数组数据转化成字符串并拼成新数组
            //     // $arr[] = implode(',', $tmp);
            //     $arr[] = $tmp;
            // }
            // // var_dump($arr);exit();
            // 将转化为sql语句的数组在转化成字符串
            // $arr1 = array();
            // $arr1 = implode(',', $arr);
            // 这样只需要一次sql插入多条数据，自我感觉还可以吧
            // $sql = 'INSERT INTO preg_address (sheng, shi, sta, sign) VALUES ' . $arr1;
            // $res = $PregAddress->query($sql);
            // thinkphp 中有addall方法换个方法
            $Model = M('preg_address');

            $sign = $Model->max('sign');
            if(empty($sign))
            {
                $sign = 1;
            }
            else
            {
                $sign += 1;
            }

            $arr = array();
            $tmp = '';
            foreach($data as $v)
            {
                $tmp['sheng'] = $v[0];
                $tmp['shi'] = $v[1];
                $tmp['sta'] = 1;
                $tmp['sign'] = $sign;
                $tmp['who_add'] = $_SESSION['user']['name'];
                $tmp['add_time'] = time();
                $arr[] = $tmp;
            }

        }
        else if($ExcelType === 'indent')
        {
            $data = $_SESSION['Indent_Address'];

            // $data = array();
            // foreach($data1 as $v)
            // {
            //     $v[0] = mb_ereg_replace('^(　| )+', '', $v[0]);
            //     $v[0] = mb_ereg_replace('(　| )+$', '', $v[0]);
            //     $v[1] = mb_ereg_replace('^(　| )+', '', $v[1]);
            //     $v[1] = mb_ereg_replace('(　| )+$', '', $v[1]);
                
            //     $data[] = $v;
            // }
            // 不要订单编号
            // foreach($data as $v)
            // {  
            //     $Lie1[] = $v[0];
            //     $lie2[] = $v[6];
            // }  

            $Model = M('indent_address');
            
            $sign = $Model->max('sign');
            if(empty($sign))
            {
                $sign = 1;
            }
            else
            {
                $sign += 1;
            }

            $arr = array();
            $tmp = '';
            foreach($data as $v)
            {
                // $tmp['num'] = $v[0];
                $tmp['address'] = $v[0];
                $tmp['sta'] = 1;
                $tmp['sign'] = $sign;
                $tmp['who_add'] = $_SESSION['user']['name'];
                $tmp['add_time'] = time();
                $arr[] = $tmp;
            }
        }
        else
        {
            $this->ReturnJudge('不闹好吗');
        }
        // // 不要订单编号
        // foreach($lie2 as $k => $v)
        // {
        //     if(empty($v)){
        //         unset($lie2[$k]);
        //     }   
        // }          
        // $lie1Num = count($Lie1);
        // $lie2Num = count($lie2);

        // // 不要订单编号
        // if($lie1Num !== $lie2Num)
        // {
        //     $this->ReturnJudge('excel表格省份列表与市区列表__或者订单编号与收货地址数量不一致，请仔细检查');
        // }

        $res = $Model->addALL($arr);
        // var_dump($Model->_sql());
        // exit();
        if(!$res)
        {   
            $where['sign'] = $sign;
            $where['who_add'] = $_SESSION['user']['name'];
            $res1 = $Model->where($where)->delete();
            // var_dump($Model->_sql());
            if(!$res1)
            {
                echo '<center>插入数据失误,有些问题，请牢记当前时间并联系管理员，否则后果自负</center>';
            }
            $this->ReturnJudge('插入数据失误');
        }
        
        // 更新数据
        $where['sta'] = 1;
        $PregAddress = M('preg_address');
        $info = $PregAddress->where($where)->select();
        if(!empty($info))
        {
            $Indent = M('indent_address');
            foreach($info as $v)
            {   
                $sheng = $v['sheng'];
                $shi = $v['shi'];
                // var_dump($sheng);
                $sql = "UPDATE indent_address SET preg_sheng = '$sheng', preg_shi = '$shi', preg = 1 WHERE address LIKE '$sheng%' AND address LIKE '%$shi%' AND sta = 1 AND preg = 0";
                
                $Indent->execute($sql);
                // var_dump($Indent->_sql());
            }
            $where1['sta'] = 1;
            $where1['preg'] = 0;
            $where1['preg_sheng'] = 'sheng';

            $res = $Indent->where($where1)->find();
            if($res)
            {
                foreach($info as $v)
                {   
                    $sheng = $v['sheng'];
                    $shi = $v['shi'];
                
                    $sql = "UPDATE indent_address SET preg_sheng = '$sheng', preg = 1 WHERE address LIKE '$sheng%' AND sta = 1 AND preg = 0";
                    
                    $Indent->execute($sql);
                }
            }
            $where2['sta'] = 1;
            $where2['preg'] = 0;
            $where2['preg_sheng'] = 'sheng';

            $res1 = $Indent->where($where2)->find();
            // var_dump($res1);exit();
            if($res1)
            {
                $data1['preg_sheng'] = '未知省份';
                $data1['preg'] = 1;

                $Indent->where($where2)->save($data1);
            }
            $where3['sta'] = 1;
            $where3['preg'] = 1;
            $where3['preg_shi'] = 'shi';

            $res1 = $Indent->where($where3)->find();
            if($res1)
            {
                $data2['preg_shi'] = '未知市区';

                $Indent->where($where3)->save($data2);
            }
        }
        // exit();
        // 连表更新
        // $sql = 'UPDATE Indent_Address a, Preg_Address b SET a.preg_sheng = b.sheng, a.preg_shi = b.shi WHERE a.address LIKE "%b.sheng" AND a.address LIKE "%b.shi%"';

        // $Indent = M('indent_address');

        // $Indent->query($sql);

        // $this->ReturnJudge('操作成功', 'index');
    }
    // 展示统计
    public function ShowStatistics()
    {
        $act = I('get.act');
        $sheng = I('get.sheng');

        if($act === 'default')
        {
            // $sql = "SELECT preg_sheng, preg_shi, SUM(id) AS 'shi_zong' FROM indent_address WHERE sta = 1 and preg = 1 GROUP BY preg_sheng, preg_shi";
            $sql = "SELECT preg_sheng, COUNT(id) AS 'sheng_zong' FROM indent_address WHERE sta = 1 AND preg = 1 GROUP BY preg_sheng ORDER BY sheng_zong DESC";

            $this->assign('area', '省级');
        }
        else if($act === 'details')
        {
            $sql = "SELECT preg_shi, COUNT(id) AS 'shi_zong' FROM indent_address WHERE preg_sheng LIKE '%$sheng%' AND sta = 1 AND preg = 1 GROUP BY preg_shi ORDER BY shi_zong DESC";

            $this->assign('area', '市级');
        }
        $Indent = M('indent_address');
        $info = $Indent->query($sql);
        
        $this->assigns();
        $this->assign('info', $info);
        $this->display();
    }
}