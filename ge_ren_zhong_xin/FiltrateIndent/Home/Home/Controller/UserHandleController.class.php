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

        $res1 = $Model1->where($where1)->find();
        // var_dump($Model1->_sql());
        if(!$MaxTag1 || !$res1)
        {
            $this->ReturnJudge('未知筛选配置表错误', 'Excel/ScreenData?act=screen');
            exit();
        }
        
        // 筛选配置表没有问题
        // 获取问题件标志  
        if($MaxTag1 === $res1['s_tag'])
        {
            // 问题件标志
            $ScreenRule = explode(',', str_replace(',', ',', str_replace('，', ',', $res1['u_val'])));
// var_dump($ScreenRule);
            foreach($ScreenRule as $k => $v)
            {
                $ScreenRule[$k] = '%' . $v .'%';
            }
// var_dump($ScreenRule);
            // 获取快递配置表
            $where2['line'] = $res1['e_val'];
            $where2['sta'] = 1;

            $Model2 = M('yuantong_temp');
            $MaxTag2 = $Model2->max('tag');

            $res2 = $Model2->where($where2)->find();
            
            if(!$MaxTag2 || !$res2)
            {
                $this->ReturnJudge('快递模版未知错误', 'Excel/ScreenData?act=screen');
                exit();
            }

            // 获取问题件列
            if($MaxTag2 === $res2['tag'])
            {
                // var_dump($res2['line']);
                // 筛选快递表问题件
                // 获取快递未处理数据
                $where3['s_tag'] = 1;
                $where3['w_ad'] = $_SESSION['id'];
                $Model3 = M('yuantong_data_tag');
                $res3 = $Model3->where($where3)->getField('d_tag', true);
                if(!$res3)
                {
                    $this->ReturnJudge('您还没有添加数据', 'Excel/ScreenData?act=screen');
                    exit();
                }
                $ExpressDataTag = implode(',', $res3);

                // 筛选快递数据中的问题件
                $line = $where2['line'] - 1;
                $where4['l' . $line] = array('like', $ScreenRule, 'OR');

                $Model4 = M('yuantong_data');
                $res4 = $Model4->where($where4)->select();
                if(!$res4)
                {
                    $this->ReturnJudge('没有找到符合的数据', 'Excel/ScreenData?act=screen');
                    exit();
                }
                else
                {
                    1111111111111
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