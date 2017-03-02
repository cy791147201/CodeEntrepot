<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>个人账单系统__填写花费信息</title>
<link rel = 'stylesheet' type = 'text/css' href = '/zhangdan/Public/Css/TianXieHuaFei.css'>
<script type = 'text/javascript' src = '/zhangdan/Public/Js/check.js'></script>
</head>
    <link rel = 'stylesheet' type = 'text/css' href = '/zhangdan/Public/Css/reset.css'>
<link rel = 'stylesheet' type = 'text/css' href = '/zhangdan/Public/Css/header.css'>
<link rel = 'stylesheet' type = 'text/css' href = '/zhangdan/Public/Css/foot.css'>

<script type = 'text/javascript' src = '/zhangdan/Public/Js/check.js'></script>
    <center>
        <div class = 'father'>
            <div class = 'header'>
                <ul class = 'tou'>
                    <li>
                        <a href = '/zhangdan/admin.php/Home/Handle/index'>
                            <span>首页</span>
                        </a>
                    </li>
                    <li>
                        <a href = '/zhangdan/admin.php/Home/Handle/HuaFeiInfo'>
                            <span>填写花费信息</span>
                        </a>
                    </li>
                    <li>
                        <a href = '/zhangdan/admin.php/Home/Handle/HuaFeiLists'>
                            <span>花费列表</span>
                        </a>
                    </li>
                    <li class = ''>
                        <a href = '/zhangdan/admin.php/Home/Classify/index'>
                            <span>分类管理</span>
                        </a>
                    </li>
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
                        <a href = '/zhangdan/admin.php/Home/Index/LogOut'>
                            <span>退出</span>
                        </a>
                    </li>
                </ul>
            </div>

    <div class = 'body'>
        <!-- <div class = 'choice'>
            <p>
                <a href = 'javascript:;' id = 'InputOne' onclick = 'ChangeColor(this);'>
                    <span>填写单次花费</span>
                </a>
            </p>
            <p>
                <a href = 'javascript:;' id = 'InputTwo' onclick = 'ChangeColor(this);'>
                    <span>填写多次花费</span>
                </a>
            </p>
        </div> -->
        <div class = 'HuaFeiTit'>
            <span>填写花费信息</span>
        </div>
        <div class = 'HuaFeiNotice'>
            <span>单个花费格式&nbsp;&nbsp;:&nbsp;&nbsp;花费名称，<如衣服...>.&nbsp;&nbsp;加上/&nbsp;&nbsp;花费多少，<如150...>.</span>        
            <br/>
            <span>多个花费格式&nbsp;&nbsp;:&nbsp;&nbsp;花费名称，<如衣服...>.&nbsp;&nbsp;加上/&nbsp;&nbsp;花费多少，<如150...>.&nbsp;&nbsp;加上&nbsp;&nbsp;#&nbsp;&nbsp;第二个花费&nbsp;&nbsp;</span>        
        </div>
        <div class = 'form'>
            <form action = '/zhangdan/admin.php/Home/Handle/DisposeHuaFeiInfo' method = 'post' onsubmit = 'return CheckForm();'>
                <select class = 'inputs' name = 'classify'>
                    <?php if(is_array($opt)): foreach($opt as $key=>$v): ?><option value = '<?php echo ($v["ids"]); ?>'><?php echo ($v["names"]); ?></option><?php endforeach; endif; ?>
                </select>
                <input type = 'text' class = 'inputs' name = 'info' id = 'info'>
                <input type = 'submit' class = 'inputs' id = 'sub' />
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