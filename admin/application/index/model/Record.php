<?php
namespace app\index\model;

use think\Model;
use think\DB;

/**
* 
*/
class Record extends Model
{
	//获取交易记录信息
	public function getinfo($start,$limit,$where)
	{
		return $res=DB::table('su_pay_record')->where($where)->limit($start,$limit)->select();
	}
	//获取总记录数
	Public function gettotal($where)
	{
		return $total=DB::table('su_pay_record')->where($where)->count();
	}
	//删除
	public function del($id)
	{
		return $res=DB::table('su_pay_record')->where('pr_id',$id)->delete();
	}
}