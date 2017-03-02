<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>个人账单系统__花费信息列表</title>
<link rel = 'stylesheet' type = 'text/css' href = '/zhangdan/Public/Css/HuaFeiLists.css'>
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
        <div class = 'HuaFei'>
            <!-- <a href = '/zhangdan/admin.php/Home/Handle/HuaFeiList?sta=1' onclick = 'PopupClassify(1);'> -->
            <a href = 'javascript:;' onclick = 'ChangeSta("TanChuHuaFeiClassify", 1);'>
                <span>花费信息</span>
            </a>
        </div>
        <div class = 'cansel'>
            <!-- <a href = '/zhangdan/admin.php/Home/Handle/HuaFeiList?sta=2' onclick = 'PopupClassify(2);'> -->
            <a href = 'javascript:;' onclick = 'ChangeSta("TanChuHuaFeiClassify", 2);'>
                <span>已取消的花费信息</span>
            </a>
        </div>
    </div>  

    <div class = 'ChangeSta'>
        <div id = 'ClassifyAll'>
            <div class = 'ClassifyOne'>
                <a href = '/zhangdan/admin.php/Home/Handle/HuaFeiList?classify=classify&id=all' class = 'ClassifyA' style = 'background-color: #247DAD;'>
                <!-- <a href = ''> -->
                    <span>全部分类</span>
                </a>
            </div>
            <div class = 'ClassifyOne'>
                <a href = '/zhangdan/admin.php/Home/Handle/HuaFeiList?classify=classify&id=999999999' class = 'ClassifyA'>
                <!-- <a href = ''> -->
                    <span>未指定</span>
                </a>
            </div>
            <?php if(is_array($info)): foreach($info as $key=>$v): ?><div class = 'ClassifyOne'>
                <a href = '/zhangdan/admin.php/Home/Handle/HuaFeiList?classify=classify&id=<?php echo ($v ["ids"]); ?>' class = 'ClassifyA'>
                <!-- <a href = ''> -->
                    <span><?php echo ($v["names"]); ?></span>
                </a>
            </div><?php endforeach; endif; ?>
            <div class = 'ClassifyOne'>
                <a href = 'javascript:;' onclick = 'ChangeSta("GuanBi");' style = 'background-color: #247DAD;'>
                <!-- <a href = ''> -->
                    <span>关闭</span>
                </a>
            </div>
        </div>
    </div>

                <div class = 'foot'>
                <span>版权所有</span>
            </div>
        </div>
    </center>
</body>
</html>