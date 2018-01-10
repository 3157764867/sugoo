<?php
namespace app\index\controller;

use think\Controller;

class Trading extends Controller{

	// 交易记录
	public function index()
	{
		// echo 1;
		return $this->fetch('trading');
	}

	// 列表
	public function add()
	{
		// echo 1;
		return $this->fetch('addtrading');
	}
}