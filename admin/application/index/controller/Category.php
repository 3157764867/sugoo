<?php

namespace app\index\controller;

use think\Controller;

class Category extends Controller{
	// 分类
	public function index()
	{
		// echo 1;
		return $this->fetch('product_category');
	}

	// 列表
	public function add()
	{
		// echo 1;
		return $this->fetch('add_product_category');
	}
}