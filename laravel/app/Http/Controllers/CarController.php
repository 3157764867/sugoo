<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends BaseController
{
    //购物车
    public function index()
    {
        $data = BaseController::index();
        $err = BaseController::cate();
        if(!empty($_COOKIE['cartdata'])) {
            $cartdata = $_COOKIE['cartdata'];
            $cartdata = json_decode($cartdata,true);
            echo "<pre>";
            print_r($cartdata);
    	    return view('car/BuyCar',['data'=>$data,'err'=>$err]);
        }else {
            return view('car/BuyCarKong',['data'=>$data,'err'=>$err]);
        }
    }
    //确认订单
    public function car2()
    {
    	return view('car/BuyCar_Two');
    }
    //结算
    public function car3()
    {
    	return view('car/BuyCar_Three');
    }
    
    public static function AddShopCart(Request $request) {
        $goodsdata = $request->all();
        //判断 未登录时
        $sku_id = $goodsdata['sku_id'];
        $number = $goodsdata['number'];
        $goodsinfo = DB::table("su_sku")->where("sku_id",$sku_id)->get();
        $goodsinfo = json_encode($goodsinfo);
        $goodsinfo = json_decode($goodsinfo,true);
        $g_id = $goodsinfo[0]['g_id'];
        $goodsdetails = DB::table("su_goods")->where("g_id",$g_id)->get();
        $goodsdetails = json_encode($goodsdetails);
        $goodsdetails = json_decode($goodsdetails,true);
        //获取有用信息,组装购物车
        $cartdata['pic'] = "";
        $cartdata['goods_name'] = $goodsdetails[0]['goods_name'];
        $cartdata['sku'] = $goodsinfo[0]['sku'];
        $cartdata['number'] = $number;
        //先查看购物车是否有数据
        if(empty($_COOKIE['cartdata'])) {
            $cartdata = json_encode($cartdata);
            setcookie('cartdata',$cartdata);  
        }else {
            //不为空
            $cart = $_COOKIE['cartdata'];
            $cart = json_decode($cart,true);
            $newarray[] =$cart;
            $newarray[] = $cartdata; 
            $newarray = json_encode($newarray);
            setcookie("cartdata",$newarray);
        }
    }
}
