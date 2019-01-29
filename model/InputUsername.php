<?php

require_once('model/Input.php');

class InputUsername extends Input {

	function __construct($input) {
		parent::__construct(strtolower($input));
		($this->checkUsername()) ? $this->valid = true : $this->valid = false;
	}

	public function checkUsername() {
		if (strlen($this->value) < 3) {
			$this->error = 'Username must be specified and contains 3 characters minimum !';
			return false;
		}
		if (strlen($this->value) > 30) {
			$this->error = 'Username is too long !';
			return false;
		}
		if (strpos($this->value, '#039')) {
			$this->error = 'Username bad character !';
			return false;
		}
		if (strpos($this->value, '&quot;')) {
			$this->error = 'Username bad character !';
			return false;
		}

		$regex = "^[a-zA-Z0-9]{0,}/";

		if (!preg_match($regex, $this->value)) {
			$this->error = 'Username bad character !';
			return false;
		}

		if (!preg_match("#^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#", $password)) {
			$passwordErr = "Must contains 6 characters, with at least one uppercase, one lowercase and one digit";
		}
		return true;
	}

	public function alreadyExist() {
		if ($this->db->findUserByName($this->value) !== false) {
			$this->error = 'Username already taken !';
			return true;
		}
		return false;
	}
}


?>
