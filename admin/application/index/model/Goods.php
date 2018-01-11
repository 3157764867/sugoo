<?php
namespace app\index\model;

use think\Model;
use think\Db;

class goods extends Model
{
	public function attrAll($c_id)
	{
		return $arr = Db::table('su_cate_attr')->where('cate_id',$c_id)->select();
	}
	public function getAll($attr_id)
	{
		return $arr = Db::table('su_attr')->wherein('attr_id',$attr_id)->select();
	}
	public function getValue($attr_id)
	{
		return $arr = Db::table('su_attr_value')->wherein('attr_id',$attr_id)->select();
	}
	public function addGoods($data)
	{
		return $arr = Db::table('su_goods')->insert($data);
	}
	public function getLastid()
	{
		return $arr = Db::table('su_goods')->getLastInsId();
	}
	public function skuAdd($array)
	{
		return $arr = Db::table('su_sku')->insertAll($array);
	}
	public function goodsList()
	{
		return $arr = Db::table('su_goods')->alias('a')->join('su_cate w','a.cate_id = w.c_id')->join('su_brand c','a.brand_id = c.b_id')->select();
	}
	public function goodsDel($id)
	{
		return $arr = Db::table('su_goods')->where('g_id',$id)->delete();
	}
	public function skuDel($id)
	{
		return $arr = Db::table('su_sku')->where('g_id',$id)->delete();
	}
	public function goodsUpdate($g_id,$g_status)
	{
		return $arr = Db::table('su_goods')->where('g_id',$g_id)->update(['g_status' => $g_status]);
	}
}