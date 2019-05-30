<?php

require('core/Controller.php');

class Logout extends Controller {

	function __construct()
	{
		parent::__construct();
		unset($_SESSION['id']);
		$this->tpl->set('content', 'Logout !');
		echo $this->tpl->fetch('main.php');
	}
}
?>
