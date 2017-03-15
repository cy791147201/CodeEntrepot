<?php
require_once '../libs/Smarty.class.php';

$smarty=new smarty;
$smarty->setTemplateDir('../templates');
$smarty->setCompileDir('../compile');
$smarty->setConfigDir('../config/');
$smarty->addPluginsDir('../plugin/');
$smarty->caching=2;
$smarty->setCacheDir('../cache/');
$smarty->cache_lifetime=0;
$smarty->auto_literal=false;
$smarty->left_delimiter='<{';
$smarty->right_delimiter='}>';