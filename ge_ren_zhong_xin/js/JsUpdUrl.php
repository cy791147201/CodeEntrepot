<!DOCTYPE html>
<html>
<head>
    <title>js改变url参数</title>
</head>
<body>
    <a href = './info1.html'>none1</a>
    <a href = ''>none2</a>
    <a href = 'tel:18500650283'>info</a>
    <a href = 'sms:18500650283'>none3</a>

    <img src = 'http://www.shanhexing.net/images_files/999.jpg' id = 'load'  style="display:none;"/>


</body>
<script type="text/javascript">
// js修改url

// js获取参数
function UrlSearch()
{
    var name,value;
    var str = location.href;

    var num = str.indexOf("?")

    str = str.substr(num+1);

    var arr = str.split("&");
    for(var i = 0; i < arr.length; i++){
    num = arr[i].indexOf("=");
        if(num>0){
            name = arr[i].substring(0,num);
            value = arr[i].substr(num+1);
            this[name] = value;
        }
    }
}


// js自动加载函数，改变添加url参数
window.onload = function change()
{   
    // 判断浏览器是否手机浏览器
    var userAgentInfo = navigator.userAgent;
    var Agents = ["Android", "iPhone","SymbianOS", "Windows Phone","iPad", "iPod"];

    var num1 = userAgentInfo.indexOf("Android");
    var num2 = userAgentInfo.indexOf("iPhone");
    var num3 = userAgentInfo.indexOf("SymbianOS");
    var num4 = userAgentInfo.indexOf("Windows Phone");
    var num5 = userAgentInfo.indexOf("iPad");
    var num6 = userAgentInfo.indexOf("iPod");
      
    var num = num1 + num2 + num3 + num4 + num5 + num6;

    if(num == -6){

        // 手机端跳转
        // var url = window.location.href; 
        var url = 'http://www.shanhexing.net/py2/index.htm?id=2';

        // 截取参数
        var after = url.split('/')[3] + '/' + url.split('/')[4];

        if(after == undefined){
            after = '';
        }

        // 获取远程图片
        var height = document.getElementById('load').height;
        var width = document.getElementById('load').width;

        // 重定向
        if(height>24 || width>24){

            // url = "http://www.taobao.com/" + after;

            var NewUrl = 'TestUrl.php?act=1&args=' + after;

            window.location.replace(NewUrl);
        }else{

            // url = "http://www.baidu.com/" + after;

            var NewUrl = 'TestUrl.php?act=2&args=' + after;

            window.location.replace(NewUrl);
        }
    }
 
    var Url = new UrlSearch();

    //获取a标签 
    var a = document.getElementsByTagName('a')

    for(var i in a){

        // 正则
        
        // 判断是否为html5电话或者短信
        var preg = 'tel:1';
        var pregs = 'sms:1';

        // 判断是否加参数
        if(a[i].href.match(preg) != null || a[i].href.match(pregs) != null){
            a[i].href = a[i].href;
        }else{
            if(Url.gzid == '' || Url.gzid == undefined){
                a[i].href = a[i].href;
            }else{
                a[i].href = a[i].href + '?gzid=' + Url.gzid;
            }
        }
    }
}

</script>
</html>