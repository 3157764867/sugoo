<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\controllers\BaseController;

class CateController extends BaseController
{
	public function index()
	{
		return view('cate/Category');
	}
	public function cateList($id)
	{
		$cate = new \App\model\Cate;
		$res = $cate->getCate($id);
		$arr = $cate->cateFind($id);
		$data = BaseController::index();
    	$err = BaseController::cate();
		return view('cate/CategoryList',['res' => $res,'arr' => $arr,'data' => $data,'err' => $err]);
	}
	public function getCateAll($id)
	{
		$cate = new \App\model\Cate;
		$arr = $cate->cateFind($id);
		$err = BaseController::cate();
		$data = BaseController::index();
		foreach ($data as $k => $v) 
		{
			foreach ($v['sonCate'] as $sk => $sv) 
			{
				foreach ($sv['sonList'] as $key => $val) 
				{
					$c_id[]=$val['c_id'];
					
				}
				$cate = new \App\model\Cate;
				$res = $cate->cateAll($c_id);
			}
		}
		return view('cate/CategoryList',['res' => $res,'arr' => $arr,'data' => $data,'err' => $err]);
	}
}