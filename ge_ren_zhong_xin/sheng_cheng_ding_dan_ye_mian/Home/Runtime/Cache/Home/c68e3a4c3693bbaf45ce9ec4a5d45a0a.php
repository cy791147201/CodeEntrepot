<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>生成订单系统__首页</title>
<link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/sheng_cheng_ding_dan_ye_mian/Public/Css/body.css'>
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
        <img src = '/ge_ren_zhong_xin/sheng_cheng_ding_dan_ye_mian/Public/Images/beijing.jpg' />
    </div>  

                <div class = 'foot'>
                <span>版权所有</span>
            </div>
        </div>
    </center>
</body>
</html>