<?php
class Request
{
	public $url; //url appele par l utilisateur

	function __construct()
	{
		// echo $_SERVER['PATH_INFO'];
		$this->url = (isset($_SERVER['PATH_INFO'])) ? $_SERVER['PATH_INFO'] : NULL;
	}
}
?>
