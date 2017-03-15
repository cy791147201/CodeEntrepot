<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>订单信息页</title>
    <meta http-equiv = 'Content-Type' content = 'text/html; charset = utf-8' />
    <meta name = 'keywords' content = '订单信息页面' />
    <link rel = 'stylesheet' type = 'text/css' href = '../css/index2.css'>
</head>
<body>
 
    <h2>收货信息订单页</h2>

    <div class = 'act'>

        <a href = '../view/index.html'>返回继续查询信息</a>
        
    </div>

    <{foreach $data as $v}>

        <div class = 'father'>

            <div class = 'indent'> 

                <div id = 'tits'>
                    
                    <span>订单信息</span>

                </div>

                <div>序号&nbsp;:&nbsp;&nbsp;<{$v.id}></div>
                <div>物流订单号&nbsp;:&nbsp;&nbsp;<{$v.express}></div>
                <div>面单号&nbsp;:&nbsp;&nbsp;<{$v.indent_id}></div>
                <div>收货人/买家&nbsp;:&nbsp;&nbsp;&nbsp;<{$v.buyer}></div>
                <div>商品数量&nbsp;:&nbsp;&nbsp;<{$v.num}></div>
                <div>大头笔&nbsp;:&nbsp;&nbsp;<{$v.transfer}></div>
                <div id = 'name'>商品名称&nbsp;:&nbsp;&nbsp;<{$v.goods_name}></div>

            </div>

            <div class = 'buyer'>

                <div id = 'tit'>
                    
                    <span>收货信息</span>

                </div>

                <div>收货省&nbsp;:&nbsp;&nbsp;<{$v.address_1}></div>
                <div>收货市&nbsp;:&nbsp;&nbsp;<{$v.address_2}></div>
                <div>收货区&nbsp;:&nbsp;&nbsp;<{$v.address_3}></div>
                <div>收货手机&nbsp;:&nbsp;&nbsp;<{$v.buyer_tel}></div>
                <div>收货邮编/买家邮编&nbsp;:&nbsp;&nbsp;<{$v.buyer_postcode}></div>
                <div>代收货款&nbsp;:&nbsp;&nbsp;<{$v.money}></div>
                <div id = 'address'>收货收货地址&nbsp;:&nbsp;&nbsp;<{$v.address_1}>&nbsp;&nbsp;<{$v.address_2}>&nbsp;&nbsp;<{$v.address_3}>&nbsp;&nbsp;<{$v.address_4}></div>
                
            </div>

            <div class = 'buyer'>

                <div id = 'tit'>
                    
                    <span>卖家信息</span>

                </div>

                <div>发件人&nbsp;:&nbsp;&nbsp;<{$v.addresser}></div>
                <div>发件人电话&nbsp;:&nbsp;&nbsp;<{$v.seller_tel}></div>
                <div>发件人省&nbsp;:&nbsp;&nbsp;<{$v.seller_address_1}></div>
                <div>发件人市&nbsp;:&nbsp;&nbsp;<{$v.seller_address_2}></div>
                <div>发件人区&nbsp;:&nbsp;&nbsp;<{$v.seller_address_3}></div>
                <div>发件人邮编&nbsp;:&nbsp;&nbsp;<{$v.seller_postcode}></div>
                <div id = 'address'>发件人地址&nbsp;:&nbsp;&nbsp;<{$v.seller_address_1}>&nbsp;&nbsp;<{$v.seller_address_2}>&nbsp;&nbsp;<{$v.seller_address_3}>&nbsp;&nbsp;<{$v.seller_address_4}></div>
                
            </div>

            <div id = 'remarks'>
                
                <div class = 'remark1'>

                    备注&nbsp;:&nbsp;&nbsp;<{$v.more}>
                    
                </div>

                <div class = 'remark2'>

                    <form action = '../c/updata.php' method = 'post'>

                        <input type = 'hidden' name = 'id' value = '<{$v.t_id}>'>

                        <textarea name = 'more' class = 'UpMore' onfocus="if(value=='修改备注区域'){value=''}" onblur="if (value ==''){value='修改备注区域'}">修改备注区域</textarea>
                            
                        <div>

                            <input type = 'submit' value = '更改备注' class = 'sub1' /> 

                            <input type = 'reset' value = '重置当前输入信息' class = 'sub2' /> 

                        </div>

                    </form>
                    
                </div>

            </div>

            <div class = 'end'>

                <span>
                    &nbsp;订单插入时间&nbsp;:&nbsp;<{$v.time}>&nbsp;
                </span>

                <span>
                    &nbsp;上传人员&nbsp;:&nbsp;<{$v.user}>&nbsp;
                </span>

                <span>
                    &nbsp;修改时间&nbsp;:&nbsp;<{$v.upd_time}>&nbsp;
                </span>

                <span>
                    &nbsp;修改人员&nbsp;:&nbsp;<{$v.upd_user}>&nbsp;
                </span>

            </div>
            
        </div>

    <{/foreach}>

</body>

</html>