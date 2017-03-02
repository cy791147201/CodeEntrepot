<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller 
{
    // 展示登录界面
    public function index()
    {
        $this->display();
    }
    // 检查登陆用户
    public function DoLogin()
    {
        $data = I('post.');
        $a = $data['user'];
        preg_match_all('/^[a-zA-Z0-9]{5,19}/', $data['user'], $name);
        $where['user'] = $name[0][0];
        $where['pwd'] = md5($data['pwd'].'shenshuang');
        $where['sta'] = 1;
  
        $User = M('User');
        $res = $User->where($where)->find();

        $SMsg = '<br/>登陆成功，上次登陆时间为<br/>' . date('Y-m-d H:i:s', $res['l_time']).'<br/>稍后跳转';
        $EMsg = '<br/>用户不存在，请检查输入是否有误';

        if($res)
        {
            $info['l_time'] = time();
            $User->where($res['id'])->save($info);
            $_SESSION['user']['l_time'] = $res['l_time'];
            $_SESSION['user']['name'] = $res['user'];
            unset($res['pwd']);
            $this->ReturnJudge($SMsg, U('Handle/index'));
        }
        else
        {
            $this->ReturnJudge($EMsg);
        }
    }
    // 退出
    public function LogOut()
    {
        $SMsg = '退出成功';
        $EMsg = '退出失败';
        if(session_destroy())
        {
            $this->ReturnJudge($SMsg, U('Handle/index'));
        }else{
            $this->ReturnJudge($EMsg);
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
}
