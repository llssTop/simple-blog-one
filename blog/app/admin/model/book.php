<?php
namespace admin\model;
use framework\Model;
class book extends Model
{
	public function getBookInfo()
	{
		$res = $this->select();
	}
}