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
        // 添加自己的模版
        if($who === 'myself')
        {
            $who = 's';
            $Temp = M('self_temp');
            $TempTag = 'SelfTag';
        }
        // 添加圆通快递的模版
        else if($who === 'express')
        {
            $who = 'e';
            $Temp = M('yuantong_temp');
            $TempTag = 'YuanTongTag';
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
            $_SESSION["$TempTag"] = $res1;
            $MaxTag = $res1 + 1;
        }
        else
        {
            $MaxTag = 1;
        }

        // 格式化提交过来的信息
        // php匹配中英文数字
        foreach($info as $k => $v)
        {
            $info[$k] = $k.'TitValueInterval'.$v;
        }
        $name = implode('ArrayInterval', $info);
        preg_match_all('/[\x{4e00}-\x{9fa5}\w]+/u', $name, $name1);
        $name2 = implode('', $name1[0]);
        $name3 = explode('ArrayInterval', $name2);

        $info2 = array();
        foreach($name3 as $v)
        {
            $key = explode('TitValueInterval', $v)[0];
            $val = explode('TitValueInterval', $v)[1];
            $info2[$key] = $val;
        }

        $data1 = array();
        $time = time();
        foreach($info2 as $k => $v)
        {
            $data1[$k]['w_ad'] = $_SESSION['id'];
            $data1[$k]['a_t'] = $time;
            $data1[$k]['tag'] = $MaxTag;
            $data1[$k]['sta'] = 1;
            $data1[$k]['line'] = $k + 1;
            $data1[$k]['l_val'] = $v;
        }

        $res2 = $Temp->addAll($data1);
        if($res2)
        {
            if($who === 'myself')
            {
                $TempTag = 'SelfTag';
            }
            // 添加圆通快递的模版
            else if($who === 'express')
            {
                $TempTag = 'YuanTongTag';
            }
            $where2['tag'] = $_SESSION["$TempTag"];
            $data2['sta'] = 0;
            $Temp->where($where2)->save($data2);
            $this->ReturnJudge('添加模版成功', 'index');
        }
        else
        {
            $this->ReturnJudge('添加模版失败', 'index');
        }
    }

    // 处理上传Excel倒入模版
    public function DoExcelAdd()
    {
        // thinkphp 上传文件
        $up = new \Think\Upload();// 实例化上传类
        $up->maxSize  = 3145728 ;// 设置附件上传大小
        $up->exts     = array('xlsx', 'xls');// 设置附件上传类型
        $up->rootPath = './Uploads/'; // 设置附件上传根目录
        $up->savePath = ''; // 设置附件上传（子）目录
        $up->saveName = date('Y-m-d H-i-s', time()) . '_' . mt_rand();
        // 上传文件 
        $res1 = $up->upload();
        if(!$res1) 
        {
            // 上传错误提示错误信息
            $this->ReturnJudge($up->getError());
            exit()
        }
        else
        {
            // 上传成功
            $this->ReturnJudge('上传成功！', 'index');
        }
    }
}