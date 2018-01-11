<?php
namespace app\index\model;

use think\Model;
use think\DB;

/**
* 
*/
class Pay extends Model
{
	
	public function pay_add($data)
	{
		return $res=DB::table('su_pay')->insert($data);
	}
	//获取支付方式信息
	public function getpay_info()
	{
		return $data=DB::table('su_pay')->select();
	}
	Public function up($id,$status)
	{
		if($status==1)
		{
			$stat=0;
		}
		else
		{
			$stat=1;
		}
		$result=DB::table('su_pay')->where('id',$id)->update(['status'=>$stat]);
		return $result;
	}
	public function getnum()
	{
		return $num=DB::table('su_pay')->count();
	}
	public function checkname($pay_name)
	{
		$res=DB::table('su_pay')->where('pay_name',$pay_name)->find();
		if($res)
		{
			$back=array('code'=>1004,'message'=>'该支付方式已经存在');
		}
		else
		{
			$back=array('code'=>1005,'message'=>'可以添加');
		}
		return json_encode($back);
	}
	public function getaccount($start,$pagenum,$where)
	{
		return $res=DB::table('su_platfrom')->where($where)->limit($start,$pagenum)->select();
	}
	public function gettotal()
	{
		return $num=Db::table('su_platfrom')->count();
	}
	
}