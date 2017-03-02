<?php
namespace Home\Controller;
use Think\Controller;
class HandleController extends CommonController 
{
    // 展示首页
    public function index()
    {   
        $this->assigns();
        $this->display(); 
    }
    // 所有花费分类
    public function ClassifyAll()
    {
        $where['stas'] = 1;
        $where['users'] = $_SESSION['user']['name'];
        $Classify = M('Classify');
        $res = $Classify->where($where)->select();

        return $res;
    }
    // 添加话费信息
    public function HuaFeiInfo()
    {
        $this->assigns();
        $this->assign('opt', $this->ClassifyAll());
        $this->display();
    }
    // 处理花费信息
    public function DisposeHuaFeiInfo()
    {
        $info = I('post.');
        $judge = strpos($info['info'], '#');

        $HuaFeiInfo = M('hua_fei_info');
        // 以&号判断是多个信息还是单个信息
        // 判断分类是否为空 为空则为未指定
        if(empty($info['classify']))
        {
            $classify = '999999999';
        }
        else
        {
            $classify = $info['classify'];
        }

        if($judge)
        {
            // 为真则是多个信息
            $arr = explode('#', $info['info']);
            $arr1 = array();
            $data1 = array();
            foreach($arr as $v)
            {
                $str = explode('/', $v);
                $arr1['name'] = $str[0];
                $arr1['money'] = $str[1];
                $arr1['classify'] = $classify;
                $arr1['sta'] = 1;
                $arr1['time'] = time();
                $arr1['user'] = $_SESSION['user']['name'];
                $data1[] = $arr1;
            }
            $res = $HuaFeiInfo->addALL($data1);
        } 
        else 
        {
            // 为假则是单个信息
            $arr = explode('/', $info['info']);
            $data['name'] = $arr[0];
            $data['money'] = $arr[1];
            $data['classify'] = $classify;
            $data['sta'] = 1;
            $data['time'] = time();
            $data['user'] = $_SESSION['user']['name'];

            $res = $HuaFeiInfo->data($data)->add();
        }

        if($res)
        {
            $msg = '添加成功，稍后跳转';
            $url = 'HuaFeiInfo';
        }
        else
        {
            $msg = '添加失败，稍后跳转';
            $url = '';
        }
        $this->ReturnJudge($msg, $url);
    }
    // 显示花费信息选择
    public function HuaFeiLists()
    {
        $this->assign('info', $this->ClassifyAll());
        $this->assigns();
        $this->display();
    }
    // 花费列表 
    public function HuaFeiList()
    {
        // var_dump($_GET);exit();
        
        // 根据什么排序
        $data = I('get.');
        if(empty($data['sort']))
        {
            $sort = 'hua_fei_info.id';
        }
        else
        {
            $sort = 'hua_fei_info.'.$data['sort'];
        }
        // var_dump($sort);
        $_SESSION['order'] = $data['order'];

        // 排序顺序 顺序倒叙
        if(empty($_SESSION['order']))
        {
            // echo 1;
            $order = 'DESC';
        }
        else if($_SESSION['order'] === 'ASC')
        {
            // echo 2;
            $order = 'DESC';
        }
        else if($_SESSION['order'] === 'DESC')
        {
            // echo 3;
            $order = 'ASC';
        }
        $_SESSION['sort'] = 'hua_fei_info.'.$data['sort'];
        $this->assign('order', $order);

        // 检测是已取消的花费还是正常的花费
        preg_match_all('/\d+/', $data['sta'], $sta);
        // var_dump($data);exit();
        if($sta[0][0] === '1')
        {
            $sta = $where['sta'] = 1;
            $this->assign('tit', '花费信息列表');
            // $this->assign('handle', '修改为取消');
        }
        else if($sta[0][0] === '2')
        {
            $sta = $where['sta'] = 2;
            $this->assign('tit', '已取消信息列表');
            // $this->assign('handle', '修改为正常');
        }
        else
        {
            $this->ReturnJudge('你想干森么丫');
        }
        $this->assign('sta', $sta);

        // 花费列表 花出去后续无操作
        $user = $where['user'] = $_SESSION['user']['name'];
        if($data['classify'] === 'classify'){
            if($data['id'] !== 'all')
            {
                $where['classify'] = $data['id'];
            }
        }
        
        // $data = I('get.');
        // 分页类 thinkphp
        $page = isset($data['count'])?$data['count']+0:1;
        if($page < 1)
        {
            $page = 1;
        }
        $num = 11;
        $offset = ($page - 1) * $num;

        $HuaFeiInfo = M('hua_fei_info');
        $total = $HuaFeiInfo->where($where)->count();

        if($page > ceil($total / $num))
        {
            $page = 1;
        }
        $page = new \Org\Tool\Page($total, $num);
        $pages = $page->page(0, 1, 2, 3, 4, 5, 6);

        // $res = $HuaFeiInfo->where($where)->limit($offset, $num)->order('id DESC')->select();
        // 连表查询
        if($data['classify'] === 'classify')
        {
            // echo 1;exit();
            // 对应分类下的商品
            $id = $data['id'];
            // var_dump($id);exit();
            if($id === 'all')
            {
                $sql1 = "SELECT * FROM hua_fei_info LEFT JOIN classify ON hua_fei_info.classify = classify.ids WHERE hua_fei_info.sta = '$sta' AND hua_fei_info.user = '$user' ORDER BY $sort $order LIMIT $offset,  $num";
            }
            else if(!empty($id) && $id !== 'all')
            {
                $sql1 = "SELECT * FROM hua_fei_info LEFT JOIN classify ON hua_fei_info.classify = classify.ids WHERE hua_fei_info.sta = '$sta' AND hua_fei_info.user = '$user' AND hua_fei_info.classify = '$id' ORDER BY $sort $order LIMIT $offset,  $num";
            }
            else
            {
                $this->ReturnJudge('你丫想干毛啊');
            }
            
            $this->assign('classify', $id);
        }
        else
        {
            // 所有分类下的商品
            $sql1 = "SELECT * FROM hua_fei_info LEFT JOIN classify ON hua_fei_info.classify = classify.ids WHERE hua_fei_info.sta = '$sta' AND hua_fei_info.user = '$user' ORDER BY $sort $order LIMIT $offset,  $num";
        }
         
        // 查询可以用query 更新用execute
        $res = $HuaFeiInfo->query($sql1);
        // var_dump($res);exit();
        // var_dump($HuaFeiInfo->_sql());

        // $sql2 = "select sum(money) from hua_fei_info where user = '$user' and sta = '$sta' ";
        // $count = $HuaFeiInfo->query($sql2);
        $count = $HuaFeiInfo->where($where)->sum('money');

// var_dump($res);
        // 分类select
        $what['stas'] = 1;
        $what['users'] = $_SESSION['user']['name'];
        $Classify = M('Classify');
        $res1 = $Classify->where($what)->select();

        $this->assign('opt', $res1);
        $this->assigns();
        $this->assign('info', $res);
        $this->assign('count', $count);
        $this->assign('page', $pages);
        $this->assign('sta', $data['sta']);
        $this->display();
    }
    // 取消花费消息，即已取消订单或者以退款
    public function CancelHuaFei()
    {
        // var_dump($_POST);exit();
        preg_match_all('/\d+/', I('post.id'), $id);
        $where['id'] = $id[0][0];

        // echo 2;
        preg_match_all('/\d+/', I('post.sta'), $sta);
        $sta = $sta[0][0];
        if($sta === '1')
        {
            // 修改为取消
            $data['sta'] = 2;
        }
        else if($sta === '2')
        {
            // 修改为正常
            $data['sta'] = 1;
        }
        else if($sta === '3')
        {
            // 修改备注
            // echo 3; exit();
        }
        else
        {
            $this->ReturnJudge('你丫想干毛啊');
        }

        // 去除post里面的=号也算防sql注入吧
        if(empty($data['more']))
        {
            $data['more'] = str_replace(';', '', str_replace('=', '', I('post.more')));
        }

        $data['upd_time'] = time();
        $HuaFeiInfo = M('hua_fei_info');
        $res = $HuaFeiInfo->where($where)->save($data);
        // var_dump($HuaFeiInfo->_sql());exit();
        if($res)
        {
            $this->ReturnJudge('操作成功', 1);
        }
        else
        {
            $this->ReturnJudge('修改失败');
        }
    }
    // 花费信息图
    public function HuaFeiImage()
    {
        $info = I('get.');
// var_dump($info);
        // 查出该用户所有花费分类
        $data['stas'] = 1;
        $data['user'] = $_SESSION['user']['name'];
        $classify = M('Classify');
        // 该用户全部分类
        $res = $classify->where($data)->select();
 
        // 全部花费图
        if($info['classify'] === 'all')
        {
            $this->assign('ClassifyName', '全部分类');
        }
        // 个别分类花费图
        else
        {
            $data['classify'] = $info['classify'];
            $res1 = $classify->where($data)->find();
            // var_dump($res1['names']);
            $this->assign('ClassifyName', $res1['names']);
        }



        $this->assigns();
        $this->assign('classifys', $res);
        $this->display();
    }
}