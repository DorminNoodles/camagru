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
		$this->action = (isset($arr[3])) ? $arr[3] : null;
		$this->params = array_slice($arr, 4);
	}

	function setController($str)
	{
		// $a = explode('/', $url);
		$this->controller = ($str) ? $str : 'Home';
		if (!file_exists('controller/'.$this->controller.'.php'))
			$this->controller = 'Home';
	}
}


?>
