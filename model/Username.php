<?php

require('model/Input.php');

class Username extends Input {

	function __construct($input) {
		parent::__construct(strtolower($input));
		($this->checkUsername()) ? $this->valid = true : $this->valid = false;
	}

	public function checkUsername() {

			if (strlen($this->value) < 3) {
				$this->msg = 'Username must be specified and contains 3 characters minimum !';
				return false;
			}

			if ($this->db->find_user($this->value) !== false) {
				$this->msg = 'Username already exist...';
				return false;
			}

		return true;
	}
}


?>
