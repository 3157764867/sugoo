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
Route::get('/car_two','OrderController@car2');
//结算页面
Route::get('/car_three','OrderController@car3');




Route::get('/confirmorder','OrderController@confirmorder'); //确认添加订单

Route::get('/myorder','OrderController@getMeOrder'); //获取我的所有订单

Route::get('/pay_pwd','OrderController@pwdTf'); //确认支付密码是否正确

Route::get('/status_num','OrderController@getStatusNum');

Route::get('/gettypeorder','OrderController@getGivenOrder');