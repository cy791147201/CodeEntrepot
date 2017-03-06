<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller 
{
    // 展示登陆界面
    public function index()
    {
        if(!empty(cookie('IndentUser')) && !empty(cookie('IndentPwd')))
        {
            $user = cookie('IndentUser');
            $pwd = cookie('IndentPwd');
        }
        else
        {
            $user = '';
            $pwd = '';
        }

        $this->assign('user', $user);
        $this->assign('pwd', $pwd);
        $this->display();
    }

    // 验证登陆
    public function CheckLogin()
    {
        $data = I('post.');
        preg_match_all('/^[a-zA-Z0-9]{5,19}/', $data['user'], $name);
        $where['u_name'] = $this->PreventSql($name[0][0]) ? $this->PreventSql($name[0][0]) : 'nothink';
        $where['u_pwd'] = $this->PreventSql($data['pwd']) ? md5($data['pwd'].'shenshuang') : 'nothink';
        $where['sta'] = 1;
  
        $Admin = M('Admin');
        $res = $Admin->where($where)->find();

        // 登录成功
        if($res)
        {
            // cookie保存登录信息
            // 保存
            if($data['save'] === '1')
            {
                cookie('IndentUser', $data['user'], time() + 54 * 7 * 24 * 3600);
                cookie('IndentPwd', $data['pwd'], time() + 54 * 7 * 24 * 3600);
            }
            else if($data['save'] === '0')
            {   
                cookie('IndentUser', null);
                cookie('IndentPwd', null);
            }

            unset($res['u_pwd']);
            $_SESSION['id'] = $where['id'] = $res['u_id'];
            $_SESSION['name'] = $res['u_name'];
            $_SESSION['sta'] = $res['sta'];
            $_SESSION['r_time'] = $res['r_time'];
            $_SESSION['last_time'] = $res['l_time']?$res['l_time']:'1';
            $_SESSION['last_ip'] = $res['l_ip']?$res['l_ip']:'1';
            $_SESSION['jurisdiction'] = $res['jurisdiction'];

            $data['l_time'] = time();
            $data['l_ip'] = $this->GetIp();
            $Admin->where($where)->data($data)->save();

            echo '<center>';
            $this->success('登陆成功<br/>欢迎回来<br/>'.$_SESSION['name'].'<br/>上次登陆时间'.date('Y-m-d H:i:s', $_SESSION['last_time']).'<br/>上次登录ip'.$_SESSION['last_ip'], U('Handle/HandleHome'), 9);
            echo '</center>';
        }
        else
        {
            echo '<center>';
            $this->error('用户信息错误');
            exit();
            echo '</center>';
        }
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

    // 防止sql注入
    public function PreventSql($info)
    {
        if(is_array($info))
        {
            $data = array();
            foreach($info as $v)
            {
                $data[] = str_replace('find', '', str_replace('select', '', str_replace('update', '',  str_replace('delete', '', str_replace('insert', '', str_replace('>', '', str_replace('<', '', str_replace('=', '', $v))))))));
            }
        }
        else
        {
            $data = str_replace('find', '', str_replace('select', '', str_replace('update', '',  str_replace('delete', '', str_replace('insert', '', str_replace('>', '', str_replace('<', '', str_replace('=', '', $info))))))));
        }
        return $data;
    }
}