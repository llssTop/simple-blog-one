<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Viewport metatags -->
<meta name="HandheldFriendly" content="true" />
<meta name="MobileOptimized" content="320" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATHA;?>notice.css"  media="screen" />
<meta http-equiv="refresh"  content="<?=$sec; ?>;url=<?=$url; ?>" />
<title><?=$con; ?></title>

</head>

<body align="center">
    
	<!-- Main Wrapper. Set this to 'fixed' for fixed layout and 'fluid' for fluid layout' -->
	<div id="da-wrapper" class="fluid">
    
        <!-- Content -->
        <div id="da-content">
            
            <!-- Container -->
            <div class="da-container clearfix">
            
            	<div id="da-error-wrapper">
                	
                   	<div id="da-error-pin"></div>
                    <div id="da-error-code">
                         <span><?=$con; ?></span>                    
                    </div>
                
                	<h1 class="da-error-heading">页面更新请注意</h1>
                    <p><?=$con; ?><a href="<?=$url; ?>">3秒后不跳转,点击此链接....</a></p>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div id="da-footer">
        	<div class="da-container clearfix">
           	<p> 2013 17sucai . All Rights Reserved. <a href="http://www.mycodes.net/" target="_blank">源码之家</a></div>
        </div>
    </div>
    
</body>
</html>
