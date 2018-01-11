<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	//个人中心
    public function index()
    {
    	return view('user/Member');
    }
    //我的订单
    public function order()
    {
    	return view('user/Member_Order');
    }
    //收获地址
    public function address()
    {
    	return view('user/Member_Address');
    }
    //用户信息
    public function userinfo()
    {
    	return view('user/Member_User');
    }
    //我的收藏
    public function usercollect()
    {
    	return view('user/Member_Collect');
    }
    //w我的留言
    public function usermsg()
    {
        return view('user/Member_Msg');
    }
    //我的收藏
    public function userlink()
    {
        return view('user/Member_Links');
    }
     //账户安全
    public function safe()
    {
        return view('user/Member_Safe');
    }
    //我的红包
    public function packet()
    {
        return view('user/Member_Packet');
    }
    //资金管理
    public function money()
    {
        return view('user/Member_Money');
    }
    //充值
    Public function chongzhi()
    {
        return view('user/Member_Money_Charge');
    }
    //提现申请
     Public function cash()
    {
        return view('user/Member_Cash');
    }
    Public function pay()
    {
        return view('user/Member_Money_Pay');
    }
}
