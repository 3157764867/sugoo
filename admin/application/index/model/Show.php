<?php
namespace app\index\model;

use think\Model;
use think\DB;

/**
* 
*/
class Show extends Model
{
	public function getinfo($start,$pagenum)
	{
		return $res=DB::table('su_hdp')->limit($start,$pagenum)->select();
	}
	//添加
	public function add_image($data)
	{
		return $res=DB::table('su_hdp')->insert($data);
	}
	//获取一条信息
	public function getone($id)
	{
		return $res=DB::table('su_hdp')->where('id',$id)->find();
	}
	//修改
	Public function do_up($data)
	{
		if($data['img']=='')
		{
			$arr=array('show_name'=>$data['show_name'],'show_link'=>$data['show_link']);
		}
		else
		{
			$arr=array('show_name'=>$data['show_name'],'show_link'=>$data['show_link'],'img'=>$data['img']);
		}
		$res=DB::table('su_hdp')->where('id',$data['id'])->update($arr);
		return $res;
	}
	//删除
	public function del($id)
	{
		return $res=DB::table('su_hdp')->where('id',$id)->delete();
	}
	//总记录数
	public function gettotal($where)
	{
		return $total=DB::table('su_hdp')->where($where)->count();
	}
}