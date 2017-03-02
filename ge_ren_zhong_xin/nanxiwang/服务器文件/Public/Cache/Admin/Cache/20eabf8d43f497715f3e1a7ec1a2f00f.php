<?php if (!defined('THINK_PATH')) exit(); echo W("Main",array('module'=>MODULE_NAME,'action'=>ACTION_NAME));?>
<div class="layout-main">    
    <div class="layout-block-header box overview-head">
        <h2 class="overview-username"><?php echo ($_SESSION["user"]["username"]); echo lang('comma_hello');?></h2>
        <div id="OverviewOptimizeAdvice" style="line-height:2em;padding-top:10px;">
            <p><?php echo lang('last_login_time_colon'); echo ($_SESSION["user"]["login_time"]); ?></p>
            <p><?php echo lang('last_login_ip_colon'); echo ($_SESSION["user"]["login_ip"]); ?></p>
			<p>当前版本：<?php echo C('ALIZI_VERSION');?></p>
			<?php if(($_SESSION['user']['role']) == "admin"): ?><p>短信余额：<b class="alert" id="sms-balance">0</b></p>
			<!--p><a class="btn btn-ok" href="<?php echo U('Version/update');?>">系统升级</a></p--><?php endif; ?>
        目前版本，商品页面内提交订单只检测手机号是否为空，其他项为空不检测.&nbsp;可修改，如需修改请联系管理员.
        </div>
    </div>
	<!--
	<div class="layout-block-header box overview-head">
        <h2 class="overview-username">楠溪王声明</h2>
        <div id="OverviewOptimizeAdvice" style="font-size:14px;line-height:1.8em;padding-top:10px;">
            <p>1、楠溪王那个订单管理系统，
				淘宝店铺：<a href="" target="_blank">暂无</a>，
				官方网址：<a href="" target="_blank">暂无</a>
			</p>
			<p>2、在使用过程中，若发现bug或需要添加功能，请联系作者。</p>
			<p>3、本系统仅供自己使用，禁止传播和倒卖！</p>
        </div>
    </div>
	-->
	
	<div class="box clear-fix">   
        <div class="ui-table">
            <div class="ui-table-body ui-table-body-hover">
                <table cellpadding="0" cellspacing="0" width="100%" >
                    <thead>
                        <tr class="ui-table-head">
                            <th class="ui-table-hcell">今日统计</th>
							<?php if(is_array($today)): $i = 0; $__LIST__ = $today;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><th class="ui-table-hcell"><?php echo ($vo["name"]); ?></th><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>数量</td>
							<?php if(is_array($today)): $i = 0; $__LIST__ = $today;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><td><?php echo (intval($vo["quantity"])); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tr>
						<tr>
                            <td>金额</td>
                            <?php if(is_array($today)): $i = 0; $__LIST__ = $today;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><td><?php echo (number_format($vo["price"],2)); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
	</div><!--.box-->
	
	<div class="box clear-fix">   
        <div class="ui-table">
            <div class="ui-table-body ui-table-body-hover">
                <table cellpadding="0" cellspacing="0" width="100%" >
                    <thead>
                        <tr class="ui-table-head">
                            <th class="ui-table-hcell">昨日统计</th>
							<?php if(is_array($yesterday)): $i = 0; $__LIST__ = $yesterday;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><th class="ui-table-hcell"><?php echo ($vo["name"]); ?></th><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>数量</td>
							<?php if(is_array($yesterday)): $i = 0; $__LIST__ = $yesterday;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><td class="ui-table-hcell"><?php echo (intval($vo["quantity"])); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tr>
						<tr>
                            <td>金额</td>
                            <?php if(is_array($yesterday)): $i = 0; $__LIST__ = $yesterday;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><td class="ui-table-hcell"><?php echo (number_format($vo["price"],2)); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
	</div><!--.box-->
<script type="text/javascript">
$(function(){
	$.ajax({
	   type: "GET",
	   url: "<?php echo U('Index/smsBalance');?>",
	   dataType: "json",
	   success:function(data){
			$('#sms-balance').html(data.data);
		}
	 });
})
</script>
	<?php echo W("Foot");?>