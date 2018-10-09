<?php

require('core/Controller.php');
require('model/Photo.php');

class Detail extends Controller {

	function __construct($request) {
		parent::__construct();


		$photo = new Photo();

		if ($photo->existInDb($request->action))
			echo 'WAYNES WORLD';
		$detailTpl = new Template("view/");
		$detailTpl->set('photoPath', '/camagru/photos/' .$request->action. '.png');


		if (isset($_SESSION['id']))
			$detailTpl->set('likeImg', '<img src="/camagru/img/likeIcone1.png">');

		if (isset($request->params[0]) && $request->params[0] == 'like')
			$this->user->addLike($request->action);
		if (isset($request->params[0]) && $request->params[0] == 'dislike')
			$this->user->disLike($request->action);

		if (isset($_SESSION['id']))
		{
			$arr = $this->user->getLikes();

			if (isset($arr[$request->action]) && $arr[$request->action])
				$detailTpl->set('photoId', $request->action . '/dislike');
			else
				$detailTpl->set('photoId', $request->action . '/like');

			if (isset($arr[$request->action]) && $arr[$request->action])
				$detailTpl->set('likeImg', '<img src="/camagru/img/likeIcone2.png">');
		}
		$this->tpl->set('content', $detailTpl->fetch('detail.php'));

		echo ($this->tpl->fetch('main.php'));

	}
}

?>
