<?php
defined('THINK_PATH') OR exit();
class ItemAction extends AliziAction 
{

    public function _initialize(){
        parent::_init();
        parent::systemStatus(MODULE_NAME);
        $this->assign('article',M('Article')->where('is_delete=0 and status=1')->order('sort_order ASC,id DESC')->limit(4)->select());
    }

    // 手机版首页 大R一个电脑板首页看看
    public function index()
    {
        R('Index/index');
  //       $Model = D('Item');
        // if($this->aliziConfig['slider_show']==1 && $this->aliziConfig['slider_num']>0){
        //  $slider  = M('Advert')->where(array('status'=>1))->order('sort_order ASC,id DESC')->limit($this->aliziConfig['slider_num'])->select();
        // }

        // $this->assign('slider',$slider);
        // $this->assign('hot',$Model->hotList());
  //       $this->display('Item/index');
    }

    // 手机版查看商品暂时注释看看有什么影响
    public function order($id)
    {
        // var_dump($_GET);exit();
        R('Index/order');
        // // echo 1; exit();
        // $info = getCache('Item',array('sn'=>$id));
        // if(empty($info)) $this->error(lang('empty_item'));
        
        // $template = M('ItemTemplate')->field('show_comments')->where('id='.$info['id'])->find();
        // $commentsTpl = 'Comments:'.$template['show_comments'];
        // // $this->assign('template',$template);
        // // $this->assign('commentsTpl',$commentsTpl);
        
        // // $this->assign('info',$info);
        // // $this->assign('aliziConfig',$this->aliziConfig);
        // // $this->display('Item/order');
        //  if(!empty($info['title'])){
        //     $info['title'] = '<title>'.$info['title'].'</title>';
        // }

        // if(!empty($info['cont1'])){
        //     $info['cont1'] = '<meta name = "keywords" content = "'.$info['cont1'].'">';
        // }

        // if(!empty($info['cont2'])){
        //     $info['cont2'] = '<meta name = "description" content = "'.$info['cont2'].'">';
        // }

        // if(!empty($info['cont3'])){
        //     $info['cont3'] = '<meta name = "author" content = "'.$info['cont3'].'">';
        // }

        // if(!empty($info['tit'])){
        //     $info['tit'] = '<header>
        //                         <h1>'.$info['tit'].'</h1>
        //                     </header>';
        // }

        // if(!empty($info['tit_img'])){
        //     $info['tit_img'] = '<div class = "banner">
        //                             '.$info['tit_img'].'
        //                         </div>';
        // }

        // if(!empty($info['price'])){
        //     $price = $info['price'];
        //     $info['price'] = '<strong>
        //                             ￥'.$info['price'].'
        //                         </strong>';
        // }

        // if((int)$info['original_price'] != 0){
        //     $discount = $price/$info['original_price']*10;
        //     $save = $info['original_price']-$price;
        //     $info['original_price'] = '<ol>
        //                                     <li>
        //                                         <p>原价</p>
        //                                         ￥'.$info['original_price'].'
        //                                     </li>
        //                                     <li>
        //                                         <p>折扣</p>
        //                                         '.$discount.'折
        //                                     </li>
        //                                     <li>
        //                                         <p>节省</p>
        //                                         ￥'.$save.'
        //                                     </li>
        //                                 </ol>';
        // }else{
        //    $info['original_price'] = ''; 
        // }

        // if($info['dao_time'] == 1){
        //     $info['dao_time'] = '<div class="row2">
        //                             <strong>'.$info['num'].'<br>人已购买</strong>
        //                                 <div class = "time">
        //                                 <div id="remainTime_1" class="jltimer"><span>00</span>天<span>01</span>小时<span>18</span>分<span>36</span>秒</div>
        //                                 <script language="javascript">
        //                                     addTimeLesser(1, 4735);
        //                                 </script>
        //                             </div>
        //                         </div>';
        // }else{
        //     $info['dao_time'] = '';
        //     // $js = '';
        // }

        // if(!empty($info['qiang'])){
        //     $info['qiang'] = '<h2>▼'.$info['qiang'].'</h2>';
        // } 

        // if(!empty($info['q_info'])){
        //     $info['q_info'] = $info['q_info']
        //     ;
        // }

        // if(!empty($info['buy'])){
        //     $info['buy'] = '<h2>▼'.$info['buy'].'</h2>';
        // }

        // if(!empty($info['b_info'])){
        //     $info['b_info'] = $info['b_info'];
        // }

        // if(!empty($info['chan'])){
        //     $info['chan'] = '<h2>▼'.$info['chan'].'</h2>';
        // }

        // if(!empty($info['c_info'])){
        //     $info['c_info'] = $info['c_info'];
        // }

        // if(!empty($info['ser'])){
        //     $info['ser'] = '<h2>▼'.$info['ser'].'</h2>';
        // }

        // if(!empty($info['tel_t1']) && !empty($info['tel1'])){
        //     $tel1 = '<a class = "btn" href = "tel:'.$info['tel1'].'">'.$info['tel_t1'].'：'.$info['tel1'].'</a>';
        // }else{
        //     $tel1 = '';
        // }

        // if(!empty($info['tel_t2']) && !empty($info['tel2'])){
        //     $tel2 = '<a class = "btn" href = "tel:'.$info['tel2'].'">'.$info['tel_t2'].'：'.$info['tel2'].'</a>';
        // }else{
        //     $tel2 = '';
        // }

        // if(!empty($info['sms_t']) && !empty($info['sms'])){
        //     $sms = '<a class = "btn" href = "tel:'.$info['sms'].'">'.$info['sms_t'].'：'.$info['sms'].'</a>';
        // }else{
        //     $sms = '';
        // }

        // if(!empty($tel1)){
        //     $tel = $info['tel1'];
        //     $tel_t = $info['tel_t1'];
        // }else if(!empty($tel2)){
        //     $tel = $info['tel2'];
        //     $tel_t = $info['tel_t2'];
        // }

        // if(!empty($info['sms_t'])){
        //     $sms_t = $info['sms_t'];
        //     $info['sms_t'] = $info['sms_t'].'：';
        // }else{
        //     $info['sms_t'] = '短信功能即将开放';
        // }

        // if(!empty($tel)){
        //     $foot = '<nav class = "base">
        //                 <ul class = "BaseUl">
        //                     <li class = "li"><a href = "#buy">在线下单</a></li> 
        //                     <li class = "NoLi">&nbsp;</li>
        //                     <li class = "li"><a href = "tel:'.$tel.'">'.$tel_t.'</a></li>  
        //                     <li class = "NoLi">&nbsp;</li>
        //                     <li class = "li"><a href = "sms:'.$info['sms'].'">'.$sms_t.'</a></li>
        //                 </ul>
        //             </nav>';
        // }

        // if(!empty($info['s_info'])){
        //     $info['s_info'] = '<div class = "btn">
        //                             '.$info['s_info'].''.
        //                             $tel1.''.
        //                             $tel2.''.
        //                             $sms
        //                             .'
        //                             <div class = "none"></div>
        //                         </div>';
        // }

        // if(!empty($info['in_t'])){
        //     $info['in_t'] = '<article id = "buy">  
        //                         <h2>▼'.$info['in_t'].'</h2>';
        //     $style = '';
        // }else{
        //     $info['in_t'] = '';
        //     $style = 'style = "display: none;"';
        // }

        // if(!empty($info['ft_img'])){
        //     $info['ft_img'] = '<div class = "foot">
        //                             '.$info['ft_img'].' 
        //                         </div>';
        // }

        // if(!empty($info['comp'])){
        //     $info['comp'] = '<center><div><p>'.$info['comp'].'</p></div></center>';
        // }

        // $f_n = '<div class = "f_n"></div>';

        // // if(!empty($info['wid'])){
        // //     $wid = $info['wid'].'px';
        // //     $wid = "";
        // // }else{
        // //     $wid = "";
        // // }
        // if(!empty($info['wid'])){
        //     $wid = $info['wid'].'px';
        //     $wid = "style = 'width: 100%; max-width: $wid;'";
        // }else{
        //     $wid = "style = 'width: 100%; max-width: 700px;'";
        // }

        // // var_dump($info);
        // $this->assign('js',$js); 
        // $this->assign('wid',$wid); 
        // $this->assign('f_n',$f_n);
        // $this->assign('style',$style);
        // $this->assign('foot',$foot);
        // $this->assign('info',$info);
        // $this->display('nanxiwang');
    }

    // 手机端分类商品
    public function category()
    {
        // echo 1;exit();
        $category = M('Category')->where('type=1')->order('sort_order desc')->select();
        // var_dump($category);exit();
        $this->assign('category',$category);
        $this->display('Item/category');
    }
    public function getCategoryList(){
         $Model = D('Item');
         $kw = addslashes(str_replace(' ', '', $_GET['kw']));
         $where = 'status=1 AND is_delete=0';
         if(!empty($_GET['id'])){
             $where .= " AND category_id=".intval($_GET['id']);
         }else{
            $category = M('Category')->field('id')->where('type=1')->select();
            foreach ($category as $cid) { $category_id[] = $cid['id']; }
            $where .= " AND category_id IN(".implode(',', $category_id).")";
         }
         if(!empty($kw)) $where .= " AND name LIKE '%{$kw}%' ";
          $list = $Model->field('id,sn,name,price,image,thumb,brief')->where($where)->order('is_hot desc,sort_order ASC')->select();
          foreach($list as &$li){
             $li['url'] = U('Item/order',array('id'=>$li['sn']));
             $li['image'] = imageUrl($li['image']);
             $li['thumb'] = imageUrl($li['thumb']);
          }
          $this->ajaxReturn($list,'success',$list?1:0);
    }

    public function query(){
      $this->display('Item/query');
    }
    public function article(){
      $Model = D('Article');
      $where = array('is_delete'=>0);
      if(isset($_GET['id'])) $where['category_id'] = (int)$_GET['id'];

       import('ORG.Util.Page');
      $count = $Model->where($where)->count();
      $page  = new Page($count,10);
      $list = $Model->where($where)->limit($page->firstRow . ',' . $page->listRows)->order('sort_order ASC,id ASC')->select();
      $category = M('Category')->where('type=2')->order('sort_order ASC,id ASC')->select();

      $this->assign('page',$page->show());
      $this->assign('category',$category);
      $this->assign('list',$list);
      $this->display();
    }
    public function detail(){
      $id = (int)$_GET['id'];
      $info = getCache('Article',array('id'=>$id));
      $category = M('Category')->where('type=2')->order('sort_order ASC,id ASC')->select();
      $this->assign('category',$category);
      $this->assign('info',$info);
      $this->display();
    }

}
