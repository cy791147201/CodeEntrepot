<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>查找管理员页</title>
    <meta http-equiv = 'Content-Type' content = 'text/html; charset = utf-8' />
    <meta name = 'keywords' content = '查找管理员页面' />
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
   
        <div class = 'info'>

            <li class = 'name'><span>管理员用户名称</span></li>
            <li class = 'grade'><span>管理员用户等级</span></li>
            <li class = 'operate'><span>操作</span></li>
            
        </div>

        <{foreach $data as $v}>

            <div class = 'infos'>
            
                <li class = 'name'><span><{$v.name}></span></li>
                <li class = 'grade'><span><{$v.grade}></span></li>

                <li class = 'operate'>

                    <a href = '../c/admin.php?act=del1&name=<{$v.name}>'><span>删除</span></a>
                    <a href = '../c/admin.php?act=upd1&name=<{$v.name}>'><span>修改</span></a>
                    
                </li>

            </div>

            <div class = 'none'></div>

        <{/foreach}>

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

    }
</script>

</html>