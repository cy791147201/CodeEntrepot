<?php 

class pageTool
{
    private $total;
    private $number;
    private $page;
    private $pageNow;

    public function __construct($total,$number)
    {
        $this->total = $total;
        $this->number = $number;
        $this->page = $this->getPage();

        $this->uri = $this->setUri();

        $this->pageNow = !empty($_GET['page'])?$_GET['page']:1;
    }

    private function getPage()
    {
        return ceil($this->total/$this->number);
    }

    private function setUri()
    {

        $url = $_SERVER['REQUEST_URI'];
    
        if(strstr($url,'?')){

            $arr = parse_url($url);
   
            if(isset($arr['query'])){
     
                parse_str($arr['query'],$output);
            }
    
            unset($output['page']);
     
            $url = $arr['path'].'?'.http_build_query($output);

        }else{
            $url.='?';
        }
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

        for($i=$num;$i>=1;$i--){
            $page = $this->pageNow-$i;
            if($page>1){
                $lists .= '&nbsp;<a href = "'.$this->uri.'&page='.$page.'">'.$page.'</a>&nbsp;';
            }
        }

        if($this->pageNow>1){
            $lists .= '&nbsp;'.$this->pageNow.'&nbsp';
        }

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

    private function num()
    {
        return $this->end()-$this->start()+1;
    }

    public function page()
    {

        $arr = func_get_args();

        $pages = '';

        $pageTool[0] = '&nbsp总共&nbsp;'.$this->total.'&nbsp;条记录&nbsp';
        $pageTool[1] =  '&nbsp;本页显示&nbsp;'.$this->num().'&nbsp;条记录&nbsp';
        $pageTool[2] = '&nbsp显示&nbsp;'.$this->start().'&nbsp;到&nbsp;'.$this->end().'条&nbsp';
        $pageTool[3] = '&nbsp;当前第&nbsp;'.$this->pageNow.'页&nbsp;&nbsp;&nbsp;&nbsp;总共&nbsp;'.$this->page.'&nbsp;页&nbsp;&nbsp;';
        $pageTool[4] = '&nbsp;'.$this->first().'&nbsp;';
        $pageTool[5] = '&nbsp;'.$this->lists().'&nbsp;';
        $pageTool[6] = '&nbsp;'.$this->last().'&nbsp;';
        if(count($arr)<1){
            $arr = array(0,1,2,3,4,5,6);
        }
        foreach($arr as $n){
            $pages .= $pageTool[$n];
        }
        return $pages;

    }
}




