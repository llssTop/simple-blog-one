<?php
namespace admin\controller;
class Foot extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function info()
	{
		$this->display();
	}
	public function website()
	{
		$this->display();
	}
}