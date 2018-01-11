<?php
namespace app\index\model;

use think\Model;
use think\Db;

class Attrvalue extends Model
{
	public function valueInsert($data)
	{
		return $arr = Db::table('su_attr_value')->insert($data);
	}
	public function valueList()
	{
		return $arr = Db::table('su_attr_value')->alias('a')->join('su_attr w','a.attr_id = w.attr_id')->select();
	}
	public function valueDel($id)
	{
		return $arr = Db::table('su_attr_value')->where('av_id',$id)->delete();
	}
	public function valueFind($id)
	{
		return $arr = Db::table('su_attr_value')->where('av_id',$id)->find();
	}
	public function valueUpdate($id,$data)
	{
		return $arr = Db::table('su_attr_value')->where('av_id',$id)->update($data);
	}
}