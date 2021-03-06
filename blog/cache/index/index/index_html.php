<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>姗姗个人博客</title>
<meta name="keywords" content="个人博客模板,博客模板" />
<meta name="description" content="优雅、稳重、大气,低调。" />
<link href="<?php echo CSS_PATHI;?>index.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="<?php echo GS_PATHI;?>html5.js"></script>
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
      <a href="index.php"><span>首页</span><span class="en">Home</span></a>
      <a href="index.php?m=index&c=User&a=about"><span>关于我</span><span class="en">About</span></a>
      </a><a href="index.php?m=index&c=User&a=saylist"><span>个人日记</span><span class="en">Diary</span></a>
      <a href="index.php?m=index&c=Details&a=gustbook"><span>留言版</span><span class="en">Gustbook</span></a>
      <?php if(empty($_SESSION['username'])):?>
      <a href="index.php?m=index&c=User&a=login_register_modal"><span>登录</span><span class="en">Login</span></a>
      <?php else:?>
      <a href="index.php?m=index&c=User&a=login_register_modal"><span>欢迎<?=$_SESSION['username']; ?></span><span class="en">Login</span></a>
      <?php endif;?>
      <?php if(!empty($_SESSION['udertype'])):?>
      <a href="index.php?m=admin&c=Index&a=index"><span>后台管理</span><span class="en">
      AdminLogin</span></a>
      <?php endif;?>
      <?php if(!empty($_SESSION['username'])):?>
     <a href="index.php?m=index&c=User&a=loginout"><span>退出</span><span class="en">LoginOut</span></a>
      <?php endif;?>
  
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
   <!--wz-->
   <?php if($result):?>
   <?php foreach($result as $key=>$value): ?>
    <div class="wz">
    <h3><?=$value['title']; ?></h3>
    <p class="dateview"><span><?php echo date('Y-m-d',$value['addtime']); ?></span><span>作者:admin</span></p>
    <figure><img src="<?php echo WEB_SITE;?><?=$value['picture']; ?>"></figure>
    <ul>
      <p><?=$value['content']; ?></p>
      <a title="阅读全文" href="index.php?m=index&c=Index&a=content&tid=<?=$value['id']; ?>" target="_blank" class="readmore">阅读全文>></a>
      <br /> 
    </ul>
  
    <div class="clear"></div>
    </div>
    <?php endforeach;?>
    <?php endif;?>
   <!--end--> 
      <!--wz-->
    <div style="clear:both;" class = "page">
      <ul style="float:right;" class="block2-right4">
        <li>
        </li>
        <?php if(!empty($PageList)):?>
        <li><a href="<?=$PageList['head']; ?>">首页</a></li>
        <li><a href="<?=$PageList['prev']; ?>">上一页</a></li>
        <li><a href="<?=$PageList['next']; ?>">下一页</a></li>
        <li><a href="<?=$PageList['last']; ?>">尾页</a></li>
        <li>共有<?=$total; ?>条记录</li>
        <li>每页显示3条</li>
        <?php endif;?>
      </ul>
      </div>
  </div>
  <!--right-->
  <aside class="right"> 
    <div class="my">
     <h2>关于<span>博主</span></h2>
     <img src="<?php echo IMG_PATHI;?>my1.jpg" width="200" height="200" alt="博主">
       <ul>
        <li>博主：少年</li>
        <li>职业:web前端、网站运营</li>
        <li>简介：一个不断学习和研究，web前端和SEO技术的90后草根站长.</li>
        <li></li>   
       </ul>
    </div>
    <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
    <div class="news">
    <h3>
      <p>用户<span>关注</span></p>
    </h3>
    <ul class="rank">
      <li><a href="/" title="如何建立个人博客" target="_blank">如何建立个人博客</a></li>
      <li><a href="/" title="一个网站的开发流程" target="_blank">一个网站的开发流程</a></li>
      <li><a href="/" title="关键词排名的三个时期" target="_blank">关键词排名的三个时期</a></li>
      <li><a href="/" title="做网站到底需要什么?" target="_blank">做网站到底需要什么?</a></li>
      <li><a href="/" title="关于响应式布局" target="_blank">关于响应式布局</a></li>
      <li><a href="/" title="html5标签" target="_blank">html5标签</a></li>
    </ul>
    </div> 
</article>
<script src="<?php echo GS_PATHI;?>nav.js"></script>
<!--百度分享-->
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"32"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
</body>
</html>
