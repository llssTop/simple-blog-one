<?php
namespace index\controller;
use index\model\Index as IndexModel;
use framework\Page;
use index\model\Love;

class Index extends Controller
{
	protected $index;
	protected $page;
	protected $love;
	protected $book;
	public function __construct()
	{
		parent::__construct();
		$this->index = new IndexModel();
		$this->love = new Love();
	}
	public function index()
	{
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
	public function content()
	{
		if($_GET['tid']){
			$tid = $_GET['tid'];
			//得到当前id下的帖子详情
			$tieResult = $this->index->getDetails($_GET['tid']);
			$this->assign('tieResult',$tieResult);
			//判断点赞情况，点赞和取消点赞
			if(isset($_GET['isdisplay'])){
				if($_GET['isdisplay']==0){
					$dataInfo['isdisplay'] = 1;
					//更新isdisplay赞的状态
					$AddInfo = $this->index->getAddInfo($_GET['tid'],$dataInfo);
					//当前帖子下面的赞的数量自增
					$addZan = $this->index->getAddZan($_GET['tid']);
				}
				elseif($_GET['isdisplay']==1){
					//取消点赞
					$dataInfo['isdisplay'] = 0;
					//更新当前isdisplay的状态
					$delInfo = $this->index->getDelInfo($_GET['tid'],$dataInfo);
					//当前下面帖子的数量减少
					$delZan = $this->index->getDelZan($_GET['tid']);
				}
			}
			//当前帖子下面回帖的详情，查询贴子的id
			$huiTieResult = $this->index->getHiuDetails($_GET['tid']);
			$this->assign('huiTieResult',$huiTieResult);
			//帖子回复的操作
			if(!empty($_SESSION['username'])){
				//登录成功可以进行回复。
				$huiTieContent=$this->index->getHuitieContent($_POST);
				$this->assign('tieContent',$huiTieContent);

			}
		$tid =$_GET['tid'];
		if(!empty($_GET['key'])){
			$AddInfo = $this->love->getLoveInfo($_GET['tid']);
			if($AddInfo){
			//当前帖子下面的赞的数量自增
				$addZan = $this->index->getLove($_GET['tid']);
				$addZanInfo = $this->love->addLoveInfo($tieResult[0]);
				if($addZan && $addZanInfo){
					$this->notice('收藏','index.php?m=index&c=Index&a=index');
				}else{
					$this->notice('已收藏','index.php?m=index&c=Index&a=index');
				}
			}else{
				$this->notice('已收藏','index.php?m=index&c=Index&a=index');
			}
		}	
			$this->display();
		}
	}
	public function save()
	{
		//收藏判断
	}
}