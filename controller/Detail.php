<?php

require('core/Controller.php');
require('model/Photo.php');

class Detail extends Controller {

	function __construct($request) {
		parent::__construct();


		$photo = new Photo();

		if (!isset($request->action) || !$photo->existInDb($request->action)) {
			require('controller/404.php');
			return;
		}

		if ($_POST['message'] && $_POST['title'])
			$this->addComment();

		$detailTpl = new Template("view/");
		$detailTpl->set('likeImg', null);
		$detailTpl->set('newComment', null);

		$this->displayPhoto($detailTpl, $request->action);

		if (isset($request->params[0]) && $request->params[0] == 'like')
			$this->user->addLike($request->action);
		if (isset($request->params[0]) && $request->params[0] == 'dislike')
			$this->user->disLike($request->action);

		if (isset($_SESSION['id'])) {
			$this->displayLike($detailTpl, $request->action);
			$this->displayComments($detailTpl);
		}

		$this->tpl->set('content', $detailTpl->fetch('detail.php'));

		echo ($this->tpl->fetch('main.php'));

	}

	function displayPhoto($detailTpl, $photoId) {
		$detailTpl->set('photoPath', '/camagru/photos/' .$photoId. '.png');
	}

	function displayLike($detailTpl, $photoId) {
		if (isset($_SESSION['id'])) {
			if (!$this->checkLike($photoId)) {
				$detailTpl->set('likeImg', '<img src="/camagru/img/likeIcone1.png">');
				$detailTpl->set('photoId', $photoId . '/like');
			}
			else {
				$detailTpl->set('likeImg', '<img src="/camagru/img/likeIcone2.png">');
				$detailTpl->set('photoId', $photoId . '/dislike');
			}
		}

	}

	function checkLike($photoId) {
		$arr = $this->user->getLikes();
		if (isset($arr[$photoId]) && $arr[$photoId])
			return true;
		else
			return false;
	}

	function displayComments($detailTpl) {
		$newCommentTpl = new Template("view/");
		$detailTpl->set('newComment', $newCommentTpl->fetch('newComment.php'));
	}

	function addComment() {
		echo 'ADD COMMENT';
		$this->insertComment('comments', $_POST['title'], $_POST['message']);
		// $this->db->insert('comments', $_POST['title'], [$_POST['message']);

	}

	public function insertComment($table, $title, $message) {
		$this->db->connect();
		// $str = implode(', ', $values);
		// echo 'INSERT INTO '.$table.' VALUES (\''.$title.'\', \''.$message.'\')';
		$query = $this->db->prepare('INSERT INTO '.$table.' VALUES (\''.$title.'\', \''.$message.'\')');
		$query->execute();
		$query->fetchAll();
	}
}

?>
