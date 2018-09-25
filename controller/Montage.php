<?php

require('model/User.php');
require('core/File.php');
require('model/Photo.php');
require('model/Sticker.php');


class Montage
{
	function __construct($request)
	{

		// $sticker = new Sticker("homer.png");
		// // $login = new Login($request->action);
		// // $login = new Login($request->action);
		// if ($request->action == "saveimg" && isset($_POST["saveimg"]))
		// {
		// 	$tmp = New Photo();
		// 	$tmp->savePhoto($_POST['saveimg']);
		// }



		if ($request->action == "saveCompo")
		{
			$this->saveCompo();
		}

		if (!isset($_POST['photo']))
		{
			include('view/camera.php');
		}
		else
		{
			include('view/canvas.php');

		}
		// include('view/montage.php');



	}

	function render()
	{


	}

	function saveCompo()
	{
		$photo = new Photo();

		$photo->src = $_POST['img'];


		$stickers = json_decode($_POST['json']);



		// echo $_POST['img'];
		// echo base64_decode($_POST['img']);
		// echo '<img src="' . $_POST['img'] . '" />';
		// $photo = $_POST['img'];

		// $image1=imagecreatefrompng($photo->src);

		$photo->mergeStickers($stickers);
			// var_dump($value);
			// echo '<br/>';
			// echo $value->name;
			// $image2=imagecreatefrompng("./stickers/".$value->name);
			// $w=imagesx($image2);
			// $h=imagesy($image2);
			// imagecopy($image1,$image2,$value->x,$value->y,0,0,$w,$h);


		// $image1=imagecreatefrompng($photo);
        //

        //
		// imagecopy($image1,$image2,0,0,0,0,$w,$h);
		// var_dump($image1);
		// imagepng($photo->src,'./out.png');
		$photo->savePhoto();



		// var_dump($_POST);
        //
		// // var_dump(json_decode($_GET['compo']));
		// $json = json_decode($_GET['compo']);
        //
        //
		// $pouet = $json[0];
        //
        //
		// $photo = new Photo();
		// $photo->mergeImage("voleur", "pouet", "batlescouilles");

	}
}

?>
