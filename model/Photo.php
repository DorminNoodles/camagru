<?php

// require("/model/DatabasePhoto.php");

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
		$this->saveFile("photos/", $nb);

		$this->insertPhoto($db, $nb+1, 4);
		// $db->insert()

		//et maintenant que vais je faireuuuuuuuh
		//et maintenant ajouter la nouvelle image dans la db avec l id de l user
		//et du coup empecher un utilisateur non connecte de save une image ???
		//A VERIFIER
	}

	function insertPhoto($db, $id, $user_id)
	{
		$db = new DatabasePhoto();
		$db->insertPhoto($user_id);

		// $db->exec('INSERT INTO photos (user_id) VALUES (\''.$user_id.'.\')');

		//table/ id/ user_id

	}



}


?>
