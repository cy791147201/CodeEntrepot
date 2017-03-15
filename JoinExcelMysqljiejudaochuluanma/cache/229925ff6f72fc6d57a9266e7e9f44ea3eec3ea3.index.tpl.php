<?php
/* Smarty version 3.1.29, created on 2016-09-03 06:04:41
  from "H:\Apache24\htdocs\JoinExcelMysql\templates\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ca67f9375a89_15057149',
  'file_dependency' => 
  array (
    '229925ff6f72fc6d57a9266e7e9f44ea3eec3ea3' => 
    array (
      0 => 'H:\\Apache24\\htdocs\\JoinExcelMysql\\templates\\index.tpl',
      1 => 1472882665,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 0,
),true)) {
function content_57ca67f9375a89_15057149 ($_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns = 'http://www.w3.org/1999/xhtml'> 
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

    
        <div class = 'father'>

            <div class = 'indent'> 

                <div id = 'tits'>
                    
                    <span>订单信息</span>

                </div>

                <div>序号&nbsp;:&nbsp;&nbsp;1</div>
                <div>物流订单号&nbsp;:&nbsp;&nbsp;2016082600001</div>
                <div>面单号&nbsp;:&nbsp;&nbsp;DD0767587892</div>
                <div>收货人/买家&nbsp;:&nbsp;&nbsp;&nbsp;袁华春</div>
                <div>商品数量&nbsp;:&nbsp;&nbsp;1</div>
                <div>大头笔&nbsp;:&nbsp;&nbsp;830-120-001</div>
                <div id = 'name'>商品名称&nbsp;:&nbsp;&nbsp;经典皮西装 买一送二！颜色尺码可留言备注！399元、套餐一：买一送二【A款蓝色A款黑色腰带】、190/XXXL码 (建议156-175斤选)</div>

            </div>

            <div class = 'buyer'>

                <div id = 'tit'>
                    
                    <span>收货信息</span>

                </div>

                <div>收货省&nbsp;:&nbsp;&nbsp;四川省</div>
                <div>收货市&nbsp;:&nbsp;&nbsp;成都市</div>
                <div>收货区&nbsp;:&nbsp;&nbsp;都江堰市</div>
                <div>收货手机&nbsp;:&nbsp;&nbsp;18980064619</div>
                <div>收货邮编/买家邮编&nbsp;:&nbsp;&nbsp;</div>
                <div>代收货款&nbsp;:&nbsp;&nbsp;399</div>
                <div id = 'address'>收货收货地址&nbsp;:&nbsp;&nbsp;四川省&nbsp;&nbsp;成都市&nbsp;&nbsp;都江堰市&nbsp;&nbsp;翔丰路668号</div>
                
            </div>

            <div class = 'buyer'>

                <div id = 'tit'>
                    
                    <span>卖家信息</span>

                </div>

                <div>发件人&nbsp;:&nbsp;&nbsp;楠溪王</div>
                <div>发件人电话&nbsp;:&nbsp;&nbsp;18500650283</div>
                <div>发件人省&nbsp;:&nbsp;&nbsp;北京市</div>
                <div>发件人市&nbsp;:&nbsp;&nbsp;</div>
                <div>发件人区&nbsp;:&nbsp;&nbsp;大兴区</div>
                <div>发件人邮编&nbsp;:&nbsp;&nbsp;100076</div>
                <div id = 'address'>发件人地址&nbsp;:&nbsp;&nbsp;北京市&nbsp;&nbsp;&nbsp;&nbsp;大兴区&nbsp;&nbsp;北京瀛海镇</div>
                
            </div>

            <div id = 'remarks'>
                
                <div class = 'remark1'>

                    备注&nbsp;:&nbsp;&nbsp;fffffffffffffffffffff
                    
                </div>

                <div class = 'remark2'>

                    <form action = '../c/updata.php' method = 'post'>

                        <input type = 'hidden' name = 'id' value = '1'>

                        <textarea name = 'more' class = 'UpMore' onfocus="if(value=='修改备注区域'){value=''}" onblur="if (value ==''){value='修改备注区域'}">修改备注区域</textarea>
                            
                        <div>

                            <input type = 'submit' value = '更改备注' class = 'sub1' /> 

                            <input type = 'reset' value = '重置当前输入信息' class = 'sub2' /> 

                        </div>

                    </form>
                    
                </div>

            </div>

            <div class = 'end'>

              <!--   <span>
                    请仔细阅读信息，避免不必要的错误订单信息插入&nbsp;&nbsp;
                </span> -->

                <span>
                    &nbsp;订单插入时间&nbsp;:&nbsp;16-09-03 01:56:27&nbsp;
                </span>

                <span>
                    &nbsp;上传人员&nbsp;:&nbsp;NewTest2寿山石&nbsp;
                </span>

                <span>
                    &nbsp;修改时间&nbsp;:&nbsp;16-09-03 02:01:13&nbsp;
                </span>

                <span>
                    &nbsp;修改人员&nbsp;:&nbsp;shenshuang死死死死死死&nbsp;
                </span>

            </div>
            
        </div>

    
</body>

</html><?php }
}
