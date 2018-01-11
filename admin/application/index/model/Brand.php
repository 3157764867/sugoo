<?php
namespace app\index\model;

use think\Model;
use think\Db;

class Brand extends Model
{
	public function addBrand($data)
	{
		return $arr = Db::table('su_brand')->insert($data);
	}
	public function brandList()
	{
		return $arr = Db::table('su_brand')->select();
	}
	public function del($id)
	{
		return $arr = Db::table('su_brand')->where('b_id',$id)->delete();
	}
	public function brandFind($id)
	{
		return $arr = Db::table('su_brand')->where('b_id',$id)->find();
	}
	public function brandUpdate($data,$id)
	{
		return $arr = Db::table('su_brand')->where('b_id',$id)->update($data);
	}
}
?>