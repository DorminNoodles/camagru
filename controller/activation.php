<?php

require('core/Controller.php');

class Activation extends Controller {

	function __construct($request) {

		parent::__construct();


		$tplContent = new Template('view/');


		if ($this->checkActivation($request->action))
		{
			$this->activateAccount($request->action);
			$this->tpl->set('content', "ACTIVATION SUCCESS");
		}
		else
			$this->tpl->set('content', $tplContent->fetch('404.php'));

		echo $this->tpl->fetch('main.php');
	}

	function checkActivation($key) {
		$this->db->connect();
		$query = $this->db->prepare('SELECT activationKey FROM users WHERE activationKey=\''.$key.'\'');
		$query->execute();
		$data = $query->fetch();
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
