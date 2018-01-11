@extends('layout.uu_main')

@section('content')
		<div class="m_right">
            <p></p>
            <div class="mem_tit">收货地址</div>

			<div class="address">
            	<div class="a_close"><a href="#"><img src="images/a_close.png" /></a></div>
            	<table border="0" class="add_t" align="center" style="width:98%; margin:10px auto;" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="2" style="font-size:14px; color:#ff4e00;"></td>
                  </tr>
                  <tr>
                    <td align="right" width="80">收货人：</td>
                    <td>杨杨</td>
                  </tr>
                  <tr>
                    <td align="right">详细地址：</td>
                    <td>科华北路66号世外桃源写字楼3楼</td>
                  </tr>
                  <tr>
                    <td align="right">手机：</td>
                    <td>12345678998</td>
                  </tr>
                  <tr>
                    <td align="right">电子邮箱：</td>
                    <td>123456789@qq.com</td>
                  </tr>
                </table>
                <p align="right">
                	<a href="#" style="color:#ff4e00;">设为默认</a>&nbsp; &nbsp; &nbsp; &nbsp; <a href="#" style="color:#ff4e00;">编辑</a>&nbsp; &nbsp; &nbsp; &nbsp; 
                </p>
            </div>

            <div class="mem_tit">
            	<img src="images/add_ad.gif" id="add_address"/>
            </div>
            <table border="0" class="add_tab" style="width:930px;"  cellspacing="0" cellpadding="0" id="address_add" hidden>
              <tr>
                <td width="135" align="right">配送地区</td>
                <td colspan="3" style="font-family:'宋体';">
                        <select id="s_province" name="s_province" ></select>  
                        <select id="s_city" name="s_city" ></select>  
                        <select id="s_county" name="s_county"></select>
                        <script class="resources library" src="js/area.js" type="text/javascript"></script>
                        <script type="text/javascript">_init_area();</script>
                        <font color="red">（必填）</font>
                </td>
              </tr>
              <tr>
                <td align="right">收货人</td>
                <td style="font-family:'宋体';"><input type="text" placeholder="姓名" class="add_ipt" id="userName"/><font color="red" id="uname">（必填）</font> </td>
                <td align="right">电子邮箱</td>
                <td style="font-family:'宋体';"><input type="text" placeholder="电子邮箱" class="add_ipt" id="userEmail"/><font color="red" id="uemail">（必填）</font></td>
              </tr>
              <tr>
                <td align="right">详细地址</td>
                <td style="font-family:'宋体';"><input type="text" placeholder="详细地址" class="add_ipt" id="userAddress"/><font color="red" id="uaddress">（必填）</font></td>
                <td align="right">邮政编码</td>
                <td style="font-family:'宋体';"><input type="text" placeholder="邮政编码" class="add_ipt" /><font color="black" id="uaddress">（选填）</font></td>
              </tr>
              <tr>
                <td align="right">手机</td>
                <td style="font-family:'宋体';"><input type="text" placeholder="手机" class="add_ipt" id="userTel"/><font color="red" id="utel">（必填）</font></td>
                <td align="right">电话</td>
                <td style="font-family:'宋体';"><input type="text" placeholder="电话" class="add_ipt" /><font color="black" id="uaddress">（选填）</font></td>
              </tr>
              <tr>
                <td align="right">标志建筑</td>
                <td style="font-family:'宋体';"><input type="text" placeholder="标志建筑" class="add_ipt" /><font color="black" id="uaddress">（选填）</font></td>
                <td align="right">最佳送货时间</td>
                <td style="font-family:'宋体';"><input type="text" placeholder="最佳送货时间" class="add_ipt" /><font color="black" id="uaddress">（选填）</font></td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td><a href="javascript:void(0)" class="add_b" id="ok">确认</a></td>
                  <td></td>
              </tr>
            </table>
        </div>

        <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
        <script>

            $("#add_address").on("click",function () {
                $("#address_add").toggle()
            })

            // //收货地址验证
            $("#userAddress").on("blur",function () {
                var userAddress  =  $("#userAddress").val()
                if(userAddress==''){
                    $("#uaddress").html('收货地址不能为空！')
                }else {
                    var myreg =  /^[\u4E00-\u9FA5A-Za-z0-9]{5,50}$/;
                    if(!myreg.test(userAddress)) {
                        $("#uaddress").html('长度必须为5--30！')
                        return false;
                    }else {
                        $("#uaddress").html('<font color="green">√</font>')
                    }
                }
            })

            //收货人姓名验证
            $("#userName").on("blur",function () {
                var userName  =  $("#userName").val()
                if(userName==''){
                    $("#uname").html('收货人姓名不能为空！')
                }else {
                    var myreg =  /^[\u4E00-\u9FA5A-Za-z0-9]{3,10}$/;
                    if(!myreg.test(userName)) {
                        $("#uname").html('长度必须为3--10！')
                        return false;
                    }else {
                        $("#uname").html('<font color="green">√</font>')
                    }
                }
            })

            //邮箱验证
            $("#userEmail").on("blur",function () {
                var userEmail  =  $("#userEmail").val()
                if(userEmail==''){
                    $("#uemail").html('邮箱不能为空！')
                }else {
                    var myreg =  /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;
                    if(!myreg.test(userEmail)) {
                        $("#uemail").html('请输入有效的邮箱！')
                        return false;
                    }else {
                        $("#uemail").html('<font color="green">√</font>')
                    }
                }
            })

            //手机号验证
            $("#userTel").on("blur",function () {
                var userTel  =  $("#userTel").val()
                if(userTel==''){
                    $("#utel").html('手机号不能为空！')
                }else {
                    var myreg = /^((\d{3}-\d{8}|\d{4}-\d{7,8})|(1[3|5|7|8][0-9]{9}))$/;
                    if(!myreg.test(userTel)) {
                        // alert('请输入有效的手机号码！');
                        $("#utel").html('请输入有效的手机号码！')
                        return false;
                    }else {
                        $("#utel").html('<font color="green">√</font>')
                    }
                }
            })


            //添加确认收货地址
            $("#ok").on("click",function () {
                var userName  =  $("#userName").val()
                var userEmail  =  $("#userEmail").val()
                var userAddress  =  $("#s_province").val()+$("#s_city").val()+$("#s_county").val()+$("#userAddress").val()
                var userTel  =  $("#userTel").val()
                if(userName=='' || userTel=='' || userAddress=='' || userEmail==''){
                    return false
                }else {
                    $.ajax({
                        type:"GET",
                        url:"createOrderAdd",
                        data:{"username":userName,"useremail":userEmail,"useraddress":userAddress,"usertel":userTel},
                        dataType:"json",
                        success:function (e) {
                            // alert(e.data['add_man'])
                            if(e.code==20000){
                                $("#address_add").hide()
                                $(".address").prepend('<div>\n' +
                                    '            \t<div class="a_close"><a href="#"><img src="images/a_close.png" /></a></div>\n' +
                                    '            \t<table border="0" class="add_t" align="center" style="width:98%; margin:10px auto;" cellspacing="0" cellpadding="0">\n' +
                                    '                  <tr>\n' +
                                    '                    <td colspan="2" style="font-size:14px; color:#ff4e00;">'+e.data['add_man']+'</td>\n' +
                                    '                  </tr>\n' +
                                    '                  <tr>\n' +
                                    '                    <td align="right" width="80">收货人：</td>\n' +
                                    '                    <td>'+e.data['add_man']+'</td>\n' +
                                    '                  </tr>\n' +
                                    '                  <tr>\n' +
                                    '                    <td align="right">详细地址：</td>\n' +
                                    '                    <td>'+e.data['address']+'</td>\n' +
                                    '                  </tr>\n' +
                                    '                  <tr>\n' +
                                    '                    <td align="right">手机：</td>\n' +
                                    '                    <td>'+e.data['add_phone']+'</td>\n' +
                                    '                  </tr>\n' +
                                    '                  <tr>\n' +
                                    '                    <td align="right">电子邮箱：</td>\n' +
                                    '                    <td>'+e.data['add_email']+'</td>\n' +
                                    '                  </tr>\n' +
                                    '                </table>\n' +
                                    '                <p align="right">\n' +
                                    '                \t<a href="#" style="color:#ff4e00;">设为默认</a>&nbsp; &nbsp; &nbsp; &nbsp; <a href="#" style="color:#ff4e00;">编辑</a>&nbsp; &nbsp; &nbsp; &nbsp; \n' +
                                    '                </p>\n' +
                                    '            </div>')

                            }
                        }
                    })
                }
            })


        </script>

        <script type="text/javascript">

            var Gid  = document.getElementById ;

            var showArea = function(){

                Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" +

                    Gid('s_city').value + " - 县/区" +

                    Gid('s_county').value + "</h3>"

            }

            Gid('s_county').setAttribute('onchange','showArea()');

        </script>
  @endsection
