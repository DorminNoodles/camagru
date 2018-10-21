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
		echo $this->tpl->fetch('main.php');
	}

	function createUser() {
		echo "Create_User";
		$this->sanitize();
		$arr = $this->checkInputs();
		if (!$arr['valid'])
			return ($arr);



		$key = password_hash(rand(0, 99999999), PASSWORD_DEFAULT);
		$this->sendActivation($key);

		// $keyForMail = password_hash($_POST['username'].$_POST['email'], PASSWORD_DEFAULT).'/'.$randNb;
		// $keyForMail = 'localhost:8080/camagru/activation/'.$keyForMail;
		//

		// $keyForDb = password_hash($_POST['username'].$_POST['email'], PASSWORD_DEFAULT).'/'.password_hash($randNb, PASSWORD_DEFAULT);
		$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$this->db->connect();
		$query = $this->db->prepare('INSERT INTO users (name, pwd, email, activationKey) VALUES (\''.$_POST['username'].'\', \''.$_POST['password'].'\', \''.$_POST['email'].'\', \''.$key.'\')');
		$query->execute();

		// $db = new Database('camagru');
		// $ret = $this->db->find_user($_POST['username']);
		//
		//
		// if (!isset($ret))
		// {
		// 	$arr['valid'] = false;
		// 	$arr['username'] = 'Username already exist';
		// }
		// else
		return($arr);
	}

	function sanitize() {
		$_POST['username'] = htmlentities($_POST['username']);
		$_POST['password'] = htmlentities($_POST['password']);
		$_POST['email'] = htmlentities($_POST['email']);
	}

	function sendActivation($msg) {
		$emailTo = $_POST['email'];
		$emailFrom = 'register@camagru.fr';
		$subject = "Camagru - Confirm Your Account";
		$message = "Hello click here to confirm your account => http://localhost:8080/camagru/activation/".$msg;
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

		if (!$arr['valid'] || $this->db->find_user($_POST['username']) !== false)
		{
			$arr['valid'] = false;
			$arr['message'] = 'Username already exist !';
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




		$ret = $this->db->select(['*'], 'users', 'WHERE email=\''.$_POST['email'].'\'');

		// print_r($ret);

		if (!$arr['valid'] || isset($ret[0]))
		{
			$arr['valid'] = false;
			$arr['message'] = 'Email already exist !';
			return $arr;
		}

		return $arr;
	}

}
?>
