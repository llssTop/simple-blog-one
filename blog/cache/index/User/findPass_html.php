<!DOCTYPE html>
<html>	
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="public/jquery/jquery-1.10.2.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="keywords" content="Flat Dark Web Login Form Responsive Templates, Iphone Widget Template, Smartphone login forms,Login form, Widget Template, Responsive Templates, a Ipad 404 Templates, Flat Responsive Templates" />
<link href="<?php echo CSS_PATHI;?>style1.css" rel='stylesheet' type='text/css' />

</head>
<body>
<script>$(document).ready(function(c) {
	$('.close').on('click', function(c){
		$('.login-form').fadeOut('slow', function(c){
	  		$('.login-form').remove();
		});
	});	  
});
</script>
 <!--SIGN UP-->
 <h1>Shanshan FindPass Form</h1>
<div class="login-form">
	<div class="close"> </div>
		<div class="head-info">
			<label class="lbl-1"> </label>
			<label class="lbl-2"> </label>
			<label class="lbl-3"> </label>
		</div>
			<div class="clear"> </div>
	<div class="avtar">
		<img src="<?php echo IMG_PATHI;?>avtar.png" />
	</div>
			<form  action="index.php?m=index&c=User&a=findPass"  method="post">
					<input type="text" class="text" value="Username"  name ="username"onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" >
						<div class="key">
					<input type="text" id="phone"  name="phoneCode" placeholder="请输入手机号"/>
                    <input type="text" placeholder="请输入验证码" id="phoneyanzheng" name="code" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'PhoneCode';}">
                    <input type="button" id="dyMoblieButton" onclick="getPhone()" value="获取验证码"/>
			</form>
	<div class="signin">
		<input type="submit" value="Reset" onclick="doreg()" >
	</div>·
</div>
	<script>
            var yanzhengma;
            var phone;
            var flag;
               function getPhone(){
                flag = false;
                var big;
                if($("#phone").val() == ''){
                    alert('请输入手机号');
                }else{
                    $("#dyMoblieButton").removeAttr('onclick');
                    if(!flag){
                        flag = true;
                        var num = 60;
                        $("#dyMoblieButton").val('已发送'+ '(' + num-- + ')');
                        phone = $("#phone").val();
                        alert(phone);
                        $.post("index.php?m=index&c=user&a=dosafety",{phone:phone},function(data){
                            yanzhengma = data['notice'];
                            console.log(yanzhengma);
                        },'json');  
                        
                        if(flag){
                            big = setInterval(function(){
                                $("#dyMoblieButton").val('已发送'+ '(' + num-- + ')');
                                if(num == -1){
                                    $("#dyMoblieButton").val('获取');
                                    num = 60;
                                    flag = false;
                                    clearInterval(big);
                                }
                            },1000);
                        }
                    }
                }
              }
               function doreg(){
                    if($("#phoneyanzheng").val() == yanzhengma){
                        return true;
                    }else{
                       alert('验证码错误，请稍后重试');
                    }
               }
           </script>
</body>
</html>