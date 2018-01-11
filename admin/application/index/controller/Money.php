<?php

namespace app\index\controller;

use think\Controller;
use think\Model;
use think\Request;

class Money extends Controller{

	public function index()
	{
		 $start=Request::instance()->get('start');
        $end=Request::instance()->get('end');
        if($start)
        {
            $where['addtime']=array(array('EGT',$start),array('elt',$end),'and');
        }
        else
        {
            $where=1;
        } 
		$page=Request::instance()->get('page');
    	//检测
    	$page=isset($page)?$page:1;
    	//总条数
    	$total=model('pay')->gettotal($where);
    	//每页显示
    	$pagenum=5;
    	//总页数
    	$totalpage=ceil($total/$pagenum);
    	//偏移量
    	$start=($page-1)*$pagenum;
    	//上一页 下一页
    	$last=$page-1<1?1:$page-1;
		$next=$page+1>=$totalpage?$totalpage:$page+1;
		$str='';
		$str.="<a href='javascript:void(0)' onclick='page(1)'>首页</a>&nbsp;";
		$str.="<a href='javascript:void(0)' onclick='page($last)'>上一页</a>&nbsp;";
		$str.="<a href='javascript:void(0)' onclick='page($next)'>下一页</a>&nbsp;";
		$str.="<a href='javascript:void(0)' onclick='page($totalpage)'>尾页</a>";
		$data=model('pay')->getaccount($start,$pagenum,$where);
		return $this->fetch('money',['data'=>$data,'page'=>$str,'totalpage'=>$totalpage,'total'=>$total]);
	}

	public function add()
	{
		// echo 1;
		return $this->fetch('addmoney');
	}
}