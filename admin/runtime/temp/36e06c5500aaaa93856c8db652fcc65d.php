<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"D:\phpStudy\WWW\sugoo\admin\public/../application/index\view\trading\trading.html";i:1515473213;}*/ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>DouPHP 管理中心</title>
<meta name="Copyright" content="Douco Design." />
<link href="/sugoo/admin/public/static/css/public.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/sugoo/admin/public/static/js/jquery.min.js"></script>
<script type="text/javascript" src="/sugoo/admin/public/static/js/global.js"></script>
<link rel="stylesheet" type="text/css" href="/sugoo/admin/public/static/js/codebase/GooCalendar.css"/>

<script  type="text/javascript" src="/sugoo/admin/public/static/js/codebase/jquery-1.3.2.min.js"></script>
<script  type="text/javascript" src="/sugoo/admin/public/static/js/codebase/GooFunc.js"></script>
<script  type="text/javascript" src="/sugoo/admin/public/static/js/codebase/GooCalendar.js"></script>
</head>
<body id="tbody">
<div id="dcWrap"> <div id="dcHead">
 <div id="head">
  <div class="logo"><a href="index.html"><img src="/sugoo/admin/public/static/images/dclogo.gif" alt="logo"></a></div>
  <div class="nav">
   <ul>
    <li class="M"><a href="JavaScript:void(0);" class="topAdd">新建</a>
     <div class="drop mTopad"><a href="product.php?rec=add">商品</a> <a href="article.php?rec=add">评论</a> <a href="show.html">首页幻灯</a>  <a href="manager.php?rec=add">管理员</a> <a href="link.html"></a> </div>
    </li>
   </ul>
   <ul class="navRight">
    <li class="M noLeft"><a href="JavaScript:void(0);">您好，admin</a>
     <div class="drop mUser">
      <a href="manager.php?rec=edit&id=1">编辑我的个人资料</a>
      <a href="manager.php?rec=cloud_account">设置云账户</a>
     </div>
    </li>
    <li class="noRight"><a href="login.php?rec=logout">退出</a></li>
   </ul>
  </div>
 </div>
</div>
<!-- dcHead 结束 --> <div id="dcLeft"><div id="menu">
 <ul class="top">
  <li><a href="<?php echo url('index/index/index'); ?>"><i class="home"></i><em>管理首页</em></a></li>
 </ul>
 <ul>
  <li><a href="<?php echo url('index/system/index'); ?>"><i class="system"></i><em>系统设置</em></a></li>
  <li><a href="<?php echo url('index/show/index'); ?>"><i class="show"></i><em>首页幻灯广告</em></a></li>
 </ul>
   <ul>
  <li><a href="<?php echo url('index/goods/index'); ?>"><i class="productCat"></i><em>商品管理</em></a></li>
 </ul>
  <ul>
  <li><a href="<?php echo url('index/Category/index'); ?>"><i class="productCat"></i><em>商品分类</em></a></li>
 </ul>
  <ul>
  <li><a href="<?php echo url('index/attr/index'); ?>"><i class="productCat"></i><em>商品属性</em></a></li>
 </ul>
  <ul>
  <li><a href="<?php echo url('index/brand/index'); ?>"><i class="productCat"></i><em>商品品牌</em></a></li>
 </ul>
 <ul>
  <li><a href="<?php echo url('index/vip/index'); ?>"><i class="productCat"></i><em>会员管理</em></a></li>
  <li><a href="<?php echo url('index/vip/log'); ?>"><i class="product"></i><em>会员列表</em></a></li>
 </ul>
 <ul>
  <li><a href="<?php echo url('index/order/index'); ?>"><i class="productCat"></i><em>订单管理</em></a></li>
 </ul>
 <ul>
  <li><a href="<?php echo url('index/logistics/index'); ?>"><i class="productCat"></i><em>物流管理</em></a></li>
 </ul>
 <ul>
  <li><a href="<?php echo url('index/trading/index'); ?>"><i class="productCat"></i><em>交易管理</em></a></li>
 </ul>
 <ul>
  <li><a href="<?php echo url('index/pay/index'); ?>"><i class="productCat"></i><em>支付管理</em></a></li>
 </ul>
 <ul>
  <li><a href="<?php echo url('index/money/index'); ?>"><i class="productCat"></i><em>平台资金管理</em></a></li>
 </ul>
 <ul>
  <li><a href="<?php echo url('index/marketing/index'); ?>"><i class="productCat"></i><em>营销管理</em></a></li>
 </ul>
  <ul>
  <li><a href="<?php echo url('index/talk/index'); ?>"><i class="productCat"></i><em>评论管理</em></a></li>
 </ul>
   <ul class="bot">
  <li><a href="<?php echo url('index/Manager/index'); ?>"><i class="manager"></i><em>网站管理员</em></a></li>
  <li><a href="<?php echo url('index/Manager/log'); ?>"><i class="managerLog"></i><em>操作记录</em></a></li>
 </ul>
</div></div>
 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>交易记录</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <!-- <h3><a href="<?php echo url('index/trading/add'); ?>" class="actionBtn add">添加品牌</a>品牌列表</h3> -->
    <div class="filter">
    <!-- <form action="product.php" method="post"> -->
     <input type="text" value="" id="calen2"  class="inpMain" placeholder="开始时间" />--><input type="text" value="" id="calen1" class="inpMain" placeholder="结束时间" /><input name="button" class="btnGray" type="submit" value="搜索" onclick="page(1)" />
    <!-- </form> -->
   
    </div>
        <div id="list">
    <form name="action" method="post" action="product.php?rec=action">
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
        <th width="22" align="center"><input name='chkall' type='checkbox' id='chkall' onclick='selectcheckbox(this.form)' value='check'></th>
        <th width="40" align="center">编号</th>
        <th align="left">交易类型</th>
        <th width="300" align="center">交易金额</th>
       <th width="200" align="center">交易日期</th>
        <th width="110" align="center">操作</th>
      </tr>
      <?php foreach($data as $k=>$v): ?>
            <tr>
        <td align="center"><input type="checkbox" name="checkbox[]" value="<?php echo $v['pr_id']; ?>" /></td>
        <td align="center"><?php echo $v['pr_id']; ?></td>
        <td><a href="javascript:void(0)"><?php echo $v['pr_type']; ?></a></td>
        <td align="center"><?php echo $v['pr_price']; ?></td>
        <td align="center"><?php echo $v['pr_time']; ?></td>
        <td align="center">
                    <a href="javascript:void(0)" id="dis" data-id="<?php echo $v['pr_id']; ?>">删除</a>
                 </td>
      </tr>
         <?php endforeach; ?>  
          </table>
   <!--  <div class="action">
     <select name="action" onchange="douAction()">
      <option value="0">请选择...</option>
      <option value="del_all">删除</option>
      <option value="category_move">移动分类至</option>
     </select>
     <select name="new_cat_id" style="display:none">
      <option value="0">未分类</option>
                  <option value="1"> 电子数码</option>
                        <option value="4">- 智能手机</option>
                        <option value="5">- 平板电脑</option>
                        <option value="2"> 家居百货</option>
                        <option value="3"> 母婴用品</option>
                 </select>
     <input name="submit" class="btn" type="submit" value="执行" />
    </div> -->
    </form>
     <div class="pager">总计 <?php echo $total; ?>个记录，共 <?php echo $totalpage; ?> 页，当前第 <span id="span">1</span> 页 

      <?php echo $page; ?>
    </div>
    <div class="clear"></div>
   <!--  <div class="pager">总计 15 个记录，共 1 页，当前第 1 页 | <a href="product.php?page=1">第一页</a> 上一页 下一页 <a href="product.php?page=1">最末页</a></div>    -->            
  </div>
 </div>
 <div class="clear"></div>
<div id="dcFooter">
 <div id="footer">
  <div class="line"></div>
  <ul>
   版权所有 © 2013-2015 漳州豆壳网络科技有限公司，并保留所有权利。
  </ul>
 </div>
</div><!-- dcFooter 结束 -->
<div class="clear"></div> </div>
<script type="text/javascript">

onload = function()
{
 document.forms['action'].reset();
}

function douAction()
{
 var frm = document.forms['action'];
 frm.elements['new_cat_id'].style.display = frm.elements['action'].value == 'category_move' ? '' : 'none';
}
   function page(page)
  {
     var start=$('#calen2').val();
    var end=$('#calen1').val();
    $.ajax({
      url:'index',
      data:{page:page,start,start,end:end},
      type:'get',
      dataType:'json',
      success:function(msg)
      {
        console.log(msg);
        $('#tbody').html(msg)
        $('#span').html(page)
      }
    })
  }
   $(document).on('click','#dis',function()
  {
    if(confirm('你确定删除吗'))
    {
      var id=$(this).data('id');
       $.ajax({
        url:'del',
        data:{id:id},
        type:'get',
        dataType:'json',
        success:function(e)
        {
          console.log(e)
          if(e)
          {
              location.reload();
          }
          else
          {
              alert('删除失败')
          }
        }
       })
    }
       
  })
  
</script>
</body>
<script type="text/javascript">
var property2={
  divId:"demo2",//日历控件最外层DIV的ID
  needTime:true,//是否需要显示精确到秒的时间选择器，即输出时间中是否需要精确到小时：分：秒 默认为FALSE可不填
  yearRange:[1970,3000],//可选年份的范围,数组第一个为开始年份，第二个为结束年份,如[1970,2030],可不填
  week:['日','一','二','三','四','五','六'],//数组，设定了周日至周六的显示格式,可不填
  month:['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],//数组，设定了12个月份的显示格式,可不填
  format:"yyyy-MM-dd hh:mm:ss"
  /*设定日期的输出格式,可不填*/
};
//var property={
//  divId:"demo",
//  needTime:true,
//  fixid:"fff"
//  /*决定了日历的显示方式，默认不填时为点击INPUT后出现，但如果填了此项，日历控件将始终显示在一个id为其值（如"fff"）的DIV中（且此DIV必须存在）*/
//};
$(document).ready(function(){
//  canva1=$.createGooCalendar("calen",property);
  canva2=$.createGooCalendar("calen2",property2);
  //canva2.setDate({year:2008,month:11,day:22,hour:14,minute:52,second:45});
});
$(document).ready(function(){
//  canva1=$.createGooCalendar("calen",property);
    canva2=$.createGooCalendar("calen1",property2);
    //canva2.setDate({year:2008,month:11,day:22,hour:14,minute:52,second:45});
});
 $('#search').click(function()
   {
        var start=$('#calen2').val();
        var end=$('#calen1').val();
        alert(end)
        $.ajax({
          url:'index',
          data:{start:start,end:end},
          type:'get',
          dataType:'json',
          success:function()
          {

          }
        })
   })
</script>
</html>
