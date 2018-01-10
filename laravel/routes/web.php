<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index.index');
});

//商城首页
Route::get('/index','IndexController@index');

//登录
Route::get('/login','LoginController@index');
//注册
Route::get('/regis','LoginController@regis');

//个人中心主页
Route::get('/user','UserController@index');

/*订单中心*/

//我的订单
Route::get('/order','UserController@order');
//收货地址
Route::get('/address','UserController@address');

/*会员中心*/

//用户信息
Route::get('/userinfo','UserController@userinfo');
//我的收藏
Route::get('/usercollect','UserController@usercollect');
//我的留言
Route::get('/usermsg','UserController@usermsg');
//推广链接
Route::get('/userlink','UserController@userlink');

/*账户中心*/

//账户安全
Route::get('/safe','UserController@safe');
//我的红包
Route::get('/packet','UserController@packet');
//资金管理
Route::get('/money','UserController@money');
//充值
Route::get('/chongzhi','UserController@chongzhi');
//提现
Route::get('/cash','UserController@cash');



//商品详情
Route::get('/goods','GoodsController@product');


//商城特卖
Route::get('/sell','GoodsController@sell');
//特卖商品详情
Route::get('/sellde','GoodsController@sellde');

//购物车
Route::get('/car','CarController@index');
//确认订单
Route::get('/car_two','CarController@car2');
//结算页面
Route::get('/car_three','CarController@car3');

// 用户注册赠送红包
Route::any('/cupon','userCupon@give');
// 获取用户对应的红包数据
Route::any('/cuget','userCupon@getinfo');
// 获取当前用户下的红包总个数与总金额
Route::any('/cunum','userCupon@getnum');
// 用户使用户红包
Route::any('/cuuse','userCupon@usecupon');
// 根据订单金额返回红包id和红包名称
Route::any('/cuname','userCupon@cuname');