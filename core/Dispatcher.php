<?php

require('Request.php');
require('Routeur.php');
/**
 * class Dispatcher decoupe l url et l envoi au routeur ???....
 */

class Pikachu{

	public static $var;

	function __construct()
	{
		echo 'fuck';
		// echo $var;
	}

	public static function pouet()
	{
		echo Pikachu::$var;
		Pikachu::$var = 104;
	}

	public static function ecolo()
	{
		echo Pikachu::$var;
	}

	public static function set($hihi)
	{
		$this->var = $hihi;
	}

	public function test()
	{
		echo Pikachu::$var;
	}
}


class Dispatcher
{
	public $request;

	function __construct()
	{

		Pikachu::pouet();
		Pikachu::ecolo();

		$test = new Pikachu();

		$test->test();

		Pikachu::set(69);




		// $this->make_request();
		// $request = new Request($_SERVER['REQUEST_URI']);
		// $request.pouet();
		// $request = new Request($_SERVER['REQUEST_URI']);
		// echo $request->controller;
		// new Routeur($request);
	}

	// function make_request()
	// {
    //
	// 	$array = explode('/', $_SERVER['REQUEST_URI']);
	// 	$request['controller'] = ($array[2]) ? $array[2] : null;
	// 	$request['action'] = ($array[3]) ? $array[3] : null;
	// 	$request['params'] = array_slice($array, 4);
	// 	// var_dump($request);
	// }
}


?>
