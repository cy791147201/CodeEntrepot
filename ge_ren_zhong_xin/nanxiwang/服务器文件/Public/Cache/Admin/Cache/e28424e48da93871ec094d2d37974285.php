<?php if (!defined('THINK_PATH')) exit(); echo W("Main",array('module'=>MODULE_NAME,'action'=>ACTION_NAME));?>
<script type="text/javascript" src="__PUBLIC__/Assets/js/My97DatePicker/WdatePicker.js"></script>
<div class="layout-main">    
    <div id="breadclumb" class="box">
        <h3><strong><?php echo lang('breadclumb_colon');?></strong><?php echo lang(MODULE_NAME);?><span></span><?php echo lang('order_statistics');?></h3>
    </div>
    <div id="CooperationMain" class="box clear-fix">   
        <div class="layout-block-header">
            <form action="__SELF__" method="get" id="searchform">
            	<input type="hidden" name="s" value="<?php echo (MODULE_NAME); ?>" />
				<input type="hidden" name="a" value="<?php echo (ACTION_NAME); ?>" />
                <label><?php echo lang('search_colon');?></label>
				<input type="text" name="start" value="<?php echo (trim($_GET['start'])); ?>" size="18" class="ui-text Wdate" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'});">
				至
				<input type="text" name="end" value="<?php echo (trim($_GET['end'])); ?>" size="18" class="ui-text Wdate" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'});">
                <button type="submit" class="btn btn-ok"><?php echo lang('search');?></button>
            </form>
        </div>
        
		<form action="<?php echo U('Article/todo');?>" method="post" id="deleteform">
        <div class="ui-table">
            <div class="ui-table-body ui-table-body-hover">
                <table cellpadding="0" cellspacing="0" width="100%" >
                    <thead>
                        <tr class="ui-table-head">
                            <th class="ui-table-hcell" width="150"><?php echo lang('province');?></th>
                            <th class="ui-table-hcell" width="100">数量</th>
                            <th class="ui-table-hcell" width="100">总价</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($statistics)): $i = 0; $__LIST__ = $statistics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="row-<?php echo ($vo["item_id"]); ?>">
                            <td><?php if(empty($vo["province"])): ?>其它<?php else: echo ($vo["province"]); endif; ?></td>
							<td><b class="alert"><?php echo ($vo["quantity"]); ?></b></td>
							<td><p><?php echo ($vo["price"]); ?></p></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
		
		</form>
</div><!--.box-->
<?php echo W("Foot");?>