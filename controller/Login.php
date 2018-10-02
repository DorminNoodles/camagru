<?php

require('core/Controller.php');

class Login extends Controller
{
	public $form = true;
	private $displayForm = true;

	function __construct($request) {

		parent::__construct();

		echo $this->user->getName();


		if (isset($_POST['username']) && isset($_POST['password']) && !$this->user->getAuth())
		{
			$ret = $this->connectUser();
			if (!$ret['valid'])
				echo "Hello";
		}

		$this->displayForm = ($this->user->getAuth()) ? false : true;

		$contentTpl = new Template('view/');
		$this->tpl->set('content', $contentTpl->fetch('loginSuccess.php'));
		if ($this->displayForm)
		{
			$this->tpl->set('content', $contentTpl->fetch('loginForm.php'));
		}
		echo $this->tpl->fetch('main.php');
	}

	function checkInputs() {

		return (true);
	}


	function connectUser()
	{
		echo "CONNECT_USER";


		$arr['valid'] = (!$this->checkInputs()) ? false : true;
		if ($arr['valid'])
			$arr = $this->user->login($_POST['username'], $_POST['password']);

		$this->user->save();

		return ($arr);
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
