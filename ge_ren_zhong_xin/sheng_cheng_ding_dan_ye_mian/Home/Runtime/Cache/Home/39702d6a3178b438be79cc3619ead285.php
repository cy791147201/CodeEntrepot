<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>生成订单系统__订单地址统计</title>
<link rel = 'stylesheet' type = 'text/css' href = '/sheng_cheng_ding_dan_ye_mian/Public/Css/body4.css'>
<script type = 'text/javascript' src = '/sheng_cheng_ding_dan_ye_mian/Public/Js/check.js'></script>

<script type = 'text/javascript'>
    function ShowForm()
    {
        var OForm = document.getElementById('form0');

        OForm.style.display = 'block';
    }
    function UpdHideInput(obj)
    {
        var ODivs = document.getElementsByClassName(obj.className);
        var len = ODivs.length;

        var i = 0;
        for(i = 0; i < len; i++)
        {
            ODivs[i].index = i;
            ODivs[i].style.background = '#FF90EA';
        }

        var ODiv = document.getElementById(obj.id);
        var OType = document.getElementById('type');
        var OSpan1 = document.getElementById('span1');
        var OSpan2 = document.getElementById('span2');

        ODiv.style.background = '#168C65';
        if(obj.id === 'radio1')
        {
            OSpan1.innerHTML = '正在上传地址信息Excel';
            OSpan2.innerHTML = '点击添加订单excel';
            OType.value = 'address';
        }
        else if(obj.id === 'radio2')
        {
            OSpan1.innerHTML = '点击添加地址excel';
            OSpan2.innerHTML = '正在上传订单信息Excel';
            OType.value = 'indent';
        }
        var OHInput = document.getElementById('type');

    }
</script>

</head>
    <link rel = 'stylesheet' type = 'text/css' href = '/sheng_cheng_ding_dan_ye_mian/Public/Css/reset.css'>
<link rel = 'stylesheet' type = 'text/css' href = '/sheng_cheng_ding_dan_ye_mian/Public/Css/header.css'>
<link rel = 'stylesheet' type = 'text/css' href = '/sheng_cheng_ding_dan_ye_mian/Public/Css/foot.css'>

<script type = 'text/javascript' src = '/sheng_cheng_ding_dan_ye_mian/Public/Js/check.js'></script>
    <center>
        <div class = 'father'>
            <div class = 'header'>
                <ul class = 'tou'>
                    <li>
                        <a href = '/sheng_cheng_ding_dan_ye_mian/index.php/Home/Handle/UpBody'>
                            <span>上传订单页面</span>
                        </a>
                    </li>
                    <li>
                        <a href = '/sheng_cheng_ding_dan_ye_mian/index.php/Home/Handle/CreateIndentBody'>
                            <span>订单列表</span>
                        </a>
                    </li>
                    <li>
                        <a href = '/sheng_cheng_ding_dan_ye_mian/index.php/Home/IndentStatistics/index'>
                            <span>订单地址统计</span>
                        </a>
                    </li>
                    <li class = ''>功能</li>
                    <li class = ''>功能</li>
                    <li class = ''>功能</li>
                    <li class = ''>功能</li>
                    <li class = ''>功能</li>
                    <li class = 'user'>
                        <span>上次登录</span>
                        <br/>
                        <span><?php echo (date( 'm-d H:i:s',$time)); ?></span>
                    </li>
                    <li>
                        <a href = '/sheng_cheng_ding_dan_ye_mian/index.php/Home/Index/LogOut'>
                            <span>退出</span>
                        </a>
                    </li>
                </ul>
            </div>

    <div class = 'body2'>
        <div id = 'form3'>
            <div class = 'xuanxiang'>
                <p onclick = 'ShowForm();'>
                    <span>添加地址信息</span>
                </p>
                <p>
                    <a href = '/sheng_cheng_ding_dan_ye_mian/index.php/Home/IndentStatistics/ShowAddress'>
                        <span>地址信息列表</span>
                    </a>
                </p>
                <p>
                    <a href = '/sheng_cheng_ding_dan_ye_mian/index.php/Home/IndentStatistics/ShowStatistics?act=default'>
                        <span>订单统计</span>
                    </a>
                </p>
            </div>
            <form action = '/sheng_cheng_ding_dan_ye_mian/index.php/Home/IndentStatistics/AddAddress' method = 'post' enctype = 'multipart/form-data' id = 'form0' onsubmit = 'return CheckForm(this)'>
                <div class = 'hang'>
                    <div id = 'radio1' class = 'radios' onclick = 'UpdHideInput(this)'>
                        <span id = 'span1'>点击添加地址excel</span>
                    </div>
                    <div id = 'radio2' class = 'radios' onclick = 'UpdHideInput(this)'>
                        <span id = 'span2'>点击添加订单excel</span>
                    </div>
                </div>
                <div class = 'hang'>
                    <a href = 'javascript:;' class = 'file'>
                        <span>选择文件</span>
                        <input type = 'file' name = 'file' id = 'file' />
                    </a>
                    <span id = 'FileName'>文件名</span>
                </div>
                <div class = 'hang'>
                    <input type = 'hidden' name = 'type' value = 'kong' id = 'type' />
                    <input type = 'submit' value = '确认上传' />
                </div>
            </form> 
        </div>
    </div>  

                <div class = 'foot'>
                <span>版权所有</span>
            </div>
        </div>
    </center>
</body>
</html>