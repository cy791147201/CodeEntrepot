// $(function(){

// 	function scollDown(id,time){
//           var liHeight=$("#"+id+" ul li").height();
//           var time=time||2500;
//           setInterval(function(){
//           $("#"+id+" ul").prepend($("#"+id+" ul li:last").css("height","0px").animate({
//           	height:liHeight+"px"
//           },"slow"));
//           },time);
        

// 	}

// 	scollDown("pingjia",3000);
// 	scollDown("fahuo",3000);

// });
// 微信
$(function(){
    $(".weixin").click(function(){               
    $(".overlay").css({display:"block",height:$(document).height()});
    $(".weixindiag").css({
        left:($("body").width()-$(".weixindiag").width())/2+"px",
        top:($(window).height()-$(".weixindiag").height())/2+$(window).scrollTop()+"px",
        // top: 20+"px",
        display:"block"
    });
    });
    $(".weixinclose").click(function(){
    $(".overlay,.weixindiag").css("display","none");
    return false;
    });
})
// function weixin(sta)
// {
//     var div = document.getElementById('weixindiag');
//     // 获取body宽
//     var wid = document.documentElement.clientWidth;
//     // 获取body高
//     var hei = document.documentElement.clientHeight;

//     if(sta == 0)
//     {
//         div.style.display = 'block';
//         div.style.left = (wid - div.offsetWidth) / 2;
//         div.style.top = (hei - div.offsetHeight) / 2;
//         // alert(div.offsetHeight);
//     }
//     else if(sta == 1)
//     {
//         div.style.display = 'none';
//     }

// }
// // 获取当前日
// window.onload = function()
// {
//     var date = new Date();
//     // alert(date.getDate());
//     var txt = date.getDate();
//     var now = document.getElementById('now');
//     now.innerHTML = txt + '几点' + (txt + 1) + '几点';

//     var numbers = document.getElementById('number');
//     var number = numbers.value;
//     if(number >= 10)
//     {
//         alert('购买如此大量的商品，是否需要联系下客服');
//     }

//     GetTime();
//     CheckIn();
//     CheckArea();
// }
// // input 点中变色
function ReColor(obj)
{
    var divs = document.getElementsByClassName('input');
    var i = 0;
    var num = divs.length;
    for(i = 0; i < num; i ++)
    {
        divs[i].style.color = 'black';
        divs[i].style.border = '1px solid #B2B1B1';
    }
    var div = document.getElementById(obj);
    // alert(div.id);
    div.style.color = 'red';
    div.style.border = '1px solid red';
    var n = div.id - 1;
    var qians = new Array('198', '198', '298', '298', '398', '398');
    var numbers = new Array('1508黑色', '1508棕色', '1508黑色加绒', '1508棕色加绒', '1508黑+1508棕色加绒', '1508棕+1508黑色加绒');
    var imgs = new Array('33.jpg', '44.jpg', '11.jpg', '22.jpg', '11.jpg', '22.jpg');
    // alert(qian[n]);
    var img = document.getElementById('imgs');
    img.innerHTML = "<img src = 'images_files/" + imgs[n] + "' />";
    var qian = document.getElementById('qian');
    qian.innerHTML = '￥' + qians[n] + '.00';
    var number = document.getElementById('num');
    number.innerHTML = '商品编号&nbsp;:&nbsp;' + numbers[n];

    var yixuantaocan = document.getElementById('yixuantaocan');
    yixuantaocan.innerHTML = '&nbsp;' + numbers[n];

    var money = qian.innerHTML;
    money = money.replace('￥', '');
    money = money.replace('.00', '');
    // alert(money);
    var nu = document.getElementById('number');
    var n = nu.value;
    var zong = document.getElementById('zong');
    zong.value = money * n;
    // alert(zong.value);
    var danjia = document.getElementById('danjia');
    // danjia.value = money;
    danjia.value = money * n;
}
// // 数量加减
// function CheckNum(num)
// {
//     var numbers = document.getElementById('number');
//     var number = numbers.value;
//     // alert(number);
//     if(num == 1)
//     {
//         if(number == 1)
//         {
//             alert('商品数量已经为1，请不要再减');
//             return false;
//         }
//         else if(number != 1)
//         {
//             numbers.value = number - 1;
//         }
//     }
//     else if(num == 2)
//     {
//         // alert(22);
//         if(number >= 10)
//         {
//             alert('购买如此大量的商品，是否需要联系下客服');
//             numbers.value = number * 1 + 1 * 1;
//         }
//         else if(number < 10)
//         {
//             // alert(parsInt(number));
//             numbers.value = number * 1 + 1 * 1;
//         }
//     }
//     else
//     {
//         return '傻逼';
//     }

//     var money = qian.innerHTML;
//     money = money.replace('￥', '');
//     money = money.replace('.00', '');
//     // alert(money);
//     var nu = document.getElementById('number');
//     var n = nu.value;
//     var zong = document.getElementById('zong');
//     zong.value = money * n;
//     // alert(zong.value);
//     var danjia = document.getElementById('danjia');
//     danjia.value = money;
// }
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
    // alert(a.style.display);
    if(a.style.display == 'none')
    {
        a.style.display = 'block'
    }
    else
    {
        a.style.display = 'none'
    }
    // CheckIn();
    // CheckArea();
}
// // 检测填写框
// function CheckIn()
// {
//     var inp1 = document.getElementById('name');
//     var inp2 = document.getElementById('mob');
//     var inp3 = document.getElementById('address');
//     var info = document.getElementById('Ge');
//     if(inp1.value == '')
//     {
//         info.innerHTML = '&nbsp;' + '未填写姓名';
//     }
//     else if(inp2.value == '')
//     {
//         info.innerHTML = '&nbsp;' + '未填写手机号';
//     }
//     else if(inp3.value == '')
//     {
//         info.innerHTML = '&nbsp;' + '未填写详细地址';
//     }
//     else
//     {
//         info.innerHTML = '&nbsp;' + '已填';
//     }
// }
// // 检测地址栏
// function CheckArea()
// {
//     // 获取select选中的值
//     var obj = document.getElementById('s_province'); //定位id
//     var index = obj.selectedIndex; // 选中索引
//     var text = obj.options[index].text; // 选中文本
//     var value1 = obj.options[index].value; // 选中值
//     var obj = document.getElementById('s_city'); //定位id
//     var index = obj.selectedIndex; // 选中索引
//     var text = obj.options[index].text; // 选中文本
//     var value2 = obj.options[index].value; // 选中值
//     var obj = document.getElementById('s_county'); //定位id
//     var index = obj.selectedIndex; // 选中索引
//     var text = obj.options[index].text; // 选中文本
//     var value3 = obj.options[index].value; // 选中值

//     var area = document.getElementById('dao');
//     if(value1 == '省份')
//     {
//         area.innerHTML = '&nbsp;' + '未选择省，请选择';
//     }
//     else if(value2 == '地级市')
//     {
//         area.innerHTML = '&nbsp;' + '未选择市，请选择';
//     }
//     else if(value3 == '市、县级市')
//     {
//         area.innerHTML = '&nbsp;' + '未选择区，请选择';
//     }
//     else
//     {
//         area.innerHTML = '&nbsp;' + value1 + '&nbsp;'+ value2 + '&nbsp;'+ value3;
//     }
// }
// // js获取时间戳赋值给订单id
// function GetTime()
// {
//     var times = new Date();
//     var years = times.getFullYear();
//     var mons = times.getMonth()+1;
//     var days = times.getDate();
//     var hours = times.getHours(); 
//     var mins = times.getMinutes();
//     var secs = times.getSeconds();
//     // 生成区间随机数
//     function rd(n,m){
//         var c = m-n+1;  
//         return Math.floor(Math.random() * c + n);
//     }
//     var txt = 'no.' + years + mons + days + hours + mins + secs + rd(111, 999);
//     var input = document.getElementById('orderid');
//     input.value = txt;
// }   