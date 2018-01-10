<?php

namespace app\index\controller;

use think\Controller;

class Vip extends Controller{

	// 会员
	public function index()
	{
		return $this->fetch('vip');
	}

	// 列表
	public function log()
	{
		return $this->fetch('viplist');
	}

	// 添加
	public function add()
	{
		return $this->fetch('addvip');
	}
}