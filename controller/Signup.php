<?php

class Signup
{
	function __construct($request)
	{
		// echo "S'inscrire";
		if (empty($_SESSION['auth']))
		{
			include('view/signup.php');
		}
	}
}

?>
