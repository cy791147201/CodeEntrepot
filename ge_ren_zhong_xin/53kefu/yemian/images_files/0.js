function auto()
{ 
    var userAgentInfo = navigator.userAgent;
    var Agents = ["Android", "iPhone","SymbianOS", "Windows Phone","iPad", "iPod"];

    var num1 = userAgentInfo.indexOf("Android");
    var num2 = userAgentInfo.indexOf("iPhone");
    var num3 = userAgentInfo.indexOf("SymbianOS");
    var num4 = userAgentInfo.indexOf("Windows Phone");
    var num5 = userAgentInfo.indexOf("iPad");
    var num6 = userAgentInfo.indexOf("iPod");
      
    var num = num1 + num2 + num3 + num4 + num5 + num6;

    var url = window.location.href; 

    var after1 = url.split('/')[3];
    var after2 = url.split('/')[4];

    if(after1 == undefined){
        after1 = '';
    }
    if(after2 == undefined){
        after2 = '';
    }

    if(num == -6){

        // pc
        var NewUrl = 'php/jump.php?act=1&arg1=' + after1 + '&arg2=' + after2;

    }else if(num != -6){
        
        // move
        var NewUrl = 'php/jump.php?act=2&arg1=' + after1 + '&arg2=' + after2;

    }    
    // alert(NewUrl);

    // window.location.replace(NewUrl);
}


// function UrlSearch()
// {
//     var name,value;
//     var str = location.href;

//     var num = str.indexOf("?")

//     str = str.substr(num+1);

//     var arr = str.split("&");
//     for(var i = 0; i < arr.length; i++){
//     num = arr[i].indexOf("=");
//         if(num>0){
//             name = arr[i].substring(0,num);
//             value = arr[i].substr(num+1);
//             this[name] = value;
//         }
//     }
// }

// window.onload = function change()
// {   
//     var Url = new UrlSearch();

//     var a = document.getElementsByTagName('a')

//     for(var i in a){

//         var preg = 'tel:1';
//         var pregs = 'sms:1';

//         if(a[i].href.match(preg) != null || a[i].href.match(pregs) != null){
//             a[i].href = a[i].href;
//         }else{
//             if(Url.gzid == '' || Url.gzid == undefined){
//                 a[i].href = a[i].href;
//             }else{
//                 a[i].href = a[i].href + '?gzid=' + Url.gzid;
//             }
//         }
//     }
// }