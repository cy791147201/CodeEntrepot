<?php

// echo '订单';

$url = isset($_GET['url'])?$_GET['url']:"http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

// echo $url;

$show_notice = $template['show_notice']<2?'alizi-full-row':'';

// echo $show_notice;

$user_id = isset($cookie['uid'])?$cookie['uid']:$_SESSION['user']['id'];

// echo $user_id;

$userInfo = M('User')->where(array('id'=>$user_id))->field('pid,role')->find();

// var_dump($userInfo);

$user_pid = $userInfo['role']=='member'?$userInfo['pid']:$user_id;

// echo $user_pid;
// var_dump($product);
echo "<div class='alizi-order alizi-theme-".($template['template']?$template['template']:'thin')." alizi-lang-".C('DEFAULT_LANG')." alizi-border clearfix' id='aliziOrder'>",
    "<div class='alizi-main alizi-border {$show_notice}'>",
        "<div class='alizi-title alizi-border ellipsis'><i class='icon-cart'></i>{$info['name']}</div>";
        
        // echo 11111111;

        // 订单form信息
        echo "<div class='alizi-content alizi-border'>",
            "<form action='".C('ALIZI_ROOT')."index.php?m=Order&a=aliziBooking' method='post' id='aliziForm'>",
                "<input type='hidden' name='user_id' value='{$user_id}'>",
                "<input type='hidden' name='user_pid' value='{$user_pid}'>",
                "<input type='hidden' name='sn' value='{$info['sn']}'>",
                "<input type='hidden' name='item_id' value='{$info['id']}'>",
                "<input type='hidden' name='item_name' value='{$info['name']}'>",
                // 商品价格
                // "<input type='hidden' name='item_price' id='item_price' value='".($product?$product[0]['price']:$info['price'])."'>",
                "<input type='hidden' name='item_price' id='item_price' value=''>",
                "<input type='hidden' name='url' value='{$url}'>",
                "<input type='hidden' name='redirect' value='".($template['redirect_uri']?$template['redirect_uri']:$url)."'>",
                "<input type='hidden' name='referer' value='{$_SERVER['HTTP_REFERER']}'>",
                "<input type='hidden' name='order_page' value='{$request['page']}'>",
                "<input type='hidden' name='channel_id' value='{$cookie['ac']}'>",
                "<input type='hidden' name='qrcode_pay' value='{$info['qrcode_pay']}'>",
                "<input type='hidden' name='math' value='{$paymentDefault['math']}'>",
                "<input type='hidden' name='page' value='{$page}'>";

                // echo 222;

                echo "<div class='alizi-box' id='alizi-box-1'>";    
                if(!empty($template['info']) && $request['page'] == 'single'){
                    echo "<div class='alizi-brief clearfix'>{$template['info']}</div>";
                }

                // echo 3333;

                if(!empty($product)){
                    echo "<div class='alizi-rows clearfix rows-id-params rows-id-params-{$info['params_type']}'>",
                    "<label class='rows-head'>".lang('itemPackage_request')."</label>",
                    "<div class='rows-params'>";
                        switch ($info['params_type']) {
                            case 'select':
                                echo "<select class='alizi-params-change' name='item_params' alizi-fx='alizi.quantity' alizi-fx-params='0' id = 'key' onchange = 'select();'>";
                                echo "<option value='无'>未选择，请选择</option>";  
                                    foreach($product as $vo){
                                        $tit = explode('#', $vo['title']);
                                        $t0 = $tit[0];
                                        $t1 = $tit[1];
                                        echo "<option value='{$vo['title']}' value-price='{$vo['price']}'>$t1</option>";              
                                    }

                                echo "</select>";
                            break;
                            default:
                                $i=0;
                                foreach($product as $k=>$vo){
                                    $i++;
                                    $tit = explode('#', $vo['title']);
                                    $t0 = $tit[0];
                                    $t1 = $tit[1];
                                    echo "<label alizi-value='{$vo['price']}' alizi-target='#item_price' alizi-fx='alizi.quantity' alizi-fx-params='0' class='".($vo['image']?' alizi-params-image':'')." ellipsis alizi-params ".($i==1?' active ':'')."' title='$t0'>";
                                    if($vo['image']){
                                        echo "<div id = '$k' class = 'img' onclick='huanse(this);'>";
                                        echo "<p class='item-image'><img src='".imageUrl($vo['image'])."' /></p>";
                                        echo "<input type='radio' style = 'display:none;' onclick='change();' id = '$t0' name='item_params'  value='{$vo['title']}' ".($i==1?'checked':'')." ><span>$t1</span></label>";
                                        echo '</div>';
                                    }else{
                                    // echo "<input type='radio' onclick='change();' id = 'key' name='item_params'  value='$t0' ".($i==1?'checked':'')." >$t1</label>";
                                   
                                        // echo "<input type='radio' onclick='change();' id = '$t0' name='item_params'  value='{$vo['title']}' ".($i==1?'checked':'')." >$t1</label>";
                                        
                                        // echo "<input type = 'radio' style = 'displ'>";

                                        echo "<input type='radio'  onclick='change();' id = '$t0' name='item_params'  value='{$vo['title']}' ".($i==1?'checked':'')." >$t1</label>";
                                    }

                                    // js获取价用
                                    $id = 'price'.$t0;
                                    $price = $vo['price'];
                                    echo "<span id = '$id' style = 'display:none;'>$price</span>";
                                    // echo "<strong id = 'shishi'></strong>";
                                    // var_dump($vo);
                                }
                            break;
                        }
                    echo "</div></div>";
                }   

                // echo '<br/>';
                // echo '套餐结束';

                

                // echo '<br/>';
                // echo '这是款式';
                

                if(!empty($extends)){
                    foreach($extends as $k=>$vo){
                        $tit = explode('#',$vo['title']);
                        $t0 = $tit[0];
                        $t1 = $tit[1];
                            // echo "<div class='change' name = '$t0'><label class='rows-head'>$t1".lang('request')."</label><div class='rows-params'>";
                            // echo "<div name = 'hide'>";
                            echo "<div class='change' name = '$t0'><label class='rows-head'>$t1".lang('request')."</label><div class='rows-params'>";
                            switch ($vo['type']) {
                                case 'text':
                                    echo "<input type='text' name='extends[{$vo['title']}]' placeholder='{$vo['value']}' autocomplete='off' class='alizi-input-text'>";
                                break;
                                case 'select':
                                    echo "<select name='extends[{$vo['title']}]'>";
                                    echo "<option value='无' selected = 'selected'>未选择，请选择</option>";
                                        foreach(explode('#',$vo['value']) as $li){
                                            if(empty($li)){
                                                echo "<option value=''>".lang('pleaseSelect')."</option>";
                                            }else{
                                                echo "<option value='{$li}' class = 'sel'>{$li}</option>";
                                            }
                                        }
                                    echo "</select>";
                                break;
                                default:
                                
                                    echo"<input name='extends[{$vo['title']}]' type = 'radio' value = '无' checked='' style = 'display:none;' />";
                                    $i=0;
                                    echo '<div id = "RadioFather">';
                                    foreach(explode('#',$vo['value']) as $key=>$li){
                                        $i++;
                                        // echo $t1;
                                        $a = "{$vo['title']}$key";
                                        // $b = "input1";
                                        echo "<div class = 'input'>";
                                        // echo  "<div name = 'noback' class = '$t1' id = '{$vo['title']}$key' onclick = 'huanse1(this);'>";
                                        echo  "<div name = 'noback' class = '$t1' id = '{$vo['title']}$key'>";
                                            $hidden = empty($li)?'style="display:none;"':'';
                                            echo "<label class='alizi-group alizi-params alizi-{$vo['type']} ".($i==1?'active':'')."' {$hidden}><span class='alizi-group-box'>",
                                            "<input  alizi-value='{$li}' id='{$vo['title']}xuanze$key' name='extends[{$vo['title']}]".($vo['type']=='checkbox'?'[]':'')."' type='{$vo['type']}' value='{$li}' class = 'SetRadio' onclick = 'huanse1(this);'>",
                                            "<label class='selected-icon' for='$t0{$key}'></label>{$li}</span></label>";
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                    echo '</div>';
                                break;
                            }
                        
                        echo "</div></div>";    
                    }       
                        $num1 = count($product);
                        $num2 = count($extends);

                        $name = array();
                        for($i = 0; $i < $num2; $i+=$num1){
                            $arr = explode('#', $extends[$i]['title']);
                            $name[$i] = $arr[1];    
                        }

                        $type = $extends[0]['type'];
                        if($type == 'select'){
                            // echo "<div style = 'width:100%; background:red; clear:both;'>";
                            for($i = 0; $i < $num2; $i += $num1){
                                echo "<div class = 'none1'><label class = 'rows-head' >".$name[$i].lang('request')."</label><div class = 'rows-params'>";
                                    echo "<select onclick = 'notice();'>";
                                    echo "<option value='无' ><span>未选择套餐，请先选择套餐</span></option>";
                                // echo "<div style = 'width: 100%; height: 10px; background: red;'></div>";    
                                    echo "</select>";
                                echo "</div></div>";        
                            }
                            
                            // echo "</div>";
                        }else if($type == 'radio'){
                            for($i = 0; $i < $num2; $i += $num1){
                                echo "<div class = 'none1'><label class = 'rows-head' >".$name[$i].lang('request')."</label><div class = 'rows-params'>";
                                echo "<div class = 'inputs'>";
                                    echo "<input type = 'radio' onclick = 'notice();'>";  
                                    echo '<span>请先选择套餐</span>';
                                echo "</div></div></div>";        
                            }
                        }      

                    // foreach($extends as $v){
                    //     dump($v['type']);
                    // }
                }

                // echo '<br/>';
                // echo '款式结束';

                if($params['quantity']['checked']==false){
                    echo "</div><!--.alizi-box--><div class='alizi-box' id='alizi-box-2'>";
                }

                // echo 111;

                foreach($params as $key=>$vo){
                    if(empty($vo['checked'])){ continue;}
                    echo "<div class='alizi-rows clearfix rows-id-{$key}'><label class='rows-head'>{$vo['name']}<span class='alizi-request ".($vo['request']?'':'alizi-request-none')."'>*</span></label><div class='rows-params'>";
                    switch ($key) {
                        case 'price':
                            // 显示价格
                            echo "<span class='alizi-shipping' ".($info['shipping_id']?'':"style='display:none;'").">",
                                // 订单价格 __  __ 订单总价
                                "<strong class='alizi-order-price'>0.00</strong>+<strong class='alizi-shipping-price'>0.00</strong>(".lang('shippingPrice').")=</span><strong class='alizi-total-price'>".($product?$product[0]['price']:$info['price'])."</strong>".lang('yuan').$vo['info'];
                            // echo "<span class = 'xianshijiage' style = 'color:red;'>0.00</span>&nbsp;元";

                            echo "</div></div>";    
                            echo "</div><!--.alizi-box--><div class='alizi-box' id='alizi-box-2'><div><div>";
                        break;
                        case 'payment':
                            echo "<div class='alizi-payment clearfix'>";
                                $i=0;
                                $firstPayment =1;
                                foreach($payment as $key=>$vo){
                                    $i++;
                                    if($i==1) $firstPayment=$key;
                                    if($key == 5 && empty($info['qrcode_pay'])){ continue;}
                                    echo "<label alizi-value='{$key}' alizi-target=':payment' alizi-fx='alizi.payment' alizi-fx-params='{$key}' class='ellipsis alizi-params alizi-payment-{$key} ".($i==1?'active':'')."'><input type='radio' name='payment' value='{$key}' ".($i==1?'checked':'').">{$vo['name']}</label>";
                                }
                            echo "</div><div id='alizi-payment-info' class='alizi-alert clearfix' ".($payment[$firstPayment]['info']?'':"style='display:none;'")."><div class='payment-info'>{$payment[$firstPayment]['info']}</div></div>";
                        break;
                        case 'mobile':
                            echo "<input type='tel' name='{$key}' placeholder='{$vo['info']}' autocomplete='off' class='alizi-input-text' alizi-request='{$vo['request']}' value='{$cookie[$key]}'>";
                        break;
                        case 'salenum':
                            echo "<span>{$info['salenum']}</span>";
                        break;
                        case 'quantity':
                            echo "<div class='alizi-quantity-group'>",
                                "<a class='quantity-dec' href='javascript:;' onclick='alizi.quantity(-1)'>-</a>",
                                "<input type='tel' class='alizi-quantity' size='4' value='1' name='quantity' onkeyup='alizi.quantity(0)'>",
                                "<a class='quantity-inc' href='javascript:;' onclick='alizi.quantity(1)'>+</a></div>";
                        break;
                        case 'datetime':
                            $date = date('Y-m-d',strtotime("+0 day"));
                            echo "<input type='text' name='{$key}' placeholder='{$vo['info']}' autocomplete='off' class='alizi-input-text Wdate' alizi-request='{$vo['request']}' style='width:50%;' onfocus=\"WdatePicker({minDate:'$date'})\" value='{$cookie[$key]}'>
                                <script type='text/javascript' src='__PUBLIC__/Assets/js/My97DatePicker/WdatePicker.js'></script>";
                        break;
                        case 'region':
                            if(C('DEFAULT_LANG')=='jp'){
                                $regions = explode(',',L('regions'));
                                $region = '';
                                foreach($regions as $reg){ $region .= "<option value='{$reg}'>{$reg}</option>";}
                                echo "<select name='region[province]' id='province' class='alizi-region alizi-region-province' style='width:100% !important;'>{$region}</select>";
                            }else{

                                // echo '这是地区联动';

                                echo "<select name='region[province]' id='province' class='alizi-region alizi-region-province' alizi-request='{$vo['request']}'></select>
                                    <select name='region[city]' id='city' class='alizi-region alizi-region-city' alizi-request='{$vo['request']}'></select>
                                    <select name='region[area]' id='area' class='alizi-region alizi-region-area' alizi-request='{$vo['request']}'></select>
                                    <script type='text/javascript'>var lang='".C('DEFAULT_LANG')."';seajs.use(['alizi/region-'+lang],function(region){ new PCAS('region[province]','region[city]','region[area]','{$cookie['region'][0]}','{$cookie['region'][1]}','{$cookie['region'][2]}');});</script>";
                            }
                        break;
                        case 'remark':
                            echo "<textarea name='{$key}' placeholder='{$vo['info']}' class='alizi-input-text' alizi-request='{$vo['request']}' rows='2'></textarea>";
                        break;
                        case 'verify':
                            $verify='http://'.$_SERVER['HTTP_HOST'].C('ALIZI_ROOT').'index.php?m=Alizi&a=verify';
                            if(!empty($request['verify'])) $verify .= '&'.http_build_query($request['verify']);
                            echo "<input type='tel' name='{$key}' placeholder='{$vo['info']}' class='alizi-input-text' autocomplete='off' alizi-request='{$vo['request']}' style='width:30%;'>
                                <img class='verify' src='{$verify}' onclick=\"$(this).attr('src','{$verify}&t='+new Date().getTime())\" />
                                <a href='javascript:;' class='bright' onclick=\"$('.verify').attr('src','{$verify}&t='+new Date().getTime())\" />".lang('changeVerifyCode')."</a>";
                        break;
                        case 'code':
                            echo "<input type='tel' name='{$key}' placeholder='{$vo['info']}' class='alizi-input-text' autocomplete='off' alizi-request='{$vo['request']}' style='width:40%;float:left;'>
                                <button type='button' id='alizi-code' class='alizi-btn-min alizi-btn alizi-btn-ok' onclick=\"alizi.getCode()\" style='width:55%;font-weight:normal;float:right;padding:0.6rem 0;font-size:14px;' />".lang('getMobileCode')."<i></i></button>";
                        break;
                        default:
                            echo "<input type='text' name='{$key}' placeholder='{$vo['info']}' autocomplete='off' alizi-request='{$vo['request']}' class='alizi-input-text' value='{$cookie[$key]}'>";
                        break;
                    }
                    echo "</div></div>";            
                }
                /*
                if($extends){
                    foreach ($extends as $k => $vo) {
                        if($vo['type']!=='text'){continue;}
                        echo "<div class='alizi-rows clearfix rows-id-extends'>",
                        "<label class='rows-head'>{$vo['title']}".lang('request')."</label>",
                        "<div class='rows-params'>";
                            if($vo['type']=='text'){
                                echo "<input type='text' name='extends[{$vo['title']}]' placeholder='{$vo['value']}' autocomplete='off' class='alizi-input-text'>";
                            }else{
                                foreach (explode('#',$vo['value']) as $key=>$li) {
                                    echo "<span class='alizi-group'>",
                                        "<span class='alizi-group-box alizi-{$vo['type']}'>",
                                            "<input alizi-value='{$li}' id='{$vo['title']}{$key}' name='extends[{$vo['title']}]<eq name='vo.type' value='checkbox'>[]</eq>' type='{$vo['type']}' value='{$li}' ".($vo['type']=='checkbox'?'[]':'').">",
                                            "<label for='{$vo['title']}{$key}'></label>",
                                        "</span>{$li}</span>";
                                }
                            }
                        echo "</div></div>";
                    }
                }
                */
                echo "</div><!--.alizi-box-->";
                echo "<div class='alizi-rows alizi-id-btn clearfix'><input type='submit' id='alizi-sumit' class='alizi-btn alizi-submit' value='".lang('confirm_submit')."' /></div>",
                "</form>",  
        "</div></div>";

        if($template['show_notice']){
            echo "<div class='alizi-side alizi-border {$show_notice}'>",
                "<div class='alizi-title alizi-border ellipsis'><i class='icon-shipping'></i>".lang('orderNotification')."</div>",
                "<div class='alizi-delivery'>",
                    "<div class='alizi-scroll {$show_notice}'><ul>";
                        if($aliziConfig['real_notice']==1){
                            $orders = M('Order')->field('item_name,item_params,name,mobile,region,add_time')->where(array('item_id'=>$info['id']))->order('id asc')->limit(25)->select();
                            $i=0;
                            foreach($orders as $li){
                                $region = explode(' ',$li['region']);
                                $item_params = empty($li['item_params'])?'':' - '.$li['item_params'];
                                $i++;
                                echo "<li ".($i%2 == 0?"class='even'":'').">",
                                    "<p><span class='alizi-badge'>{$region[0]}</span>".mb_substr($li['name'],0,1,'utf-8')."*[".substr($li['mobile'],0,3)."****".substr($li['mobile'],-4)."]</p>",
                                    "<p><span class='alizi-date'>".date('m-d',$li['add_time'])."</span>{$li['item_name']}{$item_params}</p></li>";
                            }
                        }else{
                            $item = json_decode($info['params'],true);
                            $province = explode(',',L('scrollProvince'));
                            $name = explode(',',L('scrollName'));
                            $mobile = explode(',',L('scrollMobile'));
                            $time=  explode(',',L('scrollTime'));
                            for($i=0;$i<50;$i++){
                                $num = rand(0,3);
                                $pro = empty($item)?'':' - '.$item[array_rand($item,1)]['title'];
                                $pp = $province[array_rand($province,1)];
                                $nn = $name[array_rand($name,1)];
                                $mm = $mobile[array_rand($mobile,1)].'****'.randCode(4);
                                $rand = array_rand($time);
                                echo "<li ".($i%2 == 0?"class='even'":'').">",
                                    "<p><span class='alizi-badge'>{$pp}</span>{$nn}*[{$mm}]</p>",
                                    "<p><span class='alizi-date'>{$time[$rand]}</span>{$info['name']}{$pro}</p></li>";
                            }   
                        }
                echo "</ul></div></div>",
            "</div>",
            "<script type='text/javascript'>",
            "seajs.use(['jquery','alizi','alizi/scroll'], function(jQuery,alizi,scroll) {",
                "alizi.resize('{$template['show_notice']}');",
                "jQuery(window).resize(function(){ alizi.resize('{$template['show_notice']}');});",
                "var scrollHeight = jQuery('.alizi-scroll li').innerHeight();",
                "jQuery('.alizi-scroll').aliziScroll({speed:40,rowHeight:scrollHeight});",
            "});</script>";
        }
echo "</div>";

echo "<script type='text/javascript'>seajs.config({vars: {'payment':".json_encode($payment).",'shipping':".json_encode($shipping)."}});</script>";
