// 显示对应头部标题的div
function Replace(ClassName, Id)
{
    if(ClassName, Id)
    {
        // 所有class隐藏
        var oClass = document.getElementsByClassName(ClassName);
        if(oClass)
        {
            var nLen = oClass.length;
            var i = 0;
            for(i; i < nLen; i ++)
            {
                oClass[i].style.display = 'none';
            }
        }

        // 只显示当前需要的div
        var obj = document.getElementById(Id);
        if(obj)
        {
            obj.style.display = 'block';
        }
    }
}
// 检查管理员表单
function CheackReIn(tag)
{
    // 检查添加表单
    if(tag == 'add' || tag == 'upd' || tag == 'upd1')
    {
        if(tag == 'upd')
        {
            var oUser = document.form3.user3.value;
            var oPwd = document.form3.pwd3.value;
            var oRepwd = document.form3.repwd3.value;
            var oDiv = document.getElementsByClassName('UpdAdminNotice1')[0];
        }
        else if(tag == 'add')
        {
            var oUser = document.form1.user1.value;
            var oPwd = document.form1.pwd1.value;
            var oRepwd = document.form1.repwd1.value;
            var oDiv = document.getElementsByClassName('AddAdminNotice')[0];
        }
        else if(tag == 'upd1')
        {
            var oUser = document.form5.user5.value;
            var oPwd = document.form5.pwd5.value;
            var oRepwd = document.form5.repwd5.value;
            var oDiv = document.getElementsByClassName('UpdAdminNotice')[0];
        }

        if(oDiv)
        {
            if(/^[a-zA-Z\d]{6,11}$/.test(oUser) === false || oUser === '' || /^[a-zA-Z\d]{6,11}$/.test(oPwd) === false || oPwd === '' || /^[a-zA-Z\d]{6,11}$/.test(oRepwd) === false || oRepwd === '')
            {
                oDiv.innerHTML = '请填写正确的用户信息';
                return false;
            } 
            else if(oPwd !== oRepwd)
            {
                oDiv.innerHTML = '两次输入密码不一致';
                return false;
            }
        }
        else
        {
            return false;
        }
    }
    // 检查删除表单
    else if(tag == 'del' || tag == 'find')
    {
        if(tag == 'find')
        {
            var oUser = document.form4.user4.value;
            var oReUser = document.form4.ReUser4.value;
            var oDiv = document.getElementsByClassName('FindAdminNotice')[0];
        }
        else if(tag == 'del')
        {
            var oUser = document.form2.user2.value;
            var oReUser = document.form2.ReUser2.value;
            var oDiv = document.getElementsByClassName('DelAdminNotice')[0];
        }

        if(oDiv)
        {
            if(/^[a-zA-Z\d]{6,11}$/.test(oUser) === false || oUser === '' || /^[a-zA-Z\d]{6,11}$/.test(oReUser) === false || oReUser === '')
            {
                oDiv.innerHTML = '请填写正确的用户信息';
                return false;
            } 
            else if(oUser !== oReUser)
            {
                oDiv.innerHTML = '两次输入用户名不一致';
                return false;
            }
        }
        else
        {
            return false;
        }
    }
}

// 改变div样式
function ChanegDivStyle()
{
    // 检查页面中是否存在管理员列表修改， 后出现的标识符， 展现修改页面
    var obj1 = document.getElementsByClassName('AdminListUpdOneDisplay')[0];
    if(obj1)
    {
        var obj2 = document.getElementById('ListUpdOne');
        // obj2.style.display = 'block';
        Replace(obj2.className, 'ListUpdOne');
    }
    var oDisplay = document.getElementById('ListInfo');
    var obj3 = document.getElementById('AdminHandle');
    if(oDisplay && obj3)
    {
        if(oDisplay.style.display === 'block')
        {
            obj3.style.display = 'none';
        }
    }

    var obj = document.getElementsByClassName('replace');
    if(obj)
    {   
        // 控制div居中显示
        var nBodyHeight = document.documentElement.clientHeight;
        var nBodyWidth = document.documentElement.clientWidth;
        var nMargin = '';

        var nLen = obj.length;
        var i = 0;
        for(i; i < nLen; i ++)
        {
            if(nBodyHeight && nBodyWidth)
            {
            // if(nBodyHeight && nBodyWidth)
                if(obj[i].id === 'AddAdmin' || obj[i].id === 'UpdAdmin'|| obj[i].id === 'ListUpdOne')
                {
                    nMargin = (nBodyHeight - 656) / 2;
                }
                else if(obj[i].id === 'AdminHandle')
                {
                    nMargin = (nBodyHeight - 370) / 2;
                }
                else if(obj[i].id === 'OneInfo')
                {
                    nMargin = (nBodyHeight - 500) / 2;
                }
                else if(obj[i].id === 'DelAdmin' || obj[i].id === 'FindAdmin')
                {
                    nMargin = (nBodyHeight - 536) / 2;
                }
                obj[i].style.marginTop = nMargin > 60 ? nMargin + 'px': 30 + 'px';
                obj[i].style.marginBottom = nMargin > 60 ? nMargin + 'px': 132 + 'px';
            }
        }
    }
}
// 显示隐藏div
function ChangeDisplay(name)
{
    var oDiv = document.getElementsByClassName(name)[0];
    if(oDiv)
    {
        var bDisplay = oDiv.style.display;
        if(bDisplay == 'block')
        {
            oDiv.style.display = 'none';
        }
        else if(bDisplay == 'none')
        {
            oDiv.style.display = 'block';
        }
    }
}
// 用户列表鼠标经过整列变色
function ChangeLineColor(obj, sta)
{
    var obj1 = obj;
    if(obj1)
    {
        // js修改整列样式
        var obj = document.getElementsByClassName(obj1.className);
        if(obj && obj1.className != 'ListInfoHandle')
        {
            var len = obj.length;
            var i = 0;

            if(sta == 1)
            {
                for(i = 0; i < len; i++)
                {
                    obj[i].index = i;
                    obj[i].style.background = '#EFC0F0';
                    // obj[i].style.color = 'white';
                }
            }
            else if(sta == 2)
            {
                for(i = 0; i < len; i++)
                {
                    obj[i].index = i;
                    // js清除所有class样式
                    obj[i].style.background = '';
                    // obj[i].style.color = '';
                }
            }
        }
    }
}
// 自动改变div样式
window.onload = window.onresize = function()
{
    ChangeLineColor();
    ChanegDivStyle();
}