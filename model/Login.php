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

	function signIn($user, $pwd)
	{
		$user = Db.get_user();

	}
}

?>
