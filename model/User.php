<?php
/**
 *
 */



class User
{
	private $auth;
	private $db;

	function __construct()
	{
		$this->db = new Database("camagru");
		// $this->check_action($action);
	}

	function check_action($action)
	{
		// echo 'check action !!!!!    action -> ' . $action;
		// if($action === 'logout')
		// 	$this->logout();
		// if($action === 'login')
		// 	$this->login($_POST['name'], $_POST['pwd']);
	}

	function check_auth()
	{

	}

	public function login($name, $pwd)
	{
		$user = $this->db->find_user($name);
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

	function addLike($photoId) {

		$db->connect();

		$arr = getLikes();

		$arr['$photoId'] = true;
		$serialized = serialize($arr);
		// $quer
		$this->db->exec('INSERT INTO users (likes) VALUES (\''.$serialized.'.\')');

	}

	function getLike() {
		$this->connect();
		return (null);
		// $query = 'SELECT likes FROM users'
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
