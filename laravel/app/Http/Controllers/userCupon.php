<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cupon;
class userCupon extends Controller
{
    public function give(Request $request)
    {
    	
    	$uid =$request->input('u_id'); 
    	$uid = isset($uid) ? $uid : 1;

    	$c = new Cupon();
    	$data = $c->giveCupon($uid);
    	if ($data) {
    	return json_encode(['code'=>1001,'msg'=>'恭喜您获得1个价值十元的红包']);
    	}else{
    	return json_encode(['code'=>1002,'msg'=>'您已经领取过']);
    	}
    }

    // 红包信息以及多条件查询
    public function getinfo(Request $request)
    {
    	$uid = $request->session()->get('u_id');
        $money = $request->input('money'); 
        $cu_status = $request->input('cu_status');  
    	$uid = isset($uid )? $uid :1;
        $money = isset($money )? $money :1;
        $cu_status = isset($cu_status )? $cu_status :1;
    	$c = new Cupon();
    	$data = $c->getInfo($uid,$money,$cu_status);
        if($data){
            return json_encode(['msg'=>'调用数据接口成功','code'=>1003,'data'=>$data]);
        }else{
            return json_encode(['msg'=>'调用数据接口失败','code'=>1004,'data'=>'']);
        }
    	
    }

    // 获取当前用户下的红包总个数与总金额
    public function getnum(Request $request)
    {
        $uid = $request->session()->get('u_id');
        $uid = isset($uid )? $uid :1;
        $c = new Cupon();
        $num = $c->getCunum($uid);
        if($num){
            return json_encode(['msg'=>'调用红包数量总值接口成功','code'=>1005,'data'=>$num]);
        }else{
            return json_encode(['msg'=>'调用红包数量总值接口失败','code'=>1006,'data'=>""]);
        }
        
    }

    public function cuname(Request $request)
    {
        $u_id = $request->session()->get('u_id');
        $u_id = isset($uid )? $uid :1;
        $c = new Cupon();
        $data = $c->getUsercupon($u_id);
         if($data){
            return json_encode(['msg'=>'获取用户的红包成功','code'=>1007,'data'=>$data]);
        }else{
            return json_encode(['msg'=>'获取用户的红包失败','code'=>1008,'data'=>""]);
        }
    }

    public function usecupon(Request $request)
    {
        $u_id = $request->session()->get('u_id');
        // 获取用户与红包的关联id修改使用红包状态
        $id = $request->input('id');
        $u_id = isset($uid )? $uid :1;
        $id = isset($id )? $id :1;
        $c = new Cupon();
        $res = $c->useCupon($id,$u_id);
        if ($res) {
            return json_encode(['msg'=>'红包使用成功','code'=>1009]);
        }else{
            return json_encode(['msg'=>'红包使用失败','code'=>10010]);
        }

    }


    
    
    
}
