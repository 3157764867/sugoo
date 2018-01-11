<?php

namespace app\index\controller;

use think\Controller;
use app\index\model\Attr;

class Attrvalue extends Controller
{
	public static $attr;
	public function __construct()
	{
		parent::__construct();
		self::$attr = new Attr;
	}
	public function index()
	{
		$attrvalue = model('attrvalue');
		$arr = $attrvalue->valueList();
		return $this->fetch('attrvalue',['arr' => $arr]);
	}
	public function add()
	{
		$arr = self::$attr->attrSelect();
		return $this->fetch('add_attrvalue',['arr' => $arr]);
	}
	public function attrvalueAdd()
	{
		$data['attra_val'] = input('attra_val');
		$data['attr_id'] = input('attr_id');
		$attrvalue = model('attrvalue');
		$arr = $attrvalue->valueInsert($data);
		if ($arr) 
		{
			$this->success('添加成功','attrvalue/index');
		}
		else
		{
			$this->error('添加失败','attrvalue/add');
		}
	}
	public function delete()
	{
		$id = input('id');
		$attrvalue = model('attrvalue');
		$arr = $attrvalue->valueDel($id);
		if ($arr) 
		{
			$this->success('删除成功','attrvalue/index');
		}
		else
		{
			$this->error('删除失败','attrvalue/index');
		}
	}
	public function update()
	{
		$id = input('id');
		$attrvalue = model('attrvalue');
		$res = $attrvalue->valueFind($id);
		$arr = self::$attr->attrSelect();
		return $this->fetch('attrvalue_set',['arr' => $arr,'res' => $res]);
	}
	public function valueSave()
	{
		$id = input('id');
		$data['attra_val'] = input('attra_val');
		$data['attr_id'] = input('attr_id');
		$attrvalue = model('attrvalue');
		$arr = $attrvalue->valueUpdate($id,$data);
		if ($arr) 
		{
			$this->success('修改成功','attrvalue/index');
		}
		else
		{
			$this->error('修改失败','attrvalue/update');
		}
	}
}