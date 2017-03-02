<?php
class OrderWidget extends Widget 
{
    public function render($request)
    {
        // 订单
        // echo '<br/>';
        // echo 1;
        // echo '<br/>';
        // var_dump($request);exit();
        // var_dump(explode('_', trim($request['id'])));exit();
        $arr = explode('_', trim($request['id']));

        $sn = empty($arr[1])?$arr[0]:$arr[1];
        // var_dump($sn);exit();
        $page = trim($request['page']);

        // echo '<br/>';
        // var_dump($sn);
        // echo '<br/>';
        // var_dump($page);
        // echo '<br/>';

        $Alizi = new AliziAction();
        $aliziConfig = $Alizi->aliziConfig();

        // echo '<br/>';
        // var_dump($aliziConfig);

        $info = getCache('Item',array('sn'=>$sn));

        // echo '<br/>';
        // echo '<br/>';
        // var_dump($info);

        $shipping = empty($info['shipping_id'])?array('id'=>0):getCache('Shipping',array('id'=>$info['shipping_id']));

        // echo '<br/>';
        // echo '<br/>';
        // var_dump($shipping);
        // echo '<br/>';
        // echo '<br/>';


        $cookie = array();
        if($aliziConfig['record_order']==1){ $cookie = cookie('order');$cookie['region'] = explode(' ', $cookie['region']);}
        $cookie['ac']=cookie('ac');
        $cookie['uid']=cookie('uid');

        // echo '<br/>';
        // echo '<br/>';
        // var_dump($cookie);
        // echo '<br/>';
        // echo '<br/>';

        if(in_array($page,array('index','item'))){
            $template['options'] = $aliziConfig['order_options'];
            $template['template'] = $aliziConfig['system_template'];
            $template['show_notice'] = $aliziConfig['show_notice'];
        }else{
            $template = getCache('ItemTemplate',array('id'=>$info['id']),true);
            if(empty($template))$template['options'] = $aliziConfig['order_options'];
            $template['extend'] = json_decode($template['extend'],true);
        }

        // echo '<br/>';
        // echo '<br/>';
        // var_dump($template);
        // echo '<br/>';
        // echo '<br/>';

        if(!empty($request['template'])) $template = array_merge($template,$request['template']);

        // echo '<br/>';
        // echo '<br/>';
        // var_dump($template);
        // echo '<br/>';
        // echo '<br/>';

        $list = array(
            'params'=>$Alizi->getItemParams($template['options'],$request['options']),
            'product'=>json_decode($info['params'],true),
            'extends'=>json_decode($info['extends'],true),
            'payment'=>$Alizi->getAliziPayment($sn),
            'aliziConfig'=>$aliziConfig,
            'cookie'=>$cookie,
            'color'=>json_decode($template['color'],true),
        );

        // echo '<br/>';
        // echo '<br/>';
        // var_dump($list);
        // echo '<br/>';
        // echo '<br/>';

        foreach($list['payment'] as $payment){ $list['paymentDefault'] = $payment;break; }

        // echo '<br/>';
        // echo '<br/>';
        // var_dump($list);
        // echo '<br/>';
        // echo '<br/>';

        extract($list);

        // echo '<br/>';
        // echo '<br/>';
        // var_dump(extract($list));
        // echo '<br/>';
        // echo '<br/>';
        
        include('Tpl/Order.php');
        //return $this->renderFile ("index", $list);
    }
}
?>