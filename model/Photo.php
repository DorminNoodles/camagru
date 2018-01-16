<?php

require("model/DatabasePhoto.php");

class Photo extends File
{
	function __construct()
	{


	}

	function savePhoto($data)
	{
		echo ("SAVE IMG !");
		// $img = new File();
		$this->data = $data;
		$db = new Database("camagru");
        //
		// echo $db->tableSize("images");
        //
		$nb = $db->tableSize("photos");
		$this->saveFile("photos/", $nb+1);
		$this->insertPhoto($db, $nb+1, 4);
	}

	function insertPhoto($db, $id, $user_id)
	{
		$db = new DatabasePhoto("camagru");
		$db->insertPhoto($user_id);
	}
}


?>
