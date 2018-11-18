<?php

require('core/Controller.php');
require('model/Photo.php');
require_once('model/InputComment.php');

class Detail extends Controller {

	function __construct($request) {
		parent::__construct();


		$photo = new Photo();

		if (!isset($request->action) || !$photo->existInDb($request->action)) {
			require('controller/404.php');
			return;
		}

		if (isset($_POST['message']))
			$this->insertComment($this->user->getId(), $_POST['message'], $request->action);

		$detailTpl = new Template("view/");
		$detailTpl->set('likeImg', null);
		$detailTpl->set('newComment', null);
		$detailTpl->set('comments', []);

		$this->displayPhoto($detailTpl, $request->action);


		if (isset($_SESSION['id'])) {
			if (isset($request->params[0]))
				$this->manageLike($request->params[0], $request->action);
			$this->displayLike($detailTpl, $request->action);
			$this->displayNewComments($detailTpl);
		}
		$this->displayComments($detailTpl, $request->action);
		$this->tpl->set('content', $detailTpl->fetch('detail.php'));

		echo ($this->tpl->fetch('main.php'));

	}

	function displayComments($detailTpl, $photoId) {
		$data = $this->db->select(['*'], 'comments', 'WHERE id_photo='.$photoId);
		$arr = [];

		foreach ($data as $comment) {
			$tmp['message'] = $comment['content'];
			$user = $this->db->findUserById($comment['userId']);
			$tmp['login'] = $user['name'];
			$arr[] = $tmp;
		}
		$detailTpl->set('comments', $arr);
	}

	function manageLike($param, $photoId) {
		if ( $param == 'like')
			$this->user->addLike($photoId);
		if ($param == 'dislike')
			$this->user->disLike($photoId);
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

	function displayNewComments($detailTpl) {
		$newCommentTpl = new Template("view/");
		$detailTpl->set('newComment', $newCommentTpl->fetch('newComment.php'));
	}

	public function insertComment($userId, $message, $photoId) {
		$comment = new InputComment($message);
		$this->db->connect();
		$query = $this->db->prepare('INSERT INTO comments (id_photo, userId, content) VALUES ('.$photoId.', \''.$userId.'\', \''.$comment->getValue().'\')');
		$query->execute();
		//get id of photo owner
		$query = $this->db->prepare('SELECT * FROM photos WHERE id=\''.$photoId.'\'');
		$query->execute();
		$data = $query->fetch();
		//get mail of photo owner
		$query = $this->db->prepare('SELECT * FROM users WHERE id=\''.$data['user_id'].'\'');
		$query->execute();
		$data = $query->fetch();

		if (isset($data['email'])) {
			$emailTo = $data['email'];
			$emailFrom = 'register@camagru.fr';
			$subject = "Camagru - New comment !";
			$message = "One of your photo recevied a new comment !";
			$ret = mail($emailTo, $subject, $comment->getValue());
		}
	}
}

?>
