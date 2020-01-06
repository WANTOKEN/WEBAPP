<?php
/**
 * Created by PhpStorm.
 * User: King
 * Date: 2018/8/6
 * Time: 18:12
 */


namespace Home\Controller;

use Think\Controller;

class AGoodsController extends Controller
{

    public function index()
    {

        echo "hello";
    }
    /*
     *
     * 商品总量
     * 销量
     * 用户日购买数
     * 用户日访问数
     * 销量排行榜
     * 在售数据查询
     */
    /*
     * 商品总量
     * 销量
     * 用户日购买数
     * 用户日访问数
     */
    public function getTotal()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $goods = D('Goods');
        $orders = D('Orders');
        //总销量
        $toalsale = $goods->field('sum(sale) as toal')->order('sale desc')->select();
        //商品总量
        $totalgoods = $goods->count();
        //商品种类
        $totaltype = count($goods->field('goodsType')->group('goodsType')->select());
        //订单数
        $totalperson = $orders->count();
        $return = array(
            'toalsale' => $toalsale[0]['toal'],
            'totalgoods' => $totalgoods,
            'totaltype' => $totaltype,
            'totalperson' => $totalperson,
        );
        $this->ajaxReturn($return);
    }

    /*
    * 销量排行榜
   */
    public function getHotlist()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        //5条排行记录
        $goods = D('Goods');
        $where['goodsStatus'] = array('not in', '已下架,待上架');
        $where['sale'] = array('gt', 0);
        $return = $goods->field('goodsId,goodsName,sale')->order('sale desc')->where($where)->limit(5)->select();
        $this->ajaxReturn($return);
    }


    /*
     * 获取在售餐品数据
     * 1：为在售状态
     * -1：下架状态
     * 0：修改状态
     */
    public function getOnsaleGoodsdata()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $goods = D('Goods');
        $where['goodsStatus'] = array('not in', '已下架,待上架');
        $goodsInfo = $goods->where($where)->order('goodsTime desc')->select();
        $this->ajaxReturn($goodsInfo);
    }


    /*
    * 添加餐品
    */
    public function addGoodsData()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $goodsid = 'GD' . date('YmdHis');//商品名称
        $goodsname = I('goodsname');//名称
        $goodsenname = I('goodsenname');//英文名称
        $goodsprice = I('goodsprice');//单价
        $goodstype = I('goodstype');//类型
        $goodsenery = I('goodsenery');//能量
        $goodsrecom = I('goodsrecom');//推荐理由
        $goodsnutrition = I('goodsnutrition');//营养价值说明

        $nutrition_arr = I('post.nutritiondata');
        $material_arr = I('post.materialdata');
        //数据库对象
        $goods = D('Goods');//商品表
        $nutrition = D('GoodsNutrition');//营养成分表
        $material = D('GoodsMaterial');//食材材料

        $goodsdata = array(
            'goodsId' => $goodsid,
            'goodsName' => $goodsname,
            'goodsEnName' => $goodsenname,
            'goodsPrice' => $goodsprice,
            'goodsStatus' => '待上架',//0：待上架、1：在售、-1：下架
            'goodsEnergy' => $goodsenery,
            'goodsType' => $goodstype,//商品类型
            'goodsStore' => '1',//商户标识
            'sale' => '0',//销量0
            'goodsTime' => date('Y-m-d H:i:s'),//操作时间
            'goodsRecom' => $goodsrecom,
            'goodsNutrition' => $goodsnutrition,
        );
        $state1 = $goods->add($goodsdata);
        if ($state1) {
            foreach ($nutrition_arr as $value) {
                $nutritiondata[] = array(
                    'itemName' => $value['name'],
                    'itemNum' => $value['num'],
                    'itemNrv' => $value['nrv'],
                    'item_goodsId' => $goodsid,
                );

            }
            $state2 = $nutrition->addAll($nutritiondata);
            foreach ($material_arr as $value) {
                $materialdata[] = array(
                    'itemName' => $value['name'],
                    'itemSource' => $value['source'],
                    'itemValue' => $value['value'],
                    'item_goodsId' => $goodsid,
                );

            }
            $state3 = $material->addAll($materialdata);
        }
        if ($state1 && $state2 && $state3) {
            $return = array(
                'code' => '200',
                'msg' => '添加成功！',
                'goodsid' => $goodsid,
            );
        } else {
            $return = array(
                'code' => '400',
                'msg' => '添加失败！',
            );
        }


        $this->ajaxReturn($return);
    }

    /*
   * 修改餐品
   */
    public function regGoodsData()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $goodsid = I('goodsid');//商品ID
        $goodsname = I('goodsname');//名称
        $goodsenname = I('goodsenname');//英文名称
        $goodsprice = I('goodsprice');//单价
        $goodstype = I('goodstype');//类型
        $goodsenery = I('goodsenery');//能量
        $goodsrecom = I('goodsrecom');//推荐理由
        $goodsnutrition = I('goodsnutrition');//营养价值说明

        $nutrition_arr = I('post.nutritiondata');
        $material_arr = I('post.materialdata');
        //数据库对象
        $goods = D('Goods');//商品表
        $nutrition = D('GoodsNutrition');//营养成分表
        $material = D('GoodsMaterial');//食材材料

        $goodsdata = array(
            'goodsId' => $goodsid,
            'goodsName' => $goodsname,
            'goodsEnName' => $goodsenname,
            'goodsPrice' => $goodsprice,
            'goodsEnergy' => $goodsenery,
            'goodsType' => $goodstype,//商品类型
            'goodsTime' => date('Y-m-d H:i:s'),//操作时间
            'goodsRecom' => $goodsrecom,
            'goodsNutrition' => $goodsnutrition,
        );
        $state1 = $goods->where("goodsId='$goodsid'")->save($goodsdata);
        if ($state1) {
            foreach ($nutrition_arr as $value) {
                $nutritiondata[] = array(
                    'itemName' => $value['name'],
                    'itemNum' => $value['num'],
                    'itemNrv' => $value['nrv'],
                    'item_goodsId' => $goodsid,
                );

            }
            if ($nutrition->where("item_goodsId='$goodsid'")->delete()) {
                $state2 = $nutrition->addAll($nutritiondata);
            };

            foreach ($material_arr as $value) {
                $materialdata[] = array(
                    'itemName' => $value['name'],
                    'itemSource' => $value['source'],
                    'itemValue' => $value['value'],
                    'item_goodsId' => $goodsid,
                );

            }
            if ($material->where("item_goodsId='$goodsid'")->delete()) {
                $state3 = $material->addAll($materialdata);
            };

        }
        if ($state1 || $state2 || $state3) {
            $return = array(
                'code' => '200',
                'msg' => '更新成功！',
                'goodsid' => $goodsid,
            );
        } else {
            $return = array(
                'code' => '400',
                'msg' => '沒有任何更新！',
            );
        }


        $this->ajaxReturn($return);

    }

    /*
     * 修改图片
     */
    public function regGoodsImg()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $goodsid = I('goodsid');
        $del_img_url = I('del_img_url');
        $del_img_url_list = explode(",", $del_img_url);//分割餐品id
        //$this->ajaxReturn(count($del_img_url_list));
        $where['goodsId'] = $goodsid;
        $goods = D('Goods');//商品表
        $goodsImg = D('GoodsImg');
        if (IS_POST) {
            $config = array(
                'maxSize' => 3145728,
                'rootPath' => './Uploads/',
                'savePath' => '/Goods/',
                'saveName' => array('uniqid', 'GD'),
                'exts' => array('jpg', 'gif', 'png', 'jpeg'),
                'autoSub' => true,
                'subName' => array('date', 'Ymd'),
            );
            $upload = new \Think\Upload($config);// 实例化上传类
            $info = $upload->upload();
            if (!$info) {
                //$this->ajaxReturn(array('code'=>400,'msg'=>'请选择上传的图片'));
                for ($i = 0; $i < count($del_img_url_list); $i++) {
                    unlink('./' . $del_img_url_list[$i]);
                    $goodsImg->where("goodsid='$goodsid' and goodsimg='$del_img_url_list[$i]'")->delete();
                }
                $goodsimginfo = $goodsImg->field('goodsimg')->where("goodsid='$goodsid'")->limit(1)->select();//读取一条img库的首条记录
                $indeximg['goodsImage'] = $goodsimginfo[0]['goodsimg'];
                $goods->where($where)->save($indeximg);
                $return = array(
                    'code' => 400,
                    'msg' => '没有要上传的图片！'
                );
            } else {
                foreach ($info as $file) {
                    $imgurl_forgoods[] = 'Uploads' . $file['savepath'] . $file['savename'];
                    $imgurl = 'Uploads' . $file['savepath'] . $file['savename'];
                    $data[] = array(
                        'goodsimg' => $imgurl,
                        'goodsid' => $goodsid,

                    );

                }
                $state = $goodsImg->addAll($data);
                if ($state) {
                    for ($i = 0; $i < count($del_img_url_list); $i++) {
                        unlink('./' . $del_img_url_list[$i]);
                        $goodsImg->where("goodsid='$goodsid' and goodsimg='$del_img_url_list[$i]'")->delete();
                    }

                }
                $img_forgoodsinfo = $goodsImg->field('goodsimg')->where("goodsid='$goodsid'")->limit(1)->select();//读取一条img库的首条记录
                $goodsimgdata['goodsImage'] = $img_forgoodsinfo[0]['goodsimg'];
               /* $img_forgoods = $imgurl_forgoods[0];//第一条img的路径
                $goodsimgdata['goodsImage'] = $img_forgoods;//goods表*/
                $goods->where($where)->save($goodsimgdata);
                $return = array(
                    'code' => 200,
                );
            }

        } else {
            $return = array(
                'code' => 400,
                'msg' => '没有要上传的数据！'
            );
        }
        $this->ajaxReturn($return);

    }

    //上传图片
    public function uploadGoodsImg()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
        $goodsid = I('goodsid');
        $where['goodsId'] = $goodsid;
        $goods = D('Goods');//商品表
        $goodsImg = D('GoodsImg');
        if (IS_POST) {

            $config = array(
                'maxSize' => 3145728,
                'rootPath' => './Uploads/',
                'savePath' => '/Goods/',
                'saveName' => array('uniqid', 'GD'),
                'exts' => array('jpg', 'gif', 'png', 'jpeg'),
                'autoSub' => true,
                'subName' => array('date', 'Ymd'),
            );
            $upload = new \Think\Upload($config);// 实例化上传类
            $info = $upload->upload();
            if (!$info) {
                //$this->ajaxReturn(array('code'=>400,'msg'=>'请选择上传的图片'));
            } else {
                foreach ($info as $file) {
                    $imgurl_forgoods[] = 'Uploads' . $file['savepath'] . $file['savename'];
                    $imgurl = 'Uploads' . $file['savepath'] . $file['savename'];
                    $data[] = array(
                        'goodsimg' => $imgurl,
                        'goodsid' => $goodsid,

                    );

                }
                $state = $goodsImg->addAll($data);
                $img_forgoods = $imgurl_forgoods[0];//第一条img的路径
                $goodsimgdata['goodsImage'] = $img_forgoods;//goods表
                $goods->where($where)->save($goodsimgdata);
            }
            if ($state) {
                $return = array(
                    'code' => 200,
                );
            } else {
                $return = array(
                    'code' => 400,
                );
                //不成功就删除
                $goods->where($where)->delete();
            }

            $this->ajaxReturn($return);
        }


    }

    /*
     * 获取详情
     */
    public function getgoodsdetail()
    {
        //跨域问题
        header('Access-Control-Allow-Origin:*');
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
        $goodsMaterialInfo = $goodsMaterial->where($where)->select();
        $goodsImgInfo = $goodsImg->where("goodsid='$goodsId'")->select();
        if ($goodsNutritionInfo || $goodsMaterialInfo || $goodsImgInfo) {
            $return = array(
                'code' => '200',
                'msg' => 'success',
                'data' => $goodsInfo,
                'data1' => $goodsNutritionInfo,
                'data2' => $goodsMaterialInfo,
                'data3' => $goodsImgInfo,

            );
        } else {
            $return = array(
                'code' => '400',
                'msg' => '获取失败！',
            );
        }
        $this->ajaxReturn($return);
    }

    /*
     * 下架商品
     */
    function disGoods()
    {
        header('Access-Control-Allow-Origin:*');
        $goods = D('Goods');
        $goodsid = I('goodsid');
        $where['goodsId'] = $goodsid;
        if ($goods->where($where)->count() == 0) {
            $return = array(
                'code' => '400',
                'msg' => '该商品不存在！'
            );
            $this->ajaxReturn($return);
            return;
        }
        $data['goodsStatus'] = '已下架';
        $state = $goods->where($where)->save($data);
        if ($state) {
            $return = array(
                'code' => 200,
                'msg' => '您选定的商品已下架！',
            );
        } else {
            $return = array(
                'code' => 400,
                'msg' => '该商品已下架！',
            );
        }
        $this->ajaxReturn($return);
    }

    /*
    * 上架商品
    */
    function onSaleGoods()
    {
        header('Access-Control-Allow-Origin:*');
        $goods = D('Goods');
        $goodsid = I('goodsid');
        $where['goodsId'] = $goodsid;
        if ($goods->where($where)->count() == 0) {
            $return = array(
                'code' => '400',
                'msg' => '该商品不存在！'
            );
            $this->ajaxReturn($return);
            return;
        }
        $data['goodsStatus'] = '在售';
        $state = $goods->where($where)->save($data);
        if ($state) {
            $return = array(
                'code' => 200,
                'msg' => '上架成功！',
            );
        } else {
            $return = array(
                'code' => 400,
                'msg' => '你已操作过了！',
            );
        }
        $this->ajaxReturn($return);
    }

    /*
     * 删除商品
     */
    function delGoods()
    {
        header('Access-Control-Allow-Origin:*');
        $goods = D('Goods');
        $goodsImg = D('GoodsImg');
        $goodsid = I('goodsid');
        $where['goodsId'] = $goodsid;
        $where2['goodsid'] = $goodsid;
        if ($goods->where($where)->count() == 0) {
            $return = array(
                'code' => '400',
                'msg' => '该商品不存在！'
            );
            $this->ajaxReturn($return);
            return;
        }
        $img_url_info = $goodsImg->field('goodsimg')->where($where2)->select();
        $state = $goods->where($where)->delete();
        if ($state) {
            for ($i = 0; $i < count($img_url_info); $i++) {//2条记录
                $del_url = $img_url_info[$i]['goodsimg'];//查询url
                unlink('./' . $del_url);
            }
            $return = array(
                'code' => 200,
                'msg' => '删除成功！',
            );
        } else {
            $return = array(
                'code' => 400,
                'msg' => '你已操作过了！',
            );
        }
        $this->ajaxReturn($return);
    }

    /*
     * 查询下架商品
     */
    function getDisGoods()
    {
        header('Access-Control-Allow-Origin:*');
        $goods = D('Goods');
        $where['goodsStatus'] = array('in', '已下架,待上架');
        $goodsInfo = $goods->where($where)->order('goodsTime desc')->select();
        if ($goodsInfo) {
            $return = array(
                'code' => 200,
                'data' => $goodsInfo,
            );
        } else {
            $return = array(
                'code' => 400,
                'msg' => '没有数据！',
            );
        }
        $this->ajaxReturn($goodsInfo);
    }


}