<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Brand extends Model
{
	public function getBrand()
	{
		return $arr = Db::table('su_brand')->paginate(20);
	}
	public function brandGoods($id)
	{
		return $arr = Db::table('su_goods') ->join('su_cate', 'su_goods.cate_id', '=', 'su_cate.c_id')
            ->join('su_brand', 'su_goods.brand_id', '=', 'su_brand.b_id')->join('su_photo', 'su_goods.g_id', '=', 'su_photo.g_id')->where('brand_id',$id)->paginate(20);
	}
}