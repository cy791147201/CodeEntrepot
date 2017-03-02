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
        $info = I('post.');

        // 添加自己的模版
        if($who === 'myself')
        {
            $who = 'm';
        }
        else if($who === 'express')
        {
            $who = 'e';
        }
        else
        {
            $this->ReturnJudge('你谁啊');
        }

        $WAd = $_SESSION['id'];
        $time = time();
        $name = implode('shenshuang', $info['name']);

        $where1['sta'] = 1;
        $where1['sign'] = $who;
        $Temp = M('Temp');
        $res1 = $Temp->where($where1)->max('tag');
        if($res1)
        {
            $max = $res1 + 1;
        }
        else
        {
            $max = 1;
        }

        // php匹配中英文数字
        preg_match_all('/[\x{4e00}-\x{9fa5}\w]+/u', $name, $name1);
        $name2 = implode('', $name1[0]);
        $name3 = explode('shenshuang', $name2);
        $data1 = array();
        foreach($name3 as $k => $v)
        {
            $data1[$k]['w_ad'] = $WAd;
            $data1[$k]['a_t'] = $time;
            $data1[$k]['sign'] = $who;
            $data1[$k]['tag'] = $max;
            $data1[$k]['sta'] = 1;
            $data1[$k]['line'] = $k + 1;
            $data1[$k]['l_name'] = $v;
        }

        $res2 = $Temp->addAll($data1);
        if($res2)
        {
            $this->ReturnJudge('添加模版成功', 'index');
        }
        else
        {
            $this->ReturnJudge('添加模版失败');
        }
    }

    // 处理上传Excel倒入模版
    public function DoExcelAdd()
    {
        // thinkphp 上传文件
        $up = new \Think\Upload();// 实例化上传类
        $up->maxSize = 3145728 ;// 设置附件上传大小
        $up->exts = array('xlsx', 'xls');// 设置附件上传类型
        $up->rootPath = './Uploads/'; // 设置附件上传根目录
        $up->savePath = ''; // 设置附件上传（子）目录
        $up->saveName = date('Y-m-d H-i-s', time()) . '_' . mt_rand();
        // 上传文件 
        $res1 = $up->upload();
        if(!$res1) 
        {
            // 上传错误提示错误信息
            $this->ReturnJudge($up->getError());
        }
        else
        {
            // 上传成功
            $this->ReturnJudge('上传成功！', 'index');
        }
    }
}