<?php
return array(
    //'配置项'=>'配置值'
    'URL_ROUTER_ON'         =>  true,
    'DEFAULT_MODULE'        =>  'Home',
    'URL_ROUTE_RULES'       =>  array(
        'Hello'=>'Home/Index/index',
        'Register'    => 'Home/User/register',
        'GetCode'       => 'Home/User/getcode',
        'Login'           =>  'Home/User/login',
        'AppPay'    => 'Home/User/appPay',
        'GetAddress'    => 'Home/User/getAddress',
        'AddAddress'    => 'Home/User/addAddress',
        'SetAddress'    => 'Home/User/setAddress',
        'RegAddress'    => 'Home/User/regAddress',
        'DelAddress'    => 'Home/User/delAddress',

        'GetAllAddress'    => 'Home/User/getAllAddress',
        'UploadHead'           =>  'Home/User/uploadHead',
        'RegInfo' =>     'Home/User/regInfo',
        'GetUserPoint' =>     'Home/User/getUserPoint',
        'GetUserPointDetail' =>     'Home/User/getUserPointDetail',

        'GetUserBlance' =>     'Home/User/getUserBlance',
        'SetUserBlance' =>     'Home/User/setUserBlance',
        'GetUserBlanceDetail' =>     'Home/User/getUserBlanceDetail',
        'GetIndex'      => 'Home/Goods/getindex',
        'Getgoodstype'           =>  'Home/Goods/getgoodstype',
        'Getgoodsdata'           =>  'Home/Goods/getgoodsdata',
        'Searchgoodsdata'  =>  'Home/Goods/searchgoodsdata',
        'Getgoodsdetail'           =>  'Home/Goods/getgoodsdetail',
        'AddOrderItem'   =>         'Home/Orders/addOrderItem',
        'GetMyOrders'  =>         'Home/Orders/getMyOrders',
        'GetOneOrder'  =>         'Home/Orders/getOneOrder',
        'SetOrderStatus'  =>         'Home/Orders/setOrderStatus',
        'SubmitSport'  =>         'Home/Sport/submitSport',
        'GetSport'  =>         'Home/Sport/getSport',
        'GetFoods'  =>         'Home/Orders/getFoods',
        'SendFoods'  =>         'Home/Orders/sendFoods',
        'Response'  =>         'Home/Response/response',
        'GetFoodsCom'  =>         'Home/Orders/getFoodsCom',
        'hello2'  =>         'Home/Index/hello',
        'hello3'  =>         'Home/Orders/getFoods'





    ),


);
