<?php
namespace Home\Controller;
use Think\Controller;

class ShenShowController extends BeforeController 
{
    // shen 待处理用户
    public function ShenDetails()
    {
        $data = I('get.');

        $Indent = M('Indent');

        $where1['status'] = 1;

        $page1 = isset($data['count'])?$data['count']+0:1;

        if($page1 < 1){

            $page1 = 1;

        }

        $number1 = 11;
        
        $offset1 = ($page1 - 1)*$number1;


        $total1 = $Indent->where($where1)->count();

        if($page1 >ceil($total1/$number1)){

            $page1 = 1;

        }

        $page1 = new \Org\tool\Page($total1, $number1);

        $pages1 = $page1->page(6,4,2,0);

        $res1 = $Indent->where($where1)->limit($offset1, $number1)->order('id DESC')->select();

        $arr = array();

        foreach($res1 as $v){

            if($v['status'] == 1){

                $v['status'] = '未处理';

            }

            $arr[] = $v;

        }

        $this->assign('name', $_SESSION['user']);
        $this->assign('page1', $pages1);

        $this->assign('nodo', $arr);

    }

    // shen 左侧刷新区域
    public function ShenRefresh()
    {
        $this->ShenDetails();

        $this->display('ShenShow/ShenNo');
    }

    // shen 已确认用户
    public function ShenDo()
    {
        $data = I('get.');

        $where['status'] = 2;

        $page = isset($data['page'])?$data['page']+0:1;

        if($page < 1){

            $page = 1;

        }

        $number = 11;
        
        $offset = ($page - 1)*$number;

        $Indent = M('Indent');

        $total = $Indent->where($where)->count();

        if($page >ceil($total/$number)){

            $page = 1;

        }

        $page = new \Org\tool\Pages($total, $number);

        $pages = $page->page(3,1,6,4,2,0);

        $res = $Indent->where($where)->limit($offset, $number)->order('id DESC')->select();

        $arr = array();

        foreach($res as $v){

            if($v['status'] == 2){

                $v['status'] = '已确认';

            }

            $arr[] = $v;

        }

        $this->ShenDetails();

        $this->assign('page', $pages);

        $this->assign('done', $arr);

        $this->display('ShenShow/ShenDo');

    }

    // shen 更改用户状态为删除
    public function ShenDel()
    {
        $id = I('get.');

        $where['id'] = $id['id'];

        $Indent = M('Indent');

        $data['status'] = $id['status'];

        $data['who_upd'] = $_SESSION['shenuser'];

        $data['upd_time'] = time();

        $res = $Indent->where($where)->data($data)->save();

        if(!$res){

            echo '<center>';
            $this->error('删除用户失败');
            echo '</center>';
            exit();

        }

        echo '<center>';
        $this->success('删除用户成功');
        echo '</center>';

    }

    // shen 查看单个用户信息
    public function ShenInfo()
    {
        $id = I('get.');

        $where['id'] = $id['id'];

        $Indent = M('Indent');

        $res = $Indent->where($where)->find();

        if(!$res){

            echo '<center>';
            $this->error('系统问题，联系管理员');
            echo '</center>';
            exit();

        }else if($res['status'] == 1){

            $info = '当前用户处于提交未处理状态';

        }else if($res['status'] == 2){

            $info = '当前用户处于已处理状态，是否确认修改信息';

        }

        $this->assign('status', $info);

        $this->assign('info', $res);

        $this->display('ShenShow/ShenInfo');

    }

    // shen 编辑单个用户信息
    public function ShenEdit()
    {
        $info = I('post.');
        $arr = array();
        foreach($info as $k=>$v){
            $arr[$k] = str_replace(';', '', $v);
        }
        // var_dump($arr);
        $where['id'] = $arr['id'];
        $data['user'] = $arr['name'];
        $data['prize'] = $arr['prize'];
        $data['tel'] = $arr['tel'];
        $data['address'] = $arr['address'];
        $data['combo'] = $arr['combo'];
        $data['money'] = $arr['money'];
        $data['status'] = 2;
        $data['who_upd'] = $_SESSION['shenuser'];
        $data['upd_time'] = time();
        $Indent = M('Indent');
        $res = $Indent->where($where)->save($data);
        // var_dump($Indent->_sql());exit();
        if(!$res){
            echo '<center>';
            $this->error('编辑用户失败');
            echo '</center>';
            exit();
        }else{
            echo '<center>';
            $this->success('编辑用户成功', 'ShenDo');
            echo '</center>';
            exit();
        }
    }

    // 修改用户状态
    public function ShenUpdSta()
    {
        $id = I('get.');

        $where['id'] = $id['id'];

        $data['status'] = 1;

        $Indent = M('Indent');

        $res = $Indent->where($where)->save($data);

        if(!$res){

            echo '<center>';
            $this->error('修改用户状态失败');
            echo '</center>';

        }else{

            echo '<center>';
            $this->success('修改用户状态成功');
            echo '</center>';

        }

    }

}