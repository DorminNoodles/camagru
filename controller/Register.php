<?php

require('core/Controller.php');
require_once('model/InputUsername.php');
require_once('model/InputPassword.php');
require_once('model/InputEmail.php');

class Register extends Controller
{
	public $form = true;
	private $displayForm = true;

	function __construct($request)
	{
		parent::__construct();

		$arr = [];
		$arr['valid'] = false;
		$arr['message'] = '';

		$contentTpl = new Template('view/');

		if (!isset($_SESSION['id']))
		{
			if (!empty($_POST) && $this->db != null)
				$arr = $this->createUser();
			$this->displayForm = ($arr['valid']) ? false : true;
			$this->tpl->set('content', $contentTpl->fetch('registerSuccess.php'));
			$contentTpl->set('message', $arr['message']);
			if (!$arr['valid'])
				$this->tpl->set('content', $contentTpl->fetch('registerForm.php'));
		}
		else
		{
			$contentTpl = new Template('view/');
			$this->tpl->set('content', $contentTpl->fetch('404.php'));
		}
		echo $this->tpl->fetch('main.php');
	}

	function createUser()
	{
		$this->db->connect();
		$arr = $this->checkInputs();
		if (!$arr['valid'])
			return ($arr);
		$key = password_hash(rand(0, 99999999), PASSWORD_DEFAULT);
		$key = str_replace ( '/', '', $key);
		$key = str_replace ( '.', '', $key);
		$key = str_replace ( '$', '', $key);
		$this->sendActivation($key, $_POST['username']);
		$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$query = $this->db->prepare('INSERT INTO users (name, password, email, activationKey) VALUES (\''.$_POST['username'].'\', \''.$_POST['password'].'\', \''.$_POST['email'].'\', \''.$key.'\')');
		$query->execute();
		return($arr);
	}

	function sendActivation($msg, $login)
	{
		$emailTo = $_POST['email'];
		$emailFrom = 'register@camagru.fr';
		$subject = "Camagru - Confirm Your Account";
		$message = "
			<html>
				<body>
					Hello ". $login .", click here to confirm your account => <a href='http://localhost:8080/camagru/activation/".$msg."'>click here for activate your account</a>
				</body>
			</html>";
		$header[] =  'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        $headers[] = 'To: <' . $_POST['email'] . '>';
        $headers[] = 'From: Camagru <register@camagru.fr>';
		$ret = mail($emailTo, $subject, $message, implode("\r\n", $headers));
	}

	function checkInputs()
	{
		$arr = [];
		$arr['valid'] = true;
		$arr['message'] = '';

		$username = new InputUsername($_POST['username']);
		$password = new InputPassword($_POST['password']);
		$passwordConfirm = new InputPassword($_POST['passwordConfirm']);
		$email = new InputEmail($_POST['email']);

		if (!$username->isValid() || $username->alreadyExist())
		{
			$arr['valid'] = false;
			$arr['message'] = $username->getError();
			return $arr;
		}

		if (!$password->isValid())
		{
			$arr['valid'] = false;
			$arr['message'] = $password->getError();
			return $arr;
		}

		if ($password->getValue() != $passwordConfirm->getValue())
		{
			$arr['valid'] = false;
			$arr['message'] = 'Passwords don\'t match';
			return $arr;
		}

		if (!$email->isValid())
		{
			$arr['valid'] = false;
			$arr['message'] = $email->getError();
			return $arr;
		}

		if ($email->emailAlreadyExist($email->getValue()))
		{
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
