<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
	//个人中心首页
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

    //用户详情展示
    public function userinfo()
    {
    	return view('user/Member_User');
    }
    //我的收藏
    public function usercollect()
    {
    	return view('user/Member_Collect');
    }
<<<<<<< HEAD

    //我的留言
=======
    //用户信息
>>>>>>> 36c55a3717d59fa34a4929e9da0bf04502e94f92
    public function usermsg()
    {
        return view('user/Member_Msg');
    }
<<<<<<< HEAD

    //我的邀请链接
=======
    //我的收藏
>>>>>>> 36c55a3717d59fa34a4929e9da0bf04502e94f92
    public function userlink()
    {
        return view('user/Member_Links');
    }

     //账户安全
    public function safe()
    {
<<<<<<< HEAD
            $Users = new Users;
            $userinfo = $Users->getUserInfo();
            return view('user/Member_Safe')->with([
                    'phone'=>$userinfo->phone,
                    'email'=>$userinfo->email,
                    'id_card'=>$userinfo->id_card,
                    'pay_pwd'=>$userinfo->pay_pwd,
            ]);
    }

    //修改手机号
    public function updatePhone()
    {
        $data=Request::all();
        $Users = new Users;
        return json_encode($Users->upPhone($data));
    }

    //修改邮箱
    public function updateEmail(){
         $email=Request::get('email');
         $Users = new Users;
         return json_encode($Users->upEmail($email));
    }

    //修改或添加身份信息
    public function updateCard(){
         $data=Request::all();
         $Users = new Users;
         return json_encode($Users->upCard($data));
    }

    //修改或添加身份信息
    public function updatePassword(){
         $data=Request::all();
         $Users = new Users;
         return json_encode($Users->upPassword($data));
         // return json_encode($data['onePassword']);
=======
        return view('user/Member_Safe');
>>>>>>> 36c55a3717d59fa34a4929e9da0bf04502e94f92
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
