<?php

require('core/Controller.php');
require_once('model/InputUsername.php');
require_once('model/InputPassword.php');
require_once('model/InputEmail.php');

class Register extends Controller
{
	public $form = true;
	private $displayForm = true;

	function __construct($request) {

		parent::__construct();

		$arr = [];
		$arr['valid'] = false;
		$arr['message'] = '';

		if (!empty($_POST))
			$arr = $this->createUser();
		$this->displayForm = ($arr['valid']) ? false : true;
		$contentTpl = new Template('view/');
		$this->tpl->set('content', $contentTpl->fetch('registerSuccess.php'));
		$contentTpl->set('message', $arr['message']);
		if (!$arr['valid'])
			$this->tpl->set('content', $contentTpl->fetch('registerForm.php'));
		echo $this->tpl->fetch('main.php');
	}

	function createUser() {
		$this->db->connect();
		$arr = $this->checkInputs();
		if (!$arr['valid'])
			return ($arr);
		$key = password_hash(rand(0, 99999999), PASSWORD_DEFAULT);
		$key = str_replace ( '/', '', $key);
		$key = str_replace ( '.', '', $key);
		$this->sendActivation($key);
		$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$query = $this->db->prepare('INSERT INTO users (name, password, email, activationKey) VALUES (\''.$_POST['username'].'\', \''.$_POST['password'].'\', \''.$_POST['email'].'\', \''.$key.'\')');
		$query->execute();

		return($arr);
	}

	function sendActivation($msg) {
		$emailTo = $_POST['email'];
		$emailFrom = 'register@camagru.fr';
		$subject = "Camagru - Confirm Your Account";
		$message = "Hello click here to confirm your account => http://localhost:8080/camagru/activation/".$msg;
		$ret = mail($emailTo, $subject, $message);
	}

	function checkInputs() {

		$arr = [];
		$arr['valid'] = true;
		$arr['message'] = '';

		$username = new InputUsername($_POST['username']);
		$password = new InputPassword($_POST['password']);
		$passwordConfirm = new InputPassword($_POST['passwordConfirm']);
		$email = new InputEmail($_POST['email']);

		if (!$username->isValid() || $username->alreadyExist()) {
			$arr['valid'] = false;
			$arr['message'] = $username->getError();
			return $arr;
		}
		if (!$password->isValid()) {
			$arr['valid'] = false;
			$arr['message'] = $password->getError();
			return $arr;
		}
		if ($password->getValue() != $passwordConfirm->getValue()) {
			$arr['valid'] = false;
			$arr['message'] = 'Passwords don\'t match';
			return $arr;
		}

		if (!$email->isValid()) {
			$arr['valid'] = false;
			$arr['message'] = $email->getError();
			return $arr;
		}

		$_POST['username'] = $username->getValue();
		$_POST['password'] = $password->getValue();
		$_POST['email'] = $email->getValue();
		return $arr;
	}
}
?>
