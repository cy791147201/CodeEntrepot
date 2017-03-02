<?php
namespace Home\Controller;
use Think\Controller;
class BeforeController extends Controller 
{
    // shen 检查是否登录
    public function _initialize()
    {
        if(!isset($_SESSION['shenuser']) || $_SESSION['shenuser'] == ''){

            echo '<center>';
            // $this->error('没有登录');
            $this->error('没有登陆');
            echo '</center>';
            exit();

        }else{

            // $this->assign('user', $_SESSION['user']);

        }

    }



}