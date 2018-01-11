<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index()
    {
    	$index = new \App\model\Index;
    	$res = $index->getCate();
    	$data = array();
    	foreach ($res as $k => $v) 
    	{
    		$v['sonCate']= '';
    		$arr = $index->getCate($v['c_id']);
    		if (!empty($arr)) 
    		{
    			// $v['sonCate'] = $arr;
    			foreach ($arr as $sk => $sv) 
	    		{	
	    			$sv['sonList'] = '';
	    			$err = $index->getCate($sv['c_id']);
	    			if (!empty($err)) 
		    		{
			    		$sv['sonList']= $err;
	    			}
	    			$v['sonCate'][]=$sv;
	    		}
    		}
    		$data[]= $v;
    	}
        return $data;
    }
    public function cate()
    {
        $index = new \App\model\Index;
        $res = $index->getCate();
        return $res;
    }
}
