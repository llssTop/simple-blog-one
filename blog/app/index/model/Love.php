<?php
namespace index\model;
use framework\Model;
class Love extends Model
{
	//帖子收藏的状态 islove
	 public function getLoveInfo($tid)
	 {
	 	$username = $_SESSION['username'];
	 	$check = $this->where(["blogid = $tid","uname = '$username'",'islove=1'])->select();
	 	if(!$check){
	 		return true;
	 	}else{
	 		return false;
	 	}	
	 }
	 public function addLoveInfo($data)
	 {
	 	$id = $data['id'];
	 	$title = $data['title'];
	 	$username = $_SESSION['username'];
	 	$arr = ['uname'=>$username,'blogtitle'=>$title,'blogid'=>$id,'islove'=>1];
	 	$result = $this->insert($arr);
	 	
	 	return $result;
	 }
	 public function lovelist($username)
	 {
	 	$re = $this->where(["uname = '$username'"])->select();
	 	//var_dump($this->getLastSql());
	 	return $re;
	 }
}
