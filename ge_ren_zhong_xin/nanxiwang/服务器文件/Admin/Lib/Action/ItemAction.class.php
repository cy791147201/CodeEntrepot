<?php
class ItemAction extends AliziAction {
    public function _initialize(){
        parent::_init();
    }

    // 商品页面
    function index($action='', $id = '')
    { 
        // var_dump($action);exit();

        if(isset($_GET['do'])){
            $method = $_GET['do'];
            $this->$method($_GET['do'], $_GET['id']);exit;
        }
        
        $Model = M('Item');
        $keyword = isset($_GET['keyword'])?trim($_GET['keyword']):'';
        $category_id = isset($_GET['category_id'])?intval($_GET['category_id']):0;
        $where = "is_delete=0";
        if(!empty($keyword)) $where .= " AND (name LIKE '%$keyword%'  OR sn='{$keyword}')";
        if(!empty($category_id)) $where .= " AND category_id=".$category_id;
        if($this->role!='admin'){
            $where .= " AND status=1";
            $itemArray= array();
            $itemGroup = M('ItemGroup')->field('item_id')->where(array('group_id'=>$_SESSION['user']['group_id']))->select();
            if($itemGroup){
                 foreach($itemGroup as $li){$itemArray[]=$li['item_id'];}
            }
            $item_id = implode(',',$itemArray);
            $where .= " AND id IN($item_id)";
        }
        
        $order = "sort_order ASC,id DESC";
        
        import('ORG.Util.Page');
        $count = $Model->where($where)->count('distinct(id)');
        $page  = new Page($count,20);

        // 原商品列表
        // $list  = $Model->where($where)->limit($page->firstRow . ',' . $page->listRows)->order($order)->select();
        // 修改后商品列表
        // $sql = 'SELECT g_id, b_s FROM '.C("DB_PREFIX").'goods WHERE sta = 1';
        // select * from table1 A,table B where A.cid=B.cid and @time - timex <=60
        // $table1 = C("DB_PREFIX").'goods';
        // $table2 = C("DB_PREFIX").'item';
        // $sql = 'SELECT * FROM '.$table1.','.$table2.' WHERE '.$table1.'.g_id = '.$table2.'.g_id and '.$table1.'.b_s = '.$table2.'.b_s and '.$table1.'.sta = 1';
        $list = array();
        $Item = M('Item');
        $Goods = D('Goods');
        if(empty($action)){
            // 商品列表
            $res = $Goods->ShowGoods($page->firstRow, $page->listRows);
            foreach($res as $v){
                // var_dump($v);
                $v['show'] = 1;
                $list[] = $v;
            }
            $this->assign('what', 'Goods');
        }else if($action == 'Gids'){
            // 审核页商品列表
            // echo 1;
            // $condition = 'b_s = 0 and status = 1 and is_delete = 0 and user_id = '.$_SESSION['user']['id'];
            // $res = $Item->GetGoods($page->firstRow, $page->listRows, $condition);
            $what['g_id'] = $id;
            $what['is_delete'] = 0;
            // 排序
            $res = $Item->where($what)->order('sort_order asc')->select();
            foreach($res as $v){
                // var_dump($v);
                // if($v['b_s'] == 0){
                //     $v['b_s'] = 1;
                // }
                $v['show'] = 2;
                $list[] = $v;
            }
            $this->assign('what', 'Item');
        }
        // else if($action == 'official'){
        //     // 商品正式页列表
        //     // echo 2;
        //     $condition = 'b_s = 1 and status = 1 and is_delete = 0 and user_id = '.$_SESSION['user']['id'];
        //     $res = $Item->GetGoods($page->firstRow, $page->listRows, $condition);
        //     foreach($res as $v){
        //         // var_dump($v);
        //         if($v['b_s'] == 1){
        //             $v['b_s'] = 0;
        //         }
        //         $v['show'] = 0;
        //         $list[] = $v;
        //     }
        //     // $list = $res;
        // }
        // else if($action == 'EnabledGoods'){
        //     // 商品正式页列表
        //     // echo 2;
        //     $condition = 'status = 0 and is_delete = 0 and user_id = '.$_SESSION['user']['id'];
        //     $res = $Item->GetGoods($page->firstRow, $page->listRows, $condition);
        //     foreach($res as $v){
        //         // var_dump($v);
        //         // if($v['b_s'] == 1){
        //         //     $v['b_s'] = 0;
        //         // }
        //         $v['show'] = 2;
        //         $list[] = $v;
        //     }
        //     // $list = $res;
        // }
        // var_dump($_SESSION);
        // var_dump($Goods->_sql());
        // var_dump($Item->_sql());
        // var_dump($list);
        // foreach($list as $v){
        //     var_dump($v['b_s']);
        //     var_dump($v['show']);
        // }
        $show = $page->show();
        $category = M('Category')->where('type=1')->order('sort_order desc,id asc')->select();

        
        $aliziConfig = cache('aliziConfig');
        $data = array();
        foreach ($list as $key => $value) {
            // $value['g_id'] = str_replace('Gid', '', $value['g_id']);
            if($aliziConfig['URL_MODEL']==2){
                $url = array(
                    'url'=>$this->aliziHost."id/{$value['sn']}.html",
                    // 'url'=>$this->aliziHost."id/{$value['g_id']}_{$value['sn']}.html",
                    'order'=>$this->aliziHost."single/{$value['sn']}-{$this->uid}.html",
                    // 'order'=>$this->aliziHost."single/{$value['g_id']}_{$value['sn']}-{$this->uid}.html",
                    'detail'=>$this->aliziHost."detail/{$value['sn']}-{$this->uid}.html",
                    // 'detail'=>$this->aliziHost."detail/{$value['g_id']}_{$value['sn']}-{$this->uid}.html",
                );
            }else{
                $url = array(
                    'url'=>$this->aliziHost."index.php?m=Index&a=order&id={$value['sn']}",
                    // 'url'=>$this->aliziHost."index.php?m=Index&a=order&id={$value['g_id']}_{$value['sn']}",
                    'order'=>$this->aliziHost."index.php?m=Order&id={$value['sn']}&uid={$this->uid}",
                    // 'order'=>$this->aliziHost."index.php?m=Order&id={$value['g_id']}_{$value['sn']}&uid={$this->uid}",
                    'detail'=>$this->aliziHost."index.php?m=Order&id={$value['sn']}&uid={$this->uid}&tpl=detail",
                    // 'detail'=>$this->aliziHost."index.php?m=Order&id={$value['g_id']}_{$value['sn']}&uid={$this->uid}&tpl=detail",
                );
            }
            $list[$key]['url'] = $url;
            // $list[$key]['g_id'] = $value['g_id'];
        }
// var_dump($list);
        $this->assign('category',$category);
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->assign('aliziHost',$this->aliziHost);
        $this->display($this->role=='admin'?'index':'itemList');
    }
    
    //商品内容编辑 添加商品
    function edit($do = '', $id='')
    {
        // echo 1;
        $where = array('id'=>(int)$id);
        $Item = M('Item');
        $info = $Item->where($where)->find();
        // var_dump($info);exit();
        $what['g_id'] = $info['g_id'];
        // var_dump($what);exit();
        $max = $Item->where($what)->max('b_s');
        // var_dump($max);
        // var_dump(M('Item')->_sql());
        if($info){
            $info['params'] = json_decode($info['params'], true);
            $info['send_to'] = json_decode($info['send_to'], true);
            $info['extends'] = json_decode($info['extends'], true);
            $info['sms_send'] = json_decode($info['sms_send'], true);
        } 
        $category = M('Category')->where('type=1')->order('sort_order desc,id asc')->select();
        $shipping = M('Shipping')->order('id asc')->select();
        // $GId = $info['g_id'];
        // if($do == 'edit'){
        //     $this->assign('GId', $GId);
        // }
// var_dump($info);

        $this->assign('max', $max);
        $this->assign('shipping', $shipping);
        $this->assign('category', $category);
        $this->assign('info', $info);
        $this->display('edit');
    }

    // 复制商品
    function copy($do = '', $id = '')
    {
        $this->edit($do, $id);
    }

    function using($id){
        $where = array('id'=>(int)$id);
        $info  = M('Item')->where($where)->find();
        $ItemTemplate = M('ItemTemplate');
        $template  = $ItemTemplate->where(array('id'=>$id))->find();

        $aliziConfig = cache('aliziConfig');
        $options = C('TEMPLATE_OPTIONS');
        $checked = !empty($template['options'])? json_decode($template['options'],true):json_decode($aliziConfig['order_options'],true);
        foreach($options as $k=>$v){
            $options[$k]['checked'] = in_array($k,$checked)?true:false;
        }
        $customColor = $this->getCustomColor($template['template'],'array');
        $this->assign('deaultColor',$customColor);
        $this->assign('url',$this->getUrl($info['sn']));
        $this->assign('info',$info);
        $this->assign('temp',$template);
        $this->assign('options',$options);
        $this->assign('extend',unserialize($template['extend']));
        $this->assign('custom',$this->getCustom());
        $this->display('using');
    }

    function template(){
        if(empty($_POST['options'])) $this->ajaxReturn(0,'请选择表单选项',0);
        $_POST['options'] = json_encode($_POST['options']);
        
        $extend = array(
            'padding'=>$_POST['padding'],
            'bottom_nav'=>$_POST['bottom_nav'],
            'bottom_nav_list'=>$_POST['bottom_nav_list'],
        );

        $Model = M('ItemTemplate');
        $data = $Model->create();
        $data['color'] = json_encode($_POST['color']);
        $data['extend'] = serialize($extend);
        foreach ($data as &$v) { $v=(!get_magic_quotes_gpc())?addslashes($v):$v; }
        
        $Model->query("REPLACE INTO __TABLE__(`".implode('`,`',array_keys($data))."`) VALUES('".implode("','",array_values($data))."')");

        cache('ItemTemplate'.$data['id'],$data);
        $this->ajaxReturn(null,1,1);
    }
    public function getUrl($id){
        $aliziConfig = cache('aliziConfig');
        if($aliziConfig['URL_MODEL']==2){
            $url = array(
                'order'=>$this->aliziHost."single/{$id}-{$this->uid}.html",
                'detail'=>$this->aliziHost."detail/{$id}-{$this->uid}.html",
            );
        }else{
            $url = array(
                'order'=>$this->aliziHost."index.php?m=Order&id={$id}&uid={$this->uid}",
                'detail'=>$this->aliziHost."index.php?m=Order&id={$id}&uid={$this->uid}&tpl=detail",
            );
        }
        $url['buildHtml'] = $this->aliziHost."index.php?m=Order&id={$id}&uid={$this->uid}&tpl=detail&buildHtml=H5&url={$this->aliziHost}".C('HTML_PATH').$id.C('HTML_FILE_SUFFIX');
        return $url;
        
    }


    //分类栏目
    public function category(){
        $action = 'Category/category';
        R($action);
        $this->display($action);
    }
     
    // 商品排序
    public function todo()
    {
        // 申爽
        // var_dump($_POST);exit();
        if(IS_POST){
            if(isset($_POST['sort'])){
                if($_POST['model'] == 'Goods'){
                    $Model = M('Goods');
                    $id = 'g_id';
                }else if($_POST['model'] == 'Item'){
                    $Model = M('Item');
                    $id = 'sn';
                }
                foreach($_POST['sort_order'] as $k=>$v){ 
                    // var_dump($k, $v);exit();
                    $Model->where(array($id=>$k))->setField('sort_order',$v); 
                    // exit();
                }
                // var_dump($Model->getLastSql());
                $this->success('排序成功');
            }else{
                // echo 1;exit();
                parent::deleteAll();
            }

        }
    }

     function getCustom($name=''){
        $dir = 'Home/Tpl/Alizi';
        $list = scandir($dir);
        $dirList = array();
        foreach($list as $li){
            $customDir = $dir.'/'.$li;
            if(is_dir($customDir) && !strstr($li,'.')){
                if(file_exists($customDir.'/config.php')){
                    $config = include($customDir.'/config.php');
                    $dirList[$li] = array('id'=>'Alizi/'.$li)+$config;
                }
            }
        }
        return empty($name)?$dirList:$dirList[$name];
     }
     function getCustomColor($tpl,$format='json'){
        $color = C('DEFAULT_COLOR');
        if(preg_match('/^Alizi\/(.*)/', $tpl,$map)){
            $tpl = $this->getCustom($map[1]);
            if(!empty($tpl['template']['default_color'])) $color=$tpl['template']['default_color'];
        }
        if($format=='json'){
            $this->ajaxReturn($color,'',1);
        }else{
            return $color;
        }
     }
     
     public function order(){
        $action = 'Order/index';
        R($action);
        $this->display($action,array('id'=>$_GET['id']));
    }
    
    function comments($id){
        
        $Model = M('Comments');
        $where = "1=1";
        import('ORG.Util.Page');
        $count = $Model->where($where)->count();
        $page  = new Page($count,20);
        $list  = $Model->where($where)->limit($page->firstRow . ',' . $page->listRows)->order("id desc")->select();
        $show  = $page->show();
        
        $this->assign('page',$show);
        $this->assign('list',$list);
        $this->display('comments');
    }
    function commentsEdit($item_id=0,$comments_id=0){
        if(!empty($comments_id)){
            $Model = M('Comments');
            $info = $Model->where(array('id'=>$comments_id))->find();
            $this->assign('info',$info);
        }
        $this->display();
    }
    public function commentsImport(){
        if(IS_POST){
            $item_id=intval($_POST['item_id']);
            $excel = array();
            $Public = new PublicAction();
            $Model = M('Comments');
            $excelUpload = $Public->upload(true);
            Vendor("PHPExcel.PHPExcel.IOFactory");
            $objPHPExcel = PHPExcel_IOFactory::load("./Public/Uploads".$excelUpload);
            foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
                foreach ($worksheet->getRowIterator() as $row) {
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(false);
                    foreach ($cellIterator as $cell) {
                        if (!is_null($cell)) {
                            //$excel[$cell->getCoordinate()]=$cell->getCalculatedValue();
                            $excel[$row->getRowIndex()][]=$cell->getCalculatedValue();
                        }
                    }
                }
            }
            
            //print_r($excel);exit;
            foreach($excel as $k=>$v){
                if($k==1){continue;}
                $data = array(
                    'item_id'=>$item_id,
                    'name'=>$v[0],
                    'status'=>1,
                    'region'=>$v[1],
                    'content'=>$v[2],
                    'reply_content'=>$v[3],
                    'add_time'=>$v[4],
                );
                $Model->add($data);
                
            }
        
            $this->ajaxReturn(1,lang('action_success'),1);

        }else{
            $status = C('ORDER_STATUS');
            unset($status[0]);
            $this->assign('status',$status);
            $this->assign('delivery',C('DELIVERY'));
            $this->display();
        }
    }
    
    function auth(){
        var_dump($_POST);exit();
        // 申爽
        $ItemGroup = M('ItemGroup');
        if(IS_POST){
            $item = explode(',',$_POST['item_id']);
            foreach($item as $item_id){
                $ItemGroup->where(array('item_id'=>$item_id))->delete();
                if($_POST['group_id']){
                    foreach($_POST['group_id'] as $group_id){ $ItemGroup->add(array('item_id'=>$item_id,'group_id'=>$group_id)); }
                }
            }
            $this->ajaxReturn(1,lang('action_success'),1);
        }else{
            $item_id = (int)$_GET['id'];
            $group = $ItemGroup->where(array('item_id'=>$item_id))->field('group_id')->select();
            $check = array();
            if($group){ foreach($group as $li){ $check[] = $li['group_id']; } }
            $list = M('UserGroup')->where(array('role'=>'agent',))->order('id asc')->select();
            $this->assign('check',$check);
            $this->assign('list',$list);
            $this->display();
        }
    }

    // 未静态化页面商品列表
    public function NotStatics()
    {
        $where['is_delete'] = 0;
        $where['s'] = 0;

        $this->ShowSta($where);
    }

    // 静态化商品列表
    public function statics()
    {
        $where['is_delete'] = 0;
        $where['s'] = array('neq',0);

        $this->ShowSta($where);
    }

    // 展示静态
    public function ShowSta($where)
    {
        $item = M('Item');

        $res = $item->where($where)->select();

        if(!$res){
            echo '<center>';
            $this->error('没有找到相应数据');
            echo '</center>';
        }

        $this->assign('info', $res);

        $this->display('statics');
    }

    // 上传商品页面
    public function uploads()
    {
        // var_dump($_GET);exit();
        $info = explode('_', str_replace(';', '', I('get.'))['from']);
// var_dump($info);exit();
        if($info[0] == 'Gid'){
            $this->assign('from', 'Gid');
            $this->assign('id', $info[1]);
        }else if($info[0] == 'sn'){
            $this->assign('from', 'sn');
            $this->assign('id', $info[1].'_'.$info[2]);
        }
        $category = M('Category')->where('type=1')->order('sort_order desc,id asc')->select();
        // var_dump($category);
        $this->assign('category', $category);
        $this->display();
    }

    // 处理上传页面
    public function DoUp() 
    {
        // var_dump($_POST);exit();
        $data = I('request.');
        // var_dump($data);
        $goods = $_POST['goods'];
        if(empty($goods['name'])){
            $this->error('商品名不能为空');
            exit();
        }
        if(empty($goods['category_id'])){
            $this->error('商品分类不能为空');
            exit();
        }
        // var_dump($goods);
        // if($data['genre'] == 0){
        //     // 审核页
        //     $path = './Html/Genre/'.date('Ymd-His', time()).'-'.rand(100, 999).'/';
        // }else if($data['genre'] == 1){
            // 商品页
        $path = './Html/Goods/'.date('Ymd-His', time()).'-'.rand(100, 999).'/';
        // }
// var_dump($path);
        if(!file_exists($path)){
            mkdir($path, 0777, true);
        }

        import("ORG.Util.UploadFile");
        $up = new UploadFile();
        $up->maxSize = 3145728;// 设置附件上传大小
        $up->allowExts  = array('htm');// 设置附件上传类型
        $up->savePath  = $path;//设置附件上传目录

        if(!$up->upload()){
            $this->error($up->getErrorMsg());
        }else{
            $info = $up->getUploadFileInfo();
            // var_dump($info);
            $file = $info[0]['savepath'].$info[0]['savename'];
            // var_dump($file);
            $this->GetHtml($goods, $file);
        }
     
    }

    // 获取页面信息
    public function GetHtml($goods, $file)
    {
        // var_dump($goods);exit();
        // echo 1;
        if(empty($file)){
            $this->error('没有找到上传文件');
            exit();
        }
        $res = file_get_contents($file);  
        // var_dump($res);
        // 网页可以直接匹配正则，不需要再写入一次txt
        // $path = './Txt/'.date('Ymd-His', time()).'-'.rand(100, 999).'.txt';;
        // file_put_contents($path, $res);

        // var_dump($_SESSION['user']);
        
        $data['user_id'] = $_SESSION['user']['id'];
        // $Item = D('Item');
        // $data['sn'] = $Item->CreateSn();
        $data['category_id'] = $goods['category_id'];
        $data['name'] = str_replace(';', '', $goods['name']);
        $data['brief'] = '';
        $data['tags'] = '';
        preg_match_all('/<ol>[\s*\S*]*<\/ol>/', $res, $OPrice);
        preg_match_all("/<p>原价<\/p>\s*￥\d+\s*<\/li>/", $OPrice[0][0], $OPrice);
        preg_match_all("/\d+/", $OPrice[0][0], $OPrice);
        $data['original_price'] = $OPrice[0][0];
        preg_match_all("/<strong>\s*\S+\s*<\/strong>/", $res, $price);
        preg_match_all("/\d+/", $price[0][0], $price);
        $data['price'] = $price[0][0];
        $data['salenum'] = '';
        $data['qrcode_pay'] = '';
        $data['qrcode_pay_info'] = '';
        $data['qrcode'] = '';
        $data['image'] = '';
        $data['thumb'] = '';
        $data['status'] = 1;
        $data['is_hot'] = 1;
        $data['is_big'] = '';
        $data['sort_order'] = '';
        $data['params'] = '';
        // $data['params_type'] = '';
        $data['options'] = '';
        $data['extends'] = '';
        $data['content'] = '';
        $data['payment'] = '';
        $data['shipping_id'] = '';
        $data['remark'] = '';
        $data['is_delete'] = '';
        $data['is_sent'] = '';
        $data['is_auto_send'] = '';
        $data['send_content'] = '';
        $data['sms_send'] = '';
        $data['timer'] = '';
        $data['update_time'] = '';
        $data['add_time'] = time();
        preg_match_all("/<title>\S*<\/title>/", $res, $WebT);
        $data['web_t'] = str_replace('</title>', '', str_replace('<title>', '', $WebT[0][0]));
        preg_match_all('/<meta name = "keywords" content = "\S+">/', $res, $cont1);
        $data['cont1'] = str_replace('">', '', str_replace('<meta name = "keywords" content = "', '', $cont1[0][0]));
        preg_match_all('/<meta name = "description" content = "\S+">/', $res, $cont2);
        $data['cont2'] = str_replace('">', '', str_replace('<meta name = "description" content = "', '', $cont2[0][0]));
        preg_match_all('/<meta name = "author" content = "\S+">/', $res, $cont1);
        $data['cont3'] = str_replace('">', '', str_replace('<meta name = "author" content = "', '', $cont1[0][0]));
        preg_match_all("/<h1>\S*<\/h1>/", $res, $tit);
        $data['tit'] = str_replace('</h1>', '', str_replace('<h1>', '', $tit[0][0]));
        // 获取div中所有内容
        preg_match_all('/<div class = "banner".*?>.*?<\/div>/ism', $res, $TImg);
        $data['tit_img'] = trim(str_replace('</div>', '', str_replace('<div class = "banner">', '', $TImg[0][0])));
        preg_match_all("/<strong>\s*\S+\s*<\/strong>/", $res, $num);
        preg_match_all("/\d+/", $num[0][1], $num);
        $data['num'] = $num[0][0];
        $data['dao_time'] = 1;
        preg_match_all("/<h2>\S*<\/h2>/", $res, $qiang);
        $data['qiang'] = str_replace('▼', '', str_replace('</h2>', '', str_replace('<h2>', '', $qiang[0][0])));
        preg_match_all('/<article class = "showcontent".*?>.*?<\/article>/ism', $res, $article);
        // var_dump($article);
        $arr = explode('</h2>', $article[0][0]);
        unset($arr[0]);
        // var_dump($arr);
        $a = array();
        foreach($arr as $v){
            // var_dump($v);
            $b = explode('<h2>', $v);
            $a[] = $b[0];
        }
        // var_dump($a);
        $data['q_info'] = trim($a[0]);
        $data['buy'] = str_replace('▼', '', str_replace('</h2>', '', str_replace('<h2>', '', $qiang[0][1])));
        $data['b_info'] = trim($a[1]);
        $data['chan'] = str_replace('▼', '', str_replace('</h2>', '', str_replace('<h2>', '', $qiang[0][2])));
        $data['c_info'] = trim($a[2]);
        $data['ser'] = str_replace('▼', '', str_replace('</h2>', '', str_replace('<h2>', '', $qiang[0][3])));
        preg_match_all('/<div class = "btn".*?>.*?<\/div>/ism', $a[3], $SInfo);
        // var_dump($SInfo);
        preg_match_all('/<p>\S+<\/p>/', $SInfo[0][0], $SInfo1);
        $data['s_info'] = $SInfo1[0][0];
        $SInfo[0][0] = str_replace('<div class = "none"></div>', '', $SInfo[0][0]);
        $arr = explode('<a', $SInfo[0][0]);
        // var_dump($arr);
        unset($arr[0]);
        $a = array();
        foreach($arr as $v){
            $a[] = '<a' . $v;
        }
        // var_dump($a);
        // 正则匹配中文，注意编码，这是匹配utf8
        preg_match_all("/[\x{4e00}-\x{9fa5}]+/u", $a[0], $TelT1);
        $data['tel_t1'] = $TelT1[0][0];
        preg_match_all('/\d+/', $a[0], $tel1);
        $data['tel1'] = $tel1[0][0];
        preg_match_all("/[\x{4e00}-\x{9fa5}]+/u", $a[1], $TelT2);
        $data['tel_t2'] = $TelT2[0][0];
        preg_match_all('/\d+/', $a[1], $tel2);
        $data['tel2'] = $tel2[0][0];
        preg_match_all("/[\x{4e00}-\x{9fa5}]+/u", $a[2], $SmsT);
        $data['sms_t'] = empty($SmsT[0][0])?'':$SmsT[0][0];
        preg_match_all('/\d+/', $a[2], $sms);
        $data['sms'] = empty($sms[0][0])?'':$sms[0][0];
        $data['in_t'] = str_replace('▼', '', str_replace('</h2>', '', str_replace('<h2>', '', $qiang[0][4])));
        $data['in_in'] = '';
        preg_match_all('/<div class = "foot".*?>.*?<\/div>/ism', $res, $foot);
        $data['ft_img'] = trim(str_replace('</div>', '', str_replace('<div class = "foot">', '',$foot[0][0])));
        preg_match_all('/<center><div><p>\S*<\/p><\/div><\/center>/', $res, $comp);
        preg_match_all("/[\x{4e00}-\x{9fa5}]+/u", $comp[0][0], $comp);
        $data['comp'] = empty($comp[0][0])?'':$comp[0][0];
        $data['s'] = '';


        // 匹配订单信息
        preg_match_all('/<div class = "combo".*?>.*?<\/div>/ism', $res, $combo);
        $combo = str_replace('</div>', '', str_replace('<div class = "combo">', '', trim($combo[0][0]))); 
        $data['params'] = empty($combo)?'':$combo;
        preg_match_all('/<div class = "type".*?>.*?<\/div>/ism', $res, $type);
        $type = str_replace('</div>', '', str_replace('<div class = "type">', '', trim($type[0][0]))); 
        $data['params_type'] = empty($type)?'':$type;
        preg_match_all('/<div class = "extends".*?>.*?<\/div>/ism', $res, $extends);
        $extends = str_replace('</div>', '', str_replace('<div class = "extends">', '', trim($extends[0][0]))); 
        $data['extends'] = empty($extends)?'':$extends;
        preg_match_all('/<div class = "content".*?>.*?<\/div>/ism', $res, $content);
        $content = str_replace('</div>', '', str_replace('<div class = "content">', '', trim($content[0][0]))); 
        $data['content'] = empty($content)?'':$content;

        // $data['params'] = '1111111111';
      
        // var_dump($goods);exit();
        // var_dump($file);exit();
        $data['user_id'] = $info['user_id'] = $_SESSION['user']['id'];
        // var_dump($goods);exit();
        if(empty($goods['id'])){
            $Goods = D('Goods');
            $data['g_id'] = $info['g_id'] = $Goods->CreateGid();
            // var_dump($goods);exit();
            $Goods1 = M('Goods');
            $res = $Goods->data($info)->add();
            if(!$res){
                $this->error('添加商品失败');
                exit();
            }
            // echo 1;
        }else{
            $id = explode('_', $goods['id']);
            // var_dump($id);exit();
            // if(empty($id[1])){
                $data['g_id'] = $info['g_id'] = $id[0]; 
            // }
        }
        // var_dump($data['g_id']);exit();
        // $data['b_s'] = $info['b_s'] = $goods['genre'];
        // $info['sta'] = 1;
        // var_dump($goods);exit();
        // var_dump($info);exit();
        $info['is_delete'] = 0;
        $Item = M('Item');
        if($goods['from'] != 'sn'){
            // echo 1;exit();
            // var_dump($info);exit();
            $max = $Item->where($info)->max('b_s');
            if($max){
                // 存在商品
                $data['b_s'] = (int)$max + 1;
                // echo 1;
            }else{
                // 不存在商品
                // echo 2;
                $data['b_s'] = 1;
            }
            $where['g_id'] = $data['g_id'];
            $where['user_id'] = $_SESSION['user']['id'];
            // $where['status'] = $_SESSION['user']['id'];
            $status = $Item->where($where)->getfield('status');
            // var_dump($where);exit();
            // var_dump($Item->_sql());exit();
            // var_dump($status);exit();
            if($status == 1){
                $data['status'] = 0;
            }else{
                $data['status'] = 1;
            }

            $Item1 = D('Item');
            $data['sn'] = $Item1->CreateSn();

            // var_dump($data['sn']);exit();
            // 原来的添加商品，会把json格式的字符串弄丢，重写个生成sn，自己添加商品，不用create
            $res = $Item->data($data)->add();
            if(!$res){
                $this->error('添加数据失败');
                exit();
            }else{
                $this->success('添加商品数据成功');
                exit();
            }
            //     var_dump($Item->_sql());exit();
            // exit();
            // $Item1 = D('Item');
            // if($res = $Item1->create($data)){
            //     // $Item = M('Item');
            //     $res = $Item1->add($res);
            //     // var_dump($data['params_type']);
            //     var_dump($Item1->_sql());exit();
            //     if(!$res){
            //         $this->error('添加数据失败');
            //         exit();
            //     }else{
            //         $this->success('添加商品数据成功');
            //         exit();
            //     }
            // }
        }else{
            // 这是更新商品
            // var_dump($goods);exit();
            // $Item1 = M('Item');
            // if($res = $Item1->create($data)){
                // $Item = M('Item');
            // var_dump($where);exit();
            // $data[]
            $data['g_id'] = explode('_', $goods['id'])[0];
            $where['sn'] = explode('_', $goods['id'])[1];
            // var_dump($where);exit();
            $res = $Item->where($where)->save($data);
            // var_dump($Item->_sql());exit();
            if(!$res){
                $this->error('修改数据失败');
                exit();
            }else{
                $this->success('修改商品数据成功');
                exit();
            }
            // }
        }
        // var_dump($Item->_sql());exit();
        // var_dump((int)$max);exit();
        // exit();
        // var_dump($data['b_s']);exit();
        
        // var_dump($data);exit();
        

        
    } 

    // 下载商品页面
    public function down()
    { 
        // 下载页面  暂时
        $info = explode('_', str_replace(';', '', I('get.'))['id']);
        // var_dump($info);exit();
        // $id = ;
        if(empty($info[1])){
            $file = $info[0].'/index.htm';
        }else if(!empty($info[1])){
            $file = $info[0]."/".$info[1].'/index.htm';
        }else{
            $this->error('未知错误');
        }
        // if($info[2] == 1){
        //     $file = $info[0].'/index.htm';
        // }else if($info[2] == 0){
        //     $file = $info[0]."/".$info[1].'/index.htm';
        // }else{
        //     $this->error('未知错误');
        // }
        $path = $this->aliziHost.'Html/'.$file;
        // $path = $_SERVER['DOCUMENT_ROOT'].'/Html/'.$file;
        // var_dump($path);exit();
        ob_start();   
        $date = date('Y-m-d-H-i-s');  
        header("Content-type: application/octet-stream");   
        header("Accept-Ranges: bytes");   
        header("Content-Disposition: attachment; filename= {$date}.htm");   
        $size = readfile($path);   
    }

//     // 替换商品页面，其实就是替换了商品1表中的字段
//     public function ReGoods($sta = '')
//     {
//         $info = I('get.');
//         // var_dump($info);exit();
        
//         $what['g_id'] = $where['g_id'] = substr($info['id'], 0, -1);
//         $BodySta = substr($info['id'], -1); 
//         // var_dump($BodySta);
//         // var_dump($where);exit();
//         if($BodySta == 1){
//             $what['b_s'] = $data['b_s'] = 0;
//             // echo 1;
//             $msg = '没有找到该商品审核页或者该页面未启用';
//         }else if($BodySta == 0){
//             $what['b_s'] = $data['b_s'] = 1;
//             // echo 2;
//             $msg = '没有找到该商品正式页面或者该页面未启用';
//         }else{
//             $this->error('稍微休息一下，再来吧');
//         }
//         $what['status'] = 1;
//         $Item = M('Item');
//         $res = $Item->where($what)->find();
// // var_dump($res);exit();
//         if(!$res){
//             $this->error($msg);
//             exit();
//         }

//         $Goods = M('Goods');
//         $res = $Goods->where($where)->save($data);
// // var_dump($Goods->_sql());
// // var_dump($where);
// // var_dump($data);exit();
// // var_dump($res);exit();
//         if($res){
//             $this->success('替换页面成功'); 
//         }else if(!$res){
//             $this->error('替换页面失败');
//         }else{
//             $this->error('蓝瘦');
//         }
//     }

    // 商品页面列表
    public function GidsList()
    {
        $id = str_replace(';', '', I('get.id'));
        // var_dump($id);exit();
        $this->index('Gids', $id);
    }

    // // 正式商品页面列表
    // public function official()
    // {
    //     $this->index('official');
    // }

    // // 未启用商品页面列表
    // public function EnabledGoods()
    // {
    //     $this->index('EnabledGoods');
    // }

    // 启用商品页面
    public function OnGoods()
    {
        $info = I('get.');
        $id = explode('_', str_replace(';', '', $info['id']));
        // var_dump($id);exit();
        $what['g_id'] = $where['g_id'] = $id[0];
        $where['sn'] = $id[1];
        // $where['status'] = 0;
        // var_dump($where);
        $data1['status'] = 0;
        $data1['s'] = 0;
        $data['status'] = 1;
        $Item = M('Item');
        $res1 = $Item->where($what)->save($data1);
        if(!$res1){
            $this->error('恢复商品页面失败');
            exit();
        }
        // exit();
        $res = $Item->where($where)->save($data);
        if(!$res){
            $this->error('启动商品页面失败');
            exit();
        }else{
            $this->success('启动商品页面成功');
            exit();
        }
    }

    // 恢复删除商品页面
    public function RecoverGoods()
    {
        $info = I('get.');
        $where['g_id'] = str_replace(';', '', $info['id']);
        // var_dump($where);
        $data['is_delete'] = 0;
        $Item = M('Item');
        $res = $Item->where($where)->save($data);
        if(!$res){
            $this->error('恢复商品页面失败');
            exit();
        }else{
            $this->success('恢复商品页面成功');
            exit();
        }
    }

    // 下载页面
    public function download()
    {   
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
        $path = $this->aliziHost.'Html/down/'.$info['sn'].'/index';
        // $path = $_SERVER['DOCUMENT_ROOT'].'/Html/down/'.$info['sn'].'/index';
        // $data['path'] = $path;
        // $data['s'] = rand(100,1000);
        // $item = M('Item');
        // $res = $item->where($where)->save($data);
        // if(!$res){
        //     echo '<center>更新数据出错<center/>';
        //     exit();
        // }

        if($this->buildHtml($file,'',"Index:order")){
            // if($do[1] == 'down'){
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


