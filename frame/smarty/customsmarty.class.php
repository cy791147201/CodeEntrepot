<?php 
class smarty{
	private $vars=array();
	//向分配变量 模板的变量名 变量值
	public function assign($varname,$varvalue){
		$this->vars[$varname]=$varvalue;
	}
	//加载指定模板 模板的文件名
	public function display($smartyname){
		$compiledir="./compile/".$smartyname."_conpile.php";
		$templatedir="./template/".$smartyname;
		if(!file_exists($compiledir)||filemtime($templatedir)>filemtime($compiledir)){

			$html=file_get_contents($templatedir);
			$zz='/\{\s*\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*\}/';
			$rep="<?php echo \$this->vars['\\1']?>";
			$newhtml=preg_replace($zz,$rep,$html);
			file_put_contents($compiledir,$newhtml);
		}
		require_once  $compiledir;
	}
}
?>