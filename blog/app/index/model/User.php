<?php
namespace index\model;
use framework\Model;
class User extends Model
{
	public function getInfo()
	{
		return $this->select();
	}
	public function check($data)
	{
		$name  = $data['username'];
		$pwd   = $data['password'];
		$repwd = $data['repassword'];
		$phone = $data['phone'];
		$email = $data['email'];
		$yzm   = $data['yzm'];
		$SessionYzm = $_SESSION['code'];
		if(strlen($name)<3 || strlen($name)>12){
			exit ('用户名长度不在范围之内');
		}
		$upass = md5($pwd);
		$reUpass = md5($repwd);
		if($upass!==$reUpass){
			exit("您好，您两次输入的密码不相同");
		}
		//正则匹配电话号码
		$phone1 = "/^[1][358][0-9]{9}$/i";
		$ok1 =preg_match($phone1, $phone);
		if(!$ok1){
			exit('电话号码格式不合法');
		}
		//正则判断邮箱格式
		$pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
		$ok = preg_match($pattern,$email);
		if(!$ok){
			exit('您输入的邮箱格式不合法');
		}
		//判断验证码是否正确
		if(strcasecmp($SessionYzm,$yzm)!==0){
			exit('验证码错误');
		}
		$regip = $_SERVER['REMOTE_ADDR'];
		if($regip=='::1'){
			$regip = '127.0.0.1';
		}
		$regip = ip2long($regip);
		$data  = ['username'=>$name,'password'=>$upass,'phone'=>$phone,'email'=>$email,'regtime'=>time(),'regip'=>$regip];
		$re = $this->where("username= '$name'")->select();
		if(empty($re)){
			if($id = $this->insert($data)){
				return $id;
			}
		}else{
			return false;
		}
	}
	public function checklogin($data)
	{
		$name = htmlspecialchars(trim($data['username']));
	    $pwd =  htmlspecialchars(trim($data['password']));
	    $pwd = md5($pwd);
		if(empty($name)){
			exit ('您的用户名不能为空');
		}
		$result = $this->where("username='$name'")->select();
		if($result)
		{
			if($result[0]['allowlogin']==0){
				$result1 = $result[0]['password'];
				if(strcasecmp($result1, $pwd)==0){
					$udertype = $result[0]['udertype'];
					$uid =$result[0]['uid'];
					$_SESSION['username'] = $name;
					$_SESSION['udertype'] = $udertype;
					$_SESSION['uid'] = $uid;
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}else{
			return false;
		}	
	}
	public function getPhoneDetails($data)
	{
		$username = $data['username'];
		$code  = $data['code'];
		$phoneNum  = $data['phoneCode'];
		$result = $this->where(["username = '$username'"])->select();
		if($result){
			if($phoneNum !== $result[0]['phone']){
				echo "<script type='text/javascript'>alert('手机号码不正确');history.go(-1);</script>";
			}else{
				if($code = $_SESSION['phonecode']){
					return true;
				}
			}
		}else{
			return false;
		}
		
	}
	public function getReInfo($data)
	{
		$username = $data['username'];
		$password = $data['pass'];
		$repassword = $data['repass'];
		if($repassword == $password){
			$password = md5($password);
			$upPass = $this->where(["username = '$username'"])->update(['password'=>$password]);
			if($upPass){
				return $upPass;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
}