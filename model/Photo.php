<?php

require("model/DatabasePhoto.php");

class Photo extends File
{

	protected $src;
	function __construct()
	{

	}

	public function setSrc($src) {
		$this->src = $src;
	}

	public function savePhoto($userId)
	{
		$db = new Database("camagru");
		$this->insertPhoto($db, $userId);
		$db->connect();
		$query = $db->prepare('SELECT MAX(id) FROM photos');
		$query->execute();
		$id = $query->fetch();
		imagepng($this->src, "./photos/".$id[0].".png");
	}

	function insertPhoto($db, $user_id)
	{
		$db = new DatabasePhoto("camagru");
		$db->insertPhoto($user_id);
	}

	public function mergeStickers($stickers)
	{
		$img1 = imagecreatefrompng($this->src);

		foreach($stickers as $sticker)
		{
			if (!empty($sticker->name))
			{
				$img2 = imagecreatefrompng("./stickers/" . $sticker->name);
				$w=imagesx($img2);
				$h=imagesy($img2);
				imagecopy($img1,$img2,$sticker->x,$sticker->y,0,0,$w,$h);
			}
		}
		$this->src = $img1;
	}

	public function existInDb($photoId)
	{
		$db = new DatabasePhoto("camagru");
		$data = $db->select(['*'], 'photos', 'WHERE id=' . $photoId);
		if ($data)
			return true;
		else
			return false;
	}
}

?>
