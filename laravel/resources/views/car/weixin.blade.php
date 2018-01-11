@extends('layout.pro_main')

@section('content')
<!--End Menu End--> 
<div class="i_bg">  
    <div class="content mar_20">
    	<!-- <img src="images/img3.jpg" />         -->
    </div>
    
    <!--Begin 第三步：提交订单 Begin -->
    <div class="content mar_20">
    	
        
    	<div class="warning">        	
            <table border="0" style="width:1000px; text-align:center;" cellspacing="0" cellpadding="0">
              <tr>
                <td>
                  <h3>微信扫码支付</h3>
                	<img alt="微信二维码" src="http://paysdk.weixin.qq.com/example/qrcode.php?data=<?php echo urlencode($url);?>" style="width:150px;height:150px;"/>
                </td>
              </tr>
            </table>        	
        </div>
        <!--Begin 余额不足 Begin -->
        
        
    </div>
	<!--End 第三步：提交订单 End--> 
@endsection