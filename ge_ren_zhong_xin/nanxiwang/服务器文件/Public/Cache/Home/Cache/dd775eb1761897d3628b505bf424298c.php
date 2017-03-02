<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>

<meta http-equiv = "Content-Type" content = "text/html; charset = utf-8">
<!-- <meta name="viewport" content="width=device-width,target-densitydpi=high-dpi, user-scalable=no"/> -->
<meta content = "width = device-width,initial-scale = 1.0,maximum-scale = 1.0, user-scalable = 0" name = "viewport"> 
<meta content = "yes" name = "apple-mobile-web-app-capable"> 
<meta content = "yes" name = "apple-touch-fullscreen">
<meta content = "black" name = "apple-mobile-web-app-status-bar-style">
<meta content = "320" name = "MobileOptimized">
<meta content = "telephone = no" name = "format-detection">

<?php echo ($info["web_t"]); ?>
<?php echo ($info["cont1"]); ?>
<?php echo ($info["cont2"]); ?>
<?php echo ($info["cont3"]); ?>
 
<link rel="shortcut icon" href="__PUBLIC__/Assets/img/alizi.ico" />
<link href="__PUBLIC__/Alizi/pc/nanxiwang1.css" rel="stylesheet">

<script src="__PUBLIC__/Alizi/djs/jquery-1.js"></script>
<script src="__PUBLIC__/Alizi/djs/time.js"></script>
<script type="text/javascript" src="__PUBLIC__/Alizi/seajs/seajs/sea.js"></script>

<script type="text/javascript">
var aliziHost = "<?php echo ($aliziHost); ?>",aliziRoot = "<?php echo C('ALIZI_ROOT');?>",aliziVersion="<?php echo (ALIZI_VERSION); ?>-<?php echo C('ALIZI_KEY');?>",lang="<?php echo C('DEFAULT_LANG');?>";
seajs.config({ base: '__PUBLIC__/Alizi/seajs/',alias: {'jquery': 'jquery/jquery','alizi': 'alizi/alizi','lang': 'alizi/lang-'+lang}, map: [['.css', '.css?v=' + aliziVersion],['.js', '.js?v=' + aliziVersion]]});
</script>

</head>
<body <?php echo ($wid); ?>>
<div class = 'father'>
    <?php echo ($info["tit"]); ?>

    <?php echo ($info["tit_img"]); ?>

    <section class = "buy">
        <div class = "row1"> 
            <?php echo ($info["price"]); ?>

            <?php echo ($info["original_price"]); ?>

        </div>
        <?php echo ($info["dao_time"]); ?>
        
        <a href = "#buy">购买</a> 
    </section>

    <div class = "btn">
        <article class = "showcontent">
            <?php echo ($info["qiang"]); ?>

            <?php echo ($info["q_info"]); ?>

            <?php echo ($info["buy"]); ?>

            <?php echo ($info["b_info"]); ?>

            <?php echo ($info["chan"]); ?>

            <?php echo ($info["c_info"]); ?>

            <?php echo ($info["ser"]); ?>

            <?php echo ($info["s_info"]); ?>

        </article>  
    </div>
    <?php echo ($info["in_t"]); ?>

    <?php echo ($info["in_in"]); ?>
    
    <div class="container" <?php echo ($style); ?> >
        <div class="mainwidth">
            <div class="alizi-detail-wrap clearfix">
                <div class="alizi-detail-content">
                    <!-- 订单 -->
                    <?php if(strstr($info['content'],'{[AliziOrder]}')){ $info['content'] = explode('{[AliziOrder]}',$info['content']); foreach($info['content'] as $key=>$content){ echo $content; if($key==0){ W('Order',array_merge($_GET,array('page'=>'index'))); } } }else{ echo $info['content']; } ?>
                </div>
            </div>
        </div>
    </div>
    <?php echo ($info["ft_img"]); ?>

    <?php echo ($f_n); ?>

    <?php echo ($info["comp"]); ?>

    <?php echo ($f_n); ?>

<?php echo ($foot); ?>

<script type="text/javascript">
seajs.use(['alizi','jquery/form','lang'],function(alizi){
    window.alizi = alizi;
    alizi.quantity(0);
    var btnSubmit = $('.alizi-submit');
    $('#aliziForm').ajaxForm({
        timeout: 50000,
        dataType: 'json',
        error:function(){ layer.closeAll(); alert(lang.ajaxError); btnSubmit.attr('disabled',false).val(lang.submit); },
        beforeSubmit:function(){
            if(checkForm('#aliziForm')==false) return false;
            layer.closeAll();layer.load();
            btnSubmit.attr('disabled',true).val(lang.loading);
        },
        success:function(data){
            layer.closeAll();layer.closeAll();
            if(data.status=='1'){
                var redirect = "<?php echo U('Order/pay',array('order_no'=>'__orderNo__'));?>";
                top.window.location.href = redirect.replace('__orderNo__',data.data.order_no);
            }else{
                btnSubmit.attr('disabled',false).val(lang.submit);
                layer.msg(data.info);
            }
        }
    });
});

function select()
{
    // alert(1);
    var tags = document.getElementsByClassName('change');
    for (var i = 0; i < tags.length; i++) {
        tags[i].removeAttribute('style');
    }

    var div1 = document.getElementsByClassName('none1');
    for(var i = 0, l = div1.length; i < l; i++){
        var obj = div1[i];
        obj.style.display = 'none';
    }  

    var e = document.getElementById('key');
    var id = getSelectValues(e);
    if(id == '未选择，请选择'){
        for(var i = 0, l = div1.length; i < l; i++){
            var obj = div1[i];
            obj.style.display = 'block';
        }  
    }
    var arr = id[0].split('#');

    var div = document.getElementsByName(arr[0]);
    for(var i = 0, l = div.length; i < l; i++){
        var obj = div[i];
        obj.style.display = 'block';
    }  

    var x = document.getElementsByClassName('sel');  //获取所有name=brand的元素  
    for(var i = 0; i < x.length; i++){ //对所有结果进行遍历，如果状态是被选中的，则将其选择取消  
        if (x[i].selected==true)  
        {  
            x[i].selected=false;  
        }  
    }  
}



function getSelectValues(select) 
{
    var result = [];
    var options = select && select.options;
    var opt;

    for (var i=0, iLen=options.length; i<iLen; i++){
        opt = options[i];

        if (opt.selected){
          result.push(opt.value || opt.text);
        }
    }
    return result;
}


function change()
{   
    // alert(1);
    var temp = document.getElementsByName('item_params');
        for(var i=0;i<temp.length;i++){
            if(temp[i].checked)
                var id = temp[i].id;
        }
    // console.log(id);

    // 改变所有样式
    var tags = document.getElementsByClassName('change');
    for (var i = 0; i < tags.length; i++){
        tags[i].removeAttribute('style');
    }

    var div1 = document.getElementsByClassName('none1');
    for(var i = 0, l = div1.length; i < l; i++){
        var obj = div1[i];
        obj.style.display = 'none';
    }  

    var e = document.getElementsByName(id);
    for (var i = 0; i < e.length; i++){
        var obj = e[i];
        obj.style.display = 'block';
    }
}

function notice()
{
    alert('请先选择套餐');
}

function huanse(div) 
{
    var id = div.id;
    var className = div.className;

    var x=document.getElementsByClassName("SetRadio");  //获取所有name=brand的元素  
    for(var i=0;i<x.length;i++){ //对所有结果进行遍历，如果状态是被选中的，则将其选择取消  
        if(x[i].checked==true){  
            x[i].checked=false;  
        }  
    }  
    
    var tags = document.getElementsByClassName(className);
    for(var i = 0; i < tags.length; i++){
        tags[i].removeAttribute('style');
    }

    var a = document.getElementById(id);
    a.style.background = '#f60';
}

function huanse1(div)
{
    // 移除所有样式
    var id = div.id;

    className = div.className;

    var tags = document.getElementsByClassName(className);
    // console.log(tags);
    for (var i = 0; i < tags.length; i++) {
        tags[i].removeAttribute('style');
    }

    var a = document.getElementById(id);
    // console.log(a);
    // var b = a.id;
    a.style.background = '#f60';

}


</script>
</body>
</html>