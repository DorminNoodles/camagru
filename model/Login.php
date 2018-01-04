<?php
/**
 *
 */

require('core/Database.php');

class Login
{
	private $auth;

	function __construct()
	{
		var_dump($_SESSION);
		$bdd = new Database();
	}

	function check_auth()
	{
		var_dump($_SESSION);
	}

	public function signIn()
	{
		echo 'test';
		var_dump($_POST);
	}

}


 ?>
