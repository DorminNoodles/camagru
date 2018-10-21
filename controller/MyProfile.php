<?php

require('core/Controller.php');
require('model/Password.php');
require('model/Username.php');

class MyProfile extends Controller {

	function __construct() {
		parent::__construct();

		$contentTpl = new Template('view/');

		if (!isset($_SESSION['id'])) {
			$this->tpl->set('content', $contentTpl->fetch('404.php'));
			echo $this->tpl->fetch('main.php');
			return;
		}

		if (!empty($_POST['password'])) {
			$ret = $this->changeProfile();
			if (empty($ret)) {
				$contentTpl->set('message', $ret);
				return;
			}
		}



		$contentTpl->set('login', $this->user->getName());
		$this->tpl->set('content', $contentTpl->fetch('myProfile.php'));
		echo $this->tpl->fetch('main.php');

	}

	function changeProfile() {
		$password = new Password($_POST['password']);
		$newPassword = new Password($_POST['newPassword']);
		$username = new Username($_POST['username']);
		// echo $password->getValue();


		if (!$password->isValid())
			return $password->getError();

		if (!empty($_POST['newPassword'])) {
			if (!$newPassword->isValid())
				return $newPassword->getError();
		}


		return '';
	}

	function sanitizeInput() {


		$_POST['username'] = htmlentities($_POST['username']);
		// $_POST['password'] = htmlentities($_POST['password']);
		$_POST['newPassword'] = htmlentities($_POST['newPassword']);
	}
}


?>
