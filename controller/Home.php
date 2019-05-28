<?php

require('core/Controller.php');
require('model/Gallery.php');


class Home extends Controller
{
	function __construct($request)
	{
		parent::__construct($request);

		$gallery = new Gallery();
		if (!isset($request->params[0]))
				$request->params[0] = 0;
		$tplGallery = new Template('view/');
		$tplGallery->set('photos', $gallery->getPhotos($request->params[0]));
		$tplGallery->set('nextPage', $gallery->nextPage($request->params[0]));
		$tplGallery->set('previousPage', $gallery->previousPage($request->params[0]));

		$tplGallery->set('showPreviousBtn', $gallery->showPreviousBtn($request->params[0]));
		$tplGallery->set('showNextBtn', $gallery->showNextBtn($request->params[0]));

		$this->tpl->set('content', $tplGallery->fetch('gallery.php'));
		echo $this->tpl->fetch('main.php');
	}
}
?>
