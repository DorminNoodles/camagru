<?php

	$emailTo = 'loic.chety@gmail.com';
	$emailFrom = 'hypertyson@hotmail.fr';
	$subject = "Camagru - Confirm Your Account";
	$message = "Bordel de merde";
	$ret = mail($emailTo, $subject, $message);

	echo $ret . '     SEND EMAIL';
 ?>
