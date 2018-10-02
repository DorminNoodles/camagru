<?php

require('core/Controller.php');

class Detail extends Controller {

	function __construct($request) {
		parent::__construct();


		$detailTpl = new Template("view/");
		$detailTpl->set('img', '/camagru/photos/' .$request->action . '.png');

		$this->tpl->set('content', $detailTpl->fetch('detail.php'));

		echo ($this->tpl->fetch('main.php'));

		$this->user->addLike(5);
	}
}

?>
