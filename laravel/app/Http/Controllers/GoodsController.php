<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoodsController extends BaseController
{
    //商品详情
    public function product($id)
    {
        $data = BaseController::index();
        $err = BaseController::cate();
        $goods = new \App\model\Goods;
        $res = $goods->goodsIndex($id);
        $msg = $goods->getAttr();
        $temp = array();
        foreach ($msg as $k => $v) 
        {
            $attrvalue = $goods->getValue($v['attr_id']);
            $temp[$v['attr_id']] = array('attr_name'=>$v['attr_name'],'attra_val'=>$attrvalue);
        }
    	return view('goods/Product',['data' => $data,'err' => $err,'res' => $res,'temp' => $temp]);
    }
    public function getAttrval(Request $request)
    {
        $val = $request->get('attrval');
        $goods = new \App\model\Goods;
        $res = $goods->getSku($val);
        $msg = json_decode(json_encode($res),true);
        return $msg;
    }
    //商城特卖
    public function sell()
    {
        $data = BaseController::index();
        $err = BaseController::cate();
    	return view('goods/Sell',['data' => $data,'err' => $err]);
    }
    //特卖商品详情
    public function sellde()
    {
        $data = BaseController::index();
        $err = BaseController::cate();
    	return view('goods/SellDetails',['data' => $data,'err' => $err]);
    }
}
