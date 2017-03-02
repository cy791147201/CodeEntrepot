<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<link href="__PUBLIC__/Assets/css/esui.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/Assets/css/union.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/Assets/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Assets/js/jquery.form.js"></script>
</head>
<body>
<div class="layout-main">    
    <div class="box clear-fix">
		<form method="post" action="<?php echo U('User/userGroupEdit');?>" id="ajaxform" enctype="multipart/form-data">
			<table class="info-table">
				<tbody>
					<tr>
						<th>分组名称：</th>
						<td class="extends">
							<input type="text" name="name" value="<?php echo ($group["name"]); ?>" class="ui-text">
						</td>
					</tr>
					
					<tr>
						<th>分组权限：</th>
						<td class="extends">
							<?php if(is_array($auth)): $i = 0; $__LIST__ = $auth;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><label style="float:left;display:block;margin-right:30px;word-break: break-all;word-wrap: break-word;"><input type="checkbox" name="auth[]" value="<?php echo ($key); ?>" <?php if(in_array($key,$group['auth'])): ?>checked<?php endif; ?>><span><?php echo ($vo); ?></span></label><?php endforeach; endif; else: echo "" ;endif; ?>
						</td>
					</tr>
					
					<tr>
						<th>&nbsp;</th>
						<td class="extends">
							<?php if(!empty($group["id"])): ?><input type="hidden" name="id" value="<?php echo ($group['id']); ?>"><?php endif; ?>
							<input type="submit" class="btn btn-ok" value="<?php echo lang('submit');?>">
							<input type="hidden" name="role" value="<?php echo ($_GET['role']); ?>">
						</td>
					</tr>
				</tbody>
			</table>
			</form>
    </div><!--.box-->
<script type="text/javascript" src="__PUBLIC__/Assets/js/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript">
$(function(){
    $('#ajaxform').ajaxForm({
        success:function(data){ 
			color = data.data;
			parent.$.alert('操作成功',1,false);
		},
        dataType: 'json'
    });
});

</script>   
<link href="__PUBLIC__/Assets/js/umeditor/themes/default/css/umeditor.min.css" type="text/css" rel="stylesheet">
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Assets/js/umeditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="__PUBLIC__/Assets/js/umeditor/umeditor.min.js"></script>
<script type="text/javascript">  
UM.getEditor('content',{autoHeightEnabled:true,initialFrameWidth:750,initialFrameHeight:80});
UM.getEditor('reply_content',{autoHeightEnabled:true,initialFrameWidth:750,initialFrameHeight:80});
</script>  
</body>
</html>