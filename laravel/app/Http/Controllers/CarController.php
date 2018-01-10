<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    //购物车
    public function index()
    {
    	return view('car/BuyCar');
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
}
