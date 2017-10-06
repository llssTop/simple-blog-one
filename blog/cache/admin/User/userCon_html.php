<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>  
    <link rel="stylesheet" href="<?php echo CSS_PATHA;?>pintuer.css">
    <link rel="stylesheet" href="<?php echo CSS_PATHA;?>admin.css">
    <script src="<?php echo JS_PATHA;?>jquery.js"></script>
    <script src="<?php echo JS_PATHA;?>pintuer.js"></script>  
</head>
<body>
<form method="post" action="index.php?m=admin&c=User&a=userCon" enctype="multipart/form-data">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 用户管理</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>
        <th>姓名</th>       
        <th>电话</th>
        <th>邮箱</th>
        <th>用户ip</th>
         <th width="120">注册时间</th>
        <th>操作</th>      
      </tr> 
      <?php if(!empty($result)):?>
      <?php foreach($result as $key=>$v): ?>     
        <tr>
          <td><input type="checkbox" name="id[]" value="<?=$v['uid']; ?>" />
            <?=$v['uid']; ?></td>
          <td><?=$v['username']; ?></td>
          <td><?=$v['phone']; ?></td>
          <td><?=$v['email']; ?></td>  
           <td><?php echo long2ip($v['regip']); ?></td>         
          <td><?php echo date('Y-m-d',$v['regtime']); ?></td>
          <td><div class="button-group"><input class="button border-red" type="submit" value="删除"> </div></td>
        </tr>
        <?php endforeach;?>
        <?php endif;?>
      <tr>
        <td colspan="8"> 
          <?php if(!empty($PageList)):?>
            <div class="pagelist">
              <a href="<?=$PageList['head']; ?>">首页</a>
              <a href="<?=$PageList['prev']; ?>">上一页</a>
              <a href="<?=$PageList['next']; ?>">下一页</a>
              <a href="<?=$PageList['last']; ?>">尾页</a>
            </div>
             <?php endif;?> 
        </td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">

function del(id){
	if(confirm("您确定要删除吗?")){
		
	}
}

$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false; 		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

</script>
</body></html>