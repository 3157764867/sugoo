<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Goods extends Model
{
    public function goodsIndex($id)
    {
    	return $arr = Db::table('su_goods') ->join('su_cate', 'su_goods.cate_id', '=', 'su_cate.c_id')->join('su_photo', 'su_goods.g_id', '=', 'su_photo.g_id')->join('su_brand', 'su_goods.brand_id', '=', 'su_brand.b_id')->where('su_goods.g_id',$id)->first();
	}
	public function getAttr()
	{
		return $arr = Db::table('su_attr')->get()->map(function($value){ return (array)$value; })->toArray();
	}
	public function getValue($attr_id)
	{
		return $arr = Db::table('su_attr_value')->where('attr_id',$attr_id)->get()->map(function($value){ return (array)$value; })->toArray();
	}
	public function getSku($val)
	{
		return $arr = Db::table('su_sku')->where('sku',$val)->first();
	}
}
