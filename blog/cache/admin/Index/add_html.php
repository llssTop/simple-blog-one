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
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" enctype="multipart/form-data"  action="index.php?m=admin&c=Index&a=add">  
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="title" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field">
          <img src="<?php echo IMG_PATHA;?>avtar.png" border="1" width="45" height="45" title="请上传头像" />
          <input type="file" class="button bg-blue margin-left" id="image1"  name ="coin" value="+ 浏览上传"  style="float:left;">
          <div class="tipss">图片尺寸：500*500</div>
        </div>
      </div>     
      <if condition="$iscid eq 1">
      </if>
      <div class="form-group">
      </div>
      <div class="form-group">
        <div class="label">
          <label>内容：</label>
        </div>
        <div class="field">
      <script type="text/javascript" src="../public/public/ckeditor/ckeditor.js"></script>
            <script src="../public/public/ckeditor/sample.js" type="text/javascript"></script>
            <textarea  class="ckeditor"  name="content"  id="editor1"></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>发布时间：</label>
        </div>
        <div class="field"> 
          <script src="<?php echo JS_PATHA;?>laydate/laydate.js"></script>
          <input type="text" class="laydate-icon input w50" name="datetime" value="<?php echo date('Y-m-d H:i:s')?>"  data-validate="required:日期不能为空" style="padding:10px!important; height:auto!important;border:1px solid #ddd!important;" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>作者：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="author" value=""  />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>

</body></html>