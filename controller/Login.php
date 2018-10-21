<?php

require('core/Controller.php');

class Login extends Controller
{
	public $form = true;
	private $displayForm = true;

	function __construct($request) {

		parent::__construct();

		// print_r($_POST);

		if (!empty($_POST['username']) && !empty($_POST['password']) && !isset($_POST['id']))
		{
			$arr = $this->connectUser($_POST['username'], $_POST['password']);
		}

		// $this->displayForm = (isset($_SESSION['id'])) ? false : true;

		$contentTpl = new Template('view/');

		if (empty($arr['message']))
			$contentTpl->set('message', '');
		else
			$contentTpl->set('message', $arr['message']);

		if (isset($_SESSION['id']))
			$this->tpl->set('content', $contentTpl->fetch('loginSuccess.php'));
		else
			$this->tpl->set('content', $contentTpl->fetch('loginForm.php'));

		echo $this->tpl->fetch('main.php');
	}

	function checkInputs() {
		return (true);
	}


	function connectUser($name, $pwd) {
		echo "CONNECT_USER";

		$arr['message'] = '';
		$arr['valid'] = (!$this->checkInputs()) ? false : true;
		if ($arr['valid'])
		{
			$data = $this->db->find_user($name);

			if (strtolower($name) !== strtolower($data['name']) || !password_verify($pwd, $data['pwd'])) {
				$arr['valid'] = false;
				$arr['message'] = "Error bad username or password";
				return $arr;
			}

			if ($arr['valid'] == true && $data['active'] == false) {
				echo "NOT ACTIVE";
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
