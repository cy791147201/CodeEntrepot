// 获取目标样式属性
function GetStyle(obj, attr)
{
    if(obj.currentStyle)
    {
        return obj.currentStyle[attr];
    }
    else
    {
        return getComputedStyle(obj, false)[attr];
    }
}
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
function CheackReIn(name, NoticeObj)
{
    var obj = document.getElementsByName(name)[0];
    var oNoticeDiv = document.getElementsByClassName(NoticeObj)[0];
    if(obj && oNoticeDiv)
    {
        var oInputs = obj.getElementsByTagName('input');
        var nLen1 = oInputs.length;
        var oInfo1 = oInputs[nLen1-3].value;
        var oInfo2 = oInputs[nLen1-2].value;

        // 检测确认信息是否一致
        if(oInfo1 !== oInfo2)
        {
            oNoticeDiv.innerHTML = '确认信息错误';
            return false;
        }

        var i = 0;
        for(i; i < nLen1; i ++)
        {
            oInputs[i].index = i;
            var oValue = oInputs[i].value;
            if(oValue === '')
            {
                oNoticeDiv.innerHTML = '用户信息不能为空';
                return false;
            } 
            if(oInputs[i].type !== 'submit')
            {
                if(/^[a-zA-Z\d]{6,19}$/.test(oValue) === false)
                {
                    oNoticeDiv.innerHTML = '请填写正确的用户信息';
                    return false;
                } 
            }
        }
    }
    else
    {
        return false;
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
        // var nBodyWidth = document.documentElement.clientWidth;
        var nMargin = '';

        var nLen = obj.length;
        var i = 0;
        if(nBodyHeight)
        {
            for(i; i < nLen; i ++)
            {
                obj[i].index = i;
                nMargin = (nBodyHeight - parseInt(GetStyle(obj[i], 'height')) - 156) / 2;

                obj[i].style.marginTop = nMargin > 5 ? nMargin + 'px': 32 + 'px';
                obj[i].style.marginBottom = nMargin > 5 ? nMargin + 'px': 132 + 'px';
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