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
        $where['u_pwd'] = $this->PreventSql($data['pwd']) ? md5($this->PreventSql($data['pwd']) . 'shenshuang') : 'nothink';
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
            $_SESSION['CheckJurisdiction'] = md5($res['jurisdiction'] . 'shenshuang');
            $_SESSION['CheckName'] = md5($res['u_name'] . 'shenshuang');

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
    private function GetIp()
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
    private function PreventSql($info)
    {
        if(is_array($info))
        {
            $data = array();
            foreach($info as $k => $v)
            {
                $data[$k] = $this->RePlaceStr($v);
            }
        }
        else
        {
            $data = $this->RePlaceStr($info);
        }
        return $data;
    }

    // 替换字符串
    private function RePlaceStr($str)
    {
        $str = str_replace('and','',$str);
        $str = str_replace('execute','',$str);
        $str = str_replace('count','',$str);
        $str = str_replace('chr','',$str);
        $str = str_replace('mid','',$str);
        $str = str_replace('master','',$str);
        $str = str_replace('truncate','',$str);
        $str = str_replace('char','',$str);
        $str = str_replace('declare','',$str);
        $str = str_replace('create','',$str);
        $str = str_replace('insert','',$str);
        // $str = str_replace('add','',$str);
        $str = str_replace('delete','',$str);
        $str = str_replace('update','',$str);
        $str = str_replace('select','',$str);
        $str = str_replace('find','',$str);
        $str = str_replace('or','',$str);
        $str = str_replace('"','',$str);
        $str = str_replace("'",'',$str);
        $str = str_replace('=','',$str);
        // $str = str_replace('<','',$str);
        $str = str_replace(' ','',$str); 
        $str = str_replace(';','',$str); 
        return $str;
    }
}