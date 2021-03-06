<?php

require('model/Photo.php');
require('core/Controller.php');

class Editing extends Controller
{
	function __construct($request)
	{
		parent::__construct();

		$contentTpl = new Template('view/');

		if (!isset($_SESSION['id']))
		{
			$contentTpl->set('errorMsg', 'you are not connected');
			$this->tpl->set('content', $contentTpl->fetch('errorCard.php'));
			echo $this->tpl->fetch('main.php');
			return;
		}

		if ($request->action == "saveCompo" && $_POST['img'] && $_POST['stickers'])
			$this->saveCompo();

		//display Photo library
		$contentTpl->set('myPhotos', $this->getMyLibrary($_SESSION['id']));
		$this->tpl->set('content', $contentTpl->fetch('editing.php'));
		echo $this->tpl->fetch('main.php');

	}

	function saveCompo()
	{
		$photo = new Photo();
		$photo->setSrc($_POST['img']);
		$stickers = json_decode($_POST['stickers']);
		$photo->mergeStickers($stickers);
		$photo->savePhoto($this->user->getId());
	}

	function getMyLibrary($id) {
		$this->db->connect();
		$query = $this->db->prepare('SELECT * FROM photos WHERE user_id='.$id.'');
		$query->execute();
		$data = $query->fetchAll();
		$photos = [];
		foreach ($data as $photo)
			$photos[] = $photo['id'];
		return $photos;
	}
}

?>
