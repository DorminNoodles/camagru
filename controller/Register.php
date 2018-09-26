<?php

require('core/Template.php');

class Register
{
	public $form = true;

	function __construct($request){


		$formTpl = new Template('view/');
		$tpl = new Template('view/');
		$tpl->set('content', $formTpl->fetch('formRegister.php'));
		echo $tpl->fetch('home.php');

	}
}
?>
