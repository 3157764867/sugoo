<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Validator,Cookie,Session;
class Login extends Model
{
	//验证用户注册信息
	public function checkUserMsg($userMsg)
	{
		if($userMsg['code'] == session('code'))
		{
			$res = Validator::make($userMsg,[
			'username'=>'required|between:2,6|unique:su_user',
			'password'=>'required|between:5,20|alpha_dash',
			'phone'   =>'required|numeric|digits:11' ,
			'email'	  =>'required',
			]);
			if($res->fails())
			{
				$info=['error'=>'101','reason'=>"已存在该用户！"];
			}
			else
			{
				unset($userMsg['code']);
				$userMsg['regis_time'] = date("Y-m-d H:i:s");
				$re =DB::table('su_user')->insert($userMsg);
					if($re)
					{
						$info=['error'=>'200','reason'=>'用户注册成功'];
					}
					else
					{
						$info=['error'=>'102','reason'=>'信息入库失败'];
					}
			}
		}
		else
		{
			$info=['error'=>'103','reason'=>'验证码输入错误'];
		}

		return $info;
	}


	//登录验证
	public function loginCheck($data)
	{
		$user = DB::table('su_user')->where('username',$data['username'])->where('password',$data['password'])->first();
		if($user){
			$data = ['login_time'=>date("Y-m-d H:i:s")];
			$username =$user->username;
			$u_id=$user->u_id;
			DB::table('su_user')->where('u_id', $u_id)->update($data);
			session(['uid'=>$u_id,'username'=>$username]);
			$info=['error'=>'200','result'=>'登陆成功'];
		}else{
			$info=['error'=>'104','result'=>'用户名或密码错误'];
		}
		return $info;
	}




	//发送短信
	public function sendFlash($phone)
	{
		$key='Gv5b6Q75b46a11c6deb2fea2fa40671b59a1becd4d21285';
    	$word=rand(1000,9999);
    	session(['code'=>$word]);
    	$words=json_encode([$word]);
    	$data=array(
    		'productKey'=>$key,
    		'phoneNum'=>$phone,
    		'templateID'=>'10160',
    		'params'=>$words,
    	);
    	$url='http://apis.eolinker.com/communication/sms/send';
    	$res=$this->getpost($url,$data);
    	if($res){
			$back = ['error'=>200,'reason'=>"验证码发送成功"];
		}else{
			$back = ['error'=>250,'reason'=>"重新获取验证码"];
		}
		return $back;
	}

	//post 请求
    public function getpost($url,$data)
    {
    	$ch=curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		$a=curl_exec($ch);
		curl_close($ch);
		return $a;
    }


    //查看openid是否存在
    public function checkOpenid($openid){
    	$res = DB::table('su_user')->where('u_openid',$openid)->first();
    	if($res)
    	{
    		$back = ['error'=>200,'reason'=>"用户已注册",'result'=>$res];
    	}
    	else
    	{
    		$back = ['error'=>201,'reason'=>"填写详细数据"];
    	}
    	return json_encode($back);
    }


    //追加第三方登录信息
    public function append($data)
    {
    	$user = DB::table('su_user')->where('username',$data['username'])->first();
    	if($user)
    	{
    		$info=['error'=>'301','reason'=>"用户名已存在！"];
    	}
    	else
    	{
    		$openid = session('openid');
    		$addinfo=[
    			'username'=>$data['username'],
    			'password'=>$data['password'],
    			'login_time'=>date("Y-m-d H:i:s"),
    			'regis_time'=>date("Y-m-d H:i:s"),
    			'u_openid'=>$openid,
    			'phone'=>$data['phone'],
    		];
    		$res = DB::table('su_user')->insertGetId($addinfo);
    		if($res)
    		{

    			session(['uid'=>$res,'username'=>$data['username']]);
    			$info=['error'=>'200','reason'=>"填写成功"];	
    		}
    		else
    		{
    			$info=['error'=>'303','reason'=>"入库失败"];
    		}
    	}

    	return $info;
    }


}