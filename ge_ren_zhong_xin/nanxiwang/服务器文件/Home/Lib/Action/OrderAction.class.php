<?php
defined('THINK_PATH') OR exit();
class OrderAction extends AliziAction {

    public function _initialize(){
        parent::_init();
    }

    public function index($id,$tpl='index'){
      if(empty($id) || !ctype_alnum($id))$this->error(lang('error'));
      if($id=='6uaXmYzy' && isMobile()){
        header('location:http://www.lihgtfc.com/index.php?m=Order&id=u3aXmYzy&uid=1&tpl=detail');
      }
      $info  = getCache('Item',array('sn'=>$id));
      if(empty($info) || $info['is_delete']==1) $this->error(lang('empty_item'));
      $template  = getCache('ItemTemplate',array('id'=>$info['id']),true);
      $template['extend'] = unserialize($template['extend']);
      $template['color'] = json_decode($template['color'],true);
      if(isset($_GET['theme'])) $template['template']=str_replace('-', '/', $_GET['theme']);

      if(!empty($template) && preg_match('/^(Alizi\/)/i', $template['template'])){
        $tplName = ltrim(strstr($template['template'],'/'),'/').'/';
        $tpl = ($tpl=='detail' && file_exists(TMPL_PATH.$template['template'].'/detail.html'))?'detail':'index';
        $tpl = 'Alizi/'.$tplName.$tpl;
        $dir = TMPL_PATH.$template['template'];
        $this->assign('theme',TMPL_PATH.$template['template']);
        $this->assign('options',include($dir."/config.php"));
      }else{
        $tpl = "Order/".$tpl;
      }
          
      if($template['show_comments']){
         $this->assign('commentsTpl',"Comments:".$template['show_comments']);
      }
      $this->assign('info',$info);
      $this->assign('template',$template);
      $this->display($tpl);
      if(isset($_GET['buildHtml'])){
        $this->buildHtml($id,C('HTML_PATH'),$tpl);
        header("location:".C('ALIZI_ROOT').C('HTML_PATH').$id.C('HTML_FILE_SUFFIX'));
      }
    }

    // 接收订单
    public function aliziBooking()
    {
        // $this->ajaxReturn(1, '测试', 1);
        $_POST['sign'] = createSign($_POST,C('ALIZI_KEY'));
        $result = R('Api/aliziBooking',array('data'=>$_POST));
        $data  = $result['status']==1?array('order_id'=>$result['data']['order_id'],'order_no'=>$result['data']['order_no']):null;
        if(IS_AJAX){
            $this->ajaxReturn($data,$result['message'],$result['status']);
        }else{
            if($result['status']==1){
                header("location:".U('Order/pay',array('order_no'=>$data['order_no'])));
            }else{
                $this->error($result['message']);
            }
        }
    }

    public function getAliziPrice(){
        $data = array(
            'sn'=>$_POST['sn'],
            'quantity'=>(int)$_POST['quantity'],
            'item_params'=>trim($_POST['params']),
            'payment'=>(int)$_POST['payment'],
        );
        $data['sign'] = createSign($data,C('ALIZI_KEY'));
        $result = R('Api/getAliziPrice',array('data'=>$data));
        $this->ajaxReturn($result,'success',1);
    }

    public function query(){
          if(IS_POST){
              $kw = trim($_POST['kw']);
              $Model = M('Order');
              $OrderLog = M('OrderLog');
              $status = C('ORDER_STATUS');
              $where = isMobileNum($kw)?"mobile='{$kw}'":"order_no='{$kw}'";
              $orders = $Model->where($where)->order('id desc')->select();
              $list = array();
              if($orders)
              {
                foreach($orders as $li)
                {
                  $item_extends = json_decode($li['item_extends'],true);
                  $itemExtends = '';
                  foreach($item_extends as $k=>$v)
                  {
                    $itemExtends.=$k.lang('colon').(is_array($v)?implode(' ', $v):$v)."<br>";
                  }
                  // foreach($item_extends as $k=>$v)
                  // {
                  //   $itemExtends.=$k.lang('colon').(is_array($v)?implode(' ', $v):$v)."<br>";
                  // }
                  // 前台搜索订单信息显示的套餐
                  // $arr = explode(',', $item_extends);
                  // $arr1 = array();
                  // foreach($item_extends as $v)
                  // {
                  //   is_array($v)?implode(' ', $v):$v)
                  //   {
                  //     // 匹配信息无筛除出去
                  //     if(!preg_match('无', $v)){
                  //       $arr1[] = $v;
                  //     }
                  //   }
                  // }
                  // $arr1 = '{'.str_replace('}', '', str_replace('{', '', implode(',', $arr1))).'}';

                  $list[] = array(
                      'title'=>$li['item_name'],
                      'order_no'=>$li['order_no'],
                      'order_status'=>(int)$li['status'],
                      'status'=>strip_tags($status[$li['status']]),
                      'payment'=>$li['payment'],
                      'quantity'=>$li['quantity'],
                      'price'=>$li['total_price'],
                      'name'=>$li['name'],
                      'params'=>$li['item_params'],

                      'itemExtends'=>$itemExtends,
                      // 'itemExtends'=>$arr1,

                      // 'datetime'=>substr($li['datetime'],0,10),
                      'datetime'=>date('Y-m-d H:i:s',$li['datetime']),

                      'address'=>$li['region'].$li['address'],
                      'time'=>date('Y-m-d H:i:s',$li['add_time']),
                      'express'=>experss($li['delivery_name'],$li['delivery_no']),
                      'qq'=>$li['qq'],
                  );
                } 
              } 
              if($list){
                $this->ajaxReturn(array('title'=>'query','list'=>$list),'true',1);
              }else{
                $this->ajaxReturn(array('title'=>'query','list'=>null),lang('empty'),0);
              }
          }else{
            $this->display();
          }
    }
    public function apply(){
        if(IS_POST){
            $order_no = trim($_POST['order_no']);
            $mobile = trim($_POST['mobile']);
            $Model = M('Order');
            $where = array('order_no'=>$order_no,'mobile'=>$mobile);
            $order = $Model->where($where)->field('id,status')->find();
            
            if(empty($order)){
                $msg = lang('empty');
            }else{          
                switch($order['status']){
                    case '1':
                        $msg = lang('applySuccess');
                        $data = array(
                            'order_id'=>$order['id'],
                            'status'=>8,
                            'remark'=>htmlspecialchars($_POST['refund_payment'].' , '.$_POST['refund_account']),
                        );
                        $data['sign'] = createSign($data,C('ALIZI_KEY'));
                        $rs = http($this->aliziHost."index.php?m=Api&a=aliziUpdateStatus", 'POST', array('data'=>$data));
                    break;
                    case '8':$msg = lang('applyIn');break;
                    default: $msg = lang('status_err');
                }
            }
            $this->ajaxReturn(1,$msg,1);
        }else{
            $this->display();
        }
    }

    public function pay()
    {
        $order_no = $_GET['order_no'];
        $order = M('Order')->where(array('order_no'=>$order_no))->find();
        if($order['status']!=0){
          $this->redirect('Order/result',array('order_no'=>$order['order_no']));
        }
        // echo 1;
        $payment = isset($_GET['payment'])?$_GET['payment']:$order['payment'];
        // echo $payment;
        $this->assign('order',$order);
        switch ($payment) {
          case '2':
            $this->alipayInWx($order);
            $this->display('alipay');
            R('Api/payAlipay',array('data'=>$order));
          break;
          case '4':
            $this->alipayInWx($order);
            $this->display('result');
            D('Pay')->alipayDb($order,$this->aliziConfig);
          break;
          case '3':
            if(isWeixin()==true && in_array(2, json_decode($this->aliziConfig['wxpay_type'],true))){
              $this->redirect('Order/payWxPayJsApi',array('order_id'=>$order['id']));exit;
            }else{
              $result = R('Api/payWxpay',array('data'=>$order)); 
              if($result['return_code']=='FAIL'){
                $this->error($result['return_msg']);
              }else{
                $this->assign('result',$result);
                $this->display('payWxpay');
              }
            }
          break;
          case '5'://二维码
            $qrcode = R('Api/payQrcode',array('data'=>$order));
            $this->assign('qrcode',$qrcode);
            
            $redirectUrl = $order['url'];
              $options = json_decode($this->aliziConfig['order_options'],true); 
              
              if(in_array($order['order_page'],array('single','detail'))){
                $template = M('ItemTemplate')->where(array('id'=>$order['item_id']))->field('redirect_uri,options')->find();
                if($template){
                    $redirectUrl = $template['redirect_uri']=='1'?$order['referer']:$template['redirect_uri'];
                    $options = json_decode($template['options'],true);
                }
              }
            $this->assign('redirectUrl',$redirectUrl);
            $this->display('payQrcode');
          break;
          case '7':
            $this->yunpay($order);
          break;
          default:$this->result($order); 
        }
    }
    public function yunpay($order){

        $yun_config['partner'] = $this->aliziConfig['yunpay_pid'];//合作身份者id
        $yun_config['key'] = $this->aliziConfig['yunpay_key'];//安全检验码
        $seller_email = $this->aliziConfig['yunpay_email'];//云会员账户（邮箱）
        $GLOBALS['i2ekeys']=$yun_config['key'];
        Vendor('yunpay.lib.yun_md5#function');
        
        $out_trade_no = $order['order_no'];//商户网站订单系统中唯一订单号，必填
        $subject = $order['item_name'];//订单名称，必填
        $total_fee = $order['total_price'];//付款金额,必填 需为整数
        $body = $order['item_params'];//订单描述
        
        $nourl = $this->aliziHost.'Api/yunpay.php'; //服务器异步通知页面路径,需http://格式的完整路径,不能加参数
        $reurl = $this->aliziHost.'Api/yunpayCallbak.php';//页面跳转同步通知页面路径,需http://格式的完整路径，不能加?id=123这类自定义参数
        
        $orurl = '';
        //商品展示地址需http://格式的完整路径，不能加?id=123这类自定义参数，如原网站带有 参数请彩用伪静态或短网址解决
        $orimg = '';
        //商品形象图片地址 需http://格式的完整路径，必须为图片完整地址

        //构造要请求的参数数组，无需改动
        $parameter = array(
                "partner" => trim($yun_config['partner']),
                "seller_email"  => $seller_email,
                "out_trade_no"  => $out_trade_no,
                "subject"   => $subject,
                "total_fee" => $total_fee,
                "body"  => $body,
                "nourl" => $nourl,
                "reurl" => $reurl,
                "orurl" => $orurl,
                "orimg" => $orimg
        );
        //dump($parameter);exit;
        $html_text = i2e($parameter, "支付进行中...");
        echo $html_text;
    }
     public function payWxPayJsApi(){

        $order_id = intval($_GET['order_id']);
        $order = M('Order')->where(array('id'=>$order_id))->find();
        $redirectUrl = $this->aliziHost."index.php?m=Order&a=payWxPayJsApi&order_id={$order_id}";
        
    
        Vendor('wxPay.WxPay#JsApiPay');
        WxPayConfig::setConfig($this->aliziConfig);
        $JsApiPay = new JsApiPay();
        $openid = $JsApiPay->GetOpenid($redirectUrl);
        $total_price = $order['total_price']*100;//价格，单位为分

        $input = new WxPayUnifiedOrder();
        $input->SetOpenid($openid);
        $input->SetBody($order['item_name']);
        $input->SetOut_trade_no($order['order_no'].'-'.time());//$order['order_no']
        $input->SetTotal_fee($total_price);
        $input->SetProduct_id($order['item_id']);
        $input->SetAttach(L('aliziSystem'));
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag('Alizi'.$order['order_no']);
        $input->SetNotify_url($this->aliziHost."Api/wxPay.php");
        $input->SetTrade_type("JSAPI");

        $param = WxPayApi::unifiedOrder($input);
        
        if(empty($param)){
            $this->error('error');exit;
        }
        if($param['result_code']=='FAIL'){
            $this->error($param['err_code_des']);exit;
        }
        $wxPayRequest = $param?$JsApiPay->GetJsApiParameters($param):array();
        $this->assign('wxPayRequest',$wxPayRequest);
        $this->assign('order',$order);
        $this->assign('config',$this->aliziConfig);
        $this->display('Order:payWxPayJsApi');
        
    }

    // 返回订单结果
    public function result($order=array())
    {
        if(empty($order) && isset($_GET['order_no'])){
            $order = M('Order')->where(array('order_no'=>trim($_GET['order_no'])))->find();
        }
        
        $extends = explode(',', $order['item_extends']);
        foreach($extends as $v){
            if(!preg_match('/u65e0/', $v)){
                $a[] = $v;
                // var_dump($a);
            }
        }
        $order['item_extends'] = '{'.str_replace('}', '', str_replace('{', '', implode(',', $a))).'}';
        
        $redirectUrl = $order['url'];
        $options = json_decode($this->aliziConfig['order_options'],true);   

        if(in_array($order['order_page'],array('single','detail'))){
            $template = M('ItemTemplate')->where(array('id'=>$order['item_id']))->field('redirect_uri,options')->find();
            if($template){
                if($template['redirect_uri']=='1' && !empty($order['referer'])){
                    $redirectUrl = $order['referer'];
                }elseif($template['redirect_uri']!='1' && !empty($template['redirect_uri'])){
                    $redirectUrl = $template['redirect_uri'];
                }
                $options = json_decode($template['options'],true);
            }
        }

      foreach($options as $k=>$opt){ if(in_array($opt, array('salenum'))) unset($options[$k]); }
      $this->assign('options',$options);
      $this->assign('order',$order);
      $this->assign('redirectUrl',$redirectUrl);
      $this->display('result'); 
    }
    private function alipayInWx($data){
      if(isWeixin()==true){
            $this->assign('info',$data);
            $this->display('Order:payInWx');exit;
        }
    }
    //订单轮询
  public function orderQuery($order_no){
    $status = M('Order')->where(array('order_no'=>$order_no))->getField('status');
    $this->ajaxReturn(null,null,(int)$status);
  }

  public function wx(){
    $id = $_GET['id'];
    $uid = (int)$_GET['uid'];
    $cid = (int)$_GET['c'];
    $info  = getCache('Item',array('sn'=>$id));
    $weixin = parent::weixinShare();

    if($this->aliziConfig['URL_MODEL']==2){
        $randCode = "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM_";
        $url = array(
          'link'=>$this->aliziHost."detail/{$info['sn']}-{$uid}/".randCode(8,$randCode)."/".randCode(8,$randCode).".html",
          'order'=>$this->aliziHost."single/{$info['sn']}-{$uid}/".randCode(8,$randCode)."/".randCode(8,$randCode).".html",
        );
      }else{
        $url = array(
          'link'=>$this->aliziHost."index.php?m=Order&id={$info['sn']}&uid={$uid}&tpl=detail",
          'order'=>$this->aliziHost."index.php?m=Order&id={$info['sn']}&uid={$uid}",
        );
      }

    $this->assign('info',$info);
    $this->assign('weixin',$weixin);
    $this->assign('url',$url);
    $this->display();    
  }
  
  public function getComments(){
    if(IS_POST){
        $Model = M('Comments');
        $item_id = intval($_POST['item_id']);
        $currentPage = intval($_POST['currentPage']);
        $page = intval($_POST['page']);
        
        $where = array('item_id'=>$item_id,'status'=>1);
        $total = $Model->where($where)->count();
        $list = $Model->where($where)->limit($currentPage,$page)->select();
        
        $count = count($list);
        $data = array(
            'list'=>$list,
            'currentPage'=>$currentPage+$count,
            'leftPage'=>$total-$currentPage-$count,
        );
        $this->ajaxReturn($data,1,1);
    }
    
  }
  public function getCode(){
    $item_id = intval($_POST['item_id']);
    $mobile = trim($_POST['mobile']);
    $verify = $_POST['verify'];
    $page = $_POST['page'];
    
    if(isMobileNum($mobile)==false){  $this->ajaxReturn(0,lang('pleaseInputMobile'),0);}
    if(in_array($page,array('single','detail'))){
        $options = M('ItemTemplate')->where(array('id'=>$item_id))->getField('options');
    }else{
        $options = $this->aliziConfig['order_options'];
    }
    $optionArr = json_decode($options,true);
    
    if(in_array('verify',$optionArr)){ 
        if(empty($verify))$this->ajaxReturn(0,lang('pleaseInputCode'),0);
        if(md5($verify)!=$_SESSION['verify']){ $this->ajaxReturn(0,lang('invalid_verify'),0);}
    }
    $code = randCode(4);
    $send = array(
        'method'=>'send',
        'account'=>$this->aliziConfig['sms_account'],
        'password'=>$this->aliziConfig['sms_password'],
        'mobile'=>$mobile,
        'content'=>sprintf(L('smsCodeContent'),$code),
    );
    $rs = json_decode(http(C('ALIZI_API').'/sms/','POST',$send),true);
    if($rs['message']=='ok'){
        $data = array(
            'item_id'=>$item_id,
            'mobile'=>$mobile,
            'code'=>$code,
            'type'=>1,
            'status'=>0,
            'add_time'=>time(),
        );
        $flag = M('Code')->add($data);
        $this->ajaxReturn(1,lang('send_success'),1);
    }else{
        $this->ajaxReturn(0,lang('send_failure'),0);
    }
  }

}
