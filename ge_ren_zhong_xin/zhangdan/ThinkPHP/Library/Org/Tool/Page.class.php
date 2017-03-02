<?php 
namespace Org\Tool;
// 分页类
class page
{
    private $total;//总条数
    private $number;//每页显示条数 
    private $count;//总页数
    private $countNow;//当前页

    public function __construct($total, $number)
    {
        $this->total = $total;
// var_dump($total);
        $this->number = $number;
        $this->count = $this->getcount();

        $this->uri = $this->setUri();
        $this->countNow = !empty($_GET['count'])?$_GET['count']:1;
        // $this->style = $countStyle;
// var_dump($this->style);
    }

    //获取页数
    private function getcount()
    {
        return ceil($this->total/$this->number);
    }

    //获取uri 删除重复的count
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
            //删除数组中的count
            unset($output['count']);
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
        if($this->countNow>1){
            $top = $this->countNow-1;
            return  '<a href = "'.$this->uri.'&count=1">&nbsp;首页&nbsp;</a><a href = "'.$this->uri.'&count='.$top.'">&nbsp;上一页&nbsp;</a>';
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
            $count = $this->countNow-$i;
            if($count>1){
                $lists .= '&nbsp;<a href = "'.$this->uri.'&count='.$count.'">'.$count.'</a>&nbsp;';
            }
        }

        if($this->countNow>1){
            $lists .= '&nbsp;'.$this->countNow.'&nbsp';
        }
        //当前页后
        for($i=1;$i<$num;$i++){
            $count = $this->countNow+$i;
            if($count<=$this->count){
                $lists .= '&nbsp;<a href = "'.$this->uri.'&count='.$count.'">'.$count.'</a>&nbsp;';
            }else{
                break;
            }
        }
        return $lists;
    }

    private function last()
    {
        if($this->countNow<$this->count){
            $next = $this->countNow+1;
            return  '<a href = "'.$this->uri.'&count='.$next.'">&nbsp;下一页&nbsp;</a><a href = "'.$this->uri.'&count='.$this->count.'">&nbsp;末页&nbsp;</a>';
        }else{
            return '';
        }
    }

    private function start()
    {
        return ($this->countNow-1)*$this->number+1;
    }

    private function end()
    {
        return min($this->countNow*$this->number,$this->total);
    }

    //当前显示条数
    private function num()
    {
        return $this->end()-$this->start()+1;
    }

    //调用犯法获取分页
    public function page()
    {
        //return '总共'.$this->total.'条记录&nbsp;&nbsp;本页显示'.$this->num().'条记录&nbsp;&nbsp显示'.$this->start().'到'.$this->end().'条&nbsp;&nbsp;当前页'.$this->countNow.'总共'.$this->count.'页'.$this->first().'&nbsp;&nbsp;'.$this->lists().'&nbsp;&nbsp;'$this->last();

        $arr = func_get_args();

        $counts = '';

        $countTool[0] = '&nbsp;&nbsp;总共&nbsp;'.$this->total.'&nbsp;条&nbsp;';
        $countTool[1] =  '&nbsp;&nbsp;本页显示&nbsp;'.$this->num().'&nbsp;条&nbsp;';
        $countTool[2] = '&nbsp;&nbsp;显示&nbsp;'.$this->start().'&nbsp;到&nbsp;'.$this->end().'条&nbsp;';
        $countTool[3] = '&nbsp&nbsp;第&nbsp;'.$this->countNow.'&nbsp;页&nbsp;&nbsp;共&nbsp;'.$this->count.'&nbsp;页&nbsp;&nbsp;';
        $countTool[4] = '&nbsp;'.$this->first().'&nbsp;&nbsp;';
        $countTool[5] = $this->lists().'&nbsp;';
        $countTool[6] = '&nbsp;&nbsp;'.$this->last().'&nbsp;';
        if(count($arr)<1){
            $arr = array(0,1,2,3,4,5,6);
        }
        foreach($arr as $n){
            $counts .= $countTool[$n];
        }
        // var_dump($counts);
        return $counts;

    }
}




