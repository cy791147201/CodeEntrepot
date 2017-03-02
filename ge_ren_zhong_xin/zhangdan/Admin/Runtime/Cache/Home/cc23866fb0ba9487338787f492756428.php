<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>个人账单系统__花费信息列表</title>
<link rel = 'stylesheet' type = 'text/css' href = '/zhangdan/Public/Css/HuaFeiList.css'>
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
        <div class = 'HuaFeiListTit'>
            <span><?php echo ($tit); ?>&nbsp;&nbsp;&nbsp;&nbsp;总金额&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($count); ?>&nbsp;&nbsp;&nbsp;&nbsp;元</span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href = '/zhangdan/admin.php/Home/Handle/HuaFeiImage?classify=<?php echo ($classify); ?>&sta=<?php echo ($sta); ?>'>
                <span>查看信息图</span>
            </a>
        </div>
        <div class = 'ListTit'>
            <p>
                <a href = '/zhangdan/admin.php/Home/Handle/HuaFeiList?sort=name&sta=<?php echo ($sta); ?>&order=<?php echo ($order); ?>'>
                    <span>花费名称</span>
                </a>
            </p>
            <p>
                <a href = '/zhangdan/admin.php/Home/Handle/HuaFeiList?sort=classify&sta=<?php echo ($sta); ?>&order=<?php echo ($order); ?>'>
                    <span>分类</span>
                </a>
            </p>
            <p>
                <a href = '/zhangdan/admin.php/Home/Handle/HuaFeiList?sort=money&sta=<?php echo ($sta); ?>&order=<?php echo ($order); ?>'>
                    <span>价钱</span>
                </a>
            </p>
            <p>
                <!-- <a href = '/zhangdan/admin.php/Home/Handle/HuaFeiList?sort=name&sta=<?php echo ($sta); ?>&order=<?php echo ($order); ?>'> -->
                    <span>状态</span>
                <!-- </a> -->
            </p>
            <p>
                <a href = '/zhangdan/admin.php/Home/Handle/HuaFeiList?sort=more&sta=<?php echo ($sta); ?>&order=<?php echo ($order); ?>'>
                    <span>备注</span>
                </a>
            </p>
            <p>
                <a href = '/zhangdan/admin.php/Home/Handle/HuaFeiList?sort=time&sta=<?php echo ($sta); ?>&order=<?php echo ($order); ?>'>
                    <span>添加时间</span>
                </a>
            </p>
            <p>
                <a href = '/zhangdan/admin.php/Home/Handle/HuaFeiList?sort=upd_time&sta=<?php echo ($sta); ?>&order=<?php echo ($order); ?>'>
                    <span>更新时间</span>
                </a>
            </p>
            <p id = 'handle'>
                <span>操作</span>
            </p>
        </div>
        <?php if(is_array($info)): foreach($info as $key=>$v): ?><div class = 'ListTit' style = 'background-color: #DFD7E1;'>
            <p>
                <span><?php echo ($v["name"]); ?></span>
            </p>
            <p>
                <span>
                    <?php if($v["names"] == null): ?>未指定
                    <?php else: ?>
                    <?php echo ($v["names"]); endif; ?>
                </span>
            </p>
            <p>
                <span><?php echo ($v["money"]); ?>&nbsp;元</span>
            </p>
            <p>
                <?php if($v["sta"] == 1): ?><span>正常</span>
                <?php elseif($v["sta"] == 2): ?>
                    <span>已取消</span><?php endif; ?>
            </p>
            <p style = 'line-height: 30px;'>
                <span><?php echo ($v["more"]); ?></span>
            </p>
            <p style = 'line-height: 30px;'>
                <span><?php echo (date("Y-m-d",$v["time"])); ?></span>
                <br/>
                <span><?php echo (date("H:i:s",$v["time"])); ?></span>
            </p>
            <p style = 'line-height: 30px;'>
                <span><?php echo (date("Y-m-d",$v["upd_time"])); ?></span>
                <br/>
                <span><?php echo (date("H:i:s",$v["upd_time"])); ?></span>
            </p>
            <p id = 'handle'>
                <a href = 'javascript:;' onclick = 'ChangeSta(<?php echo ($v["id"]); ?>, <?php echo ($v["sta"]); ?>);'>
                    <span>
                        <?php if($v["sta"] == 1): ?><span>删除订单</span>
                        <?php else: ?>
                            <span>恢复订单</span><?php endif; ?>
                    </span>
                </a>
                <span>&nbsp;|</span>
                <a href = 'javascript:;' onclick = 'ChangeSta("UpdClassify", <?php echo ($v["id"]); ?>);'>
                    <span>修改分类</span>
                </a>
                <span>&nbsp;|</span>
                <a href = 'javascript:;' onclick = 'ChangeSta("AddMore", <?php echo ($v["id"]); ?>);'>
                    <span>添加或修改备注</span>
                </a>
            </p>
        </div><?php endforeach; endif; ?>
        <div class = 'ListTit' style = 'border-bottom: 0px;'>
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
        <form action = '/zhangdan/admin.php/Home/Handle/CancelHuaFei' method = 'post' id = 'ChangeStaForm' >
            <input type = 'text' name = 'more' placeholder = '备注信息，可填可不填' class = 'more' />
            <input type = 'hidden' name = 'id' id = 'StaId' />
            <input type = 'hidden' name = 'sta' id = 'IdSta' />
            <input type = 'button' value = '关闭' class = 'GuanBi' onclick = "ChangeSta('GuanBi');" />
            <input type = 'submit' value = '确定' class = 'sure' />
        </form>
    </div>

    <div class = 'ChangeSta1'>
        <form action = '/zhangdan/admin.php/Home/Classify/UpdClassifyOne' method = 'post' id = 'ChangeClassifyForm'>
            <select class = 'inputs' name = 'classify'>
                <?php if(is_array($opt)): foreach($opt as $key=>$v): ?><option value = '<?php echo ($v["ids"]); ?>'><?php echo ($v["names"]); ?></option><?php endforeach; endif; ?>
            </select>
            <input type = 'hidden' name = 'id' id = 'HuaFeiId' />
            <input type = 'button' value = '关闭' class = 'GuanBi' onclick = "ChangeSta('GuanBi');" />
            <input type = 'submit' value = '确定' class = 'sure' />
        </form>
    </div>