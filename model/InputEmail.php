<?php

require_once('model/Input.php');
require_once('core/Database.php');

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

		if ($this->emailAlreadyExist($this->value)) {
			$this->error = 'Email already exist !';
			return false;
		}

		$this->value = filter_var($this->value, FILTER_SANITIZE_EMAIL);
		return true;
	}

	public function emailAlreadyExist($email) {
		$db = new Database("camagru");
		$result = $db->findUserByEmail($email);
		if ($result['email'])
			return true;
		return false;
	}
}

?>
