<?php
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('PRC');

foreach($_COOKIE as $k => $v){
    setcookie($k,'',time()-1);
}

echo '<center>
    <img src = "../image/1.png" /><br/>
    退出成功<br/>
    <img src = "../image/1.png" /><br/>
    <img src = "../image/2.png" /><br/>
    <img src = "../image/1.png" /><br/>
    <a href = "../index.html">返回首页</a><br/>
    <br/>请仔细阅读信息，避免不必要的错误信息插入<br/>
    如有问题请联系工作人员，联系电话138-3838-3838<br/>
    </center>';
exit();
