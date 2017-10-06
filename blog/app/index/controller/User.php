<?php
namespace index\controller;
use index\model\User as UserModel;
use framework\Ucpaas;
class User extends Controller
{
	protected $user;
	public function __construct()
	{
		parent::__construct();
		$this->user = new UserModel();	
	}
	public function getInfo()
	{
		$res = $this->user->getInfo();
	}
	public function about()
	{
		$this->display();
	}
	public function index()
	{
		$this->display();
	}
	public function saylist()
	{
		$this->display();
	}
	public function findPassNow()
	{
		if(!empty($_POST)){
			$refind = $this->user->getReInfo($_POST);
			if($refind){
				$this->notice('更新密码成功，请登录','index.php?m=index&c=User&a=login_register_modal');
			}
		}
		$this->display();
	}
	public function findPass()
	{
		if(!empty($_POST)){
			$phoneResult = $this->user->getPhoneDetails($_POST);
			if($phoneResult){
				$this->notice('更新密码','index.php?m=index&c=User&a=findPassNow');
			}else{
				$this->notice('有错误请重新输入信息','index.php?m=index&c=User&a=findPass');
			}
		}
		$this->display();
	}
	public function login_register_modal()
	{
		if(isset($_POST['username'])){
			if($id = $this->user->check($_POST)){
				$this->notice('注册成功,请登录','index.php?m=index&c=User&a=login_register_modal');
			}else{
				$this->notice('注册失败,请重新注册','index.php?m=index&c=User&a=login_register_modal');
			}
		}else{
			$this->display();
		}
	}
	public function login()
	{
		if(!empty($_POST['username'])){
			if($data= $this->user->checklogin($_POST)){
				$this->notice('登录成功','index.php');
			}else{
				$this->notice('登录失败','index.php?m=index&c=User&a=login_register_modal');
			}
		}else{
			$this->notice('登录失败','index.php?m=index&c=User&a=login_register_modal');
		}
	}
	public function loginout()
	{
		session_destroy();
		$this->notice('退出','index.php?m=index&c=User&a=login_register_modal');
	}
	// 通过ajax发送手机号，实现发送短信功能
	public function dosafety(){
	    //初始化必填
	    $options['accountsid']='4d0cea011be406a1c05d1863df30a28b';
	    $options['token']='e53d3077cab7a59ccc45b9f9803b0f2b';
	    $str = '12345678900987654321';
	    $str1 = substr(str_shuffle($str),0,4);
	    $_SESSION['phonecode'] = $str1;
	    //初始化 $options必填
	    $ucpass = new Ucpaas($options);
	    //开发者账号信息查询默认为json或xml
	    //短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
	    $appId = "d3083be7d515445499d357e607842227";
	    $to = $_POST['phone'];
	    $templateId = "102268";
	    $param=$str1;
	    echo json_encode(array('notice'=>$str1));
	   // $ucpass->templateSMS($appId,$to,$templateId,$param);
    }

}