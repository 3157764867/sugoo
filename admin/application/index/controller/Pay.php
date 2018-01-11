<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use think\File;

class Pay extends Controller
{
	//支付方式展示
	public function index()
	{
		$data=model('pay')->getpay_info();
		$num=model('pay')->getnum();
		return $this->fetch('pay',['data'=>$data,'num'=>$num]);
	}
	public function add()
	{
		return $this->fetch('addpay');
	}
	//pay_type添加
	public function do_add()
	{
		$data['pay_name']=Request::instance()->param('pay_name');
		$file=Request()->file('img');
		$info=$file->validate(['size'=>1567800,'ext'=>'jpg,png,gif'])->move(ROOT_PATH.'public/uploads');
		if($info)
		{
			$data['pay_logo']=$info->getSaveName();
			$data['addtime']=date('Y-m-d H:i:S');
			$res=model('pay')->pay_add($data);
			if($res)
			{
				$this->success('添加成功','index/pay/index');
			}
		}
		else
		{
			$error=$file->getError();
			$this->error($error,'index/pay/add');
		}
	}
	//修改状态
	public function up()
	{
		$id=Request::instance()->post('id');
		$status=Request::instance()->post('status');
		$res=model('pay')->up($id,$status);
		return json_encode($res);
	}
	public function checkname()
	{
		$pay_name=Request::instance()->get('pay_name');
		$res=model('pay')->checkname($pay_name);
		return $res;
	}
}