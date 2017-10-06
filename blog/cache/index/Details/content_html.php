<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>姗姗个人博客</title>
<meta name="keywords" content="个人博客模板,博客模板" />
<meta name="description" content="优雅、稳重、大气,低调。" />
<link href="<?php echo CSS_PATHI;?>index.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="<?php echo JS_PATHI;?>html5.js"></script>
<![endif]-->
<style>
  .page ul li{
    float:left;
    margin-right:20px;
  }
</style>
</head>
<body>
<header>
  <div id="logo"><a href="/"></a></div>
  <nav class="topnav" id="topnav">
      <a href="index.php"><span>首页</span><span class="en">Honme</span></a>
      <a href="index.php?m=index&c=User&a=about"><span>关于我</span><span class="en">About</span></a>
      </a><a href="index.php?m=index&c=User&a=saylist"><span>个人日记</span><span class="en">Diary</span></a>
      <a href="index.php?m=index&c=Details&a=seolist"><span>PHP技术</span><span class="en">Seo</span></a>
      <a href="index.php?m=index&c=Details&a=gustbook"><span>留言版</span><span class="en">Gustbook</span></a>
  </nav>
</header>
<!--end header-->
<div class="banner">
  <section class="box">
    <ul class="texts">
      <p class="p1">纪念我们:</p>
      <p class="p2">终将逝去的青春</p>
      <p class="p3">By:少年</p>
    </ul>
  </section>
</div>
<!--end banner-->
<article>
  <h2 class="title_tj">
    <p>博主<span>推荐</span></p>
  </h2>
  <div class="bloglist left">
   <!--发帖的详细-->
    <div class="wz">
    <h3>关于响应式布局</h3>
    <p class="dateview"><span>2013-11-04</span><span>作者：姗姗</span></p>
    <figure><img src="<?php echo IMG_PATHI;?>001.jpg"></figure>
    <ul>
      <p>随着互联网的快速发展，以及html5+css3的迅速崛起。渐渐的响应式布局，也会慢慢的出现在我们的视野里，身为专业的web前端，还不学习新技术你就out啦！为什么这样说呢？因为响应式布局能同时兼容多个终端，比如（手机、平板、PC）...</p>
    </ul>
    <div class="clear"></div>
    </div>
    <div class="bloglist left">
       <p class="dateview"><a href= "#">点赞</a><img src="<?php echo IMG_PATHI;?>agree.gif" style="display:inline-block;padding-top:5px;padding-left:5px"> <a href ="#">收藏</a><img src="<?php echo IMG_PATHI;?>addicn.gif" style="display:inline-block;padding-top:5px;padding-left:5px"> <a href ="#gustbook" style="padding-left:10px;">评论</a>
    </div>
   <!--end-->  
     <!--回帖的详细-->
  </div>
 <div class="bloglist left">
   <!--wz-->
    <div class="wz">
    <h3>关于响应式布局</h3>
    <p class="dateview"><span>2013-11-04</span><span>作者：姗姗</span></p>
    <figure><img src="<?php echo IMG_PATHI;?>001.jpg"></figure>
    <ul>
      <p>随着互联网的快速发展，以及html5+css3的迅速崛起。渐渐的响应式布局，也会慢慢的出现在我们的视野里，身为专业的web前端，还不学习新技术你就out啦！为什么这样说呢？因为响应式布局能同时兼容多个终端，比如（手机、平板、PC）...</p>
    </ul>
    <div class="clear"></div>
    </div>
    <div style="clear:both;" class = "page">
      <ul style="float:right;" class="block2-right4">
        <li>
          <form action="#" method="post">
            <input type="text" name="page" style="width:30px;height:20px;" />
            <input type="submit" value="GO" style="width:30px;height:20px;" />
          </form>
        </li>
        <li><a href="#">首页</a></li>
        <li><a href="#">上一页</a></li>
        <li><a href="#">下一页</a></li>
        <li><a href="#">尾页</a></li>
        <li>共有条记录</li>
        <li>每页显示5条，本页1-5条</li>
        <li>/页</li>
      </ul>
      </div>
      <div class="bloglist left">
   <div id="gustbook">
    <form action ="" enctype="multpart-data" method="post">
      <script type="text/javascript" src="../public/public/ckeditor/ckeditor.js"></script>
            <script src="../public/public/ckeditor/sample.js" type="text/javascript"></script>
            <textarea  class="ckeditor"  name="content"  id="editor1"></textarea>
            <p align="right"><input type="submit" value="回复"></p>
   </form>
   </div>

</div>
  </div>
  <!--right-->
  <aside class="right"> 
    <div class="my">
     <h2>关于<span>博主</span></h2>
     <img src="<?php echo IMG_PATHI;?>my.jpg" width="200" height="200" alt="博主">
       <ul>
        <li>博主：少年</li>
        <li>职业:web前端、网站运营</li>
        <li>简介：一个不断学习和研究，web前端和SEO技术的90后草根站长.</li>
        <li></li>   
       </ul>
    </div>
 
</article>
<script src="<?php echo JS_PATHI;?>nav.js"></script>
<!--百度分享-->
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"32"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
</body>
</html>
