<?php
/* Smarty version 3.1.29, created on 2016-09-02 07:28:02
  from "H:\Apache24\htdocs\JoinExcelMysql\templates\admin1.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57c92a02b3b738_35872315',
  'file_dependency' => 
  array (
    '021a1044164fc3ad551a77d9f6b5bd0549cd8c2c' => 
    array (
      0 => 'H:\\Apache24\\htdocs\\JoinExcelMysql\\templates\\admin1.tpl',
      1 => 1472801246,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57c92a02b3b738_35872315 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2449657c92a02af5228_52166014';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns = 'http://www.w3.org/1999/xhtml'> 
<head>
    <title>管理员页</title>
    <meta http-equiv = 'Content-Type' content = 'text/html; charset = utf-8' />
    <meta name = 'keywords' content = '管理员页面' />
    <link rel = 'stylesheet' type = 'text/css' href = '../css/admin.css'>
</head>
<body>

    <div class = 'father'> 

        <div>

            <span class = 'tit'>管理员操作页面</span>
            
        </div>

        <div class = 'handle'>

            <li class = 'act'><a href = '../c/admin.php?act=list'><span>管理员列表</span></a></li>
            <li class = 'act'><a href = '../c/admin.php?act=find'><span>添加管理员</span></a></li>
            <li class = 'act'><a href = '../c/admin.php?act=find'><span>删除管理员</span></a></li>
            <li class = 'act'><a href = '../c/admin.php?act=find'><span>修改管理员</span></a></li>

            <div class = 'form'>
                
                <form action = '../c/admin.php?act=find' method = 'post' >
                    
                    <input type = 'text' name = 'user' placeholder = '请输入管理员用户名' class = 'user' />

                    <input type = 'submit' name = 'sub' value = '搜索' class = 'sub' />

                </form>

            </div>
            <!-- <a href = '../view/index.html'>返回继续查询信息</a> -->
            <li class = 'act'><a href = '../view/index.html'><span>返回继续查询信息</span></a></li>
            
        </div>

        <div class = 'info'>

            <li class = 'name'><span>管理员用户名称</span></li>
            <li class = 'grade'><span>管理员用户等级</span></li>
            <li class = 'operate'><span>操作</span></li>
            
        </div>

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

            <div class = 'infos'>
            
                <li class = 'name'><span><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</span></li>
                <li class = 'grade'><span><?php echo $_smarty_tpl->tpl_vars['v']->value['grade'];?>
</span></li>

                <li class = 'operate'>

                    <a href = '../c/admin.php?act=find'><span>删除</span></a>
                    <a href = '../c/admin.php?act=find'><span>修改</span></a>
                    
                </li>

            </div>

            <div class = 'none'></div>

        <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
?>

        <div class = 'page'>

            <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

            
        </div>
        
    </div>

</body>
</html><?php }
}
