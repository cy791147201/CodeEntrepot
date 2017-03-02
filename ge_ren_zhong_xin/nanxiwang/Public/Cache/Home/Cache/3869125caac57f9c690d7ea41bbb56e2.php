<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<!-- 电脑端 -->
<meta http-equiv = "Content-Type" content = "text/html; charset = utf-8">
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
<link href="__PUBLIC__/Alizi/pc/nanxiwang.css" rel="stylesheet">

<script src="__PUBLIC__/Alizi/djs/jquery-1.js"></script>
<script src="__PUBLIC__/Alizi/djs/time.js"></script>

<!-- 这个跟检测是否检订单提交信息，姓名，地址，收货信息之类 有关-->
<script type="text/javascript" src="__PUBLIC__/Alizi/seajs/seajs/sea.js"></script>
<!-- 这个跟检测是否检订单提交信息，姓名，地址，收货信息之类 有关-->
<script type="text/javascript">
var aliziHost = "<?php echo ($aliziHost); ?>",aliziRoot = "<?php echo C('ALIZI_ROOT');?>",aliziVersion="<?php echo (ALIZI_VERSION); ?>-<?php echo C('ALIZI_KEY');?>",lang="<?php echo C('DEFAULT_LANG');?>";
seajs.config({ base: '__PUBLIC__/Alizi/seajs/',alias: {'jquery': 'jquery/jquery','alizi': 'alizi/alizi','lang': 'alizi/lang-'+lang}, map: [['.css', '.css?v=' + aliziVersion],['.js', '.js?v=' + aliziVersion]]});
</script>
<script type="text/javascript">
// 自动获取页面宽
window.onresize = window.onload = function AutoWidth()
{
    // 修改订单区域样式的宽
    var oDiv = document.getElementsByClassName('alizi-rows')[0];
    var oDiv1 = document.getElementsByClassName('rows-head')[0];

    if(oDiv && oDiv1)
    {
        var wid = oDiv.offsetWidth - oDiv1.offsetWidth - 4 + 'px';
        var wid2 = (oDiv.offsetWidth - oDiv1.offsetWidth - 4) / 3 + 'px';
        var wid3 = (oDiv.offsetWidth - oDiv1.offsetWidth - 16) / 2 + 'px';
    }

    // 套餐选择
    var oDiv2 = document.getElementsByClassName('inputs');
    if(oDiv2)
    {
        var nLen = oDiv2.length;
        var i = 0;
        for(i = 0; i < nLen; i++)
        {
            oDiv2[i].style.width = wid;
        }
    }

    // 套餐选择
    var oDiv5 = document.getElementsByClassName('input');
    if(oDiv5)
    {
        var nLen = oDiv5.length;
        var i = 0;
        for(i = 0; i < nLen; i++)
        {
            oDiv5[i].style.width = wid;
        }
    }

    // 详细信息地址之类
    var oDiv3 = document.getElementsByClassName('alizi-input-text');
    if(oDiv3)
    {
        var nLen = oDiv3.length;
        var i = 0;
        for(i = 0; i < nLen; i++)
        {
            oDiv3[i].style.width = wid;
        }
    }

    // 地址省
    document.getElementById('province').style.width = wid2;
    // 市
    document.getElementById('city').style.width = wid2;
    // 区
    document.getElementById('area').style.width = wid2;
    // 商品图片
    var oDiv4 = document.getElementsByClassName('img');
    if(oDiv4)
    {
        var nLen = oDiv4.length;
        var i = 0;
        for(i = 0; i < nLen; i++)
        {
            oDiv4[i].style.width = wid3;
        }
    }
    // 套餐图片
    var oDiv5 = document.getElementsByClassName('combo-input');
    if(oDiv5)
    {
        var nLen = oDiv5.length;
        var i = 0;
        for(i = 0; i < nLen; i++)
        {
            oDiv5[i].style.width = wid3;
        }
    }

}

function notice()
{
    alert('请先选择商品');
}

// 商品选项换色
function ChangeGoodsColor(obj, tag) 
{
    // 隐藏当前显示的不属于上级选中的商品的选项
    var oDiv1 = document.getElementsByClassName('change1');
    if(oDiv1)
    {
        var nLen = oDiv1.length;
        var i = 0;
        for(i; i < nLen; i ++)
        {
            oDiv1[i].style.display = 'none';
        }
    }

    // 一级菜单
    if(tag === 1)
    {
        // 隐藏没有选择时候的提示信息框
        var oDiv = document.getElementsByClassName('none1');
        if(oDiv)
        {
            var nLen = oDiv.length;
            var i = 0;
            for(i; i < nLen; i ++)
            {
                oDiv[i].style.display = 'none';
            }
        }

        // 一级菜单
        // 取消当前商品属性选项选中状态
        var obj1 = document.getElementsByClassName('SetRadio');  
        if(obj1)
        {
            var i = 0;
            for(var i; i < obj1.length; i++)
            { 
                //对所有结果进行遍历，如果状态是被选中的，则将其选择取消  
                if(obj1[i].checked==true){  
                    obj1[i].checked=false;  
                }  
            } 
        } 

        // 修改商品图片区域
        var sClassName = obj.className;
        // 移除所有当前商品js赋给的样式
        if(sClassName)
        {
            var obj2 = document.getElementsByClassName(sClassName);
            if(obj2)
            {
                for(var i = 0; i < obj2.length; i++)
                {
                    obj2[i].style.background = '';
                }
            }
        }

        // 清空以选择的套餐的背景色
        var oCombo1 = document.getElementsByClassName('combo-input');
        if(oCombo1)
        {
            var nLen = oCombo1.length;
            var i = 0;
            for(i; i < nLen; i ++)
            {
                oCombo1[i].style.background = '';
            }
        }

        var oCombo2 = document.getElementsByClassName('input');
        if(oCombo2)
        {
            var nLen = oCombo2.length;
            var i = 0;
            for(i; i < nLen; i ++)
            {
                oCombo2[i].style.background = '';
            }
        }

        // 当前选中商品选项变颜色
        document.getElementById(obj.id).style.background = '#f60';
        
        var oDiv2 = document.getElementsByClassName('change2');
        if(oDiv2)
        {
            var nLen = oDiv2.length;
            var i = 0;
            for(i; i < nLen; i ++)
            {
                oDiv2[i].style.display = 'none';
            }
        }
// console.log(obj);
        //  显示当前选中的商品的属性选择或者套餐的套餐搭配
        var oProperty = document.getElementsByName(obj.getAttribute('name'));
        if(oProperty)
        {
            var nLen = oProperty.length;
            var i = 0;
            for(i; i < nLen; i ++)
            {
                oProperty[i].style.display = 'block';
            }
        }

    }
    // 二级菜单
    else if(tag === 2)
    {
        // alert(2);
        // 显示当前的属性选择
        var oDiv1 = document.getElementsByName(obj.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.getAttribute('name'));
        if(oDiv1)
        {
            var nLen = oDiv1.length;
            var i = 0;
            for(i; i < nLen; i ++)
            {
                oDiv1[i].style.display = 'block';
            }
        }

        // 简单的商品属性
        if(obj.id.indexOf('combo') < 0)
        {
            var oCombo2 = document.getElementsByClassName('input');
            if(oCombo2)
            {
                var nLen = oCombo2.length;
                var i = 0;
                for(i; i < nLen; i ++)
                {
                    oCombo2[i].style.background = '';
                }
            }

            // 修改当前选中属性的背景色
            var oComboNow = document.getElementById(obj.id).parentNode.parentNode.parentNode.parentNode;
            if(oComboNow)
            {
                oComboNow.style.background = '#f60';
            }
        }
        // 套餐属性
        else
        {
            // 判断是点击套餐搭配的话
            // 点击套餐属性选择
            if(obj.id.indexOf('property') > 0)
            {
                var obj1 = document.getElementsByName(obj.parentNode.parentNode.parentNode.parentNode.getAttribute('name'));  
                // console.log(obj1);
                if(obj1)
                {
                    var i = 0;
                    for(var i; i < obj1.length; i++)
                    { 
                        obj1[i].style.background = '';
                    } 

                    document.getElementById(obj.id).parentNode.parentNode.parentNode.parentNode.style.background = '#f60';
                } 
            }
            // 点击套餐选择
            else
            {
                // 取消当前商品属性选项选中状态
                // 获取选中的input的
                // 判断如果不是套餐搭配选择的话，清空选择，清空背景色
                var obj1 = document.getElementsByClassName('SetRadio');  
                // 清空选择
                if(obj1)
                {
                    var i = 0;
                    var nLen1 = obj1.length;
                    for(var i; i < nLen1; i ++)
                    { 
                        // 对所有结果进行遍历，
                        // 不清空当前选中项
                        // 如果状态是被选中的，则将其选择取消  
                        if(obj1[i].id !== obj.id)
                        {
                            if(obj1[i].checked == true)
                            {  
                                obj1[i].checked = false;  
                            } 
                        } 
                    } 
                }

                // // 获取套餐名称
                var oComboChildren = document.getElementsByName(obj.id.split('-')[0] + 'property' + obj.id.split('-')[1]);
                // 清空背景色
                if(oComboChildren)
                {
                    var i = 0;
                    var nLen1 = oComboChildren.length;
                    for(i; i < nLen1; i ++)
                    { 
                        // 获取当前套餐选择下的input选项
                        var oComboChildrenCheck = oComboChildren[i].getElementsByClassName('input');

                        // 循环当前套餐选择下的input
                        if(oComboChildrenCheck)
                        {
                            var j = 0;
                            var nLen2 = oComboChildrenCheck.length;
                            for(j ; j < nLen2; j ++)
                            {
                                if(oComboChildrenCheck[j].style.background)
                                {
                                    oComboChildrenCheck[j].style.background = '';
                                }
                            }
                        }
                    } 
                }

                // 清空套餐选择的背景色
                var oCombo1 = document.getElementsByClassName('combo-input');
                if(oCombo1)
                {
                    var nLen = oCombo1.length;
                    var i = 0;
                    for(i; i < nLen; i ++)
                    {
                        oCombo1[i].style.background = '';
                    }
                }

                // 点击套餐显示套餐属性
                // 当前点击的套餐改变背景色
                var oComboNow = document.getElementById(obj.id).parentNode.parentNode.parentNode.parentNode;
                if(oComboNow)
                {
                    oComboNow.style.background = '#f60';
                }

                // 获取套餐名称
                var oComboProperty = document.getElementsByName(obj.id.split('-')[0] + 'property' + obj.id.split('-')[1]);
                if(oComboProperty)
                {
                    var nLen = oComboProperty.length;
                    var i = 0;
                    for(i; i < nLen; i ++)
                    {
                        oComboProperty[i].style.display = 'block';
                    }
                }

                // 忘了是那个的，暂时不要删除
                // var oDiv1 = document.getElementsByName(obj.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.getAttribute('name'));
                // console.log(oDiv1);
                // if(oDiv1)
                // {
                //     var nLen = oDiv1.length;
                //     var i = 0;
                //     for(i; i < nLen; i ++)
                //     {
                //         oDiv1[i].style.display = 'block';
                //     }
                // }
            }
        }
    }
}

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

        <a href = "#buy">立即购买</a> 
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
        <!-- 订单 -->
        <?php echo ($combo); ?>
        <?php echo ($type); ?>
        <?php echo ($extends); ?>
        <?php echo ($content); ?>
        <div class="container" <?php echo ($style); ?> >
            <div class="mainwidth">
                <div class="alizi-detail-wrap clearfix">
                    <div class="alizi-detail-content">
                        <?php if(strstr($info['content'],'{[AliziOrder]}')){ $info['content'] = explode('{[AliziOrder]}',$info['content']); foreach($info['content'] as $key=>$content){ echo $content; if($key==0){ W('Order',array_merge($_GET,array('page'=>'index'))); } } }else{ echo $info['content']; } ?>
                    </div>
                </div>
            </div>
        </div>

    <?php echo ($info["ft_img"]); ?>
    <?php echo ($f_n); ?>
    <?php echo ($info["comp"]); ?>
    <?php echo ($f_n); ?>
</div>

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

</script>
</body>
</html>