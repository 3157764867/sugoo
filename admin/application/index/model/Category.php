<?php
namespace app\index\model;

use think\Model;
use think\Db;

class Category extends Model
{
	public function addCate($data)
	{
		return $arr = Db::table('su_cate')->insert($data);
	}
	public function cateList()
	{
		return $arr = Db::table('su_cate')->select();
	}
	public function cateDel($id)
	{
		return $arr = Db::table('su_cate')->where('c_id',$id)->delete();
	}
	public function cateFind($id)
	{
		return $arr = Db::table('su_cate')->where('c_id',$id)->find();
	} 
	public function cateUpdate($id,$data)
	{
		return $arr = Db::table('su_cate')->where('c_id',$id)->update($data);
	}
}