<?php if (!defined('THINK_PATH')) exit(); echo W("Main",array('module'=>MODULE_NAME,'action'=>ACTION_NAME,'do'=>$_GET['do']));?>

<div class="layout-main">    
    <div id="breadclumb" class="box">
        <h3><strong><?php echo lang('breadclumb_colon');?></strong><?php echo lang(MODULE_NAME);?><span></span><?php echo lang('user_list');?></h3>
    </div>
    <div id="CooperationMain" class="box clear-fix">   
        <div class="layout-block-header">
            <button type="button" class="btn btn-ok" onclick="group(0)"><?php echo lang('add_group');?></button>
        </div>
        
		<form action="<?php echo U('User/deleteAll');?>" method="post" id="deleteform">
        <div class="ui-table">
            <div class="ui-table-body ui-table-body-hover">
                <table cellpadding="0" cellspacing="0" width="100%" >
                    <thead>
                        <tr class="ui-table-head">
                            <th class="ui-table-hcell" width="20"><input type="checkbox" id="check_box" onclick="$.Select.All(this,'id[]');" ></th>
                            <th class="ui-table-hcell"><?php echo lang('name');?></th>
                            <th class="ui-table-hcell">授权</th>
                            <th class="ui-table-hcell" width="180"><?php echo lang('action');?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="row-<?php echo ($vo["id"]); ?>">
                            <td><input type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>" onclick="$.Select.This(this);"></td>
                            <td><?php echo ($vo["name"]); ?></td>
                            <td>
								<?php $auth=explode('|',$vo['auth']); foreach($auth as $li){ echo "<span style='margin-right:15px;'>".$agentAuth[$li]."</span>"; } ?>
							</td>
                            <td class="action">
                                <q onclick="group('<?php echo ($vo["id"]); ?>')"><?php echo lang('edit');?></q> |
								<q onclick="javascript:Delete('<?php echo ($vo["id"]); ?>','<?php echo U('User/proccess/',array('do'=>'delete','module'=>'UserGroup','id'=>$vo['id']));?>')"><?php echo lang('delete');?></q>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
          
        <div class="ui-pager-bar clearfix" style="padding-left:10px;">
			<div class="float-left">
				<input type="hidden" name="model" value="UserGroup">
				<input type="checkbox" id="check_box" onclick="$.Select.All(this,'id[]');" >选择/反选 
				<input type="button" name="del" value="批量删除" class="btn btn-ok" onclick="delConfirm()">
			</div>
			<div class="ui-pager" style="float:right"><?php echo ($page); ?></div>
		</div>
		
		</form>
	</div><!--.box-->
<script type="text/javascript">
function group(id){
	var url = "?m=User&a=userGroupEdit&role=<?php echo ($role); ?>&id="+id;
	$.open(url,{title:'用户组编辑',width:520,height:250})
}
function delConfirm(){
	$.confirm('是否要删除？',function(){ 
		$('#deleteform').submit();
	},true)
}
</script>
<?php echo W("Foot");?>