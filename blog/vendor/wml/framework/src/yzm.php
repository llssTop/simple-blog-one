<?php

namespace framework;
include 'Verify.php';
session_start();

class Yzm extends Verify
{
	$_SESSION['code'] = parent::ver();
}
