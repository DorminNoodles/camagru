<?php

require_once('model/Input.php');

class Password extends Input {

	function __construct($input) {
		parent::__construct($input);
		($this->checkPassword()) ? $this->valid = true : $this->valid = false;
	}

	public function checkPassword() {
		if (strlen($this->value) < 6) {
			$this->error = 'Password must be 6 characters minimum !';
			return false;
		}
		return true;
	}

	public function getCryptedValue() {
		return password_hash($this->value, PASSWORD_DEFAULT);
	}
}

?>
