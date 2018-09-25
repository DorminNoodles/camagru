<?php

class Register
{
	public $form = true;

	function __construct($request)
	{
		// echo "S'inscrire";
		if (empty($_SESSION['auth']))
		{
			include('view/register.php');
		}
	}
}

?>
