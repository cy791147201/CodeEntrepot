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
            $this->DeficiencyData($act);
        }
        // 导出快递缺失的数据
        else if($act === '2')
        {
            $this->DeficiencyData($act);
        }
        // 导出问题件
        else if($act === '3')
        {
            $this->ProblemExpress($act);
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

    // 导出缺失的数据
    private function DeficiencyData($act = '')
    {
        if(empty($act))
        {
            $this->ReturnJudge('嘿嘿', 'Excel/index');
            exit();
        }

        $where1['sta'] = 1;
        $Model1 = M('Screen');
        $res1 = $Model1->where($where1)->max('s_tag');
        $res11 = $Model1->max('s_tag');

        if($res1 === $res11)
        {
            $where11['s_act'] = $act;
        
            $where11['s_tag'] = $res1;
            $res11 = $Model1->where($where11)->getField('e_val, u_val, name');
            if(!$res11)
            {
                $this->ReturnJudge('不存在该筛选', 'Excel/index');
                exit();
            }
            else
            {
                // 快递模版
                $Model3 = M('self_temp');
                $temp1 = $Model3->where($where1)->max('tag');
                $temp2 = $Model3->max('tag');
                if($temp1 !== $temp2)
                {
                    $this->ReturnJudge('快递模版存在错误', 'Excel/index');
                    exit();
                }
                else
                {
                    $where3['tag'] = $temp2;
                    $res3 = $Model3->where($where3)->getField('id, line, l_val', true);
                    $res3 = array_values($res3);

                    $res31 = array();
                    $res311 = array();
                    foreach($res3 as $k => $v)
                    {
                        $res311[$k] = $v['l_val'];
                    }
                    $res31[] = $res311;
                }

                // 用户模版模版
                $Model33 = M('yuantong_temp');
                $temp11 = $Model33->where($where1)->max('tag');
                $temp22 = $Model33->max('tag');
                if($temp11 !== $temp22)
                {
                    $this->ReturnJudge('快递模版存在错误', 'Excel/index');
                    exit();
                }
                else
                {
                    $where33['tag'] = $temp22;
                    $res33 = $Model33->where($where33)->getField('id, line, l_val', true);
                    $res33 = array_values($res33);

                    $res32 = array();
                    $res322 = array();
                    foreach($res33 as $k => $v)
                    {
                        $res322[$k] = $v['l_val'];
                    }
                    $res32[] = $res322;
                }

                $data2 = array();
                foreach($res11 as $v)
                {
                    $data = $v;
                }
                $FileName = $data['name'];

                $where2['w_ad'] = $_SESSION['id'];
                if($act === '2')
                {
                    $where2['e_hiatus'] = array('neq', 1);
                }
                else if($act === '1')
                {
                    $where2['u_hiatus'] = array('neq', 1);
                }
                else
                {
                    $this->ReturnJudge('嗯哪', 'Excel/index');
                    exit();
                }

                $Model21 = M('self_data_tag');
                $Model22 = M('yuantong_data_tag');

                $res21 = $Model21->where($where2)->getField('d_tag', true);
                $res22 = $Model22->where($where2)->getField('d_tag', true);
                $TagNum1 = count($res21);
                $TagNum2 = count($res22);

                if($res21 && $res22)
                {   
                    $data21 = 'l' . ($data['u_val'] - 1);
                    $data22 = 'l' . ($data['e_val'] - 1);

                    $Model24 = M('yuantong_data');
                    $Model23 = M('self_data');
                    // 用户缺失的
                    if($act === '1')
                    {
                        // 自己的数据
                        $where21['d_tags'] = array('in', implode(',', $res21));
                        $res23 = $Model23->where($where21)->getField($data22, true);
                        
                        $where222[$data21] = array('not in', implode(',', $res23));
                        $res222 = $Model24->where($where222)->getField('l0, l1, l2, l3, l4, l5, l6, l7, l8, l9, l10, l11, l12, l13', true);
                        if($res222)
                        {
                            $res222 = array_values($res222);
                            // 合并数据，导出excel
                            $data3 = array_merge($res32, $res222);

                            // 更新快递模版
                            $time = time();
                            $where5['d_tag'] = $where33['d_tag'] = array('in', implode(',', $res22));
                            $data5['u_hiatus'] = 1;
                            $data5['w_s'] = $_SESSION['id'];
                            $data5['s_t'] = $time;
                            $res5 = $Model22->where($where5)->save($data5);
                            // 判断快递配置表更新数据数量与需要更新的数量是否一致，不一致回滚
                            if($TagNum2 === $res5)
                            {
                                // 导出符合条件的excel
                                $this->ExportExcel($data3, $FileName);
                            }
                            else
                            {
                                $data5['u_hiatus'] = 0;
                                $data5['w_s'] = '';
                                $data5['s_t'] = '';
                                $res5 = $Model3->where($where5)->save($data5);
                                if(!$res5)
                                {
                                    $this->ReturnJudge('快递配置表出现未知错误', 'Excel/ScreenData?act=screen');
                                    exit();
                                }
                            }
                        }
                        else
                        {
                            $this->ReturnJudge('快递不存在缺失的数据', 'Excel/index');
                            exit();
                        }
                    }
                    // 快递缺失的
                    else if($act === '2')
                    {
                        // 快递的数据
                        $where22['d_tags'] = array('in', implode(',', $res22));
                        $res24 = $Model24->where($where22)->getField($data22, true);
                        
                        $where222[$data21] = array('not in', implode(',', $res24));
                        $res222 = $Model23->where($where222)->getField('l0, l1, l2, l3, l4, l5, l6, l7, l8, l9, l10, l11, l12, l13, l14, l15, l16, l17, l18, l19, l20, l21, l22, l23', true);
                        if($res222)
                        {
                            $res222 = array_values($res222);
                            // 合并数据，导出excel
                            $data3 = array_merge($res31, $res222);

                            // 更新快递模版
                            $time = time();
                            $where5['d_tag'] = $where33['d_tag'] = array('in', implode(',', $res22));
                            $data5['e_hiatus'] = 1;
                            $data5['w_s'] = $_SESSION['id'];
                            $data5['s_t'] = $time;
                            $res5 = $Model22->where($where5)->save($data5);
                            // 判断快递配置表更新数据数量与需要更新的数量是否一致，不一致回滚
                            if($TagNum2 === $res5)
                            {
                                // 导出符合条件的excel
                                $this->ExportExcel($data3, $FileName);
                            }
                            else
                            {
                                $data5['e_hiatus'] = 0;
                                $data5['w_s'] = '';
                                $data5['s_t'] = '';
                                $res5 = $Model3->where($where5)->save($data5);
                                if(!$res5)
                                {
                                    $this->ReturnJudge('快递配置表出现未知错误', 'Excel/ScreenData?act=screen');
                                    exit();
                                }
                            }
                        }
                        else
                        {
                            $this->ReturnJudge('快递不存在缺失的数据', 'Excel/index');
                            exit();
                        }
                    }
                    else
                    {
                        $this->ReturnJudge('哎呦喂', 'Excel/index');
                        exit();
                    }
                }
                else
                {
                    $this->ReturnJudge('没有找到符合条件的数据', 'Excel/index');
                    exit();
                }
            }
        }
        else
        {
            $this->ReturnJudge('筛选配置表出现未知错误', 'Excel/index');
            exit();
        }
    }

    // 导出问题件
    private function ProblemExpress($act = '')
    {
        if(empty($act))
        {
            $this->ReturnJudge('嘿嘿', 'Excel/index');
            exit();
        }

        // 检查筛选配置表是否出错
        $where1['sta'] = 1;
        $where1['s_act'] = $act;

        $Model1 = M('Screen');
        $MaxTag1 = $Model1->max('s_tag');
        $res1 = $Model1->where($where1)->getField('sta, s_tag, e_val, u_val, name');
        // 两种方法查询max_tag，如果不一样则出错，直接退出
        if(!$MaxTag1 || !$res1)
        {
            $this->ReturnJudge('未知筛选配置表错误', 'Excel/ScreenData?act=screen');
            exit();
        }
        
        // 设置到处文件名为设置的筛选名称
        $FileName = $res1[1]['name'];

        // 筛选配置表没有问题
        // 获取问题件标志
        if($MaxTag1 === $res1[1]['s_tag'])
        {
            // 问题件标志
            $ScreenRule = explode(',', str_replace(',', ',', str_replace('，', ',', $res1[1]['u_val'])));

            // 如果筛选条件中有空字的话，单独查询字段为空项
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

            // 获取快递配置表
            $where2['line'] = $res1[1]['e_val'];
            $where2['sta'] = 1;
            $Model2 = M('yuantong_temp');
            $MaxTag2 = $Model2->max('tag');
            $res2 = $Model2->where($where2)->getField('tag', true);
            // 比较两种方式查询的max_tag是否一致，不一致则快递模版存在错误，直接退出
            if(!$MaxTag2 || !$res2)
            {
                $this->ReturnJudge('快递模版未知错误', 'Excel/ScreenData?act=screen');
                exit();
            }

            // 获取问题件列
            if($MaxTag2 === $res2[0]['tag'])
            {
                // 筛选快递表问题件
                // 获取当前用户快递未处理数据
                $where3['issue'] = array('neq', 1);
                $where3['w_ad'] = $_SESSION['id'];
                $Model3 = M('yuantong_data_tag');
                $res3 = $Model3->where($where3)->getField('d_tag', true);
                $TagNum = count($res3);
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

                // 单独处理筛选条件存在空字的
                if($null === true)
                {
                    $where44['l' . $line] = ' ';
                    $res44 = $Model4->where($where44)->getField('d_id, l0, l1, l2, l3, l4, l5, l6, l7, l8, l9, l10, l11, l12, l13', true);
                }
                $res4 = $Model4->where($where4)->getField('d_id, l0, l1, l2, l3, l4, l5, l6, l7, l8, l9, l10, l11, l12, l13', true);

                if(!$res4)
                {
                    $this->ReturnJudge('没有找到符合的数据', 'Excel/ScreenData?act=screen');
                    exit();
                }
                else
                {
                    // 处理数据格式
                    foreach($res4 as $k => $v)
                    {
                        unset($v['d_id']);
                        $res4[$k] = array_values($v);
                    }

                    // 存在单独处理筛选条件空字
                    if(!empty($res44))
                    {
                        foreach($res44 as $k => $v)
                        {
                            unset($v['d_id']);
                            $res44[$k] = array_values($v);
                        }
                        $data444 = array_merge($res4, $res44);
                    }
                    // 不存在筛选条件空字
                    else
                    {
                        $data444 = $res4;
                    }

                    $where22['sta'] = 1;
                    $res22 = $Model2->where($where22)->getField('line, l_val');
                    $res22 = array_values($res22);

                    // 合并数据
                    $res222[] = $res22;
                    $data4444 = array_merge($res222, $data444);

                    // 更新快递模版
                    $time = time();
                    $where5['d_tag'] = $where33['d_tag'] = array('in', implode(',', $res3));
                    $data3['issue'] = 1;
                    $data3['w_s'] = $_SESSION['id'];
                    $data3['s_t'] = $time;
                    $res33 = $Model3->where($where33)->save($data3);

                    // 判断快递配置表更新数据数量与需要更新的数量是否一致，不一致回滚
                    if($TagNum === $res33)
                    {
                        // 导出符合条件的excel
                        $this->ExportExcel($data4444, $FileName);
                    }
                    else
                    {
                        $data5['issue'] = 0;
                        $data5['w_s'] = '';
                        $data5['s_t'] = '';
                        $res5 = $Model3->where($where5)->save($data5);
                        if(!$res5)
                        {
                            $this->ReturnJudge('快递配置表出现未知错误', 'Excel/ScreenData?act=screen');
                            exit();
                        }
                    }
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