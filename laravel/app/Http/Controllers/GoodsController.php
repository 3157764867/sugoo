<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoodsController extends Controller
{
    //商品详情
    public function product()
    {
    	return view('goods/Product');
    }
    //商城特卖
    public function sell()
    {
    	return view('goods/Sell');
    }
    //特卖商品详情
    public function sellde()
    {
    	return view('goods/SellDetails');
    }
}
