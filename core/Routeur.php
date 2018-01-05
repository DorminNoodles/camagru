<?php

// require('Controller.php');
// require('controller/Home.php');

/**
 * Routeur
 */
class Routeur
{
	public $controller;

	function __construct($request)
	{
		// var_dump($request);
		// $name = $request->controller;
		// $controller = new $name();
		require('controller/'.$request->controller.'.php');
		new $request->controller($request);
	}
}

?>
