@extends('layout.uu_main')

@section('content')
		<div class="m_right">
            <p></p>			
            <div class="mem_tit">
            	<span class="fr" style="font-size:12px; color:#55555; font-family:'宋体'; margin-top:5px;">共发现0件</span>会员余额
            </div>
            <form action="/pay" method="get">
			<table border="0" class="ma_tab" style="width:930px; margin-bottom:30px;" cellspacing="0" cellpadding="0">
              <tr>
              	<td class="ma_a" colspan="3" align="right"><a href="#">充值</a>|<a href="cash">提现</a>|<a href="#">查看账户明细</a>|<a href="#">查看申请记录</a></td>
              </tr>
              <tr>
                <td>充值金额</td>
                <td colspan="2"><input type="text" value="" class="add_ipt" style="width:190px;" name="add_money" /></td>
              </tr>
            <!--   <tr valign="top" height="180">
                <td>会员备注</td>
                <td colspan="2" style="padding-top:10px;"><textarea class="add_txt" style="width:540px; height:130px;"></textarea></td>
              </tr> -->
              <tr>
                <td colspan="3">支付方式</td>
              </tr>
              <tr>                                                                                                                                                    
                <td width="200" align="center">名称</td>                                                            
                <td width="500" align="center">描述</td>
                <td width="230" align="center">手续费</td>                   
              </tr>
              <tr>
                <td><label class="r_rad"><input type="radio" name="pay" id="pay" checked value="银联" /></label><label class="r_txt">银行汇款 / 转账</label></td>
                <td>
                	银行名称 收款人信息：全称 ××× ；帐号或地址 ××× ；开户行 ×××。 <br />
                    注意事项：办理电汇时，请在电汇单“汇款用途”一栏处注明您的订单号。
                </td>
                <td align="center">0</td>
              </tr>
              <tr>
                <td><label class="r_rad"><input type="radio" name="pay" id="pay" value="支付宝" /></label><label class="r_txt">支付宝</label></td>
                <td>
                	支付宝网站(www.alipay.com) 是国内先进的网上支付平台。<br />
                    支付宝收款接口：在线即可开通，<font color="#ff4e00">零预付，免年费，</font>单笔阶梯费率，无流量限制。<br />
                    <a href="#" style="color:#ff4e00;">立即在线申请</a>
                </td>
                <td align="center">0</td>
              </tr>
              <tr>
                <td colspan="7" align="right">您当前的可用资金为：￥0.00</td>
              </tr>
              <input type="hidden" name="type" value="充值">
			</table>
            
            <p align="center">
              <!-- <a href="pay" class="btn_tj">立即支付</a> -->
            	<input type="submit" value="立即支付" class="btn_tj"  />&nbsp; &nbsp; <input type="reset" value="重置表单" class="btn_tj" />
            </p>
			</form>
            
        </div>
   @endsection


