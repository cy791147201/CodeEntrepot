<?php
namespace Home\Controller;
use Think\Controller;
class ClassifyController extends CommonController 
{
    // 展示首页
    public function index()
    {   
        $data['users'] = $_SESSION['user']['name'];
        $data['stas'] = 1;

        $Classify = M('Classify');
        $res = $Classify->where($data)->select();

        $this->assigns();
        $this->assign('opt', $res);
        $this->display(); 
    }
    // 分类操作
    public function ClassifyHandle()
    {
        $info = I('post.');
// var_dump($info);exit();
        if($info['sta'] === 'add')
        {
            $data['stas'] = 1;
            $data['names'] = $info['name'];
        }
        else
        {
            $name = $data['ids'] = $info['name'];
            $data['stas'] = $info['sta'];
        }

        $user = $data['users'] = $_SESSION['user']['name'];

        $Classify = M('Classify');
        if($info['id'] === '1')
        {   
            // 先判断是否存在该分类
            $res1 = $Classify->where($data)->find();
            if($res1)
            {
                $this->ReturnJudge('已存在该分类');
                exit();
            }
            else
            {
                // echo 1;exit();
                $res = $Classify->add($data);
                $msg = '添加分类'; 
            }
            
        }
        else if($info['id'] === 'DelClassify')
        {
            // if($name === '未指定')
            // {
            //     $this->ReturnJudge('默认分类无法删除');
            // }
// var_dump($info);
            $save['stas'] = 2;
            $res = $Classify->where($data)->save($save);
            $msg = '删除分类_';

            if($res < 0)
            {
                // echo $res1;
                $this->ReturnJudge($msg.'失败');
                exit();
                // exit();
            }
            // exit();
            // 修改花费列表中的分类 为 未指定
            // 多表联合更新
            // $sql = "UPDATE hua_fei_info  INNER JOIN classify ON hua_fei_info.classify = classify.ids SET hua_fei_info.classify=999999999 WHERE classify.names = '$name'";
            // // thinkphp 执行原生sql 的时候用execute 不要用query会报错
            // // thinkphp sql 成功 报错
            // $res1 = $HuaFei->execute($sql);
            // // var_dump($res1);
            // // exit();
            $where['classify'] = $data['ids'];
            $save1['classify'] = 999999999;
            $HuaFei = M('hua_fei_info');
            $res1 = $HuaFei->where($where)->save($save1);
            // var_dump($HuaFei->_sql());exit();
            // 判断更新是否成功不成功回滚
            if($res1 < 0)
            {
                $where1['ids'] = $data['ids'];
                $save2['stas'] = 1;
                $res = $Classify->where($data)->save($save2);
                // echo $res1;
                $this->ReturnJudge($msg.'失败');
                exit();
            }
            // exit();
        }
        else if($info['id'] === 'SaveClassify')
        {   
            $save['names'] = $info['ReName'];

            // 先判断是否存在该分类
            $res1 = $Classify->where($save)->find();
            if($res1)
            {
                $this->ReturnJudge('已存在该分类');
                exit();
            }
            else
            {
                $res = $Classify->where($data)->save($save);
                $msg = '修改分类';
            }
        }

        if($res)
        {
            $this->ReturnJudge($msg.'成功', 1);
        }
        else
        {
            $this->ReturnJudge($msg.'失败');
        }
    }
    // 分类列表
    public function ClassifyList()
    {
        $where['user'] = $_SESSION['user']['name'];
        $where['stas'] = 1;
        
        $data = I('get.');
        // 分页类 thinkphp
        $page = isset($data['count'])?$data['count']+0:1;
        if($page < 1)
        {
            $page = 1;
        }
        $num = 11;
        $offset = ($page - 1) * $num;

        $Classify = M('Classify');
        $total = $Classify->where($where)->count();

        if($page > ceil($total / $num))
        {
            $page = 1;
        }
        $page = new \Org\Tool\Page($total, $num);
        $pages = $page->page(0, 1, 2, 3, 4, 5, 6);

        $res = $Classify->where($where)->select();

        // 连表查询
        // $sql1 = "SELECT * FROM hua_fei_info LEFT JOIN classify ON hua_fei_info.classify = classify.ids WHERE hua_fei_info.sta = '$sta' AND hua_fei_info.user = '$user' ORDER BY hua_fei_info.id DESC LIMIT $offset,  $num";
        // 查询可以用query 更新用execute
        // $res = $Classify->query($sql1);

        // $count = $Classify->where($where)->sum('money');

        $this->assigns();
        $this->assign('info', $res);
        // $this->assign('count', $count);
        $this->assign('page', $pages);
        $this->display();
    }
    // 删除分类
    public function DeleteClassify()
    {
        $where['ids'] = I('get.id');
        $where['users'] = $_SESSION['user']['name'];

        $data['stas'] = 2;
        $Classify = M('Classify');
        $res = $Classify->where($where)->save($data);

        if($res)
        {
            $this->ReturnJudge('删除分类成功', 1);
        }   
        else
        {
            $this->ReturnJudge('删除分类失败');
        }
    }
    // 更新一个花费的分类
    public function UpdClassifyOne()
    {
        $info = I('post.');
// var_dump($info);exit();
        $where['id'] = $info['id'];
        if($info['classify'])
        {
            $data['classify'] = $info['classify'];
        }
        else
        {
            $data['classify'] = 999999999;
        }
        $data['upd_time'] = time();

        $HuaFei = M('Hua_fei_info');
        $res = $HuaFei->where($where)->save($data);
// var_dump($HuaFei->_sql());exit();
        if($res)
        {
            $this->ReturnJudge('更新花费分类成功', 1);
        }
        else
        {
            $this->ReturnJudge('更新花费分类失败');
        }
    }
}