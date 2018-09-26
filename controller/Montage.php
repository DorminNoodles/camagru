<?php

require('model/User.php');
require('core/File.php');
require('model/Photo.php');
require('model/Sticker.php');


class Montage
{
	function __construct($request)
	{

		// $sticker = new Sticker("homer.png");
		// // $login = new Login($request->action);
		// // $login = new Login($request->action);
		// if ($request->action == "saveimg" && isset($_POST["saveimg"]))
		// {
		// 	$tmp = New Photo();
		// 	$tmp->savePhoto($_POST['saveimg']);
		// }

		if ($request->action == "saveCompo")
		{
			$this->saveCompo();
		}

		if (!isset($_POST['photo']))
		{
			include('view/camera.php');
		}
		else
		{
			include('view/canvas.php');

		}
		// include('view/montage.php');



	}

	function render()
	{


	}

	function saveCompo()
	{
		$photo = new Photo();

		$photo->src = $_POST['img'];


		$stickers = json_decode($_POST['json']);

		$photo->mergeStickers($stickers);

		$photo->savePhoto();



		// var_dump($_POST);
        //
		// // var_dump(json_decode($_GET['compo']));
		// $json = json_decode($_GET['compo']);
        //
        //
		// $pouet = $json[0];
        //
        //
		// $photo = new Photo();
		// $photo->mergeImage("voleur", "pouet", "batlescouilles");

	}
}

?>
