<?php
namespace Home\Controller;
use Think\Controller;

class BeforeController extends Controller 
{
    // 检查是否登录
    public function _initialize()
    {
        if(!isset($_SESSION['shenuser']) || $_SESSION['shenuser'] == ''){

            echo '<center>';
            $this->error('没有登陆', U('Index/index'));
            echo '</center>';
            exit();

        }else{



        }

    }

}