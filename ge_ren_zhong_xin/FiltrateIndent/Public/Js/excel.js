// 改变div样式
function ChanegDivStyle()
{
    var obj = document.getElementsByClassName('ExcelFather');
    if(obj)
    {   
        // 控制div居中显示
        var nBodyHeight = document.documentElement.clientHeight;
        var nBodyWidth = document.documentElement.clientWidth;
        // var obj1 = document.getElementsByClassName('ExcelHandles');

        if(nBodyHeight && nBodyWidth)
        {
            var nMargin = '';
            var nLen1 = obj.length;
            var i = 0;
            for(i; i < nLen1; i ++)
            {
                if(obj[i].id === 'ExcelFather')
                {
                    nMargin = (nBodyHeight - 450) / 2;
                }
                else if(obj[i].id === 'FileUpTemp')
                {
                    nMargin = (nBodyHeight - 373) / 2;
                }
                else if(obj[i].id === 'AddExcelTemp' || obj[i].id === 'HandAddTemp' || obj[i].id === 'FileAddTemp')
                {
                    nMargin = (nBodyHeight - 320) / 2;
                }
                if(obj[i].id === 'ExcelFather' || obj[i].id === 'AddExcelTemp' || obj[i].id === 'HandAddTemp' || obj[i].id === 'FileAddTemp' || obj[i].id === 'FileUpTemp')
                {
                    obj[i].style.marginTop = nMargin > 4 ? nMargin + 'px' : 10 + 'px' ;
                    obj[i].style.marginBottom = nMargin > 4 ? nMargin + 'px' : 110 + 'px' ;
                }
            }
        }
    }
}

// 改变div显示
function ChangeDisplay(arg1, arg2, arg3)
{
    // 隐藏所有之后类名一样的选项
    var obj2 = document.getElementsByClassName(arg1);
    if(obj2)
    {
        var nLen1 = obj2.length;
        var i = 0;
        for(i; i < nLen1; i ++)
        {
            obj2[i].style.display = 'none';
        }
    }

    // 显示需要的选项
    var obj3 = document.getElementById(arg2);
    if(obj3)
    {
        obj3.style.display = 'block';
    }
    if(arg3 === 1 || arg3 === 2)
    {
        var oForm = document.getElementById('ExcelTempAct');
        if(oForm)
        {
            // 手动添加我们自己的模版
            if(arg3 === 1)
            {
                oForm.action = 'DoHandAdd?temp=myself';
            }
            // 手动添加快递的模版
            else if(arg3 === 2)
            {
                oForm.action = 'DoHandAdd?temp=express';
            }
        }
    }
    else if(arg3 === 3 || arg3 === 4)
    {
        var oForm = document.getElementById('FileUpTempAct');
        if(oForm)
        {
            // 手动添加我们自己的模版
            if(arg3 === 3)
            {
                oForm.action = 'DoExcelAdd?temp=myself';
            }
            // 手动添加快递的模版
            else if(arg3 === 4)
            {
                oForm.action = 'DoExcelAdd?temp=express';
            }
        }
    }
}

// 手动添加Excel模版
// 添加input框
function AddHandInput()
{
    var oForm = document.getElementById('HandAddInpit');

    if(oForm)
    {
        var obj1 = document.createElement('span');
        var obj2 = document.createElement('input');
        var nLen1 = oForm.getElementsByTagName('input').length * 1 + 1;

        if(obj1 && obj2)
        {  
            obj1.innerHTML = '第&nbsp;&nbsp;' + nLen1 + '&nbsp;&nbsp;列数据名';
            obj2.placeholder = '请注意不要填写错误，后果自负，仅中文英文数字';
            obj2.name = 'name[]';

            // js动态添加节点
            oForm.appendChild(obj1);
            oForm.appendChild(obj2);
        }
    }
}

// 自动改变div样式
window.onload = window.onresize = function()
{   
    ChanegDivStyle();
}