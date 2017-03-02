<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>生成订单系统__订单地址统计</title>
<link rel = 'stylesheet' type = 'text/css' href = '/sheng_cheng_ding_dan_ye_mian/Public/Css/body7.css'>
<script type = 'text/javascript' src = '/sheng_cheng_ding_dan_ye_mian/Public/Js/check.js'></script>
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
        <div class = 'tit'>
            <ul>
                <li class = 'li1'>
                    <span><?php echo ($area); ?>地区</span>
                </li>
                <li class = 'li2'>
                    <span><?php echo ($area); ?>地区总数</span>
                </li>
                <li class = 'li3'>
                    <span>操作</span>
                </li>
                <!-- <li>市级地区总数</li> -->
            </ul>
        </div>
        <?php if(is_array($info)): foreach($info as $key=>$v): ?><div class = 'sheng'>
                <ul>
                    <li class = 'li1' onmouseover = 'ReColor(this, 1);' onmouseout = 'ReColor(this, 2)'>
                        <span><?php echo ($v["preg_sheng"]); echo ($v["preg_shi"]); ?></span>
                    </li>
                    <li class = 'li2' onmouseover = 'ReColor(this, 1);' onmouseout = 'ReColor(this, 2)'>
                        <span><?php echo ($v["sheng_zong"]); echo ($v["shi_zong"]); ?></span>
                    </li>
                    <li class = 'li3' onmouseover = 'ReColor(this, 1);' onmouseout = 'ReColor(this, 2)'>
                        <?php if(($area) == '省级' ): ?><a href = '/sheng_cheng_ding_dan_ye_mian/index.php/Home/IndentStatistics/ShowStatistics?act=details&sheng=<?php echo ($v["preg_sheng"]); ?>'>
                                <span>点击查看详情</span>
                            </a>
                        <?php else: ?>
                            <a href = 'javascript:history.go(-1)'>
                                <span>返回省级列表</span>
                            </a><?php endif; ?>
                    </li>
                </ul>
            </div><?php endforeach; endif; ?>
    </div>  

                <div class = 'foot'>
                <span>版权所有</span>
            </div>
        </div>
    </center>
</body>
</html>