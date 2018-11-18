<?php
/**
 *
 */


class User
{
	private $db;
	private $id;
	private $name;
	private $likes;
	private $email;

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

	public function getId() {
		return $this->id;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function getName() {
		return $this->name;
	}

	public function addLike($photoID) {
		$this->db->connect();
		$this->likes[$photoID] = true;
		$serialized = serialize($this->likes);
		$this->db->exec('UPDATE users SET likes = \'' .$serialized.'\' WHERE id = '.$this->id.'');
	}

	public function disLike($photoID) {
		$this->db->connect();
		$this->likes[$photoID] = false;
		$serialized = serialize($this->likes);
		$this->db->exec('UPDATE users SET likes = \'' .$serialized.'\' WHERE id = '.$this->id.'');
	}

	public function setLikes($likes) {
		$this->likes = $likes;
	}

	public function getLikes() {
		return $this->likes;
	}

	public function setEmail() {
		$this->email = $email;
	}
	public function getEmail() {
		return $this->email;
	}

	public function logout() {
		$_SESSION['auth'] = false;
		var_dump($_SESSION);
	}

	public function checkPassword($id, $password) {
		$data = $this->db->findUserById($id);
		return password_verify($password, $data['password']);

	}

}

?>
