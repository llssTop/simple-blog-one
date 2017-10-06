<?php
namespace index\controller;
use index\model\Details as DetailsModel;
use index\model\Love;
use index\model\book;
class Details extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->love = new love();
		$this->book = new book();
	}
	public function gustbook()
	{
		if(!empty($_POST)){
			$arr = $this->book->getBookContent($_POST);
		}
		$result = $this->book->getContent();
		$this->assign('result',$result);
		if(!empty($_SESSION['username']))
		{
			$username = $_SESSION['username'];
			$love = $this->love->lovelist($username);
			$this->assign('love', $love);
		}	
		$this->display();
	}
}