<?php

require('core/Controller.php');
require('model/Password.php');
require('model/Username.php');

class MyProfile extends Controller {

	function __construct() {
		parent::__construct();


		$contentTpl = new Template('view/');
		$contentTpl->set('successMessage', null);
		$contentTpl->set('errorMessage', null);

		if (!isset($_SESSION['id'])) {
			$this->tpl->set('content', $contentTpl->fetch('404.php'));
			echo $this->tpl->fetch('main.php');
			return;
		}

		// $this->user->checkPassword($_SESSION['id'], );

		if (!empty($_POST['password'])) {
			$ret = $this->changeProfile();
			if (!empty($ret['error'])) {
				$contentTpl->set('errorMessage', $ret['error']);
			}
			else if (!empty($ret['success'])) {
				$contentTpl->set('successMessage', $ret['success']);
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
		// $arr;

		if (!$password->isValid() || !$this->user->checkPassword($_SESSION['id'], $password->getValue()))
			return array( 'error' => 'Bad Password !', 'success' => '');

		if (!empty($_POST['newPassword'])) {
			if (!$newPassword->isValid())
				return array( 'error' => $newPassword->getError(), 'succes' => '');
			$this->db->connect();
			$query = $this->db->prepare('UPDATE users SET password=\''.$newPassword->getCryptedValue().'\' WHERE id='.$_SESSION['id'].'');
			$query->execute();
		}

		if (!empty($_POST['username'])) {
			echo 'HELLO';
			if ($username->getValue() != $this->user->getName()) {
				$data = $this->db->find_user($username->getValue());
				if (!empty($data))
					return array('error' => 'Username already taken !', 'success' => '');
				$this->db->connect();
				$query = $this->db->prepare('UPDATE users SET name=\''.$username->getValue().'\' WHERE id='.$_SESSION['id'].'');
				$query->execute();
			}
		}
		// if (!empty($_POST['newPassword'])) {
		// 	if (!$newPassword->isValid())
		// 		return array( 'error' => $newPassword->getError(), 'succes' => '');
		// 	$this->db->connect();
		// 	$query = $this->db->prepare('UPDATE users SET password=\''.$newPassword->getCryptedValue().'\' WHERE id='.$_SESSION['id'].'');
		// 	$query->execute();
		// }

		return array('error' => '', 'success' => 'Success !');
	}

	function sanitizeInput() {



	}
}


?>
