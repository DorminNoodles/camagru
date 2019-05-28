<?php

require_once('core/Controller.php');

class NotFound extends Controller {

	function __construct() {
		parent::__construct();

		$tplNotFound = new Template("view/");
		$this->tpl->set('content', $tplNotFound->fetch('404.php'));
		echo $this->tpl->fetch('main.php');
	}
}

 ?>
