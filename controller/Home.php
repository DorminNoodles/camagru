<?php

require('model/Login.php');
require('core/File.php');
require('model/Photo.php');
require('model/Gallery.php');


class Home
{
	function __construct($request)
	{
		$login = new Login($request->action);
		$gallery = new Gallery();
		$gallery->display();

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
