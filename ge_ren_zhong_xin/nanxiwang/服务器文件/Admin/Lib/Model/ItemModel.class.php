<?php 
class ItemModel extends Model 
{   
    protected $table = 'Item';
    protected $_validate = array(
        array('name', 'require', '标题不能为空！',1,'',1),
    );
    protected $_auto = array(
        array('add_time', 'time', 1, 'function'),
        array('update_time', 'time', 2, 'function'),
    );
    // protected $fileds = array('id', 'g_id', 'b_s', 'user_id', 'sn', 'category_id', 'name', 'brief', 'tags', 'original_price', 'price', 'salenum', 'qrcode_pay', 'qrcode_pay_info', 'qrcode', 'image', 'thumb', 'status', 'is_hot', 'is_big', 'sort_order', 'params', 'params_type', 'options', 'extends', 'content', 'payment', 'shipping_id', 'is_delete', 'is_sent', 'is_auto_send', 'send_content', 'sms_send', 'update_time', 'add_time', 'web_t', 'cont1', 'cont2', 'cont3', 'tit', 'tit_img', 'num', 'dao_time', 'qiang', 'q_info', 'buy', 'b_info', 'chan', 'c_info', 'ser', 's_info', 'tel_t1', 'tel1', 'tel_t2', 'tel2', 'sms_t', 'sms', 'in_t', 'in_in', 'ft_img', 'comp', 'path', 's', 'wid');
    // protected $fileds = array('id', 'g_id', 'b_s', 'user_id', 'category_id', 'name', 'price', 'status', 'is_hot', 'path', 's', 'sort_order');

    function _before_update(&$data,$options){
        $list = $extend = array();
        foreach($_POST['title'] as $k=>$v){
            if(!empty($v)) $list[] = array('title'=>$v,'price'=>$_POST['params_price'][$k],'image'=>$_POST['params_image'][$k],'qrcode'=>$_POST['params_qrcode'][$k]);
        }
        foreach($_POST['extend_title'] as $k=>$v){
            if(!empty($v)) $extend[] = array('title'=>$v,'value'=>$_POST['extend_value'][$k],'type'=>$_POST['extend_type'][$k]);
        }

        $data['extends'] = empty($extend)?'':json_encode($extend);
        $data['payment'] = empty($_POST['payment'])?'':json_encode($_POST['payment']);
        $data['is_hot'] = intval($_POST['is_hot']);
        $data['is_big'] = intval($_POST['is_big']);
        $data['is_auto_send'] = intval($_POST['is_auto_send']);
        $data['qrcode_pay'] = intval($_POST['qrcode_pay']);
        $data['params'] = json_encode($list);
        $data['sms_send'] = json_encode($_POST['sms_send']);
    }
    function _before_insert(&$data,$options){
        $data['sn'] = $data['sn']?$data['sn']:randCode(8,'abcdevghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');
        $this->_before_update($data);
    }

    function _after_delete($data,$options){
        $ItemTemplate = M('ItemTemplate');
        $where = array('item_id'=>$data['id']);
        $ItemTemplate->where($where)->delete();
    }
    function _after_insert($data,$options){
        $aliziConfig = cache('aliziConfig');
        $ItemTemplate = M('ItemTemplate');
        $add = array(
            'id'=>$data['id'],
            'template'=>'thin',
            'options'=>$aliziConfig['order_options'],
            'show_notice'=>1,
            'color'=>json_encode(C('DEFAULT_COLOR')),
        );
        $ItemTemplate->add($add);
    }
        
    public function CreateSn()
    {
        $sn = randCode(8,'abcdevghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');
        // var_dump($sn);exit();
        $sql = 'select sn from ' . C("DB_PREFIX") . $this->table ." where sn= '" . $sn . "'";
        return $this->query($sql)?$this->CreateSn():$sn;
    }

    // // 查找指定的商品信息页面
    // public function GetGoods($start = '', $end = '', $condition = '')
    // {   
    //     $sql = 'SELECT '.implode(',', $this->fileds).' FROM '.C("DB_PREFIX").$this->table.' where '.$condition.' ORDER BY sort_order ASC limit '.$start.' , '.$end;
    //     // $table1 = C("DB_PREFIX").'goods';
    //     // $table2 = C("DB_PREFIX").'item';
    //     // $sql = 'SELECT * FROM '.$table1.','.$table2.' WHERE '.$table1.'.g_id = '.$table2.'.g_id and '.$table1.'.b_s = '.$table2.'.b_s AND '.$table1.'.sta = 1 limit '.$start.' , '.$end;
    //     return $this->query($sql);
    // }
}