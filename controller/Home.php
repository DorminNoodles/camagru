<?php

require('model/User.php');
require('core/File.php');
require('model/Photo.php');
require('model/Gallery.php');
require('core/Template.php');


class Home
{
	public $render = [];
	function __construct($request)
	{
		$login = new Login($request->action);
		// if ( $request->controller == "home" && $request->action == "photo")
		// {
		// 	var_dump($request);
		// }
		// else

		// $this->showGallery($request);

		$gallery = new Gallery();

		if (!isset($request->params[0]))
				$request->params[0] = 0;
		// $photos = $gallery->getPhotos($request->params[0]);



		$tplGallery = new Template('view/');
		$tplGallery->set('photos', $gallery->getPhotos($request->params[0]));
		$tplGallery->set('nextPage', $gallery->nextPage($request->params[0]));
		$tplGallery->set('previousPage', $gallery->previousPage($request->params[0]));


		$tpl = new Template('view/');
		$tpl->set('content', $tplGallery->fetch('gallery.php'));
		echo $tpl->fetch('home.php');

	}

	function render()
	{


	}

	// function showGallery($request)
	// {
	// 	$gallery = new Gallery();
	// 	if (!isset($request->params[0]))
	// 		$request->params[0] = 0;
	// 	$photos = $gallery->getPhotos($request->params[0]);
	// 	$this->render['gallery'] = $photos;
	// 	$this->render['btnNextPage'] = $gallery->nextPage($request->params[0]);
	// 	$this->render['btnPreviousPage'] = $gallery->previousPage($request->params[0]);
	// 	$this->render['homeContent'] = $_SERVER['DOCUMENT_ROOT']."/camagru/view/gallery.php";
	// }
}
?>
