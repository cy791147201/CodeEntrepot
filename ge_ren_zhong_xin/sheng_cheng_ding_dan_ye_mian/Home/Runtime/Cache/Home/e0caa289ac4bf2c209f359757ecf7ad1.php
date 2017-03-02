<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>生成订单系统__商品图片添加编辑</title>
<link rel = 'stylesheet' type = 'text/css' href = '/Public/Css/body3.css'>
<script type = 'text/javascript' src = '/Public/Js/check.js'></script>
</head>
    <link rel = 'stylesheet' type = 'text/css' href = '/Public/Css/reset.css'>
<link rel = 'stylesheet' type = 'text/css' href = '/Public/Css/header.css'>
<link rel = 'stylesheet' type = 'text/css' href = '/Public/Css/foot.css'>

<script type = 'text/javascript' src = '/Public/Js/check.js'></script>
    <center>
        <div class = 'father'>
            <div class = 'header'>
                <ul class = 'tou'>
                    <li>
                        <a href = '/index.php/Home/Handle/UpBody'>
                            <span>上传订单页面</span>
                        </a>
                    </li>
                    <li>
                        <a href = '/index.php/Home/Handle/CreateIndentBody'>
                            <span>订单列表</span>
                        </a>
                    </li>
                    <li>
                        <a href = '/index.php/Home/IndentStatistics/index'>
                            <span>订单地址统计</span>
                        </a>
                    </li>
                    <li class = ''>功能</li>
                    <li class = ''>功能</li>
                    <li class = ''>功能</li>
                    <li class = ''>功能</li>
                    <li class = ''>功能</li>
                    <li class = 'user'>
                        <span>上次登录</span>
                        <br/>
                        <span><?php echo (date( 'm-d H:i:s',$time)); ?></span>
                    </li>
                    <li>
                        <a href = '/index.php/Home/Index/LogOut'>
                            <span>退出</span>
                        </a>
                    </li>
                </ul>
            </div>

    <div class = 'body2'>
        <div id = 'form3'>
            <div class = 'xuanxiang'>
                <p onclick = 'ShowImgForm(this);' id = '0'>
                    <span>使用图片名添加</span>
                </p>
                <p onclick = 'ShowImgForm(this);' id = '1'>
                    <span>富文本直接添加图片</span>
                </p>
                <p onclick = 'ShowImgForm(this);' id = '2'>
                    <span>添加远程图片</span>
                </p>
            </div>
            <form action = '/index.php/home/handle/UpImg' method = 'post' id = 'form0'>
                <input type = 'hidden' name = 'type' value = '1' />
                <input type = 'hidden' name = 'id' value = '<?php echo ($id); ?>' />
                <input type = 'text' name = 'img' placeholder = '请输入图片的名称，请注意，戴上后缀名__每个图片名用&nbsp;#&nbsp;隔开' />
                <div class = 'bot'>
                    <button type = 'botton' name = 'bot1' value = '1' class = 'bot1'>提交</button>
                    <button type = 'botton' name = 'bot2' value = '2' class = 'bot2'>提交并直接下载商品页面</button>
                </div>
            </form>
            <form action = '/index.php/home/handle/UpImg' method = 'post' id = 'form1'>
                <input type = 'hidden' name = 'type' value = '2' />
                <input type = 'hidden' name = 'id' value = '<?php echo ($id); ?>' />
                <textarea name = 'img' id = 'img'></textarea>
                <div class = 'bot'>
                    <button type = 'botton' name = 'bot1' value = '1' class = 'bot1'>提交</button>
                    <button type = 'botton' name = 'bot2' value = '2' class = 'bot2'>提交并直接下载商品页面</button>
                </div>
            </form>
            <form action = '/index.php/home/handle/UpImg' method = 'post' id = 'form2'>
                <input type = 'hidden' name = 'type' value = '3' />
                <input type = 'hidden' name = 'id' value = '<?php echo ($id); ?>' />
                <input type = 'text' name = 'img' placeholder = '请输入图片的名称，请注意，戴上后缀名__每个图片名用&nbsp;#&nbsp;隔开' />
                <div class = 'bot'>
                    <button type = 'botton' name = 'bot1' value = '1' class = 'bot1'>提交</button>
                    <button type = 'botton' name = 'bot2' value = '2' class = 'bot2'>提交并直接下载商品页面</button>
                </div>
            </form>
        </div>
    </div>  
    <script type = 'text/javascript' charset = 'utf-8' src = '/Public/js/umeditor/ueditor.config.js'></script>
    <script type = 'text/javascript' charset = 'utf-8' src = '/Public/js/umeditor/ueditor.all.js'></script>
    <script type = 'text/javascript'>  
        UE.getEditor('img');
        function setContent(content,info) {
            UE.getEditor('content').execCommand('insertHtml', content);
            $.alert(info+'添加成功',1);
        }
    </script> 
                <div class = 'foot'>
                <span>版权所有</span>
            </div>
        </div>
    </center>
</body>
</html>