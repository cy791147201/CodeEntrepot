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
// 改变div样式
function ChanegDivStyle()
{
    var obj = document.getElementsByClassName('ExcelFather');
    if(obj)
    {   
        // 控制div居中显示
        var nBodyHeight = document.documentElement.clientHeight;
        // var nBodyWidth = document.documentElement.clientWidth;
 
        if(nBodyHeight)
        {
            var nMargin = '';
            var nLen1 = obj.length;
            var i = 0;
            for(i; i < nLen1; i ++)
            {
                obj[i].index = i;
                nMargin = (nBodyHeight - parseInt(GetStyle(obj[i], 'height')) - 156) / 2;

                obj[i].style.marginTop = nMargin > 5 ? nMargin + 'px': 32 + 'px';
                obj[i].style.marginBottom = nMargin > 5 ? nMargin + 'px': 132 + 'px';
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
            obj2.name = 'info[]';

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

// js检查上传文件格式
// 检查上传文件格式是否是允许的xls，xlsx格式
function CheckFileType(tag, File)
{
    // 提交表单检查是否为空
    if(tag === '1')
    {
        var oInput = document.getElementsByName(File)[0];
        if(oInput.value === '')
        {
            return false;
        }
    }
    // 检查文件格式
    else if(tag === '2')
    {
        // 取出文件的名字
        var oFileName = File.value;
        // 如果存在文件，并且文件名字为真的话
        if(oFileName.length > 1 && oFileName) 
        {       
            // 分割字符串，取出文件后缀
            var oSubstr = oFileName.lastIndexOf(".");
            var type = oFileName.substring(oSubstr + 1);
             
            if(type !== 'xls' && type !== 'xlsx') 
            {
                //清除当前所选文件
                File.outerHTML = File.outerHTML.replace(/(value=\").+\"/i,"$1\"");
            }       
        }
    }
}