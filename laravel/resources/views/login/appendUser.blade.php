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
                  <span class="fl" style="font-size:24px;">完善用户信息</span>
                </td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;用户名 &nbsp;</td>
                <td><input type="text" value="{{$username}}" class="l_user username" name="username" /><span class="name_status"></span></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;密码 &nbsp;</td>
                <td><input type="password" value="" class="l_pwd one_pwd" name="password" /><span class="one_status"></span></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;确认密码 &nbsp;</td>
                <td><input type="password" value="" class="l_pwd two_pwd" name="two" /><span class="two_status"></span></td>
              </tr>
              <tr height="60">
                <td>&nbsp;</td>
                <td><input type="submit" value="确定" class="log_btn register" /></td>
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
  $(function(){
        var reg = /^[\u4E00-\u9FA5]{2,6}$/;
        var inputval = $(".username").val();
         if(!reg.test(inputval)){
            $(".name_status").html("请输入2-6位汉字");
         }else{
            $(".name_status").html('');
         }
  })
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
        var two_pwd = $(".two_pwd").val();
        var one_pwd = $(".one_pwd").val();
        var username = $(".username").val();
        if(two_pwd!='' && one_pwd!='' && username!=''){
             $.ajax({
                  type: "POST", //用POST方式传输
                  dataType: "json", //数据格式:JSON
                  url:'appendUser', //目标地址
                  data:{"password":one_pwd,"username":username},
                  success: function (msg){
                      // console.log(msg);
                      if(msg['error'] == '200'){
                          alert(msg['reason']);
                          window.location.href= "{{ url('index') }}";
                      }else{
                          alert(msg['reason']);
                          window.location.href= "{{ url('appendInfo') }}";
                      }
                   }
            });
        }else{
          alert("请填写完整数据");
          return false;
        }
    })

</script>
