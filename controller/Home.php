<?php

require('model/Login.php');
require('core/File.php');
require('model/Photo.php');


class Home
{
	function __construct($request)
	{
		$login = new Login($request->action);
		if ($request->action == "saveimg" && isset($_POST["saveimg"]))
		{
			// $photo = new
			$tmp = New Photo();
			$tmp->savePhoto($_POST['saveimg']);
		}
		include('view/home.php');
	}

	function render()
	{


	}
}

?>
