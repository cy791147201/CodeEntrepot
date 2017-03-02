<?php
namespace Home\Model;
use Think\Model;

class IndentModel extends Model 
{
    protected $table = 'indent';

    // 生成随机商品编号
    // public function CreateSn()
    // {
    //     $sn = 'sn'.date('His').mt_rand(1000,9999);
    //     $sql = 'select sn from '. $this->table ." where sn = '" . $sn . "' and sta = 1";
    //     return $this->query($sql)?$this->CreateSn():$sn;
    // }
}