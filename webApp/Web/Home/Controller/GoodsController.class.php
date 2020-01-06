<?php
/**
 * Created by PhpStorm.
 * User: King
 * Date: 2018/8/6
 * Time: 18:12
 */


namespace Home\Controller;


use Think\Controller;

class GoodsController extends Controller
{

    public function index()
    {

        echo "hello";
    }

    /*
     * 首页显示内容
     */
    public function getindex()
    {
        $goods = D('Goods');
        $where['goodsStatus'] = array('not in', '已下架,待上架');
        $return = $goods->order('sale desc')->where($where)->limit(5)->select();
        $this->ajaxReturn($return);
    }
    /*
    * 获取搜索关键词
    */
    public function getsearchkey()
    {
        $search = D('Search');
        $userid = I('account');
        $hotsearch = $search->distinct(true)->field('searchtext')->where('searchflag>0')->order('searchflag desc')->limit(10)->select();
        $history = $search->distinct(true)->field('searchtext')->where("user_id='$userid'")->order('searchflag desc')->limit(10)->select();
        if($hotsearch&&$history){
            $return = array(
                'code'=>200,
                'hotdata'=>$hotsearch,
                'historydata'=>$history,
            );
        }elseif ($hotsearch){
            $return = array(
                'code'=>201,
                'title'=>'热搜',
                'data'=>$hotsearch,
            );
        }elseif ($history){
            $return = array(
                'code'=>201,
                'title'=>'历史',
                'data'=>$history,
            );
        }
        else{
            $return = array(
                'code'=>400,
                'msg'=>'没有数据',
            );

        }
        $this->ajaxReturn($return);

    }

    /*
     * 获取类型
     */
    public function getgoodstype()
    {
        $goods = D('Goods');
        $where['goodsStatus'] = array('not in', '已下架,待上架');
        $return = $goods->field('goodsType')->group('goodsType')->order('goodsType')->where($where)->select();
        $this->ajaxReturn($return);

    }

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
    /*
     * 获取推荐餐品或者桃村数据
     */
    public function getrecomgoodsdata()
    {
        $goods = D('Goods');
        $where['goodsType'] = array('in', '套餐类,套餐,营养套餐');
        $where['isrecom'] = array("not in",'0');
        $where['_logic'] = 'OR';
        $data = $goods->where($where)->select();
        if ($data){
            $return = array(
                'code'=>200,
                'data'=>$data
            );
        }else{
            $return = array(
                'code'=>400,
                'msg'=>'没有数据！'
            );
        }

        $this->ajaxReturn($return);
    }

    /*
    * 搜索餐品
    */
    public function searchgoodsdata()
    {
        $goods = D('Goods');
        $search = I('search');
        $userid = I('account')==null?'':I('account');
        $searchdb = D('Search');
        if ($search == null || $search == '') {
            $retrun = array(
                'code' => '400',
                'msg' => '请输入搜索内容！',
            );
        } else {
            $where['goodsName|goodsEnName|goodsType'] = array('like', '%' . $search . '%');
            $goodInfo = $goods->where($where)->select();
            if ($goodInfo) {
                $retrun = array(
                    'code' => '200',
                    'msg' => '获取成功！',
                    'data' => $goodInfo
                );
                $data = array(
                    'searchtext'=>$search,
                    'searchflag'=>1,
                    'user_id'=>$userid
                );
                $searchdb->add($data);
            } else {
                $retrun = array(
                    'code' => '400',
                    'msg' => '没有匹配的数据！',
                );
                $data = array(
                    'searchtext'=>$search,
                    'searchflag'=>0,
                    'user_id'=>$userid
                );
                $searchdb->add($data);
            }

        }
        $this->ajaxReturn($retrun);
    }

    /*
     * 获取详情
     */
    public function getgoodsdetail()
    {

        $goods = D('Goods');
        $goodsImg = D('GoodsImg');
        $goodsMaterial = D('GoodsMaterial');
        $goodsNutrition = D('GoodsNutrition');
        $goodsId = I('goodsid');
        $where1['goodsId'] = $goodsId;
        $where['item_goodsId'] = $goodsId;//外键

        if (($goodsNutrition->where($where)->count() == 0) && ($goodsMaterial->where($where)->count() == 0)) {
            $return = array(
                'code' => '0',
                'msg' => '没有数据'
            );
            $this->ajaxReturn($return);
            return;
        }
        $goodsInfo = $goods->where($where1)->select();
        $goodsNutritionInfo = $goodsNutrition->where($where)->select();
        $goodsMaterialInfo = $goodsMaterial->field("itemValue as value,concat_ws('\n来源:',itemName,itemSource) as name")->where($where)->order('itemValue')->select();
        $goodsImgInfo = $goodsImg->where("goodsid='$goodsId'")->select();
        foreach ($goodsNutritionInfo as $value) {
            $goodsNutritionInfo_name [] = $value['itemname'];
            $goodsNutritionInfo_num [] = $value['itemnum'];
            $goodsNutritionInfo_nrv [] = $value['itemnrv'];
        }
        if ($goodsNutritionInfo || $goodsMaterialInfo) {
            $return = array(
                'code' => '200',
                'msg' => 'success',
                'data' => $goodsInfo,
                'data1' => $goodsNutritionInfo,
                'data2' => $goodsMaterialInfo,
                'data3' => $goodsImgInfo,
                'databar' => array('name' => $goodsNutritionInfo_name, 'num' => $goodsNutritionInfo_num, 'nrv' => $goodsNutritionInfo_nrv)

            );
        } else {
            $return = array(
                'code' => '400',
                'msg' => '获取失败！',
            );
        }
        $this->ajaxReturn($return);
    }


}