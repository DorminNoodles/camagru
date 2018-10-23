<?php

require_once('core/Controller.php');

class ChangePassword extends Controller {

	function __construct($request) {

		parent::__construct();

		$contentTpl = new Template('view/');
		$this->tpl->set('content', $contentTpl->fetch('changePassword.php'));



		echo $this->tpl->fetch('main.php');
		// echo $request;


	}
}

?>
