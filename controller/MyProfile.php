<?php

require('core/Controller.php');

class MyProfile extends Controller {

	function __construct() {
		parent::__construct();


		$contentTpl = new Template('view/');

		$this->tpl->set('content', $contentTpl);

		echo $this->tpl->fetch('main.php');
	}
}


?>
