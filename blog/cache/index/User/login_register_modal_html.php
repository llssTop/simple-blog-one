<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<style>body{padding-top: 60px;}</style>
    <link href="<?php echo BOOTSTRAP3_PATH;?>css/bootstrap.css" rel="stylesheet" />
	<link href="<?php echo CSS_PATHI;?>login-register.css" rel="stylesheet" />
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
	<script src="<?php echo JQUERY_PATH;?>jquery-1.10.2.js" type="text/javascript"></script>
	<script src="<?php echo BOOTSTRAP3_PATH;?>js/bootstrap.js" type="text/javascript"></script>
	<script src="<?php echo JS_PATHI;?>login-register.js" type="text/javascript"></script>
</head>
<body style="background: url(<?php echo IMG_PATHI;?>11.jpg) no-repeat 0px 0px;" bgcolor="pink">
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                 <a class="btn big-login" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">登录</a>
                 <a class="btn big-register" data-toggle="modal" href="javascript:void(0)" onclick="openRegisterModal();">注册</a></div>
            <div class="col-sm-4"></div>
        </div>
		 <div class="modal fade login" id="loginModal">
		      <div class="modal-dialog login animated">
    		      <div class="modal-content">
    		         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Login with</h4>
                    </div>
                    <div class="modal-body">  
                        <div class="box">
                             <div class="content">
                                <div class="social">
                                    <a class="circle github" href="#">
                                        <i class="fa fa-github fa-fw"></i>
                                    </a>
                                    <a id="google_login" class="circle google" href="#">
                                        <i class="fa fa-google-plus fa-fw"></i>
                                    </a>
                                    <a id="facebook_login" class="circle facebook" href="#">
                                        <i class="fa fa-facebook fa-fw"></i>
                                    </a>
                                </div>
                                <div class="division">
                                    <div class="line l"></div>
                                      <span>or</span>
                                    <div class="line r"></div>
                                </div>
                                <div class="error"></div>
                                <div class="form loginBox">
                                    <form method="post" action="index.php?m=index&c=User&a=login" accept-charset="UTF-8">
                                    <input class="form-control" type="text" placeholder="UserName" name="username">
                                    <input class="form-control" type="password" placeholder="Password" name="password">
                                    <input class="btn btn-default btn-login" type="submit" value="登录" name="login">
                                    </form>
                                </div>
                             </div>
                        </div>`
                        <div class="box">
                            <div class="content registerBox" style="display:none;">
                             <div class="form">
                                <form method="post" html="{:multipart=>true}" data-remote="true" action="index.php?m=index&c=User&a=login_register_modal" accept-charset="UTF-8">
                                <input id="username" class="form-control" type="text" placeholder="Username" name="username">
                                <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                <input id="password_confirmation" class="form-control" type="password" placeholder="Repeat Password" name="repassword">
								<input id="Phone" class="form-control" type="text" placeholder="Phone" name="phone">
                                 <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                 <input id="yzm" class="form-control" type="text" placeholder="Verification code" name="yzm">
                                    <img src="<?php echo WEB_SITE;?>vendor/wml/framework/src/Verify.php" onclick="this.src='<?php echo WEB_SITE;?>vendor/wml/framework/src/Verify.php?id ='+Math.random()" width="100px" height="25px" align="center"/> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a style="text-decoration:none" href="javascript:;" onclick="show()">看不清？</a>
                                <input class="btn btn-default btn-register" type="submit" value="注册" name="register">
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>Looking to 
                                 <a href="javascript: showRegisterForm();">create an account</a>
                            ?</span>
                            <span> <a href="index.php?m=index&c=User&a=findPass">忘记密码？</a></span>
                        </div>
                        <div class="forgot register-footer" style="display:none">
                             <span>已经有账号？</span>
							
                             <a href="javascript: showLoginForm();">Login</a>
                        </div>
                    </div>        
    		      </div>
		      </div>
		  </div>
    </div>
</body>
</html>
