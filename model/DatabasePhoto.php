<?php

require_once("core/Database.php");

class DatabasePhoto extends Database
{
	function __construct($name)
	{
		parent::__construct($name);
	}

	public function insertPhoto($user_id)
	{
		$this->connect();
		echo "HELLO";
		$this->db->exec('INSERT INTO photos (user_id) VALUES (\''.$user_id.'.\')');
	}

	public function getPhotos()
	{
		$this->connect();
		$query = 'SELECT * FROM photos';
		$tmp = $this->db->query($query);
		$arr = $tmp->fetchAll();
		// $tmp = $this->db->exec('SELECT * FROM photos');

		// echo "here";
		// var_dump($tmp);
		return ($arr);
	}
}
 ?>
