<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB; 

use App\WxPay\example\native;

require_once app_path('WxPay/lib/WxPay.Api.php');
require_once app_path('WxPay/example/log.php');

class PayController extends Controller
{
  protected $conf = array();
  CONST KEY = '8934e7d15453e97507ef794cf7b0519d';
    //支付宝支付
    public function index()
    {
       $price=request()->input('add_money');
       $type=request()->input('type');
       $alipay = app('alipay.web');
       if($type=='充值')
       {
          $out_tradeNo='E00023320267';
          $price=0.01;
          $subject='充值';
          $alipay->setBody('充值');
       }
       else
       {
            // $out_tradeNo=Request()->input('');
            // $price=Request()->input('');
            // $subject=Request()->input('');
            $out_tradeNo='E00023320268';
            $price=0.01;
            $subject='乔彤彤升级版布12娃娃';
            $alipay->setBody('商品：支付宝支付测试');
       }
	   	
	    $alipay->setOutTradeNo($out_tradeNo);
	    $alipay->setTotalFee($price);
	    $alipay->setSubject($subject);
	    

	    $alipay->setQrPayMode('5'); //该设置为可选1-5，添加该参数设置，支持二维码支付。

	    // 跳转到支付页面。
	    return redirect()->to($alipay->getPayLink());
  }
  //服务器异步通知页面
   public function AliPayNotify()  
   {
        $postStr=file_get_contents("php://input");
        file_put_contents("log/".time().rand(1000,9999).".log",$postStr);
        $arr= (array)simplexml_load_string($postStr,'SimpleXMLElement',LIBXML_NOCDATA);
        print_r($arr);
   }
   //页面跳转同步通知页面
   public function AliPayReturn(Request $request)
   {
     $post=new \App\model\Pay;
      $status=request()->input('trade_status');
      if($status=='TRADE_SUCCESS')
      {
          $total_fee=request()->input('total_fee');
          $subject=request()->input('subject');
          $out_tradeNo=request()->input('out_trade_no');
           $uid=1;
           if($subject=='充值')
           {
              $money=$post->getpwd($uid);
              
              $uu_money=$money->u_money+$total_fee;
              $res=$post->up_u_money($uid,$uu_money);
              if($res)
              {
                  $arr=array(
                      'pr_type'=>$subject,
                      'pr_price'=>$total_fee,
                      'u_id'=>$uid,
                      'pr_time'=>date('Y-m-d H:i:s'),
                      'ord_sn'=>$out_tradeNo,
                    );
                    //支付记录表
                    $record=$post->add_pay($arr);
                  $back=array('code'=>1011,'message'=>'充值成功');
              }
              else
              {
                $back=array('code'=>1012,'message'=>'充值失败');
              }
              // return json_encode($back);
              return view('user.Member_Money');
           }
           else
           {
              //修改订单金额
             $order=$post->up_stat($uid,$out_tradeNo);
             if($order)
             {
                $zijin=array('money'=>$total_fee,'from'=>'商品消费','addtime'=>date('Y-m-d H:i:s'));
                $arr=array(
                      'pr_type'=>'支付宝支付',
                      'pr_price'=>$total_fee,
                      'u_id'=>$uid,
                      'pr_time'=>date('Y-m-d H:i:s'),
                      'ord_sn'=>$out_tradeNo,
                    );
                  //平台资金
                  $account=$post->account($zijin);
                    //支付记录表
                    $record=$post->add_pay($arr);
                    if($record && $account)
                    {
                      $back=array('code'=>1010,'message'=>'支付成功');
                    }
             }
           }
          
      }
      else
      {
        $back=array('code'=>1016,'message'=>'支付失败');
      } 
      return json_encode($back);
   	  
   }
   //余额支付
   public function yue()
   {
      $post=new \App\model\Pay;
      $uid=1;  
      // $out_tradeNo=Request()->input('');//订单号
      // $price=Request()->input('');//订单金额
      // $subject=Request()->input('');//商品
      // $pwd=Request()->input('');//支付密码
      $out_tradeNo='Esaklsk232323';
      $subject='熊娃娃';
      $price=0.01;
      $pwd='123456';
      $res=$post->getpwd($uid);
      if($res->pay_pwd==$pwd)
      {
          if($res->u_money>$price)
          {
            $uu_money=$res->u_money-$price;
            //更改用户余额
            $result=$post->up_u_money($uid,$uu_money);
            if($result)
            {
              //支付成功,修改订单状态
              $order= $post->up_stat($uid,$out_tradeNo);
              if($order)
              {
                  $zijin=array('money'=>$price,'from'=>'商品消费','addtime'=>date('Y-m-d H:i:s'));
                  $arr=array(
                    'pr_type'=>'余额支付',
                    'pr_price'=>$price,
                    'u_id'=>$uid,
                    'pr_time'=>date('Y-m-d H:i:s'),
                  );
                  //平台账户
                  $account=$post->account($zijin);
                  //支付记录表
                   $record=$post->add_pay($arr);
                  if($record && $account)
                  {
                      $back=array('code'=>1003,'message'=>'支付成功');
                  }
              }
                
            }
          }
          else
          {
            $back=array('code'=>1002,'message'=>'余额不足');
          }
      }
      else
      {
        $back=array('code'=>1001,'message'=>'支付密码错误');
      }
      return json_encode($back);
   }
   //获取交易记录
   public function get_record()
   {
      $uid=1;
      $post=new \App\model\Pay;
      $data=$post->get_record($uid);
      return $data;
   }
   //用户总消费
   public function gettotal()
   {
      $uid=1;
      $post=new \App\model\Pay;
      $data=$post->get_record($uid);
      $arr=json_decode($data,true);
      $sun=0;
      foreach ($arr['data'] as $k => $v)
      {
          $sum=$v['pr_price'];
          $sum++;
      }
      $user_money=$post->getpwd($uid);
      if($user_money)
      {
          $money=$sum-$user_money->u_money;
          $back=array('code'=>2001,'message'=>'请求成功','data'=>$money);
      }
      else
      {
        $back=array('code'=>2002,'message'=>'该用户没有消费记录');
      }
      
      return json_encode($back);
   }
   public function wei_pay()
   {
      $goods_desc = 'iphoneX';
      $attach = '虾米';
      $money = 1;
      $url = 'http://paysdk.weixin.qq.com/example/notify.php';
      $goods_id = '666666';
      $out_trade_no='2018011097491008';

      $obj = new native;
      $ret = $obj->ModeTwo($goods_desc,$attach,$money,$url,$goods_id,$out_trade_no);
      $url = $ret['url'];
      $order = $ret['order'];
      $arr=array('url'=>$url,'order'=>$order);
      // print_r($arr);die;
      return json_encode($arr);
   }
    public function InitLog()
    { 
      //初始化日志
      $logHandler= new \CLogFileHandler(app_path('WxPay/logs/').date('Y-m-d').'.log');
      $log = \Log::Init($logHandler, 15);
    }
    public function Search($order_other='')
    { 
      //初始化日志
      $this->InitLog();
      $order = isset($_REQUEST["out_trade_no"]) ? $_REQUEST['out_trade_no']:$order_other;
      if($order!=='')
      {
        $out_trade_no = $order;
        $input = new \WxPayOrderQuery();
        $input->SetOut_trade_no($out_trade_no);
        $data = \WxPayApi::orderQuery($input);
        return json_encode($data,JSON_UNESCAPED_UNICODE);
        exit();
      }
    }
      //支付成功页面
    public function PaySuccess(Request $request)
    { 
       $post=new \App\model\Pay;
      $order = $request->input('order');
      $uid=1;
      $res=$this->Search($order);
      if($res)
      {
          $arr=json_decode($res,true);
          $order= $post->up_stat($uid,$order);
          if($order)
          {
              $zijin=array('money'=>($arr['total_fee']/100),'from'=>'商品消费','addtime'=>date('Y-m-d H:i:s'));
              $arr=array(
                'pr_type'=>'微信支付',
                'pr_price'=>($arr['total_fee']/100),
                'u_id'=>$uid,
                'pr_time'=>date('Y-m-d H:i:s'),
                'ord_sn'=>$arr['out_trade_no'],
              );
              //平台账户
              $account=$post->account($zijin);
              //支付记录表
               $record=$post->add_pay($arr);
              if($record && $account)
              {
                  $back=array('code'=>1003,'message'=>'支付成功');
              }
          }
      }
      return json_encode($back);
      
    }
}
