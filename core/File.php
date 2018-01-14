<?php


class File
{
	public $data;

	function __construct()
	{



	}

	public function saveFile($path)
	{
		$file = fopen($path."001", "w");
		fwrite($file, $this->data);

	}
}

 ?>
