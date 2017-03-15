<?php
$cookie_file = "tmp.cookie";
$login_url = "http://liehu.cmcm.com/login/index.html";
$verify_code_url = "http://liehu.cmcm.com/register/getCaptcha?type=login&t=0.014332915269714697";

$curl = curl_init();
$timeout = 5;
curl_setopt($curl, CURLOPT_URL, $login_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);

$contents = curl_exec($curl);
curl_close($curl);
 
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $verify_code_url);
curl_setopt($curl, CURLOPT_COOKIEFILE, $cookie_file);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$img = curl_exec($curl);
curl_close($curl);
 
$fp = fopen("verifyCode.jpg","w");
fwrite($fp,$img);
fclose($fp);

sleep(20);
 
$code = file_get_contents("code.txt");

$post = "email=1052251480@qq.com&password=XwnBJdKy0WO5&code=$code&dosubmit=1&rememberme=0";
$curl = curl_init();
$url = "http://liehu.cmcm.com/login/login";
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_POST, 1 );

curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);

curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
curl_setopt($curl, CURLOPT_COOKIEFILE, $cookie_file);
$result=curl_exec($curl);
curl_close($curl);
 
$curl= curl_init('http://liehu.cmcm.com/poweredit/planlist.html');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_COOKIEFILE, $cookie_file);
curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie_file);
$res = curl_exec($curl);
curl_close($curl);

//抓取动态数据
$preg = '/key="([0-9]{8})"/'; 
preg_match_all($preg, $res, $data);

$data = implode(',', $data[0]);

$preg1 = '/([0-9]{8})/'; 
preg_match_all($preg1, $data, $keys);

$key = implode(',', $keys[0]);

echo '-----------------------------------------------------';

$curl= curl_init('http://liehu.cmcm.com/api/report/getAdReport?type=plan&range_type=today&ids='.$key.'&start=%2000:00:00&end=%2023:59:59');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_COOKIEFILE, $cookie_file);
curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie_file);
$res = curl_exec($curl);
curl_close($curl);


var_dump($res);


