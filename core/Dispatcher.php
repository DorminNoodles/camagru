<?php
class Dispatcher
{
	var $request;

	function __construct()
	{
		$this->request = new Request();
		// echo $this->request->url;
		Router::parse($this->request->url, $this->request);
		print_r($this->request);
	}
}
?>
