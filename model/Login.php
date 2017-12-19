<?php
/**
 *
 */

require('model/Db.php');

class Login
{
	private $auth;

	function __construct()
	{
		var_dump($_SESSION);
		$bdd = new Db();
	}

	function check_auth()
	{
		var_dump($_SESSION);
	}


}


 ?>
