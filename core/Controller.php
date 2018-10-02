<?php

require('core/Database.php');
require('core/Template.php');
require('model/User.php');

/**
 * Controller
 */
class Controller
{
	protected $tpl;
	protected $user;
	protected $db;

	function __construct()
	{
		$this->tpl = new Template('view/');

		if (!isset($_SESSION['user']))
		{
			$this->user = new User();
			$_SESSION['user'] = serialize($this->user);
		}

		$this->user = unserialize($_SESSION['user']);
		$this->db = new Database('camagru');
	}
}

 ?>
