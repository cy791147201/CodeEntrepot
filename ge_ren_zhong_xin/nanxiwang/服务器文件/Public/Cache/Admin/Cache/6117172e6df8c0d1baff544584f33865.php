<?php if (!defined('THINK_PATH')) exit(); echo W("Main",array('module'=>MODULE_NAME,'action'=>ACTION_NAME,'do'=>$_GET['do']));?>

<div class="layout-main">    
    <div id="breadclumb" class="box">
        <h3><strong><?php echo lang('breadclumb_colon');?></strong><?php echo lang(MODULE_NAME);?><span></span><?php if(empty($_GET["id"])): echo lang('add'); else: echo lang('edit'); endif; ?></h3>
    </div>
    <div class="box clear-fix">
        <div class="layout-block-header"><h2><?php echo lang('details_info');?></h2></div>  
        <div id="AccountInfo">
            <div class="info-block">
                <form method="post" action="<?php echo U(MODULE_NAME.'/proccess/');?>" id="ajaxform" enctype="multipart/form-data">
                <table class="info-table">
                    <tbody>
                    <tr>
                    	<th><b class="verifing">*</b><?php echo lang('user_type_colon');?></th>
                        <td>
							<select name="role" <?php if(($_SESSION['user']['role']) == "admin"): ?>onchange="changeRole(this.value)"<?php endif; ?>>
								<?php if(($_SESSION['user']['role']) == "admin"): ?><option value="admin"><?php echo lang('admin');?></option>
								<option value="agent"><?php echo lang('agent');?></option><?php endif; ?>
								<option value="member"><?php echo lang('member');?></option>
							</select>
						</td>
                    </tr>
					<?php if(($_SESSION['user']['role']) == "admin"): ?><tr id="agent" style="display:none;">
                    	<th><b class="verifing">*</b><?php echo lang('agent_colon');?></th>
                        <td>
							<select name="pid">
								<?php if(is_array($agent)): $i = 0; $__LIST__ = $agent;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["username"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</td>
                    </tr>
					<tr id="group" style="display:none;">
                    	<th><b class="verifing">*</b><?php echo lang('group_colon');?></th>
                        <td>
							<select name="group_id" id="group_id">
								<option value="0"><?php echo lang('select_group');?></option>
							</select>
						</td>
                    </tr><?php endif; ?>
					
					<tr>
                    	<th><b class="verifing">*</b><?php echo lang('status_colon');?></th>
                        <td><select name="status"><option value="1">启用</option><option value="0">禁用</option></select></td>
                    </tr>
					<tr>
                    	<th><b class="verifing">*</b><?php echo lang('username_colon');?></th>
                        <td><input type="text" name="username" class="ui-text validate[required,minSize[4]]" /></td>
                    </tr>
                    <tr>
                    	<th><b class="verifing">*</b><?php echo lang('login_password_colon');?></th>
                        <td><input type="password" name="password" id="password" class="ui-text validate[required,minSize[6]]" /></td>
                    </tr>
                    <tr>
                    	<th><b class="verifing">*</b><?php echo lang('confirm_password_colon');?></th>
                        <td><input type="password" name="repassword" class="ui-text validate[required,equals[password]]" /></td>
                    </tr>
                    <tr><th><b class="verifing">*</b><?php echo lang('realname_colon');?></th><td><input name="realname" type="text" class="ui-text validate[required,minSize[2]]"></td></tr>
                    <tr><th><b class="verifing">*</b><?php echo lang('mobile_colon');?></th><td><input name="mobile" type="text" class="ui-text validate[required,custom[mobile]]"></td></tr>
                    <tr><th><?php echo lang('qq_colon');?></th><td><input name="qq" type="text" class="ui-text" ></td></tr>
                    <tr>
                    	<th>&nbsp;</th>
                        <td>
                        	<input type="hidden" name="action" value="add" />
                        	<input type="hidden" name="auth" value="1" />
                        	<input type="submit" class="btn btn-ok" value="<?php echo lang('confirm');?>" />
                        </td>

                    </tr>
                    </tbody>
                </table>
                </form>
            </div>
        </div>  
    </div><!--.box-->
<link href="__PUBLIC__/Assets/js/validation/validationEngine.jquery.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/Assets/js/validation/jquery.validationEngine.js"></script>
<script type="text/javascript" src="__PUBLIC__/Assets/js/validation/jquery.validationEngine-zh_CN.js"></script>
<script type="text/javascript">
$(function(){
	$("#ajaxform").validationEngine('attach', {promptPosition : "centerRight", autoPositionUpdate : true}); 
    $('#ajaxform').ajaxForm({
        timeout: 5000,
        error:function(){ $('#ajaxLoading').hide();alert("<?php echo lang('ajaxError');?>");},
        beforeSubmit:function(){ $('#ajaxLoading').show();},
        success:function(data){ 
            $('#ajaxLoading').hide();
            if(data.status==1){
                var redirectURL = "<?php if(empty($_GET["id"])): echo U('User/index'); else: echo ($_SERVER['HTTP_REFERER']); endif; ?>";
                $.alert(data.info,data.status,function(){window.location.href=redirectURL});
            }else{
                $.alert(data.info,data.status);
            }
        },
        dataType: 'json'
    });
	changeRole('admin');
});

function itemAdd(){
	var item = '<p style="margin-top:5px;"><?php echo lang('name_colon');?><input name="title[]" type="text" class="ui-text" value="<?php echo ($info["title"]); ?>" size="20"><?php echo lang('price_colon');?><input name="price[]" type="text" class="ui-text" value="<?php echo ($info["price"]); ?>" size="4"><input type="button" class="ui-button" value="<?php echo lang('delete');?>" onclick="itemDel($(this))" /></p>';
	$('.item-list').append(item);
}
function itemDel(obj){
	obj.parent().remove();
}
function changeRole(role){
	if(role=='member'){
		$('#agent').show();
	}else{
		$('#agent').hide();
	}
	if(role=='member'){
		$('#group').hide();
	}else{
		$.ajax({
		   type: "GET",
		   url: "<?php echo U('User/getGroup');?>",
		   data:{role:role},
		   dataType: "html",
		   success:function(data){ 
				$('#group_id').html(data);  
		   }
		 });
		$('#group').show();
	}
}
</script>     
       
<?php echo W("Foot");?>