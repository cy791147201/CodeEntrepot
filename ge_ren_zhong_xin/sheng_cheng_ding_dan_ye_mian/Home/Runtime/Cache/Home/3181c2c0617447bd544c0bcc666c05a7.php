<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>上传订单页面</title>
<link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/sheng_cheng_ding_dan_ye_mian/Public/Css/body1.css'>
<script type = 'text/javascript' src = '/ge_ren_zhong_xin/sheng_cheng_ding_dan_ye_mian/Public/Js/check.js'></script>
</head>
    <link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/sheng_cheng_ding_dan_ye_mian/Public/Css/reset.css'>
<link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/sheng_cheng_ding_dan_ye_mian/Public/Css/header.css'>
<link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/sheng_cheng_ding_dan_ye_mian/Public/Css/foot.css'>

<script type = 'text/javascript' src = '/ge_ren_zhong_xin/sheng_cheng_ding_dan_ye_mian/Public/Js/check.js'></script>
    <center>
        <div class = 'father'>
            <div class = 'header'>
                <ul class = 'tou'>
                    <li>
                        <a href = '/ge_ren_zhong_xin/sheng_cheng_ding_dan_ye_mian/index.php/Home/Handle/UpBody'>
                            <span>上传订单页面</span>
                        </a>
                    </li>
                    <li>
                        <a href = '/ge_ren_zhong_xin/sheng_cheng_ding_dan_ye_mian/index.php/Home/Handle/CreateIndentBody'>
                            <span>订单列表</span>
                        </a>
                    </li>
                    <li>
                        <a href = '/ge_ren_zhong_xin/sheng_cheng_ding_dan_ye_mian/index.php/Home/IndentStatistics/index'>
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
                        <a href = '/ge_ren_zhong_xin/sheng_cheng_ding_dan_ye_mian/index.php/Home/Index/LogOut'>
                            <span>退出</span>
                        </a>
                    </li>
                </ul>
            </div>

    <div class = 'body'>
        <form action = '/ge_ren_zhong_xin/sheng_cheng_ding_dan_ye_mian/index.php/Home/Handle/DoUp' method = 'post' enctype = 'multipart/form-data' class = 'form' id = 'form' onsubmit = 'return CheckForm(this)'>
            <input type = 'text' name = 'name' placeholder = '请输入商品名称,仅限中文' style = 'text-indent: 10px;' />
            <div>
                <a href = 'javascript:;' class = 'file'>
                    <span>选择文件</span>
                    <input type = 'file' name = 'file' id = 'file' />
                </a>
                <span id = 'FileName'>文件名</span>
            </div>
            <input type = 'submit' value = '上传' />
        </form>
    </div>

                <div class = 'foot'>
                <span>版权所有</span>
            </div>
        </div>
    </center>
</body>
</html>