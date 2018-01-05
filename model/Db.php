<?php

define("HOST", "localhost");

class Db {

	private $connect = false;
	private $bdd;

	function __construct()
	{
		if (!$this->connect)
			$this->connect_to_mysql();
	}

	function connect_to_mysql()
	{
		try {
			$this->bdd = new PDO('mysql:host='.HOST.';dbname=camagru;', 'root', 'qwerty');
		}
		catch ( PDOException $Exception ){
    		echo 'erro DB : fuck PDO';
		}

		if (isset($this->bdd))
		{
			echo 'connected to DB';
			$this->connect = true;
		}
	}

	function connect_to_db()
	{


	}

	function get_user($username)
	{

	}
}

?>
