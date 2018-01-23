<?php

	$headers = array("From: from@example.com",
	"Reply-To: replyto@example.com",
	"X-Mailer: PHP/" . PHP_VERSION
	);

	$headers = implode("\r\n", $headers);

	echo "bordel de merde";

$ret =  mail ( "loic.chety@gmail.com" , "hello" , "bye !", $headers);

if ($ret)
	echo "   ret OK  ";
// echo $ret;
echo "end";

 ?>
