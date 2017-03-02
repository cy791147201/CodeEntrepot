<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/53kefuchoujiang/Public/HomeCss/right.css'>
    <link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/53kefuchoujiang/Public/HomeCss/reset.css'>
</head>
<body>

    <center>

       <div class = 'father'>
           
            <div class = 'left'>
 
                <div class = 'tit'>
                    
                     <span>未确认状态</span>

                </div>

                <div class = 'TitName'>
                    
                    <li class = 'id'><span>用户id</span></li>
               
                    <li class = 'tel'><span>用户电话</span></li>

                    <li class = 'details'><span>详情</span></li>

                    <li class = 'del'><span>删除</span></li>

                    <li id = 'upds'><span>状态</span></li>

                </div>

                <?php if(is_array($nodo)): foreach($nodo as $key=>$v): ?><div class = 'info'>
                        
                        <li class = 'id'><span><?php echo ($v["id"]); ?></span></li>
                
                        <li class = 'tel'><span><?php echo ($v["tel"]); ?></span></li>

                        <li class = 'details'><a href = '/ge_ren_zhong_xin/53kefuchoujiang/index.php/Home/ShenShow/ShenInfo?id=<?php echo ($v["id"]); ?>'><span>编辑</span></a></li>

                        <li class = 'del'><a href = '/ge_ren_zhong_xin/53kefuchoujiang/index.php/Home/ShenShow/ShenDel?id=<?php echo ($v["id"]); ?>&status=8' onclick= "if(confirm( '删除不可恢复是否确定？')==false)return false; "><span>删除</span></a></li>

                        <li id = 'upds'><span><?php echo ($v["status"]); ?></span></li>

                    </div><?php endforeach; endif; ?>

                <div class = 'page'>
                    
                    <?php echo ($page1); ?>

                </div>

            </div>

            <div class = 'right'>

                <div class = 'tit'>
                    
                     <span>已确认状态</span>

                </div>

                <div class = 'TitName'>
                    
                    <li class = 'id'><span>用户id</span></li>

                    <li class = 'name'><span>用户名称</span></li>

                    <li class = 'tel'><span>用户电话</span></li>

                    <li class = 'address'><span>地址</span></li>

                    <li class = 'details1'><span>详情</span></li>

                    <li class = 'del'><span>删除</span></li>

                    <li id = 'upds1'><span>状态</span></li>

                </div>

                <?php if(is_array($done)): foreach($done as $key=>$v): ?><div class = 'info'>
                        
                        <li class = 'id'><span><?php echo ($v["id"]); ?></span></li>

                        <li class = 'name'><span><?php echo ($v["user"]); ?></span></li>

                        <li class = 'tel'><span><?php echo ($v["tel"]); ?></span></li>

                        <li class = 'address1'><span><?php echo ($v["address"]); ?></span></li>

                        <li class = 'details1' style = 'line-height: 30px;'><a href = '/ge_ren_zhong_xin/53kefuchoujiang/index.php/Home/ShenShow/ShenInfo?id=<?php echo ($v["id"]); ?>'><span>编辑</span></a><br/><a href = '/ge_ren_zhong_xin/53kefuchoujiang/index.php/Home/ShenShow/ShenUpdSta?id=<?php echo ($v["id"]); ?>'><span>改为未处理</span></a></li>

                        <li class = 'del'><a href = '/ge_ren_zhong_xin/53kefuchoujiang/index.php/Home/ShenShow/ShenDel?id=<?php echo ($v["id"]); ?>&status=9' onclick= "if(confirm( '删除不可恢复是否确定？')==false)return false; "><span>删除</span></a></li>
                        <li id = 'upds1'>

                            <span><?php echo ($v["status"]); ?></span>

                        </li>

                    </div><?php endforeach; endif; ?>

                <div class = 'page'>
                    
                    <?php echo ($page); ?>

                </div>

            </div>

       </div>

    </center>

</body>

</html>