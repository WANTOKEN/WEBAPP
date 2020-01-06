<?php

namespace Home\Controller;

use Think\Controller;

class WXGoodsController extends Controller
{
   

    /*
    * 获取餐品数据
    */
    public function getgoodsdata()
    {
        $goods = D('Goods');
        $where['goodsStatus'] = array('not in', '已下架,待上架');
        $type[] = $goods->field('goodsType')->group('goodsType')->order('goodsType')->where($where)->select();
        $l = count($type[0]);
        for ($i = 0; $i < $l; $i++) {
            $typeId = $type[0][$i]['goodstype'];//一条类型数据
            $goodlist[] = $goods->where($where)->where("goodsType = '$typeId'")->select();
            $return[] = array(
                'type' => $typeId,
                'data' => $goodlist[$i],
            );
        }

        $this->ajaxReturn($return);
    }


}