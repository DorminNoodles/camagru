<?php

require_once('core/Template.php');
require_once('model/User.php');

class Controller {

	protected $tpl;
	protected $user;
	protected $db;

	function __construct() {
		$this->tpl = new Template('view/');
		$this->db = new Database('camagru');

		if (isset($_SESSION['id'])) {
			$this->user = new User();
			$data = $this->db->select(['*'], 'users', 'WHERE id = '.$_SESSION['id']);
			if (isset($data[0])) {
				$this->user->setName($data[0]['name']);
				$this->user->setLikes(unserialize($data[0]['likes']));
				$this->user->setID($_SESSION['id']);
			}
		}
	}
}

 ?>
