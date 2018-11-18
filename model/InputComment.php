<?php

require_once('model/Input.php');

class InputComment extends Input {

	function __construct($input) {
		parent::__construct($input);
		($this->checkComments()) ? $this->valid = true : $this->valid = false;
	}

	public function checkComments() {
		return true;
	}
}

?>
