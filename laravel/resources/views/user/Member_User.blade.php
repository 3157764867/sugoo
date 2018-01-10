@extends('layout.uu_main')

@section('content')
		<div class="m_right">
        	<div class="m_des">
            	<table border="0" style="width:870px; line-height:22px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="115"><img src="images/user.jpg" width="90" height="90" /></td>
                    <td>
                    	<div class="m_user">{{$user['username']}}</div>
                        <p>
                            等级：注册用户 <br />
                            上一次登录时间:{{$user['login_time']}}<br />
                        </p>
                    </td>
                  </tr>
                </table>	
            </div>
            
            <div class="mem_t">资产信息</div>
            <table border="0" class="mon_tab" style="width:870px; margin-bottom:20px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="33%">用户等级：<span style="color:#555555;">普通会员</span></td>
                <td width="33%">消费金额：<span>￥200元</span></td>
                <td width="33%">现有积分：<span>99R</span></td>
              </tr>
              <tr>
                <td>账户余额：<span>￥{{$user['u_money']}}元</span></td></td>
                <td>红包个数：<span style="color:#555555;">3个</span></td></td>
                <td>红包价值：<span>￥50元</span></td></td>
              </tr>
              <tr>
                <td colspan="3">订单提醒：
                	<font style="font-family:'宋体';">待付款(<span>0</span>) &nbsp; &nbsp; &nbsp; &nbsp; 待收货(<span>2</span>) &nbsp; &nbsp; &nbsp; &nbsp; 待评论(<span>1</span>)</font>
                </td>
              </tr>
            </table>

            <div class="mem_t">账号信息</div>
            <table border="0" class="mon_tab" style="width:870px; margin-bottom:20px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="40%">用户ID：<span style="color:#555555;">{{$user['u_id']}}</span></td>
                <td width="60%">邀请人：<span style="color:#555555;">邀请人姓名</span></td>
              </tr>
              <tr>
                <td>电&nbsp; &nbsp; 话：<span style="color:#555555;">
                @if(!empty($user['phone']))
                  {{$user['phone']}}
                @else
                  未设置
                @endif
                </span></td>
                <td>邮&nbsp; &nbsp; 箱：<span style="color:#555555;">
                @if(!empty($user['email']))
                  {{$user['email']}}
                @else
                  未设置
                @endif
                </span></td>
              </tr>
              <tr>
                <td>身份证号：<span style="color:#555555;">
                @if(!empty($user['id_card']))
                  {{$user['id_card']}}
                @else
                   未设置
                @endif 
                </span></td>
                <td>注册时间：<span style="color:#555555;">{{$user['regis_time']}}</span></td>
              </tr>
            </table> 
        </div>
@endsection