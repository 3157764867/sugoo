<?php
namespace app\index\model;

use think\Model;
use think\Db;

class Attr extends Model
{
	public function addAttr($data)
	{
		return $arr = Db::table('su_attr')->insert($data);
	}
	public function getAttrid()
	{
		return $arr = Db::table('su_attr')->getLastInsId();
	}
	public function attrcateAdd($err)
	{
		return $arr = Db::table('su_cate_attr')->insert($err);
	}
	public function attrList()
	{
		return $arr = Db::table('su_attr')->alias('a')->join('su_cate_attr w','a.attr_id = w.attr_id')->join('su_cate c','w.cate_id = c.c_id')->select();
	}
	public function attrFind($attr_name)
	{
		return $arr = Db::table('su_attr')->where('attr_name',$attr_name)->find();
	}
	public function attrSelect()
	{
		return $arr = Db::table('su_attr')->select();
	}
}