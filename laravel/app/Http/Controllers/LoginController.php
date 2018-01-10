<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
	//登录
    public function index()
    {
    	return view('login.login');
    }
    //注册
    public function regis()
    {
    	return view('login.regist');
    }
}
