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
		try
		{
			$this->db = new PDO('mysql:host='.HOST.';dbname='.$this->dbName.';', 'root', 'qwerty');
		}
		catch ( PDOException $Exception )
		{
			echo 'error Database connection';
		}
		if (isset($this->db))
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public function quote($data)
	{
		return $this->db->quote($data);
	}

	public function select($colsArr, $table, $condition)
	{
		$this->connect();
		$cols = implode(',', $colsArr);
		$query = $this->db->prepare('SELECT '.$cols.' FROM '.$table.' '.$condition);
		$query->execute();
		return $query->fetchAll();
	}

	public function userGetLikes($userID)
	{
		$this->connect();
		$prep = $this->db->prepare('SELECT likes FROM users WHERE id = '.$userID.'');
		$prep->execute();
		$ret = $prep->fetchAll();
		return unserialize($ret[0]['likes']);
	}

	function prepare($query)
	{
		return $this->db->prepare($query);
	}

	public function exec($query)
	{
		$ret = $this->db->exec($query);
	}

	public function findUserByName($username)
	{
		$this->connect();
		$query = $this->db->prepare('SELECT * FROM users WHERE name=\'' .$username. '\'');
		$query->execute();
		return($query->fetch());
	}

	public function findUserByEmail($email)
	{
		$this->connect();
		$query = $this->db->prepare('SELECT * FROM users WHERE email=\'' .$email. '\'');
		// $ret = $query->execute();
		$query->execute();
		return($query->fetch());
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
