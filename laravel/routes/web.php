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
Route::any('/loginDo','LoginController@loginDo');

//注册
Route::get('/regis','LoginController@regis');
Route::any('/flash','LoginController@flash');
Route::any('/addUser','LoginController@addUser');
Route::any('/qqLogin','LoginController@qqLogin');
Route::any('/getCode','LoginController@getCode');
Route::any('/appendInfo','LoginController@appendInfo');
Route::any('/appendUser','LoginController@appendUser');


//个人中心主页
Route::get('/user','UserController@index');

//安全设置

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
//安全管理

//修改手机号
Route::any('/updatePhone','UserController@updatePhone');
//修改邮箱
Route::any('/updateEmail','UserController@updateEmail');
//添加 修改 身份信息
Route::any('/updateCard','UserController@updateCard');
//修改密码
Route::any('/updatePassword','UserController@updatePassword');
//修改支付密码
Route::any('/updatePay','UserController@updatePay');
//添加支付密码
Route::any('/addPay','UserController@addPay');

//安全管理





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