<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>导出excel</title>
    <link rel = 'stylesheet' type = 'text/css' href = '/kefuchoujiang/Public/HomeCss/reset.css'>
    <link rel = 'stylesheet' type = 'text/css' href = '/kefuchoujiang/Public/HomeCss/excel.css'>
    <script type = 'text/javascript' src = '/kefuchoujiang/Public/Js/My97DatePicker/WdatePicker.js'></script>
    <!DOCTYPE html>
<html>
<head>
    <title>楠溪王某系统</title>
<link rel = 'stylesheet' type = 'text/css' href = '/kefuchoujiang/public/HomeCss/reset.css'>
<link rel = 'stylesheet' type = 'text/css' href = '/kefuchoujiang/public/HomeCss/tit.css'>
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
                    
                    <li><a href = '/kefuchoujiang/index.php/Home/Index/ShenShow'><span>返回首页</span></a></li>

                    <li><a href = 'javascript:location.reload()'><span>刷新</span></a></li>

                    <li><a href = '/kefuchoujiang/index.php/Home/ShenExcel/index'><span>导出excel</span></a></li>

                    <li><a href = '/kefuchoujiang/index.php/Home/Index/ShenOut'><span>退出</span></a></li>

                </div>
                
            </div>

        </div>

</head>
<body>

<center>
    
    <div class = 'father'>

        <div class = 'left'>
            
            <li><span style = 'font-size: 20px; font-weight: 600; background: #9191A6; display: block; ' >可导出excel列表</span></li>

            <li><a href = '/kefuchoujiang/index.php/Home/ShenExcel/ShenCondition?style=2'><span>已处理</span></a></li>

            <li><a href = '/kefuchoujiang/index.php/Home/ShenExcel/ShenCondition?style=9'><span>已处理已删除</span></a></li>

            <li><a href = '/kefuchoujiang/index.php/Home/ShenExcel/ShenCondition?style=1'><span>未处理</span></a></li>

            <li><a href = '/kefuchoujiang/index.php/Home/ShenExcel/ShenCondition?style=8'><span>未处理已删除</span></a></li>

        </div>

        <div class = 'right'>
            
            <div class = 'time'>
                    
                <span class = 'condition' >根据时间查询</span>

                <form action = '/kefuchoujiang/index.php/Home/ShenExcel/ShenCondition' method = 'post' onsubmit = "return submitFun(this);" >

                    <input type = 'text' name = 'start' size = '11' class = 'ui-text Wdate' onclick = "WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'});" id = 'start' />

                    <span>&nbsp;&nbsp;&nbsp;至&nbsp;&nbsp;&nbsp;</span>

                    <input type = 'text' name = 'end' size = '11' class = 'ui-text Wdate' onclick = "WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'});" id = 'end' />

                    <input type = 'hidden' name = 'style' value = '<?php echo ($style); ?>' id = 'style' />

                    <input type = 'submit' value = '提交查询' id = 'sub' name = 'find' />

                    <input type = 'submit' value = '导出excel' id = 'sub' name = 'out' />

                </form>

            </div>

            <div class = 'infos'>
                
                <div class = 'tit'>
                    
                    <li class = 'id'><span>用户id</span></li>

                    <li class = 'name'><span>用户名</span></li>

                    <li class = 'tel'><span>电话</span></li>

                    <li class = 'address'><span>地址</span></li>

                    <li class = 'combo'><span>套餐</span></li>

                    <li class = 'money'><span>金额</span></li>

                    <!-- <li class = 'WhoAdd'><span>谁添加的</span></li> -->

                    <li class = 'AddTime'><span>添加时间</span></li>

                    <li class = 'WhoUpd'><span>谁更新的</span></li>

                    <li id = 'UpdTime'><span>更新时间</span></li>

                </div>

                <?php if(is_array($info)): foreach($info as $key=>$v): ?><div class = 'info'>
                        
                        <li class = 'id'><span><?php echo ($v["id"]); ?></span></li>

                        <li class = 'name'><span><?php echo ($v["user"]); ?></span></li>

                        <li class = 'tel'><span><?php echo ($v["tel"]); ?></span></li>

                        <li id = 'addres'><span><?php echo ($v["address"]); ?></span></li>

                        <li id = 'combo'><span><?php echo ($v["combo"]); ?></span></li>

                        <li class = 'money'><span><?php echo ($v["money"]); ?></span></li>

                        <!-- <li id = 'WhoAdd'><span><?php echo ($v["who_add"]); ?></span></li> -->

                        <li id = 'AddTime'><span><?php echo ($v["add_time"]); ?></span></li>

                        <li id = 'WhoUpd'><span><?php echo ($v["who_upd"]); ?></span></li>

                        <li id = 'UpdTimes'><span><?php echo ($v["upd_time"]); ?></span></li>

                    </div><?php endforeach; endif; ?>

                <div class = 'page'>
                    
                    <?php echo ($page); ?>

                </div>

            </div>

        </div>

    </div>

</center>

</body>

<script language="javascript">

    function submitFun(obj)
    {
        if(document.getElementById('style').value == 0 ){

            alert('请选择左侧需要查询的状态');
            return false;

        }

        if(document.getElementById('start').value.length < 1){

            alert('请选择开始时间');
            return false;

        }

        if(document.getElementById('end').value.length < 1){

            alert('请选择结束时间');
            return false;

        }

    }

</script>

<link rel = 'stylesheet' type = 'text/css' href = '/kefuchoujiang/public/HomeCss/reset.css'>
<link rel = 'stylesheet' type = 'text/css' href = '/kefuchoujiang/public/HomeCss/foot.css'>

        <div class = 'FootNotice'>
            
            <span>如有问题请联系管理员，联系电话13838383838</span>

        </div>

    </center>

</body>
</html>