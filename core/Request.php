<?php
class Request
{
	public $url; //url appele par l utilisateur

	function __construct()
	{
		// echo $_SERVER['PATH_INFO'];
		$this->url = $_SERVER['PATH_INFO'];
	}
}
?>
