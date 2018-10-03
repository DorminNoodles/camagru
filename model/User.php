<?php
/**
 *
 */


class User
{
	// private $auth;
	private $db;
	private $id;
	private $name;
	private $likes;

	function __construct() {
		$this->db = new Database("camagru");
		$this->auth = false;
	}

	public function getAuth() {
		return ($this->auth);
	}

	public function setAuth($auth) {
		$this->auth = $auth;
	}

	public function setID($id) {
		$this->id = $id;
	}

	public function getID() {
		return $this->id;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function getName() {
		return $this->name;
	}

	public function addLike($photoId) {
		$arr = $this->db->updateLikes($photoID, 1);
	}

	public function deleteLike($photoID) {
		$this->db->connect();
		$arr = $this->db->userGetLikes();
		$arr[$photoID] = false;
		$serialized = serialize($arr);
		$this->db->exec('UPDATE users SET likes = \'' .$serialized.'\' WHERE id = 1');
	}

	function checkLike() {
		$ret = $this->db->userGetLikes(1);
		print_r($ret);
		return ($ret);
	}

	public function setLikes($likes) {
		$this->likes = $likes;
	}

	public function getLikes() {
		return $this->likes;
	}

	public function logout() {
		echo 'test';
		$_SESSION['auth'] = false;
		// $_SESSION = NULL;
		echo 'here ->';
		var_dump($_SESSION);
	}

	public function login($name, $password) {
		// $arr = [];
		// $data = $this->db->find_user($name);
		// $this->db->find_user($name);
		//
		// if (strtolower($name) === strtolower($data['name']) && $password === $data['pwd']) {
		// 	$this->setAuth(true);
		// 	$this->setID($data['id']);
		// 	$this->setLikes(unserialize($data['likes']));
		// 	$arr['valid'] = true;
		// }
		// else
		// 	$arr['valid'] = false;
		// $this->save();
		// return $arr;
	}
}

?>
