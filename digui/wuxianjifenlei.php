<?php
//0找指定的子栏目 	
//1找指定栏目的子孙栏目 子孙树
//2找指定栏目的父栏目 家谱树

//

//以下递归
$arr=array(
		array('id'=>1,'name'=>'河北','parent'=>0),
		array('id'=>2,'name'=>'华南','parent'=>1),
		array('id'=>3,'name'=>'邢台','parent'=>2),
		array('id'=>4,'name'=>'沙河','parent'=>3),
	);
//找子栏目
function findSon($arr,$id){
	$sons=array();
	foreach($arr as $v){
		if($v['parent']==$id){
			$sons[]=$v;
		}
	}
	return $sons;
}
print_r(findSon($arr,0));
//找子孙树
function subTree($arr,$id,$lev){
	//设置静态变量 每次调用不初始化
	static $subs=array();
	foreach($arr as $v){
		if($v['parent']==$id){
			$v['lev']=$lev;
			$subs[]=$v;
			//每调用一次就初始化一次
			subTree($arr,$v['id'],$lev+1);
			echo "<br/>";
		}
	}
	return $subs;
}
$tree=subTree($arr,0,1);
foreach($tree as $v){
	echo str_repeat('&nbsp;',$v['lev']).$v['name'].'<br/>';
}
function subTrees($arr,$id,$lev){
	$subs=array();
	foreach($arr as $v){
		if($v['parent']==$id){
			$v['lev']=$lev;
			$subs[]=$v;
			//每调用一次就初始化一次
			$subs=array_merge($subs,subTrees($arr,$v['id'],$lev+1));
			echo "<br/>";
		}
	}
	return $subs;
}
$tree=subTrees($arr,0,1);
foreach($tree as $v){
	echo str_repeat('&nbsp;',$v['lev']).$v['name'].'<br/>';
}
//家谱树
function familyTree($arr,$id){
	$tree=array();
	foreach($arr as $v){
		if($v['id']==$id){
			if($v['parent']>0){
			$tree=array_merge($tree,familyTree($arr,$v['parent']));
			}
			$tree[]=$v;
		}
	}
	return $tree;
}
print_r(familyTree($arr,4));


//

//以下迭代
//家族谱
function tree($arr,$id){
	$tree=array();
	while($id!==0){
		foreach($arr as $v){
			if($v['id']==$id){
				$tree[]=$v;
				$id=$v['parent'];
				break;
			}	
		}
	}
	return $tree;
}
echo '<br/>';
print_r(tree($arr,4));
//子孙树
function subTreess($arr,$id){
	$task=array($id);
	$tree=array();
	while(!empty($task)){
		$flag=false;
		foreach($arr as $k=>$v){
			if($v['parent']==$id){
				$tree[]=$v;
				array_push($task,$v['id']);
				$id=$v['id'];
				unset($arr[$k]);
				$flag=true;
				break;
			}
		}
		if($flag==false){
			array_pop($task);
			$parent=end($task);
		}
	}
	return $tree;
}
echo '<br/>';
print_r(subTreess($arr,1));
?>