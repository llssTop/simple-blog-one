<?php
namespace index\model;
use framework\Model;
class Details extends Model
{
	public function getInfo()
	{
		return $this->select();
	}
	
}