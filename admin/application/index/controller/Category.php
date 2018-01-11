<?php

namespace app\index\controller;

use think\Controller;

class Category extends Controller{
	// 分类
	public function index()
	{
		$category = model('category');
		$arr = $category->cateList();
		$res = category($arr);
		return $this->fetch('product_category',['res' => $res]);
	}

	// 列表
	public function add()
	{
		$category = model('category');
		$arr = $category->cateList();
		$res = category($arr); 
		return $this->fetch('add_product_category',['res' => $res]);
	}
	public function cateAdd()
	{
		$data['c_name'] = input('c_name');
		$data['p_id'] = input('p_id');
		$category = model('category');
		$arr = $category->addCate($data);
		if ($arr) 
		{
			$this->success('添加成功','category/index');
		}
		else
		{
			$this->error('添加失败','category/add');
		}
	}
	public function delete()
	{
		$id = input('id');
		$category = model('category');
		$arr = $category->cateDel($id);
		if ($arr) 
		{
			$this->success('删除成功','category/index');
		}
		else
		{
			$this->error('删除失败','category/index');
		}
	}
	public function update()
	{
		$id = input('id');
		$category = model('category');
		$data = $category->cateFind($id);
		$arr = $category->cateList();
		$res = category($arr);
		return $this->fetch('category_set',['data' => $data,'res' => $res]);
	}
	public function cateSave()
	{
		$id = input('id');
		$data['c_name'] = input('c_name');
		$data['p_id'] = input('p_id');
		$category = model('category');
		$arr = $category->cateUpdate($id,$data);
		if ($arr) 
		{
			$this->success('修改成功','category/index');
		}
		else
		{
			$this->error('修改失败','category/update');
		}
	}
}