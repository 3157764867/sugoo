<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\controllers\BaseController;

class IndexController extends BaseController
{
    public function index()
    {
    	$data = BaseController::index();
    	$arr = BaseController::cate();
    	$index = new \App\model\Index;
    	$res = $index->getgoods();
    	// echo "<pre>";
    	// var_dump($res);die;
    	return view('index.index',['data' => $data,'arr' => $arr,'res' => $res]);
    }
}
