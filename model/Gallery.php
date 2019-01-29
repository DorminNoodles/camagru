<?php

require('model/DatabasePhoto.php');

class Gallery
{
	public $photos;

	function __construct() {
		$db = new DatabasePhoto("camagru");
		$this->photos = $db->getPhotos();
	}

	function getPhotos($start = 0)
	{
		if (!is_numeric($start))
			$start = 0;
		$nbPhotos = count($this->photos);
		$arr = [];

		for ($i=0;$i < 5 && $i < $nbPhotos;$i++)
		{
			if(isset($this->photos[$start + $i]['id']))
			{
				$img = [];
				$id = $this->photos[$start + $i]['id'];

				$img['id'] = $id;
				$img['path'] = "/camagru/photos/" . $id . ".png";
				$arr[] = $img;
			}
		}
		return ($arr);
	}

	function nextPage($nb)
	{
		if (!is_numeric($nb))
			$nb = 0;

		return ("/camagru/home/gallery/" . ($nb + 5));
	}

	function previousPage($nb)
	{
		if (is_numeric($nb) && $nb >= 5)
			$nb -= 5;
		else
		$nb = 0;

		return ("/camagru/home/gallery/". $nb);
	}

	function showPreviousBtn($nb)
	{
		if ($nb == 0)
			return false;
		return true;
	}

	function showNextBtn($nb)
	{
		if (($nb+5) < count($this->photos))
			return true;
		return false;
	}
}

?>
