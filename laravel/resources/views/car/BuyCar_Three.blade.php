@extends('layout.pro_main')

@section('content')
<!--End Menu End--> 
<div class="i_bg">  
    <div class="content mar_20">
    	<img src="images/img3.jpg" />        
    </div>
    
    <!--Begin 第三步：提交订单 Begin -->
    <div class="content mar_20">
    	
        <!--Begin 银行卡支付 Begin -->
    	<div class="warning">        	
            <table border="0" style="width:1000px; text-align:center;" cellspacing="0" cellpadding="0">
              <tr height="35">
                <td style="font-size:18px;">
                	感谢您在本店购物！您的订单已提交成功，请记住您的订单号: <font color="#ff4e00">2015092598275</font>
                </td>
              </tr>
              <tr>
                <td style="font-size:14px; font-family:'宋体'; padding:10px 0 20px 0; border-bottom:1px solid #b6b6b6;">
                	您选定的配送方式为: <font color="#ff4e00">申通快递</font>； &nbsp; &nbsp;您选定的支付方式为: <font color="#ff4e00">微信</font>； &nbsp; &nbsp;您的应付款金额为: <font color="#ff4e00">￥888.00</font>
                </td>
              </tr>
              <tr>
                <td style="padding:20px 0 30px 0; font-family:'宋体';">
                	银行名称 收款人信息：全称 ××× ；帐号或地址 ××× ；开户行 ×××。 <br />
                    注意事项：办理电汇时，请在电汇单“汇款用途”一栏处注明您的订单号。
                </td>
              </tr>
              <tr>
                <td>
                  <div class="btn_u"  style="margin:0 auto; padding:0 20px; width:120px;">
                    <a href="javascript:void(0)" onClick="dashangToggle()" class="dashang" title="打赏，支持一下">去支付</a>
                    <!-- <a href="wei_pay">立即使用微信支付</a> -->
                  </div>
                	<a href="#">首页</a> &nbsp; &nbsp; <a href="#">用户中心</a>
                </td>
              </tr>
            </table>        	
        </div>
        <!--Begin 银行卡支付 Begin -->
        
        <!--Begin 支付宝支付 Begin -->
    	<div class="warning">        	
            <table border="0" style="width:1000px; text-align:center;" cellspacing="0" cellpadding="0">
              <tr height="35">
                <td style="font-size:18px;">
                	感谢您在本店购物！您的订单已提交成功，请记住您的订单号: <font color="#ff4e00">2015092598275</font>
                </td>
              </tr>
              <tr>
                <td style="font-size:14px; font-family:'宋体'; padding:10px 0 20px 0; border-bottom:1px solid #b6b6b6;">
                	您选定的配送方式为: <font color="#ff4e00">申通快递</font>； &nbsp; &nbsp;您选定的支付方式为: <font color="#ff4e00">银行卡</font>； &nbsp; &nbsp;您的应付款金额为: <font color="#ff4e00">￥888.00</font>
                </td>
              </tr>
              <tr>
                <td style="padding:20px 0 30px 0; font-family:'宋体';">
                	支付宝网站(www.alipay.com) 是国内先进的网上支付平台。<br />
                    支付宝收款接口：在线即可开通，零预付，免年费，单笔阶梯费率，无流量限制。<br />
                    <a href="#" style="color:#ff4e00;">立即在线申请</a>
                </td>
              </tr>
              <tr>
                <td>
                	<div class="btn_u" style="margin:0 auto; padding:0 20px; width:120px;"><a href="pay">立即使用支付宝支付</a></div>
                	<a href="#">首页</a> &nbsp; &nbsp; <a href="#">用户中心</a>
                </td>
              </tr>
            </table>        	
        </div>
       <div class="hide_box"></div>
    <div class="shang_box">
      <a class="shang_close" href="javascript:void(0)" onClick="dashangToggle()" title="关闭"><img src="img/close.jpg" alt="取消" /></a>
        <img class="shang_logo" src="images/logo.png" alt="金林苑" />
      <div class="shang_tit">
        <p>感谢您的支持，我会继续努力的!</p>
      </div>
      <div class="shang_payimg">
       
      </div>
      <input type="hidden"  value="" id="ord">
        <div class="pay_explain"></div>
      <div class="shang_payselect">
        <!-- <div class="pay_item checked" data-id="alipay">
          <span class="radiobox"></span>
          <span class="pay_logo"><img src="img/alipay.jpg" alt="支付宝" /></span>
        </div> -->
        <div class="pay_item" data-id="weipay">
          <!-- <span class="radiobox"></span> -->
          <span class="pay_logo"><img src="img/wechat.jpg" alt="微信" id="wechat" /></span>

        </div>
       
      </div>
      <!-- <div class="shang_info">
        <p>打开<span id="shang_pay_txt">支付宝</span>扫一扫，即可进行扫码打赏哦</p>
        <p>Powered by <a href="http://www.jinliniuan.com" target="_blank" title="金林苑">金林苑</a>，分享从这里开始，精彩与您同在</p>
      </div> -->
    </div>
        
        
    </div>
	<!--End 第三步：提交订单 End--> 
@endsection
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
 
  // $(document).ready(function()
  // {
  //    $('#wechat').click(function()
  //     {
  //       alert(1)
  //     })
  // })
   // $(function(){
   //    $(".pay_item").click(function(){
   //      $(this).addClass('checked').siblings('.pay_item').removeClass('checked');
   //      var dataid=$(this).attr('data-id');
   //      $(".shang_payimg img").attr("src","img/"+dataid+"img.jpg");
   //      // $("#shang_pay_txt").text(dataid=="alipay"?"支付宝":"微信");
   //    });
   //  });
    function dashangToggle(){
      $(".hide_box").fadeToggle();
      $(".shang_box").fadeToggle();
      $.ajax({
        url:'wei_pay',
        data:'',
        type:'get',
        dataType:'json',
        success:function(e)
        {
          // console.log(e)
          var content="http://paysdk.weixin.qq.com/example/qrcode.php?data="+encodeURI(e.url);
          // console.log(content)
           $(".shang_payimg").html("<img src="+content+"  title=\"扫一扫\" />");
           $('#ord').val(e.order)
        }
      })
    }

  $(function(){
    setInterval(function(){check()},5000);
  })

  function check()
  {
    var order = $('#ord').val();
    $.ajax({
      url:'Search',
      type:'get',
      data:{out_trade_no:order},
      dataType:'json',
      success:function(data)
      {
        if (typeof foo !== 'null') {
            
      }
        if(data.trade_state == 'SUCCESS')
          location.href = 'PaySuccess?order='+order;
      }
    })  
  }
</script> 