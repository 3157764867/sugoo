@extends('layout.uu_main')

@section('content')
		<div class="m_right">
            <p></p>
            <div class="mem_tit">账户安全</div>

            <div class="m_des" id="phoneInfo" style="display:block;">
                <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
                  <tr height="45">
                    <td width="80" align="right">手机号 &nbsp; &nbsp;</td>
                    <td><span id="myphone">{{$phone}}</span></td>
                    <td style="float:right;"><button id="phone">修改</button></td>
                  </tr>
                </table>
            </div>

            <div class="m_des" id="updatePhone" style="display:none;">
                <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
                  <tr height="45">
                    <td width="80" align="right">原手机 &nbsp; &nbsp;</td>
                    <td> <input type="text" class="add_ipt" style="width:180px;" id="oldPhone"/>&nbsp; <font color="#ff4e00" id="old_status">*</font></td>
                  </tr>
                  <tr height="45">
                    <td align="right">新手机 &nbsp; &nbsp;</td>
                    <td><input type="text" class="add_ipt" style="width:180px;" id="newPhone"/>&nbsp; <font color="#ff4e00" id="new_status">*</font></td>
                  </tr>
                  <tr height="50">
                    <td>&nbsp;</td>
                    <td><input type="button" value="确认修改" class="btn_tj" id="p_submit"/> <input type="button" value="取消修改" class="btn_tj" id="p_reset"/></td>
                  </tr>
                </table>
            </div>

            <div class="m_des" id="updatePhone" style="display:none;">
                <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
                  <tr height="45">
                    <td align="right">新手机 &nbsp; &nbsp;</td>
                    <td><input type="text" class="add_ipt" style="width:180px;" id="newPhone"/>&nbsp; <font color="#ff4e00" id="new_status">*</font></td>
                  </tr>
                  <tr height="50">
                    <td>&nbsp;</td>
                    <td><input type="button" value="确认修改" class="btn_tj" id="p_submit"/> <input type="button" value="取消修改" class="btn_tj" id="p_reset"/></td>
                  </tr>
                </table>
            </div>

            

            <div class="m_des" id="emailInfo">
                <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
                  <tr height="45">
                    <td width="80" align="right">邮箱 &nbsp; &nbsp;</td>
                    <td><span id="myemail">
                    @if(!empty($email))
                        {{$email}}
                    </span></td>
                    <td style="float:right;" ><button class="email_up">修改</button></td>
                    @else
                    还未填写邮箱
                    </span></td>
                    <td style="float:right;" ><button class="email_up">添加</button></td>
                    @endif
                  </tr>
                </table>
            </div>

             <div class="m_des" id="updateEmail" style="display:none">
                <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
                  <tr height="45">
                    <td align="right">新邮箱 &nbsp; &nbsp;</td>
                    <td><input type="text" class="add_ipt" style="width:180px;" id="email"/>&nbsp; <font color="#ff4e00" id="e_status">*</font></td>
                  </tr>
                  <tr height="50">
                    <td>&nbsp;</td>
                    <td><input type="button" value="确认修改" class="btn_tj" id="e_submit"/> <input type="button" value="取消修改" class="btn_tj" id="e_reset"/></td>
                  </tr>
                </table>
            </div>


            <div class="m_des" id="passwordInfo">
                <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
                  <tr height="45">
                    <td width="80" align="right">密码 &nbsp; &nbsp;</td>
                    <td><span id="myPassword">************</span></td>
                    <td style="float:right;"><button id="password">修改</button></td>
                  </tr>
                </table>
            </div>

            <div class="m_des" id="updatePassword" style="display:none">
                <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
                  <tr height="45">
                    <td width="80" align="right">原密码 &nbsp; &nbsp;</td>
                    <td><input type="password" class="add_ipt" style="width:180px;" id="oldPassword"/>&nbsp; <font color="#ff4e00" id="oldp_status">*</font></td>
                  </tr>
                  <tr height="45">
                    <td align="right">新密码 &nbsp; &nbsp;</td>
                    <td><input type="password" class="add_ipt" style="width:180px;" id="onePassword"/>&nbsp; <font color="#ff4e00" id="op_status">*</font></td>
                  </tr>
                  <tr height="45">
                    <td align="right">确认密码 &nbsp; &nbsp;</td>
                    <td><input type="password" class="add_ipt" style="width:180px;" id="twoPassword"/>&nbsp; <font color="#ff4e00" id="tp_status">*</font></td>
                  </tr>
                  <tr height="50">
                    <td>&nbsp;</td>
                    <td>
                      <input type="button" value="确认修改" class="btn_tj" id="pwd_submit"/>
                      <input type="button" value="取消操作" class="btn_tj" id="pwd_reset"/>
                    </td>
                  </tr>
                </table>
            </div>

            <div class="m_des" id="cardInfo">
                <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
                  <tr height="45">
                    <td width="80" align="right">身份证号 &nbsp; &nbsp;</td>
                    <td>
                    @if(!empty($id_card))
                      <span class="myCard">{{$id_card}}</span>   
                    </td>
                    <td style="float:right;"><button class="id_card">修改</button></td>
                    @else
                        <span class="myCard">还未实名认证</span>
                    </td>
                    <td style="float:right;"><button class="id_card">添加</button></td> 
                    @endif
                  </tr>
                </table>
            </div>

            <div class="m_des" style="display:none" id="updataCard">
                  <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
                    <tr height="45">
                      <td align="right">真实姓名: &nbsp; &nbsp;</td>
                      <td><input type="text" class="add_ipt" style="width:180px;" id="reaname"/>&nbsp; <font color="#ff4e00" id="r_status">*</font></td>
                    </tr>
                    <tr height="45">
                      <td align="right">身份证号: &nbsp; &nbsp;</td>
                      <td><input type="text" value="" class="add_ipt" style="width:180px;" id="card_id"/>&nbsp; <font color="#ff4e00" id="c_status">*</font></td>
                    </tr>
                    <tr height="50">
                      <td>&nbsp;</td>
                      <td>
                        <input type="button" value="确认修改" class="btn_tj" id="c_submit"/>
                        <input type="button" value="取消操作" class="btn_tj" id="c_reset"/>
                      </td>
                    </tr>
                  </table>
            </div>

            <div class="m_des" id="payInfo">
                <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
                  <tr height="45">
                    <td width="80" align="right">支付密码 &nbsp; &nbsp;</td>
                    <td>
                    @if(!empty($pay_pwd))
                      <span class="myPay">已设置</span>   
                    </td>
                    <td style="float:right;" ><button class="payUp">修改</button></td>
                    @else
                        <span class="myPay">未设置支付密码</span>
                    </td>
                    <td style="float:right;"><button class="addPayone" id="paysos">设置支付密码</button></td> 
                    @endif
                  </tr>
                </table>
            </div>

            <div class="m_des" style="display:none" id="updataPay">
                  <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
                    <tr height="45">
                      <td align="right">原支付密码: &nbsp; &nbsp;</td>
                      <td><input type="text" class="add_ipt" style="width:180px;" id="oldPay"/>&nbsp; <font color="#ff4e00" id="pay1_status">*</font></td>
                    </tr>
                    <tr height="45">
                      <td align="right">新支付密码: &nbsp; &nbsp;</td>
                      <td><input type="text" value="" class="add_ipt" style="width:180px;" id="newPay1"/>&nbsp; <font color="#ff4e00" id="newPay1_status">*</font></td>
                    </tr>
                    <tr height="45">
                      <td align="right">确认支付密码: &nbsp; &nbsp;</td>
                      <td><input type="text" value="" class="add_ipt" style="width:180px;" id="newPay2"/>&nbsp; <font color="#ff4e00" id="newPay2_status">*</font></td>
                    </tr>
                    <tr height="50">
                      <td>&nbsp;</td>
                      <td>
                        <input type="button" value="确认修改" class="btn_tj" id="pay_submit"/>
                        <input type="button" value="取消操作" class="btn_tj" id="pay_reset"/>
                      </td>
                    </tr>
                  </table>
            </div>

            <div class="m_des" style="display:none" id="addPays">
                  <table border="0" style="width:880px;"  cellspacing="0" cellpadding="0">
                    <tr height="45">
                      <td align="right">新支付密码: &nbsp; &nbsp;</td>
                      <td><input type="text" value="" class="add_ipt" style="width:180px;" id="addPay1"/>&nbsp; <font color="#ff4e00" id="addPay1_status">*</font></td>
                    </tr>
                    <tr height="45">
                      <td align="right">确认支付密码: &nbsp; &nbsp;</td>
                      <td><input type="text" value="" class="add_ipt" style="width:180px;" id="addPay2"/>&nbsp; <font color="#ff4e00" id="addPay2_status">*</font></td>
                    </tr>
                    <tr height="50">
                      <td>&nbsp;</td>
                      <td>
                        <input type="button" value="确认修改" class="btn_tj" id="add_submit"/>
                        <input type="button" value="取消操作" class="btn_tj" id="add_reset"/>
                      </td>
                    </tr>
                  </table>
            </div>


    
    <script src="js/jquery-1.8.2.min.js"></script>

    <script>
        //显示修改密码
       $("#phone").click(function(){
         document.getElementById("phoneInfo").style.display="none";
         document.getElementById("updatePhone").style.display="block";
       });
       //隐藏修改密码
       $("#p_reset").click(function(){
         document.getElementById("phoneInfo").style.display="block";
         document.getElementById("updatePhone").style.display="none";
       });

       //验证文本框不为空和数据格式验证
       $("#oldPhone").blur(function(){
            var reg =/^[1][3,4,5,7,8,9][0-9]{9}$/;
            var inputval = $("#oldPhone").val();
            // alert(inputval);
             if(!reg.test(inputval)){
                $("#old_status").html("请输入正确的手机号");
             }else{
                $("#old_status").html('√');
             }
       })

       $("#newPhone").blur(function(){
            var reg =/^[1][3,4,5,7,8,9][0-9]{9}$/;
            var inputval = $("#newPhone").val();
            // alert(inputval);
             if(!reg.test(inputval)){
                $("#new_status").html("请输入正确的手机号");
             }else{
                $("#new_status").html('√');
             }
       })


       $("#p_submit").click(function(){
          var oldPhone = $("#oldPhone").val();
          var newPhone = $("#newPhone").val();
          if(oldPhone!='' && newPhone!=''){

            $.ajax({
                  type: "POST", //用POST方式传输
                  dataType: "json", //数据格式:JSON
                  url:'updatePhone', //目标地址
                  data:{"oldPhone":oldPhone,'newPhone':newPhone},
                  success: function (msg){
                      if(msg['error'] == '200'){
                          alert(msg['reason']);
                          $("#myphone").html(newPhone);
                          $("#oldPhone").val('');
                          $("#newPhone").val('');
                          document.getElementById("phoneInfo").style.display="block";
                          document.getElementById("updatePhone").style.display="none";
                      }else{
                          alert(msg['reason']);
                      }
                   }
            });

          }else{
            alert("请把数据填写完整！");
          }
       });
     </script>


     <script>
      //显示修改邮箱
       $(".email_up").click(function(){
         document.getElementById("emailInfo").style.display="none";
         document.getElementById("updateEmail").style.display="block";
       });
       //隐藏修改邮箱
       $("#e_reset").click(function(){
         document.getElementById("emailInfo").style.display="block";
         document.getElementById("updateEmail").style.display="none";
       });

        //邮箱验证
        $("#email").blur(function(){
              var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
              var inputval = $("#email").val();
               if(!reg.test(inputval)){
                  $("#e_status").html("请输入正确的邮箱格式");
               }else{
                  $("#e_status").html('√');
               }
          })

        //数据验证  提交数据到后台
        $("#e_submit").click(function(){
          var email = $("#email").val();
          if(email!=''){
            $.ajax({
                  type: "POST", //用POST方式传输
                  dataType: "json", //数据格式:JSON
                  url:'updateEmail', //目标地址
                  data:{"email":email},
                  success: function (msg){
                    // alert(msg);
                      if(msg['error'] == '200'){
                          alert(msg['reason']);
                          $("#myemail").html(email);
                          $(".email_up").html('修改');
                          $("#email").val('');
                          document.getElementById("emailInfo").style.display="block";
                          document.getElementById("updateEmail").style.display="none";
                      }else{
                          alert(msg['reason']);
                      }
                   }
            });

          }else{
            alert("请填写新的邮箱！");
          }
       });
     </script>


     <script>
        //显示修改身份认证
       $(".id_card").click(function(){
         document.getElementById("cardInfo").style.display="none";
         document.getElementById("updataCard").style.display="block";
       });
       //隐藏修改身份认证
       $("#c_reset").click(function(){
         document.getElementById("cardInfo").style.display="block";
         document.getElementById("updataCard").style.display="none";
       });

           //真实姓名验证
        $("#reaname").blur(function(){
             var reg = /^[\u4E00-\u9FA5]{2,4}$/;
             var inputval = $("#reaname").val();
             if(!reg.test(inputval)){
                $("#r_status").html("请输入2-4位汉字");
             }else{
                $("#r_status").html('√');
             }
        })
        //身份证号验证
        $("#card_id").blur(function(){
             var reg = /^\d{17}(\d|x)$/i;
             var inputval = $("#card_id").val();
             if(!reg.test(inputval)){
                $("#c_status").html("请输入正确的身份证号");
             }else{
                $("#c_status").html('√');
             }  
        })

       //数据验证  提交数据到后台
        $("#c_submit").click(function(){
          var reaname = $("#reaname").val();
          var card_id = $("#card_id").val();
          if(reaname!='' && card_id!=''){
            $.ajax({
                  type: "POST", //用POST方式传输
                  dataType: "json", //数据格式:JSON
                  url:'updateCard', //目标地址
                  data:{"reaname":reaname,"card_id":card_id},
                  success: function (msg){
                      if(msg['error'] == '200'){
                          alert(msg['reason']);
                          $(".myCard").html(card_id);
                          $("#reaname").val('');
                          $("#card_id").val('');
                          document.getElementById("cardInfo").style.display="block";
                          document.getElementById("updataCard").style.display="none";
                      }else{
                          alert(msg['reason']);
                      }
                   }
            });

          }else{
            alert("请认真填写数据！");
          }
       });
     </script>

    <script>
      //显示修改密码
       $("#password").click(function(){
         document.getElementById("passwordInfo").style.display="none";
         document.getElementById("updatePassword").style.display="block";
       });
       //隐藏修改密码
       $("#pwd_reset").click(function(){
         document.getElementById("passwordInfo").style.display="block";
         document.getElementById("updatePassword").style.display="none";
       });

       //密码格式验证
      $("#oldPassword").blur(function(){
            var reg = /^([a-zA-Z0-9]|[_]){5,20}$/;
            var inputval = $("#oldPassword").val();
             if(!reg.test(inputval)){
                $("#oldp_status").html("请输入5-20位密码!可由数字字母下划线组成");
             }else{
                $("#oldp_status").html('√');
             }
        })

      $("#onePassword").blur(function(){
            var reg = /^([a-zA-Z0-9]|[_]){5,20}$/;
            var inputval = $("#onePassword").val();
             if(!reg.test(inputval)){
                $("#op_status").html("请输入5-20位密码!可由数字字母下划线组成");
             }else{
                $("#op_status").html('√');
             }
        })

      $("#twoPassword").blur(function(){
            var reg = /^([a-zA-Z0-9]|[_]){5,20}$/;
            var inputval = $("#twoPassword").val();
             if(!reg.test(inputval)){
                $("#tp_status").html("请输入5-20位密码!可由数字字母下划线组成");
             }else{
                $("#tp_status").html('√');
             }
             checktwo();
        })


      function checktwo(){
        var one = $("#onePassword").val();
        var two = $("#twoPassword").val();
        if(one != two)
         {
            $("#op_status").html("两次密码不一致");
            $("#tp_status").html("两次密码不一致");
            return false;
         }
         else
         {
            $("#op_status").html("√");
            $("#tp_status").html("√");
            return true;
         }
      }


      //数据验证  提交数据到后台
        $("#pwd_submit").click(function(){
          var onePassword = $("#onePassword").val();
          var twoPassword = $("#twoPassword").val();
          var oldPassword = $("#oldPassword").val();

          if(onePassword!='' && twoPassword!='' && oldPassword!='' && checktwo()!=false){
            // alert(1);
            $.ajax({
                  type: "POST", //用POST方式传输
                  dataType: "json", //数据格式:JSON
                  url:'updatePassword', //目标地址
                  data:{"onePassword":onePassword,"oldPassword":oldPassword},
                  success: function (msg){
                      if(msg['error'] == '200'){
                          alert(msg['reason']);
                          $("#onePassword").val('');
                          $("#twoPassword").val('');
                          $("#oldPassword").val('');
                          document.getElementById("passwordInfo").style.display="block";
                          document.getElementById("updatePassword").style.display="none";
                      }else{
                          alert(msg['reason']);
                      }
                   }
            });

          }else{
            alert("请认真填写数据！");
          }
       });
    </script>

    <script>
         //显示修改支付密码
        $(".payUp").click(function(){
           document.getElementById("payInfo").style.display="none";
           document.getElementById("updataPay").style.display="block";
        });
         //隐藏修改支付密码
        $("#pay_reset").click(function(){
           document.getElementById("payInfo").style.display="block";
           document.getElementById("updataPay").style.display="none";
        });

         //支付密码格式验证
        $("#oldPay").blur(function(){
              var reg = /^\d{6}$/;
              var inputval = $("#oldPay").val();
               if(!reg.test(inputval)){
                  $("#pay1_status").html("请输入六位纯数字");
               }else{
                  $("#pay1_status").html('√');
               }
          })
        $("#newPay1").blur(function(){
              var reg = /^\d{6}$/;
              var inputval = $("#newPay1").val();
               if(!reg.test(inputval)){
                  $("#newPay1_status").html("请输入六位纯数字");
               }else{
                  $("#newPay1_status").html('√');
               }
          })
        $("#newPay2").blur(function(){
              var reg = /^\d{6}$/;
              var inputval = $("#newPay2").val();
               if(!reg.test(inputval)){
                  $("#newPay2_status").html("请输入六位纯数字");
               }else{
                  $("#newPay2_status").html('√');
               }
               checkPay();
          })


        function checkPay(){
          var p_old = $("#newPay1").val();
          var p_new = $("#newPay2").val();
          if(p_old != p_new)
           {
              $("#newPay1").html("两次密码不一致");
              $("#newPay2").html("两次密码不一致");
              return false;
           }
           else
           {
              $("#newPay1").html("√");
              $("#newPay2").html("√");
              return true;
           }
        }
        //数据验证  提交数据到后台
          $("#pay_submit").click(function(){
            var newPay1 = $("#newPay1").val();
            var newPay2 = $("#newPay2").val();
            var oldPay = $("#oldPay").val();

            if(oldPay!='' && newPay1!='' && newPay2!='' && checkPay()!=false){
              // alert(1);
              $.ajax({
                    type: "POST", //用POST方式传输
                    dataType: "json", //数据格式:JSON
                    url:'updatePay', //目标地址
                    data:{"newPay1":newPay1,"oldPay":oldPay},
                    success: function (msg){
                        if(msg['error'] == '200'){
                            alert(msg['reason']);
                            $("#newPay1").val('');
                            $("#newPay2").val('');
                            $("#oldPay").val('');
                            document.getElementById("payInfo").style.display="block";
                            document.getElementById("updataPay").style.display="none";
                        }else{
                            alert(msg['reason']);
                        }
                     }
              });

            }else{
              alert("请认真填写数据！");
            }
         });
    </script>



     <script>
      //显示修改支付密码
       $(".addPayone").click(function(){
         document.getElementById("payInfo").style.display="none";
         document.getElementById("addPays").style.display="block";
       });
       //隐藏修改支付密码
       $("#add_reset").click(function(){
         document.getElementById("payInfo").style.display="block";
         document.getElementById("addPays").style.display="none";
       });

       // 支付密码格式验证
      $("#addPay2").blur(function(){
            var reg = /^\d{6}$/;
            var inputval = $("#addPay2").val();
             if(!reg.test(inputval)){
                $("#addPay2_status").html("请输入六位纯数字");
             }else{
                $("#addPay2_status").html('√');
             }
             checkAddPay();
        })
      $("#addPay1").blur(function(){
            var reg = /^\d{6}$/;
            var inputval = $("#addPay1").val();
             if(!reg.test(inputval)){
                $("#addPay1_status").html("请输入六位纯数字");
             }else{
                $("#addPay1_status").html('√');
             }
        })
      

      function checkAddPay(){
        var addold = $("#addPay1").val();
        var addnew = $("#addPay2").val();
        if(addold != addnew)
         {
            $("#addPay1_status").html("两次密码不一致");
            $("#addPay2_status").html("两次密码不一致");
            return false;
         }
         else
         {
            $("#addPay1_status").html("√");
            $("#addPay2_status").html("√");
            return true;
         }
      }
      //数据验证  提交数据到后台
        $("#add_submit").click(function(){
          var addPay1 = $("#addPay1").val();
          var addPay2 = $("#addPay2").val();
          if(addPay1!='' && addPay2!='' && checkAddPay()!=false){
            // alert(1);
            $.ajax({
                  type: "POST", //用POST方式传输
                  dataType: "json", //数据格式:JSON
                  url:'addPay', //目标地址
                  data:{"addPay1":addPay1},
                  success: function (msg){
                      if(msg['error'] == '200'){
                          alert(msg['reason']);
                          window.location.href="safe";
                      }else{
                          alert(msg['reason']);
                      }
                   }
            });
          }else{
            alert("请认真填写数据！");
          }
       });
    </script>


     @endsection
