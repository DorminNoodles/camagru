<?php
	session_start();
	require('core/Dispatcher.php');

	new Dispatcher();


	$hello = include('model/mailTest.php');

	echo '    ' . $hello;

?>

<!-- <?php
	require_once('core/Template.php');

	/**
	* This variable holds the file system path to all our template files.
	*/
	$path = './view/';

	$tpl = new Template($path);

	$tpl->set('name', null);

	echo $tpl->fetch('register.php');





	/**
	* Create a template object for the outer template and set its variables.
	*/
	// $tpl = & new Template($path);
	// $tpl->set('title', 'User List');

	/**
	* Create a template object for the inner template and set its variables.  The
	* fetch_user_list() function simply returns an array of users.
	*/
	// $body = & new Template($path);
	// $body->set('user_list', fetch_user_list());

	/**
	* Set the fetched template of the inner template to the 'body' variable in
	* the outer template.
	*/
	// $tpl->set('body', $body->fetch('user_list.tpl.php'));

	/**
	* Echo the results.
	*/
	// echo $tpl->fetch('index.tpl.php');
?> -->
