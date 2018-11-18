<?php

require_once('model/Input.php');

class InputEmail extends Input {

	function __construct($input) {
		parent::__construct($input);
		($this->checkEmail()) ? $this->valid = true : $this->valid = false;
	}

	public function checkEmail() {
		if (strlen($this->value) < 5) {
			$this->msg = 'Email too small!';
			return false;
		}
		if (strlen($this->value) > 255) {
			$this->msg = 'Email too big !';
			return false;
		}
		if (strpos($this->value, '#039')) {
			$this->error = 'Email bad character !';
			return false;
		}
		if (strpos($this->value, '&quot;')) {
			$this->error = 'Email bad character !';
			return false;
		}
		$this->value = filter_var($this->value, FILTER_SANITIZE_EMAIL);
		return true;
	}
}

?>
