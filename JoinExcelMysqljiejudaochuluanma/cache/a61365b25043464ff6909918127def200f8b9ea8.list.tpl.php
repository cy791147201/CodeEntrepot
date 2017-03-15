<?php
/* Smarty version 3.1.29, created on 2016-09-03 03:20:01
  from "H:\Apache24\htdocs\JoinExcelMysql\templates\list.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ca41612ba363_29306823',
  'file_dependency' => 
  array (
    'a61365b25043464ff6909918127def200f8b9ea8' => 
    array (
      0 => 'H:\\Apache24\\htdocs\\JoinExcelMysql\\templates\\list.tpl',
      1 => 1472822031,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 0,
),true)) {
function content_57ca41612ba363_29306823 ($_smarty_tpl) {
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
            <li class = 'act'><a href = '../c/admin.php?act=add'><span>添加管理员</span></a></li>
            <li class = 'act'><a href = '../c/admin.php?act=del'><span>删除管理员</span></a></li>
            <li class = 'act'><a href = '../c/admin.php?act=upd'><span>修改管理员</span></a></li>

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

        
            <div class = 'infos'>
            
                <li class = 'name'><span>shenshuang</span></li>
                <li class = 'grade'><span>1</span></li>

                <li class = 'operate'>

                    <a href = '../c/admin.php?act=del1&name=shenshuang'><span>删除</span></a>
                    <a href = '../c/admin.php?act=upd1&name=shenshuang'><span>修改</span></a>
                    
                </li>

            </div>

            <div class = 'none'></div>

        
            <div class = 'infos'>
            
                <li class = 'name'><span>NewTest2</span></li>
                <li class = 'grade'><span>2</span></li>

                <li class = 'operate'>

                    <a href = '../c/admin.php?act=del1&name=NewTest2'><span>删除</span></a>
                    <a href = '../c/admin.php?act=upd1&name=NewTest2'><span>修改</span></a>
                    
                </li>

            </div>

            <div class = 'none'></div>

        
            <div class = 'infos'>
            
                <li class = 'name'><span>shenshuang2</span></li>
                <li class = 'grade'><span>3</span></li>

                <li class = 'operate'>

                    <a href = '../c/admin.php?act=del1&name=shenshuang2'><span>删除</span></a>
                    <a href = '../c/admin.php?act=upd1&name=shenshuang2'><span>修改</span></a>
                    
                </li>

            </div>

            <div class = 'none'></div>

        
            <div class = 'infos'>
            
                <li class = 'name'><span>1111111111</span></li>
                <li class = 'grade'><span>3</span></li>

                <li class = 'operate'>

                    <a href = '../c/admin.php?act=del1&name=1111111111'><span>删除</span></a>
                    <a href = '../c/admin.php?act=upd1&name=1111111111'><span>修改</span></a>
                    
                </li>

            </div>

            <div class = 'none'></div>

        
        <div class = 'page'>

            &nbsp;当前第&nbsp;1页&nbsp;&nbsp;&nbsp;&nbsp;总共&nbsp;1&nbsp;页&nbsp;&nbsp;&nbsp;本页显示&nbsp;4&nbsp;条记录&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp显示&nbsp;1&nbsp;到&nbsp;4条&nbsp&nbsp总共&nbsp;4&nbsp;条记录&nbsp
            
        </div>
        
    </div>

</body>
</html><?php }
}
