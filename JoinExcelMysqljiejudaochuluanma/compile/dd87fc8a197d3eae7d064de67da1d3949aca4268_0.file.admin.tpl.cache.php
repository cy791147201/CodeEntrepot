<?php
/* Smarty version 3.1.29, created on 2016-09-02 12:20:13
  from "H:\Apache24\htdocs\JoinExcelMysql\templates\admin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57c96e7d5fee12_12172364',
  'file_dependency' => 
  array (
    'dd87fc8a197d3eae7d064de67da1d3949aca4268' => 
    array (
      0 => 'H:\\Apache24\\htdocs\\JoinExcelMysql\\templates\\admin.tpl',
      1 => 1472817982,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57c96e7d5fee12_12172364 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '366757c96e7d51c4e4_51907979';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns = 'http://www.w3.org/1999/xhtml'> 
<head>
    <title>管理员列表页</title>
    <meta http-equiv = 'Content-Type' content = 'text/html; charset = utf-8' />
    <meta name = 'keywords' content = '管理员列表页面' />
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
            
        <div class = 'none1'></div>
        
    </div>

</body>
</html><?php }
}
