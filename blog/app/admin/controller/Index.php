<?php
namespace admin\controller;
use admin\model\Index as IndexModel;
use framework\Upload as Upload;
use framework\Page;
class Index extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->index = new IndexModel();
	}
	public function index()
	{
		
		$this->display();
	}
	public function add()
	{
		if(!empty($_POST)){
			if(!empty($_FILES['coin']['name'])){
				//处理上传的图片
				$img = new Upload();
				$imgPath = $img->UploadFile('coin');
				//得到图片的路径
				$route = $img->joinPathName();
				//将相关信息加入数据库
				$addBlog = $this->index->addContent($_POST,$route);
			}else{
				$addBlog = $this->index->addContent1($_POST);
			}
			if($addBlog){
				//$this->notice('blog添加成功','index.php?m=admin&c=Index&a=add');
			}else{
				//$this->notice('blog添加失败','index.php?m=admin&c=Index&a=add');
			}
		}
		$this->display();
	}
	public function list()
	{
		$res = $this->index->search();
		$this->assign('res',$res);
		if(!empty($_POST)){
			$delInfo = $this->index->getDelInfo($_POST);
		}
		$con= $this->index->where(['first=1','isdel=0'])->count();
		$total = $con['count'];
		$getPage = new Page($total);
		$PageList = $getPage->ListPage();
		$page = empty($_GET['page'])? 1:$_GET['page'];
		$result = $this->index->getInfo($page);
		$this->assign('total',$total);
		$this->assign('PageList',$PageList);
		$this->assign('result',$result);	
		$this->display();
	}
	public function listDel()
	{
		$res = $this->index->search1();
		$this->assign('res',$res);
		if(!empty($_POST)){
			$delInfo = $this->index->getDelInfo1($_POST);
		}
		$con= $this->index->where(['first=1','isdel=1'])->count();
		$total = $con['count'];
		$getPage = new Page($total);
		$PageList = $getPage->ListPage();
		$page = empty($_GET['page'])? 1:$_GET['page'];
		$result = $this->index->getInfo1($page);
		$this->assign('total',$total);
		$this->assign('PageList',$PageList);
		$this->assign('result',$result);	
		$this->display();
	}
	public function column()
	{
		$this->display();
	}
	public function upAdd()
	{
		//var_dump($_GET);
		if(!empty($_GET)){
			$updateInfo = $this->index->getUpdateInfo($_GET['id'])[0];
			$this->assign('updateInfo',$updateInfo);
		}
		if(!empty($_POST)){
			if(!empty($_FILES['coin']['name'])){
				$updateDetails = $this->index->getUpdateDetails($_POST,$picture,$_GET['id']);
			}else{
				$updateDetails = $this->index->getUpdateDetails1($_POST,$_GET['id']);
			}
			if($updateDetails){
				$this->notice('修改成功','index.php?m=admin&c=Index&a=list');
			}else{
				$this->notice('修改失败','index.php?m=admin&c=Index&a=list');
			}
		}
		$this->display();
	}
}

