<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>个人账单系统__花费信息列表</title>
<link rel = 'stylesheet' type = 'text/css' href = '/zhangdan/Public/Css/ClassifyList.css'>
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

    <div class = 'body1'>
        <div class = 'ListTit'>
            <p class = 'ClassifyName'>
                <span>分类名称</span>
            </p>
            <p class = 'handle'>
                <span>操作</span> 
            </p>
        </div>
        <?php if(is_array($info)): foreach($info as $key=>$v): ?><div class = 'ListTit' style = 'background-color: #F6D6D6;'>
            <p class = 'ClassifyName'>
                <span><?php echo ($v["names"]); ?></span>
            </p>
            <p class = 'handle'>
                <a href = '/zhangdan/admin.php/Home/Handle/HuaFeiList?classify=classify&id=<?php echo ($v["ids"]); ?>&sta=1' >
                    <span>查看该分类正常花费</span>
                </a>
                <span>&nbsp;|</span>
                <a href = '/zhangdan/admin.php/Home/Handle/HuaFeiList?classify=classify&id=<?php echo ($v["ids"]); ?>&sta=2' >
                    <span>查看该分类已取消花费</span>
                </a>
                <span>&nbsp;|</span>
                <a href = '/zhangdan/admin.php/Home/Classify/DeleteClassify?id=<?php echo ($v["ids"]); ?>&sta=1' onclick = 'return ChangeSta("DeleteThis");'>
                    <span>删除分类</span>
                </a>
                <span>&nbsp;|</span>
                <a href = 'javascript:;' onclick = 'return ChangeSta(3, 1);'>
                    <span>修改分类</span>
                </a>
                <span>&nbsp;|</span>
            </p>
        </div><?php endforeach; endif; ?>
        <div class = 'ListTit' style = 'border-bottom: 0px; overflow: hidden;'>
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
    

    <div class = 'ChangeSta'>
        <form action = '/zhangdan/admin.php/Home/Classify/ClassifyHandle' method = 'post' id = 'ChangeStaForm' onsubmit = 'return CheckClassifyForm();'>
            <input type = 'text' name = 'name' placeholder = '分类名称' class = 'more' />
            <input type = 'hidden' name = 'id' id = 'StaId' />
            <input type = 'hidden' name = 'sta' id = 'IdSta' />
            <div class = 'DynamicInput'>
                
            </div>
            <input type = 'button' value = '关闭' class = 'GuanBi' onclick = "ChangeSta('GuanBi');" />
            <input type = 'submit' value = '确定' class = 'sure' />
        </form>
    </div>