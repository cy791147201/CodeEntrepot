<?php if (!defined('THINK_PATH')) exit(); echo W("Main",array('module'=>MODULE_NAME,'action'=>ACTION_NAME));?>

<div class="layout-main">    
    <div id="breadclumb" class="box">
        <h3><strong><?php echo lang('breadclumb_colon');?></strong><?php echo lang(MODULE_NAME);?><span></span><?php echo lang('item_list');?></h3>
    </div>
    <div id="CooperationMain" class="box clear-fix">   
        <div class="layout-block-header">
            <form action="__SELF__" method="get" id="searchform">
                <input type="hidden" name="s" value="<?php echo (MODULE_NAME); ?>" />
                <input type="hidden" name="a" value="<?php echo (ACTION_NAME); ?>" />
                <label><?php echo lang('search_colon');?></label>
                <input type="text" name="keyword" value="<?php echo (trim($_GET['keyword'])); ?>" class="ui-text" autocomplete="off" size="40">
                <select name="category_id">
                    <option value="0"><?php echo lang('select_category');?></option>
                    <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if(($_GET["category_id"]) == $v["id"]): ?>selected='selected'<?php endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <button type="submit" class="btn btn-ok"><?php echo lang('search');?></button>
            </form>
        </div>
        
        <form action="<?php echo U('Item/todo');?>" method="post" id="deleteform">
        <div class="ui-table">
            <div class="ui-table-body ui-table-body-hover">
                <table cellpadding="0" cellspacing="0" width="100%" >
                    <thead>
                        <tr class="ui-table-head">
                            <th class="ui-table-hcell" width="20"><input type="checkbox" id="check_box" onclick="$.Select.All(this,'id[]');" ></th>
                            <th class="ui-table-hcell" width="50"><?php echo lang('sortOrder');?></th>
                            <th class="ui-table-hcell" width="100"><?php echo lang('item_number');?></th>
                            <th class="ui-table-hcell"><?php echo lang('name');?></th>
                            <th class="ui-table-hcell"><?php echo lang('category');?></th>
                            <th class="ui-table-hcell" width="60"><?php echo lang('price');?></th>
                            <th class="ui-table-hcell" width="30"><?php echo lang('package');?></th>
                            <th class="ui-table-hcell" width="30"><?php echo lang('status');?></th>
                            <th class="ui-table-hcell" width="90"><?php echo lang('body_list');?>&nbsp;\&nbsp;<?php echo lang('number');?></th> 
                            <!-- <th class="ui-table-hcell" width="60"><?php echo lang('body_replace');?></th> -->
                            <th class="ui-table-hcell" width="60"><?php echo lang('download_body');?></th>
                            <th class="ui-table-hcell" width="100"><?php echo lang('statics_hua_status');?></th>
                            <th class="ui-table-hcell" width="380"><?php echo lang('action');?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr id="row-<?php echo ($v["id"]); ?>">
                            <td>
                                <input type="checkbox" class="itemId" name="id[]" value="<?php echo ($v["id"]); ?>" onclick="$.Select.This(this);">
                            </td>
                            <!-- 排序的时候使用的id -->
                            <?php if($v["show"] == 1): ?><!-- <td><input type="text" class="ui-text" size="2" name="sort_order[<?php echo ($v["g_id"]); ?>]" value="<?php echo ($v["sort_order"]); ?>"></td> -->
                                <td>
                                    <input type="text" class="ui-text" size="2" name="sort_order[<?php echo ($v["g_id"]); ?>]" />
                                </td>
                            <?php elseif($v["show"] == 2): ?>
                                <!-- <td><input type="text" class="ui-text" size="2" name="sort_order[<?php echo ($v["sn"]); ?>]" value="<?php echo ($v["sort_order"]); ?>"></td> -->
                                <td>
                                    <input type="text" class="ui-text" size="2" name="sort_order[<?php echo ($v["sn"]); ?>]" />
                                </td><?php endif; ?>
                            <td><?php echo ($v["g_id"]); ?></td>
                            <td>
                                <a href="<?php echo ($v["url"]["url"]); ?>" target="_blank"><?php echo ($v["name"]); ?></a>
                                <?php if(!empty($v["image"])): ?><a href="<?php echo (imageurl($v["image"])); ?>" title="<?php echo lang('image');?>" target="_blank"><img src="__PUBLIC__/Assets/img/pic.jpg" /></a><?php endif; ?>
                                <?php if(($v["is_hot"]) == "1"): ?><img src="__PUBLIC__/Assets/img/hot.gif" /><?php endif; ?>
                            </td>
                            <td><?php echo (getfields("Category","name",$v["category_id"])); ?></td>
                            <td><?php echo ($v["price"]); echo lang('yuan');?></td>
                            <td><?php echo (count(json_decode($v["params"],true))); ?></td>
                            <td>
                                <?php if(($v["status"] == 1)): echo (status($v["status"],"image")); ?>
                                <?php elseif(($v["status"] == 0)): ?>
                                    <a href = 'adminpanel123.php?m=Item&a=OnGoods&id=<?php echo ($v["g_id"]); ?>_<?php echo ($v["sn"]); ?>'><span><?php echo lang('on');?></span></a><?php endif; ?>
                            </td>    
                            <td>
                                <?php if($v["show"] == 1): ?><a href = 'adminpanel123.php?m=Item&a=GidsList&id=<?php echo ($v["g_id"]); ?>'><span><?php echo lang('list');?></span></a>
                                <?php elseif($v["show"] == 2): ?>
                                    <?php echo ($v["b_s"]); endif; ?>
                            </td>
                            <!-- <td>
                                <?php if($v["show"] == 1): ?><a href = 'adminpanel123.php?m=Item&a=GidsList&id=<?php echo ($v["g_id"]); ?>'><span><?php echo lang('show_list');?></span></a>
                                <?php elseif($v["show"] == 2): ?>
                                    <a href = 'adminpanel123.php?m=Item&a=ReGoods&id=<?php echo ($v["g_id"]); echo ($v["b_s"]); ?>'><span><?php echo lang('replace');?></span></a><?php endif; ?>
                            </td> -->
                            <td>
                                <!-- <?php if(($v["s"] == 0)): ?><a href = 'index.php?m=Index&a=order&do=sta_down&id=<?php echo ($v["g_id"]); ?>_<?php echo ($v["sn"]); ?>' target = '_blank'><span><?php echo lang('download');?></span></a>
                                <?php elseif(($v["s"] != 0) && ($v["status"] != 1)): ?>
                                    <a href = 'adminpanel123.php?m=Item&a=down&id=<?php echo ($v["g_id"]); ?>_<?php echo ($v["sn"]); ?>_0' target = '_blank'><span><?php echo lang('download');?></span></a>
                                <?php elseif(($v["s"] != 0)&& ($v["status"] == 1)): ?>
                                    <a href = 'adminpanel123.php?m=Item&a=down&id=<?php echo ($v["g_id"]); ?>_<?php echo ($v["sn"]); ?>_1' target = '_blank'><span><?php echo lang('download');?></span></a><?php endif; ?> -->
                                <a href = 'index.php?m=Index&a=DownBody&id=<?php echo ($v["sn"]); ?>'><span><?php echo lang('download_this_body');?></span></a>
                                
                            </td>
                            <td>
                                <!-- <a href = 'index.php?m=Index&a=order&do=sta_none&id=<?php echo ($v["g_id"]); ?>_<?php echo ($v["sn"]); ?>' target = '_blank'>
                                    <?php if(($v["s"] == 0)): ?><span><?php echo lang('statics_hua');?></span>
                                    <?php elseif(($v["s"] != 0)): ?>
                                        <span><?php echo lang('again_statics_hua');?></span><?php endif; ?>
                                </a> -->
                                <?php if(($v["s"] != 0) && ($v["status"] == 0)): ?><a href = 'index.php?m=Index&a=order&do=sta_none&id=<?php echo ($v["sn"]); ?>' target = '_blank'><span>__<?php echo lang('__again_statics_hua_this_body');?></span></a>
                                    <br/>
                                    <a href = 'adminpanel123.php?m=Item&a=down&id=<?php echo ($v["g_id"]); ?>_<?php echo ($v["sn"]); ?>' target = '_blank'><span>__<?php echo lang(download_this_statics_body);?></span></a>
                                <?php elseif(($v["s"] != 0) && ($v["status"] == 1)): ?>
                                    <a href = 'index.php?m=Index&a=order&do=sta_none&id=<?php echo ($v["sn"]); ?>' target = '_blank'><span>__<?php echo lang('__again_statics_hua_this_body');?></span></a>
                                    <br/>
                                    <a href = 'adminpanel123.php?m=Item&a=down&id=<?php echo ($v["g_id"]); ?>' target = '_blank'><span>__<?php echo lang(download_this_statics_body);?></span></a>
                                <?php elseif(($v["s"] == 0) && ($v["status"] == 0)): ?>
                                    <a href = 'index.php?m=Index&a=order&do=sta_none&id=<?php echo ($v["sn"]); ?>' target = '_blank'><span>__<?php echo lang('statics_hua_this_body');?></span></a>
                                    <br/>
                                    <a href = 'index.php?m=Index&a=order&do=sta_down&id=<?php echo ($v["sn"]); ?>' target = '_blank'><span>__<?php echo lang(download_this_statics_body);?></span></a>
                                <?php elseif(($v["s"] == 0) && ($v["status"] == 1)): ?>
                                    <a href = 'index.php?m=Index&a=order&do=sta_none&id=<?php echo ($v["sn"]); ?>' target = '_blank'><span>__<?php echo lang('statics_hua_this_body');?></span></a>
                                    <!-- <a href = 'index.php?m=Index&a=order&do=sta_none&id=<?php echo ($v["g_id"]); ?>_<?php echo ($v["sn"]); ?>_1' target = '_blank'><span>未静已启</span></a> -->
                                    <br/>
                                    <a href = 'index.php?m=Index&a=order&do=sta_down&id=<?php echo ($v["sn"]); ?>' target = '_blank'><span>__<?php echo lang(download_this_statics_body);?></span></a><?php endif; ?>
                            </td>
                            <td class="action">
                                <?php if($v["show"] == 1): ?><a href = 'adminpanel123.php?m=Item&a=uploads&from=Gid_<?php echo ($v["g_id"]); ?>'><?php echo lang('upload_this_item_body');?></a> |
                                <?php elseif($v["show"] == 2): ?>
                                    <a href = 'adminpanel123.php?m=Item&a=uploads&from=sn_<?php echo ($v["g_id"]); ?>_<?php echo ($v["sn"]); ?>'><?php echo lang('upload_edit_this_item_body');?></a> |<?php endif; ?>
                                <?php if(in_array('itemModify',$_SESSION['user']['auth'])): ?><a href="<?php echo U('Item/'.ACTION_NAME,array('do'=>'edit','id'=>$v['id']));?>"><?php echo lang('edit');?></a> |<?php endif; ?>
                                <?php if(in_array('itemAdd',$_SESSION['user']['auth'])): ?><a href="<?php echo U('Item/'.ACTION_NAME,array('do'=>'copy','id'=>$v['id']));?>"><?php echo lang('copy');?></a> |<?php endif; ?>
                                <q onclick="using('<?php echo ($v["id"]); ?>','<?php echo ($v["name"]); ?>')"><?php echo lang('using');?></q> |
                                <?php if(in_array('itemAuth',$_SESSION['user']['auth'])): ?><q onclick="auth('<?php echo ($v["id"]); ?>','<?php echo ($v["name"]); ?>')"><?php echo lang('auth');?></q> |<?php endif; ?>
                                <a <?php if(in_array('itemComments',$_SESSION['user']['auth'])): ?>href="<?php echo U('Item/'.ACTION_NAME,array('do'=>'comments','id'=>$v['id']));?>"<?php else: ?>class="grey"<?php endif; ?>><?php echo lang('comments');?>(<?php echo getFields("Comments","count(id)",$v['id'],"item_id");?>)</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
          
        <div class="ui-pager-bar clearfix" style="padding-left:10px;">
            <div class="float-left">
                <!-- 显示是什么列表 goods or item -->
                <input type="hidden" name="model" value="<?php echo ($what); ?>">
                <input type="checkbox" id="check_box" onclick="$.Select.All(this,'id[]');" >选择/反选 
                <input type="button" name="del" value="批量删除" class="btn" onclick="delConfirm()">
                <input type="submit" name="sort" value="批量排序" class="btn btn-ok">
                <q class="btn btn-ok" onclick="auth(0,'批量授权')">批量授权</q>
                <input type="hidden" name="del" value="1">
            </div>
            <div class="ui-pager" style="float:right"><?php echo ($page); ?></div>
        </div>
        </form>
</div><!--.box-->
<script type="text/javascript">
function using(id,title){
    var url = "?m=Item&a=index&do=using&id="+id;
    $.open(url,{title:'单页推广 - '+title,width:980,height:580})
}
function auth(id,title){
    if(id===0){
        var ids = new Array(),i=0;
         $(".itemId").each(function(){
            var _this = $(this);
            if(_this.attr("checked")=="checked"){ ids[i] =_this.val(); i++;}
        })
        id = ids.join();
    }
    var url = "?m=Item&a=auth&id="+id;
    $.open(url,{title:'授权 - '+title,width:500,height:250})
}
function delConfirm(){
    $.confirm('是否要删除？',function(){ 
        $('#deleteform').submit();
    },true)
}
</script>
<?php echo W("Foot");?>