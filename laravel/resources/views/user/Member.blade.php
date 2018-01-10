@extends('layout.user_main')


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
                            上一次登录时间: {{$user['login_time']}}<br />
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
                <td width="33%">返还积分：<span>99R</span></td>
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
            <table border="0" class="acc_tab" style="width:870px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="td_l">用户ID： </td>
                <td>{{$user['u_id']}}</td>
              </tr>
              <tr>
                <td class="td_l b_none">身份证号：</td>
                <td>
                @if(!empty($user['id_card']))
                  {{$user['id_card']}}
                @else
                  未设置
                @endif
                </td>
              </tr>
              <tr>
                <td class="td_l b_none">电  话：</td>
                <td>
                @if(!empty($user['phone']))   
                  {{$user['phone']}}
                @else
                  未设置
                @endif
                </td>
              </tr>
              <tr>
                <td class="td_l">邮   箱： </td>
                <td>
                  @if(!empty($user['email']))   
                    {{$user['email']}}
                  @else
                    未设置
                  @endif
                </td>
              </tr>
              <tr>
                <td class="td_l b_none">注册时间：</td>
                <td><?php  echo substr($user['regis_time'],0,10);?></td>
              </tr>
              <tr>
                <td class="td_l">完成订单：</td>
                <td>0</td>
              </tr>
              <tr>
              <tr>
                <td class="td_l">登录次数：</td>
                <td>3</td>
              </tr>
            </table> 
        </div>
        @endsection
	