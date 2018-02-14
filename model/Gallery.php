<?php

class Gallery
{
	public $photos;

	function __construct()
	{
		$db = new DatabasePhoto("camagru");
		$this->photos = $db->getPhotos();
	}

	function getPhotos($start = 0)
	{
		if (!is_numeric($start))
			$start = 0;
		// var_dump($this->photos);
		// echo $this->photos['user_id'];
		$nbPhotos = count($this->photos);
		$arr = [];

		for ($i=0;$i < 5 && $i < $nbPhotos;$i++)
		{
			// echo "start => ".$start;
			if(isset($this->photos[$start + $i]['id']))
			{
				$img = [];
				// $file = file_get_contents("./photos/".$photo['id'].".png");
				// $file = file_get_contents("./photos/". $);

				// echo "fuck you -> " . $this->photos[0]['id'];
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

		return ("/camagru/home/gallery/". ($nb+5));
	}

	function previousPage($nb)
	{
		if (is_numeric($nb) && $nb >= 5)
			$nb -= 5;
		else
		$nb = 0;

		return ("/camagru/home/gallery/". $nb);
	}
}


?>
