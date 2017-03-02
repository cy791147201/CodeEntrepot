<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>登录</title>
    <link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/53kefuchoujiang/Public/HomeCss/login.css'>
    <link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/53kefuchoujiang/Public/HomeCss/reset.css'>
</head>
<body>

<center>
    
    <div class = 'father'>
        
        <span>欢迎登陆</span>

        <form action = '/ge_ren_zhong_xin/53kefuchoujiang/index.php/Home/Index/ShenCheck' method = 'post'>
            
            <input type = 'text' name = 'name' placeholder = '用户名' />

            <input type = 'password' name = 'pwd' placeholder = '用户密码' />

            <input type = 'submit' value = '登录' id = 'sub' />

        </form>

    </div>

</center>

</body>
</html>