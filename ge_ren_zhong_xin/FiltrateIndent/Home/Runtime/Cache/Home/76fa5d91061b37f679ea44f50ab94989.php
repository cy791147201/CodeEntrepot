<?php if (!defined('THINK_PATH')) exit();?>    <!DOCTYPE html>
<html>
<head>
    <title>筛选订单__登陆界面</title>
<meta http-equiv = 'Content-Type' content = 'text/html; charset = utf-8' />
<link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/FiltrateIndent/Public/Css/login.css'>
<script type = 'text/javascript' src = '/ge_ren_zhong_xin/FiltrateIndent/Public/Js/CheakLogin.js'></script>
</head>
<body>
    <center>
        <div class = 'father'>
            <div class = 'left'></div>
            <div class = 'right'>
                <form action = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Index/CheckLogin' method = 'post' onsubmit = 'return CheckIn();' name = 'form'>
                    <div class = 'spans'>
                        <span class = 'span'>用户名</span>
                        <span class = 'span'>密码</span>
                        <span class = 'span'>保存密码</span>
                    </div>
                    <div class = 'inputs'> 
                        <?php if($user != ""): ?><input type = 'text' name = 'user' value = <?php echo ($user); ?> id = 'user' />
                        <?php else: ?> 
                            <input type = 'text' name = 'user' placeholder = '请输入用户名' id = 'user' /><?php endif; ?> 
                        <?php if($pwd != ""): ?><input type = 'password' name = 'pwd' value = <?php echo ($pwd); ?> id = 'pwd' />
                        <?php else: ?> 
                            <input type = 'password' name = 'pwd' placeholder = '请输入密码' id = 'pwd' /><?php endif; ?>
                        <span class = 'SaveSpan'>是</span>
                        <input type = 'radio' name = 'save' value = '1' id = 'save'/>
                        <span class = 'SaveSpan'>否</span>
                        <input type = 'radio' name = 'save' value = '0' id = 'save'/>
                    </div>
                    <input type = 'submit' name = 'sub' value = '登录' class = 'sub' />
                    <div id = 'hidden'>
                        <span>请填写正确的用户信息</span>
                    </div>
                </form>
            </div>
        </div>
    </center>
</body>
</html>