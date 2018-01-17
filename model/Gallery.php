<?php

class Gallery
{
	public $photos;

	function __construct()
	{
		$db = new DatabasePhoto("camagru");
		$this->photos = $db->getPhotos();
	}

	function display()
	{
		// var_dump($this->photos);
		// echo $this->photos['user_id'];

		foreach($this->photos as $photo)
		{
			$file = file_get_contents("./photos/".$photo['id']);
			// $file = file_get_contents("./photos/". $);

			echo '<img src="'. $file .'">';
			// echo $file;
			// echo '">';


			// echo '<br>';
			// var_dump($photo);
			// echo 'zizi';
		}

	}

}




?>
