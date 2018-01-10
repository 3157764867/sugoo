<?php

namespace app\index\controller;

use think\Controller;

class Logistics extends Controller{

	// 列表
	public function index()
	{
		// echo 1;
		return $this->fetch('logistics');
	}

	public function add()
	{
		// echo 1;
		return $this->fetch('addlogistics');
	}

}