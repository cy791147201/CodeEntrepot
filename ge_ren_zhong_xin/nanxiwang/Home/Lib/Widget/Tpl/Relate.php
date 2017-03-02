<style>
.fav-list li{float:left;padding:12px;width:42%;max-width:170px;overflow:hidden;text-align: center;}
.fav-list li  a{display:block;}
.fav-list li .image{overflow: hidden;}
.fav-list li .price{padding-top:10px;color:#f60;}
</style>
<div class="box alizi-detail-content">
	<h1><?php echo L('relateItem');?></h1>
	<ul class="fav-list">
		<?php
			foreach($list as $vo){
				$url = U('Order/index',array('id'=>$vo['sn'],'tpl'=>'detail'));
				echo '<li><a href="'.$url.'" title="'.$vo['name'].'"></a><p class="image"><a href="'.$url.'" title="'.$vo['name'].'"><img src="'.imageUrl($vo['image']).'"></a></p><p class="price">'.L('symbol').$vo['price'].'</p><p class="title">'.$vo['name'].'</p></li>';
			}
		?>
		
		
	</ul>
</div>