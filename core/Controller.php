<?php

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
			// $this->user->setLikes($this->db->userGetLikes($_SESSION['id']));
			// $this->user->setLikes();
			$arr = $this->db->select(['likes'], 'users', 'WHERE id = '.$_SESSION['id']);
			$this->user->setLikes(unserialize($arr[0][0]));
			print_r($this->user->getLikes());
			$this->user->setID($_SESSION['id']);
		}

	}
}

 ?>
