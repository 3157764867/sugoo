<?php

namespace app\index\controller;

use think\Controller;

class System extends Controller{

	// 修改密码
	public function index()
	{
		// echo 1;
		return $this->fetch('system');
	}
}