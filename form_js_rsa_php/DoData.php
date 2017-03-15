<?php  
// $PubKey  = "-----BEGIN PUBLIC KEY-----
// MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDJduEmKCMvNnVqkEbvQ2b/dLdt
// sSCe7lu60yL8aMKOR0kTVORJpgECFAtGcmgT76gdVB5dxjbL3eesexRNTSWyrI/E
// jBSL6T9GRk4jMY8XpqEXB5fXZ/uJYQnbYC7dHEJJax5bviaHAvQkKBoZJ0Hb767l
// cwgQ5aZcQe/dSnlBswIDAQAB
// -----END PUBLIC KEY-----";  
// $PriKey = "-----BEGIN PRIVATE KEY-----
// MIICdwIBADANBgkqhkiG9w0BAQEFAASCAmEwggJdAgEAAoGBAMl24SYoIy82dWqQ
// Ru9DZv90t22xIJ7uW7rTIvxowo5HSRNU5EmmAQIUC0ZyaBPvqB1UHl3GNsvd56x7
// FE1NJbKsj8SMFIvpP0ZGTiMxjxemoRcHl9dn+4lhCdtgLt0cQklrHlu+JocC9CQo
// GhknQdvvruVzCBDlplxB791KeUGzAgMBAAECgYEAsN82weohIbUdFqZ+MFcrmQEe
// fSYx7nZzgC0XnSRYEtOQ23D/T413exyf3YRZzY7tOHp+gnOf7hHu8KXJ6Cff/FHx
// 6D6q4P8e0rskP2FRG/8VoHsQ0VUSN12pbFAInoQKcYEPGgr1f0Lds2md0g/3PTOr
// 2kE/0nUVet5QWyKnmmkCQQD7A2Lue3tJFrXZX6/cHfCDcEv0+tJg+d6t8saDkhDc
// kK5LFWfbtGmkO/YkTJp58OX6wtvooW1mzF/BHrKR69h/AkEAzXd+0qIVzx8p1oE5
// /RAre8u87N5Xt+LssBZ7H2kJXJHqYOPPMyCNrYoGmxwBHSzPMv1atFpng8gYiy2y
// e5EczQJAbTI18YUqRstoZJ3pxRoJLUTG5lXO+3z30DhS/52lVC5khClVuxAq/NVQ
// 6M2iTfXsNkBapkLDcvrplPujtzMgRQJAGG6aLQ/LChsJjZFGRPpUQV9DsuLpiVs5
// i+LQdza1P0W2mhjcvZakYjtkd7NHyqFWbhjEXWfWoUv85yfi7mCeDQJBAN0Rf7O7
// KXr80xS1vu9SbjBRSuAln3y8IN/mbOFKDbDoVG/hHJwgqfCu0rSeQfTdTYtfKYr3
// mwy3NkeskjRrvcA=
// -----END PRIVATE KEY-----
// ";  

// 验证密钥是否可用，可用返回resource of type (OpenSSL key)，不可用返回false
// var_dump(openssl_pkey_get_public($PubKey));  
// var_dump(openssl_pkey_get_private($PriKey));  

// 公钥加密信息
// $data = "This is the need to encrypt the data";  
// openssl_public_encrypt($data, $EncryptData, $PubKey);  
// 私钥解密信息
// openssl_private_decrypt($EncryptData, $DecryptData, $PriKey);  
// echo "解密后的数据".$DecryptData;  


$PriKey = "-----BEGIN PRIVATE KEY-----
MIICdwIBADANBgkqhkiG9w0BAQEFAASCAmEwggJdAgEAAoGBAMl24SYoIy82dWqQ
Ru9DZv90t22xIJ7uW7rTIvxowo5HSRNU5EmmAQIUC0ZyaBPvqB1UHl3GNsvd56x7
FE1NJbKsj8SMFIvpP0ZGTiMxjxemoRcHl9dn+4lhCdtgLt0cQklrHlu+JocC9CQo
GhknQdvvruVzCBDlplxB791KeUGzAgMBAAECgYEAsN82weohIbUdFqZ+MFcrmQEe
fSYx7nZzgC0XnSRYEtOQ23D/T413exyf3YRZzY7tOHp+gnOf7hHu8KXJ6Cff/FHx
6D6q4P8e0rskP2FRG/8VoHsQ0VUSN12pbFAInoQKcYEPGgr1f0Lds2md0g/3PTOr
2kE/0nUVet5QWyKnmmkCQQD7A2Lue3tJFrXZX6/cHfCDcEv0+tJg+d6t8saDkhDc
kK5LFWfbtGmkO/YkTJp58OX6wtvooW1mzF/BHrKR69h/AkEAzXd+0qIVzx8p1oE5
/RAre8u87N5Xt+LssBZ7H2kJXJHqYOPPMyCNrYoGmxwBHSzPMv1atFpng8gYiy2y
e5EczQJAbTI18YUqRstoZJ3pxRoJLUTG5lXO+3z30DhS/52lVC5khClVuxAq/NVQ
6M2iTfXsNkBapkLDcvrplPujtzMgRQJAGG6aLQ/LChsJjZFGRPpUQV9DsuLpiVs5
i+LQdza1P0W2mhjcvZakYjtkd7NHyqFWbhjEXWfWoUv85yfi7mCeDQJBAN0Rf7O7
KXr80xS1vu9SbjBRSuAln3y8IN/mbOFKDbDoVG/hHJwgqfCu0rSeQfTdTYtfKYr3
mwy3NkeskjRrvcA=
-----END PRIVATE KEY-----";   
$data = $_POST['CipherText'];//十六进制数据  
$EncryptData = pack("H*", $data);//对十六进制数据进行转换  
openssl_private_decrypt($EncryptData, $DecryptData, $PriKey);  
echo '解密前的数据<br/>'.$data; 
echo '<br/>';
echo '解密后的数据<br/>'.$DecryptData; 