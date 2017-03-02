<?php
require 'aliziApi.php';
payLog($_POST,'yunpay');
echo http( getNotifyUrl('yunpay'), 'POST',$_POST);
?>