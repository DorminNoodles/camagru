<?php

require_once('core/controller.php');
require_once('model/InputEmail.php');
require_once('core/Database.php');
require_once('model/User.php');

class PasswordLink extends Controller {
	function __construct(){
		parent::__construct();

		$contentTpl = new Template('view/');

		$contentTpl->set('errorMessage', null);
		$contentTpl->set('successMessage', null);

		if (isset($_POST['email']) && $this->db != null)
		{
			$email = new InputEmail($_POST['email']);
			$db = new Database("camagru");

			if ($email->isValid() && $db->findUserByEmail($email->getValue()))
			{
				$this->sendPasswordLink($email->getValue());
				$contentTpl->set('successMessage', 'Password Link sending !');
			}
			else
				$contentTpl->set('errorMessage', 'Bad Email');
		}

		$this->tpl->set('content', $contentTpl->fetch('PasswordLink.php'));
		echo $this->tpl->fetch('main.php');
	}

	function sendPasswordLink($email)
	{
		$key = password_hash(rand(0, 99999999), PASSWORD_DEFAULT);
		$key = str_replace ( '/', '', $key);
		$key = str_replace ( '.', '', $key);

		$user = new User();
		$user->addActivationKey($key, $email);
		$this->sendMail($key, $email);
	}

	function sendMail($key, $email)
	{
		$emailTo = $email;
		$emailFrom = 'register@camagru.fr';
		$subject = "Camagru - Change Password";
		$message = "Hello click here to change your password => <a href=\'http://localhost:8080/camagru/changePassword/".$key."\'>here for change your password</a>";
		$ret = mail($emailTo, $subject, $message);
	}
}

?>
