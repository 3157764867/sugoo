<?php

namespace app\index\controller;

use think\Controller;
use app\index\model\Category;
use app\index\model\Brand;

class Goods extends Controller
{
	public static $category;
	public static $brand;
	public function __construct()
	{
		parent::__construct();
		self::$category = new Category;
		self::$brand = new Brand;
	}
	// 商品列表
	public function index()
	{
		$goods = model('goods');
		$arr = $goods->goodsList();
		return $this->fetch('product',['arr' => $arr]);
	}

	public function add()
	{
		$arr = self::$category->cateList();
		$cate = category($arr);
		$brand = self::$brand->brandList();
		return $this->fetch('addproduct',['cate' => $cate,'brand' => $brand]);
	}
	public function getAttr()
	{
		$c_id = input('c_id');
		$goods = model('goods');
		$arr = $goods->attrAll($c_id);
		foreach ($arr as $k => $v) 
		{
			$attr_id[] = $v['attr_id']; 
			$res = $goods->getAll($attr_id);
			$temp = array();
			foreach ($res as $k => $v) 
			{
				$attrvalue = $goods->getValue($v['attr_id']);
				$temp[$v['attr_id']] = array('attr_name'=>$v['attr_name'],'attra_val'=>$attrvalue); 
			}
		}
		return $temp;	
	}
	public function goodsAdd()
	{
		$arr = input('post.');
		$data = array(
			"goods_name" => $arr['goods_name'],
			"g_price" => $arr['g_price'],
			"cate_id" => $arr['c_id'],
			"brand_id" => $arr['b_id'],
			"addtime" => date("Y-m-d H:i:s")
			);	
		$goods = model('goods');
		$bool = $goods->addGoods($data);
		if ($bool != 0) 
		{
			$attrvalue = $arr['attrvalue'];
			$sku = digui($attrvalue);
			$msg = $goods->getLastid();
			return $this->fetch('goods_sku',['g_id' => $msg,'sku' => $sku[0]]);
		}
		else
		{
			$this->error('添加失败','goods/add');
		}
	}
	public function sku()
	{
		$sku = input('post.');
		foreach ($sku as $k => $v) 
		{
			foreach ($v as $key => $val)
			{
				$goods_num = time().rand(10000,99999).uniqid();
				$val['sku_sn']=$goods_num;
				$array[]=$val;
			}
		}
		// print_r($array);die;
		$goods = model('goods');
		$bool = $goods->skuAdd($array);
		if ($bool) 
		{
			$this->success('添加成功','goods/index');
		}
		else
		{
			$this->error('添加失败','goods/add');
		}
	}
	public function delete()
	{
		$id = input('id');
		$goods = model('goods');
		$arr = $goods->goodsDel($id);
		if ($arr != 0) 
		{
			$res = $goods->skuDel($id);
			if ($res) 
			{
				$this->success('删除成功','goods/index');
			}
			else
			{
				$this->error('删除失败','goods/index');
			}
		}
		else
		{
			$this->error('删除失败','goods/index');
		}
	}
	public function upgoods()
	{
		$g_id = input('g_id');
		$status = input('status');
		if($status == 0)
		{
			$g_status = 1;
		}
		else
		{
			$g_status =0;
		}
		$goods = model('goods');
		$bool = $goods->goodsUpdate($g_id,$g_status);
		return json_encode($bool);
	}
}