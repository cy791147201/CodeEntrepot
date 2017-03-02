<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>生成订单系统__订单地址统计</title>
<link rel = 'stylesheet' type = 'text/css' href = '/Public/Css/body6.css'>
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
        <div class = 'form4'>
            <form action = '/index.php/home/indent_statistics/Handles' method = 'post' id = 'Upd' onsubmit = 'return CheckForm(this)'>
                <div>
                    <input type = 'text' name = 'sheng' value = '<?php echo ($info["sheng"]); ?>' class = 'shuru' />
                </div>
                <div>
                    <input type = 'text' name = 'shi' value = '<?php echo ($info["shi"]); ?>' class = 'shuru' />
                </div>
                <div>
                    <input type = 'hidden' name = 'act' value = '<?php echo ($act); ?>' />
                    <input type = 'hidden' name = 'g_id' value = '<?php echo ($info["id"]); ?>' />
                    <input type = 'submit' value = '确认' />
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