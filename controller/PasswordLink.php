<?php

require_once('core/controller.php');
require_once('model/Email.php');

class PasswordLink extends Controller {
	function __construct(){
		parent::__construct();

		$contentTpl = new Template('view/');

		$contentTpl->set('errorMessage', null);
		$contentTpl->set('successMessage', null);

		if (isset($_POST['email'])) {
			$email = new Email($_POST['email']);
			if ($email->isValid() && $email->is()) {
				$this->sendPasswordLink($email->getValue());
				$contentTpl->set('successMessage', 'Password Link sending !');
			}
		}

		$this->tpl->set('content', $contentTpl->fetch('PasswordLink.php'));
		echo $this->tpl->fetch('main.php');
	}

	function sendPasswordLink($email) {
		$key = password_hash(rand(0, 99999999), PASSWORD_DEFAULT);
		$key = str_replace ( '/', '', $key);
		$key = str_replace ( '.', '', $key);
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
