@extends('layout.pro_main')

@section('content')
<!--End Menu End--> 
<div class="i_bg">  
    <div class="content mar_20">
    	<img src="images/img2.jpg" />        
    </div>
    
    <!--Begin 第二步：确认订单信息 Begin -->
    <div class="content mar_20">
    	<div class="two_bg">
        	<div class="two_t">
            	<span class="fr"><a href="#">修改</a></span>商品列表
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="car_th" width="550">商品名称</td>
                <td class="car_th" width="140">属性</td>
                <td class="car_th" width="150">购买数量</td>
                <td class="car_th" width="130">小计</td>
              </tr>
                @foreach($goods as $good)
              <tr>
                <td>
                    <div class="c_s_img"><img src="images/c_1.jpg" width="73" height="73" /></div>
                    {{$good['goods_name']}}
                </td>
                <td align="center">{{$good['goods_attr']}}</td>
                <td align="center">{{$good['goods_num']}}</td>
                <td align="center" style="color:#ff4e00;">￥{{$good['goods_num']*$good['goods_money']}}</td>
              </tr>
                @endforeach
            </table>
            
            <div class="two_t">
            	<span class="fr"><a href="#">修改</a></span>收货人信息
            </div>
            <table border="0" class="peo_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                  <td hidden id="address_id">{{$defaultaddress->add_id}}</td>
                <td class="p_td" width="160">收货人</td>
                <td width="395">{{$defaultaddress->add_man}}</td>
                <td class="p_td" width="160">电子邮件</td>
                <td width="395">{{$defaultaddress->add_email}}</td>
              </tr>
              <tr>
                <td class="p_td">详细地址</td>
                <td>{{$defaultaddress->address}}</td>
                <td class="p_td">邮政编码</td>
                <td></td>
              </tr>
              <tr>
                <td class="p_td">电话</td>
                <td></td>
                <td class="p_td">手机</td>
                <td>{{$defaultaddress->add_phone}}</td>
              </tr>
              <tr>
                <td class="p_td">标志建筑</td>
                <td></td>
                <td class="p_td">最佳送货时间</td>
                <td></td>
              </tr>
            </table>

            
            <div class="two_t">
            	配送方式<font color="red" size="1">默认京东</font>
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="car_th" width="80"></td>
                <td class="car_th" width="200">名称</td>
                <td class="car_th" width="370">订购描述</td>
                <td class="car_th" width="150">配送费用</td>
                <td class="car_th" width="135">免费额度</td>
                <td class="car_th" width="175">保价费用</td>
              </tr>
                <tr>
                    <td align="center"><input type="radio" name="ch" class="ch" value="顺丰快递"/></td>
                    <td align="center" style="font-size:14px;"><b>顺丰快递</b></td>
                    <td>顺丰快递、运费固定<应付金额的10%></td>
                    <td align="center">{{$total_amount*0.1}}</td>
                    <td align="center">￥0.00</td>
                    <td align="center">不支持保价</td>
                </tr>
                <tr>
                    <td align="center"><input type="radio" name="ch" class="ch" value="京东"/></td>
                    <td align="center" style="font-size:14px;"><b>京东</b></td>
                    <td>京东、运费固定<应付金额的1%></td>
                    <td align="center">{{$total_amount*0.01}}</td>
                    <td align="center">￥0.00</td>
                    <td align="center">不支持保价</td>
                </tr>
            </table> 
            
            <div class="two_t">
            	支付方式<font color="red" size="1">默认余额支付</font>
            </div>
            <ul class="pay">
                {{--<li class="checked" value="余额支付" id="balancepay">余额支付<div class="ch_img"></div></li>--}}
                {{--<li value="支付宝支付" id="alipay">支付宝支付<div class="ch_img"></div></li>--}}
                {{--<li value="微信支付" id="wxpay">微信支付<div class="ch_img"></div></li>--}}
                {{--<li value="银联支付" id="unionpay">银联支付<div class="ch_img"></div></li>--}}
                @foreach($paytype as $v)
                <li value="" id="{{$v->id}}" @if($v->pay_name=="余额支付")class="checked"@endif>{{$v->pay_name}}<div class="ch_img"></div></li>
                @endforeach
            </ul>
            
            <div class="two_t">
            	商品包装<font color="red" size="1">默认不要</font>
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="car_th" width="80"></td>
                <td class="car_th" width="490">名称</td>
                <td class="car_th" width="180">费用</td>
                <td class="car_th" width="180">免费额度</td>
                <td class="car_th" width="180">图片</td>
              </tr>
              <tr>
              	<td align="center"><input type="radio" name="pack" class="pack" value="不要包装" /></td>
                <td><b style="font-size:14px;">不要包装</b></td>
                <td align="center">5.00</td>
                <td align="center">￥0.00</td>
                <td align="center"></td>
              </tr>
              <tr>
              	<td align="center"><input type="radio" name="pack" class="pack" value="精品包装" /></td>
                <td><b style="font-size:14px;">精品包装</b></td>
                <td align="center">15.00</td>
                <td align="center">￥0.00</td>
                <td align="center"><a href="#" style="color:#ff4e00;">查看</a></td>
              </tr>
            </table>
            
            <div class="two_t">
            	其他信息
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
                @if ($total_amount >100)
              <tr>
                <td width="145" align="right" style="padding-right:0;"><b style="font-size:14px;">使用红包：</b></td>
                <td>
                	{{--<span class="fl" style="margin-left:50px; margin-right:10px;">选择已有红包</span>--}}
                    <select class="jj" name="city">
                      <option value="0" selected="selected">请选择</option>
                      <option value="1">50元</option>
                      <option value="2">30元</option>
                      <option value="3">20元</option>
                      <option value="4">10元</option>
                    </select>
                    <span class="fl" style="margin-left:50px; margin-right:10px;">输入红包序列号</span>
                    <span class="fl"><input type="text" value="" class="c_ipt" id="redcode" style="width:220px;" />
                        <span class="fr" style="margin-left:10px;"><button class="btn_tj" id="yz_cup">验证红包</button></span>
                </td>
			  </tr>
                @endif
              <tr valign="top">
                <td align="right" style="padding-right:0;"><b style="font-size:14px;">订单附言：</b></td>
                <td style="padding-left:0;"><textarea class="add_txt" style="width:860px; height:50px;"></textarea></td>
              </tr>
            </table>
            
            <table border="0" style="width:900px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tr>
                <td align="right">
                	{{--该订单完成后，您将获得 <font color="#ff4e00">1815</font> 积分 ，以及价值 <font color="#ff4e00">￥0.00</font> 的红包 <br />--}}
                    应付款金额: <font color="#ff4e00" id="t_amount">{{$total_amount}}</font>+ 配送费用: <font color="#ff4e00" id="e_mon">{{$total_amount*0.01}}</font><span id="pa"></span><br>
                            {{--- 红包费用: <font color="#ff4e00">￥15.00</font>--}}
                </td>
              </tr>
              <tr height="70">
                <td align="right">
                	<b style="font-size:14px;">实付款金额：<span style="font-size:22px; color:#ff4e00;" id="s_amount">{{$total_amount+$total_amount*0.01}}</span></b>
                </td>
              </tr>
              <tr height="70">
                <td align="right"><a href="javascript:void(0)"><img src="images/btn_sure.gif" id="ok" /></a></td>
                {{--<td align="right"><a href="car_three?defaultaddress={{$defaultaddress->address}}&express="><img src="images/btn_sure.gif" /></a></td>--}}
              </tr>
            </table>

        </div>
    </div>
	<!--End 第二步：确认订单信息 End-->

    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script>
        //选择支付方式
        $(".pay li").on("click",function () {
            $(this).siblings('li').removeClass('checked');  // 删除其他兄弟元素的样式
            $(this).addClass('checked');     // 添加当前元素的样式

        })
        //配送方式
        $(".ch").on("click",function () {
            var express = $("input[name=ch]:checked").val();//快递配送方式
            var t_amount = $("#t_amount").html()        //订单应付金额
            // alert(t_amount)
            if(express=='顺丰快递'){
                express_money = t_amount*0.1
                $("#e_mon").html(express_money)
                var s_amount = $("#s_amount").html(parseInt(t_amount)+parseInt(express_money)+parseInt(packm))        //订单实付金额
            } else {
                express_money = t_amount*0.01
                $("#e_mon").html(express_money)
                var s_amount = $("#s_amount").html(parseInt(t_amount)+parseInt(express_money)+parseInt(packm))        //订单实付金额
            }
        })
        //包装方式
        $(".pack").on("click",function () {
            var pack = $("input[class=pack]:checked").val();//
            var t_amount = $("#t_amount").html()        //订单应付金额
            if(pack=='不要包装'){
                packm = 5
                $("#pa").html('+ 包装费用: <font color="#ff4e00">'+packm+'</font>')
                $("#s_amount").html(parseInt(t_amount)+parseInt(express_money)+parseInt(packm))
            }else {
                packm = 15
                $("#pa").html('+ 包装费用: <font color="#ff4e00">'+packm+'</font>')
                $("#s_amount").html(parseInt(t_amount)+parseInt(express_money)+parseInt(packm))
            }
        })
        

        $("#ok").on("click",function () {
            var express = $("input[name=ch]:checked").val();//快递配送方式
            var t_amount = $("#t_amount").html()        //订单应付金额
            var s_amount = $("#s_amount").html()        //订单实付金额
            var paytype = $(".checked").attr('id')          //支付方式
            var address_id = $("#address_id").html()    //收货地址ID

            // alert(paytype)


            $.ajax({
                url:"confirmorder",
                type:"GET",
                data:{'paytype':paytype,'express':express,'s_amount':s_amount,'address_id':address_id},
                success:function (e) {
                        // console.log(e)
                    if(e.code==20000){
                        window.location.href="car_three?paytype="+paytype+"&express="+express+"&s_amount="+s_amount
                    }
                }
            })
        })

    </script>


   @endsection
