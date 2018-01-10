<?php

namespace app\index\controller;

use think\Controller;

class Goods extends Controller{

	

	// 商品列表
	public function index()
	{
		// echo 1;
		return $this->fetch('product');
	}

	public function add()
	{
		// echo 1;
		return $this->fetch('addproduct');
	}
}