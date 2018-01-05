<?php

define('HOST', 'localhost');

class Database {

	private $connect = false;
	private $bdd;

	function __construct(){

		if (!$this->connect)
			$this->connect();
	}

	function connect()
	{
		try {
			$this->bdd = new PDO('mysql:host='.HOST.';dbname=camagru;', 'root', 'qwerty');
		}
		catch ( PDOException $Exception ){
			echo 'erro DB : fuck PDO';
		}
		if (isset($this->bdd))
		{
			$this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo 'connected to DB';
			$this->connect = true;
		}
	}

	function connect_to_db()
	{


	}

	public function find_user($username)
	{
		$this.connect();

		$query = 'SELECT * FROM user where name = ' .$username. '';
		$arr = $this->bdd->query($query)->fetch();

		var_dump($arr);


	}
}



?>
