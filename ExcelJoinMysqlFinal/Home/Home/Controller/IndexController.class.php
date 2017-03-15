<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller 
{
    // 展示登录界面
    public function index()
    {
        $this->display('Index/index');
    }

    // 检查用户合法性
    public function ShenCheck()
    {
        $info = I('post.');

        if($info['sub'] == '登录'){

            $where['name'] = $info['user'];

            $where['pwd'] = md5(md5($info['pwd'].'shen'));
// echo md5(md5('shenshuangshen'));exit();
            $Admin = M('Admin');

            $res = $Admin->where($where)->find();

            if(!$res){

                echo '<center>';
                $this->error('账号或者密码错误');
                echo '</center>';
                exit();

            }else{

                $_SESSION['shenuser'] = $res['name'];

                $_SESSION['shentime'] = $res['last_log'];

                unset($res['pwd']);

                $id['id'] = $res['id'];

                $data['last_log'] = time();

//                 $data['ip'] = $this->GetIp();
// var_dump($data);exit();
                $res1 = $Admin->where($id)->data($data)->save();

                if(!$res1){

                    echo '<center>';
                    $this->error('更新用户信息失败');
                    echo '</center>';

                }

                echo '<center>';
                $this->success('欢迎回来', U('ShenShow/index'));
                echo '</center>';

            }

        }else{

            echo '<center>';
            $this->error('嘿嘿');
            echo '</center>';

        }
    }

    // 获取ip
    // function GetIp(){

    //     static $realip;

    //     if (isset($_SERVER)){

    //         if(isset($_SERVER["HTTP_X_FORWARDED_FOR"])){

    //             $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];

    //         }else if(isset($_SERVER["HTTP_CLIENT_IP"])){

    //             $realip = $_SERVER["HTTP_CLIENT_IP"];

    //         }else{

    //             $realip = $_SERVER["REMOTE_ADDR"];

    //         }

    //     } else {

    //         if (getenv("HTTP_X_FORWARDED_FOR")){

    //             $realip = getenv("HTTP_X_FORWARDED_FOR");

    //         }else if(getenv("HTTP_CLIENT_IP")) {

    //             $realip = getenv("HTTP_CLIENT_IP");

    //         }else{

    //             $realip = getenv("REMOTE_ADDR");

    //         }
    //     }

    //     return $realip;
    // }
}