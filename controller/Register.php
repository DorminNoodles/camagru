<?php

require('core/Controller.php');

class Register extends Controller
{
	public $form = true;
	private $displayForm = true;

	function __construct($request) {

		parent::__construct();

		$arr = [];
		$arr['valid'] = false;
		$arr['message'] = '';
		if(!empty($_POST))
			$arr = $this->createUser();
		$this->displayForm = ($arr['valid']) ? false : true;
		$contentTpl = new Template('view/');
		$this->tpl->set('content', $contentTpl->fetch('registerSuccess.php'));
		$contentTpl->set('message', $arr['message']);
		if (!$arr['valid'])
		{
			$this->tpl->set('content', $contentTpl->fetch('registerForm.php'));
		}

		// if (!$arr['valid'])
		// 	echo $arr['message'];

		echo $this->tpl->fetch('main.php');
	}

	function createUser() {
		echo "Create_User";
		$arr = $this->checkInputs();
		if (!$arr['valid'])
			return ($arr);


		$db = new Database('camagru');
		$ret = $db->find_user($_POST['username']);


		if (!isset($ret))
		{
			$arr['valid'] = false;
			$arr['username'] = 'Username already exist';
		}
		else
			$this->sendMail();
		return($arr);
	}

	function sendMail() {
		$emailTo = $_POST['email'];
		$emailFrom = 'register@camagru.fr';
		$subject = "Camagru - Confirm Your Account";
		$message = "Hello";
		$ret = mail($emailTo, $subject, $message);
		echo $ret . '     SEND EMAIL';
	}

	function checkInputs() {

		$arr = [];
		$arr['valid'] = true;
		$arr['message'] = '';

		if (!$arr['valid'] || !isset($_POST['username']))
		{
			$arr['valid'] = false;
			$arr['message'] = 'Username need to be specified !';
			return $arr;
		}

		if (!$arr['valid'] || !isset($_POST['password']))
		{
			$arr['valid'] = false;
			$arr['message'] = 'Password need to be specified !';
			return $arr;
		}

		if (!$arr['valid'] || strlen($_POST['password']) < 6)
		{
			$arr['valid'] = false;
			$arr['message'] = 'password must be 6 characters minimum !';
			return $arr;
		}


		if (!$arr['valid'] || strlen($_POST['email']) < 5)
		{
			$arr['valid'] = false;
			$arr['message'] = 'Invalid email !';
			return $arr;
		}

		return $arr;
	}

}
?>
