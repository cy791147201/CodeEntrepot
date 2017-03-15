<?php
/* Smarty version 3.1.29, created on 2016-09-13 13:42:40
  from "H:\Apache24\htdocs\JoinExcelMysql1\templates\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57d791d02b8285_32646566',
  'file_dependency' => 
  array (
    'da00675b37603056bee0b0ee6198176ca855f518' => 
    array (
      0 => 'H:\\Apache24\\htdocs\\JoinExcelMysql1\\templates\\index.tpl',
      1 => 1472885741,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 0,
),true)) {
function content_57d791d02b8285_32646566 ($_smarty_tpl) {
?>
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

                    备注&nbsp;:&nbsp;&nbsp;
                    
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

                <span>
                    &nbsp;订单插入时间&nbsp;:&nbsp;16-09-04 10:17:33&nbsp;
                </span>

                <span>
                    &nbsp;上传人员&nbsp;:&nbsp;shenshuang&nbsp;
                </span>

                <span>
                    &nbsp;修改时间&nbsp;:&nbsp;&nbsp;
                </span>

                <span>
                    &nbsp;修改人员&nbsp;:&nbsp;&nbsp;
                </span>

            </div>
            
        </div>

    
        <div class = 'father'>

            <div class = 'indent'> 

                <div id = 'tits'>
                    
                    <span>订单信息</span>

                </div>

                <div>序号&nbsp;:&nbsp;&nbsp;1</div>
                <div>物流订单号&nbsp;:&nbsp;&nbsp;2016082700001</div>
                <div>面单号&nbsp;:&nbsp;&nbsp;DD0778884366</div>
                <div>收货人/买家&nbsp;:&nbsp;&nbsp;&nbsp;杨芳</div>
                <div>商品数量&nbsp;:&nbsp;&nbsp;1</div>
                <div>大头笔&nbsp;:&nbsp;&nbsp;702-060-006</div>
                <div id = 'name'>商品名称&nbsp;:&nbsp;&nbsp;经典皮西装 买一送二！颜色尺码可留言备注！399元、套餐三：买一送二【A款黑色B款蓝色腰带】、190/XXXL码 (建议176-200斤选)</div>

            </div>

            <div class = 'buyer'>

                <div id = 'tit'>
                    
                    <span>收货信息</span>

                </div>

                <div>收货省&nbsp;:&nbsp;&nbsp;河南省</div>
                <div>收货市&nbsp;:&nbsp;&nbsp;郑州市</div>
                <div>收货区&nbsp;:&nbsp;&nbsp;中牟县</div>
                <div>收货手机&nbsp;:&nbsp;&nbsp;15093380579</div>
                <div>收货邮编/买家邮编&nbsp;:&nbsp;&nbsp;</div>
                <div>代收货款&nbsp;:&nbsp;&nbsp;399</div>
                <div id = 'address'>收货收货地址&nbsp;:&nbsp;&nbsp;河南省&nbsp;&nbsp;郑州市&nbsp;&nbsp;中牟县&nbsp;&nbsp;郑庵镇商业街</div>
                
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

                    备注&nbsp;:&nbsp;&nbsp;
                    
                </div>

                <div class = 'remark2'>

                    <form action = '../c/updata.php' method = 'post'>

                        <input type = 'hidden' name = 'id' value = '961'>

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
                    &nbsp;订单插入时间&nbsp;:&nbsp;16-09-04 10:21:53&nbsp;
                </span>

                <span>
                    &nbsp;上传人员&nbsp;:&nbsp;shenshuang&nbsp;
                </span>

                <span>
                    &nbsp;修改时间&nbsp;:&nbsp;&nbsp;
                </span>

                <span>
                    &nbsp;修改人员&nbsp;:&nbsp;&nbsp;
                </span>

            </div>
            
        </div>

    
        <div class = 'father'>

            <div class = 'indent'> 

                <div id = 'tits'>
                    
                    <span>订单信息</span>

                </div>

                <div>序号&nbsp;:&nbsp;&nbsp;1</div>
                <div>物流订单号&nbsp;:&nbsp;&nbsp;2016082800001</div>
                <div>面单号&nbsp;:&nbsp;&nbsp;DD0767807350</div>
                <div>收货人/买家&nbsp;:&nbsp;&nbsp;&nbsp;欧盛文</div>
                <div>商品数量&nbsp;:&nbsp;&nbsp;1</div>
                <div>大头笔&nbsp;:&nbsp;&nbsp;800-090-000</div>
                <div id = 'name'>商品名称&nbsp;:&nbsp;&nbsp;经典皮西装 买一送二！颜色尺码可留言备注！399元、套餐四：买一送二【A款黑色B款棕色腰带】、175/L码 (建议122-140斤选)</div>

            </div>

            <div class = 'buyer'>

                <div id = 'tit'>
                    
                    <span>收货信息</span>

                </div>

                <div>收货省&nbsp;:&nbsp;&nbsp;重庆市</div>
                <div>收货市&nbsp;:&nbsp;&nbsp;</div>
                <div>收货区&nbsp;:&nbsp;&nbsp;九龙坡区</div>
                <div>收货手机&nbsp;:&nbsp;&nbsp;15023029968</div>
                <div>收货邮编/买家邮编&nbsp;:&nbsp;&nbsp;</div>
                <div>代收货款&nbsp;:&nbsp;&nbsp;399</div>
                <div id = 'address'>收货收货地址&nbsp;:&nbsp;&nbsp;重庆市&nbsp;&nbsp;&nbsp;&nbsp;九龙坡区&nbsp;&nbsp;市辖区，锦红3路，和泓四季C区</div>
                
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
                <div id = 'address'>发件人地址&nbsp;:&nbsp;&nbsp;北京市&nbsp;&nbsp;&nbsp;&nbsp;大兴区&nbsp;&nbsp;北京青云店镇</div>
                
            </div>

            <div id = 'remarks'>
                
                <div class = 'remark1'>

                    备注&nbsp;:&nbsp;&nbsp;
                    
                </div>

                <div class = 'remark2'>

                    <form action = '../c/updata.php' method = 'post'>

                        <input type = 'hidden' name = 'id' value = '2158'>

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
                    &nbsp;订单插入时间&nbsp;:&nbsp;16-09-04 10:23:31&nbsp;
                </span>

                <span>
                    &nbsp;上传人员&nbsp;:&nbsp;shenshuang&nbsp;
                </span>

                <span>
                    &nbsp;修改时间&nbsp;:&nbsp;&nbsp;
                </span>

                <span>
                    &nbsp;修改人员&nbsp;:&nbsp;&nbsp;
                </span>

            </div>
            
        </div>

    
        <div class = 'father'>

            <div class = 'indent'> 

                <div id = 'tits'>
                    
                    <span>订单信息</span>

                </div>

                <div>序号&nbsp;:&nbsp;&nbsp;1</div>
                <div>物流订单号&nbsp;:&nbsp;&nbsp;2016082800262</div>
                <div>面单号&nbsp;:&nbsp;&nbsp;DD0767815424</div>
                <div>收货人/买家&nbsp;:&nbsp;&nbsp;&nbsp;曾祥洪</div>
                <div>商品数量&nbsp;:&nbsp;&nbsp;1</div>
                <div>大头笔&nbsp;:&nbsp;&nbsp;800-221-033</div>
                <div id = 'name'>商品名称&nbsp;:&nbsp;&nbsp;经典皮西装 买一送二！颜色尺码可留言备注！399元、套餐一：买一送二【A款蓝色A款黑色腰带】、170/M码 (建议100120斤选)</div>

            </div>

            <div class = 'buyer'>

                <div id = 'tit'>
                    
                    <span>收货信息</span>

                </div>

                <div>收货省&nbsp;:&nbsp;&nbsp;重庆市</div>
                <div>收货市&nbsp;:&nbsp;&nbsp;</div>
                <div>收货区&nbsp;:&nbsp;&nbsp;璧山</div>
                <div>收货手机&nbsp;:&nbsp;&nbsp;18580141434</div>
                <div>收货邮编/买家邮编&nbsp;:&nbsp;&nbsp;</div>
                <div>代收货款&nbsp;:&nbsp;&nbsp;399</div>
                <div id = 'address'>收货收货地址&nbsp;:&nbsp;&nbsp;重庆市&nbsp;&nbsp;&nbsp;&nbsp;璧山&nbsp;&nbsp;区壁山县电话联系</div>
                
            </div>

            <div class = 'buyer'>

                <div id = 'tit'>
                    
                    <span>卖家信息</span>

                </div>

                <div>发件人&nbsp;:&nbsp;&nbsp;郑先生</div>
                <div>发件人电话&nbsp;:&nbsp;&nbsp;18500650283</div>
                <div>发件人省&nbsp;:&nbsp;&nbsp;北京市</div>
                <div>发件人市&nbsp;:&nbsp;&nbsp;</div>
                <div>发件人区&nbsp;:&nbsp;&nbsp;大兴区</div>
                <div>发件人邮编&nbsp;:&nbsp;&nbsp;100076</div>
                <div id = 'address'>发件人地址&nbsp;:&nbsp;&nbsp;北京市&nbsp;&nbsp;&nbsp;&nbsp;大兴区&nbsp;&nbsp;北京瀛海镇</div>
                
            </div>

            <div id = 'remarks'>
                
                <div class = 'remark1'>

                    备注&nbsp;:&nbsp;&nbsp;
                    
                </div>

                <div class = 'remark2'>

                    <form action = '../c/updata.php' method = 'post'>

                        <input type = 'hidden' name = 'id' value = '2797'>

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
                    &nbsp;订单插入时间&nbsp;:&nbsp;16-09-04 10:24:22&nbsp;
                </span>

                <span>
                    &nbsp;上传人员&nbsp;:&nbsp;shenshuang&nbsp;
                </span>

                <span>
                    &nbsp;修改时间&nbsp;:&nbsp;&nbsp;
                </span>

                <span>
                    &nbsp;修改人员&nbsp;:&nbsp;&nbsp;
                </span>

            </div>
            
        </div>

    
        <div class = 'father'>

            <div class = 'indent'> 

                <div id = 'tits'>
                    
                    <span>订单信息</span>

                </div>

                <div>序号&nbsp;:&nbsp;&nbsp;1</div>
                <div>物流订单号&nbsp;:&nbsp;&nbsp;2016082900584</div>
                <div>面单号&nbsp;:&nbsp;&nbsp;DD0767821558</div>
                <div>收货人/买家&nbsp;:&nbsp;&nbsp;&nbsp;黄锐林</div>
                <div>商品数量&nbsp;:&nbsp;&nbsp;1</div>
                <div>大头笔&nbsp;:&nbsp;&nbsp;872-280-005</div>
                <div id = 'name'>商品名称&nbsp;:&nbsp;&nbsp;经典皮西装 买一送二！颜色尺码可留言备注！399元、套餐三：买一送二【A款黑色B款蓝色腰带】、170/M码 (建议100-120斤选)</div>

            </div>

            <div class = 'buyer'>

                <div id = 'tit'>
                    
                    <span>收货信息</span>

                </div>

                <div>收货省&nbsp;:&nbsp;&nbsp;云南省</div>
                <div>收货市&nbsp;:&nbsp;&nbsp;楚雄彝族自治州</div>
                <div>收货区&nbsp;:&nbsp;&nbsp;楚雄市</div>
                <div>收货手机&nbsp;:&nbsp;&nbsp;13170525287</div>
                <div>收货邮编/买家邮编&nbsp;:&nbsp;&nbsp;</div>
                <div>代收货款&nbsp;:&nbsp;&nbsp;399</div>
                <div id = 'address'>收货收货地址&nbsp;:&nbsp;&nbsp;云南省&nbsp;&nbsp;楚雄彝族自治州&nbsp;&nbsp;楚雄市&nbsp;&nbsp;楚雄</div>
                
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
                <div id = 'address'>发件人地址&nbsp;:&nbsp;&nbsp;北京市&nbsp;&nbsp;&nbsp;&nbsp;大兴区&nbsp;&nbsp;北京青云镇</div>
                
            </div>

            <div id = 'remarks'>
                
                <div class = 'remark1'>

                    备注&nbsp;:&nbsp;&nbsp;
                    
                </div>

                <div class = 'remark2'>

                    <form action = '../c/updata.php' method = 'post'>

                        <input type = 'hidden' name = 'id' value = '3382'>

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
                    &nbsp;订单插入时间&nbsp;:&nbsp;16-09-04 10:24:47&nbsp;
                </span>

                <span>
                    &nbsp;上传人员&nbsp;:&nbsp;shenshuang&nbsp;
                </span>

                <span>
                    &nbsp;修改时间&nbsp;:&nbsp;&nbsp;
                </span>

                <span>
                    &nbsp;修改人员&nbsp;:&nbsp;&nbsp;
                </span>

            </div>
            
        </div>

    
        <div class = 'father'>

            <div class = 'indent'> 

                <div id = 'tits'>
                    
                    <span>订单信息</span>

                </div>

                <div>序号&nbsp;:&nbsp;&nbsp;1</div>
                <div>物流订单号&nbsp;:&nbsp;&nbsp;2016083000607</div>
                <div>面单号&nbsp;:&nbsp;&nbsp;DD0767818216</div>
                <div>收货人/买家&nbsp;:&nbsp;&nbsp;&nbsp;秦贤船</div>
                <div>商品数量&nbsp;:&nbsp;&nbsp;1</div>
                <div>大头笔&nbsp;:&nbsp;&nbsp;393-602-007</div>
                <div id = 'name'>商品名称&nbsp;:&nbsp;&nbsp;175码套餐5黄棕色加黑色</div>

            </div>

            <div class = 'buyer'>

                <div id = 'tit'>
                    
                    <span>收货信息</span>

                </div>

                <div>收货省&nbsp;:&nbsp;&nbsp;浙江省</div>
                <div>收货市&nbsp;:&nbsp;&nbsp;温州市</div>
                <div>收货区&nbsp;:&nbsp;&nbsp;乐清市</div>
                <div>收货手机&nbsp;:&nbsp;&nbsp;13567775876</div>
                <div>收货邮编/买家邮编&nbsp;:&nbsp;&nbsp;</div>
                <div>代收货款&nbsp;:&nbsp;&nbsp;399</div>
                <div id = 'address'>收货收货地址&nbsp;:&nbsp;&nbsp;浙江省&nbsp;&nbsp;温州市&nbsp;&nbsp;乐清市&nbsp;&nbsp;大溪镇下埠寨</div>
                
            </div>

            <div class = 'buyer'>

                <div id = 'tit'>
                    
                    <span>卖家信息</span>

                </div>

                <div>发件人&nbsp;:&nbsp;&nbsp;郑先生</div>
                <div>发件人电话&nbsp;:&nbsp;&nbsp;18500650283</div>
                <div>发件人省&nbsp;:&nbsp;&nbsp;北京市</div>
                <div>发件人市&nbsp;:&nbsp;&nbsp;</div>
                <div>发件人区&nbsp;:&nbsp;&nbsp;大兴区</div>
                <div>发件人邮编&nbsp;:&nbsp;&nbsp;100076</div>
                <div id = 'address'>发件人地址&nbsp;:&nbsp;&nbsp;北京市&nbsp;&nbsp;&nbsp;&nbsp;大兴区&nbsp;&nbsp;北京青云镇</div>
                
            </div>

            <div id = 'remarks'>
                
                <div class = 'remark1'>

                    备注&nbsp;:&nbsp;&nbsp;
                    
                </div>

                <div class = 'remark2'>

                    <form action = '../c/updata.php' method = 'post'>

                        <input type = 'hidden' name = 'id' value = '4133'>

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
                    &nbsp;订单插入时间&nbsp;:&nbsp;16-09-04 10:25:07&nbsp;
                </span>

                <span>
                    &nbsp;上传人员&nbsp;:&nbsp;shenshuang&nbsp;
                </span>

                <span>
                    &nbsp;修改时间&nbsp;:&nbsp;&nbsp;
                </span>

                <span>
                    &nbsp;修改人员&nbsp;:&nbsp;&nbsp;
                </span>

            </div>
            
        </div>

    
        <div class = 'father'>

            <div class = 'indent'> 

                <div id = 'tits'>
                    
                    <span>订单信息</span>

                </div>

                <div>序号&nbsp;:&nbsp;&nbsp;1</div>
                <div>物流订单号&nbsp;:&nbsp;&nbsp;2016083100492</div>
                <div>面单号&nbsp;:&nbsp;&nbsp;DD0861937584</div>
                <div>收货人/买家&nbsp;:&nbsp;&nbsp;&nbsp;杨勇</div>
                <div>商品数量&nbsp;:&nbsp;&nbsp;1</div>
                <div>大头笔&nbsp;:&nbsp;&nbsp;800-024-206</div>
                <div id = 'name'>商品名称&nbsp;:&nbsp;&nbsp;1501黑色298元、185/XXL码</div>

            </div>

            <div class = 'buyer'>

                <div id = 'tit'>
                    
                    <span>收货信息</span>

                </div>

                <div>收货省&nbsp;:&nbsp;&nbsp;重庆市</div>
                <div>收货市&nbsp;:&nbsp;&nbsp;</div>
                <div>收货区&nbsp;:&nbsp;&nbsp;江北区</div>
                <div>收货手机&nbsp;:&nbsp;&nbsp;18883144083</div>
                <div>收货邮编/买家邮编&nbsp;:&nbsp;&nbsp;</div>
                <div>代收货款&nbsp;:&nbsp;&nbsp;298</div>
                <div id = 'address'>收货收货地址&nbsp;:&nbsp;&nbsp;重庆市&nbsp;&nbsp;&nbsp;&nbsp;江北区&nbsp;&nbsp;观音桥万海花园海韵名低B栋17一3号</div>
                
            </div>

            <div class = 'buyer'>

                <div id = 'tit'>
                    
                    <span>卖家信息</span>

                </div>

                <div>发件人&nbsp;:&nbsp;&nbsp;郑先生</div>
                <div>发件人电话&nbsp;:&nbsp;&nbsp;18500650283</div>
                <div>发件人省&nbsp;:&nbsp;&nbsp;北京市</div>
                <div>发件人市&nbsp;:&nbsp;&nbsp;</div>
                <div>发件人区&nbsp;:&nbsp;&nbsp;大兴区</div>
                <div>发件人邮编&nbsp;:&nbsp;&nbsp;100076</div>
                <div id = 'address'>发件人地址&nbsp;:&nbsp;&nbsp;北京市&nbsp;&nbsp;&nbsp;&nbsp;大兴区&nbsp;&nbsp;北京青云镇</div>
                
            </div>

            <div id = 'remarks'>
                
                <div class = 'remark1'>

                    备注&nbsp;:&nbsp;&nbsp;
                    
                </div>

                <div class = 'remark2'>

                    <form action = '../c/updata.php' method = 'post'>

                        <input type = 'hidden' name = 'id' value = '5001'>

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
                    &nbsp;订单插入时间&nbsp;:&nbsp;16-09-04 10:25:29&nbsp;
                </span>

                <span>
                    &nbsp;上传人员&nbsp;:&nbsp;shenshuang&nbsp;
                </span>

                <span>
                    &nbsp;修改时间&nbsp;:&nbsp;&nbsp;
                </span>

                <span>
                    &nbsp;修改人员&nbsp;:&nbsp;&nbsp;
                </span>

            </div>
            
        </div>

    
        <div class = 'father'>

            <div class = 'indent'> 

                <div id = 'tits'>
                    
                    <span>订单信息</span>

                </div>

                <div>序号&nbsp;:&nbsp;&nbsp;1</div>
                <div>物流订单号&nbsp;:&nbsp;&nbsp;2016090200001</div>
                <div>面单号&nbsp;:&nbsp;&nbsp;DD0861932113</div>
                <div>收货人/买家&nbsp;:&nbsp;&nbsp;&nbsp;张坤</div>
                <div>商品数量&nbsp;:&nbsp;&nbsp;1</div>
                <div>大头笔&nbsp;:&nbsp;&nbsp;104-910-000</div>
                <div id = 'name'>商品名称&nbsp;:&nbsp;&nbsp;1501红棕298元、175/L码 (建议122-140斤选)</div>

            </div>

            <div class = 'buyer'>

                <div id = 'tit'>
                    
                    <span>收货信息</span>

                </div>

                <div>收货省&nbsp;:&nbsp;&nbsp;内蒙古自治区</div>
                <div>收货市&nbsp;:&nbsp;&nbsp;通辽市</div>
                <div>收货区&nbsp;:&nbsp;&nbsp;科尔沁区</div>
                <div>收货手机&nbsp;:&nbsp;&nbsp;13739946965</div>
                <div>收货邮编/买家邮编&nbsp;:&nbsp;&nbsp;</div>
                <div>代收货款&nbsp;:&nbsp;&nbsp;298</div>
                <div id = 'address'>收货收货地址&nbsp;:&nbsp;&nbsp;内蒙古自治区&nbsp;&nbsp;通辽市&nbsp;&nbsp;科尔沁区&nbsp;&nbsp;明仁街道圈楼东门南侧兴源信用社卡</div>
                
            </div>

            <div class = 'buyer'>

                <div id = 'tit'>
                    
                    <span>卖家信息</span>

                </div>

                <div>发件人&nbsp;:&nbsp;&nbsp;郑先生</div>
                <div>发件人电话&nbsp;:&nbsp;&nbsp;18500650283</div>
                <div>发件人省&nbsp;:&nbsp;&nbsp;北京市</div>
                <div>发件人市&nbsp;:&nbsp;&nbsp;</div>
                <div>发件人区&nbsp;:&nbsp;&nbsp;大兴区</div>
                <div>发件人邮编&nbsp;:&nbsp;&nbsp;100076</div>
                <div id = 'address'>发件人地址&nbsp;:&nbsp;&nbsp;北京市&nbsp;&nbsp;&nbsp;&nbsp;大兴区&nbsp;&nbsp;北京青云镇</div>
                
            </div>

            <div id = 'remarks'>
                
                <div class = 'remark1'>

                    备注&nbsp;:&nbsp;&nbsp;
                    
                </div>

                <div class = 'remark2'>

                    <form action = '../c/updata.php' method = 'post'>

                        <input type = 'hidden' name = 'id' value = '6274'>

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
                    &nbsp;订单插入时间&nbsp;:&nbsp;16-09-04 10:25:48&nbsp;
                </span>

                <span>
                    &nbsp;上传人员&nbsp;:&nbsp;shenshuang&nbsp;
                </span>

                <span>
                    &nbsp;修改时间&nbsp;:&nbsp;&nbsp;
                </span>

                <span>
                    &nbsp;修改人员&nbsp;:&nbsp;&nbsp;
                </span>

            </div>
            
        </div>

    
        <div class = 'father'>

            <div class = 'indent'> 

                <div id = 'tits'>
                    
                    <span>订单信息</span>

                </div>

                <div>序号&nbsp;:&nbsp;&nbsp;1</div>
                <div>物流订单号&nbsp;:&nbsp;&nbsp;2016090300001</div>
                <div>面单号&nbsp;:&nbsp;&nbsp;DD0861964441</div>
                <div>收货人/买家&nbsp;:&nbsp;&nbsp;&nbsp;张智</div>
                <div>商品数量&nbsp;:&nbsp;&nbsp;1</div>
                <div>大头笔&nbsp;:&nbsp;&nbsp;211-341-201</div>
                <div id = 'name'>商品名称&nbsp;:&nbsp;&nbsp;经典皮西装 买一送二！颜色尺码可留言备注！399元、套餐二：买一送二【A款蓝色B款棕色腰带】、185/XXL码 (建议156-175斤选)</div>

            </div>

            <div class = 'buyer'>

                <div id = 'tit'>
                    
                    <span>收货信息</span>

                </div>

                <div>收货省&nbsp;:&nbsp;&nbsp;辽宁省</div>
                <div>收货市&nbsp;:&nbsp;&nbsp;大连市</div>
                <div>收货区&nbsp;:&nbsp;&nbsp;旅顺口区</div>
                <div>收货手机&nbsp;:&nbsp;&nbsp;13478727645</div>
                <div>收货邮编/买家邮编&nbsp;:&nbsp;&nbsp;</div>
                <div>代收货款&nbsp;:&nbsp;&nbsp;399</div>
                <div id = 'address'>收货收货地址&nbsp;:&nbsp;&nbsp;辽宁省&nbsp;&nbsp;大连市&nbsp;&nbsp;旅顺口区&nbsp;&nbsp;红光街1号</div>
                
            </div>

            <div class = 'buyer'>

                <div id = 'tit'>
                    
                    <span>卖家信息</span>

                </div>

                <div>发件人&nbsp;:&nbsp;&nbsp;郑先生</div>
                <div>发件人电话&nbsp;:&nbsp;&nbsp;18500650283</div>
                <div>发件人省&nbsp;:&nbsp;&nbsp;北京市</div>
                <div>发件人市&nbsp;:&nbsp;&nbsp;</div>
                <div>发件人区&nbsp;:&nbsp;&nbsp;大兴区</div>
                <div>发件人邮编&nbsp;:&nbsp;&nbsp;100076</div>
                <div id = 'address'>发件人地址&nbsp;:&nbsp;&nbsp;北京市&nbsp;&nbsp;&nbsp;&nbsp;大兴区&nbsp;&nbsp;北京青云镇</div>
                
            </div>

            <div id = 'remarks'>
                
                <div class = 'remark1'>

                    备注&nbsp;:&nbsp;&nbsp;
                    
                </div>

                <div class = 'remark2'>

                    <form action = '../c/updata.php' method = 'post'>

                        <input type = 'hidden' name = 'id' value = '7370'>

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
                    &nbsp;订单插入时间&nbsp;:&nbsp;16-09-04 10:26:12&nbsp;
                </span>

                <span>
                    &nbsp;上传人员&nbsp;:&nbsp;shenshuang&nbsp;
                </span>

                <span>
                    &nbsp;修改时间&nbsp;:&nbsp;&nbsp;
                </span>

                <span>
                    &nbsp;修改人员&nbsp;:&nbsp;&nbsp;
                </span>

            </div>
            
        </div>

    
</body>

</html><?php }
}
