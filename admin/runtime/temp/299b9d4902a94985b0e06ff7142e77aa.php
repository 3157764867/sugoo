<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"F:\phpstudy\WWW\sugoo\admin\public/../application/index\view\cupon\cupon.html";i:1515460072;}*/ ?>

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
  <li><a href="<?php echo url('index/cupon/index'); ?>"><i class="productCat"></i><em>红包管理</em></a></li>
 </ul>
 
  
</div></div>
 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>红包管理</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="<?php echo url('index/cupon/add'); ?>" class="actionBtn add">添加红包</a>红包列表</h3>
    <div class="filter">

    <form action="product.php" method="post">
     <input name="keyword" type="text" class="inpMain" value="" size="20" />
     <input name="submit" class="btnGray" type="submit" value="筛选" />
    </form>
    
    </div>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
        <td width="40" align="center">红包编号</td>
        <td align="left">红包名称</td>
        <td width="150" align="center">批次类型</td>
       <td width="80" align="center">生成时间</td>
       <td width="80" align="center">审请人</td>
       <td width="80" align="center">用途</td>
       <td width="80" align="center">审核人</td>
       <td width="80" align="center">审核状态</td>
       <td width="80" align="center">审核时间</td>
       <td width="80" align="center">面值</td>
       <td width="80" align="center">红包期限</td>
       <td width="80" align="center">红包数量</td>
       <td width="80" align="center">是否可以转赠</td>
        <td width="80" align="center">操作</td>
      </tr>
     <tbody id="box">
      <?php foreach($page_info as $k=>$v) {?>

            <tr>
        <td align="center"><input type="checkbox" id="id" name="checkbox[]" value="<?php echo $v['cu_id']?>" /><?php echo $v['cu_id']?></td>
        <td align="center"><?php echo $v['cu_number']?></td>
        <td align="center"><?php echo $v['cu_type']?></td>
        <td align="center"><?php echo $v['cu_start']?></td>
        <td align="center" id="mark_man"><?php echo $v['mark_man']?></td>
        <td align="center" id="cu_use"><?php echo $v['cu_use']?></td>
        <td align="center" id="audit_man"><?php echo $v['audit_man']?></td>
        <td align="center" id="audit_status" value="<?php echo $v['audit_status']?>"><?php if($v['audit_status']==0){echo "未通过";}else{echo "已通过";}?></td>
        <td align="center"><?php if($v['audit_status']==0){echo "未通过";}else{echo $v['audit_time'];}?></td>
        <td align="center" id="cu_money" class="<?php echo $v['cu_money']?>"><?php echo $v['cu_money']?>元</td>
        <td align="center"><?php echo $v['su_limit']?>天</td>
        <td align="center" id="cu_num" value="<?php echo $v['cu_num']?>"><?php echo $v['cu_num']?>个</td>
        <td align="center"><?php if($v['is_give']==0){echo "是";}else{echo "否";}?></td>
        <td align="center">
                  <a href="javascript:;" id="eidt" value="<?php echo $v['cu_id']?>">审核</a> | <a href="javascript:;" id="del" value="<?php echo $v['cu_id']?>">删除</a>
                 </td>
      </tr>
     
      <?php }?>
      </tbody>

      </table>
    
  
   
<input class="btnGray" type="button" value="全选" id="all" />
<input class="btnGray" type="button" value="全不选" id="allNo" />
<input class="btnGray" type="button" value="反选" id="fan" />
<input class="btnGray" type="button" value="批删" id="dels" />
    <div class="clear"></div>
    <div class="pager">
    总计 <?=$page_str['count']?> 个记录，
    共 <?=$page_str['end']?> 页，
    当前第 <?=$page_str['page']?> 页 | 
    <a href="javascript:void(0)" class="<?=$page_str['first']?>" id="bt">第一页</a> 
    <a href="javascript:void(0)" class="<?=$page_str['pre']?>" id="bt">上一页</a> 
    <a href="javascript:void(0)" class="<?=$page_str['next']?>" id="bt">下一页</a> 
    <a href="javascript:void(0)" class="<?=$page_str['end']?>" id="bt">最末页</a></div>  </div>
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

// 红包审核
$(document).on("click","#eidt",function(){
  // 红包id
  var cu_id = $(this).attr("value");
  // 审核
  $.ajax({
    'url':"<?php echo url('index/cupon/audit'); ?>",
    'data':{"cu_id":cu_id},
    "dataType":"json",
    "type":"get",
     success:function(msg){
      // console.log(msg);
      switch (msg.code) {
        case 0:
        alert(msg.msg)
        break;
        case 1:
        alert(msg.msg)
        window.location.reload();
        break;
        case 2:
        alert(msg.msg)
        break;

      }
    }
  })
  
})

// 单删
$(document).on("click","#del",function(){
  var id = $(this).attr("value");
  var  p = $("#p").prop('class');
// $("#box").remove();
  $.ajax({
    'url':"<?php echo url('index/cupon/del'); ?>",
    'data':{"id":id,'p':p},
    "dataType":"json",
    "type":"get",
     success:function(msg){
      if(msg.code==1){
        var str = "";
        for(var i=0;i<msg.page_info.length;i++){
        switch (msg.page_info[i].audit_status){
          case 0:
          msg.page_info[i].audit_status = "未通过"
          msg.page_info[i].audit_time = "未通过"
          break;
          case 1:
          msg.page_info[i].audit_status = "已通过"
          msg.page_info[i].audit_time = msg.page_info[i].audit_time
          break;
        }
         if(msg.page_info[i].is_give==0)
        {
          msg.page_info[i].is_give = "是"
        }else{
          msg.page_info[i].is_give = "否"
        }
         str+="<tr>\
        <td align='center'><input type='checkbox' id='id' name='checkbox[]' value="+msg.page_info[i].cu_id+"/>"+msg.page_info[i].cu_id+"</td>\
        <td align='center'>"+msg.page_info[i].cu_number+"</td>\
        <td align='center'>"+msg.page_info[i].cu_type+"</td>\
        <td align='center'>"+msg.page_info[i].cu_start+"</td>\
        <td align='center'>"+msg.page_info[i].mark_man+"</td>\
        <td align='center'>"+msg.page_info[i].cu_use+"</td>\
        <td align='center'>"+msg.page_info[i].audit_man+"</td>\
        <td align='center'>"+msg.page_info[i].audit_status+"</td>\
        <td align='center'>"+msg.page_info[i].audit_time+"</td>\
        <td align='center'>"+msg.page_info[i].cu_money+"元</td>\
        <td align='center'>"+msg.page_info[i].su_limit+"天</td>\
        <td align='center'>"+msg.page_info[i].cu_num+"个</td>\
        <td align='center'>"+msg.page_info[i].is_give+"</td>\
        <td align='center'>\
                  <a href='javascript:;' id='eidt' value="+msg.page_info[i].cu_id+">审核</a> | <a href='javascript:;' id='del' value="+msg.page_info[i].cu_id+">删除</a>\
                 </td>\
      </tr>";
       }

       $("#box").html(str);
      }
     }
   })
  
})
// 全选
$(document).on("click","#all",function(){
  $("input[name='checkbox[]'],#all").attr("checked",true);
  
})
// 全不选
$(document).on("click","#allNo",function(){
  
$("input[name='checkbox[]']").removeAttr("checked"); 

})

// 反选
$(document).on("click","#fan",function(){
  $("input[name='checkbox[]").attr("checked", function (k, v) {  
        return !v;  
    });
})

// 批删
$(document).on("click","#dels",function(){
   p = $("#p").prop('class');
   var checks = $("input[name='checkbox[]']:checked");
   if(checks.length == 0){ alert('未选中任何项！');return false;}
      
  var checkData = new Array();
  checks.each(function(){ 
  checkData.push($(this).val()); 
  });
  // console.log(checkData);
  var ids='';
  for(var i=0;i<checkData.length;i++)
  {
     ids+=','+checkData[i]
  }
  ids = ids.substr(1)

 $.ajax({
    'url':"<?php echo url('index/cupon/dels'); ?>",
    'data':{"id":ids,"p":p},
    "dataType":"json",
    "type":"get",
     success:function(msg){
      if(msg.code==1){
        var str="";
       // var len=msg.page_info.length;
       for(var i=0;i<msg.page_info.length;i++){
        switch (msg.page_info[i].audit_status){
          case 0:
          msg.page_info[i].audit_status = "未通过"
          msg.page_info[i].audit_time = "未通过"
          break;
          case 1:
          msg.page_info[i].audit_status = "已通过"
          msg.page_info[i].audit_time = msg.page_info[i].audit_time
          break;
        }
         if(msg.page_info[i].is_give==0)
        {
          msg.page_info[i].is_give = "是"
        }else{
          msg.page_info[i].is_give = "否"
        }
         str+="<tr>\
        <td align='center'><input type='checkbox' id='id' name='checkbox[]' value="+msg.page_info[i].cu_id+"/>"+msg.page_info[i].cu_id+"</td>\
        <td align='center'>"+msg.page_info[i].cu_number+"</td>\
        <td align='center'>"+msg.page_info[i].cu_type+"</td>\
        <td align='center'>"+msg.page_info[i].cu_start+"</td>\
        <td align='center'>"+msg.page_info[i].mark_man+"</td>\
        <td align='center'>"+msg.page_info[i].cu_use+"</td>\
        <td align='center'>"+msg.page_info[i].audit_man+"</td>\
        <td align='center'>"+msg.page_info[i].audit_status+"</td>\
        <td align='center'>"+msg.page_info[i].audit_time+"</td>\
        <td align='center'>"+msg.page_info[i].cu_money+"元</td>\
        <td align='center'>"+msg.page_info[i].su_limit+"天</td>\
        <td align='center'>"+msg.page_info[i].cu_num+"个</td>\
        <td align='center'>"+msg.page_info[i].is_give+"</td>\
        <td align='center'>\
                  <a href='javascript:;' id='eidt' value="+msg.page_info[i].cu_id+">审核</a> | <a href='javascript:;' id='del' value="+msg.page_info[i].cu_id+">删除</a>\
                 </td>\
      </tr>";
       }

       $("#box").html(str);
      }
     }
   })   
})


 // 分页
   $(document).on('click','#bt',function(){
        p = $(this).prop('class');
        $.ajax({
        'url':"<?php echo url('index/cupon/do_index'); ?>",
        'data':{"p":p},
        "dataType":"json",
        "type":"get",
      success:function(msg){
       var str='';
       // var len=msg.page_info.length;
       for(var i=0;i<msg.page_info.length;i++){
        switch (msg.page_info[i].audit_status){
          case 0:
          msg.page_info[i].audit_status = "未通过"
          msg.page_info[i].audit_time = "未通过"
          break;
          case 1:
          msg.page_info[i].audit_status = "已通过"
          msg.page_info[i].audit_time = msg.page_info[i].audit_time
          break;
        }
        if(msg.page_info[i].is_give==0)
        {
          msg.page_info[i].is_give = "是"
        }else{
          msg.page_info[i].is_give = "否"
        }
         str+="<tr>\
        <td align='center'><input type='checkbox' id='id' name='checkbox[]' value="+msg.page_info[i].cu_id+"/>"+msg.page_info[i].cu_id+"</td>\
        <td align='center'>"+msg.page_info[i].cu_number+"</td>\
        <td align='center'>"+msg.page_info[i].cu_type+"</td>\
        <td align='center'>"+msg.page_info[i].cu_start+"</td>\
        <td align='center'>"+msg.page_info[i].mark_man+"</td>\
        <td align='center'>"+msg.page_info[i].cu_use+"</td>\
        <td align='center'>"+msg.page_info[i].audit_man+"</td>\
        <td align='center'>"+msg.page_info[i].audit_status+"</td>\
        <td align='center'>"+msg.page_info[i].audit_time+"</td>\
        <td align='center'>"+msg.page_info[i].cu_money+"元</td>\
        <td align='center'>"+msg.page_info[i].su_limit+"天</td>\
        <td align='center'>"+msg.page_info[i].cu_num+"个</td>\
        <td align='center'>"+msg.page_info[i].is_give+"</td>\
        <td align='center'>\
                  <a href='javascript:;' id='eidt' value="+msg.page_info[i].cu_id+">审核</a> | <a href='javascript:;' id='del' value="+msg.page_info[i].cu_id+">删除</a>\
                 </td>\
      </tr>";
       }

       $("#box").html(str);

       st="总计 "+msg.page_str.count+" 个记录，\
    共 "+msg.page_str.end+" 页，\
    当前第 "+msg.page_str.page+" 页 | \
    <a href='javascript:void(0)' class="+msg.page_str.first+" id='bt'>第一页</a> \
    <a href='javascript:void(0)' class="+msg.page_str.pre+" id='bt'>上一页</a> \
    <a href='javascript:void(0)' class="+msg.page_str.next+" id='bt'>下一页</a> \
    <a href='javascript:void(0)' class="+msg.page_str.end+" id='bt'>最末页</a>";

    $(".pager").html(st);

     }
   })  
 })

</script>
</body>
</html>
