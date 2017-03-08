<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>Excel操作首页</title>
<link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/FiltrateIndent/Public/Css/reset.css'>
<link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/FiltrateIndent/Public/Css/ScreenSet.css'>
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


    <div class = 'ExcelFather' id = 'ScreenData'>
        <div class = 'tit'>
            <span><?php echo ($sta); ?>&nbsp;&nbsp;筛选数据&nbsp;&nbsp;配置</span>
        </div>
        <div class = 'ScreenDataInfo'>
            <form action = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Excel/DoScreenData?act=adds' method = 'post'>

                <div class = 'ScreenDataHandle'>
                    <div class = 'ScreenDataHandleNotice'>
                        <span>筛选<strong style = 'color: #FF7256;'>用户</strong>缺失数据</span>
                    </div>
                    <div class = 'ScreenDataHandleReason'>
                        <span>根据</span>
                    </div>
                    <div class = 'ScreenDataHandleUser'>
                        <span><strong style = 'color: red;'>快递</strong>表中</span>
                    </div>
                    <div class = 'ScreenDataHandleField'>
                        <select name = "shenshuang1[Express]">
                            <option value = 'shenshuang' selected = ''><span>选择该项则表示此项为空</span></option>
                            <?php if(is_array($data["ExpressTemp"])): foreach($data["ExpressTemp"] as $key=>$v): ?><option value = '<?php echo ($v["line"]); ?>'><span><?php echo ($v["l_val"]); ?></span></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div class = 'ScreenDataHandleUser'>
                        <span><strong style = 'color: #FF7256;'>用户</strong>表中</span>
                    </div>
                    <div class = 'ScreenDataHandleField'>
                        <select name = "shenshuang1[User]">
                            <option value = 'shenshuang' selected = ''><span>选择该项则表示此项为空</span></option>
                            <?php if(is_array($data["UserTemp"])): foreach($data["UserTemp"] as $key=>$v): ?><option value = '<?php echo ($v["line"]); ?>'><span><?php echo ($v["l_val"]); ?></span></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div class = 'ScreenDataHandleScreen'>
                        <span>筛选</span>
                    </div>
                    <div class = 'ScreenDataHandleCustom'>
                        <span><strong style = 'color: red;'>自定义</strong>名称</span>
                    </div>
                    <div class = 'ScreenDataHandleName'>
                        <input type = 'text' name = "shenshuang1[name]" placeholder = '请输入自定义名称，尽量短' />
                        <input type = 'hidden' name = 'shenshuang1[act]' value = '1' />
                    </div>
                </div>

                <div class = 'ScreenDataHandle'>
                    <div class = 'ScreenDataHandleNotice'>
                        <span>筛选<strong style = 'color: red;'>快递</strong>缺失数据</span>
                    </div>
                    <div class = 'ScreenDataHandleReason'>
                        <span>根据</span>
                    </div>
                    <div class = 'ScreenDataHandleUser'>
                        <span><strong style = 'color: #FF7256;'>用户</strong>表中</span>
                    </div>
                    <div class = 'ScreenDataHandleField'>
                        <select name = "shenshuang2[User]">
                            <option value = 'shenshuang' selected = ''><span>选择该项则表示此项为空</span></option>
                            <?php if(is_array($data["UserTemp"])): foreach($data["UserTemp"] as $key=>$v): ?><option value = '<?php echo ($v["line"]); ?>'><span><?php echo ($v["l_val"]); ?></span></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div class = 'ScreenDataHandleUser'>
                        <span><strong style = 'color: red;'>快递</strong>表中</span>
                    </div>
                    <div class = 'ScreenDataHandleField'>
                        <select name = "shenshuang2[Express]">
                            <option value = 'shenshuang' selected = ''><span>选择该项则表示此项为空</span></option>
                            <?php if(is_array($data["ExpressTemp"])): foreach($data["ExpressTemp"] as $key=>$v): ?><option value = '<?php echo ($v["line"]); ?>'><span><?php echo ($v["l_val"]); ?></span></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div class = 'ScreenDataHandleScreen'>
                        <span>筛选</span>
                    </div>
                    <div class = 'ScreenDataHandleCustom'>
                        <span><strong style = 'color: red;'>自定义</strong>名称</span>
                    </div>
                    <div class = 'ScreenDataHandleName'>
                        <input type = 'text' name = "shenshuang2[name]" placeholder = '请输入自定义名称，尽量短' />
                        <input type = 'hidden' name = 'shenshuang2[act]' value = '2' />
                    </div>
                </div>

                <div class = 'ScreenDataHandle'>
                    <div class = 'ScreenDataHandleNotice'>
                        <span>导出问题件</span>
                    </div>
                    <div class = 'ScreenDataHandleReason'>
                        <span>根据</span>
                    </div>
                    <div class = 'ScreenDataHandleUser'>
                        <span><strong style = 'color: red;'>快递</strong>表中</span>
                    </div>
                    <div class = 'ScreenDataHandleField'>
                        <select name = "shenshuang3[Express]">
                            <option value = 'shenshuang' selected = ''><span>选择该项则表示此项为空</span></option>
                            <?php if(is_array($data["ExpressTemp"])): foreach($data["ExpressTemp"] as $key=>$v): ?><option value = '<?php echo ($v["line"]); ?>'><?php echo ($v["l_val"]); ?></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div class = 'ScreenDataHandleUser'>
                    </div>
                    <div class = 'ScreenDataHandleField'>
                    </div>
                    <div class = 'ScreenDataHandleScreen'>
                        <span>导出</span>
                    </div>
                    <div class = 'ScreenDataHandleCustom'>
                        <span><strong style = 'color: red;'>自定义</strong>名称</span>
                    </div>
                    <div class = 'ScreenDataHandleName'>
                        <input type = 'text' name = "shenshuang3[name]" placeholder = '请输入自定义名称，尽量短' />
                        <input type = 'hidden' name = 'shenshuang3[act]' value = '3' />
                    </div>
                </div>

                <div class = 'ScreenDataHandle'>
                    <div class = 'ScreenDataHandleNotice'>
                        <span>更新用户表订单状态</span>
                    </div>
                    <div class = 'ScreenDataHandleReason'>
                        <span>根据</span>
                    </div>
                    <div class = 'ScreenDataHandleUser'>
                        <span><strong style = 'color: red;'>快递</strong>表中</span>
                    </div>
                    <div class = 'ScreenDataHandleField'>
                        <select name = "shenshuang4[Express]">
                            <option value = 'shenshuang' selected = ''><span>选择该项则表示此项为空</span></option>
                            <?php if(is_array($data["ExpressTemp"])): foreach($data["ExpressTemp"] as $key=>$v): ?><option value = '<?php echo ($v["line"]); ?>'><span><?php echo ($v["l_val"]); ?></span></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div class = 'ScreenDataHandleUser'>
                    </div>
                    <div class = 'ScreenDataHandleField'>
                    </div>
                    <div class = 'ScreenDataHandleScreen'>
                        <span>更新</span>
                    </div>
                    <div class = 'ScreenDataHandleCustom'>
                        <span><strong style = 'color: red;'>自定义</strong>名称</span>
                    </div>
                    <div class = 'ScreenDataHandleName'>
                        <input type = 'text' name = "shenshuang4[name]" placeholder = '请输入自定义名称，尽量短' />
                        <input type = 'hidden' name = 'shenshuang4[act]' value = '4' />
                    </div>
                </div>
                <input type = 'submit' value = '确认提交' class = 'sub'/>
            </form>
        </div>
    </div>

    <link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/FiltrateIndent/Public/Css/foot.css'>
<div class = 'foot'>
    <span class = 'FootNotice'>细心永远是对的</span>
</div>
</body>
</html>