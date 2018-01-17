<?php

require('model/Login.php');
require('core/File.php');
require('model/Photo.php');
require('model/Sticker.php');


class Montage
{
	function __construct($request)
	{
		$sticker = new Sticker("homer.png");
		// $login = new Login($request->action);
		// $login = new Login($request->action);
		if ($request->action == "saveimg" && isset($_POST["saveimg"]))
		{
			$tmp = New Photo();
			$tmp->savePhoto($_POST['saveimg']);
		}

		include('view/montage.php');



	}

	function render()
	{


	}
}

?>
