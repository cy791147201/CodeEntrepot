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
}