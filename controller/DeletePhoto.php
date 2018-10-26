<?php

require('model/Photo.php');
require('core/Controller.php');

class DeletePhoto extends Controller
{
	function __construct($request)
	{
		parent::__construct();

		echo $request->action;

		$contentTpl = new Template('view/');

		if (!isset($_SESSION['id']))
		{
			$this->tpl->set('content', 'you are not connected');
			echo $this->tpl->fetch('main.php');
			return;
		}

		if (isset($request->action) && is_numeric($request->action))
		{
			//if photo exist
			$this->deletePhoto($request->action, $this->user->getId());
			echo "Hello";
		}

		// $contentTpl->set('myPhotos', $myPhotos);


		echo $this->tpl->fetch('main.php');
	}

	function deletePhoto($photoId, $userId) {

		echo '<br/><br/>poulet';
		$this->db->connect();
		$query = $this->db->prepare('SELECT * FROM photos WHERE id=\''.$photoId.'\'');
		$query->execute();
		$data = $query->fetch();


		if (empty($data))
			return 'Error !';
		if ($data['user_id'] === $userId) {
			$query = $this->db->prepare('DELETE FROM photos WHERE id=\''.$photoId.'\'');
			$query->execute();
			echo '<br/><br/>bordel';
		}

		return ('Success !');

		// echo '<br/>';
		// echo '<br/>';
		// echo ($data['user_id']);
		// // print_r($data);
		// echo '<br/>';

	}
}

?>
