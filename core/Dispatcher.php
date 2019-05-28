<?php
require('Request.php');
require('Routeur.php');

class Dispatcher
{
	public $request;

	function __construct()
	{
		//handle request form url and use in Routeur
		$request = new Request($_SERVER['REQUEST_URI']);
		new Routeur($request);
	}
}

?>
