<?php

require('model/Photo.php');
require('core/Controller.php');

class Montage extends Controller
{
	function __construct($request)
	{
		parent::__construct();

		$contentTpl = new Template('view/');

		if (!isset($_SESSION['id']))
		{
			$this->tpl->set('content', 'you are not connected');
			echo $this->tpl->fetch('main.php');
			return;
		}
		$this->tpl->set('content', $contentTpl->fetch('montage.php'));

		echo $this->tpl->fetch('main.php');

		if ($request->action == "saveCompo" && $_POST['img'] && $_POST['stickers'])
			$this->saveCompo();
	}

	function render()
	{


	}

	function saveCompo()
	{
		$photo = new Photo();
		$photo->setSrc($_POST['img']);
		$stickers = json_decode($_POST['stickers']);
		$photo->mergeStickers($stickers);
		$photo->savePhoto($this->user->getId());

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
