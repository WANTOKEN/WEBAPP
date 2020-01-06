<?php
return array(
    //'配置项'=>'配置值'
    'URL_ROUTER_ON' => true,
    'DEFAULT_MODULE' => 'Home',
    'URL_ROUTE_RULES' => array(
        'Hello' => 'Home/Index/index',
        'TAPP' => 'Home/Index/index2',
        'checkupdate'=> 'Home/Index/checkupdate',
        //消息处理
        'getMsg' => 'Home/Message/getMessage',
        'GetBoxMsg' => 'Home/Message/getboxMsg',
        'DoSuperCommand' => 'Home/Message/superCommand',
        'DoUserCommand' => 'Home/Message/userCommand',
        'adminCommand' => 'Home/Message/adminCommand',
        'QueryNewOrder' => 'Home/Box/queryNewOrder',

        'Test1' => 'Home/Message/test1',
        'Test2' => 'Home/Message/test2',
        //柜子处理
        'searchEmptyBox' => 'Home/Box/searchEmptyBox',
        'searchAllBox' => 'Home/Box/searchAllBox',
        'RegBox' => 'Home/Box/regBox',

        //微信
        'WRegister' => 'Home/WXUser/wxRegister',
        'WSerachById' => 'Home/WXUser/wxSerachById',
        'PostToWx' => 'Home/WXUser/postToWx',
        'GetToWx' => 'Home/WXUser/getToWx',
        'RegUserIdByOId' => 'Home/WXUser/regUserIdByOId',
        'WGetgoodsdata' => 'Home/WXGoods/getgoodsdata',
        'WAddOrderItem' => 'Home/Orders/wxAddOrderItem',

        //app数据
        'AppIndex' => 'Home/Index/appindex',
        'AppIndexDetail' => 'Home/Index/appindexdetail',
        'AppIndexText' => 'Home/Index/appindextext',
        //app用户
        'Register' => 'Home/User/register',
        'GetCode' => 'Home/User/getcode',
        'Login' => 'Home/User/login',
        'AppPay' => 'Home/User/appPay',
        'GetAddress' => 'Home/User/getAddress',
        'AddAddress' => 'Home/User/addAddress',
        'SetAddress' => 'Home/User/setAddress',
        'RegAddress' => 'Home/User/regAddress',
        'DelAddress' => 'Home/User/delAddress',
        'GetAllAddress' => 'Home/User/getAllAddress',
        'UploadHead' => 'Home/User/uploadHead',
        'RegInfo' => 'Home/User/regInfo',
        'GetUserPoint' => 'Home/User/getUserPoint',
        'GetUserPointDetail' => 'Home/User/getUserPointDetail',
        'GetUserBlance' => 'Home/User/getUserBlance',
        'SetUserBlance' => 'Home/User/setUserBlance',
        'GetUserBlanceDetail' => 'Home/User/getUserBlanceDetail',
        //app商品
        'GetIndex' => 'Home/Goods/getindex',
        'Getgoodstype' => 'Home/Goods/getgoodstype',
        'Getgoodsdata' => 'Home/Goods/getgoodsdata',
        'GetRecomGoodsData' => 'Home/Goods/getrecomgoodsdata',
        'GetSearchKey' => 'Home/Goods/getsearchkey',
        'Searchgoodsdata' => 'Home/Goods/searchgoodsdata',
        'Getgoodsdetail' => 'Home/Goods/getgoodsdetail',
        //订单
        'AddOrderItem' => 'Home/Orders/addOrderItem',
        'GetMyOrders' => 'Home/Orders/getMyOrders',
        'GetOneOrder' => 'Home/Orders/getOneOrder',
        'SetOrderStatus' => 'Home/Orders/setOrderStatus',
        'GetFoods' => 'Home/Orders/getFoods',
        'SendFoods' => 'Home/Orders/sendFoods',
        'Response' => 'Home/Response/response',
        'GetFoodsCom' => 'Home/Orders/getFoodsCom',
        //运动
        'SubmitSport' => 'Home/Sport/submitSport',
        'GetSport' => 'Home/Sport/getSport',
        'GetUserSportAsc' => 'Home/Sport/getUserSportAsc',
        

        //分享
        'SendShare' => 'Home/Share/sendshare',
        'GetShare' => 'Home/Share/getshare',
        'GetMoreShare' => 'Home/Share/getmoreshare',
        'GetOneShare' => 'Home/Share/getoneshare',
        'SendComment' => 'Home/Share/sendcomment',
        'GetAllComment' => 'Home/Share/getallcomment',
        'SendReply' => 'Home/Share/sendreply',
        'SendLike' => 'Home/Share/sendlike',
        'DelOneShare' => 'Home/Share/delOneShare',
        //网站主页
        'ADIndexReport' => 'Home/AIndex/indexReport',
        'ADAppIndexImg' => 'Home/AIndex/appindeximg',
        'ADAddAppIndex' => 'Home/AIndex/addappindex',
        'ADAppIndexText' => 'Home/AIndex/appindextext',
        'ADAddIndexText' => 'Home/AIndex/addindextext',
        'ADAddIndexImg' => 'Home/AIndex/addindeximg',
        //网站商品
        'ADGetHotlist' => 'Home/AGoods/getHotlist',
        'ADGetTotal' => 'Home/AGoods/getTotal',
        'ADGetOnsaleGoodsdata' => 'Home/AGoods/getOnsaleGoodsdata',
        'ADAddGoodsData' => 'Home/AGoods/addGoodsData',
        'ADGetGoodsDetail' => 'Home/AGoods/getgoodsdetail',
        'ADUploadGoodsImg' => 'Home/AGoods/uploadGoodsImg',
        'ADDisGoods' => 'Home/AGoods/disGoods',
        'ADOnSaleGoods' => 'Home/AGoods/onSaleGoods',
        'ADDelGoods' => 'Home/AGoods/delGoods',
        'ADGetDisGoods' => 'Home/AGoods/getDisGoods',
        'ADRegGoodsData' => 'Home/AGoods/regGoodsData',
        'ADRegGoodsImg' => 'Home/AGoods/regGoodsImg',
        //网站订单
        'ADGetOrdersData' => 'Home/AOrders/getOrdersData',
        'ADGetOneOrderDetail' => 'Home/AOrders/getOneOrderDetail',
        'ADChangeOrders' => 'Home/AOrders/changeOrders',
        'ADGetFailOrdersData' => 'Home/AOrders/getFailOrdersData',
        'ADHandleOrders' => 'Home/AOrders/handleOrders',
        'ADGetOrdersInfo' => 'Home/AOrders/getOrdersInfo',
        //网站用户
        'ADGetUsersData' => 'Home/AUser/getUsersData',
        'ADGetUsersDetail' => 'Home/AUser/getUsersDetail',
        'ADGetUsersInfo' => 'Home/AUser/getInfo',
        'ADGetUserBalanceInfo' => 'Home/AUser/getUserBalanceInfo',
        'ADGetUserBalanceDetail' => 'Home/AUser/getUserBalanceDetail',
        //网站反馈
        'ADGetResponseData' => 'Home/AResponse/getResponseData',
        'ADGetResponseDetail' => 'Home/AResponse/getResponseDetail',
        'ADDealResponse' => 'Home/AResponse/dealResponse',
        'ADGetResponseInfo' => 'Home/AResponse/getResponseInfo',
        'ADDelResponse' => 'Home/AResponse/delResponse',

    ),


);
