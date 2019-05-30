<?php

class User
{
	private $db;
	private $id;
	private $name;
	private $likes;
	private $email;

	function __construct($id)
	{
		$this->db = new Database("camagru");
		$this->auth = false;
		$data = $this->db->select(['*'], 'users', 'WHERE id = '.$id);
		if (isset($data[0]))
		{
			$this->id = $id;
			$this->name = $data[0]['name'];
			$this->likes = unserialize ($data[0]['likes']);
		}
	}

	public function getAuth()
	{
		return ($this->auth);
	}

	public function setAuth($auth)
	{
		$this->auth = $auth;
	}

	public function setID($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function addLike($photoID)
	{
		$this->db->connect();

		$this->likes[$photoID] = true;
		$serialized = serialize($this->likes);
		$this->db->exec('UPDATE users SET likes = \'' .$serialized.'\' WHERE id = '.$this->id.'');
	}

	public function disLike($photoID)
	{
		$this->db->connect();
		$this->likes[$photoID] = false;
		$serialized = serialize($this->likes);
		$this->db->exec('UPDATE users SET likes = \'' .$serialized.'\' WHERE id = '.$this->id.'');
	}

	public function setLikes($likes)
	{
		$this->likes = $likes;
	}

	public function getLikes()
	{
		return $this->likes;
	}

	public function setEmail()
	{
		$this->email = $email;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function logout()
	{
		$_SESSION['auth'] = false;
	}

	public function addActivationKey($key, $email)
	{
		$this->db->connect();
		$query = $this->db->prepare('UPDATE users SET activationKey=\''.$key.'\' WHERE email=\''.$email.'\'');
		$query->execute();
	}

	public function checkPassword($id, $password)
	{
		$data = $this->db->findUserById($id);
		return password_verify($password, $data['password']);

	}

}

?>
