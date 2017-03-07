<?php
namespace Home\Model;
use Think\Model;

class TempModel extends Model 
{
    protected $table = 'self_data_tag';

    //__get()方法用来获取私有属性
    private function __get($property_name)
    {
        if(isset($this->$property_name))
        {
            return($this->$property_name);
        }
        else
        {
            return(NULL);
        }
    }

    //__set()方法用来设置私有属性
    private function __set($property_name, $value)
    {
        $this->$property_name = $value;
    }

    // 生成数据唯一标志
    public function CreateDataTag()
    {
        $tag = $_SESSION['id']. '_' .time();
        $sql = 'select d_tag from '. $this->table ." where d_tag = '" . $tag;

        return $this->query($sql)?$this->CreateDataTag():$tag;
    }             
}