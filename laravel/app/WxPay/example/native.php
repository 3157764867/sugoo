<?php
// ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);
namespace App\WxPay\example;

require_once app_path('WxPay/lib/WxPay.Api.php');
require_once "WxPay.NativePay.php";
require_once 'log.php';


class native
{	
	public static $notify;
	public function __construct()
	{
		self::$notify = new \NativePay();
	}
	//模式一
	/**
	 * 流程：
	 * 1、组装包含支付信息的url，生成二维码
	 * 2、用户扫描二维码，进行支付
	 * 3、确定支付之后，微信服务器会回调预先配置的回调地址，在【微信开放平台-微信支付-支付配置】中进行配置
	 * 4、在接到回调通知之后，用户进行统一下单支付，并返回支付信息以完成支付（见：native_notify.php）
	 * 5、支付完成之后，微信服务器会通知支付成功
	 * 6、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
	 */
	public function ModeOne()
	{
		$url1 = self::$notify->GetPrePayUrl("123456789");
		return $url1;		
	}

	//模式二
	/**
	 * 流程：
	 * 1、调用统一下单，取得code_url，生成二维码
	 * 2、用户扫描二维码，进行支付
	 * 3、支付完成之后，微信服务器会通知支付成功
	 * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
	 * @param $goods_desc string 商品描述
	 * @param $attach string 附加数据
	 * @param $money string 商品价格 单位（分）
	 * @param $url string 付款后回掉地址
	 * @param $goods_id int 商品id
	 */
	public function ModeTwo($goods_desc,$attach,$money,$url,$goods_id,$out_trade_no)
	{	
		$order = \WxPayConfig::MCHID.date("YmdHis"); 
		$input = new \WxPayUnifiedOrder();
		$input->SetBody($goods_desc);
		$input->SetAttach($attach);
		$input->SetOut_trade_no($out_trade_no);
		$input->SetTotal_fee($money);
		$input->SetTime_start(date("YmdHis"));
		$input->SetTime_expire(date("YmdHis", time() + 600));
		// $input->SetGoods_tag("test");
		//http://paysdk.weixin.qq.com/example/notify.php
		$input->SetNotify_url($url);
		$input->SetTrade_type("NATIVE");
		$input->SetProduct_id($goods_id);
		$result = self::$notify->GetPayUrl($input);
		$url2 = $result["code_url"];
		return ['url'=>$url2,'order'=>$out_trade_no];
	}
}