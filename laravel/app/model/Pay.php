<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\DB; 


class Pay extends Model
{
    //获取用户信息
    public function getpwd($uid)
    {
    	return DB::table('su_user')->where('u_id',$uid)->first(); 
    }
    //添加交易记录
    public function add_pay($arr)
    {
    	return $res=DB::table('su_pay_record')->insert($arr);
    }
    //修改订单状态
    public function up_stat($uid,$out_tradeNo)
    {
    	return $res=DB::table('su_order')->where('u_id',$uid)->where('ord_sn',$out_tradeNo)->update(['pay_status'=>1]);
    }
    //修改用户余额
    public function up_u_money($uid,$uu_money)
    {
    	return $res=DB::table('su_user')->where('u_id',$uid)->update(['u_money'=>$uu_money]);
    }
    //获取交易记录
    public function get_record($uid)
    {
        $data=DB::table('su_pay_record')->where('u_id',$uid)->get()->map(function($value){ return (array)$value; })->toArray();
        if($data)
        {
            $back=array('code'=>1013,'message'=>'请求成功','data'=>$data);
        }
        else
        {
            $back=array('code'=>1014,'message'=>'暂时没有任何交易记录');
        }
        return json_encode($back);
    }
    public function account($arr)
    {
        return $res=DB::table('su_platfrom')->insert($arr);
    }
}
