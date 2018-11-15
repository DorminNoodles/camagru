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
		new Routeur($request);
	}
}

?>
