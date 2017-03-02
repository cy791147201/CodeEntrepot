<?php
defined('THINK_PATH') OR exit();
class IndexAction extends AliziAction {

    public function _initialize(){
        parent::_init();
        parent::systemStatus(MODULE_NAME);
        $this->tpl = '';//'Single/'.ACTION_NAME;
    }
 
    public function index()
    {
        // $Model = D('Item');
        if($this->aliziConfig['slider_show']==1 && $this->aliziConfig['slider_num']>0){
            $slider  = M('Advert')->where(array('status'=>1))->order('sort_order ASC,id DESC')->limit($this->aliziConfig['slider_num'])->select();
        }
        $where['is_delete'] = 0;
        $where['status'] = 1;
        $where['is_hot'] = 1;
        $HotList['title'] = lang('hotItem');
        $Item = M('Item');
        $res = $Item->where($where)->select();
        foreach($res as $v){
            // $v['Gid'] = $v['g_id'].'_'.$v['sn'];
            $HotList['list'][] = $v;
        }
        // var_dump($HotList['list']);exit();
        // var_dump($HotList);exit();
        $this->assign('slider',$slider);
        $this->assign('hot', $HotList);
        $this->display($this->tpl);
    }

    // 电脑端展示商品 静态化页面 下载静态化页面
    public function order()
    {   
        // echo 1;exit();
        $a = I('get.');
        // var_dump($a);exit();
        $do = explode('_', str_replace(';', '', trim($a['do'])));
        $id = explode('_', str_replace(';', '', trim($a['id'])));
        // var_dump($do);exit();
        // var_dump($id);exit();
        // if(empty($id[1])){
        //     echo 'id只有一个参数';
            $info = getCache('Item',array('sn'=>$id[0]));
        // }else{
        //     echo 'id有多个参数';
            // $info = getCache('Item',array('sn'=>$id[1]));
            // $info = getCaches(array('g_id'=>$id[0], 'sn'=>$id[1]));
        // }
// var_dump($info);
// exit(); 
        // if(empty($info) || $info['status']==0){  
        if(empty($info)){  
            $this->display('Order/404');
            exit(); 
        }
        // $template = M('ItemTemplate')->field('show_comments')->where('id='.$info['id'])->find();
        // $commentsTpl = 'Comments:'.$template['show_comments'];
// var_dump($commentsTpl);exit();
        if(!empty($info['web_t'])){
            $info['web_t'] = '<title>'.$info['web_t'].'</title>';
        }
// var_dump($info);exit();
        if(!empty($info['cont1'])){
            $info['cont1'] = '
<meta name = "keywords" content = "'.$info['cont1'].'">';
        }
        if(!empty($info['cont2'])){
            $info['cont2'] = '
<meta name = "description" content = "'.$info['cont2'].'">';
        }
        if(!empty($info['cont3'])){
            $info['cont3'] = '
<meta name = "author" content = "'.$info['cont3'].'">';
        }
        if(!empty($info['tit'])){
            $info['tit'] = '<header>
        <h1>'.$info['tit'].'</h1>
    </header>';
        }
        if(!empty($info['tit_img'])){
            $info['tit_img'] = '<div class = "banner">
        '.$info['tit_img'].'
    </div>';
        }
        if(!empty($info['price'])){
            $price = $info['price'];
            $info['price'] = '<strong>
                ￥'.$info['price'].'
            </strong>';
        }
        if((int)$info['original_price'] != 0){
            $discount = round($price/$info['original_price']*10, 2);
            $save = $info['original_price']-$price;
            $info['original_price'] = '<ol>
                <li>
                    <p>原价</p>
                    ￥'.$info['original_price'].'
                </li>
                <li>
                    <p>折扣</p>
                    '.$discount.'折
                </li>
                <li>
                    <p>节省</p>
                    ￥'.$save.'
                </li>
            </ol>';
        }else{
           $info['original_price'] = ''; 
        }
        if($info['dao_time'] == 1){
            $info['dao_time'] = '<div class="row2">
            <strong>'.$info['num'].'<br>人已购买</strong>
                <div class = "time">
                <div id="remainTime_1" class="jltimer"><span>00</span>天<span>01</span>小时<span>18</span>分<span>36</span>秒</div>
                <script language="javascript">
                    addTimeLesser(1, 4735);
                </script>
            </div>
        </div>';
        }else{
            $info['dao_time'] = '';
            // $js = '';
        }
        if(!empty($info['qiang'])){
            $info['qiang'] = '<h2>▼'.$info['qiang'].'</h2>';
        } 
        if(!empty($info['q_info'])){
            $info['q_info'] = $info['q_info']
            ;
        }
        if(!empty($info['buy'])){
            $info['buy'] = '<h2>▼'.$info['buy'].'</h2>';
        }
        if(!empty($info['b_info'])){
            $info['b_info'] = $info['b_info'];
        }
        if(!empty($info['chan'])){
            $info['chan'] = '<h2>▼'.$info['chan'].'</h2>';
        }
        if(!empty($info['c_info'])){
            $info['c_info'] = $info['c_info'];
        }
        if(!empty($info['ser'])){
            $info['ser'] = '<h2>▼'.$info['ser'].'</h2>';
        }
        if(!empty($info['tel_t1']) && !empty($info['tel1'])){
            $tel1 = '<a class = "btn" href = "tel:'.$info['tel1'].'">'.$info['tel_t1'].'：'.$info['tel1'].'</a>';
        }else{
            $tel1 = '';
        }
        if(!empty($info['tel_t2']) && !empty($info['tel2'])){
            $tel2 = '<a class = "btn" href = "tel:'.$info['tel2'].'">'.$info['tel_t2'].'：'.$info['tel2'].'</a>';
        }else{
            $tel2 = '';
        }
        if(!empty($info['sms_t']) && !empty($info['sms'])){
            $sms = '<a class = "btn" href = "sms:'.$info['sms'].'">'.$info['sms_t'].'：'.$info['sms'].'</a>';
        }else{
            $sms = '';
        }
        if(!empty($tel1)){
            $tel = $info['tel1'];
            $tel_t = $info['tel_t1'];
        }else if(!empty($tel2)){
            $tel = $info['tel2'];
            $tel_t = $info['tel_t2'];
        }
        if(!empty($info['sms_t'])){
            $sms_t = $info['sms_t'];
            $info['sms_t'] = $info['sms_t'].'：';
        }else{
            $info['sms_t'] = '短信功能即将开放';
        }
        if(!empty($tel)){
            $foot = '
    <nav class = "base">
        <ul class = "BaseUl">
            <li class = "li"><a href = "#buy">在线下单</a></li> 
            <li class = "NoLi">&nbsp;</li>
            <li class = "li"><a href = "tel:'.$tel.'">'.$tel_t.'</a></li>  
            <li class = "NoLi">&nbsp;</li>
            <li class = "li"><a href = "sms:'.$info['sms'].'">'.$sms_t.'</a></li>
        </ul>
    </nav>';
        }
        if(!empty($info['s_info'])){
            $info['s_info'] = '<div class = "btn">
                '.$info['s_info'].''.
                $tel1.''.
                $tel2.''.
                $sms
                .'
                <div class = "none"></div>
            </div>';
        }
        if(!empty($info['in_t'])){
            $info['in_t'] = '<article id = "buy">  
        <h2>▼'.$info['in_t'].'</h2>';
            $style = '';
        }else{
            $info['in_t'] = '';
            $info['in_in'] = '';
            $style = 'style = "display: none;"';
        }
        if(!empty($info['ft_img'])){
            $info['ft_img'] = '
    <div class = "foot">
        '.$info['ft_img'].' 
    </div>';
        }
        if(!empty($info['comp'])){
            $info['comp'] = '<center><div><p>'.$info['comp'].'</p></div></center>';
        }
        $f_n = '<div class = "f_n"></div>';
        // $file = empty($info['sn'])?'shen':$info['sn'];
            // var_dump($info['wid']);exit();
        if(!empty($info['wid'])){
            $wid = $info['wid'].'px';
            $wid = "style = 'width: 100%; max-width: $wid;'";
        }else{
            $wid = "style = 'width: 100%; max-width: 700px;'";
        }
// var_dump($style);exit();
        $this->assign('wid',$wid);
        $this->assign('f_n',$f_n);
        $this->assign('style',$style);
        $this->assign('foot',$foot); 
        $this->assign('info',$info);
        // var_dump($info);
        // echo 1;
        // $arr = $a;
        // var_dump($arr);exit();
        // $arr = explode('_', $a['do']);
        // var_dump($do);exit();
        if($do[0] == 'sta'){
            // echo 1;exit();
            $where['g_id'] = $info['g_id'];
            $where['sn'] = $info['sn'];
            // var_dump($file);exit();
            if(empty($info['g_id']) || empty($info['sn'])){
                echo '<center>查找数据出错<center/>';
                exit();
            }

            if($info['status'] == 1){
                $file = $info['g_id']."/index";
                // echo 1;exit();
            }else if($info['status'] == 0){
                $file = $info['g_id']."/".$info['sn'].'/index';
                // echo 2;exit();
            }
            // var_dump($file);exit();
            $path = $this->aliziHost.'Html/'.$file;
            // $path = $_SERVER['DOCUMENT_ROOT'].'/Html/'.$file.'/index.htm';
            $data['path'] = $path;
            $data['s'] = rand(100,1000);
            $item = M('Item');
            $res = $item->where($where)->save($data);
            if(!$res){
                echo '<center>更新数据出错<center/>';
                exit();
            }
// exit();
            if($this->buildHtml($file,'',"Index:order")){
                if($do[1] == 'down'){
                    // echo 2;
                    // 下载
                    $path = $path.'.htm';
                    // var_dump($path);exit();
                    ob_start();    
                    $date = date('Y-m-d-H-i-s');  
                    header("Content-type: application/octet-stream");   
                    header("Accept-Ranges: bytes");   
                    header("Content-Disposition: attachment; filename= {$date}.htm");   
                    $size = readfile($path);
                    exit();
                }else if($do[1] == 'none'){
                    // echo 1;
                    echo '<center>生成静态页面成功';
                    redirect($path.'.htm', 3, '稍后跳转');
                    echo '</center>';
                    exit();
                }
            }else{
                echo '<center>数据出错<center/>';
                exit();
            }
        }else{
            // echo 2;
            // $template = M('ItemTemplate')->field('show_comments')->where('id='.$info['id'])->find();
            // $commentsTpl = 'Comments:'.$template['show_comments'];
            // $this->assign('template',$template);
            // $this->assign('commentsTpl',$commentsTpl);
            $this->display($this->tpl);
        } 
    }

    public function article(){
        $Model = D('Article');
        $where = array('is_delete'=>0);
        if(isset($_GET['id'])) $where['category_id'] = (int)$_GET['id'];

        import('ORG.Util.Page');
        $count = $Model->where($where)->count();
        $page  = new Page($count,10);
        $list = $Model->where($where)->limit($page->firstRow . ',' . $page->listRows)->order('sort_order ASC,id ASC')->select();
        $category = M('Category')->where('type=2')->order('sort_order ASC,id ASC')->select();

        $this->assign('page',$page->show());
        $this->assign('category',$category);
        $this->assign('list',$list);
        $this->display($this->tpl);
    }
    public function detail(){
        $id = (int)$_GET['id'];
        $info = getCache('Article',array('id'=>$id));
        $category = M('Category')->where('type=2')->order('sort_order ASC,id ASC')->select();
        $this->assign('category',$category);
        $this->assign('info',$info);
        $this->display($this->tpl);
    }

    // 电脑端商品分类商品页面
    public function category()
    {
        $category = M('Category')->where('type=1')->order('sort_order ASC')->select();

        $Model = D('Item');
        $kw = addslashes(str_replace(' ', '', $_GET['kw']));
        $where = 'status=1 AND is_delete=0';
        if(!empty($_GET['id'])) $where .= " AND category_id=".intval($_GET['id']);
        if(!empty($kw)) $where .= " AND name LIKE '%{$kw}%' ";

            import('ORG.Util.Page');
            $count = $Model->where($where)->count();
            $page  = new Page($count,10);
            $show  = $page->show();
        $list = $Model->field('id,g_id,sn,name,original_price,price,image,brief')->where($where)->limit($page->firstRow . ',' . $page->listRows)->order('is_hot desc,sort_order ASC,id DESC')->select();
        // $list = array();
        // foreach($res as $v){
        //     $v['Gid'] = $v['g_id'].'_'.$v['sn'];
        //     $list[] = $v;
        // }
        $this->assign('page',$page->show());
        $this->assign('category',$category);
        $this->assign('list',$list);
        $this->display($this->tpl); 
    }
    public function getCategoryList(){
         $Model = D('Item');
         $kw = addslashes(str_replace(' ', '', $_GET['kw']));
         $where = 'status=1 AND is_delete=0';
         if(!empty($_GET['id'])){
             $where .= " AND category_id=".intval($_GET['id']);
         }else{
            $category = M('Category')->field('id')->where('type=1')->select();
            foreach ($category as $cid) { $category_id[] = $cid['id']; }
            $where .= " AND category_id IN(".implode(',', $category_id).")";
         }
         if(!empty($kw)) $where .= " AND name LIKE '%{$kw}%' ";
          $list = $Model->field('id,name,price,image,brief')->where($where)->order('sort_order ASC,id DESC')->select();
          foreach($list as &$li){
             $li['url'] = U('Item/show',array('id'=>$li['id']));
             $li['image'] = imageUrl($li['image']);
          }
          $this->ajaxReturn($list,'success',$list?1:0);
    }

    public function delivery(){
      $aliziConfig = cache('aliziConfig');
      if(IS_POST){
        $url = "http://www.aikuaidi.cn/rest/";
        $data = array(
          'key' => $aliziConfig['delivery_key'],
          'order' => $_POST['order'],
          'id' => $_POST['id'],
          'ord' => 'asc',
          'show' => 'json',
        );
        echo http($url,'GET',$data);
      }else{
        $delivery = C('delivery');
        $name = $delivery[$_GET['id']];
        $this->assign('name',$name);
        $this->display();
      }
    }

    public function query(){
       $this->display();
    }
    public function pay(){
      R('Order/pay');
    }

    public function payWxPayJsApi($order=array()){
         R('Order/payWxPayJsApi',array('order'=>$order));
    }

    public function result(){
        R('Order/result');
    }

    // 下载页面
    public function DownBody()
    {   
        // echo 2;exit();
        $id = str_replace(';', '', I('get.id'));
        // var_dump($id);exit();
        $info = getCache('Item',array('sn'=>$id));
        // var_dump($info);
        // exit(); 
        if(empty($info)){  
            $this->display('Order/404');
            exit(); 
        }

        if(!empty($info['web_t'])){
            $info['web_t'] = '<title>'.$info['web_t'].'</title>';
        }
        if(!empty($info['cont1'])){
            $info['cont1'] = '
<meta name = "keywords" content = "'.$info['cont1'].'">';
        }
        if(!empty($info['cont2'])){
            $info['cont2'] = '
<meta name = "description" content = "'.$info['cont2'].'">';
        }
        if(!empty($info['cont3'])){
            $info['cont3'] = '
<meta name = "author" content = "'.$info['cont3'].'">';
        }
        if(!empty($info['tit'])){
            $info['tit'] = '<header>
        <h1>'.$info['tit'].'</h1>
    </header>';
        }
        if(!empty($info['tit_img'])){
            $info['tit_img'] = '<div class = "banner">
        '.$info['tit_img'].'
    </div>';
        }
        if(!empty($info['price'])){
            $price = $info['price'];
            $info['price'] = '<strong>
                ￥'.$info['price'].'
            </strong>';
        }
        if((int)$info['original_price'] != 0){
            $discount = round($price/$info['original_price']*10, 2);
            $save = $info['original_price']-$price;
            $info['original_price'] = '<ol>
                <li>
                    <p>原价</p>
                    ￥'.$info['original_price'].'
                </li>
                <li>
                    <p>折扣</p>
                    '.$discount.'折
                </li>
                <li>
                    <p>节省</p>
                    ￥'.$save.'
                </li>
            </ol>';
        }else{
           $info['original_price'] = ''; 
        }
        if($info['dao_time'] == 1){
            $info['dao_time'] = '<div class="row2">
            <strong>'.$info['num'].'<br>人已购买</strong>
                <div class = "time">
                <div id="remainTime_1" class="jltimer"><span>00</span>天<span>01</span>小时<span>18</span>分<span>36</span>秒</div>
                <script language="javascript">
                    addTimeLesser(1, 4735);
                </script>
            </div>
        </div>';
        }else{
            $info['dao_time'] = '';
        }
        if(!empty($info['qiang'])){
            $info['qiang'] = '<h2>▼'.$info['qiang'].'</h2>';
        } 
        if(!empty($info['q_info'])){
            $info['q_info'] = $info['q_info']
            ;
        }
        if(!empty($info['buy'])){
            $info['buy'] = '<h2>▼'.$info['buy'].'</h2>';
        }
        if(!empty($info['b_info'])){
            $info['b_info'] = $info['b_info'];
        }
        if(!empty($info['chan'])){
            $info['chan'] = '<h2>▼'.$info['chan'].'</h2>';
        }
        if(!empty($info['c_info'])){
            $info['c_info'] = $info['c_info'];
        }
        if(!empty($info['ser'])){
            $info['ser'] = '<h2>▼'.$info['ser'].'</h2>';
        }
        if(!empty($info['tel_t1']) && !empty($info['tel1'])){
            $tel1 = '<a class = "btn" href = "tel:'.$info['tel1'].'">'.$info['tel_t1'].'：'.$info['tel1'].'</a>';
        }else{
            $tel1 = '';
        }
        if(!empty($info['tel_t2']) && !empty($info['tel2'])){
            $tel2 = '<a class = "btn" href = "tel:'.$info['tel2'].'">'.$info['tel_t2'].'：'.$info['tel2'].'</a>';
        }else{
            $tel2 = '';
        }
        if(!empty($info['sms_t']) && !empty($info['sms'])){
            $sms = '<a class = "btn" href = "sms:'.$info['sms'].'">'.$info['sms_t'].'：'.$info['sms'].'</a>';
        }else{
            $sms = '';
        }
        if(!empty($tel1)){
            $tel = $info['tel1'];
            $tel_t = $info['tel_t1'];
        }else if(!empty($tel2)){
            $tel = $info['tel2'];
            $tel_t = $info['tel_t2'];
        }
        if(!empty($info['sms_t'])){
            $sms_t = $info['sms_t'];
            $info['sms_t'] = $info['sms_t'].'：';
        }else{
            $info['sms_t'] = '短信功能即将开放';
        }
        if(!empty($tel)){
            $foot = '
    <nav class = "base">
        <ul class = "BaseUl">
            <li class = "li"><a href = "#buy">在线下单</a></li> 
            <li class = "NoLi">&nbsp;</li>
            <li class = "li"><a href = "tel:'.$tel.'">'.$tel_t.'</a></li>  
            <li class = "NoLi">&nbsp;</li>
            <li class = "li"><a href = "sms:'.$info['sms'].'">'.$sms_t.'</a></li>
        </ul>
    </nav>';
        }
        if(!empty($info['s_info'])){
            $info['s_info'] = '<div class = "btn">
                '.$info['s_info'].''.
                $tel1.''.
                $tel2.''.
                $sms
                .'
                <div class = "none"></div>
            </div>';
        }
        if(!empty($info['in_t'])){
            $info['in_t'] = '<article id = "buy">  
        <h2>▼'.$info['in_t'].'</h2>';
            $style = '';
        }else{
            $info['in_t'] = '';
            $info['in_in'] = '';
            $style = 'style = "display: none;"';
        }
        if(!empty($info['ft_img'])){
            $info['ft_img'] = '
    <div class = "foot">
        '.$info['ft_img'].' 
    </div>';
        }
        if(!empty($info['comp'])){
            $info['comp'] = '<center><div><p>'.$info['comp'].'</p></div></center>';
        }
        $f_n = '<div class = "f_n"></div>';
        if(!empty($info['wid'])){
            $wid = $info['wid'].'px';
            $wid = "style = 'width: 100%; max-width: $wid;'";
        }else{
            $wid = "style = 'width: 100%; max-width: 700px;'";
        }

        $this->assign('wid',$wid);
        $this->assign('f_n',$f_n);
        $this->assign('style',$style);
        $this->assign('foot',$foot); 
        $this->assign('info',$info);

        if(!empty($info['params'])){
            $combo = '<div class = "combo">'.$info['params'].'</div>
';
        }else{
            $combo = '';
        }
        $this->assign('combo',$combo);
        if(!empty($info['params_type'])){
            $type = '<div class = "type">'.$info['params_type'].'</div>
';
        }else{
            $type = '';
        }
        $this->assign('type',$type);
        if(!empty($info['extends'])){
            $extends = '<div class = "extends">'.$info['extends'].'</div>
';
        }else{
            $extends = '';
        }
        $this->assign('extends',$extends);
        if(!empty($info['content'])){
            $content = '<div class = "content">'.$info['content'].'</div>
';
        }else{
            $content = '';
        }
        $this->assign('content',$content);
        // var_dump($info);exit();

        // $where['g_id'] = $info['g_id'];
        // $where['sn'] = $info['sn'];
       
        // if(empty($info['g_id']) || empty($info['sn'])){
        //     echo '<center>查找数据出错<center/>';
        //     exit();
        // }

        // if($info['status'] == 1){
        //     $file = $info['g_id']."/index";
        //     // echo 1;exit();
        // }else if($info['status'] == 0){
        //     $file = $info['g_id']."/".$info['sn'].'/index';
        //     // echo 2;exit();
        // }
        // var_dump($file);exit();
        $path = 'down/'.$info['sn'].'/index';
        $path1 = $this->aliziHost.'Html/'.$path.'.htm';
        // if(file_exists($path)){
        //     echo 1;
        // }else{
        //     mkdir($path, )
        // }
        // exit();
        // $path = $_SERVER['DOCUMENT_ROOT'].'/Html/down/'.$info['sn'].'/index';
        // $data['path'] = $path;
        // $data['s'] = rand(100,1000);
        // $item = M('Item');
        // $res = $item->where($where)->save($data);
        // if(!$res){
        //     echo '<center>更新数据出错<center/>';
        //     exit();
        // }

        // thinkphp 生成静态文件注意事项
        // buildhtml 的路径 默认是在项目根目录下的html下 路径需要包含文件名 不需要后缀
        if($this->buildHtml($path,'',"Index:order")){
            // if($do[1] == 'down'){
                // echo 2;
                // 下载
                // $path = $path.'.htm';
                // var_dump($path);
                // echo '<br/>';
                // var_dump($path1);exit();
                // php ob_start 下载文件注意事项
                // 路径应该包含文件根目录加静态我呢件目录加后缀名
                ob_start();    
                $date = date('Y-m-d-H-i-s');  
                header("Content-type: application/octet-stream");   
                header("Accept-Ranges: bytes");   
                header("Content-Disposition: attachment; filename= {$date}.htm");   
                $size = readfile($path1);
                exit();
            // }else if($do[1] == 'none'){
            //     // echo 1;
            //     echo '<center>生成静态页面成功';
            //     redirect($path.'.htm', 3, '稍后跳转');
            //     echo '</center>';
            //     exit();
            // }
        }else{
            echo '<center>数据出错<center/>';
            exit();
        }
        
    }


}
