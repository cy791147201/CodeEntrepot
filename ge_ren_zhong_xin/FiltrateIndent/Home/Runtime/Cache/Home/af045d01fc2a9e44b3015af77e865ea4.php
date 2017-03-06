<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>Excel操作首页</title>
<link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/FiltrateIndent/Public/Css/reset.css'>
<link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/FiltrateIndent/Public/Css/excel.css'>
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

    
    <!-- Excel首页操作 -->
    <div class = 'ExcelFather' id = 'ExcelFather'>
        <div class = 'ExcelMother'>
          <!--   <div class = 'ExcelHandle'>
                <a href = 'javascript:void(0);' onclick = 'ChangeDisplay("ExcelFather", "AddExcelTemp");' title = '添加Excel模版'>
                    <span>添加Excel模版</span>
                </a>
            </div> -->
            <div class = 'ExcelHandle'>
                <a href = 'javascript:void(0);' onclick = 'ChangeDisplay("ExcelTemp");' title = 'Excel模版操作'>
                    <span>Excel模版</span>
                </a>
            </div>
            <div class = 'ExcelHandle'>
                <a href = 'javascript:void(0);' onclick = 'ChangeDisplay("ExcelFather", "LeadInExcel");' title = '导入Excel数据'>
                    <span>导入数据</span>
                </a>
            </div>
            <div class = 'ExcelHandle'>
                <a href = 'javascript:void(0);' onclick = 'ChangeDisplay("ExcelFather", "LeadInExcel");' title = '导入Excel数据'>
                    <span>筛选数据</span>
                </a>
            </div>
            <!-- <div class = 'ExcelHandle'>
                <a href = 'javascript:void(0);' title = '导出快递Excel中有而用户Excel中没有的数据'>
                    <span>导出用户缺失的数据</span>
                </a>
            </div>
            <div class = 'ExcelHandle'>
                <a href = 'javascript:void(0);' title = '导出快递Excel中没有有而用户Excel中有的数据'>
                    <span>导出快递缺失的数据</span>
                </a>
            </div>
            <div class = 'ExcelHandle'>
                <a href = 'javascript:void(0);' title = '导出快递Excel中的处理结果为问题件的数据'>
                    <span>导出问题件</span>
                </a>
            </div>
            <div class = 'ExcelHandle'>
                <a href = 'javascript:void(0);' title = '更新用户Excel表中的快递状态'>
                    <span>更新订单状态</span>
                </a>
            </div> -->
        </div>
    </div>
    
    <!-- Excel模版界面 -->
    <div class = 'ExcelFather' id = 'ExcelTemp'>
        <div class = 'ExcelTempHome'>
            <span class = 'ExcelTempHomeSpan'>用户</span>
            <div>
                <a href = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Excel/ShowTemp?temp=user' title = '用户当前模版'>
                    <span>当前模版</span>
                </a>
            </div>
            <div>
                <a href = 'javascript:void(0);' onclick = 'ChangeDisplay("FileUpUserTemp");' title = 'Excel导入用户模版'>
                    <span>Excel导入模版</span>
                </a>
            </div>
            <div>
                <a href = 'javascript:void(0);' onclick = 'ChangeDisplay("HandAddUserTemp");' title = '手动添加&nbsp;&nbsp;用户&nbsp;&nbsp;模版'>
                    <span>手动添加模版</span>
                </a>
            </div>
        </div>
        <div class = 'ExcelTempHome' style = 'margin-top: 10px;'>
            <span class = 'ExcelTempHomeSpan'>快递</span>
            <div>
                <a href = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Excel/ShowTemp?temp=express' title = '快递当前模版'>
                    <span>当前模版</span>
                </a>
            </div>
            <div>
                <a href = 'javascript:void(0);' onclick = 'ChangeDisplay("FileUpExpressTemp");' title = 'Excel导入快递模版'>
                    <span>Excel导入模版</span>
                </a>
            </div>
            <div>
                <a href = 'javascript:void(0);' onclick = 'ChangeDisplay("HandAddExpressTemp");' title = '手动添加&nbsp;&nbsp;快递&nbsp;&nbsp;Excel模版'>
                    <span>手动添加模版</span>
                </a>
            </div>
        </div>
    </div>

    <!-- 手动添加Excel模版 -->
    <div class = 'ExcelFather' id = 'HandAddUserTemp'>
        <div class = 'tit'>
            <span>手动添加&nbsp;&nbsp;用户&nbsp;&nbsp;Excel模版</span>
        </div>
        <div class = 'HandAdd'>
            <div id = 'HandAddButton'>
                <button type = 'button' class = 'HandAddButton' onclick = 'AddHandInput("HandAddInpit1");'>添加</button>
            </div>
            <div class = 'HandAddForm'>
                <form action = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Excel/DoHandAdd?temp=myself' method = 'post'>
                    <div id = 'HandAddInpit1'></div>
                    <input type = 'submit' value = '提交' id = 'sub' />
                </form>
            </div>
        </div>
    </div>
    <div class = 'ExcelFather' id = 'HandAddExpressTemp'>
        <div class = 'tit'>
            <span>手动添加&nbsp;&nbsp;快递&nbsp;&nbsp;Excel模版</span>
        </div>
        <div class = 'HandAdd'>
            <div id = 'HandAddButton'>
                <button type = 'button' class = 'HandAddButton' onclick = 'AddHandInput("HandAddInpit2");'>添加</button>
            </div>
            <div class = 'HandAddForm'>
                <form action = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Excel/DoHandAdd?temp=express' method = 'post'>
                    <div id = 'HandAddInpit2'></div>
                    <input type = 'submit' value = '提交' id = 'sub' />
                </form>
            </div>
        </div>
    </div>

    <!-- Excel上传文件模版 -->
    <div class = 'ExcelFather' id = 'FileUpUserTemp'>
        <div class = 'tit'>
            <span>手动添加&nbsp;&nbsp;用户&nbsp;&nbsp;Excel模版</span>
        </div>
        <form action = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Excel/DoExcelAdd?temp=myself' method = 'post' enctype = 'multipart/form-data' id = 'FileUpTempAct' onsubmit = 'return CheckFileType("1", "file");'>
            <div class = 'FileUpTempDiv'>
                <input type = 'file' name = 'file' onchange = "CheckFileType('2', this)"/>
            </div>
            <div class = 'FileUpTempDiv'>
                <input type = 'submit' value = '确认上传' id = 'FileUpTempSub'/>
            </div>
        </form>
    </div>
    <div class = 'ExcelFather' id = 'FileUpExpressTemp'>
        <div class = 'tit'>
            <span>手动添加&nbsp;&nbsp;快递&nbsp;&nbsp;Excel模版</span>
        </div>
        <form action = '/ge_ren_zhong_xin/FiltrateIndent/index.php/Home/Excel/DoExcelAdd?temp=express' method = 'post' enctype = 'multipart/form-data' id = 'FileUpTempAct' onsubmit = 'return CheckFileType("1", "file");'>
            <div class = 'FileUpTempDiv'>
                <input type = 'file' name = 'file' onchange = "CheckFileType('2', this)"/>
            </div>
            <div class = 'FileUpTempDiv'>
                <input type = 'submit' value = '确认上传' id = 'FileUpTempSub'/>
            </div>
        </form>
    </div>
    


    <link rel = 'stylesheet' type = 'text/css' href = '/ge_ren_zhong_xin/FiltrateIndent/Public/Css/foot.css'>
<div class = 'foot'>
    <span class = 'FootNotice'>细心永远是对的</span>
</div>
</body>
</html>