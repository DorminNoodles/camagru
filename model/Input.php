<?php

class Input {

	protected $db;
	protected $value;
	protected $valid;
	protected $error;

	function __construct($input) {

		$this->db = new Database('camagru');
		$this->sanitizeInput($input);
	}

	function sanitizeInput($input) {
		$this->value = htmlentities($input, ENT_QUOTES);
	}

	public function getValue() {
		return ($this->value);
	}

	public function isValid() {
		return ($this->valid);
	}

	public function getError() {
		return ($this->error);
	}
}

?>
