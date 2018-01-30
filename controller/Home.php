<?php

require('model/Login.php');
require('core/File.php');
require('model/Photo.php');
require('model/Gallery.php');


class Home
{
	public $render = [];
	function __construct($request)
	{
		$login = new Login($request->action);
		// if ($request->action == "saveimg" && isset($_POST["saveimg"]))
		// {
		// 	// $photo = new
		// 	$tmp = New Photo();
		// 	$tmp->savePhoto($_POST['saveimg']);
		// }
		// var_dump ($request);
		if ( $request->controller == "photo")
		{

		}
		else
			$this->showGallery($request);

		// var_dump($this->render);

		include('view/home.php');
	}

	function render()
	{


	}

	function showGallery($request)
	{
		$gallery = new Gallery();
		if (!isset($request->params[0]))
			$request->params[0] = 0;
		$photos = $gallery->getPhotos($request->params[0]);
		$this->render['gallery'] = $photos;
		$this->render['btnNextPage'] = $gallery->nextPage($request->params[0]);
		$this->render['btnPreviousPage'] = $gallery->previousPage($request->params[0]);
		$this->render['homeContent'] = $_SERVER['DOCUMENT_ROOT']."/camagru/view/gallery.php";
	}
}
?>
