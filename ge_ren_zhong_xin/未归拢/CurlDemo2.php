<?php	
	header('content-type:text/html; charset=gbk');
	// 登陆
	function login($name = '', $pwd =''){
		// 生成临时文件
		$cookie = tempnam('./', 'coo');

		if ($name != '' && $pwd !='') {
			// 进行登陆
			// 登录页面  pwuser当前网页用户名 pwpwd密码 hideid当前网页 隐身登陆
			$ch = curl_init('http://cbu01.alicdn.chao-buy.net/adminpanel222/login.asp?action=login');

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_POST, 1);

			curl_setopt($ch, CURLOPT_POSTFIELDS, "txtMACAddr=&username=$name&password=$pwd&btnPost=登录");
			curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
			curl_exec($ch);
			curl_close($ch);
		}else{
			echo '请在文件中输入用户名和密码';
		}
		// return $cookie文件
		return $cookie;
	}

	// 执行登陆
	// 注意中文转码， 中文可以登录，但是curl就不行
	$cookie = login('root_user', 'sparkoo!123321');

	function query($url = '', $cookie){
		if ($url != '') {
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
			curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
			$res = curl_exec($ch);
			curl_close($ch);
		}else{
			echo '请输入url';
		}
		return $res;
	}

	// 查询想要的面面并得到返回的页面的html代码
	$res = query('http://cbu01.alicdn.chao-buy.net/adminpanel222/not_chanpin.asp', $cookie);

	// // 设置金币的匹配
	// $pattern = '/<span class="f24 b s2 mb5" style="line-height:1\.1;font-family:Georgia;">(.*?)<\/span>/';

	// // 匹配金币数目
	// preg_match($pattern, $res, $matches);

	// // 输出
	// echo '你在php100的论坛有这么多金币：'.$matches['1'];


	print_r($res);


	// 删除临时文件，服务器上这个命令好像是不可用的。
	if(is_file($cookie)){
		unlink($cookie);
	}
