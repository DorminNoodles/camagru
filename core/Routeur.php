<?php

/**
 * Routeur
 */

class Routeur
{
	public $controller;

	function __construct($request)
	{
		echo "controller/'.$request->controller.'.php";
		require('controller/'.$request->controller.'.php');
		new $request->controller($request);
	}
}

?>
