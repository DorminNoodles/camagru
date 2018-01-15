<?php

require('model/Login.php');
require('core/File.php');


class Home
{
	function __construct($request)
	{
		$login = new Login($request->action);
		if ($request->action == "saveimg" && isset($_POST["saveimg"]))
		{
			$this->saveImg($_POST['saveimg']);
		}
		include('view/home.php');
	}

	function render()
	{


	}

	function saveImg($data)
	{

		echo ("SAVE IMG !");
		$img = new File();
		$img->data = $data;
		$db = new Database("camagru");

		echo $db->tableSize("images");

		$img->saveFile("img/", $db->tableSize("images"));


		//et maintenant que vais je faireuuuuuuuh

		//et maintenant ajouter la nouvelle image dans la db avec l id de l user
		//et du coup empecher un utilisateur non connecte de save une image ???
		//A VERIFIER

	}
}

?>
