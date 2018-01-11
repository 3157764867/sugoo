<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Address extends Model
{
    //查询展示订单地址
    public function addressList(Request $request)
    {
        $userid         = $request->input('userid');
        $useraddress = DB::table('address')->where('u_id', $userid)->get();
        if($useraddress){
            $arr = [
                'code' => '20000',
                'msg'  => '查找成功',
                'data' => $useraddress
            ];
        }else{
            $arr = [
                'code' => '40002',
                'msg'  => '查询失败 请重试!!!',
                'data' => ''
            ];
        }
        return $arr;
    }

    //创建订单地址
    public function createOrderAddress(Request $request)
    {
        $userid         = $request->input('userid');
        $username       = $request->input('username');
        $useremail      = $request->input('useremail');
        $useraddress    = $request->input('useraddress');
        $usertel        = $request->input('usertel');


//            $userid       = $request->session()->get('uid');
//        $userid=1;

        $res=DB::table('address')->insert([
            'u_id'      => $userid,
            'add_man'   => $username,
            'address'   => $useraddress,
            'add_phone' => $usertel,
            'add_email' => $useremail,
            'add_status'=> 1,
        ]);
        if($res){
            $arr = [
                'code' => '20000',
                'msg'  => '添加成功',
                'data' => [
                    'add_man'   => $username,
                    'address'   => $useraddress,
                    'add_phone' => $usertel,
                    'add_email' => $useremail,
                ]
            ];
        }else{
            $arr = [
                'code' => '40001',
                'msg'  => '添加失败 请重试!!!',
                'data' => ''
            ];
        }
        return $arr;
    }

    //删除订单地址
    public function delOrderAddress(Request $request)
    {
        $userid         = $request->input('userid');
        $useraddress = DB::table('address')->where('u_id', $userid)->delete();
        if($useraddress){
            $arr = [
                'code' => '20000',
                'msg'  => '查找成功',
                'data' => $useraddress
            ];
        }else{
            $arr = [
                'code' => '40003',
                'msg'  => '查询失败 请重试!!!',
                'data' => ''
            ];
        }
        return $arr;
    }

    //修改订单地址
    public function saveOrderAddress(Request $request)
    {
        $userid         = $request->input('userid');
        $add_id         = $request->input('add_id');
        $username       = $request->input('username');
        $useremail      = $request->input('useremail');
        $useraddress    = $request->input('useraddress');
        $usertel        = $request->input('usertel');

        $res = DB::table('address')->where([['userid','=',$userid],['add_id','=',$add_id],])
            ->update(['username' => $username,'useremail' => $useremail,'useraddress' => $useraddress,'usertel' => $usertel,]);
        if($res){
            $arr = [
                'code' => '20000',
                'msg'  => '修改成功',
            ];
        }else{
            $arr = [
                'code' => '40004',
                'msg'  => '修改失败 请重试!!!',
            ];
        }
        return $arr;
    }

    //设置默认地址
    public function setDefaultAddress(Request $request)
    {
        $userid         = $request->input('userid');
        $add_id         = $request->input('add_id');
        $res=DB::table('address')->where([['u_id','=', $userid],['add_id','!=',$add_id]])->update(['add_status' => 0]);
        if($res){
            $arr = [
                'code' => '20000',
                'msg'  => '设置成功',
            ];
        }else{
            $arr = [
                'code' => '40005',
                'msg'  => '设置失败 请重试!!!',
            ];
        }
        return $arr;
    }

    //获取我的所有订单
    public function getMyOrder(Request $request)
    {
        $userid         = $request->input('userid');
        $res = DB::table('order')->where('u_id', $userid)->get();
        if($res){
            $arr = [
                'code' => '20000',
                'msg'  => '查找成功',
                'data' => $res
            ];
        }else{
            $arr = [
                'code' => '40006',
                'msg'  => '查询失败 请重试!!!',
                'data' => ''
            ];
        }
        return $arr;
    }



}
