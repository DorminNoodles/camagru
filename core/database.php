<?php

define('HOST', 'localhost');

class Database {

	private $connect = false;
	private $db;
	private $object;

	function __construct(){

		// if (!$this->connect)
		// 	$this->connect();
	}

	public function connect()
	{
		try {
			$this->db = new PDO('mysql:host='.HOST.';dbname=camagru;', 'root', 'qwerty');
		}
		catch ( PDOException $Exception ){
			echo 'erro DB : fuck PDO';
		}
		if (isset($this->db))
		{
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo 'connected to DB';
			$this->connect = true;
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
		// $query = "SELECT COUNT(*) FROM table";

	}
}



?>
