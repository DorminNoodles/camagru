<?php

require_once('core/controller.php');
require_once('model/Email.php');

class PasswordLink extends Controller {

	function __construct(){
		parent::__construct();

		if (isset($_POST['email'])) {
			$email = new Email($_POST['email']);
			if ($email->isValid()) {
				$this->sendPasswordLink($email->getValue());
			}
		}

		// if ()

		$contentTpl = new Template('view/');

		$contentTpl->set('errorMessage', null);
		$contentTpl->set('successMessage', null);
		$this->tpl->set('content', $contentTpl->fetch('PasswordLink.php'));
		echo $this->tpl->fetch('main.php');
	}

	function sendPasswordLink($email) {
		$key = password_hash(rand(0, 99999999), PASSWORD_DEFAULT);
		$this->db->connect();
		$query = $this->db->prepare('UPDATE users SET activationKey=\''.$key.'\' WHERE email=\''.$email.'\'');
		$query->execute();
		$this->sendActivation($key, $email);
	}

	function sendActivation($key, $email) {
		$emailTo = $email;
		$emailFrom = 'register@camagru.fr';
		$subject = "Camagru - Confirm Your Account";
		$message = "Hello click here to change your password => http://localhost:8080/camagru/changePassword/".$key;
		$ret = mail($emailTo, $subject, $message);
	}
}

?>
