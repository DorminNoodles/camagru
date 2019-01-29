<?php

require_once('core/controller.php');
require_once('model/InputEmail.php');
require_once('core/Database.php');

class PasswordLink extends Controller {
	function __construct(){
		parent::__construct();

		$contentTpl = new Template('view/');

		$contentTpl->set('errorMessage', null);
		$contentTpl->set('successMessage', null);

		if (isset($_POST['email'])) {
			$email = new InputEmail($_POST['email']);
			$db = new Database("camagru");
			if ($email->isValid() && $db->findUserByEmail($email->getValue())) {
				$this->sendPasswordLink($email->getValue());
				$contentTpl->set('successMessage', 'Password Link sending !');
			}
			else
				$contentTpl->set('errorMessage', 'Bad Email');
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
		$this->sendMail($key, $email);
	}

	function sendMail($key, $email) {
		// echo 'HELOOOO';
		$emailTo = $email;
		$emailFrom = 'register@camagru.fr';
		$subject = "Camagru - Change Password";
		$message = "Hello click here to change your password => http://localhost:8080/camagru/changePassword/".$key;
		$ret = mail($emailTo, $subject, $message);
	}
}

?>
