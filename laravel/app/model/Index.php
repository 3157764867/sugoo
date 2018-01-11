<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Index extends Model
{
    public function getCate($p_id=0)
    {
    	return $arr = Db::table('su_cate')->where('p_id',$p_id)->get()->map(function($value){ return (array)$value; })->toArray();
    }
    public function getGoods()
	{
		return $arr = Db::table('su_goods')->join('su_cate', 'su_goods.cate_id', '=', 'su_cate.c_id')->join('su_brand', 'su_goods.brand_id', '=', 'su_brand.b_id')->join('su_photo', 'su_goods.g_id', '=', 'su_photo.g_id')->where('su_photo.photo_type',0)->orderBy('sales','desc')->get()->map(function($value){ return (array)$value; })->toArray();
	}
}
