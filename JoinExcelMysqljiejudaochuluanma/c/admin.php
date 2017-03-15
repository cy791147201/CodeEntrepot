<?php 
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('PRC');

require_once '../config/db.php';

require_once '../config/SmartyConfig.php';

require_once '../class/PageTool.class.php';

if(empty($_COOKIE['user'])){
    echo '<center>';
    echo '<img src = "../image/1.png" /><br/>';
    echo '小样你想干毛啊<br/>';
    echo '<img src = "../image/1.png" /><br/>';
    echo '<img src = "../image/3.png" /><br/>';
    echo '<img src = "../image/1.png" /><br/>';
    echo "<a href = '../index.html'>返回首页</a><br/>";
    echo '<br/>请仔细阅读信息，避免不必要的错误信息插入<br/>';
    echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
    echo '</center>';
    exit();
}

$info = $_GET;
$info1 = $_POST;

$grade = $_COOKIE['grade'];

if(empty($info)){
    echo '<center>';
    echo '<img src = "../image/1.png" /><br/>';
    echo '你想干毛啊<br/>';
    echo '<img src = "../image/1.png" /><br/>';
    echo '<img src = "../image/3.png" /><br/>';
    echo '<img src = "../image/1.png" /><br/>';
    echo "<a href = '../view/list.tpl'>返回首页</a><br/>";
    echo '<br/>请仔细阅读信息，避免不必要的错误信息插入<br/>';
    echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
    echo '</center>';
    exit();
}else if($info['act'] == 'show'){
    
    $smarty->display('admin.tpl');

}else if($info['act'] == 'list'){

    $sql1 = 'select count(*) from admin';

    $res1 = mysql_query($sql1);

    $total = '';

    while($row1 = mysql_fetch_assoc($res1)){

        foreach($row1 as $v){
            $total = $v ;
        }
        
    }

    $page = isset($_GET['page'])?$_GET['page']+0:1; 

    if($page < 1){ 
        $page = 1;
    }

    $number = 9;

    $offset = ($page - 1)*$number;

    if($page >ceil($total/$number)){
        $page = 1;
    }

    $page = new PageTool($total, $number);

    $pages = $page->page(3, 1, 4, 5, 6, 2, 0);

    $sql = "select * from admin limit $offset, $number";

    $res = mysql_query($sql);

    $data = array();

    while($row = mysql_fetch_assoc($res)){

        $data[] = $row;

    }

    $smarty->assign('page', $pages);
    $smarty->assign('data', $data);
    $smarty->display('list.tpl');

}else if($info['act'] == 'add'){

    $smarty->display('add.tpl');

}else if($info['act'] == 'added'){

    if($grade == 1){

        $name = $info1['name'];
        $pwd = md5(md5($info1['pwd']));
        $grade = $info1['grade'];
        $who = $_COOKIE['user'];

        if(empty($grade)){

        	$grade = '3';

        }

        if(empty($name) || empty($pwd)){

            echo '<center>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '管理员用户信息不能为空<br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<img src = "../image/3.png" /><br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<a href="javascript:history.go(-1)">返回前页查看</a><br/>';
            echo '<br/>请仔细阅读信息，避免不必要的错误信息插入<br/>';
            echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
            echo '</center>';
            exit(); 

        }

        $sql1 = "select id from admin where name = $name ";

        $res1 = mysql_query($sql1);

        while($row = mysql_fetch_assoc($res1)){

            $data1[] = $row;

        }

        if(!empty($data1)){

            echo '<center>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '管理员已存在<br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<img src = "../image/3.png" /><br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<a href="javascript:history.go(-1)">返回前页查看</a><br/>';
            echo '<br/>请仔细阅读信息，避免不必要的错误信息插入<br/>';
            echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
            echo '</center>';
            exit(); 

        }

        $sql = "insert into admin (name, pwd, grade, who_add) values ('$name', '$pwd', '$grade', '$who')";
        
        $res = mysql_query($sql);

        $row = mysql_fetch_assoc($res);

        if(!$res){

            echo '<center>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '添加管理员失败<br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<img src = "../image/3.png" /><br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<a href="javascript:history.go(-1)">返回前页查看</a><br/>';
            echo '<br/>请仔细阅读信息，避免不必要的错误信息插入<br/>';
            echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
            echo '</center>';
            exit(); 

        }else{

            echo '<center>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '添加管理员成功<br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<img src = "../image/2.png" /><br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<a href="javascript:history.go(-1)">返回前页查看</a><br/>';
            echo '<br/>请仔细阅读信息，避免不必要的错误信息插入<br/>';
            echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
            echo '</center>';
            exit(); 

        }

    }else{

        echo '<center>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '小样你还没有权限啊......<br/>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '<img src = "../image/3.png" /><br/>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '<a href="javascript:history.go(-1)">返回前页查看</a><br/>';
        echo '<br/>请仔细阅读信息，避免不必要的错误信息插入<br/>';
        echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
        echo '</center>';
        exit(); 

    }

}else if($info['act'] == 'del'){

    $smarty->display('del.tpl');

}else if($info['act'] == 'deled'){

    if($grade == 1){

        $name = $info1['name'];

        $sql = "delete from admin where name = '$name' ";

        $res = mysql_query($sql);

        if($res){
            echo '<center>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '删除管理员成功<br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<img src = "../image/2.png" /><br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<a href="javascript:history.go(-1)">返回前页查看</a><br/>';
            echo '<br/>请仔细阅读信息，避免不必要的错误信息插入<br/>';
            echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
            echo '</center>';
            exit(); 
        }else{
            echo '<center>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '删除管理员失败<br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<img src = "../image/3.png" /><br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<a href="javascript:history.go(-1)">返回前页查看</a><br/>';
            echo '<br/>请仔细阅读信息，避免不必要的错误信息插入<br/>';
            echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
            echo '</center>';
            exit(); 
        }

    }else{

        echo '<center>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '小样你还没有权限啊......<br/>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '<img src = "../image/3.png" /><br/>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '<a href="javascript:history.go(-1)">返回前页查看</a><br/>';
        echo '<br/>请仔细阅读信息，避免不必要的错误信息插入<br/>';
        echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
        echo '</center>';
        exit(); 

    }

}else if($info['act'] == 'upd'){

    $smarty->display('upd.tpl');

}else if($info['act'] == 'upded'){

    if($grade == 1){

        $name = $info1['name'];
        $grade = $info1['grade'];
        $pwd = md5(md5($info1['pwd']));

        if(empty($grade)){

        	$grade = '3';

        }

        if(empty($name)){

            echo '<center>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '管理员用户名不能为空<br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<img src = "../image/3.png" /><br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<a href="javascript:history.go(-1)">返回前页查看</a><br/>';
            echo '<br/>请仔细阅读信息，避免不必要的错误信息插入<br/>';
            echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
            echo '</center>';
            exit();

        }

        $sql = '';

		if(empty($pwd)){

			$sql = " update admin set grade = '$grade' where name = $name ";

		}else{

            $sql = " update admin set grade = '$grade', pwd = '$pwd' where name = '$name' ";

        }

        $res = mysql_query($sql);

        if(!$res){

            echo '<center>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '修改管理员失败,请仔细填写信息<br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<img src = "../image/3.png" /><br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<a href="javascript:history.go(-1)">返回前页查看</a><br/>';
            echo '<br/>请仔细阅读信息，避免不必要的错误信息插入<br/>';
            echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
            echo '</center>';
            exit(); 

        }else{

            echo '<center>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '修改管理员成功<br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<img src = "../image/2.png" /><br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<a href="javascript:history.go(-1)">返回前页查看</a><br/>';
            echo '<br/>请仔细阅读信息，避免不必要的错误信息插入<br/>';
            echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
            echo '</center>';
            exit(); 

        }

    }else{

        echo '<center>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '小样你还没有权限啊......<br/>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '<img src = "../image/3.png" /><br/>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '<a href="javascript:history.go(-1)">返回前页查看</a><br/>';
        echo '<br/>请仔细阅读信息，避免不必要的错误信息插入<br/>';
        echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
        echo '</center>';
        exit(); 

    }

}if($info['act'] == 'find'){

    $name = $info1['user'];

    $sql = " select * from admin where name = '$name' ";

    $res = mysql_query($sql);

    $data = array();

    while($row = mysql_fetch_assoc($res)){
        $data[] = $row;
    }
  

    if(empty($data)){

        echo '<center>
            <img src = "../image/1.png" /><br/>
            没有查到相关信息，请输入正确的信息<br/>
            <img src = "../image/1.png" /><br/>
            <img src = "../image/3.png" /><br/>
            <img src = "../image/1.png" /><br/>
            <a href="javascript:history.go(-1)">返回前页查看</a><br/>
            <br/>请仔细阅读信息，避免不必要的错误订单信息插入<br/>
            如有问题请联系工作人员，联系电话138-3838-3838<br/>
            </center>';
        exit();
        
    }else{
        
        $smarty->assign('data', $data);
        $smarty->display('find.tpl');

    }

}else if($info['act'] == 'del1'){

    if($grade == 1){
        $name = $info['name'];

        $sql = " delete from admin where name = '$name' ";

        $res = mysql_query($sql);

        if(!$res){

            echo '<center>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '删除管理员失败<br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<img src = "../image/3.png" /><br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<a href="javascript:history.go(-1)">返回前页查看</a><br/>';
            echo '<br/>请仔细阅读信息，避免不必要的错误信息插入<br/>';
            echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
            echo '</center>';
            exit(); 

        }else{

            echo '<center>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '删除管理员成功<br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<img src = "../image/2.png" /><br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo "<a href = '../c/admin.php?act=show'>返回首页</a><br/>";
            echo '<br/>请仔细阅读信息，避免不必要的错误信息插入<br/>';
            echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
            echo '</center>';
            exit(); 

        }
    }else{

        echo '<center>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '小样你还没有权限啊......<br/>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '<img src = "../image/3.png" /><br/>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '<a href="javascript:history.go(-1)">返回前页查看</a><br/>';
        echo '<br/>请仔细阅读信息，避免不必要的错误信息插入<br/>';
        echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
        echo '</center>';
        exit(); 

    }

}else if($info['act'] == 'upd1'){

    if($grade == 1){

        $name = $info['name'];

        if(empty($name)){

            echo '<center>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '管理员用户名不能为空<br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<img src = "../image/3.png" /><br/>';
            echo '<img src = "../image/1.png" /><br/>';
            echo '<a href="javascript:history.go(-1)">返回前页查看</a><br/>';
            echo '<br/>请仔细阅读信息，避免不必要的错误信息插入<br/>';
            echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
            echo '</center>';
            exit();

        }

        $sql = " select * from admin where name = '$name' ";

        $res = mysql_query($sql);

        $data = array();

        while($row = mysql_fetch_assoc($res)){

            $data[] = $row;

        }
        
        $smarty->assign('data', $data);
        $smarty->display('upd2.tpl');

   }else{

        echo '<center>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '小样你还没有权限啊......<br/>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '<img src = "../image/3.png" /><br/>';
        echo '<img src = "../image/1.png" /><br/>';
        echo '<a href="javascript:history.go(-1)">返回前页查看</a><br/>';
        echo '<br/>请仔细阅读信息，避免不必要的错误信息插入<br/>';
        echo '如有问题请联系工作人员，联系电话138-3838-3838<br/>';
        echo '</center>';
        exit(); 

   }

}

       
        
