<?php

// require('model/Login.php');
class LoginHeader
{

	function __construct($request, $login)
	{
		if ($request->action === 'login')
		{
			echo "hello moto";
		}
			//$login->signIn();
	}

}
?>
