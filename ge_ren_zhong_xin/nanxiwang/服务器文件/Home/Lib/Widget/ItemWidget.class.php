<?php
class ItemWidget extends Widget 
{
    // 手机版首页 大W方法显示热卖商品
    public function render($data)
    {   
        // 原热卖商品
        $list['data'] = $data;
        // var_dump($list);exit();
        return $this->renderFile ("index", $list);
    }
}
?>