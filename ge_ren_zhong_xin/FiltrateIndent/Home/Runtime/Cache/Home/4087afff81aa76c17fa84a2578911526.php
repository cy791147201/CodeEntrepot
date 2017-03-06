<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>Excel操作首页</title>
<link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/FiltrateIndent/Public/Css/reset.css'>
<link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/FiltrateIndent/Public/Css/ShowTemp.css'>
<script src = '/ge_ren_zhong_xin/FiltrateIndent/Public/Js/excel.js' type = 'text/javascript' charset = 'utf-8'></script>
</head> 
<body>
    <link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/FiltrateIndent/Public/Css/reset.css'>
<link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/FiltrateIndent/Public/Css/head.css'>
<div class = 'HeadFather'>
    <ul>
        <li>
            <a href = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Handle/HandleHome' title = 'Excel操作'>
                <span>首页</span>
            </a>
        </li>
        <li>
            <a href = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Excel/index' title = '圆通Excel操作'>
                <span>圆通Excel操作</span>
            </a>
        </li>
       <!--  <li>
            <a href = 'javascript:void(0);' title = '管理员操作，添加，删除，修改，查找等操作，必须拥有管理员权限，如果你不是管理员又看到这条信息，请联系系统拥有者' onclick = 'Replace("replace", "AdminHandle");'>
                <span>操作管理员</span>
            </a>
        </li> -->
        <li>
            <a href = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Handle/index' title = '管理员操作，添加，删除，修改，查找等操作，必须拥有管理员权限，如果你不是管理员又看到这条信息，请联系系统拥有者'>
                <span>操作管理员</span>
            </a>
        </li>
        <li>
            <a href = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Excel/LoginOut' title = '退出并清空登录信息'>
                <span>退出</span>
            </a>
        </li>
    </ul>
</div>

    
    <div class = 'ExcelFather' id = 'Temp'> 
        <div class = 'tit'>
            <span>
                当前页面为&nbsp;
                <?php if($who == 1): ?>用户
                <?php elseif($who == 2): ?>
                    快递<?php endif; ?>
                &nbsp;模版
            </span>
            <span>添加者&nbsp;<?php echo ($user); ?></span>
            <span>添加时间&nbsp;<?php echo (date('Y-m-d H:i:s',$time)); ?></span>
        </div>
        <div class = 'infos'>
            <form action = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Excel/UpdTemp?temp=<?php echo ($who); ?>' method = 'post' >
                <?php if(is_array($info)): foreach($info as $key=>$v): ?><div class = 'info'>
                        <ul>
                            <li class = 'InfoTitOne'>第</li>
                            <li class = 'InfoTitTwo'><?php echo ($v["line"]); ?></li>
                            <li class = 'InfoTitThree'>列数据名称为</li>
                            <li class = 'InfoTitFour'><?php echo ($v["l_val"]); ?></li>
                            <li class = 'InfoTitFive'>修改为</li>
                            <li class = 'InfoTitSeven'>
                                <input type = 'text' name = 'val[<?php echo ($v["id"]); ?>]' placeholder = '输入想要修改的名称' />
                            </li>
                        </ul>
                    </div><?php endforeach; endif; ?>
                <input type = 'submit' value = '确认修改' class = 'sub'/>
            </form>
        </div>
    </div>    

    <link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/FiltrateIndent/Public/Css/foot.css'>
<div class = 'foot'>
    <span class = 'FootNotice'>细心永远是对的</span>
</div>
</body>
</html>