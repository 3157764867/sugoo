<?php
namespace app\index\controller;

use think\Controller;

class Login extends Controller
{
	// 登录展示
    public function index()
    {	
    	return $this->fetch('login');
    }

    //退出
    public function logout()
    {
    	return $this->fetch('log');
    }
}
