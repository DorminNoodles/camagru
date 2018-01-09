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
		// echo "HAAAAAAAAAA";
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
		// $query = 'SELECT * FROM users';
		// echo $query;
		// echo "HELLOOOOOOOOOOOO";

		$arr = $this->db->query($query);
		return($arr->fetch());

		// $this->object = $arr->fetch(PDO::FETCH_ASSOC);

		// return($ret);
		// foreach($this->db->query($query) as $row)
		// {
		// 	var_dump($row);
		// }
		// var_dump($arr);

	}
}



?>
