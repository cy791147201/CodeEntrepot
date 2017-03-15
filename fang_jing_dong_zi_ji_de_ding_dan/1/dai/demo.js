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
// 获取当前日
function Autos()
{
    var date = new Date();
    var txt = date.getDate();
    var now = document.getElementById('now');

    now.innerHTML = txt + '日' + '几点' + '-' + (txt + 1) + '日' + '几点';

    var numbers = document.getElementById('number');
    var number = numbers.value;

    if(number > 10)
    {
        alert('购买如此大量的商品，是否需要联系下客服');
    }

    // GetTime();
    // CheckIn();
    // GetMoney();
}

