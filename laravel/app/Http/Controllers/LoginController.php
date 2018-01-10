<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use \App\Login;
use Request,Redirect,Session;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
	//登录
    public function index()
    {
    	return view('login.login');
    }

    //用户登录验证
    public function loginDo(){
        $input=Request::all();
        $login = new Login;
        $res = $login->loginCheck($input);
        if($res['error'] == '200'){
            return Redirect::to('index');
        }else{
            return Redirect::to('login');
        }
    }


    //注册
    public function regis()
    {
    	return view('login.regist');
    }

    //添加用户信息验证
    public function addUser(){
        $input=Request::all();
        $login = new Login;
        $back = $login->checkUserMsg($input);
        // if($back['error'] == '200')
        // {
        //     $uid = session('uid');
        //     $userCopon = new userCopon;
        //     $userCopon->give($uid);
        // }
        return json_encode($back);
    }

    //手机验证码
    public function flash(){
        $phone=Request::get('phone');
        $login = new Login;
        return json_encode($login->sendFlash($phone));
    }


    //第三方登陆 qq
    public function qqLogin()
    {
        $code_url="https://graph.qq.com/oauth2.0/authorize";
        $params=[
             'response_type'=>'code',
             'client_id'=>'101401704',
             'redirect_uri'=>'http://www.sugo.com/laravel/public/getCode',
             'state'=>uniqid(),
             'scope'=>'get_user_info',
        ];
        $Code=$code_url.'?'.http_build_query($params);
        header("location:$Code");
    }

    //获取code
    public function getCode(){
        $code = Request::get('code');
        $access_url="https://graph.qq.com/oauth2.0/token";
        //拼凑参数
        $params=[
            'grant_type'=>'authorization_code',
            'client_id'=>'101401704',
            'client_secret'=>'3753b4e3e53bc32a54a7255ca435880f',
            'code'=>$code,
            'redirect_uri'=>'http://www.sugo.com/laravel/public/getCode',
        ];
        $str=http_build_query($params);
        $access_url.="?".$str;
        $access = file_get_contents($access_url);
        $res=explode('&',$access)[0];
        //获取access_token
        $access_token=explode('=',$res)[1];
        if($access_token){
            $open_url="https://graph.qq.com/oauth2.0/me?access_token=".$access_token;
            $openId = file_get_contents($open_url);
            // dd($userInfo);
            $preg='#callback\((.*)\)#isU';
            preg_match($preg,$openId,$arr);
            $openId=json_decode($arr[1],true)['openid'];
            $login = new Login;
            $res = json_decode($login->checkOpenid($openId),true);
            // dd($res);
            if($res['error'] == 200)
            {
                session(['uid'=>$res['result']['u_id'],'username'=>$res['result']['username']]);
                return Redirect::to('index');
            }
            else
            {
                $userUrl ="https://graph.qq.com/user/get_user_info?access_token=".$access_token."&oauth_consumer_key=101401704&openid=".$openId;
                $userinfo=json_decode(file_get_contents($userUrl),true);
                // dd($userinfo);
                session(['third_name'=>$userinfo['nickname'],'openid'=>$openId]);
                return Redirect::to('appendInfo');
            }
        }else{
            return Redirect::to('login');
        }

    }


    //追加用户信息
    public function appendInfo(){
        $third_name =session('third_name');
        return view('login.appendUser')->with('username',$third_name);
    }


    public function appendUser(){
        $data=Request::all();
        $login = new Login;
        return json_encode($login->append($data));
    }


}
