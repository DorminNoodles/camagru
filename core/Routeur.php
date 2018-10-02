<?php

/**
 * Routeur
 */

class Routeur
{
	public $controller;

	function __construct($request)
	{

		require('controller/'.$request->controller.'.php');
		new $request->controller($request);
	}
}

?>
