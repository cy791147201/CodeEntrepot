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


    <!-- 筛选数据 -->
    <div class = 'ExcelFather' id = 'ScreenData'>
        <div class = 'tit'>
            <span><?php echo ($sta); ?>&nbsp;&nbsp;筛选数据&nbsp;&nbsp;配置</span>
        </div>
        <div class = 'ScreenDataInfo'>
            <form action = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Excel/DoScreenData?act=upds' method = 'post'>
                <?php if(is_array($data)): foreach($data as $key=>$v): ?><input type = 'hidden' name = 'shenshuang<?php echo ($v["s_id"]); ?>["id"]' value = '<?php echo ($v["s_id"]); ?>' />
                    <div class = 'ScreenDataHandle'>
                        <div class = 'ScreenDataHandleNotice'>
                            <span>
                                <?php if($v["s_act"] == 1): ?>筛选<strong style = 'color: #FF7256;'>用户</strong>缺失数据
                                <?php elseif($v["s_act"] == 2): ?>
                                    筛选<strong style = 'color: #FF7256;'>快递</strong>缺失数据
                                <?php elseif($v["s_act"] == 3): ?>
                                    导出问题件
                                <?php elseif($v["s_act"] == 4): ?>
                                    更新用户表<?php endif; ?>
                            </span>
                        </div>
                        <div class = 'ScreenDataHandleReason'>
                            <span>根据</span>
                        </div>
                        <div class = 'ScreenDataHandleUser'>
                            <span>
                                <strong style = 'color: red;'>
                                    <?php if($v["s_act"] == 2): ?>用户
                                    <?php elseif($v["s_act"] == 3): ?>
                                        当
                                    <?php else: ?>
                                        快递<?php endif; ?>
                                </strong>表中
                            </span>
                        </div>
                        <!-- 第一列select -->
                        <div class = 'ScreenDataHandleField'>
                            <?php if($v["s_act"] == 2): ?><select name = "shenshuang<?php echo ($v["s_id"]); ?>[User]">
                                    <option value = '<?php echo ($v["u_val"]); ?>' selected = ''><span>当前选择----<?php echo ($v["value2"]); ?></span></option>
                                    <option value = 'shenshuang'><span>空</span></option>
                                    <?php if(is_array($v["UserTemp"])): foreach($v["UserTemp"] as $key=>$val): ?><option value = '<?php echo ($val["line"]); ?>'><span><?php echo ($val["l_val"]); ?></span></option><?php endforeach; endif; ?>
                                </select>
                            <?php else: ?>
                                <select name = "shenshuang<?php echo ($v["s_id"]); ?>[Express]">
                                    <option value = '<?php echo ($v["e_val"]); ?>' selected = ''><span>当前选择----<?php echo ($v["value1"]); ?></span></option>
                                    <option value = 'shenshuang'><span>空</span></option>
                                    <?php if(is_array($v["ExpressTemp"])): foreach($v["ExpressTemp"] as $key=>$val): ?><option value = '<?php echo ($val["line"]); ?>'><span><?php echo ($val["l_val"]); ?></span></option><?php endforeach; endif; ?>
                                </select><?php endif; ?>
                        </div>
                        <div class = 'ScreenDataHandleUser'>
                            <span>
                                <?php if($v["s_act"] == 1): ?><strong style = 'color: #FF7256;'>用户</strong>表中
                                <?php elseif($v["s_act"] == 2): ?>
                                    <strong style = 'color: #FF7256;'>快递</strong>表中
                                <?php elseif($v["s_act"] == 3): ?>
                                    <span>的值为</span><?php endif; ?>
                            </span>
                        </div>
                        <!-- 第二列 -->
                        <div class = 'ScreenDataHandleField'>
                            <?php if($v["s_act"] == 1): ?><select name = "shenshuang<?php echo ($v["s_id"]); ?>[User]">
                                    <option value = '<?php echo ($v["e_val"]); ?>' selected = ''><span>当前选择----<?php echo ($v["value1"]); ?></span></option>
                                    <option value = 'shenshuang'><span>空</span></option>
                                    <?php if($v["s_act"] == 1): if(is_array($v["UserTemp"])): foreach($v["UserTemp"] as $key=>$val): ?><option value = '<?php echo ($val["line"]); ?>'><span><?php echo ($val["l_val"]); ?></span></option><?php endforeach; endif; ?>
                                    <?php elseif($v["s_act"] == 2): ?>
                                        <?php if(is_array($v["ExpressTemp"])): foreach($v["ExpressTemp"] as $key=>$val): ?><option value = '<?php echo ($val["line"]); ?>'><span><?php echo ($val["l_val"]); ?></span></option><?php endforeach; endif; endif; ?>
                                </select>
                            <?php elseif($v["s_act"] == 2): ?>
                                <select name = "shenshuang<?php echo ($v["s_id"]); ?>[Express]">
                                    <option value = '<?php echo ($v["u_val"]); ?>' selected = ''><span>当前选择----<?php echo ($v["value2"]); ?></span></option>
                                    <option value = 'shenshuang'><span>空</span></option>
                                    <?php if($v["s_act"] == 1): if(is_array($v["UserTemp"])): foreach($v["UserTemp"] as $key=>$val): ?><option value = '<?php echo ($val["line"]); ?>'><span><?php echo ($val["l_val"]); ?></span></option><?php endforeach; endif; ?>
                                    <?php elseif($v["s_act"] == 2): ?>
                                        <?php if(is_array($v["ExpressTemp"])): foreach($v["ExpressTemp"] as $key=>$val): ?><option value = '<?php echo ($val["line"]); ?>'><span><?php echo ($val["l_val"]); ?></span></option><?php endforeach; endif; endif; ?>
                                </select>
                            <?php elseif($v["s_act"] == 3): ?>
                                <input type = 'text' name = 'shenshuang3[User]' placeholder = '空的话使用空字表示，多个使用,隔开' value = '<?php echo ($v["u_val"]); ?>' /><?php endif; ?>
                        </div>
                        <div class = 'ScreenDataHandleScreen'>
                            <strong style = 'color: red;'>
                                <?php if($v["s_act"] == 1): ?><span>筛选</span>
                                <?php elseif($v["s_act"] == 2): ?>
                                    <span>筛选</span>
                                <?php elseif($v["s_act"] == 3): ?>
                                    <span>为问题件</span>
                                <?php elseif($v["s_act"] == 4): ?>
                                    <span>更新</span><?php endif; ?>
                            </strong>
                        </div>
                        <div class = 'ScreenDataHandleCustom'>
                            <span><strong style = 'color: red;'>自定义</strong>名称</span>
                        </div>
                        <div class = 'ScreenDataHandleName'>
                            <?php if($v["s_act"] == 1): ?><input type = 'text' name = "shenshuang<?php echo ($v["s_id"]); ?>[name]" value = '<?php echo ($v["name"]); ?>' placeholder = '自定义操作名称，尽量短' />
                                <input type = 'hidden' name = 'shenshuang<?php echo ($v["s_id"]); ?>[act]' value = '<?php echo ($v["s_act"]); ?>'>
                            <?php elseif($v["s_act"] == 2): ?>
                                <input type = 'text' name = "shenshuang<?php echo ($v["s_id"]); ?>[name]" value = '<?php echo ($v["name"]); ?>' placeholder = '自定义操作名称，尽量短' />
                                <input type = 'hidden' name = 'shenshuang<?php echo ($v["s_id"]); ?>[act]' value = '<?php echo ($v["s_act"]); ?>'>
                            <?php elseif($v["s_act"] == 3): ?>
                                <input type = 'text' name = "shenshuang<?php echo ($v["s_id"]); ?>[name]" value = '<?php echo ($v["name"]); ?>' placeholder = '自定义操作名称，尽量短' />
                                <input type = 'hidden' name = 'shenshuang<?php echo ($v["s_id"]); ?>[act]' value = '<?php echo ($v["s_act"]); ?>'>
                            <?php elseif($v["s_act"] == 4): ?>
                                <input type = 'text' name = "shenshuang<?php echo ($v["s_id"]); ?>[name]" value = '<?php echo ($v["name"]); ?>' placeholder = '自定义操作名称，尽量短' />
                                <input type = 'hidden' name = 'shenshuang<?php echo ($v["s_id"]); ?>[act]' value = '<?php echo ($v["s_act"]); ?>'><?php endif; ?>
                        </div>
                    </div><?php endforeach; endif; ?>
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