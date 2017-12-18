<?php
class Controller{

	public $request;

	function __construct($request){
		$this->request = $request;
	}

	public function render()
	{
		$view = ROOT.DS.'view'.DS.$this->request->controller.DS.$view.'.php';
		die($view);

	}
}
 ?>
