<?php

	$emailTo = htmlspecialchars($userinfo['email']);
	$emailFrom = 'test@camagru.com';
	$subject = "Camagru - Confirm Your Account";
	$message = "To create your account, confirm by clicking on the link below <br/> <a href='http://localhost:". PORT . DS . $this->req->path . "/verisignup/validEmail/" . $_POST['login'] . "'>Confirm account</a>";
	$headers = "From: " . $emailFrom . "\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	mail($emailTo, $subject, $message, $headers);

	// $headers = array("From: from@example.com",
	// "Reply-To: replyto@example.com",
	// "X-Mailer: PHP/" . PHP_VERSION
	// );

	// $headers = implode("\r\n", $headers);

	// echo "bordel de merde";

	mail($emailTo, $subject, $message, $headers);

// $ret =  mail ( "blabla@yopmail.com" , "hello" , "bye !");

if ($ret)
	echo "   ret OK  ";
// echo $ret;
echo "end";

 ?>
