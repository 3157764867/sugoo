<?php

namespace app\index\controller;

use think\Controller;

class Marketing extends Controller{

	// 列表
	public function index()
	{
		// echo 1;
		return $this->fetch('marketing');
	}

	public function add()
	{
		// echo 1;
		return $this->fetch('addmarketing');
	}

}