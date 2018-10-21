<?php

require('model/Input.php');

class Password extends Input {

	function __construct($input) {
		parent::__construct(strtolower($input));
		($this->checkPassword()) ? $this->valid = true : $this->valid = false;
	}

	public function checkPassword() {

		if (strlen($this->value) < 6) {
			$this->msg = 'password must be 6 characters minimum !';
			return false;
		}
		return true;
	}
}

?>
