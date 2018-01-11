<?php

namespace app\index\controller;

use think\Controller;

class Pay extends Controller{

	public function index()
	{
		return $this->fetch('pay');
	}

	public function add()
	{
		// echo 1;
		return $this->fetch('addpay');
	}
}