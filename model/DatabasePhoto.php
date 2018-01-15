<?php

// require("/core/Database.php");

class DatabasePhoto extends Database
{
	function __construct()
	{


	}

	public function insertPhoto($user_id)
	{
		$this->connect();

		$db->exec('INSERT INTO photos (user_id) VALUES (\''.$user_id.'.\')');

	}



}

 ?>
