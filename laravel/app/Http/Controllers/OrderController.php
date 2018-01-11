<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //确认订单
    public function car2()
    {

        $order = new Order();
        $userid=1;
//        $userid = session('uid');

        //获取默认地址
        $defaultaddress = $order->getDefaultAddress($userid);
//print_r($defaultaddress);die;
        //支付方式
        $paytype = $order->getPayType();
//        print_r($paytype);die;
        //获取购物车商品信息
        $goods =[
            [
                'goods_name'=> '测试白兰地鸡尾酒1',
                'goods_attr'=> '容量：2L',
                'goods_num'=> 2,
                'goods_money'=> 200,
            ],
            [
                'goods_name'=> '测试白兰地鸡尾酒2',
                'goods_attr'=> '容量：4L',
                'goods_num'=> 3,
                'goods_money'=> 100,
            ]
        ];
        foreach ($goods as $k => $v){
            $total[]=$v['goods_num']*$v['goods_money'];
        }
        //应付总金额
        $total_amount = array_sum($total);

        return view('car/BuyCar_Two',['defaultaddress'=>$defaultaddress,'goods'=>$goods,'total_amount'=>$total_amount,'paytype'=>$paytype]);
    }

    //确认添加订单
    public function confirmOrder(Request $request)
    {
        $userid = 1;       //用户ID
//        $userid = session('uid');       //用户ID

        $paytype         = $request->input('paytype');//支付方式
        $express         = $request->input('express');//快递配送方式
        $address_id         = $request->input('address_id');//地址ID
        $s_amount         = $request->input('s_amount');//订单总金额

        $order = new Order();
        $res = $order->confirmOrder($userid,$s_amount,$paytype,$express,$address_id);

        return $res;

    }

    //确认结算
    public function car3(Request $request)
    {

        $paytype         = $request->input('paytype');//支付方式
        $express         = $request->input('express');//配送方式
        $s_amount        = $request->input('s_amount');//实付金额
        $orderNum = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);//订单号

//        echo $express;die;
        return view('car/BuyCar_Three',['paytype'=>$paytype,'express'=>$express,'s_amount'=>$s_amount,'orderNum'=>$orderNum,]);
    }

    //确认支付密码是否正确
    public function pwdtf(Request $request)
    {
        $userid=1;

//        $userid = session('uid');
        $pwd   = $request->input('pwd');//支付密码
        $order = new Order();
        $res = $order->pwdTrueOrFalse($userid,$pwd);
        return $res;
    }



    //获取我的所有订单
    public function getMeOrder()
    {
        $order = new Order();

        $userid=1;
//        $userid = session('uid');
        $myorder = $order->getMyOrder($userid);
        return $myorder;
    }

    //获取各状态订单数量
    public function getStatusNum()
    {
        $order = new order();
        $orders = $order->getNumsOrder();
//        print_r($orders);
        return $orders;
    }

    //获取分条件订单
    public function getGivenOrder(Request $request)
    {
        $userid = 1;       //用户ID
//        $userid = session('uid');       //用户ID

        $ordernum    = $request->input('ordernum');//订单号
        $orderstatus    = $request->input('orderstatus');//订单状态
        $order = new Order();
        $data = $order->getOrderGiven($userid,$ordernum,$orderstatus);
        return $data;
    }
}
