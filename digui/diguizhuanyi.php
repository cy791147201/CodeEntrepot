<?php 
//递归转移	
$arr=array('a"b',array("c'd",array('e"f')));
function _addsladhes($arr){
	foreach($arr as $k=>$v){
		if(is_string($v)){
			$arr[$k]=addslashes($v);
		}else if(is_array($v)){
			$arr[$k]=_addsladhes($v);
		}
	}
	return $arr;
}
print_r(_addsladhes($arr));
print_r($arr);
?>