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

	public function savePhoto()
	{
		echo ("SAVE IMG !");
		$db = new Database("camagru");
		$nb = $db->tableSize("photos");
		imagepng($this->src, "./photos/". ($nb + 1) .".png");
		$this->insertPhoto($db, $nb+1, 4);
	}

	function insertPhoto($db, $id, $user_id)
	{
		$db = new DatabasePhoto("camagru");
		$db->insertPhoto($user_id);
	}

	public function mergeImage($dest, $src, $pos)
	{

	}

	public function mergeStickers($stickers)
	{
		$img1 = imagecreatefrompng($this->src);

		foreach($stickers as $sticker)
		{
			$img2 = imagecreatefrompng("./stickers/".$sticker->name);
			$w=imagesx($img2);
			$h=imagesy($img2);
			imagecopy($img1,$img2,$sticker->x,$sticker->y,0,0,$w,$h);
		}
		$this->src = $img1;

		// $test = imagecreatefrompng($this->src);
		// $hello = base64_encode($test);
		// echo ($hello);
		// echo "hihihihi".$sticker->name;
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
