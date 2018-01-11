<?php

namespace app\index\controller;

use think\Controller;
use app\index\model\Category;

class Attr extends Controller
{
	public static $category;
	public function __construct()
	{
		parent::__construct();
		self::$category = new Category;
	}

	// 列表
	public function index()
	{
		$attr = model('attr');
		$arr = $attr->attrList();
		return $this->fetch('attr',['arr' => $arr]);
	}

	public function add()
	{
		$arr = self::$category->cateList();
		$res = category($arr);
		return $this->fetch('addattr',['res' => $res]);
	}
	public function attrAdd()
	{
		$attr = model('attr');
		$data['attr_name'] = input('attr_name');
		$err['cate_id'] = input('cate_id');
		$res = $attr->attrFind($data['attr_name']);
		if ($res) 
		{
			$err['attr_id'] = $res['attr_id']; 
			$arr = $attr->attrcateAdd($err);
			if ($arr) 
			{
				$this->success('添加成功','attr/index');
			}
			else
			{
				$this->error('添加失败','attr/add');
			}
		}
		else
		{
			$bool = $attr->addAttr($data);
			if ($bool) 
			{
				$err['attr_id'] = $attr->getAttrid();
				$arr = $attr->attrcateAdd($err);
				$this->success('添加成功','attr/index');
			}
			else
			{
				$this->error('添加失败','attr/add');
			}
		}
	}
}