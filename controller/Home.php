<?php

require('model/Login.php');
require('core/File.php');
// require('model/LoginHeader.php');


class Home
{
	function __construct($request)
	{
		// if (isset($_SESSION['auth']))
		// 	echo $_SESSION['auth'];
		$login = new Login($request->action);
		// $loginHeader = new LoginHeader($request, $login);
		// echo 'SERIEUX';
		// var_dump($request);
		// var_dump($_POST);
		// if ($request->action == "logIN")
		// {
		// 	$login->logIN($_POST['name'], $_POST['pwd']);
		// }
		if ($request->action == "saveimg" && isset($_POST["saveimg"]))
		{
			// var_dump($_POST);
			$this->saveImg($_POST['saveimg']);
		}
		include('view/home.php');
	}

	function render()
	{


	}

	function saveImg($data)
	{
		// echo $data;

		echo ("SAVE IMG !");
		$img = new File();
		$img->data = $data;
		$img->saveFile("img/");

	}
}

?>
