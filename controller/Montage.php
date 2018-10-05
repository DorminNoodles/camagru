<?php

// require('model/User.php');
// require('core/File.php');
require('model/Photo.php');
// require('model/Sticker.php');
require('core/Controller.php');


class Montage extends Controller
{
	function __construct($request)
	{
		echo "hello";
		$test = new Database("bite");
		//
		parent::__construct();
		//
		$contentTpl = new Template('view/');
		$this->tpl->set('content', $contentTpl->fetch('camera.php'));

		echo $this->tpl->fetch('main.php');
		if ($request->action == "saveCompo")
		{
			$this->saveCompo();
		}
		//
		// if (!isset($_POST['photo']))
		// {
		// 	include('view/camera.php');
		// }
		// else
		// {
		// 	include('view/canvas.php');
		//
		// }



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
