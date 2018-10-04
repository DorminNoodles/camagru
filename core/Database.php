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

	public function findUserById($id)
	{
		$this->connect();
		$query = 'SELECT * FROM users WHERE id=\'' .$id. '\'';
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
