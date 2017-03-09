<?php
namespace Home\Controller;
use Think\Controller;
class UserHandleController extends BeforeController 
{
    // 判断用户操作
    public function index()
    {
        $act = I('get.act');
        $act = $this->PreventSql($act);
        // var_dump($act);
        // 导出用户缺失的数据
        if($act === '1')
        {
            $this->DeficiencyUser();
        }
        // 导出快递缺失的数据
        else if($act === '2')
        {
            $this->DeficiencyExpress();
        }
        // 导出问题件
        else if($act === '3')
        {
            $this->ProblemExpress();
        }
        // 更新用户表
        else if($act === '4')
        {
            $this->UpdUserData();
        }
        else
        {
            $this->ReturnJudge('嘿嘿', 'Excel/index');
            exit();
        }
    }

    // 导出用户缺失的数据
    private function DeficiencyUser()
    {
        echo 1;
    }

    // 导出快递缺失的数据
    private function DeficiencyExpress()
    {
        echo 2;
    }

    // 导出问题件
    private function ProblemExpress()
    {
        echo 3;
    }

    // 更新用户表
    private function UpdUserData()
    {
        echo 4;
    }
}