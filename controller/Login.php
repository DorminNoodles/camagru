<?php

require('core/Controller.php');

class Login extends Controller
{
	public $form = true;
	private $displayForm = true;

	function __construct($request) {

		parent::__construct();

		echo $this->hello;

		$arr = [];

		// print_r($_POST);
		// $arr = $this->createUser();
		$this->displayForm = (isset($_SESSION['id'])) ? false : true;

		$contentTpl = new Template('view/');
		$this->tpl->set('content', $contentTpl->fetch('registerSuccess.php'));
		if ($this->displayForm)
		{
			$this->tpl->set('content', $contentTpl->fetch('loginForm.php'));
		}
		echo $this->tpl->fetch('main.php');
	}

	// function createUser() {
	//
	// 	echo "Create_User";
	// 	$arr = $this->checkInputs();
	// 	if (!$arr['valid'])
	// 		return ($arr);
	//
	//
	// 	$db = new Database('camagru');
	// 	$ret = $db->find_user($_POST['username']);
	//
	// 	// print_r($ret);
	//
	// 	if (!isset($ret))
	// 	{
	// 		$arr['valid'] = false;
	// 		$arr['username'] = 'Username already exist';
	// 	}
	// 	else
	// 		$this->sendMail();
	// 	return($arr);
	// }

	// function sendMail() {
	// 	$emailTo = $_POST['email'];
	// 	$emailFrom = 'register@camagru.fr';
	// 	$subject = "Camagru - Confirm Your Account";
	// 	$message = "Hello";
	// 	$ret = mail($emailTo, $subject, $message);
	// 	echo $ret . '     SEND EMAIL';
	// }

	// function checkInputs() {
	//
	// 	$arr = [];
	// 	$valid = true;
	//
	// 	if (!$valid || !isset($_POST['username']))
	// 	{
	// 		echo ' >' . $valid . '< ';
	// 		$valid = false;
	// 		// echo ' >' . $valid . '< ';
	// 		$arr['username'] = 'Username need to be specified !';
	// 	}

	//
	// 	$arr['valid'] = $valid;
	// 	return $arr;
	// }

}
?>
