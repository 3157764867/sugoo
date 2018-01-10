<?php

namespace app\index\controller;

use think\Controller;

class Money extends Controller{

	public function index()
	{
		return $this->fetch('money');
	}

	public function add()
	{
		// echo 1;
		return $this->fetch('addmoney');
	}
}