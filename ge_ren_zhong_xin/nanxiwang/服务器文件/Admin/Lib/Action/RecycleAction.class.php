<?php
class RecycleAction extends AliziAction {
	public function _initialize(){
        parent::_init();
    }
    // 商品回收站列表
	public function item() 
	{
		// echo 1;
		$Model = M('Item');
		$keyword = isset($_GET['keyword'])?trim($_GET['keyword']):'';
		$category_id = isset($_GET['category_id'])?intval($_GET['category_id']):0;
		$where = "is_delete=1";
		if(!empty($keyword)) $where .= " AND name LIKE '%$keyword%' ";
		if(!empty($category_id)) $where .= " AND category_id=".$category_id;

		// 照搬商品列表
		if($this->role!='admin'){
            $where .= " AND status=1";
            $itemArray= array();
            $itemGroup = M('ItemGroup')->field('item_id')->where(array('group_id'=>$_SESSION['user']['group_id']))->select();
            if($itemGroup){
                 foreach($itemGroup as $li){$itemArray[]=$li['item_id'];}
            }
            $item_id = implode(',',$itemArray);
            $where .= " AND id IN($item_id)";
        }




		$order = "sort_order ASC,id DESC";
		
		import('ORG.Util.Page');
		$count = $Model->where($where)->count('distinct(id)');
		$page  = new Page($count,100);
		$list  = $Model->where($where)->limit($page->firstRow . ',' . $page->listRows)->order($order)->select();
		$show  = $page->show();



		// 照搬商品列表
        $category = M('Category')->where('type=1')->order('sort_order desc,id asc')->select();
        $aliziConfig = cache('aliziConfig');
        $data = array();
        foreach ($list as $key => $value) {
            // $value['g_id'] = str_replace('Gid', '', $value['g_id']);
            if($aliziConfig['URL_MODEL']==2){
                $url = array(
                    'url'=>$this->aliziHost."id/{$value['g_id']}.html",
                    'order'=>$this->aliziHost."single/{$value['g_id']}-{$this->uid}.html",
                    'detail'=>$this->aliziHost."detail/{$value['g_id']}-{$this->uid}.html",
                );
            }else{
                $url = array(
                    'url'=>$this->aliziHost."index.php?m=Index&a=order&id={$value['g_id']}",
                    'order'=>$this->aliziHost."index.php?m=Order&id={$value['g_id']}&uid={$this->uid}",
                    'detail'=>$this->aliziHost."index.php?m=Order&id={$value['g_id']}&uid={$this->uid}&tpl=detail",
                );
            }
            $list[$key]['url'] = $url;
            // $list[$key]['g_id'] = $value['g_id'];
        }


// var_dump($list);
		$this->assign('category',$category);
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display('Recycle:item');
	}

	public function order(){
		$Model = M('Order');
		$fields = trim($_GET['fields']);
		$status = $_GET['status'];
		$keyword = trim($_GET['keyword']);
		$category_id = intval($_GET['category_id']);
		$time_start = strtotime($_GET['time_start']);
		$time_end   = strtotime($_GET['time_end'])+86400;
		$where = "is_delete=1";
		if($this->role!='admin') $where .= " AND user_id ={$this->uid}";
		if(!empty($keyword)) $where .= " AND $fields LIKE '%$keyword%' ";
		if(is_numeric($status)) $where .= " AND status ={$status} ";
		if(!empty($time_start) && $time_start < ($time_end)) $where .= " AND (add_time BETWEEN {$time_start} AND {$time_end})";
		if(!empty($category_id)) $where .= " AND category_id={$category_id}";
		if(!empty($payment)){
			$where .= $payment==1? " AND payment =1":" AND payment !=1";//payment=1货到付款，其它为在线支付
		}
		$order = empty($orderby)?"id DESC":"{$orderby} {$sort}";
		
		import('ORG.Util.Page');
		$count = $Model->where($where)->count();
		$page  = new Page($count,100);
		$list  = $Model->where($where)->limit($page->firstRow . ',' . $page->listRows)->order($order)->select();
		$show  = $page->show();
	
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display('Recycle:order');
	}	

	function user(){
		
		$id = (int)$_GET['id'];
		$do = trim($_GET['do']);
		$keyword = trim($_GET['keyword']);
		
		$Model = D('User');
		import('ORG.Util.Page');
		$where = "is_delete=1";
	
		if(!empty($keyword)) $where .= " AND (username LIKE '%{$keyword}%' )";
		$order = empty($orderby)?"id desc":"{$orderby} {$sort}";
		$count = $Model->where($where)->count();
		$page  = new Page($count,100);
		
		$list  = $Model->where($where)->limit($page->firstRow . ',' . $page->listRows)->order($order)->select();
		$show  = $page->show();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->display('Recycle:user');
    } 

    function todo(){
	  	if(isset($_POST['recover'])){
	  		M($_POST['model'])->where('id IN('.implode(',', $_POST['id']).')')->setField('is_delete',0);
	  		$this->success(lang('恢复成功'));
	  	}else{
	  		$this->checkAuth('');
			$Model = D($_POST['model']);
			foreach($_POST['id'] as $id){
				$Model->delete((int)$id);
			}
			$this->success('删除成功');
	  	}
    }
}

