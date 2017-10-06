<?php
namespace admin\controller;
use admin\model\User as UserModel;
use framework\Page;
use admin\model\book;
class User extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->user = new UserModel();
		$this->book = new book();
	}
	public function login()
	{
		if(!empty($_POST)){
			$adminLogin = $this->user->getLogin($_POST);
			if($adminLogin){
				$this->notice('登录成功','index.php?m=admin&c=Index&a=index');
			}else{
				$this->notice('登录失败','index.php?m=admin&c=User&a=login');
			}
			
		}
		$this->display();
	}
	public function pass()
	{
		if(!empty($_POST)){
			$ok = $this->user->UpdatePass($_POST);
			var_dump($ok);
			if($ok){
				$this->notice('更新成功','index.php?m=admin&c=Index&a=index');
			}else{
				$this->notice('更新失败','index.php?m=admin&c=User&a=pass');
			}
		}
		$this->display();
	}
	public function book()
	{
		$res = $this->book->getBookInfo();
		$this->display();
	}
	public function userCon()
	{
		$userInfo = $this->user->getUserInfo();
		$this->assign('userInfo',$userInfo);
		if(!empty($_POST)){
			$delUserInfo = $this->user->getDelUserInfo($_POST);
		}
        //分页操作
        $con= $this->user->where(['udertype=0','allowlogin=0'])->count();
		$total = $con['count'];
		$getPage = new Page($total);
		$PageList = $getPage->ListPage();
		$page = empty($_GET['page'])? 1:$_GET['page'];
		$result = $this->user->getInfo($page);
		$this->assign('total',$total);
		$this->assign('PageList',$PageList);
		$this->assign('result',$result);
		$this->display();
	}
}