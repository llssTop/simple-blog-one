<?php
namespace index\model;
use framework\Model;
use framework\Page;

class Index extends Model
{
	//遍历首页博客
	public function num()
	{
		$arr = $this->where(['first=1','isdel=0'])->count();
		return $arr;
	}
	public function getInfo($page)
	{
		$num = ($page-1)*3;
		return $this->where(['first = 1', 'authorid = 1', 'isdel = 0'])->order('addtime desc')->limit([$num,3])->select();
	}
	//统计当前博客数量，进行分页操作
	public function getPage()
	{
		$res = $this->where(['first = 0', 'authorid = 1', 'isdel = 0'])->cal('count')->select();
		$count = $this->cal();
		$this->getLastSql();
		$page = $this->headPage();
	}
	//得到当前id下的帖子详情
	public function getDetails($tid)
	{
		$tieResult = $this->where(["id=$tid"])->select();
		return $tieResult;
	}
	// 查看回帖的详细
	public function getHiuDetails($tid)
	{
		$huiTieResult = $this->where(['first=0','isdel=0',"tid = $tid"])->select();	
		return $huiTieResult;	
	}
	//将回帖内容添加数据库
	public function getHuitieContent($data)
	{
		if(!empty($_POST)){
			$title = $data['huiTitle'];
			$content = $data['content'];
			$uname = $_SESSION['username'];
			$authorid = $_SESSION['uid'];
			$tid = $_GET['tid'];
			$addip = $_SERVER['REMOTE_ADDR'];
			if($addip = '::1'){
				$addip='127.0.0.1';
			}
			$addip = ip2long($addip);
			$info = ['title' =>$title,'content'=>$content,'uname'=>$uname,'authorid'=>$authorid,'addtime'=>time(),'tid'=>$tid,'addip'=>$addip];
			$result = $this->insert($info);
			if($result){
				// content 页面得到博客id,浏览次数增加。
				$hits = $this->where("id = $tid")->setInc('hits',1);
				//回复成功则回复数量加一
				$replycount = $this->where("id = $tid")->setInc('replycount',1);
			}
			return $result;
			echo "<script type='text/javascript'>alert('发表成功');history.go(-1);</script>";
		}
	}
	//点赞
	public function getAddInfo($tid,$dataInfo)
	{
		$addInfo = $this->where("id = $tid")->update($dataInfo);
		echo "<script type='text/javascript'>alert('点赞成功');history.go(-1);</script>";
	}
	//取消点赞
	public function getDelInfo($tid,$dataInfo)
	{
		$delInfo = $this->where("id = $tid")->update($dataInfo);
		if($delInfo){
			$repeat = $this->where("id = $tid")->update(['isdisplay'=>0]);
		}
	}
	//点赞数量增加
	public function getAddZan($tid)
	{
		$zanAdd = $this->where("id = $tid")->setInc('zan',1);
		echo "<script type='text/javascript'>alert('点赞加');history.go(-1);</script>";
	}
	//点赞数量减少
	public function getDelZan($tid)
	{
		$zanDel = $this->where("id = $tid")->setInc('zan',-1);
		echo "<script type='text/javascript'>alert('点赞减');history.go(-1);</script>";
	}
	public function getLove($tid)
	{
		$addLove = $this->where(["id=$tid"])->setInc('shoucang',1);
		return $addLove; 
	}
}