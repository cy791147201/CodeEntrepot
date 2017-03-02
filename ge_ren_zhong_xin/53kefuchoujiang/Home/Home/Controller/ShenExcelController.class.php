<?php
namespace Home\Controller;
use Think\Controller;
class ShenExcelController extends BeforeController 
{
    // shen 显示导出excel页面
    public function index()
    {
        $this->assign('style', 0);

        $this->display('ShenExcel/index');
    }

    // shen 导出excel
    public function ShenExcelOut($where, $style)
    {
        $Indent = M('Indent');
        $where['status'] = $style;
        $res = $Indent->where($where)->order('id DESC')->select();
        $tit  = array(
                'id' => '用户id',
                'user' => '用户名',
                'prize' => '奖品',
                'tel' => '电话',
                'address' => '地址',
                'combo' => '套餐',
                'money' => '金额',
                'status' => '状态',
                'time' => '添加时间',
                'who_upd' => '谁更新的',
                'upd_time' => '更新时间', 
                'url' => '用户来源', 
            );   
        // var_dump($Indent->_sql());
        // var_dump($res);exit();
        $data = array();
        $data[] = $tit;
        foreach($res as $v){
            $v['add_time'] = date('Y-m-d H:i:s', $v['add_time']);
            $v['upd_time'] = date('Y-m-d H:i:s', $v['upd_time']);
            $data[] = $v;
        }
        $this->create_xls($data);
    }


    public function create_xls($data)
    {
        ini_set('max_execution_time', '0');

        import("Org.Util.PHPExcel");

        $filename= date('YmdHis', time());

        $phpexcel = new \PHPExcel();

        $phpexcel->getProperties()
            ->setCreator("Maarten Balliauw")
            ->setLastModifiedBy("Maarten Balliauw")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test result file");

        $phpexcel->getActiveSheet()->fromArray($data);

        $phpexcel->getActiveSheet()->setTitle('Sheet1');

        $phpexcel->setActiveSheetIndex(0);

        ob_end_clean();

        header("Pragma: public");

        header("Expires: 0");

        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");

        header("Content-Type:application/force-download");

        header("Content-Type: application/vnd.ms-excel; charset=UTF-8");

        header("Content-Type:application/octet-stream");

        header("Content-Type:application/download");;

        header("Content-Disposition:attachment;filename=".$filename.'.xls');

        header("Content-Transfer-Encoding:binary");

        $objwriter = \PHPExcel_IOFactory::createWriter($phpexcel, 'Excel5');

        $objwriter->save('php://output');

        exit;
    }

    // shen 显示指定时间的指定条件的用户信息
    public function ShenCondition()
    {
        $data = I('post.');

        $style = $data['style'];

        if(!empty($data['start']) && !empty($data['end'])){

            $start = strtotime($data['start']); 

            $end = strtotime($data['end']);   

            $where['add_time'] = array(array('gt', $start),array('lt', $end));

        }

        if(isset($data['out']) && $data['out'] == '导出excel'){

            $this->ShenExcelOut($where, $style);
            exit();

        }

        $info = I('get.');

        $page = isset($info['page'])?$info['page']+0:1;

        if($page < 1){

            $page = 1;

        }

        $number = 8;
        
        $offset = ($page - 1)*$number;

        $Indent = M('Indent');

        if($info['style'] == '2' || $style ==  '2'){

            // echo '已确认';
     
            $where['status'] = 2;

            $total = $Indent->where($where)->count();

            if($page >ceil($total/$number)){

                $page = 1;

            }

            $page = new \Org\tool\Pages($total, $number);

            $pages = $page->page(3,1,5,6,4,2,0);

            $res = $Indent->where($where)->limit($offset, $number)->order('id DESC')->select();

            $status = 1;

            $style = '2';

        }else if($info['style'] == '9' || $style ==  '9'){

            // echo '已确认已删除';
         
            $where['status'] = 9;

            $total = $Indent->where($where)->count();

            if($page >ceil($total/$number)){

                $page = 1;

            }

            $page = new \Org\tool\Pages($total, $number);

            $pages = $page->page(3,1,5,6,4,2,0);

            $res = $Indent->where($where)->limit($offset, $number)->order('id DESC')->select();

            $status = 1;

            $style = '9';

        }else if($info['style'] == '1'  || $style ==  '1'){

            // echo '未确认';
            $where['status'] = 1;

            $total = $Indent->where($where)->count();

            if($page >ceil($total/$number)){

                $page = 1;

            }

            $page = new \Org\tool\Pages($total, $number);

            $pages = $page->page(3,1,5,6,4,2,0);

            $res = $Indent->where($where)->limit($offset, $number)->order('id DESC')->select();

            $status = 0;

            $style = '1';

        }else if($info['style'] == '8'  || $style ==  '8'){

            // echo '未确认已删除';
      
            $where['status'] = 8;

            $total = $Indent->where($where)->count();

            if($page >ceil($total/$number)){

                $page = 11;

            }

            $page = new \Org\tool\Pages($total, $number);

            $pages = $page->page(3,1,5,6,4,2,0);

            $res = $Indent->where($where)->limit($offset, $number)->order('id DESC')->select();

            $status = 0;

            $style = '8';

        }else{

            echo '<center>';
            $this->error('嘿嘿嘿');
            echo '</center>';
            exit();

        }

        $arr = array();

        foreach($res as $v){

            if(empty($v['money'])){

                $v['money'] = '0';

            }

            $v['add_time'] = date('Y-m-d H:i:s', $v['add_time']);

            $v['upd_time'] = date('Y-m-d H:i:s', $v['upd_time']);

            $arr[] = $v;

        }

        $this->assign('style', $style);

        $this->assign('page', $pages);

        $this->assign('info', $arr);

        $this->display('ShenExcel/index');

    }

}