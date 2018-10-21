<?php

require('core/Controller.php');

class MyProfile extends Controller {

	function __construct() {
		parent::__construct();

		print_r($_POST);

		if (!empty($_POST['password'])) {
			echo 'HELLO';
		}


		$contentTpl = new Template('view/');

		$contentTpl->set('login', $this->user->getName());
		$this->tpl->set('content', $contentTpl->fetch('myProfile.php'));

		echo $this->tpl->fetch('main.php');
	}
}


?>
