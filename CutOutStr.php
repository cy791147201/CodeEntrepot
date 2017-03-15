<?php 
/**
 * utf8字符转换成Unicode字符
 * @param  [type] $utf8_str Utf-8字符
 * @return [type]           Unicode字符
 */
function utf8_str_to_unicode($utf8_str) {
    $unicode = 0;
    $unicode = (ord($utf8_str[0]) & 0x1F) << 12;
    $unicode |= (ord($utf8_str[1]) & 0x3F) << 6;
    $unicode |= (ord($utf8_str[2]) & 0x3F);
    return dechex($unicode);
}

/**
 * Unicode字符转换成utf8字符
 * @param  [type] $unicode_str Unicode字符
 * @return [type]              Utf-8字符
 */
function unicode_to_utf8($unicode_str) {

    $utf8_str = '';
    $code = intval(hexdec($unicode_str));
    //这里注意转换出来的code一定得是整形，这样才会正确的按位操作
    $ord_1 = decbin(0xe0 | ($code >> 12));
    $ord_2 = decbin(0x80 | (($code >> 6) & 0x3f));
    $ord_3 = decbin(0x80 | ($code & 0x3f));
    $utf8_str = chr(bindec($ord_1)) . chr(bindec($ord_2)) . chr(bindec($ord_3));
    return $utf8_str;
}


$utf8_str = '我';

//这是汉字“你”的Unicode编码
$unicode_str = 'u5236_';
// $unicode_str = 'u5236';

//输出 6211
echo utf8_str_to_unicode($utf8_str) . "<br/>";

//输出汉字“你”
echo unicode_to_utf8($unicode_str);



function replace_unicode_escape_sequence($match) {

      return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
}

function unicodeDecode($data){  
     
    $rs = preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $data);
  
    return $rs;
}  

//调用
$name = '\u65b0\u6d6a\u5fae\u535a_123';
echo unicodeDecode($name); //输出新浪微博

