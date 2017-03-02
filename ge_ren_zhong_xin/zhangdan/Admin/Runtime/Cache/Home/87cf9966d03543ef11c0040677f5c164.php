<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>个人账单系统__添加分类</title>
<link rel = 'stylesheet' type = 'text/css' href = '/zhangdan/Public/Css/ClassifyIndex.css'>
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
        <div class = 'classify' style = 'background-color: #64C6A3;'>
            <a href = 'javascript:;' onclick = 'ChangeSta("AddClassify", 1);'>
                <span>添加分类</span>
            </a>
        </div>
        <div class = 'classify' style = 'background-color: #1FC68A;'>
            <a href = 'javascript:;' onclick = 'ChangeSta("DelClassify", 1);'>
                <span>删除分类</span>
            </a>
        </div>
        <div class = 'classify' style = 'background-color: #0B9161;'>
            <a href = 'javascript:;' onclick = 'ChangeSta("SaveClassify", 1);'>
                <span>修改分类</span>
            </a>
        </div>
        <div class = 'classify' style = 'background-color: #22B07D;'>
            <a href = '/zhangdan/admin.php/Home/Classify/ClassifyList'>
                <span>分类列表</span>
            </a>
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
            <select class = 'more' name = 'name'>
                <?php if(is_array($opt)): foreach($opt as $key=>$v): ?><option value = '<?php echo ($v["ids"]); ?>'><?php echo ($v["names"]); ?></option><?php endforeach; endif; ?>
            </select>
            <input type = 'hidden' name = 'id' id = 'StaId' />
            <input type = 'hidden' name = 'sta' id = 'IdSta' />
            <div class = 'DynamicInput'>
                
            </div>
            <input type = 'button' value = '关闭' class = 'GuanBi' onclick = "ChangeSta('GuanBi');" />
            <input type = 'submit' value = '确定' class = 'sure' />
        </form>
    </div>
    <div class = 'ChangeSta1'>
        <form action = '/zhangdan/admin.php/Home/Classify/ClassifyHandle' method = 'post' id = 'ChangeStaForm1' onsubmit = 'return CheckClassifyForm();'>
            <input type = 'text' name = 'name' placeholder = '分类名称' class = 'more' />
            <input type = 'hidden' name = 'id' id = 'StaId1' />
            <input type = 'hidden' name = 'sta' id = 'IdSta1' />
            <div class = 'DynamicInput'>
                
            </div>
            <input type = 'button' value = '关闭' class = 'GuanBi' onclick = "ChangeSta('GuanBi');" />
            <input type = 'submit' value = '确定' class = 'sure' />
        </form>
    </div>