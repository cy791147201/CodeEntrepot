<?php
namespace Home\Controller;
use Think\Controller;
class HandleController extends BeforeController 
{
    public function HandleHome()
    {
        $this->display();
    }

    public function index()
    {
        $where['id'] = $_SESSION['id'];
        $where['jurisdiction'] = $_SESSION['jurisdiction'];
        $Admin = M('Admin');
        $res = $Admin->where($where)->find();
        if($res && $where['jurisdiction'] !== 'admin')
        {
            $this->display('index1');
        }
        else if($res && $res['jurisdiction'] === 'admin')
        {   
            $this->assign('OneInfoDisplay', 'none');
            $this->display('index');
        }
        else
        {
            $_SESSION = array();
        }
    }
    // 管理员操作
    public function HandleAdmin()
    {
        $info1 = I('post.');
        $act = I('get.act');

        // 判断表单信息是否全部填写
        $info = array();
        foreach($info1 as $k => $v)
        {
            if(!empty($v))
            {
                $info[$k] = $v;
            }
        }
        if(count($info1) !== count($info))
        {
            $this->ReturnJudge('个别表单信息为空，请仔细填写', 'index');
            exit();
        }

        // 检测是否拥有管理员权限
        $where['id'] = $_SESSION['id'];
        $where['jurisdiction'] = $_SESSION['jurisdiction'];

        $Admin = M('Admin');
        $res = $Admin->where($where)->find();
        if($res && $res['jurisdiction'] === 'admin')
        {
            // 添加
            if($act === 'add' || $act === 'upd')
            {
                if($info['user1'] && $info['user3'] && $info['user5'])
                {
                    $this->ReturnJudge('用户名不能为空', 'index');
                    exit();
                }
                if($info['pwd1'] !== $info['repwd1'] && $info['pwd3'] !== $info['repwd3'] && $info['pwd5'] !== $info['repwd5'])
                {
                    $this->ReturnJudge('两次输入密码不一致', 'index');
                    exit();
                }
                else
                {
                    $user = $info['grade'];
                    if($user === '1')
                    {
                        $user = '管理员';
                    }
                    else
                    {
                        $user = '用户';
                    }
                    // 管理员操作首页更新管理员
                    if($act === 'upd')
                    {
                        // 管理员列表页更新用户
                        if(!empty($info['id']))
                        {
                            // echo 2;
                            // var_dump($info);
                            // exit();
                            preg_match_all('/^[a-zA-Z0-9]{5,19}/', $info['user3'], $name);
                            $where3['u_name'] = $name[0][0] ? $name[0][0] : 'nothink';
                            preg_match_all('/^[0-9]{1,11}/', $info['id'], $id);
                            $where33['u_id'] = $id[0][0] ? $id[0][0] : 'nothink';
                            $res33 = $Admin->where($where33)->find();
                            if($res33)
                            {
                                if($res['grade'] < $res33['grade'])
                                {
                                    $where3['u_pwd'] = $info['pwd3'] ? md5($info['pwd3'].'shenshuang') : 'nothink';
                                    $where3['jurisdiction'] = ($info['grade'] === '1') ? 'admin' : 'user';
                                    $where3['w_upd'] = $res['u_id'];
                                    $res5 = $Admin->where($where33)->save($where3);
                                    if($res5)
                                    {
                                        $this->ReturnJudge('修改管理员成功', 'index');
                                        exit();
                                    }
                                    else
                                    {
                                        $this->ReturnJudge('修改管理员失败', 'index');
                                        exit();
                                    }
                                }
                                else
                                {
                                    $this->ReturnJudge('您没人家牛逼', 'index');
                                    exit();
                                }
                            }
                            else
                            {
                                $this->ReturnJudge('您没人家牛逼', 'index');
                                exit();
                            }
                        }
                        // 管理员首页，根据名称更新用户数据
                        else
                        {
                            // echo 1;
                            // var_dump($info);
                            // exit();
                            preg_match_all('/^[a-zA-Z0-9]{5,19}/', $info['user5'], $name);
                            $where5['u_name'] = $name[0][0] ? $name[0][0] : 'nothink';
                            $res4 = $Admin->where($where5)->find();
                            if($res4)
                            {
                                if($res['grade'] < $res4['grade'] || $res['u_name'] === $res4['u_name'])
                                {
                                    $data5['u_pwd'] = $info['pwd5'] ? md5($info['pwd5'].'shenshuang') : 'nothink';
                                    $data5['jurisdiction'] = ($info['grade'] === '1') ? 'admin' : 'user';
                                    $data5['w_upd'] = $res['u_id'];
                                    $res5 = $Admin->where($where5)->save($data5);
                                    if($res5)
                                    {
                                        $this->ReturnJudge('修改成功', 'index');
                                        exit();
                                    }
                                    else
                                    {
                                        $this->ReturnJudge('修改失败', 'index');
                                        exit();
                                    }
                                }
                                else
                                {
                                    $this->ReturnJudge('您没人家牛逼', 'index');
                                    exit();
                                }
                            }
                            else
                            {
                                $this->ReturnJudge('查无此人', 'index');
                                exit();
                            }
                        }
                    }
                    else if($act === 'add')
                    {
                        preg_match_all('/^[a-zA-Z0-9]{5,19}/', $info['user1'], $name);
                        $data['u_name'] = $where1['u_name'] = $name[0][0] ? $name[0][0] : 'nothink';
                        $data['u_pwd'] = $info['pwd1'] ? md5($info['pwd1'].'shenshuang') : 'nothink';
                        $data['jurisdiction'] = ($info['grade'] === '1') ? 'admin' : 'user';
                        $data['r_time'] = time();
                        $data['l_ip'] = $this->GetIp();
                        $data['sta'] = 1;
                        $data['l_time'] = time();
                        $data['w_add'] = $res['u_id'];
                        $data['grade'] = $res['grade'] + 1;

                        $res1 = $Admin->where($where1)->find();
                        if(!$res1)
                        {
                            $res2 = $Admin->data($data)->add();
                            if($res2)
                            {
                                $this->ReturnJudge('添加'.$user.'成功', 'index');
                                exit();
                            }
                            else
                            {
                                $this->ReturnJudge('添加'.$user.'失败', 'index');
                                exit();
                            }
                        }
                        else
                        {
                            $this->ReturnJudge('已存在该用户名', 'index');
                            exit();
                        }
                    }
                }
            }
            // 删除
            else if($act === 'del')
            {
                if($_GET['id'])
                {
                    $id = I('get.id');
                    preg_match_all('/^[0-9]{1,19}/', $id, $id);
                    $id = $id[0][0];
                    $sta = I('get.sta');
                    preg_match_all('/^[0-9]{1,19}/', $sta, $sta);
                    $sta = $sta[0][0];
                }
                if(empty($id))
                {   
                    // 操作管理员首页删除管理员
                    if($info['user2'] === $info['ReUser2'])
                    {
                        preg_match_all('/^[a-zA-Z0-9]{5,19}/', $info['user2'], $name1);
                        preg_match_all('/^[a-zA-Z0-9]{5,19}/', $info['ReUser2'], $name2);
                        $where2['u_name'] = $name1[0][0] ? $name1[0][0] : 'nothink';
                        $name3 = $name2[0][0] ? $name2[0][0] : 'nothink';

                        $res3 = $Admin->where($where2)->find();
                        if($res3)
                        {
                            if($res['grade'] < $res3['grade'])
                            {
                                $data3['sta'] = 0;
                                $data3['w_del'] = $res['u_id'];
                                $res33 = $Admin->where($where2)->save($data3);
                                if($res33)
                                {
                                    $this->ReturnJudge('删除成功', 'index');
                                    exit();
                                }
                                else
                                {
                                    $this->ReturnJudge('删除失败', 'index');
                                    exit();
                                }
                            }
                            else
                            {
                                $this->ReturnJudge('您不能越级操作', 'index');
                                exit();
                            }
                        }
                        else
                        {
                            $this->ReturnJudge('查无此人', 'index');
                            exit();
                        }
                    }
                    else
                    {
                        $this->ReturnJudge('两次输入用户名不一致', 'index');
                        exit();
                    }
                }
                // 管理员列表页删除管理员
                else
                {
                    $where6['u_id'] = $id;
                    $res6 = $Admin->where($where6)->find();
                    if($res6)
                    {
                        if($res['grade'] < $res6['grade'])
                        {
                            if($sta == $res6['sta'])
                            {
                                if($sta === '0')
                                {
                                    $data6['sta'] = 1;
                                    $act1 = '恢复';
                                }
                                else if($sta === '1')
                                {
                                    $data6['sta'] = 0;
                                    $act1 = '删除';
                                }
                                else
                                {
                                    $this->ReturnJudge('我很累', 'index');
                                    exit();
                                }
                                $data6['w_del'] = $res['u_id'];
                                $res66 = $Admin->where($where6)->save($data6);
                                if($res66)
                                {
                                    $this->ReturnJudge($act1.'用户成功', 'HandleAdmin?act=list');
                                    exit();
                                }
                                else
                                {
                                    $this->ReturnJudge($act1.'用户失败', 'index');
                                    exit();
                                }
                            }
                            else
                            {
                                $this->ReturnJudge('因为所以科学道理', 'index');
                                exit();
                            }
                        }
                        else
                        {
                            $this->ReturnJudge('您没人家牛逼', 'index');
                            exit();
                        }
                    }
                    else
                    {
                        $this->ReturnJudge('查无此人', 'index');
                        exit();
                    }
                }
            }
            // 管理员操作首页查找单个管理员信息
            else if($act === 'find')
            {   
                if($info['user4'] === $info['ReUser4'])
                {
                    preg_match_all('/^[a-zA-Z0-9]{5,19}/', $info['user4'], $name4);
                    $where4['u_name'] = $name4[0][0] ? $name4[0][0] : 'nothink';

                    $res4 = $Admin->where($where4)->find();
                    if($res4)
                    {
                        // var_dump($res);
                        // var_dump($res4);
                        // exit();
                        if($res['grade'] < $res4['grade'] || $res['u_name'] === $res4['u_name'])
                        {
                            $this->assign('OneInfo', $res4);
                            $this->assign('OneInfoDisplay', 'block');
                            $this->display('index');
                        }
                        else
                        {
                            $this->ReturnJudge('您没人家牛逼', 'index');
                            exit();
                        }
                    }
                    else
                    {
                        $this->ReturnJudge('查无此人', 'index');
                        exit();
                    }
                }
                else
                {
                    $this->ReturnJudge('两次输入用户名不一致', 'index');
                    exit();
                }
            }
            // 管理员列表
            else if($act === 'list')
            {
                $where5['grade'] = array('gt', $res['grade']);
                $pages = I('get.');
                // 分页类
                $page = isset($pages['page']) ? $pages['page'] + 0 : 1;
                if($page < 1)
                {
                    $page = 1;
                }
                $num = 11;
                $offset = ($page - 1) * $num;
                $total = $Admin->where($where5)->count();
                if($page > ceil($total / $num))
                {
                    $page = 1;
                }

                $page = new \Org\Tool\Page($total, $num);
                $pages = $page->page(0, 1, 2, 3, 4, 5, 6);

                $res5 = $Admin->where($where5)->limit($offset, $num)->select();

                $this->assign('page', $pages);
                $this->assign('ListInfo', $res5);
                $this->assign('ListInfoDisplay', 'block');
                $this->display('index');
            }
            // 管理员列表显示个人信息
            else if($act === 'UpdOne')
            {   
                $id = I('get.id');
                preg_match_all('/^[0-9]{1,19}/', $id, $name7);
                $where7['u_id'] = $name7[0][0] ? $name7[0][0] : 'nothink';

                $res7 = $Admin->where($where7)->find();
                if($res7)
                {
                    $this->assign('UpdOneInfo', $res7);
                    $this->assign('AdminListUpdOneDisplay', 'AdminListUpdOneDisplay');
                    $this->display('index');
                }
                else
                {
                    $this->ReturnJudge('查无此人', 'index');
                    exit();
                }
            }
            else
            {
                $this->ReturnJudge('请确认您的操作', 'index');
                exit();
            }
        }
        else
        {
            $this->ReturnJudge('您没有权限', 'index');
            exit();
        }
    }
}