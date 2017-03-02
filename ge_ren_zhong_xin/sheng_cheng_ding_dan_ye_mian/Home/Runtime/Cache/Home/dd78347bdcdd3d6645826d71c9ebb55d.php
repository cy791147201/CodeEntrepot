<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>生成订单系统__订单列表</title>
<link rel = 'stylesheet' type = 'text/css' href = '/Public/Css/body5.css'>
<script type = 'text/javascript' src = '/Public/Js/check.js'></script>
</head>
    <link rel = 'stylesheet' type = 'text/css' href = '/Public/Css/reset.css'>
<link rel = 'stylesheet' type = 'text/css' href = '/Public/Css/header.css'>
<link rel = 'stylesheet' type = 'text/css' href = '/Public/Css/foot.css'>

<script type = 'text/javascript' src = '/Public/Js/check.js'></script>
    <center>
        <div class = 'father'>
            <div class = 'header'>
                <ul class = 'tou'>
                    <li>
                        <a href = '/index.php/Home/Handle/UpBody'>
                            <span>上传订单页面</span>
                        </a>
                    </li>
                    <li>
                        <a href = '/index.php/Home/Handle/CreateIndentBody'>
                            <span>订单列表</span>
                        </a>
                    </li>
                    <li>
                        <a href = '/index.php/Home/IndentStatistics/index'>
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
                        <a href = '/index.php/Home/Index/LogOut'>
                            <span>退出</span>
                        </a>
                    </li>
                </ul>
            </div>

    <div class = 'body2'>
        <div class = 'tit'>
            <ul>
                <li id = 'ReColor0' class = 'ReColor0' onmouseover = 'ReColor(this, 1);' onmouseout = 'ReColor(this, 2)'>
                    <span>id</span>
                </li>
                <li class = 'ReColor1' onmouseover = 'ReColor(this, 1);' onmouseout = 'ReColor(this, 2)'>
                    <span>省</span>
                </li>
                <li class = 'ReColor2' onmouseover = 'ReColor(this, 1);' onmouseout = 'ReColor(this, 2)'>
                    <span>市</span>
                </li>
                <li class = 'ReColor3' onmouseover = 'ReColor(this, 1);' onmouseout = 'ReColor(this, 2)'>
                    <span>添加者</span>
                </li>
                <li class = 'ReColor4' onmouseover = 'ReColor(this, 1);' onmouseout = 'ReColor(this, 2)'>
                    <span>添加时间</span>
                </li>
                <li id = 'handle'>
                    <span>操作</span>
                </li>
            </ul>
        </div>
        <?php if(is_array($info)): foreach($info as $key=>$v): ?><div class = 'info'>
                <ul>
                    <li id = 'ReColor0' class = 'ReColor0' onmouseover = 'ReColor(this, 1);' onmouseout = 'ReColor(this, 2)'>
                        <span><?php echo ($v["id"]); ?></span>
                    </li>
                    <li class = 'ReColor1' onmouseover = 'ReColor(this, 1);' onmouseout = 'ReColor(this, 2)'>
                        <span><?php echo ($v["sheng"]); ?></span>
                    </li>
                    <li class = 'ReColor2' onmouseover = 'ReColor(this, 1);' onmouseout = 'ReColor(this, 2)'>
                        <span><?php echo ($v["shi"]); ?></span>
                    </li>
                    <li class = 'ReColor3' onmouseover = 'ReColor(this, 1);' onmouseout = 'ReColor(this, 2)'>
                        <span><?php echo ($v["who_add"]); ?></span>
                    </li>
                    <li id = 'shijian'  class = 'ReColor4' onmouseover = 'ReColor(this, 1);' onmouseout = 'ReColor(this, 2)'>
                        <span><?php echo (date( 'Y-m-d',$v["add_time"])); ?></span>
                        <br/>
                        <span><?php echo (date( 'H:i:s',$v["add_time"])); ?></span>
                    </li>
                    <li id = 'handle'>
                        <a href = '/index.php/home/indent_statistics/Handles?act=add&g_id=<?php echo ($v["id"]); ?>'>
                            <span>增加</span>
                        </a>
                        <a href = '/index.php/home/indent_statistics/Handles?act=del&g_id=<?php echo ($v["id"]); ?>'>
                            <span>删除</span>
                        </a>
                        <a href = '/index.php/home/indent_statistics/Handles?act=upd&g_id=<?php echo ($v["id"]); ?>'>
                            <span>更新</span>
                        </a>
                        <a href = ''>
                            <span>暂无</span>
                        </a>
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