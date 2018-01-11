<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cate extends Model
{
    Public function getCate($id)
    {
    	return $arr = Db::table('su_goods') ->join('su_cate', 'su_goods.cate_id', '=', 'su_cate.c_id')
            ->join('su_brand', 'su_goods.brand_id', '=', 'su_brand.b_id')->join('su_photo', 'su_goods.g_id', '=', 'su_photo.g_id')->where('cate_id',$id)->get()->map(function($value){ return (array)$value; })->toArray();
    }
    public function cateFind($id)
    {
    	return $arr = Db::table('su_cate')->where('c_id',$id)->first();
    }
     Public function cateAll($c_id)
    {
    	return $arr = Db::table('su_goods') ->join('su_cate', 'su_goods.cate_id', '=', 'su_cate.c_id')
            ->join('su_brand', 'su_goods.brand_id', '=', 'su_brand.b_id')->join('su_photo', 'su_goods.g_id', '=', 'su_photo.g_id')->whereIn('cate_id',$c_id)->get()->map(function($value){ return (array)$value; })->toArray();
    }
}
