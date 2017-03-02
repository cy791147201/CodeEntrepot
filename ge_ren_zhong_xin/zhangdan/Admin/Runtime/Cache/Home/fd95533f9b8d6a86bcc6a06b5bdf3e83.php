<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>个人账单系统__花费信息列表</title>
<link rel = 'stylesheet' type = 'text/css' href = '/zhangdan/Public/Css/HuaFeiImage.css'>
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

    <div class = 'images'>
        <div class = 'image'>
            
        </div>
        <div class = 'classify'>
            <div class = 'NowClassify'>
                <span>当前分类&nbsp;:&nbsp;<?php echo ($ClassifyName); ?></span>
            </div>
            <div id = 'AllClassify'>
                <!-- <?php if(is_array($classifys)): foreach($classifys as $key=>$v): ?><a href = ''>
                    <span><?php echo ($v["names"]); ?></span>
                </a><?php endforeach; endif; ?> -->
                <a href = 'javascript:;' onclick = 'ChangeSta("TanChuHuaFeiClassify", 1);'>
                    <span>其他分类</span>
                </a>
            </div>
        </div>
        <div class = 'shape'>
            <a href = ''>
                <span>3D饼图</span>
            </a>
            <a href = ''>
                <span>柱状图</span>
            </a>
            <a href = ''>
                <span>环状图</span>
            </a>
            <a href = ''>
                <span>横柱图</span>
            </a>
        </div>
    </div>  

    <div class = 'ChangeSta'>
        <div id = 'ClassifyAll'>
            <div class = 'ClassifyOne'>
                <a href = '/zhangdan/admin.php/Home/Handle/HuaFeiImage?classify=all&sta=<?php echo ($sta); ?>' class = 'ClassifyA' style = 'background-color: #247DAD;'>
                <!-- <a href = ''> -->
                    <span>全部分类</span>
                </a>
            </div>
            <div class = 'ClassifyOne'>
                <a href = '/zhangdan/admin.php/Home/Handle/HuaFeiImage?classify=999999999&sta=<?php echo ($sta); ?>' class = 'ClassifyA'>
                <!-- <a href = ''> -->
                    <span>未指定</span>
                </a>
            </div>
            <?php if(is_array($classifys)): foreach($classifys as $key=>$v): ?><div class = 'ClassifyOne'>
                <a href = '/zhangdan/admin.php/Home/Handle/HuaFeiImage?classify=<?php echo ($v["ids"]); ?>&sta=<?php echo ($sta); ?>' class = 'ClassifyA'>
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