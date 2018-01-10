<?php

namespace app\index\controller;

use think\Controller;

class Order extends Controller{

	public function index()
	{
		return $this->fetch('order');
	}

	public function add()
	{
		// echo 1;
		return $this->fetch('addorder');
	}
}