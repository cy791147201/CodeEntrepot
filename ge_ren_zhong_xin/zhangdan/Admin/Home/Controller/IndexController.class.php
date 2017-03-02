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
        
        preg_match_all('/^[a-zA-Z0-9]{5,19}/', $data['user'], $name);
        $where['name'] = $name[0][0];
        $where['pwd'] = md5($data['pwd'].'shenshuang');
        $where['sta'] = 1;
  
        $Admins = M('Admins');
        $res = $Admins->where($where)->find();

        $SMsg = '<br/>登陆成功，上次登陆时间为<br/>' . date('Y-m-d H:i:s', $res['last_time']).'<br/>稍后跳转';
        $EMsg = '<br/>用户不存在，请检查输入是否有误';

        if($res)
        {
            $info['last_time'] = time();
            $Admins->where($res['id'])->save($info);
            $_SESSION['user']['last_time'] = $res['last_time'];
            $_SESSION['user']['name'] = $res['name'];
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