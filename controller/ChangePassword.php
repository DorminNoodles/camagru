<?php

require_once('core/Controller.php');
require_once('model/InputPassword.php');

class ChangePassword extends Controller {

	function __construct($request)
	{

		parent::__construct();

		$contentTpl = new Template('view/');
		$contentTpl->set('successMessage', null);
		$contentTpl->set('errorMessage', null);

		// if (isset($_SESSION['id'])) {
		// 	echo $this->tpl->fetch('main.php');
		// 	return;
		// }

		if (isset($request->action) && isset($_POST['newPassword1']) && isset($_POST['newPassword2']))
		{
			if ($this->checkPassword())
			{
				if ($this->checkLinkPassword($request->action))
				{
					$this->updateNewPassword($_POST['newPassword1'], $request->action);
					$contentTpl->set('successMessage', 'Password changed !');
				}
			}
			else
				$contentTpl->set('errorMessage', 'Error Password');

		}
		$this->tpl->set('content', $contentTpl->fetch('changePassword.php'));
		echo $this->tpl->fetch('main.php');
	}

	function checkPassword()
	{
		$pwd1 = new InputPassword($_POST['newPassword1']);
		$pwd2 = new InputPassword($_POST['newPassword2']);

		if (!$pwd1->isValid())
			return false;
		if (!$pwd2->isValid())
			return false;
		if ($pwd1->getValue() !== $pwd2->getValue())
			return false;
		return true;
	}

	function checkLinkPassword($key)
	{
		$this->db->connect();
		$query = $this->db->prepare('SELECT * FROM users WHERE activationKey=\''.$key.'\'');
		$query->execute();
		$data = $query->fetch();

		if ($key === $data['activationKey'])
			return true;
		else
			return false;
	}

	function updateNewPassword($password, $key)
	{
		$password = password_hash($password, PASSWORD_DEFAULT);
		$this->db->connect();
		$query = $this->db->prepare('UPDATE users SET password=\''.$password.'\' WHERE activationKey=\''.$key.'\'');
		$query->execute();
	}
}

?>
