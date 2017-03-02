<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>生成订单系统__订单列表</title>
<link rel = 'stylesheet' type = 'text/css' href = '/sheng_cheng_ding_dan_ye_mian/Public/Css/body2.css'>
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
                <li class = 'ReColor1' onmouseover = 'ReColor(this, 1);' onmouseout = 'ReColor(this, 2)'>
                    <span>订单名</span></li>
                <li class = 'ReColor2' onmouseover = 'ReColor(this, 1);' onmouseout = 'ReColor(this, 2)'>
                    <span>订单号</span>
                </li>
                <li class = 'ReColor3' onmouseover = 'ReColor(this, 1);' onmouseout = 'ReColor(this, 2)'>
                    <span>生成时间</span>
                </li>
                <li id = 'handle'>
                    <span>操作</span>
                </li>
            </ul>
        </div>
        <?php if(is_array($info)): foreach($info as $key=>$v): ?><div class = 'info'>
                <ul>
                    <li class = 'ReColor1' onmouseover = 'ReColor(this, 1);' onmouseout = 'ReColor(this, 2)'>
                        <span><?php echo ($v["name"]); ?></span></li>
                    <li class = 'ReColor2' onmouseover = 'ReColor(this, 1);' onmouseout = 'ReColor(this, 2)'>
                        <span><?php echo ($v["id"]); ?></span>
                    </li>
                    <li id = 'shijian'  class = 'ReColor3' onmouseover = 'ReColor(this, 1);' onmouseout = 'ReColor(this, 2)'>
                        <span><?php echo (date( 'Y-m-d',$v["time"])); ?></span>
                        <br/>
                        <span><?php echo (date( 'H:i:s',$v["time"])); ?></span>
                    </li>
                    <li id = 'handle'>
                        <a href = ''>
                            <span>暂无</span>
                        </a>
                        <a href = ''>
                            <span>暂无</span>
                        </a>
                        <?php if($v["img"] == null): ?><a href = '/sheng_cheng_ding_dan_ye_mian/index.php/Home/Handle/HandleGoodsImg?&id=<?php echo ($v["id"]); ?>'>
                                <span class = 'red'>添加商品图片信息</span>
                            </a>
                        <?php else: ?>
                            <a href = ''>
                                <span class = 'blue'>已有商品图片信息</span>
                            </a><?php endif; ?>
                            <?php if($v["img"] == null): ?><a href = '/sheng_cheng_ding_dan_ye_mian/index.php/Home/Handle/DownIndentBody?&id=<?php echo ($v["id"]); ?>' class = 'down' onclick = "if(confirm('没有商品图片信息，\n是否确定下载') == false) return false; ">
                                    <span>下载</span>
                                    <br/>
                                    <span class = 'red'>未添加商品图片信息</span>
                                </a>
                            <?php else: ?>
                                <a href = '/sheng_cheng_ding_dan_ye_mian/index.php/Home/Handle/DownIndentBody?&id=<?php echo ($v["id"]); ?>' class = 'down' >
                                    <span>下载</span>
                                    <br/>
                                    <span class = 'green'>已添加商品图片信息</span>
                                </a><?php endif; ?>
                    </li>
                </ul>
            </div><?php endforeach; endif; ?>
        <div id = 'page'>
            <?php echo ($page); ?>
        </div>
    </div>  

                <div class = 'foot'>
                <span>版权所有</span>
            </div>
        </div>
    </center>
</body>
</html>