<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    //获取默认收货地址
    public function getDefaultAddress($userid)
    {
        $res = DB::table('address')->where([['u_id', $userid],['add_status' ,1]])->first();
        if($res){
            $arr = [
                'code' => '20000',
                'msg'  => '查询成功',
                'data' => $res
            ];
        }else{
            $arr = [
                'code' => '40003',
                'msg'  => '查询失败 请重试!!!',
                'data' => ''
            ];
        }
        return $res;

    }
    //支付方式
    public function getPayType()
    {
        $pays = DB::table('pay')->get()->where('status','=',1)->toArray();
        return $pays;
    }
    //确认订单
    public function confirmOrder($userid,$s_amount,$paytype,$express,$address_id)
    {
        date_default_timezone_set('PRC');
        $createordertime = date("Y-m-d H:i:s");   //订单生成时间
        $orderNum = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);//订单号
        $res = DB::table('order')->insert(
            ['ord_sn' => $orderNum, 'ord_addtime' =>$createordertime,'total_price'=>$s_amount,'pay_type'=>$paytype,'pay_status'=>1,'ord_status'=>0,'u_id'=>$userid,'address_id'=>$address_id,'fa_status'=>0]
        );
        if($res){
            $arr = [
                'code' => '20000',
                'msg'  => '添加成功',
            ];
        }else{
            $arr = [
                'code' => '40004',
                'msg'  => '添加失败 请重试!!!',
            ];
        }
        return $arr;
    }
    //确认支付密码
    public function pwdTrueOrFalse($userid,$pwd)
    {
        $pwds = DB::table('user')->where('u_id', '=',$userid)->value('pay_pwd');
        if($pwds==$pwd){
            $arr = [
                'code' => '20000',
                'msg'  => '密码正确',
            ];
        }else{
            $arr = [
                'code' => '40007',
                'msg'  => '密码错误 请重试!!!',
            ];
        }
        return $arr;
    }
    //获取我的所有订单
    public function getMyOrder($userid)
    {
        $orders = DB::table('order')->get()->toArray();
        if($orders){
            $arr = [
                'code' => '20000',
                'msg'  => '查询成功',
                'data' => $orders
            ];
        }else{
            $arr = [
                'code' => '40005',
                'msg'  => '查询失败 请重试!!!',
                'data' => ''
            ];
        }
        return $orders;
    }
    //获取各状态订单数量
    public function getNumsOrder()
    {
        $order['nopay'] = DB::table('order')->where('pay_status','=',0)->count();//待支付订单数量
        $order['noshou'] = DB::table('order')->where('fa_status','=',2)->count();//待收货订单数量
        $order['nopl']  = DB::table('order')->where('fa_status','=',5)->count();//待评论订单数量
        return $order;
    }
    //获取分条件订单
    public function getOrderGiven($userid,$ordernum,$orderstatus)
    {
        $a ='';
        $b ='';
        if($ordernum != null){
            $a = " and ord_sn like '%$ordernum%'";
        }
        if($orderstatus != null){
            $b = " and pay_status like '%$orderstatus%'";
        }
        $q = "SELECT * FROM `su_order` where u_id=$userid and (1=1)";
        $q .=$a;
        $q .=$b;

        $typeorder = DB::select($q);
        return $typeorder;
    }
}
