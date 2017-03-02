<?php 
class GoodsModel extends Model 
{   
    protected $table = 'Goods';

    // 生成随机数据库不重复的gid
    public function CreateGid()
    {
        $Gid = 'Gid' . date('His') . mt_rand(10000, 99999);
        // $sql = 'select g_id from ' . $this->table ." where g_id= '" . $Gid . "'";
        $sql = 'select g_id from ' . C("DB_PREFIX") . $this->table ." where g_id= '" . $Gid . "'";
        return $this->query($sql)?$this->CreateGid():$Gid;
    }

    // 查找商品列表
    public function ShowGoods($start = '', $end = '')
    {
    	// $start = 0;
    	// $end = 1;
    	$table1 = C("DB_PREFIX").'goods';
        $table2 = C("DB_PREFIX").'item';
        $sql = 'SELECT * FROM '.$table1.','.$table2.' WHERE '.$table1.'.g_id = '.$table2.'.g_id AND '.$table2.'.status = 1 AND '.$table2.'.is_delete = 0 ORDER BY '.$table1.'.sort_order ASC limit '.$start.' , '.$end;
        // $sql = 'SELECT * FROM '.$table1.','.$table2.' WHERE '.$table1.'.g_id = '.$table2.'.g_id AND '.$table1.'.sta = 1 limit '.$start.' , '.$end;
        return $this->query($sql);
    } 

    

}