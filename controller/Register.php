<?php

class Register
{
	public $form = true;

	function __construct($request){
		// echo "S'inscrire";
		if (empty($_SESSION['auth']))
			$formRegister = $this->requireToVar('view/formRegister.php');
		else
			$formRegister = null;

		include('view/register.php');
	}

	function requireToVar($file){
	    ob_start();
	    require($file);
	    return ob_get_clean();
	}

}
?>
