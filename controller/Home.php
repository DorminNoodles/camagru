<?php

require('model/Login.php');
require('core/File.php');
require('model/Photo.php');
require('model/Gallery.php');


class Home
{
	public $vars = [];
	function __construct($request)
	{
		$login = new Login($request->action);
		$gallery = new Gallery();
		if (!isset($request->params[0]))
			$request->params[0] = 0;
		$photos = $gallery->getPhotos($request->params[0]);
		$vars['gallery'] = $photos;
		$vars['btnNextPage'] = $gallery->nextPage($request->params[0]);



		// if ($request->action == "saveimg" && isset($_POST["saveimg"]))
		// {
		// 	// $photo = new
		// 	$tmp = New Photo();
		// 	$tmp->savePhoto($_POST['saveimg']);
		// }
		include('view/home.php');
	}

	function render()
	{


	}
}

?>
