<?php 
require_once"smartystart.php";
/*$smarty->assign(array("title"=>"shen","content"=>"shuang","hello"=>"hello world"));
class Preson{
	public $name="shen";
	public $sex="nan";

	public function say(){
		echo "this is {$this->name} sex is {$this->sex}";
	}
	public function see(){
		echo "{$this->name} use {$this->name} eye";
	}
}
$smarty->assign("s",new Preson);
$smarty->assign("arr",array("1","2","3"));
$smarty->assign("arrs",array("hello"=>array("1","2","3")));
$smarty->display("test.html");
$smarty->display("smarty_variable.html");
$smarty->display("smarty_kongzhi.html");
$smarty->display("smarty_function.html");
$smarty->display("smarty_foreach2.html");
$smarty->display("smarty_setction.html");*/
$smarty->display("smarty_extends.html");
?>