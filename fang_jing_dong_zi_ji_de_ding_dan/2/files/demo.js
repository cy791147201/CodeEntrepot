function weixin(sta)
{
    // 获取body宽
    var wid = document.getElementById('page').offsetWidth;
    // 获取划上去body高
    // var gao = document.body.scrollTop;
    // 更符合dtd标准，避免获取的高为0
    var gao = document.documentElement.scrollTop;
    // 当前界面高
    var gao1 = document.body.clientHeight;
    var div = document.getElementById('weixindiag');

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
// input 点中变色 修改价格 尺寸 商品名称 商品图片
function ReColor(obj)
{
    if(obj != undefined)
    {
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

        //修改订单内商品图片
        var img = document.getElementById('imgs');
        var name = div.id;

        if(name.indexOf('name') == 0 )
        {
            var NameNum = name.match(/\d+/g);
            img.innerHTML = "<img src = 'images_files/shangpin_" + NameNum + ".jpg' />";

            // 获取价格
            var product = document.getElementsByName('product');
            var qian = product[NameNum].getAttribute('alt');
            // 获取数量
            var shu = document.getElementById('number').value;
            var ZongQian = qian * shu;

            // 保存临时价格
            document.getElementById('CunDan').innerHTML = qian;

            // 修改订单内商品图片旁边价格
            var zong = document.getElementsByClassName('qian');
            var FormZong = document.getElementById('zong');
            var FormDan = document.getElementById('dan');
            // 修改form需要的价格
            FormZong.value = ZongQian;
            FormDan.value = ZongQian;
            var ZongLen = zong.length;
            var i = 0;
            for(i = 0; i < ZongLen; i++)
            {
                zong[i].innerHTML = '￥' + ZongQian + '.00';
            }   
            // 获取订单内商品图片下商品编号
            var BianHao = product[NameNum].value;
            var num = document.getElementById('num');
            num.innerHTML = BianHao;
            var yixuantaocan = document.getElementById('yixuantaocan');
            yixuantaocan.innerHTML = BianHao;
        }

        // 获取尺寸
        var chi = document.getElementById('chi');
        var ChiCun = div.id;
       
        if(ChiCun.indexOf('chicun') == 0 )
        {
            var ChiCun1 = ChiCun.match(/\d+/g);
            // 获取尺寸
            var chicun = document.getElementsByName('chanpin1')[ChiCun1].value;

            chi.innerHTML = '&nbsp;' + chicun;

            var yixuanchicun = document.getElementById('yixuanchicun');
            yixuanchicun.innerHTML = '&nbsp;' + chicun;
        }
    }

}
// 数量加减
function CheckNum(num)
{
    var numbers = document.getElementById('number');
    var number = numbers.value;

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
        if(number >= 10)
        {
            alert('购买如此大量的商品，是否需要联系下客服');
            numbers.value = number * 1 + 1 * 1;
        }
        else if(number < 10)
        {
            numbers.value = number * 1 + 1 * 1;
        }
    }
    else
    {
        return '傻逼';    
    }

    // 获取当前选中的商品单价
    var qian = document.getElementById('CunDan').innerHTML;

    var FormZong = document.getElementById('zong');
    var FormDan = document.getElementById('dan');
    // 修改form需要的价格
    var ZongQian = qian * numbers.value;
    FormZong.value = ZongQian;
    FormDan.value = ZongQian;

    var zong = document.getElementsByClassName('qian');
    var ZongLen = zong.length;
    var i = 0;
    for(i = 0; i < ZongLen; i++)
    {
        zong[i].innerHTML = '￥' + ZongQian + '.00';
    }   

    GetIndentId();
    CheckArea();
    CheckInput();
}
// 隐藏 显示 div
function hide(div)
{
    if(div != 'buy')
    {
        var a = document.getElementById(div);
        if(a.style.display != 'block')
        {   
            // 当前界面高
            var BodyHeight = document.body.clientHeight;

            a.style.display = 'block';
            a.style.height = BodyHeight / 2 + 'px';
        }
        else
        {
            a.style.display = 'none';
        }
        document.getElementsByClassName('buy')[0].id = 'xianshi';
    }
    else if(div == 'buy')
    {
        var b = document.getElementsByClassName(div)[0];
        var c = document.getElementById('zhankai1');
        var d = document.getElementsByClassName('dingdan')[0];

        // 当前界面高
        var BodyHeight = document.body.clientHeight;

        if(b.id == 'xianshi')
        {
            b.id = 'fudong';
            b.style.height = BodyHeight / 2 + 'px';
            c.style.display = 'block';
            d.style.display = 'none';
        }
        else if(b.id == 'fudong')
        {
            b.id = 'xianshi';
            b.removeAttribute('style');
            c.style.display = 'none';
            d.style.display = 'block';

        }
        document.getElementById('cuxiao1').style.display = 'none';
    }
    ReColor();
    GetIndentId();
    CheckArea();
    CheckInput();
}
// js获取时间戳赋值给订单id
function GetIndentId()
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
    var obj2 = document.getElementById('s_city'); //定位id
    var index2 = obj2.selectedIndex; // 选中索引
    var text2 = obj2.options[index2].text; // 选中文本
    // var value2 = obj.options[index].value; // 选中值
    var obj3 = document.getElementById('s_county'); //定位id
    var index3 = obj3.selectedIndex; // 选中索引
    var text3 = obj3.options[index3].text; // 选中文本
    // var value3 = obj.options[index3].value; // 选中值

    var area = document.getElementById('dao');

    area.innerHTML = '&nbsp;' + text1 + '&nbsp;'+ text2 + '&nbsp;'+ text3;
} 
// 检测填写框
function CheckInput()
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
var h = 1;
var m = 59;
var s = 59;  
// 倒计时时间
function DaoJiShi()
{
    --s;
    if(s<0){
        --m;
        s = 59;
    }
    if(m<0){
        --h;
        m = 59
    }
    if(h<0){
        s = 0;
        m = 0;
    }

    if (h < 10) 
    {
        document.getElementById('DaoJiShi_H').innerHTML = '0' + h;
    }
    else
    {
        document.getElementById('DaoJiShi_H').innerHTML = h;
    }
    if (m < 10) 
    {
        document.getElementById('DaoJiShi_M').innerHTML = '0' + m;
    }
    else
    {
        document.getElementById('DaoJiShi_M').innerHTML = m;
    }
    if (s < 10) 
    {
        document.getElementById('DaoJiShi_S').innerHTML = '0' + s;
    }
    else
    {
        document.getElementById('DaoJiShi_S').innerHTML = s;
    }
}
// 获取当前日 自动加载内容
function Autos()
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
    // 获取当前选中的商品单价
    var qian = document.getElementById('CunDan').innerHTML;

    var FormZong = document.getElementById('zong');
    var FormDan = document.getElementById('dan');
    // 修改form需要的价格
    var ZongQian = qian * number;
    FormZong.value = ZongQian;
    FormDan.value = ZongQian;

    var zong = document.getElementsByClassName('qian');
    var ZongLen = zong.length;
    var i = 0;
    for(i = 0; i < ZongLen; i++)
    {
        zong[i].innerHTML = '￥' + ZongQian + '.00';
    }   

    ReColor();
    GetIndentId();
    CheckArea();
    CheckInput();
    DaoJiShi();
    setInterval('DaoJiShi()', 1000);
}
