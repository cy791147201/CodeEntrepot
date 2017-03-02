<?php
// 暂时没搞定
// 是否是自己上传的视频才可以
error_reporting(E_ALL & ~E_NOTICE);

if($tudou = $_POST['url']){
	$itemCodes = basename($tudou);
}

$key = '58901b6d2798b276';
$api = 'http://api.tudou.com/v3/gw?method=item.info.get&appKey='.$key.'&format=xml&itemCodes=yg8CVootoAc';

$url = file_get_contents($api);

$strat = strpos($url, '<html5Url>
');
$end = strpos($url, '</html5Url>
');
$noad = substr($url, $end - $strat);

echo $noad;
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!-- 土豆去广告 -->
	<form method = 'post'>
		<input type="text" name="url"/><br/>
		<input type="submit" value = '土豆去广告'/>
	</form>
	<input type="text" name="noad">
</body>
</html>