<?php

require('model/Photo.php');
require('core/Controller.php');

class Delete extends Controller
{
	function __construct($request)
	{
		parent::__construct();

		$contentTpl = new Template('view/');

		if (!isset($_SESSION['id']))
		{
			$this->tpl->set('content', 'you are not connected');
			echo $this->tpl->fetch('main.php');
			return;
		}

		if (isset($request->action))
		{
			//if photo exist
			echo "Hello";

		}

		// $contentTpl->set('myPhotos', $myPhotos);


		echo $this->tpl->fetch('main.php');
	}
}

?>
