<?php

require('core/Controller.php');

class Activation extends Controller {

	function __construct($request) {

		parent::__construct();

		// if (isset($_POST['username']) && isset($_POST['password']) && !isset($_POST['id']))
		// 	$arr = $this->connectUser($_POST['username'], $_POST['password']);

		$tplContent = new Template('view/');


		if ($this->checkActivation($request->action))
		{
			$this->activateAccount($request->action);
			$this->tpl->set('content', "ACTIVATION");
		}
		else
			$this->tpl->set('content', $tplContent->fetch('404.php'));

		echo $this->tpl->fetch('main.php');
	}

	function checkActivation($key) {
		echo $key;
		$this->db->connect();
		$query = $this->db->prepare('SELECT activationKey FROM users WHERE activationKey=\''.$key.'\'');
		$query->execute();
		$data = $query->fetch();
		echo($data['activationKey']);
		if (isset($data['activationKey']))
			return true;
		else
			return false;
	}

	function activateAccount($key) {
		$this->db->connect();
		$query = $this->db->prepare('UPDATE users SET active=true WHERE activationKey=\''.$key.'\'');
		$query->execute();
	}


}
?>
