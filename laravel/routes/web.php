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

// Route::get('/', function () {
//     return view('index.index');
// });

//商城首页
Route::get('/','IndexController@index');
Route::get('/index','IndexController@index');
//登录
Route::get('/login','LoginController@index');
//注册
Route::get('/regis','LoginController@regis');

//个人中心主页
Route::get('user','UserController@index');

/*订单中心*/

//我的订单
Route::get('order','UserController@order');
//收货地址
Route::get('address','UserController@address');

/*会员中心*/

//用户信息
Route::get('userinfo','UserController@userinfo');
//我的收藏
Route::get('usercollect','UserController@usercollect');
//我的留言
Route::get('usermsg','UserController@usermsg');
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
Route::get('goods','GoodsController@product');

Route::get('/cate','GoodsController@cate');
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

//支付宝支付
Route::get('/pay','PayController@index'); // 发起支付请求
Route::any('/notify','PayController@AliPayNotify'); //服务器异步通知页面路径
Route::any('/return','PayController@AliPayReturn');  //页面跳转同步通知页面路径

Route::get('alipayfail','PayController@fail');

//余额支付
Route::get('yue','PayController@yue');

//微信
Route::get('wei_pay','PayController@wei_pay');

/*wechat*/

Route::get('Search','PayController@Search');
//配置
Route::get('InitLog','PayController@InitLog');
//
Route::get('PaySuccess','PayController@PaySuccess');



//充值
Route::get('/get_record','PayController@get_record'); // 发起支付请求

Route::get('/gettotal','PayController@gettotal'); 

Route::get('/curlGet','PayController@curlGet'); 