<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller 
{
    // shen 登陆界面
    public function index()
    {
        
        $this->display('Index/login');

    }

    // shen 检查登陆
    public function ShenCheck()
    {
        $info = I('post.');

        $data['user'] = $info['name'];

        $data['pwd'] = md5(md5($info['pwd'].'shen'));

        $Admin = M('Admin');

        $res = $Admin->where($data)->find();

        if(!$res){

            echo '<center>';
            $this->error('用户名账号密码错误');
            echo '</center>';
            exit();

        }else{

            unset($res['pwd']);

            $_SESSION['shenuser'] = $res['id'];

            echo '<center>';
            $this->success('登陆成功', 'ShenShow');
            echo '</center>';

        }

    }

    public function ShenShow()
    {
        $this->display('Index/one');
        
        // R('ShenShow/ShenNo');

        // R('ShenShow/ShenDo');
    }

    // shen 退出登录
    public function ShenOut()
    {
        // 退出删除cookie
        foreach($_COOKIE as $key => $value){

            setcookie($key,'',time()-1);

        }

        // 退出删除session
        session_destroy();  

        echo '<center>';
        $this->index();
        echo '</center>';
    }

}