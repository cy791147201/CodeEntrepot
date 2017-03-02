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

    function _before_update(&$data,$options){
        $list = $extend = array();
        foreach($_POST['title'] as $k=>$v){
            if(!empty($v)) $list[] = array('title'=>$v,'price'=>$_POST['params_price'][$k],'image'=>$_POST['params_image'][$k],'qrcode'=>$_POST['params_qrcode'][$k]);
        }
        // 套餐属性
        foreach($_POST['extend_title'] as $k=>$v)
        {
            if(!empty($v))
            {
                $extend[] = array('title'=>$v,'value'=>$_POST['extend_value'][$k],'type'=>$_POST['extend_type'][$k],'image'=>$_POST['extend_image'][$k]);
            }
        }
        
        // 上传套餐有图片的时候使用
        $len = count($extend);
        $i = 1;
        for($i; $i < $len; $i++)
        {
            if($extend[0]['title'] === $extend[$i]['title'])
            {
                $extend[0]['value'] = $extend[0]['value'].'#'.$extend[$i]['value'];
                $extend[0]['type'] = $extend[0]['type'];
                $extend[0]['image'] = $extend[0]['image'].'#'.$extend[$i]['image'];
                unset($extend[$i]);
            }
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
}