<?php

require('model/Login.php');
require('model/LoginHeader.php');

class Home
{
	function __construct($request)
	{
		$login = new Login();
		$loginHeader = new LoginHeader($request, $login);
		// echo 'SERIEUX';

		include('view/home.php');
	}

	function render()
	{


	}

}

?>
