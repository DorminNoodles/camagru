<?php

class Routeur
{
	public $controller;

	function __construct($request)
	{
		//require controller from request (from url)
		require('controller/'.$request->controller.'.php');
		//new instance controller from request
		new $request->controller($request);
	}
}

?>
