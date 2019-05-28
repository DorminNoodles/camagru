<?php


class File
{
	public $data;

	// function __construct()
	// {
	//
	//
	// }

	public function saveFile($path, $name)
	{
		$file = fopen($path.$name, "w");
		fwrite($file, $this->data);
	}
}

 ?>
