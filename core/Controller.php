<?php

require_once('core/Template.php');
require_once('model/User.php');

class Controller {

	protected $tpl;
	protected $user;
	protected $db;

	function __construct()
	{
		$this->tpl = new Template('view/');
		$this->db = new Database('camagru');

		if (isset($_SESSION['id']))
			$this->user = new User($_SESSION['id']);
	}
}

?>
