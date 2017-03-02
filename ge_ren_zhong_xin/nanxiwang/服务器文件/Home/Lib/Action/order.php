<php>
	if(strstr($info['content'],'{[AliziOrder]}')){
	    $info['content'] = explode('{[AliziOrder]}',$info['content']);
	    foreach($info['content'] as $key=>$content){ echo $content;if($key==0){W('Order',array_merge($_GET,array('page'=>'index')));} }
	}else{
	    echo $info['content'];
	}
</php>