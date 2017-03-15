<?php
/* Smarty version 3.1.29, created on 2016-09-03 06:56:59
  from "H:\Apache24\htdocs\JoinExcelMysql1\templates\add.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ca743b842eb7_59832854',
  'file_dependency' => 
  array (
    '1a3ed9d6549b9cff897dcaa7d9348984cb7fcc31' => 
    array (
      0 => 'H:\\Apache24\\htdocs\\JoinExcelMysql1\\templates\\add.tpl',
      1 => 1472885764,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 0,
),true)) {
function content_57ca743b842eb7_59832854 ($_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>添加管理员页面</title>
    <meta http-equiv = 'Content-Type' content = 'text/html; charset = utf-8' />
    <meta name = 'keywords' content = '添加管理员页面' />
    <link rel = 'stylesheet' type = 'text/css' href = '../css/admin.css'>
</head>
<body>

    <div class = 'father'>

        <div>

            <span class = 'tit'>管理员操作页面</span>
            
        </div>

        <div class = 'handle'>

            <li class = 'act'><a href = '../c/admin.php?act=list'><span>管理员列表</span></a></li>
            <li class = 'act'><a href = '../c/admin.php?act=add'><span>添加管理员</span></a></li>
            <li class = 'act'><a href = '../c/admin.php?act=del'><span>删除管理员</span></a></li>
            <li class = 'act'><a href = '../c/admin.php?act=upd'><span>修改管理员</span></a></li>

            <div class = 'form'>
                
                <form action = '../c/admin.php?act=find' method = 'post' >
                    
                    <input type = 'text' name = 'user' placeholder = '请输入管理员用户名' class = 'user' />

                    <input type = 'submit' name = 'sub' value = '搜索' class = 'sub' />

                </form>

            </div>

            <li class = 'act'><a href = '../view/index.html'><span>返回继续查询信息</span></a></li>
            
        </div>

        <div class = 'add'>
            
            <form action = '../c/admin.php?act=added' method = 'post' id = 'AddAdmin' >
                
                    <div class = 'tits'>
                        
                        <span>用户名</span>
                        <span>用户权限等级</span>
                        <span>用户密码</span>

                    </div>

                    <div class = 'inputs'>
                        
                        <input type = 'text' name = 'name' placeholder = '管理员用户名'  />

                        <input type = 'text' name = 'grade' placeholder = '管理员用户权限等级'  />

                        <input type = 'password' name = 'pwd' placeholder = '管理员用户密码' />

                    </div>

                    <input type = 'submit' name = 'sub' class = 'sub1' value = '添加管理员' />

            </form>

        </div>

        <div class = 'tit'>
            
            <span>请仔细阅读信息，避免不必要的错误信息插入 </span>

        </div>
        
    </div>

</body>

<script>

    document.getElementById('AddAdmin').onsubmit =function()
    {

        var patt = /^[a-zA-Z0-9]{6,16}$/;
        if(!patt.test(document.getElementsByName('name')[0].value)){
            alert('用户名必须填写，且只能是数字和字母的组合，长度为6-16个字符');
            return false;
        }


        patt = /^[a-zA-Z0-9]{6,32}$/;
        if(!patt.test(document.getElementsByName('pwd')[0].value)){
            alert('密码必须填写，且只能是数字和字母的组合，长度为6-32个字符');
            return false;
        } 

    }
</script>

</html><?php }
}
