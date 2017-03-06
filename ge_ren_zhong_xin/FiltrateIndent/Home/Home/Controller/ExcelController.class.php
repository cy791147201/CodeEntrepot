<?php
namespace Home\Controller;
use Think\Controller;
class ExcelController extends BeforeController 
{
    public function index() 
    {
        $where['id'] = $_SESSION['id'];
        $where['jurisdiction'] = $_SESSION['jurisdiction'];
        $Admin = M('Admin');
        $res = $Admin->where($where)->find();
        if($res && $where['jurisdiction'] !== 'admin')
        {
            $this->display('index1');
        }
        else if($res && $res['jurisdiction'] === 'admin')
        {   
            $this->display('index');
        }
        else
        {
            $_SESSION = array();
        }
    }

    // 处理手动添加Excel模版
    public function DoHandAdd()
    {
        $who = I('get.temp');
        $info1 = I('post.');

        // 删除空白信息
        $info = array();
        foreach($info1['info'] as $k => $v)
        {
            if(!empty($v))
            {
                $info[$k] = $v;
            }
        }
        if(empty($info))
        {
            $this->ReturnJudge('提交信息为空', 'index');
            exit();
        }
        // 调用导入模版模块
        $this->InsertTemp($who, $info);
    }

    // 处理上传Excel倒入模版
    public function DoExcelAdd()
    {
        $who = I('get.temp');
        // thinkphp 上传文件
        // 实例化上传类
        $up = new \Think\Upload();
        // 设置附件上传大小
        $up->maxSize  = 3145728 ;
        // 设置附件上传类型
        $up->exts     = array('xlsx', 'xls');
        // 设置附件上传根目录
        $up->rootPath = './Uploads/excel/'; 
        // 设置附件上传（子）目录
        $up->savePath = ''; 
        $up->saveName = date('Y-m-d H-i-s', time()) . '_' . mt_rand();
        // 上传文件 
        $res1 = $up->upload();
        if(!$res1) 
        {
            // 上传错误提示错误信息
            $this->ReturnJudge($up->getError());
            exit();
        }
        else
        {
            // 上传成功
            // 获取文件路径
            $file = '';
            foreach($res1 as $v){
                $file = 'Uploads/excel/'.$v['savepath'].$v['savename'];
            }

            // 获取excel内容
            $data = $this->ImportExcel($file);
            // 调用导入模版模块
            $this->InsertTemp($who, $data[1]);

        }
    }
    // 导入模版
    public function InsertTemp($who, $info)
    {
        // 添加自己的模版
        if($who === 'myself')
        {
            $who = 's';
            $Temp = M('self_temp');
        }
        // 添加圆通快递的模版
        else if($who === 'express')
        {
            $who = 'e';
            $Temp = M('yuantong_temp');
        }
        else
        {
            $this->ReturnJudge('你谁啊');
            exit();
        }

        // 查询当前模版下的tag最大的配置
        // 状态
        $where1['sta'] = 1;
        
        $res1 = $Temp->where($where1)->max('tag');
        if($res1)
        {
            // 将当前最大的tag保存到session中，后面用
            $_SESSION["$TempBeForeTag"] = $res1;
            $MaxTag = $res1 + 1;
        }
        else
        {
            $MaxTag = 1;
        }
        $_SESSION['TempInsertTag'] = $MaxTag;
        // 格式化提交过来的信息
        foreach($info as $k => $v)
        {
            $info[$k] = $k.'TitValueInterval'.$v;
        }
        $name = implode('ArrayInterval', $info);
        // php匹配信息中英文数字指定的符号等
        // preg_match_all('/[\x{4e00}-\x{9fa5}\w]+/u', $name, $name1);
        // 防止一下sql注入吧
        $name1 = $this->PreventSql($name);
        $name2 = explode('ArrayInterval', $name1);

        $info2 = array();
        foreach($name2 as $v)
        {
            $key = explode('TitValueInterval', $v)[0];
            $val = explode('TitValueInterval', $v)[1];
            $info2[$key] = $val;
        }

        $data2 = array();
        $time = time();
        foreach($info2 as $k => $v)
        {
            $data2[$k]['w_ad'] = $_SESSION['id'];
            $data2[$k]['a_t'] = $time;
            $data2[$k]['tag'] = $MaxTag;
            $data2[$k]['sta'] = 1;
            $data2[$k]['line'] = $k + 1;
            $data2[$k]['l_val'] = $v;
        }

        $data2 = array_values($data2);
        $where3['tag'] = $_SESSION["$TempBeForeTag"];
        // var_dump($where3['tag']);exit();
        // 插入数据前有数据
        if(!empty($where3['tag']))
        {   
            $data3['sta'] = 0;
            $res3 = $Temp->where($where3)->save($data3);

            $data4['sta'] = 1;  
            // 更新之前的数据失败回滚
            if($res3 === false)
            {   
                $Temp->where($where3)->save($data4);

                $this->ReturnJudge('更新出错，请重新操作', 'index');
                exit();
            }
            else
            {   
                // 重新将键值从0排列，负责插入数据的时候有点问题
                $res2 = $Temp->addAll($data2);
                if($res2)
                {
                    $this->ReturnJudge('添加模版成功', 'index');
                    exit();
                }
                else
                {
                    $where4['tag'] = $_SESSION['TempInsertTag'];
                    $Temp->where($where4)->delete();
                    $Temp->where($where3)->save($data4);

                    $this->ReturnJudge('添加模版失败', 'index');
                    exit();
                }
            }
        }
        // 插入数据前没有数据
        else
        {
            $res2 = $Temp->addAll($data2);
            if($res2)
            {
                $this->ReturnJudge('添加模版成功', 'index');
                exit();
            }
            else
            {
                $where4['tag'] = $_SESSION['TempInsertTag'];
                $Temp->where($where4)->delete();

                $this->ReturnJudge('添加模版失败', 'index');
                exit();
            }
        }
    }

    // 展示当前模版
    public function ShowTemp()
    {
        $who = $this->PreventSql(I('get.temp'));
        // 用户模版
        if($who === 'user')
        {
            $who = 1;
            $Temp = M('self_temp');
        }
        // 快递模版
        else if($who === 'express')
        {
            $who = 2;
            $Temp = M('yuantong_temp');
        }
        else
        {
            $this->ReturnJudge('你想干森么');
            exit();
        }
        $where1['sta'] = 1; 
        $res1 = $Temp->where()->max('tag');

        if($res1)
        {
            $where1['tag'] = $res1;
            $res2 = $Temp->where($where1)->select();

            if($res2)
            {
                $where3['u_id'] = $res2[0]['w_ad'];
                $Admin = M('Admin');
                $res3 = $Admin->where($where3)->getField('u_name');
                $time = $res2[0]['a_t'];

                $this->assign('who', $who);
                $this->assign('user', $res3);
                $this->assign('time', $time);
                $this->assign('info', $res2);
                $this->display();
            }
            else
            {
                $this->ReturnJudge('当前模版不存在', 'index');
                exit();
            }
        }  
        else
        {
            $this->ReturnJudge('当前模版为空', 'index');
            exit();
        }
    }

    // 修改当前模版
    public function UpdTemp()
    {
        $who = $this->PreventSql(I('get.temp'));
        $info1 = $this->PreventSql(I('post.'));

        // 用户模版
        if($who === '1')
        {
            $Temp = 'self_temp';
        }
        // 快递模版
        else if($who === '2')
        {
            $Temp = 'yuantong_temp';
        }
        else
        {
            $this->ReturnJudge('what are you 弄啥勒？', 'index');
            exit();
        }

        $data1 = array();
        $ids = array();
        foreach($info1 as $k => $v);
        {
            foreach($v as $key => $val)
            {
                if(!empty($val))
                {
                    $ids['id'][] = $key;
                    $data1[]['l_val'] = $val;
                }
            }
        }
        $time1 = time();
        foreach($data1 as $k => $v)
        {
            $data1[$k]['w_upd'] = $_SESSION['id'];
            $data1[$k]['u_t'] = $time1; 
        }
        // 将数组键值重新从0开始
        // $data1 = array_values($data1);
        // 取出二维数组中的所有一位数组的键值
        // $id = array_column($data1, 'id');
        // 调用父方法，更新所有数据，有事务处理
        $res1 = $this->SaveAll($ids, $data1, $Temp);
        if($res1)
        {
            $this->ReturnJudge('更新成功', 'index');
            exit();
        }
        else
        {
            $this->ReturnJudge('更新失败', 'index');
            exit();
        }
    }
}