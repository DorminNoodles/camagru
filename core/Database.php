<?php

define('HOST', 'localhost');

class Database {

	private $connect = false;
	private $db;
	private $object;
	private $dbName;

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
			echo 'connected to DB';
		}
	}

	function connect_to_db()
	{


	}

	public function find_user($username)
	{
		$this->connect();
		// Database::connect();

		$query = 'SELECT * FROM users WHERE name=\'' .$username. '\'';
		$arr = $this->db->query($query);
		return($arr->fetch());
	}

	public function tableSize($table)
	{
		$this->connect();
		$query = "SELECT COUNT(*) FROM images";
		$arr = $this->db->query($query);
		$tmp = $arr->fetch();
		return ($tmp[0]);
	}
}



?>
