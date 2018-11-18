<?php

class Template {
	var $vars;
	var $path;

	function __construct($path = 'view/') {
		$this->path = $path;
		$this->vars = array();
	}

	function set($name, $value) {
		$this->vars[$name] = $value;
	}

	function fetch($file) {
		extract($this->vars);          // Extract the vars to local namespace
		ob_start();                    // Start output buffering
		include($this->path . $file);  // Include the file
		$contents = ob_get_contents(); // Get the contents of the buffer
		ob_end_clean();                // End buffering and discard
		return $contents;              // Return the contents
	}
}

?>
