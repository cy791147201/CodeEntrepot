<?php
class RelateWidget extends Widget 
{
	public function render($request){
		//$sn = trim($request['id']);
		$list = M('Item')->query("SELECT * FROM __TABLE__ WHERE id >= (SELECT floor(RAND() * (SELECT MAX(id) FROM __TABLE__))) ORDER BY id LIMIT 4;");
		include('Tpl/Relate.php');
	}
}
?>