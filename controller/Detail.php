<?php

require('core/Controller.php');

class Detail extends Controller {

	function __construct($request) {
		parent::__construct();


		$detailTpl = new Template("view/");
		$detailTpl->set('photoPath', '/camagru/photos/' .$request->action. '.png');

		$detailTpl->set('photoId', $request->action);
		$detailTpl->set('likeImg', '/camagru/img/likeIcone1.png');

		if (isset($request->params[0]) && $request->params[0] == 'like')
			$this->user->updateLike($request->action);

		$arr = $this->user->getLikes();
		if ($arr[$request->action])
			$detailTpl->set('likeImg', '/camagru/img/likeIcone2.png');
		$this->tpl->set('content', $detailTpl->fetch('detail.php'));

		echo ($this->tpl->fetch('main.php'));

	}
}

?>
