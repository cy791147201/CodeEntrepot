<?php
/* Smarty version 3.1.29, created on 2016-09-03 02:14:04
  from "H:\Apache24\htdocs\JoinExcelMysql\templates\upd2.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ca31ecdae198_81120882',
  'file_dependency' => 
  array (
    '487c54775d48411b444d9d112a556ee5de8af945' => 
    array (
      0 => 'H:\\Apache24\\htdocs\\JoinExcelMysql\\templates\\upd2.tpl',
      1 => 1472868816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57ca31ecdae198_81120882 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2572557ca31ecd63e04_30007452';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns = 'http://www.w3.org/1999/xhtml'> 
<head>
    <title>修改管理员页</title>
    <meta http-equiv = 'Content-Type' content = 'text/html; charset = utf-8' />
    <meta name = 'keywords' content = '修改管理员页面' />
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
            
            <form action = '../c/admin.php?act=upded' method = 'post' id = 'AddAdmin' >
                
                    <div class = 'tits'>
                        
                        <span>用户名</span>
                        <span>用户权限等级</span>
                        <span>用户密码</span>

                    </div>

                    <div class = 'inputs'>
                        
                        <?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>

                            <input type = 'text' name = 'name'  value = '<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
' />

                            <input type = 'text' name = 'grade' value = '<?php echo $_smarty_tpl->tpl_vars['v']->value['grade'];?>
' />

                            <input type = 'password' name = 'pwd'  />

                        <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
?>

                    </div>

                    <input type = 'submit' name = 'sub' class = 'sub1' value = '修改管理员' />

            </form>

        </div>

        <div class = 'tit'>
            
            <span>请仔细阅读信息，避免不必要的错误信息插入 </span>

        </div>
        
    </div>

</body>

<?php echo '<script'; ?>
>

    document.getElementById('AddAdmin').onsubmit =function()
    {
        // js正则验证用户名
        var patt = /^[a-zA-Z0-9]{6,16}$/;
        if(!patt.test(document.getElementsByName('name')[0].value)){
            alert('用户名必须填写，且只能是数字和字母的组合，长度为6-16个字符');
            return false;
        }

    }
<?php echo '</script'; ?>
>

</html><?php }
}
