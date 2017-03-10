<?php
namespace Home\Controller;
use Think\Controller;
class UserHandleController extends BeforeController 
{
    // 判断用户操作
    public function index()
    {
        $act = I('get.act');
        $act = $this->PreventSql($act);
        // var_dump($act);
        // 导出用户缺失的数据
        if($act === '1')
        {
            $this->DeficiencyUser();
        }
        // 导出快递缺失的数据
        else if($act === '2')
        {
            $this->DeficiencyExpress();
        }
        // 导出问题件
        else if($act === '3')
        {
            $this->ProblemExpress();
        }
        // 更新用户表
        else if($act === '4')
        {
            $this->UpdUserData();
        }
        else if($act === '')
        {
            $this->ReturnJudge('未知筛选配置表错误', 'UserHandle/index');
            exit();
        }
        else
        {
            $this->ReturnJudge('嘿嘿', 'Excel/index');
            exit();
        }
    }

    // 导出用户缺失的数据
    private function DeficiencyUser()
    {
        echo 1;
    }

    // 导出快递缺失的数据
    private function DeficiencyExpress()
    {
        echo 2;
    }

    // 导出问题件
    private function ProblemExpress()
    {
        // 检查筛选配置表是否出错
        $where1['sta'] = 1;
        $where1['s_act'] = '3';

        $Model1 = M('Screen');
        $MaxTag1 = $Model1->max('s_tag');

        $res1 = $Model1->where($where1)->getField('sta, s_tag, e_val, u_val');

        if(!$MaxTag1 || !$res1)
        {
            $this->ReturnJudge('未知筛选配置表错误', 'Excel/ScreenData?act=screen');
            exit();
        }
// echo 1;exit();
        // 筛选配置表没有问题
        // 获取问题件标志
        if($MaxTag1 === $res1[1]['s_tag'])
        {
// echo 2;exit();
            // 问题件标志
            $ScreenRule = explode(',', str_replace(',', ',', str_replace('，', ',', $res1[1]['u_val'])));

            $null = false;
            foreach($ScreenRule as $k => $v)
            {
                if($v === '空')
                {
                    $null = true;
                }

                if(!empty($v) && $v != '空')
                {
                    $ScreenRule[$k] = $v;
                }
                else
                {
                    unset($ScreenRule[$k]);
                }
            }

// echo 4;exit();
            // 获取快递配置表
            $where2['line'] = $res1[1]['e_val'];
            $where2['sta'] = 1;

            $Model2 = M('yuantong_temp');
            $MaxTag2 = $Model2->max('tag');

            $res2 = $Model2->where($where2)->getField('tag', true);
         
            if(!$MaxTag2 || !$res2)
            {
                $this->ReturnJudge('快递模版未知错误', 'Excel/ScreenData?act=screen');
                exit();
            }

            // 获取问题件列
            if($MaxTag2 === $res2[0]['tag'])
            {
                // 筛选快递表问题件
                // 获取快递未处理数据
                $where3['s_tag'] = array('neq', 4);
                $where3['w_ad'] = $_SESSION['id'];
                $Model3 = M('yuantong_data_tag');
                $res3 = $Model3->where($where3)->getField('d_tag', true);
// var_dump($Model3->_sql());exit();
                if(!$res3)
                {
                    $this->ReturnJudge('不存在符合条件的数据', 'Excel/ScreenData?act=screen');
                    exit();
                }
 
                // 筛选快递数据中的问题件
                $line = $where2['line'] - 1;
                $where4['l' . $line] = array('in', implode(',', $ScreenRule));
                $where44['d_tags'] = $where4['d_tags'] = array('in', implode(',', $res3));
                
                $Model4 = M('yuantong_data');

                if($null === true)
                {
                    // echo 1;
                    $where44['l' . $line] = ' ';
                    $res44 = $Model4->where($where44)->getField('d_id, l0, l1, l2, l3, l4, l5, l6, l7, l8, l9, l10, l11, l12, l13', true);
                }
                $res4 = $Model4->where($where4)->getField('d_id, l0, l1, l2, l3, l4, l5, l6, l7, l8, l9, l10, l11, l12, l13', true);
// var_dump($Model4->_sql());

                if(!$res4)
                {
                    $this->ReturnJudge('没有找到符合的数据', 'Excel/ScreenData?act=screen');
                    exit();
                }
                else
                {
// var_dump($res4);
// var_dump($res44);
                    foreach($res4 as $k => $v)
                    {
                        unset($v['d_id']);
                        $res4[$k] = array_values($v);
                    }

                    if(!empty($res44))
                    {
                        foreach($res44 as $k => $v)
                        {
                            unset($v['d_id']);
                            $res44[$k] = array_values($v);
                        }
                        $data444 = array_merge($res4, $res44);
                        // echo  1;
                    }
                    else
                    {
                        $data444 = $res4;
                    }

                    $where22['sta'] = 1;
                    $res22 = $Model2->where($where22)->getField('line, l_val');

                    $res22 = array_values($res22);

                    $res222[] = $res22;
                    $data4444 = array_merge($res222, $data444);

                    $time = time();
                    $where33['d_tag'] = array('in', implode(',', $res3));
                    $data3['s_tag'] = 4;
                    $data3['w_s'] = $_SESSION['id'];
                    $data3['s_t'] = $time;
                    $res33 = $Model3->where($where33)->save($data3);
                    // var_dump($res33);
            // exit();
                    // exit();
                    $this->ExportExcel($data4444, '导出问题件');
                }
            }
            else
            {
                $this->ReturnJudge('快递配置表出现错误', 'Excel/ScreenData?act=screen');
                exit();
            }
        }
        else
        {
            $this->ReturnJudge('筛选配置表出现错误', 'Excel/ScreenData?act=screen');
            exit();
        }
    }

    // 更新用户表
    private function UpdUserData()
    {
        echo 4;
    }
}