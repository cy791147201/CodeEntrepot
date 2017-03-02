<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>修改用户信息状态</title>
    <link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/53kefuchoujiang/Public/HomeCss/reset.css'>
    <link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/53kefuchoujiang/Public/HomeCss/one.css'>
    <!DOCTYPE html>
<html>
<head>
    <title>楠溪王某系统</title>
<link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/53kefuchoujiang/public/HomeCss/reset.css'>
<link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/53kefuchoujiang/public/HomeCss/tit.css'>
</head>
<body>

    <center> 

        <div class = 'tit1'>
                    
            <div class = 'title'>
<!-- 
                <li id = 'tits'>当前管理员id</li>

                <li><?php echo ($id); ?></li>

                <li id = 'tits'>当前管理员</li>

                <li><?php echo ($name); ?></li> -->
              
                <div class = 'act'>
                    
                    <li><a href = '/ge_ren_zhong_xin/53kefuchoujiang/index.php/Home/Index/ShenShow'><span>返回首页</span></a></li>

                    <li><a href = 'javascript:location.reload()'><span>刷新</span></a></li>

                    <li><a href = '/ge_ren_zhong_xin/53kefuchoujiang/index.php/Home/ShenExcel/index'><span>导出excel</span></a></li>

                    <li><a href = '/ge_ren_zhong_xin/53kefuchoujiang/index.php/Home/Index/ShenOut'><span>退出</span></a></li>

                </div>
                
            </div>

        </div>

</head>
<body>

<center>
    
    <div class = 'father'>

        <div class = 'infos'>

            <iframe src = "<?php echo U('ShenShow/ShenRefresh');?>" frameborder = 'no' scrolling = 'no' style = 'width: 350px; height: 900px;' ></iframe>

        </div>

        <div class = 'DoInfo'>
            
            <iframe src = "<?php echo U('ShenShow/ShenDo');?>" frameborder = 'no' scrolling = 'no' style = 'width: 1700px; height: 900px;' ></iframe>

        </div>

    </div>

</center>

</body>

<link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/53kefuchoujiang/public/HomeCss/reset.css'>
<link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/53kefuchoujiang/public/HomeCss/foot.css'>

        <div class = 'FootNotice'>
            
            <span>如有问题请联系管理员，联系电话13838383838</span>

        </div>

    </center>

</body>
</html>