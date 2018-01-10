<?php

namespace app\index\controller;

use think\Controller;

class Attr extends Controller{

	// 列表
	public function index()
	{
		// echo 1;
		return $this->fetch('attr');
	}

	public function add()
	{
		// echo 1;
		return $this->fetch('addattr');
	}

}