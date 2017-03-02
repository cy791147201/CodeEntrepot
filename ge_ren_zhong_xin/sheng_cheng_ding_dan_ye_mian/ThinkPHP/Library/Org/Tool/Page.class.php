<?php 
namespace Org\Tool;
// 分页类
class page
{
    private $total;//总条数
    private $number;//每页显示条数 
    private $page;//总页数
    private $pageNow;//当前页

    public function __construct($total, $number)
    {
        $this->total = $total;
// var_dump($total);
        $this->number = $number;
        $this->page = $this->getpage();

        $this->uri = $this->setUri();
        $this->pageNow = !empty($_GET['page'])?$_GET['page']:1;
        // $this->style = $pageStyle;
// var_dump($this->style);
    }

    //获取页数
    private function getpage()
    {
        return ceil($this->total/$this->number);
    }

    //获取uri 删除重复的page
    private function setUri()
    {
        //获取当前url带参数
        $url = $_SERVER['REQUEST_URI'];
        // var_dump($url);
        //判断是否有？参数
        if(strstr($url,'?')){
            //parse——url将url分成path路径和query参数两部分
            $arr = parse_url($url);
            //如果有参数
            if(isset($arr['query'])){
                //使用parse——str将参数变成数组
                parse_str($arr['query'],$output);
            }
            //删除数组中的page
            unset($output['page']);
            //将关联数组变成字符串，再和原来的path组合
            $url = $arr['path'].'?'.http_build_query($output);
// var_dump($url);
        }else{
            $url.='?';
        }
        // var_dump($url);
        return $url;
    }

    private function first()
    {
        if($this->pageNow>1){
            $top = $this->pageNow-1;
            return  '<a href = "'.$this->uri.'&page=1">&nbsp;首页&nbsp;</a><a href = "'.$this->uri.'&page='.$top.'">&nbsp;上一页&nbsp;</a>';
        }else{
            return '';
        }
        
    }

    private function lists()
    {
        $lists = '';
        $num = 4;
        //当前页前
        for($i=$num;$i>=1;$i--){
            $page = $this->pageNow-$i;
            if($page>1){
                $lists .= '&nbsp;<a href = "'.$this->uri.'&page='.$page.'">'.$page.'</a>&nbsp;';
            }
        }

        if($this->pageNow>1){
            $lists .= '&nbsp;'.$this->pageNow.'&nbsp';
        }
        //当前页后
        for($i=1;$i<$num;$i++){
            $page = $this->pageNow+$i;
            if($page<=$this->page){
                $lists .= '&nbsp;<a href = "'.$this->uri.'&page='.$page.'">'.$page.'</a>&nbsp;';
            }else{
                break;
            }
        }
        return $lists;
    }

    private function last()
    {
        if($this->pageNow<$this->page){
            $next = $this->pageNow+1;
            return  '<a href = "'.$this->uri.'&page='.$next.'">&nbsp;下一页&nbsp;</a><a href = "'.$this->uri.'&page='.$this->page.'">&nbsp;末页&nbsp;</a>';
        }else{
            return '';
        }
    }

    private function start()
    {
        return ($this->pageNow-1)*$this->number+1;
    }

    private function end()
    {
        return min($this->pageNow*$this->number,$this->total);
    }

    //当前显示条数
    private function num()
    {
        return $this->end()-$this->start()+1;
    }

    //调用犯法获取分页
    public function page()
    {
        //return '总共'.$this->total.'条记录&nbsp;&nbsp;本页显示'.$this->num().'条记录&nbsp;&nbsp显示'.$this->start().'到'.$this->end().'条&nbsp;&nbsp;当前页'.$this->pageNow.'总共'.$this->page.'页'.$this->first().'&nbsp;&nbsp;'.$this->lists().'&nbsp;&nbsp;'$this->last();

        $arr = func_get_args();

        $pages = '';

        $pageTool[0] = '&nbsp;&nbsp;总共&nbsp;'.$this->total.'&nbsp;条&nbsp;';
        $pageTool[1] =  '&nbsp;&nbsp;本页显示&nbsp;'.$this->num().'&nbsp;条&nbsp;';
        $pageTool[2] = '&nbsp;&nbsp;显示&nbsp;'.$this->start().'&nbsp;到&nbsp;'.$this->end().'条&nbsp;';
        $pageTool[3] = '&nbsp&nbsp;第&nbsp;'.$this->pageNow.'&nbsp;页&nbsp;&nbsp;共&nbsp;'.$this->page.'&nbsp;页&nbsp;&nbsp;';
        $pageTool[4] = '&nbsp;'.$this->first().'&nbsp;&nbsp;';
        $pageTool[5] = $this->lists().'&nbsp;';
        $pageTool[6] = '&nbsp;&nbsp;'.$this->last().'&nbsp;';
        if(page($arr)<1){
            $arr = array(0,1,2,3,4,5,6);
        }
        foreach($arr as $n){
            $pages .= $pageTool[$n];
        }
        // var_dump($pages);
        return $pages;

    }
}




