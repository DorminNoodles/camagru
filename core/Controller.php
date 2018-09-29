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

	function __construct()
	{
		// $this->tpl = new Template('view/');
		// $this->user = new User();
	}
}

 ?>
