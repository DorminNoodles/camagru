<?php

/**
 *
 */
class Request
{
	public $controller;
	public $action;
	public $params;

	function __construct($url)
	{
		// echo $this->action;
		// Request::pouet();
		$arr = explode('/',$url);
		$this->setController($arr[2]);
		$this->action = $arr[3];
		$this->params = array_slice($arr, 4);
	}

	function setController($str)
	{
		// $a = explode('/', $url);
		$this->controller = ($str) ? $str : 'Index';
		if(!file_exists('controller/'.$this->controller.'.php'))
			$this->controller = 'Index';
	}

	public 	function pouet()
	{
		echo $this->action;
		// $this->action = 8;
	}
}


?>
