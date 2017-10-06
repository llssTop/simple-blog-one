<?php
namespace index\model;
use framework\Model;
class book extends model
{
	public function getBookContent($data)
	{
		$username = $data['username'];
		$content = $data['content'];
		$time = time();
		$arr = ['username'=>$username,'content'=>$content,'addtime'=>$time];
		$ok = $this->insert($arr);
		if($ok){
			return true;
		}else{
			return false;
		}
	}
	public function getContent()
	{
		$res =$this->select();
		if($res){
			return $res;
		}else{
			return false;
		}
	}
}