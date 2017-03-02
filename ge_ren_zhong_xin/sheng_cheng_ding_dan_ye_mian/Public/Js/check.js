// 检测表单用户信息输入框是否剖正确
function CheckIn()
{
    var OUser = document.form.user.value;
    var OPwd = document.form.pwd.value;
    var ODiv = document.getElementById('hid');

    if (/^[a-zA-Z\d]+$/.test(OUser) === false || OUser === '' || /^[a-zA-Z\d]+$/.test(OPwd) === false || OPwd === ''){
        // alert('请填写正确的用户信息');
        ODiv.style.display = 'block';
        return false;
    } 
}

window.onload = function()
{   
    CheckWid();
    GetFileName();
}
// 检测页面宽高，保持中间div一直居中
function CheckWid()
{
    // 可见区域宽度 
    var width = document.documentElement.clientWidth; 
    // 可见区域高度 
    var height = document.documentElement.clientHeight;

    var Odiv = document.getElementsByClassName('body')[0];
    var Odiv2 = document.getElementsByClassName('body2')[0];

    if(Odiv != undefined)
    {
        var NTmpWid = width / 2;
        var NTmpHei = NTmpWid / 2;
        Odiv.style.width = NTmpWid + 'px';
        Odiv.style.height = NTmpHei + 'px';
        Odiv.style.marginTop = (height - NTmpHei - 150) / 2 + 'px';
        Odiv.style.marginLeft = (width - NTmpWid) / 2 + 'px';
    }

    if(Odiv2 != undefined)
    {
        var NBianju = 20;

        Odiv2.style.marginTop = Odiv2.style.marginLeft = NBianju + 'px';
        Odiv2.style.marginBottom = NBianju + 100 + 'px';
        Odiv2.style.width = width - (NBianju * 2) + 'px';
        // Odiv2.style.height = height - 150 - (NBianju * 2) + 'px';
        var OForm = document.getElementById('form3');
        if(OForm != undefined)
        {
            OForm.style.marginTop = OForm.style.marginBottom = (height - 150 - (NBianju * 2)) * 0.05 + 'px';
        }
    }
}
// 检测上传文件名
function GetFileName()
{
    var Ofile = document.getElementById('file');
    if(Ofile != null)
    {
        Ofile.onchange = function () 
        {
            document.getElementById('FileName').innerHTML = this.value;
        };
    }
}
// 显示添加编辑图片
function ShowImgForm(obj)
{
    // if(obj.id === '1')
    // {
    //     var OForm = document.getElementsByTagName('form');
    //     var len = OForm.length;
    //     var i = 0;

    //     for(i = 0; i < len; i++)
    //     {
    //         OForm[i].index = i;
    //         OForm[i].style.display = 'none';
    //     }
    //     document.getElementById('2').style.background = '#08AC7F';
    //     document.getElementById(obj.id).style.background = '#168C65';
    //     document.getElementById('form1').style.display = 'block';
    // }
    // else if(obj.id === '2')
    // {
        var OForm = document.getElementsByTagName('form');
        var len = OForm.length;
        var i = 0;

        for(i = 0; i < len; i++)
        {
            OForm[i].index = i;
            OForm[i].style.display = 'none';
            // OForm[i].style.background = '#08AC7F';
        }

        // var OClass = document.getElementsByClassName('xuanxiang');
        var OP = document.getElementsByTagName('p');
        var len1 = OP.length;
        var i1 = 0;
        
        for(i1 = 0; i1 < len; i1++)
        {
            OP[i1].index = i1;
            // OP[i1].style.display = 'none';
            OP[i1].style.background = '#08AC7F';
        }
        // document.getElementById('1').style.background = '#08AC7F';
        document.getElementById(obj.id).style.background = '#168C65';
        document.getElementById('form' + obj.id).style.display = 'block';
    // }
}
// 鼠标移动改变页面标签颜色
function ReColor(obj, sta)
{
    var OLi = document.getElementsByClassName(obj.className);
    var len = OLi.length;
    var i = 0;

    if(sta == 1)
    {
        for(i = 0; i < len; i++)
        {
            OLi[i].index = i;
            OLi[i].style.background = '#BAC8CB';
        }
    }
    else if(sta == 2)
    {
        for(i = 0; i < len; i++)
        {
            OLi[i].index = i;
            // js清除所有class样式
            OLi[i].removeAttribute('style');
        }
    }
}
function CheckForm(obj)
{
    if(obj.id == 'form0')
    {
        var OFile = document.getElementById('FileName').innerHTML;
    }
    if(obj.id == 'form')
    {
        var OFile = document.getElementById('FileName').innerHTML;
        var name = document.getElementsByName('name')[0].value;

        if(name == '')
        {
            alert('请输入商品名称');
            return false;
        }
    }
    if(OFile == '文件名')
    {
        alert('请选择文件');
        return false;
    }
}