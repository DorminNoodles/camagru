<?php

require('core/Controller.php');
require_once('model/InputUsername.php');
require_once('model/InputPassword.php');

class Login extends Controller
{
	public $form = true;
	private $displayForm = true;

	function __construct($request) {

		parent::__construct();

		if (!empty($_POST))
			$arr = $this->connectUser();

		$contentTpl = new Template('view/');
		$contentTpl->set('message', '');

		if (!empty($arr['message']))
			$contentTpl->set('message', $arr['message']);

		if (isset($_SESSION['id']))
			$this->tpl->set('content', $contentTpl->fetch('loginSuccess.php'));
		else
			$this->tpl->set('content', $contentTpl->fetch('loginForm.php'));
		echo $this->tpl->fetch('main.php');
	}

	function checkInputs() {

		$arr = [];
		$arr['valid'] = true;
		$arr['message'] = '';

		$username = new InputUsername($_POST['username']);
		if (!$username->isValid()) {
			$arr['valid'] = false;
			$arr['message'] = $username->getError();
			return $arr;
		}

		$password = new InputPassword($_POST['password']);
		if (!$username->isValid()) {
			$arr['valid'] = false;
			$arr['message'] = $username->getError();
			return $arr;
		}
		$_POST['username'] = $username->getValue();
		$_POST['password'] = $password->getValue();

		return $arr;
	}

	function connectUser() {
		$arr = $this->checkInputs();
		if (!$arr['valid'] || $this->db === null)
			return ($arr);

		if ($arr['valid'])
		{
			$data = $this->db->findUserByName($_POST['username']);
			if ($_POST['username'] !== strtolower($data['name']) || !password_verify($_POST['password'], $data['password'])) {
				$arr['valid'] = false;
				$arr['message'] = "Error bad username or password";
				return $arr;
			}

			if ($arr['valid'] == true && $data['active'] == false) {
				$arr['valid'] = false;
				$arr['message'] = "Error account not active";
				return $arr;
			}

			$_SESSION['id'] = $data['id'];
			$arr['valid'] = true;
			return $arr;
		}
		return ($arr);
	}
}
?>
