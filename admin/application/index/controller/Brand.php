<?php

namespace app\index\controller;

use think\Controller;

class Brand extends Controller{

	// 列表
	public function index()
	{
		// echo 1;
		return $this->fetch('brand');
	}

	public function add()
	{
		// echo 1;
		return $this->fetch('addbrand');
	}

}