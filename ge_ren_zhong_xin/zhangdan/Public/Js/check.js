// 检测表单用户信息输入框是否剖正确
function CheckIn()
{
    var oUser = document.form.user.value;
    var oPwd = document.form.pwd.value;
    var oDiv = document.getElementById('hid');

    if (/^[a-zA-Z\d]+$/.test(oUser) === false || oUser === '' || /^[a-zA-Z\d]+$/.test(oPwd) === false || oPwd === ''){
        // alert('请填写正确的用户信息');
        oDiv.style.display = 'block';
        return false;
    } 
}

window.onresize = window.onload = function()
{   
    CheckWid();
}
// 取窗口滚动条高度 
// function GetScrollTop()
// {
//     var scrollTop=0;
//     if(document.documentElement&&document.documentElement.scrollTop)
//     {
//         scrollTop=document.documentElement.scrollTop;
//     }
//     else if(document.body)
//     {
//         scrollTop=document.body.scrollTop;
//     }
//     return scrollTop;
// }
// 检测页面宽高，保持中间div一直居中
function CheckWid()
{
    // 可见区域宽度 
    var width = document.documentElement.clientWidth; 
    // 可见区域高度 
    var height = document.documentElement.clientHeight;

    var oDiv = document.getElementsByClassName('body')[0];
    var oDivChangeSta = document.getElementById('ChangeStaForm');
    var oDivChangeSta1 = document.getElementById('ChangeStaForm1');
    var oDivChangeClassify = document.getElementById('ChangeClassifyForm');
    var oHuaFeiImage = document.getElementsByClassName('images')[0];
    //设置改变花费信息form
    if(oHuaFeiImage != undefined)
    {
        var nMargintop = height - 650;
        if(nMargintop < 0)
        {
            nMargintop = 10;
        }
 
        oHuaFeiImage.style.marginTop = nMargintop / 2 + 'px';
    }
    //设置改变花费信息form
    if(oDivChangeSta1 != undefined)
    {
        var NTmpWid = width / 4;
        var NTmpHei = NTmpWid / 4;
        if(NTmpWid < 400)
        {
            NTmpWid = 400;
        }
        // if(NTmpHei < 200)
        // {
        //     NTmpHei = 200;
        // }

        oDivChangeSta1.style.width = NTmpWid + 'px';
        // oDivChangeSta1.style.height = NTmpHei + 'px';
        oDivChangeSta1.style.marginTop = (height - NTmpHei - 150) / 2 + 'px';
        // oDivChangeSta1.parentNode.style.lineHeight = height + 'px';
        oDivChangeSta1.style.marginLeft = (width - NTmpWid) / 2 + 'px';
    }
    // 添加花费分类div
    if(oDivChangeSta != undefined)
    {
        var NTmpWid = width / 4;
        var NTmpHei = NTmpWid / 4;
        if(NTmpWid < 400)
        {
            NTmpWid = 400;
        }
        // if(NTmpHei < 200)
        // {
        //     NTmpHei = 200;
        // }

        oDivChangeSta.style.width = NTmpWid + 'px';
        // oDivChangeSta.style.height = NTmpHei + 'px';
        oDivChangeSta.style.marginTop = (height - NTmpHei - 150) / 2 + 'px';
        // oDivChangeSta.parentNode.style.lineHeight = height + 'px';
        oDivChangeSta.style.marginLeft = (width - NTmpWid) / 2 + 'px';
    }
    if(oDivChangeClassify != undefined)
    {
        var NTmpWid = width / 4;
        var NTmpHei = NTmpWid / 4;
        if(NTmpWid < 400)
        {
            NTmpWid = 400;
        }
        // if(NTmpHei < 200)
        // {
        //     NTmpHei = 200;
        // }

        oDivChangeClassify.style.width = NTmpWid + 'px';
        // oDivChangeClassify.style.height = NTmpHei + 'px';
        oDivChangeClassify.style.marginTop = (height - NTmpHei - 150) / 2 + 'px';
        // oDivChangeClassify.parentNode.style.lineHeight = height + 'px';
        oDivChangeClassify.style.marginLeft = (width - NTmpWid) / 2 + 'px';
    }

    // 设置body div宽高 margin
    if(oDiv != undefined)
    {
        var NTmpWid = width / 2;
        var NTmpHei = NTmpWid / 2;
        if(NTmpWid < 500)
        {
            NTmpWid = 500;
        }
        if(NTmpHei < 400)
        {
            NTmpHei = 420;
        }

        var oImg = document.getElementById('BackImg');
        if(oImg)
        {
            var nHeight = NTmpWid / 2;
        }
        else
        {
            var nHeight = NTmpHei;
        }

        oDiv.style.width = NTmpWid + 'px';
        oDiv.style.height = nHeight + 'px';
        oDiv.style.marginTop = (height - nHeight - 150) / 2 + 'px';
        oDiv.style.marginLeft = (width - NTmpWid) / 2 + 'px';
    }
    // 设置body 下只有两大块div选择时的linght
    var oDiv1 = document.getElementsByClassName('HuaFei')[0];
    var oDiv2 = document.getElementsByClassName('cansel')[0];
    if(oDiv1 && oDiv2)
    {
        oDiv1.style.lineHeight = oDiv.style.height;
        oDiv2.style.lineHeight = oDiv.style.height;
    }
    var oDiv3 = document.getElementsByClassName('classify');
    if(oDiv3 != undefined)
    {   
        nlen = document.getElementsByClassName('classify').length;
        // alert(nlen);
        // console.log(oDiv3);
        var i = 0;
        for(i = 0; i < nlen; i ++)
        {
            oDiv3[i].index = i;
            oDiv3[i].style.lineHeight = NTmpHei/2 + 'px';
        }
    }
}
// 添加花费信息时候检查信息是否完整
function CheckForm()
{
    var oInput1 = document.getElementById('info');
    var sText = oInput1.value;

    if(sText === '' || sText.indexOf('/') === 0)
    {
        alert('请正确填写信息');
        return false;
    }
}
// 添加分类信息时候检查信息是否完整
function CheckClassifyForm()
{
    var oInput1 = document.getElementsByClassName('more')[0];
    var sText = oInput1.value;
// alert(sText);
    if(sText === '')
    {
        alert(1);
        alert('请正确填写信息');
        return false;
    }
    var oInput2 = document.getElementById('ReName');
    if(oInput2)
    {
        // alert(2);
        var sText1 = oInput2.value;

        if(sText1 === '')
        {
            // alert(3);
            alert('请正确填写信息');
            return false;
        }
    }
}
// 弹出修改form框
function ChangeSta(id, sta)
{
    var oDiv = document.getElementsByClassName('ChangeSta')[0];
    var oDiv1 = document.getElementsByClassName('ChangeSta1')[0];

    if(id === 'GuanBi')
    {
        if(oDiv)
        {
            oDiv.style.display = 'none';
        }
        if(oDiv1)
        {
            oDiv1.style.display = 'none';       
        }
    }
    else if(id === 'DeleteThis')
    {
        if(confirm("确定?") == false)
        {
            return false;
        }   
    }
    else if(id === 'UpdClassify')
    {
        // alert(2);
        var oDiv1 = document.getElementsByClassName('ChangeSta1')[0];

        oDiv1.style.display = 'block';
        var oInput = document.getElementById('HuaFeiId');
        oInput.value = sta;
    }
    else if(id === 'AddMore')
    {
        oDiv.style.display = 'block';
        var oAddMoreInput = document.getElementById('AddMore');
        var oInput1 = document.getElementById('StaId');
        oInput1.value = sta;
        var oInput2 = document.getElementById('IdSta');
        oInput2.value = 3;
    }
    // 删除和修改分类
    else if(id === 'DelClassify' || id === 'SaveClassify' || id === 'TanChuHuaFeiClassify')
    {
        // alert(id);
        oDiv.style.display = 'block';
        // 修改分类的a标签
        var oClassifyA = document.getElementsByClassName('ClassifyA');
        var len = oClassifyA.length;
        var i = 0;
        for(i = 0; i < len; i ++)
        {
            oClassifyA[i].index = i;
            oClassifyA[i].href += '&sta=' + sta;
        }

        var oInput1 = document.getElementById('StaId');

        if(oInput1)
        {
            oInput1.value = id;
        }
        var oInput2 = document.getElementById('IdSta');
        if(oInput2)
        {
            oInput2.value = sta;
        }
    
        // 删除掉修改分类是添加的的input
        var oDynamicInput = document.getElementsByClassName('DynamicInput')[0];
        var oInput3 = document.getElementById('ReName');
        if(oInput3)
        {
            oDynamicInput.removeChild(oInput3); 
        }

        else if(id === 'SaveClassify')
        {
            // 动态创建input节点
            var input = document.createElement('input'); //创建input节点
            input.name = 'ReName';
            input.id = 'ReName';
            input.setAttribute('type', 'text');  //定义类型是文本输入
            input.setAttribute('placeholder', '修改后的分类名称'); //添加placeholder

            oDynamicInput.style.display = 'block';
            oDynamicInput.appendChild(input); //添加到form中显示
        }
    }
    else if(id === 'AddClassify')
    {
        if(oDiv1)
        {
            oDiv1.style.display = 'block'; 
            var oInput1 = document.getElementById('StaId1');
            var oInput2 = document.getElementById('IdSta1');

            if(oInput1)
            {
                oInput1.value = sta;
            }
            if(oInput2)
            {
                oInput2.value = 'add';
            }
        }
    }
}