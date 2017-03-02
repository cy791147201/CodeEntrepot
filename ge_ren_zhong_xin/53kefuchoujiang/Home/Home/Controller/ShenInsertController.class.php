<?php
namespace Home\Controller;
use Think\Controller;

class ShenInsertController extends Controller 
{
    public function ShenInsert()
    {
        $info = I('post.');

        $data['user'] = empty(str_replace(';', '', $info['user']))?'0':str_replace(';', '', $info['user']);
        $data['tel'] = str_replace(';', '', $info['phone']);
        $data['prize'] = empty(str_replace(';', '', $info['prize']))?'':str_replace(';', '', $info['prize']);
        $data['address'] = empty(str_replace(';', '', $info['address']))?'0':str_replace(';', '', $info['address']);;
        $data['combo'] = '0';
        $data['money'] = '0';
        $data['status'] = 1;
        $data['add_time'] = time();
        $data['who_upd'] = '0';
        $data['upd_time'] = '';
        $data['url'] = $url = $_SERVER['HTTP_REFERER'];

        $Indent = M('Indent');
        $res = $Indent->add($data);
        // var_dump($data['url']);
        if($res){
            // header('location:'.$data['url']);
            echo '<center>';
            $this->success('您的信息提交成功，稍后将有工作人员与您联系', $data['url'], 3);
            echo '</center>';
        }else{
            echo '<center>';
            $this->error('后台繁忙，稍后再试');
            echo '</center>';
            header('location:'.$data['url']);
        }

    }
}