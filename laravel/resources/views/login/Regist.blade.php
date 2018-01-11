<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link type="text/css" rel="stylesheet" href="css/style.css" />
    <!--[if IE 6]>
    <script src="js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->    
    <script type="text/javascript" src="js/jquery-1.11.1.min_044d0927.js"></script>
  <script type="text/javascript" src="js/jquery.bxslider_e88acd1b.js"></script>
    
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
    
<title>尤洪</title>
</head>
<body>  
<!--Begin Header Begin-->
<div class="soubg">
  <div class="sou">
        <span class="fr">
          <span class="fl">你好，请<a href="login">登录</a>&nbsp; <a href="regis" style="color:#ff4e00;">免费注册</a></span>
            <span class="fl">|&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="images/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>
<!--End Header End--> 
<!--Begin Login Begin-->
<div class="log_bg">  
    <div class="top">
        <div class="logo"><a href="index"><img src="images/logo.png" /></a></div>
    </div>
  <div class="regist">
      <div class="log_img"><img src="images/l_img.png" width="611" height="425" /></div>
    <div class="reg_c">
            <table border="0" style="width:420px; font-size:14px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tr height="50" valign="top">
                <td width="95">&nbsp;</td>
                <td>
                  <span class="fl" style="font-size:24px;">注册</span>
                    <span class="fr">已有商城账号，<a href="login" style="color:#ff4e00;">我要登录</a></span>
                </td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;用户名 &nbsp;</td>
                <td><input type="text" value="" class="l_user username" name="username" /><span class="name_status"></span></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;密码 &nbsp;</td>
                <td><input type="password" value="" class="l_pwd one_pwd" name="password" /><span class="one_status"></span></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;确认密码 &nbsp;</td>
                <td><input type="password" value="" class="l_pwd two_pwd" name="two" /><span class="two_status"></span></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;邮箱 &nbsp;</td>
                <td><input type="text" value="" class="l_email email" name="email" /><span class="email_status"></span></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;手机 &nbsp;</td>
                <td><input type="text" value="" class="l_tel phone" name="phone" /><span class="phone_status"></span></td>
              </tr>
              <tr height="50">
                <td align="right"> <font color="#ff4e00">*</font>&nbsp;验证码 &nbsp;</td>
                <td>
                    <input type="text" class="l_ipt" id="yzm"/>
                    <button style="width:150px;height:40px;float:right" id="send">获取验证码</button>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td style="font-size:12px; padding-top:20px;">
                  <span style="font-family:'宋体';" class="fl">
                      <label class="r_rad"><input type="checkbox" /></label><label class="r_txt">我已阅读并接受《用户协议》</label>
                    </span>
                </td>
              </tr>
              <tr height="60">
                <td>&nbsp;</td>
                <td><input type="submit" value="立即注册" class="log_btn register" /></td>
              </tr>
            </table>
        </div>
    </div>
</div>
<!--End Login End--> 
<!--Begin Footer Begin-->
<div class="btmbg">
    <div class="btm">
        备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright ? 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
        <img src="images/b_1.gif" width="98" height="33" /><img src="images/b_2.gif" width="98" height="33" /><img src="images/b_3.gif" width="98" height="33" /><img src="images/b_4.gif" width="98" height="33" /><img src="images/b_5.gif" width="98" height="33" /><img src="images/b_6.gif" width="98" height="33" />
    </div>      
</div>
<!--End Footer End -->    
</body>
<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
<script>
  //用户名验证
  $(".username").blur(function(){
        var reg = /^[\u4E00-\u9FA5]{2,6}$/;
        var inputval = $(".username").val();
         if(!reg.test(inputval)){
            $(".name_status").html("请输入2-6位汉字");
         }else{
            $(".name_status").html('');
         }
    })

  //密码验证
  $(".one_pwd").blur(function(){
        var reg = /^([a-zA-Z0-9]|[_]){5,20}$/;
        var inputval = $(".one_pwd").val();
         if(!reg.test(inputval)){
            $(".one_status").html("请输入5-20位密码!可由数字字母下划线组成");
         }else{
            $(".one_status").html('');
         }
    })


  //确认密码验证
  $(".two_pwd").blur(function(){
        var reg = /^([a-zA-Z0-9]|[._]){5,20}$/;
        var inputval = $(".two_pwd").val();
         if(!reg.test(inputval)){
            $(".two_status").html("请输入5-20位密码!可由数字 字母 _ .组成");
         }else{
            $(".two_status").html('');
            checktwo();
         }
    })


  // 手机号验证
  $(".phone").blur(function(){
        var reg =/^[1][3,4,5,7,8,9][0-9]{9}$/;
        var inputval = $(".phone").val();
         if(!reg.test(inputval)){
            $(".phone_status").html("请输入正确的手机号");
         }else{
            $(".phone_status").html('');
         }
    })

  //邮箱验证
  $(".email").blur(function(){
        var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
        var inputval = $(".email").val();
         if(!reg.test(inputval)){
            $(".email_status").html("请输入正确的邮箱格式");
         }else{
            $(".email_status").html('');
         }
    })

  function checktwo(){

    var one = $(".one_pwd").val();
    var two = $(".two_pwd").val();
        if(one != two && one!='' && two!=''){
          $(".one_status").html("两次密码不相同！");
          $(".two_status").html("两次密码不相同！");
        }else{
          $(".one_status").html("");
          $(".two_status").html("");
        }
  }

  //提交验证
  $(".register").click(function(){
        var email = $(".email").val();
        var phone = $(".phone").val();
        var two_pwd = $(".two_pwd").val();
        var one_pwd = $(".one_pwd").val();
        var username = $(".username").val();
        var code = $("#yzm").val();
        if(email !='' && phone!='' &&　two_pwd!='' && one_pwd!='' && username!=''){
             $.ajax({
                  type: "POST", //用POST方式传输
                  dataType: "json", //数据格式:JSON
                  url:'addUser', //目标地址
                  data:{"email":email,"phone":phone,"password":one_pwd,"username":username,"code":code},
                  success: function (msg){
                      if(msg['error'] == '200'){
                          alert(msg['reason']);
                          window.location.href= "{{ url('login') }}";
                      }else{
                          alert(msg['reason']);
                          window.location.href= "{{ url('regis') }}";
                      }
                   }
            });
        }else{
          alert("请填写完整数据");
          return false;
        }
    })

  //发送短信
  $("#send").click(function(){
        var phone = $(".phone").val();
        $.ajax({
              type: "POST", //用POST方式传输
              dataType: "json", //数据格式:JSON
              url:'flash', //目标地址
              data:{"phone":phone},
              success: function (msg){
                  $("#send").html(msg['reason']);
                  // alert(msg);
               }
        });
    })

</script>
