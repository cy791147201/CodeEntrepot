<?php if (!defined('THINK_PATH')) exit(); echo W("Main",array('module'=>MODULE_NAME,'action'=>ACTION_NAME,'do'=>$_GET['do']));?>
<!-- 单个订单详情显示页面 -->
<div class="layout-main">    
    <div id="breadclumb" class="box">
        <h3><strong><?php echo lang('breadclumb_colon');?></strong><?php echo lang(MODULE_NAME);?><span></span><?php if(empty($_GET["id"])): echo lang('add'); else: echo lang('view'); endif; ?></h3>
    </div>
    <div class="box clear-fix">
        <div class="layout-block-header"><h2><?php echo lang('order_info');?> <span class="order-no">（<?php echo lang('order_number_colon'); echo ($info["order_no"]); ?>）</span></h2></div>  
        <div class="AccountInfo">
            <div class="info-block">
                <table class="info-table">
                    <tbody>
                    	<tr>
							<th><?php echo lang('order_status_colon');?></th>
                            <td width="200"><?php echo status($info['status'],'',C('order_status'));?></td>
                            <th><?php echo lang('item_name_colon');?></th>
                            <td><?php echo ($info["item_name"]); if(!empty($info["item_params"])): ?>（<?php echo ($info["item_params"]); ?>）<?php endif; ?></td>
                        </tr>
						<tr>
                            <th><?php echo lang('extend_package_colon');?></th>
                            <td class="extends">
								<?php $extends=json_decode($info['item_extends'],true); foreach($extends as $name=>$value){ $value = is_array($value)?implode('，',$value):$value; echo "<p><i>$name</i>：<span>$value</span></p>"; } ?>
							</td>
                            <th><?php echo lang('amount_price_colon');?></th>
                            <td>
								<?php echo ($info["quantity"]); ?>/<b class="alert"><?php echo ($info["order_price"]); ?></b><?php echo lang('yuan');?> + <?php echo ($info["shipping_price"]); echo lang('yuan');?> = <b class="alert"><?php echo ($info["total_price"]); ?></b><?php echo lang('yuan');?>
							</td>
                        </tr>
                        <tr>
							<th><?php echo lang('date_colon');?></th>
                            <!-- <td valign="top"><?php echo (substr($info["datetime"],0,10)); ?></td> -->
                            <td valign="top"><?php echo (date('Y-m-d H:i:s',$info["datetime"])); ?></td>
							<th><?php echo lang('payment_colon');?></th>
                            <td><?php $payment = C('PAYMENT');echo $payment[$info['payment']]['name']; ?></td>
                        </tr>
						<tr>
                            <th><?php echo lang('channel_colon');?></th>
                            <td><?php echo ($info["channel_id"]); ?></td>
							<th><?php echo lang('设备_colon');?></th>
                            <td><?php if(($info["device"]) == "2"): ?>M<?php else: ?>PC<?php endif; ?></td>
                        </tr>
						<tr>
                            <th><?php echo lang('下单地址_colon');?></th>
                            <td valign="top"><a href="<?php echo ($info["url"]); ?>" target="_blank"><?php echo ($info["url"]); ?></a></td>
                            <th><?php echo lang('来路地址_colon');?></th>
                            <td valign="top"><a href="<?php echo ($info["referer"]); ?>" target="_blank"><?php echo ($info["referer"]); ?></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>  
    </div><!--.box-->
	
	<?php if($_SESSION['user']['role'] == 'admin' || in_array('view',$_SESSION['user']['auth'])): ?><div class="box clear-fix">
        <div class="layout-block-header"><h2><?php echo lang('customer_info');?></h2></div>  
        <div class="AccountInfo">
            <div class="info-block">
                <table class="info-table">
                    <tbody>
                    	<tr>
                            <th><?php echo lang('realname_colon');?></th>
                            <td width="100"><?php echo ($info["name"]); ?></td>
                            <th><?php echo lang('address_colon');?></th>
                            <td><?php echo ($info["region"]); ?> <?php echo ($info["address"]); ?></td>
                        </tr>
						<tr>
                            <th><?php echo lang('mobile_colon');?></th>
                            <td><?php echo ($info["mobile"]); ?></td>
							<th><?php echo lang('phone_colon');?></th>
                            <td><?php echo ($info["phone"]); ?></td>
                        </tr>
						<tr>
                            <th><?php echo lang('qq_colon');?></th>
                            <td><?php echo ($info["qq"]); ?></td>
                            <th><?php echo lang('zcode_colon');?></th>
                            <td><?php echo ($info["zcode"]); ?></td>
                        </tr>
						<tr>
                            <th><?php echo lang('email_colon');?></th>
                            <td><?php echo ($info["mail"]); ?></td>
							<th><?php echo lang('customer_ip_colon');?></th>
                            <td><a href="http://www.ip.cn/index.php?ip=<?php echo ($info["add_ip"]); ?>&from=http://<?php echo ($_SERVER['HTTP_HOST']); echo C('ROOT_FILE');?>" target="_blank"><?php echo ($info["add_ip"]); ?></a></td>
                        </tr>
						<tr>
                            <th><?php echo lang('remark_colon');?></th>
                            <td colspan="3"><?php echo ($info["remark"]); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>  
    </div><!--.box-->
	<?php else: ?>
	<div class="box clear-fix">
        <div class="layout-block-header"><h2><?php echo lang('customer_info');?></h2></div>  
        <div class="AccountInfo">
            <div class="info-block">
                <table class="info-table">
                    <tbody>
                    	<tr>
                            <th><?php echo lang('realname_colon');?></th>
                            <td width="100"><?php echo ($info["name"]); ?></td>
                            <th><?php echo lang('address_colon');?></th>
                            <td><?php echo ($info["region"]); ?>***</td>
                        </tr>
						<tr>
                            <th><?php echo lang('mobile_colon');?></th>
                            <td><?php echo (substr($info["mobile"],0,3)); ?>***<?php echo (substr($info["mobile"],"-4")); ?></td>
							<th><?php echo lang('phone_colon');?></th>
                            <td><?php echo (substr($info["phone"],0,4)); ?>***</td>
                        </tr>
						<tr>
                            <th><?php echo lang('qq_colon');?></th>
                            <td><?php echo (substr($info["qq"],0,4)); ?>***</td>
                            <th><?php echo lang('zcode_colon');?></th>
                            <td><?php echo ($info["zcode"]); ?></td>
                        </tr>
						<tr>
                            <th><?php echo lang('email_colon');?></th>
                            <td>
								<?php if($info['mail']){ $email=explode('@',$info['mail']); echo substr($email[0],0,2).'***@'.$email[1]; } ?>
							</td>
							<th><?php echo lang('customer_ip_colon');?></th>
                            <td><a href="http://www.ip.cn/index.php?ip=<?php echo ($info["add_ip"]); ?>&from=http://<?php echo ($_SERVER['HTTP_HOST']); echo C('ROOT_FILE');?>" target="_blank"><?php echo ($info["add_ip"]); ?></a></td>
                        </tr>
						<tr>
                            <th><?php echo lang('remark_colon');?></th>
                            <td colspan="3"><?php echo ($info["remark"]); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>  
    </div><!--.box--><?php endif; ?>
	

	<div class="box clear-fix">
        <div class="layout-block-header"><h2><?php echo lang('action_record');?></h2></div>  
        <div class="AccountInfo">
            <div class="ui-table-body ui-table-body-hover">
                <table cellpadding="0" cellspacing="0" width="100%">
                    <thead>
                        <tr class="ui-table-head">
                            <th class="ui-table-hcell" width="150">操作时间</th>
                            <th class="ui-table-hcell" width="80">操作类型</th>
                            <th class="ui-table-hcell" width="80">操作用户</th>
                            <th class="ui-table-hcell">操作备注</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php if(is_array($log)): $i = 0; $__LIST__ = $log;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo (date("Y-m-d H:i:s",$vo["add_time"])); ?></td>
                            <td><?php echo status($vo['status'],'',C('order_status'));?></td>
                            <td><?php if(empty($vo["user_id"])): echo lang('customer'); else: echo (getfields("User","username",$vo["user_id"])); endif; ?></td>
                            <td class="action"><?php echo ($vo["remark"]); ?></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
                </table>
            </div>
        </div> 
    </div><!--.box-->
	

       
<?php echo W("Foot");?>