<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"E:\phpStudy\WWW\sugoo\admin\public/../application/index\view\show\show.html";i:1514892124;}*/ ?>

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
<div id="urHere">DouPHP 管理中心<b>></b><strong>首页幻灯广告</strong> </div>   <div class="mainBox imgModule">
    <h3>首页幻灯广告</h3>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
    <tr>
       <th>添加幻灯</th>
       <th>幻灯列表</th>
     </tr>
     <tr>
      <td width="350" valign="top">
       <form action="show.php?rec=insert" method="post" enctype="multipart/form-data">
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableOnebor">
         <tr>
          <td><b>幻灯名称</b>
<input type="text" name="show_name" value="" size="20" class="inpMain" />
          </td>
         </tr>
         <tr>
          <td><b>幻灯图片</b>
           <input type="file" name="show_img" class="inpFlie" />          </td>
         </tr>
         <tr>
          <td><b>链接地址</b>
           <input type="text" name="show_link" value="" size="40" class="inpMain" />
          </td>
         </tr>
         <tr>
          <td><b>排序</b>
<input type="text" name="sort" value="50" size="20" class="inpMain" />
          </td>
         </tr>
         <tr>
          <td>
                      <input type="hidden" name="token" value="79db104d" />
           <input name="submit" class="btn" type="submit" value="提交" />
          </td>
         </tr>
        </table>
       </form>
      </td>
      <td valign="top">
       <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableOnebor">
        <tr>
         <td width="100">幻灯名称</td>
         <td></td>
         <td width="50" align="center">排序</td>
         <td width="80" align="center">操作</td>
        </tr>
                <tr>
         <td><a href="http://www.weiqing.com/data/slide/20130514acunau.jpg" target="_blank"><img src="http://www.weiqing.com/data/slide/thumb/20130514acunau_thumb.jpg" width="100" /></a></td>
         <td>广告图片01</td>
         <td align="center">1</td>
         <td align="center"><a href="editshow.html?id=1">编辑</a> | <a href="delshow.htmlid=1">删除</a></td>
        </tr>
                <tr>
         <td><a href="http://www.weiqing.com/data/slide/20130514rjzqdt.jpg" target="_blank"><img src="http://www.weiqing.com/data/slide/thumb/20130514rjzqdt_thumb.jpg" width="100" /></a></td>
         <td>广告图片02</td>
         <td align="center">2</td>
         <td align="center"><a href="editshow.html?id=2">编辑</a> | <a href="delshow.htmlid=2">删除</a></td>
        </tr>
                <tr>
         <td><a href="http://www.weiqing.com/data/slide/20130514xxsctt.jpg" target="_blank"><img src="http://www.weiqing.com/data/slide/thumb/20130514xxsctt_thumb.jpg" width="100" /></a></td>
         <td>广告图片03</td>
         <td align="center">3</td>
         <td align="center"><a href="editshow.html?id=3">编辑</a> | <a href="delshow.htmlid=3">删除</a></td>
        </tr>
                <tr>
         <td><a href="http://www.weiqing.com/data/slide/20130523hiqafl.jpg" target="_blank"><img src="http://www.weiqing.com/data/slide/thumb/20130523hiqafl_thumb.jpg" width="100" /></a></td>
         <td>广告图片04</td>
         <td align="center">4</td>
         <td align="center"><a href="editshow.html?id=4">编辑</a> | <a href="delshow.htmlid=4">删除</a></td>
        </tr>
               </table>
      </td>
     </tr>
    </table>
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
</body>
</html>