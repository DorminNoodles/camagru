<?php
class Request
{
	var $url;

	function __construct
	{
		$this->url = $_SERVER['PATH_INFO'];
	}

}


?>
