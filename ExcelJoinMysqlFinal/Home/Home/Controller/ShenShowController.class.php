<?php
namespace Home\Controller;
use Think\Controller;

class ShenShowController extends BeforeController 
{
    public function index()
    {
        $this->assign('user', $_SESSION['shenuser']);

        $this->assign('last', $_SESSION['shentime']);

        $this->display('ShenShow/index');
    }
}