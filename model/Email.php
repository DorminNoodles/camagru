<?php

require_once('model/Input.php');

class Email extends Input {

	function __construct($input) {
		parent::__construct($input);
		($this->checkEmail()) ? $this->valid = true : $this->valid = false;
	}

	public function checkEmail() {

		if (strlen($this->value) < 5) {
			$this->msg = 'Invalid Email !';
			return false;
		}
		return true;
	}
}

?>
