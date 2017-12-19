<?php
require('Request.php');
require('Routeur.php');
/**
 * class Dispatcher decoupe l url et l envoi au routeur ???....
 */
class Dispatcher
{
	public $request;

	function __construct()
	{
		$request = new Request($_SERVER['REQUEST_URI']);
		// $request = new Request($_SERVER['REQUEST_URI']);
		// echo $request->controller;
		new Routeur($request);
	}
}

?>
