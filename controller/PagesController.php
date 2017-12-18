<?php
class PagesController extends Controller{

	function view($nom){
		$phrase = "Bienvenue sur la page". $nom;
		$this->render('index');
	}
}
?>
