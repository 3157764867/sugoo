<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"F:\phpstudy\WWW\sugoo\admin\public/../application/index\view\cupon\addcupon.html";i:1515200897;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>DouPHP 管理中心</title>
<meta name="Copyright" content="Douco Design." />
<link href="__CSS__public.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="__JS__jquery.min.js"></script>
<script type="text/javascript" src="__JS__global.js"></script>
</head>
<body>
<div id="dcWrap"> <div id="dcHead">
 <div id="head">
  <div class="logo"><a href="index.html"><img src="__IMG__dclogo.gif" alt="logo"></a></div>
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
 <ul>
  <li><a href="<?php echo url('index/marketing/index'); ?>"><i class="productCat"></i><em>活动审核</em></a></li>
  <li><a href="<?php echo url('index/cupon/index'); ?>"><i class="productCat"></i><em>红包管理</em></a></li>
  <li><a href="<?php echo url('index/marketing/index'); ?>"><i class="productCat"></i><em>秒杀活动</em></a></li>
 </ul>
</div></div>
 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>添加红包</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="<?php echo url('index/cupon/index'); ?>" class="actionBtn">红包列表</a>红包列表</h3>
    <form action="<?php echo url('index/cupon/add'); ?>" method="post">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <td width="90" align="right">批次类型</td>
       <td>
        <input type="text" name="cu_type" value="" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td width="90" align="right">申请人</td>
       <td>
        <input type="text" name="mark_man" value="" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td width="90" align="right">用途</td>
       <td>
        <input type="text" name="cu_use" value="" size="80" class="inpMain" />
       </td>
      </tr>
       <tr>
       <td width="90" align="right">审核人</td>
       <td>
        <input type="text" name="audit_man" value="" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td width="90" align="right">面值</td>
       <td>
        <input type="text" name="cu_money" value="" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td width="90" align="right">红包期限</td>
       <td>
        <input type="text" name="su_limit" value="" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td width="90" align="right">红包数量</td>
       <td>
        <input type="text" name="cu_num" value="" size="80" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td width="90" align="right">是否可以转送</td>
       <td>
        <input type="radio" name="is_give" value="0" size="80" checked/>是
        <input type="radio" name="is_give" value="1" size="80"/>否
       </td>
      </tr>
      <tr>
       <td></td>
       <td>
        <!-- <input type="hidden" name="token" value="21307217" /> -->
        <!-- <input type="hidden" name="id" value=""> -->
        <input class="btn" type="submit" value="提交" />
       </td>
      </tr>
     </table>
    </form>
           </div>
 </div>
 <div class="clear"></div>
<div id="dcFooter">
 <div id="footer">
  <div class="line"></div>
  <ul>
   版权所有 © 2018-2020 北京速Go网络科技有限公司，并保留所有权利。
  </ul>
 </div>
</div><!-- dcFooter 结束 -->
<div class="clear"></div> </div>
</body>
</html>

</script>
