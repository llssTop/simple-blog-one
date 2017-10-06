<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>留言板—姗姗博客</title>
<meta name="keywords" content="个人博客,姗姗个人博客," />
<meta name="description" content="" />
<link href="<?php echo CSS_PATHI;?>index.css" rel="stylesheet">
<link href="<?php echo CSS_PATHI;?>style.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="<?php echo JS_PATHI;?>modernizr.js"></script>
<![endif]-->
</head>
<body>
<header>
  <div id="logo"><a href="/"></a></div>
   <nav class="topnav" id="topnav">
  <a href="index.php"><span>首页</span><span class="en">Honme</span></a>
  <a href="index.php?m=index&c=User&a=about"><span>关于我</span><span class="en">About</span></a>
  </a><a href="index.php?m=index&c=User&a=saylist"><span>个人日记</span><span class="en">Diary</span></a>
  <a href="index.php?m=index&c=Details&a=gustbook"><span>留言版</span><span class="en">Gustbook</span></a>
  </nav>
</header>
<article class="blogs">
<h1 class="t_nav"><span>既然来了，那么就留下你的足迹吧！</span><a href="index.php" class="n1">网站首页</a><a href="index.php?m=index&c=Details&a=gustbook" class="n2">留言板</a></h1>
<div class="bloglist left">
  <form action="index.php?m=index&c=Details&a=gustbook" method="post">

   <div id="gustbook"> 
    
  </div>
  <?php if(!empty($_SESSION['username'])):?>
    <input type="text" value="<?=$_SESSION['username']; ?>" name ="username"/>
    <?php else:?>
      <input type="text" value="" name ="username"/>
    <?php endif;?>
      <script type="text/javascript" src="../public/public/ckeditor/ckeditor.js"></script>
            <script src="../public/public/ckeditor/sample.js" type="text/javascript"></script>
            <textarea  class="ckeditor"  name="content"  id="editor1"></textarea>
            <input type="submit" value="回复">
            <div>
      <table>
       <?php if(!empty($result)):?>
      <?php foreach($result as $v): ?>
      <tr style="border-bottom:1px;height:10px">
     
        <td>用户名</td><td style="border:1px;height:10px"><?=$v['username']; ?></td><td style="border:1px;height:10px;padding-left:10px;padding-right:10px">    时间</td>

        <td style="border:1px;height:10px"><?php echo date('Y-m-d:H:i:s',$v['addtime']); ?></td>
         </tr>
         <tr>
           <td style="border:1px;height:10px;padding-right:10px">    留言内容</td>
        <td style="border:1px;height:10px"><?=$v['content']; ?></td>
      </tr>
     
      <?php endforeach;?>
      <?php endif;?>
    </table>
   </div>
   <form>
</div>
<!--right-->
<aside class="right">
 <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
   <div class="rnav">
      <ul>
       <li class="rnav1"><a href="#">PHP基础入门</a></li>
       <li class="rnav2"><a href="#">PHP进阶优化</a></li>
       <li class="rnav3"><a href="#">PHP实战案例</a></li>
       <li class="rnav4"><a href="#">PHP心得笔记</a></li>
     </ul>      
    </div>
    
<div class="news">
    <h3 class="ph">
      <p><span>收藏</span></p>
    </h3>
    <?php if(!empty($love)):?>
    <?php foreach($love as $lkey=>$lvalue): ?>
    <ul class="paih">
      <li><a href="index.php?m=index&c=Index&a=content&tid=<?=$lvalue['blogid']; ?>" title="<?=$lvalue['blogtitle']; ?>" target="_blank"><?=$lvalue['blogtitle']; ?></a></li>
    </ul>  
    <?php endforeach;?>
    <?php endif;?>
    </div> 
</aside>
</article>
<footer>
  <p><span>Design By:<a href="www.duanliang920.com" target="_blank">姗姗</a></span><span>网站地图</span><span><a href="/">网站统计</a></span></p>
</footer>
<script src="<?php echo JS_PATHI;?>nav.js"></script>
  <!-- Baidu Button BEGIN -->
   
    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script> 
    <script type="text/javascript" id="bdshell_js"></script> 
    <script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script> 
    <!-- Baidu Button END -->   
</body>
</html>