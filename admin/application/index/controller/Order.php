<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
class Order extends Controller{

	public function index()
	{
        $orders = Db::table('su_order')->select();
//        print_r($orders);die;
		return $this->fetch('order',['orders'=>$orders]);
	}

	public function add()
	{
		// echo 1;
		return $this->fetch('addorder');
	}
}