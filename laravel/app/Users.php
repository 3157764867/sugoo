<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Validator,Cookie,Session;

class Users extends Model
{
    //查询用户信息
    public function getUserInfo()
    {
    	$uid = session('uid');
    	$user = DB::table('su_user')->where('u_id',$uid)->first();
    	return $user;
    }


   //获取用户详细信息
   public function getUserMsg(){
      $uid = session('uid');
      $user = DB::table('su_user')->where('u_id',$uid)->first();
      return json_encode($user);
   }


    //修改手机号
   public function upPhone($data)
   {
   		$oldPhone = $data['oldPhone'];
   		$newPhone = $data['newPhone'];
   		$uid = session('uid');
   		$user = DB::table('su_user')->where('phone',$oldPhone)->where('u_id',$uid)->first();
   		if($user){
   			$up=['phone'=>$data['newPhone']];
   			$str = DB::table('su_user')->where('u_id', $uid)->update($up);
   			if($str)
   			{
   				$info =['error'=>200,'reason'=>"修改成功"];
   			}
   			else
   			{
   				$info =['error'=>106,'reason'=>"修改失败"];
   			}
   		}else{
   			$info =['error'=>105,'reason'=>"原手机号不对"];
   		}
   		return $info;
   }


   //修改邮箱
   public function upEmail($email){
   		$uid = session('uid');
   		$data = ['email'=>$email];
   		$user = DB::table('su_user')->where('email',$email)->where('u_id',$uid)->first();
   		if(!$user)
   		{
   			$str = DB::table('su_user')->where('u_id', $uid)->update($data);
	   		if($str){
	   			$info =['error'=>200,'reason'=>"修改成功"];
	   		}else{
	   			$info =['error'=>107,'reason'=>"修改失败"];
	   		}
   		}
   		else
   		{
   				$info =['error'=>108,'reason'=>"邮箱地址重复！"];
   		}
   		return $info;
   }


   //修改或添加身份信息
   public function upCard($data){
   		$uid = session('uid');
   		$up=['id_card'=>$data['card_id'],'u_realname'=>$data['reaname']];
   		$str = DB::table('su_user')->where('u_id', $uid)->update($up);
   		if($str)
   		{
   			$info =['error'=>200,'reason'=>"操作成功"];
   		}
   		else
   		{
   			$info =['error'=>109,'reason'=>"操作失败！"];
   		}
   		return $info;
   }

   //修改或添加身份信息
   public function upPassword($data){
   		$uid = session('uid');
   		$user = DB::table('su_user')->where('password',$data['oldPassword'])->where('u_id',$uid)->first();
   		if($user)
   		{
   			$up=['password'=>$data['onePassword']];
   			$str = DB::table('su_user')->where('u_id', $uid)->update($up);
	   		if($str){
	   			$info =['error'=>200,'reason'=>"修改成功"];
	   		}else{
	   			$info =['error'=>110,'reason'=>"修改失败"];
	   		}
   		}
   		else
   		{
   				$info =['error'=>111,'reason'=>"原密码不正确"];
   		}
   		return $info;
   }

   //修改或添加身份信息
   public function upPay($data){
   		$uid = session('uid');
   		$user = DB::table('su_user')->where('pay_pwd',$data['oldPay'])->where('u_id',$uid)->first();
   		if($user)
   		{
   			$up=['pay_pwd'=>$data['newPay1']];
   			$str = DB::table('su_user')->where('u_id', $uid)->update($up);
	   		if($str){
	   			$info =['error'=>200,'reason'=>"修改成功"];
	   		}else{
	   			$info =['error'=>112,'reason'=>"修改失败"];
	   		}
   		}
   		else
   		{
   				$info =['error'=>113,'reason'=>"原支付密码不正确"];
   		}
   		return $info;
   }


   //添加支付密码
   public function addPayPwd($pay_pwd){
   		$uid = session('uid');
   		$up=['pay_pwd'=>$pay_pwd];
   		$str = DB::table('su_user')->where('u_id', $uid)->update($up);
   		if($str){
	   		$info =['error'=>200,'reason'=>"添加成功"];

   		}else{
   			$info =['error'=>114,'reason'=>"添加失败"];
   		}
   		return $info;
   }
   
}
