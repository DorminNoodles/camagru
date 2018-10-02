<?php

define('HOST', 'localhost');

class Database {

	protected $connect = false;
	protected $db;
	protected $object;
	protected $dbName;

	function __construct($name)
	{
		$this->dbName = $name;

	}

	public function connect()
	{
		try {
			$this->db = new PDO('mysql:host='.HOST.';dbname='.$this->dbName.';', 'root', 'qwerty');
		}
		catch ( PDOException $Exception ){
			echo 'erro DB : fuck PDO';
		}
		if (isset($this->db))
		{
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// echo 'connected to DB';
		}
	}

	function connect_to_db()
	{


	}

	public function updateLikes($photoID, $userID) {

		$this->connect();
		$prep = $this->db->prepare('SELECT likes FROM users WHERE id = '.$userID.'');
		$prep->execute();
		$ret = $prep->fetchAll();
		$likes = unserialize($ret[0]['likes']);

		if (isset($likes[$photoID]))
			$likes[$photoID] = !$likes[$photoID];
		else
			$likes[$photoID] = true;

		// print_r($likes);

		echo 'fuck >    ';
		print_r($likes);


		$serialized = serialize($likes);

		$prep = $this->db->prepare('UPDATE users SET likes = \'' .$serialized.'\' WHERE id = '.$userID.'');
		$prep->execute();
}

	public function userGetLikes($userID) {
		$this->connect();
		$prep = $this->db->prepare('SELECT likes FROM users WHERE id = '.$userID.'');
		$prep->execute();
		$ret = $prep->fetchAll();
		return unserialize($ret[0]['likes']);
	}

	function prepare($query) {

	}

	public function exec($query) {
		$ret = $this->db->exec($query);
		// echo $ret->fetch();
	}

	public function find_user($username)
	{
		$this->connect();
		$query = 'SELECT * FROM users WHERE name=\'' .$username. '\'';
		$arr = $this->db->query($query);
		return($arr->fetch());
	}

	public function tableSize($table)
	{
		$this->connect();
		$query = "SELECT COUNT(*) FROM $table";
		$arr = $this->db->query($query);
		$tmp = $arr->fetch();
		return ($tmp[0]);
	}
}


?>
