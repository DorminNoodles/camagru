<?php


class File
{
	public $data;

	public function saveFile($path, $name)
	{
		$file = fopen($path.$name, "w");
		fwrite($file, $this->data);
	}
}

 ?>
