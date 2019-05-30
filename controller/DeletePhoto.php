<?php

require('model/Photo.php');
require('core/Controller.php');

class DeletePhoto extends Controller
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

		if (isset($request->action) && is_numeric($request->action))
		{
			if ($this->deletePhoto($request->action, $this->user->getId()))
			{
				$this->tpl->set('content', $contentTpl->fetch('deletePhoto.php'));
				echo $this->tpl->fetch('main.php');
				return;
			}
		}
		$this->tpl->set('content', $contentTpl->fetch('404.php'));
		echo $this->tpl->fetch('main.php');
	}

	function deletePhoto($photoId, $userId)
	{
		$this->db->connect();
		$query = $this->db->prepare('SELECT * FROM photos WHERE id=\''.$photoId.'\'');
		$query->execute();
		$data = $query->fetch();


		if (empty($data))
			return false;
		if ($data['user_id'] === $userId)
		{
			$query = $this->db->prepare('DELETE FROM photos WHERE id=\''.$photoId.'\'');
			$query->execute();
		}
		return (true);
	}
}

?>
