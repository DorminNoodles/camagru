<?php

require('core/Controller.php');

class Logout extends Controller {

	function __construct() {
		unset($_SESSION['id']);
	}



}





?>
