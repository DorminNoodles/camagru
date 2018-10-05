<?php

require('model/Photo.php');
require('core/Controller.php');

class Montage extends Controller
{
	function __construct($request)
	{
		parent::__construct();
		//
		$contentTpl = new Template('view/');
		$this->tpl->set('content', $contentTpl->fetch('camera.php'));
		// $this->tpl->set('content', $contentTpl->fetch('canvas.php'));

		echo $this->tpl->fetch('main.php');

		if ($request->action == "saveCompo")
		{
			$this->saveCompo();
		}
	}

	function render()
	{


	}

	function saveCompo()
	{
		$photo = new Photo();

		$photo->setSrc($_POST['img']);

		// echo "  ".$photo->src."  ";
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
