<?php

require('model/Login.php');

class Home
{
	function __construct()
	{
		$login = new Login();
		include('view/home.php');
	}

	function render()
	{


	}
}

?>
