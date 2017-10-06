<?php
namespace admin\model;
use framework\Model;
class User extends Model
{
	public function UpdatePass($data)
	{
		$username = $_SESSION['username'];
		$pass = $data['mpass'];
		$pass = md5($pass);
		$newpass = $data['newpass'];
		$renewpass = $data['renewpass'];
		$uname = $this->where(["username = '$username'"])->select();
		$password = $uname[0]['password'];
		if(strcasecmp($password,$pass)==0){
			if(strcasecmp($newpass, $renewpass)==0){
				$res = ['password'=>md5($pass)];
				$upPass = $this->where(["username = $username"])->update($res);
				var_dump($this->getLastSql());
				var_dump($upPass);
				return $upPass;
			}else{
				echo "<script type='text/javascript'>alter('两次密码输入不相同;');history.go(-1);</script>";
			}
		}
	}
	public function getLogin($data)
	{
		$name = htmlspecialchars(trim($data['username']));
	    $pwd =  htmlspecialchars(trim($data['password']));
	    $yzm = $data['code'];
	    $sessionCode = $_SESSION['code'];
	    $pwd = md5($pwd);
		if(empty($name)){
			exit ('您的用户名不能为空');
		}
		$result = $this->where("username='$name'")->select();
		if($result)
		{
			$result1 = $result[0]['password'];
			if(strcasecmp($result1, $pwd)==0){
				if(strcasecmp($yzm, $sessionCode)==0){
					$uid =$result[0]['uid'];
					$_SESSION['username'] = $name;
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
	public function getUserInfo()
	{
		$result = $this->where(['allowlogin=0','udertype=0'])->select();
		if($result){
			return $result;
		}
	}
	public function getDelUserInfo($data)
	{
		foreach ($data as $key =>$value){
			foreach ($value as $k => $v) {
				$isDelChange = $this->where(["uid=$v"])->update(['allowlogin'=>1]);
			}
		}
	}
	public function getInfo($page)
	{
		$num = ($page-1)*3;
		return $this->where(['udertype=0','allowlogin=0'])->limit([$num,3])->select();
	}
}