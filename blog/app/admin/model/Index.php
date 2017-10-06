<?php
namespace admin\model;
use framework\Model;
class Index extends Model
{
	public function addContent($data,$route)
	{
		$title = $data['title'];
		$content = $data['content'];
		$time = time();
		$author = $data['author'];
		$addip = $_SERVER['REMOTE_ADDR'];
		if($addip ='::1'){
			$addip = '127.0.0.1';
		}
		$addip = ip2long($addip);
		$res = ['title'=>$title,'content'=>$content,'addtime'=>$time,'uname'=>$author,'picture'=>$route,'addip'=>$addip,'first'=>1,'authorid'=>1];
		$result = $this->insert($res);
		if($result){
			return $result;
		}else{
			return false;
		}
	}
	public function addContent1($data)
	{
		$title = $data['title'];
		$content = $data['content'];
		$time = time();
		$author = $data['author'];
		$addip = $_SERVER['REMOTE_ADDR'];
		if($addip ='::1'){
			$addip = '127.0.0.1';
		}
		$addip = ip2long($addip);
		$res = ['title'=>$title,'content'=>$content,'addtime'=>$time,'uname'=>$author,'addip'=>$addip,'first'=>1,'authorid'=>1];
		$result = $this->insert($res);
		if($result){
			return $result;
		}else{
			return false;
		}
	}
	public function search()
	{
		$result = $this->where(['first =1','isdel=0'])->select();
		return $result;
	}
	public function getDelInfo($data)
	{
		foreach ($data as $key =>$value){
			foreach ($value as $k => $v) {
				$isDelChange = $this->where(["id=$v"])->update(['isdel'=>1]);
			}
		}
	}
	public function getUpdateInfo($data)
	{
		$upInfo = $this->where(["id=$data"])->select();
		return $upInfo;
	}
	public function getUpdateDetails($data,$picture,$id)
	{
		$newTitle = $data['title'];
		$newContent = $data['content'];
		$newTime = $data['datetime'];
		$newName = $data['author'];
		$arr = ['title'=>$newTitle,'content'=>$newContent,'picture'=>$picture,'addtime'=>$newTime,'uname'=>$newName];
		$newInfo = $this->where(["id = $id"])->update($arr);
		if($newInfo){
			return true;
		}else{
			return false;
		}
	}
	public function getUpdateDetails1($data,$id)
	{
		$newTitle = $data['title'];
		$newContent = $data['content'];
		$newTime = $data['datetime'];
		$newName = $data['author'];
		$arr = ['title'=>$newTitle,'content'=>$newContent,'addtime'=>$newTime,'uname'=>$newName];
		$newInfo = $this->where(["id = $id"])->update($arr);
		if($newInfo){
			return true;
		}else{
			return false;
		}
	}
	public function getInfo($page)
	{
		$num = ($page-1)*3;
		return $this->where(['first = 1','isdel = 0'])->limit([$num,3])->select();
	}
	public function search1()
	{
		$result = $this->where(['first =1','isdel=1'])->select();
		return $result;
	}
	public function getInfo1($page)
	{
		$num = ($page-1)*3;
		return $this->where(['first = 1','isdel =1'])->limit([$num,3])->select();
	}
	public function getDelInfo1($data)
	{
		foreach ($data as $key =>$value){
			foreach ($value as $k => $v) {
				$isDelChange = $this->where(["id=$v"])->delete();
			}
		}
	}
}