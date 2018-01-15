<?php
/**
 *
 */

require('core/Database.php');

class Login
{
	private $auth;
	private $db;

	function __construct($action)
	{
		var_dump($_SESSION);
		$this->db = new Database("camagru");
		$this->check_action($action);
	}

	function check_action($action)
	{
		// echo 'check action !!!!!    action -> ' . $action;
		if($action === 'logout')
			$this->logout();
		if($action === 'login')
			$this->login($_POST['name'], $_POST['pwd']);
	}

	function check_auth()
	{
		var_dump($_SESSION);
	}

	public function login($name, $pwd)
	{
		$user = $this->db->find_user($name);
		// var_dump($user);
		// echo "name : " . strtolower($name);
		// echo "namedb : " . strtolower($user['name']);
		echo "pwd : " . $user['pwd'];
		echo "pwd : " . $pwd;
		if (strtolower($name) === strtolower($user['name']) && $pwd === $user['pwd'])
		{
			echo "CONNECTION !!!!!";
			$_SESSION['auth'] = true;
		}
		else {
			echo "WRONG PASSWORD";
		}
	}

	public function logout()
	{
		echo 'test';
		$_SESSION['auth'] = false;
		// $_SESSION = NULL;
		echo 'here ->';
		var_dump($_SESSION);
	}
}

?>
