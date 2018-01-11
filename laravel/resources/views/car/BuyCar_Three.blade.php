@extends('layout.pro_main')

@section('content')
<!--End Menu End--> 
<div class="i_bg">  
    <div class="content mar_20">
    	<img src="images/img3.jpg" />        
    </div>
    
    <!--Begin 第三步：提交订单 Begin -->
    <div class="content mar_20">
        <!--Begin 支付宝支付 Begin -->
        @if ($paytype == 1)
            <div class="warning">
                <table border="0" style="width:1000px; text-align:center;" cellspacing="0" cellpadding="0">
                    <tr height="35">
                        <td style="font-size:18px;">
                            感谢您在本店购物！您的订单已提交成功，请记住您的订单号: <font color="#ff4e00">{{$orderNum}}</font>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size:14px; font-family:'宋体'; padding:10px 0 20px 0; border-bottom:1px solid #b6b6b6;">
                            您选定的配送方式为: <font color="#ff4e00">{{$express}}</font>； &nbsp; &nbsp;您选定的支付方式为: <font color="#ff4e00">支付宝支付</font>； &nbsp; &nbsp;您的应付款金额为: <font color="#ff4e00">{{$s_amount}}</font>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:20px 0 30px 0; font-family:'宋体';">
                            支付宝网站(www.alipay.com) 是国内先进的网上支付平台。<br />
                            支付宝收款接口：在线即可开通，零预付，免年费，单笔阶梯费率，无流量限制。<br />
                            <a href="www.alipay.com" style="color:#ff4e00;">立即在线申请</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="btn_u" style="margin:0 auto; padding:0 20px; width:120px;"><a href="#">立即使用支付宝支付</a></div>
                            <a href="index">首页</a> &nbsp; &nbsp; <a href="user">用户中心</a>
                        </td>
                    </tr>
                </table>
            </div>
        <!--Begin 支付宝支付 Begin -->

        <!--Begin 微信支付 Begin -->
        @elseif ($paytype == 2)
    	<div class="warning">        	
            <table border="0" style="width:1000px; text-align:center;" cellspacing="0" cellpadding="0">
              <tr height="35">
                <td style="font-size:18px;">
                	感谢您在本店购物！您的订单已提交成功，请记住您的订单号: <font color="#ff4e00">{{$orderNum}}</font>
                </td>
              </tr>
              <tr>
                <td style="font-size:14px; font-family:'宋体'; padding:10px 0 20px 0; border-bottom:1px solid #b6b6b6;">
                	您选定的配送方式为: <font color="#ff4e00">{{$express}}</font>； &nbsp; &nbsp;您选定的支付方式为: <font color="#ff4e00">微信支付</font>； &nbsp; &nbsp;您的应付款金额为: <font color="#ff4e00">{{$s_amount}}</font>
                </td>
              </tr>
              <tr>
                <td style="padding:20px 0 30px 0; font-family:'宋体';">
                	{{--银行名称 收款人信息：全称 ××× ；帐号或地址 ××× ；开户行 ×××。 <br />--}}
                    {{--注意事项：办理电汇时，请在电汇单“汇款用途”一栏处注明您的订单号。--}}

                </td>
              </tr>
                <tr>
                    <td>
                        <div class="btn_u" style="margin:0 auto; padding:0 20px; width:120px;"><a href="#">立即使用微信支付</a></div>
                        <a href="index">首页</a> &nbsp; &nbsp; <a href="user">用户中心</a>
                    </td>
                </tr>
            </table>        	
        </div>
        <!--Begin 微信支付 Begin -->
        

        <!--Begin 余额支付 Begin -->
        @else
        <div class="warning">
                <table border="0" style="width:1000px; text-align:center;" cellspacing="0" cellpadding="0">
                    <tr height="35">
                        <td style="font-size:18px;">
                            感谢您在本店购物！您的订单已提交成功，请记住您的订单号: <font color="#ff4e00">{{$orderNum}}</font>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size:14px; font-family:'宋体'; padding:10px 0 20px 0; border-bottom:1px solid #b6b6b6;">
                            您选定的配送方式为: <font color="#ff4e00">{{$express}}</font>； &nbsp; &nbsp;您选定的支付方式为: <font color="#ff4e00">余额支付</font>； &nbsp; &nbsp;您的应付款金额为: <font color="#ff4e00">{{$s_amount}}</font>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:20px 0 30px 0; font-family:'宋体';">
                            {{--银行名称 收款人信息：全称 ××× ；帐号或地址 ××× ；开户行 ×××。 <br />--}}
                            {{--注意事项：办理电汇时，请在电汇单“汇款用途”一栏处注明您的订单号。--}}

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="btn_u" style="margin:0 auto; padding:0 20px; width:120px;"><a href="javascript:void(0)" id="yue">立即使用余额支付</a></div><br>
                            <div hidden id="pay_pwd">
                                <font color="red"> 请输入支付密码：</font><input type="password" id="pwd">
                                <span id="torf"></span><br>
                                <button id="ok">确认支付</button>
                            </div>
                            <div class="backs"><a href="#">返回上一页</a></div>
                        </td>
                    </tr>
                </table>
            </div>
        <!--Begin 余额支付 Begin -->
        @endif
        
    </div>
	<!--End 第三步：提交订单 End-->


    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script>
        $("#yue").on("click",function () {
            $("#pay_pwd").toggle()
        })
        $("#ok").on("click",function () {
            var pwd = $("#pwd").val()
            if(pwd==''){
                $("#torf").html("<font color='red'>支付密码不能为空</font>")
                return
            }
            $.ajax({
                url:"pay_pwd",
                data:{"pwd":pwd},
                type:"GET",
                success:function (e) {
                    console.log(e)
                    if(e.code==20000){
                        $("#torf").html("<font color='green'>√</font>")
                    }else {
                        $("#torf").html("<font color='red'>支付密码错误</font>")
                    }
                }
            })
        })
    </script>
@endsection