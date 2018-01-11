<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\controllers\BaseController;

class BrandController extends BaseController
{
	public function index()
	{
		$brand = new \App\model\Brand;
		$res = $brand->getBrand();
		$data = BaseController::index();
    	$err = BaseController::cate();
		return view('brand/Brand',['data' => $data,'err' => $err,'res' => $res]);
	}
	public function brandList($id)
	{
		$data = BaseController::index();
    	$err = BaseController::cate();
    	$brand = new \App\model\Brand;
    	$res = $brand->brandGoods($id);
		return view('brand/BrandList',['data' => $data,'err' => $err,'res' => $res]);
	}
}