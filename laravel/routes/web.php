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
Route::get('/','IndexController@index');
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
Route::get('/goods/{id}','GoodsController@product');
//商品sku展示
Route::any('/attrvalue','GoodsController@getAttrval');

//商城特卖
Route::get('/sell','GoodsController@sell');
//特卖商品详情
Route::get('/sellde','GoodsController@sellde');

//商品分类
Route::get('/cate','CateController@index');
//商品分类展示
Route::get('/catelist/{id}','CateController@cateList');
//全部分类产品展示
Route::get('/getcateall/{id}','CateController@getCateAll');

//商品品牌
Route::get('/brand','BrandController@index');
//商品品牌展示
Route::get('/brandlist','BrandController@brandList');

//购物车
Route::get('/car','CarController@index');
//确认订单
Route::get('/car_two','CarController@car2');
//结算页面
Route::get('/car_three','CarController@car3');

Route::get('/AddShopCart',"CarController@AddShopCart");
