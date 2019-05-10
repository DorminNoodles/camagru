<?php

require_once('model/Input.php');

class InputPassword extends Input {

	function __construct($input) {
		parent::__construct($input);
		($this->checkPassword()) ? $this->valid = true : $this->valid = false;
	}

	public function checkPassword() {
		if (strlen($this->value) < 6) {
			$this->error = 'Password must be 6 characters minimum !';
			return false;
		}

		if (!preg_match('/[[:punct:]]/', $this->value)) {
			$this->error = 'Password must be contain at leat 1 special character !';
			return false;
		}
		if (!preg_match('/[[:upper:]]/', $this->value)) {
			$this->error = 'Password must be contain at leat 1 uppercase character !';
			return false;
		}
		if (!preg_match('/[[:lower:]]/', $this->value)) {
			$this->error = 'Password must be contain at leat 1 lowercase character !';
			return false;
		}
		if (!preg_match('/\d/', $this->value)) {
			$this->error = 'Password must be contain at leat 1 number !';
			return false;
		}
		return true;
	}

	public function getCryptedValue() {
		return password_hash($this->value, PASSWORD_DEFAULT);
	}
}

?>
