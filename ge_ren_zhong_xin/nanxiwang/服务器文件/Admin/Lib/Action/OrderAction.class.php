<?php
class OrderAction extends AliziAction {
    public function _initialize(){
        parent::_init();
    }

    function index($payment=0)
    {
        if(isset($_GET['do'])){
            $this->view($_GET['id']);exit;
        }
        
        $Model = M('Order');
        $fields = trim($_GET['fields']);
        $status = $_GET['status'];
        $payment = $_GET['payment'];
        $keyword = trim($_GET['keyword']);
        $category_id = intval($_GET['category_id']);
        $time_start = strtotime($_GET['time_start']);
        $time_end   = strtotime($_GET['time_end']);
        $pageSize = empty($_GET['pageSize'])?25:intval($_GET['pageSize']);
        $where = "is_delete=0";
// echo 1;exit();
        if(!empty($keyword)) $where .= " AND $fields LIKE '%$keyword%' ";
        if(is_numeric($status)) $where .= " AND status ={$status} ";
        if(is_numeric($payment)) $where .= " AND payment ={$payment} ";
        if(!empty($time_start) && $time_start < ($time_end)) $where .= " AND (add_time BETWEEN {$time_start} AND {$time_end})";
        if(!empty($category_id)) $where .= " AND category_id={$category_id}";
        if(!empty($payment)) $where .= $payment==1? " AND payment =1":" AND payment !=1";//payment=1货到付款，其它为在线支付
        if(!empty($_GET['channel_id'])) $where .= " AND channel_id ='{$_GET['channel_id']}'";
        if(!empty($_GET['user_id'])) $where .= " AND user_id ={$_GET['user_id']}";
        if(!empty($_GET['user_pid'])) $where .= " AND user_pid ={$_GET['user_pid']}";
        if(!empty($_GET['item_id'])) $where .= " AND item_id ={$_GET['item_id']}";
        if(!empty($_GET['referer'])) $where .= " AND referer LIKE '%{$_GET['referer']}%'";

        $order = empty($orderby)?"id DESC":"{$orderby} {$sort}";
        
        switch($this->role){
            case 'admin': 
                $usermap=' AND role="agent"';
            break;
            case 'agent': 
                $usermap= " AND role='member' AND pid={$this->uid}";
                $where .= " AND user_pid ={$this->uid}";
            break;
            case 'member': 
                $usermap=' AND id='.$this->uid;
                $where .= " AND user_id ={$this->uid}";
            break;
        }
        $user = M('User')->where("is_delete=0 ".$usermap)->order('id asc')->select();

        if(isset($_GET['aliziExcel'])){
                $list  = $Model->where($where)->order('id desc')->select();
                $jsonStatus = strip_tags(json_encode(C('ORDER_STATUS')));//订单状态
                $jsonShipping = json_encode(C('DELIVERY'));//快递信息

                $payment = C('PAYMENT');
            foreach ($payment as $key => $value) { $payment[$key]=$value['name'];}
            $jsonPayment = json_encode($payment);

                foreach($list as &$li){
                    list($li['province'],$li['city'],$li['area']) = explode(' ', $li['region']);
                    $li['detail_address'] = $li['region'].$li['address'];
                $li['extends'] = '';
                if(!empty($li['item_extends'])){
                    $extends= json_decode($li['item_extends'],true);
                    $extends_params = array();
                    foreach ($extends as $key=>$value) {
                        $value = is_array($value)?implode(',', $value):$value;
                        $extends_params[] = $key.lang('colon').$value;
                    }
                    $li['extends'] = implode('；',$extends_params);
                }
                }
            $title = array(
                'id' => lang('id'),
                'order_no' => lang('order_number'),
                'item_name'  => lang('item_name'),
                'item_params'  => lang('item_package'),
                'extends'  => lang('extends_package'),
                'quantity' => lang('quantity'),
                'total_price' => lang('price'),
                'name' => lang('customer_realname'),
                'mobile' => lang('customer_mobile'),
                'phone' => lang('customer_phone'),
                'province' => lang('province'),
                'city' => lang('city'),
                'area' => lang('area'),
                'address' => lang('address'),
                'detail_address' => lang('详细_address'),
                'payment##'.$jsonPayment => lang('payment'),
                'status##'.$jsonStatus => lang('order_status'),
                'delivery_name##'.$jsonShipping => lang('express_name'),
                'delivery_no' => lang('express_number'),
                'remark' => lang('remark'),
                'qq' => lang('qq'),
                'mail' => lang('email'),
                'channel_id' => lang('channel'),
                'url' => lang('下单地址'),
                'referer' => lang('来路地址'),
                'user_pid||getFields("User","username",###)' => lang('agent'),
                'user_id||getFields("User","username",###)' => lang('member'),
                'add_ip' => lang('booking_ip'),
                'add_time||date("Y-m-d H:i:s",###)' => lang('booking_time'),
            );
            parent::aliziExcel($list,$title,date('Y-m-d'));exit;
            }

        import('ORG.Util.Page');
        $count = $Model->where($where)->count();
        $page  = new Page($count,$pageSize);
        $list  = $Model->where($where)->limit($page->firstRow . ',' . $page->listRows)->order($order)->select();
        $show  = $page->show();
        $category  = M('Category')->order('sort_order desc')->select();
        $status = C('ORDER_STATUS');
        foreach($status as $k=>$v){ 
            $map = "is_delete=0 AND status={$k}";
            if(!empty($payment)) $map .= $payment==1? " AND payment =1":" AND payment !=1";
            switch($this->role){
                case 'agent':  $map .= " AND user_pid ={$this->uid}"; break;
                case 'member':  $map .= " AND user_id ={$this->uid}"; break;
            }
        
            $status[$k] = array('name'=>$v,'count'=>$Model->where($map)->count());
        }

// dump($channel);
// exit();
        $this->assign('channel',$channel);
        $this->assign('user',$user);
        $this->assign('category',$category);
        $this->assign('delivery',C('DELIVERY'));
        $this->assign('status',$status);
        
        $this->assign('list',$list);
        
        $this->assign('page',$show);
        $this->display($this->role);
    }

    function cashOnDelivery(){
        $this->index(1);
    }

    function payOnLine(){
        $this->index(2);
    }
    
    //内容编辑
    function view($id='')
    {
// echo 1;
        $Order = M('Order');
        $where = "id={$id}";
        $info  = $Order->where($where)->find();
        if($this->role=='admin' || ($this->role=='agent' && $info['user_pid']==$this->uid) || ($this->role=='member' && $info['user_id']==$this->uid) ){
            if(!empty($info)) $log = M('OrderLog')->where(array('order_id'=>$info['id']))->order('id asc')->select();
            if(isset($_GET['status'])){
                $map = " AND status=".intval($_GET['status']);
            }
            $pre_id = $Order->where("id<{$info['id']}".$map)->order('id desc')->getField('id');
            $next_id = $Order->where("id>{$info['id']}".$map)->getField('id');

            $aliziConfig = cache('aliziConfig');
            $delivery_setting = array_flip(json_decode($aliziConfig['delivery_setting'],true));
            $delivery = array_intersect_key(C('DELIVERY'),$delivery_setting);

            // 申爽 查看订单，筛除未选择的
            
            $arr = explode(',', $info['item_extends']);
            // var_dump($arr);
            $a = array();
            foreach($arr as $v){
                // var_dump($v);
                if(!preg_match('/u65e0/', $v)){
                    $a[] = $v;
                }
            }

            $info['item_extends'] = '{'.str_replace('}', '', str_replace('{', '', implode(',', $a))).'}';

            // var_dump($info);

            $this->assign('delivery',$delivery);
            $this->assign('info',$info);
            $this->assign('log',$log);
            $this->assign('pre_id',$pre_id);
            $this->assign('next_id',$next_id);
            $this->display($_GET['do']);
        }else{
            $this->error('无权操作');
        }
    }
    

    function status(){
        $id = (int)$_POST['id'];
        $status = (int)$_POST['status'];

        $data = array(
            'order_id'=>$id,
            'status'=>$status,
            'user_id'=>(int)$this->uid,
            'remark'=>htmlspecialchars($_POST['remark']),
            'delivery_name'=>trim($_POST['delivery_name']),
            'delivery_no'=>trim($_POST['delivery_no']),
        );
        $data['sign'] = createSign($data,C('ALIZI_KEY'));
        $rs = http($this->aliziHost."index.php?m=Api&a=aliziUpdateStatus", 'POST', array('data'=>$data));
        $this->ajaxReturn($status,'操作成功',1);
    }

    //更新快递
    public function deliveryUpdate(){
        $data = array(
            'id'=>(int)$_POST['id'],
            'delivery_name'=>trim($_POST['delivery_name']),
            'delivery_no'=>addslashes($_POST['delivery_no']),
            'update_time'=>time(),
        );
        $rs = M('Order')->save($data);
        if($rs){
            $this->ajaxReturn(null,'保存成功',1);
        }else{
            $this->ajaxReturn(null,'操作失败',0);
        }
        
    }
    public function import(){
        if(IS_POST){
            $status = intval($_POST['status']);
            $delivery_name = trim($_POST['delivery_name']);
            $time = time();
            $excel = array();
            $Public = new PublicAction();
            $Model = M('Order');
            
            if(isset($_POST['upload'])){
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
                unset($excel[1]);
                if(count($excel)>0){ $this->ajaxReturn($excel,count($excel),1);}else{$this->ajaxReturn(0,0,0);}
                /*
                foreach($excel as $k=>$v){
                    //if($k==1){continue;}
            
                    $order_id = $Model->where(array('order_no'=>$v[0]))->getField('id');
            
                    if($order_id){
                        $data = array('order_id'=>$order_id,'status'=>$status,'remark'=>$v[2],'update_time'=>$time,'user_id'=>$this->uid);
                        if($status==3){
                            $data['delivery_name']=$delivery_name;
                            $data['delivery_no']=$v[1];
                        }       

                        $data['sign'] = createSign($data,C('ALIZI_KEY'));
                        $rs = http($this->aliziHost."index.php?m=Api&a=aliziUpdateStatus", 'POST', array('data'=>$data));
                    }
                }
                */
            }else{
                
                $order_id = $Model->where(array('order_no'=>$_POST['order_no']))->getField('id');
                if($order_id){
                    $data = array('order_id'=>$order_id,'status'=>$status,'remark'=>$_POST['remark'],'update_time'=>$time,'user_id'=>$this->uid);
                    if($status==3){
                        $data['delivery_name']=$delivery_name;
                        $data['delivery_no']=$_POST['delivery_no'];
                    }       

                    $data['sign'] = createSign($data,C('ALIZI_KEY'));
                    $rs = http($this->aliziHost."index.php?m=Api&a=aliziUpdateStatus", 'POST', array('data'=>$data));
                    //print_r($_POST);print_r($rs);
                    $this->ajaxReturn($data,lang('action_success'),1);
                }else{
                    $this->ajaxReturn(0,lang('action_失败'),0);
                }
            }
        
            

        }else{
            $status = C('ORDER_STATUS');
            unset($status[0]);
            $this->assign('status',$status);
            $this->assign('delivery',C('DELIVERY'));
            $this->display();
        }
    }
    function modify(){
        if(IS_POST){
            $Model = M('Order');
            if($vo=$Model->create()){
                $Model->save($vo);
                $this->success(lang('modify_success'));
            }else{
                $this->error(lang('modify_failue'));
            }
        }
    }
    
    public function statistics(){
        R('Statistics/index');
    }
    public function channel(){
        R('Statistics/channel');
    }
    public function region(){
        R('Statistics/byRegion',array('start'=>$_GET['start'],'end'=>$_GET['end']));
    }
    public function time(){
        R('Statistics/byTime',array('start'=>$_GET['start'],'end'=>$_GET['end']));
    }
    public function user(){
        R('Statistics/byUser',array('start'=>$_GET['start'],'end'=>$_GET['end']));
    }
     
}

