<?php

class DatabasePhoto extends Database
{
	function __construct($name)
	{
		parent::__construct($name);
		$db = new Database('camagru');
	}

	public function insertPhoto($user_id)
	{
		$this->connect();
		$this->db->exec('INSERT INTO photos (user_id) VALUES (\''.$user_id.'.\')');
	}

	public function getPhotos()
	{
		$this->connect();
		$query = 'SELECT * FROM photos';
		$tmp = $this->db->query($query);
		$arr = $tmp->fetchAll();
		return ($arr);
	}
}
 ?>
