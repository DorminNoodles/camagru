<?php

echo 'hoho';

if (isset($_GET['url']))
{
	echo $_GET['url'];
}

echo '<br />';
echo $_SERVER['REQUEST_URI'];

?>
