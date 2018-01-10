<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Request,Redirect,Session;
use Illuminate\Support\Facades\Cookie;
use \App\Users;

class UserController extends Controller
{
	//个人中心首页
    public function index()
    {
        if(!empty(session('uid')))
        {
            $user=$this->userMsgInfo();
    	    return view('user/Member')->with('user',$user);
        }
        else
        {
            return Redirect::to('login');
        }
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
        $user=$this->userMsgInfo();
    	return view('user/Member_User')->with('user',$user);
    }

    //获取所有用户相关信息
    public function userMsgInfo(){
        $Users = new Users;
        $userinfo = $Users->getUserMsg(); 
        return json_decode($userinfo,true);
    }



    //我的收藏
    public function usercollect()
    {
    	return view('user/Member_Collect');
    }

    //我的留言
    public function usermsg()
    {
        return view('user/Member_Msg');
    }

    //我的邀请链接
    public function userlink()
    {
        return view('user/Member_Links');
    }

     //账户安全
    public function safe()
    {
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
    }

    //修改支付密码
    public function updatePay(){
        $data=Request::all();
        $Users = new Users;
        return json_encode($Users->upPay($data));
    }

    //添加支付密码
    public function addPay(){
        $pay_pwd=Request::get('addPay1');
        $Users = new Users;
        return json_encode($Users->addPayPwd($pay_pwd));
    }


    //账户安全







    //我的红包
    public function packet()
    {
        // $data=$this->hongbao();
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
    
    //支付信息
    Public function pay()
    {
        return view('user/Member_Money_Pay');
    }

}
