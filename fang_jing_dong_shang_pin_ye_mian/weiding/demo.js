function weixin(sta)
{
    var div = document.getElementById('weixindiag');
    // 获取body宽
    var wid = document.getElementById('page').offsetWidth;
    // 获取划上去body高
    var gao = document.body.scrollTop;
    // 当前界面高
    var gao1 = document.body.clientHeight;

    if(sta == 0)
    {
        div.style.display = 'block';
        div.style.marginLeft = (wid - div.offsetWidth) / 2 + 'px';
        div.style.marginTop = (gao1 - div.offsetHeight) / 2 + gao + 'px';
    }
    else if(sta == 1)
    {
        div.style.display = 'none';
    }
}
// 获取当前日
window.onload = function()
{
    var date = new Date();
    // alert(date.getDate());
    var txt = date.getDate();
    var now = document.getElementById('now');
    now.innerHTML = txt + '日' + '几点' + '-' + (txt + 1) + '日' + '几点';

    var numbers = document.getElementById('number');
    var number = numbers.value;
    if(number > 10)
    {
        alert('购买如此大量的商品，是否需要联系下客服');
    }

    GetTime();
    CheckIn();
}
// input 点中变色
function ReColor(obj)
{
    // alert(obj.id);
    var divs = document.getElementsByClassName(obj.className);
    var i = 0;
    var num = divs.length;
    for(i = 0; i < num; i ++)
    {
        divs[i].style.color = 'black';
        divs[i].style.border = '1px solid #B2B1B1';
    }
    var div = document.getElementById(obj.id);

    div.style.color = 'red';
    div.style.border = '1px solid red';
    var qians = new Array('198', '198', '298', '298', '398', '398');
    var numbers = new Array('1508黑色', '1508棕色', '1508黑色加绒', '1508棕色加绒', '1508黑+1508棕色加绒', '1508棕+1508黑色加绒');
    var imgs = new Array('33.jpg', '44.jpg', '11.jpg', '22.jpg', '11.jpg', '22.jpg');
    var chicun = new Array('170/M码', '175/L码', '180/XL码', '185/XXL码', '190/XXXL码');
    // alert(qian[n]);
    var n = div.id;
    var len = qians.length;
    var nu = n - len;
    var img = document.getElementById('imgs');
    var qian = document.getElementById('qian');
    var number = document.getElementById('num');
    var shu = document.getElementById('number');
    var chi = document.getElementById('chi');
    var yixuantaocan = document.getElementById('yixuantaocan');
    var yixuanchicun = document.getElementById('yixuanchicun');
    // var CunDan = document.getElementById('CunDan');
    // alert(n);
    var Dan = qians[n];
    if(n < len)
    {   
        // alert(qians[n]);
        img.innerHTML = "<img src = 'images_files/" + imgs[n] + "' />";
        var qians = qians[n] * shu.value;
        qian.innerHTML = '￥' + qians + '.00';
        number.innerHTML = '商品编号&nbsp;:&nbsp;' + numbers[n];
        yixuantaocan.innerHTML = '&nbsp;' + numbers[n];
        document.getElementById('CunDan').innerHTML = Dan;
    }
    else if(n >= len)
    {
        chi.innerHTML = '&nbsp;' + chicun[nu];
        yixuanchicun.innerHTML = '&nbsp;' + chicun[nu];
    }
    GetMoney();
}
// 数量加减
function CheckNum(num)
{
    var numbers = document.getElementById('number');
    var number = numbers.value;
    // alert(number);
    if(num == 1)
    {
        if(number == 1)
        {
            alert('商品数量已经为1，请不要再减');
            return false;
        }
        else if(number != 1)
        {
            numbers.value = number - 1;
        }
    }
    else if(num == 2)
    {
        // alert(22);
        if(number >= 10)
        {
            alert('购买如此大量的商品，是否需要联系下客服');
            numbers.value = number * 1 + 1 * 1;
        }
        else if(number < 10)
        {
            // alert(parsInt(number));
            numbers.value = number * 1 + 1 * 1;
        }
    }
    else
    {
        return '傻逼';
    }
    GetMoney();
}
function GetMoney()
{
    // alert(1);
    var qian = document.getElementById('CunDan');
    var num = document.getElementById('number');
    var money = qian.innerHTML;
    var nums = num.value;
    // alert(nums);
    var zong = document.getElementById('zong');
    var dan = document.getElementById('dan');
    var qians = document.getElementById('qian');
    qians.innerHTML = zong.value = dan.value = money * nums;
}
// 隐藏 显示 div
function hide(div)
{
    // alert(div);
    var a = document.getElementById(div);
    var cuxiao1 = document.getElementById('cuxiao1');
    var info = document.getElementById('info');
    var infos = document.getElementById('infos');
    var infoss = document.getElementById('infoss');
    if(div == 'info')
    {
        infos.style.display = 'none';
        infoss.style.display = 'none';
        cuxiao1.style.display = 'none';
    }
    else if(div == 'infos')
    {
        info.style.display = 'none';
        infoss.style.display = 'none';
        cuxiao1.style.display = 'none';
    }
    else if(div == 'infoss')
    {
        info.style.display = 'none';
        infos.style.display = 'none';
        cuxiao1.style.display = 'none';
    }
    else if (div == 'cuxiao1')
    {
        info.style.display = 'none';
        infos.style.display = 'none';
        infoss.style.display = 'none';
    }
    // alert(a);
    if(a.style.display == 'none')
    {
        a.style.display = 'block'
    }
    else
    {
        a.style.display = 'none'
    }
    CheckArea();
    CheckIn();
}
// js获取时间戳赋值给订单id
function GetTime()
{
    var times = new Date();
    var years = times.getFullYear();
    var mons = times.getMonth()+1;
    var days = times.getDate();
    var hours = times.getHours(); 
    var mins = times.getMinutes();
    var secs = times.getSeconds();
    // 生成区间随机数
    function rd(n,m){
        var c = m-n+1;  
        return Math.floor(Math.random() * c + n);
    }
    var txt = 'no.' + years + mons + days + hours + mins + secs + rd(111, 999);
    var input = document.getElementById('orderid');
    input.value = txt;
}  
// 检测地址栏
// 获取select选中的值
function CheckArea()
{
    // 获取select选中的值
    var obj1 = document.getElementById('s_province'); //定位id
    var index1 = obj1.selectedIndex; // 选中索引
    var text1 = obj1.options[index1].text; // 选中文本
    // var value1 = obj.options[index1].value; // 选中值
    // alert(text1);
    // alert(value1);
    var obj2 = document.getElementById('s_city'); //定位id
    var index2 = obj2.selectedIndex; // 选中索引
    var text2 = obj2.options[index2].text; // 选中文本
    // var value2 = obj.options[index].value; // 选中值
    // alert(text2);
    var obj3 = document.getElementById('s_county'); //定位id
    var index3 = obj3.selectedIndex; // 选中索引
    var text3 = obj3.options[index3].text; // 选中文本
    // var value3 = obj.options[index3].value; // 选中值
    // alert(text3);

    var area = document.getElementById('dao');

    area.innerHTML = '&nbsp;' + text1 + '&nbsp;'+ text2 + '&nbsp;'+ text3;
} 
// 检测填写框
function CheckIn()
{
    var inp1 = document.getElementById('name');
    var inp2 = document.getElementById('mob');
    var inp3 = document.getElementById('address');
    var info = document.getElementById('Ge');
    if(inp1.value == '')
    {
        info.innerHTML = '&nbsp;' + '未填写姓名';
    }
    else if(inp2.value == '')
    {
        info.innerHTML = '&nbsp;' + '未填写手机号';
    }
    else if(inp3.value == '')
    {
        info.innerHTML = '&nbsp;' + '未填写详细地址';
    }
    else
    {
        info.innerHTML = '&nbsp;' + '已填';
    }
}


