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
		$this->db = new Database('camagru');

		if (!isset($_SESSION['id']))
		{
			// $this->user = new User();
			// $_SESSION['user'] = serialize($this->user);
		}

		if (isset($_SESSION['id']))
		{
			$this->user = new User();
			// $_SESSION['user'] = serialize($this->user);
		}

	}
}

 ?>
