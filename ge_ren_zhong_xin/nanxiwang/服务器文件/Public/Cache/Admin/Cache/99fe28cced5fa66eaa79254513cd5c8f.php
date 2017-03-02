<?php if (!defined('THINK_PATH')) exit(); echo W("Main",array('module'=>MODULE_NAME,'action'=>ACTION_NAME,'do'=>$_GET['do']));?>

<div class="layout-main">    
    <div id="breadclumb" class="box">
        <h3><strong><?php echo lang('breadclumb_colon');?></strong><?php echo lang(MODULE_NAME);?><span></span><?php echo lang('bulk_action');?></h3>
    </div>
    <div class="box clear-fix">
        <div class="layout-block-header"><h2><?php echo lang('bulk_action');?></span></h2></div>  
        <div class="AccountInfo">
            <div class="info-block">
				<form method="post" action="<?php echo U('Order/import');?>" id="ajaxform" enctype="multipart/form-data">
                <table class="info-table">
                    <tbody>
                    	<tr>
							<th width="200"><?php echo lang('action_status_colon');?></th>
                            <td>
								<select name="status" id="order-status" onchange="changeStatus(this.value)">
									<?php if(is_array($status)): $i = 0; $__LIST__ = $status;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"><?php echo (strip_tags($vo)); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
								<select name="delivery_name" id="delivery_name" style="display:none;">
									<?php if(is_array($delivery)): $i = 0; $__LIST__ = $delivery;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"><?php echo (strip_tags($vo)); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
							</td>
                        </tr>
						<tr>
                            <th><?php echo lang('import_excel_colon');?></th>
                            <td class="extends">
								<input type="file" name="excel">
							</td>
                        </tr>
						<tr>
                            <th>&nbsp;</th>
                            <td class="extends">
								<input type="submit" class="btn btn-ok" value="<?php echo lang('submit');?>">
								<input type="hidden" class="btn btn-ok" name="upload" value="1">
							</td>
                        </tr>
						<tr>
							<th>说明信息：</th>
                            <td>
								导入Excel表格的第一行为标题共3列，分别为：<b style="color:#f00">订单编号、快递单号、操作备注</b><br>
								其中订单编号为必填，快递单号和操作备注选填，但是选择【发货】状态时需要填写快递单号

							</td>
                        </tr>
                    </tbody>
                </table>
				</form>
            </div>
        </div>  
    </div><!--.box-->
	

	
<script type="text/javascript">
$(function(){
    $('#ajaxform').ajaxForm({
        timeout: 15000,
        error:function(){ $('#ajaxLoading').hide();alert("<?php echo lang('ajaxError');?>");},
        beforeSubmit:function(){ 
			if( $('#remark').val()==''){
				$.alert('请输入备注内容',0);
				return false;
			}
			if(!confirm('确认操作？')) return false;

			$('#ajaxLoading').show().find('span').text("<?php echo lang('loading');?>");
		},
        success:function(data){ 
            
            if(data.status==1){
				var status = $('#order-status').val(),delivery_name = $('#delivery_name').val();
		
				console.log(data);
				var num = 1,total=data.info+1;
				timer = setInterval(function(){
					if(num<=total){
						num++;
						json = data.data[num];
						$.ajax({
							url:"<?php echo U('Order/import');?>",
							type:"POST",
							data:{status:status,delivery_name:delivery_name,order_no:json[0],delivery_no:json[1],remark:json[2]},
							dataType:"json",
							success:function(rs){
								$('#ajaxLoading').show().find('span').text("已完成 "+(num-1)+"/"+data.info);
								if(num>=total){
									console.log(num+'/'+total);
									clearInterval(timer);
									$('#ajaxLoading').hide();
									$.alert("<?php echo lang('success');?>",1,false);
								}
							}
						})
					}else{
						clearInterval(timer);
						$('#ajaxLoading').hide();
						$.alert("<?php echo lang('success');?>",1);
					}
				},2000);
            }else{
                $.alert('Error',0);
            }
        },
        dataType: 'json'
    });
});
function changeStatus(id){
	if(id=='3'){
		$('#delivery_name').show()
	}else{
		$('#delivery_name').hide()
	}
}
</script>     
       
<?php echo W("Foot");?>