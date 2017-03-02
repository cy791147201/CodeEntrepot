<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>操作管理员首页</title>
<meta http-equiv = 'Content-Type' content = 'text/html; charset = utf-8' />
<link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/FiltrateIndent/Public/Css/home.css'>
<script src = '/ge_ren_zhong_xin/FiltrateIndent/Public/Js/Home.js' type = 'text/javascript' charset = 'utf-8'></script>
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
            <a href = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Excel/index' title = 'Excel操作'>
                <span>Excel操作</span>
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
            <a href = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Handle/LoginOut' title = '退出并清空登录信息'>
                <span>退出</span>
            </a>
        </li>
    </ul>
</div>

    
    <div class = 'replace' id = 'AdminHandle'>
        <div class = 'AdminHandle' onclick = 'Replace("replace", "AddAdmin");'>
            <span>添加管理员</span>
        </div>
        <div class = 'AdminHandle' onclick = 'Replace("replace", "DelAdmin");'>
            <span>删除管理员</span>
        </div>
        <div class = 'AdminList'>
            <a href = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Handle/HandleAdmin?act=list' title = '查看用户列表'>
                <span>列表</span>
            </a>
        </div>
        <div class = 'AdminHandle' onclick = 'Replace("replace", "UpdAdmin");'>
            <span>修改管理员</span>
        </div>
        <div class = 'AdminHandle' onclick = 'Replace("replace", "FindAdmin");'>
            <span>查找管理员</span>
        </div>
    </div>

    <div class = 'replace' id = 'AddAdmin'>
        <div class = 'title'>
            <span>添加管理员</span>
        </div>
        <div class = 'AddAdminNotice'>
            请细心填写
        </div>
        <div class = 'form'>
            <span>用户名</span>
            <span>用户密码</span>
            <span>确认密码</span>
            <span id = 'grade'>权限</span>
        </div>
        <form action = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Handle/HandleAdmin?act=add' method = 'post' name = 'form1' onsubmit = 'return CheackReIn("add");'>
            <input type = 'text' name = 'user1' placeholder = '请填写用户名' />
            <input type = 'text' name = 'pwd1' placeholder = '请填写用户密码' />
            <input type = 'text' name = 'repwd1' placeholder = '请确认用户密码' />
            <select name = 'grade'>
                <option value = '2'>用户</option>
                <option value = '1'>管理员</option>
            </select>
            <input type = 'submit' value = '确定' class = 'sub'/>
        </form>
    </div>

    <div class = 'replace' id = 'DelAdmin'>
        <div class = 'title'>
            <span>删除管理员</span>
        </div>
        <div class = 'DelAdminNotice'>
            请细心填写
        </div>
        <div class = 'form'>
            <span>用户名</span>
            <span>再次确认用户名</span>
        </div>
        <form action = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Handle/HandleAdmin?act=del' method = 'post' name = 'form2' onsubmit = 'return CheackReIn("del");'>
            <input type = 'text' name = 'user2' placeholder = '请填写用户名' />
            <input type = 'text' name = 'ReUser2' placeholder = '请确认用户名' />
            <input type = 'submit' value = '确定' class = 'sub'/>
        </form>
    </div>

    <div class = 'replace' id = 'UpdAdmin'>
        <div class = 'title'>
            <span>修改管理员</span>
        </div>
        <div class = 'UpdAdminNotice'>
            请细心填写
        </div>
        <div class = 'form'>
            <span>用户名</span>
            <span>用户密码</span>
            <span>确认密码</span>
            <span id = 'grade'>权限</span>
        </div>
        <form action = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Handle/HandleAdmin?act=upd' method = 'post' name = 'form5' onsubmit = 'return CheackReIn("upd1");'>
            <input type = 'text' name = 'user5' placeholder = '请填写用户名' />
            <input type = 'text' name = 'pwd5' placeholder = '请填写用户密码' />
            <input type = 'text' name = 'repwd5' placeholder = '请确认用户密码' />
            <select name = 'grade'>
                <option value = '2'>用户</option>
                <option value = '1'>管理员</option>
            </select>
            <input type = 'submit' value = '确定' class = 'sub'/>
        </form>
    </div>

    <div class = 'replace' id = 'FindAdmin'>
        <div class = 'title'>
            <span>查找管理员</span>
        </div>
        <div class = 'FindAdminNotice'>
            请细心填写
        </div>
        <div class = 'form'>
            <span>用户名</span>
            <span>再次确认用户名</span>
        </div>
        <form action = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Handle/HandleAdmin?act=find' method = 'post' name = 'form4' onsubmit = 'return CheackReIn("find");'>
            <input type = 'text' name = 'user4' placeholder = '请填写用户名' />
            <input type = 'text' name = 'ReUser4' placeholder = '请确认用户名' />
            <input type = 'submit' value = '确定' class = 'sub'/>
        </form>
    </div>
    
    <div class = 'OneInfo' style = 'display: <?php echo ($OneInfoDisplay); ?>;'>
        <div class = 'replace' id = 'OneInfo'>
            <div class = 'OneInfoTit'>
                <span>用户个人信息</span>
                <span class = 'close' onclick = 'ChangeDisplay("OneInfo");'>关闭</span>
            </div>
            <div class = 'OneInfoTits'>
                <ul>
                    <li>
                        <span>用户ID</span>
                    </li>
                    <li>
                        <span>用户名</span>
                    </li>
                    <li>
                        <span>用户状态</span>
                    </li>
                    <li>
                        <span>注册时间</span>
                    </li>
                    <li>
                        <span>上次登陆时间</span>
                    </li>
                    <li>
                        <span>上次登陆IP</span>
                    </li>
                    <li>
                        <span>权限</span>
                    </li>
                    <li>
                        <span>添加人员ID</span>
                    </li>
                    <li>
                        <span>用户等级</span>
                    </li>
                </ul>
            </div>
            <div class = 'OneInfoInfo'>
                <ul>
                    <li>
                        <span><?php echo ($OneInfo["u_id"]); ?></span>
                    </li>
                    <li>
                        <span><?php echo ($OneInfo["u_name"]); ?></span>
                    </li>
                    <li>
                        <?php if($OneInfo["sta"] == 1): ?><span>正常</span>
                        <?php elseif($OneInfo["sta"] == 0): ?>
                            <span>已删除</span><?php endif; ?>
                    </li>
                    <li>
                        <span><?php echo (date('Y-m-d H-i-s',$OneInfo["r_time"])); ?></span>
                    </li>
                    <li>
                        <span><?php echo (date('Y-m-d H-i-s',$OneInfo["l_time"])); ?></span>
                    </li>
                    <li>
                        <span><?php echo ($OneInfo["l_ip"]); ?></span>
                    </li>
                    <li>
                        <?php if($OneInfo["jurisdiction"] == admin): ?><span>管理员</span>
                        <?php elseif($OneInfo["jurisdiction"] == user): ?>
                            <span>用户</span><?php endif; ?>
                    </li>
                    <li>
                        <span><?php echo ($OneInfo["w_add"]); ?></span>
                    </li>
                    <li>
                        <span><?php echo ($OneInfo["grade"]); ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div id = 'ListInfo' class = 'replace' style = 'display: <?php echo ($ListInfoDisplay); ?>;'>
        <div class = 'ListInfoTit'>
            <span>管理员列表页</span>
        </div>
        <div class = 'ListInfoTits'>
            <ul>
                <li id = 'batch'>
                    &nbsp;
                </li>
                <li class = 'ListInfoId'>
                    <span>用户ID</span>
                </li>
                <li class = 'ListInfoName'>
                    <span>用户名</span>
                </li>
                <li class = 'ListInfoSta'>
                    <span>用户状态</span>
                </li>
                <li class = 'ListInfoRtime'>
                    <span>注册时间</span>
                </li>
                <li class = 'ListInfoLtime'>
                    <span>上次登录</span>
                </li>
                <li class = 'ListInfoLip'>
                    <span>登录IP</span>
                </li>
                <li class = 'ListInfoQuXian'>
                    <span>权限</span>
                </li>
                <li class = 'ListInfoWadd'>
                    <span>添加人员ID</span>
                </li>
                <li class = 'ListInfoGrade'>
                    <span>用户等级</span>
                </li>
                <li id = 'ListInfoHandle'>
                    <span>操作</span>
                </li>
            </ul>
        </div>

        <!-- <form action = '' method = 'post'> -->
            <?php if(is_array($ListInfo)): foreach($ListInfo as $key=>$v): ?><div class = 'ListInfoInfo'>
                    <ul>
                        <li id = 'batch'>
                            <!-- <input type = 'radio' name = 'ids[]' /> -->
                        </li>
                        <li onmouseover = 'ChangeLineColor(this, 1);' onmouseout = 'ChangeLineColor(this, 2);' class = 'ListInfoId'>
                            <a href = 'javascript:void(0);' title = '用户的ID'>
                                <span><?php echo ($v["u_id"]); ?></span>
                            </a>
                        </li>
                        <li onmouseover = 'ChangeLineColor(this, 1);' onmouseout = 'ChangeLineColor(this, 2);' class = 'ListInfoName'>
                            <!-- <a href = 'javascript:void(0);' title = '用户名'> -->
                                <span><?php echo ($v["u_name"]); ?></span>
                            <!-- </a> -->
                        </li>
                        <li onmouseover = 'ChangeLineColor(this, 1);' onmouseout = 'ChangeLineColor(this, 2);' class = 'ListInfoSta'>
                            <a href = 'javascript:void(0);' title = '用户账户状态'>
                                <?php if($v["sta"] == 1): ?><span>正在使用</span>
                                <?php elseif($v["sta"] == 0): ?>
                                    <span>已删除</span><?php endif; ?>
                            </a>
                        </li>
                        <li id = 'ListInfoRtime' onmouseover = 'ChangeLineColor(this, 1);' onmouseout = 'ChangeLineColor(this, 2);' class = 'ListInfoRtime'>
                            <a href = 'javascript:void(0);' title = '用户注册时间'>
                                <span><?php echo (date('Y-m-d H:i:s',$v["r_time"])); ?></span>
                            </a>
                        </li>
                        <li id = 'ListInfoLtime' onmouseover = 'ChangeLineColor(this, 1);' onmouseout = 'ChangeLineColor(this, 2);' class = 'ListInfoLtime'>
                            <a href = 'javascript:void(0);' title = '用户上次登录时间'>
                                <span><?php echo (date('Y-m-d H:i:s',$v["l_time"])); ?></span>
                            </a>
                        </li>
                        <li onmouseover = 'ChangeLineColor(this, 1);' onmouseout = 'ChangeLineColor(this, 2);' class = 'ListInfoLip'>
                            <a href = 'javascript:void(0);' title = '用户上次登录IP'>
                                <span><?php echo ($v["l_ip"]); ?></span>
                            </a>
                        </li>
                        <li onmouseover = 'ChangeLineColor(this, 1);' onmouseout = 'ChangeLineColor(this, 2);' class = 'ListInfoQuXian'>
                            <a href = 'javascript:void(0);' title = '用户权限'>
                                <?php if($v["jurisdiction"] == admin): ?><span>管理员</span>
                                <?php elseif($v["jurisdiction"] == user): ?>
                                    <span>用户</span><?php endif; ?>
                            </a>
                        </li>
                        <li onmouseover = 'ChangeLineColor(this, 1);' onmouseout = 'ChangeLineColor(this, 2);' class = 'ListInfoWadd'>
                            <a href = 'javascript:void(0);' title = '谁添加的该用户'>
                                <span><?php echo ($v["w_add"]); ?></span>
                            </a>
                        </li>
                        <li onmouseover = 'ChangeLineColor(this, 1);' onmouseout = 'ChangeLineColor(this, 2);' class = 'ListInfoGrade'>
                            <a href = 'javascript:void(0);' title = '用户等级'>
                                <span><?php echo ($v["grade"]); ?></span>
                            </a>
                        </li>
                        <li id = 'ListInfoHandle' onmouseover = 'ChangeLineColor(this, 1);' onmouseout = 'ChangeLineColor(this, 2);' class = 'ListInfoHandle'>
                            <?php if($v["sta"] == 0): ?><a href = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Handle/HandleAdmin?act=del&id=<?php echo ($v["u_id"]); ?>&sta=0' title = '删除管理员' class = 'ListInfoDel'>
                                    <span>启用</span>
                                </a>
                            <?php elseif($v["sta"] == 1): ?>
                                <a href = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Handle/HandleAdmin?act=del&id=<?php echo ($v["u_id"]); ?>&sta=1' title = '删除管理员' class = 'ListInfoDel'>
                                    <span>删除</span>
                                </a><?php endif; ?>
                            <a href = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Handle/HandleAdmin?act=UpdOne&id=<?php echo ($v["u_id"]); ?>' title = '修改管理员' class = 'ListInfoUpd'>
                                <span>修改</span>
                            </a>
                        </li>
                    </ul>
                </div><?php endforeach; endif; ?>

        <div class = 'page'>
            <!-- <input type = 'submit' value = '批量删除' /> -->
            <?php echo ($page); ?>
        </div>

        <!-- </form> -->

    </div>

    <div class = '<?php echo ($AdminListUpdOneDisplay); ?>' style = 'display: none;'></div>
    <div class = 'replace' id = 'ListUpdOne'>
        <div class = 'title'>
            <span>修改管理员</span>
        </div>
        <div class = 'UpdAdminNotice1'>
            请细心填写
        </div>
        <div class = 'form'>
            <span>用户名</span>
            <span>用户密码</span>
            <span>确认密码</span>
            <span id = 'grade'>权限</span>
        </div>
        <form action = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Handle/HandleAdmin?act=upd' method = 'post' name = 'form3' onsubmit = 'return CheackReIn("upd");'>
            <input type = 'hidden' name = 'id' value = '<?php echo ($UpdOneInfo["u_id"]); ?>'/>
            <input type = 'text' name = 'user3' value = '<?php echo ($UpdOneInfo["u_name"]); ?>'/>
            <input type = 'text' name = 'pwd3' placeholder = '请输入用户密码' />
            <input type = 'text' name = 'repwd3' placeholder = '请确认密码' />
            <select name = 'grade'>
                <option value = '2'>用户</option>
                <option value = '1'>管理员</option>
            </select>
            <input type = 'submit' value = '确定' class = 'sub'/>
        </form>
    </div>

    <link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/FiltrateIndent/Public/Css/foot.css'>
<div class = 'foot'>
    <span class = 'FootNotice'>细心永远是对的</span>
</div>
</body>
</html>