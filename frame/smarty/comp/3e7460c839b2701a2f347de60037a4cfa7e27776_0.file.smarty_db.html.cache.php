<?php
/* Smarty version 3.1.29, created on 2016-05-27 18:39:32
  from "F:\Apache24\htdocs\smarty\value\smarty_db.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => true,
  'version' => '3.1.29',
  'unifunc' => 'content_574823e4307e49_82718157',
  'file_dependency' => 
  array (
    '3e7460c839b2701a2f347de60037a4cfa7e27776' => 
    array (
      0 => 'F:\\Apache24\\htdocs\\smarty\\value\\smarty_db.html',
      1 => 1464345566,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_574823e4307e49_82718157 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '28765574823e41a07f6_88522862';
?>
<table border="3" width="800" align="center">
<?php echo '/*%%SmartyNocache:28765574823e41a07f6_88522862%%*/<?php echo $_smarty_tpl->tpl_vars[\'time\']->value;?>
/*/%%SmartyNocache:28765574823e41a07f6_88522862%%*/';?>

	<?php
$_from = $_smarty_tpl->tpl_vars['users']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_user_0_saved_item = isset($_smarty_tpl->tpl_vars['user']) ? $_smarty_tpl->tpl_vars['user'] : false;
$__foreach_user_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
$_smarty_tpl->tpl_vars['user'] = new Smarty_Variable();
$__foreach_user_0_first = true;
$_smarty_tpl->tpl_vars['user']->index=-1;
$__foreach_user_0_iteration=0;
$_smarty_tpl->tpl_vars['user']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
$_smarty_tpl->tpl_vars['user']->index++;
$__foreach_user_0_iteration++;
$_smarty_tpl->tpl_vars['user']->first = $__foreach_user_0_first;
$_smarty_tpl->tpl_vars['user']->last = $__foreach_user_0_iteration == $__foreach_user_0_total;
$__foreach_user_0_first = false;
$__foreach_user_0_saved_local_item = $_smarty_tpl->tpl_vars['user'];
?>
		<?php if ($_smarty_tpl->tpl_vars['user']->first) {?>
			<tr bgcolor="red">
		<?php } elseif ($_smarty_tpl->tpl_vars['user']->last) {?>
			<tr bgcolor="pink">
		<?php } elseif (!(1 & $_smarty_tpl->tpl_vars['user']->index)) {?>	
			<tr bgcolor="orange">
		<?php } else { ?>
			<tr>
		<?php }?>
			<?php
$_from = $_smarty_tpl->tpl_vars['user']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_col_1_saved_item = isset($_smarty_tpl->tpl_vars['col']) ? $_smarty_tpl->tpl_vars['col'] : false;
$_smarty_tpl->tpl_vars['col'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['col']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['col']->value) {
$_smarty_tpl->tpl_vars['col']->_loop = true;
$__foreach_col_1_saved_local_item = $_smarty_tpl->tpl_vars['col'];
?>
				<td><?php echo $_smarty_tpl->tpl_vars['col']->value;?>
</td>
			<?php
$_smarty_tpl->tpl_vars['col'] = $__foreach_col_1_saved_local_item;
}
if ($__foreach_col_1_saved_item) {
$_smarty_tpl->tpl_vars['col'] = $__foreach_col_1_saved_item;
}
?>
		</tr>
	<?php
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_0_saved_local_item;
}
if (!$_smarty_tpl->tpl_vars['user']->_loop) {
?>
		没有查询到用户
	<?php
}
if ($__foreach_user_0_saved_item) {
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_0_saved_item;
}
?>
</table><?php }
}
