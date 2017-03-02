<?php
namespace Home\Controller;
use Think\Controller;
class HandleController extends CommonController 
{
    public function index()
    {   
        $this->assigns();
        $this->display(); 
    }
    // 上传订单页面
    public function UpBody()
    {
        $this->assigns();
        $this->display();
    }
    //处理上传
    public function DoUp()
    {
        $data = I('request.');
        $goods['name'] = $data['name'];

        if(empty($goods['name']))
        {
            $this->ReturnJudge('商品名不能为空');
            exit();
        }

        $up = new \Think\Upload();// 实例化上传类
        $up->maxSize = 3145728;// 设置附件上传大小
        $up->allowExts  = array('htm', 'html');// 设置附件上传类型
        $up->rootPath  = './Uploads/Html/';//设置附件上传目录

        //上传单个文件 
        $res = $up->uploadOne($_FILES['file']);
        if(!$res)
        {
            $this->ReturnJudge($up->getError());
        }
        else
        {
            $file = 'Uploads/'.$res['savepath'].$res['savename'];
            // var_dump($file);
            // $this->ReturnJudge('上传成功', 'Handle/OrderList');
            $this->GetHtml($goods, $file);
        }
    }
    // 获取页面信息
    public function GetHtml($goods, $file)
    {
        if(empty($file))
        {
            $this->ReturnJudge('没有找到上传文件');
            exit();
        }

        $res = file_get_contents($file); 
        $res = iconv('gbk','utf-8',$res); 
        // var_dump($goods);
        // 获取商品信息
        // 商品名称
        preg_match_all('/[\x80-\xff]+/', $goods['name'], $name);
        if(empty($name[0][0]))
        {
            preg_match_all('/[\x{4e00}-\x{9fa5}]+/u', $goods['name'], $name);
        }
        $data['name'] = $name[0][0];
        // 匹配商品标题
        // 商品sn
        preg_match_all("/<title>(.*)<\/title>/i", $res, $tit);
        $data['tit'] = $tit[1][0];
        // 匹配form标签
        // 商品form
        preg_match_all("/<form(.*)>/i", $res, $form);
        $data['form'] = $form[0][0];
        // 匹配商品xzlx
        // 商品xzlx
        preg_match_all('/<input id="xzlx"(.*)>/i', $res, $xzlx);
        $data['xzlx'] = $xzlx[0][0];
        // 匹配商品名称input
        // 商品名称input
        preg_match_all('/<input name="product"(.*)>/i', $res, $NameInput);
        // $data['n_input'] = $NameInput[0];
        $data['n_input'] = implode('shenshuang', $NameInput[0]);
        // 匹配商品尺寸input
        // 商品尺寸input
        preg_match_all('/<input name="chanpin1"(.*)>/i', $res, $ChicunInput);
        $data['c_input'] = implode('shenshuang', $ChicunInput[0]);
        $data['time'] = time();
        $data['sta'] = 1;
 
        $Indent = M('Indent');
        $where['sta'] = 1;
        $Indent->where($where)->select();
        
        $sta = $Indent->data($data)->add();
        if($sta)
        {
            $this->ReturnJudge('订单信息添加成功', 'index');
        }
        else
        {
            $this->ReturnJudge('添加订单信息失败');
        }
    }
    // 展示所有订单
    public function CreateIndentBody()
    {
        $data = I('get.');
        // 分页类 thinkphp
        $page = isset($data['count'])?$data['count']+0:1;
        if($page < 1)
        {
            $page = 1;
        }
        $num = 15;
        $offset = ($page - 1) * $num;

        $where['sta'] = 1;
        $Indent = M('Indent');
        $total = $Indent->where($where)->count();

        if($page > ceil($total / $num))
        {
            $page = 1;
        }
        $page = new \Org\Tool\Page($total, $num);
        $pages = $page->page(0, 1, 2, 3, 4, 5, 6);


        $info = $Indent->where($where)->limit($offset, $num)->order('id DESC')->select();

        $this->assigns();
        $this->assign('info', $info);
        $this->assign('page', $pages);
        $this->display();
    }
    // 添加、编辑商品图片信息
    public function HandleGoodsImg()
    {
        $id1 = I('get.id');
        preg_match_all('/\d+/', (int)$id1, $id);

        $this->assign('id', $id[0][0]);
        $this->display();
    }
    // 上传图片路径
    public function UpImg()
    {
        $info = I('post.');
        // 对于数字类型的数据转整行，防一下sql.....
        preg_match_all('/\d+/', (int)$info['id'], $id);
        $where['id'] = $id[0][0];
        preg_match_all('/\d+/', (int)$info['type'], $type);
        $data['type'] = $type[0][0];
        // 百度富文本编辑器将html代码转换成实体了，在转换回来，或者读取数据库的时间也可以转换
        $data['img'] = htmlspecialchars_decode($info['img']);

        $act = isset($info['bot1'])?(int)$info['bot1']:(int)$info['bot2'];
        if(empty($act))
        {
            $this->ReturnJudge('不闹好吗');
        }

        // bot1 存在仅上传 
        $Indent = M('Indent');
        $res = $Indent->where($where)->save($data);
        // var_dump($Indent->_sql());exit();
        if(!$res)
        {
            $this->ReturnJudge('上传图片失败');
        }
        else
        {
            if($act === 2)
            {
                $this->DownIndentBody($where['id']);
            }
            else if($act === 1)
            {
                $this->ReturnJudge('ok了', 'CreateIndentBody');
            }
        }
        // bot2 存在上传并下载页面 
    }
    // 下载订单页面
    public function DownIndentBody($id1 = '')
    {
        // id 为其他方法传过来的值，上传文件并下载时才会传过来为字符串
        // 直接下载过来的get为数组， get . id
        $id2 = I('get.id');
        if(empty($id1) && empty($id2))
        {
            $this->ReturnJudge('咱别闹好吧');
        }

        $ids = empty($id1)?$id2:$id1;
        preg_match_all('/\d+/', (int)$ids, $id);
        $where['id'] = $id[0][0];

        $Indent = M('Indent');
        $info = $Indent->where($where)->find();

        if(!$info)
        {
            $this->ReturnJudge('没有找到相关信息');
        }
        else
        {
            if(!empty($info['img']))
            {
                $arr = explode('#', $info['img']);

                if($info['type'] == 1)
                {
                    $imgs = array();
                    foreach($arr as $v)
                    {
                        $imgs[] = '<p><img src = "images_files/' .$v. '"' . '/></p>'; 
                    }
                    $img = implode('', $imgs);
                }
                else if($info['type'] == 2)
                {
                    preg_match_all('/<p>(.*)<\/p>/i', $info['img'], $imgs);
                    // var_dump($imgs[0][0]); 
                    $imgs1 = explode('<p>', $imgs[0][0]);
                    unset($imgs1[0]);
                    // var_dump($imgs1);
                    $img = array();
                    foreach($imgs1 as $v)
                    {
                        $img[] = str_replace('/Uploads/', '', '<p>' . $v);
                    }
                    $img = implode('', $img);
                }
                else if($info['type'] == 3)
                {
                    $imgs2 = array();
                    foreach($arr as $v)
                    {
                        $imgs2[] = '<p><img src = "' .$v. '" /></p>'; 
                    }
                    $img = implode('', $imgs2);
                }
            }
            else
            {
                $img = '';
            }
            // var_dump($info['img']);
            // exit();
            $GoodsName = explode('shenshuang', $info['n_input']);
            $NewGoods = array();
            foreach($GoodsName as $v)
            {
                $NewGoods[] = str_replace('type="radio"', 'type="radio" style = "display:none;"', str_replace('onclick="pricea()"', '', $v));
            }
            // var_dump($NewGoods);
            // exit();
            // 获取商品名称数组的数据，后面
            // $max = count($NewGoods);
            // echo $max;
            $ChiCun1 = explode('shenshuang', $info['c_input']);
            $ChiCun = array();
            foreach($ChiCun1 as $k => $v)
            {
                $ChiCun[] = str_replace('type="radio"', 'type="radio" style = "display:none;"', $v);
            }   
            // exit();

            $this->assign('tit', $info['tit']);
            $this->assign('img', $img);
            $this->assign('form', $info['form']);
            $this->assign('name', $NewGoods);
            $this->assign('chicun', $ChiCun);
            $this->assign('xzlx', $info['xzlx']);

            // $this->buildHtml('静态文件', '静态路径','模板文件');
            $file = 'index.htm';
            $path = 'HtmlDown/' . date('Y_m_d_H_i_s', time()) .'/';
            if($this->buildHtml($file, $path, "Handle:DownIndentBody"))
            {
                $path = $path.$file;
                // $res = iconv('utf-8','gbk',$path); 
                ob_start();    
                // $date = date('Y-m-d-H-i-s');  
                // header("content-Type: text/html; charset=gbk"); 
                header("Content-type: application/octet-stream");   
                header("Accept-Ranges: bytes");   
                header("Content-Disposition: attachment; filename= index.htm");   
                $size = readfile($path);
                exit();
            }
            else
            {
                $this->ReturnJudge('数据出错');
            }
        }
    }
}