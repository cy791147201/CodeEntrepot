<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/53kefuchoujiang/Public/HomeCss/left.css'>
    <link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/53kefuchoujiang/Public/HomeCss/reset.css'>
</head>
<body>

    <center> 

        <div class = 'left'>
            
            <div class = 'tit'>
                
                <span>待处理</span>

            </div>

            <div class = 'TitName'>
                
                <li class = 'id'><span>用户id</span></li>
        
                <li class = 'tel'><span>用户电话</span></li>
            
                <li id = 'upd'><span>状态</span></li>

            </div>

            <?php if(is_array($nodo)): foreach($nodo as $key=>$v): ?><div class = 'info'>
                    
                    <li class = 'id'><span><?php echo ($v["id"]); ?></span></li>
           
                    <li class = 'tel'><span><?php echo ($v["tel"]); ?></span></li>
               
                    <li id = 'upd'><span><?php echo ($v["status"]); ?></span></li>

                </div><?php endforeach; endif; ?>

            <div class = 'page'>
                
                <?php echo ($page1); ?>

            </div>

        </div>

    </center>

</body>

<script language="JavaScript">

    // 自动刷新
    function MyRefresh()
    {
        window.location.reload();
    }

    setTimeout('MyRefresh()',3000);

</script>

</html>