<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>请先登录</title>
<meta http-equiv = 'Content-Type' content = 'text/html; charset = utf-8' />
<link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/zhangdan/Public/Css/login.css'>
<script type = 'text/javascript' src = '/ge_ren_zhong_xin/zhangdan/Public/Js/check.js'></script>
</head>
<body>
    <center>
        <div class = 'father'>
            <div class = 'left'></div>
            <div class = 'right'>
                <form action = '/ge_ren_zhong_xin/zhangdan/admin.php/Home/Index/DoLogin' method = 'post' onsubmit = 'return CheckIn();' name = 'form'>
                    <div class = 'span'>
                        <span>用户名</span>
                        <span>密码</span>
                    </div>
                    <div class = 'inputs'> 
                        <input type = 'text' name = 'user' placeholder = '请输入用户名' id = 'user' />
                        <input type = 'password' name = 'pwd' placeholder = '请输入密码' id = 'pwd' />
                    </div>
                    <input type = 'submit' name = 'sub' value = '登录' class = 'sub' />
                    <div id = 'hid'>
                        <span>请填写正确的用户信息</span>
                    </div>
                </form>
            </div>
        </div>
    </center>
</body>
</html>