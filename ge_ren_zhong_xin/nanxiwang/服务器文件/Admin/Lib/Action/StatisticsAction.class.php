<?php
class StatisticsAction extends AliziAction {
	public function _initialize(){
        parent::_init();
    }
	function index(){
		$Model = M('Order');
		$start = !empty($_GET['start'])?strtotime($_GET['start']):strtotime(date('Y-m-d'));
		$end = !empty($_GET['end'])?strtotime($_GET['end']):time();
		$map = " AND add_time BETWEEN $start AND $end ";
		
		switch($this->role){
			case 'admin': $map .='';break;
			case 'agent': $map .=' AND user_pid='.$this->uid;break;
			case 'member': $map .=' AND user_id='.$this->uid;break;
		}

		$list = $Model->query("SELECT item_id,item_name,sum(total_price) as total_price,count(id) as quantity FROM __TABLE__ WHERE is_delete=0 $map GROUP BY item_id ORDER BY quantity DESC");
		$status = C('ORDER_STATUS');
		foreach ($list as $key => $value) {
			foreach($status as $k=>$v){
				$count = $Model->query("SELECT `status`,sum(total_price) as price,count(id) as quantity FROM __TABLE__ WHERE status=$k AND item_id='{$value['item_id']}' AND is_delete=0 $map");
				$list[$key]['status'][$k] = $count[0];
			}
		}

		$this->assign('list',$list);
		$this->assign('status',$status);
		$this->display('Statistics/index');
	}

	function channel(){
		$Model = M('Order');
		$start = !empty($_GET['start'])?strtotime($_GET['start']):strtotime(date('Y-m-d'));
		$end = !empty($_GET['end'])?strtotime($_GET['end']):time();
		$map = " AND add_time BETWEEN $start AND $end ";
		switch($this->role){
			case 'admin': $map .='';break;
			case 'agent': $map .=' AND user_pid='.$this->uid;break;
			case 'member': $map .=' AND user_id='.$this->uid;break;
		}
		
		$list = $Model->query("SELECT channel_id,sum(total_price) as total_price,count(id) as quantity FROM __TABLE__ WHERE is_delete=0 AND channel_id!='' AND channel_id!='0' $map GROUP BY channel_id ORDER BY quantity DESC");
		$status = C('ORDER_STATUS');
		foreach ($list as $key => $value) {
			foreach($status as $k=>$v){
				$count = $Model->query("SELECT `status`,sum(total_price) as price,count(id) as quantity FROM __TABLE__ WHERE status=$k AND channel_id='{$value['channel_id']}' AND is_delete=0 $map ");
				$list[$key]['status'][$k] = $count[0];
			}
		}
		
		$this->assign('list',$list);
		$this->assign('status',$status);
		$this->display('Statistics/channel');
	}
	public function byDate($date='',$cache=864000){
		$date = $date?$date:date('Y-m-d');
		$Order = M('Order');
		$status = C('ORDER_STATUS');

		$statistics = S('statistics-'.$date);
		if(empty($statistics)){
			foreach($status as $k=>$v){
				switch($this->role){
					case 'admin': $map='';break;
					case 'agent': $map=' AND user_pid='.$this->uid;break;
					case 'member': $map=' AND user_id='.$this->uid;break;
				}
				//$map = ($this->role=='admin')?"":" AND user_id ={$this->uid}";
				$count = $Order->query("SELECT `status`,sum(total_price) as price,count(id) as quantity FROM __TABLE__ WHERE is_delete=0 AND status=$k AND FROM_UNIXTIME(add_time,'%Y-%m-%d')='{$date}' $map");
				$count[0]['name'] = $v;
				$statistics[$k] = $count[0];
			}
			if($date!=date('Y-m-d')){
				 S('statistics-'.$date,$statistics,$cache);
			}
		}
		return $statistics;
	}
	public function byRegion($start="",$end=""){
		$start = $start?strtotime($start):strtotime(date('Y-m-d'));
		$end = ($end?strtotime($end):strtotime(date('Y-m-d')))+86399;
		$Order = M('Order');
		$status = C('ORDER_STATUS');

		switch($this->role){
			case 'admin': $map='';break;
			case 'agent': $map=' AND user_pid='.$this->uid;break;
			case 'member': $map=' AND user_id='.$this->uid;break;
		}
		$map .= " AND add_time BETWEEN $start AND $end";
		$statistics = $Order->query("SELECT province,sum(total_price) as price,count(id) as quantity FROM __TABLE__ WHERE is_delete=0 $map group by province order by quantity desc");

		$this->assign('statistics',$statistics);
		$this->display('Statistics/region');
	}
	public function byTime($start="",$end=""){
		$start = $start?strtotime($start):strtotime(date('Y-m-d'));
		$end = ($end?strtotime($end):strtotime(date('Y-m-d')))+86399;
		$Order = M('Order');
		$status = C('ORDER_STATUS');

		switch($this->role){
			case 'admin': $map='';break;
			case 'agent': $map=' AND user_pid='.$this->uid;break;
			case 'member': $map=' AND user_id='.$this->uid;break;
		}
		$map .= " AND add_time BETWEEN $start AND $end";
		$statistics = $Order->query("SELECT FROM_UNIXTIME(add_time,'%H') as times,sum(total_price) as price,count(id) as quantity FROM __TABLE__ WHERE is_delete=0 $map group by times order by times asc");
		
		$this->assign('statistics',$statistics);
		$this->display('Statistics/time');
	}
	public function byUser($start="",$end=""){
		$start = $start?strtotime($start):strtotime(date('Y-m-d'));
		$end = ($end?strtotime($end):strtotime(date('Y-m-d')))+86399;
		$Order = M('Order');
		$status = C('ORDER_STATUS');

	
		$map .= " AND add_time BETWEEN $start AND $end";
		$statistics = $Order->query("SELECT user_id,sum(total_price) as price,count(id) as quantity FROM __TABLE__ WHERE is_delete=0 AND user_id>0 $map group by user_id order by quantity desc");
		$this->assign('statistics',$statistics);
		$this->display('Statistics/user');
	}
	 
}

